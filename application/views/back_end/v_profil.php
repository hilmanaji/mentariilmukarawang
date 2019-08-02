<?php echo $this->session->flashdata('msg'); 
    foreach ($data_profil->result() as $row) {
        $nama = $row->nama;
        $username = $row->username;
        $alamat = $row->alamat;
        $kontak = $row->kontak;
        $email = $row->email;
    }
?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <!-- <p class="text-muted m-b-30">Master Data Sekolah</p> -->
                                        <button type="#" id="btn_batal" class="btn btn-danger waves-effect waves-light m-r-10" onclick="batal()" style="display: none;">Batal</button>
                            <br>
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Data Profil</h4> 
                                </div>
                                <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">

                                        <div id="form_bayangan">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama</label>
                                                <input type="text" readonly id="nama" class="form-control" value="<?php echo $nama ?>" name="nama" required> 
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Username</label>
                                                <input type="text" readonly class="form-control" value="<?php echo $username ?>" > 
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Alamat</label>
                                            <textarea class="form-control" readonly ><?php echo $alamat ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Kontak</label>
                                                <input type="text" readonly value="<?php echo $kontak ?>" class="form-control" > 
                                            </div>  
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="text" readonly value="<?php echo $email ?>" class="form-control" > 
                                            </div>  
                                            <div class="form-group">
                                                <button type="#" id="btn_awal" class="btn btn-warning waves-effect waves-light m-r-10" onclick="ubah_profil()">Ubah Profil</button>
                                            </div>

                                        </div> 
                                        <form method="POST" action="<?php echo base_url() ?>Profil/update_profil" id="form_utama" style="display: none">
                                            
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama</label>
                                                <input type="text" id="nama" class="form-control" value="<?php echo $nama ?>" name="nama" required> 
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $username ?>" required> 
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat" required><?php echo $alamat ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Kontak</label>
                                                <input type="text" id="kontak" value="<?php echo $kontak ?>" class="form-control" name="kontak" required> 
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="text" name="email" value="<?php echo $email ?>" class="form-control" > 
                                            </div> 
                                            <div class="form-group" id="f_new_password" >
                                                <label for="exampleInputEmail1">Password Baru</label>
                                                <input type="text" id="password" placeholder="kosongkan bila tidak ingin diubah..." class="form-control" name="password"> 
                                            </div>
                                            <div class="form-group" id="f_re_password" s>
                                                <label for="exampleInputEmail1">Re-Type Password</label>
                                                <input type="text" id="retypepassword" placeholder="kosongkan bila tidak ingin diubah..." class="form-control" name="retypepassword" > 
                                            </div>
                                            <div class="form-group">
                                                <p>
                                                    <button type="submit" id="btn_save" class="btn btn-success waves-effect waves-light m-r-10">Save</button>
                                        </form>
                                            </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MODAL ADD -->
                <div id="myModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- MODAL ADD END -->

<script>
    function ubah_profil(){
        document.getElementById('btn_batal').style.display = "block";
        document.getElementById('form_utama').style.display = "block";
        document.getElementById('form_bayangan').style.display = "none";
    }
    function batal(){
        document.getElementById('btn_batal').style.display = "none";
        document.getElementById('form_bayangan').style.display = "block";
        document.getElementById('form_utama').style.display = "none";
    }
</script>