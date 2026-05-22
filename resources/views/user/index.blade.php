@extends('layouts.mobile')
@section('title', 'Dashboard')
@section('content')

<div class="p-4 space-y-4 ">

    {{-- USER CARD --}}
    <div
        class="
            bg-gradient-to-r from-green-500 to-emerald-600
            text-white
            rounded-3xl
            p-5
            shadow-xl
        "
    >

        <div class="flex justify-between items-start">

            <div>

                <p class="text-sm opacity-80">
                    Selamat Datang 👋
                </p>

                <h2 class="text-2xl font-bold">
                    Agung Gumelar
                </h2>

                <p class="text-sm opacity-80 mt-1">
                    Dokter Umum
                </p>

            </div>

            <div
                class="
                    bg-white/20
                    backdrop-blur-md
                    px-3 py-1
                    rounded-full
                    text-xs
                "
            >
                Aktif
            </div>

        </div>

    </div>

    {{-- PROGRESS --}}
    <div
        class="
            bg-white/70 backdrop-blur-md
            border border-white/40
            rounded-3xl
            p-4
            shadow-lg
        "
    >

        <div class="flex justify-between mb-3">

            <h3 class="font-bold text-gray-800">
                Progress Hari Ini
            </h3>

            <span class="text-green-600 font-bold">
                58%
            </span>

        </div>

        {{-- BAR --}}
        <div class="w-full bg-gray-200 rounded-full h-3 mb-4">

            <div
                class="
                    bg-gradient-to-r from-green-500 to-emerald-600
                    h-3 rounded-full
                "
                style="width: 58%"
            ></div>

        </div>

        {{-- STATS --}}
        <div class="grid grid-cols-3 gap-3 text-center">

            <div class="bg-gray-50 rounded-2xl p-3">

                <p class="text-2xl font-bold text-gray-800">
                    12
                </p>

                <p class="text-xs text-gray-500">
                    Ruangan
                </p>

            </div>

            <div class="bg-gray-50 rounded-2xl p-3">

                <p class="text-2xl font-bold text-green-600">
                    7
                </p>

                <p class="text-xs text-gray-500">
                    Sudah
                </p>

            </div>

            <div class="bg-gray-50 rounded-2xl p-3">

                <p class="text-2xl font-bold text-red-500">
                    5
                </p>

                <p class="text-xs text-gray-500">
                    Belum
                </p>

            </div>

        </div>

    </div>

    {{-- RUANGAN --}}
    <div>

        <div class="flex justify-between items-center mb-3">

            <h3 class="font-bold text-gray-800">
                Ruangan Hari Ini
            </h3>

            <a href="#" class="text-sm text-green-600">
                Lihat Semua
            </a>

        </div>

        <div class="space-y-3">

            {{-- CARD --}}
            <a
                href="#"
                class="
                    block
                    bg-white
                    rounded-3xl
                    p-4
                    shadow-sm
                    border border-gray-100
                "
            >

                <div class="flex justify-between items-center">

                    <div>

                        <h4 class="font-bold text-gray-800">
                            ICU
                        </h4>

                        <p class="text-sm text-gray-500">
                            12 Pasien
                        </p>

                    </div>

                    <div
                        class="
                            bg-red-100
                            text-red-600
                            text-xs
                            px-3 py-1
                            rounded-full
                        "
                    >
                        Belum
                    </div>

                </div>

            </a>

            {{-- CARD --}}
            <a
                href="#"
                class="
                    block
                    bg-white
                    rounded-3xl
                    p-4
                    shadow-sm
                    border border-gray-100
                "
            >

                <div class="flex justify-between items-center">

                    <div>

                        <h4 class="font-bold text-gray-800">
                            Mawar 1
                        </h4>

                        <p class="text-sm text-gray-500">
                            8 Pasien
                        </p>

                    </div>

                    <div
                        class="
                            bg-green-100
                            text-green-600
                            text-xs
                            px-3 py-1
                            rounded-full
                        "
                    >
                        Selesai
                    </div>

                </div>

            </a>

        </div>

    </div>

</div>

@endsection
