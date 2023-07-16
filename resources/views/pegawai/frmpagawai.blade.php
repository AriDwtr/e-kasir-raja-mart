@extends('theme.master')

@section('konten')
    <div class="flex bg-white h-auto p-2 rounded dark:bg-gray-800">
        <div class=" grid w-full grid-cols-1 gap-y-2 sm:grid-cols-3 sm:gap-3">
            <div class=" col-span-1 p-2">
                <div class="mb-0 ml-3 mt-2 w-full">
                    <a href=" {{ route('pegawai') }}"
                        class="inline-flex items-center py-1 px-4 mr-4 mb-3 bg-orange-500 hover:bg-orange-900 text-white text-sm font-semibold rounded-lg">
                        <svg aria-hidden="true" class="w-4 h-4 mr-1 fill-current" fill="currentColor" viewBox="0 2 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.195 18.44c1.25.713 2.805-.19 2.805-1.629v-2.34l6.945 3.968c1.25.714 2.805-.188 2.805-1.628V8.688c0-1.44-1.555-2.342-2.805-1.628L12 11.03v-2.34c0-1.44-1.555-2.343-2.805-1.629l-7.108 4.062c-1.26.72-1.26 2.536 0 3.256l7.108 4.061z" />
                        </svg>
                    </a>
                </div>
                <div class="flex justify-center">
                    <div class="flex flex-col items-center">
                        <div class="mb-1">
                            @if ($data['type'] == 'add')
                                {{-- <img id="img"
                                    class="rounded-full border-2 border-blue-500 w-40 h-40 transition duration-300 transform hover:scale-110"
                                    src="{{ asset('storage/img/foto/default.png') }}" alt="image description"> --}}
                            @else
                                {{-- <img id="img"
                                    class="rounded-full border-2 border-blue-500 w-40 h-40 transition duration-300 transform hover:scale-110"
<<<<<<< HEAD
                                    src="{{ isset($data['ft_user']) ? asset('storage/img/foto/' . $data['ft_user']) : asset('storage/img/foto/default.png') }}"
                                    alt="image description">
=======
                                    src="{{ asset('storage/img/foto/' . $data['ft_user'] ?? '') }}" alt="image description"> --}}
