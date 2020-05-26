<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg-8">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>

  <div class="card mb-3 col-lg-8">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <?php foreach ($suplierdetail as $sup) : ?>
            <h5 class="card-title"><?= $sup->nm_supplier; ?></h5>
            <hr>
            <div class="row">
              <div class="col-4">
                <p> Alamat : </p>
                <p>Kecamatan : </p>
                <p>Kota/Kabupaten : </p>
                <p>Kodepos : </p>
                <p>Provinsi : </p>
              </div>
              <div class="col-8">
                <p class="card-text"> <?= $sup->alamat; ?></p>
                <p class="card-text"> <?= $sup->kecamatan; ?></p>
                <p class="card-text"> <?= $sup->kota; ?></p>
                <p class="card-text"> <?= $sup->kodepos; ?></p>
                <p class="card-text"> <?= $sup->provinsi; ?></p>
              </div>
            </div>
            <hr>
            <p class="card-text">Telpon : <?= $sup->telpon; ?></p>
            <p class="card-text">Keterangan : <?= $sup->keterangan; ?></p>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->