<?php
$option = array();
$option[''] = "Pilih Kelas";
foreach ($kelas as $k) {
    $option[$k->id] = "{$k->tingkat} {$k->jurusan}";
}
?>
<div class="container">
    <div class="card">
        <div class="card-header">Update Data</div>
        <div class="card-body">
            <?= form_open(); ?>
            <div class="mb-3 row">
                <?= form_label("NIS", "nis", [
                    "class" => "col-sm-2 col-form-label"
                ]); ?>
                <div class="col-sm-10">
                    <?= form_input([
                        'id' => "nis",
                        'name' => "nis",
                        'required' => "true",
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
                        'class' => "form-control",
                    ]); ?>
                </div>
            </div>
            <div class="mb-3 row">
                <?= form_label("Kelas", "kelas", [
                    "class" => "col-sm-2 col-form-label"
                ]); ?>
                <div class="col-sm-10">
                    <?= form_dropdown('kelas', $option, "", ['class' => "form-select", 'id' => "kelas", 'required' => "true",]); ?>
                </div>
            </div>
            <div class="mb-3 row">
                <?= form_label("Email Siswa", "email", [
                    "class" => "col-sm-2 col-form-label"
                ]); ?>
                <div class="col-sm-10">
                    <?= form_input(['id' => "email", 'name' => "email", 'value' => "-", 'class' => "form-control", 'type' => "email"]); ?>
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
                        'type' => "number",
                        'value' => "-",
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
                        'type' => "number",
                        'value' => date("Y"),
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
                        'type' => "email",
                        'value' => "-",
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
                        'type' => "number",
                        'value' => "-",
                        'class' => "form-control",
                    ]); ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary form-control">Simpan</button>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function() {
        $("#kelas option:first").attr('disabled', 'disabled');
    });
</script>