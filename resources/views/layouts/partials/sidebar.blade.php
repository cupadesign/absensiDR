<aside
    class="group bg-white shadow min-h-screen w-20 hover:w-64 duration-300 overflow-hidden border-r border-gray-200"
>

    <ul class="mt-2 space-y-2 px-2">

        {{-- DASHBOARD --}}
        <li>
            <a
                href="/dashboard"
                class="flex items-center justify-center group-hover:justify-start gap-4 h-14 px-4 rounded-xl hover:bg-green-50 transition-all duration-300"
            >

                <i class="fa-solid fa-house text-xl text-green-700 w-6 text-center"></i>

                <span
                    class="hidden group-hover:block whitespace-nowrap font-medium"
                >
                    Dashboard
                </span>

            </a>
        </li>
        
        {{-- ABSENSI --}}
        <li>
            <a
                href="/absensi"
                class="flex items-center justify-center group-hover:justify-start gap-4 h-14 px-4 rounded-xl hover:bg-green-50 transition-all duration-300"
            >

                <i class="fa-solid fa-clipboard-check text-xl text-green-700 w-6 text-center"></i>

                <span
                    class="hidden group-hover:block whitespace-nowrap font-medium"
                >
                    Absensi
                </span>

            </a>
        </li>

        {{-- KELOLA RUANGAN --}}
        <li>
            <a
                href="/ruangan"
                class="flex items-center justify-center group-hover:justify-start gap-4 h-14 px-4 rounded-xl hover:bg-green-50 transition-all duration-300"
            >

                <i class="fa-solid fa-windows text-xl text-green-700 w-6 text-center"></i>

                <span
                    class="hidden group-hover:block whitespace-nowrap font-medium font-bold"
                >
                    RUANGAN
                </span>

            </a>
        </li>

        {{-- USERS --}}
        <li>
            <a
                href="/pengguna"
                class="flex items-center justify-center group-hover:justify-start gap-4 h-14 px-4 rounded-xl hover:bg-green-50 transition-all duration-300">

                <i class="fa-solid fa-user-group text-xl text-green-700 w-6 text-center"></i>

                <span
                    class="hidden group-hover:block whitespace-nowrap font-medium"
                >
                    Users
                </span>

            </a>
        </li>
        <div class="flex justify-end mb-4">

            <form action="/logout" method="POST" onsubmit="return confirm('Yakin ingin logout?')" >
                @csrf

                <button
                    type="submit"
                    class="
                        flex
                        items-center
                        gap-2
                        px-4
                        py-2
                        bg-red-500
                        hover:bg-red-600
                        text-white
                        rounded-xl
                        shadow
                        transition-all
                    "
                >

                    <i data-lucide="log-out"></i>

                    Logout

                </button>

            </form>

        </div>

    </ul>

</aside>