>>>>>>> cd2c9d08e97a00414f9f6b2bd9c65c86c4efefcf
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-span-2 h-100 p-2 rounded">
                <div class="flex justify-center text-2xl font-extrabold">
                    {{ Str::upper('form pendaftaraan pegawai baru') }}
                </div>
                <div class="mt-1 w-full" id="info-password">
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-300 dark:bg-gray-800 dark:text-green-400"
                        role="alert">
                        <span class="font-medium">Catatan :</span> Password Default Pertama Kali Pengguna adalah <span
                            class="font-bold">123456</span>
                    </div>
                </div>
                <form method="post" id="add-pegawai" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ $data['id'] ?? '' }}">
                    <input type="hidden" name="type" id="type" value="{{ $data['type'] }}">
                    <div class="mt-5">
                        <div class=" mb-3">
                            <label for="nm_user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Pengguna</label>
                            <input type="text" placeholder="Nama Pengguna" id="nm_user" name="nm_user"
                                value="{{ $data['nm_user'] ?? '' }}"
                                class="block font-bold w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <p id="nm_user_error"
                                class="error-message mt-2 text-sm text-red-600 dark:text-red-500 font-medium"></p>
                        </div>
                        <div class=" mb-3">
                            <label for="email_user"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                                Pengguna</label>
                            <input type="text" placeholder="Email Pengguna" id="email_user" name="email_user"
                                value="{{ $data['email_user'] ?? '' }}"
                                class="block font-bold w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <p id="email_user_error"
                                class="error-message mt-2 text-sm text-red-600 dark:text-red-500 font-medium"></p>
                        </div>
                        <div class=" mb-1">
                            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                Kelamin</label>
                            <select id="gender" name="gender"
                                class="block font-semibold w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="L" {{ ($data['gender'] ?? '') == 'L' ? 'selected' : '' }}>Laki - Laki
                                </option>
                                <option value="P" {{ ($data['gender'] ?? '') == 'P' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                        </div>
                        <div class=" mb-3">
                            <label for="tgl_lahir"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ $data['tgl_lahir'] ?? '' }}"
                                class="block font-bold w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class=" mb-3">
                            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role
                                Sistem</label>
                            <select name="role" id="role"
                                class="bg-gray-50 font-bold border text-xs border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <?php
                                $roleQuery = DB::table('t_tipe_akun')->get();
                                foreach ($roleQuery as $roleAkun) {
                                    echo '<option value="' . $roleAkun->id . '" ' . (($data['role'] ?? '') == $roleAkun->id ? 'selected' : '') . '>' . strtoupper($roleAkun->tipe_akun) . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class=" mb-3">
                            <label for="ft_user"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto</label>
                            <input
                                class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                accept="image/png, image/jpeg, image/jpg" id="file" name="ft_user" type="file">
                        </div>
                        <div>
                            <button type="button" id="submit-pegawai"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Buat
                                Pegawai Baru</button>
                            <button type="button" id="password-pegawai" data-modal-target="password-modal"
                                data-modal-toggle="password-modal"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Ubah
                                Password</button>
                        </div>
                    </div>
                </form>
                @include('pegawai.setpassword')
            </div>
        </div>
    </div>
@endsection

@section('js-include')
    <script>
        CekForm();
        $(document).ready(function() {
            var password = $('#password').val();
            var repassword = $('#passwordretype').val();

            $("#submit-pegawai").click(function(e) {
                e.preventDefault();
                var form = document.getElementById('add-pegawai');
                var data = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "{{ route('pegawai.post') }}",
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
                    },
                    error: function(err) {
                        console.log(err);
                        if (err.status === 422) {
                            var err = err.responseJSON;
                            inputValidate(err.errors);
                        }
                    }
                });

            });

            $('#submitPassword').click(function(e) {
                e.preventDefault();
                var data = $('#change-password').serialize();
                $.ajax({
                    type: "POST",
<<<<<<< HEAD
                    url: "{{ route('pegawai.password', ['id' => ($data['id'] ?? '')]) }}",
=======
                    url: "{{ route('profile.update', ['type' => 'password']) }}",
>>>>>>> cd2c9d08e97a00414f9f6b2bd9c65c86c4efefcf
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: data,
                    dataType: "json",
                    success: function(res) {
                        $('[data-modal-hide="password-modal"]').click();
                        $('#change-password')[0].reset();
                        ToastTopEnd.fire({
                            icon: 'success',
                            color: '#00cc00',
                            title: res.success.message,
                        });
                    },
                    error: function(err) {
                        if (err.status === 422) {
                            var err = err.responseJSON;
                            inputValidate(err.errors);
                        }
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

        function passwordType() {
            const passwordToggle = document.getElementById('password-visibility-icon');
            const passwordInput = document.getElementById('password');
            togglePasswordVisibility(passwordInput, passwordToggle);
        }

        function passwordRetype() {
            const passwordToggle = document.getElementById('password-visibility-icon-passwordretype');
            const passwordInput = document.getElementById('passwordretype');
            togglePasswordVisibility(passwordInput, passwordToggle);
        }

        function togglePasswordVisibility(passwordInput, passwordToggle) {
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

        function CekForm() {
            var type = $('#type').val();
            if (type === 'add') {
                $('#password-pegawai').hide();
            } else {
                $('#submit-pegawai').html('Update Data Pegawai');
                $('#info-password').hide();
            }
        }

        function TypeForm() {
            var TypeForm = $('#type').val();
            if (TypeForm === 'view') {
                $('#password-pegawai').show();

            }else if(TypeForm === 'add'){
                $('#password-pegawai').hide();
            }
        }
    </script>
@endsection
