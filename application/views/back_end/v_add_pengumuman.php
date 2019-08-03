<?php echo $this->session->flashdata('msg'); ?>
            
                <div class="row">
                    <!-- Left sidebar -->
                    <div class="col-md-12">
                        <div class="white-box">
                                <a href="<?php echo base_url() ?>Pengumuman"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>
                            <div class="row">
                                <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 mail_listing">
                                    <form enctype="multipart/form-data" action="<?php echo base_url() ?>Pengumuman/add" method="post" class="form-horizontal row-fluid">
                                        <h3 class="box-title">Tambah Pengumuman</h3>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Judul</label>
                                            <input class="form-control" name="judul" required oninvalid="this.setCustomValidity('Judul tidak boleh kosong')" oninput="setCustomValidity('')"> 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Isi</label>
                                            <textarea class="textarea_editor form-control" name="isi_pengumuman" rows="10"  placeholder="Isi Pengumuman Disini ..." required oninvalid="this.setCustomValidity('Isi tidak boleh kosong')" oninput="setCustomValidity('')" ></textarea>
                                        </div>
                                        <div class="form-group">                     
                                            <label for="exampleInputEmail1">Gambar</label>
                                            <div class="fallback">
                                                <input name="userfile" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*"/> 
                                            </div>
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