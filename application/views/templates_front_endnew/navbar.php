
    <nav class="fh5co-nav fixed-top" role="navigation" style="background-color: #32a881;">
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-right">
                        <p class="site" style="color:#fff">mentariilmukarawang.sch.id</p>
                        <p class="num" style="color:#fff">Phone : 0267 - 8453155</p>
                        <ul class="fh5co-social">
                            <li><a href="#"><i style="color:white" class="icon-facebook2"></i></a></li>
                            <li><a href="#"><i style="color:white" class="icon-instagram"></i></a></li>
                            <li><a href="#"><i style="color:white" class="icon-youtube"></i></a></li>
                            <li><a href="#"><i style="color:white" class="icon-twitter2"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-xs-7">
                        <div id="fh5co-logo"><a style="color:white" href="<?= base_url() ?>Home"><i class="icon-study"></i><span style="color:white">&nbsp;Yayasan Pendidikan Mentari Ilmu</span></a></div>
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
                            <li <?= $faq ?>><a style="color:#fff" href="<?= base_url() ?>Home/faq">File</a></li>
                            <!-- <li class="btn-cta"><a href="#"><span>Login</span></a></li> -->
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </nav>