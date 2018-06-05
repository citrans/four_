<!--================ Content Wrapper===========================================-->

<h4>PESANAN KONVEKSI</h4>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>ID Pesan</th>
        <th>ID Pelanggan</th>
        <th>ID BARANG</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Total Harga</th>
        <th>Tanggal pesan</th>
        <th>Jam pesan</th>
        <th class="span3"></th>
           
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
                <td><?php echo $row->id_pelanggan; ?></td>
                <td><?php echo $row->id_barang_konveksi; ?></td>
                <td><?php echo $row->jumlah_pesan; ?> Items</td>
                <td><?php echo $row->harga_satuan; ?> Items</td>
                <td><?php echo $row->total_harga; ?></td>
                <td><?php echo $row->tanggal_pesan; ?></td>
                <td><?php echo $row->jam_pesan; ?></td>
                <td>
                    <a class="btn btn-mini" href="<?php echo site_url('penjualan/detail_penjualan/'.$row->id_pesan)?>">
                        <i class="icon-eye-open"></i> View</a>
                    <a class="btn btn-mini" href="<?php echo site_url('penjualan/hapus/'.$row->id_pesan)?>"
                       onclick="return confirm('Anda Yakin ?');">
                        <i class="icon-trash"></i> Hapus</a>
                    <a class="btn btn-mini btnPrint" href="<?php echo site_url('cetak/print_penjualan/'.$row->id_pesan)?>">
                        <i class="icon-print"></i> Print</a>
                </td>
            </tr>
        <?php }
    }
    ?>

    </tbody>
</table>



