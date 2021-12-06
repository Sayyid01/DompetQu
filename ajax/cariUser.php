<?php 
require '../function/functions.php';

$keyword = $_GET["keyword"];

//konfigurasi pagenation
$jumlahTabel = 5;
$jumlahData = count(query("SELECT * FROM users WHERE username NOT LIKE 'admin'"));
$jumlahHalaman = ceil($jumlahData / $jumlahTabel);
$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awalData = ($jumlahTabel * $halamanAktif) - $jumlahTabel;

$query = "SELECT * FROM users WHERE 
            (id_user LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            username LIKE '%$keyword%' OR
            status LIKE '$keyword%' OR
            level LIKE '%$keyword%' OR
            no_rek LIKE '%$keyword%') AND 
            username NOT LIKE 'admin'
            LIMIT $awalData, $jumlahTabel
        ";

$dataUser = query($query);
?>

<div class="row" id="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-sm table-hover table-striped table-bordered">
                <tr>
                    <th>ID User</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>No Rekening</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach($dataUser as $row) : ?>
                    <?php if ($row['username'] != 'admin') : ?>
                        <tr id="<?= $row['id_user'] ?>" style="cursor: pointer">
                            <td data-target="id_user" class="data" data-id="<?= $row['id_user'] ?>"><?= $row['id_user'] ?></td>
                            <td data-target="username" class="data" data-id="<?= $row['id_user'] ?>"><?= $row['username'] ?></td>
                            <td data-target="email" class="data" data-id="<?= $row['id_user'] ?>"><?= $row['email'] ?></td>
                            <td data-target="no_rek"><?= $row['no_rek'] ?></td>
                            <td class="data" data-id="<?= $row['id_user'] ?>"><?= $row['level'] ?></td>
                            <td data-target="status" class="data" data-id="<?= $row['id_user'] ?>"><?= $row['status']?></td>
                            <td>
                                <button data-id="<?= $row['id_user'] ?>" data-role="update" class="btn btn-outline-primary openBtn">
                                    <i class="fas fa-edit"></i> edit
                                </button>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<script src="ajax/js/updateUser.js"></script>