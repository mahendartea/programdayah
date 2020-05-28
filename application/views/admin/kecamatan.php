<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
   </div>

   <?= $this->session->flashdata('message'); ?>

   <!-- DataTales Example -->
   <button type="button" class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#exampleModal">Tambah Kecamatan</button>

   <div class="row">
      <div class="col-8">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Data Kecamatan</h6>
            </div>
            <div class="card-body">
               <ul class="list-group">
                  <?php foreach ($kecamatan as $kec) : ?>
                     <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= $kec->nm_kec ?>
                        <div>
                           <a href="<?= base_url('admin/editkec/' . $kec->id) ?>"><span class="badge badge-warning badge-pill">edit</span></a>
                           <a href="<?= base_url('admin/hapuskec/' . $kec->id)  ?>" onclick="return confirm()"><span class="badge badge-danger badge-pill">hapus</span></a>
                        </div>
                     </li>
                  <?php endforeach ?>
               </ul>
            </div>
         </div>
      </div>
   </div>

   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Tambah Kecamatan</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form action="<?= base_url('admin/pluskec') ?>" method="post">
               <div class="modal-body">
                  <div class="form-group row">
                     <label for="kec" class="col-sm-4 col-form-label">Nama Kecamatan</label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control" id="kec" name="kec">
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
               </div>
            </form>
         </div>
      </div>
   </div>



</div>
</div>