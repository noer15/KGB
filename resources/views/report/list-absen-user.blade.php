<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download List User Absensi</title>
    <style>
        .container {
            margin: 0 auto;
            width: 90%;
        }
        table,th, td, tr {
            border: 1px solid gray;
            border-collapse: collapse;
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container">
        <h3>List Absesn</h3>
        <div style="margin: 10px 0 10px 0">
            <table  style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Absen Masuk</th>
                        <th>Absen Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absen as $key => $a)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $a->user->name }}</td>
                        <td>{{ $a->check_in }}</td>
                        <td>{{ $a->check_out }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>