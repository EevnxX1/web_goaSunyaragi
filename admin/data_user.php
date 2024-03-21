
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data User</h1>
                    <p class="mb-4">Anda Dapat Melihat User Yang Sudah Mendaftar.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="display: flex; justify-content: space-between;">
                            <form method="post" action="">
                                <div class="row d-flex">
                                    <div class="col-md-8">
                                        <input type="text" name="key" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" name="cari" class="btn btn-warning" style="width: 90px; margin-left: -12px"><i class="fas fa-magnifying-glass"></i> Cari</button>
                                    </div>
                                </div>
                            </form>
                            <a href="report_user.php" class="btn btn-primary" target="_blank"><i class="fas fa-file"></i> Report Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>No. Telepon</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Gmail</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>No. Telepon</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Gmail</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                            <?php
                                            include_once "../function.php";
                                            if(isset($_POST['cari'])) {
                                                $kunci = $_POST['key'];
                                                $sqluser = mysqli_query($db, "SELECT * FROM tbl_user WHERE 
                                                            nama LIKE '%$kunci%' OR 
                                                            jenis_kelamin LIKE '%$kunci%' OR 
                                                            jenis_kelamin LIKE '%$kunci%' OR
                                                            no_telp LIKE '%$kunci%' OR
                                                            gmail LIKE '%$kunci%'");
                                            } else {
                                                $sqluser = mysqli_query($db, "SELECT * FROM tbl_user");
                                            }
                                            $no = 1;
                                            while($tuser = mysqli_fetch_array($sqluser)) {
                                            ?>
                                        <tr>
                                            <td><?= "$no" ?></td>
                                            <td><?= "$tuser[nama]" ?></td>
                                            <td><?= "$tuser[jenis_kelamin]" ?></td>
                                            <td><?= "$tuser[no_telp]" ?></td>
                                            <td><?= "$tuser[tgl_lahir]" ?></td>
                                            <td><?= "$tuser[gmail]" ?></td>
                                            <td>
                                                <button  type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal1">Banned</button>
                                                <script>
                                                   function redirectToPage() {
                                                    document.location = 'index.php?page=data_user_hapus&idu=<?= "$tuser[id_user]" ?>';
                                                   }
                                                </script>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin Ingin Ngebanned Akun Ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <a onclick="redirectToPage()" class="btn btn-primary">Iya</a>
      </div>
    </div>
  </div>
</div>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->