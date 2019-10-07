<?php echo $this->session->flashdata('msg'); ?>
            
                <div class="row">
                    <!-- Left sidebar -->
                    <div class="col-md-12">
                        <div class="white-box">
                                <a href="<?php echo base_url() ?>Berkas"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>
                            <div class="row">
                                <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 mail_listing">
                                    <form enctype="multipart/form-data" action="<?php echo base_url() ?>Berkas/add" method="post" class="form-horizontal row-fluid">
                                        <h3 class="box-title">Tambah File Download</h3>
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
                                            <label for="exampleInputEmail1">File</label>
                                            <div class="fallback">
                                                <input name="userfile" type="file" accept=".pdf, .doc, .docx, .xls, .xlsx"/> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Keterangan</label>
                                            <input class="form-control" name="keterangan" required oninvalid="this.setCustomValidity('Keterangan tidak boleh kosong')" oninput="setCustomValidity('')"> 
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Simpan</button>
                                            
                                            
                                        </div>                                        
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>