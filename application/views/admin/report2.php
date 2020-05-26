<html>

<head>
  <meta http-equiv="Content-Language" content="en-us">
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <meta name="GENERATOR" content="Microsoft FrontPage 4.0">
  <meta name="ProgId" content="FrontPage.Editor.Document">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="<?= base_url('assets/js/jquery.mask.min.js') ?>"></script>
  <style type="text/css">
    @media print {
      .noprint {
        display: none;
      }

      table {
        font: 10px arial;
        border-collapse: collapse;
        border: 1px solid black;

      }

      th,
      td {
        border: 1px solid black;
        padding: 4px;
        border-collapse: collapse;
      }

      #meta th {
        width: <?php echo $space; ?> text-align: right;
      }

      #meta th.meta-head {
        text-align: center;
        background: #eee;
      }

    }

    #container {
      display: table;
    }

    #row {
      display: table-row;
    }

    #left,
    #right,
    #middle {
      display: table-cell;
    }

    .tablerekap {
      border-collapse: collapse;
      border: 0.2px solid black;
    }

    .tableku {
      border-collapse: collapse;
      border: 0px solid black;
    }
  </style>
</head>

<body>
  <center>
    <form name="myform" class="noprint">
      <input type="button" value="Print" onClick="window.print()">
    </form>
    <br />
    <font size="6"></font>
  </center>

  <div id="container">

    <div style="text-align:center">
      <img src="<?= base_url() ?>assets/img/profile/kop.jpg" style="width:100%;">
    </div>
    <br>

    <div class="tableteks">
      <?php foreach ($transaksi as $thnt) : ?>
      <?php endforeach; ?>
      <h3 align="center">Laporan Pengeluaran Barang dan Jasa Tahun Anggaran <?= $thnt->thn_anggaran ?></h3>
    </div>

    <div>
      <table class="tablerekap">
        <tr align="center" class="table-primary tablerekap">
          <td class="tablerekap">No</td>
          <td class="tablerekap">No Transaksi</td>
          <td class="tablerekap">Pekerjaan</td>
          <td class="tablerekap">Nama Pengadaan</td>
          <td class="tablerekap">Volume Persatuan</td>
          <td class="tablerekap">Harga</td>
          <td class="tablerekap">Total</td>
        </tr>

        <?php
        $total = 0;
        $no = 1;
        foreach ($transaksi as $t) : ?>
        <tr class="tablerekap">
          <td class="tablerekap" align="center"><?= $no ?></td>
          <td class="tablerekap" align="center"><?= $t->no_transaksi ?></td>
          <td class="tablerekap"><span style="font-weight:bold"><?= $t->nama_pekerjaan ?></span> <br> &nbsp; Kosultan: <?= $t->nama_konsultan ?> <br> &nbsp; &nbsp; Supplier: <?= $t->nm_supplier ?> </td>
          <td class="font-weight-lighter tablerekap" width="100px"><?= $t->nm_barang ?></td>
          <td class="font-weight-lighter tablerekap" width="50px"><?= $t->vol ?> <span class="badge badge-primary"> <?= $t->satuan ?> </span></td>
          <td class="font-weight-lighter tablerekap" width="130px">Rp. <span class="uang"> <?= $t->harga ?></span></td>
          <?php $subtotal = $t->vol * $t->harga; ?>
          <td class="font-weight-lighter tablerekap" width="150px">Rp. <span class="uang"><?= $subtotal ?></span></td>
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
        <table>
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
</body>
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

</html>