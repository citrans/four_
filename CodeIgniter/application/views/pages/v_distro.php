<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No	</th>
		<th>id_jenis</th>
        <th>id_barang</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Jumlah</th>
		<th>id_ukuran</th>
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
        <td><?php echo $row->id_barang_distro; ?></td>
        <td><?php echo $row->nama_jenis_barang_distro; ?></td>
        <td><?php echo currency_format($row->harga_barang);?></td>
		<td><?php echo $row->jumlah_barang; ?></td>
		<td><?php echo $row->id_ukuran; ?></td>
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


<!-- ============ MODAL ADD BARANG =============== -->
<div id="modalAddBarang" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Tambah Data Barang</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo site_url('distro/tambah_barang')?>">
        
		<div class="modal-body">
            <div class="control-group">
                <label class="control-label">Jenis Barang</label>
                <div class="controls">
                     <select name="jenis_barang">
						<?php foreach ($barang as $row){ ?>
						<option value="<?php echo $row->id_barang_distro;?>"><?php echo $row->nama_barang;?></option>
						<?php }?>
					</select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" >Ukuran</label>
                <div class="controls">
                   <select name="ukuran">
						<?php 
        
							foreach ($size as $row){ 
							echo '<option value="'.$row->id_ukuran.'>">'. $row->size.'</option>';
							}
						?>
					</select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" >Nama Barang</label>
                <div class="controls">
                    <input name="nama" type="text" placeholder="Input Nama Barang...">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Harga</label>
                <div class="controls">
                    <input name="harga" type="text" placeholder="Input Harga...">
                </div>
            </div>
			<div class="control-group">
                <label class="control-label">Jumlah</label>
                <div class="controls">
                    <input name="jumlah" type="text" placeholder="Input Jumlah...">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="userfile" >Gambar</label>
			    <?php
				echo $this->session->flashdata('msg');
				echo form_open_multipart();
				echo form_upload('file');
				echo form_close();
				?>
            </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button type="submit" class="btn btn-primary" name="upload" value="upload">Save</button>
        </div>
    </form>
</div>

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
                        <label class="control-label" >Nama Barang</label>
                        <div class="controls">
                            <input name="nm_barang" type="text" value="<?php echo $row->nama_jenis_barang_distro;?>" >
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" >Stok</label>
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