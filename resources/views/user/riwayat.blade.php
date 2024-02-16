<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Riwayat</title>
</head>
<body>
    <div class="continer mt-5">
        @if (Session::has('status'))
        <span style="color: aqua">{{ Session::get('status') }}</span>
        @endif
        @csrf
        <h5>Orderan Anda</h5>
        <hr>
        <table class="table table-responsive-sm mt-5" id="example">
            <thead>
                <tr>
                    <th>Seishiro Prota</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Catatan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detailtransaksi as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><img src="{{ asset($item->menu->foto) }}" alt="" height="100px"></td>
                    <td>{{ $item->menu->name }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ number_format($item->totalharga,0,',',',') }}</td>
                    <td>{{ $item->Catatan }}</td>
                    <td>{{ $item->Status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
