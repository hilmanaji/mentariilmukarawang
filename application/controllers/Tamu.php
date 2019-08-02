<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tamu extends CI_Controller {

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
        $data['data_tamu'] = $this->DataHandle->getAllWhere('tbl_tamu', '*', "tbl_tamu.status = '1'");		
        $this->template->back_end('back_end/v_data_tamu', $data);
    }

    public function delete($id_tamu)
    {
        $id_user = $this->session->userdata('id_user');
        $data = array(
            'status' => '0',
            'updated_by' => $id_user
         );
        $where = array(
            'id_tamu' => $id_tamu
         );
        $this->DataHandle->edit('tbl_tamu', $data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Tamu Berhasil Dihapus ... 
        </div>');  

        redirect('Tamu');     
    }
}
