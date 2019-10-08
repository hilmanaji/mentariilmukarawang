<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {

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

        if ($_SESSION['id_sekolah'] == '0') 
        {
            $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1' AND id_sekolah != '0'");
        }
        else
        {
            $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1' AND id_sekolah != '0' AND id_sekolah = '".$_SESSION['id_sekolah']."'");
        }

        $this->template->back_end('back_end/v_data_sekolah', $data);
    }

    public function add()
    {
        $id_user = $this->session->userdata('id_user');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $kontak = $this->input->post('kontak');
        $email = $this->input->post('email');        
        $fb = $this->input->post('fb');        
        $instagram = $this->input->post('instagram');
        $twitter = $this->input->post('twitter');
        $youtube = $this->input->post('youtube');

        // DATA INPUT SEKOLAH
        $input_data = array(
            'id_sekolah' => '',
            'nama' => $nama,
            'alamat' => $alamat,
            'kontak' => $kontak,
            'email' => $email,
            'fb' => $fb,
            'instagram' => $instagram,
            'twitter' => $twitter,
            'youtube' => $youtube,
            'created_by' => $id_user
         );
        $this->DataHandle->insert('tbl_sekolah', $input_data);
        $this->session->set_flashdata('msg', '
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Ditambahkan ... 
        </div>');  

        redirect('Sekolah');     
    }

    public function delete($id_sekolah)
    {
        $id_user = $this->session->userdata('id_user');
        $data = array(
            'status' => '0',
            'updated_by' => $id_user
         );
        $where = array(
            'id_sekolah' => $id_sekolah
         );
        $this->DataHandle->edit('tbl_sekolah', $data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Dihapus ... 
        </div>');  

        redirect('Sekolah');     
    }

    public function get_data($id_sekolah){
        $where = array(
            'id_sekolah' => $id_sekolah
         );
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', $where);
        $this->template->back_end('back_end/v_edit_sekolah', $data);
    }

    public function edit()
    {
        $id_user = $this->session->userdata('id_user');
        $id_sekolah = $this->input->post('id_sekolah');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $kontak = $this->input->post('kontak');
        $email = $this->input->post('email');      
        $fb = $this->input->post('fb');        
        $instagram = $this->input->post('instagram');
        $twitter = $this->input->post('twitter');
        $youtube = $this->input->post('youtube');    

        $edit_data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'kontak' => $kontak,
            'email' => $email,
            'fb' => $fb,
            'instagram' => $instagram,
            'twitter' => $twitter,
            'youtube' => $youtube,
            'updated_by' => $id_user
         );
        $where = array(
            'id_sekolah' => $id_sekolah
         );
        $this->DataHandle->edit('tbl_sekolah', $edit_data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Diperbaharui ... 
        </div>');  

        redirect('Sekolah');     
    }
}
