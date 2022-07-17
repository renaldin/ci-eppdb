<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title ?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><?= $title ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- COLOR PALETTE -->
        <div class="row">
            <div class="col-md-4">
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-green-active">
                        <h3 class="widget-user-username"><?= $user['nama_user'] ?></h3>
                        <h5 class="widget-user-desc"><?= $user['role'] ?></h5>
                    </div>
                    <div class="widget-user-image">
                        <img src="<?= ($user['foto']) ? base_url('foto/' . $user['foto']) : base_url('foto/default.png') ?>" class="img-circle" alt="<?= session()->get('nama_user') ?>">
                    </div>
                    <br>
                    <br>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-12 text-left border-left">
                                <div class="">
                                    <h5 class="description-header text-left text-bold">Email</h5>
                                    <h5 class="description-header text-left"><?= $user['email'] ?></h5>
                                </div>
                                <div class="">
                                    <h5 class="description-header text-left text-bold">Username</h5>
                                    <h5 class="description-header text-left"><?= $user['username'] ?></h5>
                                </div>
                                <!-- /.description-block -->
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="box-footer">
                        <a href="<?= base_url('/profil/ubahPassword/' . $user['id_user']) ?>" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-lock"></i> Ubah Password</a>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
            <!-- /.col -->
            <div class="col-md-8">
                <!-- Profile Image -->
                <div class="box box-success">
                    <div class="box-body box-profile">
                        <?php
                        $errors = session()->getFlashdata('errors');
                        if (!empty($errors)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    <?php foreach ($errors as $key => $value) { ?>
                                        <li><?= esc($value); ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php  } ?>

                        <?php
                        if (session()->getFlashdata('pesan')) {
                            echo '<div class="alert alert-success" role="alert">';
                            echo session()->getFlashdata('pesan');
                            echo '</div>';
                        }
                        ?>


                        <?php
                        echo form_open_multipart('profil/prosesEdit/' . $user['id_user']);
                        ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_user">Nama Pengguna</label>
                                    <input type="text" class="form-control" name="nama_user" placeholder="Masukkan Nama Pengguna" value="<?= $user['nama_user'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username" value="<?= $user['username'] ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Email <small class="text-danger">(Harus menggunakan email aktif)</small></label>
                                    <input type="email" class="form-control" name="email" placeholder="Masukkan Email Pengguna" value="<?= $user['email'] ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input type="file" class="form-control" id="preview_gambar" name="foto">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <img src="<?= ($user['foto']) ? base_url('foto/' . $user['foto']) : base_url('foto/default.png') ?>?>" id="gambar_load" width="150" height="" alt="<?= $user['nama_user'] ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</button>
                    </div>
                    <?php
                    echo form_close();
                    ?>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
</div>
<!-- /.row -->
</section>
</div>