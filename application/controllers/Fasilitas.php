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
        $data['data_fasilitas'] = $this->DataHandle->get_two('tbl_fasilitas', 'tbl_sekolah','tbl_fasilitas.*, tbl_sekolah.nama as nama_sekolah', 'tbl_sekolah.id_sekolah = tbl_fasilitas.id_sekolah', "tbl_fasilitas.status = '1'");		
        $this->template->back_end('back_end/v_data_fasilitas', $data);
    }

    public function add()
    {
        $id_user = $this->session->userdata('id_user');
        $nama_fasilitas = $this->input->post('nama_fasilitas');
        $id_sekolah = $this->input->post('id_sekolah');

        // DATA INPUT KEGIATAN
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
        $data['data_fasilitas'] = $this->DataHandle->getAllWhere('tbl_fasilitas', '*', $where);
        $this->template->back_end('back_end/v_edit_fasilitas', $data);
    }

    public function edit()
    {
        $id_user = $this->session->userdata('id_user');
        $nama_fasilitas = $this->input->post('nama_fasilitas');
        $id_sekolah = $this->input->post('id_sekolah'); 
        $id_fasilitas = $this->input->post('id_fasilitas'); 

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
