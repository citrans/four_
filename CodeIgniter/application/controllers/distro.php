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
            'kd_barang'=>$this->model_app->getKodeBarang(),
            'data_barang'=>$this->model_app->getAllData('barang_konveksi'),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/v_distro');
        $this->load->view('element/v_footer');
    }

//
//    ===================== INSERT =====================
    function tambah_barang(){

    	$kd_barang=$this->input->post('kd_barang');
		$nm_barang=$this->input->post('nm_barang');
		$stok=$this->input->post('stok');
		$harga=$this->input->post('harga');

		$config['max_size']=2048;
		$config['allowed_types']="png|jpg|jpeg|gif";
		$config['remove_spaces']=TRUE;
		$config['overwrite']=TRUE;
		$config['upload_path']=FCPATH.'images';

		$this->load->view('pages/v_distro');
		//$this->v_distro->initialize($config);

		//$this->upload->do_upload('gambar');
		$data_image=$this->upload->data('file_name');
		$location=base_url().'images/';
		$gambar=$location.$data_image;

		$data=array(
			'kd_barang'=>$kd_barang,
			'nm_barang'=>$nm_barang,
			'stok'=>$stok,
			'harga'=>$harga,
			'gambar'=> $gambar,
			);

			$this->model_app->insertData('tbl_barang',$data);

			redirect("distro");        


        //$data=array(
            //'kd_barang'=>$this->input->post('kd_barang'),
            //'nm_barang'=>$this->input->post('nm_barang'),
            //'stok'=>$this->input->post('stok'),
            //'harga'=>$this->input->post('harga'),
            //'gambar'=>$file['file_name'],
        //);
        //$this->model_app->insertData('tbl_barang',$data);
        //redirect("distro");
    //}
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

