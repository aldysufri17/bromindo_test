<!DOCTYPE html>
<html>

<head>
    <title>Data KTP</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table,
        th,
        td {
            border: 1px solid black;
        }
        th,
        td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h2>Data KTP</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $i => $d)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $d->nik }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->umur }}</td>
                <td>{{ $d->alamat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>