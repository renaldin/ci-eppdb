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
<!-- Full Screen Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content" style="background: rgba(29, 29, 39, 0.7);">
            <div class="modal-header border-0">
                <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
<!-- Full Screen Search End -->

<!-- About Start -->
<div class="container-xxl py-5" id="profil-sekolah">
    <br><br>
    <div class="container px-lg-5">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="section-title position-relative mb-4 pb-2">
                    <h6 class="position-relative text-primary ps-4">Profil Sekolah</h6>
                    <h2 class="mt-2"><?= $sekolah['nama_sekolah'] ?></h2>
                </div>
                <p class="mb-4"><?= $sekolah['deskripsi_bawah'] ?></p>
                <p>
                    Alamat : <?= $sekolah['alamat'] ?>
                </p>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <h6 class="mb-3"><i class="fa fa-check text-success me-2"></i>Akreditasi <?= $sekolah['akreditasi'] ?></h6>
                        <h6 class="mb-0"><i class="fa fa-check text-success me-2"></i>Status Sekolah Negeri</h6>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="mb-3"><i class="fa fa-check text-success me-2"></i>Jumlah Semua Siswa <?= $sekolah['jumlah_semua_siswa'] ?></h6>
                        <h6 class="mb-0"><i class="fa fa-check text-success me-2"></i>Web Sendiri</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center mt-4">
                    <a class="btn btn-success rounded-pill px-4 me-3" href="mailto:<?= $sekolah['email'] ?>" target="_blank">Kirim Email</a>
                    <a target="_blank" class="btn btn-outline-success btn-square" href="https://wa.me/62<?= $sekolah['wa'] ?>?text=Hallo Pak/Bu!!! %0ASaya izin bertanya perihal informasi Penerimaan Peserta Didik Baru (PPDB) di <?= $sekolah['nama_sekolah'] ?>. %0APertanyaan : "><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="<?= base_url() ?>/gambar_profil_sekolah/<?= $sekolah['gambar_sekolah2'] ?>" width="100%" style="border-radius: 10%;" alt="Gambar <?= $sekolah['nama_sekolah'] ?>">
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Informasi Start -->
<div class="container-xxl py-5" id="informasi">
    <br>
    <div class="container px-lg-5">
        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="position-relative d-inline text-success ps-4">Kumpulan</h6>
            <h2 class="mt-2">Informasi PPDB SDN Cibogo</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                <div class="owl-carousel testimonial-carousel">
                    <?php foreach ($informasi as $row) { ?>
                        <div class="testimonial-item border rounded p-4">
                            <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                <div class="service-icon ">
                                    <img src="<?= base_url('gambar_informasi_ppdb/' . $row['gambar']) ?>" width="100%" alt="Foto <?= $row['judul_informasi'] ?>">
                                </div>
                                <h5 class="mb-3"><?= $row['judul_informasi'] ?></h5>
                                <a class="btn px-3 mt-auto mx-auto" href="<?= base_url('/landing/bacaInformasi/' . $row['id_informasi']) ?>">Baca <i class="fa fa-arrow-circle-right m-1"></i></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Informasi End -->
</div>

<!-- Modal Landing -->
<div class="modal fade" id="landing" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalToggleLabel" style="color: white;"><i class="fa fa-bullhorn"></i> Informasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert">
                    <h6 class="alert-heading">Jadwal Penerimaan Peserta Didik Baru (PPDB) <?= $sekolah['nama_sekolah'] ?>, Pembukaan : <strong><?= tanggal_indo($tahun_ajaran['tanggal_mulai'])  ?></strong> s.d. <strong><?= tanggal_indo($tahun_ajaran['tanggal_akhir']) ?></strong>, Pengumuman : <strong><?= tanggal_indo($tahun_ajaran['tanggal_pengumuman']) ?></strong>.</h6>
                </div>
                <center>
                    <?php if (date('Y-m-d') >= $tahun_ajaran['tanggal_mulai'] && date('Y-m-d') <= $tahun_ajaran['tanggal_akhir']) { ?>
                        <h3>Pendaftaran Dibuka</h3>
                    <?php } else if (date('Y-m-d') < $tahun_ajaran['tanggal_mulai']) { ?>
                        <h3>Pendaftaran Belum Dibuka</h3>
                    <?php } else if (date('Y-m-d') > $tahun_ajaran['tanggal_akhir'] && date('Y-m-d') < $tahun_ajaran['tanggal_pengumuman']) { ?>
                        <h3>Pendaftaran Ditutup</h3>
                    <?php } else if (date('Y-m-d') >= $tahun_ajaran['tanggal_pengumuman']) { ?>
                        <h3>Pengumuman Dibuka</h3>
                    <?php } ?>
                </center>

                <center><img src="<?= base_url('gambar_profil_sekolah/' . $sekolah['gambar_sekolah1']) ?>" width="150px" alt="Logo SDN Cibogo"></center>

            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-sm btn-flat" data-bs-target="#landing2" data-bs-toggle="modal" data-bs-dismiss="modal">Panduan</button>
                <?php if (date('Y-m-d') >= $tahun_ajaran['tanggal_mulai'] && date('Y-m-d') <= $tahun_ajaran['tanggal_akhir']) { ?>
                    <a href="<?= base_url('/auth/login') ?>" class="btn btn-success btn-sm btn-flat">Lanjut</a>
                <?php } else if (date('Y-m-d') < $tahun_ajaran['tanggal_mulai']) { ?>
                    <button type="button" class="btn btn-success btn-sm btn-flat" data-bs-target="#landing-pembukaan" data-bs-toggle="modal" data-bs-dismiss="modal">Lanjut</button>
                <?php } else if (date('Y-m-d') > $tahun_ajaran['tanggal_akhir'] && date('Y-m-d') < $tahun_ajaran['tanggal_pengumuman']) { ?>
                    <button type="button" class="btn btn-success btn-sm btn-flat" data-bs-target="#landing-pembukaan" data-bs-toggle="modal" data-bs-dismiss="modal">Lanjut</button>
                <?php } else if (date('Y-m-d') >= $tahun_ajaran['tanggal_pengumuman']) { ?>
                    <a href="<?= base_url('/auth/login') ?>" class="btn btn-success btn-sm btn-flat">Lanjut</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Panduan / Landing2 -->
<div class="modal fade" id="landing2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalToggleLabel" style="color: white;"><i class="fa fa-file"></i> Panduan PPDB</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center>
                    <h6 class="alert-heading mb-4 "><strong>Alur Proses PPDB Sebagai Berikut. Silahkan Klik Tombolnya Untuk Mengetahui Panduan Dari Setiap Prosesnya.</strong></h6>
                    <button class="btn btn-success btn-sm btn-flat" data-bs-target="#panduan-akun" data-bs-toggle="modal" data-bs-dismiss="modal">Akun</button> <i class="fa fa-hand-point-right"></i>
                    <button class="btn btn-success btn-sm btn-flat" data-bs-target="#panduan-pendaftaran" data-bs-toggle="modal" data-bs-dismiss="modal">Pendaftaran</button> <i class="fa fa-hand-point-right"></i>
                    <button class="btn btn-success btn-sm btn-flat" data-bs-target="#panduan-pengumuman" data-bs-toggle="modal" data-bs-dismiss="modal">Pengumuman</button>
                </center>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-sm btn-flat" data-bs-target="#landing" data-bs-toggle="modal" data-bs-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Panduan Buat Akun-->
<div class="modal fade" id="panduan-akun" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalToggleLabel" style="color: white;"><i class="fa fa-file"></i> Panduan Buat Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert">
                    <ol>
                        <li>Jika sudah berada di halaman awal website ini, Anda klik tombol <strong>PPDB</strong></li>
                        <li>Klik tombol "<strong>Belum punya akun ? Register!</strong>" </li>
                        <li>Isi data pengguna Anda yang diminta</li>
                        <li>Untuk kolom email, Anda <strong>harus</strong> menginput email yang <strong>aktif</strong></li>
                        <li>Jika sudah diisi semuanya, Anda bisa klik tombol <strong>Daftar</strong></li>
                        <li>Selanjutnya, Anda cek email Anda yang diinput, kami telah mengirimkan pesan <strong>Verifikasi</strong> </li>
                        <li>Silahkan <strong>Verifikasi</strong>, agar bisa <strong>login</strong></li>
                        <li>Selesai</li>
                    </ol>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-sm btn-flat" data-bs-target="#landing2" data-bs-toggle="modal" data-bs-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Panduan Pendaftaran-->
<div class="modal fade" id="panduan-pendaftaran" aria-hidden="true" aria-labelledby="exampleModalToggleLabel4" tabindex="-1">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalToggleLabel" style="color: white;"><i class="fa fa-file"></i> Panduan Pendaftaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert">
                    <ol>
                        <li>Jika waktu pembukaan pendaftaran sudah dibuka</li>
                        <li>Silahkan <strong>Login</strong></li>
                        <li>Klik menu <strong>Formulir Pendaftaran</strong></li>
                        <li>Anda baca <strong>ketentuan</strong> dengan teliti</li>
                        <li>Selanjutnya, silahkan isi semua kolom yang ada dengan <strong>data pribadi</strong> dan <strong>orang tua</strong> yang valid atau sesuai</li>
                        <li>Setelah semua kolom telah diisi, klik tombol <strong>Kirim</strong></li>
                        <li>Anda akan mendapatkan <strong>Kode Pendaftaran</strong>, silahkan tunggu! Kami akan seleksi berkas yang Anda kirimkan</li>
                        <li>Selesai</li>
                    </ol>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-sm btn-flat" data-bs-target="#landing2" data-bs-toggle="modal" data-bs-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Panduan Pengumuman-->
<div class="modal fade" id="panduan-pengumuman" aria-hidden="true" aria-labelledby="exampleModalToggleLabel5" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalToggleLabel" style="color: white;"><i class="fa fa-file"></i> Panduan Pengumuman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert">
                    <ol>
                        <li>Jika waktu pengumuman sudah dibuka</li>
                        <li>Silahkan <strong>Login</strong></li>
                        <li>Klik menu <strong>Pengumuman Hasil PPDB</strong></li>
                        <LI>Silahkan cek dengan <strong>Kode Pendaftaran Anda</strong></LI>
                        <li>Jika Anda lulus, Anda harus download <strong>Bukti Kelulusan</strong></li>
                        <li>Selesai</li>
                    </ol>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-sm btn-flat" data-bs-target="#landing2" data-bs-toggle="modal" data-bs-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Landing Pembukaan-->
<div class="modal fade" id="landing-pembukaan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel6" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalToggleLabel" style="color: white;"><i class="fa fa-bullhorn"></i> Informasi</h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert">
                    <h6 class="alert-heading">
                        Anda tidak bisa melanjutkan ke halaman proses pendaftaran dan pengumuman Penerimaan Peserta Didik Baru (PPDB) Online Sekolah Dasar Negeri Cibogo, karena
                        <strong><?php if (date('Y-m-d') >= $tahun_ajaran['tanggal_mulai'] && date('Y-m-d') <= $tahun_ajaran['tanggal_akhir']) { ?>
                                Pendaftaran Dibuka
                            <?php } else if (date('Y-m-d') < $tahun_ajaran['tanggal_mulai']) { ?>
                                Pendaftaran Belum Dibuka
                            <?php } else if (date('Y-m-d') > $tahun_ajaran['tanggal_akhir'] && date('Y-m-d') < $tahun_ajaran['tanggal_pengumuman']) { ?>
                                Pendaftaran Ditutup
                            <?php } else if (date('Y-m-d') >= $tahun_ajaran['tanggal_pengumuman']) { ?>
                                Pengumuman Dibuka
                            <?php } ?></strong>
                    </h6>
                </div>

                <center><img src="<?= base_url('gambar_profil_sekolah/' . $sekolah['gambar_sekolah1']) ?>" width="150px" alt="Logo SDN Cibogo"></center>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-sm btn-flat" data-bs-dismiss="modal" aria-label="Close">Ok</button>
            </div>
        </div>
    </div>
</div>