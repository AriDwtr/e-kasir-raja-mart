@extends('theme.master')

@section('konten')
    <div class="flex-wrap h-auto p-4 rounded bg-slate-100 dark:bg-gray-800">
        <div class="w-full flex-wrap p-3 h-auto rounded bg-white dark:bg-gray-800">
            <div class="flex mb-2 p-1">
                <button
                    class="py-1 px-2 mr-2 bg-blue-500 hover:bg-blue-900 text-white text-sm font-semibold rounded-lg">Add</button>
                <button onclick="handleEdit()"
                    class="py-1 px-2 mr-2  bg-yellow-300 hover:bg-blue-900 text-white text-sm font-semibold rounded-lg">View</button>
                <button onclick="handleDelete()"
                    class="py-1 px-2 mr-2  bg-red-500 hover:bg-blue-900 text-white text-sm font-semibold rounded-lg">Delete</button>
                <input type="text" id="search-input"
                    class=" ml-auto font-semibold mr-2 py-1 px-2 border border-gray-300 rounded-sm"
                    placeholder="Cari Barang.....">
            </div>
            <div id="table-brg" class=" flex w-full nowrap"></div>
        </div>
    </div>
@endsection

@section('css')
    <link href="{{ asset('assets/gridjs/dist/theme/mermaid.min.css') }}" rel="stylesheet" />
@endsection

