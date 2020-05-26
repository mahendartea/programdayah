<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/jquery.mask.min.js') ?>"></script>

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <?php foreach ($pekerjaan as $p); ?>
  <div class="col-md-6">
    <form action="<?= base_url('admin/update_pekerjaan') ?>" method="post">
      <input type="text" name="id" value="<?= $p->id ?>" hidden>
      <label for="basic-url">Nama Pekerjaan</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="updatenama" value="<?= $p->nama_pekerjaan ?>">
      </div>

      <label for="basic-url">Sumber Dana</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="uptsumber" value="<?= $p->sumber ?>">
      </div>

      <label for="basic-url">Realisasi</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="uptrealisasi" value="<?= $p->realisasi ?>">
      </div>

      <!-- <label for="basic-url">volume</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="uptvolume" value="<?= $p->volume ?>">
      </div>

      <label for="basic-url">Satuan Volume</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="uptsatuan" value="<?= $p->satuan ?>">
      </div>

      <label for="basic-url">Harga Satuan Kerja</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Rp.</label>
        </div>
        <input type="text" class="form-control uang" name="uptharga" value="<?= $p->harga ?>">
      </div> -->

      <hr>
      <button type="submit" class="btn btn-primary float-right">Simpan</button>
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