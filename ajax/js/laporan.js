$(".lapor").click(function () {
    var jenis = $('#jenis-laporan').val();
    var tanggalAwal = $('#awal').val();
    var tanggalAkhir = $('#akhir').val();
    var username = $('#username').val();
    $(".tampil").load("ajax/tampilLaporan?jenis=" + jenis + "&awal=" + tanggalAwal + "&akhir=" + tanggalAkhir + "&username=" + username);
});