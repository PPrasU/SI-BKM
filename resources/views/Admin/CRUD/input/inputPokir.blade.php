<!DOCTYPE html>
<html lang="en">

<head>
    <title>SI-BKM | Input Data Rencana Pembangunan Dengan Pokir</title>
    @include('Layout/header')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('Layout/preloader')
        @include('Layout/navbar')
        @include('Layout/sidebar')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h5 class="m-0">Input Data Rencana Pembangunan Dengan Pokir</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Program</li>
                                <li class="breadcrumb-item"><a href="/Admin/Pembangunan/Pokir">Pokir</a></li>
                                <li class="breadcrumb-item"><a href="/Admin/Pembangunan/PokirInput-Data">Input
                                        Data</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-success">
                                <div class="card-header" style="height: 1px;">
                                </div>
                                <form action="/Admin/Pembangunan/Pokir/Post-Data" method="POST" enctype="multipart/form-data"
                                    id="form">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Asal RW Yang Mengajukan Rencana Pembangunan</label>
                                            <select class="form-control" name="rw_rencana_pemb" id="rw_rencana_pemb">
                                                <option selected disabled>-- Pilih RW --</option>
                                                <option>RW 01</option>
                                                <option>RW 02</option>
                                                <option>RW 03</option>
                                                <option>RW 04</option>
                                                <option>RW 05</option>
                                                <option>RW 06</option>
                                                <option>RW 07</option>
                                                <option>RW 08</option>
                                                <option>RW 09</option>
                                                <option>RW 10</option>
                                                <option>RW 11</option>
                                                <option>RW 12</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pokir</label>
                                            <select class="form-control" name="pokir" id="pokir">
                                                <option selected>Pokir</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="detail_pemb">Detail Pembangunan</label>
                                            <textarea type="text" name="detail_pemb" class="form-control" id="detail_pemb" rows="3"
                                                placeholder="Masukkan detail pembangunan...."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_dimulai">Tanggal Dimulai Pembangunan</label>
                                            <input type="date" name="tanggal_dimulai" class="form-control"
                                                id="tanggal_dimulai" placeholder="dd/mm/yyyy">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_selesai">Tanggal Selesai Pembangunan</label>
                                            <input type="date" name="tanggal_selesai" class="form-control"
                                                id="tanggal_selesai" placeholder="dd/mm/yyyy">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option selected disabled>-- Pilih Status --</option>
                                                <option>Selesai</option>
                                                <option>Proses Pengerjaan</option>
                                                <option>Direncanakan</option>
                                                <option>Di Tolak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/Admin/Pembangunan/Pokir" type="submit"
                                            class="btn btn-default">Batal</a>
                                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                                    </div>
                                </form>
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
        $(function() {
            // $.validator.setDefaults({
            //     submitHandler: function() {
            //         alert("Data Produktifitas Berhasil Di Input");
            //     }
            // });
            $('#form').validate({
                rules: {
                    rw_rencana_pemb: {
                        required: true,
                    },
                    pokir: {
                        required: true,
                    },
                    detail_pemb: {
                        required: true,
                    },
                    tanggal_dimulai: {
                        required: true,
                    },
                    tanggal_selesai: {
                        required: true,
                    },
                    status: {
                        required: true,
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
</body>

</html>
