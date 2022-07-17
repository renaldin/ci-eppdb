<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title ?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><?= $title ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= $title; ?></h3>

                        <div class="box-tools pull-right">
                            <a href="<?= base_url('/informasi'); ?>" class="btn btn-box-tool"><i class="fa fa-mail-reply"> Kembali</i></a>
                        </div>
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
                        echo form_open_multipart('informasi/prosesEdit/' . $informasi['id_informasi']);
                        ?>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Judul Informasi</label>
                                <input type="text" class="form-control" name="judul_informasi" placeholder="Masukkan Judul Informasi" value="<?= $informasi['judul_informasi'] ?>">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal_informasi" placeholder="Masukkan Tanggal Informasi" value="<?= $informasi['tanggal_informasi'] ?>">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" class="form-control" id="preview_gambar" name="gambar">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <img src="<?= ($informasi['gambar']) ? base_url('gambar_informasi_ppdb/' . $informasi['gambar']) : base_url('gambar_informasi_ppdb/default.png') ?>?>" id="gambar_load" width="150" height="" alt="<?= $informasi['judul_informasi'] ?>">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Isi Informasi</label>
                                <textarea id="editor1" name="isi_informasi" rows="10" cols="80"><?= $informasi['isi_informasi'] ?></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-send-o"></i> Edit</button>
                    </div>
                    <?php
                    echo form_close();
                    ?>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>