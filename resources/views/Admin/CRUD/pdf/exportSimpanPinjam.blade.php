<!DOCTYPE html>
<html>

<head>
    <style>
        @page {
            size: A4 landscape;
            margin: 20mm;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 20px;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #00aaff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .status-lunas {
            background-color: #d4edda;
            color: #155724;
        }

        .status-belum-lunas {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>

<body>
    <h3>Laporan Data Simpan Pinjam Kelurahan Tanjungrejo</h3>
    <table id="SimpanPinjam">
        <thead>
            <tr>
                <th>Nama Peminjam</th>
                <th>Asal RT/RW</th>
                <th>Pinjam</th>
                <th>Dibayar</th>
                <th>Sisa</th>
                <th>Tanggal Pinjam</th>
                <th>Tenggat Bayar Terakhir</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->nama_peminjam }}</td>
                    <td>{{ $row->asal_rt_rw }}</td>
                    <td>{{ $row->pinjam }}</td>
                    <td>{{ $row->dibayar }}</td>
                    <td>{{ $row->sisa }}</td>
                    <td>{{ $row->tanggal_pinjam }}</td>
                    <td>{{ $row->tenggat }}</td>
                    <td class="{{ $row->status === 'Lunas' ? 'status-lunas' : 'status-belum-lunas' }}">
                        {{ ucfirst($row->status) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
