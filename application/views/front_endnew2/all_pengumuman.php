
  <?php 
     function limit_words($string, $word_limit){
        $words = explode(" ",$string);
        return implode(" ",array_splice($words,0,$word_limit));
    }
  ?>


<!-- Pengumuman -->
  <div class="py-5">
    <div class="container">
        <div class="text-center mx-auto col-md-12">
          <h2 class="mb-3">Pengumuman</h2>
        </div>
      <div class="row">
          <?php 
          $no=1;
        foreach ($data_pengumuman->result() as $row) : 
        $limited_string = '';
        $limited_string = subword($row->isi_pengumuman);
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
              <h4 class="card-title"><?= $row->judul ?></h4>
              <p class="card-text"><?= $limited_string ?></p> <a href="<?= base_url('Home2/detail_pengumuman/'.$row->id_pengumuman) ?>" class="btn btn-primary">Selengkapnya</a>
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
<!-- Pengumuman -->