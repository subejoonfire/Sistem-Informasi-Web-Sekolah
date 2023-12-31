<div id="sticky-header" style="background-color: #F7F7F7;" class="main-header-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="header_wrap d-flex justify-content-between align-items-center">
                    <div class="header_left">
                        <div class="logo">
                            <a href="<?php echo base_url(''); ?>">
                                <img src="<?php echo base_url(''); ?>style/imgpng" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="header_right d-flex align-items-center">
                        <div class="main-menu  d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="<?php echo base_url(''); ?>">Beranda</a></li>
                                    <li><a href="#">Profil <i class="ti-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="<?php echo site_url('about'); ?>">Tentang</a></li>

                                            <li><a href="<?php echo site_url('guru'); ?>">Daftar Guru</a></li>
                                            <li><a href="<?php echo site_url('siswa'); ?>">Daftar Siswa</a></li>
                                            <li><a href="<?php echo site_url('contact'); ?>">Kontak Kami</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Akademik <i class="ti-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="<?php echo site_url('pengumuman'); ?>">Pengumuman</a></li>

                                            <li><a href="<?php echo site_url('galeri'); ?>">Galeri</a></li>
                                        </ul>
                                    </li>



                                    <li><a href="<?php echo site_url('download'); ?>">Materi Pembelajaran</a></li>
                                    <li><a href="<?php echo site_url('berita'); ?>">Berita</a></li>
                                    <li><a href="<?php echo site_url('video'); ?>">Video Belajar</a></li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="mobile_menu d-block d-lg-none"></div>
            </div>
        </div>
    </div>
</div>