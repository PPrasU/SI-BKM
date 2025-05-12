<!DOCTYPE html>
<html lang="en">

<head>
    <title>SI-BKM | Data Abdimas LPPM</title>
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
                            <h5 class="m-0">Abdimas LPPM</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Program</li>
                                <li class="breadcrumb-item"><a href="/Admin/Abdimas-LPPM">Abdimas LPPM</a>
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
                                    <h3 class="card-title">Data Abdimas Masyarakat Dengan LPPM Kampus Di Malang Negeri
                                        dan Swasta
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <a href="/Admin/Abdimas-LPPM/Input-Data" class="btn btn-app"
                                        style="left: -10px; top: -10px">
                                        <i class="fas fa-plus"></i> Tambah Data
                                    </a>
                                    @if (count($data) > 0)
                                        <a href="/Admin/Abdimas-LPPM/Export-Data/{{ $data[0]->id }}"
                                            class="btn btn-app" style="left: -10px; top: -10px">
                                            <i class="fa fa-file-pdf"></i> Export Data PDF
                                        </a>
                                    @endif
                                    <table id="table3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>RW</th>
                                                <th>Abdimas Dengan LPPM</th>
                                                <th>Kegiatan</th>
                                                <th>Jadwal Kegiatan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $row)
                                                <tr>
                                                    <td>{{ $row->asal_rw }}</td>
                                                    <td>{{ $row->lppm }}</td>
                                                    <td>{{ $row->detail_kegiatan }}</td>
                                                    <td>{{ $row->tanggal_dilakukan }}</td>
                                                    <td>{{ $row->status }}</td>
                                                    <td style="text-align: center">
                                                        <a href="/Admin/Abdimas-LPPM/Edit-Data/{{ $row->id }}"
                                                            class="btn btn-warning">Edit</a>
                                                        <a href="#" class="btn btn-danger delete"
                                                            data-id="{{ $row->id }}"
                                                            data-asal_rw="{{ $row->asal_rw }}"
                                                            data-lppm="{{ $row->lppm }}"
                                                            data-detail_kegiatan="{{ $row->detail_kegiatan }}">Hapus</a>
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
            var asal_rw = $(this).attr('data-asal_rw');
            var detail_kegiatan = $(this).attr('data-detail_kegiatan');
            var lppm = $(this).attr('data-lppm');
            Swal.fire({
                title: 'Apakah Kamu Ingin Menghapus Data Ini?',
                text: "Data abdimas LPPM dari " + asal_rw + " - dengan " + lppm + " Akan Dihapus",
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
                        window.location = "/Admin/Abdimas-LPPM/Hapus-Data/" + id + "",
                    )
                }
            });
        });
    </script>
</body>

</html>
