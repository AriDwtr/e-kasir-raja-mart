@extends('theme.master')

@section('konten')
    <div class="flex h-auto p-0 rounded dark:bg-gray-800">
        <div class=" grid w-full grid-cols-1 gap-y-2 sm:grid-cols-3 sm:gap-2">
            <div class=" col-span-1">
                <div class="bg-white p-3 mb-2 rounded">
                    <form id="form-pembelian">
                        <input type="text" id="kode_barang" name="kode_barang" placeholder="Kode Barang" value=""
                            class=" rounded-xl border-2 border-red-600 w-full sm:text-sm" required autofocus autocomplete="off">
                        <p id="helper-text-explanation" class="mt-1 ml-1 text-xs text-gray-500 dark:text-gray-400">Note: Use
                            Barcode Scanner</p>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" value="1" disabled
                            hidden>
                    </form>
                </div>
                <div class=" bg-white p-2 rounded">
                    <div class=" font-bold text-base mb-2">
                        Total Pembayaran
                    </div>
                    <div class="mb-3">
                        <input type="text" id="total-pembayaran" name="total-pembayaran" placeholder="0" value="0"
                            class=" rounded-xl border-2 w-full sm:text-sm p-2 font-bold bg-slate-300 text-black" disabled>
                    </div>
                    <div class="flex ml-1 mb-4">
                        <div class="flex items-center h-5">
                            <input id="checkbox" aria-describedby="helper-checkbox-text" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-300 border-blue-500 border-4 rounded focus:ring-red-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        </div>
                        <div class="ml-2 text-sm">
                            <label for="helper-checkbox" class="font-medium text-gray-900 dark:text-gray-300">Check Bila
                                Tanpa Pembayaran</label>
                        </div>
                    </div>
                    <div id="div-check" class="mb-4">
                        <div class="mb-2 border-b-2 border-black w-full"></div>
                        <div class="mb-3">
                            <div class="text-base font-bold mb-1">Masukan Uang Pembayaran</div>
                            <input type="number" id="jumlah-bayar" name="" placeholder="0" value=""
                                class="rounded-xl border-2 w-full sm:text-sm p-2 font-bold">
                        </div>
                        <div>
                            <p class="font-bold">Total Kembalian : <span id="total-kembalian"></span> </p>
                        </div>
                    </div>
                    <button type="button" id="btn-proses"
                        class="focus:outline-none w-full font-extrabold text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Proses
                        Pesanan</button>
                </div>
            </div>
            <div class="col-span-2 p-3 rounded bg-white w-full">
                <div class="overflow-x-auto">
                    <form id="transaksi-post" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <table id="table-pembelian" class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Kode</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama Barang</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Harga Satuan</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Jumlah</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Total Harga</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Tabel akan diisi oleh JavaScript -->
                            </tbody>
                        </table>
                        <input type="hidden" id="total-pemb" name="tbayar" value="">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-include')
    <script>
        $(document).ready(function() {

            checkBox();

            $('#jumlah-bayar').on('input', function(e) {
                var tBayar = parseInt($('#total-pembayaran').val().replace('.', ''));
                var jBayar = $(this).val();
                var hasil = tBayar - jBayar;

                var hasilFormatted = hasil.toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                });
                $('#total-kembalian').text(hasilFormatted);
            });

            $('#checkbox').change(function() {
                checkBox();
            });

            $('#btn-proses').click(function(e) {
                var tBayar = $('#total-pembayaran').val();
                e.preventDefault();
                if (tBayar === '0') {
                    gagalAlert('Proses Gagal !!! Tidak Ada Barang Dalam Transaksi')
                } else {
                    Swal.fire({
                        title: 'Apakah Ingin Memproses Transaksi Ini ?',
                        showCancelButton: true,
                        confirmButtonText: 'Proses',
                        cancelButtonText: `Batal`,
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                          var data =  $('#transaksi-post').serialize();
                           $.ajax({
                            type: "post",
                            url: "{{ route('transaksi.push') }}",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: data,
                            dataType: "json",
                            success: function (res) {
                                // console.log(res.message);
                                Swal.fire(res.message, '', 'success');
                                hapusPembelian();
                            }
                           });
                        }
                    });
                }
            });

            function checkBox(){
                if ($('#checkbox').is(':checked')) {
                    $('#div-check').hide();
                } else {
                    $('#div-check').show();
                }
            }
        });
        // Mendefinisikan variabel global
        const form = document.querySelector('form');
        const tbody = document.querySelector('tbody');
        const total = document.querySelector('#total-pembayaran');
        const total2 = document.getElementById("total-pemb");
        const inputBarang = document.getElementById("kode_barang");
        let pembelian = [];
        // let subtotalPembayaran = 0;

        hapusPembelian();

        // Menghapus semua data pembelian
        function hapusPembelian() {
            pembelian = [];
            tampilPembelian();
        }

        // Menghitung total pembayaran
        function hitungTotal() {
            const subtotalArr = pembelian.map((item) => item.subtotal);
            const totalPembayaran = subtotalArr.reduce((total, current) => total + current, 0);
            return totalPembayaran;
        }

        // Menampilkan data pembelian pada tabel
        function tampilPembelian() {
            tbody.innerHTML = '';

            pembelian.forEach((item) => {
                const tr = document.createElement('tr');
                // tr.className = "bg-white border-b dark:bg-gray-800 dark:border-gray-700";
                tr.innerHTML = `
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><input type="hidden" name="kd_brg[]" value="${item.kode_barang}">${item.kode_barang}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${item.nama_barang.toUpperCase()}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${'Rp ' + formatCurrency(item.harga_barang)}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><input type="hidden" name="jml_brg[]" value="${item.jumlah_barang}">${item.jumlah_barang}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${'Rp ' + formatCurrency(item.subtotal)}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                <button id="hapus-barang" class="hapus-barang rounded text-red-500 p-1" data-kode="${item.kode_barang}">
                    <svg aria-hidden="true" class="w-4 h-4 mr-1 fill-current" fill="currentColor" viewBox="0 2 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                    </svg>
                </button>
            </td>`;
                tbody.appendChild(tr);
                const hapusBtn = tr.querySelector('#hapus-barang');
                hapusBtn.addEventListener('click', (event) => {
                    const kodeBarang = event.target.dataset.kode;
                    hapusPembelianByKode(kodeBarang);
                });
            });
            // Memperbarui tampilan total pembayaran
            total.value = formatCurrency(hitungTotal());
            total2.value = formatCurrency(hitungTotal());
        }

        function hapusPembelianByKode(kodeBarang) {
            pembelian = pembelian.filter((item) => item.kode_barang !== kodeBarang);
            tampilPembelian();
        }

        // Menghapus pesan error pada form input
        function hapusError() {
            const error = document.querySelector('.error');
            if (error) {
                error.remove();
            }
        }

        // Menampilkan pesan error pada form input
        function tampilkanError(message) {
            hapusError();

            const div = document.createElement('div');
            div.className = 'error';
            div.innerHTML = message;

            form.insertBefore(div, form.firstChild);
        }

        // Mengambil data barang dari database berdasarkan kode barang
        async function fetchData(kodeBarang) {
            const response = await fetch(`/barang/${kodeBarang}`);
            const data = await response.json();

            return data;
        }

        // Menangani submit form pembelian
        inputBarang.addEventListener('input', async (event) => {
            event.preventDefault();

            // Mengambil data dari form input
            const kodeBarang = form.kode_barang.value;
            const jumlahBarang = form.jumlah.value;

            // Menghapus pesan error sebelumnya (jika ada)
            hapusError();

            try {
                // Mengambil data barang dari database
                const {
                    nama_barang,
                    harga_barang
                } = await fetchData(kodeBarang);

                // Menambahkan data pembelian ke dalam tabel
                tambahPembelian(kodeBarang, nama_barang, harga_barang, jumlahBarang);

                // Mengkosongkan form input
                form.reset();
            } catch (error) {
                // Menampilkan pesan error pada form input
                // tampilkanError('Kode Barang tidak ditemukan.');
                gagalAlert('Data Barang Tidak Di Temukan !!!')
                form.reset();
            }
        });

        function formatCurrency(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }


        // Menambahkan data pembelian ke dalam tabel
        function tambahPembelian(kodeBarang, namaBarang, hargaBarang, jumlahBarang) {
            // Mengecek apakah kode barang sudah ada di dalam data pembelian
            const index = pembelian.findIndex((item) => item.kode_barang === kodeBarang);

            if (index >= 0) {
                // Jika kode barang sudah ada, tambahkan jumlah barang yang diinputkan
                pembelian[index].jumlah_barang += parseInt(jumlahBarang);
                pembelian[index].subtotal = pembelian[index].jumlah_barang * hargaBarang;
            } else {
                // Jika kode barang belum ada, tambahkan data pembelian baru
                const subtotal = parseInt(jumlahBarang) * hargaBarang;
                pembelian.push({
                    kode_barang: kodeBarang,
                    nama_barang: namaBarang,
                    harga_barang: hargaBarang,
                    jumlah_barang: parseInt(jumlahBarang),
                    subtotal: subtotal
                });
            }

            // Menampilkan data pembelian pada tabel
            tampilPembelian();
        }

        function gagalAlert(message) {
            ToastTop.fire({
                icon: 'error',
                color: '#fc0f03',
                title: message,
            });
        };
    </script>
@endsection
