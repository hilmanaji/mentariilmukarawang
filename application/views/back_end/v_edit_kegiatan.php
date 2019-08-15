<?php 
    foreach ($data_kegiatan->result() as $_kegiatan) {
        $id_kegiatan = $_kegiatan->id_kegiatan;
        $nama_kegiatan = $_kegiatan->nama_kegiatan;
        $deskripsi_kegiatan = $_kegiatan->deskripsi_kegiatan;
        $id_sekolah = $_kegiatan->id_sekolah;
    }
?>
            
                <div class="row">
                    <!-- Left sidebar -->
                    <div class="col-md-12">
                        <div class="white-box">
                                <a href="<?php echo base_url() ?>Artikel"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>
                            <div class="row">
                                <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 mail_listing">
                                    <form enctype="multipart/form-data" action="<?php echo base_url() ?>Kegiatan/edit" method="post" class="form-horizontal row-fluid">
                                        <h3 class="box-title">Edit Kegiatan</h3>
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
                                            <label for="exampleInputEmail1">Nama Kegiatan</label>
                                            <input class="form-control" name="id_kegiatan" type="hidden" value="<?php echo $id_kegiatan ?>"> 
                                            <input class="form-control" name="nama_kegiatan"  value="<?php echo $nama_kegiatan ?>"> 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Isi</label>
                                            <textarea class="textarea_editor form-control" name="deskripsi_kegiatan" rows="10"  placeholder="Isi Artikel Disini ..."><?php echo $deskripsi_kegiatan ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</button>
                                            
                                        </div>                                        
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>