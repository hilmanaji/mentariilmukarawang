<div id="fh5co-course-categories">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
                    <br><br><br><br>
					<h2>Sekolah Islam Terpadu Mentari Ilmu</h2>
					<p>Yayasan Mentari Ilmu memiliki beberapa instansi pendidikan islam terpadu yang tersebar di wilayah Kab. Karawang, mulai dari SD, SMP, SMA hingga Perguruan Tinggi</p>
				</div>
			</div>
			<div class="row">
			<?php 
			foreach ($data_sekolah->result() as $row) : ?>				
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-study"></i>
						</span>
						<div class="fh5co-contact-info">
							<h3><a href="<?= base_url(); ?>home/mentariilmu/<?= $row->id_sekolah ?>"><?= $row->nama ?></a></h3>
							<ul style="text-align: left">
								<li class="address"><?= $row->alamat ?></li>
								<li class="phone"><a href="tel://1234567920"><?= $row->kontak ?></a></li>
								<li class="email"><a href="mailto:<?= $row->email ?>"><?= $row->email ?></a></li>
								<li class="icon-facebook2"><a href="#"><?= $row->fb ?>-</a></li>
								<li class="icon-instagram"><a href="#"><?= $row->instagram ?>-</a></li>
								<li class="icon-twitter2"><a href="#"><?= $row->twitter ?>-</a></li>
								<li class="icon-youtube"><a href="#"><?= $row->youtube ?>-</a></li>
							</ul>
						</div>
					</div>
				</div>
				
			<?php 
			endforeach;
			?>
			</div>
		</div>
	</div>