<?php 
require 'functions.php';

if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['status']) || empty($_POST['id'])) {
    echo '{"Status" : "Error", "Message" : "username, email, status, and ID is required!"}';
    exit();
}

$username = $_POST['username'];
$email = $_POST['email'];
$status = $_POST['status'];
$id = $_POST['id'];
$query = "UPDATE users SET username = '$username', email = '$email', status = '$status' WHERE id_user = '$id'";

if (mysqli_query($koneksi, $query)) {
    echo '{"Status" : "Succes", "Message" : "Data berhasil diupdate!"}';
} else {
    echo '{"Status" : "Error", "Message" : '.mysqli_error($koneksi).'}';
}

// send email
if ($status == 'tidak aktif') {
    $name = 'Admin Dompet-Qu';
    $subject = 'Penonaktifan Akun Dompet-Qu';
    $message = '<p style="text-align: center">Mohon maaf suadara/i <b>'.$username.'</b>, 
                akun anda kami nonaktifkan dikarenakan anda melakukan penyalahgunaan pada aplikasi kami. 
                kami telah mempertimbangkan untuk menonaktifkan akun anda sampai batas waktu tertentu.</p> 
                <h3 style="text-align: center"><b>atas waktunya, kami ucapkan terimakasih!</b></h3>';

    $to=$email;

    $message="<div style='width: 50%; margin: auto; padding: 10px; border: 1px solid black;'><h2 style='text-align: center'>$name</h2>".$message.'</div>';

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

    // More headers
    $headers .= 'From: Dompet-Qu <noreply@dompetqu.com>'."\r\n" . 'Reply-To : '.$name.' <'.$email.'>'."\r\n";
    $headers .= 'Cc: admin@yourdomain.com' . "\r\n"; //untuk cc lebih dari satu tinggal kasih koma
    @mail($to,$subject,$message,$headers);
} 

elseif($status == 'aktif') {
    $name = 'Admin Dompet-Qu';
    $subject = 'Pengaktifan Akun Dompet-Qu';
    $message = '<p style="text-align: center">Selamat suadara/i <b>'.$username.'!</b>, 
                akun anda telah kami aktifkan kembali, dimohon untuk menggunakan aplikasi kami dengan bijak dan sesuai dengan ketentuan. 
                kami telah mempertimbangkan untuk mengaktifkan kembali akun anda selama tidak melanggar segala ketentuan.</p> 
                <h3 style="text-align: center"><b>atas waktunya, kami ucapkan terimakasih!</b></h3>
                <a style="text-align: center" href="http://dompetqu.000webhostapp.com" target="_blank">Gunakan Dompet-Qu</a>';

    $to=$email;

    $message="<div style='width: 50%; margin: auto; padding: 10px; border: 1px solid black;'><h2 style='text-align: center'>$name</h2>".$message.'</div>';

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

    // More headers
    $headers .= 'From: Dompet-Qu <noreply@dompetqu.com>'."\r\n" . 'Reply-To : '.$name.' <'.$email.'>'."\r\n";
    $headers .= 'Cc: admin@yourdomain.com' . "\r\n"; //untuk cc lebih dari satu tinggal kasih koma
    @mail($to,$subject,$message,$headers);
}
?>