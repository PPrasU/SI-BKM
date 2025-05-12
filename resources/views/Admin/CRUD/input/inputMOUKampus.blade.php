<!DOCTYPE html>
<html lang="en">

<head>
    <title>SI-BKM | Input Data MOU Dengan Kampus Negeri Maupun Swasta</title>
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
                            <h5 class="m-0">Input Data MOU Dengan Kampus Negeri Maupun Swasta</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Program</li>
                                <li class="breadcrumb-item"><a href="/Admin/Abdimas-Fisik-NonFisik">
                                        MOU Kampus</a></li>
                                <li class="breadcrumb-item"><a href="/Admin/Abdimas-Fisik-NonFisik/Input-Data">Input
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
                                <form id="formInputDataProduktif">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="namaPeminjam">Nama Peminjam</label>
                                            <input type="text" name="namaPeminjam" class="form-control"
                                                id="InputnamaPeminjam" placeholder="masukkan nama lengkap...">
                                        </div>
                                        <div class="form-group">
                                            <label>Asal RT/RW</label>
                                            <select class="form-control" name="pilihRW" id="pilihRW">
                                                <option selected disabled>-- Pilih RT/RW --</option>
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
                                            <label for="jmlPinjaman">Jumlah Pinjaman</label>
                                            <input type="number" name="jmlPinjaman" class="form-control"
                                                id="InputjmlPinjaman" placeholder="masukkan jumlah pinjaman....">
                                        </div>
                                        <div class="form-group">
                                            <label for="jmlDibayar">Jumlah Dibayar</label>
                                            <input type="number" name="jmlDibayar" class="form-control"
                                                id="InputjmlDibayar" placeholder="masukkan jumlah dibayar....">
                                        </div>
                                        <div class="form-group">
                                            <label for="sisaPinjaman">Sisa Pinjaman</label>
                                            <input type="number" name="sisaPinjaman" class="form-control"
                                                id="InputsisaPinjaman" placeholder="sisa pinjaman">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggalPinjam">Tanggal Pinjaman</label>
                                            <input type="date" name="tanggalPinjam" class="form-control"
                                                id="InputtanggalPinjam" placeholder="dd/mm/yyyy">
                                        </div>
                                        <div class="form-group">
                                            <label for="tenggatBayar">Tenggat Bayar Terakhir Pinjaman</label>
                                            <input type="date" name="tenggatBayar" class="form-control"
                                                id="InputtenggatBayar" placeholder="dd/mm/yyyy">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/Admin/Abdimas-Fisik-NonFisik" type="submit"
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
            $('#formInputDataProduktif').validate({
                rules: {
                    namaPeminjam: {
                        required: true,
                    },
                    pilihRW: {
                        required: true,
                    },
                    jmlPinjaman: {
                        required: true,
                        digits: true
                    },
                    jmlDibayar: {
                        required: true,
                        digits: true
                    },
                    sisaPinjaman: {
                        required: true,
                        digits: true
                    },
                    tanggalPinjam: {
                        required: true,
                        date: true,
                    },
                    tenggatBayar: {
                        required: true,
                        date: true
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
