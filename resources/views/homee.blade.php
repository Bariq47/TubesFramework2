<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container">
            <a href="" class="navbar-brand mb-0 h1"><i class="bi-hexagon-fill me-2"></i> Kos-Kosan</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <hr class="d-lg-none text-white-50">
                {{-- <ul class="navbar-nav flex-row flex-wrap">
                    <li class="nav-item col-2 col-md-auto"><a href="" class="nav-link active">Home</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="" class="nav-link">Cari Kost</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href=""
                            class="nav-link">dashboard admin</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href=""
                            class="nav-link">dashboard penyewa</a></li>
                </ul> --}}
                <hr class="d-lg-none text-white-50">
                <a href="{{ route('login') }}" class="btn btn-outline-light my-2 ms-md-auto">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light my-2 ms-md-2">Register</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="{{ route('logout') }}" class="btn btn-outline-light my-2 ms-md-2"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h4>Selamat Datang</h4>
        <hr>
        <div class="d-flex align-items-center py-2 px-4 bg-light rounded-3 border">
            <div class="bi-house-fill me-3 fs-1"></div>
            <h4 class="mb-0">Selamat Datang di web Kos-Kosan. Temukan kos impian Anda dengan mudah.</h4>
        </div>
    </div>

    @vite('resources/js/app.js')
</body>

</html>
