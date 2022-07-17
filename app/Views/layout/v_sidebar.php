<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= (session()->get('foto')) ? base_url('foto/' . session()->get('foto')) : base_url('foto/default.png') ?>?>" class="img-circle" alt="<?= session()->get('nama_user') ?>">
      </div>
      <div class="pull-left info">
        <p><?= session()->get('nama') ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" style="margin-top: 30px;" data-widget="tree">
      <li class="header">MENU</li>
      <?php if (session()->get('role') == 'Admin') { ?>
        <li class="">
          <a href="<?= base_url('admin') ?>" class="<?= ($isi == 'v_admin') ? 'bg-green' : '' ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="">
          <a href="<?= base_url('/informasi') ?>" class="<?= ($isi == 'admin/informasi/v_index' || $isi == 'admin/informasi/v_tambah' || $isi == 'admin/informasi/v_edit' || $isi == 'admin/informasi/v_detail') ? 'bg-green' : '' ?>">
            <i class="fa fa-bullhorn"></i> <span>Informasi PPDB</span>
          </a>
        </li>
        <li class="">
          <a href="<?= base_url('/profilSekolah') ?>" class="<?= ($isi == 'admin/profil_sekolah/v_index') ? 'bg-green' : '' ?>">
            <i class="fa fa-institution"></i> <span>Profil Sekolah</span>
          </a>
        </li>
        <li class="">
          <a href="<?= base_url('/tahunAjaran') ?>" class="<?= ($isi == 'admin/tahun_ajaran/v_index') ? 'bg-green' : '' ?>">
            <i class="fa fa-calendar"></i> <span>Tahun Ajaran</span>
          </a>
        </li>
        <li class="">
          <a href="<?= base_url('/daftar') ?>" class="<?= ($isi == 'admin/pendaftaran/v_index' || $isi == 'admin/pendaftaran/v_detail') ? 'bg-green' : '' ?>">
            <i class="fa fa-file-text"></i> <span>Pendaftaran</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#" class="<?= ($isi == 'admin/pendaftaran/v_lulus' || $isi == 'admin/pendaftaran/v_tidak_lulus' || $isi == 'admin/pendaftaran/v_detail_lulus' || $isi == 'admin/pendaftaran/v_detail_tidak_lulus') ? 'bg-green' : '' ?>">
            <i class="fa fa-clone"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('/laporan/pendaftaranLulus') ?>"><i class="fa fa-circle-o"></i> Pendaftaran Lulus</a></li>
            <li><a href="<?= base_url('/laporan/pendaftaranTidakLulus') ?>"><i class="fa fa-circle-o"></i> Pendaftaran Tidak Lulus</a></li>
          </ul>
        </li>
      <?php } else if (session()->get('role') == 'Calon Siswa') { ?>
        <li>
          <a href="<?= base_url('calonsiswa') ?>" class="<?= ($isi == 'v_calon_siswa') ? 'bg-green' : '' ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url('/formulirPendaftaran') ?>" class="<?= ($isi == 'calon_siswa/formulir_pendaftaran/v_index' || $isi == 'calon_siswa/formulir_pendaftaran/v_hasil_data_pendaftaran') ? 'bg-green' : '' ?>">
            <i class="ion ion-clipboard"></i> <span>Formulir Pendaftaran</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url('/pengumuman') ?>" class="<?= ($isi == 'calon_siswa/pengumuman/v_index' || $isi == 'calon_siswa/pengumuman/v_lulus' || $isi == 'calon_siswa/pengumuman/v_tidak_lulus') ? 'bg-green' : '' ?>">
            <i class="bi bi-megaphone-fill"></i> <span>&nbsp;&nbsp;Pengumuman Hasil PPDB</span>
          </a>
        </li>
      <?php } ?>
      <li class="header">MENU TAMBAHAN</li>
      <?php if (session()->get('role') == 'Admin') { ?>
        <li class="">
          <a href="<?= base_url('/pengguna') ?>" class="<?= ($isi == 'admin/user/v_index' || $isi == 'admin/user/v_detail') ? 'bg-green' : '' ?>">
            <i class="fa fa-user" aria-hidden="true"></i> <span>Data Pengguna</span>
          </a>
        </li>
      <?php } ?>
      <li><a href="<?= base_url('/auth/logout') ?>"><i class="fa fa-circle-o text-red"></i> <span>Keluar</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>