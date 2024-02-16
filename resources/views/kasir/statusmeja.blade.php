<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Status Meja</title>
</head>
<body>
    @include('template.navbar')
    <div class="container mt-5">
        @if (Session::has('status'))
        <div style="color: rgb(0, 0, 0)" class="alert alert-primary">{{ Session::get('status') }}</div>
        @endif

        <h5>Status Meja</h5>
        <hr>
        <table class="table table-responsive-sm mt-2" id="example">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>No_Meja</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->no_meja }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->created_at->format('y-m-d') }}</td>
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
