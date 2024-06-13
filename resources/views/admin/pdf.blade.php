<!DOCTYPE html>
<html>

<head>
    <title>Kost Details PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            trxt-align: left;
        }

        th {
            background-color: bisque;
        }
    </style>
</head>

<body>
    {{-- <p>Nama kost : {{ $kost->name }}</p>
    <p>Alamat : {{ $kost->address }}</p>
    <p>Deskripsi Kost : {{ $kost->description }}</p>
    @foreach ($kost->rooms as $room)
        <p>Nama Pemilik : {{ $room->description }}</p>
        <p>Nama Kamar : {{ $room->room_name }} </p>
        <p>Harga Kamar : {{ $room->price }}</p>
        <p>Ketersediaan : {{ $room->availability ? 'Available' : 'Not Available' }}</p>
    @endforeach --}}


    <table>
        <tr>
            <th>Nama Kost</th>
            <td>{{ $kost->name }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $kost->address }}</td>
        </tr>
        <tr>
            <th>Deskripsi Kost</th>
            <td>{{ $kost->description }}</td>
        </tr>
    </table>

    <br>

    <table>
        <thead>
            <tr>
                <th>Nama Pemilik</th>
                <th>Nama Kamar</th>
                <th>Harga Kamar</th>
                <th>Ketersediaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kost->rooms as $room)
                <tr>
                    <td>{{ $room->description }}</td>
                    <td>{{ $room->room_name }}</td>
                    <td>{{ $room->price }}</td>
                    <td>{{ $room->availability ? 'Available' : 'Not Available' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>
