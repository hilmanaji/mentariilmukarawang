<?php echo $this->session->flashdata('msg');
foreach ($data_profil->result() as $row) {
    $nama = $row->nama;
    $username = $row->username;
    $alamat = $row->alamat;
    $kontak = $row->kontak;
    $email = $row->email;
}
?>
<style>
    .profile-card {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
    }

    .profile-header {
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        color: #fff;
        padding: 30px;
        text-align: center;
    }

    .profile-avatar {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .2);
        margin: auto;
        line-height: 90px;
        font-size: 40px;
        font-weight: bold;
    }

    .info-box {
        background: #f8fafc;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 15px;
        border-left: 4px solid #2a5298;
    }

    .info-label {
        font-size: 12px;
        color: #888;
        text-transform: uppercase;
    }

    .info-value {
        font-size: 15px;
        font-weight: 600;
        color: #333;
    }

    .btn-modern {
        border-radius: 30px;
        padding: 10px 25px;
        font-weight: 600;
    }

    .form-control {
        border-radius: 10px;
    }

    .white-box {
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
    }
</style>
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

                            <div class="profile-card" id="form_bayangan">

                                <div class="profile-header">
                                    <div class="profile-avatar">
                                        <?= strtoupper(substr($nama, 0, 1)); ?>
                                    </div>

                                    <h3 style="margin-top:15px;" class="text-white">
                                        <?= $nama ?>
                                    </h3>

                                    <small>
                                        Administrator Sekolah
                                    </small>
                                </div>

                                <div style="padding:25px">

                                    <div class="info-box">
                                        <div class="info-label">Username</div>
                                        <div class="info-value"><?= $username ?></div>
                                    </div>

                                    <div class="info-box">
                                        <div class="info-label">Alamat</div>
                                        <div class="info-value"><?= $alamat ?></div>
                                    </div>

                                    <div class="info-box">
                                        <div class="info-label">Kontak</div>
                                        <div class="info-value"><?= $kontak ?></div>
                                    </div>

                                    <div class="info-box">
                                        <div class="info-label">Email</div>
                                        <div class="info-value"><?= $email ?></div>
                                    </div>

                                    <center>
                                        <button
                                            type="button"
                                            class="btn btn-warning btn-modern"
                                            onclick="ubah_profil()">
                                            <i class="fa fa-pencil"></i> Ubah Profil
                                        </button>
                                    </center>

                                </div>

                            </div>
                            <form method="POST" action="<?php echo base_url() ?>Profil/update_profil" id="form_utama" style="display: none">
                                <div class="alert alert-info">
                                    <i class="fa fa-user-circle"></i>
                                    Edit informasi akun administrator sekolah.
                                </div>

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
                                    <input type="text" name="email" value="<?php echo $email ?>" class="form-control">
                                </div>
                                <div class="form-group" id="f_new_password">
                                    <label for="exampleInputEmail1">Password Baru</label>
                                    <input type="password" id="password" placeholder="kosongkan bila tidak ingin diubah..." class="form-control" name="password">
                                </div>
                                <div class="form-group" id="f_re_password" s>
                                    <label for="exampleInputEmail1">Re-Type Password</label>
                                    <input type="password" id="retypepassword" placeholder="kosongkan bila tidak ingin diubah..." class="form-control" name="retypepassword">
                                </div>
                                <div class="form-group">
                                    <p>
                                        <button type="submit"
                                            class="btn btn-success btn-modern">
                                            <i class="fa fa-save"></i> Simpan Perubahan
                                        </button>

                                        <button type="button"
                                            class="btn btn-danger btn-modern"
                                            onclick="batal()">
                                            <i class="fa fa-times"></i> Batal
                                        </button>
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
    function ubah_profil() {
        document.getElementById('btn_batal').style.display = "block";
        document.getElementById('form_utama').style.display = "block";
        document.getElementById('form_bayangan').style.display = "none";
    }

    function batal() {
        document.getElementById('btn_batal').style.display = "none";
        document.getElementById('form_bayangan').style.display = "block";
        document.getElementById('form_utama').style.display = "none";
    }
</script>