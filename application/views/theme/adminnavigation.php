<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
    <div class="sidebar-brand-icon rotate-n-15">
    </div>
    <div class="sidebar-brand-text mx-3">ADMIN SDN PELAIHARI 9</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() . 'admin/dashboard' ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() . 'admin/guru' ?>">
      <i class="fas fa-fw fa-address-book"></i>
      <span>Data Guru</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() . 'admin/pengumuman' ?>">
      <i class="fas fa-fw fa-volume-up"></i>
      <span>Data Pengumuman</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() . 'admin/files' ?>">
      <i class="fas fa-fw fa-download"></i>
      <span>Data Download</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() . 'admin/mapel' ?>">
      <i class="fas fa-fw fa-address-book"></i>
      <span>Data Mapel</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() . 'admin/video' ?>">
      <i class="fas fa-fw fa-download"></i>
      <span>Data Video</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() . 'admin/admin' ?>">
      <i class="fa fa-user"></i>
      <span>Data Admin</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-sm" href="<?php echo base_url() . 'admin/siswa' ?>">
      <i class="fa fa-users"></i>
      <span>Data Siswa</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-sm" href="<?php echo base_url() . 'admin/galeri' ?>">
      <i class="fa fa-image"></i>
      <span>Galeri</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-sm" href="<?php echo base_url() . 'admin/berita' ?>">
      <i class="fa fa-newspaper"></i>
      <span>Berita</span></a>
  </li>

  <!-- Divider -->




  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() . 'admin/login/logout' ?>">
      <i class="fas fa-fw fa-power-off"></i>
      <span>Logout</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>