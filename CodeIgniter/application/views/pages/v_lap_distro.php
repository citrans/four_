<h4>LAPORAN TRANSAKSI DISTRO</h4>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No</th>
         <th>ID transaksi</th>
        <th>ID beli</th>
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
    if(isset($data_tr_beli)){
        foreach($data_tr_beli as $row){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->id_tr_beli; ?></td>
                <td><?php echo $row->id_beli; ?></td>
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