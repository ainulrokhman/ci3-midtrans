<?php
$option = array();
foreach ($kelas as $k) {
    $option[$k->id] = "{$k->tingkat} {$k->jurusan}";
}
?>
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
                        'required' => "true",
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
                    <?= form_dropdown('kelas', $option, $siswa->id_kelas, ['class' => "form-select"]); ?>
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
                        'required' => "true",
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
                        'required' => "true",
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
                        'required' => "true",
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
                        'required' => "true",
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
                        'required' => "true",
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
                        'required' => "true",
                        'value' => $siswa->wali_telp,
                        'class' => "form-control",
                    ]); ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary form-control">Simpan</button>
            <?= form_close(); ?>
        </div>
    </div>
</div>