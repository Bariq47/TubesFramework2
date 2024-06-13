<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/sass/app.scss')
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
        <a href="{{ route('dashboard-admin.index') }}" class="btn btn-primary">Kembali</a>
        {{-- <a href="{{ route('dashboard-admin.daftarUser') }}" class="btn btn-primary">Lihat Daftar User</a> --}}
        <table class="table table-bordered table-hover table-striped mb-0 bg-white" id="tes">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Downlad</th>
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



    {{-- @push('scripts')
        <script type="module">
            $(document).ready(function() {
                $("#employeeTable").DataTable({
                    serverSide: true,
                    processing: true,
                    ajax: "/getEmployees",
                    columns: [{
                            data: "id",
                            name: "id",
                            visible: false
                        },
                        {
                            data: "DT_RowIndex",
                            name: "DT_RowIndex",
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: "firstname",
                            name: "firstname"
                        },
                        {
                            data: "lastname",
                            name: "lastname"
                        },
                        {
                            data: "email",
                            name: "email"
                        },
                        {
                            data: "age",
                            name: "age"
                        },
                        {
                            data: "position.name",
                            name: "position.name"
                        },
                        {
                            data: "actions",
                            name: "actions",
                            orderable: false,
                            searchable: false
                        },
                    ],
                    order: [
                        [0, "desc"]
                    ],
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"],
                    ],
                });
            });
        </script>
    @endpush --}}
</body>


{{-- @push('scripts')
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
@endpush --}}

</html>
