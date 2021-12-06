<?php 

require '../function/functions.php';
$jenis = $_GET['jenis'];
$tanggalAwal = $_GET['awal'];
$tanggalAkhir = $_GET['akhir'];
$sql = "SELECT * FROM $jenis WHERE tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir'";
$result = mysqli_query($koneksi, $sql);
$no = 1;

?>


<style type="text/css">
    table.page_header {width: 1020px; border: none; background-color: #DDDDFF; border-bottom: solid 1mm #AAAADD; padding: 2mm }
    table.page_footer {width: 1020px; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}
    h1 {color: #000033}
    h2 {color: #000055}
    h3 {color: #000077}
</style>

<page backtop="14mm" backbottom="14mm" backleft="1mm" backright="10mm">

    <page_header>
    <!-- Setting Header -->
    <table class="page_header">
        <tr>
            <td style="text-align: left;    width: 10%">Dompet - Qu</td>
            <td style="text-align: center;    width: 80%">LAPORAN PEMASUKKAN</td>
            <td style="text-align: right;    width: 10%"><?php echo date('d/m/Y'); ?></td>
        </tr>
    </table>
    </page_header>

<!-- Setting Footer -->
<page_footer>
    <table class="page_footer">
    <tr>
        <td style="width: 33%; text-align: left">
        <?= "laporan pemasukkan.pdf" ?>
        </td>
        <td style="width: 34%; text-align: center">
        </td>
        <td style="width: 33%; text-align: right">
        Dicetak oleh: azmirf
        </td>
    </tr>
    </table>
</page_footer>

<!-- Setting CSS Tabel data yang akan ditampilkan -->
<style type="text/css">
.tabel2 {
    border-collapse: collapse;
}
.tabel2 th, .tabel2 td {
    padding: 5px 5px;
    border: 1px solid #000;
}
</style>

<table>
    <tr>
    <th rowspan="3"><img src="images/logo.jpg" style="width:120px;height:100px" /></th>
    <td align="center" style="width: 800px;"><font style="font-size: 18px"><br><b>Laporan Pencatatan Keuangan Harian</b></font>
        <br><br>Monitoring keuangan harian anda dengan dompet - qu untuk mempermudah pengelolaan keuangan anda 
        <br><br>Laporan dibuat oleh </td>
    </tr>
</table>
<hr><br><br>

<table class="tabel2">
    <thead>
    <tr>
        <td style="text-align: center; background: #ddd"><b>No.</b></td>
        <td style="text-align: center; background: #ddd"><b>Tanggal</b></td>
        <td style="text-align: center; background: #ddd"><b>Keterangan Pemasukkan</b></td>
        <td style="text-align: center; background: #ddd"><b>Sumber Pemasukkan</b></td>
        <td style="text-align: center; background: #ddd"><b>Jumlah Pemasukkan</b></td>
    </tr>
    </thead>

    <tbody>
    
    <?php foreach($result as $row) : ?>
    <tr>
        <td style="text-align: center; width=50px;"><?= $no ?></td>
        <td style="text-align: center; width=100px;"><?= $row['tanggal'] ?></td>
        <td style="text-align: center; width=100px;"><?= $row['keterangan'] ?></td>
        <td style="text-align: center; width=87px;"><?= $row['sumber'] ?></td>
        <td style="text-align: center; width=75px;"><?= $row['jumlah'] ?></td>
    </tr>
    <?php 
        $jumlahe[] = $row['jumlah'];
        $jumlahConvert = str_replace('.', '', $jumlahe);
        $totali = array_sum($jumlahConvert);
        $hasilJumlah2 = number_format($totali, 2, ',', '.');
        $no++;
    ?>
    <?php endforeach; ?>
    
    <tr>
        <td colspan="4" style="text-align: center;">Total Pemasukkan</td>
        <td><?= $hasilJumlah2 ?></td>
    </tr>

    </tbody>
</table>
</page>
<!-- Memanggil fungsi bawaan HTML2PDF -->
<?php
$content = ob_get_clean();
include '../html2pdf/html2pdf.class.php';
try
{
    $html2pdf = new HTML2PDF('L', 'A4', 'en', false, 'UTF-8', array(10, 10, 4, 10));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('Laporan_pemasukkan.pdf');
}
catch(HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>