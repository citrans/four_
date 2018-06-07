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
            'data_barang'=>$this->model_app->get_barang_distro(),
            'data_konveksi'=>$this->model_app->get_barang_konveksi(),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/v_barang');
        $this->load->view('element/v_footer');
    }

//
//    ===================== INSERT =====================
    function tambah_barang(){
        if (isset($_POST['submit'])){
            $data = array (
            'id_jenis_barang_distro' => $this->input->post(''),
            'id_barang_distro' => $this->input->post('jenis_barang'),
            'id_ukuran' => $this->input->post('ukuran'),
            'nama_jenis_barang_distro' => $this->input->post('nama'),
            'harga_barang' => $this->input->post('harga'),
            'jumlah_barang' => $this->input->post('jumlah'),
            'gambar' => $this->input->post('')
            );
            $this->model_app->insertData('jenis_barang_distro',$data);
            redirect('distro');
        }else{
            $data = array('size'=>$this->model_app->get_ukuran(),
                'barang'=>$this->model_app->getAllData('barang_distro')
                );
        $this->load->view('pages/v_tambahdistro', $data);
        }

		
		
}	

    function tambah_konveksi(){

        $data = array('size'=>$this->model_app->getAllData('ukuran'),
                'barang'=>$this->model_app->get_kain()
                );
        $this->load->view('pages/v_tambahkonveksi', $data);  
}   


//    ======================== EDIT =======================
    function edit_barang(){
        $id['id_jenis_barang_distro'] = $this->input->post('kd_barang');
        $jumlah_l = $this->input->post('stok');
        $jumlah_b = $this->input->post('stok_tambah');
        $total = $jumlah_l + $jumlah_b;
        $data=array(
            'harga_barang'=>$this->input->post('harga'),
            'jumlah_barang'=>$total,
        );
        $this->model_app->updateData('jenis_barang_distro',$data,$id);
        redirect("distro");
    }

     function edit_konveksi(){
        $id['id_barang_konveksi'] = $this->input->post('kd_barang');
        $data=array(
            'id_ukuran'=>$this->input->post('nm_barang'),
            'jenis_barang'=>$this->input->post('stok'),
            'bordir'=>$this->input->post('harga'),
            'gambar'=>$this->input->post('gambar'),
        );
        $this->model_app->updateData('tbl_barang',$data,$id);
        redirect("distro");
    }
    

//    ========================== DELETE =======================
    function hapus_barang(){
        $id['id_jenis_barang_distro'] = $this->uri->segment(3);
        $this->model_app->deleteData('jenis_barang_distro',$id);
        redirect("distro");
    }
    
}

