<?php 
    foreach ($data_artikel->result() as $_artikel) {
        $id_artikel = $_artikel->id_artikel;
        $judul_artikel = $_artikel->judul_artikel;
        $isi = $_artikel->isi;
        $id_sekolah = $_artikel->id_sekolah;
    }
?>

        <div class="row">
            <div class="col-sm-12">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <a href="<?php echo base_url() ?>Kegiatan"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>
                                <h4 class="modal-title" id="myModalLabel">Edit Artikel</h4> </div>
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="<?php echo base_url() ?>Artikel/edit">
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
                                            <label for="exampleInputEmail1">Judul Artikel</label>
                                            <input type="hidden" class="form-control" name="id_artikel" value="<?php echo $id_artikel ?>" required> 
                                            <input type="text" class="form-control" name="judul_artikel" value="<?php echo $judul_artikel ?>" required> 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Isi Artikel</label>
                                            <textarea class="form-control" name="isi" rows="7" required><?php echo $isi ?></textarea>
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