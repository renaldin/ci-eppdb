<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title ?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><?= $title ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- COLOR PALETTE -->
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data <?= $title; ?></h3>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
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

                        <?php
                        echo form_open_multipart('profil_sekolah/prosesUpdate/' . $sekolah['id_profil_sekolah']);
                        ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Sekolah</label>
                                    <input type="text" class="form-control" name="nama_sekolah" placeholder="Masukkan Nama Sekolah" value="<?= $sekolah['nama_sekolah'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Akreditasi Sekolah</label>
                                    <input type="text" name="akreditasi" class="form-control" placeholder="Masukkan Akreditasi Sekolah" value="<?= $sekolah['akreditasi'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah Semua Siswa</label>
                                    <input type="number" name="jumlah_semua_siswa" class="form-control" placeholder="Masukkan Jumlah Semua Siswa" value="<?= $sekolah['jumlah_semua_siswa'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Nomor Telepon</label>
                                    <input type="number" name="telepon" class="form-control" placeholder="Masukkan Nomor Telepon" value="<?= $sekolah['telepon'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Masukkan Email Sekolah" value="<?= $sekolah['email'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar Sekolah 1</label>
                                    <input type="file" class="form-control" id="preview_gambar_sekolah1" name="gambar_sekolah1">
                                </div>
                                <div class="form-group">
                                    <img src="<?= ($sekolah['logo']) ? base_url('gambar_profil_sekolah/' . $sekolah['gambar_sekolah1']) : base_url('gambar_profil_sekolah/default.png') ?>" id="gambar_load_sekolah1" width="100" height="" alt="<?= $sekolah['nama_sekolah'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar Sekolah 2</label>
                                    <input type="file" class="form-control" id="preview_gambar_sekolah2" name="gambar_sekolah2">
                                </div>
                                <div class="form-group">
                                    <img src="<?= ($sekolah['logo']) ? base_url('gambar_profil_sekolah/' . $sekolah['gambar_sekolah2']) : base_url('gambar_profil_sekolah/default.png') ?>" id="gambar_load_sekolah2" width="100" height="" alt="<?= $sekolah['nama_sekolah'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Alamat Sekolah</label>
                                    <textarea name="alamat" class="form-control" id="" cols="5" rows="4"><?= $sekolah['alamat'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Logo</label>
                                    <input type="file" class="form-control" id="preview_gambar_logo" name="logo">
                                </div>
                                <div class="form-group">
                                    <img src="<?= ($sekolah['logo']) ? base_url('gambar_profil_sekolah/' . $sekolah['logo']) : base_url('gambar_profil_sekolah/default.png') ?>" id="gambar_load_logo" width="100" height="" alt="<?= $sekolah['nama_sekolah'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Nomor Whatsapp Sekolah</label>
                                    <input type="text" name="wa" class="form-control" placeholder="Masukkan Nomor Whatsapp" value="<?= $sekolah['wa'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi Web Landing Home</label>
                                    <textarea name="deskripsi_atas" class="form-control" id="" cols="5" rows="4"><?= $sekolah['deskripsi_atas'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi Web Landing Profil Sekolah</label>
                                    <textarea name="deskripsi_bawah" class="form-control" id="" cols="5" rows="4"><?= $sekolah['deskripsi_bawah'] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-edit"></i> Edit</button>
                    </div>
                    <?php
                    echo form_close();
                    ?>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>