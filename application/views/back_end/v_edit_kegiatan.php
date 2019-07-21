<?php 
    foreach ($data_kegiatan->result() as $_kegiatan) {
        $id_kegiatan = $_kegiatan->id_kegiatan;
        $nama_kegiatan = $_kegiatan->nama_kegiatan;
        $deskripsi_kegiatan = $_kegiatan->deskripsi_kegiatan;
        $id_sekolah = $_kegiatan->id_sekolah;
    }
?>

        <div class="row">
            <div class="col-sm-12">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <a href="<?php echo base_url() ?>Kegiatan"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>
                                <h4 class="modal-title" id="myModalLabel">Edit Data Kegiatan</h4> </div>
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="<?php echo base_url() ?>Kegiatan/edit">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Kegiatan</label>
                                            <input type="hidden" class="form-control" name="id_kegiatan" value="<?php echo $id_kegiatan ?>" required> 
                                            <input type="text" class="form-control" name="nama_kegiatan" value="<?php echo $nama_kegiatan ?>" required> 
                                        </div>
                                        <div class="form-group">                                            
                                            <label for="exampleInputEmail1">Sekolah</label>
                                            <select class="form-control" name="id_sekolah">
                                    <?php                                     
                                    foreach ($data_sekolah->result() as $_sekolah) { ?>
                                                <option value="<?php echo $_sekolah->id_sekolah ?>" <?php if($_sekolah->id_sekolah == $id_sekolah){echo" selected";} ?>>Admin <?php echo $_sekolah->nama ?></option>
                                    <?php 
                                    } 
                                    ?> 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi_kegiatan" rows="7" required><?php echo $deskripsi_kegiatan ?></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Edit</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>