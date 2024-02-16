<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Edit</title>
</head>
<body>
    <div class="container mt-5">
        @csrf
        <div class="row">
            <div class="card col-4 mx-auto">
                <div class="card-body">
                    <form action="{{ route('postedit', $menu->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h3 class="text-center">Edit Data</h3>
                        <hr>
                        <div class="col md-7 mx-auto">
                            <label for="">Kategori</label>
                            <select name="kategori_id" class="form-control" required id="">
                                @foreach($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $menu->nama }}" required>
                            <label for="">Foto</label>
                            <input type="file" name="foto" class="form-control" accept="img/*" value="{{ $menu->foto }}">
                            <label for="">Harga</label>
                            <input type="text" name="harga" class="form-control" value="{{ $menu->harga }}" required>
                            <label for="">Catatan</label>
                            <input type="text" name="catatan" class="form-control" value="{{ $menu->catatan }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
