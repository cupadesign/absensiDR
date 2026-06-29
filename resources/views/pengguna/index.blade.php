@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<x-card>
    <h2 class="text-2md font-bold">
        DATA PENGGUNA
    </h2>
    <div>
        <a href="/pengguna/1">Kelola Pengguna</a>
        <a href="/pengguna/2">Tambah Pengguna</a>
        <div>
            <x-table>
                <thead>
                    <tr class="bg-green-400">
                        <th class="p-2 text-left">ID</th>
                        <th class="p-2 text-left">USERNAME</th>
                        <th class="p-2 text-left">NAMA</th>
                        <th class="p-2 text-left">ROLE</th>
                        <th class="p-2 text-left">AKSES</th>
                        <th class="p-2 text-left">STATUS</th>
                        <th class="p-2 text-left">EDIT</th>
                    </tr>
                    {{-- Filter --}}
                    <tr class="bg-green-400">
                        <th></th>
                        <th class="text-left py-1">
                            <form action="/pengguna" method="GET">
                                <input
                                    type="text"
                                    name="search"
                                    placeholder="Cari username..."
                                    class="
                                        w-full
                                        px-2
                                        py-1
                                        border
                                        border-green-400
                                        rounded
                                        bg-white
                                    "
                                >
                            </form>
                        </th>
                        <th class="text-left py-1">
                            <form action="/pengguna" method="GET">
                                <input
                                type="text"
                                name="search"
                                placeholder="Cari username..."
                                class="
                                        w-full
                                        px-2
                                        py-1
                                        border
                                        border-green-400
                                        rounded
                                        bg-white
                                        "
                                        >
                            </form>
                        </th>
                        <th class="text-left py-1">
                            [admin][user]
                        </th>
                        <th></th>
                        <th class="text-left py-1">[aktif][Tidak]</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($users as $user)

                        <tr>

                            <td class="p-2">
                                {{ $user->ID }}
                            </td>

                            <td class="p-2">
                                {{ $user->USERNAME }}
                            </td>

                            <td class="p-2">
                                {{ $user->NAMA }}
                            </td>

                            <td class="p-2">
                                {{ $user->ROLE }}
                            </td>

                            <td class="p-2">
                                -
                            </td>

                            <td class="p-2">
                                {{ $user->IS_ACTIVE ? 'Aktif' : 'Nonaktif' }}
                            </td>

                            <td class="p-2">
                                Edit
                            </td>

                        </tr>

                    @endforeach

                </tbody>
            </x-table>
        </div>
        <div>
            <h2 class="font-bold p-4">Tambah Pengguna</h2>
            <form action="/pengguna/store" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Nama" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Tambah</button>
            </form>
        </div>
    </div>
</x-card>

@endsection
