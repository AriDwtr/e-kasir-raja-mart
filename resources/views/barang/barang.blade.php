@extends('theme.master')

@section('konten')
    <div class="flex-wrap h-auto p-4 rounded bg-slate-100 dark:bg-gray-800">
        <div class="w-full flex-wrap p-3 h-auto rounded bg-white dark:bg-gray-800">
            <div class="flex mb-2 p-1">
                <a href=" {{ route('barang.form', ['type' => 'add']) }}"
                    class="py-2 px-2 mr-2 bg-blue-500 hover:bg-blue-900 text-white text-sm font-semibold rounded-lg">Add</a>
                <button onclick="handleEdit()"
                    class="py-1 px-2 mr-2  bg-yellow-300 hover:bg-yellow-900 text-white text-sm font-semibold rounded-lg">View</button>
                <button onclick="handleDelete()"
                    class="py-1 px-2 mr-2  bg-red-500 hover:bg-red-900 focus:bg-red-900 text-white text-sm font-semibold rounded-lg">Delete</button>
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

            // Memeriksa jika selectedValues memiliki panjang kurang dari 1
            if (selectedValues.length < 1) {
                gagalAlert('Gagal !!! Belum Milih Barang');
                return;
            }

            Swal.fire({
                title: 'Apakah ingin Menghapus Barang Terpilih ?',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#d33',
                cancelButtonText: `Batal`,
            }).then((result) => {
                if (result.isConfirmed) {
                    // Swal.fire('Saved!', '', 'success')
                    // console.log('Delete items:', selectedValues);
                    selectedValues.forEach(kodeBrg => {
                        fetch(`/barang/delete/${kodeBrg}`, {
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
                                setTimeout(function() {
                                    window.location.reload();
                                }, 1000);
                            })
                            .catch(error => {
                                console.log('Terjadi kesalahan:', error);
                                // Tangani kesalahan jika terjadi
                            });
                    });
                }
            })
        }


        function handleEdit() {
            var laravelRoutes = <?php echo json_encode([
                'barangForm' => route('barang.form', ['type' => 'view', 'id' => '__id__']),
            ]); ?>;
            const checkboxes = document.querySelectorAll('input[name="pilih[]"]:checked');
            const selectedValues = Array.from(checkboxes).map(checkbox => checkbox.value);
            if (selectedValues.length < 1) {
                gagalAlert('Gagal !!! Belum Milih Barang');
                return;
            } else if (selectedValues.length > 1) {
                gagalAlert('Gagal !!! Menu View Hanya Untuk Satu Barang Saja');
                return;
            }

            const kdBrg = selectedValues[0];
            const url = laravelRoutes.barangForm.replace('__id__', kdBrg);
            window.location.href = url;
        }

        function formatRupiah(number) {
            const formatter = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            });

            return formatter.format(number);
        }

        function gagalAlert(message) {
            ToastTop.fire({
                icon: 'error',
                color: '#fc0f03',
                title: message,
            });
        }

        fetchData();
    </script>
@endsection
