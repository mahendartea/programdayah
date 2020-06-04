<div class="container">

   <!-- Outer Row -->
   <div class="row justify-content-center">

      <div class="col-lg-7">

         <div class="card o-hidden border-0 shadow-lg my-5 bg-gray-600">
            <div class="card-body p-0">
               <!-- Nested Row within Card Body -->
               <div class="row">
                  <div class="col-lg">
                     <div class="p-5">
                        <div class="text-center">
                           <h1 class="h4 text-gray-900 mb-4"><i class="fas fa-fw fa-people"></i></i><?= $title ?></h1>
                           <hr>
                           <h4 class="my-3 text-white">Kelola Program Dayah Banda Aceh</h4>
                        </div>

                        <?= $this->session->flashdata('msg'); ?>

                        <form class="user" method="post" action="<?= base_url('monitor/ceklogin'); ?>">
                           <div class="form-group">
                              <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                           </div>
                           <div class="form-group">
                              <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                           </div>
                           <button type="submit" class="btn btn-primary btn-user btn-block">
                              Login
                           </button>
                        </form>
                        <hr>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>

   </div>

</div>