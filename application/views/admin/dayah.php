<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
   </div>

   <?= $this->session->flashdata('message'); ?>

   <!-- DataTales Example -->
   <button type="button" class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#exampleModal">Tambah Dayah</button>

   <div class="row">
      <div class="col-12">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Data Dayah</h6>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead align="center">
                        <tr>
                           <th>No.</th>
                           <th>Dayah</th>
                           <th>Alamat</th>
                           <th>Desa</th>
                           <th>Kecamatan</th>
                           <th>Kontak</th>
                           <th>Pimpinan Dayah</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tfoot align="center">
                        <tr>
                           <th>No.</th>
                           <th>Dayah</th>
                           <th>Alamat</th>
                           <th>Desa</th>
                           <th>Kecamatan</th>
                           <th>Kontak</th>
                           <th>Pimpinan Dayah</th>
                           <th>Aksi</th>
                        </tr>
                     </tfoot>
                     <tbody>
                        <?php $no = 1;
                        foreach ($dayahs as $dayah) : ?>
                           <tr>
                              <td align="center"><?= $no ?></td>
                              <td><?= $dayah->nm_dayah ?></td>
                              <td><?= $dayah->alamat ?></td>
                              <td><?= $dayah->desa ?></td>
                              <td><?= $dayah->nm_kec ?></td>
                              <td><?= $dayah->telp ?></td>
                              <td><?= $dayah->ka_dayah ?></td>
                              <td align="center" class=" font-weight-lighter">
                                 <a href="<?= base_url('admin/vedit_dayah/') ?><?= $dayah->id ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a> |
                                 <a href="<?= base_url('admin/hapus_dayah/') ?><?= $dayah->id ?>" onclick="return confirm_delete()" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash text-danger"></i></a>
                                 <?php $no++ ?>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Tambah Dayah</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form action="<?= base_url('admin/plusdayah') ?>" method="post">
               <div class="modal-body">
                  <div class="form-group row">
                     <label for="nmdayah" class="col-sm-4 col-form-label">Nama Dayah</label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control" id="nmdayah" name="nmdayah">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control" id="alamat" name="alamat">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="desa" class="col-sm-4 col-form-label">Desa</label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control" id="desa" name="desa">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="kecamatan" class="col-sm-4 col-form-label">Kecamatan</label>
                     <div class="col-sm-4">
                        <select class="form-control custom-select form-control custom-select-sm" name="kecamatan">
                           <option selected value=""> -- Pilih Kecamatan -- </option>
                           <?php foreach ($liskec as $kec) : ?>
                              <option value="<?= $kec->id ?>"><?= $kec->nm_kec ?></option>
                           <?php endforeach ?>
                        </select>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="kontak" class="col-sm-4 col-form-label">Kontak</label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control" id="kontak" name="kontak">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="pidayah" class="col-sm-4 col-form-label">Pimpinan Dayah</label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control" id="pidayah" name="pidayah">
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