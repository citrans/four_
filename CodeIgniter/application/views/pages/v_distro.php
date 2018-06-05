<h4>BARANG DISTRO</h4>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No	</th>
		<th>ID Barang</th>
        <th>Nama Barang</th>
        <th>Jenis Barang</th>
        <th>Harga</th>
        <th>Jumlah</th>
		<th>ukuran</th>
        <th>Gambar</th>
        <th class="span2">
            <a href="distro/tambah_barang" class="btn btn-mini btn-block btn-inverse" data-toggle="modal">
                <i class="icon-plus-sign icon-white"></i> Tambah Data
            </a>
        </th>
    </tr>
    </thead>
    <tbody>

    <?php
    $no=1;
    if(isset($data_barang)){
    foreach($data_barang as $row){
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row->id_jenis_barang_distro; ?></td>
        <td><?php echo $row->nama_barang; ?></td>
        <td><?php echo $row->nama_jenis_barang_distro; ?></td>
        <td><?php echo currency_format($row->harga_barang);?></td>
		<td><?php echo $row->jumlah_barang; ?></td>
		<td><?php echo $row->size; ?></td>
        <td><?php echo $row->gambar; ?></td>
        <td>
            <a class="btn btn-mini" href="#modalEditBarang<?php echo $row->id_jenis_barang_distro?>" data-toggle="modal"><i class="icon-pencil"></i> Edit</a>
            <a class="btn btn-mini" href="<?php echo site_url('distro/hapus_barang/'.$row->id_jenis_barang_distro);?>"
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
if (isset($data_barang)){
    foreach($data_barang as $row){
        ?>
        <div id="modalEditBarang<?php echo $row->id_jenis_barang_distro?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data Barang</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('distro/edit_barang')?>">
                <div class="modal-body">
                    <div class="control-group">
                        <label class="control-label">Kode Barang</label>
                        <div class="controls">
                            <input name="kd_barang" type="text" value="<?php echo $row->id_jenis_barang_distro;?>" readonly>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Jenis Barang</label>
                        <div class="controls">
                            <input name="jenis_barang" type="text" value="<?php echo $row->id_barang_distro;?>" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Ukuran</label>
                        <div class="controls">
                            <input name="ukuran" type="text" value="<?php echo $row->id_ukuran;?>" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Nama Barang</label>
                        <div class="controls">
                            <input name="nm_barang" type="text" value="<?php echo $row->nama_jenis_barang_distro;?>" >
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" >Jumlah</label>
                        <div class="controls">
                            <input name="stok" type="text" value="<?php echo $row->jumlah_barang;?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Harga</label>
                        <div class="controls">
                            <input name="harga" type="text" value="<?php echo $row->harga_barang;?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Gambar</label>
                        <div class="controls">
                            <input name="gambar" type="text" value="<?php echo $row->gambar;?>">
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