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
            padding: 6px 12px;
            border-radius: 4px;
            display: inline-block;
        }

        .status-belum-lunas {
            background-color: #f8d7da;
            color: #721c24;
            padding: 6px 12px;
            border-radius: 4px;
            display: inline-block;
        }

        .status-lunas-telat {
            background-color: #d1ecf1;
            color: #0c5460;
            padding: 6px 12px;
            border-radius: 4px;
            display: inline-block;
        }

        .status-belum-lunas-telat {
            background-color: #fff3cd;
            color: #856404;
            padding: 6px 12px;
            border-radius: 4px;
            display: inline-block;
        }

    </style>
</head>

<body>
    <h3>Laporan Data Simpan Pinjam Kelurahan Tanjungrejo</h3>
    <table id="SimpanPinjam">
        <thead>
            <tr>
                <th class="text-center align-middle">Nama Peminjam</th>
                <th class="text-center align-middle">Asal RT/RW</th>
                <th class="text-center align-middle">Pinjam</th>
                <th class="text-center align-middle">Dibayar</th>
                <th class="text-center align-middle">Sisa</th>
                <th class="text-center align-middle" style="width: 200px">Jangka Waktu</th>
                <th class="text-center align-middle" style="width: 70px">Status</th>
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
                    <td style="font-size: 14px">
                        @php
                            $mulai = \Carbon\Carbon::parse($row->tanggal_pinjam);
                            $selesai = \Carbon\Carbon::parse($row->tenggat);
                            $totalHari = $mulai->diffInDays($selesai) + 1; // +1 jika ingin inklusif (termasuk hari mulai & selesai)
                        @endphp

                        {{ $mulai->translatedFormat('d F Y') }} s/d {{ $selesai->translatedFormat('d F Y') }}
                        <br>
                        Total: {{ $totalHari }} hari
                    </td>
                    <td class="text-center align-middle">
                        <span class="badge
                            {{ $row->status == 'Lunas' ? 'status-lunas' : 
                               ($row->status == 'Belum Lunas' ? 'status-belum-lunas' : 
                               ($row->status == 'Lunas + Telat Bayar' ? 'status-lunas-telat' : 'status-belum-lunas-telat')) }}">
                            {{ $row->status }}
                        </span>
                    </td>                    
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
