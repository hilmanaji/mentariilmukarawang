<?php 
    foreach ($data_fasilitas->result() as $_fasilitas) {
        $id_fasilitas = $_fasilitas->id_fasilitas;
        $nama_fasilitas = $_fasilitas->nama_fasilitas;
        $id_sekolah = $_fasilitas->id_sekolah;
    }
?>

        <div class="row">
            <div class="col-sm-12">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <a href="<?php echo base_url() ?>Fasilitas"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>
                                <h4 class="modal-title" id="myModalLabel">Edit Data Fasilitas</h4> </div>
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="<?php echo base_url() ?>Fasilitas/edit">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Fasilitas</label>
                                            <input type="hidden" class="form-control" name="id_fasilitas" value="<?php echo $id_fasilitas ?>" required> 
                                            <input type="text" class="form-control" name="nama_fasilitas" value="<?php echo $nama_fasilitas ?>" required> 
                                        </div>
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