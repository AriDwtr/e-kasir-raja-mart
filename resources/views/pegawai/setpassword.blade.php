<div id="password-modal" tabindex="-1" aria-hidden="true"
    class="modal fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-red-400 bg-transparent hover:bg-red-200 hover:text-red-600 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-hide="password-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Ubah Password</h3>
                <form id="change-password" enctype="multipart/form-data" method="post">
                    <div class="mb-2">
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Baru</label>
                        <div class="relative">
                            <input type="password" name="password" id="password"
                                class=" form-control bg-gray-50 font-bold focus:bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                                placeholder="Masukan Password">
                            <button type="button"
                                class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 bg-transparent rounded-md hover:text-gray-900"
                                onclick="passwordType()">
                                <svg id="password-visibility-icon" aria-hidden="true"
                                    class="w-6 h-6 text-slate-600 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M3.28 2.22a.75.75 0 00-1.06 1.06l14.5 14.5a.75.75 0 101.06-1.06l-1.745-1.745a10.029 10.029 0 003.3-4.38 1.651 1.651 0 000-1.185A10.004 10.004 0 009.999 3a9.956 9.956 0 00-4.744 1.194L3.28 2.22zM7.752 6.69l1.092 1.092a2.5 2.5 0 013.374 3.373l1.091 1.092a4 4 0 00-5.557-5.557z">
                                    </path>
                                    <path
                                        d="M10.748 13.93l2.523 2.523a9.987 9.987 0 01-3.27.547c-4.258 0-7.894-2.66-9.337-6.41a1.651 1.651 0 010-1.186A10.007 10.007 0 012.839 6.02L6.07 9.252a4 4 0 004.678 4.678z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <p id="password_error" class="error-message mt-2 text-sm text-red-600 dark:text-red-500 font-medium"></p>
                    </div>
                    <div class="mb-2">
                        {{-- <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tulis Ulang Password</label> --}}
                        <div class="relative">
                            <input type="password" name="passwordretype" id="passwordretype"
                                class="form-control bg-gray-50 font-bold focus:bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                                placeholder="Tulis Ulang Password">
                            <button type="button"
                                class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 bg-transparent rounded-md hover:text-gray-900"
                                onclick="passwordRetype()">
                                <svg id="password-visibility-icon-passwordretype" aria-hidden="true"
                                    class="w-6 h-6 text-slate-600 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M3.28 2.22a.75.75 0 00-1.06 1.06l14.5 14.5a.75.75 0 101.06-1.06l-1.745-1.745a10.029 10.029 0 003.3-4.38 1.651 1.651 0 000-1.185A10.004 10.004 0 009.999 3a9.956 9.956 0 00-4.744 1.194L3.28 2.22zM7.752 6.69l1.092 1.092a2.5 2.5 0 013.374 3.373l1.091 1.092a4 4 0 00-5.557-5.557z">
                                    </path>
                                    <path
                                        d="M10.748 13.93l2.523 2.523a9.987 9.987 0 01-3.27.547c-4.258 0-7.894-2.66-9.337-6.41a1.651 1.651 0 010-1.186A10.007 10.007 0 012.839 6.02L6.07 9.252a4 4 0 004.678 4.678z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <p id="passwordretype_error" class="error-message mt-2 text-sm text-red-600 dark:text-red-500 font-medium"></p>
                    </div>
                    <div>
                        <button type="button" id="submitPassword"
                            class="w-full py-3 text-white font-bold bg-blue-600 rounded hover:bg-blue-900">Simpan
                            Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
