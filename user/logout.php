<?php
session_start();
session_destroy();
session_unset();

echo "<script>
alert('Anda Berhasil Log out')
document.location='../index.php';
</script>";
?>