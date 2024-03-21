<?php
session_start();
require_once "../function.php";
if(!isset($_SESSION["id_user"])) {
  echo "<script>
  alert('Harap Login Terlebih Dahulu Sebelum Masuk!')
  document.location='../login.php'
  </script>";
}
$query = mysqli_query($db, "SELECT * FROM tbl_user WHERE id_user = '$_SESSION[id_user]'");
$user = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style6.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <title>Goa Sunyaragi - Riwayat Tiket</title>
  </head>
  <body>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi Log Out</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin Ingin Log Out
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <a class="btn btn-primary" href="logout.php">Iya</a>
      </div>
    </div>
  </div>
</div>
    <div class="background"></div>
    <div class="page1">
      <div class="logo">
        <img src="../assets/logo1.jpg" />
        <ul>
          <a href="index.php">Home</a>
          <a href="info_terbaru.php">Info Terbaru</a>
          <a href="#">Riwayat Tiket</a>
          <a href="pesan.php">Pesan Tiket</a>
          <a data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer; color: white;">Log Out</a>
          <a href="profile.php">Halo, <?= "$user[nama]" ?></a>
        </ul>
      </div>
    </div>
    <div class="page2">
      <div class="gambar">
        <img src="../assets/logo1.jpg" alt="" />
      </div>
      <h3>Goa Sunyaragi</h3>
    </div>
    <div class="scroll">
      <!-- Tiket Aktif -->
      <?php
      $query2 = mysqli_query($db, "SELECT * FROM tbl_tiket WHERE status = 'Aktif' AND id_user = '$_SESSION[id_user]' ORDER BY id_tiket DESC");
      while($aktif = mysqli_fetch_array($query2)) {
      $tgl_kjng = $aktif['tgl_kunjungan'];
      $nama_hari = date('D', strtotime($tgl_kjng));
      $tgl_kunjungan = date("d F Y", strtotime($tgl_kjng));
      $waktu = waktu_mundur($aktif['tgl_kunjungan'], $aktif['status'], $aktif['id_user'], $aktif['id_tiket']);
      switch ($nama_hari) {
        case 'Sun':
            $hari_kunjungan = 'Minggu';
            break;
        case 'Mon':
            $hari_kunjungan = 'Senin';
            break;
        case 'Tue':
            $hari_kunjungan = 'Selasa';
            break;
        case 'Wed':
            $hari_kunjungan = 'Rabu';
            break;
        case 'Thu':
            $hari_kunjungan = 'Kamis';
            break;
        case 'Fri':
            $hari_kunjungan = 'Jumat';
            break;
        case 'Sat':
            $hari_kunjungan = 'Sabtu';
            break;
    }
      ?>
      <div class="page3">
        <div class="atas">
          <h3>Tiket Kunjungan Goa Sunyaragi</h3>
          <div class="isi">
            <div class="konten">
              <h5>Tanggal Kunjungan</h5>
              <p><?= "$hari_kunjungan" ?>, <?= "$tgl_kunjungan" ?></p>
            </div>
            <div class="konten">
              <h5>Lokasi</h5>
              <p>Sunyaragi, Kec. Kesambi, Kota Cirebon, Jawa Barat 45132</p>
            </div>
            <div class="konten">
              <h5>Peringatan!</h5>
              <p>Jika Tanggal Sudah Lewat Maka Tiket Akan Expire/Tidak Aktif</p>
            </div>
          </div>
        </div>
        <div class="bawah">
          <div class="isi">
            <div class="konten">
              <h5>Jumlah Tiket</h5>
              <p><?= "$aktif[jmlh_tiket]" ?> Tiket</p>
            </div>
            <div class="konten">
              <h5>Kode Pin tiket</h5>
              <p><?= "$aktif[pin]" ?></p>
            </div>
            <div class="konten">
              <h5>Status Tiket</h5>
              <p><?= "$aktif[status]" ?></p>
            </div>
          </div>
        </div>
      </div>
      <?php
      }
      ?>
      <!-- Aktif -->

      <!-- Tiket Tidak Aktif -->
      <?php
      $query2 = mysqli_query($db, "SELECT * FROM tbl_tiket WHERE status = 'Tidak Aktif' AND id_user = '$_SESSION[id_user]' ORDER BY id_tiket DESC");
      while($nonaktif = mysqli_fetch_array($query2)) {
      $tgl_kjng = $nonaktif['tgl_kunjungan'];
      $nama_hari = date('D', strtotime($tgl_kjng));
      $tgl_kunjungan = date("d F Y", strtotime($tgl_kjng));
      switch ($nama_hari) {
        case 'Sun':
            $hari_kunjungan = 'Minggu';
            break;
        case 'Mon':
            $hari_kunjungan = 'Senin';
            break;
        case 'Tue':
            $hari_kunjungan = 'Selasa';
            break;
        case 'Wed':
            $hari_kunjungan = 'Rabu';
            break;
        case 'Thu':
            $hari_kunjungan = 'Kamis';
            break;
        case 'Fri':
            $hari_kunjungan = 'Jumat';
            break;
        case 'Sat':
            $hari_kunjungan = 'Sabtu';
            break;
    }
      ?>
      <div class="page3">
        <div class="atas">
          <h3>Tiket Kunjungan Goa Sunyaragi</h3>
          <div class="isi">
            <div class="konten">
              <h5>Tanggal Kunjungan</h5>
              <p><?= "$hari_kunjungan" ?>, <?= "$tgl_kunjungan" ?></p>
            </div>
            <div class="konten">
              <h5>Lokasi</h5>
              <p>Sunyaragi, Kec. Kesambi, Kota Cirebon, Jawa Barat 45132</p>
            </div>
            <div class="konten">
              <h5>Peringatan!</h5>
              <p>Jika Tanggal Sudah Lewat Maka Tiket Akan Expire/Tidak Aktif</p>
            </div>
          </div>
        </div>
        <div class="bawah">
          <div class="isi">
            <div class="konten">
              <h5>Jumlah Tiket</h5>
              <p><?= "$nonaktif[jmlh_tiket]" ?> Tiket</p>
            </div>
            <div class="konten">
              <h5>Kode Pin tiket</h5>
              <p>---------</p>
            </div>
            <div class="konten">
              <h5>Status Tiket</h5>
              <p><?= "$nonaktif[status]" ?></p>
            </div>
          </div>
        </div>
      </div>
      <?php
      }
      ?>
      <!-- Tidak Aktif -->
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path
        fill="#2E2E2E"
        fill-opacity="1"
        d="M0,32L26.7,58.7C53.3,85,107,139,160,154.7C213.3,171,267,149,320,122.7C373.3,96,427,64,480,69.3C533.3,75,587,117,640,144C693.3,171,747,181,800,176C853.3,171,907,149,960,154.7C1013.3,160,1067,192,1120,197.3C1173.3,203,1227,181,1280,176C1333.3,171,1387,181,1413,186.7L1440,192L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"
      ></path>
    </svg>
    <footer class="page6">
      <div class="pembungkus">
        <div class="content">
          <img src="../assets/logo1.jpg" alt="" />
          <h4>Goa Sunyaragi</h4>
          Kunjungi Situs Bersejarah yang Tersembunyi di Goa Sunyaragi.
        </div>
        <div class="content">
          <h4>Jam Buka Umum</h4>
          Senin: 08:00 - 17:00 <br />
          Selasa: 08:00 - 17:00 <br />
          Rabu: 08:00 - 17:00 <br />
          Kamis: 08:00 - 17:00 <br />
          Jumat: 08:00 - 17:00 <br />
          Sabtu: 08:00 - 17:00
        </div>
        <div class="content">
          <h4>Harga Ticket</h4>
          Mulai Dari <br />
          <span>Rp.17.000</span><br />
          Rp.15.000
        </div>
        <div class="content">
          <h4>Contact</h4>
          +62 857-9712-7694 <br />
          disbudparkotacirebon@gmail.com <br />
          Jl. Sunyaragi No. 1, Cirebon, Jawa Barat, Indonesia.
        </div>
      </div>
      <div class="copyright">© 2023 Tiket Goa Sunyaragi. Semua Hak Dilindungi.</div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
