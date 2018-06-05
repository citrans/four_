<?php


class Model_app extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    //  ================= AUTOMATIC CODE ==================

    //    KODE PENJUALAN
    public function getKodePenjualan()
    {
        $q = $this->db->query("select MAX(RIGHT(id_beli,3)) as kd_max from tr_beli");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "O-".$kd;
    }

    //    KODE BARANG
    function getKodeBarang(){
        $q = $this->db->query("select MAX(RIGHT(id_barang_konveksi,3)) as kd_max from barang_konveksi");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "B-".$kd;
    }

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
    //    KODE PELANGGAN
    public function getKodePelanggan(){
        $q = $this->db->query("select MAX(RIGHT(id_pelanggan,3)) as kd_max from tabel_pelanggan");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "P-".$kd;
    }

    //    KODE PEGAWAI
    public function getKodePegawai(){
        $q = $this->db->query("select MAX(RIGHT(id_admin,3)) as kd_max from admin");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "K-".$kd;
    }

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
    public function getKurangStok($kd_barang,$kurangi)
    {
        $q = $this->db->query("select stok from tbl_barang where kd_barang='".$kd_barang."'");
        $stok = "";
        foreach($q->result() as $d)
        {
            $stok = $d->stok - $kurangi;
        }
        return $stok;
    }
    public function getKembalikanStok($kd_barang)
    {
        $q = $this->db->query("select stok from tbl_barang where kd_barang='".$kd_barang."'");
        $stok = "";
        foreach($q->result() as $d)
        {
            $stok = $d->stok;
        }
        return $stok;
    }
	
	public function get_jenis_barang_distro(){
	$query = $this->db->query("SELECT * FROM jenis_barang_distro");
		return $query->result();
	}

    public function get_jenis_barang_konveksi(){
    $query = $this->db->query("SELECT * FROM barang_konveksi");
        return $query->result();
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

    function getBarangJual(){
        return $this->db->query ("SELECT * from tbl_barang where stok > 0")->result();
    }

    function getAllDataPenjualan(){
        return $this->db->query("SELECT
                a.id_tr_beli,
                a.tgl_bayar,
                a.status,
			    (select count(id_beli) as jum from beli where id_beli=a.id_beli) as jumlah
			    from tr_beli a
			    ORDER BY a.id_beli DESC
		")->result();
    }

    function getDataPenjualan($id){
        return $this->db->query("SELECT * from tbl_penjualan_header a
                left join tbl_pelanggan b on a.kd_pelanggan=b.kd_pelanggan
                left join admin c on a.id_admin=c.id_admin
                where a.kd_penjualan = '$id'")->result();
    }

    function getBarangPenjualan($id){
        return $this->db->query("
                select a.kd_barang,a.qty,b.nm_barang,b.harga
                from tbl_penjualan_detail a
                left join tbl_barang b on a.kd_barang=b.kd_barang
                where a.kd_penjualan = '$id'")->result();
    }

    function getLapPenjualan($tgl_awal,$tgl_akhir){
        return $this->db->query("SELECT *,sum(a.total_harga) as total_all from tbl_penjualan_header a
                left join tbl_pelanggan b on a.kd_pelanggan=b.kd_pelanggan
                left join admin c on a.id_admin=c.id_admin
                where a.tanggal_penjualan between '$tgl_awal' and '$tgl_akhir'
                ")->result();
    }

    function login($username, $password) {
        //create query to connect user login database
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('username', $username);
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
	function get_barang_distro(){
		$query = $this->db->query("SELECT * FROM barang_distro");
		return $query->result();
	}
    function get_jenis_kain(){
        $query = $this->db->query("SELECT * FROM jenis_kain");
        return $query->result();
    }
    function get_tr_pesan(){
        $query = $this->db->query("SELECT * FROM tr_pesan");
        return $query->result();
    }
    function get_tr_beli(){
        $query = $this->db->query("SELECT * FROM tr_beli");
        return $query->result();
    }

}