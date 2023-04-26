<div class="container">
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Data siswa</h5>
    </div>
    <div class="card-body">
        <a href="https://codeliro.com/demo/pos/index.php/barang/add" class="btn btn-success btn-sm"><i class="fa fa-plus pe-1"></i> Tambah Data</a>
        <hr>
        <table id="tabel-siswa" class="table">
            <thead>
                <tr>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Angkatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($siswa as $s): ?>
                    <tr>
                        <td><?= $s['nis']; ?></td>
                        <td><?= $s['nama']; ?></td>
                        <td><?= $s['id_kelas']; ?></td>
                        <td><?= $s['tahun_masuk']; ?></td>
                        <td><div class="form-inline btn-action-group">
		<a href="https://codeliro.com/demo/pos/barang/edit?id=18" class="btn btn-success btn-edit btn-sm me-1" data-id="18"><span class="btn-label-icon"><i class="fas fa-edit pe-1"></i></span> Edit</a>
		<button type="button" class="btn btn-danger btn-delete btn-sm" data-id="18" data-delete-title="Hapus barang : <strong>Dettol Original Sabun Batang 100gr</strong>"><span class="btn-label-icon"><i class="fas fa-times pe-1"></i></span> Delete</button></div></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        // datatable
        $('#tabel-siswa').DataTable();
    });
</script>
</div>