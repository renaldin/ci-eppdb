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
            <div class="col-sm-3">
                <!-- Profile Image -->
                <div class="box box-success">
                    <div class="box-body box-profile">
                        <?php echo form_open("tahun_ajaran/prosesTambah") ?>
                        <div class="form-group">
                            <label for="">Tahun Ajaran</label>
                            <input type="text" class="form-control" name="tahun_ajaran" placeholder="Exp: 2022/2023" value="<?= old('tahun_ajaran') ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tanggal_mulai" placeholder="Masukkan Tanggal Mulai" value="<?= old('tanggal_mulai') ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Akhir</label>
                            <input type="date" class="form-control" name="tanggal_akhir" placeholder="Masukkan Tanggal Akhir" value="<?= old('tanggal_akhir') ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Pengumuman</label>
                            <input type="date" class="form-control" name="tanggal_pengumuman" placeholder="Masukkan Tanggal Pengumuman" value="<?= old('tanggal_pengumuman') ?>">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-send-o"></i> Simpan</button>
                        </div>
                        <?php
                        echo form_close()
                        ?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-sm-9">
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

                        <table class="table table-bordered table-striped" id="example1">
                            <thead>
                                <tr class="label-success">
                                    <th width="10px" class="text-center">No</th>
                                    <th>Tahun Ajaran</th>
                                    <th width="70px">Tanggal Mulai</th>
                                    <th width="70px">Tanggal Akhir</th>
                                    <th width="70px">Tanggal Pengumuman</th>
                                    <th width="70px" class="text-center">Status</th>
                                    <th width="150px" class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($tahun_ajaran as $row) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= $row['tahun_ajaran'] ?></td>
                                        <td><?= $row['tanggal_mulai'] ?></td>
                                        <td><?= $row['tanggal_akhir'] ?></td>
                                        <td><?= $row['tanggal_pengumuman'] ?></td>
                                        <td class="text-center">
                                            <?php if ($row['status'] == 0) {
                                                echo '<p class="label text-center bg-red">Tidak Aktif</p>';
                                            } else {
                                                echo '<p class="label text-center bg-green">Aktif</p>';
                                            } ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($row['status'] == 0) { ?>
                                                <a href="<?= base_url('/tahunAjaran/setStatus/' . $row['id_tahun_ajaran']) ?>" class="btn btn-success btn-sm btn-flat"><i class="fa fa-check"></i> Aktifkan</a>
                                                <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $row['id_tahun_ajaran']; ?>"><i class="fa fa-trash"></i> Hapus</button>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- /.box-body -->
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
<?php foreach ($tahun_ajaran as $row) { ?>
    <!-- Modal Delete -->
    <div class="modal fade" id="delete<?= $row['id_tahun_ajaran']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete <?= $title; ?></h4>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus Tahun Ajaran <b><?= $row['tahun_ajaran']; ?> ?</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('/tahunAjaran/hapus/' . $row['id_tahun_ajaran']); ?>" class="btn btn-danger btn-flat">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>