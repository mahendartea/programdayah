<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/jquery.mask.min.js') ?>"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg-8">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>

  <div class="card mb-3 col-lg-10">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img img-thumbnail mt-2">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <?php foreach ($detailtrans as $detail) : ?>
            <h5 class="card-title text-center my-2"> <span class="alert alert-success">No. Transaksi : <?= $detail->no_transaksi; ?></span></h5>
            <hr>
            <div class="row mt-2">
              <div class="col-6">
                <p> Nama Pekerjaan : </p>
                <p> Realisasi : </p>
                <p> Nama Konsultan : </p>
                <p> Nama Suplier Barang : </p>
                <p> Nama Pengadaan : </p>
                <p> volume Pengadaan : </p>
                <p> Harga per pengadaan : </p>
                <p> Tanggal Input : </p>
              </div>
              <div class="col-6">
                <p class="card-text"> <?= $detail->nama_pekerjaan; ?></p>
                <p class="card-text"> <?= $detail->realisasi; ?></p>
                <p class="card-text"> <?= $detail->nama_konsultan; ?></p>
                <p class="card-text"> <?= $detail->nm_supplier; ?></p>
                <p class="card-text"> <?= $detail->nm_barang; ?></p>
                <p class="card-text"> <?= $detail->vol; ?> <span class="card-text"> <?= $detail->satuan; ?></span></p>
                <p class="card-text"> Rp. <span class="uang"><?= $detail->harga; ?></span></p>
                <?php
                $tgl = indonesian_date(time('Y-m-d', $detail->tgl_transaksi));
                ?>
                <p class="card-text"> <?= $tgl; ?></p>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
  $(document).ready(function($) {

    // Format mata uang.
    $('.uang').mask('000.000.000,-', {
      reverse: true
    });

    // Format nomor HP.
    // $('.no_hp').mask('0000−0000−0000');

    // Format tahun pelajaran.
    // $('.tapel').mask('0000/0000');
  });
</script>