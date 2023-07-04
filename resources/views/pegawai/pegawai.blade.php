@extends('theme.master')

@section('konten')
    @php
        $role = DB::Table('t_tipe_akun')
            ->select('m_super_admin', 'm_admin')
            ->where('id', Auth::user()->role)
            ->first();
        echo '<input type="hidden" id="role-akun-super-admin" value=' . $role->m_super_admin . ' />';
        echo '<input type="hidden" id="role-akun-admin" value=' . $role->m_admin . ' />';
    @endphp
    <div class="flex-wrap h-auto p-4 rounded bg-white dark:bg-gray-800">
        <div class="mb-0 ml-3 mt-2 w-full">
            <a href=" {{ route('manajemen') }}"
                class="inline-flex items-center py-1 px-4 mr-4 mb-3 bg-orange-500 hover:bg-orange-900 text-white text-sm font-semibold rounded-lg">
                <svg aria-hidden="true" class="w-4 h-4 mr-1 fill-current" fill="currentColor" viewBox="0 2 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.195 18.44c1.25.713 2.805-.19 2.805-1.629v-2.34l6.945 3.968c1.25.714 2.805-.188 2.805-1.628V8.688c0-1.44-1.555-2.342-2.805-1.628L12 11.03v-2.34c0-1.44-1.555-2.343-2.805-1.629l-7.108 4.062c-1.26.72-1.26 2.536 0 3.256l7.108 4.061z" />
                </svg>
            </a>
        </div>
        <div class="w-full flex-wrap p-3 h-auto rounded bg-white dark:bg-gray-800">
            <div class="flex mb-2 p-1">
                <a id="create" href=" {{ route('pegawai.form', ['type' => 'add']) }}"
                    class="py-2 px-2 mr-2 bg-blue-500 hover:bg-blue-900 text-white text-sm font-semibold rounded-lg">Add</a>
                <button id="view" onclick="handleEdit()"
                    class="py-1 px-2 mr-2  bg-yellow-300 hover:bg-yellow-900 text-white text-sm font-semibold rounded-lg">View</button>
                <button id="delete" onclick="handleDelete()"
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
    <script src="{{ asset('assets/barcodejs/JsBarcode.all.min.js') }}"></script>
    <script src="{{ asset('assets/gridjs/dist/gridjs.umd.js') }}"></script>
    <script>
        const fetchData = async () => {
            try {
                const response = await fetch('/manajemen/pegawai/get');
                const data = await response.json();

                const searchInput = document.getElementById('search-input');

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
                            'Nama Pengguna',
                            'Email Pengguna',
                            'Status'
                        ],
                        data: () => {
                            return new Promise((resolve) => {
                                setTimeout(() =>
                                    resolve(
                                        filteredData.map((item) => [
                                            item.id,
                                            item.nm_user.toUpperCase(),
                                            item.email_user,
                                            item.tipe_akun.toUpperCase(),
                                        ])
                                    ),
                                    1000
                                );
                            });
                        },
                        resizable: true,
                        pagination: {
                            limit: 5,
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
                            item.id.toString().toLowerCase().includes(searchTerm) ||
                            item.nm_user.toLowerCase().includes(searchTerm) ||
                            item.email_user.toString().toLowerCase().includes(searchTerm) ||
                            item.tipe_akun.toString().includes(searchTerm)
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

            if (selectedValues.length < 1) {
                gagalAlert('Gagal !!! Belum Milih Pegawai');
                return;
            };

            Swal.fire({
                title: 'Apakah ingin Menghapus Pegawai Terpilih ?',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#d33',
                cancelButtonText: `Batal`,
            }).then((result) => {
                if (result.isConfirmed) {
                    selectedValues.forEach(id => {
                        fetch(`/manajemen/pegawai/delete/${id}`, {
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
                            });
                    });
                }
            });
        };

        function handleEdit() {
            var laravelRoutes = <?php echo json_encode([
                'pegawaiForm' => route('pegawai.form', ['type' => 'view', 'id' => '__id__']),
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

            const id = selectedValues[0];
            const url = laravelRoutes.pegawaiForm.replace('__id__', id);
            window.location.href = url;
        };

        function formatRupiah(number) {
            const formatter = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            });

            return formatter.format(number);
        };

        function gagalAlert(message) {
            ToastTop.fire({
                icon: 'error',
                color: '#fc0f03',
                title: message,
            });
        };

        function RoleAkun() {
            var roleSuperAdmin = $('#role-akun-super-admin').val();
            var roleAdmin = $('#role-akun-admin').val();
            if (roleSuperAdmin != 1) {
                $('#create, #view, #delete').hide();
            }

            if (roleAdmin == 1) {
                $('#create, #view').show();
            }

        }

        RoleAkun();
        fetchData();
    </script>
@endsection
