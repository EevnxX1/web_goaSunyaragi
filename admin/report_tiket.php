<?php
require_once "../function.php";
$tiket = mysqli_query($db, "SELECT * FROM tbl_tiket WHERE status = '$_GET[tiket]'");
$status = mysqli_fetch_array($tiket);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="report2.css" />
    <title>Report</title>
  </head>
  <body onload="javascript: window.print()">
    <div class="page1">
      <div class="judul">
        <div class="logo">
          <img src="../assets/logo1.jpg" alt="" />
        </div>
        <div class="teks">
          <h1>Goa Sunyaragi</h1>
        </div>
      </div>
      <p class="alamat">Jl. Sunyaragi, Kec. Kesambi, Kota Cirebon, Jawa Barat, Indonesia</p>
      <p class="telp">No. Telp : (+62)8579-7127-694 | Gmail : disbudparkotacirebon@gmail.com</p>
    </div>
    <div class="page2">
      <h2>Data Tiket <?= "$status[status]" ?></h2>
      <table>
        <tr>
            <th>No.</th>
            <th>Nama Pemesanan</th>
            <th>Jumlah Tiket</th>
            <th>Tanggal Berkunjung</th>
            <th>Harga Total</th>
            <th>Opsi Pembayaran</th>
        </tr>
        <?php
                                            include_once "../function.php";
                                            $sqltiket = mysqli_query($db, "SELECT * FROM tbl_tiket INNER JOIN tbl_user ON tbl_tiket.id_user = tbl_user.id_user WHERE tbl_tiket.status = '$status[status]'");
                                            $no = 1;
                                            while($ttiket = mysqli_fetch_array($sqltiket)) {
                                            ?>
                                        <tr>
                                            <td><?= "$no" ?></td>
                                            <td><?= "$ttiket[nama]" ?></td>
                                            <td><?= "$ttiket[jmlh_tiket]" ?></td>
                                            <td><?= "$ttiket[tgl_kunjungan]" ?></td>
                                            <td>Rp.<?= number_format("$ttiket[harga]", 0, ",", ".") ?></td>
                                            <td><?= "$ttiket[opsi_bayar]" ?></td>
                                        </tr>
                                        <?php
                                            $no++;
                                            }
                                            ?>
      </table>
    </div>
    <?php
    $sekarang = time();
    $tanggal = date("d F Y", $sekarang);
    ?>
    <div class="page3">
      <p class="waktu">Cirebon, <?= "$tanggal" ?></p>
      <p class="admin">Administrator</p>
      <div class="tanda_tangan">
        <img src="../assets/tanda_tangan.png" alt="" />
      </div>
      <p class="nama">Miftahul Huda</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
