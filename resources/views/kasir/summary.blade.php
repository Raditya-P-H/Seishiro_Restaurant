<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap5.min.css') }}">

    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>
    <title>Summary</title>
</head>
<body>
    @include('template.navbar')
    <div class="container mt-5">
        @if (Session::has('status'))
            <div style="color: rgb(0, 0, 0)" class="alert alert-primary">{{ Session::get('status') }}</div>
        @endif
        <h5>Summary</h5>
        <hr>
        <table class="table table-responsive-sm mt-2" id="example">
            <thead>
                <tr>
                    <th>Transaksi</th>
                    <th>No_Meja</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detailtransaksi as $transaksi_id => $group)
                <tr>
                    <td>{{ $transaksi_id }}</td>
                    <td>{{ $group->first()->no_meja }}</td>
                    <td>Klik Disini Untuk Melihat Struk Pesanan</td>
                    <td>
                        <a href="{{ route('tampildatasummary', ['transaksi_id' => $transaksi_id]) }}" class="btn btn-primary">Detail</a>
                        <a href="{{ route('konfiselesai', ['transaki_id'=> $transaksi_id]) }}" class="btn btn-danger">Selesai</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $('#example').DataTable({
            responsive : true
        });
    </script>
</body>
</html>
