<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title ?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><?= $title ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- COLOR PALETTE -->
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <!-- Profile Image -->
                <div class="box box-success">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="<?= ($user['foto']) ? base_url('foto/' . $user['foto']) : base_url('foto/default.png') ?>?>" alt="<?= $user['nama_user'] ?>">

                        <h3 class="profile-username text-center"><?= $user['nama_user'] ?></h3>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Email</b> <a class="pull-right"><?= $user['email'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Username</b> <a class="pull-right"><?= $user['username'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Role</b> <a class="pull-right"><?= $user['role'] ?></a>
                            </li>
                        </ul>

                        <a href="<?= base_url('/pengguna') ?>" class="btn btn-success btn-block"><b>Kembali</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-sm-4">
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>