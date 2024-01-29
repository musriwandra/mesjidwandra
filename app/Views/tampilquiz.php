<center>
    <h2>Tampil Data Sepeda</h2>
    <hr>
    <table border="1">
        <tr>
            <td>Kode sepeda</td>
            <td>Jenis Sepeda</td>
            <td>Harga semua </td>
            <td>Jumlah Beli </td>
            <td>Harga Satuan</td>
        </tr>
        <?php
        foreach ($sppdok as $data):
        ?>
        <tr>
            <td><?= $data['kodesepeda']?></td>
            <td><?= $data['jenissepeda']?></td>
            <td><?= $data['hargasemua']?></td>
            <td><?= $data['jumlahbeli']?></td>
            <td><?= $data['hargasatuan']?></td>
        </tr>
        <?php
        endforeach;
        ?>
    </table>
</center>