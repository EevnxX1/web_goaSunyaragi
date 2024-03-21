<?php
require_once "function.php";
$cek = login($_POST);

if(isset($cek)) {
if($cek === 'user') {
  echo "<script>
       window.onload = function() {
       document.getElementById('pesanModal').textContent = 'Selamat Datang $_SESSION[nama_user] Anda Berhasil Login';
       $('#exampleModal').modal('show');
      };
        function redirectToPage() {
        document.location = 'user/index.php';
        }
        </script>";
} elseif($cek === 'admin') {
  echo "<script>
        window.onload = function() {
       document.getElementById('pesanModal').textContent = 'Selamat Datang Admin $_SESSION[nama_admin] Anda Berhasil Login';
       $('#exampleModal').modal('show');
      };
        function redirectToPage() {
        document.location = 'admin/index.php';
        }
        </script>";
}

else {
  $error = true;
}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="style5.css" />
    <title>Goa Sunyaragi - Login</title>
  </head>
  <body>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi Login</h1>
                                        </div>
                                        <div class="modal-body">
                                        <div id="pesanModal"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="redirectToPage()">Ok</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
    <div class="background"></div>
    <div class="page1">
      <div class="logo">
        <h5>Goa Sunyaragi - Login</h5>
        <ul>
          <a href="index.php">Home</a>
          <a href="info_terbaru.php">Info Terbaru</a>
          <a href="register.php">Daftar</a>
          <a href="#">Login</a>
          <a href="user/">Pesan Tiket</a>
        </ul>
      </div>
    </div>
    <div class="page2">
      <div class="gambar">
        <img src="assets/logo1.jpg" alt="" />
      </div>
      <?php if( isset($error) ) : ?>
      <div class="alert alert-danger" role="alert" style="border-radius: 10px; text-align: center; font-weight: 600; font-size: 19px">Username/Password Salah</div>
      <?php endif; ?>
      <form action="" method="post">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="username" id="floatingInput" placeholder="username" required autocomplete="off" />
        <i class="fa-solid fa-user"></i>
        <label for="floatingInput">Username</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required autocomplete="off" />
        <i class="fa-solid fa-lock"></i>
        <label for="floatingPassword">Password</label>
      </div>
      <button type="submit" class="btn btn-primary"><h5>Login</h5></button>
      </form>
      <div class="register">
        Belum Punya Akun? Klik Dibawah Ini. <br />
        <a href="register.php">Buat Akun Baru</a>
      </div>
    </div>
    <div class="page3">
      <h6>Jl. Raya Pabuaran No. 7, Cirebon, Indonesia | info@goasunyaragi.com | +62 123 4567 890</h6>
      <h6>© 2023 Tiket Goa Sunyaragi. Semua Hak Dilindungi.</h6>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/29c51fef9f.js" crossorigin="anonymous"></script>
  </body>
</html>
