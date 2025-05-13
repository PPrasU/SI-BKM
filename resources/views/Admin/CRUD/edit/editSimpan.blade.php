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
                                <li class="breadcrumb-item"><a href="#">Input Data</a>
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
                            <!-- Alert jika penarikan tidak valid -->
                            <div id="alert_ditarik" class="alert alert-danger mt-2 d-none" role="alert">
                                Tidak bisa menarik simpanan karena sisa simpanan saat ini adalah 0.
                            </div>
                            <div class="card card-primary">
                                <div class="card-header" style="height: 1px;">
                                    

                                </div>
                                <form action="/Admin/Simpan/Update-Data/{{ $data->id }}" method="POST" enctype="multipart/form-data"
                                    id="formInputDataProduktif">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama_penyimpan">Nama Penyimpan</label>
                                            <input type="text" name="nama_penyimpan" class="form-control"
                                                value="{{ $data->nama_penyimpan }}" id="Inputnama_penyimpan"
                                                placeholder="masukkan nama lengkap..." readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Asal RT/RW</label>
                                            <select class="form-control" name="asal_rt_rw_simpanan"
                                                id="asal_rt_rw_simpanan" value="{{ $data->asal_rt_rw_simpanan }}">
                                                <option selected>{{ $data->asal_rt_rw_simpanan }}</option>
                                                <option disabled>-- Pilih RT/RW --</option>
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
                                        <input type="hidden" id="sisa_lama" value="{{ $data->sisa_simpanan }}">

                                        <div class="form-group">
                                            <label for="ditarik_display">Jumlah Simpanan Baru</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text">Rp.</span></div>
                                                <input type="text" id="simpan_display" class="form-control"
                                                    placeholder="masukkan jumlah simpan..." value="0">
                                                <input type="hidden" name="simpan" id="simpan" value="0">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="sisa_display">Jumlah Penarikan Baru</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text">Rp.</span></div>
                                                <input type="text" id="ditarik_display" class="form-control"
                                                    placeholder="masukkan jumlah ditarik..." value="0">
                                                <input type="hidden" name="ditarik" id="ditarik" value="0">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="sisa_display">Sisa Simpanan Terbaru</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text">Rp.</span></div>
                                                <input type="text" id="sisa_display" class="form-control" value="{{ number_format($data->sisa_simpanan, 0, ',', '.') }}" readonly>
                                                <input type="hidden" name="sisa_simpanan" id="sisa_simpanan" value="{{ $data->sisa_simpanan }}">
                                            </div>
                                        </div>

                                        <!-- Tanggal -->
                                        <div class="form-group">
                                            <label for="tanggal_disimpan">Tanggal Simpan Terbaru</label>
                                            <input type="date" name="tanggal_disimpan" class="form-control"
                                                value="{{ $data->tanggal_disimpan }}" id="Inputtanggal_disimpan">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_ditarik">Tanggal Ditarik Terakhir</label>
                                            <input type="date" name="tanggal_ditarik" class="form-control"
                                                value="{{ $data->tanggal_ditarik }}" id="tanggal_ditarik">
                                        </div>

                                        <!-- Status -->
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input type="text" name="status_simpanan" class="form-control" id="Inputstatus_simpanan" value="{{ $data->status_simpanan }}" readonly>
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <a href="/Admin/Simpan" class="btn btn-default">Batal</a>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sisaLama = parseInt(document.getElementById('sisa_lama').value) || 0;

            const simpanDisplay = document.getElementById('simpan_display');
            const simpanHidden = document.getElementById('simpan');

            const ditarikDisplay = document.getElementById('ditarik_display');
            const ditarikHidden = document.getElementById('ditarik');

            const sisaDisplay = document.getElementById('sisa_display');
            const sisaHidden = document.getElementById('sisa_simpanan');

            const statusInput = document.getElementById('Inputstatus_simpanan');

            const alertDitarik = document.getElementById('alert_ditarik');

            function formatWithDots(number) {
                return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

            function parseToNumber(str) {
                return parseInt(str.replace(/\./g, '')) || 0;
            }

            function updateFields() {
                let simpanBaru = parseToNumber(simpanDisplay.value);
                let ditarikBaru = parseToNumber(ditarikDisplay.value);

                // Jika sisa simpanan lama = 0 dan user mencoba tarik
                if (sisaLama === 0 && ditarikBaru > 0) {
                    alertDitarik.classList.remove('d-none');
                    ditarikDisplay.value = "0";
                    ditarikHidden.value = 0;
                    return;
                } else {
                    alertDitarik.classList.add('d-none');
                }

                // Hitung total simpanan dan sisa
                const totalSimpan = simpanBaru;
                const totalDitarik = ditarikBaru;

                const sisaTerbaru = Math.max(sisaLama + simpanBaru - ditarikBaru, 0);

                // Set nilai ke input hidden
                simpanHidden.value = totalSimpan;
                ditarikHidden.value = totalDitarik;
                sisaHidden.value = sisaTerbaru;

                // Format tampilan
                simpanDisplay.value = formatWithDots(totalSimpan);
                ditarikDisplay.value = formatWithDots(totalDitarik);
                sisaDisplay.value = formatWithDots(sisaTerbaru);

                // Status
                statusInput.value = sisaTerbaru > 0 ? "Masih Ada Simpanan" : "Tidak Ada Simpanan (Sudah Ditarik Semuanya)";
            }

            simpanDisplay.addEventListener('input', updateFields);
            ditarikDisplay.addEventListener('input', updateFields);
        });
    </script>

</body>

</html>
