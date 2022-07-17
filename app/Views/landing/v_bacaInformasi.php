<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container px-lg-5">
        <div class="row g-5">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 col-md-6 portfolio-item second wow zoomIn" data-wow-delay="0.1s">
                <div class="position-relative rounded overflow-hidden">
                    <img class="img-fluid w-100" src="<?= base_url('gambar_informasi_ppdb/' . $informasi['gambar']) ?>" width="50%" alt="">
                    <div class="portfolio-overlay">
                        <a class="btn btn-light" href="<?= base_url('gambar_informasi_ppdb/' . $informasi['gambar']) ?>" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                        <div class="mt-auto">
                            <small class="text-white"><i class="fa fa-folder me-2"></i>Gambar</small>
                            <a class="h5 d-block text-white mt-1 mb-0"><?= $informasi['judul_informasi'] ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container px-lg-5">
        <div class="row g-5">
            <div class="col-lg-1"></div>
            <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.1s">
                <div class="section-title position-relative mb-4 pb-2">
                    <h6 class="position-relative text-success ps-4">Judul</h6>
                    <h2 class="mt-2"><?= $informasi['judul_informasi'] ?></h2>
                </div>
                <p class="mb-4"><?= $informasi['isi_informasi'] ?></p>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <h6 class="mb-3"><i class="fa fa-calendar text-success me-2"></i><?= $informasi['tanggal_informasi'] ?></h6>
                        <h6 class="mb-0"><i class="fa fa-user text-success me-2"></i>Admin </h6>
                    </div>
                    <div class="col-sm-6">

                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
</div>
<!-- About End -->