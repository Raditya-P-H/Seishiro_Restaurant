<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Edit Data User</title>
</head>
<body>
    <div class="container mt-5">
        <form action="{{ route('editdatauser', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="card col-4 mx-auto">
                    <div class="card-body">
                        <h3 class="text-center">Edit Data USer</h3>
                        <hr>
                        <div class="col md-7 mx-auto">
                            <label for="">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->nama }}" required>
                            <label for="">E-mail</label>
                            <input type="text" name="email" class="form-control" value="{{ $user->email }}" required>
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control" value="{{ $user->password }}" required>
                            <label for="">Role</label>
                            <input type="text" name="role" class="form-control" value="{{ $user->role }}" required>
                        </div>
                        <button type="submit" class="btn bnt-primary">Edit User</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
