<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        .bd{
         background-image: url('img/pesanan.jpg');
         background-size: cover;
         background-attachment: fixed;
       }
   </style>
    <title>Detail Pesanan</title>
</head>
<body class="bd">
    @include('template.navbar')
    <div class="container mt-5">
        <form action="{{ route('postpesanan',$menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <img class="card-img-top" src="{{ asset($menu->foto) }}" alt="" height="200px" >
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $menu->nama }}</h3>
                        <p class="card-text"><b>Rp. {{ number_format($menu->harga,3,'.','.') }}</b></p>
                        <input type="number" class="form-control" placeholder="Banyak" required>
                        <input type="number" class="form-control" placeholder="Masukkan Nomor Meja" required>
                        <hr>
                        <h5>Catatan Pesanan : </h5>
                        <input type="text" name="catatan" class="form-control" id="" required>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h3>Kategori : {{ $menu->kategori->name }}</h3>
                    </div>
                    <button class="btn btn-success" type="submit">Kirim</button>
                </div>
            </div>
        </div>
    </form>
    </div>
</body>
</html>
