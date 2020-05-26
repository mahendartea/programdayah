<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/jquery.mask.min.js') ?>"></script>
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
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <?php foreach ($vubah as $update); ?>
  <div class="col-md-6">
    <form action="<?= base_url('admin/update_anggaran') ?>" method="post">
      <input type="text" name="id" value="<?= $update->id ?>" hidden>
      <label for="basic-url">Nama Anggaran</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="updatenama" value="<?= $update->nama_anggaran ?>">
      </div>

      <label for="basic-url">Uraian</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="updateuraian" value="<?= $update->uraian ?>">
      </div>

      <div class="input-group flex-nowrap mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="addon-wrapping">Rp.</span>
        </div>
        <input type="text" class="form-control uang" name="updatejml" aria-label="updatejml" value="<?= $update->anggaran ?>">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Tahun</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01" name="updatetahun">
          <option value="2019" selected>2019</option>
          <option value="2020">2020</option>
          <option value="2021">2021</option>
        </select>
      </div>
      <hr>
      <button type="submit" class="btn btn-primary float-right">Simpan</button>
    </form>
  </div>
</div>
</div>