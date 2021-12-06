// tambah data mahasiswa
$(document).ready(function () {
    $(".tambahKeluar").click(function () {
        var tanggal = $('#tanggalTambah').val();
        var keterangan = $('#keteranganTambah').val();
        var keperluan = $('#keperluanTambah').val();
        var jumlah = $('#jumlahTambah').val();
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
                url: "function/tambahPengeluaran.php",
                data: {
                    tanggal: tanggal,
                    keterangan: keterangan,
                    keperluan: keperluan,
                    jumlah: jumlah,
                    username: username
                },
                success: function () {
                    $('.tambahKeluar').attr('data-dismiss', '');
                    $(".tampil").load("ajax/tampilPengeluaranAdd?username=" + username);
                    $('#keteranganTambah').val("");
                    $('#keperluanTambah').val("Makan dan Minum");
                    $('#jumlahTambah').val("");
                    console.log('OKE');
                }
            });
            $('.tambahKeluar').attr('data-dismiss', 'modal');
        }
    });
});