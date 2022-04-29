<?php class MainC extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
	}
	function index(){
		$res=$this->MainMod->selstudent();
		$this->load->view('main/list',$w=array('row'=>$res));
	}
	function insstudent(){

		$name=$this->input->post('name');
		$gender=$this->input->post('gender');
		$stream=$this->input->post('stream');
		$sb=$this->input->post('subject');
		if (isset($sb)) {$subject=implode(",", $sb);}else{$subject="";}

		$conf=array('upload_path'=>'./upload_img',
			'allowed_types'=>'jpg|png|jpeg',
			'max_size'=>2000);


		$this->load->library("upload",$conf);
		if (!$this->upload->do_upload("proimg")) {
			echo $this->upload->display_errors();
		}else{$fd=$this->upload->data();
			$fn=$fd['file_name'];

			$w=array('student_name'=>$name,'student_gender'=>$gender,'student_stream'=>$stream,'student_subject'=>$subject,'student_image'=>$fn);
		$this->MainMod->inst($w); 
		}

		$res=$this->MainMod->selstudent();
		$this->load->view('main/inc/table',$w=array('row'=>$res));

	}
	public function delete_stud($id){
		$this->MainMod->delstud($id);
			$res=$this->MainMod->selstudent();
		$this->load->view('main/inc/table',$w=array('row'=>$res));
	}
	public function update_stud(){
		$id=$this->input->post('sid');
		$name=$this->input->post('name');
		$gender=$this->input->post('gender');
		$stream=$this->input->post('stream');
		$sb=$this->input->post('subject');
		if (isset($sb)) {$s=implode(',',$sb);}else{$s='';}
		$conf=array('upload_path'=>'./upload_img','allowed_types'=>'jpg|png|jpeg','max_size'=>2000);
		$this->load->library('upload',$conf);
		if (! $this->upload->do_upload('proimg')) {
			$fd=$this->upload->data(); $fn=$fd['file_name'];
			$w=array('student_name'=>$name,'student_gender'=>$gender,'student_stream'=>$stream,'student_subject'=>$s);
			$this->MainMod->uins($w,$id);
		}else{
			$fd=$this->upload->data(); $fn=$fd['file_name'];
			$w=array('student_name'=>$name,'student_gender'=>$gender,'student_stream'=>$stream,'student_subject'=>$s,'student_image'=>$fn);
			$this->MainMod->uins($w,$id);
		}
	}
}?>