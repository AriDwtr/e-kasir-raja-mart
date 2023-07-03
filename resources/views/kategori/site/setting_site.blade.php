@extends('theme.master')

@section('konten')
    @php
        $role = DB::Table('t_tipe_akun')
            ->select('m_super_admin')
            ->where('id', Auth::user()->role)
            ->first();
        echo '<input type="hidden" id="role-akun" value=' . $role->m_super_admin . ' />';
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
        <div class="mt-2 p-3">
            <form id="form-site-setting">
                @csrf
                <div class="mb-6">
                    <label for="nama_site" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Site /
                        Website</label>
                    <input type="text" id="nama_site" name="nama_site" value="{{ $data->nama_site }}"
                        class="bg-gray-50 border font-bold border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
            </form>
            <button id="btnEdit" type="button"
                class="inline-flex items-center py-2 pr-3 pl-2 mr-2 bg-blue-500 hover:bg-blue-900 text-white text-sm font-semibold rounded-lg"
                style="">
                <svg aria-hidden="true" class="w-4 h-4 mr-1 fill-current" fill="currentColor" viewBox="0 0 23 23"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z">
                    </path>
                </svg>
                Edit</button>
            <button id="btnSubmit" type="button"
                class="inline-flex items-center py-2 pr-3 pl-2 mr-2 bg-green-500 hover:bg-green-900 text-white text-sm font-semibold rounded-lg"
                style="">
                <svg aria-hidden="true" class="w-4 h-4 mr-1 fill-current" fill="currentColor" viewBox="0 0 23 23"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M9 1.5H5.625c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5zm6.61 10.936a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 14.47a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                        clip-rule="evenodd"></path>
                    <path
                        d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z">
                    </path>
                </svg>
                Simpan</button>
            <button id="btnCancel" type="button"
                class="inline-flex items-center py-2 pr-3 pl-2 mr-2 bg-red-500 hover:bg-red-900 text-white text-sm font-semibold rounded-lg"
                style="">
                <svg aria-hidden="true" class="w-4 h-4 mr-1 fill-current" fill="currentColor" viewBox="0 0 23 23"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                        clip-rule="evenodd"></path>
                </svg>
                Batal</button>
        </div>
    </div>
@endsection

@section('js-include')
    <script>
        $(document).ready(function() {

            OpenPage();

            $('#btnEdit').click(function(e) {
                e.preventDefault();
                $('#nama_site').attr('disabled', false);
                $('#btnSubmit').show();
                $('#btnCancel').show();
                $('#btnEdit').hide();

            });

            $('#btnCancel').click(function(e) {
                e.preventDefault();
                OpenPage();
            });

            $('#btnSubmit').click(function(e) {
                e.preventDefault();
                var formData = $('#form-site-setting').serialize();
                $.ajax({
                    type: "post",
                    url: "{{ route('site.setting.post') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    dataType: "json",
                    success: function(res) {
                        ToastTopEnd.fire({
                            icon: 'success',
                            color: '#00cc00',
                            title: res.success.message,
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    }
                });
            });

            function OpenPage() {
                var role = $('#role-akun').val();
                if (role == 1) {
                    $('#nama_site').attr('disabled', true);
                    $('#btnSubmit').hide();
                    $('#btnCancel').hide();
                    $('#btnEdit').show();
                }else {
                    $('#nama_site').attr('disabled', true);
                    $('#btnSubmit').hide();
                    $('#btnCancel').hide();
                    $('#btnEdit').hide();
                }
            }
        });
    </script>
@endsection
