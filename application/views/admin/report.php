<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/jquery.mask.min.js') ?>"></script>
<style>
  .wrapper {
    display: inline-block;
    width: 100%;
    margin: auto;
  }

  hr {
    margin: 0px;
    border-style: inset;
    border-width: 1px;
  }

  .tableku {
    margin-left: 40px;
  }

  .tableteks {
    text-align: center;
  }

  /* table {
    border-collapse: collapse;
  } */

  table,
  td,
  tr {
    border: 0.2px solid black;
  }
</style>

<body>
  <div class="wrapper">
    <!-- <div class="float-left img-thumbnails">
      <img src="assets/img/profile/download.jpg">
    </div>
    <div class="float-rights">
      <h2>Laporan Keuangan Pekerjaan Urusan Dalam Divisi Infrastruktur RS Tingkat.II Iskandar Muda, Banda Aceh</h2>
      <p>JL. T. HAMZAH BENDAHARA NO. 1 KUTA ALAM BANDA ACEH TELP. 0651-24712 FAX. 0651-22550 EMAIL: rumahsakitim@yahoo.com</p>
      <hr>
    </div> -->
    <div style="text-align:center">
      <img src="assets/img/profile/kop.jpg" style="width:80%;">
    </div>
    <hr>
    <br>

    <div class="tableteks">
      <h3>Laporan Pengeluaran Barang dan Jasa</h3>
    </div>

    <div class="tableku">
      <table>
        <tr align="center" class="table-primary">
          <td>No</td>
          <td>No Transaksi</td>
          <td>Pekerjaan</td>
          <td>Nama Pengadaan</td>
          <td>Volume Persatuan</td>
          <td>Harga</td>
          <td>Total</td>
        </tr>

        <?php
        // var_dump($transaksi);
        $total = 0;
        $no = 1;
        foreach ($transaksi as $t) : ?>
          <tr>
            <td align="center"><?= $no ?></td>
            <td align="center"><?= $t->no_transaksi ?></td>
            <td><span style="font-weight:bold"><?= $t->nama_pekerjaan ?></span> <br> &nbsp; Kosultan: <?= $t->nama_konsultan ?> <br> &nbsp; &nbsp; Supplier: <?= $t->nm_supplier ?> </td>
            <td class="font-weight-lighter" width="100px"><?= $t->nm_barang ?></td>
            <td class="font-weight-lighter" width="50px"><?= $t->vol ?> <span class="badge badge-primary"> <?= $t->satuan ?> </span></td>
            <td class="font-weight-lighter" width="130px">Rp. <span class="uang"> <?= $t->harga ?></span></td>
            <?php $subtotal = $t->vol * $t->harga; ?>
            <td class="font-weight-lighter" width="150px">Rp. <span class="uang"><?= $subtotal ?></span></td>
          </tr>
          <?php
          $total += $subtotal;
          ?>
          <?php $no++;
        endforeach; ?>

        <tr class="table-active">
          <td class="font-weight-bolder" colspan="6" align="center">Total Belanja</td>
          <td class="font-weight-bolder" colspan="2">Rp. <span class="uang"><?= $total ?></span></td>
        </tr>

        <tr>
          <td colspan="7"></td>
        </tr>

        <tr class="table-warning">
          <td class="font-weight-bolder" colspan="6" align="center">Plot Anggara Infrastruktur</td>
          <td class="font-weight-bolder" colspan="2">Rp. <span class="uang"><?= $saldo ?></td>
        </tr>

        <?php $lekur = $saldo - $total;
        if ($lekur < 0) : ?>
          <tr class="table-danger">
            <td class="font-weight-bolder" colspan="6" align="center">Total Kekurangan Anggaran</td>
            <td class="font-weight-bolder" colspan="2">Rp. -
              <span class="uang"><?= $lekur ?></span></td>
          </tr>
        <?php else : ?>
          <tr class="table-success">
            <td class="font-weight-bolder" colspan="6" align="center">Sisa Penggunaan Anggaran</td>
            <td class="font-weight-bolder" colspan="2">Rp.
              <span class="uang"><?= $lekur ?></span></td>
          </tr>
        <?php endif ?>
        </tr>
      </table>
      <br><br>

      <div class="tableku">
        <table border="0">
          <tr>
            <td width="600px">Ka. Urdal</td>
            <td width="300px">Ta. Urdal</td>
          </tr>
          <!-- spasi -->
        </table>
        <br><br><br>
        <!-- endspasi -->
        <table border="0">
          <tr>
            <td width="600px">Imam Sugiarto, Amd.Keb</td>
            <td width="300px">Saifullah</td>
          </tr>
          <tr>
            <td>Kapten Ckm NRP : 21950244311274</td>
            <td>Kopda NRP : 31060542850386</td>
          </tr>
        </table>
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
</body>