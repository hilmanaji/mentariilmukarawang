<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

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
        $id_user = $this->session->userdata('id_user');
        $data['data_profil'] = $this->DataHandle->getAllWhere('tbl_user', '*', "status = '1' AND id_user ='".$id_user."'"); 
        $this->template->back_end('back_end/v_profil', $data);
    }

    public function update_profil()
    {
        $id_user = $this->session->userdata('id_user');
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $kontak = $this->input->post('kontak');
        $email = $this->input->post('email');     
        $password = md5($this->input->post('password'));
        $retypepassword = md5($this->input->post('retypepassword'));

        if ($this->input->post('retypepassword') =='' && $this->input->post('password') == '') { 

            $edit_data = array(
                'username' => $username,
                'nama' => $nama,
                'alamat' => $alamat,
                'kontak' => $kontak,
                'email' => $email,
                'updated_by' => $id_user
             );
            $where = array(
                'id_user' => $id_user
             );
            $this->DataHandle->edit('tbl_user', $edit_data, $where);
                $this->session->set_flashdata('msg', '
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;</button>
                    <i class="fa fa-check m-l-5"></i> Data Profil telah Diperbaharui.. :D 
                </div>');  

                redirect('Profil'); 
        }
        else{
            if ($password != $retypepassword) {
                $this->session->set_flashdata('msg', '
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;</button>
                    <i class="fa fa-check m-l-5"></i> Password dan Re-Type Password Wajib sama... 
                </div>');  

                redirect('Profil');            
            }
            else{ 

            $edit_data = array(
                'username' => $username,
                'nama' => $nama,
                'alamat' => $alamat,
                'kontak' => $kontak,
                'email' => $email,
                'password' => $password,
                'updated_by' => $id_user
             );
            $where = array(
                'id_user' => $id_user
             );
            $this->DataHandle->edit('tbl_user', $edit_data, $where);
                $this->session->set_flashdata('msg', '
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;</button>
                    <i class="fa fa-check m-l-5"></i> Data Profil telah Diperbaharui.. :D 
                </div>');  
                redirect('Profil');            
            }
        }

    }
    
}
