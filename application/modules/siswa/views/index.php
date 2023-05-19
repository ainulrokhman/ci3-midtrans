<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Kelas</h5>
        </div>
        <div class="card-body">
            <a href="<?= base_url('kelas/add'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus pe-1"></i>Tambah Kelas</a>
            <?= $this->session->flashdata('success'); ?>
            <hr>
            <table id="tabel" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Angkatan</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabel').DataTable({
                'processing': true,
                'serverSide': true,
                'order': [],
                'ajax': {
                    'url': '<?= base_url('siswa/datatable'); ?>',
                    'type': 'POST'
                },
                "columnDefs": [{
                        "orderable": false,
                        "targets": 0
                    },
                    {
                        "orderable": false,
                        "targets": 3
                    },
                    {
                        "orderable": false,
                        "targets": 5
                    },
                ]
            });
        });

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
    </script>
</div>