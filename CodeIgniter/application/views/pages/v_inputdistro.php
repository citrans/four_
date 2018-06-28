<html>
<head>
  <title>Tambah Barang Distro</title>
  <link href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
  <style>
  .file {
    visibility: hidden;
    position: absolute;
  }
  </style>
</head>
<body>
   <br><br><br><br><br>
   <div class="container">
     <h3 align="center"><b>MASUKAN PRODUK BARU</b></h3>
 <div class="col-md-3">
 </div>
 <div class="jumbotron col-md-6">
   <?=form_open_multipart('distro/proses_input')?>
    <div class="form-group">
      <label for="nama">JENIS BARANG DISTRO :</label>
      <select name="jenis_barang" class="form-control">
            <option>--pilih jenis barang distro--</option>
            <?php 
              foreach ($barang as $row){ 
              echo '<option value="'.$row->id_barang_distro.'>">'. $row->nama_barang.'</option>';
              }
             ?>
          </select>
    </div>
    <div class="form-group">
      <label for="nama">Nama :</label>
      <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Produk" id="nama" required>
    </div>
    <div class="form-group">
      <label for="harga">Harga :</label>
      <input type="number" name="harga" class="form-control" placeholder="Masukan Harga Produk" id="harga" required>
    </div>
    <div class="form-group">
      <label for="stok">Stok :</label>
      <input type="number" name="stok" class="form-control" placeholder="Masukan Stok Produk" id="stok" required>
    </div>
     <div class="form-group">
      <label for="nama">ID UKURAN :</label>
       <select name="ukuran" class="form-control">
            <option>--pilih ukuran barang--</option>
            <?php 
        
              foreach ($size as $row){ 
              echo '<option value="'.$row->id_ukuran.'>">'. $row->size.'</option>';
              }
             ?>
          </select></div>
    <div class="form-group">
      <label for="userfile">Gambar :</label>
      <input type="file" name="userfile" class="file">
      <div class="input-group col-xs-12">
        <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
        <input type="text" class="form-control input-lg" disabled placeholder="Upload Gambar">
        <span class="input-group-btn">
          <button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Telusuri</button>
        </span>
      </div><br>
    </div>
        <button type="submit" name="file" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
 </div>

</div> <!-- /container -->
  <script src="<?php echo base_url('asset/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('asset/js/jquery.min.js'); ?>"></script>
  <script type="text/javascript">
  $(document).on('click', '.browse', function(){
    var file = $(this).parent().parent().parent().find('.file');
    file.trigger('click');
  });
  $(document).on('change', '.file', function(){
    $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
  });
  </script>
</body>
</html>
