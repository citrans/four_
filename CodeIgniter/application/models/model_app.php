<?php


class Model_app extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    //  ================= AUTOMATIC CODE ==================

//upload gambar gagal
public function upload(){
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = 2048;
        $config['remove_space'] = TRUE;
  
        $this->load->library('upload', $config);
        if($this->upload->do_upload('input_gambar')){ 
            $return = array(
                        'result' => 'success', 
                        'file' => $this->upload->data(), 
                        'error' => '');
            return $return;
        }else{
            $return = array(
                        'result' => 'failed', 
                        'file' => '', 
                        'error' => $this->upload->display_errors());
            return $return;
        }
    }
    //save data+image gagal
        public function save($upload){
        $data = array(
                'id_barang_distro' =>$this->input->post('jenis_barang'),
                'nama_jenis_barang_distro' =>$this->input->post('nama'),
                'harga_barang' =>$this->input->post('harga'),
                'jumlah_barang' => $this->input->post('jumlah'),
                'id_ukuran' =>$this->input->post('ukuran'),
                'file' => $upload['file']['file_name']
        );
        $this->db->insert('jenis_barang_distro', $data);
    }

    //tambah stok
    public function getTambahStok($kd_barang,$tambah)
    {
        $q = $this->db->query("select stok from tbl_barang where kd_barang='".$kd_barang."'");
        $stok = "";
        foreach($q->result() as $d)
        {
            $stok = $d->stok + $tambah;
        }
        return $stok;
    }

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
    function manualQuery($q)
    {
        return $this->db->query($q);
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
	function get_ukuran(){
		$query = $this->db->query("SELECT * FROM ukuran");
		return $query->result();
	}
    function get_jenis_kain(){
        $query = $this->db->query("SELECT * FROM jenis_kain");
        return $query->result();
    }
    function get_data_edit($id){
        $query = $this->db->query("SELECT * FROM jenis_barang_distro WHERE id_jenis_barang_distro = '$id'");
        return $query->result_array();
    }
    function get_lap_konveksi(){
        $query = $this->db->query("SELECT tr_pesan.*,pesan.*,admin.*,tabel_pelanggan.*,barang_konveksi.*,ukuran.*,jenis_kain.*,tipe_jenis_kain.*,warna_kain.*
                                    FROM tr_pesan
                                    JOIN admin ON tr_pesan.id_admin= admin.id_admin
                                    JOIN pesan ON tr_pesan.id_pesan=pesan.id_pesan
                                    JOIN tabel_pelanggan ON pesan.id_pelanggan=tabel_pelanggan.id_pelanggan
                                    JOIN barang_konveksi ON pesan.id_barang_konveksi=barang_konveksi.id_barang_konveksi
                                    JOIN ukuran ON barang_konveksi.id_ukuran=ukuran.id_ukuran
                                    JOIN jenis_kain ON barang_konveksi.id_jenis_kain = jenis_kain.id_jenis_kain
                                    JOIN tipe_jenis_kain ON jenis_kain.id_tipe_jenis_kain= tipe_jenis_kain.id_tipe_jenis_kain
                                    JOIN warna_kain ON tipe_jenis_kain.id_warna_kain = warna_kain.id_warna_kain
                                    WHERE tr_pesan.status <> 'konfirmasi'");
        return $query->result();
    }
     function get_vlap_konveksi($id){
        $query = $this->db->query("SELECT tr_pesan.*,pesan.*,admin.*,tabel_pelanggan.*,barang_konveksi.*,ukuran.*,jenis_kain.*,tipe_jenis_kain.*,warna_kain.*
                                    FROM tr_pesan
                                    JOIN admin ON tr_pesan.id_admin= admin.id_admin
                                    JOIN pesan ON tr_pesan.id_pesan=pesan.id_pesan
                                    JOIN tabel_pelanggan ON pesan.id_pelanggan=tabel_pelanggan.id_pelanggan
                                    JOIN barang_konveksi ON pesan.id_barang_konveksi=barang_konveksi.id_barang_konveksi
                                    JOIN ukuran ON barang_konveksi.id_ukuran=ukuran.id_ukuran
                                    JOIN jenis_kain ON barang_konveksi.id_jenis_kain = jenis_kain.id_jenis_kain
                                    JOIN tipe_jenis_kain ON jenis_kain.id_tipe_jenis_kain= tipe_jenis_kain.id_tipe_jenis_kain
                                    JOIN warna_kain ON tipe_jenis_kain.id_warna_kain = warna_kain.id_warna_kain
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
        $query = $this->db->query("SELECT barang_konveksi.*,ukuran.*,jenis_kain.*,tipe_jenis_kain.*,warna_kain.*
                                    FROM barang_konveksi
                                    JOIN ukuran ON barang_konveksi.id_ukuran =ukuran.id_ukuran
                                    JOIN jenis_kain ON barang_konveksi.id_jenis_kain=jenis_kain.id_jenis_kain
                                    JOIN tipe_jenis_kain ON jenis_kain.id_tipe_jenis_kain = tipe_jenis_kain.id_tipe_jenis_kain
                                    JOIN warna_kain ON tipe_jenis_kain.id_warna_kain = warna_kain.id_warna_kain
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
        $query = $this->db->query("SELECT jenis_kain.*,tipe_jenis_kain.*
                                    FROM jenis_kain, tipe_jenis_kain
                                    WHERE jenis_kain.id_tipe_jenis_kain=tipe_jenis_kain.id_tipe_jenis_kain");
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
        $query = $this->db->query("SELECT tr_pesan.*, admin.*,pesan.*, tabel_pelanggan.*, barang_konveksi.*,jenis_kain.*,ukuran.*,tipe_jenis_kain.*,warna_kain.*
                                    FROM tr_pesan
                                    JOIN admin ON tr_pesan.id_admin= admin.id_admin
                                    JOIN pesan ON tr_pesan.id_pesan=pesan.id_pesan
                                    JOIN tabel_pelanggan ON pesan.id_pelanggan=tabel_pelanggan.id_pelanggan
                                    JOIN barang_konveksi ON pesan.id_barang_konveksi=barang_konveksi.id_barang_konveksi
                                    JOIN ukuran ON barang_konveksi.id_ukuran=ukuran.id_ukuran
                                    JOIN jenis_kain ON barang_konveksi.id_jenis_kain = jenis_kain.id_jenis_kain
                                    JOIN tipe_jenis_kain ON jenis_kain.id_tipe_jenis_kain= tipe_jenis_kain.id_tipe_jenis_kain
                                    JOIN warna_kain ON tipe_jenis_kain.id_warna_kain = warna_kain.id_warna_kain
                                    WHERE tr_pesan.status <> 'lunas'
                                    ");
        return $query->result();
    }
    function get_view_konveksi($id){
        $query = $this->db->query("SELECT tr_pesan.*, admin.*,pesan.*, tabel_pelanggan.*, barang_konveksi.*,jenis_kain.*,ukuran.*,tipe_jenis_kain.*,warna_kain.*
                                    FROM tr_pesan
                                    JOIN admin ON tr_pesan.id_admin= admin.id_admin
                                    JOIN pesan ON tr_pesan.id_pesan=pesan.id_pesan
                                    JOIN tabel_pelanggan ON pesan.id_pelanggan=tabel_pelanggan.id_pelanggan
                                    JOIN barang_konveksi ON pesan.id_barang_konveksi=barang_konveksi.id_barang_konveksi
                                    JOIN ukuran ON barang_konveksi.id_ukuran=ukuran.id_ukuran
                                    JOIN jenis_kain ON barang_konveksi.id_jenis_kain = jenis_kain.id_jenis_kain
                                    JOIN tipe_jenis_kain ON jenis_kain.id_tipe_jenis_kain= tipe_jenis_kain.id_tipe_jenis_kain
                                    JOIN warna_kain ON tipe_jenis_kain.id_warna_kain = warna_kain.id_warna_kain
                                    WHERE tr_pesan.status <> 'lunas'
                                    AND tr_pesan.id_tr_pesan = $id
                                    ");
        return $query->result();
    }


}