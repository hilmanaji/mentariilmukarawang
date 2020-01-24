<?php 
 function limit_words($string, $word_limit){
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
}


    $ci =& get_instance();
    $ci->load->model('DataHandle');
    $data_yayasan = $ci->DataHandle->getAllWhere('tbl_yayasan', '*', "status = '1'")->row_array();
?>
  <div class="">
    <div class="" style="">
      <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
          <?php           
          $no=0;
          foreach ($data_pengumuman->result() as $row) : 
          ?>
          <li data-target="#carouselExampleIndicators" data-slide-to="<?= $no ?>" class="<?php if($no==0){echo" active";} ?>"> </li>

          <?php
          $no++;
          endforeach;
          ?>
        </ol>
        <div class="carousel-inner">
          <?php           
          $no=0;
          foreach ($data_pengumuman->result() as $row) : 
                $limited_string = limit_words($row->isi_pengumuman, 20).' ...';?>
          <div class="carousel-item <?php if($no==0){echo" active";} ?>"> <img class="d-block img-fluid w-100" src="<?= base_url(); ?>assets/plugins/images/image/<?= $row->value ?>">
            <div class="carousel-caption">
              <h4 class="m-0 text-light" style="background-color: black;opacity: 0.65;filter: alpha(opacity=65);"><?= $row->judul ?></h4>
              <br>
              <p><a href="<?= base_url('Home2/detail_pengumuman/'.$row->id_pengumuman) ?>" class="btn btn-primary">Lihat</a></p>
            </div>
          </div>
          <?php 
          $no++;
          endforeach;
          ?>   
        </div>
      </div>
    </div>
  </div>
  <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="px-lg-5 d-flex flex-column justify-content-center col-lg-7">
          <h1><?= $data_yayasan['nama'] ?></h1>
          <p class="mb-3" style="text-align: justify;"><?= $data_yayasan['selayang_pandang'] ?></p>
        </div>
        <div class="col-lg-5"> <img class="img-fluid d-block" src="https://static.pingendo.com/cover-moon.svg"> </div>
      </div>
    </div>
  </div>
  <div class="py-2">
    <div class="container">
      <hr>
    </div>
  </div>
  <div class="py-2 text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="mb-3">Visi</h1>
          <p>Menjadi lembaga pendidikan terpadu yang mampu mewujudkan generasi berkualitas, berkapasitas global dan berkepribadian Islam. </p>
          <h1 class="mb-3">Misi</h1>
          <p>1. Mewujudkan generasi berkualitas yang cerdas, terampil, menguasai ilmu pengetahuan dan teknologi serta mampu menjadi agen-agen pembaharu</p>
          <p>2. Mewujudkan generasi berkapasitas global yang mandiri, kompetitif dan bertanggung jawab yang siap sebagai pemimpin masa depan</p>
          <p>3. Mewujudkan generasi berkepribadian Islam yang beraqidah salimah, berfikroh Islamiyah, beribadah sholihah dan berakhlakul karimah</p>
          <p>4. Mengembangkan hubungan sinergis dan kerjasama di antara masyarakat sekolah (sekolah, keluarga, pemerintah, dan lingkungan masyarakat).</p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-2">
    <div class="container">
      <hr>
    </div>
  </div>
  
<!-- ARTIKEL -->
  <div class="py-2">
    <div class="container">
        <div class="text-center mx-auto col-md-12">
          <h1 class="mb-3">Artikel</h1>
        </div>
      <div class="row">
          <?php 
          $no=1;
        foreach ($data_artikel->result() as $row) : 
        $limited_string = '';
        $limited_string = subword($row->isi);
        if ($row->value == "") {
            $gambar = base_url().'assets/front_end_new/images/project-1.jpg';
        }
        else{
            $gambar = base_url().'assets/plugins/images/image/'.$row->value;
        } 
        ?>
        <div class="col-md-4 mb-3">
          <div class="card"> <img class="card-img-top" src="<?= $gambar ?>" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title"><?= $row->judul_artikel ?></h4>
              <p class="card-text"><?= $limited_string ?></p> <a href="<?= base_url('Home2/detail_artikel/'.$row->id_artikel) ?>" class="btn btn-primary">Selengkapnya</a>
            </div>
          </div>
        </div>

      <?php 
      $no++;
      endforeach;
      ?>      
      </div>
    </div>
  </div>
  <div class="py-2">
    <div class="container">
      <hr>
    </div>
  </div>
<!-- ARTIKEL -->


<!-- GALERI -->
  
  <?php include 'galeri.php'; ?>

<!-- GALERI -->