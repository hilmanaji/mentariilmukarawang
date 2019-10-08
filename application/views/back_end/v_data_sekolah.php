                <?php echo $this->session->flashdata('msg'); ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <!-- <p class="text-muted m-b-30">Master Data Sekolah</p> -->
                            <h3 class="box-title m-b-0">Master Data Sekolah</h3>
                            <br>
                            <?php 
                                if ($_SESSION['id_sekolah'] == '0') { ?>
                            <p style="text-align:right"><button data-toggle="modal" data-target="#myModalAdd" class="btn btn-success waves-effect waves-light"><i class="fa fa-plus m-l-5"></i> Data Sekolah</button></p>
                            <?php
                            }
                            ?>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">No.</th>
                                            <th style="text-align:center">Nama Sekolah</th>
                                            <th style="text-align:center">Alamat</th>
                                            <th style="text-align:center">Kontak</th>
                                            <th style="text-align:center">Email</th>
                                            <th style="text-align:center">Facebook</th>
                                            <th style="text-align:center">Instagram</th>
                                            <th style="text-align:center">Twitter</th>
                                            <th style="text-align:center">Youtube</th>
                                            <th style="text-align:center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    foreach ($data_sekolah->result() as $_sekolah) { ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $_sekolah->nama; ?></td>
                                            <td><?php echo $_sekolah->alamat; ?></td>
                                            <td><?php echo $_sekolah->kontak; ?></td>
                                            <td><?php echo $_sekolah->email; ?></td>
                                            <td><?php echo $_sekolah->fb; ?></td>
                                            <td><?php echo $_sekolah->instagram; ?></td>
                                            <td><?php echo $_sekolah->twitter; ?></td>
                                            <td><?php echo $_sekolah->youtube; ?></td>
                                            <td>
                                                <center>                                                
                                                    <a href="<?php echo base_url() ?>Sekolah/get_data/<?php echo $_sekolah->id_sekolah; ?>"><button class="btn btn-info waves-effect waves-light"><i class="fa fa-pencil m-l-5"></i></button></a>

                                                    
                            <?php 
                                if ($_SESSION['id_sekolah'] == '0') { ?>
                                                    <a href="<?php echo base_url() ?>Sekolah/delete/<?php echo $_sekolah->id_sekolah; ?>" onclick="javascript: return confirm('Yakin ingin menghapus data ini?')"><button class="btn btn-danger waves-effect waves-light" ><i class="fa fa-trash m-l-5"></i></button></a>
                            <?php
                            }
                            ?>
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
                                <h4 class="modal-title" id="myModalLabel">Tambah Data Sekolah</h4> </div>
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="<?php echo base_url() ?>Sekolah/add">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="exampleInputEmail1">Nama Sekolah</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="nama" oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" required> 
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">                                                    
                                                    <label for="exampleInputEmail1">Alamat</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" name="alamat" required oninvalid="this.setCustomValidity('Alamat tidak boleh kosong')" style="resize:none;" rows="2"></textarea>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">                            
                                                    <label for="exampleInputPassword1">Kontak</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="number" maxlength="13" placeholder="08xxxxxxxx" onkeypress='return isNumberKey(event)' name="kontak" class="form-control" > 
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">                            
                                                    <label for="exampleInputPassword1">Email</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="email" > 
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="exampleInputPassword1">Facebook</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" placeholder="https://www.facebook.com/alamat" class="form-control" name="fb" >                                                     
                                                </div>                                                
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="exampleInputPassword1">Instagram</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" placeholder="https://www.instagram.com/username" class="form-control" name="instagram" >                                                     
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="exampleInputPassword1">Twitter</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" placeholder="https://www.twitter.com/username" class="form-control" name="twitter" >                                                     
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="exampleInputPassword1">Youtube</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" placeholder="https://www.youtube.com/username" class="form-control" name="youtube" >                                                     
                                                </div>                                                
                                            </div>
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