	<br><br><br>
    <div id="fh5co-about">
		<div class="container">
			<div class="col-md-6 animate-box">
				<span>Yayasan Mentari Ilmu - Karawang</span>
				<h2>Selamat datang di Website SMA IT Mentari Ilmu</h2>
                <?php foreach ($data_profile->result() as $profile) : ?>
				<p><?= $profile->selayang_pandang ?></p>
                <?php endforeach; ?>
			</div>
			<div class="col-md-6">
				<img class="img-responsive" src="<?= base_url(); ?>assets/front_end_new/images/img_bg_2.jpg" alt="Free HTML5 Bootstrap Template">
			</div>
		</div>
	</div>

     <!-- Start Visi misi -->
	<div id="fh5co-register" style="background-image: url(<?= base_url(); ?>assets/front_end_new/images/img_bg_2.jpg);">
		<div class="overlay"></div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2 animate-box">
				<div class="date-counter text-center">
					<h2>Visi</h2>
                    <?php foreach ($data_profile->result() as $profile) : ?>
					<p><strong><?= $profile->visi ?></strong></p>
					<h2>Misi</h2>
					<p><?= $profile->misi ?></p>
                    <?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>  <!-- End Visi Misi -->

	<div id="fh5co-blog">
		<div class="container">
            <div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Artikel &amp; Berita</h2>
					<p></p>
				</div>
			</div>

            
			<hr style="margin-bottom: 50px;">
            <!-- Artikel  -->
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
                                <p><?= $limited_string ?></p><a href="#">read more.</a>
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
					<a href="#">== Selengkapnya Artikel ==</a>
				</div>				
				<div class="col-md-4 animate-box">					
				</div>
			</div>

            <hr style="margin-bottom: 50px;">
            
            <!-- Pengumuman  -->
            <div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Pengumuman</h2>
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
                            <p><a href="#">Read More</a></p>
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
					<a href="#">== Selengkapnya Pengumuman ==</a>
				</div>				
				<div class="col-md-4 animate-box">					
				</div>
			</div>
		</div>  <!-- end contaner  -->
	</div>
	<div id="fh5co-gallery" class="fh5co-bg-section">  <!-- Start Galery -->
		<div class="row text-center">
			<h2><span>Gallery</span></h2>
		</div>
		<div class="row">
			<div class="col-md-3 col-padded">
				<a href="#" class="gallery" style="background-image: url(<?= base_url(); ?>assets/front_end_new/images/project-5.jpg);"></a>
			</div>
			<div class="col-md-3 col-padded">
				<a href="#" class="gallery" style="background-image: url(<?= base_url(); ?>assets/front_end_new/images/project-2.jpg);"></a>
			</div>
			<div class="col-md-3 col-padded">
				<a href="#" class="gallery" style="background-image: url(<?= base_url(); ?>assets/front_end_new/images/project-3.jpg);"></a>
			</div>
			<div class="col-md-3 col-padded">
				<a href="#" class="gallery" style="background-image: url(<?= base_url(); ?>assets/front_end_new/images/project-4.jpg);"></a>
			</div>
		</div>
	</div>  <!-- End Galery -->

    <div id="fh5co-course"> <!-- Start Kegiatan -->
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>Program Kegiatan Sekolah</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
                <?php foreach ($data_kegiatan->result() as $kegiatan) : ?>
                    <div class="col-md-6 animate-box">
                        <div class="course">
                            <a href="#" class="course-img" style="background-image: url(<?= base_url(); ?>assets/front_end_new/images/project-1.jpg);">
                            </a>
                            <div class="desc">
                                <h3><a href="#"><?= $kegiatan->nama_kegiatan ?></a></h3>
                                <p><?= $kegiatan->deskripsi_kegiatan ?></p>
                                <span><a href="#" class="btn btn-primary btn-sm btn-course">IKUT !</a></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
				
			</div> <!-- End Row Kegiatan -->
		</div>
	</div> <!-- End Kegiatan -->

    <div id="fh5co-course-categories">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>Kegiaatan Ekstrakulikuler</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-shop"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Business</a></h3>
							<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-heart4"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Health &amp; Psychology</a></h3>
							<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-banknote"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Accounting</a></h3>
							<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-lab2"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Science &amp; Technology</a></h3>
							<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-photo"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Art &amp; Media</a></h3>
							<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-home-outline"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Real Estate</a></h3>
							<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-bubble3"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Language</a></h3>
							<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-world"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Web &amp; Programming</a></h3>
							<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <div class="responsive-map">
	    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.5443952248866!2d107.27318111533671!3d-6.323412395423739!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699d7636003fe5%3A0x64dec093541c0eff!2sSMA+IT+Mentari+Ilmu!5e0!3m2!1sid!2sid!4v1563720219010!5m2!1sid!2sid" width="700" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>		
    </div>