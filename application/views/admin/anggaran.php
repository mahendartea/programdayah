<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/jquery.mask.min.js') ?>"></script>
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>
  <?= $this->session->flashdata('message'); ?>
  <button class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#minputanggaran">
    <span class="icon text-white-50">
      <i class="fas fa-plus"></i>
    </span>
    <span class="text">Input Anggaran</span>
  </button>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Anggaran Masuk</h6>
    </div>
    <div class="card-body">
      <?php if (isset($listanggaran)) : ?>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama anggaran</th>
                <th>Uraian</th>
                <th>Jumlah Anggaran</th>
                <th>Anggaran Tahun</th>
                <th>Aksi</th>
                <!-- <th>Tanggal Input</th> -->
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($listanggaran as $list) :
                ?>
                <tr>
                  <td align="center"><?= $no; ?></td>
                  <td class=" font-weight-bold"><?= $list->nama_anggaran; ?></td>
                  <td class=" font-weight-lighter"><?= $list->uraian; ?></td>
                  <td class=" font-weight-lighter">Rp. <span class="uang"><?= $list->anggaran; ?></span></td>
                  <td class=" font-weight-lighter"><?= $list->tahun; ?></td>
                  <td align="center" class=""><a href="<?= base_url('admin/vedit_anggaran/') ?><?= $list->id ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a> | <a href="<?= base_url('admin/hapus_anggaran/') ?><?= $list->id ?>" onclick="return confirm_delete()" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
                  <!-- <td><?= $list->created; ?></td> -->
                </tr>
                <?php $no++;
              endforeach; ?>
            </tbody>
            <tr>
              <td colspan="2"></td>
              <td colspan="1">Jumlah Anggaran</td>
              <td class="font-weight-bold" colspan="1">Rp. <span class="uang"> <?= $saldo ?> </span></td>
              <td colspan="2"></td>
            </tr>
          </table>
        </div>
      <?php endif; ?>
    </div>
  </div>

</div>
</div>

<!-- Modal Input-->
<div class="modal fade" id="minputanggaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Anggaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url() ?>admin/tambah_anggaran" method="post">
        <div class="modal-body">
          <div class="input-group flex-nowrap mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="addon-wrapping">Nama</span>
            </div>
            <input type="text" class="form-control" name="namaanggaran" placeholder="Isi Nama Anggaran" aria-label="namaanggaran" aria-describedby="addon-wrapping">
          </div>
          <div class="input-group flex-nowrap mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="addon-wrapping">Uraian</span>
            </div>
            <input type="text" class="form-control" name="uraian" placeholder="Isi uraian" aria-label="uraian" aria-describedby="addon-wrapping">
          </div>
          <div class="input-group flex-nowrap mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="addon-wrapping">Rp.</span>
            </div>
            <input type="text" class="form-control uang" name="jmlanggaran" placeholder="..." aria-label="jmlanggaran" aria-describedby="addon-wrapping">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Tahun</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="tahunanggaran">
              <option value="2019" selected>2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
            </select>
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
    // $('.no_hp').mask('0000−0000−0000');

    // Format tahun pelajaran.
    // $('.tapel').mask('0000/0000');
  });
</script>
<script type="text/javascript">
  function confirm_delete() {
    return confirm('are you sure?');
  }
</script>