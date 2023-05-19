<div class="container">
    <div class="card">
        <div class="card-header">Tambah Data</div>
        <div class="card-body">
            <?= form_open(); ?>
            <div class="mb-3 row">
                <?= form_label("Jurusan", "jurusan", [
                    "class" => "col-sm-2 col-form-label"
                ]); ?>
                <div class="col-sm-10">
                    <?= form_input([
                        'id' => "jurusan",
                        'name' => "jurusan",
                        'required' => "true",
                        'class' => "form-control",
                    ]); ?>
                </div>
            </div>
            <div class="mb-3 row">
                <?= form_label("Tingkat", "tingkat", [
                    "class" => "col-sm-2 col-form-label"
                ]); ?>
                <div class="col-sm-10">
                    <?= form_input([
                        'id' => "tingkat",
                        'name' => "tingkat",
                        'required' => "true",
                        'class' => "form-control",
                    ]); ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary form-control">Simpan</button>
            <?= form_close(); ?>
        </div>
    </div>
</div>