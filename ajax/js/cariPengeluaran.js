$(document).ready(function () {
    // event ketika keyword diketik
    $('#keyword').on('keyup', function () {
        console.log('ok cari');
        var keyword = $('#keyword').val();
        var username = $('#username').val();
        var filter = $('#filter').val();
        $('.tampil').load('ajax/cariKeluar?keyword=' + keyword + '&username=' + username + '&filter=' + filter);
    });
});