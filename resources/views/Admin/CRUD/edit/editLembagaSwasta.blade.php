<!DOCTYPE html>
<html lang="en">

<head>
    <title>SI-BKM | Edit Data Rencana Pembangunan Dengan Lembaga Swasta</title>
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
                            <h5 class="m-0">Edit Data Rencana Pembangunan Dengan Lembaga Swasta</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Program</li>
                                <li class="breadcrumb-item"><a href="/Admin/Pembangunan/Lembaga-Swasta">Lembaga
                                        Swasta</a>
                                </li>
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
                            <div class="card card-success">
                                <div class="card-header" style="height: 1px;">
                                </div>
                                <form action="/Admin/Lembaga-Swasta/Update-Data/{{ $data->id }}" method="POST"
                                    enctype="multipart/form-data" id="form">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Asal RW Yang Mengajukan Rencana Pembangunan</label>
                                            <select class="form-control" name="rw_rencana_pemb" id="rw_rencana_pemb"
                                                value="{{ $data->rw_rencana_pemb }}">
                                                <option selected>{{ $data->rw_rencana_pemb }}</option>
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
                                            <label>Lembaga Swasta</label>
                                            <select class="form-control" name="lembaga_swasta" id="lembaga_swasta">
                                                <option selected>Lembaga Swasta</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="detail_pemb">Detail Pembangunan</label>
                                            <input type="text" name="detail_pemb" class="form-control"
                                                id="detail_pemb" rows="3" value="{{ $data->detail_pemb }}"
                                                placeholder="Masukkan detail pembangunan...."></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_dimulai">Tanggal Dimulai Pembangunan</label>
                                            <input type="date" name="tanggal_dimulai" class="form-control"
                                                id="tanggal_dimulai" value="{{ $data->tanggal_dimulai }}"
                                                placeholder="dd/mm/yyyy">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_selesai">Tanggal Selesai Pembangunan</label>
                                            <input type="date" name="tanggal_selesai" class="form-control"
                                                id="tanggal_selesai" value="{{ $data->tanggal_selesai }}"
                                                placeholder="dd/mm/yyyy">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status" id="status"
                                                value="{{ $data->status }}">
                                                <option selected>{{ $data->status }}</option>
                                                <option disabled>-- Pilih Status --</option>
                                                <option>Selesai</option>
                                                <option>Proses Pengerjaan</option>
                                                <option>Direncanakan</option>
                                                <option>Dibatalkan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/Admin/Pembangunan/Lembaga-Swasta" type="submit"
                                            class="btn btn-default">Batal</a>
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
            $('#form').validate({
                rules: {
                    rw_rencana_pemb: {
                        required: true,
                    },
                    lembaga_swasta: {
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
