<!DOCTYPE html>
<html>
<head>
    <link href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
	 <style>
  .file {
    visibility: hidden;
    position: absolute;
  }
	</style>
 <br>
</head>
<body>
<div class="content"> 
 <div id="page-wrap" align ="center">
	<center>
		<h2>Tambah Data Barang</h2>
	</center>
	<form class="form-horizontal" method="post" action="<?php echo base_url('distro/tambah_barang')?>" enctype = "multipart/from-data">
		<table style="margin:20px auto;">
		<tr>
				<td>jenis barang</td>
				   <td> <select name="jenis_barang">
						<?php 
							foreach ($barang as $row){ 
							echo '<option value="'.$row->id_barang_distro.'>">'. $row->nama_barang.'</option>';
							}
					   ?>
					</select></td>
			</tr>
			<tr>
				<td>ukuran</td>
				  <td>  <select name="ukuran">
						<?php 
        
							foreach ($size as $row){ 
							echo '<option value="'.$row->id_ukuran.'>">'. $row->size.'</option>';
							}
					   ?>
					</select> </td>
			</tr>
			<tr>
				<td>nama barang</td>
				<td><input type="text" name="nama" required=""></td> 
			</tr>
			<tr>
				<td>harga barang</td>
				<td><input type="number" name="harga" required=""></td>    
			</tr>
			<tr>
				<td>jumlah barang</td>
				<td><input type="file" name="jumlah" required=""></td>  
			</tr>
			<tr>
				<td>jumlah barang</td>
				<td><input type="number" name="jumlah" required=""></td>  
			</tr>
			<tr>
				<td></td>
				<a href="<?php echo base_url()?>distro">Kembali</a>
				<td><input type="submit" name="submit" value="submit"></td>
			</tr>
		</table>
	</form>	
	</div></div>
</body>

</html>

