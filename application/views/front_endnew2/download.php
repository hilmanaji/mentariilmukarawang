
  <div class="py-4">
    <div class="container">
      <h2 class="text-center">File <small class="text-muted">Download</small></h2>
      <div class="row">

      <?php
      $no =1; 
      foreach ($data_file->result() as $row) :  ?>
        <div class="col-lg-4 p-3 col-md-6">
          <div class="card">
            <div class="card-body p-4">
              <h2> <b><?= $row->keterangan ?></b> </h2>
              <small style='font-size:15px;'><i class='fa fa-calendar'></i> <?= date('d M Y', strtotime($row->created_at)) ?> | <i class='fa fa-user'></i> posted by <?= $row->username ?></small>
              <p class="mb-0"><br> <a href="<?= base_url() ?>Home/file/<?= $row->id_file ?>/<?= $row->downloaded ?>">Download</a> </p>
            </div>
          </div>
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