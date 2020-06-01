<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/jquery.mask.min.js') ?>"></script>
<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
   </div>

   <?= $this->session->flashdata('message'); ?>

   <?php foreach ($progdetail as $prog) : ?>
      <div class="row">
         <div class="col-7">
            <div class="card shadow mb-4">
               <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Proposal Kegiatan</h6>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-4">
                        <p> Nama Program </p>
                     </div>
                     <div class="col-md-8">
                        <span class="text-capitalize font-italic"> : <?= $prog->nm_program ?></span>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4">
                        <p> Dayah </p>
                     </div>
                     <div class="col-md-8">
                        <span class="text-capitalize font-italic"> : <?= $prog->nm_dayah  ?></span>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4">
                        <p> Alamat Dayah </p>
                     </div>
                     <div class="col-md-8">
                        <span class="text-capitalize font-italic"> : <?= $prog->alamat  ?></span>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-md-4">
                        <p> Tahun Usulan </p>
                     </div>
                     <div class="col-md-8">
                        <span class="text-capitalize font-italic"> : <?= $prog->thn_ajuan  ?></span>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4">
                        <p> Tahun Program </p>
                     </div>
                     <div class="col-md-8">
                        <span class="text-capitalize font-italic"> : <?= $prog->thn_realisasi  ?></span>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4">
                        <p> Dana usulan </p>
                     </div>
                     <div class="col-md-8">
                        : Rp. <span class="text-capitalize font-italic uang"> <?= $prog->ajuan  ?></span>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4">
                        <p> Realisasi </p>
                     </div>
                     <div class="col-md-8">
                        : Rp. <span class="text-capitalize font-italic uang"> <?= $prog->realisasi  ?></span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-5">
            <div class="card shadow mb-4">
               <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Status</h6>
               </div>
               <div class="card-body">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                     <?php if ($prog->status == '0') : ?>
                        Status Pemeriksaan <span class="btn btn-secondary">Sedang diproses</span>
                     <?php elseif ($prof->status == '1') : ?>
                        Status Pemeriksaan <span class="btn btn-success">Diterima</span>
                     <?php else : ?>
                        Status Pemeriksaan <span class="btn btn-danger">Ditolak</span>
                     <?php endif ?>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                     Koordinator <span><?= $prog->nama ?></span>
                  </li>
                  <?php if (isset($prog->file)) : ?>
                     <li class="list-group-item d-flex justify-content-between align-items-center">
                        Berkas proposal <a href=""><span class="text-warning fa fa-fw fa-download"></span></a>
                     </li>
                  <?php else : ?>
                     <li class="list-group-item d-flex justify-content-between align-items-center">
                        berkas proposal <span class="badge badge-danger">Belum Upload</span>
                     </li>
                  <?php endif ?>
               </div>
            </div>
         </div>
      </div>
   <?php endforeach ?>

   <div class="row">
      <div class="col-12">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Rincian Dana</h6>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead align="center">
                        <tr>
                           <th>No.</th>
                           <th>Material/Jasa</th>
                           <th>Harga Satuan</th>
                           <th>Jumlah</th>
                           <th>Harga</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tfoot align="center">
                        <tr>
                           <th>No.</th>
                           <th>Material/Jasa</th>
                           <th>Harga Satuan</th>
                           <th>Jumlah</th>
                           <th>Harga</th>
                           <th>Aksi</th>
                        </tr>
                     </tfoot>
                     <tbody>

                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>


</div>
</div>

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
   });
</script>