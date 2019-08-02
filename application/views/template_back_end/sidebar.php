
        <aside class="sidebar" role="navigation">
            <div class="scroll-sidebar">
                <div class="user-profile">
                    <div class="dropdown user-pro-body">
                        <div class="profile-image">
                            <img src="<?php echo base_url() ?>assets/plugins/images/users/jeffery.jpg" alt="user-img" class="img-circle">
                            <a href="javascript:void(0);" class="dropdown-toggle u-dropdown text-blue" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="badge badge-danger">
                                    <i class="fa fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated flipInY">
                                <li><a href="<?php echo base_url() ?>Profil"><i class="fa fa-user"></i> Profil</a></li>
                                <li><a href="<?php echo base_url() ?>Tamu"><i class="fa fa-inbox"></i> Buku Tamu</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url() ?>Login/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                        <p class="profile-text m-t-15 font-16"><a href="javascript:void(0);"> <?php echo $this->session->userdata('nama'); ?></a></p>
                    </div>
                </div>
                <nav class="sidebar-nav">
                    <ul id="side-menu">
                        <li>
                            <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-globe fa-fw"></i> <span class="hide-menu"> Data Master</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li> <a href="<?php echo base_url() ?>Sekolah"><i class="icon-layers fa-fw"></i>Data Sekolah</a> </li>
                                <li> <a href="<?php echo base_url() ?>User"><i class="icon-user fa-fw"></i>Data User</a> </li>
                                <li> <a href="<?php echo base_url() ?>FAQ"><i class="icon-question fa-fw"></i>Data FAQ</a> </li>
                            </ul>
                        </li>
                        <!-- <li> <a href="<?php echo base_url() ?>Login/logout"><i class="icon-logout fa-fw"></i><span class="hide-menu"> Logout</span></a> </li> -->
                        <li>
                            <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-social-dropbox fa-fw"></i> <span class="hide-menu"> Kelola Konten</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li> <a href="<?php echo base_url() ?>Fasilitas"><i class="icon-notebook fa-fw"></i>Fasilitas</a> </li>
                                <li> <a href="<?php echo base_url() ?>Kegiatan"><i class="icon-notebook fa-fw"></i>Kegiatan</a> </li>
                                <li> <a href="<?php echo base_url() ?>Artikel"><i class="icon-notebook fa-fw"></i>Artikel</a> </li>
                                <li> <a href="<?php echo base_url() ?>Profile"><i class="icon-notebook fa-fw"></i>Profile Sekolah</a> </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>