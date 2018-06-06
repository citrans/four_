<!--================ Content Wrapper===========================================-->
<h4>PESANAN DISTRO</h4>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>ID Beli</th>
        <th>Nama Pelanggan</th>
        <th>JENIS BARANG</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
        <th>Waktu Beli</th>
        <th>Waktu Bayar</th>
        <th>Status</th>
        <th class="span2"></th>
           
    </tr>
    </thead>
    <tbody>
    <?php
    $no=1;
    if(isset($data_penjualan)){
        foreach($data_penjualan as $row){
            ?>
            <tr class="gradeX">
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->id_beli; ?></td>
                <td><?php echo $row->username; ?></td>
                <td><?php echo $row->nama_jenis_barang_distro; ?></td>
                <td><?php echo $row->jumlah_beli; ?> Items</td>
                <td><?php echo $row->total_harga; ?></td>
                <td><?php echo $row->waktu_beli; ?></td>
                <td><?php echo $row->waktu_bayar; ?></td>
                <td><?php echo $row->status; ?></td>
                <td>
                    <a class="btn btn-mini" href="<?php echo site_url('penjualan/detail_penjualan/'.$row->id_tr_beli)?>">
                        <i class="icon-eye-open"></i> Ubah</a>
                    <a class="btn btn-mini" href="<?php echo site_url('penjualan/hapus_jual/'.$row->id_tr_beli)?>"
                       onclick="return confirm('Anda Yakin ?');">
                        <i class="icon-trash"></i> Hapus</a>
                </td>
            </tr>
        <?php }
    }
    ?>

    </tbody>
</table>



