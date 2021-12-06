<?php 
    session_start();
    require "function/functions.php";
    
    // session dan cookie multilevel user
    if(isset($_COOKIE['login'])) {
        if ($_COOKIE['level'] == 'user') {
            $_SESSION['login'] = true;
            $ambilNama = $_COOKIE['login'];
        } 
        
        elseif ($_COOKIE['level'] == 'admin') {
            $_SESSION['login'] = true;
            header('Location: administrator');
        }
    } 

    elseif ($_SESSION['level'] == 'user') {
        $ambilNama = $_SESSION['user'];
    } 
    
    else {
        if ($_SESSION['level'] == 'admin') {
            header('Location: administrator');
            exit;
        }
    }

    if(empty($_SESSION['login'])) {
        header('Location: login');
        exit;
    } 
    
    $month = date('m');
    $day = date('d');
    $year = date('Y');
    
    $today = $year . '-' . $month . '-' . $day;

    $pengeluaran = query("SELECT * FROM pengeluaran WHERE tanggal = '$today' AND username = '$ambilNama'");
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
</head>

<body>
    <div class="header">
        <img src="img/favicon.png" width="25px" height="25px" class="float-left logo-fav">
        <h3 class="text-secondary font-weight-bold float-left logo">Dompet</h3>
        <h3 class="text-secondary float-left logo2">- Qu</h3>
        <a href="logout">
            <div class="logout">
                <i class="fas fa-sign-out-alt float-right log"></i>
                <p class="float-right logout">Logout</p>
            </div>
        </a>
    </div>

    <div class="sidebar">
        <nav>
            <ul>
                <li>
                    <img src="img/profile.png" class="img-fluid profile float-left" width="60px">
                    <h5 class="admin"><?= substr($ambilNama, 0, 7) ?></h5>
                    <div class="online online2">
                        <p class="float-right ontext">Online</p>
                        <div class="on float-right"></div>
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
                <a href="dashboard" style="text-decoration: none;">
                    <li>
                        <div>
                            <span class="fas fa-tachometer-alt"></span>
                            <span>Dashboard</span>
                        </div>
                    </li>
                </a>

                <!-- data -->
                <li class="klik" id="flip" style="cursor:pointer;">
                    <div>
                        <span class="fas fa-database"></span>
                        <span>Data Harian</span>
                        <i class="fas fa-caret-up float-right" style="line-height: 20px;"></i>
                    </div>
                </li>

                <a href="pemasukkan" class="linkAktif">
                    <li id="panel">
                        <div style="margin-left: 20px;">
                            <span><i class="fas fa-file-invoice-dollar"></i></span>
                            <span>Data Pemasukan</span>
                        </div>
                    </li>
                </a>

                <a href="pengeluaran" class="linkAktif">
                    <li id="panel2" class="aktif" style="border-left: 5px solid #306bff;">
                        <div style="margin-left: 20px;">
                            <span><i class="fas fa-hand-holding-usd"></i></span>
                            <span>Data Pengeluaran</span>
                        </div>
                    </li>
                </a>
                <!-- dashboard -->

                <!-- Input -->
                <li class="klik2" id="flip2" style="cursor:pointer;">
                    <div>
                        <span class="fas fa-plus-circle"></span>
                        <span>Input Data</span>
                        <i class="fas fa-caret-right float-right" style="line-height: 20px;"></i>
                    </div>
                </li>

                <a href="tambahPemasukkan" class="linkAktif">
                    <li id="panel3" style="display: none;">
                        <div style="margin-left: 20px;">
                            <span><i class="fas fa-file-invoice-dollar"></i></span>
                            <span>Pemasukkan</span>
                        </div>
                    </li>
                </a>

                <a href="tambahPengeluaran" class="linkAktif">
                    <li id="panel4" style="display: none;">
                        <div style="margin-left: 20px;">
                            <span><i class="fas fa-hand-holding-usd"></i></span>
                            <span>Pengeluaran</span>
                        </div>
                    </li>
                </a>
                <!-- Input -->

                <!-- laporan -->
                <a href="laporan" style="text-decoration: none;">
                    <li>
                        <div>
                            <span><i class="fas fa-clipboard-list"></i></span>
                            <span>Laporan</span>
                        </div>
                    </li>
                </a>

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

                <div class="row cari-filter">
                    <div class="col-lg-5">
                        <table class="tabel-data">
                            <tr>
                                <td><label>Pilih tanggal</label></td>
                                <td style="width: 71%"><input type="date" value="<?= $today ?>" class="form-control filter" id="filter"></td>
                            </tr>
                        </table>
                        
                    </div>
                    <div class="col-lg-4">
                        <input type="hidden" id="username" value="<?= $ambilNama ?>">
                    </div>

                    <div class="col-lg-3">
                        <div class="input-group">
                            <input type="text" name="cari" class="form-control border-right-0 cari" id="keyword" placeholder="Search" autocomplete="off">
                            <div class="input-group-append">
                                <span class="input-group-text bg-white border-left-0 icone"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

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
                                        <th>Keterangan Pengeluaran</th>
                                        <th>Keperluan Pengeluaran</th>
                                        <th>Jumlah Pengeluaran</th>
                                        <th>Aksi</th>
                                    </tr>

                                    <?php $i = 1; ?>
                                    <?php foreach($pengeluaran as $row) : ?>
                                    <tr class="show" id="<?= $row['id'] ?>">
                                        <td> <?= $i ?> </td>
                                        <td data-target="tanggal"><?= htmlspecialchars($row['tanggal']) ?></td>
                                        <td data-target="keterangan"><?= htmlspecialchars($row['keterangan']) ?> </td>
                                        <td data-target="keperluan"><?= htmlspecialchars($row['keperluan']) ?></td>
                                        <td data-target="jumlahKeluar"><?= htmlspecialchars($row['jumlah']) ?></td>
                                        <td>
                                            <a href="#" class="btn btn-info delete" id="<?= $row['id'] ?>">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                            <a href="#" data-role="update" class="btn btn-outline-secondary" id="openBtn" data-id="<?= $row['id'] ?>">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                        $jumlah2[] = $row["jumlah"];
                                        $jumlahConvert = str_replace('.', '', $jumlah2);
                                        $totali = array_sum($jumlahConvert);
                                        $hasilJumlah = number_format($totali, 0, ',', '.');
                                    ?>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>

                                    <?php if(isset($jumlah2) != null) :?>
                                    <tr>
                                        <td colspan="4">Total Pengeluaran</td>
                                        <td id="total" data-target="total">
                                        <?= $hasilJumlah ?>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn2" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class=" fas fa-hand-holding-usd"></i> Tambah Data
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Pengeluaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- isi form -->
                    <div class="modal-body">
                        <script type="text/javascript" src="js/pisahTitik.js"></script>
                        <div class="form-group">
                            <label>Masukkan Tanggal</label>
                            <input type="date" value="<?= $today ?>" id="tanggalTambah" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Masukkan Keterangan Pengeluaran</label>
                            <input type="text" id="keteranganTambah" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Masukkan Keperluan Pengeluaran</label>
                            <select id="keperluanTambah" class="form-control">
                                <option>Makan dan Minum</option>
                                <option>Hutang</option>
                                <option>Peralatan</option>
                                <option>Organisasi</option>
                                <option>Kendaraan</option>
                                <option>Keperluan pribadi</option>
                                <option>Lain - lain</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Masukkan Jumlah Pengeluaran</label>
                            <input type="text" id="jumlahTambah" class="form-control" onkeydown="return numbersonly(this, event);"
                                onkeyup="javascript:tandaPemisahTitik(this);" required>
                        </div>
                    </div>
                    <!-- footer form -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary tambahKeluar">Tambah</button>
                    </div>
            </div>
        </div>
    </div>
    <!-- Modal Tambah Data -->

    <!-- Modal edit data -->
    <div class="modal fade" id="myModal2" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Data Pengeluaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- isi form -->
                <div class="modal-body">
                    <input type="hidden" id="userId" class="form-control">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan Pengeluaran</label>
                        <input type="text" class="form-control" id="keterangan" required>
                    </div>
                    <div class="form-group">
                        <label for="keperluan">Keperluan Pengeluaran</label>
                        <select class="form-control" id="keperluan">
                            <option>Makan dan Minum</option>
                            <option>Hutang</option>
                            <option>Peralatan</option>
                            <option>Organisasi</option>
                            <option>Kendaraan</option>
                            <option>Keperluan pribadi</option>
                            <option>Lain - lain</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlahKeluar">Jumlah Pengeluaran</label>
                        <input type="text" class="form-control" id="jumlahKeluar" onkeydown="return numbersonly(this, event);"
                            onkeyup="javascript:tandaPemisahTitik(this);" required>
                    </div>
                </div>
                <!-- footer form -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <a href="#" id="save" class="btn btn-primary">simpan</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal edit data -->

    <!-- double modal -->
    <script>
        $('#openBtn').click(function () {
            $('#myModal2').modal({
                show: true
            });
        })
    </script>

    <script src="js/bootstrap.js"></script>
    <script src="ajax/js/filterPengeluaran.js"></script>
    <script src="ajax/js/tambahPengeluaran.js"></script>
    <script src="ajax/js/deletePengeluaran.js"></script>
    <script src="ajax/js/cariPengeluaran.js"></script>
    <script src="ajax/js/updatePengeluaran.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</body>

</html>