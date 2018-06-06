<?php
class Penjualan extends CI_Controller{
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
            'title'=>'Penjualan Barang',
            'active_penjualan'=>'active',
            'data_penjualan'=>$this->model_app->get_order_distro(),
            'data_penjualan_konveksi'=>$this->model_app->get_order_konveksi(),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/v_order');
        $this->load->view('element/v_footer');

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
    }

//===========================insert data=====================================//

 function pages_tambah_penjualan(){
        $data=array(
            'title'=>'Tambah Penjualan Barang',
            'active_penjualan'=>'active',
            'kd_penjualan'=>$this->model_app->getKodePenjualan(),
            'data_barang'=>$this->model_app->getBarangJual(),
            'data_pelanggan'=>$this->model_app->getAllData('tbl_pelanggan'),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/v_add_penjualan');
        $this->load->view('element/v_footer');
    }



//===========================update data=====================================//

    function update_tr_jual(){
        $id['id_tr_beli'] = $this->input->post('id_tr');
        $data=array(
            'waktu_bayar'=> $this->input->post(''),
            'status'=>$this->input->post('status'),
        );
        $this->model_app->updateData('tr_beli',$data,$id);
        redirect("penjualan");
    }

     function update_tr_konveksi(){
        $id['id_tr_pesan'] = $this->input->post('id_tr');
        $data=array(
            'waktu_bayar'=> $this->input->post(''),
            'status'=>$this->input->post('status'),
        );
        $this->model_app->updateData('tr_pesan',$data,$id);
        redirect("penjualan");
    }

//===========================delete data=====================================//
    
     function hapus_jual(){
        $id['id_tr_beli'] = $this->uri->segment(3);
        $this->model_app->deleteData('tr_beli',$id);
        redirect("penjualan");
    }

     function hapus_konveksi(){
        $id['id_tr_pesan'] = $this->uri->segment(3);
        $this->model_app->deleteData('tr_pesan',$id);
        redirect("penjualan");
    }


//===========================view data=======================================//

    function detail_penjualan(){
        $id= $this->uri->segment(3);
        $data=array(
            'title'=>'Detail Penjualan Barang',
            'active_penjualan'=>'active',
            'data_penjualan'=>$this->model_app->get_view_distro($id),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/v_detail_penjualan');
        $this->load->view('element/v_footer');
    }

    function detail_jual_konveksi(){
         $id= $this->uri->segment(3);
        $data=array(
            'title'=>'Detail Penjualan Barang',
            'active_penjualan'=>'active',
            'data_penjualan_konveksi'=>$this->model_app->get_view_konveksi($id),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/v_detail_konveksi');
        $this->load->view('element/v_footer');
    }

}
