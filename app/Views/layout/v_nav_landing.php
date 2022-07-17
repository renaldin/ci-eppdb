<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
  <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="" class="navbar-brand p-0">
      <h1 class="m-0">
        <img src="<?= base_url('gambar_profil_sekolah/' . $sekolah['logo']) ?>" width="50px" alt="Logo <?= $sekolah['nama_sekolah'] ?>"> E-<span class="fs-5">PPDB</span>
      </h1>
      <!-- <img src="img/logo.png" alt="Logo"> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <?php if ($isi_landing == 'landing/v_index') { ?>
        <div class="navbar-nav ms-auto py-0">
          <a href="#home" class="nav-item nav-link">Home</a>
          <a href="#profil-sekolah" class="nav-item nav-link">Profil Sekolah</a>
          <a href="#informasi" class="nav-item nav-link">Informasi PPDB</a>
        </div>
        <button type="button" data-bs-toggle="modal" data-bs-target="#landing" class="btn btn-success hover-ppdb rounded-pill py-2 px-4 ms-3">PPDB</button>
      <?php } else if ($isi_landing == 'landing/v_bacaInformasi') { ?>
        <div class="navbar-nav ms-auto py-0">
          <a href="<?= base_url('/') ?>" class="nav-item nav-link">Home</a>
        </div>
      <?php } ?>
    </div>
  </nav>

  <?php if ($isi_landing == 'landing/v_index') { ?>
    <div class="container-xxl py-5 bg-success hero-header mb-5" id="home">
      <div class="container my-5 py-5 px-lg-5">
        <div class="row g-5 py-5">
          <div class="col-lg-6 text-center text-lg-start">
            <h1 class="text-white mb-4 animated zoomIn"><?= $sekolah['nama_sekolah'] ?></h1>
            <p class="text-white pb-3 animated zoomIn"><?= $sekolah['deskripsi_atas'] ?></p>
            <button type="button" data-bs-target="#landing" data-bs-toggle="modal" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">PPDB</button>
          </div>
          <div class="col-lg-6 text-center text-lg-start">
            <center><img class="img-fluid" src="<?= base_url() ?>/gambar_profil_sekolah/<?= $sekolah['gambar_sekolah1'] ?>" width="60%" alt="Gambar <?= $sekolah['gambar_sekolah1'] ?>"></center>
          </div>
        </div>
      </div>
    </div>
  <?php } else if ($isi_landing == 'landing/v_bacaInformasi') { ?>
    <div class="container-xxl py-5 bg-success hero-header mb-5">
      <div class="container my-5 py-5 px-lg-5">
        <div class="row g-5 py-5">
          <div class="col-12 text-center">
            <h1 class="text-white animated zoomIn">Baca Informasi Penerimaan Peserta Didik Baru (PPDB) <?= $sekolah['nama_sekolah'] ?></h1>
            <hr class="bg-white mx-auto mt-0" style="width: 90px;">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center animated zoomIn">
                <li class="breadcrumb-item"><a class="text-white" href="#">Silahkan Untuk Dibaca dan Dipelajari !</a></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</div>
<!-- Navbar & Hero End -->