
  <div class="py-3 text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h3 class="mb-3 mt-3">Sekolah Islam Terpadu Yayasan Mentari Ilmu</h3>
          <p>Yayasan Mentari Ilmu memiliki beberapa instansi pendidikan islam terpadu yang tersebar di wilayah Kab. Karawang, mulai dari SD, SMP, SMA hingga Perguruan Tinggi</p>
        </div>
      </div>
      <div class="row justify-content-center">
      <?php 
      foreach ($data_sekolah->result() as $row) : ?>  
        <div class="col-lg-6 col-12 p-2"> <i class="d-block fa fa-graduation-cap fa-3x mb-2 text-muted"></i>
          <h4> <a href="<?= base_url('Home2/mentariilmu/') ?><?= $row->id_sekolah ?>"><b><?= $row->nama ?></b> </a></h4>
          <ul class="list-group" >
            <li class="list-group-item text-left"><i class="fa fa-map text-dark mr-2"></i><?= $row->alamat ?></li>
            <li class="list-group-item text-left"><i class="fa fa-phone text-dark mr-2"></i><?= $row->kontak ?></li>
            <li class="list-group-item text-left"><i class="fa fa-envelope text-dark mr-2"></i><?= $row->email ?></li>
            <li class="list-group-item text-left"><a target="_blank" href="https://www.facebook.com/<?= $row->fb ?>"><i class="fa fa-facebook text-dark mr-2"></i><?= $row->fb ?></a></li>
            <li class="list-group-item text-left"><a target="_blank" href="https://www.instagram.com/<?= $row->instagram ?>"><i class="fa fa-instagram text-dark mr-2"></i><?= $row->instagram ?></a></li>
            <li class="list-group-item text-left"><i class="fa fa-youtube text-dark mr-2"></i><?= $row->youtube ?></li>
            <li class="list-group-item text-left"><i class="fa fa-twitter text-dark mr-2"></i><?= $row->twitter ?></li>
          </ul>
        </div>
      <?php 
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
    <div class="py-2">
    <div class="container">
      <div class="row">
        <div class="text-center mx-auto col-md-12">
          <h1 class="mb-3">Galeri</h1>
        </div>
      </div>
      <div class="row">

      <?php 
      $no = 1;
      foreach ($data_galeri->result() as $baris): ?>
        <div class="col-lg-3 col-md-6 p-3"> <img id='<?= $no ?>' data-toggle="modal" data-target="#myModal"  class="img-fluid d-block" src="<?= base_url(); ?>assets/plugins/images/image/<?= $baris->value ?>"> </div>        
      <?php 
      $no++;
      endforeach;
      ?>
      </div>
    </div>
  </div>