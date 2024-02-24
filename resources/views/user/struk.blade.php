<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <style>
        table {
            width: 55%;
            border: 1px solid;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 10px;
        }

        div {
            padding: 8px;
        }

        h3 {
            text-align: center;
        }

        h5 {
            padding: 8px;
        }

        th {
            background-color: #f2f2f2'

        }
    </style>
</head>

<body>
    <table class="table table-responsive-sm mt-3" id="example">
        <h3>Delicious Restaurant</h3>
        <hr>
        <h5>ID Transaksi :{{ $transaksi->id }}</h5>
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detailtransaksi as $item)
                <tr>
                    <td>{{ $item->menu->name }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>Rp. {{ number_format($item->totalharga, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Total Harga Pesanan:</th>
                <th class="totalharga">Rp. {{ number_format($totalharga, 0, ',', '.') }}</th>
            </tr>
        </tfoot>
        <div class="card col-6">
            <div class="card-body">
                <h5>Nama Pelanggan : {{ $transaksi->nama_pelanggan }}</h5>
                <h5>Uang Tunai : Rp. {{ number_format($transaksi->uang_bayar, 0, ',', '.') }}</h5>
                <h5>Uang kembali : Rp. {{ number_format($transaksi->uang_kembali, 0, ',', '.') }}</h5>
                <h5>Tanggal : {{ $transaksi->created_at->format('d-m-Y') }}</h5>
            </div>
        </div>
    </table>




</body>

</html>
