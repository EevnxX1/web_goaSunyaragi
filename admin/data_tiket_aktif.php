
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Tiket Aktif</h1>
                    <p class="mb-4">Anda Dapat Melihat Data Tiket Yang Masih Aktif</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Table Tiket Aktif</h6><br>
                            <form action="" method="post">
                            <input type="text" name="pin" id="input" style="height: 34px; border-radius: 5px; border: solid 2px gainsboro; margin-bottom: 15px" autocomplete="off" placeholder="Masukkan Pin Tiket">
                            <script>
                                var inputElement = document.getElementById('input');
                                inputElement.addEventListener('input', function() {
                                this.value = this.value.toUpperCase();
                                });
                            </script>
                            <button type="submit" name="submit" class="btn btn-success">Cek Pin</button>
                            </form>
                            <form action="" method="post">
                                <input type="text" name="keyword" id="keyword" style="height: 38px; border-radius: 5px; border: solid 2px gainsboro; margin-bottom: 15px" autocomplete="off" placeholder="Cari Data">
                                <input type="hidden" name="aktif" value="Aktif">
                                <button type="submit" name="cari" class="btn btn-primary"><i class="fas fa-magnifying-glass"></i> Cari</button>
                            </form>
                            <a href="report_tiket.php?tiket=Aktif" target="_blank" class="btn btn-warning"><i class="fas fa-file"></i> Report Data</a>
                        </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Info PIN</h1>
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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Pemesan</th>
                                            <th>Jumlah Tiket</th>
                                            <th>Tanggal Berkunjung</th>
                                            <th>Harga Total</th>
                                            <th>Opsi Pembayaran</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Pemesan</th>
                                            <th>Jumlah Tiket</th>
                                            <th>Tanggal Berkunjung</th>
                                            <th>Harga Total</th>
                                            <th>Opsi Pembayaran</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        require_once "../function.php";
                                        $no = 1;
                                        if (isset($_POST["cari"])) {
                                            $keyword = $_POST["keyword"];
                                            $aktif = $_POST["aktif"];
                                            $query = mysqli_query($db, "SELECT * FROM tbl_tiket INNER JOIN tbl_user ON tbl_tiket.id_user = tbl_user.id_user WHERE tbl_tiket.status = '$aktif' AND tbl_user.nama LIKE '%$keyword%' OR tbl_tiket.jmlh_tiket LIKE '%$keyword%' OR tbl_tiket.opsi_bayar LIKE '%$keyword%'");
                                        } else {
                                            $query = mysqli_query($db, "SELECT * FROM tbl_tiket INNER JOIN tbl_user ON tbl_tiket.id_user = tbl_user.id_user WHERE tbl_tiket.status = 'Aktif'");
                                        }
                                        while($ttiket = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td><?= "$no" ?></td>
                                            <td><?= "$ttiket[nama]" ?></td>
                                            <td><?= "$ttiket[jmlh_tiket]" ?></td>
                                            <td><?= "$ttiket[tgl_kunjungan]" ?></td>
                                            <td>Rp.<?= number_format("$ttiket[harga]",0,",",".") ?></td>
                                            <td><?= "$ttiket[opsi_bayar]" ?></td>
                                            <td>
                                                <a href="index.php?page=data_tiket_hapus1&idt=<?= "$ttiket[id_tiket]" ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <?php
                if (isset($_POST["submit"])) {
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    $sql = mysqli_query($db, "SELECT * FROM tbl_tiket 
                                            INNER JOIN tbl_user ON tbl_tiket.id_user = tbl_user.id_user 
                                            WHERE tbl_tiket.pin = '$_POST[pin]' AND tbl_tiket.status = 'Aktif'");
                    $cek = mysqli_num_rows($sql);

                    if($cek > 0) {
                        $user = mysqli_fetch_array($sql);
                        $ubah = mysqli_query($db, "UPDATE tbl_tiket SET
                                                    status = 'Tidak Aktif' WHERE
                                                    pin = '$_POST[pin]'");
                        echo "<script>
                        window.onload = function() {
                            document.getElementById('pesanModal').textContent = 'Tiket Dengan PIN ($_POST[pin]) Dan Dengan Nama ($user[nama]) Berhasil Di Temukan';
                            $('#exampleModal1').modal('show');
                        };
                        function redirectToPage() {
                            document.location = 'index.php?page=data_tiket_aktif';
                        }
                        </script>";
                    } else {
                        echo "<script>
                        window.onload = function() {
                            document.getElementById('pesanModal').textContent = 'Tiket Dengan PIN ($_POST[pin]) Tidak Ditemukan Atau Tidak Aktif';
                            $('#exampleModal1').modal('show');
                        };
                        function redirectToPage() {
                            document.location = 'index.php?page=data_tiket_aktif';
                        }
                        </script>";
                    }
                }
            }
                ?>