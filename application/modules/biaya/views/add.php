<div class="container">
    <div class="card">
        <div class="card-header">Tambah Data</div>
        <div class="card-body">
            <?= form_open(); ?>
            <div class="mb-3 row">
                <?= form_label("Jenis Biaya", "nama_biaya", [
                    "class" => "col-sm-2 col-form-label"
                ]); ?>
                <div class="col-sm-10">
                    <?= form_input([
                        'id' => "nama_biaya",
                        'name' => "nama_biaya",
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
                        // 'type' => "number",
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $('#nominal').on('input', function() {
        const value = unformatThousands($(this).val())
        $(this).val(formatThousands(value))
    })
</script>