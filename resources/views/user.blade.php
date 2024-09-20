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
            {{-- <thead>
                <tr>
                    <th>Jumlah Pengguna</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $data }}</td>
                </tr>
            </tbody> --}}
            {{-- ------------------------------------------------ --}}

            {{-- JS 04 - Pratikum 2.4 - Retieving or Creating Models --}}
            {{-- <tr>
                <td>ID</td>
                <td>Username</td>
                <td>Nama</td>
                <td>ID Level Pengguna</td>
            </tr>
            <tr>
                <td>{{ $data ->user_id }}</td>
                <td>{{ $data ->username }}</td>
                <td>{{ $data ->nama }}</td>
                <td>{{ $data ->level_id }}</td>
            </tr> --}}
            {{-- ---------------------------------------------------- --}}

            {{-- JS 04 - Pratikum 2.6 - Create, Read, Update, Delete (CRUD) --}}
            {{-- <body>
                <a href="{{url('/user/tambah')}}">+ Tambah User</a>
                <table border="1" cellpadding="2" cellspacing="0">
                    <tr>
                        <td>ID</td>
                        <td>Username</td>
                        <td>Nama</td>
                        <td>ID Level Pengguna</td>
                        <td>Aksi</td>
                    </tr>
                    @foreach ($data as $d)
                    <tr>
                        <td>{{ $d->user_id }}</td>
                        <td>{{ $d->username }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->level_id }}</td>
                        <td><a href="{{ url('/user/ubah/' . $d->user_id) }}">Ubah</a> | <a href="{{ url('/user/hapus/' . $d->user_id) }}">Hapus</a></td>
                    </tr>
                    @endforeach
                </table>
            </body> --}}

            {{-- JS 04 - Pratikum 2.7 - Relationship --}}
            <body>
                <a href="{{url('/user/tambah')}}">+ Tambah User</a>
                <table border="1" cellpadding="2" cellspacing="0">
                    <tr>
                        <td>ID</td>
                        <td>Username</td>
                        <td>Nama</td>
                        <td>ID Level Pengguna</td>
                        <td>Kode Level</td>
                        <td>Nama Level</td>
                        <td>Aksi</td>
                    </tr>
                    @foreach ($data as $d)
                    <tr>
                        <td>{{ $d->user_id }}</td>
                        <td>{{ $d->username }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->level_id }}</td>
                        <td>{{ $d->level->level_kode }}</td>
                        <td>{{ $d->level->level_nama }}</td>
                        <td><a href="{{ url('/user/ubah/' . $d->user_id) }}">Ubah</a> | <a href="{{ url('/user/hapus/' . $d->user_id) }}">Hapus</a></td>
                    </tr>
                    @endforeach
                </table>
            </body>
        </table>
    </body>
</html>