
	<aside id="fh5co-hero">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url(<?= base_url(); ?>assets/plugins/images/PB329091920196_2.jpeg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1>SMA IT Mentari Ilmu</h1>
									<!-- <h2>Brought to you by <a href="http://freehtml5.co/" target="_blank"></a></h2> -->
									<p><a class="btn btn-primary btn-lg" href="<?= base_url() ?>Home/sekolah">Lihat!</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(<?= base_url(); ?>assets/plugins/images/PB329091920196_1.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1>SMP IT Mentari Ilmu</h1>
									<!-- <h2>Brought to you by <a href="http://freehtml5.co/" target="_blank"></a></h2> -->
									<p><a class="btn btn-primary btn-lg" href="<?= base_url() ?>Home/sekolah">Lihat!</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(<?= base_url(); ?>assets/plugins/images/PB329091921779_1.JPG);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1>SD IT Mentari Ilmu</h1>
									<!-- <h2>Brought to you by <a href="http://freehtml5.co/" target="_blank">freehtml5.co</a></h2> -->
									<p><a class="btn btn-primary btn-lg" href="<?= base_url() ?>Home/sekolah">Lihat!</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>		   	
		  	</ul>
	  	</div>
	</aside>

	<div id="fh5co-about">
		<div class="container">
			<div class="col-md-6 animate-box">
				<span>Yayasan Pendidikan Mentari Ilmu - Karawang</span>
				<h2>Selamat datang di Website Yayasan Mentari Ilmu</h2>
				<p>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat cauctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per Mauris in erat justo.</p>
				<p>Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed.</p>
				<p>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat cauctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per Mauris in erat justo.</p>
			</div>
			<div class="col-md-6">
				<img class="img-responsive" src="<?= base_url(); ?>assets/plugins/images/PB32909192924_1.JPG" alt="Free HTML5 Bootstrap Template">
			</div>
		</div>
	</div>

	<div id="fh5co-register" style="background-image: url(<?= base_url(); ?>assets/front_end_new/images/img_bg_2.jpg);">
		<div class="overlay"></div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2 animate-box">
				<div class="date-counter text-center">
					<h2>Visi</h2>
					<p><strong>Menjadi lembaga pendidikan terpadu yang mampu mewujudkan generasi berkualitas, berkapasitas global dan berkepribadian Islam. </strong></p>
					<h4 style="color:white">Misi</h4>
					<p>1. Mewujudkan generasi berkualitas yang cerdas, terampil, menguasai ilmu pengetahuan dan teknologi serta mampu menjadi agen-agen pembaharu</p>
					<p>2. Mewujudkan generasi berkapasitas global yang mandiri, kompetitif dan bertanggung jawab yang siap sebagai pemimpin masa depan</p>
					<p>3. Mewujudkan generasi berkepribadian Islam yang beraqidah salimah, berfikroh Islamiyah, beribadah sholihah dan berakhlakul karimah</p>
					<p>4. Mengembangkan hubungan sinergis dan kerjasama di antara masyarakat sekolah (sekolah, keluarga, pemerintah, dan lingkungan masyarakat).</p>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-blog">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Pengumuman &amp; Artikel</h2>
					<p></p>
				</div>
			</div>
			<div class="row">
			<?php 
             function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }
			foreach ($data_pengumuman->result() as $row) : 
            $limited_string = limit_words($row->isi_pengumuman, 20).' ...';?>	
				<div class="col-md-4 animate-box">
					<div class="fh5co-event">
						<div class="date text-center"><span><?= date('d', strtotime($row->created_at)) ?><br><?= date('M', strtotime($row->created_at)) ?>.</span></div>
						<h3><a href="#"><?= $row->judul ?></a></h3>
						<p><?= $limited_string ?></p>
						<p><a href="<?= base_url() ?>Home/detail_pengumuman/<?= $row->id_pengumuman ?>">Baca Selengkapnya</a></p>
					</div>
				</div>	
				
			<?php 
			endforeach;
			?>
			</div>
			<div class="row row-padded-mb">
				<div class="col-md-4 animate-box">					
				</div>
				<div class="col-md-4 animate-box" style="text-align:center">
					<a href="<?= base_url() ?>Home/all_pengumuman">== Selengkapnya Pengumuman ==</a>
				</div>				
				<div class="col-md-4 animate-box">					
				</div>
			</div>
			<hr style="margin-bottom: 50px;">
			<div class="row">
			<?php 
			foreach ($data_artikel->result() as $row) : 
            $limited_string = limit_words($row->isi, 20).' ...';
            if ($row->value == "") {
                $gambar = '<a href="#" class="blog-img-holder" style="background-image: url('.base_url().'assets/front_end_new/images/project-1.jpg);"></a>';
            }
            else{
                $gambar = '<a href="#" class="blog-img-holder" style="background-image: url('.base_url().'assets/plugins/images/image/'.$row->value.');"></a>';
            } 
            ?>
				<div class="col-lg-4 col-md-4">
					<div class="fh5co-blog animate-box">
						<?= $gambar; ?>
						<div class="blog-text">
							<h3><a href="#"><?= $row->judul_artikel ?></a></h3>
							<span class="posted_on"><?= date('d F Y', strtotime($row->created_at)) ?></span>
							<span class="comment"><a ><?= 'by '.$row->username ?><i class="icon-speech-bubble"></i></a></span>
							<p><?= $limited_string ?></p><a href="<?= base_url() ?>Home/detail_artikel/<?= $row->id_artikel ?>">Baca Selengkapnya</a>
						</div> 
					</div>
				</div>	
				
			<?php 
			endforeach;
			?>
			</div>
			<div class="row">
				<div class="col-md-4 animate-box">					
				</div>
				<div class="col-md-4 animate-box" style="text-align:center">
					<a href="<?= base_url() ?>Home/all_artikel">== Selengkapnya Artikel ==</a>
				</div>				
				<div class="col-md-4 animate-box">					
				</div>
			</div>
		</div>
	</div>
	<div id="fh5co-gallery" class="fh5co-bg-section">
		<div class="row text-center">
			<h2><span>Gallery</span></h2>
		</div>
		<div class="row">
			<?php 
			foreach ($data_galeri->result() as $baris) { ?>
			<div class="col-md-3 col-padded">
				<a href="#" class="gallery" style="background-image: url(<?= base_url(); ?>assets/plugins/images/image/<?= $baris->value ?>);"></a>
			</div>
			<?php 
			}
			?>
		</div>
	</div>
