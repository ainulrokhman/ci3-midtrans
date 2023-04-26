<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data siswa</h5>
        </div>
        <div class="card-body">
            <button class="btn btn-success btn-sm btn-add" data-bs-toggle="modal" data-bs-target="#modal-detail"><i class="fa fa-plus pe-1"></i> Tambah Siswa</button>
            <hr>
            <table id="tabel-siswa" class="table">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Angkatan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($siswa as $s) : ?>
                        <tr>
                            <td><?= $s['nis']; ?></td>
                            <td><?= $s['nama']; ?></td>
                            <td><?= $s['class']; ?> <?= $s['class_name']; ?></td>
                            <td><?= $s['tahun_masuk']; ?></td>
                            <td>
                                <div class="form-inline btn-action-group">
                                    <button type="button" class="btn btn-info btn-detail btn-sm" data-id="<?= $s['id']; ?>" data-bs-toggle="modal" data-bs-target="#modal-detail"><span class="btn-label-icon"><i class="fas fa-eye pe-1"></i></span> Detail</button>
                                    <button type="button" class="btn btn-danger btn-delete btn-sm" data-id="<?= $s['id']; ?>" data-title="Hapus siswa : <strong><?= $s['nama']; ?></strong>" data-bs-toggle="modal" data-bs-target="#modal-delete"><span class="btn-label-icon"><i class="fas fa-times pe-1"></i></span> Delete</button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Detail-->
    <div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="siswa/action" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id-siswa">
                        <div class="mb-1 row">
                            <label class="col-sm-4 col-form-label">NIS</label>
                            <div class="col-sm-8">
                                <input required type="text" readonly class="form-control" id="nis" name="nis">
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input required type="text" readonly class="form-control" id="nama" name="nama">
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label class="col-sm-4 col-form-label">Kelas</label>
                            <div class="col-sm-8">
                                <select disabled class="form-select" id="kelas" name="id_kelas">
                                    <option value="" selected disabled>Pilih Kelas</option>
                                    <?php foreach ($kelas as $k) : ?>
                                        <option value="<?= $k['class_id']; ?>"><?= $k['class']; ?> <?= $k['class_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input required type="text" readonly class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label class="col-sm-4 col-form-label">Telp</label>
                            <div class="col-sm-8">
                                <input required type="text" readonly class="form-control" id="telp" name="telp">
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label class="col-sm-4 col-form-label">Tahun Masuk / Angkatan</label>
                            <div class="col-sm-8">
                                <input required type="text" readonly class="form-control" id="angkatan" name="tahun_masuk">
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label class="col-sm-4 col-form-label">Nama Wali</label>
                            <div class="col-sm-8">
                                <input required type="text" readonly class="form-control" id="nama-wali" name="wali_nama">
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label class="col-sm-4 col-form-label">Email Wali</label>
                            <div class="col-sm-8">
                                <input required type="text" readonly class="form-control" id="email-wali" name="wali_email">
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label class="col-sm-4 col-form-label">Telp Wali</label>
                            <div class="col-sm-8">
                                <input required type="text" readonly class="form-control" id="telp-wali" name="wali_telp">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info btn-action" data-action="ubah">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Delete-->
    <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title"></div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="siswa/hapus" method="get">
                        <input type="hidden" name="id" id="id">
                        <button type="submit" class="btn btn-primary">OK</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            // datatable
            $('#tabel-siswa').DataTable();

            // detail siswa
            $('.btn-detail').on('click', function() {
                var id = $(this).data("id")
                $.ajax({
                    url: "siswa/get/" + id,
                    dataType: "json",
                    success: function(response) {
                        $('#id-siswa').val(id)
                        $('#nis').val(response['nis'])
                        $('#nama').val(response['nama'])
                        $('#kelas').val(response['id_kelas'])
                        $('#angkatan').val(response['tahun_masuk'])
                        $('#telp').val(response['telp'])
                        $('#email').val(response['email'])
                        $('#nama-wali').val(response['wali_nama'])
                        $('#email-wali').val(response['wali_email'])
                        $('#telp-wali').val(response['wali_telp'])
                    },
                    error: function(error) {
                        alert("error" + error);
                    }
                });
            })

            // update / add
            $('.btn-action').on('click', function() {
                var action = $(this).data('action')
                if (action == "ubah") {
                    $('#nama').prop('readonly', false);
                    $('#kelas').prop('disabled', false);
                    $('#angkatan').prop('readonly', false);
                    $('#telp').prop('readonly', false);
                    $('#email').prop('readonly', false);
                    $('#nama-wali').prop('readonly', false);
                    $('#email-wali').prop('readonly', false);
                    $('#telp-wali').prop('readonly', false);
                    $(this).removeClass("btn-info");
                    $(this).addClass("btn-success");
                    $(this).html("Simpan");
                    $(this).data('action', "submit");
                } else {
                    $(this).prop("type", "submit");
                }
            })

            // add
            $('.btn-add').on('click', function() {
                $('#nis').prop('readonly', false);
                $('#nama').prop('readonly', false);
                $('#kelas').prop('disabled', false);
                $('#angkatan').prop('readonly', false);
                $('#telp').prop('readonly', false);
                $('#email').prop('readonly', false);
                $('#nama-wali').prop('readonly', false);
                $('#email-wali').prop('readonly', false);
                $('#telp-wali').prop('readonly', false);
                $('.btn-action').removeClass("btn-info");
                $('.btn-action').addClass("btn-success");
                $('.btn-action').html("Simpan");
                $('.btn-action').data('action', "submit");
            })

            // delete
            $('.btn-delete').on('click', function() {
                var id = $(this).data("id")
                var title = $(this).data("title")
                $('.modal-title').html(title)
                $('#id').val(id)
            })

            // close modal
            $('#modal-detail').on('hidden.bs.modal', function() {
                $('#id-siswa').val("")
                $('#nis').val("")
                $('#nama').val("")
                $('#kelas').val("")
                $('#angkatan').val("")
                $('#telp').val("")
                $('#email').val("")
                $('#nama-wali').val("")
                $('#email-wali').val("")
                $('#telp-wali').val("")
                $('#nis').prop('readonly', true);
                $('#nama').prop('readonly', true);
                $('#kelas').prop('disabled', true);
                $('#angkatan').prop('readonly', true);
                $('#telp').prop('readonly', true);
                $('#email').prop('readonly', true);
                $('#nama-wali').prop('readonly', true);
                $('#email-wali').prop('readonly', true);
                $('#telp-wali').prop('readonly', true);
                $('.btn-action').removeClass("btn-success");
                $('.btn-action').addClass("btn-info");
                $('.btn-action').html("Ubah");
                $('.btn-action').data('action', "ubah");
            })
        });
    </script>
</div>