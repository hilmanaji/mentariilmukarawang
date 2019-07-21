<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->template->front_end('front_end/v_home');
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
