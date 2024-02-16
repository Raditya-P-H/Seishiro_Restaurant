<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 14px;
        }

        .container{
            width: 100%;
            margin: 20px auto;
            padding: 0 20px;
        }

        .title{
            text-align: center;
            margin-bottom: 20px;
        }

        .table{
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            border: 1px solid #000;
            padding: 8px;
        }
    </style>
</head>
<body>
    <div class="contaqiner">
        <h2 class="title">Struk Pembayaran</h2>
        <h4>ID Transaksi: {{ $transaksi->id }}</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detailtransaksi as $item )
                <tr>
                    <td>{{ $item->menu->nama }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>Rp. {{number_format($item->totalharga, 3, '.','.')  }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2" class="text-right">Total Harga Pesanan</th>
                    <th class="text-right">Rp. {{ number_format($totalharga, 3, '.','.') }}</th>
                </tr>
            </tfoot>
        </table>
        <div>
            <p>Nama Pelanggan: {{ $transaksi->nama_pelanngan }}</p>
            <p>Uang Tunai : Rp. {{ number_format($transaski->uang_bayar, 3, '.','.') }}</p>
            <p>Uang Kembali: Rp. {{ number_format($transaski->uang_kembali, 3, '.','.') }}</p>
        </div>
    </div>
</body>
</html>
