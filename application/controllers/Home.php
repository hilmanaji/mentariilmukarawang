<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function welcome()
	{
		$this->template->front_end('front_end/v_welcome');
	}

	public function tentang()
	{
		$this->template->front_end('front_end/v_tentang');
	}

	public function about()
	{
		$this->template->front_end('front_end/v_about');
	}
	// =============================== TEMPLATE LAMA ==============================

	// =============================== TEMPLATE BARU ==============================
	public function index()
	{
		$data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1' AND id_sekolah != '0'");
		$data['data_artikel'] = $this->DataHandle->get2lim6('tbl_artikel', 'tbl_user', 'tbl_artikel.*, tbl_user.username', 'tbl_artikel.created_by = tbl_user.id_user', "tbl_artikel.status = '1'", "tbl_artikel.id_artikel");
		$data['data_pengumuman'] = $this->DataHandle->get2lim6('tbl_pengumuman', 'tbl_user', 'tbl_pengumuman.*, tbl_user.username', 'tbl_pengumuman.created_by = tbl_user.id_user', "tbl_pengumuman.status = '1'", "tbl_pengumuman.id_pengumuman");
		$this->template->front_endnew('front_endnew/v_home', $data);
	}

	public function input_pesan_tamu(){
        $nama_tamu = $this->input->post('nama_tamu');
        $kontak = $this->input->post('kontak');
        $email = $this->input->post('email');
        $pesan = $this->input->post('pesan');

        $input_data = array(
            'nama_tamu' => $nama_tamu,
            'kontak' => $kontak,
            'email' => $email,
            'pesan' => $pesan,
            'status' => 1
         );

        $this->DataHandle->insert('tbl_tamu', $input_data);
        $this->email_sender($email, $nama_tamu);
        redirect('Home/contact');
	}

	public function about_us()
	{
		$data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1' AND id_sekolah != '0'");
		$this->template->front_endnew('front_endnew/v_about', $data);
	}

	public function all_pengumuman()
	{
		$data['data_pengumuman'] = $this->DataHandle->get_two_o('tbl_pengumuman', 'tbl_user', 'tbl_pengumuman.*, tbl_user.username', 'tbl_pengumuman.created_by = tbl_user.id_user', "tbl_pengumuman.status = '1'", "tbl_pengumuman.id_pengumuman");
		$data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1' AND id_sekolah != '0'");
		$this->template->front_endnew('front_endnew/v_all_pengumuman', $data);
	}

	public function detail_pengumuman($id_pengumuman)
	{
		$data['data_pengumuman_detail'] = $this->DataHandle->get_two_o('tbl_pengumuman', 'tbl_user', 'tbl_pengumuman.*, tbl_user.username', 'tbl_pengumuman.created_by = tbl_user.id_user', "tbl_pengumuman.status = '1' AND tbl_pengumuman.id_pengumuman =".$id_pengumuman."", "tbl_pengumuman.id_pengumuman");
		$data['data_pengumuman'] = $this->DataHandle->get_two_o('tbl_pengumuman', 'tbl_user', 'tbl_pengumuman.*, tbl_user.username', 'tbl_pengumuman.created_by = tbl_user.id_user', "tbl_pengumuman.status = '1'", "tbl_pengumuman.id_pengumuman");
		$this->template->front_endnew('front_endnew/v_detail_pengumuman', $data);
	}

	public function all_artikel()
	{
		$data['data_artikel'] = $this->DataHandle->get_two_o('tbl_artikel', 'tbl_user', 'tbl_artikel.*, tbl_user.username', 'tbl_artikel.created_by = tbl_user.id_user', "tbl_artikel.status = '1'", "tbl_artikel.id_artikel");
		$this->template->front_endnew('front_endnew/v_all_artikel', $data);
	}

	public function detail_artikel($id_artikel)
	{
		$data['data_artikel'] = $this->DataHandle->get_two_o('tbl_artikel', 'tbl_user', 'tbl_artikel.*, tbl_user.username', 'tbl_artikel.created_by = tbl_user.id_user', "tbl_artikel.status = '1'", "tbl_artikel.id_artikel");
		$data['data_artikel_detail'] = $this->DataHandle->get_two_o('tbl_artikel', 'tbl_user', 'tbl_artikel.*, tbl_user.username', 'tbl_artikel.created_by = tbl_user.id_user', "tbl_artikel.status = '1' AND tbl_artikel.id_artikel = '".$id_artikel."'", "tbl_artikel.id_artikel");
		$this->template->front_endnew('front_endnew/v_detail_artikel', $data);
	}

	public function sekolah()
	{
		$data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1' AND id_sekolah != '0'");
		$this->template->front_endnew('front_endnew/v_daftar_sekolah', $data);
	}

	public function contact()
	{
		$this->template->front_endnew('front_endnew/v_contact');
	}

	public function faq()
	{
		$data['data_faq'] = $this->DataHandle->get_two_o('tbl_faq', 'tbl_user', 'tbl_faq.*, tbl_user.username', 'tbl_faq.created_by = tbl_user.id_user', "tbl_faq.status = '1'", "tbl_faq.id_faq");
		$data['data_artikel'] = $this->DataHandle->get2lim6('tbl_artikel', 'tbl_user', 'tbl_artikel.*, tbl_user.username', 'tbl_artikel.created_by = tbl_user.id_user', "tbl_artikel.status = '1'", "tbl_artikel.id_artikel");
		$data['data_pengumuman'] = $this->DataHandle->get2lim6('tbl_pengumuman', 'tbl_user', 'tbl_pengumuman.*, tbl_user.username', 'tbl_pengumuman.created_by = tbl_user.id_user', "tbl_pengumuman.status = '1'", "tbl_pengumuman.id_pengumuman");
		$this->template->front_endnew('front_endnew/v_faq', $data);
	}

	public function MentariIlmu($id_sekolah = "")
	{
		$data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "id_sekolah = '$id_sekolah'");
		$data['data_artikel'] = $this->DataHandle->get_two_o('tbl_artikel', 'tbl_user', 'tbl_artikel.*, tbl_user.username', 'tbl_artikel.created_by = tbl_user.id_user', "tbl_artikel.status = '1' and tbl_artikel.id_sekolah = '$id_sekolah'", "tbl_artikel.id_artikel");
		$data['data_pengumuman'] = $this->DataHandle->get_two_o('tbl_pengumuman', 'tbl_user', 'tbl_pengumuman.*, tbl_user.username', 'tbl_pengumuman.created_by = tbl_user.id_user', "tbl_pengumuman.status = '1'", "tbl_pengumuman.id_pengumuman");
		$data['data_profile'] = $this->DataHandle->getAllWhere('tbl_profil', '*', "id_sekolah = '$id_sekolah' AND status = 1");
		$data['data_kegiatan'] = $this->DataHandle->getAllWhere('tbl_kegiatan', '*', "id_sekolah = '$id_sekolah'");
		$this->template->front_endnew('front_endnew/v_mentariilmu', $data);
	}

	public function email_sender($email,$nama_tamu) {

			$config = Array(
			    'protocol' => 'smtp',
			    'smtp_host' => 'smtp.gmail.com',
			    'smtp_port' => 465,
			    'smtp_user' => 'fazri.rramadhanh@gmail.com',
			    'smtp_pass' => 'tarixjabrix123',
			    'mailtype'  => 'html', 
   				'smtp_crypto'=>'ssl',
			    'charset'   => 'iso-8859-1'
			);

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");

              $this->email->from('admin.mentariilmu@mentariilmu.sch.id','Admin Yayasan Mentari Ilmu - Karawang'); 
              $this->email->to($email); 
              $this->email->subject('Terimakasih Atas Kunjungannya (Yayasan Mentari Ilmu)');
		    $mailContent = "
					<hr>
					<p>Hay <b>".$nama_tamu."</b>, Terimakasih telah  mengirimi kami pesan. Kunjungi langsung kami di :</p>
					<p><b>Yayasan Mentari Ilmu Karawang</b></p>
					<p>Alamat : <b>Jl. Perum Karaba Indah 1 Kp. Pintu Air Wadas Karawang Indonesia</b></p>
					<p>Kontak : <b>(0267) 840333</b></p>
					<p>E-mail : <b>smait.mentariilmu@gmail.com</b></p>
					<hr>
					<i>Terimakasih. Admin Yayasan Mentari Ilmu - Karawang</i> ";
              $this->email->message($mailContent);

        if($this->email->send()) {
		        // $this->session->set_flashdata('msg', '
		        // <div class="alert alert-success alert-dismissable">
		        //     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
		        //     &times;</button>
		        //     Berhasil...
		        // </div>');  
		} 
		else {
			show_error($this->email->print_debugger());
		}
	}


	// =============================== TEMPLATE BARU ==============================
}
