-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Mar 2025 pada 15.12
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(15) NOT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `gambar_sampul` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `kategori`, `penerbit`, `tahun`, `gambar_sampul`) VALUES
('BK0001', 'Arah Langkah', 'Novel', 'Mediakita', 2018, 'Gambar WhatsApp 2024-11-04 pukul 20.13.35_28f34502.jpg'),
('BK0002', 'Morfologi', 'Novel', 'Renika Cipta', 2018, 'Gambar WhatsApp 2024-11-04 pukul 20.13.35_6b240e7f.jpg'),
('BK0003', 'Rahasia Komunikasi Yang Efektif', 'Ilmiah', 'Mizan Publishing', 2015, 'Gambar WhatsApp 2024-11-04 pukul 20.13.37_33a7b8da.jpg'),
('BK0004', 'Konspirasi Alam Semesta', 'Novel', 'Mediakita', 2019, 'Gambar WhatsApp 2024-11-04 pukul 20.17.18_9920a13c.jpg'),
('BK0005', 'Panduan Karya Tulis Ilmiah Akhir', 'Ilmiah', 'Bentang Pustaka', 2019, 'Gambar WhatsApp 2024-11-04 pukul 20.17.18_395ffd1d.jpg'),
('BK0006', 'Etika Umum', 'Ilmiah', 'J. Sudarminta', 2020, 'Gambar WhatsApp 2024-11-04 pukul 20.17.19_4a9eca4a.jpg'),
('BK0007', 'Pintar Menulis Karya Ilmiah', 'Ilmiah', 'Airlangga', 2018, 'Gambar WhatsApp 2024-11-04 pukul 20.17.22_e2daa29d.jpg'),
('BK0008', 'Panduan Praktis Menulis Karya Ilmiah', 'Ilmiah', 'Checklist', 2019, 'Gambar WhatsApp 2024-11-04 pukul 20.17.22_19467ddd.jpg'),
('BK0009', 'Kalkulus', 'Matematika', 'Grandmedia', 2017, '11225221_3c9d1f71-c8e8-4b4a-8c83-93c4db3cc540_2048_2889.jpg'),
('BK0010', 'Belajar Bahasa PHP', 'Pemrogramman', 'Grandmedia', 2016, 'f3d7345a-3869-47f0-b606-70387929f863.jpg'),
('BK0011', '100 Cerita Rakyat', 'Fiksi', 'Mediakita', 2013, 'content.jpg'),
('BK0012', 'BIG BOOK FISIKA', 'Fisika', 'Cmedia', 2017, 'fisika.png'),
('BK0013', 'Metode Penelitian Hukum', 'Hukum', 'Prenada Media', 2022, 'hukum.jpeg'),
('BK0014', 'Teori Hukum', 'Hukum', 'Prenada Media', 2024, 'teori hukum.jpeg'),
('BK0015', 'Pengantar Ilmu Hukum', 'Hukum', 'Prenada Media', 2024, 'ilmu hukum.jpeg'),
('BK0016', 'Sosiologi Olahraga', 'Olahraga', 'Salam Insan Mulia', 2018, 'content.jpeg'),
('BK0017', 'Tes dan Pengukur dalam Olahraga', 'Olahraga', 'Penerbit Andi', 2019, 'tes olahraga.jpeg'),
('BK0018', 'Logika Informatika', 'Informatika', 'PT. Sonpedia Publishing Indonesia', 2022, 'logika informatika.jpeg'),
('BK0019', 'Dasar Logika Informatika', 'Informatika', 'Media Pressindo', 2015, 'content (1).jpeg'),
('BK0020', 'Java For Students', 'Pemrogramman', 'Prentice Hall', 2001, 'content (2).jpeg'),
('BK0021', 'PBO Dengan Bahasa Java', 'Pemrogramman', 'Exel Media Komputindo', 2007, 'content (3).jpeg'),
('BK0022', 'The Java Developer\'s Guide To Eclipse', 'Pemrogramman', 'Addisom-Wesley', 2005, 'content (4).jpeg'),
('BK0023', 'JavaScript: The Definitive Guide', 'Pemrogramman', 'O\'Reilly', 2002, 'content (5).jpeg'),
('BK0024', 'JavaScript: Dari A sampai Z', 'Pemrogramman', 'Sparta Publisher', 2018, 'content (6).jpeg'),
('BK0025', 'Learning Python', 'Pemrogramman', 'O\'Reilly Media', 2009, 'content.png'),
('BK0026', 'Python in a Nutshell', 'Pemrogramman', 'O\'Reilly Media', 2009, 'content (1).png'),
('BK0027', 'Matematika Diskrit', 'Matematika', 'Polinema', 2018, 'content (7).jpeg'),
('BK0028', 'Statistika', 'Matematika', 'Universitas Brawijaya Press', 2017, 'content (8).jpeg'),
('BK0029', 'Statistika Dasar', 'Matematika', 'Grasindo', 2016, 'content (9).jpeg'),
('BK0030', 'Dasar Dasar Metode Statistika', 'Matematika', 'Grasindo', 2017, 'content (10).jpeg'),
('BK0031', 'PSIKOLOGI', 'Psikologi', 'Erlangga', 2010, 'content (11).jpeg'),
('BK0032', 'Psikologi Pendidikan', 'Psikologi', 'Uwais Inspirasi Indonesia', 2017, 'content (2).png'),
('BK0033', 'Psikologi sastra', 'Psikologi', 'Pustaka Obor Indonesia', 2010, 'content (12).jpeg'),
('BK0034', 'Membaca Sastra', 'Bahasa', 'Indonesia Tera', 2002, 'content (13).jpeg'),
('BK0035', 'Pengantar Ilmu Sastra', 'Bahasa', 'USUpress', 2013, 'content (3).png'),
('BK0036', 'Penulisan Karya Ilmiah', 'Ilmiah', 'Prenada Media', 2020, 'content (14).jpeg'),
('BK0037', 'Interaksi Sosial', 'sosial', 'Alprin', 2020, 'content (15).jpeg'),
('BK0038', 'Pengelolaan lingkungan Sosial', 'sosial', 'Yayasan Obor Indonesia', 2002, 'content (16).jpeg'),
('BK0039', 'Ilmu Pengetahuan Sosial', 'Sosial', 'Grasindo', 2017, 'content (17).jpeg'),
('BK0040', 'Geografi: Jelajah Bumi dan Alam Semesta', 'Geografi', 'Grafindo Media Pratama', 2010, 'content (18).jpeg'),
('BK0041', 'Menyingkap Fenomena Geosfer', 'Geografi', 'Grafindo Media Pratama', 2013, 'content (19).jpeg'),
('BK0042', 'Aplikasi Rekayasa Konstruksi', 'Sipil', 'Ele Media Kompitudo', 2015, 'content (20).jpeg'),
('BK0043', 'Penghantar Engineering', 'Teknik', 'Erlangga', 2019, 'content (21).jpeg'),
('BK0044', 'Mekanika Rekayasa Ilmu Dasar Teknik Sipil', 'Sipil', 'Deepublish', 2019, 'content (22).jpeg'),
('BK0045', 'Kewirausahaan Teknik Sipil', 'Sipil', 'Polinema', 2018, 'content (23).jpeg'),
('BK0046', 'Konsep Dasar dan Aplikasi Mekanika', 'Mesin', 'Uwais Inspirasi Indonesia', 2011, 'content (4).png'),
('BK0047', 'Dasar Perancangan Teknik Mesin ', 'Mesin', 'Gramedia Widiasarana Indonesia', 2019, 'content (24).jpeg'),
('BK0048', 'Gambar Teknik Mesin', 'mesin', 'Gramedia Widiasarana Indonesia', 2020, 'content (25).jpeg'),
('BK0049', 'Statistik Kesehatan', 'Kesehatan', 'Penerbit Andi', 2021, 'content (26).jpeg'),
('BK0050', 'Manajemen Kesehatan', 'Kesehatan', 'SAH MEDIA', 2018, 'content (27).jpeg'),
('BK0051', ' SISTEM INFORMASI KESEHATAN', 'Kesehatan', 'Uwais Inspirasi Indonesia', 2011, 'content (5).png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp(),
  `fakultas` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `gambar_member` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama`, `alamat`, `no_hp`, `tanggal_daftar`, `fakultas`, `jurusan`, `gambar_member`) VALUES
(3330, 'Willi Komaling', 'Tomohon Timur', '0852453456', '2024-10-17 17:00:00', 'FIK', 'Pendidikan Olahraga', 'martinus2.jpg'),
(3331, 'Nando Tendean', 'Tomohon Selatan', '082218372', '2024-08-14 17:00:00', 'Teknik', 'Teknik Informatika', 'Nando_Rafael.jpg'),
(3332, 'Alfin', 'Tondano Timur', '082156523', '2024-11-04 17:00:00', 'FBS', 'Bahasa Indonesia', 'img20221017wa0007.jpg'),
(3333, 'Roger', 'Tondano Selatan', '085243843', '2024-10-31 17:00:00', 'FIK', 'Kesehatan Masyarakat', 'roger.jpg'),
(3334, 'Yosia Hutapea', 'Tomohon Kaskasen', '082287493', '2024-10-18 17:00:00', 'FISH', 'Ilmu Hukum', 'yos.jpg'),
(3341, 'martin', 'medan', '0832212346', '2024-11-05 06:06:30', 'Teknik', 'Teknik Sipil', 'martin.jpg'),
(3344, 'Andi', 'Tomohon Utaraa', '08342564567', '2024-11-07 00:59:57', 'FEB', 'Akutansi', '8929DSC00751Sizecopy.jpg'),
(3346, 'andika', 'Taataran 1', '0834256456', '2024-11-07 07:39:32', 'Teknik', 'Teknik Informatika', 'yos.jpg'),
(3359, 'amri', 'Tomohon Kaskasen', '0834256456', '2024-11-07 18:21:03', 'Teknik', 'Teknik Sipil', 'amri.jpg'),
(3360, 'Eben', 'Taatran II', '082345767', '2024-11-07 18:25:35', 'FISH', 'Pendidikan Geografi', 'eben.jpg'),
(3361, 'Martinus Sagala', 'Tondano Selatan', '0852453456', '2024-11-08 02:12:17', 'FEB', 'Akutansi', 'amri.jpg'),
(3362, 'Andiii', 'Tondano Selatan', '0852453456', '2024-11-08 02:17:31', 'FMIPA', 'Matematika', 'eben.jpg'),
(3363, 'Andiii', 'Tondano Selatan', '0852453456', '2024-11-08 02:31:19', 'FMIPA', 'Matematika', 'eben.jpg'),
(3364, 'Fahrizal', 'Tondano Timur', '082163623453', '2024-11-09 21:20:16', 'FISH', 'Ilmu Hukum', 'fahrzal.jpg'),
(3365, 'Amin Kumar', 'Tondano Selatan', '0821345674', '2024-11-11 16:00:54', 'Teknik', 'Teknik Informatika', 'images.jpeg'),
(3366, 'Yuven', 'Tomohon Utaraa', '082345632123', '2024-11-11 22:43:05', 'FEB', 'Akutansi', '42393387-9c5c-4be4-97b8-49260708719e.jpeg'),
(3367, 'Yuni', 'Tomohon Timur', '082134567852', '2024-11-11 22:44:14', 'FIK', 'Kesehatan Masyarakat', 'headline-tes-kepribadian-sederhana-kamu-orang-yang-seperti-apa-sih.jpg'),
(3368, 'Meilina', 'Taataran 1', '0823456721', '2024-11-11 22:45:18', 'FMIPA', 'Kimia', 'cara-menjadi-orang-sukses.jpg'),
(3369, 'Siti', 'Tondano Timur', '0823456743', '2024-11-11 22:46:59', 'FEB', 'Manajemen', 'images (1).jpeg'),
(3370, 'Aliyah', 'Tondano Selatan', '0823123456', '2024-11-11 22:47:49', 'FISH', 'Hukum', '01ja1tamqhdf1gm7qjb28j16bf.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `hak_akses` enum('admin','petugas') NOT NULL,
  `gambar_pegawai` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `username`, `password`, `hak_akses`, `gambar_pegawai`) VALUES
(75141, 'Zonatan Sihombing', 'zon', '0192023a7bbd73250516f069df18b500', 'admin', 'profil.jpg'),
(75150, 'Samuel', 'sam', '56fafa8964024efa410773781a5f9e93', 'petugas', 'Gambar WhatsApp 2024-11-04 pukul 20.03.56_5bdb2b64.jpg'),
(75151, 'Messi Yolemal', 'messi', '570c396b3fc856eceb8aa7357f32af1a', 'petugas', 'messi.jpg'),
(75152, 'Glendio', 'glen', '528a315ba71f2298b993c9f6a3653b2a', 'petugas', 'glendio.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(15) NOT NULL,
  `id_buku` varchar(15) DEFAULT NULL,
  `id_buku_2` varchar(15) DEFAULT NULL,
  `id_buku_3` varchar(15) DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `tanggal_pinjam` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('dipinjam','dikembalikan') DEFAULT 'dipinjam',
  `denda` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_buku`, `id_buku_2`, `id_buku_3`, `id_member`, `id_pegawai`, `tanggal_pinjam`, `status`, `denda`) VALUES
