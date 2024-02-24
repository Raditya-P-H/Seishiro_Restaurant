<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            background-image: url('img/seishiro.jpg');
            background-size: cover;
            color: white;
        }
    </style>
    <title>Login</title>
</head>

<body>
    <div class="container mt-5" style="margin-left:  35%">
        <div class="card p-4" style="width: 35%; background: border-box;">
            <center>
                <h3>Login <br> Seishiro Menu</h3>
            </center>
            <form action="{{ route('postlogin') }}" class="form-group" method="POST">
                @csrf
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
                @if (Session::has('status'))
                    <p style="color: red">{{ Session::get('status') }}</p>
                @endif
                <button class="btn btn-primary mt-3" type="submit">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
