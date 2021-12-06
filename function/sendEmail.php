<?php
$name = 'Admin Dompet-Qu';
$email= 'm.azmirizkifar20@gmail.com';
$subject = 'Penonaktifan Akun Dompet-Qu';
$message = '<p style="text-align: center">Mohon maaf suadara/i <b>azmi</b>, 
            akun anda kami nonaktifkan dikarenakan anda melakukan penyalahgunaan pada aplikasi kami. 
            kami telah mempertimbangkan untuk menonaktifkan akun anda sampai batas waktu tertentu.</p> 
            <h3 style="text-align: center"><b>atas waktunya, kami ucapkan terimakasih!</b></h3>';

$to=$email;

$message="<div style='width: 50%; margin: auto; border: 1px solid black;'><h2 style='text-align: center'>$name</h2>".$message.'</div>';

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= 'From: Dompet-Qu <noreply@dompetqu.com>'."\r\n" . 'Reply-To : '.$name.' <'.$email.'>'."\r\n";
$headers .= 'Cc: admin@yourdomain.com' . "\r\n"; //untuk cc lebih dari satu tinggal kasih koma
@mail($to,$subject,$message,$headers);
if(@mail)
{
echo "Email sent successfully !!";	
}
?>