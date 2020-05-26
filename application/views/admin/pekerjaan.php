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
    <span class="text">Input Jenis Pekerjaan</span>
  </button>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Pekerjaan</h6>
    </div>
    <div class="card-body">
      <?php if (isset($pekerjaan)) : ?>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Pekerjaan</th>
                <th>Sumber Dana</th>
                <th>Realisasi</th>
                <!-- <th width="50px">Volume/satuan</th>
                <th width="120px">Harga / Unit</th>
                <th width="120px">Harga / Satuan kerja</th> -->
                <th>Aksi</th>
                <!-- <th>Tanggal Input</th> -->
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($pekerjaan as $list) :
                ?>
                <tr>
                  <td align="center"><?= $no; ?></td>
                  <td class="font-weight-bold"><?= $list->nama_pekerjaan; ?></td>
                  <td class=" font-weight-lighter"><?= $list->sumber; ?></td>
                  <td class="font-weight-lighter"><?= $list->realisasi; ?></td>
                  <!-- <td align="center" class=" font-weight-lighter"><?= $list->volume; ?>/<?= $list->satuan; ?></td>
                              <td class=" font-weight-lighter">Rp. <span class="uang"><?= $list->harga; ?></span></td>
                              <?php $jmlharga = $list->volume * $list->harga; ?>
                              <td class=" font-weight-lighter">Rp. <span class="uang"><?= $jmlharga ?></span></td> -->
                  <td align="center"><a href="<?= base_url('admin/vedit_pekerjaan/') ?><?= $list->id ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a> | <a href="<?= base_url('admin/hapus_pekerjaan/') ?><?= $list->id ?>" onclick="return confirm_delete()" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash text-danger"></i></a></td>
                  <!-- <td><?= $list->created; ?></td> -->
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
        <h5 class="modal-title" id="exampleModalLabel">Input Pekerjaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url() ?>admin/tambah_pekerjaan" method="post">
        <div class="modal-body">
          <div class="input-group flex-nowrap mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="addon-wrapping">Nama Pekerjaan</span>
            </div>
            <input type="text" class="form-control" name="namapekerjaan" placeholder="Isi Nama Pekerjaan" aria-label="namapekerjaan" aria-describedby="addon-wrapping">
          </div>
          <div class="input-group flex-nowrap mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="addon-wrapping">Sumber Dana</span>
            </div>
            <input type="text" class="form-control" name="sumber" placeholder="Isi sumber dana" aria-label="sumber" aria-describedby="addon-wrapping">
          </div>
          <div class="input-group flex-nowrap mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="addon-wrapping">Realisasi</span>
            </div>
            <input type="text" class="form-control" name="realisasi" placeholder="" aria-label="realisasi" aria-describedby="addon-wrapping">
          </div>
          <!-- <div class="input-group flex-nowrap mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="addon-wrapping">Volume</span>
            </div>
            <input type="number" class="form-control" name="volume" placeholder="Masukan Jumlah Volume" aria-label="volume" aria-describedby="addon-wrapping">
          </div>
          <div class="input-group flex-nowrap mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="addon-wrapping">Satuan</span>
            </div>
            <input type="text" class="form-control" name="satuan" placeholder="Masukan satuan volume" aria-label="satuan" aria-describedby="addon-wrapping">
          </div>
          <div class="input-group flex-nowrap mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="addon-wrapping">Harga/Unit</span>
            </div>
            <input type="text" class="form-control uang" name="harga" placeholder="..." aria-label="harga" aria-describedby="addon-wrapping">
          </div> -->
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