<?php 
session_start();
require 'function/functions.php';

if(isset($_COOKIE['login'])) {
    if ($_COOKIE['level'] == 'admin') {
        $_SESSION['login'] = true;
    } 
    
    elseif ($_COOKIE['level'] == 'user') {
        $_SESSION['login'] = true;
        header('Location: index');
    } 
} 

elseif ($_SESSION['level'] == 'admin') {
    $ambilNama = $_SESSION['user'];
} 

else {
    if ($_SESSION['level'] == 'user') {
        header('Location: index');
        exit;
    }
}

if(empty($_SESSION['login'])) {
    header('Location: login');
    exit;
} 

$username = $_GET['username'];
$idUser = $_GET['idUser'];

//konfigurasi pagenation
$jumlahTabel = 5;
$jumlahData = count(query("SELECT * FROM pengeluaran WHERE username = '$username'"));
$jumlahHalaman = ceil($jumlahData / $jumlahTabel);
$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awalData = ($jumlahTabel * $halamanAktif) - $jumlahTabel;

$pengeluaran = query("SELECT * FROM pengeluaran WHERE username = '$username' LIMIT $awalData, $jumlahTabel");
///konfigurasi pagenation
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Dompet-Qu - Pengeluaran</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/styler.css?v=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <style>
    </style>
</head>

<body>
    <div class="header">
        <img src="img/favicon.png" width="25px" height="25px" class="float-left logo-fav">
        <h3 class="text-secondary font-weight-bold float-left logo">Dompet</h3>
        <h3 class="text-secondary float-left logo2">- Qu</h3>
        <a href="administrator">
            <div class="logout">
                <i class="fas fa-sign-out-alt float-right log"></i>
                <p class="float-right logout"></p>
            </div>
        </a>
    </div>

    <div class="sidebar">
        <nav>
            <ul>
                <li>
                    <img src="img/profile.png" class="img-fluid profile float-left" width="60px">
                    <h5 class="admin"> <?= ucwords(substr($username, 0, 7)) ?></h5>
                    <div class="online">
                        <p class="float-right ontext">ID User : <?= $idUser ?></p>
                    </div>
                </li>
                <!-- fungsi slide -->
                <script>
                    $(document).ready(function(){
                    $("#flip").click(function(){
                        $("#panel").slideToggle("medium");
                        $("#panel2").slideToggle("medium");
                    });
                    $("#flip2").click(function(){
                        $("#panel3").slideToggle("medium");
                        $("#panel4").slideToggle("medium");
                    });
                });
                </script>

                <!-- dashboard -->
                <a href="pemasukkanUser?username=<?= $username ?>&idUser=<?= $idUser ?>" style="text-decoration: none;">
                <li style="cursor:pointer;">
                    <div>
                        <span><i class="fas fa-file-invoice-dollar"></i></span>
                        <span>Data Pemasukan</span>
                        </div>
                    </li></a>

                <!-- data -->
                <a href="pengeluaranUser?username=<?= $username ?>&idUser=<?= $idUser ?>" style="text-decoration: none;"></a>
                <li  class="aktif" style="border-left: 5px solid #306bff; ">
                    <div>
                        <span><i class="fas fa-hand-holding-usd"></i></span>
                        <span>Data Pengeluaran</span>
                    </div>
                </li></a>

                <!-- change icon -->
                <script>
                    $(".klik").click(function () {
                        $(this).find('i').toggleClass('fa-caret-up fa-caret-right');
                        if ($(".klik").not(this).find("i").hasClass("fa-caret-right")) {
                            $(".klik").not(this).find("i").toggleClass('fa-caret-up fa-caret-right');
                        }
                    });
                    $(".klik2").click(function () {
                        $(this).find('i').toggleClass('fa-caret-up fa-caret-right');
                        if ($(".klik2").not(this).find("i").hasClass("fa-caret-right")) {
                            $(".klik2").not(this).find("i").toggleClass('fa-caret-up fa-caret-right');
                        }
                    });
                </script>
                <!-- change icon -->
            </ul>
        </nav>
    </div>

    <div class="main-content khusus">
        <div class="konten khusus2">
            <div class="konten_dalem khusus3">
                <h2 class="head" style="color: #4b4f58;">Pengeluaran</h2>
                <hr style="margin-top: -2px;">

                <!-- bagian isi tabel -->
                <div class="headline">
                    <h5>Data Pengeluaran</h5>
                </div>
                <div class="container" id="container">
                    <div class="row tampil" id="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover table-striped table-bordered">
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan pengeluaran</th>
                                        <th>Keperluan Pengeluaran</th>
                                        <th>Jumlah Pengeluaran</th>
                                        
                                    </tr>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pengeluaran as $row) : ?>
                                    <tr class="show" id="<?= $row['username'] ?>">
                                        <td> <?= $i ?> </td>
                                        <td data-target="tanggal"><?= htmlspecialchars($row['tanggal']) ?></td>
                                        <td data-target="keterangan"><?= htmlspecialchars($row['keterangan']) ?></td>
                                        <td data-target="keperluan"><?= htmlspecialchars($row['keperluan']) ?></td>
                                        <td data-target="jumlahKeluar"><?= htmlspecialchars($row['jumlah']) ?></td>
                                        
                                    </tr>
                                    <?php
                                        $jumlah2[] = $row["jumlah"];
                                        $jumlahConvert = str_replace('.', '', $jumlah2);
                                        $totali = array_sum($jumlahConvert);
                                        $hasilJumlah = number_format($totali, 0, ',', '.');
                                    ?>
                                    <?php $i++ ?>
                                    <?php endforeach; ?>
                                    
                                    <?php if(isset($jumlah2) != null) :?>
                                    <tr>
                                        <td colspan="4">Total Pengeluaran</td>
                                        <td id="total" data-target="total"><?= $hasilJumlah ?></td>
                                    </tr>
                                    <?php endif; ?>

                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Button trigger modal -->
                    
                </div>
                <!-- bagian isi tabel -->

                <!-- pagenation -->
                    <div class="panel-footer">
                        <nav class="float-right page">
                            <ul class="pagination">

                                <?php if ($halamanAktif > 1) : ?>
                                <li class="page-item">
                                    <a href="?halaman=<?= $halamanAktif - 1 ?>&username=<?= $username ?>&idUser=<?= $idUser ?>" class="page-link">Previous</a>
                                </li>
                                <?php else : ?>
                                <li class="page-item">
                                    <div class="page-link">Previous</div>
                                </li>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                                    <?php if ($i == $halamanAktif) : ?>
                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="?halaman=<?= $i; ?>&username=<?= $username ?>&idUser=<?= $idUser ?>"><?= $i; ?></a>
                                    </li>
                                    <?php else : ?>
                                    <li class="page-item" aria-current="page">
                                        <a class="page-link" href="?halaman=<?= $i; ?>&username=<?= $username ?>&idUser=<?= $idUser ?>"><?= $i; ?></a>
                                    </li>
                                    <?php endif; ?>
                                <?php endfor; ?>

                                <?php if ($halamanAktif < $jumlahHalaman) : ?>
                                <li>
                                    <a href="?halaman=<?= $halamanAktif + 1 ?>&username=<?= $username ?>&idUser=<?= $idUser ?>" class="page-link" href="#">Next</a>
                                </li>
                                <?php else : ?>
                                <li class="page-item">
                                    <div class="page-link">Next</div>
                                </li>
                                <?php endif; ?>
                            </ul>

                        </nav>
                    </div>
                <!-- /pagenation -->
                
            </div>
        </div>
    </div>

    <script src="js/bootstrap.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</body>

</html>