('PJ0004', 'BK0003', NULL, 'BK0001', 3330, 75141, '2024-11-06 10:04:35', 'dikembalikan', 330000.00),
('PJ0005', 'BK0002', 'BK0001', NULL, 3334, 75141, '2024-11-06 10:07:31', 'dipinjam', 510000.00),
('PJ0008', 'BK0002', 'BK0003', NULL, 3331, 75150, '2024-11-06 11:34:30', 'dikembalikan', 0.00),
('PJ0009', 'BK0001', 'BK0002', NULL, 3330, 75150, '2024-11-06 11:35:01', 'dikembalikan', 0.00),
('PJ0021', 'BK0001', NULL, NULL, 3330, 75150, '2024-11-06 12:15:10', 'dikembalikan', 0.00),
('PJ0022', 'BK0002', NULL, NULL, 3332, 75141, '2024-11-06 20:34:48', 'dipinjam', 250000.00),
('PJ0024', 'BK0002', 'BK0002', NULL, 3330, 75141, '2024-11-06 20:48:47', 'dipinjam', 500000.00),
('PJ0025', 'BK0003', 'BK0001', NULL, 3330, 75141, '2024-10-28 21:26:01', 'dipinjam', 590000.00),
('PJ0026', 'BK0003', 'BK0003', NULL, 3360, 75150, '2024-10-28 22:21:54', 'dipinjam', 590000.00),
('PJ0027', 'BK0002', 'BK0003', NULL, 3363, 75141, '2024-11-08 23:27:01', 'dikembalikan', 0.00),
('PJ0028', 'BK0025', 'BK0043', NULL, 3368, 75141, '2024-11-11 22:48:37', 'dipinjam', 450000.00),
('PJ0029', 'BK0016', 'BK0011', 'BK0017', 3366, 75141, '2024-11-11 22:48:54', 'dipinjam', 675000.00),
('PJ0030', 'BK0014', NULL, NULL, 3365, 75141, '2024-11-11 22:49:31', 'dipinjam', 225000.00),
('PJ0031', 'BK0013', NULL, NULL, 3366, 75141, '2024-11-11 22:50:03', 'dipinjam', 225000.00),
('PJ0032', 'BK0027', 'BK0009', NULL, 3333, 75141, '2024-11-11 22:50:34', 'dipinjam', 450000.00),
('PJ0033', 'BK0024', 'BK0034', NULL, 3363, 75141, '2024-11-11 22:51:03', 'dipinjam', 450000.00),
('PJ0034', 'BK0003', 'BK0001', NULL, 3370, 75141, '2024-11-11 22:51:44', 'dikembalikan', 0.00),
('PJ0035', 'BK0012', 'BK0013', 'BK0019', 3331, 75141, '2024-11-11 22:52:03', 'dipinjam', 675000.00),
('PJ0036', 'BK0021', NULL, NULL, 3334, 75141, '2024-11-11 22:52:21', 'dikembalikan', 0.00),
('PJ0037', 'BK0003', 'BK0031', 'BK0021', 3364, 75141, '2024-11-11 22:52:42', 'dipinjam', 675000.00),
('PJ0038', 'BK0004', 'BK0002', NULL, 3330, 75141, '2024-11-11 22:54:01', 'dipinjam', 450000.00),
('PJ0039', 'BK0001', 'BK0009', NULL, 3334, 75141, '2024-12-16 09:44:03', 'dipinjam', 110000.00),
('PJ0040', 'BK0002', 'BK0003', NULL, 3331, 75141, '2025-01-03 12:57:40', 'dipinjam', 0.00);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `fk_buku_2` (`id_buku_2`),
  ADD KEY `fk_buku_3` (`id_buku_3`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3371;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75153;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_buku_2` FOREIGN KEY (`id_buku_2`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `fk_buku_3` FOREIGN KEY (`id_buku_3`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`),
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
