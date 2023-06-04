@extends('theme.master')

@section('konten')
    <div class="flex bg-white h-auto p-2 rounded dark:bg-gray-800">
        <div class=" grid w-full grid-cols-1 gap-y-2 sm:grid-cols-3 sm:gap-3">
            <div class=" col-span-1 p-2">
                <div class="flex justify-center">
                    <div class="flex flex-col items-center">
                        <div class="mb-1">
                            @if (Auth::user()->ft_user == null)
                                <img id="img"
                                    class="rounded-full border-2 border-blue-500 w-40 h-40 transition duration-300 transform hover:scale-110"
                                    src="{{ asset('storage/img/foto/default.png') }}" alt="image description">
                            @else
                                <img id="img"
                                    class="rounded-full border-2 border-blue-500 w-40 h-40 transition duration-300 transform hover:scale-110"
                                    src="{{ asset('storage/img/foto/' . Auth::user()->ft_user) }}" alt="image description">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-span-2 h-100 p-2 rounded">
                <div class="flex justify-center text-2xl font-extrabold">
                    DATA PROFILE
                </div>
                <input type="hidden" name="" id="id-role" value="{{ Auth::user()->role }}">
                <form method="post" id="profile" enctype="multipart/form-data">
                    <div class="mt-5">
                        <div class=" mb-3">
                            <label for="nm_user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Pengguna</label>
                            <input type="text" id="nm_user" name="nm_user" value="{{ Auth::user()->nm_user }}"
                                class="block font-bold w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class=" mb-3">
                            <label for="email_user"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                                Pengguna</label>
                            <input type="text" id="email_user" name="email_user" value="{{ Auth::user()->email_user }}"
                                class="block font-bold w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class=" mb-1">
                            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                Kelamin</label>
                            <select id="gender" name="gender"
                                class="block font-semibold w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="L" {{ Auth::user()->gender == 'L' ? 'selected' : '' }}>Laki - Laki
                                </option>
                                <option value="P" {{ Auth::user()->gender == 'P' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                        </div>
                        <div class=" mb-3">
                            <label for="tgl_lahir"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ Auth::user()->tgl_lahir }}"
                                class="block font-bold w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class=" mb-3">
                            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role
                                Sistem</label>
                            <input type="text" id="role" name="role" value="{{ Str::upper(Auth::user()->role) }}"
                                class="block font-bold w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class=" mb-3">
                            <label for="ft_user"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto</label>
                            <input
                                class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                accept="image/png, image/jpeg, image/jpg" id="file" name="ft_user" type="file">
                        </div>
                        <div>
                            <button type="button" id="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Simpan
                                Profile</button>
                            <button type="button" data-modal-target="password-modal" data-modal-toggle="password-modal"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Ubah
                                Password</button>
                        </div>
                        @include('profile.setpassword')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js-include')
    <script>
        $(document).ready(function() {

            $("#submit").click(function(e) {
                e.preventDefault();
                // var data = $("#profile").serialize();
                var form = document.getElementById('profile');
                var data = new FormData(form);

                $.ajax({
                    type: "POST",
                    url: "{{ route('profile.update') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        ToastTopEnd.fire({
                            icon: 'success',
                            color: '#00cc00',
                            title: res.success.message,
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 800);
                    }
                });

            });

            $('#file').change(function() {
                var file = $(this)[0].files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Memperbarui atribut src dari elemen img
                    $('#img').attr('src', e.target.result);
                }

                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection
