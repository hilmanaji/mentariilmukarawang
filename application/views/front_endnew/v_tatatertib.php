
<div id="fh5co-blog" style="margin-top:90px">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>TATA TERTIB SEKOLAH</h2>
				</div>
			</div>
			<?php
			foreach ($data_tatatertib->result() as $row) :  ?>
			<h4><?= $row->isi_tata_tertib; ?></h4>
			<?php 
			endforeach;
			?>
		</div>
	</div>
</div>
