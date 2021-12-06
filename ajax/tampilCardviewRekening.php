<?php 
    require '../function/functions.php';

    $username = $_GET['username'];
    
    $totalPemasukan = query("SELECT * FROM pemasukkan WHERE username = '$username'");
    $totalPengeluaran = query("SELECT * FROM pengeluaran WHERE username = '$username'");
    
    foreach ( $totalPemasukan as $rowMasuk ) {
        $hargaMasuk[] = $rowMasuk["jumlah"];
        $convertHarga = str_replace('.', '', $hargaMasuk);
        $totalMasuk = array_sum($convertHarga);
    }

    foreach ( $totalPengeluaran as $rowKeluar ) {
        $hargaKeluar[] = $rowKeluar["jumlah"];
        $convertHarga2 = str_replace('.', '', $hargaKeluar);
        $totalKeluar = array_sum($convertHarga2);
    }

    // saldo dompet
    global $totalMasuk, $totalKeluar;
    $saldo = $totalMasuk - $totalKeluar;
    $saldoFix = number_format($saldo, 0, ',', '.'); 

    // pemasukkan rekening
    $rekeningMasuk = query("SELECT * FROM rekening_masuk WHERE username = '$username'");
    foreach ($rekeningMasuk as $rowRekIn) {
        $jumlah[] = $rowRekIn['jumlah'];
        $jumlahConvert = str_replace('.', '', $jumlah);
        $totalRekIn = array_sum($jumlahConvert);
    }
    
    // pengeluaran rekening
    $rekeningKeluar = query("SELECT * FROM rekening_keluar WHERE username = '$username'");
    foreach ($rekeningKeluar as $rowRekOut) {
        $jumlah2[] = $rowRekOut['jumlah'];
        $jumlahConvert2 = str_replace('.', '', $jumlah2);
        $totalRekOut = array_sum($jumlahConvert2);
    }

    // saldo rekening
    global $totalRekIn, $totalRekOut;
    $saldoRek = $totalRekIn - $totalRekOut;
    $saldoRekFix = number_format($saldoRek, 0, ',', '.');
    $no = 1;
?>

<div class="col-md-4 jarak">
    <div class="card card-stats card-warning" style="background: #347ab8;">
        <div class="card-body ">
            <div class="row">
                <div class="col-5">
                    <div class="icon-big text-center">
                        <i class="fas fa-wallet ikon"></i>
                    </div>
                </div>
                <div class="col-7 d-flex align-items-center tulisan">
                    <div class="numbers">
                        <p class="card-category ket head">Saldo dompet</p>
                        <h4 class="card-title ket total">Rp. <?=$saldoFix;?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4 jarak">
    <a href="tambahPengeluaran" style="text-decoration: none;">
        <div class="card card-stats card-warning" style="background: #d95350;">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="fa fa-file-invoice-dollar ikon"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center tulisan">
                        <div class="numbers">
                            <p class="card-category ket head">Pengeluaran</p>
                            <?php foreach ($totalPengeluaran as $row) : ?>
                            <?php
                                $hargaPengeluaran[] = $row["jumlah"];
                                $hargaConvert = str_replace('.', '', $hargaPengeluaran);
                                $totalPeng = array_sum($hargaConvert);
                                $hasilHargaPengeluaran = number_format($totalPeng, 0, ',', '.');   
                            ?>                                     
                            <?php endforeach; ?>

                            <?php global $hasilHargaPengeluaran;
                            if ( $hasilHargaPengeluaran != "" ) : ?>
                            <h4 class="card-title ket total">Rp. <?= $hasilHargaPengeluaran; ?></h4>
                            <?php else : ?>
                            <h4 class="card-title ket total">Rp. 0</h4>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay" style="background: #e45351;">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="fas fa-plus-circle ikon2"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center">
                        <p class="tulisan">Tambah Data</p>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>

<div class="col-md-4 jarak">
    <a href="tambahPemasukkan" style="text-decoration: none;">
        <div class="card card-stats card-warning" style="background: #5db85b;">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="fa fa-hand-holding-usd ikon"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center tulisan">
                        <div class="numbers">
                            <p class="card-category ket head">Pemasukkan</p>
                            <?php foreach ($totalPemasukan as $row) : ?>
                                <?php
                                    $hargaPemasukkan[] = $row["jumlah"];
                                    $hargaConvert = str_replace('.', '', $hargaPemasukkan);
                                    $totalPem = array_sum($hargaConvert);
                                    $hasilHarga = number_format($totalPem, 0, ',', '.');    
                                ?>     
                            <?php endforeach ?>

                            <?php global $hasilHarga;
                            if ( $hasilHarga != "" ) : ?>
                            <h4 class="card-title ket total">Rp. <?= $hasilHarga ?> </h4>
                            <?php else : ?>
                            <h4 class="card-title ket total">Rp. 0 </h4>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="fas fa-plus-circle ikon2"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center">
                        <p class="tulisan">Tambah Data</p>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
<div class="rekening">
    <div class="row tampil">
        <div class="col-lg-5 rek">
            <div class="konten-rekening border-right">
                <p>Saldo Rekening</p>
                <h3>Rp. <?= $saldoRekFix ?></h3>
                <button class="btn btn-lg add-rekening btn-prev" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-dollar-sign"></i>
                    Kelola rekening</button>
                <hr>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="history text-center">
                            <a href="#" id="openBtn3">
                                <i class="fas fa-history"></i>
                                <span>History</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="refresh text-center">
                            <a href="dashboard">
                                <i class="fas fa-sync-alt"></i>
                                <span>Refresh</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 rek">
            <canvas id="myChart" width="60px" height="30px"></canvas>
        </div>
    </div>
</div>

<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: ["Saldo masuk", "Saldo keluar"],
            datasets: [{
                label: 'Data rekening',
                data: [
                    <?= $totalRekIn ?>, 
                    <?= $totalRekOut ?>
                ],
                backgroundColor: [
                    'rgba(255, 99, 132)',
                    'rgba(54, 162, 235)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    stacked: true
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }
    });
</script>

<!-- Modal history -->
<div class="modal fade" id="myModal4" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Riwayat transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- isi form -->
            <script type="text/javascript" src="js/pisahTitik.js"></script>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-bordered">
                    <tr>
                        <th>No.</th>
                        <th>Kode transaksi</th>
                        <th>Nominal</th>
                        <th>Aksi</th>
                        <th>Tanggal</th>
                    </tr>
                    <?php foreach($rekeningMasuk as $row) : ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['kode'] ?></td>
                            <td><?= $row['jumlah'] ?></td>
                            <td><?= $row['aksi'] ?></td>
                            <td><?= $row['tanggal'] ?></td>
                        </tr>
                        <?php $no++ ?>
                    <?php endforeach; ?>

                    <?php foreach($rekeningKeluar as $row) : ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['kode'] ?></td>
                            <td><?= $row['jumlah'] ?></td>
                            <td><?= $row['aksi'] ?></td>
                            <td><?= $row['tanggal'] ?></td>
                        </tr>
                        <?php $no++ ?>
                    <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <!-- footer form -->
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal history -->

<!-- banyak modal -->
<script>
    $('#openBtn').click(function () {
        $('#myModal2').modal({
            show: true
        });
    })
    $('#openBtn2').click(function () {
        $('#myModal3').modal({
            show: true
        });
    })
    $('#openBtn3').click(function () {
        $('#myModal4').modal({
            show: true
        });
    })
</script>