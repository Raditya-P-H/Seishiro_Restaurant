<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset{'css/bootstrap.min.css'} }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Navbar</title>
</head>
<body>
    <nav class="navbar navbar-expand bg-dark p-3" >
        <p class="text-light p-2"><b> Seishiro <br> Restaurant </b></p>
        <a href="{{ route('konfirbayar') }}" class="nav-link text-light p-2"> Kasir </a>
        <a href="{{ route('homeuser') }}" class="nav-link text-light p-2"> Menu </a>
        <a href="" class="nav-link text-light p-2"> Orderan </a>
        <a href="{{ route('keranjang') }}" class="nav-link text-light p-2"> Keranjang </a>
        <a href="{{ route('logout') }}" class="nav-link  text-light p-2">Logout</a>
    </nav>
</body>
</html>
