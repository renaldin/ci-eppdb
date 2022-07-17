<div class="login-box">
  <div class="login-logo wow zoomIn" data-wow-delay="0.15s">
    <img src="<?= base_url() ?>/gambar_profil_sekolah/<?= $sekolah['logo'] ?>" width="50px" alt="">
    <a href=" <?= base_url(); ?>">&nbsp;&nbsp;<b>E-PPDB</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body wow zoomIn" data-wow-delay="0.15s">
    <p class=" login-box-msg">Silahkan Masukkan Email Aktif Yang Sebelumnya Sudah Didaftarkan Di Website ini! Kami Akan Mengirimkan Username Dan Password Secara Private Ke Email Anda!</p>

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


    <?= form_open('auth/prosesLupaAkun'); ?>
    <div class="form-group has-feedback">
      <input type="email" class="form-control" placeholder="Masukkan Email Aktif" name="email">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="row">
      <!-- /.col -->
      <div class="col-xs-8">
        <a href="<?= base_url('/auth/login') ?>">Kembali ke halaman Login!</a>
      </div>
      <div class="col-xs-4">
        <button type="submit" class="btn btn-success btn-block btn-flat"><i class="fa fa-sign-in"></i> Kirim</button>
      </div>
      <!-- /.col -->
    </div>
    <?= form_close(); ?>

  </div>
  <!-- /.login-box-body -->
</div>