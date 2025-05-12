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

        .status-selesai {
            background-color: #d4edda;
            color: #155724;
        }

        .status-direncanakan {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-belum-dilakukan {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>

<body>
    <h3>Laporan Data Perawatan Di Kelurahan Tanjungrejo</h3>
    <table id="SimpanPinjam">
        <thead>
            <tr>
                <th>RW</th>
                <th>Kategori Perawatan</th>
                <th>Detail Perawatan</th>
                <th>Tanggal Perawatan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->rw }}</td>
                    <td>{{ $row->kategori }}</td>
                    <td>{{ $row->detail_perawatan }}</td>
                    <td>{{ $row->tanggal_perawatan }}</td>
                    <td
                        class="{{ $row->status === 'Sudah Dilakukan' ? 'status-selesai' : ($row->status === 'Direncanakan' ? 'status-direncanakan' : 'status-belum-dilakukan') }}">
                        {{ ucfirst($row->status) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
