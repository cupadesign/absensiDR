@extends('layouts.mobile')

@section('title', 'Dashboard')

@section('content')

<div class="p-4 space-y-4">

    {{-- MAP STYLE IG --}}
    <div class="bg-white rounded-3xl overflow-hidden shadow-lg border border-gray-100">

        {{-- HEADER MAP --}}
        <div class="p-3 border-b border-green-200 flex items-center justify-between">

            <div>

                <h3 class="font-semibold text-gray-800">
                    Ruang [nama ruangan]
                </h3>

                <p class="text-xs text-gray-500">
                    Pastikan GPS aktif
                </p>

            </div>

            <div class="bg-blue-100 text-blue-700 text-xs px-2 py-1 rounded-full">
                LIVE
            </div>

        </div>

        {{-- MAP --}}
        <div id="map" class="h-72 w-full"></div>

        {{-- INFO CARD --}}
        <div class="p-3 bg-white border-t border-gray-100">

            {{-- STATUS --}}
            <div class="flex items-center justify-between mb-3">

                <div>

                    <h3 class="text-sm font-semibold text-gray-800">
                        Info Absensi
                    </h3>

                    <p class="text-xs text-gray-500">
                        Lokasi terdeteksi otomatis
                    </p>

                </div>

                <div
                    id="geoStatus"
                    class="bg-yellow-100 text-yellow-700 text-[10px] px-2 py-1 rounded-full"
                >
                    Mengecek...
                </div>

            </div>

            {{-- MINI INFO --}}
            <div class="grid grid-cols-2 gap-2 mb-3">

                {{-- KOORDINAT --}}
                <div class="bg-gray-50 rounded-2xl p-3">

                    <div class="flex items-center gap-2 mb-1">

                        <i data-lucide="locate-fixed" class="w-4 h-4 text-green-600"></i>

                        <span class="text-xs text-gray-500">
                            Lokasi
                        </span>

                    </div>

                    <p id="coords" class="text-xs font-medium text-gray-700 truncate">
                        Mendeteksi...
                    </p>

                </div>
                <div class="bg-gray-50 rounded-2xl p-3">

                    <div class="flex items-center gap-2 mb-1">

                        <i data-lucide="map-pin" class="w-4 h-4 text-red-600"></i>

                        <span class="text-xs text-gray-500">
                            Jarak
                        </span>

                    </div>

                    <p id="distance" class="text-xs font-medium text-gray-700">
                        --
                    </p>

                </div>

                {{-- WAKTU --}}
                <div class="bg-gray-50 rounded-2xl p-3">

                    <div class="flex items-center gap-2 mb-1">

                        <i data-lucide="clock-3" class="w-4 h-4 text-blue-600"></i>

                        <span class="text-xs text-gray-500">
                            Waktu
                        </span>

                    </div>

                    <p id="time" class="text-xs font-medium text-gray-700">
                        --
                    </p>

                </div>

            </div>

            {{-- BUTTON --}}
            <div class="grid grid-cols-2 gap-2">

                <button
                    id="absenBtn"
                    class="py-3 rounded-2xl bg-gray-300 text-white text-sm font-semibold cursor-not-allowed"
                    disabled
                >
                    MENDETEKSI LOKASI...
                </button>

                <button class="py-3 rounded-2xl bg-gray-100 text-gray-700 text-sm font-semibold active:scale-95 transition">
                    DETAIL
                </button>

            </div>
            <input type="hidden" id="lat" name="lat">
            <input type="hidden" id="lng" name="lng">
            <input type="hidden" id="accuracy" name="accuracy">
        </div>

    </div>

</div>

@endsection


@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', () => {

    lucide.createIcons();

    // INIT MAP
    const map = L.map('map').setView([-6.9175, 107.6191], 18);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);

    const coordsText = document.getElementById('coords');
    const timeText = document.getElementById('time');
    const absenBtn = document.getElementById('absenBtn');
    const geoStatus = document.getElementById('geoStatus');
    const distanceText = document.getElementById('distance');

    // WAKTU
    timeText.innerText = new Date().toLocaleString();

    // GPS
    navigator.geolocation.getCurrentPosition(

        (position) => {

            const lat = position.coords.latitude;
            const lng = position.coords.longitude;
            const accuracy = position.coords.accuracy;

            document.getElementById('lat').value = lat;
            document.getElementById('lng').value = lng;
            document.getElementById('accuracy').value = accuracy;

            coordsText.innerText =
                `${lat}, ${lng}`;

            L.marker([lat, lng])
                .addTo(map)
                .bindPopup('Lokasi Anda')
                .openPopup();

            map.setView([lat, lng], 19);

            checkGeofence(
                lat,
                lng,
                accuracy
            );

        },

        (error) => {

            geoStatus.innerHTML =
                'GPS Tidak Aktif';

            geoStatus.className =
                'bg-red-100 text-red-700 text-[10px] px-2 py-1 rounded-full';

        },

        {
            enableHighAccuracy: true,
            timeout: 10000,
            maximumAge: 0
        }

    );

    async function checkGeofence(
        lat,
        lng,
        accuracy
    ) {

        try {

            const response = await fetch(
                '/absensi/check-geofence',
                {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN':
                            '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        LATITUDE: lat,
                        LONGITUDE: lng,
                        ACCURACY: accuracy
                    })
                }
            );

            const data = await response.json();

            distanceText.innerHTML =
                Math.round(data.distance) + ' Meter';

            if (data.inside) {

                geoStatus.innerHTML =
                    'Dalam Radius';

                geoStatus.className =
                    'bg-green-100 text-green-700 text-[10px] px-2 py-1 rounded-full';

                absenBtn.disabled = false;

                absenBtn.innerHTML =
                    'ABSEN';

                absenBtn.className =
                    'py-3 rounded-2xl bg-gradient-to-r from-green-500 to-emerald-600 text-white text-sm font-semibold shadow-md active:scale-95 transition';

            } else {

                geoStatus.innerHTML =
                    'Diluar Radius';

                geoStatus.className =
                    'bg-red-100 text-red-700 text-[10px] px-2 py-1 rounded-full';

                absenBtn.disabled = true;

                absenBtn.innerHTML =
                    'DILUAR AREA';

                absenBtn.className =
                    'py-3 rounded-2xl bg-gray-300 text-white text-sm font-semibold cursor-not-allowed';

            }

        } catch (error) {

            console.error(error);

            geoStatus.innerHTML =
                'Gagal Cek Lokasi';

            geoStatus.className =
                'bg-red-100 text-red-700 text-[10px] px-2 py-1 rounded-full';

        }

    }

    // BUTTON ABSEN
    absenBtn.addEventListener('click', () => {

        absenBtn.innerHTML = 'Memproses...';

        setTimeout(() => {
            absenBtn.innerHTML = 'ABSEN BERHASIL';
        }, 2000);

    });

});

</script>

@endpush
