<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi</title>
    <style>
        /* Gaya-gaya CSS Anda */
        header {
            text-align: center;
            padding: 20px;
            background-color: #f2f2f2;
            border-bottom: 2px solid #ccc;
        }

        h1, h3, h4 {
            text-align: center;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .total-row {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <header>
        <h1>{{ $header->nama_site }}</h1>
    </header>
    <h3>Laporan Transaksi IN / Masuk</h3>
    <h4>Periode : @php echo date('d', strtotime($tanggalMin)).' s/d '.date('d F Y', strtotime($tanggalMax))   @endphp</h4>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tgl</th>
                <th>Kode Produk</th>
                <th>Produk</th>
                <th>Pegawai</th>
                <th>Stok Masuk</th>
                <th>Nilai Produk / Per Item</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0; // Inisialisasi total
            @endphp
            @foreach ($data as $index => $nilai)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ date('d/M/Y', strtotime($nilai->created_at)) }}</td>
                    <td>{{ $nilai->kd_brg }}</td>
                    <td>{{ $nilai->nm_brg }}</td>
                    <td>{{ $nilai->nm_user }}</td>
                    <td>{{ $nilai->stok_in }}</td>
                    <td>{{ formatRupiah($nilai->hrg_brg_beli) }}</td>
                    <td>{{ formatRupiah($nilai->stok_in * $nilai->hrg_brg_beli) }}</td>
                </tr>
                @php
                $total += ($nilai->stok_in * $nilai->hrg_brg_beli); // Menambahkan jumlah subtotal pada total
                @endphp
            @endforeach
            <tr class="total-row">
                <td colspan="7">Total Seluruhnya:</td>
                <td>{{ formatRupiah($total) }}</td>
            </tr>
        </tbody>
    </table>
</body>
@php
    function formatRupiah($angka) {
    $rupiah = number_format($angka, 0, ',', '.');
    return 'Rp.'.$rupiah;
}
@endphp
</html>
