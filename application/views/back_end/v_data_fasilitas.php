                <?php echo $this->session->flashdata('msg'); ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <!-- <p class="text-muted m-b-30">Master Data Sekolah</p> -->
                            <h3 class="box-title m-b-0">Master Data Fasilitas</h3>
                            <br>
                            <p style="text-align:right"><a href="<?php echo base_url() ?>Fasilitas/form_add"><button class="btn btn-success waves-effect waves-light"><i class="fa fa-plus m-l-5"></i> Data Fasilitas</button></a></p>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">No.</th>
                                            <th style="text-align:center">Nama Sekolah</th>
                                            <th style="text-align:center">Nama Fasilitas</th>
                                            <th style="text-align:center">Gambar</th>
                                            <th style="text-align:center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    foreach ($data_fasilitas->result() as $_fasilitas) { 
                                        if ($_fasilitas->value == "") {
                                            $gambar = '--Tidak Ada Gambar--';
                                        }
                                        else{
                                            $gambar = "<img src='".base_url()."assets/plugins/images/image/".$_fasilitas->value."' style='max-width:70%;max-height:70%;'>";
                                        }
                                        ?>
                                        <tr>
                                            <td style="text-align:center"><?php echo $no; ?></td>
                                            <td><?php echo $_fasilitas->nama_sekolah; ?></td>
                                            <td><?php echo $_fasilitas->nama_fasilitas; ?></td>
                                            <td style="text-align:center"><a data-toggle="modal" data-target="#ModalGam-<?php echo $no ?>"><i class="fa fa-search m-l-5"></i></a></td>
                                            <td>
                                                <center>                                                
                                                    <a href="<?php echo base_url() ?>Fasilitas/get_data/<?php echo $_fasilitas->id_fasilitas; ?>"><button class="btn btn-info waves-effect waves-light"><i class="fa fa-pencil m-l-5"></i></button></a>
                                                    <a href="<?php echo base_url() ?>Fasilitas/delete/<?php echo $_fasilitas->id_fasilitas; ?>" onclick="javascript: return confirm('Yakin ingin menghapus data ini?')"><button class="btn btn-danger waves-effect waves-light" ><i class="fa fa-trash m-l-5"></i></button></a>
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
                                <i class="fa fa-search m-l-5"></i> : Lihat<br>
                                <i class="fa fa-pencil m-l-5"></i> : Edit<br>
                                <i class="fa fa-trash m-l-5"></i> : Hapus<br>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            $no=1;
            // LOOPING MODAL ================================================
            foreach ($data_fasilitas->result() as $_fasilitas) { 
                if ($_fasilitas->value == "") {
                    $gambar = '--Tidak Ada Gambar--';
                }
                else{
                    $gambar = "<img src='".base_url()."assets/plugins/images/image/".$_fasilitas->value."' style='max-width:70%;max-height:70%;'>";
                }
                ?>

                <!-- MODAL ADD -->
                <div id="ModalGam-<?php echo $no ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Gambar Fasilitas</h4> </div>
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12 text-center">
                                    <?php echo $gambar; ?>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- MODAL ADD END -->

            <?php 
            // LOOPING MODAL ================================================
             $no++;
            }
            ?>