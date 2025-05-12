<!DOCTYPE html>
<html lang="en">

<head>
    <title>SI-BKM | Data Rencana MOU Dengan Kampus</title>
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
                            <h5 class="m-0">Rencana MOU Dengan Kampus </h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Program</li>
                                <li class="breadcrumb-item"><a href="/Admin/MOU-Kampus">MOU Kampus</a>
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
                                    <h3 class="card-title">Data Rencana MOU</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="table4" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>RW</th>
                                                <th>Kategori MOU</th>
                                                <th>Detail Kegiatan MOU</th>
                                                <th>Lokasi</th>
                                                <th>Tanggal Pelaksanaan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>RW 01</td>
                                                <td>Kampus / Universitas</td>
                                                <td>Kegiatan MOU warga RW 01 dengan Institut Teknologi Nasional Malang
                                                    yaitu dilakukannya..........</td>
                                                <td>Institut Teknologi Nasional Malang</td>
                                                <td>24 Mei 2024</td>
                                            </tr>
                                            <tr>
                                                <td>RW 02</td>
                                                <td>Kampus / Universitas</td>
                                                <td>Kegiatan MOU warga RW 01 dengan Universitas Negeri Malang yaitu
                                                    dilakukannya..........</td>
                                                <td>Universitas Negeri Malang</td>
                                                <td>24 Mei 2024</td>
                                            </tr>
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
</body>

</html>
