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
        <div class="grid p-3 grid-cols-1 gap-3 md:grid-cols-6 md:gap-3">
            <div class=" col-span-2 p-5 bg-slate-300 rounded-lg">
                <h3 class=" text-slate-800 font-bold text-lg">{{ Str::upper('form kategori barang') }}</h3>
                <div class="my-1 border-b-1 w-full border border-red-600"></div>
                <form id='form-kat-brg' autocomplete="off">
                    <input type="hidden" name="type" id="act" value="{{ $data['act'] }}">
                    <input type="hidden" name="id" id="id-ktg" value="">
                    <div class="mb-2 mt-2">
                        <label for="jenis_kategori"
                            class="block mb-2 text-lg font-medium text-slate-800 dark:text-white">Nama
                            Kategori</label>
                        <input type="text" name="jenis_kategori" id="jenis_kategori" value=""
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm font-bold rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukan Nama Kategori">
                        <p id="jenis_kategori_error"
                            class="error-message mt-2 text-sm text-red-600 dark:text-red-500 font-medium"></p>
                    </div>
                    <div class="mb-4">
                        <label for="jenis_kategori"
                            class="block mb-2 text-lg font-medium text-slate-800 dark:text-white">Keterangan
                            Kategori</label>
                        <textarea id="ket_kategori" name="ket_kategori" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 font-bold bg-gray-50 rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukan Keterangan Kategori..."></textarea>
                    </div>
                    <div class="mb-2 flex gap-2">
                        <button type="button" id="save-kt-brg"
                            class="p-3 w-1/2 border-none bg-blue-500 font-bold text-white rounded-lg hover:bg-blue-700 ">Simpan</button>
                        <button type="button" id="reset-kt-brg"
                            class="p-3 w-1/2 border-none bg-orange-500 font-bold text-white rounded-lg hover:bg-orang-700 ">Batal</button>
                        <button type="button" id="refresh-table" class="">refresh</button>
                    </div>
                </form>
            </div>
            <div class=" col-span-4">
                <div class=" mb-3 ml-1">
                    <button type="button" id="edit-katbarang"
                        class="text-white bg-yellow-400 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg aria-hidden="true" class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 25 25"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                        </svg>
                        Edit Kategori
                    </button>
                    <button id="delete-katbarang" onclick="handleDelete()"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg aria-hidden="true" class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 25 25"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                clip-rule="evenodd" />
                        </svg>
                        Hapus Kategori
                    </button>
                </div>
                <div id="table-kat-brg" class="flex w-full nowrap"></div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="{{ asset('assets/gridjs/dist/theme/mermaid.min.css') }}" rel="stylesheet" />
@endsection

