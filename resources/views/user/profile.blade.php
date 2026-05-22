@extends('layouts.mobile')

@section('title', 'Profile')

@section('content')

<div class="p-4 space-y-4">

    {{-- PROFILE CARD --}}
    <div
        class="
            bg-gradient-to-r from-green-500 to-emerald-600
            rounded-3xl
            p-6
            text-white
            shadow-xl
        "
    >

        <div class="flex flex-col items-center text-center">

            {{-- FOTO --}}
            <img
                src="{{ asset('images/logo.jpg') }}"
                alt="Profile"
                class="
                    w-24 h-24
                    rounded-full
                    border-4 border-white/30
                    shadow-lg
                    object-cover
                "
            >

            {{-- NAMA --}}
            <h2 class="text-2xl font-bold mt-4">
                Agung Gumelar
            </h2>

            {{-- ROLE --}}
            <p class="text-sm opacity-80 mt-1">
                Dokter Umum
            </p>

            {{-- STATUS --}}
            <div
                class="
                    mt-4
                    bg-white/20
                    backdrop-blur-md
                    px-4 py-2
                    rounded-full
                    text-sm
                "
            >
                Akun Aktif
            </div>

        </div>

    </div>

    {{-- INFORMASI AKUN --}}
    <div
        class="
            bg-white/70
            backdrop-blur-md
            border border-white/40
            rounded-3xl
            p-4
            shadow-lg
        "
    >

        <h3 class="font-bold text-lg text-gray-800 mb-4">
            Informasi Akun
        </h3>

        <div class="space-y-4">

            {{-- ITEM --}}
            <div class="flex justify-between items-center">

                <div class="flex items-center gap-3">

                    <i data-lucide="id-card" class="w-5 h-5 text-green-600"></i>

                    <span class="text-gray-600">
                        NIP
                    </span>

                </div>

                <span class="font-medium text-gray-800">
                    123456789
                </span>

            </div>

            {{-- ITEM --}}
            <div class="flex justify-between items-center">

                <div class="flex items-center gap-3">

                    <i data-lucide="mail" class="w-5 h-5 text-green-600"></i>

                    <span class="text-gray-600">
                        Email
                    </span>

                </div>

                <span class="font-medium text-gray-800">
                    agung@mail.com
                </span>

            </div>

            {{-- ITEM --}}
            <div class="flex justify-between items-center">

                <div class="flex items-center gap-3">

                    <i data-lucide="phone" class="w-5 h-5 text-green-600"></i>

                    <span class="text-gray-600">
                        No HP
                    </span>

                </div>

                <span class="font-medium text-gray-800">
                    08123456789
                </span>

            </div>

            {{-- ITEM --}}
            <div class="flex justify-between items-center">

                <div class="flex items-center gap-3">

                    <i data-lucide="building-2" class="w-5 h-5 text-green-600"></i>

                    <span class="text-gray-600">
                        Unit
                    </span>

                </div>

                <span class="font-medium text-gray-800">
                    Rawat Inap
                </span>

            </div>

        </div>

    </div>

    {{-- SISTEM --}}
    <div
        class="
            bg-white/70
            backdrop-blur-md
            border border-white/40
            rounded-3xl
            p-4
            shadow-lg
        "
    >

        <h3 class="font-bold text-lg text-gray-800 mb-4">
            Informasi Sistem
        </h3>

        <div class="space-y-4">

            {{-- ITEM --}}
            <div class="flex justify-between">

                <span class="text-gray-600">
                    Versi App
                </span>

                <span class="font-medium text-gray-800">
                    v1.0.0
                </span>

            </div>

            {{-- ITEM --}}
            <div class="flex justify-between">

                <span class="text-gray-600">
                    Terakhir Login
                </span>

                <span class="font-medium text-gray-800">
                    Hari Ini
                </span>

            </div>

            {{-- ITEM --}}
            <div class="flex justify-between">

                <span class="text-gray-600">
                    Device
                </span>

                <span class="font-medium text-gray-800">
                    Android
                </span>

            </div>

        </div>

    </div>

    {{-- LOGOUT --}}
    <button
        class="
            w-full
            py-4
            rounded-3xl
            bg-red-500
            text-white
            font-bold
            shadow-lg
            hover:bg-red-600
            transition-all
        "
    >

        Logout

    </button>

</div>

@endsection
