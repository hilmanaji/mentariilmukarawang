
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
                                <li><a href="javascript:void(0);"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a href="javascript:void(0);"><i class="fa fa-inbox"></i> Inbox</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="javascript:void(0);"><i class="fa fa-cog"></i> Account Settings</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url() ?>Login/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                        <p class="profile-text m-t-15 font-16"><a href="javascript:void(0);"> Super Admin</a></p>
                    </div>
                </div>
                <nav class="sidebar-nav">
                    <ul id="side-menu">
                        <li>
                            <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-globe fa-fw"></i> <span class="hide-menu"> Master</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li> <a href="<?php echo base_url() ?>Sekolah">Data Sekolah</a> </li>
                                <li> <a href="<?php echo base_url() ?>User">Data User</a> </li>
                            </ul>
                        </li>
                        <li> <a href="<?php echo base_url() ?>Login/logout"><i class="icon-logout fa-fw"></i><span class="hide-menu"> Logout</span></a> </li>
                    </ul>
                </nav>
            </div>
        </aside>