<?php
require_once "../function.php";
mysqli_query($db, "DELETE FROM tbl_user WHERE id_user = '$_GET[idu]'");
echo "<script>
alert('Data user Berhasil Di Banned')
document.location='index.php?page=data_user'
</script>";
?>