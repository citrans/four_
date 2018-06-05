<?php if(isset($data_tr_pesan)){
foreach ($data_tr_pesan as $row){
?>

<form class="form-horizontal" method="post" action="">
    <div class="control-group">
        <label class="control-label">ID transaksi</label>
        <div class="controls">
            <input class="input-block-level" name="nama" type="text" value="<?php echo $row->id_tr_pesan?>" required maxlength="30" readonly>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">ID beli</label>
        <div class="controls">
            <input class="input-block-level" name="desc" type="text" value="<?php echo $row->id_pesan?>" required maxlength="100" readonly>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Nama Pelanggan</label>
        <div class="controls">
            <input class="input-block-level" name="owner" type="text" value="<?php echo $row->username?>" required maxlength="30" readonly>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Jenis Barang</label>
        <div class="controls">
            <input class="input-block-level" name="telp" type="text" value="<?php echo $row->jenis_barang?>" required maxlength="30" readonly>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Jenis Kain</label>
        <div class="controls">
            <input class="input-block-level" name="email" type="text" value="<?php echo $row->nama_kain?>" required maxlength="30" readonly>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Ukuran</label>
        <div class="controls">
            <input class="input-block-level" name="website" type="text" value="<?php echo $row->size?>" required maxlength="50" readonly>
        </div>
    </div>

     <div class="control-group">
        <label class="control-label">Bordir</label>
        <div class="controls">
            <input class="input-block-level" name="telp" type="text" value="<?php echo $row->bordir?>" required maxlength="30" readonly>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Jumlah pemesanan</label>
        <div class="controls">
            <input class="input-block-level" name="email" type="text" value="<?php echo $row->jumlah_pesan?>" required maxlength="30" readonly>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Harga</label>
        <div class="controls">
            <input class="input-block-level" name="website" type="text" value="<?php echo $row->harga_satuan?>" required maxlength="50" readonly>
        </div>
    </div>


    <div class="control-group">
        <label class="control-label">Total Harga</label>
        <div class="controls">
            <input class="input-block-level" name="email" type="text" value="<?php echo $row->total_harga?>" required maxlength="30" readonly>
        </div>
    </div>

     <div class="control-group">
        <label class="control-label">Nama Admin</label>
        <div class="controls">
            <input class="input-block-level" name="telp" type="text" value="<?php echo $row->nama_admin?>" required maxlength="30" readonly>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Waktu Pesan</label>
        <div class="controls">
            <input class="input-block-level" name="website" type="text" value="<?php echo $row->waktu_pesan?>" required maxlength="50" readonly>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Waktu Bayar</label>
        <div class="controls">
            <input class="input-block-level" name="email" type="text" value="<?php echo $row->waktu_bayar?>" required maxlength="30" readonly>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Status</label>
        <div class="controls">
            <input class="input-block-level" name="website" type="text" value="<?php echo $row->status?>" required maxlength="50" readonly>
        </div>
    </div>
   
</form>
<a href="<?php echo base_url()?>laporan">Kembali</a>

<?php }
}
?>