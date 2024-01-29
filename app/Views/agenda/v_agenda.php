<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>
<?= $this->section('isi') ?>

<head>
  <!-- DataTables -->
  <link href="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <!-- Required datatable js -->
  <script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
</head>

<div class="col-sm-12">
  <div class="page-content-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <div class="card-m-b-30">
          <div class="card-header">
            <h4 class="mt-0 header-tittle">Data Agenda</h4>
          </div>

          <div class="card-body">
            <div class="col-md-12">
              <button type="button" class="btn btn-sm btn-primary" data-target="#addModal" data-toggle="modal">Tambah Data</button>
            </div>
            <br>
            <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
              <div class="row">
                <div class="col-sm-12">
                  <table class="table table-sm table-striped" id="dataagenda">

                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama Agenda</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Jenis Agenda</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php $no = 0;
                      foreach ($agenda as $val) {
                        $no++; ?>
                        <tr role="row" class="odd">
                          <td><?= $no; ?></td>
                          <td><?= $val['id_agenda'] ?></td>
                          <td><?= $val['nama_agenda'] ?></td>
                          <td><?= $val['tanggal'] ?></td>
                          <td><?= $val['jam'] ?></td>
                          <td><?= $val['jenis_agenda'] ?></td>
                          <td style="display: flex;">

                            <button type="button" class="btn btn-info btn-sm btn-edit" data-id_agenda="<?= $val['id_agenda']; ?>" data-namaagenda="<?= $val['nama_agenda'] ?>" data-tanggal="<?= $val['tanggal'] ?> " data-jam="<?= $val['jam'] ?>">
                              <i class="fa fa-tags"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm btn-delete" data-id_agenda="<?= $val['id_agenda']; ?>">
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
  <form action="/agenda/save" method="post">
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
      <div class="alert alert-denger alert-dismissible fade show" role="alert">
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
            <h5 class="modal-title" id="exampleModalLabel">Agenda</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="col-md-12">
              <label>ID</label>
              <input type="text" class="form-control" name="id">
            </div>
            <div class="col-md-12">
              <label>Nama Agenda</label>
              <input type="text" class="form-control" name="namaagenda">
            </div>
            <div class="col-md-12">
              <label>Tanggal</label>
              <input type="date" class="form-control" name="tanggal">
            </div>
            <div class="col-md-12">
              <label>Jam</label>
              <input type="time" class="form-control" name="jam">
            </div>
            <div class="col-md-12">
              <label>Jenis Agenda</label>
              <select name="jenis_agenda" id="jenis_agenda" class="form-control jenis_agenda">
                <option value="Anak Yatim">Anak Yatim</option>
                <option value="TPQ">TPQ</option>
                <option value="Sosial">Sosial</option>
                <option value="Mesjid">Mesjid</option>
              </select>
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
  <form action="/agenda/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus Agenda</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Apakah Yakin Menghapus Data Agenda Ini?</p>
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
  <form action="/agenda/update" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agenda</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="col-md-12">
              <label>ID</label>
              <input type="text" class="form-control id" name="id">
            </div>
            <div class="col-md-12">
              <label>Nama Agenda</label>
              <input type="text" class="form-control namaagenda" name="namaagenda">
            </div>
            <div class="col-md-12">
              <label>Tanggal</label>
              <input type="date" class="form-control tanggal" name="tanggal">
            </div>
            <div class="col-md-12">
              <label>jam</label>
              <input type="time" class="form-control jam" name="jam">
            </div>
            <div class="col-md-12">
              <label>Jenis Kas</label>
              <select name="jenis_kas" id="jenis_kas" class="form-control jenis_kas">
                <option value="Anak Yatim">Anak Yatim</option>
                <option value="TPQ">TPQ</option>
                <option value="Sosial">Sosial</option>
                <option value="Mesjid">Mesjid</option>
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

  <script>
    $('.btn-edit').on('click', function() {
      const id = $(this).data('id_agenda');
      const namaagenda = $(this).data('namaagenda');
      const tanggal = $(this).data('tanggal');
      const jam = $(this).data('jam');
      const jenis_agenda = $(this).data('jenis_agenda');

      $('.id').val(id);
      $('.namaagenda').val(namaagenda);
      $('.tanggal').val(tanggal);
      $('.jam').val(jam)
      $('.jenis_agenda').val(jenis_agenda).trigger('change');
      $('#editModal').modal('show');
    });

    $('.btn-delete').on('click', function() {
      const id = $(this).data('id_agenda');
      $('.id').val(id);
      $('#deleteModal').modal('show');
    });

    $(document).ready(function() {
      $('#dataagenda').DataTable();
    });
  </script>
  <?= $this->endSection('') ?>