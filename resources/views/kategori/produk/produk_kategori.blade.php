@extends('theme.master')

@section('konten')
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
            <div class=" col-span-2 p-5 bg-slate-500 rounded-lg">
                <h3 class=" text-white font-bold text-lg">{{ Str::upper('form kategori barang') }}</h3>
                <div class="my-1 border-b-1 w-full border border-red-600"></div>
                <form id='form-kat-brg' autocomplete="off">
                    <input type="hidden" name="id" id="id-ktg">
                    <div class="mb-2 mt-2">
                        <label for="jenis_kategori" class="block mb-2 text-lg font-medium text-white dark:text-white">Nama
                            Kategori</label>
                        <input type="text" name="jenis_kategori" id="jenis_kategori" value=""
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm font-bold rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukan Nama Kategori">
                        <p id="jenis_kategori_error"
                            class="error-message mt-2 text-sm text-red-600 dark:text-red-500 font-medium"></p>
                    </div>
                    <div class="mb-4">
                        <label for="jenis_kategori"
                            class="block mb-2 text-lg font-medium text-white dark:text-white">Keterangan Kategori</label>
                        <textarea id="ket_kategori" name="ket_kategori" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 font-bold bg-gray-50 rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukan Keterangan Kategori..."></textarea>
                    </div>
                    <div class="mb-2 flex gap-2">
                        <button type="button" id="save-kt-brg"
                            class="p-3 w-1/2 border-none bg-blue-500 font-bold text-white rounded-lg hover:bg-blue-700 ">Simpan</button>
                        <button type="button" id="save-kt-brg"
                            class="p-3 w-1/2 border-none bg-orange-500 font-bold text-white rounded-lg hover:bg-orange-700 ">Batal</button>
                    </div>
                </form>
            </div>
            <div class=" col-span-4">
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
        const fetchData = async () => {
            try {
                const response = await fetch('/manajemen/kategori-produk-get');
                const data = await response.json();

                // const searchInput = document.getElementById('search-input');

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
                                            item.jenis_kategori,
                                            item.ket_kategori
                                            // generateBarcode(item.kd_brg),
                                            // item.nm_brg.toUpperCase(),
                                            // item.stok + ' / Pcs',
                                            // formatRupiah(item.hrg_brg),
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
                        // pagination: {
                        //     limit: 20,
                        // },
                    }).render(document.getElementById('table-kat-brg'));
                };

                createGrid(data);

            } catch (error) {
                console.error(error);
            }
        };

        fetchData();
    </script>
@endsection
