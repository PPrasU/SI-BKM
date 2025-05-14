<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Export Data</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 1.27cm;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            position: relative;
        }
        h2 {
            text-align: center;
            font-size: 14px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            font-size: 11px;
            vertical-align: middle;
        }
        th {
            font-size: 12px;
            text-align: center;
            background-color: #f2f2f2;
        }
        td {
            text-align: center;
        }
        .justify {
            text-align: justify;
        }
        .status-selesai {
            background-color: #28A745;
            color: #fff;
        }
        .status-direncanakan {
            background-color: #17A2B8;
            color: #fff;
        }
        .status-dibatalkan {
            background-color: #DC3545;
            color: #fff;
        }
        .status-lainnya {
            background-color: #FFC107;
            color: #000;
        }
        .footer {
            position: absolute;
            bottom: 0;
            right: 0;
            font-size: 10px;
        }

        /* .with-watermark {
            background-image: url('{{ asset('img/image.jpg') }}');
            background-repeat: no-repeat;
            background-position: center;
            background-size: 70%;
            opacity: 1;
        } */

    </style>
</head>
<body class="with-watermark">

    <h2>Data Abdimas Pemberdayaan Fisik dan Non Fisik</h2>

    <table>
        <thead>
            <tr>
                <th>RW</th>
                <th>Kategori Pemberdayaan</th>
                <th>Detail Kegiatan</th>
                <th>Tanggal Pelaksanaan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                @php
                    $statusClass = match($row->status) {
                        'Selesai' => 'status-selesai',
                        'Direncanakan' => 'status-direncanakan',
                        'Dibatalkan' => 'status-dibatalkan',
                        default => 'status-lainnya'
                    };

                    // Ambil hanya angka dari RW
                    $rw = preg_replace('/[^0-9]/', '', $row->asal_rw);
                @endphp
                <tr>
                    <td>{{ $rw }}</td>
                    <td>{{ $row->kategori_pemberdayaan }}</td>
                    <td class="justify">{{ $row->detail_kegiatan }}</td>
                    <td>{{ \Carbon\Carbon::parse($row->tanggal_dilakukan)->translatedFormat('d F Y') }}</td>
                    <td class="{{ $statusClass }}">{{ $row->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada {{ \Carbon\Carbon::now()->translatedFormat('j F Y') }} - Jam: {{ \Carbon\Carbon::now()->format('H:i:s') }} (SI-BKM Development Team)
    </div>

</body>
</html>
