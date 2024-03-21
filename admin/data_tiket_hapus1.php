<?php
require_once "../function.php";
mysqli_query($db, "DELETE FROM tbl_tiket WHERE id_tiket = '$_GET[idt]'");
echo "<script>
alert('Data tiket Berhasil Di Hapus')
document.location='index.php?page=data_tiket_aktif'
</script>";
?>