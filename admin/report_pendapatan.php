<?php
require_once "../function.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="report1.css" />
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
      <h2>Data Pendapatan Tiket</h2>
      <table>
        <tr>
          <th>Tahun Penjualan</th>
          <th>Tiket Terjual</th>
          <th>Harga Per tiket</th>
        </tr>
        <?php
        $tgl1 = mysqli_query($db, "SELECT tgl_kunjungan FROM tbl_tiket GROUP BY tgl_kunjungan DESC");
        $tgl2 = mysqli_query($db, "SELECT tgl_kunjungan FROM tbl_tiket GROUP BY tgl_kunjungan ASC");
        $query1 = mysqli_query($db, "SELECT SUM(jmlh_tiket) AS jumlah_tiket FROM tbl_tiket");
        $query2 = mysqli_query($db, "SELECT SUM(harga) AS total FROM tbl_tiket");
        $tanggal_sebelum = mysqli_fetch_array($tgl2);
        $tanggal_ini = mysqli_fetch_array($tgl1);
        $tiket = mysqli_fetch_array($query1);
        $tot_harga = mysqli_fetch_array($query2);
        $tgl_sebelum = date("d F Y", strtotime($tanggal_sebelum['tgl_kunjungan']));
        $tgl_ini = date("d F Y", strtotime($tanggal_ini['tgl_kunjungan']));
        ?>
        <tr>
          <td><?= "$tgl_sebelum" ?> s/d <?= "$tgl_ini" ?></td>
          <td><?= "$tiket[jumlah_tiket]" ?> Tiket</td>
          <td>Rp. 15.000</td>
        </tr>
        <tr>
          <th colspan="2">Jumlah Total Pendapatan</th>
          <td>Rp. <?= number_format("$tot_harga[total]", 0, ",", ".") ?></td>
        </tr>
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
