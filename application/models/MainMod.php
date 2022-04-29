<?php class MainMod extends CI_Model{
	function inst($w){
		$this->db->insert('students',$w);
	}
	function selstudent(){
		$q=$this->db->get('students');
		return $rs=$q->result();
	}
	function delstud($id){
		$this->db->where('student_id',$id);
		$rs=$this->db->get('students')->result();
		foreach ($rs as $r) {
			unlink('upload_img/'.$r->student_image);
		}
		$this->session->set_flashdata('delete','One Record Deleted !');

		$this->db->where('student_id',$id);
		$this->db->delete('students');
		
	}

	function uins($w,$id){
		$this->db->where('student_id',$id);
		$this->db->update('students',$w);
		$this->session->set_flashdata('updated','One Record Updated !');
	}


}?>