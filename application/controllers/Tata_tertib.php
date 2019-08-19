<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tata_tertib extends CI_Controller {

    private $role_user, $id_sekolah, $kondisi;
    private $nama_tabel = 'tbl_tata_tertib';

    function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('id_user')) {
            redirect('Login');
        }
        else{            
            $id_user = $this->session->userdata('id_user');
            $this->role_user = $this->session->userdata('role_user');
            $this->id_sekolah = $this->session->userdata('id_sekolah');
        }        
        if ($this->role_user === '2') { 
            $kondisi = "AND ".$this->nama_tabel.".id_sekolah = '".$this->id_sekolah."'";
            $this->kondisi = $kondisi;
        }
        else{
            $this->kondisi = '';
        }
    }

    public function index()
    {   
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1' AND id_sekolah != '0'");
        $data['data_tata_tertib'] = $this->DataHandle->other_query("SELECT tbl_sekolah.nama as nama_sekolah, tbl_sekolah.id_sekolah, ".$this->nama_tabel.".* FROM tbl_tata_tertib INNER JOIN tbl_sekolah ON tbl_tata_tertib.id_sekolah = tbl_sekolah.id_sekolah WHERE tbl_tata_tertib.`status` = '1' ".$this->kondisi."");      
        $this->template->back_end('back_end/v_data_tatatertib', $data);
    }

    public function form_add()
    {
        $data['id_sekolah'] = $this->id_sekolah;
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1' AND id_sekolah != '0'");
        $this->template->back_end('back_end/v_add_tatatertib', $data);
    }

    public function add()
    {
        $id_user = $this->session->userdata('id_user');
        $id_sekolah = $this->input->post('id_sekolah');
        $isi_tata_tertib = $this->input->post('isi_tata_tertib');
            // DATA INPUT TATA TERTIB
        $input_tata_tertib = array(
            'id_sekolah' => $id_sekolah,
            'isi_tata_tertib' => $isi_tata_tertib,
            'status' => 1,
            'created_by' => $id_user
         );
            $this->DataHandle->insert('tbl_tata_tertib', $input_tata_tertib);  
            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                &times;</button>
                <i class="fa fa-check m-l-5"></i> Data Berhasil Ditambahkan ... 
            </div>');  
            redirect('Tata_tertib');       
    }

    public function delete($id_tata_tertib)
    {
        $id_user = $this->session->userdata('id_user');
        $data = array(
            'status' => '0',
            'updated_by' => $id_user
         );
        $where = array(
            'id_tata_tertib' => $id_tata_tertib
         );
        $this->DataHandle->edit('tbl_tata_tertib', $data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Dihapus ... 
        </div>');  

        redirect('Tata_tertib');     
    }

    public function get_data($id_tata_tertib){
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1' AND id_sekolah != '0'"); 
        $where = array(
            'id_tata_tertib' => $id_tata_tertib
         );
        $data['data_tata_tertib'] = $this->DataHandle->other_query("SELECT tbl_sekolah.nama as nama_sekolah, tbl_sekolah.id_sekolah, ".$this->nama_tabel.".* FROM tbl_tata_tertib INNER JOIN tbl_sekolah ON tbl_tata_tertib.id_sekolah = tbl_sekolah.id_sekolah WHERE tbl_tata_tertib.`status` = '1' ".$this->kondisi." AND tbl_tata_tertib.`id_tata_tertib` = '".$id_tata_tertib."'");
        $this->template->back_end('back_end/v_edit_tatatertib', $data);
    }

    public function edit(){
        $id_user = $this->session->userdata('id_user');
        $id_sekolah = $this->input->post('id_sekolah');
        $id_tata_tertib = $this->input->post('id_tata_tertib'); 
        $isi_tata_tertib = $this->input->post('isi_tata_tertib');
            // DATA EDIT TATA TERTIB
            $edit_data = array(
                'id_sekolah' => $id_sekolah,
                'isi_tata_tertib' => $isi_tata_tertib,
                'updated_by' => $id_user
             );
            $where = array(
                'id_tata_tertib' => $id_tata_tertib
             );
            $this->DataHandle->edit('tbl_tata_tertib', $edit_data, $where);
            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                &times;</button>
                <i class="fa fa-check m-l-5"></i> Data Berhasil Perbaharui ... 
            </div>');  
            redirect('Tata_tertib');      
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
