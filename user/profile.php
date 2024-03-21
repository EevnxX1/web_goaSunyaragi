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
$user = $query -> fetch_array();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="style7.css" />
    <title>Document</title>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Info Profil</h1>
                                        </div>
                                        <div class="modal-body">
                                        <div id="pesanModal"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="redirectToPage()">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
    <div class="page1">
      <div class="logo">
        <img src="../assets/logo1.jpg" />
        <ul>
          <a href="index.php">Home</a>
          <a href="info_terbaru.php">Info Terbaru</a>
          <a href="riwayat.php">Riwayat Tiket</a>
          <a href="pesan.php">Pesan Tiket</a>
          <a data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer; color: white">Log Out</a>
          <a href="#">Halo, <?= "$user[nama]" ?></a>
        </ul>
      </div>
      <form action="" method="post">
        <div class="header-profile"></div>
        <div class="container">
          <div class="foto-profile">
            <h2>My Profile</h2>
            <div class="border-profile">
              <i class="fa-solid fa-user"></i>
            </div>
          </div>
          <div class="data-diri">
            <div class="form">
              <div class="bagian">
                <label for="name">Nama</label><br />
                <input type="text" name="nama" id="name" class="form-control input" value="<?= "$user[nama]" ?>" />
              </div>
            </div>
            <div class="form">
              <div class="bagian">
                <label for="">Jenis Kelamin</label>
                <div class="form-check">
                  <input type="radio" name="gender" id="flexRadioDefault1" value="Laki-laki" class="form-check-input" <?php if($user['jenis_kelamin'] == 'Laki-laki') echo"checked='checked'" ?>/>
                  <label class="form-check-label" for="flexRadioDefault1"> Laki-Laki </label>
                </div>
                <div class="form-check">
                  <input type="radio" name="gender" id="flexRadioDefault2" value="Perempuan" class="form-check-input" <?php if($user['jenis_kelamin'] == 'Perempuan') echo"checked='checked'" ?> />
                  <label class="form-check-label" for="flexRadioDefault2"> Perempuan </label>
                </div>
              </div>
              <div class="bagian">
                <label for="">Nomer Telepon</label><br />
                <input type="number" name="nohp" id="nohp" class="form-control input" value="<?= "$user[no_telp]" ?>" />
              </div>
            </div>
            <div class="form">
              <div class="bagian">
                <label for="tgl_lahir">Tanggal Lahir</label><br />
                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control input" value="<?= "$user[tgl_lahir]" ?>" />
              </div>
              <div class="bagian">
                <label for="username">Username</label><br />
                <input type="text" name="username" id="username" class="form-control input" value="<?= "$user[username]" ?>" />
              </div>
            </div>
            <div class="form">
              <div class="bagian">
                <label for="gmail">Gmail</label><br />
                <input type="email" name="gmail" id="gmail" class="form-control input" value="<?= "$user[gmail]" ?>" />
              </div>
            </div>
            <div class="form">
              <div class="bagian">
                <label for="password">Password</label><br />
                <input type="text" name="password" id="password" class="form-control input" value="<?= "$user[password]" ?>" />
              </div>
            </div>
            <div class="form">
              <div class="bagian">
                <button type="submit">Save Profile</button>
              </div>
            </div>
          </div>
        </div>
      </form>
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
    <script src="https://kit.fontawesome.com/29c51fef9f.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $sql = mysqli_query($db, "UPDATE tbl_user SET
                          nama = '$_POST[nama]',
                          jenis_kelamin = '$_POST[gender]',
                          no_telp = '$_POST[nohp]',
                          tgl_lahir = '$_POST[tgl_lahir]',
                          username = '$_POST[username]',
                          gmail = '$_POST[gmail]',
                          password = '$_POST[password]' WHERE
                          id_user = '$_SESSION[id_user]'
                          ");
  echo"<script>
  window.onload = function() {
    document.getElementById('pesanModal').textContent = 'Data Profil Berhasil Di Ubah!';
    $('#exampleModal1').modal('show');
};
function redirectToPage() {
    document.location = 'index.php';
}
  </script>";
}
?>
