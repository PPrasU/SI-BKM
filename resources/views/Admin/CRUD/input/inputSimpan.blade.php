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
                                        <!-- Jumlah Simpan -->
                                        <div class="form-group">
                                            <label for="simpan_display">Jumlah Simpan</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text">Rp.</span></div>
                                                <input type="text" id="simpan_display" class="form-control" placeholder="masukkan jumlah simpan....">
                                                <input type="hidden" name="simpan" id="simpan">
                                            </div>
                                        </div>

                                        <!-- Jumlah Ditarik -->
                                        <div class="form-group">
                                            <label for="ditarik_display">Jumlah Ditarik</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text">Rp.</span></div>
                                                <input type="text" id="ditarik_display" class="form-control" placeholder="masukkan jumlah ditarik....">
                                                <input type="hidden" name="ditarik" id="ditarik">
                                            </div>
                                        </div>

                                        <!-- Sisa Simpanan (readonly) -->
                                        <div class="form-group">
                                            <label for="sisa_display">Sisa Simpanan</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text">Rp.</span></div>
                                                <input type="text" id="sisa_display" class="form-control" readonly placeholder="sisa simpanan">
                                                <input type="hidden" name="sisa_simpanan" id="sisa_simpanan">
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
                                        <!-- Status -->
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input type="text" name="status_simpanan" class="form-control" id="Inputstatus_simpanan" placeholder="Status" readonly>
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
            const simpanDisplay = document.getElementById('simpan_display');
            const simpanHidden = document.getElementById('simpan');
    
            const ditarikDisplay = document.getElementById('ditarik_display');
            const ditarikHidden = document.getElementById('ditarik');
    
            const sisaDisplay = document.getElementById('sisa_display');
            const sisaHidden = document.getElementById('sisa_simpanan');
    
            const statusInput = document.getElementById('Inputstatus_simpanan');
    
            function formatWithDots(number) {
                return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }
    
            function parseToNumber(str) {
                return parseInt(str.replace(/\./g, '')) || 0;
            }
    
            function updateFields() {
                const simpan = parseToNumber(simpanDisplay.value);
                const ditarik = parseToNumber(ditarikDisplay.value);
    
                // Update nilai ke input hidden
                simpanHidden.value = simpan;
                ditarikHidden.value = ditarik;
    
                // Format ulang input tampilan
                simpanDisplay.value = formatWithDots(simpan);
                ditarikDisplay.value = formatWithDots(ditarik);
    
                // Hitung sisa simpanan
                const sisa = Math.max(simpan - ditarik, 0);
                sisaDisplay.value = formatWithDots(sisa);
                sisaHidden.value = sisa;
    
                // Status
                statusInput.value = sisa > 0 ? "Masih Ada Simpanan" : "Tidak Ada Simpanan (Sudah Ditarik Semuanya)";
            }
    
            simpanDisplay.addEventListener('input', updateFields);
            ditarikDisplay.addEventListener('input', updateFields);
        });
    </script>
    
    
    
</body>

</html>
