<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('<?= base_url(); ?>assets/front_end/img/sekolah.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>First Slide</h3>
            <p>This is a description for the first slide.</p>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('<?= base_url(); ?>assets/front_end/img/sekolahw.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Second Slide</h3>
            <p>This is a description for the second slide.</p>
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('<?= base_url(); ?>assets/front_end/img/header-bg.png')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Third Slide</h3>
            <p>This is a description for the third slide.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

<div class="container">
    <!-- Artikel Section -->
    <center>
        <h2 class="my-4">Selamat datang di Yayasan Mentari Ilmu Karawang</h2>
        <h3 class="mb-5">Artikel Terbaru</h2>
    </center>
    <div class="row">
        <div class="col-lg-12">
            <?php 
             function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }
            $no = 1;
            foreach($data_artikel->result() as $row) :
            $limited_string = limit_words($row->isi, 20).' ...';
            if ($row->value == "") {
                $gambar = '<img class="card-img-top" style="display:block" src="http://placehold.it/700x400" alt="">';
            }
            else{
                $gambar = "<img class='card-img-top' style='display:block' src='".base_url()."assets/plugins/images/image/".$row->value."' style='max-width:60%;max-height:60%;'>";
            } 
            if($no == 1){ ?>
            <div class="row">
            <?php } 
            else{

            }
            ?>
                <div class="col-lg-4 col-sm-12 portfolio-item">
                    <div class="card h-100">
                    <a href="#"><?= $gambar ?></a>
                    <div class="card-body">
                        <h4 class="card-title">
                        <a href="#"><?= $row->judul_artikel ?></a>
                        </h4>
                        <h7 class="card-subtitle mb-2 text-muted"><?= date('d F Y', strtotime($row->created_at)).' by '.$row->username ?></h7>
                        <p class="card-text text-justify"><?= $limited_string ?></p>
                    </div>
                    </div>
                </div>    
            
            <?php if($no == 3){ 
                $no = 0;?>
            </div>
            <?php 
            } 

            ?>

            <?php 
            $no++;
            endforeach;  
            ?>
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Alamat Yayasan dan sekolah -->
    <center>    
        <h2 class="mt-4 mb-3">
        Our Location
        </h2>
    </center>
        <!-- Content Row -->
        <div class="row">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4">
            <!-- Embedded Google Map -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.5443952248866!2d107.27318111533671!3d-6.323412395423739!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699d7636003fe5%3A0x64dec093541c0eff!2sSMA+IT+Mentari+Ilmu!5e0!3m2!1sid!2sid!4v1563720219010!5m2!1sid!2sid" width="700" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></iframe>
        </div>
        <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4">
            <h3>Contact Details</h3>
            <p>
            Jl. Perum Karaba Indah 1 Kampung Pintu Air Wadas
            <br>Beverly Hills, CA 90210
            <br>
            </p>
            <p>
            <abbr title="Phone">Phone</abbr>: (0267) 840-3334
            </p>
            <p>
            <abbr title="Email">E-mail</abbr>:
            <a href="mailto:name@example.com">smait.mentariilmu@gmail.com
            </a>
            </p>
        </div>
        </div>
        <!-- /.row -->
</div>
<!-- /.container -->
