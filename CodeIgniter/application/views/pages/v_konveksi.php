<h4>BARANG KONVEKSI</h4>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No	</th>
		<th>ID Barang</th>
        <th>Nama Barang</th>
        <th>Ukuran</th>
        <th>Jenis Kain</th>
        <th>Brand Kain</th>
        <th>Harga</th>
        <th>bordir/sablon</th>
        <th>Gambar</th>
        <th class="span2">
            <a href="distro/tambah_konveksi" class="btn btn-mini btn-block btn-inverse" data-toggle="modal">
                <i class="icon-plus-sign icon-white"></i> Tambah Data
            </a>
        </th>
    </tr>
    </thead>
    <tbody>

    <?php
    $no=1;
    if(isset($data_konveksi)){
    foreach($data_konveksi as $row){
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row->id_barang_konveksi; ?></td>
        <td><?php echo $row->jenis_barang; ?></td>
        <td><?php echo $row->size; ?></td>
        <td><?php echo $row->nama_kain; ?></td>
        <td><?php echo $row->warna_kain; ?></td>
        <td><?php echo $row->harga_satuan; ?></td>
		<td><?php echo $row->bordir; ?></td>
        <?php  echo "<td><center><img src='".base_url("asset/images/".$row->gambar)."' width='100' height='100'></center></td>";?>
        <td>
            <a class="btn btn-mini" href="#modalEditBarang<?php echo $row->id_barang_konveksi?>" data-toggle="modal"><i class="icon-pencil"></i> Edit</a>
            <a class="btn btn-mini" href="<?php echo site_url('distro/hapus_konveksi/'.$row->id_barang_konveksi);?>"
               onclick="return confirm('Anda yakin?')"> <i class="icon-remove"></i> Hapus</a>
        </td>
    </tr>

    <?php }
    }
    ?>

    </tbody>
</table>


<!-- ============ MODAL EDIT BARANG =============== -->
<?php
if (isset($data_konveksi)){
    foreach($data_konveksi as $row){
        ?>
        <div id="modalEditBarang<?php echo $row->id_barang_konveksi?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data Konveksi</h3>
            </div>
             <?=form_open_multipart('distro/proses_ubah_konveksi/'.$row->id_barang_konveksi)?>
                <div class="modal-body">
                   <div class="control-group">
                        <label class="control-label">Kode Barang</label>
                        <div class="controls">
                            <input name="kd_barang" type="text" value="<?php echo $row->id_barang_konveksi;?>" readonly>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Nama Barang</label>
                        <div class="controls">
                            <input name="nm_barang" type="text" value="<?php echo $row->jenis_barang;?>" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Ukuran</label>
                        <div class="controls">
                            <input name="ukuran" type="text" value="<?php echo $row->size;?>" readonly >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Jenis kain</label>
                        <div class="controls">
                            <input name="kain" type="text" value="<?php echo $row->nama_kain;?>" readonly >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Warna kain</label>
                        <div class="controls">
                            <input name="warna" type="text" value="<?php echo $row->warna_kain;?>" readonly >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Harga Barang</label>
                        <div class="controls">
                            <input name="harga" type="number" value="<?php echo $row->harga_satuan;?>" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Bordir/Sablon</label>
                        <div class="controls">
                            <input name="bordir" type="text" value="<?php echo $row->bordir;?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" >Gambar</label>
                        <div class="controls">
                           <input type="file" name="userfile" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    <?php }
}
?>