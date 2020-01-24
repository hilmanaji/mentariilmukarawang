  <div class="py-2">
    <div class="container">
      <div class="row">
        <div class="text-center mx-auto col-md-12">
          <h1 class="mb-3">Galeri</h1>
        </div>
      </div>
      <div class="row">

      <?php 
      $no=1;
      foreach ($data_galeri->result() as $baris): ?>
        <div class="col-lg-3 col-md-6 p-3"> <img id='<?= $no ?>' data-toggle="modal" data-target="#myModal" class="img-fluid d-block" src="<?= base_url(); ?>assets/plugins/images/image/<?= $baris->value ?>"> </div>        
      <?php 
      $no++;
      endforeach;
      ?>
      </div>
    </div>
  </div>