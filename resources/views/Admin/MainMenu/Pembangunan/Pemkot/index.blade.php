<!DOCTYPE html>
<html lang="en">

<head>
    <title>SI-BKM | Data Pemkot</title>
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
                            <h5 class="m-0">Rencana Pembangunan Dengan Pemkot</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Program</li>
                                <li class="breadcrumb-item"><a href="/Admin/Pemkot">Pemkot</a>
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
                                    <h3 class="card-title">Data Rencana Pembangunan Dengan Pemkot</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <a href="/Admin/Pembangunan/Pemkot/Input-Data" class="btn btn-app"
                                        style="left: -10px; top: -10px">
                                        <i class="fas fa-plus"></i> Tambah Data
                                    </a>
                                    @if (count($data) > 0)
                                        <a href="/Admin/Pemkot/Export-Data/{{ $data[0]->id }}"
                                            class="btn btn-app" style="left: -10px; top: -10px">
                                            <i class="fa fa-file-pdf"></i> Export Data PDF
                                        </a>
                                    @endif
                                    <table id="table4" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Rencana Pembangunan Pada</th>
                                                <th>Detail Pembangunan</th>
                                                <th>Tanggal Dimulai Pembangunan</th>
                                                <th>Tanggal Selesai Pembangunan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $row)
                                                <tr>
                                                    <td>{{ $row->rw_rencana_pemb }}</td>
                                                    <td>{{ $row->detail_pemb }}</td>
                                                    <td>{{ $row->tanggal_dimulai }}</td>
                                                    <td>{{ $row->tanggal_selesai }}</td>
                                                    <td>{{ $row->status }}</td>
                                                    <td style="text-align: center">
                                                        <a href="/Admin/Pembangunan/Pemkot/Edit-Data/{{ $row->id }}"
                                                            class="btn btn-warning">Edit</a>
                                                        <a href="#" class="btn btn-danger delete"
                                                            data-id="{{ $row->id }}"
                                                            data-rw_rencana_pemb="{{ $row->rw_rencana_pemb }}"
                                                            data-detail_pemb="{{ $row->detail_pemb }}">Hapus</a>
                                                    </td>
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
                        window.location = "/Admin/Pemkot/Hapus-Data/" + id + "",
                    )
                }
            });
        });
    </script>
</body>

</html>
