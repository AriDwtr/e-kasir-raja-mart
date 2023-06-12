<aside id="default-sidebar"
    class="side-nav left-0 z-40 w-64 transition-transform -translate-x-full sm:translate-x-0 fixed top-4 h-auto"
    aria-label="Sidebar">
    <div
        class="side-nav-style h-full px-3 py-4 overflow-y-auto border-r-4 border-blue-700 rounded-r-xl bg-white dark:bg-gray-800">
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
        </ul>
    </div>

    <div
        class="side-nav-style mt-4 h-full px-3 py-4 overflow-y-auto border-r-4 border-blue-700 rounded-r-xl bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li class="{{ Request::is('manajemen', 'manajemen/*') ? 'bg-blue-600 rounded-lg' : '' }}">
                <a href="{{ route('manajemen') }}" class="side-nav-link group">
                    <svg aria-hidden="true"
                        class="w-6 h-6 {{ Request::is('manajemen', 'manajemen/*') ? 'text-white' : 'text-black' }} text-black side-nav-icon-svg"
                        fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.584 2.376a.75.75 0 01.832 0l9 6a.75.75 0 11-.832 1.248L12 3.901 3.416 9.624a.75.75 0 01-.832-1.248l9-6z" />
                        <path fill-rule="evenodd" d="M20.25 10.332v9.918H21a.75.75 0 010 1.5H3a.75.75 0 010-1.5h.75v-9.918a.75.75 0 01.634-.74A49.109 49.109 0 0112 9c2.59 0 5.134.202 7.616.592a.75.75 0 01.634.74zm-7.5 2.418a.75.75 0 00-1.5 0v6.75a.75.75 0 001.5 0v-6.75zm3-.75a.75.75 0 01.75.75v6.75a.75.75 0 01-1.5 0v-6.75a.75.75 0 01.75-.75zM9 12.75a.75.75 0 00-1.5 0v6.75a.75.75 0 001.5 0v-6.75z" clip-rule="evenodd" />
                        <path d="M12 7.875a1.125 1.125 0 100-2.25 1.125 1.125 0 000 2.25z" />
                    </svg>
                    <span
                        class="{{ Request::is('manajemen', 'manajemen/*') ? 'text-white' : '' }} side-nav-text group-hover:text-white">Management Sistem</span>
                </a>
            </li>
        </ul>
    </div>

    <div
        class="side-nav-style mt-4 h-full px-3 py-4 overflow-y-auto border-r-4 border-blue-700 rounded-r-xl bg-white dark:bg-gray-800">
        <div class="flex justify-center">
            <div class="flex flex-col items-center">
                <div class="mb-1">
                    @if (Auth::user()->ft_user == null)
                        <img class="rounded-full border-2 border-blue-500 w-20 h-20"
                            src="{{ asset('storage/img/foto/default.png') }}" alt="image description">
                    @else
                        <img class="rounded-full border-2 border-blue-500 w-20 h-20"
                            src="{{ asset('storage/img/foto/' . Auth::user()->ft_user) }}" alt="image description">
                    @endif
                </div>

                <div class="mb-2">
                    <a href="{{ route('profile') }}"
                        class="text-center text-base font-extrabold w-full hover:text-blue-700">
                        hai, {{ Str::upper(explode(' ', Auth::user()->nm_user)[0]) }}
                    </a>
                </div>

                <div>
                    <a id="logout" href="#"
                        class="inline-block border-2 border-red-500 bg-red-500 hover:bg-white hover:border-red-600 hover:text-red-600 text-white font-bold py-1 px-2 rounded text-xs">
                        Keluar
                    </a>
                </div>
            </div>
        </div>
    </div>
</aside>
