<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse pull-left" id=" navbar-collapse">
  <ul class="nav navbar-nav">
  </ul>
</div>
<!-- /.navbar-collapse -->
<!-- Navbar Right Menu -->
<div class="navbar-custom-menu">
  <ul class="nav navbar-nav">

    <?php if (session()->get('username') == "") { ?>
      <li><a href="<?= base_url(''); ?>"><i class="fa fa-home"></i> Landing Page</a></li>
    <?php  } else { ?>

      <!-- User Account Menu -->
      <li class="dropdown user user-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

        </a>
        <ul class="dropdown-menu">
        </ul>
      </li>
    <?php } ?>
  </ul>
</div>
<!-- /.navbar-custom-menu -->
</div>
<!-- /.container-fluid -->
</nav>
</header>
<!-- Full Width Column -->
<div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <h1>
          Top Navigation
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol>
      </section> -->
    <!-- Main content -->
    <section class="content">