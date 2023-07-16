@extends('theme.master')

@section('konten')
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
            <div class="container bg-slate-200 mx-auto px-4 py-8">
                <h1 class="text-2xl font-bold mb-4">Cetak Laporan Transaksi In / Transaksi Out</h1>

                <form id="report-cetak" class="max-w-md">
                    <div class="mb-4">
                        <div class="flex">
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio" name="jenis-transaksi" value="transaksi-in"
                                    checked>
                                <span class="ml-2">Transaksi In / Masuk</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" class="form-radio" name="jenis-transaksi" value="transaksi-out">
                                <span class="ml-2">Transaksi Out / Keluar</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex mb-4">
                        <div class="w-1/2 mr-2">
                            <label class="block mb-2 font-bold">Tanggal Min:</label>
                            <input type="date" class="w-full px-4 py-2 border rounded-lg" name="tanggal-min">
                        </div>
                        <div class="w-1/2 ml-2">
                            <label class="block mb-2 font-bold">Tanggal Max:</label>
                            <input type="date" class="w-full px-4 py-2 border rounded-lg" name="tanggal-max">
                        </div>
                    </div>

                    <button id="cetak-laporan"
                        class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4
                        rounded"
                        type="submit">Cetak Laporan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js-include')
    <script>
        $(document).ready(function() {
            $("#cetak-laporan").click(function(e) {
                e.preventDefault(); // Mencegah aksi default pengiriman form

                var jenisTransaksi = $("input[name='jenis-transaksi']:checked").val();
                var tanggalMin = $("input[name='tanggal-min']").val();
                var tanggalMax = $("input[name='tanggal-max']").val();

                if (tanggalMin === '' || tanggalMax === '') {
                    gagalAlert('Gagal !!! Tanggal Masih Kosong');
                    return;
                }

                var url = "/manajemen/report/print?jenis_transaksi=" + jenisTransaksi +
                    "&tanggal_min=" + tanggalMin +
                    "&tanggal_max=" + tanggalMax;

                window.open(url, "_blank");
            });
        });

        function gagalAlert(message) {
            ToastTop.fire({
                icon: 'error',
                color: '#fc0f03',
                title: message,
            });
        };
    </script>
@endsection
