<?php 
// koneksi ke databse
require '../function/functions.php';

$output = '';
if (isset($_POST['excel'])) {
    $jenis = $_GET['jenis'];
    $tanggalAwal = $_GET['awal'];
    $tanggalAkhir = $_GET['akhir'];
    $username = $_GET['username'];
    $sql = "SELECT * FROM $jenis WHERE username = '$username' AND (tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir')";
    $result = mysqli_query($koneksi, $sql);
    $no = 1;

    if (mysqli_num_rows($result) > 0) {
        $output .= '
            <table class="table" border="1" cellspacing="0" cellpadding="3">
                <tr>
                    <th>No.</th>   
                    <th>Tanggal</th>
                    <th>Keterangan Pengeluaran</th>
                    <th>Keperluan Pengeluaran</th>
                    <th>Jumlah Pengeluaran</th>
                </tr>
        ';
        while ($row = mysqli_fetch_assoc($result)) {
            // masukin nilai ke variabel
            $jumlah = $row["jumlah"];
            // konversi string nilai ke int + split
            $jumlahConvert = str_replace('.', '', $jumlah);
            $hasilJumlah = number_format ($jumlahConvert, 2, ',', '.');
            $output .= '
            <tr>
                <td>' . $no . '</td>
                <td>' . $row["tanggal"] . '</td>
                <td>' . $row["keterangan"] . '</td>
                <td>' . $row["keperluan"] . '</td>
                <td>' . $hasilJumlah . '</td>
            </tr>
            ';
            $jumlahe[] = $row["jumlah"];
            $jumlahConvert = str_replace('.', '', $jumlahe);
            $totali = array_sum($jumlahConvert);
            $hasilJumlah2 = number_format($totali, 2, ',', '.');
            $no++;
        }
        $output .= '
            <tr>
                <td colspan="4" style="text-align: center;">Total Pengeluaran</td>
                <td>' . $hasilJumlah2 . '</td>
            </tr>
        ';
        $output .= '</table>';
        header("Content-Type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan Pengeluaran.xls");
        echo $output;
    }
}

?>