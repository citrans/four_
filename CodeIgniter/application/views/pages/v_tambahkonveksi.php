<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Data Barang</title>
	 <link href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/	css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
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
	 <br><br><br><br><br>
   <div class="container">
     <h3 align="center"><b>Tambahkan data barang</b></h3>
 <div class="col-md-3">
 </div>
 <div class="jumbotron col-md-6">
   <?=form_open_multipart('distro/proses_input_konveksi')?>
				<br/>
				Nama Barang <br/>
				<input type="text" name="nama" required="">
			    <div id="kain">
			    Kain <br/>
			    <?php
			    	echo form_dropdown("id_jenis_kain",$option_kain,"","id='id_jenis_kain'");
			    ?>
			    </div>
			    <div id="warna">
			    Warna <br/>
			   	<?php
			    	echo form_dropdown("id_warna_kain",array('Pilih Warna Kain'=>'Pilih Kain Dahulu'),'','disabled');
			    ?>
			    </div>
			    Bordir <br/>
			    <select name="bordir">
			    		<option>--pilih bordir/ sablon--</option>
                        <option value="bordir">Bordir</option>
                        <option value="sablon">Sablon</option>
                </select> <br/>
                Ukuran <br/>
                <select name="ukuran">
                	<option>--pilih ukuran--</option>
						<?php 
        
							foreach ($size as $row){ 
							echo '<option value="'.$row->id_ukuran.'>">'. $row->size.'</option>';
							}
					   ?>
				</select><br/>
				Harga <br/>
				<input type="number" name="harga" required=""><br/>

				Gambar </br>
				 <input type="file" name="userfile">

				<table style="margin:20px auto;">
				<tr>
					<td></td>
						<a href="<?php echo base_url()?>distro">Kembali</a>
				</tr>

				</table>

    <?php echo form_submit("submit","Submit"); ?>
    </div>
    </form>
    <script type="text/javascript">
	  	$("#id_jenis_kain").change(function(){
	    		var selectValues = $("#id_jenis_kain").val();
	    		if (selectValues == 0){
	    			var msg = "Warna kain :<br><select name=\"id_warna_kain\" disabled><option value=\"Pilih Warna Kain\">Pilih Kain Dahulu</option></select>";
	    			$('#warna').html(msg);
	    		}else{
	    			var id_jenis_kain = {id_jenis_kain:$("#id_jenis_kain").val()};
	    			$('#id_warna_kain').attr("disabled",true);
	    			$.ajax({
							type: "POST",
							url : "<?php echo base_url('distro/select_warna')?>",
							data: id_jenis_kain,
							success: function(msg){
								$('#warna').html(msg);
							}
				  	});
	    		}
	    });
	   </script>
</body>

</html>

