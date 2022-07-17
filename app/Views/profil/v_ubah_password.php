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
                        if (session()->getFlashdata('error')) {
                            echo '<div class="alert alert-danger" role="alert">';
                            echo session()->getFlashdata('error');
                            echo '</div>';
                        }
                        ?>


                        <?php
                        echo form_open_multipart('profil/prosesUbahPassword/' . $user['id_user']);
                        ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Password Lama</label>
                                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password Lama">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Password Baru</label>
                                    <input type="password" class="form-control" name="password_baru" placeholder="Masukkan Password Baru">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="<?= base_url('/profil/' . $user['id_user']) ?>" class="btn btn-default pull-left btn-flat"><i class="fa fa-mail-reply"></i> Kembali</a>
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</button>
                    </div>
                    <?php
                    echo form_close();
                    ?>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-sm-4">
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>