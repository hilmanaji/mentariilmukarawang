<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg" id="nav" style="background-color: #1b9e56;">
    <div class="container" id="logo">
        <a class="navbar-brand" href="<?= base_url(); ?>home/">
            <img src="<?php echo base_url() ?>assets/plugins/images/logomentariilmu.png" width="50" height="50" class="d-inline-block align-top" alt="">
        </a>
        <a class="navbar-brand" href="<?= base_url(); ?>home/">
        Yayasan Mentari Ilmu
        </a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Welcome</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="<?= base_url(); ?>home/sekolah" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sekolah
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                    <a class="dropdown-item" href="#">SD IT Mentari Ilmu Jatisari</a>
                    <a class="dropdown-item" href="#">SD IT Mentari Ilmu Karaba</a>
                    <a class="dropdown-item" href="#">SMP IT Mentari Ilmu</a>
                    <a class="dropdown-item" href="#">SMA IT Mentari Ilmu</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
            
        </ul>
      </div>
    </div>
  </nav>