$(document).ready(function () {
    // event
    $('#filter').on('input', function () {
        console.log('ok filter');
        var filter = $('#filter').val();
        var username = $('#username').val();
        $('.tampil').load('ajax/filterMasuk?filterSend=' + filter + '&username=' + username);
    });
});