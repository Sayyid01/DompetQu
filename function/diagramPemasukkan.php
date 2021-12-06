<!-- Chart pemasukkan -->
<script type="text/javascript">
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["ATM", "Pemberian", "Piutang", "Laba", "Pekerjaan"],
            datasets: [{
                label: 'Data Pemasukkan',
                data: [
                <?php 
                $atm = mysqli_query($koneksi,"SELECT * FROM pemasukkan WHERE username = '$username' AND (sumber='ATM' AND tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir')");
                echo mysqli_num_rows($atm);
                ?>, 
                <?php 
                $pemberian = mysqli_query($koneksi,"SELECT * FROM pemasukkan WHERE username = '$username' AND (sumber='Pemberian' AND tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir')");
                echo mysqli_num_rows($pemberian);
                ?>, 
                <?php 
                $piutang = mysqli_query($koneksi,"SELECT * FROM pemasukkan WHERE username = '$username' AND (sumber='Piutang' AND tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir')");
                echo mysqli_num_rows($piutang);
                ?>, 
                <?php 
                $laba = mysqli_query($koneksi,"SELECT * FROM pemasukkan WHERE username = '$username' AND (sumber='Laba penjualan' AND tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir')");
                echo mysqli_num_rows($laba);
                ?>, 
                <?php 
                $pekerjaan = mysqli_query($koneksi,"SELECT * FROM pemasukkan WHERE username = '$username' AND (sumber='Pekerjaan' AND tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir')");
                echo mysqli_num_rows($pekerjaan);
                ?>
                ],
                backgroundColor: [
                'rgba(255, 99, 132)',
                'rgba(54, 162, 235)',
                'rgba(255, 206, 86)',
                'rgba(75, 192, 192)',
                'rgba(153, 102, 255)'
                ],
                borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>

<!-- Chart pemasukkan -->
<script type="text/javascript">
    var ctx = document.getElementById("myChart2").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["ATM", "Pemberian", "Piutang", "Laba", "Pekerjaan"],
            datasets: [{
                label: 'Data Pemasukkan',
                data: [
                <?php 
                    $atm = mysqli_query($koneksi,"SELECT * FROM pemasukkan WHERE username = '$username' AND sumber='ATM' AND tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
                    $atmSum = mysqli_num_rows($atm);
                    while ($dataAtm = mysqli_fetch_assoc($atm)) {
                        $jumlahAtm[] = $dataAtm['jumlah'];
                        $jumlahConvertAtm = str_replace('.', '', $jumlahAtm);
                        $totalAtm = array_sum($jumlahConvertAtm); 
                    }

                    if ($atmSum != null) {
                        echo $totalAtm;
                    } elseif ($atmSum == null) {
                        echo 0;
                    }
                ?>, 

                <?php 
                    $pemberian = mysqli_query($koneksi,"SELECT * FROM pemasukkan WHERE username = '$username' AND sumber='Pemberian' AND tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
                    $pemberianSum = mysqli_num_rows($pemberian);
                    while ($dataPemberian = mysqli_fetch_assoc($pemberian)) {
                        $jumlahPemberian[] = $dataPemberian['jumlah'];
                        $jumlahConvertPemberian = str_replace('.', '', $jumlahPemberian);
                        $totalPemberian = array_sum($jumlahConvertPemberian);
                    }

                    if ($pemberianSum != null) {
                        echo $totalPemberian;
                    } elseif ($pemberianSum == null) {
                        echo 0;
                    }
                ?>, 

                <?php 
                    $piutang = mysqli_query($koneksi,"SELECT * FROM pemasukkan WHERE username = '$username' AND sumber='Piutang' AND tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
                    $piutangSum = mysqli_num_rows($piutang);
                    while ($dataPiutang = mysqli_fetch_assoc($piutang)) {
                        $jumlahPiutang[] = $dataPiutang['jumlah'];
                        $jumlahConvertPiutang = str_replace('.', '', $jumlahPiutang);
                        $totalPiutang = array_sum($jumlahConvertPiutang);
                    }

                    if ($piutangSum != null) {
                        echo $totalPiutang;
                    } elseif ($piutangSum == null) {
                        echo 0;
                    }
                ?>, 

                <?php 
                    $laba = mysqli_query($koneksi,"SELECT * FROM pemasukkan WHERE username = '$username' AND sumber='Laba penjualan' AND tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
                    $labaSum = mysqli_num_rows($laba);
                    while ($dataLaba = mysqli_fetch_assoc($laba)) {
                        $jumlahLaba[] = $dataLaba['jumlah'];
                        $jumlahConvertLaba = str_replace('.', '', $jumlahLaba);
                        $totalLaba = array_sum($jumlahConvertLaba);
                    }

                    if ($labaSum != null) {
                        echo $totalLaba;
                    } elseif ($labaSum == null) {
                        echo 0;
                    }
                ?>, 

                <?php 
                    $pekerjaan = mysqli_query($koneksi,"SELECT * FROM pemasukkan WHERE username = '$username' AND sumber='Pekerjaan' AND tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
                    $kerjaSum = mysqli_num_rows($pekerjaan);
                    while ($dataPekerjaan = mysqli_fetch_assoc($pekerjaan)) {
                        $jumlahPekerjaan[] = $dataPekerjaan['jumlah'];
                        $jumlahConvertPekerjaan = str_replace('.', '', $jumlahPekerjaan);
                        $totalPekerjaan = array_sum($jumlahConvertPekerjaan);
                    }
                    
                    if ($kerjaSum != null) {
                        echo $totalPekerjaan;
                    } elseif ($kerjaSum == null) {
                        echo 0;
                    }
                ?>
                ],
                backgroundColor: [
                'rgba(255, 99, 132)',
                'rgba(54, 162, 235)',
                'rgba(255, 206, 86)',
                'rgba(75, 192, 192)',
                'rgba(153, 102, 255)'
                ],
                borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        }
    });
</script>