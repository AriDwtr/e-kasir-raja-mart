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
        <div class="w-full flex-wrap p-3 h-auto rounded bg-white dark:bg-gray-800">
            <div class="flex p-1">
            </div>

            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                    data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="barang-baru">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="barang-baru-tab"
                            data-tabs-target="#barang-baru" type="button" role="tab" aria-controls="barang-baru"
                            aria-selected="false">Barang Baru</button>
                    </li>
                    <li class="mr-2" role="barang-update">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="barang-update-tab"
                            data-tabs-target="#barang-update" type="button" role="tab" aria-controls="barang-update"
                            aria-selected="false">Barang update</button>
                    </li>
                    <li class="mr-2" role="monitoring-transaksi">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="monitoring-transaksi-tab"
                            data-tabs-target="#monitoring-transaksi" type="button" role="tab"
                            aria-controls="monitoring-transaksi" aria-selected="false">Monitoring Transaksi Masuk</button>
                    </li>
                </ul>
            </div>
            <div id="myTabContent">
                <div class="hidden p-4 rounded-lg dark:bg-gray-800" id="barang-baru" role="tabpanel"
                    aria-labelledby="barang-baru-tab">
                    <div class="bg-teal-200 p-3 rounded-lg">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Form ini Digunakan Untuk Produk Baru
                            / Penginputan Produk Baru Yang Belum Terdaftar Pada Sistem Pada <strong
                                class="font-medium text-gray-800 dark:text-white">Master Barang</strong></p>
                    </div>
                    <div class="mt-4">
                        @include('transaksi_in.barang_baru')
                    </div>
                </div>
                <div class="hidden p-4 rounded-lg dark:bg-gray-800" id="barang-update" role="tabpanel"
                    aria-labelledby="barang-update-tab">
                    <div class="bg-teal-200 p-3 rounded-lg">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Form ini Digunakan Untuk Menambahkan Stok Baru
                            Dengan Barang Yang Telah Terdaftar Pada Sistem Pada <strong
                                class="font-medium text-gray-800 dark:text-white">Master Barang</strong></p>
                    </div>
                    <div class="mt-4">
                        @include('transaksi_in.barang_update')
                    </div>
                </div>
                <div class="hidden p-4 rounded-lg dark:bg-gray-800" id="monitoring-transaksi" role="tabpanel"
                    aria-labelledby="monitoring-transaksi-tab">
                    <div class="bg-teal-200 p-3 rounded-lg">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Tabel Monitoring Transaksi Yang Masuk yang
                            Tercatat Pada Log Sistem</p>
                    </div>
                    <div class="mt-4">
                        <div id="table-transaksi-in" class=" flex w-full nowrap"></div>
                    </div>
                </div>
            </div>
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
        $(document).ready(function() {
            $('#btnSubmit-update').hide();
            $('#btnCancel-produk').hide();

            $('#btnSubmit-baru').click(function(e) {
                e.preventDefault();
                resetValidate();
                var formData = $('#post-brg-baru').serialize();
                var idForm = 'post-brg-baru';
                $.ajax({
                    type: "POST",
                    url: "{{ route('transaksi.in.baru') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    dataType: "json",
                    success: function(res) {
                        if (res.status === 'add') {
                            $('#post-brg-baru')[0].reset();
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
                            inputValidateBarang(err.errors, idForm);
                        }
                    }
                });
            });

            $('#btnSearch-produk').click(function(e) {
                e.preventDefault();
                var kdBrg = $('#post-brg-update #kd_brg').val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('transaksi.in.get') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        kd_brg: kdBrg,
                    },
                    success: function(res) {
                        // console.log(res.success.data.kd_brg);
                        var res = res.success;
                        ToastTopEnd.fire({
                            icon: 'success',
                            color: '#00cc00',
                            title: res.message,
                        });
                        $('#kdBrg').val(res.data.kd_brg);
                        $('#post-brg-update #nm_brg').val(res.data.nm_brg);
                        $('#post-brg-update #ktg_brg').val(res.data.ktg_brg);
                        $('#post-brg-update #expired_brg').val(res.data.expired_brg);
                        $('#post-brg-update #hrg_brg_beli').val(res.data.hrg_brg_beli);
                        $('#post-brg-update #hrg_brg_jual').val(res.data.hrg_brg_jual);
                        FormUpdateHandle();
                    },
                    error: function(err) {
                        var err = err.responseJSON;
                        ToastTopEnd.fire({
                            icon: 'error',
                            color: '#FF0000',
                            title: err.errors.message,
                        });
                    }
                });
            });

            $('#btnSubmit-update').click(function(e) {
                e.preventDefault();
                var formData = $('#post-brg-update').serialize();
                var idForm = 'post-brg-update';
                Swal.fire({
                    title: 'Apakah Data Yang Di Masukan Telah Sesuai ?',
                    showCancelButton: true,
                    confirmButtonText: 'Iya Telah Sesuai',
                    cancelButtonText: `Batal`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('transaksi.in.baru') }}",
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
                                    window.location.reload();
                                }, 500);
                            },
                            error: function(err) {
                                var err = err.responseJSON;
                                ToastTopEnd.fire({
                                    icon: 'error',
                                    color: '#FF0000',
                                    title: err.errors.message,
                                });
                            }
                        });
                    }
                })
            });

            $('#btnCancel-produk').click(function(e) {
                e.preventDefault();
                FormUpdateHandleReset();
            });
        });

        const fetchData = async () => {
            try {
                const response = await fetch('/manajemen/transaksi/in/getTransaksi');
                const data = await response.json();

                let grid;

                const createGrid = (filteredData) => {
                    grid = new gridjs.Grid({
                        columns: [
                            'Action',
                            'Kode Barang',
                            'Nama Barang',
                            'Stok Masuk',
                            'Harga Beli',
                            'Harga Jual',
                            'User'
                        ],
                        data: () => {
                            return new Promise((resolve) => {
                                setTimeout(() =>
                                    resolve(
                                        filteredData.map((item) => [
                                            item.action,
                                            item.kd_brg,
                                            item.nm_brg.toUpperCase(),
                                            item.stok_in,
                                            formatRupiah(item.hrg_brg_beli),
                                            formatRupiah(item.hrg_brg_jual),
                                            item.nm_user.toUpperCase(),
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
                    }).render(document.getElementById('table-transaksi-in'));
                };

                createGrid(data);

            } catch (error) {
                console.error(error);
            }
        };

        function formatCurrency(input) {
            let formattedValue = numeral(input.value).format('0,0');
            input.value = formattedValue;
        }

        function formatNumber(input) {
            let formattedValue = numeral(input.value).format('0');
            input.value = formattedValue;
        }

        function inputValidateBarang(error, idForm) {
            $.each(error, function(key, value) {
                $('#' + idForm + ' ' + '#' + key).addClass('border-2 border-red-500 text-red-900');
                $('#' + idForm + ' ' + '#' + key + '_error').text(value[0]);

            });
        }

        function FormUpdateHandle() {

            $('#btnSearch-produk').hide();
            $('#btnSubmit-update').show();
            $('#btnCancel-produk').show();

            $('#post-brg-update #kd_brg').removeClass('bg-gray-50');
            $('#post-brg-update #kd_brg').addClass('bg-gray-300');
            $('#post-brg-update #kd_brg').prop('readonly', true);

            $('#post-brg-update #stok_in').removeClass('bg-gray-300');
            $('#post-brg-update #stok_in').addClass('bg-gray-50');
            $('#post-brg-update #stok_in').prop('readonly', false);

            $('#post-brg-update #expired_brg').removeClass('bg-gray-300');
            $('#post-brg-update #expired_brg').addClass('bg-gray-50');
            $('#post-brg-update #expired_brg').prop('readonly', false);

            $('#post-brg-update #hrg_brg_beli').removeClass('bg-gray-300');
            $('#post-brg-update #hrg_brg_beli').addClass('bg-gray-50');
            $('#post-brg-update #hrg_brg_beli').prop('readonly', false);

            $('#post-brg-update #hrg_brg_jual').removeClass('bg-gray-300');
            $('#post-brg-update #hrg_brg_jual').addClass('bg-gray-50');
            $('#post-brg-update #hrg_brg_jual').prop('readonly', false);
        }

        function FormUpdateHandleReset() {
            $('#btnSearch-produk').show();
            $('#btnSubmit-update').hide();
            $('#btnCancel-produk').hide();

            $('#post-brg-update')[0].reset();

            $('#post-brg-update #kd_brg').addClass('bg-gray-50');
            $('#post-brg-update #kd_brg').removeClass('bg-gray-300');
            $('#post-brg-update #kd_brg').prop('readonly', false);

            $('#post-brg-update #stok_in').addClass('bg-gray-300');
            $('#post-brg-update #stok_in').removeClass('bg-gray-50');
            $('#post-brg-update #stok_in').prop('readonly', true);

            $('#post-brg-update #expired_brg').addClass('bg-gray-300');
            $('#post-brg-update #expired_brg').removeClass('bg-gray-50');
            $('#post-brg-update #expired_brg').prop('readonly', true);

            $('#post-brg-update #hrg_brg_beli').addClass('bg-gray-300');
            $('#post-brg-update #hrg_brg_beli').removeClass('bg-gray-50');
            $('#post-brg-update #hrg_brg_beli').prop('readonly', true);

            $('#post-brg-update #hrg_brg_jual').addClass('bg-gray-300');
            $('#post-brg-update #hrg_brg_jual').removeClass('bg-gray-50');
            $('#post-brg-update #hrg_brg_jual').prop('readonly', true);
        }

        function formatRupiah(number) {
            const formatter = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
            });

            return formatter.format(number);
        };

        function cekUser() {
            var superAdmin = document.getElementById('role-akun-super-admin').value;
            var admin = document.getElementById('role-akun-admin').value;

            if (superAdmin != 1 || admin != 1) {
                document.getElementById('btn-group').style.display = 'none';
                document.getElementById('btn-group-update').style.display = 'none';
            }
        }

        cekUser();
        fetchData();
    </script>
@endsection
