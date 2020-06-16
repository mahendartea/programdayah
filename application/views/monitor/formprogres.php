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
               <?php foreach ($dataprogram as $datap) : ?>
                  <h6 class="m-0 font-weight-bold text-primary">Progres Kegiatan "<?= $datap->nm_program ?>"</h6>
               <?php endforeach ?>
            </div>
            <div class="card-body">
               <!-- Nav tabs -->
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                     <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Progres 25%</a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Progres 50%</a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Progres 75%</a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Progres 100%</a>
                  </li>
               </ul>

               <!-- Tab panes -->
               <?php if (isset($idkeg)) : ?>
                  <!-- <form action="<?= base_url('dashboard/simpanprogress') ?>" method="POST" enctype="multipart/form-data"> -->
                  <?php echo form_open_multipart("dashboard/simpanprogress"); ?>
                  <?php foreach ($progres as $p) : ?>
                     <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                           <hr>
                           <input type="text" name="idkeg" value="<?= $idkeg ?>" hidden>
                           <?php if (isset($p->progres1)) : ?>
                              <div class="form-group">
                                 <label for="keterangan1">Keterangan</label>
                                 <input type="text" class="form-control" id="keterangan1" value="<?= $p->progres1 ?>" name="pro1" multiple="multiple">
                              </div>
                              <img src="<?= base_url('uploads/img/') ?><?= $p->img1 ?>" class="img-thumbnail rounded mx-auto d-block my-4" alt="Responsive image">
                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text" id="img1">Upload</span>
                                 </div>
                                 <div class="custom-file">
                                    <input type="file" name="image[]" class="custom-file-input" id="im1" aria-describedby="img1" multiple="multiple">
                                    <label class="custom-file-label" for="im1">Choose file</label>
                                 </div>
                              </div>
                           <?php else : ?>
                              <div class="form-group">
                                 <label for="keterangan1">Keterangan</label>
                                 <input type="text" class="form-control" id="keterangan1" placeholder="Masukan Keterangan Progres 25%" name="pro1" multiple="multiple">
                              </div>
                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text" id="img1">Upload</span>
                                 </div>
                                 <div class="custom-file">
                                    <input type="file" name="image[]" class="custom-file-input" id="im1" aria-describedby="img1" multiple="multiple">
                                    <label class="custom-file-label" for="im1">Choose file</label>
                                 </div>
                              </div>
                           <?php endif ?>
                        </div>
                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                           <hr>
                           <?php if (isset($p->progres2)) : ?>
                              <div class="form-group">
                                 <label for="keterangan2">Keterangan</label>
                                 <input type="text" class="form-control" id="keterangan2" value="<?= $p->progres2 ?>" name="pro2">
                              </div>
                              <img src="<?= base_url('uploads/img/') ?><?= $p->img2 ?>" class="img-thumbnail rounded mx-auto d-block my-4" alt="Responsive image">
                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text" id="img2">Upload</span>
                                 </div>
                                 <div class="custom-file">
                                    <input type="file" name="image[]" class="custom-file-input" id="im2" aria-describedby="img2" multiple="multiple">
                                    <label class="custom-file-label" for="im2">Choose file</label>
                                 </div>
                              </div>
                           <?php else : ?>
                              <div class="form-group">
                                 <label for="keterangan2">Keterangan</label>
                                 <input type="text" class="form-control" id="keterangan2" placeholder="Masukan Keterangan Progres 50%" name="pro2">
                              </div>
                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text" id="img2">Upload</span>
                                 </div>
                                 <div class="custom-file">
                                    <input type="file" name="image[]" class="custom-file-input" id="im2" aria-describedby="img2" multiple="multiple">
                                    <label class="custom-file-label" for="im2">Choose file</label>
                                 </div>
                              </div>
                           <?php endif ?>
                        </div>
                        <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                           <hr>
                           <?php if (isset($p->progres3)) : ?>
                              <div class="form-group">
                                 <label for="keterangan3">Keterangan</label>
                                 <input type="text" class="form-control" id="keterangan3" value="<?= $p->progres3 ?>" name="pro3">
                              </div>
                              <img src="<?= base_url('uploads/img/') ?><?= $p->img3 ?>" class="img-thumbnail rounded mx-auto d-block my-4" alt="Responsive image">
                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text" id="img3">Upload</span>
                                 </div>
                                 <div class="custom-file">
                                    <input type="file" name="image[]" class="custom-file-input" id="im3" aria-describedby="img3" multiple="multiple">
                                    <label class="custom-file-label" for="im3">Choose file</label>
                                 </div>
                              </div>
                           <?php else : ?>
                              <div class="form-group">
                                 <label for="keterangan3">Keterangan</label>
                                 <input type="text" class="form-control" id="keterangan3" placeholder="Masukan Keterangan Progres 75%" name="pro3">
                              </div>
                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text" id="img3">Upload</span>
                                 </div>
                                 <div class="custom-file">
                                    <input type="file" name="image[]" class="custom-file-input" id="im3" aria-describedby="img3" multiple="multiple">
                                    <label class="custom-file-label" for="im3">Choose file</label>
                                 </div>
                              </div>
                           <?php endif ?>
                        </div>
                        <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                           <hr>
                           <?php if (isset($p->progres4)) : ?>
                              <div class="form-group">
                                 <label for="keterangan4">Keterangan</label>
                                 <input type="text" class="form-control" id="keterangan4" value="<?= $p->progres4 ?>" name="pro4">
                              </div>
                              <img src="<?= base_url('uploads/img/') ?><?= $p->img4 ?>" class="img-thumbnail rounded mx-auto d-block my-4" alt="Responsive image">
                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text" id="img4">Upload</span>
                                 </div>
                                 <div class="custom-file">
                                    <input type="file" name="image[]" class="custom-file-input" id="im4" aria-describedby="img4" multiple="multiple">
                                    <label class="custom-file-label" for="im4">Choose file</label>
                                 </div>
                              </div>
                           <?php else : ?>
                              <div class="form-group">
                                 <label for="keterangan4">Keterangan</label>
                                 <input type="text" class="form-control" id="keterangan4" placeholder="Masukan Keterangan Progres 100%" name="pro4">
                              </div>
                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text" id="img4">Upload</span>
                                 </div>
                                 <div class="custom-file">
                                    <input type="file" name="image[]" class="custom-file-input" id="im4" aria-describedby="img4" multiple="multiple">
                                    <label class="custom-file-label" for="im4">Choose file</label>
                                 </div>
                              </div>
                           <?php endif ?>
                        </div>
                     </div>
                  <?php endforeach ?>
                  <hr>
                  <button class="btn btn-primary float-right" type="submit">Simpan</button>
                  <?php echo form_close(); ?>
                  <!-- </form> -->
               <?php endif ?>
            </div>
         </div>
      </div>
   </div>
</div>
</div>