<!DOCTYPE html>
<html lang="en">

<head>
    <title>SI-BKM | Edit Data Abdimas Fisik & Non Fisik</title>
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
                            <h5 class="m-0">Edit Data Abdimas Fisik & Non Fisik Masyarakat Tanjungrejo</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Program</li>
                                <li class="breadcrumb-item"><a href="/Admin/Abdimas-Fisik-NonFisik">
                                        Abdimas Fisik & Non Fisik</a></li>
                                <li class="breadcrumb-item"><a href="#">Edit
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
                                <form action="/Admin/Abdimas-Fisik-NonFisik/Update-Data/{{ $data->id }}"
                                    method="POST" enctype="multipart/form-data" id="formInputDataProduktif">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Asal RW</label>
                                            <select class="form-control" name="asal_rw" id="asal_rw"
                                                value="{{ $data->asal_rw }}">
                                                <option selected>{{ $data->asal_rw }}</option>
                                                <option disabled>-- Pilih RW --</option>
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
                                            <select class="form-control" name="kategori_pemberdayaan"
                                                id="kategori_pemberdayaan" value="{{ $data->kategori_pemberdayaan }}">
                                                <option selected>{{ $data->kategori_pemberdayaan }}</option>
                                                <option disabled>-- Pilih Kategori --</option>
                                                <option>Fisik</option>
                                                <option>Non Fisik</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="detail_kegiatan">Detail Kegiatan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="detail_kegiatan" class="form-control"
                                                    id="detail_kegiatan" value="{{ $data->detail_kegiatan }}"
                                                    placeholder="Masukkan Detail Kegiatan....">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_dilakukan">Tanggal Kegiatan Dilakukan</label>
                                            <input type="date" name="tanggal_dilakukan" class="form-control"
                                                id="tanggal_dilakukan" value="{{ $data->tanggal_dilakukan }}"
                                                placeholder="dd/mm/yyyy">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status" id="status"
                                                value="{{ $data->status }}">
                                                <option selected>{{ $data->status }}</option>
                                                <option disabled>-- Pilih Status --</option>
                                                <option>Selesai</option>
                                                <option>Direncanakan</option>
                                                <option>Dibatalkan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/Admin/Abdimas-Fisik-NonFisik" class="btn btn-default">Batal</a>
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
                    kategori_pemberdayaan: {
                        required: true,
                    },
                    detail_kegiatan: {
                        required: true,
                    },
                    tanggal_dilakukan: {
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
