<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/sweetalert/dist/sweetalert2.min.css') }}"
        integrity="sha256-aUL5sUzmON2yonFVjFCojGULVNIOaPxlH648oUtA/ng=" crossorigin="anonymous">
</head>

<body>
    <div class="bg-no-repeat bg-cover bg-center bg-fixed" style="background-image: url('{{ asset('img/bg.jpg') }}');">
        <div class="min-h-screen py-6 flex flex-col justify-center sm:py-12">
            <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-red-300 to-red-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
                </div>
                <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20 sm:py-10">
                    <div class="max-w-md mx-auto">
                        <div class=" p-5 border-b-2 border-red-300">
                            <h1 class=" font-extrabold text-4xl text-center tracking-widest">
                                {{ Str::upper('e - inventory raja mart') }}</h1>
                        </div>
                        <div class="divide-y divide-black mt-10">
                            <form id="login-form">
                                @csrf
                                @method('POST')
                                <div class="mb-6">
                                    <label for="email"
                                        class="block mb-2 uppercase text-lg tracking-widest font-extrabold text-gray-900 dark:text-white">Email
                                        Akun</label>
                                    <input type="text" name="email_user" id="email" autocomplete="off"
                                        class="bg-gray-50 font-bold focus:bg-white border border-red-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                                        placeholder="Masukan Email">
                                </div>
                                <div class="mb-6">
                                    <label for="password"
                                        class="block mb-2 uppercase text-lg tracking-widest font-extrabold text-gray-900 dark:text-white">Password
                                        Akun</label>
                                    {{-- <input type="password" name="password" id="password" class="bg-gray-50 focus:bg-white border border-red-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="•••••••••"> --}}
                                    <div class="relative">
                                        <input type="password" name="password" id="password"
                                            class="bg-gray-50 font-bold focus:bg-white border border-red-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                                            placeholder="Masukan Password">
                                        <button type="button"
                                            class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 bg-transparent rounded-md hover:text-gray-900"
                                            onclick="togglePasswordVisibility()">
                                            <svg id="password-visibility-icon" aria-hidden="true"
                                                class="w-6 h-6 text-slate-600 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path clip-rule="evenodd" fill-rule="evenodd"
                                                    d="M3.28 2.22a.75.75 0 00-1.06 1.06l14.5 14.5a.75.75 0 101.06-1.06l-1.745-1.745a10.029 10.029 0 003.3-4.38 1.651 1.651 0 000-1.185A10.004 10.004 0 009.999 3a9.956 9.956 0 00-4.744 1.194L3.28 2.22zM7.752 6.69l1.092 1.092a2.5 2.5 0 013.374 3.373l1.091 1.092a4 4 0 00-5.557-5.557z">
                                                </path>
                                                <path
                                                    d="M10.748 13.93l2.523 2.523a9.987 9.987 0 01-3.27.547c-4.258 0-7.894-2.66-9.337-6.41a1.651 1.651 0 010-1.186A10.007 10.007 0 012.839 6.02L6.07 9.252a4 4 0 004.678 4.678z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <button type="submit"
                                    class=" text-white font-bold tracking-wider bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg text-sm w-full sm:w-full px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Login
                                    Sekarang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/sweetalert/dist/sweetalert2.all.min.js') }}"
        integrity="sha256-9AtIfusxXi0j4zXdSxRiZFn0g22OBdlTO4Bdsc2z/tY=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#login-form').on('submit', function(e) {
                e.preventDefault();

                var email = $('#email').val();
                var password = $('#password').val();

                if (email == "" || password == "") {
                    Toast.fire({
                        icon: 'error',
                        color: '#FF0000',
                        title: 'EMAIL DAN PASSWORD KOSONG',
                        position: 'top',
                        width: 'auto',
                    })
                } else {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('login.post') }}",
                        data: $(this).serialize(),
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                Toast.fire({
                                    icon: 'success',
                                    color: '#00cc00',
                                    title: response.message,
                                });
                                setTimeout(function() {
                                    window.location.href = '/dashboard';
                                }, 1500);
                            } else if (response.resemail) {
                                Resetform();
                                Toast.fire({
                                    icon: 'error',
                                    color: '#FF0000',
                                    title: response.message,
                                });
                            } else {
                                Resetform();
                                Toast.fire({
                                    icon: 'error',
                                    color: '#FF0000',
                                    title: response.message,
                                });
                            }
                        }
                    });
                }
            });
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            width: 'auto',
            showConfirmButton: false,
            timer: 2000,
        })

        function togglePasswordVisibility() {
            const passwordToggle = document.getElementById('password-visibility-icon');
            const passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordToggle.innerHTML = `
                <svg id="password-visibility-icon" aria-hidden="true"
                    class="w-6 h-6 text-slate-600 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                    fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 12.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z"></path>
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M.664 10.59a1.651 1.651 0 010-1.186A10.004 10.004 0 0110 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0110 17c-4.257 0-7.893-2.66-9.336-6.41zM14 10a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg>
                `;
            } else {
                passwordInput.type = 'password';
                passwordToggle.innerHTML = `
                <svg id="password-visibility-icon" aria-hidden="true"
                    class="w-6 h-6 text-slate-600 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                    fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M3.28 2.22a.75.75 0 00-1.06 1.06l14.5 14.5a.75.75 0 101.06-1.06l-1.745-1.745a10.029 10.029 0 003.3-4.38 1.651 1.651 0 000-1.185A10.004 10.004 0 009.999 3a9.956 9.956 0 00-4.744 1.194L3.28 2.22zM7.752 6.69l1.092 1.092a2.5 2.5 0 013.374 3.373l1.091 1.092a4 4 0 00-5.557-5.557z"></path>
                    <path d="M10.748 13.93l2.523 2.523a9.987 9.987 0 01-3.27.547c-4.258 0-7.894-2.66-9.337-6.41a1.651 1.651 0 010-1.186A10.007 10.007 0 012.839 6.02L6.07 9.252a4 4 0 004.678 4.678z"></path>
                </svg>
                `;
            }
        }

        function Resetform() {
            $('#email').val('');
            $('#password').val('');
        }
    </script>
</body>

</html>
