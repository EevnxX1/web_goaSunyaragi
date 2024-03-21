<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="style2.css" />
    <title>Goa Sunyaragi - Info</title>
  </head>
  <body>
    <div class="page1">
      <div class="logo">
        <img src="assets/logo1.jpg" />
        <ul>
          <a href="index.php">Home</a>
          <a href="#">Info Terbaru</a>
          <a href="register.php">Daftar</a>
          <a href="login.php">Login</a>
          <a href="user/">Pesan Tiket</a>
        </ul>
      </div>
      <div class="pembungkus1">
        <div class="content1">
          <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
            <div class="carousel-inner">
              <?php
              require_once "function.php";
              $bagian = 0;
              $query = mysqli_query($db, "SELECT * FROM tbl_berita ORDER BY id_berita DESC LIMIT 3");
              while($berita = $query -> fetch_array()) {
                $active = ($bagian == 0) ? "carousel-item active" : "carousel-item";
                $panjang_teks = 60;
                $teks = substr($berita['isi1'], 0, $panjang_teks) . "...";
              ?>
              <div class="<?= "$active" ?>">
                <img src="assets/<?= "$berita[gambar]" ?>" class="d-block w-100" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                  <h5><?= "$berita[judul]" ?></h5>
                  <p><?= "$teks" ?></p>
                </div>
              </div>
              <?php $bagian++; }?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="content1">
          <?php
          $query = mysqli_query($db, "SELECT * FROM tbl_berita ORDER BY id_berita DESC LIMIT 3");
          while($berita = mysqli_fetch_array($query)) {
            $tanggal_upload = date('d F Y', strtotime($berita['tgl_berita']));
          ?>
          <a href="teks_info.php?idb=<?= "$berita[id_berita]" ?>">
            <button>
              <span class="tanggal1"><?= "$tanggal_upload" ?></span><br />
              <h6><?= "$berita[judul]" ?></h6>
            </button>
          </a>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
    <div class="page2">
      <h3>INFO TERBARU</h3>
      <div class="pembungkus2">
        <?php
         $query = mysqli_query($db, "SELECT * FROM tbl_berita ORDER BY id_berita DESC");
         while($berita = mysqli_fetch_array($query)) {
          $tanggal_upload = date('d F Y', strtotime($berita['tgl_berita']));
        ?>
        <a href="teks_info.php?idb=<?= "$berita[id_berita]" ?>">
          <button>
            <img src="assets/<?= "$berita[gambar]" ?>" alt="" />
            <span><?= "$tanggal_upload" ?></span><br />
            <h5><?= "$berita[judul]" ?></h5>
          </button>
        </a>
        <?php
         }
        ?>
      </div>
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
          <img src="assets/logo1.jpg" alt="" />
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
