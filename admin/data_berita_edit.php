<?php
require_once "../function.php";
$sql = mysqli_query($db, "SELECT* FROM tbl_berita WHERE id_berita = '$_GET[idb]'");
$data = mysqli_fetch_array($sql);
?>
<div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary" align="center">Ubah Berita</h6>
                </div>
                <div class="card-body">
				
                    <form class="user" method="POST" enctype="multipart/form-data">
          
                    <div class="form-group">
                          <Label>Tanggal :</Label>
                          <input type="date" class="form-control" name="tgl_berita" value="<?= "$data[tgl_berita]" ?>">
                    </div>


                    <div class="form-group">
                          <Label>Gambar (<a href="../assets/<?= "$data[gambar]" ?>" target="_blank">Lihat Gambar</a>) :</Label>
                          <input type="file" class="form-control" name="gambar" style="padding: 10px; height: 50px">
                    </div>

                    <div class="form-group">
                          <Label>Judul :</Label>
                          <input type="text" class="form-control" name="judul" value="<?= "$data[judul]" ?>">
                      </div>

                     <div class="form-group">
                          <Label>Paragraf 1 :</Label>
                          <textarea name="teks1" id="" cols="30" rows="5" class="form-control" style="font-size: 18px"><?= "$data[isi1]" ?></textarea>
                      </div>

                     <div class="form-group">
                          <Label>Paragraf 2 :</Label>
                          <textarea name="teks2" id="" cols="30" rows="5" class="form-control" style="font-size: 18px"><?= "$data[isi2]" ?></textarea>
                      </div>

                     <div class="form-group">
                          <Label>Paragraf 3 :</Label>
                          <textarea name="teks3" id="" cols="30" rows="5" class="form-control" style="font-size: 18px"><?= "$data[isi3]" ?></textarea>
                      </div>

                    <div class="form-group">
                          <input type="submit" class="btn btn-primary" name="submit" value="Ubah Data">
                    </div>
                  </form>
                  <div>
              </div>
            </div>
          </div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ekstensi_ok = array('jpg', 'png', 'jpeg', 'gif');
    $gambar = $_FILES['gambar']['name'];
    $x = explode(".", $gambar);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name'];

    $angka_acak = rand(1, 9999);
    $nm_foto = $angka_acak. "-" .$gambar;
    $folder = "../assets/$nm_foto";

    if(!$file_tmp == "") {

    if (in_array($ekstensi, $ekstensi_ok)) {
      if($ukuran <= 5000000) {
        move_uploaded_file($file_tmp, $folder);
        $berita_sql = mysqli_query($db, "SELECT * FROM tbl_berita WHERE id_berita = '$_GET[idb]'");
        $hapus = mysqli_fetch_array($berita_sql);
        unlink("../assets/". $hapus['gambar']);
        $query = mysqli_query($db, "UPDATE tbl_berita SET
                                    tgl_berita = '$_POST[tgl_berita]',
                                    gambar = '$nm_foto',
                                    judul = '$_POST[judul]',
                                    isi1 = '$_POST[teks1]',
                                    isi2 = '$_POST[teks2]',
                                    isi3 = '$_POST[teks3]' WHERE
                                    id_berita = '$_GET[idb]';
                                    ");
                              echo "<script>
                              alert('Berita Berhasil Di Ubah!');
                              document.location='index.php?page=data_berita'
                              </script>";
      } else {
        echo "<script>
        alert('File Yang Anda Upload Melebihi Kapasistas Umum!');
        document.location='index.php?page=data_berita_edit&idb=$_GET[idb]'
        </script>";
      }
    } else {
      echo "<script>
        alert('File Yang Anda Upload Bukan Gambar!');
        document.location='index.php?page=data_berita_edit&idb=$_GET[idb]'
        </script>";
    }

  } else {
    $query = mysqli_query($db, "UPDATE tbl_berita SET
                                    tgl_berita = '$_POST[tgl_berita]',
                                    judul = '$_POST[judul]',
                                    isi1 = '$_POST[teks1]',
                                    isi2 = '$_POST[teks2]',
                                    isi3 = '$_POST[teks3]' WHERE
                                    id_berita = '$_GET[idb]';
                                    ");
                              echo "<script>
                              alert('Berita Berhasil Di Ubah!');
                              document.location='index.php?page=data_berita'
                              </script>";
  }
}
?>