
<div id="fh5co-blog" style="margin-top:90px">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Frequently Asked Question (FAQ)</h2>
				</div>
			</div>
			<?php
			$no =1; 
			foreach ($data_faq->result() as $row) :  ?>
			<h4><?= $no++; ?>)&nbsp;&nbsp;&nbsp;&nbsp;Q : <?= $row->pertanyaan ?></h4>
			<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A : <?= $row->jawaban ?></h4>
			<?php 
			endforeach;
			?>
		</div>
	</div>
</div>

<div id="fh5co-blog">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Pengumuman &amp; Artikel</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
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