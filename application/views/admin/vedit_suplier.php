<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/jquery.mask.min.js') ?>"></script>

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <?php foreach ($suplier as $p); ?>
  <div class="col-md-6">
    <form action="<?= base_url('admin/update_suplier') ?>" method="post">
      <input type="text" name="id" value="<?= $p->id ?>" hidden>
      <label for="basic-url">Nama Supplier</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="uptnmsup" value="<?= $p->nm_supplier ?>">
      </div>

      <label for="basic-url">Alamat</label>
      <div class="input-group mb-3">
        <textarea type="text" class="form-control" name="uptalmtsup" value="<?= $p->alamat ?>"><?= $p->alamat ?></textarea>
      </div>

      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="inputAddress">Kecamatan</label>
          <input type="text" name="uptkecsup" value="<?= $p->kecamatan ?>" class="form-control">
        </div>

        <div class="form-group col-md-3">
          <label for="inputCity">Kota/Kabupatan</label>
          <input type="text" name="uptkotsup" value="<?= $p->kota ?>" class="form-control">
        </div>

        <div class="form-group col-md-3">
          <label for="inputZip">Kodepos</label>
          <input type="number" class="form-control" name="uptkdpsup" value="<?= $p->kodepos ?>">
        </div>

        <div class="form-group col-md-3">
          <label for="inputState">Provinsi</label>
          <select id="inputState" class="form-control" name="uptprovsup">
            <option selected value="<?= $p->provinsi ?>"><?= $p->provinsi ?></option>
            <?php foreach ($dataprovinsi as $prov) : ?>
              <option value="<?= $prov->nama ?>"><?= $prov->nama ?></option>
            <?php endforeach; ?>
          </select>
        </div>

      </div>

      <label for="basic-url">Telepon</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control no_hp" name="upttelsup" value="<?= $p->telpon ?>">
      </div>

      <label for="basic-url">Keterangan</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="uptketsup" value="<?= $p->keterangan ?>">
      </div>

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
    $('.no_hp').mask('0000−0000−0000');

    // Format tahun pelajaran.
    // $('.tapel').mask('0000/0000');
  });
</script>