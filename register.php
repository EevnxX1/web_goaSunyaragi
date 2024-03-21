<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="style4.css" />
    <title>Goa Sunyaragi - Registerasi</title>
  </head>
  <body>
    <div class="background"></div>
    <div class="page1">
      <div class="logo">
        <img src="assets/logo1.jpg" />
        <ul>
          <a href="index.php">Home</a>
          <a href="info_terbaru.php">Info Terbaru</a>
          <a href="#">Daftar</a>
          <a href="login.php">Login</a>
          <a href="user/">Pesan Tiket</a>
        </ul>
      </div>
    </div>
     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi Registerasi</h1>
                                        </div>
                                        <div class="modal-body">
                                        <div id="pesanModal"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-secondary" href="login.php">Ok</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
    <div class="page2">
      <h2>Registerasi Akun</h2>
      <form action="" method="post">
        <div class="form">
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" name="nama" placeholder="text" required autocomplete="off" />
            <label for="floatingInput">Nama Lengkap</label>
          </div>
        </div>
        <div class="form">
          <div class="input1">
            <label class="form-label">Jenis Kelamin</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault1" value="Laki-laki"/>
              <label class="form-check-label" for="flexRadioDefault1" > Laki-Laki </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault2" value="Perempuan"/>
              <label class="form-check-label" for="flexRadioDefault2"> Perempuan </label>
            </div>
          </div>
          <div class="input2">
            <div class="form-floating">
              <input type="number" class="form-control" id="floatingInput" name="no_telp" placeholder="number" required autocomplete="off" />
              <label for="floatingInput">Nomer Telepon</label>
            </div>
          </div>
        </div>
        <div class="form">
          <div class="input1">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" required />
          </div>
          <div class="input2">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingInput" name="username" placeholder="text" required autocomplete="off" />
              <label for="floatingInput">Username</label>
            </div>
          </div>
        </div>
        <div class="form">
          <div class="input">
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingInput" name="gmail" placeholder="name@example.com" required autocomplete="off" />
              <label for="floatingInput">Gmail</label>
            </div>
          </div>
        </div>
        <div class="form">
          <div class="input">
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="password" name="password" placeholder="password" required autocomplete="off" />
              <label for="password">Password</label>
            </div>
          </div>
          <div class="checkbox">
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="togglePassword" />
              <label class="form-check-label" for="togglePassword">Lihat/Sembunyikan Password</label>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Daftar Akun</button>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        var passwordInput = document.getElementById('password');
        var togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('change', function () {
          if (this.checked) {
            passwordInput.type = 'text';
          } else {
            passwordInput.type = 'password';
          }
        });
      });
    </script>
  </body>
</html>

<?php
require_once "function.php";
register($_POST);
?>
