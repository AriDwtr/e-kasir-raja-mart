<div class="bg-white h-auto p-2 rounded dark:bg-gray-800">
    <div class="mb-2 font-extrabold font-mono text-xl ml-3 w-full">
        Data Extra
    </div>
    <div class="grid w-full grid-cols-2 gap-2 sm:grid-cols-5">
        <div class=" col-span-1 p-2">
            <a href="{{ route('kategori.produk') }}"
                class="text-white w-full justify-center bg-blue-600 hover:bg-[#24292F]/90 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-2 py-3 text-center inline-flex items-center dark:focus:ring-gray-500 dark:hover:bg-[#050708]/30 mr-2 mb-2">
                <svg aria-hidden="true"
                    class="w-6 h-6 {{ Request::is('manajemen', 'manajemen/*') ? 'text-white' : 'text-black' }} text-black side-nav-icon-svg"
                    fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M18.75 12.75h1.5a.75.75 0 000-1.5h-1.5a.75.75 0 000 1.5zM12 6a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 0112 6zM12 18a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 0112 18zM3.75 6.75h1.5a.75.75 0 100-1.5h-1.5a.75.75 0 000 1.5zM5.25 18.75h-1.5a.75.75 0 010-1.5h1.5a.75.75 0 010 1.5zM3 12a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 013 12zM9 3.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5zM12.75 12a2.25 2.25 0 114.5 0 2.25 2.25 0 01-4.5 0zM9 15.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z" />
                </svg>
                <span class="side-nav-text group-hover:text-white">Kategori Barang</span>
            </a>
        </div>
    </div>
</div>
