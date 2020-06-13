<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
   </div>
   <?= $this->session->flashdata('message'); ?>

   <div class="row">
      <div class="col-12">

         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Sistem Pencatatan Program Dayah - Dinas Pendidikan Dayah Banda Aceh</h6>
            </div>
            <div class="card-body">
               <?php if (isset($listdayah)) : ?>
                  <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                           <tr align="center">
                              <th>No.</th>
                              <th>Nama Program Ajuan</th>
                              <th>Tahun</th>
                              <th>Nama Dayah</th>
                              <th>Status</th>
                              <th>Proposal</th>
                              <th>Input Data</th>
                           </tr>
                        </thead>
                        <tfoot align="center">
                           <tr>
                              <th>No.</th>
                              <th>Nama Program Ajuan</th>
                              <th>Tahun</th>
                              <th>Nama Dayah</th>
                              <th>Status</th>
                              <th>Proposal</th>
                              <th>Input Data</th>
                           </tr>
                        </tfoot>
                        <tbody>
                           <?php
                           $no = 1;
                           foreach ($listdayah as $list) :
                           ?>
                              <tr>
                                 <td align="center"><?= $no ?></td>
                                 <td><span class="font-italic font-weight-bold"><a href="<?= base_url('dashboard/detailprog/') ?><?= $list->id ?>"><?= $list->nm_program ?></a></span></td>
                                 <td align="center"><span class="badge badge-dark"><?= $list->thn_realisasi ?></td>
                                 <td align="center"><span class="text-uppercase font-weight-bold"><?= $list->nm_dayah ?></span></td>
                                 <td align="center">
                                    <?php if ($list->status == 1) : ?>
                                       <span class="badge badge-success">Diterima</span>
                                    <?php elseif ($list->status == 2) : ?>
                                       <span class="badge badge-danger">Ditolak</span>
                                    <?php else : ?>
                                       <span class="badge badge-secondary">Proses</span>
                                    <?php endif ?>
                                 </td>
                                 <td align="center" class="font-weight-lighter">
                                    <?php if (isset($list->file)) : ?>
                                       <a href="<?= base_url('uploads/') ?><?= $list->file ?>" data-toggle="tooltip" data-placement="top" target="_blank" title="File Proposal"><i class="fas fa-file text-warning"></i></a>
                                    <?php endif ?>
                                 </td>
                                 <td align="center">
                                    <a href="<?= base_url('dashboard/formrincian/') ?><?= $list->id ?>" data-toggle="tooltip" data-placement="top" title="Input Rincian"><i class="fas fa-paper-plane"></i></a> |
                                    <a href="<?= base_url('dashboard/formprogress/') ?><?= $list->id ?>" data-toggle="tooltip" data-placement="top" title="Input Progress"><i class="fas fa-paper-plane text-danger"></i></a>
                                 </td>
                              </tr>
                              <?php $no++; ?>
                           <?php endforeach; ?>
                        </tbody>
                        <!-- <tr><td colspan="2"></td><td colspan="1">Jumlah Anggaran</td><td class="font-weight-bold" colspan="1">Rp. <span class="uang"> <?= $saldo ?> </span></td><td colspan="2"></td></tr> -->
                     </table>
                  </div>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>

</div>

</div>