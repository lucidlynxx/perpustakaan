<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Perpustakaan</title>
</head>
<body>
    <style type="text/css">
        table {
            font-family: sans-serif;
            color: #454545;
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid rgb(135, 135, 135);
            padding: 8px 20px;
        }

        h1, h2 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 25px;
        }
        
        h2 {
            font-weight: normal;
            font-size: 20px
        }
    </style>    
    <center>
        <h1>LAPORAN DATA PEMINJAMAN (Status pinjam)</h1>
        <h2>Perpustakaan SMP Negeri 21 Tasikmalaya</h2>
    </center>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Judul</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
                <th>Terlambat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pinjams as $pinjam)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pinjam->siswa->nama }}</td>
                <td>{{ $pinjam->buku->judul }}</td>
                <td>{{ date('d M Y', strtotime($pinjam->tglPinjam)); }}</td>
                <td>{{ date('d M Y', strtotime($pinjam->tglKembali)); }}</td>
                <td>{{ $pinjam->status }}</td>
                @if ($pinjam->tglKembali < $current->format('Y-m-d'))
                    <td>{{ $pinjam->tglKembali->longAbsoluteDiffForHumans(); }}</td>
                @else
                    <td>0 hari</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>