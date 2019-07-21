<?php 
    foreach ($data_sekolah->result() as $_sekolah) {
        $id_sekolah = $_sekolah->id_sekolah;
        $nama = $_sekolah->nama;
        $alamat = $_sekolah->alamat;
        $kontak = $_sekolah->kontak;
        $email = $_sekolah->email;
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
                                        <div class="form-group">
                                            <input type="hidden" value="<?php echo $id_sekolah ?>" class="form-control" name="id_sekolah"> 
                                            <label for="exampleInputEmail1">Nama Sekolah</label>
                                            <input type="text" class="form-control" value="<?php echo $nama ?>" name="nama" oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" required> 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Alamat</label>
                                            <textarea class="form-control" name="alamat" required oninvalid="this.setCustomValidity('Alamat tidak boleh kosong')"><?php echo $alamat ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Kontak</label>
                                            <input type="number" maxlength="13" onkeypress='return isNumberKey(event)' name="kontak" value="<?php echo $kontak ?>" class="form-control" > 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Email</label>
                                            <input type="text" class="form-control" value="<?php echo $email ?>" name="email" > 
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