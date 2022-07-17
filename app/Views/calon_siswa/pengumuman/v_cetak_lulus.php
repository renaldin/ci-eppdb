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

<body>

  <div class="row">
    <div class="col-md-12">
      <table style="width:100%">
        <tr style="border-top: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black; border-collapse: collapse;">
          <td rowspan="6" width="100px">
            <img src="<?= base_url('gambar_profil_sekolah/' . $sekolah['logo']) ?>" width="100px" alt="Logo CI-Eppdb">
          </td>
          <td></td>
        </tr>
        <tr style="border-right: 1px solid black; border-collapse: collapse;">
          <td style="padding-left: 10px;"><span style="font-size: 10px;"><b><strong>PEMERINTAH KABUPATEN SUBANG</strong></b></span></td>
        </tr>
        <tr style="border-right: 1px solid black; border-collapse: collapse;">
          <td style="padding-left: 10px;"><span style="font-size: 15px;"><b><strong>UPTD PENDIDIKAN KECAMATAN CIBOGO</strong></b></span></td>
        </tr>
        <tr style="border-right: 1px solid black; border-collapse: collapse;">
          <td style="padding-left: 10px;"><span style="font-size: 10px;"><strong>SEKOLAH DASAR NEGERI CIBOGO</strong></span></td>
        </tr>
        <tr style="border-right: 1px solid black; border-collapse: collapse;">
          <td style="padding-left: 10px;"><span style="font-size: 10px;">Alamat : <?= $sekolah['alamat'] ?></span></td>
        </tr>
        <tr style="border-right: 1px solid black; border-collapse: collapse;">
          <td style="padding-left: 10px;"><span style="font-size: 10px;">Email : <?= $sekolah['email'] ?></span></td>
        </tr>
      </table>
      <strong>
        <span>
          <hr style="height: 10px; color: green; margin-top: -250px; width:70%">
        </span>
      </strong>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <table width="100%">
        <tr style="border-right: 1px solid black; border-collapse: collapse;">
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th rowspan="5">
            <img src="<?= base_url('pendaftaran/' . $pendaftaran['b_foto']) ?>" style="float: center;" height="150px" width="140px" alt="Foto Peserta">
          </th>
        </tr>
        <tr style="border-right: 1px solid black; border-left: 1px solid black; border-collapse: collapse;">
          <td colspan="4">Berdasarkan hasil seleksi Penerimaan Peserta Didik Baru Online (PPDB Online) yang dilakukan oleh Panitia PPDB Online Sekolah Dasar Negeri Cibogo, dengan waktu pendaftaran dimulai dari tanggal <?= $tahun_ajaran_aktif['tanggal_mulai'] ?> sampai tanggal <?= $tahun_ajaran_aktif['tanggal_akhir'] ?> dan pada tahun ajaran <?= $tahun_ajaran_aktif['tahun_ajaran'] ?>. Menyatakan bahwa : <br></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr style="border-right: 1px solid black; border-left: 1px solid black; border-collapse: collapse;">
          <td width="150px">Nama Lengkap</td>
          <td width="10px">:</td>
          <td><strong><?= $pendaftaran['nama_lengkap'] ?></strong></td>
          <td></td>
        </tr>
        <tr style="border-right: 1px solid black; border-left: 1px solid black; border-collapse: collapse;">
          <td>Kode Pendaftaran</td>
          <td>:</td>
          <td><strong><?= $pendaftaran['id_pendaftaran'] ?></strong></td>
          <td></td>
        </tr>
      </table>
    </div>
  </div>
  <div class="row">
    <table>
      <tr>
        <td style="text-align: center;">
          <h2>DINYATAKAN</h2>
          <?php if ($pendaftaran['status'] == 'Lulus') { ?>

            <h2><b>( LULUS )</b></h2>

          <?php } else if ($pendaftaran['status']) { ?>

            <h2><b>( TIDAK LULUS )</b></h2>

          <?php } ?>
        </td>
      </tr>
    </table>
  </div>



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