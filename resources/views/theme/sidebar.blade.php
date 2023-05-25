<aside id="default-sidebar"
    class="side-nav left-0 z-40 w-64 transition-transform -translate-x-full sm:translate-x-0 fixed top-4 h-auto"
    aria-label="Sidebar">
    <div
        class="side-nav-style  h-full px-3 py-4 overflow-y-auto border-r-4 border-blue-700 rounded-r-xl bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li class="{{ request()->is('dashboard') ? 'bg-blue-600 rounded-lg' : '' }}">
                <a href="{{ route('dashboard') }}" class="side-nav-link group">
                    <svg aria-hidden="true"
                        class="w-6 h-6 {{ request()->is('dashboard') ? 'text-white' : 'text-black' }} side-nav-icon-svg"
                        fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z"
                            clip-rule="evenodd" />
                    </svg>
                    <span
                        class="{{ request()->is('dashboard') ? 'text-white' : '' }} side-nav-text group-hover:text-white">Dashboard</span>
                </a>
            </li>
            <li class="{{ request()->is('kasir') ? 'bg-blue-600 rounded-lg' : '' }}">
                <a href="{{ route('kasir') }}" class="side-nav-link group">
                    <svg aria-hidden="true"
                        class="w-6 h-6 {{ request()->is('kasir') ? 'text-white' : 'text-black' }} side-nav-icon-svg"
                        fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M6.32 1.827a49.255 49.255 0 0111.36 0c1.497.174 2.57 1.46 2.57 2.93V19.5a3 3 0 01-3 3H6.75a3 3 0 01-3-3V4.757c0-1.47 1.073-2.756 2.57-2.93zM7.5 11.25a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H8.25a.75.75 0 01-.75-.75v-.008zm.75 1.5a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H8.25zm-.75 3a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H8.25a.75.75 0 01-.75-.75v-.008zm.75 1.5a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V18a.75.75 0 00-.75-.75H8.25zm1.748-6a.75.75 0 01.75-.75h.007a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.007a.75.75 0 01-.75-.75v-.008zm.75 1.5a.75.75 0 00-.75.75v.008c0 .414.335.75.75.75h.007a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75h-.007zm-.75 3a.75.75 0 01.75-.75h.007a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.007a.75.75 0 01-.75-.75v-.008zm.75 1.5a.75.75 0 00-.75.75v.008c0 .414.335.75.75.75h.007a.75.75 0 00.75-.75V18a.75.75 0 00-.75-.75h-.007zm1.754-6a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008zm.75 1.5a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75h-.008zm-.75 3a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008zm.75 1.5a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V18a.75.75 0 00-.75-.75h-.008zm1.748-6a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008zm.75 1.5a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75h-.008zm-8.25-6A.75.75 0 018.25 6h7.5a.75.75 0 01.75.75v.75a.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75v-.75zm9 9a.75.75 0 00-1.5 0V18a.75.75 0 001.5 0v-2.25z"
                            clip-rule="evenodd" />
                    </svg>
                    <span
                        class="{{ request()->is('kasir') ? 'text-white' : '' }} side-nav-text group-hover:text-white">Kasir</span>
                </a>
            </li>
            <li class="{{ Request::is('barang', 'barang/*') ? 'bg-blue-600 rounded-lg' : '' }}">
                <a href="{{ route('barang') }}" class="side-nav-link group">
                    <svg aria-hidden="true"
                        class="w-6 h-6 {{ Request::is('barang', 'barang/*') ? 'text-white' : 'text-black' }} side-nav-icon-svg"
                        fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.378 1.602a.75.75 0 00-.756 0L3 6.632l9 5.25 9-5.25-8.622-5.03zM21.75 7.93l-9 5.25v9l8.628-5.032a.75.75 0 00.372-.648V7.93zM11.25 22.18v-9l-9-5.25v8.57a.75.75 0 00.372.648l8.628 5.033z" />
                    </svg>
                    <span
                        class="{{ Request::is('barang', 'barang/*') ? 'text-white' : '' }} side-nav-text group-hover:text-white">Barang</span>
                </a>
            </li>
        </ul>
    </div>

    <div
        class="side-nav-style mt-4 h-full px-3 py-4 overflow-y-auto border-r-4 border-blue-700 rounded-r-xl bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li class="{{ request()->is('logout') ? 'bg-blue-600 rounded-lg' : '' }}">
                <a id="logout" href="#" class="side-nav-link group">
                    <svg aria-hidden="true"
                        class="w-6 h-6 {{ request()->is('logout') ? 'text-white' : 'text-black' }} side-nav-icon-svg"
                        fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm5.03 4.72a.75.75 0 010 1.06l-1.72 1.72h10.94a.75.75 0 010 1.5H10.81l1.72 1.72a.75.75 0 11-1.06 1.06l-3-3a.75.75 0 010-1.06l3-3a.75.75 0 011.06 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <span
                        class="{{ request()->is('logout') ? 'text-white' : '' }} side-nav-text  group-hover:text-white">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
