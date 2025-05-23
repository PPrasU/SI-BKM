<!DOCTYPE html>
<html lang="en">

<head>
    <title>SI-BKM | Input Data Wisata atau Studi Banding</title>
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
                            <h5 class="m-0">Input Data Wisata atau Studi Banding</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Program</li>
                                <li class="breadcrumb-item"><a href="/Admin/Wisata">
                                        Abdimas Fisik & Non Fisik</a></li>
                                <li class="breadcrumb-item"><a href="/Admin/Wisata/Input-Data">Input
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
                            <div class="card card-primary">
                                <div class="card-header" style="height: 1px;">
                                </div>
                                <form action="/Admin/Wisata/Post-Data" method="POST"
                                    enctype="multipart/form-data" id="formInputDataProduktif">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Asal RW</label>
                                            <select class="form-control" name="rw" id="rw">
                                                <option disabled selected>-- Pilih RW --</option>
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
                                            <label>Kategori</label>
                                            <select class="form-control" name="kategori"
                                                id="kategori" >
                                                <option disabled selected>-- Pilih Kategori --</option>
                                                <option>Wisata</option>
                                                <option>Studi Banding</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">Detail Kegiatan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="keterangan" class="form-control"
                                                    id="keterangan"
                                                    placeholder="Masukkan Detail Kegiatan....">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_dilaksanakan">Tanggal Kegiatan Dilakukan</label>
                                            <input type="date" name="tanggal_dilaksanakan" class="form-control"
                                                id="tanggal_dilaksanakan"
                                                placeholder="dd/mm/yyyy">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option selected disabled>-- Pilih Status --</option>
                                                <option>Selesai</option>
                                                <option>Direncanakan</option>
                                                <option>Dibatalkan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/Admin/Wisata" class="btn btn-default">Batal</a>
                                        <button type="submit" class="btn btn-primary">Perbarui</button>
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
            $('#formInputDataProduktif').validate({
                rules: {
                    asal_rw: {
                        required: true,
                    },
                    kategori: {
                        required: true,
                    },
                    keterangan: {
                        required: true,
                    },
                    tanggal_dilaksanakan: {
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
