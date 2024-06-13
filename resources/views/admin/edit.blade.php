<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>


    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }

        .container {
            background: #fff;
            padding: 2rem;
            box-shadow: 0 0 10px rgba (0,0,0,0.1);
            border-radius: 8px;
        }
        </style>
         @vite('resources/sass/app.scss')
</head>

<body>
    <div class="container">
        <a href="{{ route('dashboard-admin.index') }}" class="btn btn-primary">Kembali</a>
        <h1>Edit Kost</h1>
        <form action="{{ route('dashboard-admin.update', $kost->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH') <!-- Use PATCH method for update -->
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kost</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $kost->name }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control" id="address" name="address" required>{{ $kost->address }}</textarea>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description" name="description">{{ $kost->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="room_name" class="form-label">Nama Room</label>
                <input type="text" class="form-control" id="room_name" name="room_name"
                    value="{{ $kost->rooms->first()->room_name }}" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="text" class="form-control" id="price" name="price"
                    value="{{ $kost->rooms->first()->price }}" required>
            </div>
            <div class="mb-3">
                <label for="availability" class="form-label">Ketersediaan</label>
                <select class="form-select" id="availability" name="availability" required>
                    <option value="1" {{ $kost->rooms->first()->availability ? 'selected' : '' }}>Tersedia</option>
                    <option value="0" {{ !$kost->rooms->first()->availability ? 'selected' : '' }}>Tidak Tersedia
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi Room</label>
                <textarea class="form-control" id="room_description" name="room_description">{{ $kost->rooms->first()->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    @vite('resources/js/app.js')
</body>

</html>
