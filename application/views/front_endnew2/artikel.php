

  <div class="py-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center">Heading 1</h1>
        </div>
          <?php 
        foreach ($data_artikel->result() as $row) : 
        $limited_string = limit_words($row->isi, 20).' ...';
        if ($row->value == "") {
            $gambar = base_url().'assets/front_end_new/images/project-1.jpg';
        }
        else{
            $gambar = base_url().'assets/plugins/images/image/'.$row->value;
        } 
        ?>
        <div class="col-md-4">
          <div class="card"> <img class="card-img-top" src="<?= $gambar ?>" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title"><?= $row->judul_artikel ?></h4>
              <p class="card-text"><?= $limited_string ?></p> <a href="#" class="btn btn-primary">Selengkapnya</a>
            </div>
          </div>
        </div>

      <?php 
      endforeach;
      ?>
      <div class="row">        
        <div class="col-md-12 py-3">
          <center>
              <a class="btn btn-link" href="#"><h4 class="card-title">Link</h4></a>
          </center>
        </div>
      </div>
      </div>
    </div>
  </div>
  <div class="py-2">
    <div class="container">
      <hr>
    </div>
  </div>