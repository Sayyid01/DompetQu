// tambah data mahasiswa
$(document).ready(function () {
    $(".tambahRek").click(function () {
        var tanggal = $('#tanggal').val();
        var keterangan = $('#keterangan').val();
        var jumlah = $('#jumlahRek').val();
        var username = $('#username').val();

        if (keterangan == "") {
            swal({
                title: 'Peringatan!',
                type: 'error',
                text: 'Keterangan tidak boleh kosong!',
                confirmButtonColor: '#d9534f'
            });
        } else if (jumlah == "") {
            swal({
                title: 'Peringatan!',
                type: 'error',
                text: 'Jumlah harus diisi!',
                confirmButtonColor: '#d9534f'
            });
        } else {
            $.ajax({
                type: 'POST',
                url: "function/tambahRekeningIn.php",
                data: {
                    tanggal: tanggal,
                    keterangan: keterangan,
                    jumlah: jumlah,
                    username: username
                },
                success: function () {
                    $('.tambahRek').attr('data-dismiss', '');
                    $('.tampil').load('ajax/tampilRekening?username=' + username);
                    $('#keterangan').val("");
                    $('#jumlahRek').val("");
                    console.log('OKE');
                }
            });
            $('.tambahRek').attr('data-dismiss', 'modal');
        }
    });
});