<!DOCTYPE html>
<html lang="en">

<head>
    <title>SI-BKM | Simpan BKM Tanjungrejo</title>
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
                            <h5 class="m-0">Simpan BKM Tanjungrejo</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Program</li>
                                <li class="breadcrumb-item">Simpan Pinjam</li>
                                <li class="breadcrumb-item"><a href="/Admin/Simpan">Simpan</a></li>
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
                                    <h3 class="card-title">Data Penyimpan Dana</h3>
                                </div>
                                <div class="card-body">
                                    @php
                                        $user = Auth::user()->name;
                                    @endphp

                                    @if ($user === 'Admin' || $user === 'Ketua BKM')
                                        <a href="/Admin/Simpan/Input-Data" class="btn btn-app"
                                            style="left: -10px; top: -10px">
                                            <i class="fas fa-plus"></i> Tambah Data
                                        </a>
                                    @endif
                                    @if (count($data) > 0)
                                        <a href="/Admin/Simpan/Export-Data/{{ $data[0]->id }}" class="btn btn-app"
                                            style="left: -10px; top: -10px">
                                            <i class="fa fa-file-pdf"></i> Export Data PDF
                                        </a>
                                    @endif

                                    {{-- @if (count($data) > 0) --}}
                                    {{-- <a href="#" class="btn btn-app"
                                        style="left: -10px; top: -10px">
                                        <i class="fa fa-file-excel"></i> Export Data Excel
                                    </a> --}}
                                    {{-- @endif --}}
                                    <table id="table2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nama Penyimpan</th>
                                                <th>Asal RT/RW</th>
                                                <th>Simpan</th>
                                                <th>Ditarik</th>
                                                <th>Sisa</th>
                                                <th>Tanggal Simpan</th>
                                                <th>Tanggal Ditarik</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $row)
                                                <tr>
                                                    <td>{{ $row->nama_penyimpan }}</td>
                                                    <td>{{ $row->asal_rt_rw_simpanan }}</td>
                                                    <td>{{ $row->simpan }}</td>
                                                    <td>{{ $row->ditarik }}</td>
                                                    <td>{{ $row->sisa_simpanan }}</td>
                                                    <td>{{ $row->tanggal_disimpan }}</td>
                                                    <td>{{ $row->tanggal_ditarik }}</td>
                                                    <td>{{ $row->status_simpanan }}</td>
                                                    <td style="text-align: center">
                                                        <a href="/Admin/Simpan/Edit-Data/{{ $row->id }}"
                                                            class="btn btn-warning">Edit</a>
                                                        <a href="#" class="btn btn-danger delete"
                                                            data-id="{{ $row->id }}"
                                                            data-nama_penyimpan="{{ $row->nama_penyimpan }}">Hapus</a>
                                                    </td>
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
                        window.location = "/Admin/Simpan/Hapus-Data/" + id + "",
                    )
                }
            });
        });
    </script>
</body>

</html>
