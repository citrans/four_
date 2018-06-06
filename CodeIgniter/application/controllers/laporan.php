<?php
class laporan extends CI_Controller{
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
            'title'=>'Laporan penjualan',
            'active_laporan'=>'active',
            'data_tr_beli'=>$this->model_app->get_lap_distro(),
            'data_tr_pesan'=>$this->model_app->get_lap_konveksi(),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/v_laporan');
        $this->load->view('element/v_footer');
    }
    function view_konveksi(){
        $id= $this->uri->segment(3);
        $data=array(
            'title'=>'Laporan penjualan',
            'active_laporan'=>'active',
            'data_tr_pesan'=>$this->model_app->get_vlap_konveksi($id),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/v_view_lap_konveksi1');
        $this->load->view('element/v_footer');
    }
     function view_distro(){
        $id= $this->uri->segment(3);
        $data=array(
            'title'=>'Laporan penjualan',
            'active_laporan'=>'active',
            'data_tr_beli'=>$this->model_app->get_vlap_distro($id),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/v_view_lap_distro');
        $this->load->view('element/v_footer');
    }
}
?>