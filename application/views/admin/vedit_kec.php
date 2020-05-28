<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
   </div>

   <?php foreach ($vubah as $k); ?>
   <div class="col-md-6">
      <form action="<?= base_url('admin/update_kec') ?>" method="post">
         <input type="text" name="id" value="<?= $k->id ?>" hidden>
         <label for="basic-url">Nama Kecamatan</label>
         <div class="input-group mb-3">
            <input type="text" class="form-control" name="updatekec" value="<?= $k->nm_kec ?>">
         </div>

         <hr>
         <button type="submit" class="btn btn-primary float-right">Simpan</button>
      </form>
   </div>
</div>
</div>