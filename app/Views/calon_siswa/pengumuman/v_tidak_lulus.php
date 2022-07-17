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
        <!-- COLOR PALETTE -->
        <div class="box box-success">
            <div class="box-body box-profile">
                <div class="box box-success">
                    <div class="box-body">
                        <div class="box box-success">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div class="callout callout-danger">
                                            <h3>Mohon maaf <strong><?= $pendaftaran['nama_lengkap'] ?></strong>, Anda dinyatakan <strong>Tidak Lulus</strong>, Dengan Kode Pendaftaran : <br><br><strong><?= $pendaftaran['id_pendaftaran'] ?></strong></h3>
                                            <p>Selanjutnya, Anda bisa mengikuti Pendaftaran Peserta Didik Baru (PPDB) Online <?= $sekolah['nama_sekolah'] ?> tahun selanjutnya.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>