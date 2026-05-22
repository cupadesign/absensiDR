@extends('layouts.mobile')
@section('title', 'Dashboard')
@section('content')

<div class="p-4">
    <div class="p-4 space-y-4">

        {{-- USER CARD --}}
        <div
            class="bg-white/70 backdrop-blur-md border border-white/40 rounded-3xl p-4 shadow-lg"
        >

            <div class="flex items-center justify-between">

                <div>
                    <h2 class="text-xl font-bold text-gray-800">
                        Selamat Datang
                    </h2>

                    <p class="text-gray-500">
                        Agung Gumelar
                    </p>
                </div>

                {{-- STATUS --}}
                <div
                    class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full"
                >
                    Hadir
                </div>

            </div>

        </div>

        {{-- MAP --}}
        <div
            id="map"
            class="h-64 rounded-3xl overflow-hidden shadow-lg border border-white/40"
        ></div>

        {{-- ABSEN BUTTON --}}
        <button
            id="absenBtn"
            class="
                w-full py-4 rounded-3xl
                bg-gradient-to-r from-green-500 to-emerald-600
                text-white text-lg font-bold
                shadow-lg shadow-green-300/50
                hover:scale-[1.02]
                active:scale-95
                transition-all duration-300
                animate-pulse
            "
        >

            ABSEN SEKARANG

        </button>

        {{-- INFO --}}
        <div
            class="
                bg-white/70 backdrop-blur-md
                border border-white/40
                rounded-3xl p-4
                shadow-lg
            "
        >

            <div class="flex items-center justify-between mb-3">

                <h3 class="font-bold text-lg text-gray-800">
                    Info Absensi
                </h3>

                <div
                    class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full"
                >
                    Dalam Radius
                </div>

            </div>

            <div class="space-y-3 text-gray-700 text-sm">

                <div class="flex items-center gap-2">
                    <i data-lucide="map-pinned" class="w-4 h-4"></i>
                    <span>Ruangan 1</span>
                </div>

                <div class="flex items-center gap-2">
                    <i data-lucide="locate-fixed" class="w-4 h-4"></i>

                    <span id="coords">
                        Mendeteksi lokasi...
                    </span>
                </div>

                <div class="flex items-center gap-2">
                    <i data-lucide="clock-3" class="w-4 h-4"></i>

                    <span id="time"></span>
                </div>

            </div>

        </div>

    </div>

    @endsection


    @push('scripts')

    <script>

    document.addEventListener('DOMContentLoaded', () => {

        lucide.createIcons();

        // MAP
        const map = L.map('map').setView([-6.9175, 107.6191], 18);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);

        const coordsText = document.getElementById('coords');
        const timeText   = document.getElementById('time');
        const absenBtn   = document.getElementById('absenBtn');

        // WAKTU
        timeText.innerText = new Date().toLocaleString();

        // GPS
        navigator.geolocation.getCurrentPosition((position) => {

            const lat = position.coords.latitude;
            const lng = position.coords.longitude;

            coordsText.innerText = `${lat}, ${lng}`;

            L.marker([lat, lng])
                .addTo(map)
                .bindPopup('Lokasi Anda')
                .openPopup();

            map.setView([lat, lng], 19);

        });

        // LOADING BUTTON
        absenBtn.addEventListener('click', () => {

            absenBtn.innerHTML = 'Memproses...';

            absenBtn.classList.remove('animate-pulse');

            setTimeout(() => {
                absenBtn.innerHTML = 'ABSEN BERHASIL';
            }, 2000);

        });

    });

    </script>
</div>

@endsection
