<aside id="default-sidebar"
    class="fixed top-4 h-auto left-0 z-40 w-64 transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto border-r-4 border-blue-600 rounded-r-xl bg-blue-50 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li class="{{ request()->is('dashboard') ? 'bg-blue-600 rounded-lg' : '' }}">
                <a href="{{ route('dashboard') }}"
                    class=" flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-600 dark:hover:bg-white-700 group">
                    <svg aria-hidden="true"
                        class="w-6 h-6 {{ request()->is('dashboard') ? 'text-white' : 'text-black' }} transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z"
                            clip-rule="evenodd" />
                    </svg>
                    <span
                        class="ml-3 {{ request()->is('dashboard') ? 'text-white' : '' }} font-semibold group-hover:text-white">Dashboard</span>
                </a>
            </li>
            <li class="{{ request()->is('logout') ? 'bg-blue-600 rounded-lg' : '' }}">
                <a id="logout" href="#"
                    class=" flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-600 dark:hover:bg-white-700 group">
                    <svg aria-hidden="true"
                        class="w-6 h-6 {{ request()->is('logout') ? 'text-white' : 'text-black' }} transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm5.03 4.72a.75.75 0 010 1.06l-1.72 1.72h10.94a.75.75 0 010 1.5H10.81l1.72 1.72a.75.75 0 11-1.06 1.06l-3-3a.75.75 0 010-1.06l3-3a.75.75 0 011.06 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <span
                        class="ml-3 {{ request()->is('logout') ? 'text-white' : '' }} font-semibold group-hover:text-white">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
