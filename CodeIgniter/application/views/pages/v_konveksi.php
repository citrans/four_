<h4>BARANG KONVEKSI</h4>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No	</th>
		<th>id_ukuran</th>
        <th>id_jenis_kain</th>
        <th>jenis barang</th>
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
        <td><?php echo $row->id_ukuran; ?></td>
        <td><?php echo $row->id_jenis_kain; ?></td>
        <td><?php echo $row->jenis_barang; ?></td>
		<td><?php echo $row->bordir; ?></td>
        <td><?php echo $row->gambar; ?></td>
        <td>
            <a class="btn btn-mini" href="#modalEditBarang<?php echo $row->id_barang_konveksi?>" data-toggle="modal"><i class="icon-pencil"></i> Edit</a>
            <a class="btn btn-mini" href="<?php echo site_url('distro/hapus_barang/'.$row->id_barang_konveksi);?>"
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
            <form class="form-horizontal" method="post" action="<?php echo site_url('distro/edit_konveksi')?>">
                <div class="modal-body">
                   <div class="control-group">
                        <label class="control-label">Kode Barang</label>
                        <div class="controls">
                            <input name="kd_barang" type="text" value="<?php echo $row->id_barang_konveksi;?>" readonly>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Ukuran</label>
                        <div class="controls">
                            <input name="ukuran" type="text" value="<?php echo $row->id_ukuran;?>" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Jenis kain</label>
                        <div class="controls">
                            <input name="jenis_barang" type="text" value="<?php echo $row->id_jenis_kain;?>" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Nama Barang</label>
                        <div class="controls">
                            <input name="nm_barang" type="text" value="<?php echo $row->jenis_barang;?>" >
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" >Bordir/Sablon</label>
                        <div class="controls">
                            <input name="bordir" type="text" value="<?php echo $row->bordir;?>">
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