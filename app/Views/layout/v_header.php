<body class="hold-transition skin-green-light fixed sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="<?= base_url('admin') ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="<?= base_url() ?>/gambar_profil_sekolah/<?= $sekolah['logo'] ?>" width="30px" alt=""></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="<?= base_url() ?>/gambar_profil_sekolah/<?= $sekolah['logo'] ?>" width="30px" alt=""> <b>E-PPDB</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="messages-menu">
              <a href="<?= base_url() ?>" class="">
                <i class="fa fa-home"></i>
                Landing Page
              </a>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= (session()->get('foto')) ? base_url('foto/' . session()->get('foto')) : base_url('foto/default.png') ?>?>" class="user-image" alt="<?= session()->get('nama_user') ?>">
                <span class="hidden-xs"><?= session()->get('nama') ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?= (session()->get('foto')) ? base_url('foto/' . session()->get('foto')) : base_url('foto/default.png') ?>?>" class="img-circle" alt="<?= session()->get('nama_user') ?>">
                  <p>
                    <b><?= session()->get('nama') ?></b>
                    <small><?= session()->get('role') ?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?= base_url('/profil/' . session()->get('id_user')) ?>" class="btn btn-default btn-flat"><i class="fa fa-user"></i> Profil</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= base_url('/auth/logout') ?>" class="btn btn-default btn-flat"><i class="fa fa-power-off"></i> Keluar</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>