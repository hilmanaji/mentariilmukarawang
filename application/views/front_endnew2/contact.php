
  <div class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="mx-auto text-center col-lg-6">
          <h1 class="mb-3">Hubungi Kami</h1>
          <p class="lead mb-4">Kami akan senang sekali jika teman-teman dapat berkirim pesan dengan kami</p>
        </div>
      </div>
      <div class="row">
        <div class="px-4 order-1 order-md-2 col-lg-12">
          <h3 class="mb-4">Kirimi kami pesan</h3>
          <form method="POST" action="<?= base_url('Home2/input_pesan_tamu') ?>">
            <div class="form-group"><input type="text" name="nama_tamu" class="form-control" id="form43" placeholder="Nama Lengkap"> </div>
            <div class="form-group"><input type="text" name="kontak" class="form-control" id="form44" placeholder="Kontak/No. Handphone"> </div>
            <div class="form-group"> <input type="email" name="email" class="form-control" id="form45" placeholder="Email"> </div>
            <div class="form-group"> <textarea class="form-control" name="pesan" id="form46" rows="3" placeholder="Tinggalkan Pesan atau Pertanyaan mu disini"></textarea> </div> <button type="submit" class="btn btn-primary">Kirim Pesan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 text-white" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(https://static.pingendo.com/cover-bubble-dark.svg);  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat;">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center align-self-center p-4">
          <p class="mb-5"> <strong><?= $data_yayasan['nama'] ?></strong> <br><?= $data_yayasan['alamat'] ?><br><?= $data_yayasan['email'] ?><br> <abbr title="Phone">P:</abbr> <?= $data_yayasan['kontak'] ?> </p>
          <div class="row">
            <div class="col-md-12 d-flex align-items-center justify-content-around"> 
              <a target="_blank" href="https://www.facebook.com/<?= $data_yayasan['fb'] ?>">
                <i class="d-block fa fa-facebook-official text-light fa-lg mx-2"></i>
              </a> 
              <a target="_blank" href="https://www.instagram.com/<?= $data_yayasan['instagram'] ?>">
                <i class="d-block fa fa-instagram text-light fa-lg mx-2"></i>
              </a> 
              <a target="_blank" href="https://www.youtube.com/channel/<?= $data_yayasan['youtube'] ?>">
                <i class="d-block fa fa-youtube text-light fa-lg mx-2"></i>
              </a> 
              <a target="_blank" href="https://www.twitter.com/<?= $data_yayasan['twitter'] ?>">
                <i class="d-block fa fa-twitter text-light fa-lg ml-2"></i>
              </a> </div>
          </div>
        </div>
        <div class="col-md-6 p-0"> <iframe width="100%" height="350" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.5443952248866!2d107.27318111533671!3d-6.323412395423739!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699d7636003fe5%3A0x64dec093541c0eff!2sSMA+IT+Mentari+Ilmu!5e0!3m2!1sid!2sid!4v1563720219010!5m2!1sid!2sid" scrolling="no" frameborder="0"></iframe></div>
      </div>
    </div>
  </div>