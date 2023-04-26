$(document).ready( function () {
    // datatable
    $('#tabel_stok').DataTable();
} );
    
// edit data
$(".edit").on("click", function() {

    var id = $(this).data("id");


    $.ajax({
        url: "http://localhost/ci-app-inventori/barang/stok/",
        dataType: "json",
        data: {"id": id},
        type: "post",
        success: function(data){
            $("#id").val(data.id);
            $("#nama_barang").val(data.nama_barang);
        }
      });
})