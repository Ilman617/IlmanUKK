<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$data['title'] = 'masyarakat';
		$data['auctions'] = $this->M_lelang->all();

		$this->load->view('templates/user_header', $data);
		$this->load->view('masyarakat/dashboard', $data);
		$this->load->view('templates/user_footer');
	}
}
