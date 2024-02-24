<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Kasir</title>
</head>
<body>
    @include('template.navbar')
    <div class="container mt-5">
        @if(Session::has('status'))
        <div style="color: rgb(0, 0, 0)" class="alert alert-primary">{{ Session::get('status') }}</div>
    @endif
    <h5>Orderan Masuk</h5>
    <hr>
    <table class="table table-responsive-sm mt-2" id="example">
        <thead>
            <tr>
                <th>No_Meja</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detailtransaksi as $no_meja => $group)
            <tr>
                <td>{{ $no_meja }}</td>
                <td>Klik Detail Untuk Melihat Struk Pesanan</td>
                <td>
                    <a href="{{ route('tampildetailpesan', ['no_meja'=>$no_meja]) }}" class="btn btn-primary">Detail</a>
                    <a href="{{ route('hapustransaksi', ['no_meja'=>$no_meja]) }}" class="btn btn-danger" onclick="return confirm('Yakin Hapus?')">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
        $('#example').DataTable({
            responsive: true
        });
    </script>
</body>
</html>
