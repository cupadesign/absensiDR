<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Login Password</title>

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
                    Login
                </h1>

                <p class="text-gray-500 mt-2">

                    {{ $user->NAMA }}

                </p>

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

            {{-- FORM --}}
            <form
                method="POST"
                action="/login"
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
                        Password
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
                    Login
                </button>

            </form>

        </div>

    </div>

</body>
</html>
