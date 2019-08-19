<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    private $role_user, $id_sekolah, $kondisi;
    private $nama_tabel = 'tbl_profil';

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
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1' AND id_sekolah != '0'");
        $data['data_profile'] = $this->DataHandle->get_two($this->nama_tabel, 'tbl_sekolah',''.$this->nama_tabel.'.*, tbl_sekolah.nama as nama_sekolah', 'tbl_sekolah.id_sekolah = '.$this->nama_tabel.'.id_sekolah', "".$this->nama_tabel.".status = '1' ".$this->kondisi."");		
        $this->template->back_end('back_end/v_data_profile', $data);
    }

    public function form_add()
    {
        $data['id_sekolah'] = $this->id_sekolah;
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1' AND id_sekolah != '0'");
        $this->template->back_end('back_end/v_add_profile', $data);
    }

    public function add()
    {
        $id_user = $this->session->userdata('id_user');
        $id_sekolah = $this->input->post('id_sekolah');
        $visi = $this->input->post('visi');
        $misi = $this->input->post('misi');
        $motto = $this->input->post('motto');
        $selayang_pandang = $this->input->post('selayang_pandang');

        // DATA INPUT KEGIATAN
        $input_data = array(
            'id_sekolah' => $id_sekolah,
            'visi' => $visi,
            'misi' => $misi,
            'motto' => $motto,
            'selayang_pandang' => $selayang_pandang,
            'status' => 1,
            'created_by' => $id_user
         );
        $this->DataHandle->insert('tbl_profil', $input_data);
        $this->session->set_flashdata('msg', '
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Ditambahkan ... 
        </div>');  

        redirect('Profile');      
    }

    public function delete($id_profil)
    {
        $id_user = $this->session->userdata('id_user');
        $data = array(
            'status' => '0',
            'updated_by' => $id_user
         );
        $where = array(
            'id_profil' => $id_profil
         );
        $this->DataHandle->edit('tbl_profil', $data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Dihapus ... 
        </div>');  

        redirect('Profile');     
    }

    public function get_data($id_profil){
        $data['id_sekolah_sess'] = $this->id_sekolah;
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1' AND id_sekolah != '0'"); 
        $where = array(
            'id_profil' => $id_profil
         );
        $data['data_profile'] = $this->DataHandle->getAllWhere('tbl_profil', '*', $where);
        $this->template->back_end('back_end/v_edit_profile', $data);
    }

    public function edit()
    {
        $id_user = $this->session->userdata('id_user');
        $id_sekolah = $this->input->post('id_sekolah'); 
        $id_profil = $this->input->post('id_profil'); 
        $visi = $this->input->post('visi');
        $misi = $this->input->post('misi');
        $motto = $this->input->post('motto');
        $selayang_pandang = $this->input->post('selayang_pandang');

        $edit_data = array(
            'id_sekolah' => $id_sekolah,
            'visi' => $visi,
            'misi' => $misi,
            'motto' => $motto,
            'selayang_pandang' => $selayang_pandang,
            'updated_by' => $id_user
         );
        $where = array(
            'id_profil' => $id_profil
         );
        $this->DataHandle->edit('tbl_profil', $edit_data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Diperbaharui ... 
        </div>');  

        redirect('Profile');   
    }
}
