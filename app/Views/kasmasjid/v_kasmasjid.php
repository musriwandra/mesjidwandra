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
    <div class="page-content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-m-b-30">
                    <div class="card-header">
                        <h4 class="mt-0 header-title">Data Kas Masuk</h4>

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
                                    <table class="table table-sm table-striped" id="datakasmasjid">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Kas Masuk</th>
                                                <th>Jenis Kas</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($kasmasjid as $val) {
                                                $no++; ?>
                                                <tr role="row" class="odd">
                                                    <td><?= $no; ?></td>
                                                    <td><?= $val['id_kas_masjid'] ?></td>
                                                    <td><?= $val['tanggal'] ?></td>
                                                    <td><?= $val['ket'] ?></td>
                                                    <td><?= $val['kas_masuk'] ?></td>
                                                    <td><?= $val['jenis_kas'] ?></td>

                                                    <td>
                                                        <button type="button" class="btn btn-info btn-sm btn-edit" data-id_kas_masjid="<?= $val['id_kas_masjid']; ?>" data-tanggal="<?= $val['tanggal'] ?>" data-ket="<?= $val['ket'] ?> " data-kas_masuk="<?= $val['kas_masuk'] ?> " data-jenis_kas="<?= $val['jenis_kas'] ?> ">
                                                            <i class="fa fa-tags"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-delete" data-id_kas_masjid="<?= $val['id_kas_masjid']; ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TAMBAH DATA -->
    <form action="/kasmasjid/save" method="post">
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h4> Periksa Entrian Form Anda<h4>
                        </hr />
                        <?php echo session()->getFlashdata('error'); ?>
                        <button type="button" id="addModal" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
            </div>
        <?php endif; ?>
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kas Masuk</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label>Tanggal</label>
                            <input type="date" class="form-control " name="tanggal" value="<?= date('Y-m-d') ?>">
                        </div>
                        <!-- menambah kan donatur -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">    
                                        <label>Donatur</label>
                                        <button type="button" data-toggle="modal" data-target="#modal_donatur" class="btn btn-xs btn-primary">Donatur</button>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>ID</label>
                                        <input type="text" name="iddonatur" readonly id="iddonatur" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Nama Donatur</label>
                                        <input type="text" readonly id="nama" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Keterangan</label>
                            <input type="text" class="form-control " name="ket">
                        </div>
                        <div class="col-md-12">
                            <label>Kas Masuk</label>
                            <input type="number" class="form-control " name="kas_masuk">
                        </div>

                        <div class="col-md-12">
                            <label>Jenis Kas</label>
                            <select name="jenis_kas" id="jenis_kas" class="form-control">
                                <option value="anak yatim">Anak Yatim</option>
                                <option value="tpq">TPQ</option>
                                <option value="sosial">Sosial</option>

                            </select>
                        </div>
                        <div class="col-md-12">

                            <input type="hidden" class="form-control status" name="status" value="masuk">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- HAPUS DATA -->
    <form action="/kasmasjid/delete" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Kas Masuk</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Yakin Menghapus Data Ini?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" class="id">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
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
                            <label>ID</label>
                            <input type="text" class="form-control id" name="id">
                        </div>
                        <div class="col-md-12">
                            <label>Tanggal</label>
                            <input type="date" class="form-control tanggal" name="tanggal" value="<?= date('Y-m-d') ?>">
                        </div>
                        <!-- menambah kan donatur -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Donatur</label>
                                        <button type="button" data-toggle="modal" data-target="#modal_donatur" class="btn btn-xs btn-primary">Donatur</button>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>ID</label>
                                        <input type="text" name="iddonatur" readonly id="iddonatur" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Nama Donatur</label>
                                        <input type="text" readonly id="nama" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Keterangan</label>
                            <input type="text" class="form-control kt" name="ket">
                        </div>
                        <div class="col-md-12">
                            <label>Kas Masuk</label>
                            <input type="number" class="form-control kas_masuk" name="kas_masuk">
                        </div>

                        <div class="col-md-12">
                            <label>Jenis Kas</label>
                            <select name="jenis_kas" id="jenis_kas" class="form-control">
                                <option value="anak yatim">Anak Yatim</option>
                                <option value="tpq">TPQ</option>
                                <option value="sosial">Sosial</option>
                                <option value="mesjid">Masjid</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="modal fade" id="modal_donatur">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Donatur</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama Donatur</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data_donatur as $d) :
                                $no++; ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?= $d->iddonatur ?></td>
                                    <td><?= $d->nama ?></td>
                                    <td><?= $d->nohp ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" onclick="return pilih_donatur('<?= $d->iddonatur ?>','<?= $d->nama ?>')">
                                            Pilih
                                        </button>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.btn-edit').on('click', function() {
            const id = $(this).data('id_kas_masjid');
            const tanggal = $(this).data('tanggal');
            const ket = $(this).data('ket');
            const kas_masuk = $(this).data('kas_masuk');
            const jenis_kas = $(this).data('jenis_kas');
            const iddonatur = $(this).data('iddonatur');

            $('.id').val(id);
            $('.tanggal').val(tanggal);
            $('.ket').val(ket);
            $('.kas_masuk').val(kas_masuk);
            $('.jenis_kas').val(jenis_kas);
            $('.iddonatur').val(iddonatur).trigger('change');
            $('#editModal').modal('show');

        });
        $('.btn-delete').on('click', function() {
            const id = $(this).data('id_kas_masjid');
            $('.id').val(id);
            $('#deleteModal').modal('show');
        });
        $(document).ready(function() {
            $('#datakasmasuk').DataTable();
        });

        function pilih_donatur(id, nama) {
            $('#iddonatur').val(id);
            $('#nama').val(nama);
            $('#modal_donatur').modal().hide();
            // $('#modal_obat .close').click()
        }
    </script>
    <?= $this->endSection('') ?>