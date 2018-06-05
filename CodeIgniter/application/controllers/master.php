<?php
class Master extends CI_Controller{
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
            'title'=>'Master Data',
            'active_master'=>'active',
            'data_pelanggan'=>$this->model_app->getAllData('tabel_pelanggan'),
            'data_contact'=>$this->model_app->getAllData('tbl_contact'),
            'data_pegawai'=>$this->model_app->getAllData('admin'),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/v_master');
        $this->load->view('element/v_footer');
    }

//
//    ===================== INSERT =====================

    function tambah_pegawai(){
        $data=array(
            'id_admin'=> $this->input->post(''),
            'nama_admin'=>$this->input->post('username'),
            'password'=>($this->input->post('password')),
            'no_telp'=> $this->input->post('nama'),
            'level'=>$this->input->post('level'),
        );
        $this->model_app->insertData('admin',$data);
        redirect("master");
    }


//    ======================== EDIT =======================
    
    function edit_contact(){
        $id['id'] = 1;
        $data=array(
            'nama'=> $this->input->post('nama'),
            'owner'=>$this->input->post('owner'),
            'alamat'=>$this->input->post('alamat'),
            'telp'=>$this->input->post('telp'),
            'email'=>$this->input->post('email'),
            'website'=>$this->input->post('website'),
            'desc'=>$this->input->post('desc'),
        );
        $this->model_app->updateData('tbl_contact',$data,$id);
        redirect("master");
    }
    function edit_pegawai(){
        $id['id_admin'] = $this->input->post('kd_pegawai');
        $data=array(
            'nama_admin'=>$this->input->post('username'),
            'password'=>($this->input->post('password')),
            'no_telp'=> $this->input->post('nama'),
            'level'=>$this->input->post('level'),
        );
        $this->model_app->updateData('admin',$data,$id);
        redirect("master");
    }

//    ========================== DELETE =======================
    
    function hapus_pelanggan(){
        $id['id_pelanggan'] = $this->uri->segment(3);
        $this->model_app->deleteData('tabel_pelanggan',$id);
        redirect("master");
    }
    function hapus_pegawai(){
        $id['id_admin'] = $this->uri->segment(3);
        $this->model_app->deleteData('admin',$id);
        redirect("master");
    }
}


