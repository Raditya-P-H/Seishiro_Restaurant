<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <title>Card</title>
    <style>
        .bd{
            background-image: url('img/homeuser.jpg');
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
</head>

<body class="bd">
    <div class="container mt-5">
        <div class="row">
            @foreach($menu as $item)        
            <div class="col-2 mt-5">
                <div class="card">
                    <img src="{{ asset($item->foto) }}" alt="" height="100px" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama }}</h5>
                        <p class="card-title"><b>Rp. {{ number_format($item->harga,3,'.','.') }}</b></p>
                        <p class="card-text">{{ $item->catatan }}</p>
                    </div>
                    <a href="{{ route('detailpesanan', $item->id) }}" class="btn btn-success"> Pesan </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>
