@extends('layouts.mobile')
@section('title', 'Dashboard')
@section('content')

<div class="p-4">
    
    {{-- History Visite --}}
    <div>

        <div class="flex justify-between items-center mb-3">
            <h3 class="font-bold text-gray-800">
                Ruangan Hari Ini
            </h3>
        </div>

        <div class="space-y-3">

            {{-- CARD --}}
            <a href="#" class=" block bg-white rounded-2xl px-4 py-2 shadow-sm border border-gray-100">
                <div class="flex justify-between items-center">
                    <div>
                        <h4 class="font-bold text-gray-800">CT. Nama Pasien</h4>
                        <p class="text-sm text-gray-500">Nama Ruangan </p>
                        <p class="text-sm text-gray-500">00/00/0000 00:00 </p>
                    </div>
                    <div class=" bg-green-100 text-green-600 text-xs px-3 py-1 rounded-full">Sudah</div>
                </div>
            </a>

        </div>

    </div>
</div>

@endsection
