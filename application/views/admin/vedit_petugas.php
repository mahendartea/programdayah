<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
   </div>

   <?php foreach ($edpetugas as $pts) : ?>
      <div class="col-md-6">
         <form action="<?= base_url('admin/update_petugas') ?>" method="post">
            <input type="text" name="id" value="<?= $pts->id ?>" hidden>
            <label for="basic-url">Nama Dayah</label>
            <div class="input-group mb-3">
               <input type="text" class="form-control" name="upnip" value="<?= $pts->nip ?>">
            </div>

            <label for="basic-url">Nama Petugas</label>
            <div class="input-group mb-3">
               <input type="text" class="form-control" name="uptnama" value="<?= $pts->nama ?>">
            </div>

            <label for="basic-url">Username</label>
            <div class="row">
               <div class="input-group mb-3 col-md-8">
                  <input type="text" class="form-control" name="uusername" value="<?= $pts->username ?>">
               </div>
               <div class="col-md-4">
                  <a href="<?= base_url('admin/ubpass/' . $pts->id) ?>" class="btn btn-danger">Ganti password?</a>
               </div>
            </div>

            <label for="basic-url">Alamat</label>
            <div class="input-group mb-3">
               <input type="text" class="form-control" name="upalamat" value="<?= $pts->alamat ?>">
            </div>

            <label for="basic-url">No. Kontak</label>
            <div class="input-group mb-3">
               <input type="text" class="form-control" name="upkontak" value="<?= $pts->notelp ?>">
            </div>

            <hr>
            <button type="submit" class="btn btn-primary float-right mb-4">Simpan</button>
         </form>
      </div>
   <?php endforeach ?>
</div>
</div>