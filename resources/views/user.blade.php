<!DOCTYPE html>
<html>
    <head>
        <title>Data User</title>
    </head>
    <body>
        <h1>Data User</h1>
        <table border="1" cellpadding="2" cellspacing="0">
            {{-- <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nama</th>
                <th>ID Level Pengguna</th>
            </tr> --}}
            {{-- @foreach ($data as $d)
            <tr>
                <th>{{ $d->user_id }}</th>
                <th>{{ $d->username }}</th>
                <th>{{ $d->nama }}</th>
                <th>{{ $d->level_id }}</th>
            </tr>
            @endforeach --}}

            {{-- JS 04 - Pratikum 2.2 - Retrieving Single Models --}}
            {{-- <tr>
                <td>{{ $data ->user_id }}</td>
                <td>{{ $data ->username }}</td>
                <td>{{ $data ->nama }}</td>
                <td>{{ $data ->level_id }}</td>
            </tr> --}}
            {{-- --------------------------------------------------- --}}

            {{-- JS 04 - Pratikum 2.3 - Retrieving Aggregrates --}}
            <thead>
                <tr>
                    <th>Jumlah Pengguna</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $data }}</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>