<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

    private $role_user, $id_sekolah, $kondisi;
    private $nama_tabel = 'tbl_kegiatan';

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
        $data['data_kegiatan'] = $this->DataHandle->get_two($this->nama_tabel, 'tbl_sekolah',''.$this->nama_tabel.'.*, tbl_sekolah.nama as nama_sekolah', 'tbl_sekolah.id_sekolah = '.$this->nama_tabel.'.id_sekolah', "".$this->nama_tabel.".status = '1' ".$this->kondisi."");		
        $this->template->back_end('back_end/v_data_kegiatan', $data);
    }

    public function form_add()
    {
        $data['id_sekolah'] = $this->id_sekolah;
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1'");
        $this->template->back_end('back_end/v_add_kegiatan', $data);
    }

    public function add()
    {
        $id_user = $this->session->userdata('id_user');
        $nama_kegiatan = $this->input->post('nama_kegiatan');
        $deskripsi_kegiatan = $this->input->post('deskripsi_kegiatan');
        $id_sekolah = $this->input->post('id_sekolah');

        // DATA INPUT KEGIATAN
        $input_data = array(
            'id_sekolah' => $id_sekolah,
            'nama_kegiatan' => $nama_kegiatan,
            'deskripsi_kegiatan' => $deskripsi_kegiatan,
            'status' => 1,
            'created_by' => $id_user
         );
        $this->DataHandle->insert('tbl_kegiatan', $input_data);
        $this->session->set_flashdata('msg', '
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Ditambahkan ... 
        </div>');  

        redirect('Kegiatan');     
    }

    public function delete($id_kegiatan)
    {
        $id_user = $this->session->userdata('id_user');
        $data = array(
            'status' => '0',
            'updated_by' => $id_user
         );
        $where = array(
            'id_kegiatan' => $id_kegiatan
         );
        $this->DataHandle->edit('tbl_kegiatan', $data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Dihapus ... 
        </div>');  

        redirect('Kegiatan');     
    }

    public function get_data($id_kegiatan){
        $data['id_sekolah_sess'] = $this->id_sekolah;
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1'"); 
        $where = array(
            'id_kegiatan' => $id_kegiatan
         );
        $data['data_kegiatan'] = $this->DataHandle->getAllWhere('tbl_kegiatan', '*', $where);
        $this->template->back_end('back_end/v_edit_kegiatan', $data);
    }

    public function edit()
    {
        $id_user = $this->session->userdata('id_user');
        $nama_kegiatan = $this->input->post('nama_kegiatan');
        $deskripsi_kegiatan = $this->input->post('deskripsi_kegiatan');
        $id_sekolah = $this->input->post('id_sekolah');        
        $id_kegiatan = $this->input->post('id_kegiatan');        

        $edit_data = array(
            'id_sekolah' => $id_sekolah,
            'nama_kegiatan' => $nama_kegiatan,
            'deskripsi_kegiatan' => $deskripsi_kegiatan,
            'updated_by' => $id_user
         );
        $where = array(
            'id_kegiatan' => $id_kegiatan
         );
        $this->DataHandle->edit('tbl_kegiatan', $edit_data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Diperbaharui ... 
        </div>');  

        redirect('Kegiatan');
    }
}
