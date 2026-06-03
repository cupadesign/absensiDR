<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Buat Password</title>

    @vite('resources/css/app.css')

</head>

<body class="bg-gray-100">

    <div
        class="
            min-h-screen
            flex
            items-center
            justify-center
            p-4
        "
    >

        <div
            class="
                w-full
                max-w-md
                bg-white
                rounded-3xl
                shadow-xl
                p-8
            "
        >

            {{-- TITLE --}}
            <div class="text-center mb-8">

                <h1
                    class="
                        text-3xl
                        font-bold
                        text-gray-800
                    "
                >
                    Buat Password
                </h1>

                <p class="text-gray-500 mt-2">

                    {{ $user->NAMA }}

                </p>

            </div>

            {{-- FORM --}}
            <form
                method="POST"
                action="/create-password"
                class="space-y-5"
            >

                @csrf

                <input
                    type="hidden"
                    name="USERNAME"
                    value="{{ $user->USERNAME }}"
                >

                {{-- PASSWORD --}}
                <div>

                    <label
                        class="
                            block
                            mb-2
                            text-sm
                            font-semibold
                            text-gray-700
                        "
                    >
                        Password Baru
                    </label>

                    <input
                        type="PASSWORD"
                        name="PASSWORD"
                        class="
                            w-full
                            border
                            border-gray-300
                            rounded-2xl
                            p-3
                        "
                        required
                    >

                </div>

                {{-- KONFIRMASI --}}
                <div>

                    <label
                        class="
                            block
                            mb-2
                            text-sm
                            font-semibold
                            text-gray-700
                        "
                    >
                        Konfirmasi Password
                    </label>

                    <input
                        type="password"
                        name="PASSWORD_confirmation"
                        class="
                            w-full
                            border
                            border-gray-300
                            rounded-2xl
                            p-3
                        "
                        required
                    >

                </div>

                {{-- BUTTON --}}
                <button
                    type="submit"
                    class="
                        w-full
                        bg-green-600
                        hover:bg-green-700
                        text-white
                        font-semibold
                        py-3
                        rounded-2xl
                    "
                >
                    Simpan Password
                </button>

            </form>

        </div>

    </div>

</body>
</html>
