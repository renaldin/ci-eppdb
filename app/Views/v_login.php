<div class="login-box">
  <div class="login-logo wow zoomIn" data-wow-delay="0.15s">
    <img src="<?= base_url() ?>/gambar_profil_sekolah/<?= $sekolah['logo'] ?>" width="50px" alt="">
    <a href=" <?= base_url(); ?>">&nbsp;&nbsp;<b>E-PPDB</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body wow zoomIn" data-wow-delay="0.15s">
    <p class=" login-box-msg">Silahkan Login Dengan Username Dan Password</p>

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


    <?= form_open('Auth/cek_login'); ?>
    <div class="form-group has-feedback">
      <input type="text" class="form-control" placeholder="Username" name="username">
      <span class="fa fa-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="password" class="form-control" placeholder="Password" name="password">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
      <!-- /.col -->
      <div class="col-xs-8">
        <a href="<?= base_url('/auth/register') ?>">Belum punya akun ? Register!</a>
        <a href="<?= base_url('/auth/lupaAkun') ?>">Lupa username / password ? </a>
      </div>
      <div class="col-xs-4">
        <button type="submit" class="btn btn-success btn-block btn-flat"><i class="fa fa-sign-in"></i> Log In</button>
      </div>
      <!-- /.col -->
    </div>
    <?= form_close(); ?>

  </div>
  <!-- /.login-box-body -->
</div>