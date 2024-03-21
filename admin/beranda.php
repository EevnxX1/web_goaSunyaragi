         <!-- Begin Page Content -->
         <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
              <a href="report_pendapatan.php" class="btn btn-primary" target="_blank"><i class="fas fa-file"></i> Report Pendapatan</a>
            </div>

            <!-- Content Row -->
            <div class="row">
              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pendapatan</div>
                        <?php
                        require_once "../function.php";
                        $sql1 = mysqli_query($db, "SELECT SUM(harga) AS total_harga FROM tbl_tiket");
                        $pendapatan = mysqli_fetch_array($sql1);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?= number_format("$pendapatan[total_harga]",0,",",".") ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total User</div>
                        <?php
                        $sql2 = mysqli_query($db, "SELECT  COUNT(DISTINCT id_user) AS jumlah_user FROM tbl_user");
                        $user = mysqli_fetch_array($sql2);
                        ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= "$user[jumlah_user]" ?> User</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas  fa-clipboard-list fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Berita</div>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                          <?php
                          $sql3 = mysqli_query($db, "SELECT  COUNT(DISTINCT id_berita) AS jumlah_berita FROM tbl_berita");
                          $berita = mysqli_fetch_array($sql3);
                          ?>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= "$berita[jumlah_berita]" ?> Berita</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Pending Requests Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Tiket Terjual</div>
                          <?php
                          $sql4 = mysqli_query($db, "SELECT SUM(jmlh_tiket) AS jumlah_tiket FROM tbl_tiket");
                          $tiket = mysqli_fetch_array($sql4);
                          ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= "$tiket[jumlah_tiket]" ?> Tiket</div>
                      </div>
                      <div class="col-auto">
                      <i class="fa-solid fa-ticket" style="font-size: 40px; color: gainsboro"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Content Row -->

            <div class="d-sm-flex align-items-center justify-content-between mb-2 mt-4">
              <h1 class="h3 mb-0 text-gray-800">Jumlah Opsi Metode Pembayaran Yang Dipilih User</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
              <?php
              $query = mysqli_query($db, "SELECT opsi_bayar, COUNT(*) AS jumlah FROM tbl_tiket GROUP BY opsi_bayar");
              while($opsi = mysqli_fetch_array($query)) {
              ?>
              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-2 col-md-2 mb-2">
                <div class="card border-left-dark shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= "$opsi[opsi_bayar]" ?></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= "$opsi[jumlah]" ?></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>

            <!-- Content Row -->

            <!-- Content Row -->
            <div class="row mt-3">
              <div class="col-lg-12 mb-4">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                  </div>
                  <div class="card-body">
                    <div class="text-center">
                      <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem" src="img/undraw_posting_photo.svg" alt="..." />
                    </div>
                    <p>
                    Anda memiliki akses penuh untuk mengelola dan mengatur website kami. Tugas Anda sebagai admin adalah memastikan bahwa website tetap berjalan dengan lancar, konten terkini, dan pengguna mendapatkan pengalaman terbaik.
                    </p>
                  </div>
                </div>

                <!-- Approach -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Development Admin</h6>
                  </div>
                  <div class="card-body">
                    <p>Kami percaya bahwa Anda akan menjalankan tugas sebagai admin dengan integritas dan kecermatan. Jika Anda membutuhkan bantuan atau memiliki pertanyaan, jangan ragu untuk menghubungi tim dukungan kami.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
