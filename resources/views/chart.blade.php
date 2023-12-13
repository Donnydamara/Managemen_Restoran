<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>
</head>
<div class="col-md-3">
    <canvas id="badCanvas1" width="400" height="300"></canvas>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set Data
            const data = @json($dataArray);
            const labels = data.map(row => row[0]);
            const values = data.map(row => row[1]);

            // Set Options
            const options = {
                title: {
                    display: true,
                    text: 'Tipe Pesanan'
                    
                }
                // Tambahkan opsi lain sesuai kebutuhan
            };

            // Draw
            const ctx = document.getElementById('badCanvas1').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: values,
                        backgroundColor: ['green', 'brown']
                        // Tambahkan opsi dataset lain sesuai kebutuhan
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Tipe Pesanan'
                    },
                    responsive: true, // Izinkan responsifitas
                    maintainAspectRatio: false, // Tidak perlu mempertahankan rasio aspek
                }
            });
        });
    </script>
</div>
<!-- Konten halaman Anda -->
</html>
