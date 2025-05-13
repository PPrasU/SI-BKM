<!DOCTYPE html>
<html lang="en">

<head>
    <title>SI-BKM | Data Lembaga Negeri</title>
    @include('Layout/header')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('Layout/preloader')
        @include('Layout/navbar')
        @include('Layout/sidebar')
        <!-- Main Content Wrapper-->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h5 class="m-0">Rencana Pembangunan Dengan Lembaga Negeri</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Program</li>
                                <li class="breadcrumb-item"><a href="/Admin/Lembaga-Negeri">Lembaga Negeri</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Rencana Pembangunan</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    @php
                                        $user = Auth::user()->name;
                                    @endphp

                                    @if ($user === 'Admin' || $user === 'Ketua BKM')
                                        <a href="/Admin/Pembangunan/Lembaga-Negeri/Input-Data" class="btn btn-app"
                                            style="left: -10px; top: -10px">
                                            <i class="fas fa-plus"></i> Tambah Data
                                        </a>
                                    @endif
                                    @if (count($data) > 0)
                                        <a href="/Admin/Lembaga-Negeri/Export-Data/{{ $data[0]->id }}"
                                            class="btn btn-app" style="left: -10px; top: -10px">
                                            <i class="fa fa-file-pdf"></i> Export Data PDF
                                        </a>
                                    @endif
                                    <table id="table4" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Lokasi</th>
                                                <th class="text-center align-middle">Detail Pembangunan</th>
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
                                                    <td>{{ $row->rw_rencana_pemb }}</td>
                                                    <td>{{ $row->detail_pemb }}</td>
                                                    <td>
                                                        @php
                                                            $mulai = \Carbon\Carbon::parse($row->tanggal_dimulai);
                                                            $selesai = \Carbon\Carbon::parse($row->tanggal_selesai);
                                                            $totalHari = $mulai->diffInDays($selesai) + 1; // +1 jika ingin inklusif (termasuk hari mulai & selesai)
                                                        @endphp

                                                        {{ $mulai->translatedFormat('d F Y') }} s/d {{ $selesai->translatedFormat('d F Y') }}
                                                        <br>
                                                        Total: {{ $totalHari }} hari
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <span class="badge {{
                                                            $row->status == 'Selesai' ? 'bg-success' :
                                                            ($row->status == 'Dibatalkan' ? 'bg-danger' :
                                                            ($row->status == 'Direncanakan' ? 'bg-info' : 'bg-warning'))
                                                        }}">
                                                            {{ $row->status }}
                                                        </span>
                                                    </td>
                                                    @php
                                                        $user = Auth::user()->name;
                                                    @endphp

                                                    @if ($user === 'Admin' || $user === 'Ketua BKM')
                                                        <td style="text-align: center">
                                                            <a href="/Admin/Lembaga-Negeri/Edit-Data/{{ $row->id }}"
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
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @include('Layout/footer')
    </div>

    @include('Layout/script')
    <script>
        $('.delete').click(function() {
            var id = $(this).attr('data-id');
            var rw_rencana_pemb = $(this).attr('data-rw_rencana_pemb');
            var detail_pemb = $(this).attr('data-detail_pemb');
            Swal.fire({
                title: 'Apakah Kamu Ingin Menghapus Data Ini?',
                text: "Data pembangunan " + rw_rencana_pemb + " - " + detail_pemb + " Akan Dihapus",
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
                        window.location = "/Admin/Lembaga-Negeri/Hapus-Data/" + id + "",
                    )
                }
            });
        });
    </script>
</body>

</html>
