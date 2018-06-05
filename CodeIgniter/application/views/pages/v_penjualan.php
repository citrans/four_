<!--================ Content Wrapper===========================================-->
<h4>PESANAN DISTRO</h4>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>ID Beli</th>
        <th>ID Pelanggan</th>
        <th>ID JENIS BARANG</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
        <th>Tanggal Beli</th>
        <th>Jam Beli</th>
        <th class="span3"></th>
           
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
                <td><?php echo $row->id_pelanggan; ?></td>
                <td><?php echo $row->id_jenis_barang_distro; ?></td>
                <td><?php echo $row->jumlah_beli; ?> Items</td>
                <td><?php echo $row->total_harga; ?></td>
                <td><?php echo $row->jam_beli; ?></td>
                <td><?php echo $row->tgl_beli; ?></td>
                <td>
                    <a class="btn btn-mini" href="<?php echo site_url('penjualan/detail_penjualan/'.$row->id_beli)?>">
                        <i class="icon-eye-open"></i> View</a>
                    <a class="btn btn-mini" href="<?php echo site_url('penjualan/hapus/'.$row->id_beli)?>"
                       onclick="return confirm('Anda Yakin ?');">
                        <i class="icon-trash"></i> Hapus</a>
                    <a class="btn btn-mini btnPrint" href="<?php echo site_url('cetak/print_penjualan/'.$row->id_beli)?>">
                        <i class="icon-print"></i> Print</a>
                </td>
            </tr>
        <?php }
    }
    ?>

    </tbody>
</table>



