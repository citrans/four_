<?php
class image extends CI_Controller {
	
	var $data = array();
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index(){
		$config = array(
		'upload_path'=>'image/',//image=nama folder di komputer
		'allowed_types'=> 'jpg|jpeg|png|bmp',
		'max_size'=> 0,
		'filename' =>url_title($this->input->post('file')),//file = nama button buat pilih file
		'encrypt_name' => true);
		$this->load->library('upload', $config);
		if($this->upload->do_upload('file')){
			
			$this->db->insert('image', array(//image = nama tabel
				'path' =>$this->upload->file_name//path = nama kolom di db
			));
			$this->session->set_flashdata('msg','Success!!!');
			redirect(image);
		}
		$this->data = array(
		'get_image' =>$this->db->get('image'));//image=nama tabel
		$this->load->view('imageview',$this->data);
		
	}
	
	public function delete_image($id){
		$this->db->where('id',$id);
		$get_image_file = $this->db->get('image')->row();//image = nama tabel
		
		//remove image in folder upload
		@unlink('upload/'.$get_image_file->path);//path = nama kolom di db
		
		//remove file image from database
		$this->db->where('id',$id);//id = nama pk di tabel image
		$this->db->delete('image');//image = nama tabel
		$this->session->set_flashdata('msg','Success!!!');//cuma buat nunjukkan kalau aksi berhasil
		redirect(image);
	}
}

?>