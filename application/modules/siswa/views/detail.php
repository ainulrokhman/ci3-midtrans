<div class="container">
    <div class="card">
        <div class="card-header">Update Data</div>
        <div class="card-body">
            <?= form_open('', '', ['id' => $siswa->id]); ?>
            <div class="mb-3 row">
                <?= form_label("NIS", "nis", [
                    "class" => "col-sm-2 col-form-label"
                ]); ?>
                <div class="col-sm-10">
                    <?= form_input([
                        'id' => "nis",
                        'name' => "nis",
                        'disabled' => "true",
                        'value' => $siswa->nis,
                        'class' => "form-control",
                    ]); ?>
                </div>
            </div>
            <div class="mb-3 row">
                <?= form_label("Nama Siswa", "nama", [
                    "class" => "col-sm-2 col-form-label"
                ]); ?>
                <div class="col-sm-10">
                    <?= form_input([
                        'id' => "nama",
                        'name' => "nama",
                        'disabled' => "true",
                        'value' => $siswa->nama,
                        'class' => "form-control",
                    ]); ?>
                </div>
            </div>
            <div class="mb-3 row">
                <?= form_label("Kelas", "kelas", [
                    "class" => "col-sm-2 col-form-label"
                ]); ?>
                <div class="col-sm-10">
                    <?= form_input([
                        'id' => "kelas",
                        'name' => "kelas",
                        'disabled' => "true",
                        'value' => "{$siswa->tingkat} {$siswa->jurusan}",
                        'class' => "form-control",
                    ]); ?>
                </div>
            </div>
            <div class="mb-3 row">
                <?= form_label("Email Siswa", "email", [
                    "class" => "col-sm-2 col-form-label"
                ]); ?>
                <div class="col-sm-10">
                    <?= form_input([
                        'id' => "email",
                        'name' => "email",
                        'disabled' => "true",
                        'value' => $siswa->email,
                        'class' => "form-control",
                    ]); ?>
                </div>
            </div>
            <div class="mb-3 row">
                <?= form_label("No HP Siswa", "telp", [
                    "class" => "col-sm-2 col-form-label"
                ]); ?>
                <div class="col-sm-10">
                    <?= form_input([
                        'id' => "telp",
                        'name' => "telp",
                        'disabled' => "true",
                        'value' => $siswa->telp,
                        'class' => "form-control",
                    ]); ?>
                </div>
            </div>
            <div class="mb-3 row">
                <?= form_label("Tahun Masuk", "tahun_masuk", [
                    "class" => "col-sm-2 col-form-label"
                ]); ?>
                <div class="col-sm-10">
                    <?= form_input([
                        'id' => "tahun_masuk",
                        'name' => "tahun_masuk",
                        'disabled' => "true",
                        'value' => $siswa->tahun_masuk,
                        'class' => "form-control",
                    ]); ?>
                </div>
            </div>
            <div class="mb-3 row">
                <?= form_label("Nama Wali", "wali_nama", [
                    "class" => "col-sm-2 col-form-label"
                ]); ?>
                <div class="col-sm-10">
                    <?= form_input([
                        'id' => "wali_nama",
                        'name' => "wali_nama",
                        'disabled' => "true",
                        'value' => $siswa->wali_nama,
                        'class' => "form-control",
                    ]); ?>
                </div>
            </div>
            <div class="mb-3 row">
                <?= form_label("Email Wali", "wali_email", [
                    "class" => "col-sm-2 col-form-label"
                ]); ?>
                <div class="col-sm-10">
                    <?= form_input([
                        'id' => "wali_email",
                        'name' => "wali_email",
                        'disabled' => "true",
                        'value' => $siswa->wali_email,
                        'class' => "form-control",
                    ]); ?>
                </div>
            </div>
            <div class="mb-3 row">
                <?= form_label("No HP Wali", "wali_telp", [
                    "class" => "col-sm-2 col-form-label"
                ]); ?>
                <div class="col-sm-10">
                    <?= form_input([
                        'id' => "wali_telp",
                        'name' => "wali_telp",
                        'disabled' => "true",
                        'value' => $siswa->wali_telp,
                        'class' => "form-control",
                    ]); ?>
                </div>
            </div>
            <!-- <button type="submit" class="btn btn-primary form-control">Simpan</button> -->
            <a href="<?= base_url("siswa/edit/{$siswa->id}"); ?>" class="btn btn-primary form-control" role="button">Ubah</a>
            <?= form_close(); ?>
        </div>
    </div>
</div>