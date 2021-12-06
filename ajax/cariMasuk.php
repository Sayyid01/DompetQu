<?php 
    require '../function/functions.php';
    
    $keyword = $_GET["keyword"];
    $username = $_GET["username"];
    $filter = $_GET["filter"];
    
    $query = "SELECT * FROM pemasukkan WHERE 
                (tanggal LIKE '%$keyword%' OR
                keterangan LIKE '%$keyword%' OR
                sumber LIKE '%$keyword%' OR
                jumlah LIKE '%$keyword%') AND
                username = '$username'
            ";
    $query2 = "SELECT * FROM pemasukkan WHERE username = '$username' AND tanggal = '$filter'";

    $pemasukkan = query($query);
    $null = query($query2);
?>


<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-sm table-hover table-striped table-bordered">
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Keterangan Pemasukkan</th>
                <th>Sumber Pemasukkan</th>
                <th>Jumlah Pemasukkan</th>
                <th>Aksi</th>
            </tr>

            <?php $i = 1; ?>
            <?php if ($keyword != null) : ?>
                <?php foreach ($pemasukkan as $row) : ?>
                <tr class="show" id="<?= $row["id"]; ?>">
                    <td><?= $i; ?> </td>
                    <td data-target="tanggal"><?= $row["tanggal"] ?></td>
                    <td data-target="keterangan"><?= $row["keterangan"] ?></td>
                    <td data-target="sumber"><?= $row["sumber"] ?></td>
                    <td data-target="jumlahMasuk"><?= $row['jumlah'] ?></td>
                    <td>    
                        <a href="#" id="<?= $row["id"] ;?>" class="btn btn-info delete"><i class="fas fa-trash-alt"></i></a>
                        <a href="#" data-role="update" data-id="<?= $row["id"] ;?>" class="btn btn-outline-secondary" id="openBtn"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                <?php
                    $jumlah2[] = $row["jumlah"];
                    $jumlahConvert = str_replace('.', '', $jumlah2);
                    $totali = array_sum($jumlahConvert);
                    $hasilcon = number_format($totali, 0, ',', '.');
                ?>
                <?php $i++ ?>
                <?php endforeach; ?>

            <?php elseif ($keyword == null) : ?>
                <?php foreach ($null as $row) : ?>
                    <tr class="show" id="<?= $row["id"]; ?>">
                        <td><?= $i; ?> </td>
                        <td data-target="tanggal"><?= $row["tanggal"] ?></td>
                        <td data-target="keterangan"><?= $row["keterangan"] ?></td>
                        <td data-target="sumber"><?= $row["sumber"] ?></td>
                        <td data-target="jumlahMasuk"><?= $row['jumlah'] ?></td>
                        <td>    
                            <a href="#" id="<?= $row["id"] ;?>" class="btn btn-info delete"><i class="fas fa-trash-alt"></i></a>
                            <a href="#" data-role="update" data-id="<?= $row["id"] ;?>" class="btn btn-outline-secondary" id="openBtn"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    <?php
                        $jumlah2[] = $row["jumlah"];
                        $jumlahConvert = str_replace('.', '', $jumlah2);
                        $totali = array_sum($jumlahConvert);
                        $hasilcon = number_format($totali, 0, ',', '.');
                    ?>
                    <?php $i++ ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if ($keyword != null) : ?>
                <?php if ( isset($keyword) == $pemasukkan ) : ?> 
                <tr>
                    <td colspan="4">Total Pemasukkan</td>
                    <td><?= $hasilcon ?></td>
                </tr>
                <?php elseif ( isset($keyword) != $pemasukkan ) : ?> 
                <tr>
                </tr>
                <?php endif; ?>
            <?php endif; ?>

        </table>
    </div>
</div>

<script src="ajax/js/deletePemasukkan.js"></script>