<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cek Transaksi</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
</head>
<body>
    @include('template.navbar')
    <div class="container mt-5">
        @if (Session::has('status'))
        <div style="color: rgb(0, 0, 0)" class="alert alert-primary">{{ Session::get('status') }}</div>
    @endif

    <h5>Transaksi Masuk</h5>
    <hr>
    <form action="{{ route('filtering') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-4">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>
            <div class="col-4">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>
            <div class="col-4 mt-4">
                <button type="submit" class="btn brn-primary form-control">Cari</button>
            </div>
        </div>
    </form>
    <form action="{{ route('downloadtransaksi') }}" method="GET" enctype="multipart/form-data">
        @csrf
        <div class="row mb-5">
            <div class="col-4">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>
            <div class="col-4">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>
            <div class="col-4 mt-4">
                <button type="submit" class="btn btn-danger form-control">Pdf</button>
            </div>
        </div>
    </form>
    <table class="table table-responsive-sm mt-2" id="example">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama Pelanggan</th>
                <th>Total Harga</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama_pelanggan }}</td>
                <td>Rp. {{ number_format($item->totalharga, 3, '.', '.') }}</td>
                <td>{{ $item->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Total Pemasukan : </th>
                <th class="totalharga">Rp. {{ number_format($totalharga, 3, '.', '.') }}</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script>
        new DataTable('#example');
    </script>
</body>
</html>
