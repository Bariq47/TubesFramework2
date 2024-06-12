<!DOCTYPE html>
<html>

<head>
    <title>Kost Details PDF</title>
</head>

<body>
    <p>nama kost : {{ $kost->name }}</p>
    <p>alamat : {{ $kost->address }}</p>
    <p>deskripsi kost : {{ $kost->description }}</p>
    <h2>Rooms</h2>
    <ul>
        @foreach ($kost->rooms as $room)
            <li>
                {{ $room->room_name }} - {{ $room->price }} - {{ $room->availability ? 'Available' : 'Not Available' }}
            </li>
        @endforeach
    </ul>
</body>

</html>
