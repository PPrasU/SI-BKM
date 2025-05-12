<!DOCTYPE html>
<html lang="en">

<head>
    <title>SI-BKM | Edit Data Simpan Pinajam</title>
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
                            <h5 class="m-0">Edit Data Simpan Pinajam Masyarakat Tanjungrejo</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Program</li>
                                <li class="breadcrumb-item"><a href="/Admin/Simpan-Pinjam">
                                        Simpan Pinjam Warga</a></li>
                                <li class="breadcrumb-item"><a href="/Admin/Simpan-Pinjam/Edit-Data">Edit Data</a>
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
                                <form action="/Admin/Pinjam/Update-Data/{{ $data->id }}" method="POST"
                                    enctype="multipart/form-data" id="formInputDataProduktif">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama_peminjam">Nama Peminjam</label>
                                            <input type="text" name="nama_peminjam" class="form-control"
                                                value="{{ $data->nama_peminjam }}" id="Inputnama_peminjam"
                                                placeholder="masukkan nama lengkap..." readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Asal RT/RW</label>
                                            <input type="text" name="asal_rt_rw" class="form-control"
                                                value="{{ $data->asal_rt_rw }}" id="asal_rt_rw"
                                                placeholder="masukkan nama lengkap..." readonly>
                                        </div>
                                        <!-- Jumlah Pinjaman (readonly) -->
                                        <div class="form-group">
                                            <label for="pinjam_display">Jumlah Pinjaman</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="text" id="pinjam_display" class="form-control" value="{{ number_format($data->pinjam, 0, ',', '.') }}" readonly max="4000000">
                                                <input type="hidden" name="pinjam" id="pinjam" value="{{ $data->pinjam }}" max="4000000">
                                            </div>
                                        </div>
                                        <!-- Jumlah Dibayar -->
                                        <div class="form-group">
                                            <label for="dibayar_display">Jumlah Dibayar</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="text" id="dibayar_display" class="form-control" value="{{ number_format($data->dibayar, 0, ',', '.') }}" placeholder="masukkan jumlah dibayar...." max="4000000">
                                                <input type="hidden" name="dibayar" id="dibayar" value="{{ $data->dibayar }}" max="4000000">
                                            </div>
                                        </div>
                                        <!-- Sisa Pinjaman (readonly) -->
                                        <div class="form-group">
                                            <label for="sisa_display">Sisa Pinjaman</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="text" id="sisa_display" class="form-control" value="{{ number_format($data->sisa, 0, ',', '.') }}" readonly max="4000000">
                                                <input type="hidden" name="sisa" id="sisa" value="{{ $data->sisa }}" max="4000000">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_pinjam">Tanggal Pinjaman</label>
                                            <input type="date" name="tanggal_pinjam" class="form-control"
                                                value="{{ $data->tanggal_pinjam }}" id="Inputtanggal_pinjam"
                                                placeholder="dd/mm/yyyy" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="tenggat">Tenggat Bayar Terakhir Pinjaman</label>
                                            <input type="date" name="tenggat" class="form-control" id="Inputtenggat"
                                                value="{{ $data->tenggat }}" placeholder="dd/mm/yyyy" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input type="text" value="{{ $data->status }}" class="form-control" name="status" id="status" readonly>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/Admin/Pinjam" type="submit" class="btn btn-default">Batal</a>
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
            function hitungStatus() {
                const sisa = parseInt(document.getElementById('sisa').value || 0);
                const tenggat = new Date(document.getElementById('Inputtenggat').value);
                const today = new Date();
                const statusInput = document.getElementById('status');

                let status = '';

                if (sisa === 0) {
                    status = (tenggat < today) ? 'Lunas + Telat Bayar' : 'Lunas';
                } else {
                    status = (tenggat < today) ? 'Belum Lunas + Telat Bayar' : 'Belum Lunas';
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
            function formatRibuan(number) {
                return new Intl.NumberFormat('id-ID').format(number);
            }

            function unformatRibuan(value) {
                return parseInt(value.replace(/\./g, '')) || 0;
            }

            function updateSisa() {
                const pinjam = unformatRibuan(document.getElementById('pinjam_display').value);
                const dibayar = unformatRibuan(document.getElementById('dibayar_display').value);
                const sisa = Math.max(pinjam - dibayar, 0);

                document.getElementById('sisa_display').value = formatRibuan(sisa);
                document.getElementById('sisa').value = sisa;
                document.getElementById('dibayar').value = dibayar;

                // Validasi batas maksimum
                const errorEl = document.getElementById('dibayar_error');
                if (dibayar > 4000000) {
                    errorEl.classList.remove('d-none');
                } else {
                    errorEl.classList.add('d-none');
                }

                // Tambahan: update status setelah sisa dihitung
                hitungStatus();
            }


            document.getElementById('dibayar_display').addEventListener('input', function () {
                const angka = unformatRibuan(this.value);
                this.value = formatRibuan(angka);
                updateSisa();
            });

            // Optional: Cegah submit jika melebihi batas
            document.querySelector('form').addEventListener('submit', function (e) {
                const dibayar = unformatRibuan(document.getElementById('dibayar_display').value);
                if (dibayar > 4000000) {
                    e.preventDefault();
                    alert('Jumlah dibayar tidak boleh melebihi Rp. 4.000.000');
                }
            });
        });
        
    </script>

    <script>
        
    </script>
</body>

</html>
