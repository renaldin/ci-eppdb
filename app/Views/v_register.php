<div class="login-box">
  <div class="login-logo wow zoomIn" data-wow-delay="0.15s">
    <img src="<?= base_url() ?>/gambar_profil_sekolah/<?= $sekolah['logo'] ?>" width="50px" alt="">
    <a href=" <?= base_url(); ?>">&nbsp;&nbsp;<b>E-PPDB</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body wow zoomIn" data-wow-delay="0.15s">
    <p class=" login-box-msg">Silahkan Masukkan Data Pengguna Anda</p>

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
      echo '<div class="alert alert-warning" role="alert">';
      echo session()->getFlashdata('pesan');
      echo '</div>';
    }

    if (session()->getFlashdata('success')) {
      echo '<div class="alert alert-success" role="alert">';
      echo session()->getFlashdata('success');
      echo '</div>';
    }

    ?>


    <?= form_open('Auth/cek_register'); ?>
    <div class="form-group has-feedback">
      <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_user" value="<?= old('nama_user') ?>">
      <span class="fa fa-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="email" class="form-control" placeholder="Email" name="email" value="<?= old('email') ?>">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="text" class="form-control" placeholder="Username" name="username" value="<?= old('username') ?>">
      <span class="fa fa-user-plus form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="password" class="form-control" placeholder="Password" name="password">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="password" class="form-control" placeholder="Confirm Password" name="repeatpassword">
      <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
    </div>
    <div class="row">
      <!-- /.col -->
      <div class="col-xs-8">
        <a href="<?= base_url('/auth/login') ?>">Sudah punya akun ? Log in!</a>
      </div>
      <div class="col-xs-4">
        <button type="submit" class="btn btn-success btn-block btn-flat"><i class="fa fa-share-square-o"></i> Daftar</button>
      </div>
      <!-- /.col -->
    </div>
    <?= form_close(); ?>

  </div>
  <!-- /.login-box-body -->
</div>