$(document).ready(function () {

    // nampilin data
    $(document).on('click', 'button[data-role=update]', function () {
        console.log('sukses');
        var id = $(this).data("id");
        var username = $('#' + id).children('td[data-target=username]').text();
        var email = $('#' + id).children('td[data-target=email]').text();
        var status = $('#' + id).children('td[data-target=status]').text();

        $('#id_user').val(id);
        $('#username').val(username);
        $('#dataUname').val(username);
        $('#email').val(email);
        $('#status').val(status);
        $('#myModal2').modal('toggle');
    });

    $('.data').click(function () {
        var id = $(this).data("id");
        var username = $('#' + id).children('td[data-target=username]').text();
        if (username != 'admin') {
            window.location.href = "pemasukkanUser?username=" + username + "&idUser=" + id;
        }
    });

    // buat event untuk get data dan update ke database
    $('#save').click(function () {
        var username = $('#username').val();
        var email = $('#email').val();
        var status = $('#status').val();
        var id = $('#id_user').val();

        $.ajax({
            url: 'function/updateUser.php',
            method: 'post',
            data: {
                username: username,
                email: email,
                status: status,
                id: id
            },
            success: function () {
                $('#' + id).children('td[data-target=username]').text(username);
                $('#' + id).children('td[data-target=email]').text(email);
                $('#' + id).children('td[data-target=status]').text(status);
                $('#myModal2').modal('toggle');
                $('.cardview').load('ajax/tampilCardView');

            }
        });
    });
});