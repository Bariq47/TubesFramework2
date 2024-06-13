<!DOCTYPE html>
<html>

<head>
    <title>Kost Details PDF</title>
</head>

<body>
    <p>nama kost : {{ $kost->name }}</p>
    <p>alamat : {{ $kost->address }}</p>
    <p>deskripsi kost : {{ $kost->description }}</p>
    @foreach ($kost->rooms as $room)
        <p>nama pemilik : {{ $room->description }}</p>
        <p>nama kamar : {{ $room->room_name }} </p>
        <p>harga kamar : {{ $room->price }}</p>
        <p>ketersediaan : {{ $room->availability ? 'Available' : 'Not Available' }}</p>
    @endforeach

</body>

</html>
