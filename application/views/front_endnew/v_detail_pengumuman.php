	<div id="fh5co-about" style="margin-top:100px;">
		<div class="container">
			<?php
			foreach ($data_pengumuman_detail->result() as $row) :
            if ($row->value == "") {
                $gambar = base_url().'assets/front_end_new/images/img_bg_2.jpg';
            }
            else{
                $gambar = base_url().'assets/plugins/images/image/'.$row->value;
            } 
            ?>
			<div class="col-md-6 animate-box">
				<h2><?= $row->judul ?></h2>
				<p><?= $row->isi_pengumuman ?></p>
				<span>by <b><?= $row->username."</b>, ".date('d M Y', strtotime($row->created_at)) ?></span>
			</div>
			<div class="col-md-6">
				<img class="img-responsive" src="<?= $gambar ?>" alt="Free HTML5 Bootstrap Template">
			</div>
				
			<?php 
			endforeach;
			?>
		</div>
	</div>

	<div id="fh5co-blog">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Pengumuman Lainnya</h2>
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
						<p><a href="<?= base_url() ?>Home/detail_pengumuman/<?= $row->id_pengumuman ?>">Selengkapnya</a></p>
					</div>
				</div>	
				
			<?php 
			endforeach;
			?>
			</div>>
		<hr>
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
