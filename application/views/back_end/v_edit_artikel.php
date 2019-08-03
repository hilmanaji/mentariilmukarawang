<?php 
    foreach ($data_artikel->result() as $_artikel) {
        $id_artikel = $_artikel->id_artikel;
        $judul_artikel = $_artikel->judul_artikel;
        $isi = $_artikel->isi;
        $id_sekolah = $_artikel->id_sekolah;
        $gambar_lama = $_artikel->value;
    }
?>

       <?php echo $this->session->flashdata('msg'); ?>
            
                <div class="row">
                    <!-- Left sidebar -->
                    <div class="col-md-12">
                        <div class="white-box">
                                <a href="<?php echo base_url() ?>Artikel"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>
                            <div class="row">
                                <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 mail_listing">
                                    <form enctype="multipart/form-data" action="<?php echo base_url() ?>Artikel/edit" method="post" class="form-horizontal row-fluid">
                                        <h3 class="box-title">Edit Artikel</h3>
                                        <div class="form-group">                                            
                                            <label for="exampleInputEmail1">Sekolah</label>
                                            <select class="form-control" name="id_sekolah">
                                    <?php                                     
                                    foreach ($data_sekolah->result() as $_sekolah) { ?>
                                                <option value="<?php echo $_sekolah->id_sekolah ?>" <?php if($_sekolah->id_sekolah == $id_sekolah){echo" selected";} ?>><?php echo $_sekolah->nama ?></option>
                                    <?php 
                                    } 
                                    ?> 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Judul</label>
                                            <input class="form-control" name="id_artikel" type="hidden" value="<?php echo $id_artikel ?>"> 
                                            <input class="form-control" name="judul_artikel"  value="<?php echo $judul_artikel ?>"> 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Isi</label>
                                            <textarea class="textarea_editor form-control" name="isi" rows="15"  placeholder="Isi Artikel Disini ..."><?php echo $isi ?></textarea>
                                        </div>
                                        <div class="form-group">                     
                                            <label for="exampleInputEmail1">Gambar</label>
                                            <div class="fallback">
                                            <input class="form-control" name="gambar_lama" type="hidden" value="<?php echo $gambar_lama ?>"> 
                                                <input name="userfile" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*"/> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Simpan</button>
                                            
                                        </div>                                        
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>