$(document).ready(function () {
    $(".tambah_norek").click(function () {
        var norek = $('#no_rek').val();
        var saldoRek = $('#saldoRekening').val();
        window.location.href = 'transfer?no_rek=' + norek + '&saldoRek=' + saldoRek;
    });
});