-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Mar 2024 pada 15.08
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goa_sunyaragi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nm_admin` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nm_admin`, `username`, `password`) VALUES
(1, 'Rayhan Pratama Putra', 'rayhan01', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` int(11) NOT NULL,
  `tgl_berita` date NOT NULL,
  `gambar` text NOT NULL,
  `judul` text NOT NULL,
  `isi1` text NOT NULL,
  `isi2` text NOT NULL,
  `isi3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `tgl_berita`, `gambar`, `judul`, `isi1`, `isi2`, `isi3`) VALUES
(1, '2023-07-07', 'berita1.jpeg', 'Taman Air Goa Sunyaragi Cirebon Disulap Jadi Rest Area', 'Cirebon - Taman Air Goa Sunyaragi merupakan salah satu tempat wisata sejarah yang ada di Kota Cirebon, Jawa Barat. Jika pemudik melintas di Jalan Brigjen Dharsono dari arah Jakarta, maka akan menemukan tempat wisata ini berada di sisi kiri jalan.\r\nPada musim mudik Lebaran 2022 ini, area parkir Taman Air Goa Sunyaragi difungsikan sebagai rest area. Pemudik bisa beristirahat di tempat ini jika merasa lelah di perjalanan. Selain tempat istirahat, di sini juga tersedia fasilitas toilet.\r\n\"Kami menyambut pemudik dengan membuka area parkir sebagai tempat beristirahat atau rest area mudik,\" kata Kabag Humas Badan Pengelola Taman Air Goa Sunyaragi (BPTAGS), Eko Ardi melalui keterangannya, Selasa (26/4/2022).', 'Menurut Eko, rest area mudik di Taman Air Goa Sunyaragi dibuka pada H-7 sampai H+7 Lebaran. Rest area akan dibuka setiap hari mulai pukul 09.00-17.00 WIB. Pihak pengelola bekerja sama dengan beberapa pihak, seperti UMKM maupun warga sekitar untuk membuka tempat berjualan makanan khas Cirebon. Mulai dari empal gentong, tahu gejrot, dan lain-lain.\r\nSehingga, selain bisa beristirahat, para pemudik juga bisa menikmati berbagai macam makanan khas Cirebon. Kemudian, pemudik juga bisa berwisata dan berfoto di objek wisata Goa Sunyaragi.\r\nJika pemudik ingin berwisata di Taman Air Goa Sunyaragi, harga tiket masuknya Rp 15 ribu untuk umum dan Rp 10 ribu bagi pelajar atau mahasiswa.\r\n\"Goa Sunyaragi juga tetap akan buka di hari pertama Lebaran untuk masyarakat dan pemudik yang rindu setelah dua tahun tidak bisa mudik,\" pungkasnya.\r\n', ''),
(2, '2023-07-10', 'berita2.jpg', 'Libur Lebaran 2022, Destinasi Wisata Gua Sunyaragi Cirebon Mulai Dipadati Pengunjung.', 'Cirebon - Sejumlah tempat wisata Cirebon mulai dikunjungi wisatawan pada libur Lebaran 2022. Bahkan, jumlah pengunjung tercatat meningkat.\r\nSeperti di salah satu objek wisata Taman Air Gua Sunyaragi Cirebon. Objek wisata ikonik Pantura Jawa Barat tersebut terlihat banyak didatangi pengunjung. \"Libur Lebaran hari pertama Senin pengunjung didominasi warga Ciayumajakuning. Hari Selasa ini justru pengunjung luar Cirebon mulai banyak,\" ujar salah seorang pengelola Taman Air Gua Sunyaragi Cirebon Jajat Sudrajat, Selasa (3/5/2022).\r\nDia menyebutkan, pada Senin (2/5/2022) jumlah pengunjung Gua Sunyaragi Cirebon mencapai 165 orang. Jumlah tersebut meningkat drastis pada Selasa pukul 13.30 mencapai 280 orang. \r\nTingginya kunjungan ke Gua Sunyaragi maupun objek wisata lain seakan menjawab kerinduan masyarakat untuk berwisata setelah dua tahun sebelumnya sulit untuk beraktivitas imbas pandemi Covid-19.\r\n\"Kami juga melihat Gua Sunyaragi masih menjadi tempat pilihan pengunjung untuk berwisata,\" katanya.', 'Jajat menyebutkan, jumlah pengunjung terlihat mengalami peningkatan dibandingkan dua tahun sebelumnya. Pada Tahun 2020-2021 jumlah pengunjung di bawah 100 orang. \r\nDari ramainya kunjungan tersebut, pengelola berharap pengunjung Gua Sunyaragi Cirebon mencapai 10-15 ribu orang. \r\n\"Tiket masuk masih normal tidak ada perubahan alias kenaikan. Untuk pelajar dan mahasiswa Rp10 ribu, umum Rp15 ribu per orang,\" kata Jajat.\r\nSementara itu, pengelola wisata Gua Sunyaragi tidak membatasi jumlah pengunjung. Namun, pengelola memperketat protokol kesehatan kepada pengunjung yang ingin berwisata di Gua Sunyaragi.', ''),
(3, '2023-07-11', 'berita3.jpg', 'Libur Idul Adha 2023, Lebih dari 1.000 Wisatawan Kunjungi Goa Sunyaragi Cirebon', 'Sebanyak 1.146 wisatawan tercatat mengunjungi Goa Sunyaragi di Kota Cirebon, Jawa Barat, pada periode libur Idul Adha 2023/1444 Hijriah beberapa waktu lalu.  \"Jumlah pengunjung itu kami catat dalam waktu tiga hari setelah Idul Adha tepatnya pada hari Jumat (30/6/2023) sampai Minggu (2/7/2023),\" ujar Kepala Bagian Humas Badan Pengelola Taman Air Goa Sunyaragi (BPTAGS), Eko Ardi Nugraha, dilansir dari Antara, Selasa (4/7/2023).', 'Adapun rincian jumlah kunjungan wisatawan ke Goa Sunyaragi yaitu pada Jumat (30/6/2023) ada 323 pengunjung, Sabtu (1/7/2023) ada 394 pengunjung, dan Minggu (2/7/2023) ada 429 pengunjung. Eko melanjutkan bahwa angka tersebut menunjukkan kenaikan dibanding pada hari-hari biasa. Sebagian besar pengunjung, tambahnya, berasal dari wilayah sekitar Cirebon. Akan tetapi, jumlah pengunjung dari daerah Bandung tercatat mengalami kenaikan dari lima hingga delapan persen. ', 'Menurutnya, peningkatan jumlah kunjungan wisatawan dari Bandung tersebut salah satunya disebabkan oleh keberadaan Tol Cisumdawu. Tol tersebut, kata dia, memangkas waktu perjalanan dari Bandung ke Kota Cirebon dengan kisaran durasi dari 1,5 jam hingga dua jam. \"Tol Cisumdawu bagus untuk kebangkitan pariwisata di Jawa Barat khususnya di Kota Cirebon, sebab Cirebon kini menjadi tujuan wisata alternatif selain Puncak Bogor dan Pantai Pangandaran,\" tutur Eko. Sebagai informasi, Goa Sunyaragi dikenal memiliki bangunan yang unik lantaran dindingnya ditempeli batu-batu karang, sebagaimana dilaporkan oleh Kompas.com, Selasa (23/6/2015). Harga tiket masuknya mulai Rp 10.000 untuk pelajar dan mulai Rp 15.000 untuk umum.'),
(7, '2023-05-01', '4402-berita4.jpg', 'Peninggalan Kerajaan Cirebon, Goa Sunyaragi Ramai Dipadati Wisatawan.', 'Badan Pengelola Taman Air Goa Sunyaragi (BPTAGS) Kota Cirebon, Jawa Barat, mendata jumlah pelancong mengalami peningkatan selama masa libur Lebaran 2023. \"Kunjungan wisatawan pada libur Lebaran tahun 2023 ini mengalami peningkatan bila dibandingkan periode yang sama tahun sebelumnya,\" kata Kepala Bagian Humas BPTAGS Kota Cirebon, Eko Ardi Nugraha mengutip antara. Menurutnya, selama tiga hari libur Lebaran 2023 jumlah pengunjung cukup banyak yaitu mencapai 1.778 orang atau meningkat 30 persen dibandingkan periode yang sama tahun 2022 yang berjumlah 1.360 pelancong. ', 'Ia menjelaskan, pada libur Lebaran 2023, jumlah pengunjung memang mengalami peningkatan bila dibandingkan hari biasa, di mana setiap hari lebih dari 500 orang berkunjung ke situs peninggalan masa Kerajaan Cirebon tersebut. Eko juga memprediksi kunjungan wisatawan di objek wisata Goa Sunyaragi akan terus terjadi hingga akhir pekan nanti, sebelum nantinya kembali seperti semula. Ia menambahkan BPTAGS pun telah mempersiapkan sejumlah fasilitas penunjang untuk mengantisipasi peningkatan kunjungan wisatawan ini.', '\"Kami sudah melakukan beberapa renovasi di antaranya pada tenda di loket pintu masuk dan pintu keluar, penambahan penerangan dan optimalisasi pemandu wisata,\" ujarnya. Adapun tiket masuk objek wisata Goa Sunyaragi pada libur Lebaran 2023 tidak mengalami kenaikan, yakni untuk umum Rp15.000, sedangkan pelajar mahasiswa Rp10.000. Adapun untuk tarif parkir sepeda motor Rp2.000 dan mobil Rp5.000, sedangkan bus wisata Rp25.000.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tiket`
--

CREATE TABLE `tbl_tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jmlh_tiket` varchar(5) NOT NULL,
  `tgl_kunjungan` date NOT NULL,
  `harga` double NOT NULL,
  `opsi_bayar` varchar(20) NOT NULL,
  `pin` varchar(8) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_tiket`
--

INSERT INTO `tbl_tiket` (`id_tiket`, `id_user`, `jmlh_tiket`, `tgl_kunjungan`, `harga`, `opsi_bayar`, `pin`, `status`) VALUES
(3, 6, '6', '2023-07-13', 90000, 'Gopay', 'REAJCIGV', 'Aktif'),
(4, 7, '2', '2023-07-13', 30000, 'Dana', 'A93W0IG4', 'Tidak Aktif'),
(5, 7, '17', '2023-07-20', 255000, 'Alfamart', 'LJWDRF06', 'Tidak Aktif'),
(8, 6, '5', '2023-07-20', 75000, 'Dana', 'TFIUCAH4', 'Aktif'),
(9, 8, '3', '2023-07-19', 45000, 'Ovo', 'WY1U96MK', 'Tidak Aktif'),
(10, 9, '4', '2023-07-30', 60000, 'ShopeePay', 'SQ286D1G', 'Aktif'),
(11, 10, '3', '2023-07-23', 45000, 'Indomart', '96FPCOA7', 'Tidak Aktif'),
(12, 7, '4', '2023-07-18', 60000, 'ShopeePay', '07XRNEB9', 'Tidak Aktif'),
(13, 7, '4', '2023-07-18', 60000, 'ShopeePay', 'SW0XHB3Y', 'Tidak Aktif'),
(14, 6, '2', '2023-07-25', 30000, 'Gopay', 'TEQOSRA3', 'Aktif'),
(15, 7, '2', '2023-07-22', 30000, 'Alfamart', 'VXHRNYI5', 'Tidak Aktif'),
(20, 10, '5', '2023-07-06', 75000, 'Dana', 'ZAID8LTB', 'Tidak Aktif'),
(21, 13, '4', '2023-07-26', 60000, 'Alfamart', 'GIWHPEK8', 'Tidak Aktif'),
(22, 8, '5', '2023-07-29', 75000, 'Alfamart', 'SDM0PKU3', 'Tidak Aktif'),
(23, 8, '2', '2023-07-07', 30000, 'Dana', 'PKBQV08R', 'Tidak Aktif'),
(24, 7, '2', '2023-07-22', 30000, 'Alfamart', 'OE073RSH', 'Tidak Aktif'),
(27, 7, '1', '2023-07-31', 15000, 'Ovo', 'QCL3YF2R', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `username` varchar(30) NOT NULL,
  `gmail` varchar(70) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `jenis_kelamin`, `no_telp`, `tgl_lahir`, `username`, `gmail`, `password`) VALUES
(7, 'Miftahul Huda', 'Laki-laki', '082345235', '2004-08-11', 'eevnxx', 'mifta@gmail.com', '12345'),
(8, 'gibran', 'Laki-laki', '086234233', '2023-07-12', 'gibran', 'gibran@gmail.com', '12345'),
(9, 'Chandra Martin', 'Laki-laki', '08234223423', '2009-03-18', 'martin1', 'chandra@gmail.com', '12345'),
(10, 'Farhan Pratama Putra', 'Laki-laki', '082324234', '2023-07-13', 'farhan12', 'farhan@gmail.com', '12345'),
(11, 'Novi Kustiyuani', 'Perempuan', '082318304220', '1974-11-20', 'noviyuan24', 'noviyuan24@gmail.com', '12345'),
(13, 'Mahar Dika', 'Laki-laki', '0845235225323', '2023-07-06', 'dika', 'dika@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `tbl_tiket`
--
ALTER TABLE `tbl_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_tiket`
--
ALTER TABLE `tbl_tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
