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

        {{-- USERS --}}
        <li>
            <a
                href="/users"
                class="flex items-center justify-center group-hover:justify-start gap-4 h-14 px-4 rounded-xl hover:bg-green-50 transition-all duration-300"
            >

                <i class="fa-solid fa-user-group text-xl text-green-700 w-6 text-center"></i>

                <span
                    class="hidden group-hover:block whitespace-nowrap font-medium"
                >
                    Users
                </span>

            </a>
        </li>

    </ul>

</aside>
