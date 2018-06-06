<h4>LAPORAN TRANSAKSI KONVEKSI</h4>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No</th>
         <th>ID transaksi</th>
        <th>ID pesan</th>
        <th>Nama Pelanggan</th>
        <th>Nama Admin</th>
        <th>Waktu Bayar</th>
        <th>Status</th>
        <th></th>

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
                <td><?php echo $row->username; ?></td>
                 <td><?php echo $row->nama_admin; ?></td>
                <td><?php echo $row->waktu_bayar; ?></td>
                <td><?php echo $row->status; ?></td>
                <td>
                    <a class="btn btn-mini" href="<?php echo site_url('laporan/view_konveksi/'.$row->id_tr_pesan)?>">
                        <i class="icon-eye-open"></i> View</a>
                </td>

            </tr>

        <?php }
    }
    ?>

    </tbody>
</table>