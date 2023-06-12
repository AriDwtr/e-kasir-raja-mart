<div class="bg-white h-auto p-2 rounded dark:bg-gray-800">
    <div class="mb-2 font-extrabold font-mono text-xl ml-3 w-full">
        Data Master
    </div>
    <div class="grid w-full grid-cols-2 gap-2 sm:grid-cols-5">
        <div class=" col-span-1 p-2">
            <a href="{{ route('barang') }}"
                class="text-white w-full justify-center bg-red-600 hover:bg-[#24292F]/90 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-2 py-3 text-center inline-flex items-center dark:focus:ring-gray-500 dark:hover:bg-[#050708]/30 mr-2 mb-2">
                <svg aria-hidden="true"
                    class="w-6 h-6 {{ Request::is('manajemen', 'manajemen/*') ? 'text-white' : 'text-black' }} text-black side-nav-icon-svg"
                    fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 6.375c0 2.692-4.03 4.875-9 4.875S3 9.067 3 6.375 7.03 1.5 12 1.5s9 2.183 9 4.875z" />
                    <path
                        d="M12 12.75c2.685 0 5.19-.586 7.078-1.609a8.283 8.283 0 001.897-1.384c.016.121.025.244.025.368C21 12.817 16.97 15 12 15s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.285 8.285 0 001.897 1.384C6.809 12.164 9.315 12.75 12 12.75z" />
                    <path
                        d="M12 16.5c2.685 0 5.19-.586 7.078-1.609a8.282 8.282 0 001.897-1.384c.016.121.025.244.025.368 0 2.692-4.03 4.875-9 4.875s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.284 8.284 0 001.897 1.384C6.809 15.914 9.315 16.5 12 16.5z" />
                    <path
                        d="M12 20.25c2.685 0 5.19-.586 7.078-1.609a8.282 8.282 0 001.897-1.384c.016.121.025.244.025.368 0 2.692-4.03 4.875-9 4.875s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.284 8.284 0 001.897 1.384C6.809 19.664 9.315 20.25 12 20.25z" />
                </svg>
                <span class="side-nav-text group-hover:text-white">Data Barang</span>
            </a>
        </div>
    </div>
</div>
