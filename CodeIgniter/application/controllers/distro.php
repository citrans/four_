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
            $data = array('size'=>$this->model_app->get_ukuran(),
                'barang'=>$this->model_app->getAllData('barang_distro')
                );
        $this->load->view('pages/v_inputdistro', $data);  
        $this->load->view('element/v_footer');
}	

    function tambah_konveksi(){
         if (isset($_POST['submit'])){
           
             $data=array(
            'id_barang_konveksi' => $this->input->post(''),
            'id_ukuran'=> $this->input->post('ukuran'),
            'id_warna_kain'=> $this->input->post('id_warna_kain'),
            'jenis_barang'=> $this->input->post('nama'),
            'bordir'=> $this->input->post('bordir'),
            'harga_satuan'=> $this->input->post('harga'),
                );
               $this->model_app->insertData('barang_konveksi',$data);
            redirect('distro');
        }else{
            $data = array('size'=>$this->model_app->getAllData('ukuran'),
                 'option_kain' => $this->model_app->getKainList(),
                );
        $this->load->view('pages/v_tambahkonveksi', $data);  
        }
   } 
   

function select_warna(){
            if('IS_AJAX') {
            $data['option_warna'] = $this->model_app->getWarnaList();      
        $this->load->view('pages/v_warna',$data);
            }
        }


 public function proses_input(){
      //membuat konfigurasi
      $config = array(
        'upload_path' => './asset/images/',
        'allowed_types' => 'gif|jpg|png',
        'max_size' => 1000, 'max_width' => 1000,
        'max_height' => 1000,
        );
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload()) //jika gagal upload
      {
          $error = array('error' => $this->upload->display_errors()); //tampilkan error
          // $this->load->view('distro/v_inputdistro', $error);
          echo "upload gagal";
      } else
      //jika berhasil upload
      {
          $file = $this->upload->data();
          //mengambil data di form
          $data = ['gambar' => $file['file_name'],
          'id_jenis_barang_distro'=> set_value(''),
          'id_barang_distro' => set_value('jenis_barang'),
           'nama_jenis_barang_distro' => set_value('nama'),
           'harga_barang' => set_value('harga'),
           'jumlah_barang' => set_value('stok'),
           'id_ukuran' => set_value('ukuran')
         ];
          $this->model_app->insertData('jenis_barang_distro',$data); //memasukan data ke database
          redirect('distro'); //mengalihkan halaman

      }
  }

  public function proses_input_konveksi(){
      //membuat konfigurasi
       $images= time();
      $imagename = $images;
      $config = [
        'upload_path' => './asset/images/',
        'allowed_types' => 'gif|jpg|png',
        'max_size' => 1000, 'max_width' => 1000,
        'max_height' => 1000,
        'file_name' => $imagename
        ];
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload()) //jika gagal upload
      {
          $error = array('error' => $this->upload->display_errors()); //tampilkan error
          // $this->load->view('input', $error);
          echo "gagal input";
      } else
      //jika berhasil upload
      {
          $file = $this->upload->data();
          //mengambil data di form
          $data = ['gambar' => $file['file_name'],
           'id_barang_konveksi' => $this->input->post(''),
            'id_ukuran'=> $this->input->post('ukuran'),
            'id_warna_kain'=> $this->input->post('id_warna_kain'),
            'jenis_barang'=> $this->input->post('nama'),
            'bordir'=> $this->input->post('bordir'),
            'harga_satuan'=> $this->input->post('harga'),
         ];
          $this->model_app->insertData('barang_konveksi',$data);//memasukan data ke database
          redirect('distro'); //mengalihkan halaman

      }
    }

   function data(){
  $data['produk'] = $this->model_app->data();
  $this->load->view('data', $data);
}

//    ======================== EDIT =======================
    
 function ubah($id){
    $data['produk'] = $this->model_app->getid($id);
    $this->load->view('v_distro/modalEditBarang', $data);
  }

   function proses_ubah(){
    $id= $this->input->post('kd_barang');
    $gambar = $this->model_app->gambar($id);
    if(isset($_FILES["userfile"]["name"]))
      {
        //membuat konfigurasi
        $config = [
          'upload_path' => './asset/images/',
          'allowed_types' => 'gif|jpg|png',
          'max_size' => 1000, 'max_width' => 1000,
          'max_height' => 1000
        ];
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) //jika gagal upload
        {
            $error = array('error' => $this->upload->display_errors()); //tampilkan error
            echo "gagal update";
        } else
        //jika berhasil upload
        {
            $file = $this->upload->data();
            //mengambil data di form
            $data = ['gambar' => $file['file_name']];
            echo "berhasil update";
            unlink('asset/images/'.$gambar->gambar); //menghapus gambar yang lama
            echo "berhasil update";
        }
      }
        $jumlah_l = $this->input->post('stok');
        $jumlah_b = $this->input->post('stok_tambah');
        $total = $jumlah_l + $jumlah_b;
      $data['nama_jenis_barang_distro'] = set_value('nm_barang');
      $data['harga_barang']   = set_value('harga');
      $data['jumlah_barang']   = $total;
      $this->model_app->ubah('jenis_barang_distro',$id, $data); //memasukan data ke database
      redirect('distro'); //mengalihkan halaman
  }

 public function proses_ubah_konveksi($id){
    $gambar = $this->model_app->gambar($id);
    if(isset($_FILES["userfile"]["name"]))
      {
        //membuat konfigurasi
        $name ="konveksi";
        $images= time();
        $imagename = $name.$images;
        $config = [
          'upload_path' => './asset/images/',
          'allowed_types' => 'gif|jpg|png',
          'max_size' => 1000, 'max_width' => 1000,
          'max_height' => 1000,
          'file_name' => $imagename
        ];
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) //jika gagal upload
        {
            $error = array('error' => $this->upload->display_errors()); //tampilkan error
            echo "gagal update";
        } else
        //jika berhasil upload
        {
            $file = $this->upload->data();
            //mengambil data di form
            $data = ['gambar' => $file['file_name']];
            unlink('asset/images/'.$gambar->gambar); //menghapus gambar yang lama
        }
      }
      $data['jenis_barang']   = set_value('nm_barang');
      $data['harga_satuan']   = set_value('harga');
      $data['bordir']   = set_value('bordir');
      $this->model_app->ubah_konveksi($id, $data); //memasukan data ke database
      redirect('distro'); //mengalihkan halaman
  }

  public function ubah_konveksi($id){
    $data['produk'] = $this->model_app->getid_konveksi($id);
    $this->load->view('v_konveksi', $data);
  }

//    ========================== DELETE =======================
     public function hapus_konveksi($id){
  $gambar = $this->model_app->gambar($id);
  unlink('asset/images/'.$gambar->gambar);
  $this->model_app->hapus_konveksi($id);
  redirect('distro'); //mengalihkan halaman
}

      function hapus($id){
  $gambar = $this->model_app->gambar($id);
  unlink('asset/images/'.$gambar->gambar);
  $this->model_app->hapus($id);
  redirect('distro'); //mengalihkan halaman
}
    
}

