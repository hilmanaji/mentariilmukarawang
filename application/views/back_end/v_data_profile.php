<?php echo $this->session->flashdata('msg'); ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <!-- <p class="text-muted m-b-30">Master Data Sekolah</p> -->
                            <h3 class="box-title m-b-0">Profile Sekolah</h3>
                            <br>
                            <p style="text-align:right"><button data-toggle="modal" data-target="#myModalAdd" class="btn btn-success waves-effect waves-light"><i class="fa fa-plus m-l-5"></i> Data Profile</button></p>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">No.</th>
                                            <th style="text-align:center">Nama Sekolah</th>
                                            <th style="text-align:center">Visi</th>
                                            <th style="text-align:center">Misi</th>
                                            <th style="text-align:center">Motto</th>
                                            <th style="text-align:center">Selayang Pandang</th>
                                            <th style="text-align:center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    foreach ($data_profile->result() as $_profile) { ?>
                                        <tr>
                                            <td style="text-align:center"><?php echo $no; ?></td>
                                            <td><?php echo $_profile->nama_sekolah; ?></td>
                                            <td><?php echo $_profile->visi; ?></td>
                                            <td><?php echo $_profile->misi; ?></td>
                                            <td><?php echo $_profile->motto; ?></td>
                                            <td><?php echo $_profile->selayang_pandang; ?></td>
                                            <td>
                                                <center>                                                
                                                    <a href="<?php echo base_url() ?>Profile/get_data/<?php echo $_profile->id_profil; ?>"><button class="btn btn-info waves-effect waves-light"><i class="fa fa-pencil m-l-5"></i></button></a>
                                                    <a href="<?php echo base_url() ?>Profile/delete/<?php echo $_profile->id_profil; ?>" onclick="javascript: return confirm('Yakin ingin menghapus data ini?')"><button class="btn btn-danger waves-effect waves-light" ><i class="fa fa-trash m-l-5"></i></button></a>
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
                                <h4 class="modal-title" id="myModalLabel">Tambah Data Profile</h4> </div>
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="<?php echo base_url() ?>Profile/add">
                                     <?php 
                                     // Kondisi Admin Sekolah
                                     if($id_sekolah != '0'){ ?>   
                                        <div class="form-group">
                                            <input class="form-control" name="id_sekolah" type="hidden" value="<?php echo $id_sekolah ?>"> 
                                        </div> 
                                     <?php 
                                     }
                                     // Kondisi Super Admin
                                     else{ ?>            
                                        <div class="form-group">                                 
                                                <label for="exampleInputEmail1">Sekolah</label>
                                                <select class="form-control" name="id_sekolah">
                                        <?php                                     
                                        foreach ($data_sekolah->result() as $_sekolah) { ?>
                                                    <option value="<?php echo $_sekolah->id_sekolah ?>"><?php echo $_sekolah->nama ?></option>
                                        <?php 
                                        } 
                                        ?> 
                                                </select>   
                                        </div>

                                     <?php 
                                     } 
                                     ?>  
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Visi</label>
                                            <input type="text" class="form-control" name="visi" required> 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Misi</label>
                                            <input type="text" class="form-control" name="misi" required> 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Motto</label>
                                            <input type="text" class="form-control" name="motto" required> 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Selayang Pandang</label>
                                            <input type="text" class="form-control" name="selayang_pandang" required> 
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