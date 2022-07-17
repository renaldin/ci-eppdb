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
                                        <div class="callout callout-success">
                                            <h3>Selamat <strong><?= $pendaftaran['nama_lengkap'] ?></strong>, Anda dinyatakan <strong>Lulus</strong>, Dengan Kode Pendaftaran : <br><br><strong><?= $pendaftaran['id_pendaftaran'] ?></strong></h3>
                                            <p>Selanjutnya, Anda bisa download bukti kelulusan dan bisa segera diserahkan ke pihak sekolah melalui via email atau whatsapp untuk dilakukan pendataan.</p>
                                        </div>
                                        <a href="<?= base_url('/pengumuman/cetakKelulusan/' . $pendaftaran['id_pendaftaran']) ?>" target="_blank" class="btn btn-success"><I class="fa fa-download"></I> Download Kelulusan</a>
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