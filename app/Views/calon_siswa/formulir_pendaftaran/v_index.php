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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title ?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('calonsiswa') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><?= $title ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- COLOR PALETTE -->
        <div class="box box-success">
            <div class="box-body box-profile">
                <?php if (date('Y-m-d') >= $tahun_ajaran['tanggal_mulai'] && date('Y-m-d') <= $tahun_ajaran['tanggal_akhir']) { ?>
                    <?php if (!$pendaftaran == null) { ?>
                        <div class="box box-success">
                            <div class="box-body">
                                <div class="box box-success">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-lg-12 text-center">
                                                <h3>Anda Tidak Dapat Mengisi Formulir Pendaftaran Kembali, Karena Anda Sudah Terdaftar Dengan Kode Pendaftaran : <br><br><strong><?= $pendaftaran['id_pendaftaran'] ?></strong></h3>
                                                <h5>Dengan Foto Formal Anda :</h5>
                                                <img src="<?= base_url('pendaftaran/' . $pendaftaran['b_foto']) ?>" width="150px" alt="Foto <?= $pendaftaran['nama_lengkap'] ?>"><br>
                                                <h5>Untuk melihat detail data pendaftaran Anda, Anda bisa klik tombol dibawah!</h5>
                                                <a href="<?= base_url('/formulirPendaftaran/hasilDataPendaftaran/' . $pendaftaran['id_pendaftaran']) ?>" class="btn btn-success">Data Pendaftaran</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pad margin no-print">
                                    <div class="callout callout-info" style="margin-bottom: 0!important;">
                                        <h4><i class="fa fa-info"></i> Ketentuan : </h4>
                                        <ul type="square">
                                            <li>Anda wajib mengisi semua form yang ada tanda bintang berwarna merah.</li>
                                            <li>Selain itu, sifatnya opsional. Bisa diisi atau tidak.</li>
                                            <li>Anda wajib mengisi form sesuai dengan informasi pribadi yang Anda miliki.</li>
                                            <li>Anda wajib mengisi informasi pribadi orang tua Anda yang sesuai.</li>
                                            <li>Form informasi orang tua ayah dan ibu, bisa diisi oleh data informasi orang tua kandung atau wali.</li>
                                            <li>Untuk form berkas yang diupload itu wajib berbentuk scan foto/gambar yang ber tipe JPG/PNG/JPEG.</li>
                                            <li>Anda bisa bisa scan/foto terlebih dahulu berkas yang perlu diinput, yaitu sebagai berikut :
                                                <ul>
                                                    <li>Foto Formal, dengan ukuran 3x4, background berwarna merah</li>
                                                    <li>Akte Kelahiran</li>
                                                    <li>Kartu Keluarga</li>
                                                    <li>KTP Ayah</li>
                                                    <li>KTP Ibu</li>
                                                    <li>Kartu KIP (bagi yang memiliki)</li>
                                                </ul>
                                            </li>
                                            <li>Jika ada yang ingin Anda tanyakan tentang formulir, Anda bisa kontak saja media sosial <?= $sekolah['nama_sekolah'] ?> yang tercantum di website ini.</li>
                                            <li>Ketika semua form nya sudah diisi, maka Anda bisa langsung klik tombol Kirim.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
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
                                    echo '<div class="alert alert-success" role="alert">';
                                    echo session()->getFlashdata('pesan');
                                    echo '</div>';
                                }
                                ?>
                            </div>
                            <?= form_open_multipart('formulir_pendaftaran/prosesDaftar') ?>
                            <?= csrf_field(); ?>
                            <div class="col-lg-12 col-xs-12">
                                <div class="form-group">
                                    <label for="">Tahun Pelajaran <span style="color: red;">*</span></label>
                                    <input type="hidden" class="form-control" name="id_tahun_ajaran" value="<?= $tahun_ajaran['id_tahun_ajaran'] ?>" readonly>
                                    <input type="text" class="form-control" name="tahun_ajaran" value="<?= $tahun_ajaran['tahun_ajaran'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Nama Lengkap <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" value="<?= old('nama_lengkap') ?>">
                                </div>
                            </div>
                            <div class="col-lg-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Tanggal Lahir <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="<?= old('tanggal_lahir') ?>">
                                </div>
                            </div>
                            <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                    <label for="">Jenis Kelamin <span style="color: red;">*</span></label>
                                    <select name="jenis_kelamin" class="form-control" id="">
                                        <?php if (old('jenis_kelamin')) { ?>
                                            <option value="<?= old('jenis_kelamin') ?>"><?= old('jenis_kelamin') ?></option>
                                        <?php } else { ?>
                                            <option value="">--Pilih--</option>
                                        <?php } ?>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                    <label for="">Agama <span style="color: red;">*</span></label>
                                    <select name="agama" class="form-control" id="">
                                        <?php if (old('agama')) { ?>
                                            <option value="<?= old('agama') ?>"><?= old('agama') ?></option>
                                        <?php } else { ?>
                                            <option value="">--Pilih--</option>
                                        <?php } ?>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                    <label for="">Golongan Darah <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="golongan_darah" placeholder="Masukkan Golongan Darah" value="<?= old('golongan_darah') ?>">
                                </div>
                            </div>
                            <div class="col-lg-12 col-xs-12">
                                <div class="form-group">
                                    <label for="">Alamat Lengkap <span style="color: red;">*</span></label>
                                    <textarea name="alamat" class="form-control" id="" cols="20" rows="5"><?= old('alamat') ?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xs-12">
                                <div class="form-group">
                                    <label for="">Informasi Orang Tua</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                    <label for="">Nama Ayah <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nama_ayah" placeholder="Masukkan Nama Ayah" value="<?= old('nama_ayah') ?>">
                                </div>
                            </div>
                            <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                    <label for="">Pekerjaan Ayah <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="kerja_ayah" placeholder="Masukkan Pekerjaan Ayah" value="<?= old('kerja_ayah') ?>">
                                </div>
                            </div>
                            <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                    <label for="">Pendidikan Ayah <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="pendidikan_ayah" placeholder="Masukkan Pendidikan Ayah" value="<?= old('pendidikan_ayah') ?>">
                                </div>
                            </div>
                            <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                    <label for="">Nama Ibu <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nama_ibu" placeholder="Masukkan Nama Ibu" value="<?= old('nama_ibu') ?>">
                                </div>
                            </div>
                            <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                    <label for="">Pekerjaan Ibu <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="kerja_ibu" placeholder="Masukkan Pekerjaan Ibu" value="<?= old('kerja_ibu') ?>">
                                </div>
                            </div>
                            <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                    <label for="">Pendidikan Ibu <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="pendidikan_ibu" placeholder="Masukkan Pendidikan Ibu" value="<?= old('pendidikan_ibu') ?>">
                                </div>
                            </div>
                            <div class="col-lg-12 col-xs-12">
                                <div class="form-group">
                                    <label for="">Nomor Telepon/Whatsapp <span style="color: red;">*</span></label>
                                    <input type="number" class="form-control" name="telepon_rumah" placeholder="Contoh : 083845405765" value="<?= old('telepon_rumah') ?>">
                                </div>
                            </div>
                            <div class=" col-lg-12 col-xs-12">
                                <div class="form-group">
                                    <label for="">Berkas Dokumen</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Foto Formal <span style="color: red;">*</span></label>
                                            <input type="file" class="form-control" id="preview_gambar1" name="b_foto" value="<?= old('b_foto') ?>">
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <img src="" id="gambar_load1" width="100" height="" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Akte Kelahiran <span style="color: red;">*</span></label>
                                            <input type="file" class="form-control" id="preview_gambar2" name="b_akte" value="<?= old('b_akte') ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <img src="" id="gambar_load2" width="100" height="" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Kartu Keluarga <span style="color: red;">*</span></label>
                                            <input type="file" class="form-control" id="preview_gambar3" name="b_kk" value="<?= old('b_kk') ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <img src="" id="gambar_load3" width="100" height="" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">KTP Ayah <span style="color: red;">*</span></label>
                                            <input type="file" class="form-control" id="preview_gambar4" name="b_ktp_ayah" value="<?= old('b_ktp_ayah') ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <img src="" id="gambar_load4" width="100" height="" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">KTP Ibu <span style="color: red;">*</span></label>
                                            <input type="file" class="form-control" id="preview_gambar5" name="b_ktp_ibu" value="<?= old('b_ktp_ibu') ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <img src="" id="gambar_load5" width="100" height="" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Kartu KIP <small>( Jika Ada )</small></label>
                                            <input type="file" class="form-control" id="preview_gambar6" name="b_kartu" value="<?= old('b_kartu') ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <img src="" id="gambar_load6" width="100" height="" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xs-12">
                                <button type="submit" class="btn btn-success pull-right"><i class="fa fa-send-o"></i> Kirim</button>
                            </div>
                            <?= form_close() ?>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="box box-success">
                        <div class="box-body">
                            <div class="box box-success">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <h3>Formulir Pendaftaran Penerimaan Peserta Didik Baru (PPDB) <?= $sekolah['nama_sekolah'] ?> <?php if (date('Y-m-d') < $tahun_ajaran['tanggal_mulai']) { ?><strong>Belum Dibuka!!</strong><?php } else if (date('Y-m-d') > $tahun_ajaran['tanggal_akhir']) { ?><strong>Ditutup!!</strong><?php } ?></h3>
                                            <h5>Tanggal Pembukaannya yaitu <strong><?= tanggal_indo($tahun_ajaran['tanggal_mulai']) ?></strong> dan berakhir pada tanggal <strong><?= tanggal_indo($tahun_ajaran['tanggal_akhir']) ?></strong></h5>
                                        </div>
                                        <div class="col-lg-12 text-center" r>
                                            <?php if (!$pendaftaran == null) { ?>
                                                <a href="<?= base_url('/formulirPendaftaran/hasilDataPendaftaran/' . $pendaftaran['id_pendaftaran']) ?>" class="btn btn-success">Data Pendaftaran</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</div>