@section('js-include')
    <script src="{{ asset('assets/gridjs/dist/gridjs.umd.js') }}"></script>
    <script>
        // const fetchData = async () => {
        //     try {
        //         const response = await fetch('/barang/get');
        //         const data = await response.json();

        //         const grid = new gridjs.html({
        //             columns: ['Kode', 'Nama Barang', 'Stok Barang', 'Harga Barang',
        //             ],
        //             data: () => {
        //                 return new Promise(resolve => {
        //                     setTimeout(() =>
        //                         resolve(data.map(item => [item.kd_brg, item.nm_brg, item
        //                             .stok, formatRupiah(item.hrg_brg),html("<a href=''>test</a>")
        //                         ])), 1000);
        //                 });
        //             },
        //             resizable: true,
        //             search: true,
        //             pagination: {
        //                 limit: 20,
        //             },
        //         }).render(document.getElementById('table-brg'));
        //     } catch (error) {
        //         console.error(error);
        //     }
        // };

        // const fetchData = async () => {
        //     try {
        //         const response = await fetch('/barang/get');
        //         const data = await response.json();

        //         const searchInput = document.getElementById('search-input');

        //         let grid = new gridjs.Grid({
        //             columns: [{
        //                 name: 'Pilih',
        //                 formatter: (cell, row) => {
        //                     return gridjs.html(
        //                         `<input type="checkbox" name="pilih[]" value="${cell}" />`);
        //                 }
        //             }, 'Kode', 'Nama Barang', 'Stok Barang', 'Harga Barang'],
        //             data: () => {
        //                 return new Promise((resolve) => {
        //                     setTimeout(() =>
        //                         resolve(
        //                             data.map((item) => [
        //                                 item.kd_brg,
        //                                 item.nm_brg,
        //                                 item.stok,
        //                                 formatRupiah(item.hrg_brg),
        //                             ])
        //                         ),
        //                         1000
        //                     );
        //                 });
        //             },
        //             resizable: true,
        //             pagination: {
        //                 limit: 20,
        //             },
        //         }).render(document.getElementById('table-brg'));


        //         // Custom search logic
        //         searchInput.addEventListener('input', () => {
        //             const searchTerm = searchInput.value.trim().toLowerCase();

        //             // Filter the data based on the search term
        //             const filteredData = data.filter((item) => {
        //                 return (
        //                     item.kd_brg.toString().toLowerCase().includes(searchTerm) ||
        //                     item.nm_brg.toLowerCase().includes(searchTerm) ||
        //                     item.stok.toString().toLowerCase().includes(searchTerm) ||
        //                     item.hrg_brg.toString().includes(searchTerm)
        //                 );
        //             });

        //             // Clear the existing grid
        //             grid = grid.destroy();

        //             // Create a new grid with the filtered data
        //             grid = new gridjs.Grid({
        //                 columns: [{
        //                 name: 'Pilih',
        //                 formatter: (cell, row) => {
        //                     return gridjs.html(
        //                         `<input type="checkbox" name="pilih[]" value="${cell}" />`);
        //                 }
        //             },'Kode', 'Nama Barang', 'Stok Barang', 'Harga Barang'],
        //                 data: () => {
        //                     return new Promise((resolve) => {
        //                         setTimeout(() =>
        //                             resolve(
        //                                 filteredData.map((item) => [
        //                                     item.kd_brg,
        //                                     item.kd_brg,
        //                                     item.nm_brg,
        //                                     item.stok,
        //                                     formatRupiah(item.hrg_brg),
        //                                 ])
        //                             ),
        //                             1000
        //                         );
        //                     });
        //                 },
        //                 resizable: true,
        //                 pagination: {
        //                     limit: 20,
        //                 },
        //             }).render(document.getElementById('table-brg'));
        //         });
        //     } catch (error) {
        //         console.error(error);
        //     }
        // };

        const fetchData = async () => {
            try {
                const response = await fetch('/barang/get');
                const data = await response.json();

                const searchInput = document.getElementById('search-input');

                let grid;

                const createGrid = (filteredData) => {
                    grid = new gridjs.Grid({
                        columns: [{
                                name: 'Pilih',
                                formatter: (cell, row) => {
                                    return gridjs.html(
                                        `<input type="checkbox" name="pilih[]" value="${cell}" />`
                                    );
                                },
                            },
                            'Kode',
                            'Nama Barang',
                            'Stok Barang',
                            'Harga Barang',
                        ],
                        data: () => {
                            return new Promise((resolve) => {
                                setTimeout(() =>
                                    resolve(
                                        filteredData.map((item) => [
                                            item.kd_brg,
                                            item.kd_brg,
                                            item.nm_brg,
                                            item.stok,
                                            formatRupiah(item.hrg_brg),
                                        ])
                                    ),
                                    1000
                                );
                            });
                        },
                        resizable: true,
                        pagination: {
                            limit: 20,
                        },
                    }).render(document.getElementById('table-brg'));
                };

                createGrid(data);

                // Custom search logic
                searchInput.addEventListener('input', () => {
                    const searchTerm = searchInput.value.trim().toLowerCase();

                    // Filter the data based on the search term
                    const filteredData = data.filter((item) => {
                        return (
                            item.kd_brg.toString().toLowerCase().includes(searchTerm) ||
                            item.nm_brg.toLowerCase().includes(searchTerm) ||
                            item.stok.toString().toLowerCase().includes(searchTerm) ||
                            item.hrg_brg.toString().includes(searchTerm)
                        );
                    });

                    // Clear the existing grid
                    grid = grid.destroy();

                    // Create a new grid with the filtered data
                    createGrid(filteredData);
                });
            } catch (error) {
                console.error(error);
            }
        };


        function handleDelete() {
            const checkboxes = document.querySelectorAll('input[name="pilih[]"]:checked');
            const selectedValues = Array.from(checkboxes).map(checkbox => checkbox.value);

            // Logika untuk menghapus item dengan nilai yang dicentang
            console.log('Delete items:', selectedValues);
        }


        function handleEdit() {
            const checkboxes = document.querySelectorAll('input[name="pilih[]"]:checked');
            const selectedValues = Array.from(checkboxes).map(checkbox => checkbox.value);

            // Logika untuk mengedit item dengan nilai yang dicentang
            console.log('Edit items:', selectedValues);
        }

        function formatRupiah(number) {
            const formatter = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            });

            return formatter.format(number);
        }

        fetchData();
    </script>
@endsection
