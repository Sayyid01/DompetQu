// tambah data mahasiswa
$(document).ready(function () {
    $(".tambahRekOut").click(function () {
        var tanggal = $('#tanggalRekOut').val();
        var keterangan = $('#keteranganRekOut').val();
        var jumlah = $('#jumlahRekOut').val();
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
                url: "function/tambahRekeningOut.php",
                data: {
                    tanggal: tanggal,
                    keterangan: keterangan,
                    jumlah: jumlah,
                    username: username
                },
                success: function () {
                    $('.tambahRekOut').attr('data-dismiss', '');
                    $('.tampilCardview').load('ajax/tampilCardviewRekening?username=' + username);
                    $('#keteranganRekOut').val("");
                    $('#jumlahRekOut').val("");
                    console.log('OKE');
                }
            });
            $('.tambahRekOut').attr('data-dismiss', 'modal');
        }
    });
});