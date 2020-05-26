<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/jquery.mask.min.js') ?>"></script>
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>
  <?= $this->session->flashdata('msg'); ?>
  <button class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target=".bd-example-modal-lg">
    <span class="icon text-white-50">
      <i class="fas fa-plus"></i>
    </span>
    <span class="text">Input Data Rekanan</span>
  </button>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Rekanan</h6>
    </div>
    <div class="card-body">
      <?php if (isset($rekanan)) : ?>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Rekanan</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($rekanan as $r) :
                ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td class=" font-weight-bold"><?= $r->nama_konsultan; ?></td>
                  <td class=" font-weight-lighter"><?= $r->alamat; ?> <br> Kecataman <?= $r->kecamatan; ?>, <br> Kab/Kota <?= $r->kota; ?> <br> <?= $r->provinsi; ?></td>
                  <td class=" font-weight-lighter"><span class="no_hp"><?= $r->telpon; ?></span></td>
                  <td class=" font-weight-lighter"><?= $r->keterangan ?></td>
                  <td align="center" class=" font-weight-lighter"><a href="<?= base_url('admin/vedit_rekanan/') ?><?= $r->id ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a> | <a href="<?= base_url('admin/hapus_rekanan/') ?><?= $r->id ?>" onclick="return confirm_delete()" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash text-danger"></i></a> | <a href="<?= base_url('admin/detrekanan/') ?><?= $r->id ?>" data-toggle="tooltip" data-placement="top" title="detail"><i class="fas fa-info-circle text-info"></i></a> </td>
                </tr>
                <?php $no++;
              endforeach; ?>
            </tbody>
            <!-- <tr><td colspan="2"></td><td colspan="1">Jumlah Anggaran</td><td class="font-weight-bold" colspan="1">Rp. <span class="uang"> <?= $saldo ?> </span></td><td colspan="2"></td></tr> -->
          </table>
        </div>
      <?php endif; ?>
    </div>
  </div>

</div>
</div>

<!-- Modal Input-->
<div class="modal fade bd-example-modal-lg" id="minputpekerjaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Rekanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url() ?>admin/tambah_rekanan" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="formGroupExampleInput">Nama Rekanan</label>
            <input type="text" name="namarekanan" class="form-control" id="formGroupExampleInput" placeholder="Nama Rekanan">
          </div>

          <div class="form-group">
            <label for="inputAddress">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="inputAddress" placeholder="Isi Alamat">
          </div>

          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="inputAddress">Kecamatan</label>
              <input type="text" name="kecamatan" class="form-control" id="inputAddress" placeholder="Isi Kecamatan">
            </div>

            <div class="form-group col-md-3">
              <label for="inputCity">Kota/Kabupatan</label>
              <input type="text" name="kota" class="form-control" id="inputCity">
            </div>

            <div class="form-group col-md-3">
              <label for="inputZip">Kodepos</label>
              <input type="number" class="form-control" name="kodepos" id="inputZip">
            </div>

            <div class="form-group col-md-3">
              <label for="inputState">Provinsi</label>
              <select id="inputState" class="form-control" name="provinsi">
                <option selected>Choose...</option>
                <?php foreach ($dataprovinsi as $prov) : ?>
                  <option value="<?= $prov->nama ?>"><?= $prov->nama ?></option>
                <?php endforeach; ?>
              </select>
            </div>

          </div>
          <div class="input-group flex-nowrap mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="addon-wrapping">Telepon</span>
            </div>
            <input type="text" class="form-control no_hp" name="telpon" placeholder="Isi No telpon" aria-label="telpon" aria-describedby="addon-wrapping">
          </div>
          <div class="input-group flex-nowrap mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="addon-wrapping">Keterangan</span>
            </div>
            <input type="text" class="form-control" name="keterangan" placeholder="Keterangan Rekanan" aria-label="keterangan" aria-describedby="addon-wrapping">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  $(document).ready(function($) {

    // Format mata uang.
    $('.uang').mask('000.000.000,-', {
      reverse: true
    });

    // Format nomor HP.
    $('.no_hp').mask('0000−0000−0000');

    // Format tahun pelajaran.
    $('.tapel').mask('0000/0000');
  });
</script>

<script type="text/javascript">
  function confirm_delete() {
    return confirm('are you sure?');
  }
</script>