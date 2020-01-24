<?php
    $ci =& get_instance();
    $ci->load->model('DataHandle');
    $data_yayasan = $ci->DataHandle->getAllWhere('tbl_yayasan', '*', "status = '1'")->row_array();

?>
  <nav class="navbar navbar-expand-md navbar-dark bg-primary" >
    <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar19">
        <span class="navbar-toggler-icon"></span>&nbsp;&nbsp;<i class="fa d-inline fa-lg fa-graduation-cap"></i>Yayasan Pendidikan Mentari Ilmu
      </button>
      <div class="collapse navbar-collapse" id="navbar19"> <a class="navbar-brand d-none d-md-block" href="#">
          <i class="fa d-inline fa-lg fa-graduation-cap"></i>
          <b> Yayasan Pendidikan Mentari Ilmu</b>
        </a>
        <ul class="navbar-nav mx-auto">      
        <?php 
            $home = '';
            $tentang = '';
            $sekolah = '';
            $contact = '';
            $download = '';
            if($this->uri->segment('2')==NULL){
                $home = 'active';
            }
            if($this->uri->segment('2')=='about_us'){
                $tentang = 'active';                                    
            } 
            if($this->uri->segment('2')=='sekolah' || $this->uri->segment('2')=='mentariilmu'){
                $sekolah = 'active';                                    
            } 
            if($this->uri->segment('2')=='download'){
                $download = 'active';                                    
            } 
            if($this->uri->segment('2')=='contact'){
                $contact = 'active';                                    
            } 
        ?>
          <li class="nav-item <?= $home ?>"> <a class="nav-link" href="<?= base_url('Home2') ?>">Home</a> </li>
          <li class="nav-item <?= $tentang ?>"> <a class="nav-link" href="<?= base_url('Home2/about_us') ?>">Tentang Kami</a> </li>
          <li class="nav-item <?= $sekolah ?>"> <a class="nav-link" href="<?= base_url('Home2/sekolah') ?>">Sekolah</a> </li>
          <li class="nav-item <?= $contact ?>"> <a class="nav-link" href="<?= base_url('Home2/contact') ?>">Contact</a> </li>
          <li class="nav-item <?= $download ?>"> <a class="nav-link" href="<?= base_url('Home2/download') ?>">Download</a> </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item mx-1"> 
            <a class="nav-link" href="https://www.facebook.com/<?= $data_yayasan['fb'] ?>" target="_blank">
              <i class="fa fa-facebook fa-fw fa-lg"></i>
            </a> 
          </li>
          <li class="nav-item mx-1"> 
            <a class="nav-link" target="_blank" href="https://www.youtube.com/channel/<?= $data_yayasan['youtube'] ?>">
              <i class="fa fa-youtube fa-fw fa-lg"></i>
            </a> 
          </li>
          <li class="nav-item mx-1"> 
            <a class="nav-link" target="_blank" href="https://www.instagram.com/<?= $data_yayasan['instagram'] ?>">
              <i class="fa fa-instagram fa-fw fa-lg"></i>
            </a> 
          </li>
          <li class="nav-item mx-1"> 
            <a class="nav-link"  target="_blank" href="https://www.twitter.com/<?= $data_yayasan['twitter'] ?>">
              <i class="fa fa-twitter fa-fw fa-lg"></i>
            </a> 
          </li>
        </ul>
      </div>
    </div>
  </nav>