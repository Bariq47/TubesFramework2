<!DOCTYPE html>
<html>

<head>
    <title>Users PDF</title>
</head>

<body>
    <h1>Daftar Kost</h1>
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
                    </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
