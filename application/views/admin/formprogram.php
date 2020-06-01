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
               <h6 class="m-0 font-weight-bold text-primary">Formulir Tambah Kegiatan</h6>
            </div>
            <div class="card-body">
               <form action="<?= base_url('') ?>" method="post">
                  <div class="form-group row">
                     <label for="nmusualan" class="col-sm-4 col-form-label">Nama Program Usulan</label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control" id="nmusualan" name="nmusualan">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="thnajuan" class="col-sm-4 col-form-label">Tahun Proposal</label>
                     <div class="col-sm-8">
                        <select name="thnajuan" id="thnajuan" class="custom-select form-control custom-select-sm">
                           <option value="2019">2019</option>
                           <option value="2019">2020</option>
                           <option value="2019">2021</option>
                           <option value="2019">2022</option>
                           <option value="2019">2023</option>
                           <option value="2019">2024</option>
                           <option value="2019">2025</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="thnkeg" class="col-sm-4 col-form-label">Tahun Kegiatan</label>
                     <div class="col-sm-8">
                        <select name="thnkeg" id="thnkeg" class="custom-select form-control custom-select-sm">
                           <option value="2019">2019</option>
                           <option value="2019">2020</option>
                           <option value="2019">2021</option>
                           <option value="2019">2022</option>
                           <option value="2019">2023</option>
                           <option value="2019">2024</option>
                           <option value="2019">2025</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="usulan" class="col-sm-4 col-form-label">Ususalan Anggaran</label>
                     <div class="col-sm-8">
                        <input type="number" min="1000" class="form-control" id="usulan" name="usulan">
                        <span class="font-italic text-muted text-danger">*masukan minimal 1000</span>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="realisasi" class="col-sm-4 col-form-label">Realisasi Anggaran</label>
                     <div class="col-sm-8">
                        <input type="number" min="1000" class="form-control" id="realisasi" name="realisasi">
                        <span class="font-italic text-muted text-danger">*masukan minimal 1000</span>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="pidayah" class="col-sm-4 col-form-label">Pimpinan Dayah</label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control" id="pidayah" name="pidayah">
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary float-right">Simpan</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
</div>