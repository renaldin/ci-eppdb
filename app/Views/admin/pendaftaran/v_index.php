<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kelola <?= $title ?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Kelola s<?= $title ?></li>
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
                                    <th width="150px">Kode Daftar</th>
                                    <th>Nama Lengkap</th>
                                    <th width="100px">Tanggal Daftar</th>
                                    <th width="100px" class="text-center">Status</th>
                                    <th width="100px" class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($pendaftaran as $row) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= $row['id_pendaftaran'] ?></td>
                                        <td><?= $row['nama_lengkap'] ?></td>
                                        <td><?= $row['tanggal_daftar'] ?></td>
                                        <td class="text-center">
                                            <?php if ($row['status'] == 'Lulus') { ?>
                                                <span class="badge btn-success"><?= $row['status'] ?></span>
                                            <?php } else if ($row['status'] == 'Tidak Lulus') { ?>
                                                <span class="badge btn-danger"><?= $row['status'] ?></span>
                                            <?php } else { ?>
                                                <span class="badge btn-info"><?= $row['status'] ?></span>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url('/daftar/detail/' . $row['id_pendaftaran']) ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-eye"></i></a>
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