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
               <h6 class="m-0 font-weight-bold text-primary">Formulir Progres Kegiatan</h6>
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
               <form action="<?= base_url('dashboard/simpanprogress') ?>" method="POST">
                  <div class="tab-content">
                     <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <hr>
                        <div class="form-group">
                           <label for="keterangan1">Keterangan</label>
                           <input type="text" class="form-control" id="keterangan1" placeholder="Masukan Keterangan Progres 25%" name="pro1">
                        </div>
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <span class="input-group-text" id="img1">Upload</span>
                           </div>
                           <div class="custom-file">
                              <input type="file" name="file1" name="file1" class="custom-file-input" id="im1" aria-describedby="img1">
                              <label class="custom-file-label" for="im1">Choose file</label>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <hr>
                        <div class="form-group">
                           <label for="keterangan2">Keterangan</label>
                           <input type="text" class="form-control" id="keterangan2" placeholder="Masukan Keterangan Progres 50%" name="pro2">
                        </div>
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <span class="input-group-text" id="img2">Upload</span>
                           </div>
                           <div class="custom-file">
                              <input type="file" name="file2" class="custom-file-input" id="im2" aria-describedby="img2">
                              <label class="custom-file-label" for="im2">Choose file</label>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                        <hr>
                        <div class="form-group">
                           <label for="keterangan3">Keterangan</label>
                           <input type="text" class="form-control" id="keterangan3" placeholder="Masukan Keterangan Progres 75%" name="pro3">
                        </div>
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <span class="input-group-text" id="img3">Upload</span>
                           </div>
                           <div class="custom-file">
                              <input type="file" name="file3" class="custom-file-input" id="im3" aria-describedby="img3">
                              <label class="custom-file-label" for="im3">Choose file</label>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        <hr>
                        <div class="form-group">
                           <label for="keterangan4">Keterangan</label>
                           <input type="text" class="form-control" id="keterangan4" placeholder="Masukan Keterangan Progres 100%" name="pro4">
                        </div>
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <span class="input-group-text" id="img4">Upload</span>
                           </div>
                           <div class="custom-file">
                              <input type="file" name="file4" class="custom-file-input" id="im4" aria-describedby="img4">
                              <label class="custom-file-label" for="im4">Choose file</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <hr>
                  <button class="btn btn-primary float-right" type="submit">Simpan</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
</div>