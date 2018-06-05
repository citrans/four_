<h4>LAPORAN TRANSAKSI DISTRO</h4>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No</th>
         <th>ID transaksi</th>
        <th>ID beli</th>
        <th>Nama pelanggan</th>
        <th>Nama admin</th>
        <th>Waktu bayar</th>
        <th>Status</th>
        <th></th>
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
                <td><?php echo $row->username; ?></td>
                 <td><?php echo $row->nama_admin; ?></td>
                <td><?php echo $row->waktu_bayar; ?></td>
                <td><?php echo $row->status; ?></td>
                <td>
                    <a class="btn btn-mini" href="<?php echo site_url('laporan/view_distro'.$row->id_tr_beli)?>">
                        <i class="icon-eye-open"></i> View</a>
                </td>

            </tr>

        <?php }
    }
    ?>

    </tbody>
</table>