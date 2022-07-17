<div class="login-box">
  <div class="login-logo wow zoomIn" data-wow-delay="0.15s">
    <img src="<?= base_url() ?>/gambar_profil_sekolah/<?= $sekolah['logo'] ?>" width="50px" alt="">
    <a href=" <?= base_url(); ?>">&nbsp;&nbsp;<b>E-PPDB</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body wow zoomIn" data-wow-delay="0.15s">
    <p class=" login-box-msg">Agar Bisa Login, Silahkan Klik Tombol Dibawah Untuk Verifikasi Dan Anda Akan Diarahkan Ke Halaman Login.</p>

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

    <div class="row">
      <div class="col-md-12">
        <center><a href="<?= base_url('auth/ubahStatusVerifikasi/' . $user['email']) ?>" class="btn btn-success"><i class="fa fa-hand-o-right"></i> Lanjut Verifikasi</a></center>
      </div>
    </div>
  </div>
  <!-- /.login-box-body -->
</div>