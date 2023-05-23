<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Transaksi</h5>
        </div>
        <div class="card-body">

            <?= $this->session->flashdata('success'); ?>
            <hr>
            <table id="tabel" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Biaya</th>
                        <th>Status</th>
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
                    ...
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="pay-button" class="btn btn-primary">Bayar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
        <!-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function() {
                $("#siswa option:first").attr('disabled', 'disabled');
                $('#tabel').DataTable({
                    'processing': true,
                    'serverSide': true,
                    'order': [],
                    'ajax': {
                        'url': '<?= base_url('transaction/datatable'); ?>',
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
        </script>
    </div>