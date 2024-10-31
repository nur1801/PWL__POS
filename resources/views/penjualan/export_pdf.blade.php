<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 6px 20px 5px 20px;
            line-height: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            page-break-inside: auto;
        }

        td,
        th {
            padding: 8px;
            text-align: center;
        }

        th {
            text-align: center;
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr {
            page-break-inside: avoid; /* Mencegah baris terpotong di halaman berikutnya */
        }

        .d-block {
            display: block;
        }

        img.image {
            width: auto;
            height: 80px;
            max-width: 150px;
            max-height: 150px;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .p-1 {
            padding: 5px 1px 5px 1px;
        }

        .font-10 {
            font-size: 10pt;
        }

        .font-11 {
            font-size: 11pt;
        }

        .font-12 {
            font-size: 12pt;
        }

        .font-13 {
            font-size: 13pt;
        }

        .border-bottom-header {
            border-bottom: 1px solid;
        }

        .border-all,
        .border-all th,
        .border-all td {
            border: 1px solid black;
        }

        .border-all td {
            vertical-align: middle;
        }

        /* Mencegah baris dengan penjualan kode yang sama terpecah */
        tbody tr {
            page-break-inside: avoid;
        }

        /* Jika ingin menghindari halaman pecah di tengah transaksi secara keseluruhan */
        tbody {
            page-break-before: auto;
            page-break-after: auto;
        }
    </style>
</head>

<body>
    <table class="border-bottom-header">
        <tr>
            <td width="15%" class="text-center">
                <img class="image" id="image" src="{{ public_path('polinema-bw.png') }}">
            </td>
            <td width="85%">
                <span class="text-center d-block font-11 font-bold mb-1">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN
                    TEKNOLOGI</span>
                <span class="text-center d-block font-13 font-bold mb-1">POLITEKNIK NEGERI MALANG</span>
                <span class="text-center d-block font-10">Jl. Soekarno-Hatta No. 9 Malang 65141</span>
                <span class="text-center d-block font-10">Telepon (0341) 404424 Pes. 101-105, 0341-404420, Fax. (0341)
                    404420</span>
                <span class="text-center d-block font-10">Laman: www.polinema.ac.id</span>
            </td>
        </tr>
    </table>

    <h3 class="text-center">LAPORAN DATA PENJUALAN</h3>
    <table class="border-all">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Kode Penjualan</th>
                <th>Tanggal Penjualan</th>
                <th>Nama User</th>
                <th>Pembeli</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1; // Inisialisasi variabel no untuk penomoran baris
                $rowCount = 0;
                $pageLimit = 20; // Atur limit jumlah baris per halaman
            @endphp

            @foreach ($penjualan as $penj)
                @php
                    $totalDetails = count($penj->penjualan_detail);
                    $rowCount += $totalDetails;

                    // Jika melebihi batas halaman, buat page break sebelum transaksi baru
                    if ($rowCount > $pageLimit) {
                        echo '<div style="page-break-before: always;"></div>';
                        $rowCount = $totalDetails; // Reset row count ke jumlah baris transaksi baru
                    }
                @endphp

                @foreach ($penj->penjualan_detail as $key => $detail)
                    <tr>
                        @if ($key == 0)
                            <td rowspan="{{ $totalDetails }}" class="text-center">{{ $no++ }}</td>
                            <td rowspan="{{ $totalDetails }}">{{ $penj->penjualan_kode }}</td>
                            <td rowspan="{{ $totalDetails }}">{{ $penj->penjualan_tanggal }}</td>
                            <td rowspan="{{ $totalDetails }}">{{ $penj->user->nama }}</td>
                            <td rowspan="{{ $totalDetails }}">{{ $penj->pembeli }}</td>
                        @endif
                        <td>{{ $detail->barang->barang_nama }}</td>
                        <td>{{ $detail->jumlah }}</td>
                        <td>{{ $detail->harga }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>

</html>