	<div id="fh5co-blog" style="margin-top:100px;">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Artikel</h2>
				</div>
			</div>
			<div class="row">
			<?php 
             function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }
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
							<p><?= $limited_string ?></p><a href="#">Baca Selengkapnya</a>
						</div> 
					</div>
				</div>	
				
			<?php 
			endforeach;
			?>
			</div>
		</div>
	</div>
	<div id="fh5co-gallery" class="fh5co-bg-section">
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
	</div>
