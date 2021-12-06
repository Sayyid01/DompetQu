<?php 
    require '../function/functions.php';

    $username = $_GET['username'];
    
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