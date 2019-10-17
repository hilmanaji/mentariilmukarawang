<?php
    $ci =& get_instance();
    $ci->load->model('DataHandle');
    $data_yayasan = $ci->DataHandle->getAllWhere('tbl_yayasan', '*', "status = '1'")->row_array();

?>
    <nav class="fh5co-nav fixed-top" role="navigation" style="background-color: #32a881;">
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-right">
                        <p class="site" style="color:#fff"><?= $data_yayasan['email'] ?></p>
                        <p class="num" style="color:#fff">Phone : <?= $data_yayasan['kontak'] ?></p>
                        <ul class="fh5co-social">
                            <li><a href="https://www.facebook.com/<?= $data_yayasan['fb'] ?>" target="_blank"><i style="color:white" class="icon-facebook2"></i></a></li>
                            <li><a href="https://www.instagram.com/<?= $data_yayasan['instagram'] ?>" target="_blank"><i style="color:white" class="icon-instagram"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/<?= $data_yayasan['youtube'] ?>" target="_blank"><i style="color:white" class="icon-youtube"></i></a></li>
                            <li><a href="https://www.twitter.com/<?= $data_yayasan['twitter'] ?>" target="_blank"><i style="color:white" class="icon-twitter2"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-xs-7">
                        <div id="fh5co-logo"><a style="color:white" href="<?= base_url() ?>Home"><i class="icon-study"></i><span style="color:white">&nbsp;<?= $data_yayasan['nama'] ?></span></a></div>
                    </div>
                    <div class="col-xs-5 text-right menu-1">
                        <ul>
                            <?php 
                                $home = '';
                                $tentang = '';
                                $sekolah = '';
                                $contact = '';
                                $faq = '';
                                if($this->uri->segment('2')==NULL){
                                    $home = 'class="active"';
                                }
                                if($this->uri->segment('2')=='about_us'){
                                    $tentang = 'class="active"';                                    
                                } 
                                if($this->uri->segment('2')=='sekolah' || $this->uri->segment('2')=='mentariilmu'){
                                    $sekolah = 'class="active"';                                    
                                } 
                                if($this->uri->segment('2')=='faq'){
                                    $faq = 'class="active"';                                    
                                } 
                                if($this->uri->segment('2')=='contact'){
                                    $contact = 'class="active"';                                    
                                } 
                            ?>
                            <li <?= $home ?>><a style="color:#fff" href="<?= base_url() ?>Home/">Home</a></li>                            
                            <li <?= $tentang ?>><a style="color:#fff" href="<?= base_url() ?>Home/about_us">Tentang Kami</a></li>
                            <li <?= $sekolah ?>><a style="color:#fff" href="<?= base_url() ?>Home/sekolah">Sekolah</a></li>
                            <li <?= $contact ?>><a style="color:#fff" href="<?= base_url() ?>Home/contact">Contact</a></li>
                            <li <?= $faq ?>><a style="color:#fff" href="<?= base_url() ?>Home/download">Download</a></li>
                            <!-- <li class="btn-cta"><a href="#"><span>Login</span></a></li> -->
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </nav>