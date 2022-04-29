<?php class LogC extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	function adminlogck(){
		$un=$this->input->post('username');
		$pa=md5($this->input->post('password'));
		$this->LogMod->alogck($un,$pa);
	}
	function adminlogout(){
		$this->session->unset_userdata('auname');
		$this->session->unset_userdata('auid');
		redirect(base_url());
	}
}?>