<div class="container">
    <div class="card">
        <div class="card-header">Tambah Data</div>
        <div class="card-body">
            <?= form_open(); ?>
            <div class="mb-3 row">
                <?= form_label("Jenis Biaya", "jenis_biaya", [
                    "class" => "col-sm-2 col-form-label"
                ]); ?>
                <div class="col-sm-10">
                    <?= form_input([
                        'id' => "jenis_biaya",
                        'name' => "jenis_biaya",
                        'required' => "true",
                        'class' => "form-control",
                    ]); ?>
                </div>
            </div>
            <div class="mb-3 row">
                <?= form_label("Deskripsi", "deskripsi", [
                    "class" => "col-sm-2 col-form-label"
                ]); ?>
                <div class="col-sm-10">
                    <?= form_input([
                        'id' => "deskripsi",
                        'name' => "deskripsi",
                        'required' => "true",
                        'class' => "form-control",
                    ]); ?>
                </div>
            </div>
            <div class="mb-3 row">
                <?= form_label("Nominal", "nominal", [
                    "class" => "col-sm-2 col-form-label"
                ]); ?>
                <div class="col-sm-10">
                    <?= form_input([
                        'id' => "nominal",
                        'name' => "nominal",
                        'type' => "number",
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