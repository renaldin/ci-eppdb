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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body onload="window.print();">

    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="page-header">
                        <i class="fa fa-file-pdf-o"></i> <b>Data Pendaftaran Lulus</b>
                        <small class="pull-right">Date: <?= date('d M Y') ?></small>
                    </h1>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->

            <!-- info row -->
            <div class="row invoice-info" style="margin-bottom: 15px;">
                <div class="col-md-12">
                    <table class="table-striped table-responsive">
                        <tr>
                            <td rowspan="7" width="150px"><img src="<?= base_url('gambar_profil_sekolah/' . $sekolah['logo']) ?>" height="150px" width="130px" alt=""></td>
                            <td width="150px">Tahun Ajaran</td>
                            <td width="20px">:</td>
                            <td><?= $tahun_ajaran_aktif['tahun_ajaran'] ?></td>
                            <td rowspan="7"></td>
                        </tr>
                        <tr>
                            <td>Nama Sekolah</td>
                            <td>:</td>
                            <td><?= $sekolah['nama_sekolah'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $sekolah['alamat'] ?></td>
                        </tr>
                        <tr>
                            <td>Akreditasi</td>
                            <td>:</td>
                            <td><?= $sekolah['akreditasi'] ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?= $sekolah['email'] ?></td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td>:</td>
                            <td><?= $sekolah['telepon'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped table-bordered table-responsive">
                        <tr class="label-success">
                            <th>No</th>
                            <th>Kode Daftar</th>
                            <th>Nama Lengkap</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Nama Ayah</th>
                            <th>Telepon Rumah</th>
                            <th>Tanggal Daftar</th>
                        </tr>
                        <?php $no = 1;
                        foreach ($pendaftaran as $row) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['id_pendaftaran'] ?></td>
                                <td><?= $row['nama_lengkap'] ?></td>
                                <td><?= $row['tanggal_lahir'] ?></td>
                                <td><?= $row['alamat'] ?></td>
                                <td><?= $row['nama_ayah'] ?></td>
                                <td><?= $row['telepon_rumah'] ?></td>
                                <td><?= $row['tanggal_daftar'] ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->

</body>

</html>