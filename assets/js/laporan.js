$(document).ready( function () {
    // datatable
    $('#tabel-laporan').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ]
    });
} );