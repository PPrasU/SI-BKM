<!DOCTYPE html>
<html lang="en">

<head>
    <title>SI-BKM | Data Penguatan UMKM</title>
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
                            <h5 class="m-0">Penguatan UMKM</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Program</li>
                                <li class="breadcrumb-item"><a href="/Admin/Penguatan-UMKM">Penguatan UMKM</a>
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
                                    <h3 class="card-title">Data Penguatan UMKM Masyarakat Tanjungrejo</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    @php
                                        $user = Auth::user()->name;
                                    @endphp

                                    @if ($user === 'Admin' || $user === 'Ketua BKM')
                                        <a href="/Admin/Penguatan-UMKM/Input-Data" class="btn btn-app"
                                            style="left: -10px; top: -10px">
                                            <i class="fas fa-plus"></i> Tambah Data
                                        </a>
                                    @endif
                                    @if (count($data) > 0)
                                        <a href="/Admin/Penguatan-UMKM/Export-Data/{{ $data[0]->id }}"
                                            class="btn btn-app" style="left: -10px; top: -10px">
                                            <i class="fa fa-file-pdf"></i> Export Data PDF
                                        </a>
                                    @endif
                                    <table id="table4" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">RW</th>
                                                <th class="text-center align-middle">Detail Kegiatan Penguatan UMKM</th>
                                                <th class="text-center align-middle">Tanggal Pelaksanaan</th>
                                                <th class="text-center align-middle">Status</th>
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
                                                    <td>{{ $row->rw }}</td>
                                                    <td>{{ $row->detail_penguatan_umkm }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($row->tanggal_dilakukan)->translatedFormat('d F Y') }}</td>
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
                                                            <a href="/Admin/Penguatan-UMKM/Edit-Data/{{ $row->id }}"
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
            var rw = $(this).attr('data-rw');
            var detail_penguatan_umkm = $(this).attr('data-detail_penguatan_umkm');
            Swal.fire({
                title: 'Apakah Kamu Ingin Menghapus Data Ini?',
                text: "Data Penguatan UMKM " + rw + " - " + detail_penguatan_umkm + " Akan Dihapus",
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
                        window.location = "/Admin/Penguatan-UMKM/Hapus-Data/" + id + "",
                    )
                }
            });
        });
    </script>
</body>

</html>
