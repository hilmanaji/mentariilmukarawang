
  <div class="py-5">
    <div class="container">
      <div class="row">
      <?php
      foreach ($data_artikel_detail->result() as $row) :
            if ($row->value == "") {
                $gambar = base_url().'assets/front_end_new/images/img_bg_2.jpg';
            }
            else{
                $gambar = base_url().'assets/plugins/images/image/'.$row->value;
            } 
      ?>
        <div class="order-2 order-md-1 col-md-5"> <img data-toggle="modal" data-target="#myModal" class="img-fluid d-block" src="<?= $gambar ?>"> </div>
        <div class="px-md-5 d-flex flex-column justify-content-center col-md-7 order-1 order-md-2">
          <h1> <?= $row->judul_artikel ?>
            <br>
            <small style='font-size:15px;'><i class='fa fa-calendar'></i> <?= date('d M Y', strtotime($row->created_at)) ?> | <i class='fa fa-user'></i> posted by <?= $row->username ?></small>
          </h1>
          <p class="mb-3"><?= $row->isi ?></p>
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

  <?php 
     function limit_words($string, $word_limit){
        $words = explode(" ",$string);
        return implode(" ",array_splice($words,0,$word_limit));
    }
  ?>


<!-- ARTIKEL -->
  <div class="py-2">
    <div class="container">
        <div class="text-center mx-auto col-md-12">
          <h2 class="mb-3">Artikel Lainnya</h2>
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
    </div>
  </div>
<!-- ARTIKEL -->
