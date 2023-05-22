@extends('theme.master')

@section('konten')
    <div class="flex-wrap h-auto p-4 rounded bg-slate-100 dark:bg-gray-800">
        <div class=" justify-center py-5 px-3 w-100 rounded-lg h-full  bg-white dark:bg-gray-800">
            <a href=" {{ route('barang') }}"
                class="inline-flex items-center py-1 px-4 mr-4 mb-3 bg-orange-500 hover:bg-orange-900 text-white text-sm font-semibold rounded-lg">
                <svg aria-hidden="true" class="w-4 h-4 mr-1 fill-current" fill="currentColor" viewBox="0 2 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.195 18.44c1.25.713 2.805-.19 2.805-1.629v-2.34l6.945 3.968c1.25.714 2.805-.188 2.805-1.628V8.688c0-1.44-1.555-2.342-2.805-1.628L12 11.03v-2.34c0-1.44-1.555-2.343-2.805-1.629l-7.108 4.062c-1.26.72-1.26 2.536 0 3.256l7.108 4.061z" />
                </svg></a>
            <div class="mb-2">
                <h1 class=" text-xl font-extrabold">{{ $data['header'] }}</h1>
            </div>
            <form id="post-brg">
                <div class="flex w-auto h-auto mb-3 p-2">
                    <button id="btnEdit" type="button"
                        class="inline-flex items-center py-2 pr-3 pl-2 mr-2 bg-blue-500 hover:bg-blue-900 text-white text-sm font-semibold rounded-lg">
                        <svg aria-hidden="true" class="w-4 h-4 mr-1 fill-current" fill="currentColor" viewBox="0 0 23 23"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                        </svg>
                        Edit</button>
                    <button id="btnSubmitEdit" type="button"
                        class="inline-flex items-center py-2 pr-3 pl-2 mr-2 bg-green-500 hover:bg-green-900 text-white text-sm font-semibold rounded-lg">
                        <svg aria-hidden="true" class="w-4 h-4 mr-1 fill-current" fill="currentColor" viewBox="0 0 23 23"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M9 1.5H5.625c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5zm6.61 10.936a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 14.47a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                clip-rule="evenodd" />
                            <path
                                d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                        </svg>
                        Simpan</button>
                    <button id="btnCancelEdit" type="button"
                        class="inline-flex items-center py-2 pr-3 pl-2 mr-2 bg-red-500 hover:bg-red-900 text-white text-sm font-semibold rounded-lg">
                        <svg aria-hidden="true" class="w-4 h-4 mr-1 fill-current" fill="currentColor" viewBox="0 0 23 23"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                                clip-rule="evenodd" />
                        </svg>
                        Batal</button>
                </div>
                <input type="text" name="type" value="{{ $data['type'] }}" hidden>
                <input type="text" name="id" value="{{ $data['id'] }}" hidden>
                <div class="mb-2 p-1">
                    <label for="kd_brg" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Kode
                        Barang</label>
                    <input type="text" name="kd_brg" id="kd_brg" autocomplete="off"
                        value="{{ $data['type'] == 'view' ? $data['detail']['kd_brg'] : '' }}" oninput="formatNumber(this)"
                        class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Masukan Kode Barang">
                    <p id="kd_brg_error" class="error-message mt-2 text-sm text-red-600 dark:text-red-500 font-medium"></p>
                </div>
                <div class="mb-2 p-1">
                    <label for="nm_brg" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Nama
                        Barang</label>
                    <input type="text" name="nm_brg" id="nm_brg" autocomplete="off"
                        value="{{ $data['type'] == 'view' ? $data['detail']['nm_brg'] : '' }}"
                        class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Masukan Nama Barang">
                    <p id="nm_brg_error" class="error-message mt-2 text-sm text-red-600 dark:text-red-500 font-medium"></p>
                </div>
                <div class="grid gap-3 mb-3 md:grid-cols-3">
                    <div class="mb-1 p-1">
                        <label for="ktg_brg" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Kategori
                            Barang</label>
                        <select id="ktg_brg" name="ktg_brg"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Pilih Kategori Produk</option>
                            <option value="999"
                                @if ($data['type'] == 'view') {{ $data['detail']['ktg_brg'] == 999 ? 'selected' : '' }}
                            @else
                            selected @endif>
                                Seluruh Kategori</option>
                        </select>
                    </div>
                    <div class="mb-1 p-1">
                        <label for="stok" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Stok
                            Barang</label>
                        <input type="text" name="stok" id="stok" autocomplete="off"
                            value="{{ $data['type'] == 'view' ? $data['detail']['stok'] : '' }}"
                            oninput="formatNumber(this)"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukan Stok Barang">
                        <p id="stok_error" class="error-message mt-2 text-sm text-red-600 dark:text-red-500 font-medium">
                        </p>

                    </div>
                    <div class="mb-1 p-1">
                        <label for="hrg_brg" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Harga
                            Barang</label>
                        <input type="text" name="hrg_brg" id="hrg_brg" autocomplete="off"
                            value="{{ $data['type'] == 'view' ? $data['detail']['hrg_brg'] : '' }}"
                            oninput="formatCurrency(this)"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukan Harga Barang">
                        <p id="hrg_brg_error"
                            class="error-message mt-2 text-sm text-red-600 dark:text-red-500 font-medium">
                        </p>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="inline-flex rounded-md shadow-sm" role="group">
                        <button type="button" id="btnSubmit"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-400 border border-gray-200 rounded-l-lg hover:bg-green-100 hover:text-green-700 focus:z-10 focus:ring-2 focus:ring-green-700 focus:text-green-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2 fill-current" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z">
                                </path>
                            </svg>
                            Tambahkan Produk
                        </button>
                        <button type="reset" id="btnReset"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-500 border-t border-b rounded-r-lg border-gray-200 hover:bg-red-100 hover:text-red-700 focus:z-10 focus:ring-2 focus:ring-red-700 focus:text-red-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2 fill-current" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z">
                                </path>
                            </svg>
                            Batal dan Reset Form
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js-include')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script>
        $(document).ready(function() {
            var dataType = '{{ $data['type'] }}';

            if (dataType === 'view') {
                inputHandle();
            }

            if (dataType === 'add') {
                $('#btnEdit').hide();
                $('#btnSubmitEdit').hide();
                $('#btnCancelEdit').hide();
            }

            $('#btnEdit').click(function() {
                removeHandle();
                $('#btnEdit').hide();
                $('#btnSubmitEdit').show();
                $('#btnCancelEdit').show();
            });

            $('#btnCancelEdit').click(function() {
                inputHandle();
            });

            $('#btnSubmit, #btnSubmitEdit').click(function(e) {
                e.preventDefault();
                resetValidate();

                var formData = $('#post-brg').serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ route('barang.post') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    dataType: "json",
                    success: function(res) {
                        console.log(res.status);
                        // var res = res.responseJSON;
                        if (res.status === 'add') {
                            $('#post-brg')[0].reset();
                            ToastTopEnd.fire({
                                icon: 'success',
                                color: '#00cc00',
                                title: res.success.message,
                            });
                        } else {
                            ToastTopEnd.fire({
                                icon: 'success',
                                color: '#00cc00',
                                title: res.success.message,
                            });
                            setTimeout(function() {
                                window.location.reload();
                            }, 500);
                        }
                    },
                    error: function(err) {
                        if (err.status === 422) {
                            var err = err.responseJSON;
                            if (err.status == 'validasi') {
                                $('#kd_brg').addClass('border-2 border-red-500 text-red-900');
                                $('#kd_brg_error').text(err.errors.message);
                            }
                            inputValidate(err.errors);
                        }
                    }
                });
            });
        });

        function formatCurrency(input) {
            let formattedValue = numeral(input.value).format('0,0');
            input.value = formattedValue;
        }

        function formatNumber(input) {
            let formattedValue = numeral(input.value).format('0');
            input.value = formattedValue;
        }

        function inputHandle() {
            $('#kd_brg').addClass('bg-slate-300');
            $('#kd_brg').prop('readonly', true);

            $('#nm_brg').addClass('bg-slate-300');
            $('#nm_brg').prop('disabled', true);

            $('#ktg_brg').addClass('bg-slate-300');
            $('#ktg_brg').prop('disabled', true);

            $('#stok').addClass('bg-slate-300');
            $('#stok').prop('readonly', true);

            $('#hrg_brg').addClass('bg-slate-300');
            $('#hrg_brg').prop('disabled', true);

            $('#btnEdit').show();

            $('#btnSubmit').hide();
            $('#btnReset').hide();

            $('#btnSubmitEdit').hide();
            $('#btnCancelEdit').hide();
        }

        function removeHandle() {
            $('#nm_brg').removeClass('bg-slate-300');
            $('#nm_brg').prop('disabled', false);

            $('#ktg_brg').removeClass('bg-slate-300');
            $('#ktg_brg').prop('disabled', false);


            $('#hrg_brg').removeClass('bg-slate-300');
            $('#hrg_brg').prop('disabled', false);
        }
    </script>
@endsection
