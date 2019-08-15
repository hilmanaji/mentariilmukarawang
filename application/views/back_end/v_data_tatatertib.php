                <?php echo $this->session->flashdata('msg'); ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <!-- <p class="text-muted m-b-30">Master Data Sekolah</p> -->
                            <h3 class="box-title m-b-0">Tata Tertib</h3>
                            <br>
                            <p style="text-align:right"><a href="<?php echo base_url() ?>Tata_tertib/form_add"><button class="btn btn-success waves-effect waves-light"><i class="fa fa-plus m-l-5"></i> Tata Tertib</button></a></p>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">No.</th>
                                            <th style="text-align:center">Nama Sekolah</th>
                                            <th style="text-align:center">Tata Tertib</th>
                                            <th style="text-align:center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    foreach ($data_tata_tertib->result() as $_tata_tertib) { 
                                        ?>
                                        <tr>
                                            <td style="text-align:center"><?php echo $no; ?></td>
                                            <td><?php echo $_tata_tertib->nama_sekolah; ?></td>
                                            <td><?php echo $_tata_tertib->isi_tata_tertib; ?></td>
                                            <td>
                                                <center>                                                
                                                    <a href="<?php echo base_url() ?>Tata_tertib/get_data/<?php echo $_tata_tertib->id_tata_tertib; ?>"><button class="btn btn-info waves-effect waves-light"><i class="fa fa-pencil m-l-5"></i></button></a>
                                                    <a href="<?php echo base_url() ?>Tata_tertib/delete/<?php echo $_tata_tertib->id_tata_tertib; ?>" onclick="javascript: return confirm('Yakin ingin menghapus data ini?')"><button class="btn btn-danger waves-effect waves-light" ><i class="fa fa-trash m-l-5"></i></button></a>
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