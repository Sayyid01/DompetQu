<?php 
require '../function/functions.php';

$level = $_GET['level'];
if (empty($_GET['level'])) {
    echo '{"status" : "Error", "Message" : "level is required!"}';
    exit();
}

// buat xml
$xml = new SimpleXMLElement('<rss version="2.0"/>');

$query = "SELECT * FROM users WHERE level = '$level'";
$hasil = mysqli_query($koneksi, $query);

// kirim data ke json
$data = array();

while ($row = mysqli_fetch_assoc($hasil)) {
    $data[] = $row;

    // masukkin data ke XML
    $track = $xml -> addChild('users');
    $track -> addChild('id_user', $row['id_user']);
    $track -> addChild('email', $row['email']);
    $track -> addChild('username', $row['username']);
    $track -> addChild('password', $row['password']);
    $track -> addChild('status', $row['status']);
    $track -> addChild('level', $row['level']);
    $track -> addChild('no_rek', $row['no_rek']);
}

$json = json_encode($data, JSON_PRETTY_PRINT);

// masukkan ke file dataUser.json
file_put_contents('dataUser.json', $json);

// untuk tes json ke postman
echo $json;

// pakai DOMDocument untuk percantik simpleXML
$dom = new DOMDocument('1.0');
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom_xml = dom_import_simplexml($xml);
$dom_xml = $dom->importNode($dom_xml, true);
$dom_xml = $dom->appendChild($dom_xml);

// masukkan ke file dataUser.xml
$dom -> save('dataUser.xml');

// untuk tes XML ke postman
echo '<pre>' . $dom->saveXML() . '</pre>';
?>
