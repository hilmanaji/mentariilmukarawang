<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FAQ extends CI_Controller {

    private $role_user, $id_sekolah, $kondisi;
    private $nama_tabel = 'tbl_faq';

    function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('id_user')) {
            redirect('Login');
        }
        else{            
            $id_user = $this->session->userdata('id_user');
            $this->role_user = $this->session->userdata('role_user');
            $this->id_sekolah = $this->session->userdata('id_sekolah');
        }        
        if ($this->role_user === '2') { 
            $kondisi = "AND ".$this->nama_tabel.".id_sekolah = '".$this->id_sekolah."'";
            $this->kondisi = $kondisi;
        }
        else{
            $this->kondisi = '';
        }
    }

	public function index()
	{
        $data['id_sekolah'] = $this->id_sekolah;
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1'");          
        $data['data_faq'] = $this->DataHandle->get_two('tbl_faq', 'tbl_sekolah','tbl_faq.*, tbl_sekolah.nama as nama_sekolah', 'tbl_sekolah.id_sekolah = tbl_faq.id_sekolah', "tbl_faq.status = '1' ".$this->kondisi."");		
        $this->template->back_end('back_end/v_data_faq', $data);
    }

    public function add()
    {
        $id_user = $this->session->userdata('id_user');
        $pertanyaan = $this->input->post('pertanyaan');
        $jawaban = $this->input->post('jawaban');
        $id_sekolah = $this->input->post('id_sekolah');

        // DATA INPUT KEGIATAN
        $input_data = array(
            'id_sekolah' => $id_sekolah,
            'pertanyaan' => $pertanyaan,
            'jawaban' => $jawaban,
            'status' => 1,
            'created_by' => $id_user
         );
        $this->DataHandle->insert('tbl_faq', $input_data);
        $this->session->set_flashdata('msg', '
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Ditambahkan ... 
        </div>');  

        redirect('FAQ');     
    }

    public function delete($id_faq)
    {
        $id_user = $this->session->userdata('id_user');
        $data = array(
            'status' => '0',
            'updated_by' => $id_user
         );
        $where = array(
            'id_faq' => $id_faq
         );
        $this->DataHandle->edit('tbl_faq', $data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Dihapus ... 
        </div>');  

        redirect('FAQ');     
    }

    public function get_data($id_faq){
        $data['id_sekolah_sess'] = $this->id_sekolah;
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1'"); 
        $where = array(
            'id_faq' => $id_faq
         );
        $data['data_faq'] = $this->DataHandle->getAllWhere('tbl_faq', '*', $where);
        $this->template->back_end('back_end/v_edit_faq', $data);
    }

    public function edit()
    {
        $id_user = $this->session->userdata('id_user');
        $pertanyaan = $this->input->post('pertanyaan');
        $jawaban = $this->input->post('jawaban');
        $id_sekolah = $this->input->post('id_sekolah'); 
        $id_faq = $this->input->post('id_faq');        

        $edit_data = array(
            'id_sekolah' => $id_sekolah,
            'pertanyaan' => $pertanyaan,
            'jawaban' => $jawaban,
            'updated_by' => $id_user
         );
        $where = array(
            'id_faq' => $id_faq
         );
        $this->DataHandle->edit('tbl_faq', $edit_data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Diperbaharui ... 
        </div>');  

        redirect('FAQ');
    }
}
