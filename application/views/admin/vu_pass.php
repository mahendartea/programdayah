<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
   </div>

   <?php foreach ($passgan as $pg) : ?>
      <div class="col-md-6">
         <form action="<?= base_url('admin/update_pass/') ?><?= $pg->nip ?>" method="post">
            <input type="text" name="id" value="<?= $pg->nip ?>" hidden>
            <label for="basic-url">Password Baru Koordinator : <?= $pg->nama ?></label>

            <div class="input-group mb-3">
               <input type="password" class="form-control" name="uppas" placeholder="Masukan Password Baru!">
            </div>

            <hr>
            <button type="submit" class="btn btn-primary float-right mb-4">Simpan</button>
         </form>
      </div>
   <?php endforeach ?>
</div>
</div>