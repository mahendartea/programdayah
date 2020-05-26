<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/jquery.mask.min.js') ?>"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <?= $this->session->flashdata('message'); ?>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <form action="<?= base_url('admin/tambahtransaksi') ?>" method="post">
        <h6 class="m-0 font-weight-bold text-primary">Form Input Transaksi</h6>
        <hr>
        <div class="row">
          <div class="col-6">

            <div class="form-group">
              <label for="exampleInputEmail1">No. Transaksi</label>
              <input name="notransaksi" type="text" class="form-control" placeholder="Masukan nama pengadaan">
              <small class="form-text text-danger">*Masukan nomor transaksi</small>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Tahun Anggaran</label>
              <select class="form-control" name="thnanggaran">
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
              </select>
              <!-- <input name="thnanggaran" type="number" class="form-control" placeholder="Masukan Tahun Anggaran"> -->
              <small class="form-text text-danger">*Masukan tahun anggaran</small>
            </div>

            <label for="exampleInputEmail1">Pilih Pekerjaan</label>
            <div class="input-group mb-3">
              <select class="custom-select" id="inputGroupSelect01" name="idpekerjaan">
                <option selected>Pilih...</option>
                <?php foreach ($listkerjaan as $kerjaan) : ?>
                <option value="<?= $kerjaan->id ?>"><?= $kerjaan->nama_pekerjaan ?></option>
                <?php endforeach ?>
              </select>
            </div>

            <label for="exampleInputEmail1">Konsultan yang mengerjakan</label>
            <div class="input-group mb-3">
              <select class="custom-select" id="inputGroupSelect01" name="idkonsultan">
                <option selected>Pilih...</option>
                <?php foreach ($listrekanan as $rekanan) : ?>
                <option value="<?= $rekanan->id ?>"><?= $rekanan->nama_konsultan ?></option>
                <?php endforeach; ?>
              </select>
            </div>

          </div>

          <div class="col-6">
            <label for="exampleInputEmail1">Supplier Pengadaan Barang</label>
            <div class="input-group mb-3">
              <select class="custom-select" id="inputGroupSelect01" name="idsuplier">
                <option selected>Pilih...</option>
                <?php foreach ($listsupplier as $sup) : ?>
                <option value="<?= $sup->id ?>"><?= $sup->nm_supplier ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Nama Item Pengadaan</label>
              <input name="nmbrg" type="text" class="form-control" placeholder="Masukan nama pengadaan">
              <small class="form-text text-danger">*Masukan detail nama pengadaan barang atau jasa</small>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Volume</label>
              <input type="number" class="form-control" name="volume" placeholder="Masukan volume">
              <small class="form-text text-danger">*Masukan volume/kuantitas/jumlah pengadaan.</small>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Satuan</label>
              <input name="satuan" type="text" class="form-control" placeholder="Masukan Satuan">
              <small class="form-text text-danger">*Masukan satuan pengadaan barang/jasa.</small>
            </div>

            <label for="exampleInputPassword1">Harga</label>
            <div class="input-group flex-nowrap mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">Rp.</span>
              </div>
              <input type="text" class="form-control uang" name="harga" placeholder="Masukan Harga per-satuan">
            </div>

          </div>
        </div>
        <hr>
        <div class="float-right">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="card-body">
      <form action="<?= base_url('admin/cetaklap') ?>" method="post">
        <div class="row">
          <div class="col-3">
            <select class="form-control" name="tglcetak">
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
            </select>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-outline-primary btn-sm d-inline-block"><i class="fas fa-fw fa-print"></i> Cetak Rekapan </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Daftar Transaksi</h6>

    </div>

    <div class="row">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr align="center" class="table-primary">
                <td>No</td>
                <td>No Transaksi</td>
                <td>Pekerjaan</td>
                <td>Nama Pengadaan</td>
                <td width="50px">Volume Persatuan</td>
                <td>Harga</td>
                <td>Total</td>
                <td>Aksi</td>
              </tr>
            </thead>
            <tbody>
              <?php
              // var_dump($transaksi);
              $total = 0;
              $no = 1;
              foreach ($transaksi as $t) : ?>
              <tr>
                <td align="center"><?= $no ?></td>
                <td align="center"><?= $t->no_transaksi ?></td>
                <td><?= $t->nama_pekerjaan ?></td>
                <td class="font-weight-lighter" width="100px"><?= $t->nm_barang ?></td>
                <td class="font-weight-lighter" width="50px"><?= $t->vol ?> <span class="badge badge-primary"> <?= $t->satuan ?> </span></td>
                <td class="font-weight-lighter" width="130px">Rp. <span class="uang"> <?= $t->harga ?></span></td>
                <?php $subtotal = $t->vol * $t->harga; ?>
                <td class="font-weight-lighter" width="150px">Rp. <span class="uang"><?= $subtotal ?></span></td>
                <td class="font-weight-lighter" align="center" class=""><a href="<?= base_url('admin/vedit_transaksi/') ?><?= $t->id_t ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a> | <a href="<?= base_url('admin/hapus_transaksi/') ?><?= $t->id_t ?>" onclick="return confirm_delete()" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash text-danger"></i></a> | <a class="btn btn-outline-info btn-sm" href="<?= base_url('admin/dettransaksi/') ?><?= $t->id_t ?>" data-toggle="tooltip" data-placement="top" title="detail">Detail</a></td>
                <?php
                  $total += $subtotal;
                  ?>
              </tr>
              <?php $no++;
              endforeach; ?>
            </tbody>


            <?php
            $lekur = $saldo - $total;
            $persenguna = $total / $saldo * 100;
            $sisapersen = $lekur / $saldo * 100;
            ?>
            <tr class="table-active">
              <td class="font-weight-bolder" colspan="6" align="center">Total Belanja (<?= number_format($persenguna, 2) ?> %)</td>
              <td class="font-weight-bolder" colspan="2">Rp. <span class="uang"><?= $total ?></span></td>
            </tr>
            <tr class="table-warning">
              <td class="font-weight-bolder" colspan="6" align="center">Plot Anggara Infrastruktur</td>
              <td class="font-weight-bolder" colspan="2">Rp. <span class="uang"><?= $saldo ?></td>
            </tr>
            <?php
            if ($lekur < 0) : ?>
            <tr class="table-danger">
              <td class="font-weight-bolder" colspan="6" align="center">Total Kekurangan Anggaran (<?= number_format($sisapersen, 2) ?> %)</td>
              <td class="font-weight-bolder" colspan="2">Rp. -
                <span class="uang"><?= $lekur ?></span></td>
            </tr>
            <?php else : ?>
            <tr class="table-success">
              <td class="font-weight-bolder" colspan="6" align="center">Sisa Penggunaan Anggaran (<?= number_format($sisapersen, 2) ?> %)</td>
              <td class="font-weight-bolder" colspan="2">Rp.
                <span class="uang"><?= $lekur ?></span></td>
            </tr>
            <?php endif ?>
            </tr>
          </table>
        </div>
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
    $('.uang').mask('000.000.000,-', {
      reverse: true
    });

    // Format nomor HP.
    // $('.no_hp').mask('0000−0000−0000');

    // Format tahun pelajaran.
    // $('.tapel').mask('0000/0000');
  });
</script>
<script type="text/javascript">
  function confirm_delete() {
    return confirm('are you sure?');
  }
</script>