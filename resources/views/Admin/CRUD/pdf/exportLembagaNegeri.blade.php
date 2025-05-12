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

        .status-proses {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-direncanakan {
            background-color: #cce5ff;
            color: #004085;
        }

        .status-ditolak {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>

<body>
    <h3>Laporan Rencana Pembangunan Kelurahan Tanjungrejo Dengan Lembaga Negeri</h3>
    <table id="SimpanPinjam">
        <thead>
            <tr>
                <th>Rencana Pembangunan Pada</th>
                <th>Detail Pembangunan</th>
                <th>Tanggal Dimulai Pembangunan</th>
                <th>Tanggal Selesai Pembangunan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->rw_rencana_pemb }}</td>
                    <td>{{ $row->detail_pemb }}</td>
                    <td>{{ $row->tanggal_dimulai }}</td>
                    <td>{{ $row->tanggal_selesai }}</td>
                    <td
                        class="
                        @if ($row->status === 'Selesai') status-selesai 
                        @elseif($row->status === 'Proses Pengerjaan') status-proses 
                        @elseif($row->status === 'Direncanakan') status-direncanakan 
                        @elseif($row->status === 'Di tolak') status-ditolak @endif">
                        {{ $row->status }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
