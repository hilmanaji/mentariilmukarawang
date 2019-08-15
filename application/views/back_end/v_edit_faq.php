<?php 
    foreach ($data_faq->result() as $_faq) {
        $id_faq = $_faq->id_faq;
        $pertanyaan = $_faq->pertanyaan;
        $jawaban = $_faq->jawaban;
        $id_sekolah = $_faq->id_sekolah;
    }
?>

        <div class="row">
            <div class="col-sm-12">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <a href="<?php echo base_url() ?>FAQ"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>
                                <h4 class="modal-title" id="myModalLabel">Edit Data FAQ</h4> </div>
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="<?php echo base_url() ?>FAQ/edit">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pertanyaan</label>
                                            <input type="hidden" class="form-control" name="id_faq" value="<?php echo $id_faq ?>" required> 
                                            <input type="text" class="form-control" name="pertanyaan" value="<?php echo $pertanyaan ?>" required> 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jawaban</label>
                                            <input type="text" class="form-control" name="jawaban" value="<?php echo $jawaban ?>" required> 
                                        </div>

                                     <?php 
                                     // Kondisi Admin Sekolah
                                     if($id_sekolah_sess != '0'){ ?>   
                                            <input class="form-control" name="id_sekolah" type="hidden" value="<?php echo $id_sekolah ?>">  
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
                                        <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Edit</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>