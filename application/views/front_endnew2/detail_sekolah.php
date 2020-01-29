
  <div class="py-2">
    <div class="container">
      <div class="row">
        <?php foreach ($data_sekolah->result() as $sekolah) : ?>
        <div class="px-md-5 p-3 col-lg-6 d-flex flex-column align-items-start justify-content-center">
          <h5 class="text-muted">Yayasan Pendidikan - Mentari Ilmu Karawang</h5>
          <h2><?= $sekolah->nama ?></h2>
        <?php 
        endforeach;
        foreach ($data_profile->result() as $profile) :
        ?>
          <p class="mb-3"><?= $profile->selayang_pandang ?></p>
        <?php
        endforeach;
        ?>        
        </div>
        <div class="col-lg-6"> 
        <?php 
        foreach ($galeri_one->result() as $baris): ?>
          <img class="img-fluid d-block mt-4" src="<?= base_url(); ?>assets/plugins/images/image/<?= $baris->value ?>"> 
        <?php
        ;endforeach
        ?>
        </div>
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
          <?php foreach ($data_profile->result() as $profile) : ?>
          <h2 class="mb-3">Visi</h2>
          <p><?= $profile->visi ?></p>
          <h2 class="mb-3">Misi</h2>
          <p><?= $profile->misi ?></p>
        <?php
        ;endforeach
        ?>
        </div>
      </div>
    </div>
  </div>



    <?php 
    $no = 1;
    if($data_ekskul->num_rows() > 0):
    ?>
        <div class="py-2">
          <div class="container">
            <hr>
          </div>
        </div>
        <div class="py-2">
          <div class="container">
            <div class="row">
              <div class="text-center mx-auto col-md-12">
                <h2 class="mb-3">Kegiatan Ekskul</h2>
              </div>
              <?php foreach ($data_ekskul->result() as $ekskul) : 
                if($ekskul->value == '' || $ekskul->value == null):
                  $gambar = base_url().'assets/front_end_new/images/project-3.jpg';
                else:
                  $gambar = base_url().'assets/plugins/images/image/'.$ekskul->value;
                endif;
                ?>
              <div class="col-md-3 mb-4">
                <div class="card"> <img class="card-img-top" id='<?= $no ?>' data-toggle="modal" data-target="#myModal"  src="<?= $gambar ?>" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title"><?= $ekskul->nama_ekskul ?></h4>
                    <p class="card-text"><?= $ekskul->deskripsi_ekskul ?></p> 
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                  </div>
                </div>
              </div>
            <?php $no++; endforeach; ?>
            </div>
          </div>
        </div>
    <?php
    endif;
    ?>

    <?php 
    if($data_fasilitas->num_rows() > 0):
    ?>
        <div class="py-2">
          <div class="container">
            <hr>
          </div>
        </div>
        <div class="py-2">
          <div class="container">
            <div class="row">
              <div class="text-center mx-auto col-md-12">
                <h2 class="mb-3">Fasilitas Pendidikan</h2>
              </div>
              <?php 
              foreach ($data_fasilitas->result() as $fasilitas) : 
                if($fasilitas->value == '' || $fasilitas->value == null):
                  $gambar = base_url().'assets/front_end_new/images/project-3.jpg';
                else:
                  $gambar = base_url().'assets/plugins/images/image/'.$fasilitas->value;
                endif;
                ?>
              <div class="col-lg-3 col-md-6 p-3"> <img  id='<?= $no ?>' data-toggle="modal" data-target="#myModal"  class="img-fluid d-block" src="<?= $gambar ?>">
                <h6 class="text-center mt-1"><?= $fasilitas->nama_fasilitas ?></h6>
              </div>
              <?php 
              $no++;
              endforeach;
              ?>
            </div>
          </div>
        </div>
    <?php
    endif;
    ?>

    <?php 
    if($data_kegiatan->num_rows() > 0):
    ?>
        <div class="py-2">
          <div class="container">
            <hr>
          </div>
        </div>
        <div class="py-2">
          <div class="container">
            <div class="row">
              <div class="text-center mx-auto col-md-12">
                <h2 class="mb-3">Program Kegiatan Sekolah</h2>
              </div>
              <?php foreach ($data_kegiatan->result() as $kegiatan) : ?>
                <div class="col-lg-3 col-6 mb-4">
                  <h4> <b><?= $kegiatan->nama_kegiatan ?></b> </h4>
                  <?= $kegiatan->deskripsi_kegiatan ?>
                </div>
            <?php endforeach; ?>
            </div>
          </div>
        </div>
    <?php
    endif;
    ?>


  
    <div class="py-2">
      <div class="container">
        <hr>
      </div>
    </div>
   <div class="py-2">
    <div class="container">
      <div class="row">
        <div class="text-center mx-auto col-md-12">
          <h2 class="mb-3">Galeri</h2>
        </div>
      </div>
      <div class="row">

      <?php 
      $no++;
      foreach ($data_galeri->result() as $baris): ?>
        <div class="col-lg-3 col-md-6 p-3"> <img id='<?= $no ?>' data-toggle="modal" data-target="#myModal" class="img-fluid d-block" src="<?= base_url(); ?>assets/plugins/images/image/<?= $baris->value ?>"> </div>       
      <?php 
      $no++;
      endforeach;
      ?>
      </div>
    </div>
  </div>

    <?php 
    if($data_artikel->num_rows() > 0):
    ?>
      <div class="py-2">
        <div class="container">
          <hr>
        </div>
      </div>
      <div class="py-2">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Artikel</h2>
            </div>
            <?php 
            foreach ($data_artikel->result() as $row) : 
            $limited_string = subword($row->isi);
            if ($row->value == "") {
                $gambar = base_url().'assets/front_end_new/images/project-1.jpg';
            }
            else{
                $gambar = base_url().'assets/plugins/images/image/'.$row->value;
            } 
            ?>
            <div class="col-md-4 py-2">
              <div class="card"> <img class="card-img-top" src="<?= $gambar ?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?= $row->judul_artikel ?></h5>
                  <p class="card-text"><?= $limited_string ?></p> <a href="<?= base_url('Home2/detail_artikel/'.$row->id_artikel) ?>" class="btn btn-primary">Selengkapnya</a>
                </div>
              </div>
            </div>                      
            <?php 
            endforeach;
            ?>
            <div class="col-md-12 py-2">
              <center>
                  <a class="btn btn-link" href="<?= base_url('Home2/all_artikel') ?>"><h4 class="card-title">Lihat Lainnya</h4></a>
              </center>
            </div>
          </div>
        </div>
      </div>
    <?php
    endif;
    ?>


    <?php 
    if($data_pengumuman->num_rows() > 0):
    ?>
      <div class="py-2">
        <div class="container">
          <hr>
        </div>
      </div>
      <div class="py-2">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="text-center">Pengumuman</h2>
            </div>
            <?php 
            foreach ($data_pengumuman->result() as $row) : 
            $limited_string = subword($row->isi_pengumuman);
            if ($row->value == "") {
                $gambar = base_url().'assets/front_end_new/images/project-1.jpg';
            }
            else{
                $gambar = base_url().'assets/plugins/images/image/'.$row->value;
            } 
            ?>
            <div class="col-md-4 py-2">
              <div class="card"> <img class="card-img-top" src="<?= $gambar ?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?= $row->judul ?></h5>
                  <p class="card-text"><?= $limited_string ?></p> <a href="<?= base_url('Home2/detail_pengumuman/'.$row->id_pengumuman) ?>" class="btn btn-primary">Selengkapnya</a>
                </div>
              </div>
            </div>                      
            <?php 
            endforeach;
            ?>
            <div class="col-md-12 py-2">
              <center>
                  <a class="btn btn-link" href="<?= base_url('Home2/all_pengumuman') ?>"><h4 class="card-title">Lihat Lainnya</h4></a>
              </center>
            </div>
          </div>
        </div>
      </div>
    <?php
    endif;
    ?>


    <?php 
    if($data_video->num_rows() > 0):
    ?>
        <div class="py-2">
          <div class="container">
            <hr>
          </div>
        </div>
        <div class="py-2">
          <div class="container">
            <div class="row">
              <div class="text-center mx-auto col-md-12">
                <h2 class="mb-3">Video</h2>
              </div>
              <?php foreach ($data_video->result() as $baris) : ?>
              <div class="col-md-6 mb-3">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe src="https://www.youtube.com/embed/<?= $baris->link ?>" allowfullscreen="" class="embed-responsive-item"></iframe>
                </div>
              </div>
              <?php 
              endforeach;
              ?>
            </div>
          </div>
        </div>
    <?php
    endif;
    ?>

  <div class="py-2">
    <div class="container">
      <hr>
    </div>
  </div>
  <div class="py-2">
    <div class="container">
      <div class="text-center mx-auto col-md-8">
        <h2 class="mb-3">Lokasi</h2>
      </div>

      <div class="row">
        <div class="col-md-12">
    <?php foreach ($data_sekolah->result() as $sekolah) : ?>
    <?php
    if ($sekolah->nama == "SMA IT Mentari Ilmu Karawang") {
    echo '
    <!-- SMA -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.5443952248866!2d107.27318111533671!3d-6.323412395423739!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699d7636003fe5%3A0x64dec093541c0eff!2sSMA+IT+Mentari+Ilmu!5e0!3m2!1sid!2sid!4v1563720219010!5m2!1sid!2sid" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>'; 
    } 
    
    elseif ($sekolah->nama == "SMP IT Mentari Ilmu") {
    echo '
    <!-- SMP -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7038225515344!2d107.3055274153706!3d-6.302591563438091!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6977e9f6f22701%3A0x26f4cef2bc9fa3d3!2sSMP+IT+Mentari+Ilmu!5e0!3m2!1sid!2sid!4v1565983388704!5m2!1sid!2sid" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>'; }

    elseif ($sekolah->nama == "SD IT Mentari Ilmu Karaba") {
    echo '
    <!--SD karaba -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.544877889294!2d107.27305941537077!3d-6.323349463637015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699d764bbe965b%3A0xab07b1c045abaec0!2sSDIT+Mentari+Ilmu!5e0!3m2!1sen!2sid!4v1566016114808!5m2!1sen!2sid" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>'; }

    elseif ($sekolah->nama == "SD IT Mentari Ilmu Jatisari") {
    echo '
    <!-- SD Jatisari -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.2092739313366!2d107.5243655153709!3d-6.366957364057169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e696dd2afc973d1%3A0x645b899e2da23472!2sMentari+Ilmu+Elementary+School!5e0!3m2!1sen!2sid!4v1566016041976!5m2!1sen!2sid" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>'; } ?>
    <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>