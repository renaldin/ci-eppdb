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

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-PPDB | <?= $title; ?></title>
    <!-- Favicon -->
    <link href="<?= base_url() ?>/gambar_profil_sekolah/<?= $sekolah['logo'] ?>" type="image/png" rel="icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/skins/_all-skins.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body onload="window.print();">

    <!-- <body> -->

    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="page-header">
                        <div class="col-md-12">
                            <table class="table-striped table-responsive">
                                <tr>
                                    <td rowspan="7" width="200px">
                                        <center><img src="<?= base_url('gambar_profil_sekolah/' . $sekolah['logo']) ?>" height="150px" width="130px" alt=""></center>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <center><strong>PEMERINTAH KABUPATEN SUBANG</strong></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <center><strong>UPTD PENDIDIKAN KECAMATAN CIBOGO</strong></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <center><strong>SEKOLAH DASAR NEGERI CIBOGO</strong></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <center><strong>AKREDITASI : <?= $sekolah['akreditasi'] ?></strong></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <center>
                                            <small>Alamat : <?= $sekolah['alamat'] ?></small>
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <center>
                                            <small>Email : <?= $sekolah['email'] ?></small>
                                        </center>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </h1>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->

            <div class="row">
                <div class="col-md-12">
                    <strong>
                        <hr noshad style="height: 20px; color: black;">
                    </strong>
                </div>
            </div>

            <div class="row" style="margin-top: -33px;">
                <div class="col-md-12">
                    <center>
                        <h4><strong>FORMULIR PENERIMAAN PESERTA DIDIK BARU</h4>
                        <h4> SEKOLAH DASAR NEGERI CIBOGO TAHUN PELAJARAN <?= $tahun_ajaran_aktif['tahun_ajaran'] ?></strong></h4>
                    </center>
                </div>
            </div>

            <!-- Table row -->
            <div class="row" style="margin-top: -35px;">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!-- Widget: user widget style 1 -->
                    <div class="">
                        <br>
                        <br>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><strong>A. KETERANGAN CALON PESERTA DIDIK</strong></p>
                                    <table border="0" cellspacing="0" height="200px" style="width: 75%">
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td width="200px">Nama Lengkap</td>
                                                <td>:</td>
                                                <td>
                                                    <?= $pendaftaran['nama_lengkap'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Jenis Kelamin</td>
                                                <td>:</td>
                                                <td>
                                                    <?php if ($pendaftaran['jenis_kelamin'] == 'Laki-laki') { ?>
                                                        (Laki-laki / <del>Perempuan</del>)
                                                    <?php } else if ($pendaftaran['jenis_kelamin'] == 'Perempuan') { ?>
                                                        (<del>Laki-laki</del> / Perempuan)
                                                    <?php } ?>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Tanggal Lahir</td>
                                                <td>:</td>
                                                <td>
                                                    <?= tanggal_indo($pendaftaran['tanggal_lahir']) ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Umur</td>
                                                <td>:</td>
                                                <td>
                                                    <?= $pendaftaran['umur'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td>
                                                    <?= $pendaftaran['alamat'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Agama</td>
                                                <td>:</td>
                                                <td>
                                                    <?= $pendaftaran['agama'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Golongan Darah</td>
                                                <td>:</td>
                                                <td>
                                                    <?= $pendaftaran['golongan_darah'] ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <p><strong>B. KETERANGAN ORANG TUA KANDUNG/WALI</strong></p>
                                    <table border="0" cellspacing="0" height="200px" style="width: 75%">
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td width="200px">Nama Lengkap</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>a. Ayah</td>
                                                <td>:</td>
                                                <td>
                                                    <?= $pendaftaran['nama_ayah'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>b. Ibu</td>
                                                <td>:</td>
                                                <td>
                                                    <?= $pendaftaran['nama_ibu'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Pekerjaan</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>a. Ayah</td>
                                                <td>:</td>
                                                <td>
                                                    <?= $pendaftaran['kerja_ayah'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>b. Ibu</td>
                                                <td>:</td>
                                                <td>
                                                    <?= $pendaftaran['kerja_ibu'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Pendidikan Terakhir</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>a. Ayah</td>
                                                <td>:</td>
                                                <td>
                                                    <?= $pendaftaran['pendidikan_ayah'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>b. Ibu</td>
                                                <td>:</td>
                                                <td>
                                                    <?= $pendaftaran['pendidikan_ibu'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Keterangan</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>a. Ayah</td>
                                                <td>:</td>
                                                <td>
                                                    (Masih Hidup / <del>Meninggal tahun ............</del>)
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>b. Ibu</td>
                                                <td>:</td>
                                                <td>
                                                    (Masih Hidup / <del>Meninggal tahun ............</del>)
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Nomor Telepon</td>
                                                <td>:</td>
                                                <td>
                                                    <?= $pendaftaran['telepon_rumah'] ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <p><strong>C. LAMPIRAN YANG DISERAHKAN OLEH CALON SISWA</strong></p>
                                    <table border="0" cellspacing="0" height="200px" style="width: 75%">
                                        <tbody>
                                            <tr>
                                                <?php if ($pendaftaran['b_foto']) { ?>
                                                    <td><input type="checkbox" checked></td>
                                                <?php } else { ?>
                                                    <td><input type="checkbox"></td>
                                                <?php } ?>
                                                <td>Pas Photo 3 x 4</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <?php if ($pendaftaran['b_akte']) { ?>
                                                    <td><input type="checkbox" checked></td>
                                                <?php } else { ?>
                                                    <td><input type="checkbox"></td>
                                                <?php } ?>
                                                <td>Akte Kelahiran</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <?php if ($pendaftaran['b_kk']) { ?>
                                                    <td><input type="checkbox" checked></td>
                                                <?php } else { ?>
                                                    <td><input type="checkbox"></td>
                                                <?php } ?>
                                                <td>Kartu Keluarga</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <?php if ($pendaftaran['b_ktp_ayah']) { ?>
                                                    <td><input type="checkbox" checked></td>
                                                <?php } else { ?>
                                                    <td><input type="checkbox"></td>
                                                <?php } ?>
                                                <td>KTP Ayah</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <?php if ($pendaftaran['b_ktp_ibu']) { ?>
                                                    <td><input type="checkbox" checked></td>
                                                <?php } else { ?>
                                                    <td><input type="checkbox"></td>
                                                <?php } ?>
                                                <td>KTP Ibu</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <?php if ($pendaftaran['b_kartu']) { ?>
                                                    <td><input type="checkbox" checked></td>
                                                <?php } else { ?>
                                                    <td><input type="checkbox"></td>
                                                <?php } ?>
                                                <td>Kartu KIP/KHS</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <p>Keterabfan : <br>* = Coret Yang Tidak Perlu</p>
                                    <p><strong>KETERANGAN PENDAFTARAN</strong></p>
                                    <table border="0" cellspacing="0" height="" style="width: 75%">
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td width="200px">Tahun Ajaran</td>
                                                <td>:</td>
                                                <td>
                                                    <?= $tahun_ajaran_aktif['tahun_ajaran'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Periode Pendaftaran</td>
                                                <td>:</td>
                                                <td>
                                                    <?= tanggal_indo($tahun_ajaran_aktif['tanggal_mulai']) ?> s/d <?= tanggal_indo($tahun_ajaran_aktif['tanggal_akhir']) ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Tanggal Pendaftaran</td>
                                                <td>:</td>
                                                <td>
                                                    <?= tanggal_indo($pendaftaran['tanggal_daftar']) ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Kode Pendaftaran</td>
                                                <td>:</td>
                                                <td>
                                                    <?= $pendaftaran['id_pendaftaran'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Keterangan Kelulusan</td>
                                                <td>:</td>
                                                <td>
                                                    <?php if ($pendaftaran['status'] == 'Lulus') { ?>
                                                        (Lulus / <del>Tidak Lulus</del>)
                                                    <?php } else if ($pendaftaran['status'] == 'Tidak Lulus') { ?>
                                                        (<del>Lulus</del> / Tidak Lulus)
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <h5>
                                            Panitia PPDB
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br> (..................................)
                                        </h5>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 text-center">

                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                <div class="col-md-2"></div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="<?= base_url() ?>/template/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url() ?>/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url() ?>/template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url() ?>/template/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>/template/dist/js/demo.js"></script>
    <!-- CK Editor -->
    <script src="<?= base_url() ?>/template/bower_components/ckeditor/ckeditor.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url() ?>/template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

</body>

</html>