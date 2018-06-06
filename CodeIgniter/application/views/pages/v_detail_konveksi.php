<?php if(isset($data_penjualan_konveksi)){
foreach ($data_penjualan_konveksi as $row){
?>

<form class="form-horizontal" method="post" action="<?php echo site_url('penjualan/update_tr_konveksi')?>">
    <div class="control-group">
        <label class="control-label">ID transaksi</label>
        <div class="controls">
            <input class="input-block-level" name="id_tr" type="text" value="<?php echo $row->id_tr_pesan?>" required maxlength="30" readonly>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">ID pesan</label>
        <div class="controls">
            <input class="input-block-level" name="id_beli" type="text" value="<?php echo $row->id_pesan?>" required maxlength="100" readonly>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Nama Pelanggan</label>
        <div class="controls">
            <input class="input-block-level" name="pelanggan" type="text" value="<?php echo $row->username?>" required maxlength="30" readonly>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Jenis Barang</label>
        <div class="controls">
            <input class="input-block-level" name="barang" type="text" value="<?php echo $row->jenis_barang?>" required maxlength="30" readonly>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Ukuran</label>
        <div class="controls">
            <input class="input-block-level" name="ukuran" type="text" value="<?php echo $row->size?>" required maxlength="50" readonly>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Jumlah pemesanan</label>
        <div class="controls">
            <input class="input-block-level" name="jumlah" type="text" value="<?php echo $row->jumlah_pesan?>" required maxlength="30" readonly>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Harga</label>
        <div class="controls">
            <input class="input-block-level" name="harga" type="text" value="<?php echo $row->harga_satuan?>" required maxlength="50" readonly>
        </div>
    </div>


    <div class="control-group">
        <label class="control-label">Total Harga</label>
        <div class="controls">
            <input class="input-block-level" name="total" type="text" value="<?php echo $row->total_harga?>" required maxlength="30" readonly>
        </div>
    </div>

     <div class="control-group">
        <label class="control-label">Nama Admin</label>
        <div class="controls">
            <input class="input-block-level" name="admin" type="text" value="<?php echo $row->nama_admin?>" required maxlength="30" readonly>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Waktu Pesan</label>
        <div class="controls">
            <input class="input-block-level" name="pesan" type="text" value="<?php echo $row->waktu_pesan?>" required maxlength="50" readonly>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Waktu Bayar</label>
        <div class="controls">
            <input class="input-block-level" name="bayar" type="text" value="<?php echo $row->waktu_bayar?>" required maxlength="30" readonly>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Status</label>
        <div class="controls">
              <select name="status">
                <option value="konfirmasi"  selected="selected">Konfirmasi</option>
                <option value="DP">DP</option>
                <option value="Lunas">Lunas</option>
               </select>
        </div>
    </div>
   <button class="btn btn-primary">Save</button>
</form>
<a href="<?php echo base_url()?>penjualan">Kembali</a>

<?php }
}
?>