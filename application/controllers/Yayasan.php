<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yayasan extends CI_Controller {

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
        $data['data_yayasan'] = $this->DataHandle->getAllWhere('tbl_yayasan', '*', "status = '1'");
        $this->template->back_end('back_end/v_data_yayasan', $data);
    }

    public function get_data($id_yayasan){
        $where = array(
            'id_yayasan' => $id_yayasan
         );
        $data['data_yayasan'] = $this->DataHandle->getAllWhere('tbl_yayasan', '*', $where);
        $this->template->back_end('back_end/v_edit_yayasan', $data);
    }

    public function edit()
    {
        $id_user = $this->session->userdata('id_user');
        $id_yayasan = $this->input->post('id_yayasan');
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
            'id_yayasan' => $id_yayasan
         );
        $this->DataHandle->edit('tbl_yayasan', $edit_data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Diperbaharui ... 
        </div>');  

        redirect('Yayasan');     
    }
}
