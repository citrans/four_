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
            'active_master'=>'active',
            'data_tr_beli'=>$this->model_app->getAllData('tr_beli'),
            'data_tr_pesan'=>$this->model_app->getAllData('tr_pesan'),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/v_laporan');
        $this->load->view('element/v_footer');
    }
}
?>