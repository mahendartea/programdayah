<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/jquery.mask.min.js') ?>"></script>
<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
   </div>

   <?= $this->session->flashdata('msg'); ?>

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
                  <div class="row font-weight-bold">
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
                     <?php elseif ($prog->status == '1') : ?>
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
                        Berkas proposal <a href="<?= base_url('uploads/') ?><?= $prog->file ?>" target="_blank"><span class="text-warning fa fa-fw fa-download"></span></a>
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
                           <th>Kuantitas</th>
                           <th>Satuan Unit</th>
                           <th>Jumlah</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $no = 1;
                        $total = 0;
                        foreach ($rincian as $r) : ?>
                           <tr>
                              <td align="center"><?= $no ?></td>
                              <td><?= $r->nm_item ?></td>
                              <td>Rp. <span class="uang"><?= $r->satuan ?></span></td>
                              <td align="center"><?= $r->jml ?></td>
                              <td align="center"><?= $r->unitsatuan ?></td>
                              <?php $subtotal = $r->satuan * $r->jml; ?>
                              <td>Rp. <span class="uang"><?= $subtotal ?></span></td>
                              <?php $no++ ?>
                              <?php
                              $total += $subtotal;
                              ?>
                           </tr>
                        <?php endforeach; ?>
                     <tfoot>
                        <td colspan="5" align="center"> <span class="font-weight-bold"> Total Belanja </span></td>
                        <td class="font-weight-bold">Rp. <span class="uang"><?= $total ?></span></td>
                     </tfoot>
                     </tbody>
                  </table>
               </div>
               <div class="mt-4 text-center alert alert-info">
                  <?php
                  $realisasi = $prog->realisasi;
                  $sisa = $realisasi - $total;
                  ?>
                  <span class="font-weight-bold"> Sisa Dana Rp. </span> <span class=" uang"><?= $sisa ?></span>
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