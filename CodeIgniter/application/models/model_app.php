<?php


class Model_app extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    //  ================= AUTOMATIC CODE ==================

    public function getAllData($table)
    {
        return $this->db->get($table)->result();
    }
    public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data);
    }
    function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }
    function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }
    function insertData($table,$data)
    {
        $this->db->insert($table,$data) or die ($db->error);
    }

    function login($username, $password) {
        //create query to connect user login database
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('nama_admin', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);

        //get query and processing
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); //if data is true
        } else {
            return false; //if data is wrong
			redirect('login');
        }
    }
	// function get_ukuran(){
	// 	$query = $this->db->query("SELECT * FROM ukuran");
	// 	return $query->result();
	// }
 //    function get_jenis_kain(){
 //        $query = $this->db->query("SELECT * FROM jenis_kain");
 //        return $query->result();
 //    }
 //    function get_data_edit($id){
 //        $query = $this->db->query("SELECT * FROM jenis_barang_distro WHERE id_jenis_barang_distro = '$id'");
 //        return $query->result_array();
 //    }
    function get_lap_konveksi(){
        $query = $this->db->query("SELECT tr_pesan.*,pesan.*,admin.*,tabel_pelanggan.*,barang_konveksi.*,ukuran.*,jenis_kain.*,warna_kain.*
                                    FROM tr_pesan
                                    JOIN admin ON tr_pesan.id_admin= admin.id_admin
                                    JOIN pesan ON tr_pesan.id_pesan=pesan.id_pesan
                                    JOIN tabel_pelanggan ON pesan.id_pelanggan=tabel_pelanggan.id_pelanggan
                                    JOIN barang_konveksi ON pesan.id_barang_konveksi=barang_konveksi.id_barang_konveksi
                                    JOIN ukuran ON barang_konveksi.id_ukuran=ukuran.id_ukuran
                                    JOIN warna_kain ON barang_konveksi.id_warna_kain=warna_kain.id_warna_kain
                                    JOIN jenis_kain ON jenis_kain.id_jenis_kain= warna_kain.id_jenis_kain
                                    WHERE tr_pesan.status <> 'konfirmasi'");
        return $query->result();
    }
     function get_vlap_konveksi($id){
        $query = $this->db->query("SELECT tr_pesan.*,pesan.*,admin.*,tabel_pelanggan.*,barang_konveksi.*,ukuran.*,jenis_kain.*,warna_kain.*
                                    FROM tr_pesan
                                    JOIN admin ON tr_pesan.id_admin= admin.id_admin
                                    JOIN pesan ON tr_pesan.id_pesan=pesan.id_pesan
                                    JOIN tabel_pelanggan ON pesan.id_pelanggan=tabel_pelanggan.id_pelanggan
                                    JOIN barang_konveksi ON pesan.id_barang_konveksi=barang_konveksi.id_barang_konveksi
                                    JOIN ukuran ON barang_konveksi.id_ukuran=ukuran.id_ukuran
                                    JOIN warna_kain ON barang_konveksi.id_warna_kain=warna_kain.id_warna_kain
                                    JOIN jenis_kain ON jenis_kain.id_jenis_kain= warna_kain.id_jenis_kain
                                    WHERE tr_pesan.status <> 'konfirmasi'
                                    AND tr_pesan.id_tr_pesan=$id");
        return $query->result();
    }
    function get_lap_distro(){
        $query = $this->db->query("SELECT tr_beli.*,beli.*,admin.*,tabel_pelanggan.*,jenis_barang_distro.*,barang_distro.*,ukuran.*
                                    FROM tr_beli
                                    JOIN beli ON tr_beli.id_beli=beli.id_beli
                                    JOIN admin on tr_beli.id_admin =admin.id_admin
                                    JOIN tabel_pelanggan ON beli.id_pelanggan = tabel_pelanggan.id_pelanggan
                                    JOIN jenis_barang_distro ON beli.id_jenis_barang_distro=jenis_barang_distro.id_jenis_barang_distro
                                    JOIN barang_distro ON jenis_barang_distro.id_barang_distro = barang_distro.id_barang_distro
                                    JOIN ukuran ON jenis_barang_distro.id_ukuran = ukuran.id_ukuran
                                    WHERE tr_beli.status <> 'konfirmasi'");
        return $query->result();
    }
    function get_vlap_distro($id){
        $query = $this->db->query("SELECT tr_beli.*,beli.*,admin.*,tabel_pelanggan.*,jenis_barang_distro.*,barang_distro.*,ukuran.*
                                    FROM tr_beli
                                    JOIN beli ON tr_beli.id_beli=beli.id_beli
                                    JOIN admin on tr_beli.id_admin =admin.id_admin
                                    JOIN tabel_pelanggan ON beli.id_pelanggan = tabel_pelanggan.id_pelanggan
                                    JOIN jenis_barang_distro ON beli.id_jenis_barang_distro=jenis_barang_distro.id_jenis_barang_distro
                                    JOIN barang_distro ON jenis_barang_distro.id_barang_distro = barang_distro.id_barang_distro
                                    JOIN ukuran ON jenis_barang_distro.id_ukuran = ukuran.id_ukuran
                                    WHERE tr_beli.status <> 'konfirmasi'
                                    AND tr_beli.id_tr_beli=$id");
        return $query->result();
    }
    function get_barang_konveksi(){
        $query = $this->db->query("SELECT barang_konveksi.*,ukuran.*,jenis_kain.*,warna_kain.*
                                    FROM barang_konveksi
                                    JOIN ukuran ON barang_konveksi.id_ukuran =ukuran.id_ukuran
                                    JOIN warna_kain ON barang_konveksi.id_warna_kain=warna_kain.id_warna_kain
                                    JOIN jenis_kain ON jenis_kain.id_jenis_kain= warna_kain.id_jenis_kain
                                    ");
        return $query->result();
    }
    function get_barang_distro(){
        $query = $this->db->query("SELECT 
                                    jenis_barang_distro.*, barang_distro.*,ukuran.*
                                    FROM jenis_barang_distro, barang_distro , ukuran 
                                    WHERE jenis_barang_distro.id_barang_distro=barang_distro.id_barang_distro 
                                    AND jenis_barang_distro.id_ukuran=ukuran.id_ukuran;
                                    ");
        return $query->result();
    }
    function get_kain(){
        $query = $this->db->query("SELECT jenis_kain.*,warna_kain.*
                                    FROM jenis_kain, warna_kain
                                    WHERE jenis_kain.id_jenis_kain=warna_kain.id_jenis_kain");
        return $query->result();
    }
    function get_order_distro(){
        $query = $this->db->query("SELECT tr_beli.*,beli.*,tabel_pelanggan.*,jenis_barang_distro.*,admin.*,barang_distro.*,ukuran.*
                                    FROM tr_beli
                                    JOIN beli ON tr_beli.id_beli=beli.id_beli
                                    JOIN admin on tr_beli.id_admin =admin.id_admin
                                    JOIN tabel_pelanggan ON beli.id_pelanggan = tabel_pelanggan.id_pelanggan
                                    JOIN jenis_barang_distro ON beli.id_jenis_barang_distro=jenis_barang_distro.id_jenis_barang_distro
                                    JOIN barang_distro ON jenis_barang_distro.id_barang_distro = barang_distro.id_barang_distro
                                    JOIN ukuran ON jenis_barang_distro.id_ukuran = ukuran.id_ukuran
                                    WHERE tr_beli.status <> 'lunas'
                                    ");
        return $query->result();
    }
    function get_view_distro($id){
        $query = $this->db->query("SELECT tr_beli.*,beli.*,tabel_pelanggan.*,jenis_barang_distro.*,admin.*,barang_distro.*,ukuran.*
                                    FROM tr_beli
                                    JOIN beli ON tr_beli.id_beli=beli.id_beli
                                    JOIN admin on tr_beli.id_admin =admin.id_admin
                                    JOIN tabel_pelanggan ON beli.id_pelanggan = tabel_pelanggan.id_pelanggan
                                    JOIN jenis_barang_distro ON beli.id_jenis_barang_distro=jenis_barang_distro.id_jenis_barang_distro
                                    JOIN barang_distro ON jenis_barang_distro.id_barang_distro = barang_distro.id_barang_distro
                                    JOIN ukuran ON jenis_barang_distro.id_ukuran = ukuran.id_ukuran
                                    WHERE tr_beli.status <> 'lunas'
                                    AND tr_beli.id_tr_beli = $id
                                    ");
        return $query->result();
    }
    function get_order_konveksi(){
        $query = $this->db->query("SELECT tr_pesan.*, admin.*,pesan.*, tabel_pelanggan.*, barang_konveksi.*,jenis_kain.*,ukuran.*,warna_kain.*
                                    FROM tr_pesan
                                    JOIN admin ON tr_pesan.id_admin= admin.id_admin
                                    JOIN pesan ON tr_pesan.id_pesan=pesan.id_pesan
                                    JOIN tabel_pelanggan ON pesan.id_pelanggan=tabel_pelanggan.id_pelanggan
                                    JOIN barang_konveksi ON pesan.id_barang_konveksi=barang_konveksi.id_barang_konveksi
                                    JOIN ukuran ON barang_konveksi.id_ukuran=ukuran.id_ukuran
                                    JOIN warna_kain ON barang_konveksi.id_warna_kain=warna_kain.id_warna_kain
                                    JOIN jenis_kain ON jenis_kain.id_jenis_kain= warna_kain.id_jenis_kain
                                    WHERE tr_pesan.status <> 'lunas'
                                    ");
        return $query->result();
    }
    function get_view_konveksi($id){
        $query = $this->db->query("SELECT tr_pesan.*, admin.*,pesan.*, tabel_pelanggan.*, barang_konveksi.*,jenis_kain.*,ukuran.*,warna_kain.*
                                    FROM tr_pesan
                                    JOIN admin ON tr_pesan.id_admin= admin.id_admin
                                    JOIN pesan ON tr_pesan.id_pesan=pesan.id_pesan
                                    JOIN tabel_pelanggan ON pesan.id_pelanggan=tabel_pelanggan.id_pelanggan
                                    JOIN barang_konveksi ON pesan.id_barang_konveksi=barang_konveksi.id_barang_konveksi
                                    JOIN ukuran ON barang_konveksi.id_ukuran=ukuran.id_ukuran
                                    JOIN jenis_kain ON barang_konveksi.id_jenis_kain = jenis_kain.id_jenis_kain
                                    JOIN warna_kain ON jenis_kain.id_jenis_kain= warna_kain.id_jenis_kain
                                    WHERE tr_pesan.status <> 'lunas'
                                    AND tr_pesan.id_tr_pesan = $id
                                    ");
        return $query->result();
    }


    function getKainList(){
        $result = array();
        $this->db->select('*');
        $this->db->from('jenis_kain');
        $this->db->order_by('nama_kain','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Kain-';
            $result[$row->id_jenis_kain]= $row->nama_kain;
        }
        
        return $result;
    }

    function getWarnaList(){
        $id_jenis_kain = $this->input->post('id_jenis_kain');
        $result = array();
        $this->db->select('*');
        $this->db->from('warna_kain');
        $this->db->where('id_jenis_kain',$id_jenis_kain);
        $this->db->order_by('warna_kain','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Warna Kain-';
            $result[$row->id_warna_kain]= $row->warna_kain;
        }
        
        return $result;
    }

public function getid_konveksi($id){
     $this->db->where('id_barang_konveksi', $id);
     return $this->db->get('barang_konveksi')->result();
   }


 public function getid($id){
     $this->db->where('id_jenis_barang_distro', $id);
     return $this->db->get('jenis_barang_distro')->result();
   }

 public function gambar($id)
   {
     $this->db->where('id_jenis_barang_distro', $id);
     return $this->db->get('jenis_barang_distro')->row();
   }
 public function ubah($table,$id, $data) {
     try{
      $this->db->where('id_jenis_barang_distro', $id)->limit(1)->update($table, $data);
      return true;
     }catch(Exception $e){}
 }

 public function hapus($id){
   $this->db->where('id_jenis_barang_distro', $id);
   $this->db->delete('jenis_barang_distro');
 }

 public function ubah_konveksi($id, $data) {
     try{
      $this->db->where('id_barang_konveksi', $id)->limit(1)->update('barang_konveksi', $data);
      return true;
     }catch(Exception $e){}
 }
  public function hapus_konveksi($id){
   $this->db->where('id_barang_konveksi', $id);
   $this->db->delete('barang_konveksi');
 }

}