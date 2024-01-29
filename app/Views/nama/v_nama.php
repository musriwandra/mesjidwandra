<?= $this->extend('layoutuser/main')?>
<?= $this->extend('layoutuser/menu')?>

<?= $this->section('isi')?>

<head>
<!-- DataTables -->
    <link href="<?=base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Required datatable js -->
    <script src="<?=base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
         <script src="<?=base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
</head>

<div class="col-sm-12">
    <div class="page-content-wrapper">
        <div class="row">
            <div class="card-m-b-30">
                <div class="card-header">
                    <h4 class="mt-0 header-tittle">Data Nama</h4>            
                </div>
                <div class="card-body">

                    <div class="col-md-12">
                        <button type="button" class="btn btn-sm btn-primary" data-target="#addModal" data-toggle="modal">Tambah Data</button>
                    </div>
                    <br>
                    <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-sm table-striped" id="datapnama">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Nama siswa</th>
                                            <th>Alamat</th>
                                            <th>Jurusan</th>
                                            <th>No Hp</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>            
                                    <tbody>
                                        <?php $no = 0;
                                        foreach ($nama as $val){
                                            $no++;?>
                                            <tr role="row" class="odd">
                                                <td><?= $no; ?></td>
                                                <td><?= $val['id_nama'] ?></td>
                                                <td><?= $val['nama_siswa'] ?></td>
                                                <td><?= $val['alamat'] ?></td>
                                                <td><?= $val['jurusan'] ?></td>
                                                <td><?= $val['no_hp'] ?></td>
                                                <td>
                                                <button type="button" class="btn btn-info btn-sm btn-edit" data-id_nama="<?= $val['id_nama'];?>"
                                                    data-nama_siswa="<?= $val['nama_siswa'] ?>" data-alamat="<?= $val['alamat'] ?> "
                                                    data-jurusan="<?= $val['jurusan'] ?>" data-no_hp="<?= $val['no_hp'] ?>">
                                                        <i class="fa fa-tags"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm btn-delete"data-id_nama="<?= $val['id_nama'];?>">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php } ?>
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
<form action="/nama/save" method="post">
<?php if (!empty(session()->getFlashdata('error'))):?>
    <div class="alert alert-denger alert-dismissible fade show" role="alert">
        <h4> Periksa Entrian Form Anda<h4>
        </hr/>
        
        <?php echo session()->getFlashdata('error');?>
            <button type="button" id="addModal" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
    <?php endif;?>
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nama</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <label>ID Nama</label>
            <input type="text" class="form-control" name="id_nama">
        </div>
        <div class="col-md-12">
            <label>Nama Siswa</label>
            <input type="text" class="form-control" name="nama_siswa">
        </div>
        <div class="col-md-12">
            <label>Alamat</label>
            <input type="text" class="form-control" name="alamat">
        </div>
        <div class="col-md-12">
            <label>Jurusan</label>
            <input type="text" class="form-control" name="jurusan">
        </div>
        <div class="col-md-12">
            <label>No_HP</label>
            <input type="text" class="form-control" name="no_hp">
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
<form action="/nama/delete" method="post">
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Nama</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Apakah Yakin Menghapus Data Nama Ini?</p>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id" class="id_nama">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- edit modal -->
<form action="/nama/update" method="post">
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nama</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <label>ID Nama</label>
            <input type="text" class="form-control id" name="id_nama">
        </div>
        <div class="col-md-12">
            <label>Nama Siswa</label>
            <input type="text" class="form-control namasiswa" name="nama_siswa">
        </div>
        <div class="col-md-12">
            <label>Alamat</label>
            <input type="text" class="form-control alamat" name="alamat">
        </div>
        <div class="col-md-12">
            <label>Jurusan</label>
            <input type="text" class="form-control jurusan" name="jurusan">
        </div>
        <div class="col-md-12">
            <label>No Hp</label>
            <input type="text" class="form-control no_hp" name="no_hp">
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

$('.btn-edit').on('click',function(){
        const id = $(this).data('id_nama');
        const namasiswa = $(this).data('nama_siswa');
        const alamat = $(this).data('alamat');
        const jurusan = $(this).data('jurusan');
        const no_hp = $(this).data('no_hp');

        $('.id_nama').val(id);
        $('.namasiswa').val(namasiswa);
        $('.alamat').val(alamat);
        $('.jurusan').val(jurusan);
        $('.no_hp').val(no_hp).trigger('change');
        $('#editModal').modal('show');
        
    });
    $('.btn-delete').on('click', function(){
        const id = $(this).data('id_nama');
        $('.id_nama').val(id);
        $('#deleteModal').modal('show');
    });

    $(document).ready(function(){
            $('#datanama').DataTable();
    });
</script>
<?= $this->endSection('')?>