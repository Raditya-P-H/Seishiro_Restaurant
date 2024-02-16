<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Detail Summary</title>
</head>
<body>
    <div class="container mt-5">

        @include('template.navbar')
        @if (Session::has('status'))
        <div style="color: rgb(0, 0, 0)" class="alert alert-primary">{{ Session::get('status') }}</div>
        @endif

        <h5>Detail Pesanan</h5>
        <hr>
        <h5>ID Transaksi : {{ $transaksi->id }}</h5>
        <table class="taqble table-responsive-sm mt-2" id="example">
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
                    <td>{{ item->menu->nama }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>Rp. {{ number_format($item->totalharga,3,'.','.') }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2">Total Harga Pesanan</th>
                    <th class="totalharga">Rp. {{ number_format($totalharga,3,'.','.') }}</th>
                </tr>
            </tfoot>
        </table>
        <div class="card col-6">
            <div class="card-body">
                <h6>Nama Pelanggan : {{ $transaksi->nama_pelanggan }}</h6>
                <h6>Uang Tunai : Rp. {{ number_format($transaski->uang_bayar,3,'.','.') }}</h6>
                <h6>Uang Kembali : Rp. {{ number_format($transaski->uang_kembali,3,'.','.') }}</h6>
                <h6>Tanggal : {{ $transaski->created_at->format('d-m-y') }}</h6>
                <a href="{{ route('printstruk', ['transaski_id'=> $transaksi->id]) }}" class="btn btn-primary">Print Struk</a>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
        $('#example').DataTable({
            responsive: true
        });
    </script>
</body>
</html>
