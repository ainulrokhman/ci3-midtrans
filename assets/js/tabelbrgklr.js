$(document).ready( function () {
    // datatable
    $('#tabel-keluar').DataTable();

    // get total stok
    $("#brg").on("change", function(){
        var e = document.getElementById("brg");
        var id = e.value;
        console.log(id);
    })

} );
    
// edit data
$(".edit").on("click", function() {

    var id = $(this).data("id");

    // console.log(id);

    $.ajax({
        url: "http://localhost/ci-app-inventori/barang/keluar/",
        dataType: "json",
        data: {"id": id},
        type: "post",
        success: function(data){
            $("#id").val(data.id);
            $("#tanggal").val(data.tgl);
            $("#barang").val(data.id_barang);
            $("#jumlah").val(data.jml);
            $("#dana").val(data.sumber_dana);
            $("#keterangan").val(data.keterangan);
        }
      });
})