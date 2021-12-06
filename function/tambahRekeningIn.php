<?php 
    require 'functions.php';

    if (empty($_POST['tanggal']) || empty($_POST['jumlah']) || empty($_POST['username'])) {
        echo '{"Status" : "Error", "Message" : "tanggal, jumlah, and username is required!"}';
        exit();
    }

    // tambah data
    $tanggal = htmlspecialchars($_POST["tanggal"]);
    $jumlah = htmlspecialchars($_POST["jumlah"]);
    $username = $_POST['username'];

    // query insert data
    $query = "INSERT INTO rekening_masuk(jumlah, tanggal, username) VALUES('$jumlah', '$tanggal', '$username')";
    
    if (mysqli_query($koneksi, $query)) {
        echo '{"Status" : "Succes", "Message" : "Data berhasil ditambahkan!"}';
    } else {
        echo '{"Status" : "Error", "Message" : '.mysqli_error($koneksi).'}';
    }

?>