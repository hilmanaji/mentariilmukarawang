<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1'");
		$data['data_artikel'] = $this->DataHandle->get2lim6('tbl_artikel', 'tbl_user', 'tbl_artikel.*, tbl_user.username', 'tbl_artikel.created_by = tbl_user.id_user', "tbl_artikel.status = '1'", "tbl_artikel.id_artikel");
		$this->template->front_end('front_end/v_home', $data);
	}

	public function welcome()
	{
		$this->template->front_end('front_end/v_welcome');
	}

	public function tentang()
	{
		$this->template->front_end('front_end/v_tentang');
	}

	public function sekolah()
	{
		$this->template->front_end('front_end/v_sekolah');
	}
}
