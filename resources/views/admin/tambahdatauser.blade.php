<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('cs/bootstrap.min.css') }}">
    <title>Tambah Data User</title>
</head>
<body>
    <div class="container mt-5">
        <form action="{{ route('tambahdatauser') }}" method="POST" enctype="multipart/form-data" class="AdminController" >
        @csrf
        <div class="row">
            <div class="card col-4 mx-auto">
                <div class="card-body">
                    <h3 class="text-center">Tambah Data User</h3>
                    <hr>
                    <div class="col md-7 mx-auto">
                    <label for="">Nama</label>
                    <input type="text" name="name" class="form-control" required>
                    <label for="">E-mail</label>
                    <input type="text" name="Email" class="form-control" required>
                    <label for="">Password</label>
                    <input type="text" name="password" class="form-control" required>
                    <label for="">Role</label>
                    <input type="text" name="role" class="form-control" required>
                    <p> Role : User , Kasir , Admin, Owner</p>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Tambah User</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</body>
</html>
