<!DOCTYPE html>
<html lang="en">

<head>
    <title>SI-BKM | Input Data Simpan</title>
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
                            <h5 class="m-0">Input Data Simpan Masyarakat Tanjungrejo</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Program</li>
                                <li class="breadcrumb-item"><a href="/Admin/Simpan-Pinjam">
                                        Simpan Pinjam Warga</a></li>
                                <li class="breadcrumb-item"><a href="/Admin/Simpan-Pinjam/Input-Data">Input Data</a>
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
                                <form action="/Admin/Simpan/Post-Data" method="POST" enctype="multipart/form-data"
                                    id="formInputDataProduktif">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama_penyimpan">Nama Penyimpan</label>
                                            <input type="text" name="nama_penyimpan" class="form-control"
                                                id="Inputnama_penyimpan" placeholder="masukkan nama lengkap...">
                                        </div>
                                        <div class="form-group">
                                            <label>Asal RT/RW</label>
                                            <select class="form-control" name="asal_rt_rw_simpanan" id="asal_rt_rw_simpanan">
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
                                            <label for="simpan">Jumlah Simpan</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="number" name="simpan" class="form-control" id="simpan"
                                                    placeholder="masukkan jumlah simpan...." max="4000000">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ditarik">Jumlah Ditarik</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="number" name="ditarik" class="form-control" id="ditarik"
                                                    placeholder="masukkan jumlah ditarik...." max="4000000">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="sisa_simpanan">Sisa Simpanan</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="number" name="sisa_simpanan" class="form-control"
                                                    id="sisa_simpanan" placeholder="sisa simpanan" max="4000000">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_disimpan">Tanggal Simpan</label>
                                            <input type="date" name="tanggal_disimpan" class="form-control"
                                                id="Inputtanggal_disimpan" placeholder="dd/mm/yyyy">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_ditarik">Tanggal Ditarik</label>
                                            <input type="date" name="tanggal_ditarik" class="form-control"
                                                id="tanggal_ditarik" placeholder="dd/mm/yyyy">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status_simpanan" id="status_simpanan">
                                                <option selected disabled>-- Pilih Status --</option>
                                                <option>Masih Ada Simpanan</option>
                                                <option>Tidak Ada Simpanan (Sudah Ditarik Semua)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/Admin/Simpan" class="btn btn-default">Batal</a>
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
            function calculateSisaSimpanan() {
                const simpan = parseFloat(document.getElementById('simpan').value) || 0;
                const ditarik = parseFloat(document.getElementById('ditarik').value) || 0;
                const sisa = simpan - ditarik;
                document.getElementById('sisa_pinjaman').value = sisa;

                const statusElement = document.getElementById('status_pinjaman');
                if (sisa == 0) {
                    status_simpanan.value = 'Tidak Ada Simpanan (Sudah Ditarik Semua)';
                } else {
                    status_simpanan.value = 'Masih Ada Simpanan';
                }
            }
            $('#formInputDataProduktif').validate({
                rules: {
                    nama_penyimpan: {
                        required: true,
                    },
                    asal_rt_rw: {
                        required: true,
                    },
                    simpan: {
                        required: true,
                        digits: true
                    },
                    ditarik: {
                        required: true,
                        digits: true
                    },
                    sisa: {
                        required: true,
                        digits: true
                    },
                    tanggal_simpan: {
                        required: true,
                        date: true,
                    },
                    tanggal_diatrik: {
                        required: true,
                        date: true
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
