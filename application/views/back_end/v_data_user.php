                <?php echo $this->session->flashdata('msg'); ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <!-- <p class="text-muted m-b-30">Master Data Sekolah</p> -->
                            <h3 class="box-title m-b-0">Master Data User</h3>
                            <br>
                            <p style="text-align:right"><button data-toggle="modal" data-target="#myModalAdd" class="btn btn-success waves-effect waves-light"><i class="fa fa-plus m-l-5"></i> Tambah Data User</button></p>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">No.</th>
                                            <th style="text-align:center">Nama</th>
                                            <th style="text-align:center">Username</th>
                                            <th style="text-align:center">Alamat</th>
                                            <th style="text-align:center">Kelamin</th>
                                            <th style="text-align:center">Kontak</th>
                                            <th style="text-align:center">Email</th>
                                            <th style="text-align:center">Tipe User</th>
                                            <th style="text-align:center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    foreach ($data_user->result() as $_user) { 
                                        // Kondisi Jenis Kelamin
                                        if ($_user->jk == 'L') {
                                            $kelamin = "Laki-laki";
                                        }
                                        else if ($_user->jk == 'P') {
                                            $kelamin = "Perempuan";
                                        }
                                        else{
                                            $kelamin = "";
                                        }

                                        // Kondisi Role User
                                        if ($_user->role_user == '2') {
                                            $role_user = "Admin Sekolah";
                                        }
                                        else{
                                            $role_user = '';
                                        }
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $_user->nama; ?></td>
                                            <td><?php echo $_user->username; ?></td>
                                            <td><?php echo $_user->alamat; ?></td>
                                            <td><?php echo $kelamin; ?></td>
                                            <td><?php echo $_user->kontak; ?></td>
                                            <td><?php echo $_user->email; ?></td>
                                            <td><?php echo $role_user; ?></td>
                                            <td>
                                                <center>                                                
                                                    <a href="<?php echo base_url() ?>User/get_data/<?php echo $_user->id_user; ?>"><button class="btn btn-info waves-effect waves-light"><i class="fa fa-pencil m-l-5"></i></button></a>
                                                    <a href="<?php echo base_url() ?>User/delete/<?php echo $_user->id_user; ?>" onclick="javascript: return confirm('Yakin ingin menghapus data ini?')"><button class="btn btn-danger waves-effect waves-light" ><i class="fa fa-trash m-l-5"></i></button></a>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php 
                                     $no++;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <hr>
                                Ket : <br>
                                <i class="fa fa-plus m-l-5"></i> : Tambah<br>
                                <i class="fa fa-pencil m-l-5"></i> : Edit<br>
                                <i class="fa fa-trash m-l-5"></i> : Hapus<br>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MODAL ADD -->
                <div id="myModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Tambah Data User</h4> </div>
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="<?php echo base_url() ?>User/add">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nama" placeholder="Isi Nama..." required> 
                                            <input type="text" class="form-control" name="username" placeholder="Isi Username..." required>
                                            <select class="form-control" name="id_sekolah">
                                    <?php                                     
                                    foreach ($data_sekolah->result() as $_sekolah) { ?>
                                                <option value="<?php echo $_sekolah->id_sekolah ?>">Admin <?php echo $_sekolah->nama ?></option>
                                    <?php 
                                    } 
                                    ?> 
                                            </select>
                                            <select class="form-control" name="jk">
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                            <textarea class="form-control" name="alamat" required oninvalid="this.setCustomValidity('Alamat tidak boleh kosong')" placeholder="Isi Alamat..."></textarea>
                                            <input type="number" maxlength="13" placeholder="Isi Kontak..." onkeypress='return isNumberKey(event)' name="kontak" class="form-control" > 
                                            <input type="text" class="form-control"  placeholder="Isi Email..." name="email" > 
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Isi Password..." required> 
                                            <input type="password" class="form-control" id="retypepassword" name="retypepassword" placeholder="Ulangi Password..." required> 
                                        </div>
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Tambah</button>
                                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Batal</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- MODAL ADD END -->