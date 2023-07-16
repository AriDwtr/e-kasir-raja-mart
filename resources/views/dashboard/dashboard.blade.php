@extends('theme.master')

@section('konten')
    <div class="flex-wrap h-auto p-4  rounded bg-white dark:bg-gray-800">
        <div class="flex">
            <div class="w-1/2 h-auto p-4">
                <!-- Container untuk chart transaksi masuk -->
                <div class="bg-white p-4 shadow rounded">
                    <canvas id="transaksiMasukChart"></canvas>
                    <!-- Tambahkan kode chart transaksi masuk di sini -->
                </div>
            </div>
            <div class="w-1/2 h-auto p-4">
                <!-- Container untuk chart transaksi keluar -->
                <div class="bg-white p-4 shadow rounded">
                    <canvas id="transaksiKeluarChart"></canvas>
                    <!-- Tambahkan kode chart transaksi keluar di sini -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-include')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctxMasuk = document.getElementById('transaksiMasukChart').getContext('2d');
        var chartDataMasuk = @json($chartDataMasuk);

        var ctxKeluar = document.getElementById('transaksiKeluarChart').getContext('2d');
        var chartDataKeluar = @json($chartDataKeluar);

        var transaksiMasukChart = new Chart(ctxMasuk, {
            type: 'bar',
            data: {
                labels: chartDataMasuk.labels,
                datasets: [{
                    label: 'Transaksi Masuk',
                    data: chartDataMasuk.data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: chartDataMasuk.title,
                        position: 'top'
                    }
                }
            }
        });

        var transaksiKeluarChart = new Chart(ctxKeluar, {
            type: 'bar',
            data: {
                labels: chartDataKeluar.labels,
                datasets: [{
                    label: 'Transaksi Keluar',
                    data: chartDataKeluar.data,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: chartDataKeluar.title,
                        position: 'top'
                    }
                }
            }
        });
    </script>
@endsection
