<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/sass/app.scss')
</head>

<body>

    <div class="container">
        <h1> <b>Daftar Kost</b> </h1>
        <a href="{{ route('dashboard-admin.index') }}" class="btn btn-primary">Kembali</a>

        <table class="table table-bordered table-hover table-striped mb-0 bg-white" id="tes">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $user)
                        <tr>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <li class="list-inline-item">
                                    <a href="{{ route('dashboard-admin.exportUser', $user->id) }}"
                                        class="btn btn-primary">Download PDF</a>
                                </li>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @vite('resources/js/app.js')
    @include('sweetalert::alert')
    @push('scripts')
        <script type="module">
            $(document).ready(function() {
                $('#tes').DataTable({
                    columns: [
                        {title; "Username"},
                        {title; "Email"},
                    ]
                });
            });
        </script>
    @endpush
    @stack('scripts')




</body>

</html>
