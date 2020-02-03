<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('id_user')) {
            redirect('Login');
        }
        else{            
            $id_user = $this->session->userdata('id_user');
        }
    }

    public function index()
    {
        $data['data_pengumuman'] = $this->DataHandle->other_query("SELECT tbl_pengumuman.id_pengumuman, tbl_pengumuman.judul, tbl_pengumuman.isi_pengumuman, tbl_pengumuman.value FROM  tbl_pengumuman WHERE tbl_pengumuman.`status` = '1' ORDER BY tbl_pengumuman.id_pengumuman DESC");      
        $this->template->back_end('back_end/v_data_pengumuman', $data);
    }

    public function form_add()
    {
        $this->template->back_end('back_end/v_add_pengumuman');
    }

    public function add()
    {
        $this->load->library('upload'); //pemanggilan library upload
        $id_user = $this->session->userdata('id_user');
        $isi_pengumuman = $this->input->post('isi_pengumuman');
        $judul = $this->input->post('judul');

        // KONDISI GAMBAR ADA
        if ($_FILES['userfile']['name'] != NULL) {
            $dataInfo = array();
            $files = $_FILES;
            $_FILES['userfile']['name']= $files['userfile']['name'];
            $_FILES['userfile']['type']= $files['userfile']['type'];
            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'];
            $_FILES['userfile']['error']= $files['userfile']['error'];
            $_FILES['userfile']['size']= $files['userfile']['size']; 

            $this->upload->initialize($this->set_upload_options());
            if ($this->upload->do_upload()) {
                $dataInfo = $this->upload->data(); 
                if ($dataInfo['file_size'] > 1024) {
                    $this->resize($dataInfo['file_name']);

                }                 
                // DATA INPUT ARTIKEL
                $input_pengumuman = array(
                    'isi_pengumuman' => $isi_pengumuman,
                    'judul' => $judul,
                    'value' => $dataInfo['file_name'],
                    'status' => 1,
                    'created_by' => $id_user
                 );
                $this->DataHandle->insert('tbl_pengumuman', $input_pengumuman);    
                $get_id_pengumuman = $this->DataHandle->get_last_id();        

                // DATA INPUT GALERI
                $input_galeri = array(
                    'id_sekolah' => $this->session->userdata('id_sekolah'),
                    'value' => $dataInfo['file_name'],
                    'deskripsi' => $judul,
                    'tag_galeri' => 'slider',
                    'status' => 1,
                    'created_by' => $id_user
                 );    
                // $this->DataHandle->insert('tbl_galeri', $input_galeri);  
                $this->session->set_flashdata('msg', '
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;</button>
                    <i class="fa fa-check m-l-5"></i> Data Pengumuman Berhasil Ditambahkan ... 
                </div>');  
                redirect('Pengumuman');   

            }
            else{
                $this->session->set_flashdata('msg', '
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;</button>
                    <i class="fa fa-check m-l-5"></i> Gambar / File Bermasalah !!!!
                </div>');  

                redirect('Pengumuman');
            }
            
        }
        // KONDISI GAMBAR KOSONG
        else{
            // DATA INPUT ARTIKEL
            $input_pengumuman = array(
                'isi_pengumuman' => $isi_pengumuman,
                'judul' => $judul,
                'status' => 1,
                'created_by' => $id_user
             );
            $this->DataHandle->insert('tbl_pengumuman', $input_pengumuman);  
            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                &times;</button>
                <i class="fa fa-check m-l-5"></i> Data Pengumuman Berhasil Ditambahkan ... 
            </div>');  
            redirect('Pengumuman');   
        }    
    }

    public function delete($id_pengumuman)
    {
        $id_user = $this->session->userdata('id_user');
        $data = array(
            'status' => '0',
            'updated_by' => $id_user
         );
        $where = array(
            'id_pengumuman' => $id_pengumuman
         );
        $this->DataHandle->edit('tbl_pengumuman', $data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Pengumuman Berhasil Dihapus ... 
        </div>');  

        redirect('Pengumuman');     
    }

    public function get_data($id_pengumuman){
        $where = array(
            'id_pengumuman' => $id_pengumuman
         );
        $data['data_pengumuman'] = $this->DataHandle->other_query("SELECT tbl_pengumuman.id_pengumuman, tbl_pengumuman.judul, tbl_pengumuman.isi_pengumuman, tbl_pengumuman.value FROM  tbl_pengumuman WHERE tbl_pengumuman.`status` = '1' AND tbl_pengumuman.`id_pengumuman` = '".$id_pengumuman."'");
        $this->template->back_end('back_end/v_edit_pengumuman', $data);
    }

    public function edit(){
        $this->load->library('upload'); //pemanggilan library upload
        $id_user = $this->session->userdata('id_user');
        $id_pengumuman = $this->input->post('id_pengumuman'); 
        $isi_pengumuman = $this->input->post('isi_pengumuman');
        $judul = $this->input->post('judul');

        // KONDISI GAMBAR ADA
        if ($_FILES['userfile']['name'] != NULL) {
            $gambar_lama = $this->input->post('gambar_lama');
            $dataInfo = array();
            $files = $_FILES;
            $_FILES['userfile']['name']= $files['userfile']['name'];
            $_FILES['userfile']['type']= $files['userfile']['type'];
            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'];
            $_FILES['userfile']['error']= $files['userfile']['error'];
            $_FILES['userfile']['size']= $files['userfile']['size']; 

            $this->upload->initialize($this->set_upload_options());
            if ($this->upload->do_upload()) {
                $dataInfo = $this->upload->data(); 

                // JIKA GAMBAR TIDAK ADA
                if ($gambar_lama == "") {   
                    // DATA EDIT PENGUMUMAN
                    if ($dataInfo['file_size'] > 1024) {
                        $this->resize($dataInfo['file_name']);

                    }             
                    $edit_data = array(
                        'isi_pengumuman' => $isi_pengumuman,
                        'judul' => $judul,
                        'value' => $dataInfo['file_name'],
                        'updated_by' => $id_user
                     );
                    $where = array(
                        'id_pengumuman' => $id_pengumuman
                     );
                    $this->DataHandle->edit('tbl_pengumuman', $edit_data, $where);   
                }
                // JIKA GAMBAR ADA
                else{
                    if ($dataInfo['file_size'] > 1024) {
                        $this->resize($dataInfo['file_name']);

                    }             
                    // DATA EDIT GALERI
                    $edit_data = array(
                        'isi_pengumuman' => $isi_pengumuman,
                        'judul' => $judul,
                        'value' => $dataInfo['file_name'],
                        'updated_by' => $id_user
                     );
                    $where = array(
                        'id_pengumuman' => $id_pengumuman
                     );
                    $this->DataHandle->edit('tbl_pengumuman', $edit_data, $where);   
                    unlink('./assets/plugins/images/image/'.$gambar_lama);
                }   
                // HAPUS GAMBAR LAMA   
                $this->session->set_flashdata('msg', '
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;</button>
                <i class="fa fa-check m-l-5"></i> Data Berhasil Perbaharui ... 
                </div>');  
                redirect('Pengumuman');   

            }
            else{
                $this->session->set_flashdata('msg', '
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;</button>
                    <i class="fa fa-check m-l-5"></i> Gambar Bermasalah !!!!
                </div>');  

                redirect('Pengumuman');
            }
            
        }
        // KONDISI GAMBAR KOSONG
        else{
            // DATA EDIT ARTIKEL
            $edit_data = array(
                'isi_pengumuman' => $isi_pengumuman,
                'judul' => $judul,
                'updated_by' => $id_user
             );
            $where = array(
                'id_pengumuman' => $id_pengumuman
             );
            $this->DataHandle->edit('tbl_pengumuman', $edit_data, $where);
            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                &times;</button>
                <i class="fa fa-check m-l-5"></i> Data Berhasil Perbaharui ... 
            </div>');  
            redirect('Pengumuman');   
        }   
    }

    private function set_upload_options(){
        $config['upload_path'] = './assets/plugins/images/image';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
        $config['max_size'] = 0;
        $config['encrypt_name'] = TRUE;
        $config['overwrite']     = FALSE;

        return $config;        
    }
    private function resize($nama_file_baru){
        $this->load->library('image_lib');

        $conf['image_library']='gd2';
        $conf['source_image']='./assets/plugins/images/image/'.$nama_file_baru;
        $conf['create_thumb']= FALSE;
        $conf['maintain_ratio']= TRUE;
        $conf['quality']= '60%';
        $conf['width']= 1200;
        $conf['height']= 900;
        $conf['new_image']= './assets/plugins/images/image/'.$nama_file_baru;

        $this->image_lib->clear();
        $this->image_lib->initialize($conf);
        $this->image_lib->resize();

    }
}
