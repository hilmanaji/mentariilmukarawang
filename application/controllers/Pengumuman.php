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
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1'");
        $data['data_artikel'] = $this->DataHandle->other_query("SELECT tbl_sekolah.nama as nama_sekolah, tbl_artikel.id_artikel, tbl_artikel.judul_artikel, tbl_artikel.isi, tbl_artikel.`status`, tbl_galeri.ket, tbl_galeri.`value` FROM tbl_artikel LEFT OUTER JOIN tbl_galeri ON tbl_artikel.id_artikel = tbl_galeri.id_ref INNER JOIN tbl_sekolah ON tbl_artikel.id_sekolah = tbl_sekolah.id_sekolah WHERE tbl_artikel.`status` = '1'");      
        $this->template->back_end('back_end/v_data_artikel', $data);
    }

    public function form_add()
    {
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1'");
        $this->template->back_end('back_end/v_add_artikel', $data);
    }

    public function add()
    {
        $this->load->library('upload'); //pemanggilan library upload
        $id_user = $this->session->userdata('id_user');
        $id_sekolah = $this->input->post('id_sekolah');
        $isi = $this->input->post('isi');
        $judul_artikel = $this->input->post('judul_artikel');

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
                // DATA INPUT ARTIKEL
                $input_artikel = array(
                    'id_sekolah' => $id_sekolah,
                    'isi' => $isi,
                    'judul_artikel' => $judul_artikel,
                    'status' => 1,
                    'created_by' => $id_user
                 );
                $this->DataHandle->insert('tbl_artikel', $input_artikel);    
                $get_id_artikel = $this->DataHandle->get_last_id();        

                // DATA INPUT GALERI
                $input_galeri = array(
                    'id_sekolah' => $id_sekolah,
                    'value' => $dataInfo['file_name'],
                    'id_ref' => $get_id_artikel,
                    'ket' => 'Artikel',
                    'status' => 1,
                    'created_by' => $id_user
                 );    
                $this->DataHandle->insert('tbl_galeri', $input_galeri);  
                $this->session->set_flashdata('msg', '
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;</button>
                    <i class="fa fa-check m-l-5"></i> Data Berhasil Ditambahkan ... 
                </div>');  
                redirect('Artikel');   

            }
            else{
                $this->session->set_flashdata('msg', '
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;</button>
                    <i class="fa fa-check m-l-5"></i> Gambar Bermasalah !!!!
                </div>');  

                redirect('Artikel');
            }
            
        }
        // KONDISI GAMBAR KOSONG
        else{
            // DATA INPUT ARTIKEL
            $input_artikel = array(
                'id_sekolah' => $id_sekolah,
                'isi' => $isi,
                'judul_artikel' => $judul_artikel,
                'status' => 1,
                'created_by' => $id_user
             );
            $this->DataHandle->insert('tbl_artikel', $input_artikel);  
            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                &times;</button>
                <i class="fa fa-check m-l-5"></i> Data Berhasil Ditambahkan ... 
            </div>');  
            redirect('Artikel');   
        }    
    }

    public function delete($id_artikel)
    {
        $id_user = $this->session->userdata('id_user');
        $data = array(
            'status' => '0',
            'updated_by' => $id_user
         );
        $where = array(
            'id_artikel' => $id_artikel
         );
        $this->DataHandle->edit('tbl_artikel', $data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Dihapus ... 
        </div>');  

        redirect('Artikel');     
    }

    public function get_data($id_artikel){
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1'"); 
        $where = array(
            'id_artikel' => $id_artikel
         );
        $data['data_artikel'] = $this->DataHandle->other_query("SELECT tbl_sekolah.nama as nama_sekolah, tbl_artikel.id_sekolah, tbl_artikel.id_artikel, tbl_artikel.judul_artikel, tbl_artikel.isi, tbl_artikel.`status`, tbl_galeri.ket, tbl_galeri.`value` FROM tbl_artikel LEFT OUTER JOIN tbl_galeri ON tbl_artikel.id_artikel = tbl_galeri.id_ref INNER JOIN tbl_sekolah ON tbl_artikel.id_sekolah = tbl_sekolah.id_sekolah WHERE tbl_artikel.`status` = '1' AND tbl_artikel.`id_artikel` = '".$id_artikel."'");
        $this->template->back_end('back_end/v_edit_artikel', $data);
    }

    public function edit(){
        $this->load->library('upload'); //pemanggilan library upload
        $id_user = $this->session->userdata('id_user');
        $id_sekolah = $this->input->post('id_sekolah');
        $id_artikel = $this->input->post('id_artikel'); 
        $isi = $this->input->post('isi');
        $judul_artikel = $this->input->post('judul_artikel');

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
                // DATA EDIT ARTIKEL
                $edit_data = array(
                    'id_sekolah' => $id_sekolah,
                    'isi' => $isi,
                    'judul_artikel' => $judul_artikel,
                    'updated_by' => $id_user
                 );
                $where = array(
                    'id_artikel' => $id_artikel
                 );
                $this->DataHandle->edit('tbl_artikel', $edit_data, $where);    

                // JIKA GAMBAR TIDAK ADA
                if ($gambar_lama == "") {
                    // DATA INPUT GALERI
                    $input_galeri = array(
                        'id_sekolah' => $id_sekolah,
                        'value' => $dataInfo['file_name'],
                        'id_ref' => $id_artikel,
                        'ket' => 'Artikel',
                        'status' => 1,
                        'created_by' => $id_user
                     );    
                    $this->DataHandle->insert('tbl_galeri', $input_galeri); 
                }
                // JIKA GAMBAR ADA
                else{
                    // DATA EDIT GALERI
                    $edit_galeri = array(
                        'value' => $dataInfo['file_name'],
                        'updated_by' => $id_user
                     );    
                    $where2 = array(
                        'id_ref' => $id_artikel,
                        'ket' => 'Artikel'
                     );
                    $this->DataHandle->edit('tbl_galeri', $edit_galeri, $where2); 
                    unlink('./assets/plugins/images/image/'.$gambar_lama);
                }   
                // HAPUS GAMBAR LAMA   
                $this->session->set_flashdata('msg', '
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;</button>
                <i class="fa fa-check m-l-5"></i> Data Berhasil Perbaharui ... 
                </div>');  
                redirect('Artikel');   

            }
            else{
                $this->session->set_flashdata('msg', '
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;</button>
                    <i class="fa fa-check m-l-5"></i> Gambar Bermasalah !!!!
                </div>');  

                redirect('Artikel');
            }
            
        }
        // KONDISI GAMBAR KOSONG
        else{
            // DATA EDIT ARTIKEL
            $edit_data = array(
                'id_sekolah' => $id_sekolah,
                'isi' => $isi,
                'judul_artikel' => $judul_artikel,
                'updated_by' => $id_user
             );
            $where = array(
                'id_artikel' => $id_artikel
             );
            $this->DataHandle->edit('tbl_artikel', $edit_data, $where);
            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                &times;</button>
                <i class="fa fa-check m-l-5"></i> Data Berhasil Perbaharui ... 
            </div>');  
            redirect('Artikel');   
        }   
    }



    private function set_upload_options(){
        $config['upload_path'] = './assets/plugins/images/image';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
        $config['max_size'] = 2048;
        $config['max_width'] = 1366;
        $config['max_height'] = 1368;
        $config['encrypt_name'] = TRUE;
        $config['overwrite']     = FALSE;

        return $config;        
    }
}
