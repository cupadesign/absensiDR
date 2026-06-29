<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center p-4">

        <div class="w-full max-w-md bg-white rounded-3xl shadow-xl p-8">
            {{-- LOGO RSDS --}}
            <img src="{{ asset('images/logo.jpg') }}"
                alt="RSDS Logo"
                class="w-20 h-20 mx-auto rounded-full mb-4 object-cover">
            {{-- LOGO / TITLE --}}
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Absensi RSDS</h1>
                <p class="text-gray-500 mt-2">Integrasi SIMGOS</p>
            </div>
            {{-- ERROR --}}
            @if(session('error'))

                <div
                    class="
                        bg-red-100
                        border
                        border-red-300
                        text-red-700
                        px-4
                        py-3
                        rounded-xl
                        mb-4
                    "
                >
                    {{ session('error') }}
                </div>

            @endif
            {{-- FORM USERNAME --}}
            <form method="POST" action="/login/check-user" class="space-y-5">
                @csrf

                {{-- USERNAME --}}
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">Username</label>
                    <input
                        type="text"
                        name="USERNAME"
                        placeholder="Masukkan username"
                        class="w-full border border-gray-300 rounded-2xl p-3 focus:outline-none focus:ring-2 focus:ring-green-500"
                        required
                    >
                </div>

                {{-- BUTTON --}}
                <button
                    type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 transition text-white font-semibold py-3 rounded-2xl"
                >
                    Cari Akun
                </button>

            </form>

        </div>

    </div>
</body>
</html>
