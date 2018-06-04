<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Pelanggan</th>
        <th>Alamat</th>
        <th>No Telepon</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no=1;
    if(isset($data_pelanggan)){
        foreach($data_pelanggan as $row){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->username; ?></td>
                <td><?php echo $row->alamat; ?></td>
                <td><?php echo $row->no_telp; ?></td>
                <td>
                    <a class="btn btn-mini" href="<?php echo site_url('master/hapus_pelanggan/'.$row->id_pelanggan);?>"
                       onclick="return confirm('Anda yakin?')"> <i class="icon-remove"></i> Hapus</a>
                </td>
            </tr>

        <?php }
    }
    ?>

    </tbody>
</table>