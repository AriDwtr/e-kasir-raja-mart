@extends('theme.master')

@section('konten')
    <div class="flex h-auto p-2 rounded  dark:bg-gray-800">
        <div class=" grid grid-cols-1 gap-2 sm:grid-cols-3 ">
            <div class=" bg-white p-3 rounded">
                <form id="form-pembelian">
                    <input type="text" id="kode_barang" name="kode_barang" placeholder="Kode Barang" value=""
                        class=" rounded-xl border-2 border-red-600 w-full" required autofocus>
                    <p id="helper-text-explanation" class="mt-1 ml-1 text-xs text-gray-500 dark:text-gray-400">Note: Use
                        Barcode Scanner</p>

                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="1" disabled
                        hidden>
                </form>
            </div>
            <div class=" col-span-3 bg-white"></div>
        </div>
        {{-- <div class=" flex-wrap p-2 h-auto w-full rounded">
            <div class="flex">
                <div class="m-1 p-2 h-100 w-1/4">
                    <form id="form-pembelian">
                        <input type="text" id="kode_barang" name="kode_barang" placeholder="Kode Barang" value=""
                            class=" rounded-xl border-2 border-red-600 w-full" required autofocus>
                        <p id="helper-text-explanation" class="mt-1 ml-1 text-xs text-gray-500 dark:text-gray-400">Note: Use
                            Barcode Scanner</p>

                        <input type="number" class="form-control" id="jumlah" name="jumlah" value="1" disabled
                            hidden>
                    </form>
                </div>
                <div class="m-1 h-100 w-3/4 p-2">
                    <div>
                        <form action="{{ route('transaksi.post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <table id="table-pembelian" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-sm text-white uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 rounded-l-lg">Kode Barang</th>
                                        <th scope="col" class="px-6 py-3">Nama Barang</th>
                                        <th scope="col" class="px-6 py-3">Harga Barang</th>
                                        <th scope="col" class="px-6 py-3">Jumlah</th>
                                        <th scope="col" class="px-6 py-3">Total Harga</th>
                                        <th scope="col" class="px-6 py-3 rounded-r-lg"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Tabel akan diisi oleh JavaScript -->
                                </tbody>
                            </table>
                            <button type="submit">transaksi</button>
                        </form>
                        <div>
                            Total Pembayaran: Rp <span id="total-pembayaran">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection

@section('js-include')
    <script>
        // Mendefinisikan variabel global
        const form = document.querySelector('form');
        const tbody = document.querySelector('tbody');
        const total = document.querySelector('#total-pembayaran');
        const inputBarang = document.getElementById("kode_barang");
        let pembelian = [];
        // let subtotalPembayaran = 0;

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
                tr.className = "bg-white border-b dark:bg-gray-800 dark:border-gray-700";
                tr.innerHTML = `
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><input type="text" name="kd_brg[]" value="${item.kode_barang}" hidden>${item.kode_barang}</th>
            <td class="px-6 py-4 font-medium text-gray-900">${item.nama_barang.toUpperCase()}</td>
            <td class="px-6 py-4 font-medium text-gray-900">${'Rp ' + formatCurrency(item.harga_barang)}</td>
            <td class="px-6 py-4">${item.jumlah_barang}</td>
            <td class="px-6 py-4 font-medium text-gray-900">${'Rp ' + formatCurrency(item.subtotal)}</td>
            <td class="px-6 py-4">
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
            total.innerHTML = hitungTotal();
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
                tampilkanError('Kode Barang tidak ditemukan.');
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
    </script>
@endsection
