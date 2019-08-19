<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1' AND id_sekolah != '0'");	        
        $data['data_user'] = $this->DataHandle->get_two('tbl_user', 'tbl_sekolah', '`tbl_user`.*,`tbl_sekolah`.nama as nama_sekolah', 'tbl_user.id_sekolah = tbl_sekolah.id_sekolah', "tbl_user.status = '1' AND tbl_user.id_sekolah != '0'");
        $this->template->back_end('back_end/v_data_user', $data);
    }

    public function add()
    {
        $id_user = $this->session->userdata('id_user');
        $username = $this->input->post('username');
        $id_sekolah = $this->input->post('id_sekolah');
        $nama = $this->input->post('nama');
        $jk = $this->input->post('jk');
        $alamat = $this->input->post('alamat');
        $kontak = $this->input->post('kontak');
        $email = $this->input->post('email');     
        $password = md5($this->input->post('password'));
        $retypepassword = md5($this->input->post('retypepassword'));

        if ($password != $retypepassword) {
	        $this->session->set_flashdata('msg', '
	        <div class="alert alert-danger alert-dismissable">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
	            &times;</button>
	            <i class="fa fa-warning m-l-5"></i> Password dan Ulangi Password harus sama !!! 
	        </div>');  

	        redirect('User'); 
        }
        else{
	        $where = array(
	            'username' => $username,
	            'status' => 1
	         );
	        $cek_username = $this->DataHandle->getAllWhere('tbl_user', '*', $where);
	        $cek_username = $cek_username->num_rows();
		        if ($cek_username > 0) {
		        $this->session->set_flashdata('msg', '
		        <div class="alert alert-warning alert-dismissable">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
		            &times;</button>
		            <i class="fa fa-warning m-l-5"></i> Username Sudah Pernah Ada, Gunakan Username lain ... 
		        </div>');  

		        redirect('User'); 
	        }
	        else{	        	
		        // DATA INPUT USER
		        $input_data = array(
		            'username' => $username,
		            'id_sekolah' => $id_sekolah,
		            'nama' => $nama,
		            'jk' => $jk,
		            'alamat' => $alamat,
		            'kontak' => $kontak,
		            'email' => $email,
		            'password' => $password,
		            'role_user' => '2',
		            'status' => 1,
		            'created_by' => $id_user
		         );
		        $this->DataHandle->insert('tbl_user', $input_data);
		        $this->session->set_flashdata('msg', '
		        <div class="alert alert-success alert-dismissable">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
		            &times;</button>
		            <i class="fa fa-check m-l-5"></i> Data Berhasil Ditambahkan ... 
		        </div>');  

		        redirect('User');  
	        }
        }   
    }

    public function delete($id)
    {
        $id_user = $this->session->userdata('id_user');
        $data = array(
            'status' => '0',
            'updated_by' => $id_user
         );
        $where = array(
            'id_user' => $id
         );
        $this->DataHandle->edit('tbl_user', $data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Dihapus ... 
        </div>');  

        redirect('User');     
    }

    public function get_data($id_user){
        $where = array(
            'id_user' => $id_user
         );
        $data['data_user'] = $this->DataHandle->getAllWhere('tbl_user', '*', $where);
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1' AND id_sekolah != '0'");	
        $this->template->back_end('back_end/v_edit_user', $data);
    }

    public function edit()
    {
        $id_user = $this->session->userdata('id_user');
        $id = $this->input->post('id_user');
        $username = $this->input->post('username');
        $id_sekolah = $this->input->post('id_sekolah');
        $nama = $this->input->post('nama');
        $jk = $this->input->post('jk');
        $alamat = $this->input->post('alamat');
        $kontak = $this->input->post('kontak');
        $email = $this->input->post('email');     

        $edit_data = array(
	        'username' => $username,
	        'id_sekolah' => $id_sekolah,
	        'nama' => $nama,
	        'jk' => $jk,
	        'alamat' => $alamat,
	        'kontak' => $kontak,
	        'email' => $email,
	        'updated_by' => $id_user
         );
        $where = array(
            'id_user' => $id
         );
        $this->DataHandle->edit('tbl_user', $edit_data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Diperbaharui ... 
        </div>');  

        redirect('User');     
    }
}
