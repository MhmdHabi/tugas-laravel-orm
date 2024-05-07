<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
    <div class="container text-center mt-3">
        <a href="{{ route('list_product') }}" class="btn btn-success ">Kembali Ke halaman Admin</a>
        <div class="row mt-3 justify-content-center">
            @foreach ($user as $user)
                <div class="col-md-5 border border-black border-2 rounded-1 ">
                    <div class="d-flex justify-content-around ">
                        <p>Nama Akun</p>
                        <p>{{ $user->name }}</p>
                    </div>
                    <div class="d-flex justify-content-around ">
                        <p>Email</p>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="d-flex justify-content-around ">
                        <p>Gender</p>
                        <p>{{ $user->gender }}</p>
                    </div>
                    <div class="d-flex justify-content-around ">
                        <p>Umur</p>
                        <p>{{ $user->umur }}</p>
                    </div>
                    <div class="d-flex justify-content-around ">
                        <p>Tanggal Lahir</p>
                        <p>{{ $user->tgl_lahir }}</p>
                    </div>
                    <div class="d-flex justify-content-around ">
                        <p>Alamat</p>
                        <p>{{ $user->alamat }}</p>
                    </div>
                </div>
                <div class="col-md-5 border border-black ms-2 border-2 rounded-1">
                    {{-- <p>Email: {{ $user->email }}</p>
                    <p>Jenis Kelamin: {{ $user->gender }}</p>
                    <p>Umur: {{ $user->umur }}</p>
                    <p>Tanggal Lahir: {{ $user->tgl_lahir }}</p>
                    <p>Alamat: {{ $user->alamat }}</p>
                    <p>Nama Profil: {{ $user->profile->name }}</p>
                    <p>Rating Profil: {{ $user->profile->rate }}</p>
                    <p>Produk Terbaik: {{ $user->profile->produk_terbaik }}</p>
                    <p>Deskripsi Profil: {{ $user->profile->deskripsi }}</p> --}}
                </div>
            @endforeach
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
