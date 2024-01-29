<center>
    <h2>Tampil Data UTS</h2>
    <hr>
    <table border="1">
        <tr>
            <td>NoBp</td>
            <td>Nama</td>
            <td>Uts </td>
            <td>Uas </td>
            <td>Keterangan</td>
        </tr>
        <?php
        foreach ($sppdok as $data):
        ?>
        <tr>
            <td><?= $data['nobp']?></td>
            <td><?= $data['nama']?></td>
            <td><?= $data['uts']?></td>
            <td><?= $data['uas']?></td>
            <td><?= $data['keterangan']?></td>
        </tr>
        <?php
        endforeach;
        ?>
    </table>
</center>