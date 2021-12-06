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
    $query = "INSERT INTO rekening_keluar(jumlah, tanggal, username) VALUES('$jumlah', '$tanggal', '$username')";
    $query2 = "INSERT INTO pemasukkan VALUES ('', '$tanggal', 'Tarik tunai', 'ATM', '$jumlah', '$username')";
    
    if (mysqli_query($koneksi, $query) && mysqli_query($koneksi, $query2)) {
        echo '{"Status" : "Succes", "Message" : "Data berhasil ditambahkan!"}';
    } else {
        echo '{"Status" : "Error", "Message" : '.mysqli_error($koneksi).'}';
    }
    
?>