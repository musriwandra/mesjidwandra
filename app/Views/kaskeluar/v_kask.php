<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>
<?= $this->section('isi') ?>

<head>
    <link href="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
</head>

<div class="col-sm-12">
    <div class="page-content-wrapper ">

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">

                    <div class="card-header">
                        <h4 class="mt-0 header-title">Data kas Keluar</h4>

                    </div>
                    <div class="card-body">

                        <div class="col-md-12">
                            <button type="button" class="btn btn-info m-b-10 m-l-10 waves-effect waves-light" data-target="#addModal" data-toggle="modal">
                                <i class="fa fa-plus-circle m-r-5"></i>Tambahkan Data</button>
                        </div>
                        <br>
                        <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-sm table-striped" id="datakas">
                                        <thead>
                                            <tr role="row">

                                                <th>ID</th>
                                                <th>Tanggal </th>
                                                <th>Ket</th>
                                                <th>Kas Keluar</th>
                                                <th>Jenis Kas</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $total = 0; ?>
                                            <?php $no = 0;

                                            foreach ($kask as $val) {

                                                $no++; ?>
                                                <tr role="row" class="odd">

                                                    <td><?= $val['id_kas_masjid'] ?></td>
                                                    <td><?= $val['tanggal'] ?></td>
                                                    <td><?= $val['ket'] ?></td>
                                                    <td><?= $val['kas_keluar'] ?></td>
                                                    <?php $total += $val['kas_keluar'] ?>
                                                    <td><?= $val['jenis_kas'] ?></td>
                                                    <td>

                                                        <button type="button" class=" btn btn-info btn-sm  btn-edit" data-id="<?= $val['id_kas_masjid']; ?>" data-tanggal="<?= $val['tanggal']; ?>" data-ket="<?= $val['ket']; ?>" data-kas_masuk="<?= $val['kas_masuk']; ?>" data-kas_keluar="<?= $val['kas_keluar']; ?>" data-jenis_kas="<?= $val['jenis_kas']; ?>">
                                                            <i class="fa fa-tags"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="<?= $val['id_kas_masjid']; ?>">
                                                            <i class="fa fa-trash"></i>

                                                        </button>
                                                    </td>
                                                </tr>

                                            <?php
                                            }
                                            ?>
                                        <tbody>

                                            <th colspan="3">Total Kas keluar</th>
                                            <th colspan="4"><?= $total ?></th>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div> <!--end row-->
    </div>
</div>
</form>

<form action="/kaskeluar/save" method="post">

    <div class="modal fade" id="addModal" tabindex="-1" aria-LabelLedby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kas</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-Label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">

                        <div class="col-md-12">
                            <label>tanggal</label>
                            <input type="date" class="form-control" name="tanggal">
                        </div>
                        <div class="col-md-12">
                            <label>Ket</label>
                            <input type="text" class="form-control" name="ket">
                        </div>
                        <div class="col-md-12">
                            <label>Kas Keluar</label>
                            <input type="number" class="form-control" name="kas_keluar">
                        </div>

                        <div class="col-md-12">
                            <label for="jenis_kas"> Jenis Kas </label>
                            <select name="jenis_kas" id="jenis_kas" class="form-control">
                                <option value="Anak Yatim">Anak Yatim</option>
                                <option value="TPQ">TPQ</option>
                                <option value="Sosial">Sosial</option>
                                <option value="Mesjid">Mesjid</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-googleplus m-b-9 m-l-9 waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Save</button>
                    </div>
                </div>
            </div>
        </div>
</form>

<!-- edit modal -->
<form action="/kasmasjid/update" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kas Masuk</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">

                        <input type="hidden" class="form-control id" name="id">
                    </div>
                    <div class="col-md-12">
                        <label>Tanggal</label>
                        <input type="date" class="form-control tanggal" name="tanggal" value="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="col-md-12">
                        <label>Keterangan</label>
                        <input type="text" class="form-control ket" name="ket">
                    </div>
                    <div class="col-md-12">
                        <label>Kas Keluar</label>
                        <input type="number" class="form-control kas_keluar" name="kas_keluar">
                    </div>

                    <div class="col-md-12">
                        <label>Jenis Kas</label>
                        <select name="jenis_kas" id="jenis_kas" class="form-control jenis_kas">
                            <option value="Anam Yatim">Anak Yatim</option>
                            <option value="Berbagi">Berbagi</option>
                            <option value="Sosial">Sosial</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>


<form action="/kaskeluar/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-LabelLedby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus kas</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-Label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3> Masa Iya Kamu Hapus INi, Serius?</h3>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-outline-primary waves-effect waves-light">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>



<script>
    $('.btn-delete').on('click', function() {
        const id = $(this).data('id');
        $('.id').val(id);
        $('#deleteModal').modal('show');
    });

    $('.btn-edit').on('click', function() {
        const id = $(this).data('id');
        const tanggal = $(this).data('tanggal');
        const ket = $(this).data('ket');
        const kas_keluar = $(this).data('kas_keluar');
        const jenis_kas = $(this).data('jenis_kas');

        $('.id').val(id);
        $('.tanggal').val(tanggal);
        $('.ket').val(ket);
        $('.kas_keluar').val(kas_keluar);
        $('.jenis_kas').val(jenis_kas).trigger('change');
        $('#editModal').modal('show');
    });

    $(document).ready(function() {
        $('#datakask').DataTable();
    });
</script>
<?= $this->endSection('') ?>