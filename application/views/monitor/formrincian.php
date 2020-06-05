<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
   </div>

   <div class="row">
      <div class="col-10">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Formulir Tambah Rincian Kegiatan</h6>
            </div>
            <div class="card-body">
               <?php foreach ($infopro as $pro) : ?>
                  <form action="<?= base_url('dashboard/tambahrincian') ?>" method="post" enctype="multipart/form-data">
                     <input type="text" name="idpro" value="<?= $pro->id ?>" hidden>
                     <div class="form-group row">
                        <label for="nmitem" class="col-sm-4 col-form-label">Nama Bahan atau Jasa</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" id="nmitem" name="nmitem">
                           <span class="text-danger font-italic font-weight-lighter">*Masukan nama pengadaan barang atau jasa</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="satuan" class="col-sm-4 col-form-label">Harga Satuan</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control uang" id="satuan" name="satuan">
                           <span class="text-danger font-italic font-weight-lighter">*Masukan harga nilai satuan (@)</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control jumlah" id="jumlah" name="jumlah">
                           <span class="text-danger font-italic font-weight-lighter">*Masukan Jumlah atau Frekwensi barang/Saja</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="unitsatuan" class="col-sm-4 col-form-label">Unit Satuan</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" id="unitsatuan" name="unitsatuan">
                           <span class="text-danger font-italic font-weight-lighter">*Masukan unit Satuan. Mis. Kg,Ons,dll</span>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-primary float-right" value="simpan">Simpan</button>
                  </form>
               <?php endforeach ?>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/jquery.mask.min.js') ?>"></script>
<script>
   $(document).ready(function($) {

      // Format mata uang.
      $('.uang').mask('000.000.000.000,-', {
         reverse: true
      });

      // Format nomor HP.
      // $('.no_hp').mask('0000−0000−0000');

      // Format tahun pelajaran.
      // $('.tapel').mask('0000/0000');

      // Format jumlah.
      // $('.jumlah').mask('000.000.000');
   });
</script>