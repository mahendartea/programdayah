<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/jquery.mask.min.js') ?>"></script>

<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" /> -->

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <?php foreach ($rekanan as $p); ?>
  <div class="col-md-6">
    <form action="<?= base_url('admin/update_rekanan') ?>" method="post">
      <input type="text" name="id" value="<?= $p->id ?>" hidden>
      <label for="basic-url">Nama Rekanan</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="updatenama" value="<?= $p->nama_konsultan ?>">
      </div>

      <label for="basic-url">Alamat</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="uptalmt" value="<?= $p->alamat ?>">
      </div>

      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="inputAddress">Kecamatan</label>
          <input type="text" name="uptkec" value="<?= $p->kecamatan ?>" class="form-control">
        </div>

        <div class="form-group col-md-3">
          <label for="inputCity">Kota/Kabupatan</label>
          <input type="text" name="uptkot" value="<?= $p->kota ?>" class="form-control">
        </div>

        <div class="form-group col-md-3">
          <label for="inputZip">Kodepos</label>
          <input type="number" class="form-control" name="uptkodepos" value="<?= $p->kodepos ?>">
        </div>

        <div class="form-group col-md-3">
          <label for="inputState">Provinsi</label>
          <!-- <select id="inputState" class="form-control selectpicker" name="uptprov" data-live-search="true" data-show-subtext="true"> -->
          <select id="inputState" class="form-control" name="uptprov">
            <option selected value=" <?= $p->provinsi ?>"><?= $p->provinsi ?></option>
            <?php foreach ($dataprovinsi as $prov) : ?>
              <option value="<?= $prov->nama ?>"><?= $prov->nama ?></option>
            <?php endforeach; ?>
          </select>
        </div>

      </div>

      <label for="basic-url">Telepon</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control no_hp" name="upttel" value="<?= $p->telpon ?>">
      </div>

      <label for="basic-url">Keterangan</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="uptket" value="<?= $p->keterangan ?>">
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
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script> -->