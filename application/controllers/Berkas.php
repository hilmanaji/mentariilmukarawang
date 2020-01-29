<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas extends CI_Controller {

    private $role_user, $id_sekolah, $kondisi;
    private $nama_tabel = 'tbl_file';

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
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1' AND id_sekolah != '0'");          
        $data['data_berkas'] = $this->DataHandle->other_query("SELECT tbl_sekolah.nama as nama_sekolah,".$this->nama_tabel.".* FROM ".$this->nama_tabel." INNER JOIN tbl_sekolah ON ".$this->nama_tabel.".id_sekolah = tbl_sekolah.id_sekolah WHERE ".$this->nama_tabel.".`status` = '1' ".$this->kondisi." ");		
        $this->template->back_end('back_end/v_data_berkas', $data);
    }

    public function form_add()
    {
        $data['id_sekolah'] = $this->id_sekolah;
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1' AND id_sekolah != '0'");
        $this->template->back_end('back_end/v_add_berkas', $data);
    }

    public function add(){
        $this->load->library('upload'); //pemanggilan library upload
        $id_user = $this->session->userdata('id_user');
        $keterangan = $this->input->post('keterangan');
        $id_sekolah = $this->input->post('id_sekolah');

        // KONDISI GAMBAR ADA
        if ($_FILES['userfile']['name'] != NULL) {
            $dataInfo = array();
            $files = $_FILES;

            // GET EKSTENSI FILE
            $nama_file = $files['userfile']['name'];
            $pecah = explode(".", $nama_file);
            $ext_file = $pecah[1];
            // GET EKSTENSI FILE

            $tanggal = date('dmy');

            $_FILES['userfile']['name']= str_replace(" ", "_", $keterangan)."_".$tanggal.".".$ext_file;
            $_FILES['userfile']['type']= $files['userfile']['type'];
            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'];
            $_FILES['userfile']['error']= $files['userfile']['error'];
            $_FILES['userfile']['size']= $files['userfile']['size']; 

            $this->upload->initialize($this->set_upload_options());
            if ($this->upload->do_upload()) {
                $dataInfo = $this->upload->data(); 
                // if ($dataInfo['file_size'] > 1024) {
                //     $this->resize($dataInfo['file_name']);

                // }        
                // DATA INPUT FASILITAS
                $input_data = array(
                    'id_sekolah' => $id_sekolah,
                    'keterangan' => $keterangan,
                    'status' => 1,
                    'created_by' => $id_user,
                    'value' => $dataInfo['file_name']
                 );
                $this->DataHandle->insert('tbl_file', $input_data);    
  
                $this->session->set_flashdata('msg', '
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;</button>
                    <i class="fa fa-check m-l-5"></i> Data Berhasil Ditambahkan ... 
                </div>');  
                redirect('Berkas');   

            }
            else{
                $this->session->set_flashdata('msg', '
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;</button>
                    <i class="fa fa-check m-l-5"></i> Berkas Bermasalah !!!!
                </div>');  

                redirect('Berkas');
            }
            
        }
        // KONDISI GAMBAR KOSONG
        else{
            // DATA INPUT ARTIKEL
            $input_data = array(
                'id_sekolah' => $id_sekolah,
                'keterangan' => $keterangan,
                'status' => 1,
                'created_by' => $id_user
             );
            $this->DataHandle->insert('tbl_file', $input_data); 
            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                &times;</button>
                <i class="fa fa-check m-l-5"></i> Data Berhasil Ditambahkan ... 
            </div>');  
            redirect('Berkas');
        }    
    }

    public function delete($id_file)
    {
        $id_user = $this->session->userdata('id_user');
        $data = array(
            'status' => '0',
            'updated_by' => $id_user
         );
        $where = array(
            'id_file' => $id_file
         );
        $this->DataHandle->edit($this->nama_tabel, $data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Dihapus ... 
        </div>');  

        redirect('Berkas');     
    }

    public function get_data($id_file){
        $data['id_sekolah_sess'] = $this->id_sekolah;
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1' AND id_sekolah != '0'"); 
        $where = array(
            'id_file' => $id_file
         );
        $data['data_berkas'] = $this->DataHandle->other_query("SELECT tbl_sekolah.nama as nama_sekolah, ".$this->nama_tabel.".id_file, tbl_sekolah.id_sekolah, ".$this->nama_tabel.".* FROM ".$this->nama_tabel." INNER JOIN tbl_sekolah ON ".$this->nama_tabel.".id_sekolah = tbl_sekolah.id_sekolah WHERE ".$this->nama_tabel.".`status` = '1' AND ".$this->nama_tabel.".id_file ='".$id_file."'");
        $this->template->back_end('back_end/v_edit_berkas', $data);
    }

    public function edit(){
        $this->load->library('upload'); //pemanggilan library upload
        $id_user = $this->session->userdata('id_user');
        $keterangan = $this->input->post('keterangan');
        $id_sekolah = $this->input->post('id_sekolah'); 
        $id_file = $this->input->post('id_file');

        // KONDISI GAMBAR ADA
        if ($_FILES['userfile']['name'] != NULL) {
            $file_lama = $this->input->post('file_lama');
            $dataInfo = array();
            $files = $_FILES;

            // GET EKSTENSI FILE
            $nama_file = $files['userfile']['name'];
            $pecah = explode(".", $nama_file);
            $ext_file = $pecah[1];
            // GET EKSTENSI FILE

            $tanggal = date('dmy');

            $_FILES['userfile']['name']= str_replace(" ", "_", $keterangan)."_".$tanggal.".".$ext_file;
            $_FILES['userfile']['type']= $files['userfile']['type'];
            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'];
            $_FILES['userfile']['error']= $files['userfile']['error'];
            $_FILES['userfile']['size']= $files['userfile']['size']; 

            $this->upload->initialize($this->set_upload_options());
            if ($this->upload->do_upload()) {
                $dataInfo = $this->upload->data(); 

                // JIKA GAMBAR TIDAK ADA
                if ($gambar_lama == "") {      
                    // DATA EDIT FASILITAS
                    $edit_data = array(
                        'id_sekolah' => $id_sekolah,
                        'value' => $dataInfo['file_name'],
                        'keterangan' => $keterangan,
                        'updated_by' => $id_user
                     );
                    $where = array(
                        'id_file' => $id_file
                     );
                    $this->DataHandle->edit($this->nama_tabel, $edit_data, $where);
                }
                // JIKA GAMBAR ADA
                else{
                    // DATA EDIT FASILITAS
                    $edit_data = array(
                        'id_sekolah' => $id_sekolah,
                        'value' => $dataInfo['file_name'],
                        'keterangan' => $keterangan,
                        'updated_by' => $id_user
                     );
                    $where = array(
                        'id_file' => $id_file
                     );
                    $this->DataHandle->edit($this->nama_tabel, $edit_data, $where);
                }   
                // HAPUS GAMBAR LAMA   
                $this->session->set_flashdata('msg', '
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;</button>
                <i class="fa fa-check m-l-5"></i> Data Berhasil Perbaharui ... 
                </div>');  
                redirect('Berkas');   

            }
            else{
                $this->session->set_flashdata('msg', '
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;</button>
                    <i class="fa fa-check m-l-5"></i> File Bermasalah !!!!
                </div>');  

                redirect('Berkas'); 
            }
            
        }
        // KONDISI GAMBAR KOSONG
        else{
            // DATA EDIT Fasilitas
        $edit_data = array(
            'id_sekolah' => $id_sekolah,
            'keterangan' => $keterangan,
            'updated_by' => $id_user
         );
        $where = array(
            'id_file' => $id_file
         );
        $this->DataHandle->edit($this->nama_tabel, $edit_data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Diperbaharui ... 
        </div>');  

        redirect('Berkas'); 
        }
    }

    private function set_upload_options(){
        $config['upload_path'] = './assets/plugins/file';
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx';
        $config['max_size'] = 0;
        $config['encrypt_name'] = FALSE;
        $config['overwrite']     = FALSE;

        return $config;        
    }
}
