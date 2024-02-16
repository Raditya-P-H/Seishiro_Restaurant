<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Proses Bayar</title>
</head>
<body>
    @include('template.navbar')
    <div class="container mt-4">
        @if (Session::has('status'))
        <div style="color: rgb(0, 0, 0)" class="alert alert-primary">{{ Session::get('status') }}</div>
        @endif

        <form action="{{ route('prosesbayar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h5>Orderan Masuk</h5>
        <hr>
        <table class="table table-responsive-sm mt-2" id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detailtransaksi as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><img src="{{ asset($item->menu->foto) }}" width="120" height="120" alt=""></td>
                    <td>{{ $item->qty }}</td>
                    <td>Rp. {{ number_format($item->totalharga,3,'.','.') }}</td>
                    <td>{{ $item->catatan }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total Harga Pesanan</th>
                    <th class="totalharga">Rp. {{ number_format($item->totalharga,3,'.','.') }}</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        <div class="card col-4 md-7">
            <div class="card-body">
                <div class="col md-7 mx-auto">
                    <label for="">No Meja :</label>
                    <input type="text" name="no_meja" class="form-control" value="{{ $nomormeja }}" readonly>
                    <label for="">Nama Pelanggan :</label>
                    <input type="text" name="nama_pelanggan" class="form-control" required>
                    <label for="">Total Harga :</label>
                    <input type="text" name="totalharga" class="form-control" required readonly>
                    <label for="">Uang Tunai :</label>
                    <input type="text" name="uang_bayar" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
            </div>
        </div>
        </form>
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
        $('#example').DataTable({
            responsive: true
        });
    </script>
</body>
</html>
