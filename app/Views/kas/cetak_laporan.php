<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>
<?= $this->section('isi') ?>
<div class="col-md-12">
    <div class="card card-outline">
        <div class="invoice col-sm-12 p-3 mb-3">
            <div id="div1">
                <div class="row">
                    <div class="col-12">
                        <table>
                            <tr>
                                <td width=200>
                                    <img src="<?= base_url() ?>/images/logostmik.jpg" width="100" alt="">
                                    <img src="<?php echo base_url() . '/image/' . 'logostmik.jpg' ?>" height="100" width="100" class="img-fa">
                                </td>
                                <td width="580">
                                    <center>
                                        <p>
                                        <h4> Masjid Asra AL-Baqrie</h4>
                                        </p>
                                        <p>
                                        <h4> JL.Olo ladang, Kec.Padang Barat</h4>
                                        </p>
                                        <p>
                                        <h5>Kota Padang, Sumatra Barat</h5>
                                        </p>
                                    </center>
                                </td>
                                <td width="200"></td>
                            </tr>
                        </table>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table bordered table-striped">
                            <thead>
                                <tr role="row">
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Kas Masuk</th>
                                    <th>Jenis Kas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                $semua = 0;
                                foreach ($kas as $val) {
                                    $s = $val['kas_masuk'];
                                    $semua = $s + $semua;
                                    $no++; ?>
                                    <tr role="row" class="odd">
                                        <td><?= $no; ?></td>
                                        <td><?= $val['tanggal'] ?></td>
                                        <td><?= $val['ket'] ?></td>
                                        <td><?= $val['kas_masuk'] ?></td>
                                        <td><?= $val['jenis_kas'] ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="3"> Total Pemasukan</td>
                                    <td><?= $semua ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <br><br><br><br>
                        Padang, <?= date('d / M / y') ?>
                        <br><br><br>
                        Ketua <br>
                        DR. Musri Wandra <br>
                    </div>
                </div>
            </div>
            <div class="row no-print">
                <div class="col-12">
                    <button onclick="printContent('div1')" class="btn btn-primary"><i class="fa fa-print"></i>Print</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>
<?= $this->endSection('') ?>