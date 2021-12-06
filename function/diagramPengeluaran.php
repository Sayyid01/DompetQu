<!-- Chart pemasukkan -->
<script type="text/javascript">
    var ctx = document.getElementById("myChart3").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Makan & minum", "Hutang", "Peralatan", "Organisasi", "Kendaraan", "Keperluan pribadi"],
            datasets: [{
                label: 'Data Pengeluaran',
                data: [
                <?php 
                $makan = mysqli_query($koneksi,"SELECT * FROM pengeluaran WHERE username = '$username' AND keperluan='Makan dan Minum' AND tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
                echo mysqli_num_rows($makan);
                ?>, 
                <?php 
                $hutang = mysqli_query($koneksi,"SELECT * FROM pengeluaran WHERE username = '$username' AND keperluan='Hutang' AND tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
                echo mysqli_num_rows($hutang);
                ?>, 
                <?php 
                $peralatan = mysqli_query($koneksi,"SELECT * FROM pengeluaran WHERE username = '$username' AND keperluan='Peralatan' AND tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
                echo mysqli_num_rows($peralatan);
                ?>, 
                <?php 
                $organisasi = mysqli_query($koneksi,"SELECT * FROM pengeluaran WHERE username = '$username' AND keperluan='Organisasi' AND tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
                echo mysqli_num_rows($organisasi);
                ?>, 
                <?php 
                $kendaraan = mysqli_query($koneksi,"SELECT * FROM pengeluaran WHERE username = '$username' AND keperluan='Kendaraan' AND tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
                echo mysqli_num_rows($kendaraan);
                ?>,
                <?php 
                $pribadi = mysqli_query($koneksi,"SELECT * FROM pengeluaran WHERE username = '$username' AND keperluan='Keperluan pribadi' AND tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
                echo mysqli_num_rows($pribadi);
                ?>
                ],
                backgroundColor: [
                'rgba(255, 99, 132)',
                'rgba(54, 162, 235)',
                'rgba(255, 206, 86)',
                'rgba(75, 192, 192)',
                'rgba(153, 102, 255)',
                '#2dc750'
                ],
                borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                '#2dc750'
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
    var ctx = document.getElementById("myChart4").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Makan & minum", "Hutang", "Peralatan", "Organisasi", "Kendaraan", "Keperluan Pribadi"],
            datasets: [{
                label: 'Data Pengeluaran',
                data: [
                <?php 
                    $makan = mysqli_query($koneksi,"SELECT * FROM pengeluaran WHERE username = '$username' AND keperluan='Makan dan Minum' AND tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
                    $makanSum = mysqli_num_rows($makan);
                    while ($dataMakan = mysqli_fetch_assoc($makan)) {
                        $jumlahMakan[] = $dataMakan['jumlah'];
                        $jumlahConvertMakan = str_replace('.', '', $jumlahMakan);
                        $totalMakan = array_sum($jumlahConvertMakan);
                    }

                    if ($makanSum != null) {
                        echo $totalMakan;
                    } elseif ($makanSum == null) {
                        echo 0;
                    }
                ?>, 

                <?php 
                    $hutang = mysqli_query($koneksi,"SELECT * FROM pengeluaran WHERE username = '$username' AND keperluan='Hutang' AND tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
                    $hutangSum = mysqli_num_rows($hutang);
                    while ($dataHutang = mysqli_fetch_assoc($hutang)) {
                        $jumlahHutang[] = $dataHutang['jumlah'];
                        $jumlahConvertHutang = str_replace('.', '', $jumlahHutang);
                        $totalHutang = array_sum($jumlahConvertHutang);
                    }

                    if ($hutangSum != null) {
                        echo $totalHutang;
                    } elseif ($hutangSum == null) {
                        echo 0;
                    }
                ?>, 

                <?php 
                    $peralatan = mysqli_query($koneksi,"SELECT * FROM pengeluaran WHERE username = '$username' AND keperluan='Peralatan' AND tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
                    $peralatanSum = mysqli_num_rows($peralatan);
                    while ($dataPeralatan = mysqli_fetch_assoc($peralatan)) {
                        $jumlahPeralatan[] = $dataPeralatan['jumlah'];
                        $jumlahConvertPeralatan = str_replace('.', '', $jumlahPeralatan);
                        $totalPeralatan = array_sum($jumlahConvertPeralatan);
                    }

                    if ($peralatanSum != null) {
                        echo $totalPeralatan;
                    } elseif ($peralatanSum == null) {
                        echo 0;
                    }
                ?>, 

                <?php 
                    $organisasi = mysqli_query($koneksi,"SELECT * FROM pengeluaran WHERE username = '$username' AND keperluan='Organisasi' AND tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
                    $organisasiSum = mysqli_num_rows($organisasi);
                    while ($dataOrganisasi = mysqli_fetch_assoc($organisasi)) {
                        $jumlahOrganisasi[] = $dataOrganisasi['jumlah'];
                        $jumlahConvertOrganisasi = str_replace('.', '', $jumlahOrganisasi);
                        $totalOrganisasi = array_sum($jumlahConvertOrganisasi);
                    }

                    if ($organisasiSum != null) {
                        echo $totalOrganisasi;
                    } elseif ($organisasiSum == null) {
                        echo 0;
                    }
                ?>, 

                <?php 
                    $kendaraan = mysqli_query($koneksi,"SELECT * FROM pengeluaran WHERE username = '$username' AND keperluan='Kendaraan' AND tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
                    $kendaraanSum = mysqli_num_rows($kendaraan);
                    while ($dataKendaraan = mysqli_fetch_assoc($kendaraan)) {
                        $jumlahKendaraan[] = $dataKendaraan['jumlah'];
                        $jumlahConvertKendaraan = str_replace('.', '', $jumlahKendaraan);
                        $totalKendaraan = array_sum($jumlahConvertKendaraan);
                    }
                    
                    if ($kendaraanSum != null) {
                        echo $totalKendaraan;
                    } elseif ($kendaraanSum == null) {
                        echo 0;
                    }
                ?>,
                
                <?php 
                    $pribadi = mysqli_query($koneksi,"SELECT * FROM pengeluaran WHERE username = '$username' AND keperluan='Keperluan pribadi' AND tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'");
                    $pribadiSum = mysqli_num_rows($pribadi);
                    while ($dataPribadi = mysqli_fetch_assoc($pribadi)) {
                        $jumlahPribadi[] = $dataPribadi['jumlah'];
                        $jumlahConvertPribadi = str_replace('.', '', $jumlahPribadi);
                        $totalPribadi = array_sum($jumlahConvertPribadi);
                    }
                    
                    if ($pribadiSum != null) {
                        echo $totalPribadi;
                    } elseif ($pribadiSum == null) {
                        echo 0;
                    }
                ?>
                ],
                backgroundColor: [
                'rgba(255, 99, 132)',
                'rgba(54, 162, 235)',
                'rgba(255, 206, 86)',
                'rgba(75, 192, 192)',
                'rgba(153, 102, 255)',
                '#2dc750'
                ],
                borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                '#2dc750'
                ],
                borderWidth: 1
            }]
        }
    });
</script>