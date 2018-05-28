<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Image Upload</title>
	</head>
	<body>
		<?php
		echo $this->session->flashdata('msg');
		echo form_open_multipart();
		echo form_upload('file');
		echo form_submit('upload','upload');
		echo form_close(); 
		?>
		<table>
			<tr>
				<td>File</td>
				<td>Action</td>
			</tr>
			<!--buat nampilkan data gambar dari folder komputer yang ditampilkan secara tabel-->
			<?php
			if($get_image->num_rows()>0){
				foreach ($get_image->result() as $data){
					echo '<tr>';
					echo '<td>'.img(array('width'=>'120','height'=>'80', 'src'=> 'image/'.$data->path)).'<td>';
					echo '<td>'.anchor('image/'.$data->path,'View').' |'.anchor('image/delete_image/'.$data->id, 'Delete').' </td>';// view= buat lihat gambar lebih besar, delete = buat hapus gambar
					echo '</tr>';
				}
			}else{
					echo'<tr>';
					echo'<td colspan="2">Images is empty</td>';
					echo '</tr>';
				}
			?>
		</table>
	</body>
</html>