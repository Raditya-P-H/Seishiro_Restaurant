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
    <title>Home Admin</title>
</head>
<body>
    @include('template.navbar')
    <div class="container mt-5">
        @if(Session::has('status'))
            <div style="color: rgb(0, 0, 0)" class="alert alert-primary">{{ Session::get('status') }}</div>
        @endif

        <a href="{{ route('tambah') }}" class="btn btn-primary mb-4">Tambah Data</a>
        <a href="{{ route('kelolauser') }}" class="btn btn-success mb-4">Kelola User</a>
        <table class="table table-bordered mt-5" id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menu as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>
                        <img src="{{ asset($item->foto) }}" width="200" height="150" alt="">
                    </td>
                    <td>Rp. {{ number_format($item->harga, 3, '.','.') }}</td>
                    <td>
                        <a href="{{ route('edit', $item->id) }}" class="btn btn-success">Edit</a>
                        <a href="{{ route('hapus', $item->id) }}" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $('#example').DataTable({
            responsive: true
        });
    </script>

</body>
</html>

