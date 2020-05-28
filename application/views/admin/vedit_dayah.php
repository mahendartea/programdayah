<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/jquery.mask.min.js') ?>"></script>

<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
   </div>

   <?php foreach ($veddayah as $d) : ?>
      <div class="col-md-6">
         <form action="<?= base_url('admin/update_dayah') ?>" method="post">
            <input type="text" name="id" value="<?= $d->id ?>" hidden>
            <label for="basic-url">Nama Dayah</label>
            <div class="input-group mb-3">
               <input type="text" class="form-control" name="updnamadayah" value="<?= $d->nm_dayah ?>">
            </div>

            <label for="basic-url">Alamat</label>
            <div class="input-group mb-3">
               <input type="text" class="form-control" name="uptalamat" value="<?= $d->alamat ?>">
            </div>

            <label for="basic-url">Desa</label>
            <div class="input-group mb-3">
               <input type="text" class="form-control" name="upddesa" value="<?= $d->desa ?>">
            </div>

            <label for="basic-url">Kecamatan</label>
            <select class="form-control custom-select form-control custom-select-sm mt-15" name="updkec">
               <option selected value="<?= $d->id_kec ?>"> <?= $d->nm_kec ?>(Terpilih)</option>
               <?php foreach ($liskec as $kec) : ?>
                  <option value="<?= $kec->id ?>"><?= $kec->nm_kec ?></option>
               <?php endforeach ?>
            </select>

            <label for="basic-url">Kontak</label>
            <div class="input-group mb-3">
               <input type="text" class="form-control" name="updkontak" value="<?= $d->telp ?>">
            </div>

            <label for="basic-url">Kepala Dayah</label>
            <div class="input-group mb-3">
               <input type="text" class="form-control" name="updkdayah" value="<?= $d->ka_dayah ?>">
            </div>

            <hr>
            <button type="submit" class="btn btn-primary float-right mb-4">Simpan</button>
         </form>
      </div>
   <?php endforeach ?>
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