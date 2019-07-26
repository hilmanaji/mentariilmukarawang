<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

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
        $data['data_artikel'] = $this->DataHandle->get_two('tbl_artikel', 'tbl_sekolah','tbl_artikel.*, tbl_sekolah.nama as nama_sekolah', 'tbl_sekolah.id_sekolah = tbl_artikel.id_sekolah', "tbl_artikel.status = '1'");		
        $this->template->back_end('back_end/v_data_artikel', $data);
    }

    public function add()
    {
        $id_user = $this->session->userdata('id_user');
        $id_sekolah = $this->input->post('id_sekolah');
        $isi = $this->input->post('isi');
        $judul_artikel = $this->input->post('judul_artikel');

        // DATA INPUT ARTIKEL
        $input_data = array(
            'id_sekolah' => $id_sekolah,
            'isi' => $isi,
            'judul_artikel' => $judul_artikel,
            'status' => 1,
            'created_by' => $id_user
         );
        $this->DataHandle->insert('tbl_artikel', $input_data);
        $this->session->set_flashdata('msg', '
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Ditambahkan ... 
        </div>');  

        redirect('Artikel');      
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
        $data['data_artikel'] = $this->DataHandle->getAllWhere('tbl_artikel', '*', $where);
        $this->template->back_end('back_end/v_edit_artikel', $data);
    }

    public function edit()
    {
        $id_user = $this->session->userdata('id_user');
        $id_sekolah = $this->input->post('id_sekolah'); 
        $id_artikel = $this->input->post('id_artikel'); 
        $id_sekolah = $this->input->post('id_sekolah');
        $isi = $this->input->post('isi');
        $judul_artikel = $this->input->post('judul_artikel');

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
            <i class="fa fa-check m-l-5"></i> Data Berhasil Diperbaharui ... 
        </div>');  

        redirect('Artikel');   
    }
}
