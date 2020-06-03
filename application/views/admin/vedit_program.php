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
               <h6 class="m-0 font-weight-bold text-primary">Formulir Edit Kegiatan</h6>
            </div>
            <div class="card-body">
               <?php foreach ($vprogram as $pr) : ?>
                  <form action="<?= base_url('admin/updprog') ?>" method="post" enctype="multipart/form-data">
                     <input type="text" value="<?= $pr->id ?>" name="id" hidden>
                     <div class="form-group row">
                        <label for="nmusualan" class="col-sm-4 col-form-label">Nama Program Usulan</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" id="nmusualan" name="nmusualan" value="<?= $pr->nm_program ?>">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="thnajuan" class="col-sm-4 col-form-label">Tahun Proposal</label>
                        <div class="col-sm-8">
                           <select name="thnajuan" id="thnajuan" class="custom-select form-control custom-select-sm">
                              <option value="<?= $pr->thn_ajuan ?>" selected><?= $pr->thn_ajuan ?> (Selected)</option>
                              <option value="2019">2019</option>
                              <option value="2020">2020</option>
                              <option value="2021">2021</option>
                              <option value="2022">2022</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                              <option value="2025">2025</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="thnkeg" class="col-sm-4 col-form-label">Tahun Kegiatan</label>
                        <div class="col-sm-8">
                           <select name="thnkeg" id="thnkeg" class="custom-select form-control custom-select-sm">
                              <option value="<?= $pr->thn_realisasi ?>" selected><?= $pr->thn_realisasi ?> (Selected)</option>
                              <option value="2019">2019</option>
                              <option value="2020">2020</option>
                              <option value="2021">2021</option>
                              <option value="2022">2022</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                              <option value="2025">2025</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="usulan" class="col-sm-4 col-form-label">Ususalan Anggaran</label>
                        <div class="col-sm-8">
                           <input type="text" min="1000" class="form-control uang" id="usulan" name="usulan" value="<?= $pr->ajuan ?>">
                           <span class="font-italic text-muted text-danger">*masukan minimal 1000</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="realisasi" class="col-sm-4 col-form-label">Realisasi Anggaran</label>
                        <div class="col-sm-8">
                           <input type="text" min="1000" class="form-control uang" id="realisasi" name="realisasi" value="<?= $pr->realisasi ?>">
                           <span class="font-italic text-muted text-danger">*masukan minimal 1000</span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="dayah" class="col-sm-4 col-form-label">Dayah</label>
                        <div class="col-sm-8">
                           <select name="dayah" id="dayah" class="custom-select form-control custom-select-sm">
                              <option value="<?= $pr->id_dayah ?>" selected><?= $pr->nm_dayah ?> (selected)</option>
                              <?php foreach ($datadayah as $dayah) : ?>
                                 <option value="<?= $dayah->id ?>"><?= $dayah->nm_dayah ?></option>
                              <?php endforeach ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="status" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                           <select name="status" id="status" class="custom-select form-control custom-select-sm">
                              <?php if ($pr->status == '0') : ?>
                                 <option value="0" selected>Proses (selected)</option>
                              <?php elseif ($pr->status == '1') : ?>
                                 <option value="1" selected>Diterima (selected)</option>
                              <?php else : ?>
                                 <option value="2">Ditolak (selected)</option>
                              <?php endif ?>
                              <option value="0">Proses</option>
                              <option value="1">Diterima</option>
                              <option value="2">Ditolak</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="koor" class="col-sm-4 col-form-label">Petugas Monitor</label>
                        <div class="col-sm-8">
                           <select name="koor" id="koor" class="custom-select form-control custom-select-sm">
                              <option value="<?= $pr->id_koor ?>" selected><?= $pr->nama ?>(selected)</option>
                              <?php foreach ($datapetugas as $pt) : ?>
                                 <option value="<?= $pt->id ?>"><?= $pt->nama ?></option>
                              <?php endforeach ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="file" class="col-sm-4 col-form-label">File Proposal</label>
                        <div class="col-sm-8">
                           <div class="custom-file mb-3">
                              <input type="file" name="berkas">
                              <!-- <input type="file" class="custom-file-input" id="validatedCustomFile" name="file_name" multiple="multiple">
                           <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                           <span class="text-danger font-italic">*berkas harus berformat pdf dan berukuran max 3Mb</span> -->
                           </div>
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
   });
</script>