<div id="sidebar"
    class="fixed top-0 bottom-0 left-0 z-0 w-1/5 pt-32 pb-8 overflow-y-auto transition-transform duration-300 transform -translate-x-full bg-white border-gray-200 border-e ">
    <nav class="flex flex-col flex-wrap w-full p-4">
        <ul class="space-y-1.5">



            <li>
                <a class="flex items-center gap-x-2 py-2 px-2.5 bg-gray-100 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                    href="#">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <polyline points="9 22 9 12 15 12 15 22" />
                    </svg>
                    Pengajuan Pindah Masuk
                </a>
            </li>

            <li><a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                    href="#">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                        <line x1="16" x2="16" y1="2" y2="6" />
                        <line x1="8" x2="8" y1="2" y2="6" />
                        <line x1="3" x2="21" y1="10" y2="10" />
                        <path d="M8 14h.01" />
                        <path d="M12 14h.01" />
                        <path d="M16 14h.01" />
                        <path d="M8 18h.01" />
                        <path d="M12 18h.01" />
                        <path d="M16 18h.01" />
                    </svg>
                    Pengajuan Pindah Keluar
                </a></li>
            <li><a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm bg-red-800 text-white rounded-lg hover:bg-gray-100 hover:text-black"
                    href="#">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                    </svg>
                    Pengajuan Ubah Status Pekerjaan
                </a>
            </li>

            <li>
                <button type="button"
                    class="relative flex items-center justify-center w-full text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm hs-collapse-toggle size-7 gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                    id="sidebar-close" aria-expanded="false" aria-controls="sidebar" aria-label="Toggle navigation">

                    <svg class=" hs-collapse-open:block shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>

                    <span class="sr-only">Close sidebar</span>
                </button>
            </li>
        </ul>
    </nav>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const sidebarCloseBtn = document.getElementById('sidebar-close');

        // Close sidebar when the close button is clicked
        sidebarCloseBtn.addEventListener('click', function() {
            sidebar.classList.add('-translate-x-full');
        });
    });
</script>
