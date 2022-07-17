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
            <div class="col-sm-12">
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data <?= $title; ?></h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"> Tambah</i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
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

                        <table class="table table-bordered table-striped" id="example1">
                            <thead>
                                <tr class="label-success">
                                    <th width="50px" class="text-center">No</th>
                                    <th>Nama Pengguna</th>
                                    <th width="70px">Role</th>
                                    <th class="text-center" width="80px">Foto</th>
                                    <th width="150px" class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($user as $row) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= $row['nama_user'] ?></td>
                                        <td><?= $row['role'] ?></td>
                                        <td class="text-center">
                                            <img src="<?= ($row['foto']) ? base_url('foto/' . $row['foto']) : base_url('foto/default.png') ?>?>" class="img-circle" width="70px" height="70px" alt="<?= $row['nama_user'] ?>">
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url('/pengguna/detail/' . $row['id_user']) ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-eye"></i></a>
                                            <button class="btn btn-info btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $row['id_user']; ?>"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $row['id_user']; ?>"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>

<!-- Modal tambah -->
<div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Pengguna</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open_multipart('user/prosesTambah');
                ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_user">Nama Pengguna</label>
                            <input type="text" class="form-control" name="nama_user" placeholder="Masukkan Nama Pengguna" value="<?= old('nama_user') ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Masukkan Email Pengguna" value="<?= old('email') ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Masukkan Username" value="<?= old('username') ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" placeholder="Masukkan Password">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" name="role" class="form-control" id="role">
                                <option value="">--Pilih Role--</option>
                                <option value="Admin">Admin</option>
                                <option value="Calon Siswa">Calon Siswa</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" id="preview_gambar" name="foto" value="<?= old('foto') ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <img src="<?= base_url('foto/default.png') ?>" id="gambar_load" width="150" height="" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success btn-flat">Simpan</button>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Edit -->
<?php foreach ($user as $row) { ?>
    <!-- Modal Delete -->
    <div class="modal fade" id="edit<?= $row['id_user']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Pengguna</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open_multipart('user/prosesEdit/' . $row['id_user']);
                    ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_user">Nama Pengguna</label>
                                <input type="text" class="form-control" name="nama_user" placeholder="Masukkan Nama Pengguna" value="<?= $row['nama_user'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Masukkan Email Pengguna" value="<?= $row['email'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Masukkan Username" value="<?= $row['username'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" name="password" placeholder="Masukkan Password" value="<?= $row['password'] ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" name="role" class="form-control" id="role">
                                    <option value="">--Pilih Role--</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Calon Siswa">Calon Siswa</option>
                                </select>
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
                                <img src="<?= ($row['foto']) ? base_url('foto/' . $row['foto']) : base_url('foto/default.png') ?>?>" id="gambar_load" width="150" height="" alt="<?= $row['nama_user'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success btn-flat">Edit</button>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.modal -->

<!-- Modal Delete -->
<?php foreach ($user as $row) { ?>
    <!-- Modal Delete -->
    <div class="modal fade" id="delete<?= $row['id_user']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Pengguna</h4>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus User <b><?= $row['nama_user']; ?> ?</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('/pengguna/hapus/' . $row['id_user']); ?>" class="btn btn-danger btn-flat">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>