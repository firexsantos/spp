<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        /* Tabel utama */
        .table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        /* Baris ganjil */
        .table tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        /* Baris genap */
        .table tr:nth-child(even) {
            background-color: #ffffff;
        }

        /* Sel di dalam tabel */
        .table td,
        th {
            padding: 8px;
            border: 1px solid #ddd;
        }

        /* Sel header tabel */
        th {
            background-color: #D3D3D3;
            /* color: white; */
            font-weight: bold;
        }

        /* Sel yang dihover */
        .table td:hover,
        th:hover {
            background-color: #ddd;
        }

        /* Tabel dengan border yang lebih tebal */
        .table.table-bordered {
            border: 2px solid #ddd;
        }

        /* Warna border header tabel */
        .table.table-bordered th {
            border: 2px solid #ddd;
        }

        /* Warna border sel di dalam tabel */
        .table.table-bordered td {
            border: 2px solid #ddd;
        }

        /* Tabel yang lebar */
        .table.table-wide {
            width: 100%;
        }

        /* Tabel yang dapat discroll */
        .table.table-scroll {
            max-height: 300px;
            overflow-y: scroll;
        }

        /* Tabel yang menampilkan garis vertikal */
        .table.table-vertical {
            border-collapse: separate;
            border-spacing: 0;
        }

        /* Garis vertikal */
        .table.table-vertical td,
        .table.table-vertical th {
            border-left: 2px solid #ddd;
            border-right: 2px solid #ddd;
        }

        /* Garis vertikal pada kolom pertama */
        .table.table-vertical td:first-child,
        .table.table-vertical th:first-child {
            border-left: none;
        }

        /* Garis vertikal pada kolom terakhir */
        .table.table-vertical td:last-child,
        .table.table-vertical th:last-child {
            border-right: none;
        }
    </style>
    <title>Document</title>
</head>

@php
    $no = 1;
    $total = 0;
@endphp

<body>
    <h2>{{ $title }}</h2>
    <br><br>
    <table>
        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td>{{ $waktu['bulan_dibayar'] }}</td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td>{{ $waktu['tahun_dibayar'] }}</td>
        </tr>
    </table>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Bulan Dibayar</th>
                <th>Tahun Dibayar</th>
                <th>Tanggal Bayar</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            @if ($data)
                @foreach ($data as $d)
                    @php
                        $total += $d->siswa->spp->nominal;
                    @endphp
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->siswa->nama }}</td>
                        <td>{{ $d->siswa->kelas->nama_kelas }}</td>
                        <td>{{ $d->bulan_dibayar }}</td>
                        <td>{{ $d->tahun_dibayar }}</td>
                        <td>{{ $d->tgl_bayar }}</td>
                        <td align="right">Rp. {{ number_format($d->siswa->spp->nominal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="6"><b>Total</b></td>
                    <td align="right"><b>Rp. {{ number_format($total, 0, ',', '.') }}</b></td>
                </tr>
            @else
                <tr>
                    <td colspan="7">Tidak ada laporan untuk bulan dan tahun ini!</td>
                </tr>
            @endif
        </tbody>
    </table>
    <br><br>
    <table width="100%">
        <tr>
            <td width="70%"></td>
            <td align="center">Petugas</td>
        </tr>
        <br><br><br><br>
        <tr>
            <td width="70%"></td>
            <td align="center">{{ $petugas }}</td>
        </tr>
    </table>
</body>

</html>
