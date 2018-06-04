<?php
class Distro extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
        $this->load->helper('currency_format_helper');
    }

    function index(){
        $data=array(
            'title'=>'Distro',
            'active_distro'=>'active',
            'data_barang'=>$this->model_app->get_jenis_barang_distro(),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/v_distro');
        $this->load->view('element/v_footer');
    }

//
//    ===================== INSERT =====================
    function tambah_barang(){

    	$data = array();
		
		if(isset($_POST['submit'])){ 
			$upload = $this->model_app->upload();
      
			if($upload['result'] == "success"){ 
				$this->model_app->save($upload);
        
				redirect('distro'); 
		
			}else{ 
				$data['message'] = $upload['error']; 
			}
		}
		$data = array('size'=>$this->model_app->get_ukuran(),
				'barang'=>$this->model_app->get_barang_distro()
				);
		$this->load->view('pages/v_tambahdistro', $data);
		/*
		if(isset($_POST['upload'])){
				$data =$this->model_app->insertData('jenis_barang_distro',array(
				'id_barang_distro' =>$this->input->post('jenis_barang'),
				'nama_jenis_barang_distro' =>$this->input->post('nama'),
				'harga_barang' =>$this->input->post('harga'),
				'jumlah_barang' => $this->input->post('jumlah'),
				'id_ukuran' =>$this->input->post('ukuran'),
				'gambar'=>$this->input->post('gambar')));
				redirect("distro");
		}else{
			//$x =$this->model_app->get_ukuran();
			$data = array(
				'size'=>$this->model_app->get_ukuran(),
				'barang'=>$this->model_app->get_barang_distro()
				);
			$this->load->view('pages/v_tambahdistro',$data);
		}*/
		
}	


//    ======================== EDIT =======================
    function edit_barang(){
        $id['kd_barang'] = $this->input->post('kd_barang');
        $data=array(
            'nm_barang'=>$this->input->post('nm_barang'),
            'stok'=>$this->input->post('stok'),
            'harga'=>$this->input->post('harga'),
            'gambar'=>$this->input->post('gambar'),
        );
        $this->model_app->updateData('tbl_barang',$data,$id);
        redirect("distro");
    }
    

//    ========================== DELETE =======================
    function hapus_barang(){
        $id['kd_barang'] = $this->uri->segment(3);
        $this->model_app->deleteData('tbl_barang',$id);
        redirect("distro");
    }
    
}

