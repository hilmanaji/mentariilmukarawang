<?php 
    foreach ($data_ekskul->result() as $_ekskul) {
        $id_ekskul = $_ekskul->id_ekskul;
        $nama_ekskul = $_ekskul->nama_ekskul;
        $deskripsi_ekskul = $_ekskul->deskripsi_ekskul;
        $id_sekolah = $_ekskul->id_sekolah;
        $gambar_lama = $_ekskul->value;
    }
?>

       <?php echo $this->session->flashdata('msg'); ?>
            
                <div class="row">
                    <!-- Left sidebar -->
                    <div class="col-md-12">
                        <div class="white-box">
                                <a href="<?php echo base_url() ?>Ekskul"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>
                            <div class="row">
                                <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 mail_listing">
                                    <form enctype="multipart/form-data" action="<?php echo base_url() ?>Ekskul/edit" method="post" class="form-horizontal row-fluid">
                                        <h3 class="box-title">Edit Ekskul</h3>
                                     <?php 
                                     // Kondisi Admin Sekolah
                                     if($id_sekolah_sess != '0'){ ?>   
                                        <div class="form-group">
                                            <input class="form-control" name="id_sekolah" type="hidden" value="<?php echo $id_sekolah ?>"> 
                                        </div> 
                                     <?php 
                                     }
                                     // Kondisi Super Admin
                                     else{ ?>     
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

                                     <?php 
                                     } 
                                     ?>  
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Ekskul</label>
                                            <input class="form-control" name="id_ekskul" type="hidden" value="<?php echo $id_ekskul ?>"> 
                                            <input class="form-control" name="nama_ekskul"  value="<?php echo $nama_ekskul ?>"> 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Deskripsi Ekskul</label>
                                            <textarea class="textarea_editor form-control" name="deskripsi_ekskul" rows="15"  placeholder="Desripsi Disini ..."><?php echo $deskripsi_ekskul ?></textarea>
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