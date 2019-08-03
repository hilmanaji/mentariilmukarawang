<?php 
    foreach ($data_video->result() as $_video) {
        $id_video = $_video->id_video;
        $judul = $_video->judul;
        $deskripsi = $_video->deskripsi;
        $link = $_video->link;
        $id_sekolah = $_video->id_sekolah;
    }
?>

        <div class="row">
            <div class="col-sm-12">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <a href="<?php echo base_url() ?>Video"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>
                                <h4 class="modal-title" id="myModalLabel">Edit Data Video</h4> </div>
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="<?php echo base_url() ?>Video/edit">
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
                                            <input type="hidden" class="form-control" name="id_video" value="<?php echo $id_video ?>" required> 
                                            <input type="text" class="form-control" name="judul" value="<?php echo $judul ?>" required> 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" rows="3" required><?php echo $deskripsi ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Link</label>
                                            <textarea class="form-control" name="link" rows="2" required><?php echo $link ?></textarea>
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