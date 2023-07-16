@extends('theme.master')

@section('konten')
    <div class="flex-wrap h-auto p-4 rounded bg-white dark:bg-gray-800">
        <div class=" ml-3 mt-2 w-full">
            <a href=" {{ route('manajemen') }}"
                class="inline-flex items-center py-1 px-4 mr-4 bg-orange-500 hover:bg-orange-900 text-white text-sm font-semibold rounded-lg">
                <svg aria-hidden="true" class="w-4 h-4 mr-1 fill-current" fill="currentColor" viewBox="0 2 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.195 18.44c1.25.713 2.805-.19 2.805-1.629v-2.34l6.945 3.968c1.25.714 2.805-.188 2.805-1.628V8.688c0-1.44-1.555-2.342-2.805-1.628L12 11.03v-2.34c0-1.44-1.555-2.343-2.805-1.629l-7.108 4.062c-1.26.72-1.26 2.536 0 3.256l7.108 4.061z" />
                </svg>
            </a>
        </div>
        <div class="p-4">
            <div class="flex p-4 mb-1 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Transaksi Out / Keluar:</span>
                    <ul class="mt-1.5 ml-4 list-disc list-inside">
                        <li>20 Transaksi Terbaru </li>
                        <li>Setiap Transaksi Penjualan Akan Tercatat dan Tidak Dapat Dilakukan Perubahaan </li>
                        <li>Transaksi akan Mencatat Pegawai dan Waktu Transaksi</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="w-full flex-wrap p-3 h-auto rounded bg-white dark:bg-gray-800">
            <div id="table-transaksi-out" class=" flex w-full nowrap"></div>
        </div>
    </div>
@endsection

@section('css')
    <link href="{{ asset('assets/gridjs/dist/theme/mermaid.min.css') }}" rel="stylesheet" />
@endsection

@section('js-include')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script src="{{ asset('assets/gridjs/dist/gridjs.umd.js') }}"></script>
    <script>
        const fetchData = async () => {
            try {
                const response = await fetch('/manajemen/transaksi/out/getTransaksi');
                const data = await response.json();

                let grid;

                const createGrid = (filteredData) => {
                    grid = new gridjs.Grid({
                        columns: [
                            'Kode Barang',
                            'Nama Barang',
                            'Stok Keluar',
                            'Pegawai',
                            'Tgl. Transaksi',

                        ],
                        data: () => {
                            return new Promise((resolve) => {
                                setTimeout(() =>
                                    resolve(
                                        filteredData.map((item) => [
                                            item.kd_brg,
                                            item.nm_brg.toUpperCase(),
                                            item.jml_brg,
                                            item.nm_user.toUpperCase(),
                                            formatDate(item.created_at),
                                        ])
                                    ),
                                    1000
                                );
                            });
                        },
                        resizable: true,
                        search: true,
                        pagination: {
                            limit: 20,
                        },
                    }).render(document.getElementById('table-transaksi-out'));
                };

                createGrid(data);

            } catch (error) {
                console.error(error);
            }
        };

        function formatRupiah(number) {
            const formatter = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            });

            return formatter.format(number);
        };

        function formatDate(dateString) {
            const date = new Date(dateString);
            const day = date.getDate();
            const month = date.getMonth() + 1; // Months are zero-based
            const year = date.getFullYear();
            return `${day < 10 ? '0' : ''}${day}-${month < 10 ? '0' : ''}${month}-${year}`;
        }

        fetchData();
    </script>
@endsection
