<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Welcome {{ Auth::user()->nm_user }}</h1>

    <form id="form-pembelian">
        <div class="form-group">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" class="form-control" id="kode_barang" name="kode_barang" required autofocus>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="1" disabled>
        </div>
        {{-- <button type="submit" class="btn btn-primary">Tambah Barang</button> --}}
    </form>

    <form action="{{ route('transaksi.post') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')
    <table id="table-pembelian" class="table">
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
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
                tr.innerHTML = `
                <td><input type="text" name="kd_brg[]" value="${item.kode_barang}" hidden>${item.kode_barang}</td>
                <td>${item.nama_barang}</td>
                <td>${item.harga_barang}</td>
                <td>${item.jumlah_barang}</td>
                <td>${item.subtotal}</td>
                <td><button class="hapus-barang" data-kode="${item.kode_barang}">Hapus</button></td>`;
                tbody.appendChild(tr);
                const hapusBtn = tr.querySelector('.hapus-barang');
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

</body>

</html>
