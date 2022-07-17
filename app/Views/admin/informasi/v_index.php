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
                            <a href="<?= base_url('/informasi/tambah'); ?>" class="btn btn-box-tool"><i class="fa fa-plus"> Tambah</i></a>
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
                                    <th>Judul Informasi</th>
                                    <th class="text-center">Gambar</th>
                                    <th width="150px" class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($informasi as $row) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= $row['judul_informasi'] ?></td>
                                        <td class="text-center"><img src="<?= base_url('gambar_informasi_ppdb/' . $row['gambar']); ?>" width="70px" height="70px" alt="<?= $title ?>" class="img-circle"></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('/informasi/detail/' . $row['id_informasi']) ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-eye"></i></a>
                                            <a href="<?= base_url('/informasi/edit/' . $row['id_informasi']) ?>" class="btn btn-info btn-sm btn-flat"><i class="fa fa-edit"></i></a>
                                            <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $row['id_informasi']; ?>"><i class="fa fa-trash"></i></button>
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

<!-- Modal Delete -->
<?php foreach ($informasi as $row) { ?>
    <!-- Modal Delete -->
    <div class="modal fade" id="delete<?= $row['id_informasi']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete <?= $title; ?></h4>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus Informasi <b><?= $row['judul_informasi']; ?> ?</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('/informasi/hapus/' . $row['id_informasi']); ?>" class="btn btn-danger btn-flat">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>