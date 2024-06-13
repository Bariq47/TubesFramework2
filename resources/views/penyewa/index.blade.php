<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>
    @vite('resources/sass/app.scss')
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container">
            <a href="{{ url('/homee') }}" class="navbar-brand mb-0 h1"><i class="bi-hexagon-fill me-2"></i> Penyewa Dashboard</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="{{ route('logout') }}" class="btn btn-outline-light my-2 ms-md-2"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
            </a>
    </nav>
    <div class="container mt-4">
        <h4>Penyewa Dashboard</h4>
        <table class="table table-bordered table-hover table-striped mb-0 bg-white" id="tableKos">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Ketersediaan</th>
                    <th>Nama Pemilik</th>
                    <th>Gambar</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($kosts as $kost)
                    @foreach ($kost->rooms as $room)
                        <tr>
                            <td>{{ $kost->name }}</td>
                            <td>{{ $kost->address }}</td>
                            <td>{{ $kost->description }}</td>
                            <td>{{ $room->price }}</td>
                            <td>{{ $room->availability ? 'Tersedia' : 'Tidak Tersedia' }}</td>
                            <td>{{ $room->description }}</td>
                            <td>
                                @if ($kost->encrypted_photoname)
                                    <img src="{{ asset('storage/files/DocumentPhotoKost/' . $kost->encrypted_photoname) }}"
                                        alt="{{ $kost->name }}" style="width: 100px; height: auto;">
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>






    </div>
    @vite('resources/js/app.js')
</body>
</html>
