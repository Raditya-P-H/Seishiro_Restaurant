<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Log</title>
</head>
<body>
    @include('template.navbar')
    <div class="container mt-5">
        <table class="table table-responsive-sm">
            <thead>
                <tr>
                    <th>USer_id</th>
                    <th>Nama</th>
                    <th>Aktivitas</th>
                    <th>Dibuat Di</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($log as $item)
                <tr>
                    <td>{{ $item->user_id }}</td>
                    <td>{{ $item->user->nama }}</td>
                    <td>{{ $item->activity }}</td>
                    <td>{{ $item->created_at->format('d-m-y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
