<?php

require '../function/functions.php';

if (empty($_GET['aksi'])) {
    echo '{"status" : "Error", "Message" : "aksi is required!"}';
    exit();
}

$aksi = $_GET['aksi'];
$query = "SELECT * FROM rekening_masuk WHERE aksi = '$aksi'";
$hasil = mysqli_query($koneksi, $query);

// kirim data ke json
$data = array();
while ($row = mysqli_fetch_assoc($hasil)) {
    $data[] = $row;
}

$json = json_encode($data, JSON_PRETTY_PRINT);

// masukkan ke file json data rekening
file_put_contents('dataRekeningMasuk.json', $json);

// untuk tes ke postman
echo $json;

?>