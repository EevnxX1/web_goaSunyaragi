<?php
$db = mysqli_connect("localhost", "root", "", "goa_sunyaragi");

function register($data) {
    global $db;
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = mysqli_query($db, "INSERT INTO tbl_user(nama, jenis_kelamin, no_telp, tgl_lahir, username, gmail, password) 
                        VALUES 
            ('$_POST[nama]', '$_POST[jenis_kelamin]', '$_POST[no_telp]', '$_POST[tgl_lahir]', '$_POST[username]', '$_POST[gmail]', '$_POST[password]')");
    echo "<script>
    window.onload = function() {
        document.getElementById('pesanModal').textContent = 'Akun Anda Telah Berhasil Di Daftar';
        $('#exampleModal').modal('show');
    };
    </script>";
    }
}

function login($data) {
    global $db;
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $query = mysqli_query($db, "SELECT * FROM tbl_user WHERE username = '$_POST[username]' AND password = '$_POST[password]'");
        $row = mysqli_num_rows($query);

        $query1 = mysqli_query($db, "SELECT * FROM tbl_admin WHERE username = '$_POST[username]' AND password = '$_POST[password]'");
        $row1 = mysqli_num_rows($query1);

        if($row > 0) {
            $user = mysqli_fetch_array($query);
            $_SESSION["id_user"] = $user["id_user"];
            $_SESSION["nama_user"] = $user["nama"];
            return 'user';
        } elseif($row1 > 0) {
            $admin = mysqli_fetch_array($query1);
            $_SESSION["id_admin"] = $admin["id_admin"];
            $_SESSION["nama_admin"] = $admin["nm_admin"];
            return 'admin';
        } else {
            return false;
        }
    }
}

function angka_acak($panjang) {
    $character = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $pin = substr(str_shuffle($character), 0, $panjang);
    return $pin;
}

function jmlh_tiket($jumlah) {
    $hasil = $jumlah * 15000;
    return $hasil;
}

function pesan($data) {
    global $db;
    $query = mysqli_query($db, "INSERT INTO tbl_tiket(id_user, jmlh_tiket, tgl_kunjungan, harga, opsi_bayar, pin, status) 
                        VALUES 
                        ('$_POST[id_user]', '$_POST[jmlh_tiket]', '$_POST[tgl_kunjungan]', '$_POST[harga]', '$_POST[opsi]', '$_POST[pin]', '$_POST[status]')");
    echo "<script>
    window.onload = function() {
        document.getElementById('pesanModal').textContent = 'Tiket Telah Berhasil Di Bayar';
        $('#exampleModal1').modal('show');
    };
    </script>";
}

function waktu_mundur($tanggal, $status, $id_user, $id_tiket) {
    global $db;
    $tanggal_pilihan = strtotime($tanggal);
    
    // Ambil Tanggal Saat Ini.
    $tanggal_sekarang = time();

    if($status === "Aktif") {
        $selisih_waktu = $tanggal_pilihan - $tanggal_sekarang;
        $hitungan_mundur = ceil($selisih_waktu / (60 * 60 * 24));

        if($hitungan_mundur < 0) {
            $query = mysqli_query($db, "UPDATE tbl_tiket SET status = 'Tidak Aktif' WHERE id_user = '$id_user' AND id_tiket = '$id_tiket'");
        }
    }

}
?>