@section('js-include')
    <script src="{{ asset('assets/gridjs/dist/gridjs.umd.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#refresh-table').prop('hidden', true);
            $('#save-kt-brg').click(function(e) {
                e.preventDefault();
                var formData = $('#form-kat-brg').serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ route('kategori.produk.post') }}",
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: "json",
                    success: function(res) {
                        resetForm();
                        ToastTopEnd.fire({
                            icon: 'success',
                            color: '#00cc00',
                            title: res.success.message,
                        });
                        $('#refresh-table').click();
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

            $('#reset-kt-brg').click(function(e) {
                e.preventDefault();
                resetForm();
            });

            function resetForm() {
                $('#id-ktg').val('');
                $('#jenis_kategori').val('');
                $('#ket_kategori').val('');
                $('#act').val('add');
            }
        });


        const fetchData = async () => {
            try {
                const response = await fetch('/manajemen/kategori-produk-get');
                const data = await response.json();

                const refreshtable = document.getElementById('refresh-table');
                const jenisKategori = document.getElementById('jenis_kategori');
                const idKatBrg = document.getElementById('id-ktg');
                const editButton = document.getElementById('edit-katbarang');
                const ketKatBrg = document.getElementById('ket_kategori');

                let grid;

                const createGrid = (filteredData) => {
                    grid = new gridjs.Grid({
                        columns: [{
                                name: 'Pilih',
                                formatter: (cell, row) => {
                                    return gridjs.html(
                                        `<div style="text-align: center;"><input type="checkbox" name="pilih[]" value="${cell}" /></div>`
                                    );
                                },
                            },
                            'Jenis Kategori',
                            'Keterangan Kategori',
                        ],
                        data: () => {
                            return new Promise((resolve) => {
                                setTimeout(() =>
                                    resolve(
                                        filteredData.map((item) => [
                                            item.id,
                                            item.jenis_kategori.toUpperCase(),
                                            item.ket_kategori
                                        ])
                                    ),
                                    1000
                                );
                            });
                        },
                        style: {
                            table: {
                                border: '3px solid #ccc'
                            },
                            th: {
                                'background-color': 'rgba(0, 0, 0, 0.1)',
                                color: '#000',
                                'border-bottom': '3px solid #ccc',
                                'text-align': 'center'
                            },
                            td: {
                                'text-align': 'center'
                            }
                        },
                        resizable: true,
                        pagination: {
                            limit: 6,
                        },
                    }).render(document.getElementById('table-kat-brg'));
                };

                createGrid(data);

                refreshtable.addEventListener('click', async () => {
                    try {
                        const refreshedResponse = await fetch('/manajemen/kategori-produk-get');
                        const refreshedData = await refreshedResponse.json();
                        grid = grid.destroy();
                        createGrid(refreshedData);
                    } catch (error) {
                        console.error(error);
                    }
                });

                editButton.addEventListener('click', () => {
                    const selectedCheckbox = document.querySelector(
                        'input[type="checkbox"][name="pilih[]"]:checked');
                    if (selectedCheckbox) {
                        const row = selectedCheckbox.closest('tr');
                        idKatBrg.value = selectedCheckbox.value;
                        jenisKategori.value = row.cells[1].textContent;
                        ketKatBrg.value = row.cells[2].textContent;
                        $('#act').val('update');
                    } else {
                        gagalAlert('Gagal !!! Belum Milih Kategori Barang');
                        return;
                    }
                });

                const createDataArray = (data) => {
                    return data.map((item) => [item.id, item.jenis_kategori, item.ket_kategori]);
                };

            } catch (error) {
                console.error(error);
            }
        };

        function handleDelete() {
            const checkboxes = document.querySelectorAll('input[name="pilih[]"]:checked');
            const selectedValues = Array.from(checkboxes).map(checkbox => checkbox.value);

            if (selectedValues.length < 1) {
                gagalAlert('Gagal !!! Belum Milih Kategori');
                return;
            };

            Swal.fire({
                title: 'Apakah ingin Menghapus Kategori Terpilih ?',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#d33',
                cancelButtonText: `Batal`,
            }).then((result) => {
                if (result.isConfirmed) {
                    selectedValues.forEach(id => {
                        fetch(`/manajemen/kategori-produk/delete/${id}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                            })
                            .then(response => response.json())
                            .then(data => {
                                ToastTop.fire({
                                    icon: 'success',
                                    color: '#00cc00',
                                    title: data.message,
                                });
                                $('#refresh-table').click();
                            })
                            .catch(error => {
                                console.log('Terjadi kesalahan:', error);
                            });
                    });
                }
            });
        };

        function gagalAlert(message) {
            ToastTop.fire({
                icon: 'error',
                color: '#fc0f03',
                title: message,
            });
        };

        function RoleAkun() {
            var role = $('#role-akun').val();
            if (role != 1) {
                $('#save-kt-brg').hide();
                $('#reset-kt-brg').hide();
                $('#jenis_kategori').prop('readonly', true);
                $('#ket_kategori').prop('readonly', true);
                $('#edit-katbarang').hide();
                $('#delete-katbarang').hide();
            }
        }

        RoleAkun();
        fetchData();
    </script>
@endsection
