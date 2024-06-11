<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/sass/app.scss')
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
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
    </div>
    @vite('resources/js/app.js')
</body>
</html>
