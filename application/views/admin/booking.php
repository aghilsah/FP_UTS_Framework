<!-- MAIN -->
<div class="col-9">
    <h1>Data Booking : </h1>
    <hr>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID Booking</th>
                <th scope="col">ID User</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Alamat</th>
                <th scope="col">ID Kendaraan</th>
                <th scope="col">Kendaraan</th>
                <th scope="col">Durasi</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- 
            SELECT akun.nama, pesan.pesan, pesan.tanggal
            FROM pesan, akun
            WHERE pesan.user_id=akun.id 
            -->
            <?php
            $row = 1;
            foreach ($booking as $b) :
                if ($b->ketersediaan == 0) :
            ?>
                    <tr>
                        <th scope="row"><?= $row++; ?></th>
                        <td><?= $b->id; ?></td>
                        <td><?= $b->id_user; ?></td>
                        <td><?= $b->peminjam; ?></td>
                        <td><?= $b->alamat; ?></td>
                        <td><?= $b->id_kendaraan; ?></td>
                        <td><?= $b->kendaraan; ?></td>
                        <td><?= $b->durasi; ?></td>
                        <td><?= $b->harga; ?></td>
                        <td class="align-middle">
                            <a href="<?= base_url('kendaraan/terima/' . $b->id_user); ?>" class="btn btn-success"><i class="fa fa-check"> Terima</i></a>
                            <a href="<?= base_url('kendaraan/tolak/' . $b->id); ?>" class="btn btn-danger"><i class="fa fa-remove"> Tolak</i></a>
                        </td>
                    </tr>
            <?php
                endif;
            endforeach; ?>
        </tbody>
    </table>
</div>
</div>