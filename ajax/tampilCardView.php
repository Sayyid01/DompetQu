<?php 
require '../function/functions.php';

$dataUser = query("SELECT * FROM users");
$jumlahUser = mysqli_query($koneksi, "SELECT * FROM users");
$jumlahUserAktif = mysqli_query($koneksi, "SELECT * FROM users WHERE status = 'aktif'");
$jumlahUserTidakAktif = mysqli_query($koneksi, "SELECT * FROM users WHERE status = 'tidak aktif'");
?>

<div class="col-md-4 jarak">
    <div class="card card-stats card-warning" style="background: #347ab8;">
        <div class="card-body ">
            <div class="row">
                <div class="col-5">
                    <div class="icon-big text-center">
                        <i class="fa fa-users ikon" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="col-7 d-flex align-items-center tulisan">
                    <div class="numbers">
                        <p class="card-category ket head">Jumlah User</p>
                        <h4 class="card-title ket total"><?= mysqli_num_rows($jumlahUser) ?> User
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4 jarak">
    <a style="text-decoration: none; cursor: pointer;" class="btn-userAktif">
        <div class="card card-stats card-warning" style="background:#5db85b ">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="fa fa-user ikon"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center tulisan">
                        <div class="numbers">
                            <p class="card-category ket head">User Aktif</p>
                            <h4 class="card-title ket total"><?= mysqli_num_rows($jumlahUserAktif) ?> User</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay" style="background: #5db85b;">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="fas fa-eye ikon2"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center">
                        <p class="tulisan">Lihat User</p>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>

<div class="col-md-4 jarak">
    <a style="text-decoration: none; cursor: pointer;" class="btn-userNonAktif">
        <div class="card card-stats card-warning" style="background: #d95350;">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="fas fa-power-off ikon"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center tulisan">
                        <div class="numbers">
                            <p class="card-category ket head">User Tidak Aktif</p>

                            <h4 class="card-title ket total"><?= mysqli_num_rows($jumlahUserTidakAktif) ?> User</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay" style="background: #d95350;">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="fas fa-eye ikon2"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center">
                        <p class="tulisan">Lihat User</p>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>

<!-- Modal user aktif -->
<div class="modal fade" id="myModal3" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Data user aktif</h5>
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
                        <th>ID User</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Status</th>
                    </tr>
                    <?php foreach($jumlahUserAktif as $row) : ?>
                        <tr>
                            <td><?= $row['id_user'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['level'] ?></td>
                            <td><?= $row['status']?></td>
                        </tr>
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
<!-- Modal user aktif -->

<!-- Modal user non-aktif -->
<div class="modal fade" id="myModal4" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Data user tidak aktif</h5>
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
                        <th>ID User</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Status</th>
                    </tr>
                    <?php foreach($jumlahUserTidakAktif as $row) : ?>
                        <tr>
                            <td><?= $row['id_user'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['level'] ?></td>
                            <td><?= $row['status']?></td>
                        </tr>
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
<!-- Modal user non-aktif -->

<!-- banyak modal -->
<script>
    $('.openBtn').click(function () {
        $('#myModal2').modal({
            show: true
        });
    })
    $('.btn-userAktif').click(function () {
        $('#myModal3').modal({
            show: true
        });
    })
    $('.btn-userNonAktif').click(function () {
        $('#myModal4').modal({
            show: true
        });
    })
</script>