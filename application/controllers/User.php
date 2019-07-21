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
        // $data['permohonan'] = $this->DataHandle->get_order('ms_permohonan', 'status = 1','id');		
        $this->template->back_end('template_back_end/v_data_user');
	}
}
