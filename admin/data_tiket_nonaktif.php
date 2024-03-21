
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Tiket Tidak Aktif</h1>
                    <p class="mb-4">Anda Dapat Melihat Data Tiket Yang Sudah Tidak Aktif Atau Expire</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary mb-3">Data Table Tiket Tidak Aktif</h6>
                            </form>
                            <form action="" method="post">
                                <input type="text" name="keyword" id="keyword" style="height: 38px; border-radius: 5px; border: solid 2px gainsboro; margin-bottom: 15px" autocomplete="off" placeholder="Cari Data">
                                <input type="hidden" name="tdk_aktif" value="Tidak Aktif">
                                <button type="submit" name="cari" class="btn btn-primary"><i class="fas fa-magnifying-glass"></i> Cari</button>
                            </form>
                            <a href="report_tiket.php?tiket=Tidak Aktif" target="_blank" class="btn btn-warning"><i class="fas fa-file"></i> Report Data</a>
                        </div>
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
                                        if (isset($_POST['cari'])) {
                                            $keyword = $_POST['keyword'];
                                            $tdk_aktif = $_POST['tdk_aktif'];
                                            $query = mysqli_query($db, "SELECT * FROM tbl_tiket INNER JOIN tbl_user ON tbl_tiket.id_user = tbl_user.id_user WHERE tbl_tiket.status = '$tdk_aktif' AND tbl_user.nama LIKE '%$keyword%' OR tbl_tiket.jmlh_tiket LIKE '%$keyword%' OR tbl_tiket.opsi_bayar LIKE '%$keyword%'");
                                        } else {
                                            $query = mysqli_query($db, "SELECT * FROM tbl_tiket INNER JOIN tbl_user ON tbl_tiket.id_user = tbl_user.id_user WHERE tbl_tiket.status = 'Tidak Aktif'");
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
                                                <a href="index.php?page=data_tiket_hapus2&idt=<?= "$ttiket[id_tiket]" ?>" class="btn btn-danger">Delete</a>
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