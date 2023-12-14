<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>Cetak Data Pemasukkan Restoran</title>
</head>

<body>
    <div class="form-group">
        <h3 align="center">Laporan Pemasukkan Restoran</h3>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <thead>

                <tr>
                    <th>No.</th>
                    <th>Menu</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail_pesanan as $rp)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $rp->menu->kategori->kategori }}</td>
                    <td> {{ $rp->jumlah }} </td>
                    <td> Rp. {{ number_format($rp->subtotal) }}</td>
                    <td> {{ $rp->created_at->format('d F Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>