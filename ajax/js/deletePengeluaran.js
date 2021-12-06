$(function () {
    $(".delete").click(function () {
        var filter = $('#filter').val();
        var username = $('#username').val();
        var element = $(this);
        var del_id = element.attr("id");
        var info = 'id=' + del_id;
        swal({
            title: 'Peringatan!',
            type: 'error',
            text: 'Yakin ingin menghapus data?',
            html: true,
            confirmButtonColor: '#d9534f',
            showCancelButton: true,
        }, function () {
            $.ajax({
                type: "POST",
                url: "function/deletePengeluaran.php",
                data: info,
                success: function () {
                    $(".tampil").load("ajax/tampilPengeluaranDel?filterSend=" + filter + '&username=' + username);
                }
            });
        });
        return false;
    });
});