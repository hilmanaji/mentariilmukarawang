<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas extends CI_Controller {

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
        $data['data_fasilitas'] = $this->DataHandle->other_query("SELECT tbl_sekolah.nama as nama_sekolah, tbl_fasilitas.id_fasilitas, tbl_fasilitas.nama_fasilitas,  tbl_fasilitas.`status`, tbl_galeri.ket, tbl_galeri.`value` FROM tbl_fasilitas LEFT OUTER JOIN tbl_galeri ON tbl_fasilitas.id_fasilitas = tbl_galeri.id_ref INNER JOIN tbl_sekolah ON tbl_fasilitas.id_sekolah = tbl_sekolah.id_sekolah WHERE tbl_fasilitas.`status` = '1'");		
        $this->template->back_end('back_end/v_data_fasilitas', $data);
    }

    public function form_add()
    {
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1'");
        $this->template->back_end('back_end/v_add_fasilitas', $data);
    }

    public function add(){
        $this->load->library('upload'); //pemanggilan library upload
        $id_user = $this->session->userdata('id_user');
        $nama_fasilitas = $this->input->post('nama_fasilitas');
        $id_sekolah = $this->input->post('id_sekolah');

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
                // DATA INPUT FASILITAS
                $input_data = array(
                    'id_sekolah' => $id_sekolah,
                    'nama_fasilitas' => $nama_fasilitas,
                    'status' => 1,
                    'created_by' => $id_user
                 );
                $this->DataHandle->insert('tbl_fasilitas', $input_data);    
                $get_id = $this->DataHandle->get_last_id();        

                // DATA INPUT GALERI
                $input_galeri = array(
                    'id_sekolah' => $id_sekolah,
                    'value' => $dataInfo['file_name'],
                    'id_ref' => $get_id,
                    'ket' => 'Fasilitas',
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
                redirect('Fasilitas');   

            }
            else{
                $this->session->set_flashdata('msg', '
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;</button>
                    <i class="fa fa-check m-l-5"></i> Gambar Bermasalah !!!!
                </div>');  

                redirect('Fasilitas');
            }
            
        }
        // KONDISI GAMBAR KOSONG
        else{
            // DATA INPUT ARTIKEL
            $input_data = array(
                'id_sekolah' => $id_sekolah,
                'nama_fasilitas' => $nama_fasilitas,
                'status' => 1,
                'created_by' => $id_user
             );
            $this->DataHandle->insert('tbl_fasilitas', $input_data); 
            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                &times;</button>
                <i class="fa fa-check m-l-5"></i> Data Berhasil Ditambahkan ... 
            </div>');  
            redirect('Fasilitas');   
        }    
    }

    public function delete($id_fasilitas)
    {
        $id_user = $this->session->userdata('id_user');
        $data = array(
            'status' => '0',
            'updated_by' => $id_user
         );
        $where = array(
            'id_fasilitas' => $id_fasilitas
         );
        $this->DataHandle->edit('tbl_fasilitas', $data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Dihapus ... 
        </div>');  

        redirect('Fasilitas');     
    }

    public function get_data($id_fasilitas){
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1'"); 
        $where = array(
            'id_fasilitas' => $id_fasilitas
         );
        $data['data_fasilitas'] = $this->DataHandle->other_query("SELECT tbl_sekolah.id_sekolah, tbl_fasilitas.id_fasilitas, tbl_fasilitas.nama_fasilitas,  tbl_fasilitas.`status`, tbl_galeri.ket, tbl_galeri.`value` FROM tbl_fasilitas LEFT OUTER JOIN tbl_galeri ON tbl_fasilitas.id_fasilitas = tbl_galeri.id_ref INNER JOIN tbl_sekolah ON tbl_fasilitas.id_sekolah = tbl_sekolah.id_sekolah WHERE tbl_fasilitas.`status` = '1' AND tbl_fasilitas.id_fasilitas ='".$id_fasilitas."'");
        $this->template->back_end('back_end/v_edit_fasilitas', $data);
    }

    public function edit(){
        $this->load->library('upload'); //pemanggilan library upload
        $id_user = $this->session->userdata('id_user');
        $nama_fasilitas = $this->input->post('nama_fasilitas');
        $id_sekolah = $this->input->post('id_sekolah'); 
        $id_fasilitas = $this->input->post('id_fasilitas');

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
                    'nama_fasilitas' => $nama_fasilitas,
                    'updated_by' => $id_user
                 );
                $where = array(
                    'id_fasilitas' => $id_fasilitas
                 );
                $this->DataHandle->edit('tbl_fasilitas', $edit_data, $where);

                // JIKA GAMBAR TIDAK ADA
                if ($gambar_lama == "") {
                    // DATA INPUT GALERI
                    $input_galeri = array(
                        'id_sekolah' => $id_sekolah,
                        'value' => $dataInfo['file_name'],
                        'id_ref' => $id_fasilitas,
                        'ket' => 'Fasilitas',
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
                        'id_ref' => $id_fasilitas,
                        'ket' => 'Fasilitas'
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
                redirect('Fasilitas');   

            }
            else{
                $this->session->set_flashdata('msg', '
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;</button>
                    <i class="fa fa-check m-l-5"></i> Gambar Bermasalah !!!!
                </div>');  

                redirect('Fasilitas'); 
            }
            
        }
        // KONDISI GAMBAR KOSONG
        else{
            // DATA EDIT ARTIKEL
        $edit_data = array(
            'id_sekolah' => $id_sekolah,
            'nama_fasilitas' => $nama_fasilitas,
            'updated_by' => $id_user
         );
        $where = array(
            'id_fasilitas' => $id_fasilitas
         );
        $this->DataHandle->edit('tbl_fasilitas', $edit_data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Diperbaharui ... 
        </div>');  

        redirect('Fasilitas'); 
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
