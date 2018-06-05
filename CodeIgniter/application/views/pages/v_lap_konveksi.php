<h4>LAPORAN TRANSAKSI KONVEKSI</h4>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No</th>
         <th>ID transaksi</th>
        <th>ID pesan</th>
        <th>ID admin</th>
        <th>Tanggal Bayar</th>
        <th>Jam Bayar</th>
        <th>Status</th>

        </th>
    </tr>
    </thead>
    <tbody>

    <?php
    $no=1;
    if(isset($data_tr_pesan)){
        foreach($data_tr_pesan as $row){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->id_tr_pesan; ?></td>
                <td><?php echo $row->id_pesan; ?></td>
                <td><?php echo $row->id_admin; ?></td>
                 <td><?php echo $row->tgl_bayar; ?></td>
                <td><?php echo $row->jam_bayar; ?></td>
                <td><?php echo $row->status; ?></td>

            </tr>

        <?php }
    }
    ?>

    </tbody>
</table>