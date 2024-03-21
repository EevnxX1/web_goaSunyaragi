
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Berita</h1>
                    <p class="mb-4">Anda dapat mengisi kolom dengan ringkasan dari berita yang ingin Anda masukkan.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Table berita</h6><br>
                            <form action="" method="post">
                                <input type="text" name="keyword" id="keyword" style="height: 38px; border-radius: 5px; border: solid 2px gainsboro; margin-bottom: 15px" autocomplete="off" placeholder="Cari Data">
                                <input type="hidden" name="aktif" value="Aktif">
                                <button type="submit" name="cari" class="btn btn-primary"><i class="fas fa-magnifying-glass"></i> Cari</button>
                            </form>
                            <a href="index.php?page=data_berita_add" class="btn btn-success">Tambah data Berita</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Gambar</th>
                                            <th>Judul</th>
                                            <th>Paragraf 1</th>
                                            <th>Paragraf 2</th>
                                            <th>Paragraf 3</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Gambar</th>
                                            <th>Judul</th>
                                            <th>Paragraf 1</th>
                                            <th>Paragraf 2</th>
                                            <th>Paragraf 3</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        require_once "../function.php";
                                        $no = 1;
                                        if(isset($_POST['cari'])) {
                                            $sqlberita = mysqli_query($db, "SELECT * FROM tbl_berita WHERE judul LIKE '%$_POST[keyword]%' OR isi1 LIKE '%$_POST[keyword]%' OR isi2 LIKE '%$_POST[keyword]%' OR isi3 LIKE '%$_POST[keyword]%' GROUP BY id_berita DESC");
                                        } else {
                                            $sqlberita = mysqli_query($db, "SELECT * FROM tbl_berita GROUP BY id_berita DESC");
                                        }
                                        while($tberita = mysqli_fetch_array($sqlberita)) {
                                        $panjang_teks = 10;
                                        $judul = substr($tberita['judul'], 0, $panjang_teks) . "...";
                                        $teks1 = substr($tberita['isi1'], 0, $panjang_teks) . "...";
                                        $teks2 = substr($tberita['isi2'], 0, $panjang_teks) . "...";
                                        $teks3 = substr($tberita['isi3'], 0, $panjang_teks) . "...";
                                        ?>
                                        <tr>
                                            <td><?= "$no" ?></td>
                                            <td><?= "$tberita[tgl_berita]" ?></td>
                                            <td><a href="../assets/<?= "$tberita[gambar]" ?>" target="_blank">Lihat Gambar</a></td>
                                            <td><?= "$judul" ?></td>
                                            <td><?= "$teks1" ?></td>
                                            <td><?= "$teks2" ?></td>
                                            <td><?= "$teks3" ?></td>
                                            <td>
                                                <a href="teks_info.php?idb=<?= "$tberita[id_berita]" ?>" class="btn btn-warning">View</a>
                                                <a href="index.php?page=data_berita_edit&idb=<?= "$tberita[id_berita]" ?>" class="btn btn-primary">Edit</a>
                                                <a href="index.php?page=data_berita_hapus&idb=<?= "$tberita[id_berita]" ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Berita Ini?')">Delete</a>
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