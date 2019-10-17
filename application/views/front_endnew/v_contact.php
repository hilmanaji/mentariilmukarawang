<aside id="fh5co-hero">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url(<?= base_url(); ?>assets/front_end_new/images/img_bg_4.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1 class="heading-section">Kontak Kami</h1>
									<h2><a href="<?= base_url() ?>Home"><?= $data_yayasan['nama'] ?></a></h2>
                                    <h2><?= $data_yayasan['alamat'] ?> Karawang</h2>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
</aside>


	<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-md-push-1 animate-box">
					
					<div class="fh5co-contact-info">
						<h3>Hubungi Kami</h3>
						<ul>
							<li class="address"><?= $data_yayasan['alamat'] ?><br> Karawang Indonesia</li>
							<li class="phone"><a href="#"><?= $data_yayasan['kontak'] ?></a></li>
							<li class="email"><a href="#"><?= $data_yayasan['email'] ?></a></li>
							<li class="url"><a target="_blank" href="http://>mentariilmu.sch.id">mentariilmu.sch.id</a></li>
						</ul>
					</div>

				</div>
				<div class="col-md-6 animate-box">
					<h3>Kirimi Kami Pesan</h3>
					<form action="<?= base_url() ?>Home/input_pesan_tamu" method="POST">
						<div class="row form-group">
							<div class="col-md-6">
								<!-- <label for="fname">First Name</label> -->
								<input type="text" name="nama_tamu" class="form-control" placeholder="Nama Lengkap">
							</div>
							<div class="col-md-6">
								<!-- <label for="lname">Last Name</label> -->
								<input type="text" onkeypress='return isNumberKey(event)' maxlength="13" name="kontak" class="form-control" placeholder="Kontak / No. Handphone">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input type="text" name="email" class="form-control" placeholder="Email">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="message">Message</label> -->
								<textarea name="pesan" cols="30" rows="6" class="form-control" placeholder="Tinggalkan Pesan atau Pertanyaan mu disini"></textarea>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" value="Kirim Pesan" class="btn btn-primary">
						</div>

					</form>		
				</div>
			</div>
			
		</div>
	</div>
<div class="responsive-map">
					            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.5443952248866!2d107.27318111533671!3d-6.323412395423739!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699d7636003fe5%3A0x64dec093541c0eff!2sSMA+IT+Mentari+Ilmu!5e0!3m2!1sid!2sid!4v1563720219010!5m2!1sid!2sid" width="700" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>		
</div>



<script type="application/javascript">
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
</script>

