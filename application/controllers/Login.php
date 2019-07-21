<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        // $data['permohonan'] = $this->DataHandle->get_order('ms_permohonan', 'status = 1','id');		
        // $this->template->back_end('v_data_user');
        $this->load->view('login/v_login');
	}

	public function data_get()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		
		$where = array(
			'username' => $username,
			'password' => $password,
			'status' => '1'
		);
		$user = $this->DataHandle->get('tbl_user', $where);
		if($user->num_rows() > 0){
			foreach($user->result() as $row){
				if ($row->status != 1) {
					redirect('home');	
				}
				else{
					$id_user = $row->id_user;
					$nama = $row->nama;
					$role_user = $row->role_user;				
				}
			}
			$data_session = array(
				'id_user' => $id_user,
				'nama' => $nama,
				'role_user' => $role_user
			);
            $this->session->set_userdata($data_session);
		        $this->session->set_flashdata('msg', '
		        <div class="alert alert-success alert-dismissable">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
		            &times;</button>
		            Selamat Datang '.$nama.'... 
		        </div>');  
			redirect('User');
		}
		else{
		        $this->session->set_flashdata('msg', '
		        <div class="alert alert-danger alert-dismissable">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
		            &times;</button>
		            Kombinasi Username dan Password tidak ditemukan.. 
		        </div>');  	
				redirect('Login');
		}		
	}
	
	public function logout(){
		$session_items = array('id_user', 'nama', 'role_user');
		$this->session->unset_userdata($session_items);
        $this->session->set_flashdata('msg', '
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            Berhasil Logout ... 
        </div>');  	
        redirect('Login');
	}
}
