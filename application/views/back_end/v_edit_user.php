<?php 
    foreach ($data_user->result() as $_sekolah) {
        $id_user = $_sekolah->id_user;
        $id_sekolah = $_sekolah->id_sekolah;
        $nama = $_sekolah->nama;
        $alamat = $_sekolah->alamat;
        $kontak = $_sekolah->kontak;
        $email = $_sekolah->email;
        $jk = $_sekolah->jk;
        $password = $_sekolah->password;
        $username = $_sekolah->username;
    }
?>

        <div class="row">
            <div class="col-sm-12">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <a href="<?php echo base_url() ?>User"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>
                                <h4 class="modal-title" id="myModalLabel">Edit Data User</h4> </div>
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="<?php echo base_url() ?>User/edit">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="id_user" placeholder="Isi Nama..." required value="<?php echo $id_user ?>"> 
                                            <input type="text" class="form-control" name="nama" placeholder="Isi Nama..." required value="<?php echo $nama ?>"> 
                                            <input type="text" class="form-control" name="username" placeholder="Isi Username..." required value="<?php echo $username ?>">
                                            <select class="form-control" name="id_sekolah">
                                    <?php                                     
                                    foreach ($data_sekolah->result() as $_sekolah) { ?>
                                                <option value="<?php echo $_sekolah->id_sekolah ?>" <?php if($_sekolah->id_sekolah == $id_sekolah){echo" selected";} ?>>Admin <?php echo $_sekolah->nama ?></option>
                                    <?php 
                                    } 
                                    ?> 
                                            </select>
                                            <select class="form-control" name="jk">
                                                <option value="L" <?php if($jk == 'L'){echo" selected";} ?> >Laki-laki</option>
                                                <option value="P" <?php if($jk == 'P'){echo" selected";} ?> >Perempuan</option>
                                            </select>
                                            <textarea class="form-control" name="alamat" required oninvalid="this.setCustomValidity('Alamat tidak boleh kosong')" placeholder="Isi Alamat..."><?php echo $alamat ?></textarea>
                                            <input type="number" maxlength="13" placeholder="Isi Kontak..." onkeypress='return isNumberKey(event)' name="kontak" value="<?php echo $kontak ?>" class="form-control" > 
                                            <input type="text" class="form-control"  placeholder="Isi Email..." name="email" value="<?php echo $email ?>"> 
                                            <!-- <input type="password" class="form-control" id="password" name="password" placeholder="Isi Password..." required>  -->
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