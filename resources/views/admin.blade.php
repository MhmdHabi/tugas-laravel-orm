<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
    <div class="container bg-info rounded">
        <div class="mt-3 pb-2">
            <div class="d-flex justify-content-between me-3 ms-3 pt-2 pb-2">
                <h2 class="mt-2 fw-semibold ">List Product</h2>
                <div class="mt-2 ">
                    <a href="{{ route('index', ['id' => 1]) }}" class="btn btn-dark fw-bold text-white border-0"
                        style="background-color: rgb(18, 159, 225)">Lihat Profil</a>
                    <a href="{{ route('form_create') }}" class="btn btn-dark fw-bold ">Tambah Produk</a>
                    <a href="{{ route('list_catalog') }}" class="btn btn-secondary fw-bold ">Kembali Ke Produk</a>
                </div>
            </div>
            <div class="mb-3">
                <table class="table table-hover table-striped text-center ">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-2">Nama</th>
                            <th class="col-md-1">Stok</th>
                            <th class="col-md-1">Berat</th>
                            <th class="col-md-3">Harga</th>
                            <th>Kondisi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Product as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->Nama }}</td>
                                <td>{{ $item->Stok }}</td>
                                <td>{{ $item->Berat }}</td>
                                <td>Rp.
                                    {{ number_format($item->Harga, 0, ',', '.') }}</td>
                                <td>
                                    @if ($item->Kondisi == 'Baru')
                                        <p class="bg-dark rounded text-white m-0 py-1 px-3" style="font-size: 16px">
                                            {{ $item->Kondisi }}
                                        </p>
                                    @else
                                        <p class="bg-success rounded text-white m-0 py-1 px-3" style="font-size: 16px">
                                            {{ $item->Kondisi }}
                                        </p>
                                    @endif
                                </td>
                                <td class="d-flex justify-content-center">
                                    <a href="/product/{{ $item->id }}/update"
                                        class="btn btn-warning me-1">Update</a>
                                    <form action="/product/{{ $item->id }}/delete" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
