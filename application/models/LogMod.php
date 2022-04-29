<?php class LogMod EXTENDS CI_Model{
	function alogck($un,$pa){
		$this->db->where('a_uname',$un);
		$this->db->where('a_password',$pa);
		$rs=$this->db->get('admin')->result();
		if (count($rs)>0) {foreach ($rs as $r) {
			$this->session->set_userdata('auname', $r->a_uname);
			$this->session->set_userdata('auid', $r->a_id);
			$this->session->set_flashdata('login_success', 'Login Success !');
			redirect(base_url());
		}}else{
			$this->session->set_flashdata('login_error', 'Invalid Login !');
			redirect(base_url());
		}
	}
}?>