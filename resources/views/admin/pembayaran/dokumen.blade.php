<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pembayaran SPP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Pembayaran SPP</h4>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Bayar Untuk Bulan</th>
                <th>Tahun</th>
                <th>Jumlah</th>
                <th>Waktu Dibayar</th>
                <th>Petugas</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($pembayarans as $pembayaran)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $pembayaran->siswa_id }}</td>
                {{-- <td>{{ !empty($pembayaran->siswa->nisn) ? $pembayaran->siswa->nama:'-' }}</td> --}}
                <td>{{ $pembayaran->bulan }}</td>
                <td>{{ $pembayaran->spp->tahun }}</td>
                <td>{{ $pembayaran->spp->nominal }}</td>
                <td>{{ $pembayaran->created_at->isoFormat('dddd, D MMMM Y') }}</td>
                <td>{{ $pembayaran->user->nama }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>