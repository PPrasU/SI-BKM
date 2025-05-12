<!DOCTYPE html>
<html lang="en">

<head>
    <title>SI-BKM | Data Wisata dan Studi Banding</title>
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
                            <h5 class="m-0">Wisata dan Studi Banding</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Program</li>
                                <li class="breadcrumb-item"><a href="/Admin/Wisata-StudiBanding">Wisata dan Studi
                                        Banding</a>
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
                                    <h3 class="card-title">Data Wisata atau Studi Banding</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="table4" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>RW</th>
                                                <th>Kategori</th>
                                                <th>Keterangan</th>
                                                <th>Tanggal Dilaksanakan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $row)
                                                <tr>
                                                    <td>{{ $row->rw }}</td>
                                                    <td>{{ $row->kategori }}</td>
                                                    <td>{{ $row->keterangan }}</td>
                                                    <td>{{ $row->tanggal_dilaksanakan }}</td>
                                                    <td>{{ $row->status }}</td>
                                                    <td style="text-align: center">
                                                        <a href="/Admin/Wisata/Edit-Data/{{ $row->id }}"
                                                            class="btn btn-warning">Edit</a>
                                                        <a href="#" class="btn btn-danger delete"
                                                            data-id="{{ $row->id }}" data-rw="{{ $row->rw }}"
                                                            data-keterangan="{{ $row->keterangan }}">Hapus</a>
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
            var rw = $(this).attr('data-rw');
            var keterangan = $(this).attr('data-keterangan');
            Swal.fire({
                title: 'Apakah Kamu Ingin Menghapus Data Ini?',
                text: "Data Abdimas " + rw + " - " + keterangan + " Akan Dihapus",
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
                        window.location = "/Admin/Wisata/Hapus-Data/" + id + "",
                    )
                }
            });
        });
    </script>
</body>

</html>
