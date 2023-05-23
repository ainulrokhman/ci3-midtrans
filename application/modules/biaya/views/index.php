<?php
$option = array();
$option[""] = "*** PILIH ***";
foreach ($siswa as $s) {
    $option[$s->id] = "{$s->nama}";
}
?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Biaya</h5>
        </div>
        <div class="card-body">
            <a href="<?= base_url('biaya/add'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus pe-1"></i>Tambah Biaya</a>
            <?= $this->session->flashdata('success'); ?>
            <hr>
            <table id="tabel" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Jenis Biaya</th>
                        <th>Deskripsi</th>
                        <th>Nominal</th>
                        <!-- <th class="spacer"></th> -->
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= form_open(base_url('snap/finish'), array('id' => 'payment-form')); ?>
                    <div class="mb-3 row">
                        <?= form_label("Pilih Siswa", "siswa", [
                            "class" => "col-sm-4 col-form-label"
                        ]); ?>
                        <div class="col-sm-8">
                            <?= form_dropdown('siswa', $option, "", ['class' => "form-select", 'id' => "siswa", 'required' => "true",]); ?>
                        </div>
                    </div>
                    <input type="hidden" name="result_type" id="result-type">
                    <input type="hidden" name="name" id="name">
                    <input type="hidden" name="email" id="email">
                    <input type="hidden" name="package_id" id="package_id">
                    <input type="hidden" name="package_name" id="package_name">
                    <input type="hidden" name="package_price" id="package_price">
                    <input type="hidden" name="result_data" id="result-data">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="pay-button" class="btn btn-primary">Bayar</button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-mtKZaMAU81MbN5PQ"></script>

    <script>
        $(document).ready(function() {
            $("#siswa option:first").attr('disabled', 'disabled');
            $('#tabel').DataTable({
                'processing': true,
                'serverSide': true,
                'order': [],
                'ajax': {
                    'url': '<?= base_url('biaya/datatable'); ?>',
                    'type': 'POST'
                },
                "columnDefs": [{
                        "orderable": false,
                        "targets": 0
                    },
                    {
                        "orderable": false,
                        "targets": 4
                    },
                ],
            });

        });

        $(document).on('click', '#pay-button', function() {
            const siswa = $("#siswa").val()
            const name = $("#name").val();
            const email = $("#email").val();
            const package_id = $("#package_id").val();
            const package_name = $("#package_name").val();
            const package_price = $("#package_price").val();
            if (siswa) {
                event.preventDefault();
                $(this).attr("disabled", "disabled");
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url() ?>snap/token',
                    data: {
                        name: name,
                        email: email,
                        package_id: package_id,
                        package_name: package_name,
                        package_price: package_price
                    },
                    cache: false,
                    success: function(data) {
                        snap.pay(data, {
                            onSuccess: function(result) {
                                changeResult('success', result);
                            },
                            onPending: function(result) {
                                changeResult('pending', result);
                            },
                            onError: function(result) {
                                changeResult('error', result);
                            }
                        });
                    }
                });
            }
        })
        $(document).on('click', '.hapus', function() {
            const href = $(this).data("href")
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = href;
                }
            })
        })

        $(document).on('click', '.bayar', function() {
            const id = $(this).data("id")
            $.ajax({
                type: "POST",
                url: '<?= base_url('biaya'); ?>',
                dataType: 'json',
                data: {
                    "id": id
                },
                success: function(response) {
                    $("#exampleModalLabel").html("Bayar " + response['nama_biaya'])
                    $("#package_id").val(id)
                    $("#package_name").val(response['nama_biaya'])
                    $("#package_price").val(response['nominal'])
                }
            })
        })

        $(document).on('change', '#siswa', function() {
            const id = $(this).val()
            $.ajax({
                type: "POST",
                url: '<?= base_url('siswa'); ?>',
                dataType: 'json',
                data: {
                    "id": id
                },
                success: function(response) {
                    $("#name").val(response['nama'])
                    $("#email").val(response['wali_email'])
                }
            })
        })

        function changeResult(type, data) {
            $("#result-type").val(type);
            $("#result-data").val(JSON.stringify(data));
            $("#payment-form").submit();
        }
    </script>
</div>