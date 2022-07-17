<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title ?>
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-success">
                            <div class="box-body box-profile">
                                <div class="box box-success">
                                    <center>
                                        <h2><strong>Selamat Datang, <?= session()->get('nama') ?></strong></h2>
                                        <h4>Selamat Datang Di Website PPDB Online <?= $sekolah['nama_sekolah'] ?></h4>
                                        <img src="<?= base_url() ?>/gambar_profil_sekolah/<?= $sekolah['logo'] ?>" width="30%" alt="">
                                    </center>
                                </div>
                                <!-- /.box -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php if (!$pendaftaran == null) {
                                        echo "Anda Sudah Daftar";
                                    } else {
                                        echo "Anda Belum Daftar";
                                    } ?></h3>

                                <p>Jumlah nformasi PPDB</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-document"></i>
                            </div>
                            <?php if (!$pendaftaran == null) { ?>
                                <a href="<?= base_url('pengumuman') ?>" class="small-box-footer">Pengumuman <i class="fa fa-arrow-circle-right"></i></a>
                            <?php } else { ?>
                                <a href="<?= base_url('formulir_pendaftaran') ?>" class="small-box-footer">Formulir Pendaftaran <i class="fa fa-arrow-circle-right"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-lg-6 col-xs-12">
                <div class="box box-success">
                    <div class="box-body no-padding">
                        <!-- THE CALENDAR -->
                        <div id="calendar"></div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>