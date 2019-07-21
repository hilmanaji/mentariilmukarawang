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
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1'");		
        $this->template->back_end('template_back_end/v_data_sekolah', $data);
	}

	public function add()
	{
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$kontak = $this->input->post('kontak');
		$email = $this->input->post('email');        

		// DATA INPUT SEKOLAH
        $input_data = array(
            'id_sekolah' => '',
            'nama' => $nama,
            'alamat' => $alamat,
            'kontak' => $kontak,
            'email' => $email,
            'created_by' => '1'
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
        $data = array(
            'status' => '0'
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
}
