<!--================ Content Wrapper===========================================-->

<h4>PESANAN KONVEKSI</h4>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>ID Pesan</th>
        <th>Nama Pelanggan</th>
        <th>Nama BARANG</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
        <th>Waktu pesan</th>
        <th>Waktu Bayar</th>
        <th>Status</th>
        <th class="span2"></th>
           
    </tr>
    </thead>
    <tbody>
    <?php
    $no=1;
    if(isset($data_penjualan_konveksi)){
        foreach($data_penjualan_konveksi as $row){
            ?>
            <tr class="gradeX">
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->id_pesan; ?></td>
                <td><?php echo $row->username; ?></td>
                <td><?php echo $row->jenis_barang; ?></td>
                <td><?php echo $row->jumlah_pesan; ?> Items</td>
                <td><?php echo $row->total_harga; ?></td>
                <td><?php echo $row->waktu_pesan; ?></td>
                <td><?php echo $row->waktu_bayar; ?></td>
                <td><?php echo $row->status; ?></td>
                <td>
                    <a class="btn btn-mini" href="<?php echo site_url('penjualan/detail_jual_konveksi/'.$row->id_tr_pesan)?>">
                        <i class="icon-eye-open"></i> Ubah</a>
                    <a class="btn btn-mini" href="<?php echo site_url('penjualan/hapus_konveksi/'.$row->id_tr_pesan)?>"
                       onclick="return confirm('Anda Yakin ?');">
                        <i class="icon-trash"></i> Hapus</a>
                </td>
            </tr>
        <?php }
    }
    ?>

    </tbody>
</table>



