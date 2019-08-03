<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

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
        $data['data_video'] = $this->DataHandle->get_two('tbl_video', 'tbl_sekolah','tbl_video.*, tbl_sekolah.nama as nama_sekolah', 'tbl_sekolah.id_sekolah = tbl_video.id_sekolah', "tbl_video.status = '1'");		
        $this->template->back_end('back_end/v_data_video', $data);
    }

    public function add()
    {
        $id_user = $this->session->userdata('id_user');
        $judul = $this->input->post('judul');
        $deskripsi = $this->input->post('deskripsi');
        $id_sekolah = $this->input->post('id_sekolah');
        $link = $this->input->post('link');

        // DATA INPUT KEGIATAN
        $input_data = array(
            'id_sekolah' => $id_sekolah,
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'link' => $link,
            'status' => 1,
            'created_by' => $id_user
         );
        $this->DataHandle->insert('tbl_video', $input_data);
        $this->session->set_flashdata('msg', '
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Ditambahkan ... 
        </div>');  

        redirect('Video');     
    }

    public function delete($id_video)
    {
        $id_user = $this->session->userdata('id_user');
        $data = array(
            'status' => '0',
            'updated_by' => $id_user
         );
        $where = array(
            'id_video' => $id_video
         );
        $this->DataHandle->edit('tbl_video', $data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Dihapus ... 
        </div>');  

        redirect('Video');     
    }

    public function get_data($id_video){
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1'"); 
        $where = array(
            'id_video' => $id_video
         );
        $data['data_video'] = $this->DataHandle->getAllWhere('tbl_video', '*', $where);
        $this->template->back_end('back_end/v_edit_video', $data);
    }

    public function edit()
    {
        $id_user = $this->session->userdata('id_user');
        $id_video = $this->input->post('id_video');
        $judul = $this->input->post('judul');
        $deskripsi = $this->input->post('deskripsi');
        $id_sekolah = $this->input->post('id_sekolah');
        $link = $this->input->post('link');       

        $edit_data = array(
            'id_sekolah' => $id_sekolah,
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'updated_by' => $id_user
         );
        $where = array(
            'id_video' => $id_video
         );
        $this->DataHandle->edit('tbl_video', $edit_data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Diperbaharui ... 
        </div>');  

        redirect('Video');
    }
}
