<!DOCTYPE html>
<html lang="en">

<head>
    <title>SI-BKM | Pinjam BKM Tanjungrejo</title>
    @include('Layout/header')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('Layout/navbar')
        @include('Layout/sidebar')
        <!-- Main Content Wrapper-->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h5 class="m-0">Pinjam BKM Tanjungrejo</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Program</li>
                                <li class="breadcrumb-item"><a href="/Admin/Pinjam">Pinjam</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Peminjam Dana</h3>
                                </div>
                                <div class="card-body">
                                    @php
                                        $user = Auth::user()->name;
                                    @endphp

                                    @if ($user === 'Admin' || $user === 'Ketua BKM')
                                        <a href="/Admin/Pinjam/Input-Data" class="btn btn-app"
                                            style="left: -10px; top: -10px">
                                            <i class="fas fa-plus"></i> Tambah Data
                                        </a>
                                    @endif
                                    
                                    @if (count($data) > 0)
                                        <a href="/Admin/Pinjam/Export-Data/{{ $data[0]->id }}"
                                            class="btn btn-app" style="left: -10px; top: -10px">
                                            <i class="fa fa-file-pdf"></i> Export Data PDF
                                        </a>
                                    @endif

                                    {{-- @if (count($data) > 0) --}}
                                    {{-- <a href="#" class="btn btn-app"
                                        style="left: -10px; top: -10px">
                                        <i class="fa fa-file-excel"></i> Export Data Excel
                                    </a> --}}
                                    {{-- @endif --}}
                                    <table id="table1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Nama Peminjam</th>
                                                <th class="text-center align-middle">Asal RT/RW</th>
                                                <th class="text-center align-middle">Pinjam</th>
                                                <th class="text-center align-middle">Dibayar</th>
                                                <th class="text-center align-middle">Sisa</th>
                                                <th class="text-center align-middle" style="width: 200px">Jangka Waktu</th>
                                                <th class="text-center align-middle" style="width: 70px">Status</th>
                                                @php
                                                    $user = Auth::user()->name;
                                                @endphp

                                                @if ($user === 'Admin' || $user === 'Ketua BKM')
                                                    <th class="text-center align-middle" style="width: 120px">Aksi</th>
                                                @endif
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
                                                    <td>
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
                                                        <span class="badge {{
                                                            $row->status == 'Lunas' ? 'bg-success' :
                                                            ($row->status == 'Belum Lunas' ? 'bg-danger' :
                                                            ($row->status == 'Lunas + Telat Bayar' ? 'bg-info' : 'bg-warning'))
                                                        }}">
                                                            {{ $row->status }}
                                                        </span>
                                                    </td>
                                                    @php
                                                        $user = Auth::user()->name;
                                                    @endphp

                                                    @if ($user === 'Admin' || $user === 'Ketua BKM')
                                                        <td style="text-align: center">
                                                            <a href="/Admin/Pinjam/Edit-Data/{{ $row->id }}"
                                                                class="btn btn-warning">Edit</a>
                                                            <a href="#" class="btn btn-danger delete"
                                                                data-id="{{ $row->id }}"
                                                                data-asal_rw="{{ $row->asal_rw }}"
                                                                data-detail_kegiatan="{{ $row->detail_kegiatan }}">Hapus</a>
                                                        </td>
                                                    @endif

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        @include('Layout/footer')
    </div>
    @include('Layout/script')
    <script>
        $('.delete').click(function() {
            var id = $(this).attr('data-id');
            var nama_penyimpan = $(this).attr('data-nama_penyimpan');
            Swal.fire({
                title: 'Apakah Kamu Ingin Menghapus Data Ini?',
                text: "Data Peminjam Dengan Nama " + nama_penyimpan + " Akan Dihapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Terhapus!',
                        'Data Telah Terhapus!',
                        'success',
                        window.location = "/Admin/Pinjam/Hapus-Data/" + id + "",
                    )
                }
            });
        });
    </script>
</body>

</html>
