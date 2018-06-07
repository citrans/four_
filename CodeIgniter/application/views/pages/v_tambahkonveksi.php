<!DOCTYPE html>
<html>
<head>
	<title>Data Barang</title>
	 <style type="text/css">
  .file {
    visibility: hidden;
    position: absolute;
  }
  	*, *:before, *:after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
.fixed-top {
    position: relative;
    top: 0;
    right: 0;
    left: 0;
	bottom:0;
    z-index: 1030;
}

nav {
	margin:auto; 
	text-align: left;
	
}
body{
	background-color:#00FFFF;
	background: url('galon.jpg');
	
}
nav ul {
	background: #0099ff; 
	padding:13px 28.5px;
	border-radius: 0px;  
	list-style: none;
	position: relative;
	display: inline-table;
	
}
nav ul:after {
		content: ""; clear: both; display: block; 
	}
		nav ul li {
		float: left;
	}
		nav ul li:hover {
			background: #F33;
		}
			nav ul li:hover a {
				color: #fff;
			}
		
		nav ul li a {
			display: block; padding: 0.7px 45px;
			color: #fff; text-decoration: none;
		}
			
		
	nav ul ul {
		background: #0099ff; border-radius: 0px; padding: 0px;
		position: relative; top: ;
	}
		nav ul ul li {
			float: none; 
			border-top: 0px solid #0099ff;
			border-bottom: 1px solid #0099ff; position: ;
		}
			nav ul ul li a {
				padding: 0 px 0px ;
				color: #fff;
			}	
				nav ul ul li a:hover {
					background: #666;
				}
		
	nav ul ul ul {
		position: absolute; left: 100%;  top:0;
	}
		#footer_bottom {
background-color: #0e639d;
padding-top: 13px;
padding-bottom: 17px;
margin-top:70px;
}
#footer_bottom .copyright {
text-align: center;
font-size: 16px;
color: #81ccff;
}
#footer_bottom .copyright a {
color: #fff;
font-size: 19px;
}
.blog{
width:700px;
height:400px;
border:1px solid #e2e2e2;
float:right;
margin-right:300px;
background-color:white;
}
#blog_text{
padding: 20px;
}
.content {
    margin: 0 auto;
    padding-top: 30px;
    max-width: 1100px;
}
.footer {
    color: #ffffff;
    position: relative;
	top:107px;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 20px;
    background-color: #9e9e9e;
    text-align: center;
}
.cards {
	width: 1000px;
	box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  	transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  	border-radius: 2px;
  	overflow: hidden;
  	margin: 0 auto;
}
.cards-image {
	width: 100%;
}
.cards-image img {
	width: 100%
}
.cards-box {
	padding: 15px;
}

.button{
    width: 100%;
    height: 50px;
  }
  .left{
    float: left;
    display: block;
  }
  .right{
    float: right;
    display: block;
  }
.button ul a{
  padding: 10px;
  background: rgb(116, 181, 12);
  color: white;
}
#page-wrap{
width: 490px;
margin: 50px auto;
padding: 20px;
background: whitesmoke;
-moz-box-shadow: 0 0 20px blue;
-webkit-box-shadow: 0 0 20px blue;
box-shadow: 0 0 20px blue;
}
body{
	background-color:#FFFFF;
	-webkit-background-size: cover;
-moz-background-size: cover;
background-size: 100%;
	
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
	<form class="form-horizontal" method="post" action="<?php echo base_url('distro/tambah_konveksi')?>" enctype = "multipart/from-data">
		<table style="margin:20px auto;">
			<tr>
				<td>nama barang</td>
				<td><input type="text" name="nama" required=""></td> 
			</tr>
			<tr>
				<td>jenis kain</td>
				   <td> <select name="jenis_barang">
						<?php foreach ($barang as $row){ ?>
						<option value="<?php echo $row->id_jenis_kain;?>"><?php echo $row->nama_kain;?></option>
						<?php }?>
					</select></td>
			</tr>
			<tr>
				<td>brand kain</td>
				   <td> <select name="tipe_jenis_kain">
						<?php foreach ($barang as $row){ ?>
						<option value="<?php echo $row->id_jenis_kain;?>"><?php echo $row->tipe_jenis_kain;?></option>
						<?php }?>
					</select></td>
			</tr>
			<tr>
				<td>Bordir</td>
				   <td>
				     <select name="bordir">
                        <option value="bordir">Bordir</option>
                        <option value="sablon">Sablon</option>
                    </select>
				</td>
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
				<td>harga barang</td>
				<td><input type="text" name="harga" required=""></td> 
			</tr>
			<tr>
				<td></td>
				<a href="<?php echo base_url()?>distro">Kembali</a>
				<td><input type="submit" name="submit" value="Tambah"></td>
			</tr>
		</table>
	</form>	
	</div></div>
</body>

</html>

