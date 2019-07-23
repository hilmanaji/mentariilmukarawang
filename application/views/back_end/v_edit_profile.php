<?php 
    foreach ($data_profile->result() as $_profile) {
        $id_profil = $_profile->id_profil;
        $id_sekolah = $_profile->id_sekolah;
        $visi = $_profile->visi;
        $misi = $_profile->misi;
        $motto = $_profile->motto;
        $selayang_pandang = $_profile->selayang_pandang;
    }
?>

        <div class="row">
            <div class="col-sm-12">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <a href="<?php echo base_url() ?>Fasilitas"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>
                                <h4 class="modal-title" id="myModalLabel">Edit Data Profile</h4> </div>
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="<?php echo base_url() ?>Profile/edit">
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
                                            <label for="exampleInputEmail1">Visi</label>
                                            <input type="hidden" class="form-control" name="id_profil" value="<?php echo $id_profil ?>" required> 
                                            <input type="text" class="form-control" name="visi" value="<?= $visi ?>" required> 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Misi</label> 
                                            <input type="text" class="form-control" name="misi" value="<?= $misi ?>" required> 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Motto</label> 
                                            <input type="text" class="form-control" name="motto" value="<?= $motto ?>" required> 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Selayang Pandang</label> 
                                            <input type="text" class="form-control" name="selayang_pandang" value="<?= $selayang_pandang ?>" required> 
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