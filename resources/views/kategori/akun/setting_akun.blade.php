@extends('theme.master')

@section('konten')
    @php
        $role = DB::Table('t_tipe_akun')->select('m_super_admin')->where('id', Auth::user()->role)->first();
        echo '<input type="hidden" id="role-akun" value='.$role->m_super_admin.' />';
    @endphp
    <div class="bg-white h-auto p-2 rounded dark:bg-gray-800">
        <div class="mb-1 ml-3 mt-5 w-full">
            <a href=" {{ route('manajemen') }}"
                class="inline-flex items-center py-1 px-4 mr-4 mb-3 bg-orange-500 hover:bg-orange-900 text-white text-sm font-semibold rounded-lg">
                <svg aria-hidden="true" class="w-4 h-4 mr-1 fill-current" fill="currentColor" viewBox="0 2 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.195 18.44c1.25.713 2.805-.19 2.805-1.629v-2.34l6.945 3.968c1.25.714 2.805-.188 2.805-1.628V8.688c0-1.44-1.555-2.342-2.805-1.628L12 11.03v-2.34c0-1.44-1.555-2.343-2.805-1.629l-7.108 4.062c-1.26.72-1.26 2.536 0 3.256l7.108 4.061z" />
                </svg>
            </a>
        </div>
        <div class="mt-2 pl-1">
            <button id="add-new-tipe" data-modal-target="defaultModal" data-modal-toggle="defaultModal" type="button"
                class="text-white bg-green-400 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg aria-hidden="true" class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 25 25"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z"
                        clip-rule="evenodd" />
                </svg>
                Tambah Akun
            </button>
            <div class="modal">
                <div id="defaultModal" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <form id="form-tipe-akun" method="post" enctype="multipart/form-data" autocomplete="off">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <div class="p-6 space-y-6">
                                    @csrf
                                    <div class="mt-2">
                                        <input type="text" name="tipe_akun" id="tipe_akun" value=""
                                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm font-bold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Masukan Tipe Pengguna Baru" required>
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div
                                    class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <button id="post-akun-baru" type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buat
                                        Tipe Akun Baru</button>
                                    <button id="exit-button" data-modal-hide="defaultModal" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 rounded-l-lg">
                                {{ Str::upper('jenis akun') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ Str::title('hak akses akun') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ Str::title('action') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            <tr class="bg-white dark:bg-gray-800">
                                <form class="update-form" method="post" id="data-tipe-akun-{{ $data->id }}"
                                    action="{{ route('akun.setting.update', ['type' => 'update']) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="id" name="id_akun" value="{{ $data->id }}">
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ Str::upper($data->tipe_akun) }}
                                    </td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div>
                                            <label class="relative inline-flex items-center mb-4 cursor-pointer">
                                                <input type="checkbox" value="1" name="m_super_admin"
                                                    class="sr-only peer" {{ $data->m_super_admin == 1 ? 'checked' : '' }}>
                                                <div
                                                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                                </div>
                                                <span
                                                    class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ Str::upper('super admin / unlock all menu access') }}</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="relative inline-flex items-center mb-4 cursor-pointer">
                                                <input type="checkbox" value="1" class="sr-only peer" name="m_admin"
                                                    {{ $data->m_admin == 1 ? 'checked' : '' }}>
                                                <div
                                                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                                </div>
                                                <span
                                                    class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ Str::upper('admin / limited access') }}</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="relative inline-flex items-center mb-4 cursor-pointer">
                                                <input type="checkbox" value="1" class="sr-only peer" name="m_pegawai"
                                                    {{ $data->m_pegawai == 1 ? 'checked' : '' }}>
                                                <div
                                                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                                </div>
                                                <span
                                                    class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ Str::upper('employee/ Only Cashier access') }}</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <button id="update-tipe-akun-{{ $data->id }}" type="button"
                                            class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg px-2 py-1 text-center text-xs inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg aria-hidden="true" class="w-5 h-5 mr-2 -ml-1" fill="currentColor"
                                                viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.755 10.059a7.5 7.5 0 0112.548-3.364l1.903 1.903h-3.183a.75.75 0 100 1.5h4.992a.75.75 0 00.75-.75V4.356a.75.75 0 00-1.5 0v3.18l-1.9-1.9A9 9 0 003.306 9.67a.75.75 0 101.45.388zm15.408 3.352a.75.75 0 00-.919.53 7.5 7.5 0 01-12.548 3.364l-1.902-1.903h3.183a.75.75 0 000-1.5H2.984a.75.75 0 00-.75.75v4.992a.75.75 0 001.5 0v-3.18l1.9 1.9a9 9 0 0015.059-4.035.75.75 0 00-.53-.918z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            {{ Str::upper('update akun') }}
                                        </button>
                                        <button id="delete-tipe-akun-{{ $data->id }}" data-id="{{ $data->id }}" type="button"
                                            class="delete-tipe-akun text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg px-2 py-1 text-center text-xs inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg aria-hidden="true" class="w-5 h-5 mr-2 -ml-1" fill="currentColor"
                                                viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            {{ Str::upper('Hapus akun') }}
                                        </button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

@section('js-include')
    <script>
        $(document).ready(function() {
            RoleAkun();

            $('#post-akun-baru').click(function(e) {
                e.preventDefault();
                var formData = $('#form-tipe-akun').serialize();
                $.ajax({
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('akun.setting.post') }}",
                    data: formData,
                    dataType: "json",
                    success: function(res) {
                        // console.log(res);
                        ToastTopEnd.fire({
                            icon: 'success',
                            color: '#00cc00',
                            title: res.success.message,
                        });
                        $('#exit-button').click();
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    },
                    error: function(err) {
                        // console.log(err);
                        ToastTop.fire({
                            icon: 'error',
                            color: '#fc0f03',
                            title: err.responseJSON.errors.message.tipe_akun[0],
                        });
                        $('#exit-button').click();
                    }
                });
            });

            $('button[id^="update-tipe-akun-"]').click(function(e) {
                e.preventDefault();
                // var formData = $('form[id^="data-tipe-akun-"]').serialize();
                var form = $(this).closest('tr').find('form');
                var url = form.attr('action');
                var formData = new FormData(form[0]);
                $.ajax({
                    type: "post",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        // console.log(res);
                        ToastTopEnd.fire({
                            icon: 'success',
                            color: '#00cc00',
                            title: res.success.message,
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    },
                    error: function(err) {

                    }
                });
            });

            const deleteButtons = document.querySelectorAll('.delete-tipe-akun');
            deleteButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const id = button.dataset.id;
                    const url =
                        `{{ route('akun.setting.update', ['type' => 'delete', 'id' => ':id']) }}`;
                    const finalUrl = url.replace(':id', id);
                    Swal.fire({
                        title: 'Apakah Yakin Ingin Menghapus Akun?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus Tipe Akun!',
                        cancelButtonText: 'Batal',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: finalUrl,
                                type: 'post',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                success: function(res) {
                                    Swal.fire(
                                        'BERHASIL',
                                        'Berhasil Menghapus Tipe Akun',
                                        'success'
                                    )
                                    setTimeout(function() {
                                        location.reload();
                                    }, 1500);
                                }
                            });
                        }
                    })
                });
            });

            function RoleAkun() {
                var role = $('#role-akun').val();
                if (role != 1) {
                    $('#add-new-tipe').hide();
                    $('button[id^="update-tipe-akun-"]').hide();
                    $('button[id^="delete-tipe-akun-"]').hide();
                }
            }
        });
    </script>
@endsection
