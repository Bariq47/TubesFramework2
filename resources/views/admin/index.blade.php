<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/sass/app.scss')
    @include('sweetalert::alert')
    @stack('scripts')
</head>

<body>
    {{-- <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container">
            <a href="{{ url('/homee') }}" class="navbar-brand mb-0 h1"><i class="bi-hexagon-fill me-2"></i> admin Dashboard</a>
        </nav>
    </nav>
    <div class="container mt-4">
        <h4>Admin Dashboard</h4>
        <ul>
            <li><a href="">Manage Users</a></li>
            <li><a href="">Verify Kos-Kosan</a></li>
            <li><a href="">View Reports</a></li>
        </ul>
    </div> --}}
    <div class="container">
        <h1>Daftar Kost</h1>
        <a href="{{ route('dashboard-admin.create') }}" class="btn btn-primary">Tambah Kost</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="{{ route('logout') }}" class="btn btn-primary"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
        </a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Ketersediaan</th>
                    <th>Nama Pemilik</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                    <th>Download Data</th>
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
                            <td>
                                <a href="{{ route('dashboard-admin.edit', $kost->id) }}"
                                    class="btn btn-warning">Edit</a>
                                {{-- <a href="{{ route('dashboard-admin.edit', ['kost' => $kost->id]) }}" class="btn btn-warning">Edit</a> --}}

                                <form action="{{ route('dashboard-admin.destroy', $kost->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                            <td>
                                <li class="list-inline-item">
                                    <a href="{{ route('dashboard-admin.exportPdf', $kost->id) }}"
                                        class="btn btn-primary">Download PDF</a>
                                </li>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    @vite('resources/js/app.js')
</body>
@push('scripts')
    <script type="module">
        $(document).ready(function() {

            ...
            $(".datatable").on("click", ".btn-delete", function(e) {
                e.preventDefault();
                var form = $(this).closest("form");
                var name = $(this).data("name");
                Swal.fire({
                    title: "Are you sure want to delete\n" + name + "?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "bg-primary",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush

</html>
