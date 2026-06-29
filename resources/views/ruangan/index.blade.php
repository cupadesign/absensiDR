@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<x-card>
    <h2 class="text-2md font-bold mb-2">
        KELOLA RUANGAN
    </h2>
    <div>
    <div class="d-flex w-full bg-gray-200 p-1">
        <form action="/ruangan/store" method="POST" class="d-flex">
            @csrf
            <h3 class="px-2 font-bold">
                Tambah Ruangan
            </h3>
            <input
                type="text"
                name="NAME"
                placeholder="Masukan nama ruangan"
                class="
                    w-2/3
                    px-2
                    py-1
                    border
                    border-green-400
                    rounded
                    bg-white
                "
                required
                >
            <input
                type="text"
                name="LATITUDE"
                placeholder="Masukan nama ruangan"
                title="koordinat latitude - xxx"
                class="
                    w-2/3
                    px-2
                    py-1
                    border
                    border-green-400
                    rounded
                    bg-white
                "
                required
                >
            <input
                type="text"
                name="LONGITUDE"
                placeholder="koordinat xxx - longitude"
                class="
                    w-70%
                    px-2
                    py-1
                    border
                    border-green-400
                    rounded
                    bg-white
                "
                required
                >
            <input
                type="text"
                name="Radius"
                placeholder="Masukan nama ruangan"
                class="
                    w-70%
                    px-2
                    py-1
                    border
                    border-green-400
                    rounded
                    bg-white
                "
                required
                >
        </form>
        <button type="submit" class="bg-green-600 border-solid-1 px-3 py-1 font-bold rounded text-white " title="Tambah Ruangan">
            +
        </button>
    </div>
        <x-table>
            <thead class="bg-green-400">
                <tr class="bg-green-400">
                    <th class="p-2 text-left">ID</th>
                    <th class="p-2 text-left">NAMA</th>
                    <th class="p-2 text-left">RADIUS</th>
                    <th class="p-2 text-left">STATUS</th>
                    <th class="p-2 text-left">EDIT</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rooms as $room)
                    <tr>
                        <td class="p-2 text-left">{{ $room->ID }}</td>
                        <td class="p-2 text-left">{{ $room->NAME }}</td>
                        <td class="p-2 text-left">{{ $room->RADIUS }} Meter</td>
                        <td class="P-2 text-left">
                            <a href="https://www.google.com/maps/search/?api=1&query={{ $room->LATITUDE }},{{ $room->LONGITUDE }}" target="_blank" class="text-blue-500 hover:underline">
                                Rincian Lokasi
                            </a>
                        </td>
                        <td>
                            @if($room->STATUS == 1)
                                <span class="text-green-600">Aktif</span>
                            @else
                                <span class="text-red-600">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>
                            <a href="/ruangan/edit/{{ $room->ID }}" class="bg-blue-500 text-white px-2 py-1.5 rounded hover:bg-blue-600" title="Edit data">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="/ruangan/delete/{{ $room->ID }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Yakin ingin menghapus ruangan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" title="Hapus Ruangan">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-table>
    </div>
</x-card>

<div class="p-4 bg-gray-200 rounded w-md">
    <h3 class="text-lg font-bold mb-2">Data Ruangan</h3>
    <div class="overflow-x-auto">
        <form>
            @csrf
            <div class="d-flex">
                <label class="block">Nama Ruangan</label>
                <input  type="text" name="NAME"  class="w-70% px-2 py-1 border border-green-400 rounded bg-white" required>
            </div>
            <div class="d-flex">
                <label class="block">Nama Ruangan</label>
                <input  type="text" name="NAME"  class="w-70% px-2 py-1 border border-green-400 rounded bg-white" required>
            </div>
            <div class="d-flex">
                <label class="block">Nama Ruangan</label>
                <input  type="text" name="NAME"  class="w-70% px-2 py-1 border border-green-400 rounded bg-white" required>
            </div>
            <div class="d-flex">
                <label class="block">Nama Ruangan</label>
                <input  type="text" name="NAME"  class="w-70% px-2 py-1 border border-green-400 rounded bg-white" required>
            </div>
        </form>
        <x-button>
            Simpan
        </button>
    </div>   
</div>
@endsection
