<nav
    class="
        fixed bottom-4 left-1/2 -translate-x-1/2
        w-[92%] max-w-md
        bg-white/80 backdrop-blur-xl
        border border-white/40
        rounded-3xl
        shadow-2xl
        px-4 py-3
    "
>

    <div class="flex justify-between items-center">

        {{-- HOME --}}
        <a href="/user" class="text-green-600">
            <i data-lucide="house" class="w-6 h-6"></i>
        </a>

        {{-- HISTORY --}}
        <a href="/user/history" class="text-gray-500">
            <i data-lucide="clipboard-list" class="w-6 h-6"></i>
        </a>

        {{-- ABSEN --}}
        <a
            href="/user/absen"
            class="
                -mt-10
                w-16 h-16
                rounded-full
                bg-gradient-to-r from-green-500 to-emerald-600
                flex items-center justify-center
                shadow-xl shadow-green-300/50
                text-white
            "
        >

            <i data-lucide="fingerprint" class="w-7 h-7"></i>

        </a>

        {{-- INBOX --}}
        <a href="/user/inbox" class="text-gray-500">
            <i data-lucide="inbox" class="w-6 h-6"></i>
        </a>

        {{-- PROFILE --}}
        <a href="/user/profile" class="text-gray-500">
            <i data-lucide="user" class="w-6 h-6"></i>
        </a>

    </div>

</nav>
