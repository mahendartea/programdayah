<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/jquery.mask.min.js') ?>"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <form action="<?= base_url('admin/update_transaksi') ?>" method="post">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Transaksi</h6>
        <hr>
        <div class="row">
          <?php foreach ($edittransaksi as $etr) : ?>
          <div class="col-6">
            <div class="form-group">
              <label for="exampleInputEmail1">No. Transaksi</label>
              <input type="text" name="idtrn" value="<?= $etr->id_t ?>" hidden>
              <input type="text" name="nmrtran" value="<?= $etr->no_transaksi ?>" hidden>
              <input name="notransaksi" type="text" class="form-control" value="<?= $etr->no_transaksi ?>" disabled>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Tahun Anggaran</label>
              <select class="form-control" name="thnanggaran">
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
              </select>
              <!-- <input name="thnanggaran" type="number" class="form-control" placeholder="Masukan Tahun Anggaran"> -->
              <small class="form-text text-danger">*Masukan tahun anggaran</small>
            </div>

            <label for="exampleInputEmail1">Pilih Pekerjaan</label>
            <div class="input-group mb-3">
              <select class="custom-select" id="inputGroupSelect01" name="upkrj">
                <option selected value="<?= $etr->id_kerjaan ?>"><?= $etr->nama_pekerjaan ?> <b> --Terpilih--</b></option>
                <?php foreach ($listkerjaan as $lk) : ?>
                <option value="<?= $lk->id ?>"><?= $lk->nama_pekerjaan ?></option>
                <?php endforeach ?>
              </select>
            </div>

            <label for="exampleInputEmail1">Konsultan yang mengerjakan</label>
            <div class="input-group mb-3">
              <select class="custom-select" name="upkons" id="inputGroupSelect01" name="idkonsultan">
                <option selected value="<?= $etr->id_kosultan ?>"><?= $etr->nama_konsultan ?> <b> --Terpilih--</b></option>
                <?php foreach ($listrekanan as $lk) : ?>
                <option value="<?= $lk->id ?>"><?= $lk->nama_konsultan ?> </option>
                <?php endforeach; ?>
              </select>
            </div>

          </div>

          <div class="col-6">
            <label for="exampleInputEmail1">Supplier Pengadaan Barang</label>
            <div class="input-group mb-3">
              <select class="custom-select" id="inputGroupSelect01" name="upsupl">
                <option selected value="<?= $etr->id_suplier ?>"><?= $etr->nm_supplier ?> <b> --Terpilih--</b></option>
                <?php foreach ($listsupplier as $ls) : ?>
                <option value="<?= $ls->id ?>"><?= $ls->nm_supplier ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Nama Item Pengadaan</label>
              <input name="upnmbrg" type="text" class="form-control" value="<?= $etr->nm_barang ?>">
              <small class="form-text text-danger">*Masukan detail nama pengadaan barang atau jasa</small>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Volume</label>
              <input type="number" class="form-control" name="upvol" value="<?= $etr->vol ?>">
              <small class="form-text text-danger">*Masukan volume/kuantitas/jumlah pengadaan.</small>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Satuan</label>
              <input name="upsatuan" type="text" class="form-control" value="<?= $etr->satuan ?>">
              <small class="form-text text-danger">*Masukan satuan pengadaan barang/jasa.</small>
            </div>

            <label for="exampleInputPassword1">Harga</label>
            <div class="input-group flex-nowrap mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">Rp.</span>
              </div>
              <input type="text" class="form-control uang" name="upharga" value="<?= $etr->harga ?>">
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <hr>
        <div class="float-right">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
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