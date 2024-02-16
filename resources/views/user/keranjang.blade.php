<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Keranjang</title>
</head>
<body>
    @include('template.navbar')
    <div class="container mt-5">
        @if (Session::has('status'))
        <div style="color: rgb(0, 0, 0)" class="alert alert-primary">{{ Session::get('status') }}</div>
        @endif
        <form action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h5>Keranjang</h5>
        <hr>
        <table class="table table-responsive-sm mt-5">
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
            @foreach ($detailtransaksi as $item)
            <tbody>
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><img src="{{ asset($item->menu->foto) }}" alt="" height="100px"></td>
                    <td>{{ $item->menu->nama }}</td>
                    <td>{{ number_format($item->totalharga,3,'.','.') }}</td>
                    <td>{{ $item->harga }}</td>
                    <td>{{ $item->catatan }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Jumlah</th>
                    <th class="quantity">0</th>
                    <th class="totalharga">Rp.{{ number_format($item->totalharga,3,'.','.') }}</th>
                </tr>
            </tfoot>
            @endforeach
        </table>
        <div class="card col-4 md-7">
            <div class="card-body">
                <button type="submit" class="btn btn-success">Konfirmasi</button>
            </div>
        </div>
        </form>
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
