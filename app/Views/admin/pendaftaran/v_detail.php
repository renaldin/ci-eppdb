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
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-green-active">
                        <h3 class="widget-user-username"></h3>
                        <h5 class="widget-user-desc"></h5>
                    </div>
                    <div class="widget-user-image">
                        <img src="<?= base_url('pendaftaran/' . $pendaftaran['b_foto'])  ?>" class="img-squere" alt="Foto <?= $pendaftaran['nama_lengkap'] ?>">
                    </div>
                    <br>
                    <br>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <?php

                                if (session()->getFlashdata('pesan')) {
                                    echo '<div class="alert alert-danger" role="alert">';
                                    echo session()->getFlashdata('pesan');
                                    echo '</div>';
                                }

                                if (session()->getFlashdata('success')) {
                                    echo '<div class="alert alert-success" role="alert">';
                                    echo session()->getFlashdata('success');
                                    echo '</div>';
                                }

                                ?>

                                <b>Status : <?= $pendaftaran['status'] ?></b>
                                <a href="#" style="float: right; margin-left: 3px;" data-toggle="modal" data-target="#tidakLulus<?= $pendaftaran['id_pendaftaran']; ?>" class="btn btn-danger btn-sm btn-xs btn-flat">Klik Tidak Lulus</a>
                                <a href="#" style="float: right; margin-left: 3px;" data-toggle="modal" data-target="#lulus<?= $pendaftaran['id_pendaftaran']; ?>" class="btn btn-primary btn-sm btn-xs btn-flat">Klik Lulus</a>
                            </div>
                            <div class="col-sm-12 text-left border-left">
                                <div class="">
                                    <h5 class="description-header text-left text-bold">DATA PRIBADI</h5>
                                    <h5 class="description-header text-left">
                                        <hr>
                                    </h5>
                                </div>
                                <div class="">
                                    <h5 class="description-header text-left text-bold">Nama Lengkap</h5>
                                    <h5 class="description-header text-left"><?= $pendaftaran['nama_lengkap'] ?></h5>
                                </div>
                                <div class="">
                                    <h5 class="description-header text-left text-bold">Tanggal Lahir</h5>
                                    <h5 class="description-header text-left"><?= $pendaftaran['tanggal_lahir'] ?></h5>
                                </div>
                                <div class="">
                                    <h5 class="description-header text-left text-bold">Umur</h5>
                                    <h5 class="description-header text-left"><?= $pendaftaran['umur'] ?></h5>
                                </div>
                                <div class="">
                                    <h5 class="description-header text-left text-bold">Jenis Kelamin</h5>
                                    <h5 class="description-header text-left"><?= $pendaftaran['jenis_kelamin'] ?></h5>
                                </div>
                                <div class="">
                                    <h5 class="description-header text-left text-bold">Agama</h5>
                                    <h5 class="description-header text-left"><?= $pendaftaran['agama'] ?></h5>
                                </div>
                                <div class="">
                                    <h5 class="description-header text-left text-bold">Golongan Darah</h5>
                                    <h5 class="description-header text-left"><?= $pendaftaran['golongan_darah'] ?></h5>
                                </div>
                                <div class="">
                                    <h5 class="description-header text-left text-bold">Alamat</h5>
                                    <h5 class="description-header text-left"><?= $pendaftaran['alamat'] ?></h5>
                                </div>
                                <br>
                                <div class="">
                                    <h5 class="description-header text-left text-bold">DATA ORANG TUA</h5>
                                    <h5 class="description-header text-left">
                                        <hr>
                                    </h5>
                                </div>
                                <div class="">
                                    <h5 class="description-header text-left text-bold">Nama Ayah</h5>
                                    <h5 class="description-header text-left"><?= $pendaftaran['nama_ayah'] ?></h5>
                                </div>
                                <div class="">
                                    <h5 class="description-header text-left text-bold">Kerja Ayah</h5>
                                    <h5 class="description-header text-left"><?= $pendaftaran['kerja_ayah'] ?></h5>
                                </div>
                                <div class="">
                                    <h5 class="description-header text-left text-bold">Pendidikan Ayah</h5>
                                    <h5 class="description-header text-left"><?= $pendaftaran['pendidikan_ayah'] ?></h5>
                                </div>
                                <div class="">
                                    <h5 class="description-header text-left text-bold">Nama Ibu</h5>
                                    <h5 class="description-header text-left"><?= $pendaftaran['nama_ibu'] ?></h5>
                                </div>
                                <div class="">
                                    <h5 class="description-header text-left text-bold">Kerja Ibu</h5>
                                    <h5 class="description-header text-left"><?= $pendaftaran['kerja_ibu'] ?></h5>
                                </div>
                                <div class="">
                                    <h5 class="description-header text-left text-bold">Pendidikan Ibu</h5>
                                    <h5 class="description-header text-left"><?= $pendaftaran['pendidikan_ibu'] ?></h5>
                                </div>
                                <div class="">
                                    <h5 class="description-header text-left text-bold">Telepon Rumah</h5>
                                    <h5 class="description-header text-left"><?= $pendaftaran['telepon_rumah'] ?></h5>
                                </div>
                                <br>
                                <div class="">
                                    <h5 class="description-header text-left text-bold">BERKAS</h5>
                                    <h5 class="description-header text-left">
                                        <hr>
                                    </h5>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="">
                                            <h5 class="description-header text-left text-bold">Foto</h5>
                                            <h5 class="description-header text-left">
                                                <a href="#" data-toggle="modal" data-target="#lihatFoto<?= $pendaftaran['id_pendaftaran']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Lihat</a>
                                                <a href="<?= base_url('/daftar/downloadFoto/' . $pendaftaran['id_pendaftaran']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</a>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="">
                                            <h5 class="description-header text-left text-bold">Kartu Keluarga</h5>
                                            <h5 class="description-header text-left">
                                                <a href="#" data-toggle="modal" data-target="#lihatKK<?= $pendaftaran['id_pendaftaran']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Lihat</a>
                                                <a href="<?= base_url('/daftar/downloadKartuKeluarga/' . $pendaftaran['id_pendaftaran']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</a>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="">
                                            <h5 class="description-header text-left text-bold">Akte Kelahiran</h5>
                                            <h5 class="description-header text-left">
                                                <a href="#" data-toggle="modal" data-target="#lihatAkte<?= $pendaftaran['id_pendaftaran']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Lihat</a>
                                                <a href="<?= base_url('/daftar/downloadAkteKelahiran/' . $pendaftaran['id_pendaftaran']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</a>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="">
                                            <h5 class="description-header text-left text-bold">KTP Ayah</h5>
                                            <h5 class="description-header text-left">
                                                <a href="#" data-toggle="modal" data-target="#lihatKtpAyah<?= $pendaftaran['id_pendaftaran']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Lihat</a>
                                                <a href="<?= base_url('/daftar/downloadKtpAyah/' . $pendaftaran['id_pendaftaran']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</a>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="">
                                            <h5 class="description-header text-left text-bold">KTP Ibu</h5>
                                            <h5 class="description-header text-left">
                                                <a href="#" data-toggle="modal" data-target="#lihatKtpIbu<?= $pendaftaran['id_pendaftaran']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Lihat</a>
                                                <a href="<?= base_url('/daftar/downloadKtpIbu/' . $pendaftaran['id_pendaftaran']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</a>
                                            </h5>
                                        </div>
                                    </div>
                                    <?php if ($pendaftaran['b_kartu']) { ?>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="">
                                                <h5 class="description-header text-left text-bold">Kartu KIP/KHS <small class="text-danger">Opsional</small></h5>
                                                <h5 class="description-header text-left">
                                                    <a href="#" data-toggle="modal" data-target="#lihatKartu<?= $pendaftaran['id_pendaftaran']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Lihat</a>
                                                    <a href="<?= base_url('/daftar/downloadKartu/' . $pendaftaran['id_pendaftaran']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</a>
                                                </h5>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <!-- /.description-block -->
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="box-footer">
                        <a href="<?= base_url('/daftar') ?>" class="btn btn-sm btn-success"><i class="fa fa-mail-reply"></i> Kembali</a>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
            <div class="col-md-2"></div>
            <!-- /.col -->
        </div>
</div>
<!-- /.row -->
</section>
</div>

<!-- Modal Lihat Foto -->
<div class="modal fade" id="lihatFoto<?= $pendaftaran['id_pendaftaran']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Foto</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <center><img src="<?= base_url('pendaftaran/' . $pendaftaran['b_foto']) ?>" width="60%" alt=""></center>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Lihat Kartu Keluarga -->
<div class="modal fade" id="lihatKK<?= $pendaftaran['id_pendaftaran']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Kartu Keluarga</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <center><img src="<?= base_url('pendaftaran/' . $pendaftaran['b_kk']) ?>" width="60%" alt=""></center>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Lihat Akte Kelahiran -->
<div class="modal fade" id="lihatAkte<?= $pendaftaran['id_pendaftaran']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Akte Kelahiran</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <center><img src="<?= base_url('pendaftaran/' . $pendaftaran['b_akte']) ?>" width="60%" alt=""></center>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Lihat KTP Ayah -->
<div class="modal fade" id="lihatKtpAyah<?= $pendaftaran['id_pendaftaran']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">KTP Ayah</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <center><img src="<?= base_url('pendaftaran/' . $pendaftaran['b_ktp_ayah']) ?>" width="60%" alt=""></center>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Lihat KTP Ayah -->
<div class="modal fade" id="lihatKtpIbu<?= $pendaftaran['id_pendaftaran']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">KTP Ibu</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <center><img src="<?= base_url('pendaftaran/' . $pendaftaran['b_ktp_ibu']) ?>" width="60%" alt=""></center>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Lihat KTP Ayah -->
<div class="modal fade" id="lihatKartu<?= $pendaftaran['id_pendaftaran']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Kartu KIP/KHS <small class="text-danger">Opsional</small></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <center><img src="<?= base_url('pendaftaran/' . $pendaftaran['b_kartu']) ?>" width="60%" alt=""></center>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Modal Lulus -->
<div class="modal fade" id="lulus<?= $pendaftaran['id_pendaftaran']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Seleksi Calon Siswa Lulus</h4>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Ingin Meluluskan Calon Siswa Yang Bernama <b><?= $pendaftaran['nama_lengkap']; ?> ?</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                <a href="<?= base_url('/daftar/lulus/' . $pendaftaran['id_pendaftaran']); ?>" class="btn btn-success btn-flat">Lulus</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Modal Lulus -->
<div class="modal fade" id="tidakLulus<?= $pendaftaran['id_pendaftaran']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Seleksi Calon Siswa Tidak Lulus</h4>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Tidak Ingin Meluluskan Calon Siswa Yang Bernama <b><?= $pendaftaran['nama_lengkap']; ?> ?</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                <a href="<?= base_url('/daftar/tidakLulus/' . $pendaftaran['id_pendaftaran']); ?>" class="btn btn-danger btn-flat">Tidak Lulus</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->