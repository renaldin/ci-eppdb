<?php

function tanggal_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title ?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('calonsiswa') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><?= $title ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php if (!$pendaftaran == null) { ?>
                <?php if (date('Y-m-d') >= $tahun_ajaran['tanggal_pengumuman']) { ?>
                    <div class="col-md-12">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title"></h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="box-group" id="accordion">
                                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                    <div class="panel box box-success">
                                        <div class="box-header with-border">
                                            <center><img src="<?= base_url('gambar_profil_sekolah/' . $sekolah['logo']) ?>" width="100px" class="img-squere" alt="Foto Logo"></center>
                                            <h3 class="text-center">
                                                Pengumuman Hasil <br>
                                                Penerimaan Peserta Didik Baru <br>
                                                <?= $sekolah['nama_sekolah'] ?>
                                            </h3>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in text-center">
                                            <div class="row">
                                                <div class="col-lg-2"></div>
                                                <div class="col-lg-8">
                                                    <div class="box-body">
                                                        Silahkan Cek Dengan Kode Pendaftaran Anda
                                                    </div>
                                                    <div>
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
                                                        if (session()->getFlashdata('error')) {
                                                            echo '<div class="alert alert-danger" role="alert">';
                                                            echo session()->getFlashdata('error');
                                                            echo '</div>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <form action="<?= base_url('pengumuman/cekPengumuman') ?>" method="POST">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="id_pendaftaran" placeholder="Masukkkan Kode Pendaftaran">
                                                            <span class="input-group-btn">
                                                                <button type="submit" class="btn btn-success btn-flat">Cek</button>
                                                            </span>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-lg-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                <?php } else { ?>
                    <div class="box box-success">
                        <div class="box-body">
                            <div class="box box-success">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <h3>Pengumuman Penerimaan Peserta Didik Baru (PPDB) <?= $sekolah['nama_sekolah'] ?> <strong>Belum Dibuka!!!</strong></h3>
                                            <h5>Tanggal Pengumumannya yaitu <strong><?= tanggal_indo($tahun_ajaran['tanggal_pengumuman']) ?></strong></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="box box-success">
                    <div class="box-body">
                        <div class="box box-success">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <h3>Anda Tidak Bisa Akses Halaman Pengumuman Penerimaan Peserta Didik Baru (PPDB) <?= $sekolah['nama_sekolah'] ?>, Karena Anda<strong>Tidak Melakukan Pendaftaran!!!</strong></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
</div>