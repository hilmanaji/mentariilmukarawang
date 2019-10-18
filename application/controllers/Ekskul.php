<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekskul extends CI_Controller {

    private $role_user, $id_sekolah, $kondisi;
    private $nama_tabel = 'tbl_ekskul';

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
        $data['data_ekskul'] = $this->DataHandle->get_two($this->nama_tabel, 'tbl_sekolah',''.$this->nama_tabel.'.*, tbl_sekolah.nama as nama_sekolah', 'tbl_sekolah.id_sekolah = '.$this->nama_tabel.'.id_sekolah', "".$this->nama_tabel.".status = '1' ".$this->kondisi."");		
        $this->template->back_end('back_end/v_data_ekskul', $data);
    }

    public function form_add()
    {
        $data['id_sekolah'] = $this->id_sekolah;
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1' AND id_sekolah != '0'");
        $this->template->back_end('back_end/v_add_ekskul', $data);
    }

    public function add(){
        $this->load->library('upload'); //pemanggilan library upload
        $id_user = $this->session->userdata('id_user');
        $id_sekolah = $this->input->post('id_sekolah');
        $nama_ekskul = $this->input->post('nama_ekskul');
        $deskripsi_ekskul = $this->input->post('deskripsi_ekskul');

        // KONDISI GAMBAR ADA
        if ($_FILES['userfile']['name'] != NULL) {
            $dataInfo = array();
            $files = $_FILES;
            $_FILES['userfile']['name']= $files['userfile']['name'];
            $_FILES['userfile']['type']= $files['userfile']['type'];
            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'];
            $_FILES['userfile']['error']= $files['userfile']['error'];
            $_FILES['userfile']['size']= $files['userfile']['size']; 

            $this->upload->initialize($this->set_upload_options());
            if ($this->upload->do_upload()) {
                $dataInfo = $this->upload->data(); 
                if ($dataInfo['file_size'] > 1024) {
                    $this->resize($dataInfo['file_name']);

                }             
                // DATA INPUT EKSKUL
                $inpute_ekskul = array(
                    'id_sekolah' => $id_sekolah,
                    'nama_ekskul' => $nama_ekskul,
                    'deskripsi_ekskul' => $deskripsi_ekskul,
                    'value' => $dataInfo['file_name'],
                    'status' => 1,
                    'created_by' => $id_user
                 );
                $this->DataHandle->insert($this->nama_tabel, $inpute_ekskul);    
                $this->session->set_flashdata('msg', '
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;</button>
                    <i class="fa fa-check m-l-5"></i> Data Berhasil Ditambahkan ... 
                </div>');  
                redirect('Ekskul');   

            }
            else{
                $this->session->set_flashdata('msg', '
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;</button>
                    <i class="fa fa-check m-l-5"></i> Gambar Bermasalah !!!!
                </div>');  

                redirect('Ekskul');
            }
            
        }
        // KONDISI GAMBAR KOSONG
        else{ 
            // DATA INPUT EKSKUL
            $input_ekskul = array(
                'id_sekolah' => $id_sekolah,
                'nama_ekskul' => $nama_ekskul,
                'deskripsi_ekskul' => $deskripsi_ekskul,
                'status' => 1,
                'created_by' => $id_user
             );
            $this->DataHandle->insert($this->nama_tabel, $input_ekskul);  
            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                &times;</button>
                <i class="fa fa-check m-l-5"></i> Data Berhasil Ditambahkan ... 
            </div>');  
            redirect('Ekskul');   
        }      
    }

    public function delete($id_ekskul)
    {
        $id_user = $this->session->userdata('id_user');
        $data = array(
            'status' => '0',
            'updated_by' => $id_user
         );
        $where = array(
            'id_ekskul' => $id_ekskul
         );
        $this->DataHandle->edit($this->nama_tabel, $data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Dihapus ... 
        </div>');  

        redirect('Ekskul');     
    }

    public function get_data($id_ekskul){
        $data['id_sekolah_sess'] = $this->id_sekolah;
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1' AND id_sekolah != '0'"); 
        $where = array(
            'id_ekskul' => $id_ekskul
         );
        $data['data_ekskul'] = $this->DataHandle->getAllWhere($this->nama_tabel, '*', $where);
        $this->template->back_end('back_end/v_edit_ekskul', $data);
    }

    public function edit(){
        $this->load->library('upload'); //pemanggilan library upload
        $id_user = $this->session->userdata('id_user');
        $id_sekolah = $this->input->post('id_sekolah');
        $id_ekskul = $this->input->post('id_ekskul'); 
        $deskripsi_ekskul = $this->input->post('deskripsi_ekskul');
        $nama_ekskul = $this->input->post('nama_ekskul');

        // KONDISI GAMBAR ADA
        if ($_FILES['userfile']['name'] != NULL) {
            $gambar_lama = $this->input->post('gambar_lama');
            $dataInfo = array();
            $files = $_FILES;
            $_FILES['userfile']['name']= $files['userfile']['name'];
            $_FILES['userfile']['type']= $files['userfile']['type'];
            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'];
            $_FILES['userfile']['error']= $files['userfile']['error'];
            $_FILES['userfile']['size']= $files['userfile']['size']; 

            $this->upload->initialize($this->set_upload_options());
            if ($this->upload->do_upload()) {
                $dataInfo = $this->upload->data();         
                // DATA EDIT ARTIKEL
                $edit_data = array(
                    'id_sekolah' => $id_sekolah,
                    'deskripsi_ekskul' => $deskripsi_ekskul,
                    'nama_ekskul' => $nama_ekskul,
                    'updated_by' => $id_user
                 );
                $where = array(
                    'id_ekskul' => $id_ekskul
                 );
                $this->DataHandle->edit($this->nama_tabel, $edit_data, $where);    

                // JIKA GAMBAR TIDAK ADA
                if ($gambar_lama == "") {
                    // DATA EDIT ARTIKEL
                    if ($dataInfo['file_size'] > 1024) {
                        $this->resize($dataInfo['file_name']);

                    }        
                    $edit_data = array(
                        'id_sekolah' => $id_sekolah,
                        'deskripsi_ekskul' => $deskripsi_ekskul,
                        'value' => $dataInfo['file_name'],
                        'nama_ekskul' => $nama_ekskul,
                        'updated_by' => $id_user
                     );
                    $where = array(
                        'id_ekskul' => $id_ekskul
                     );
                    $this->DataHandle->edit($this->nama_tabel, $edit_data, $where);
                }
                // JIKA GAMBAR ADA
                else{            // DATA EDIT ARTIKEL
                    if ($dataInfo['file_size'] > 1024) {
                        $this->resize($dataInfo['file_name']);

                    }        
                    $edit_data = array(
                        'id_sekolah' => $id_sekolah,
                        'deskripsi_ekskul' => $deskripsi_ekskul,
                        'nama_ekskul' => $nama_ekskul,
                        'value' => $dataInfo['file_name'],
                        'updated_by' => $id_user
                     );
                    $where = array(
                        'id_ekskul' => $id_ekskul
                     );
                    $this->DataHandle->edit($this->nama_tabel, $edit_data, $where);
                    unlink('./assets/plugins/images/image/'.$gambar_lama);
                }   
                // HAPUS GAMBAR LAMA   
                $this->session->set_flashdata('msg', '
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;</button>
                <i class="fa fa-check m-l-5"></i> Data Berhasil Perbaharui ... 
                </div>');  
                redirect('Ekskul');   

            }
            else{
                $this->session->set_flashdata('msg', '
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;</button>
                    <i class="fa fa-check m-l-5"></i> Gambar Bermasalah !!!!
                </div>');  

                redirect('Ekskul');
            }
            
        }
        // KONDISI GAMBAR KOSONG
        else{
            // DATA EDIT ARTIKEL
            $edit_data = array(
                'id_sekolah' => $id_sekolah,
                'deskripsi_ekskul' => $deskripsi_ekskul,
                'nama_ekskul' => $nama_ekskul,
                'updated_by' => $id_user
             );
            $where = array(
                'id_ekskul' => $id_ekskul
             );
            $this->DataHandle->edit($this->nama_tabel, $edit_data, $where);
            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                &times;</button>
                <i class="fa fa-check m-l-5"></i> Data Berhasil Perbaharui ... 
            </div>');  
            redirect('Ekskul');   
        }
    }

    private function set_upload_options(){
        $config['upload_path'] = './assets/plugins/images/image';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
        $config['max_size'] = 0;
        $config['encrypt_name'] = TRUE;
        $config['overwrite']     = FALSE;

        return $config;        
    }
    private function resize($nama_file_baru){
        $this->load->library('image_lib');

        $conf['image_library']='gd2';
        $conf['source_image']='./assets/plugins/images/image/'.$nama_file_baru;
        $conf['create_thumb']= FALSE;
        $conf['maintain_ratio']= TRUE;
        $conf['quality']= '60%';
        $conf['width']= 1200;
        $conf['height']= 900;
        $conf['new_image']= './assets/plugins/images/image/'.$nama_file_baru;

        $this->image_lib->clear();
        $this->image_lib->initialize($conf);
        $this->image_lib->resize();

    }
}
