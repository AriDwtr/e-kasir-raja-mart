<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                            <h1 class=" font-extrabold text-4xl text-center tracking-widest">{{ Str::upper("e - inventory raja mart")  }}</h1>
                        </div>
                        <div class="divide-y divide-black mt-10">
                            <form  action="{{ route('login.post') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="mb-6">
                                    <label for="email" class="block mb-2 text-lg tracking-widest font-extrabold text-gray-900 dark:text-white">Email</label>
                                    <input type="email" name="email_user" id="email" autocomplete="off" class="bg-gray-50 font-bold focus:bg-white border border-red-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="kasir@gmail.com">
                                </div>
                                <div class="mb-6">
                                    <label for="email" class="block mb-2 text-lg tracking-widest font-extrabold text-gray-900 dark:text-white">Password</label>
                                    <input type="password" name="password" id="password" class="bg-gray-50 focus:bg-white border border-red-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="•••••••••">
                                </div>
                                <button type="submit" class=" text-white font-bold tracking-wider bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg text-sm w-full sm:w-full px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Login Sekarang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
