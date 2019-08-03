                <?php echo $this->session->flashdata('msg'); ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <!-- <p class="text-muted m-b-30">Master Data Sekolah</p> -->
                            <h3 class="box-title m-b-0">Data Artikel</h3>
                            <br>
                            <p style="text-align:right"><a href="<?php echo base_url() ?>Pengumuman/form_add"><button class="btn btn-success waves-effect waves-light"><i class="fa fa-plus m-l-5"></i> Data Pengumuman</button></a></p>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">No.</th>
                                            <th style="text-align:center">Judul</th>
                                            <th style="text-align:center">Isi</th>
                                            <th style="text-align:center">Gambar</th>
                                            <th style="text-align:center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    foreach ($data_pengumuman->result() as $_pengumuman) { 
                                        if ($_pengumuman->value == "") {
                                            $gambar = '--Tidak Ada Gambar / File--';
                                        }
                                        else{
                                            $gambar = "<img src='".base_url()."assets/plugins/images/image/".$_pengumuman->value."' style='max-width:70%;max-height:70%;'>";
                                        }
                                        ?>
                                        <tr>
                                            <td style="text-align:center"><?php echo $no; ?></td>
                                            <td><?php echo $_pengumuman->judul; ?></td>
                                            <td><?php echo $_pengumuman->isi_pengumuman; ?></td>
                                            <td style="text-align:center"><?php echo $gambar; ?></td>
                                            <td>
                                                <center>                                                
                                                    <a href="<?php echo base_url() ?>Pengumuman/get_data/<?php echo $_pengumuman->id_pengumuman; ?>"><button class="btn btn-info waves-effect waves-light"><i class="fa fa-pencil m-l-5"></i></button></a>
                                                    <a href="<?php echo base_url() ?>Pengumuman/delete/<?php echo $_pengumuman->id_pengumuman; ?>" onclick="javascript: return confirm('Yakin ingin menghapus data ini?')"><button class="btn btn-danger waves-effect waves-light" ><i class="fa fa-trash m-l-5"></i></button></a>
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
                                <h4 class="modal-title" id="myModalLabel">Tambah Data Pengumuman</h4> </div>
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="<?php echo base_url() ?>Kegiatan/add">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Judul Pengumuman</label>
                                            <input type="text" class="form-control" name="nama_kegiatan" required> 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi_kegiatan" rows="7" required></textarea>
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