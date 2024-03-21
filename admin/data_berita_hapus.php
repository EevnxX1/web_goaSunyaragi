<?php
require_once "../function.php";
$query = mysqli_query($db, "SELECT * FROM tbl_berita WHERE id_berita = '$_GET[idb]'");
$hapus = mysqli_fetch_array($query);
unlink("../assets/". $hapus['gambar']);

mysqli_query($db, "DELETE FROM tbl_berita WHERE id_berita = '$_GET[idb]'");
echo "<script>
alert('Data Berita Berhasil Di Hapus')
document.location='index.php?page=data_berita'
</script>";
?>