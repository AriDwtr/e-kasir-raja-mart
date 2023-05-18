<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/icon/icon.png') }}">
    <title>E-Kasir</title>
    <script>
         history.pushState(null, document.title, location.href);
        history.back();
        history.forward();
        window.onpopstate = function() {
            history.go(1);
        };
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('css')
    <link rel="stylesheet" href="{{ asset('assets/sweetalert/dist/sweetalert2.min.css') }}"
        integrity="sha256-aUL5sUzmON2yonFVjFCojGULVNIOaPxlH648oUtA/ng=" crossorigin="anonymous">
</head>

<body class=" bg-slate-700">
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="items-center fixed p-2 mt-2 ml-3 bg-red-600 text-white text-sm rounded-lg sm:hidden hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    @include('theme.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="body-content">
            @yield('konten')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/sweetalert/dist/sweetalert2.all.min.js') }}"
        integrity="sha256-9AtIfusxXi0j4zXdSxRiZFn0g22OBdlTO4Bdsc2z/tY=" crossorigin="anonymous"></script>
    @yield('js-include')
    <script>
        $('#logout').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('logout') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    ToastTop.fire({
                        icon: 'success',
                        color: '#00cc00',
                        title: response.message,
                    });
                    setTimeout(function() {
                        window.location.href = '/login';
                    }, 1500);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        const ToastTop = Swal.mixin({
            toast: true,
            position: 'top',
            width: 'auto',
            showConfirmButton: false,
            timer: 2000,
        });
    </script>
</body>

</html>
