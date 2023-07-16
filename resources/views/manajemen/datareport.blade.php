<div class="bg-white h-auto p-2 rounded dark:bg-gray-800">
    <div class="mb-2 font-extrabold font-mono text-xl ml-3 w-full">
        Data Report
    </div>
    <div class="grid w-full grid-cols-2 gap-2 sm:grid-cols-5">
        <div class=" col-span-1 p-2">
            <a href="{{ route('report.index') }}"
                class="text-white w-full justify-center bg-fuchsia-500 hover:bg-[#24292F]/90 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-2 py-3 text-center inline-flex items-center dark:focus:ring-gray-500 dark:hover:bg-[#050708]/30 mr-2 mb-2">
                <svg aria-hidden="true"
                    class="w-6 h-6 {{ Request::is('manajemen', 'manajemen/*') ? 'text-white' : 'text-black' }} text-black side-nav-icon-svg"
                    fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z" clip-rule="evenodd" />
                </svg>
                <span class="side-nav-text group-hover:text-white">Laporan Transaksi</span>
            </a>
        </div>
    </div>
</div>
