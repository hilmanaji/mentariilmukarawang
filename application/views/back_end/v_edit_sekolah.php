<?php 
    foreach ($data_sekolah->result() as $_sekolah) {
        $id_sekolah = $_sekolah->id_sekolah;
        $nama = $_sekolah->nama;
        $alamat = $_sekolah->alamat;
        $kontak = $_sekolah->kontak;
        $email = $_sekolah->email;
        $fb = $_sekolah->fb;
        $instagram = $_sekolah->instagram;
        $twitter = $_sekolah->twitter;
        $youtube = $_sekolah->youtube;
    }
?>

        <div class="row">
            <div class="col-sm-12">
                <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <a href="<?php echo base_url() ?>Sekolah"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>
                                <h4 class="modal-title" id="myModalLabel">Edit Data Sekolah</h4> </div>
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="<?php echo base_url() ?>Sekolah/edit">
                                            <input type="hidden" value="<?php echo $id_sekolah ?>" class="form-control" name="id_sekolah"> 
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="exampleInputEmail1">Nama Sekolah</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="<?php echo $nama ?>" name="nama" oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" required> 
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">                                                    
                                                    <label for="exampleInputEmail1">Alamat</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" name="alamat" required oninvalid="this.setCustomValidity('Alamat tidak boleh kosong')" style="resize:none;" rows="2"><?= $alamat ?></textarea>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">                            
                                                    <label for="exampleInputPassword1">Kontak</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="number" maxlength="13" placeholder="08xxxxxxxx" onkeypress='return isNumberKey(event)' name="kontak" class="form-control" value="<?= $kontak ?>"> 
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">                            
                                                    <label for="exampleInputPassword1">Email</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="email" value="<?= $email ?>"> 
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="exampleInputPassword1">Facebook</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" placeholder="https://www.facebook.com/alamat" class="form-control" name="fb" value="<?= $fb ?>">
                                                </div>                                                
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="exampleInputPassword1">Instagram</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" placeholder="https://www.instagram.com/username" class="form-control" name="instagram" value="<?= $instagram ?>">
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="exampleInputPassword1">Twitter</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" placeholder="https://www.twitter.com/username" class="form-control" name="twitter" value="<?= $twitter ?>">                          
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="exampleInputPassword1">Youtube</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" placeholder="https://www.youtube.com/username" class="form-control" name="youtube" value="<?= $youtube ?>">
                                                </div>                                                
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Edit</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                </div>
            </div>