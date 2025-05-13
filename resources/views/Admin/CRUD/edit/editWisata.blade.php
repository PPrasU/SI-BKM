<!DOCTYPE html>
<html lang="en">

<head>
    <title>SI-BKM | Edit Data Wisata</title>
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
                            <h5 class="m-0">Edit Data Wisata Masyarakat Tanjungrejo</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Program</li>
                                <li class="breadcrumb-item"><a href="/Admin/Wisata">
                                        Wisata / Studi Banding</a></li>
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
                                <form action="/Admin/Wisata/Update-Data/{{ $data->id }}" method="POST"
                                    enctype="multipart/form-data" id="formInputDataProduktif">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Asal RW</label>
                                            <select class="form-control" name="rw" id="rw">
                                                <option  selected>{{ $data->rw }}</option>
                                                <option disabled >-- Pilih RW --</option>
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
                                                <option selected>{{ $data->kategori }}</option>
                                                <option disabled>-- Pilih Kategori --</option>
                                                <option>Wisata</option>
                                                <option>Studi Banding</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">Detail Kegiatan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="keterangan" class="form-control"
                                                    id="keterangan" value="{{ $data->keterangan }}"
                                                    placeholder="Masukkan Detail Kegiatan....">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_dilaksanakan">Tanggal Kegiatan Dilakukan</label>
                                            <input type="date" name="tanggal_dilaksanakan" class="form-control"
                                                id="tanggal_dilaksanakan" value="{{ $data->tanggal_dilaksanakan }}"
                                                placeholder="dd/mm/yyyy">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option selected>{{ $data->status }}</option>
                                                <option disabled>-- Pilih Status --</option>
                                                <option>Selesai</option>
                                                <option>Direncanakan</option>
                                                <option>Dibatalkan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/Admin/Wisata" type="submit" class="btn btn-default">Batal</a>
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
        $(function () {
            function formatRibuan(number) {
                return new Intl.NumberFormat('id-ID').format(number);
            }
        
            function unformatRibuan(value) {
                return parseInt(value.replace(/\./g, '')) || 0;
            }
        
            function hitungStatus(pinjam, dibayar, tenggatStr) {
                const sisa = Math.max(pinjam - dibayar, 0);
                const statusInput = document.getElementById('status');
        
                const tenggat = new Date(tenggatStr);
                const today = new Date();
        
                // Hilangkan jam dari tanggal agar hanya membandingkan tahun-bulan-tanggal
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
        
            function updateSemua() {
                const pinjam = unformatRibuan(document.getElementById('pinjam_display').value);
                const dibayar = unformatRibuan(document.getElementById('dibayar_display').value);
                const tenggat = document.getElementById('Inputtenggat').value;
        
                const sisa = Math.max(pinjam - dibayar, 0);
        
                document.getElementById('sisa_display').value = formatRibuan(sisa);
                document.getElementById('sisa').value = sisa;
                document.getElementById('pinjam').value = pinjam;
                document.getElementById('dibayar').value = dibayar;
        
                // Validasi batas maksimal
                const dibayarError = document.getElementById('dibayar_error');
                if (dibayar > 4000000 || pinjam > 4000000) {
                    dibayarError?.classList.remove('d-none');
                } else {
                    dibayarError?.classList.add('d-none');
                }
        
                hitungStatus(pinjam, dibayar, tenggat);
            }
        
            ['pinjam_display', 'dibayar_display'].forEach(id => {
                const input = document.getElementById(id);
                if (input) {
                    input.addEventListener('input', function () {
                        let angka = unformatRibuan(this.value);
                        if (angka > 4000000) angka = 4000000;
                        this.value = formatRibuan(angka);
                        updateSemua();
                    });
                }
            });
        
            document.getElementById('Inputtenggat')?.addEventListener('change', updateSemua);
        
            document.querySelector('form')?.addEventListener('submit', function (e) {
                const pinjam = unformatRibuan(document.getElementById('pinjam_display').value);
                const dibayar = unformatRibuan(document.getElementById('dibayar_display').value);
                if (pinjam > 4000000 || dibayar > 4000000) {
                    e.preventDefault();
                    alert('Nilai pinjaman atau dibayar tidak boleh lebih dari Rp. 4.000.000');
                }
            });
        
            updateSemua();
        });
    </script>
    
    
</body>

</html>
