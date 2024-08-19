<header class="relative flex flex-wrap w-full px-6 py-3 text-sm bg-white shadow-md sm:flex-nowrap md:px-12 lg:px-24">
    <nav class="z-10 w-full px-4 mx-auto lg:max-w-screen-lg md:max-w-screen-md sm:max-w-screen-sm sm:flex sm:items-center sm:justify-between">

        <div class="flex items-center justify-between">
            <a class="flex-none text-xl font-semibold focus:outline-none focus:opacity-80"
                href="{{ url('/warga/dashboard') }}" aria-label="Brand">
                <img src="{{ asset('/assets/Logo Desa.svg') }}" alt="" width="100px">
            </a>

            <div class="">
                <button type="button"
                    class="relative flex items-center justify-center text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm hs-collapse-toggle size-7 gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                    id="sidebar-toggle" aria-expanded="false" aria-controls="sidebar" aria-label="Toggle navigation">

                    <!-- Menu Icon (Hamburger) -->
                    <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" x2="21" y1="6" y2="6" />
                        <line x1="3" x2="21" y1="12" y2="12" />
                        <line x1="3" x2="21" y1="18" y2="18" />
                    </svg>
                    <span class="sr-only">Toggle navigation</span>
                </button>


            </div>
        </div>
        <div class="flex items-center justify-center gap-2">
            <span class="text-[#9B1010] text-xs font-medium">Username</span>
            <span class="inline-block size-[46px] bg-gray-100 rounded-full overflow-hidden">
                <svg class="text-gray-300 size-full" width="16" height="16" viewBox="0 0 16 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.62854" y="0.359985" width="15" height="15" rx="7.5" fill="gray"></rect>
                    <path
                        d="M8.12421 7.20374C9.21151 7.20374 10.093 6.32229 10.093 5.23499C10.093 4.14767 9.21151 3.26624 8.12421 3.26624C7.0369 3.26624 6.15546 4.14767 6.15546 5.23499C6.15546 6.32229 7.0369 7.20374 8.12421 7.20374Z"
                        fill="currentColor"></path>
                    <path
                        d="M11.818 10.5975C10.2992 12.6412 7.42106 13.0631 5.37731 11.5537C5.01171 11.2818 4.69296 10.9631 4.42107 10.5975C4.28982 10.4006 4.27107 10.1475 4.37419 9.94123L4.51482 9.65059C4.84296 8.95684 5.53671 8.51624 6.30546 8.51624H9.95231C10.7023 8.51624 11.3867 8.94749 11.7242 9.62249L11.8742 9.93184C11.968 10.1475 11.9586 10.4006 11.818 10.5975Z"
                        fill="currentColor"></path>
                </svg>
            </span>
            <div class="relative inline-flex hs-dropdown">
                <button id="hs-dropdown-default" type="button"
                    class="inline-flex items-center pr-1 text-sm font-medium text-gray-800 shadow-sm hs-dropdown-toggle gap-x-2"
                    aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6" />
                    </svg>
                </button>

                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-fit bg-white shadow-md rounded-lg p-1 space-y-0.5 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700"
                    role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-default">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="flex items-center px-3 py-2 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                            Logout
                        </button>
                    </form>
                </div>
            </div>


            {{-- <div id="hs-navbar-example"
            class="hidden overflow-hidden transition-all duration-300 hs-collapse basis-full grow"
            aria-labelledby="hs-navbar-example-collapse">
            <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
                <a class="font-medium text-blue-500 focus:outline-none" href="#" aria-current="page">Landing</a>
                <a class="font-medium text-gray-600 hover:text-gray-400 focus:outline-none focus:text-gray-400"
                    href="{{ url('/dashboard') }}">Dashboard</a>
                <a class="font-medium text-gray-600 hover:text-gray-400 focus:outline-none focus:text-gray-400"
                    href="{{ url('/permintaan') }}">Permintaan</a>
                <a class="font-medium text-gray-600 hover:text-gray-400 focus:outline-none focus:text-gray-400"
                    href="#">Blog</a>
            </div>
        </div> --}}
    </nav>
    @include('components.sidebar')
</header>

{{-- collapse and hide the sidebar --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarToggleBtn = document.getElementById('sidebar-toggle');
        const sidebar = document.getElementById('sidebar');

        sidebarToggleBtn.addEventListener('click', function() {
            // Toggle the sidebar visibility with sliding animation
            sidebar.classList.toggle('-translate-x-full');
        });
    });
</script>
