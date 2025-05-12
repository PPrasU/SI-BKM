<!DOCTYPE html>
<html lang="en">

<head>
    <title>SI-BKM | Input Data Pinjam</title>
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
                            <h5 class="m-0">Input Data Pinjam Masyarakat Tanjungrejo</h5>
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
                                <form action="/Admin/Pinjam/Post-Data" method="POST"
                                    enctype="multipart/form-data" id="formInputDataProduktif">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama_peminjam">Nama Peminjam</label>
                                            <input type="text" name="nama_peminjam" class="form-control"
                                                id="Inputnama_peminjam" placeholder="masukkan nama lengkap...">
                                        </div>
                                        <div class="form-group">
                                            <label>Asal RT/RW</label>
                                            <select class="form-control" name="asal_rt_rw" id="asal_rt_rw">
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
                                        <!-- Input Jumlah Pinjaman -->
                                        <div class="form-group">
                                            <label for="pinjam_display">Jumlah Pinjaman</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="text" id="pinjam_display" class="form-control" placeholder="masukkan jumlah pinjaman...." >
                                                <input type="hidden" name="pinjam" id="pinjam" >
                                                <small id="dibayar_error" class="form-text text-danger d-none">Maksimal Rp. 4.000.000</small>
                                            </div>
                                        </div>
                                        <!-- Input Jumlah Dibayar -->
                                        <div class="form-group">
                                            <label for="dibayar_display">Jumlah Dibayar</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="text" id="dibayar_display" class="form-control" placeholder="masukkan jumlah dibayar...." >
                                                <input type="hidden" name="dibayar" id="dibayar" >
                                            </div>
                                        </div>
                                        <!-- Input Sisa Pinjaman -->
                                        <div class="form-group">
                                            <label for="sisa_display">Sisa Pinjaman</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="text" id="sisa_display" class="form-control" placeholder="sisa pinjaman" readonly >
                                                <input type="hidden" name="sisa" id="sisa" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_pinjam">Tanggal Pinjaman</label>
                                            <input type="date" name="tanggal_pinjam" class="form-control"
                                                id="Inputtanggal_pinjam" placeholder="dd/mm/yyyy">
                                        </div>
                                        <div class="form-group">
                                            <label for="tenggat">Tenggat Bayar Terakhir Pinjaman</label>
                                            <input type="date" name="tenggat" class="form-control" id="Inputtenggat"
                                                placeholder="dd/mm/yyyy">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input type="text" class="form-control" name="status" id="status" readonly>
                                        </div>                                        
                                    </div>
                                    <div class="card-footer">
                                        <a href="/Admin/Pinjam" class="btn btn-default">Batal</a>
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
            $('#formInputDataProduktif').validate({
                rules: {
                    nama_peminjam: {
                        required: true,
                    },
                    asal_rt_rw: {
                        required: true,
                    },
                    pinjam: {
                        required: true,
                        digits: true
                    },
                    dibayar: {
                        required: true,
                        digits: true
                    },
                    sisa: {
                        required: true,
                        digits: true
                    },
                    tanggal_pinjam: {
                        required: true,
                        date: true,
                    },
                    tenggat: {
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

    <script>
        $(function() {
            function hitungStatus() {
                const sisa = parseInt(document.getElementById('sisa').value || 0);
                const tenggat = new Date(document.getElementById('Inputtenggat').value);
                const today = new Date();
                const statusInput = document.getElementById('status');

                // Hilangkan jam agar hanya tanggal yang dibandingkan
                tenggat.setHours(0, 0, 0, 0);
                today.setHours(0, 0, 0, 0);

                let status = '';

                if (sisa === 0) {
                    status = (today <= tenggat) ? 'Lunas' : 'Lunas + Telat Bayar';
                } else {
                    status = (today <= tenggat) ? 'Belum Lunas' : 'Belum Lunas + Telat Bayar';
                }

                statusInput.value = status;
            }


            // Update sisa otomatis dan panggil hitungStatus
            document.getElementById('pinjam').addEventListener('input', function () {
                const pinjam = parseInt(this.value || 0);
                const dibayar = parseInt(document.getElementById('dibayar').value || 0);
                const sisa = pinjam - dibayar;
                document.getElementById('sisa').value = sisa >= 0 ? sisa : 0;
                hitungStatus();
            });

            document.getElementById('dibayar').addEventListener('input', function () {
                const pinjam = parseInt(document.getElementById('pinjam').value || 0);
                const dibayar = parseInt(this.value || 0);
                const sisa = pinjam - dibayar;
                document.getElementById('sisa').value = sisa >= 0 ? sisa : 0;
                hitungStatus();
            });

            document.getElementById('Inputtenggat').addEventListener('change', function () {
                hitungStatus();
            });
            function formatRibuan(number) {
                return new Intl.NumberFormat('id-ID').format(number);
            }

            function unformatRibuan(value) {
                return parseInt(value.replace(/\./g, '')) || 0;
            }

            function updateSisaDanStatus() {
                const pinjam = unformatRibuan(document.getElementById('pinjam_display').value);
                const dibayar = unformatRibuan(document.getElementById('dibayar_display').value);
                const sisa = Math.max(pinjam - dibayar, 0);

                document.getElementById('sisa_display').value = formatRibuan(sisa);
                document.getElementById('sisa').value = sisa;

                document.getElementById('pinjam').value = pinjam;
                document.getElementById('dibayar').value = dibayar;

                // Validasi batas maksimal
                const dibayarError = document.getElementById('dibayar_error');
                if (dibayar > 4000000 || pinjam > 4000000) {
                    dibayarError.classList.remove('d-none');
                } else {
                    dibayarError.classList.add('d-none');
                }

                // Panggil fungsi status jika ada
                if (typeof hitungStatus === 'function') {
                    hitungStatus();
                }
            }

            ['pinjam_display', 'dibayar_display'].forEach(id => {
                document.getElementById(id).addEventListener('input', function () {
                    let angka = unformatRibuan(this.value);
                    if (angka > 4000000) angka = 4000000;
                    this.value = formatRibuan(angka);
                    updateSisaDanStatus();
                });
            });

            // Validasi submit
            document.querySelector('form').addEventListener('submit', function (e) {
                const pinjam = unformatRibuan(document.getElementById('pinjam_display').value);
                const dibayar = unformatRibuan(document.getElementById('dibayar_display').value);
                if (pinjam > 4000000 || dibayar > 4000000) {
                    e.preventDefault();
                    alert('Nilai pinjaman atau dibayar tidak boleh lebih dari Rp. 4.000.000');
                }
            });
        });
    </script>
</body>

</html>
