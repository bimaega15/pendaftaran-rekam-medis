-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Agu 2022 pada 02.54
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran_rm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_jenispembayaran`
--

CREATE TABLE `master_jenispembayaran` (
  `id` int(11) NOT NULL,
  `nama_jenisPembayaran` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_jenispembayaran`
--

INSERT INTO `master_jenispembayaran` (`id`, `nama_jenisPembayaran`) VALUES
(1, 'Umum'),
(2, 'BPJS Kesehatan'),
(4, 'Mandiri Inhealth'),
(6, 'BNI Life');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_jenisregistrasi`
--

CREATE TABLE `master_jenisregistrasi` (
  `id` int(11) NOT NULL,
  `nama_jenisRegistrasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_jenisregistrasi`
--

INSERT INTO `master_jenisregistrasi` (`id`, `nama_jenisRegistrasi`) VALUES
(1, 'Rawat Jalan'),
(2, 'UGD'),
(3, 'Rawat Inap'),
(5, 'Jenis registrasi 4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_layanan`
--

CREATE TABLE `master_layanan` (
  `id` int(11) NOT NULL,
  `nama_layanan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_layanan`
--

INSERT INTO `master_layanan` (`id`, `nama_layanan`) VALUES
(4, 'Poliklinik Umum'),
(5, 'Poliklinik Gigi'),
(6, 'Poliklinik Obgyn'),
(7, 'UGD'),
(13, 'Kelas 1'),
(14, 'Poliklinik Mata'),
(15, 'Kelas 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_pasien`
--

CREATE TABLE `master_pasien` (
  `id` int(11) NOT NULL,
  `nama_pasien` varchar(200) NOT NULL,
  `jenis_kelamin_pasien` enum('P','L') NOT NULL,
  `tempat_lahir_pasien` varchar(200) NOT NULL,
  `tanggal_lahir_pasien` date NOT NULL,
  `gambar_pasien` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_pasien`
--

INSERT INTO `master_pasien` (`id`, `nama_pasien`, `jenis_kelamin_pasien`, `tempat_lahir_pasien`, `tanggal_lahir_pasien`, `gambar_pasien`) VALUES
(2, 'Tina Martha', 'P', 'Pekanbaru', '1990-02-03', NULL),
(3, 'Radinal Dwiki Novendra', 'L', 'Pekanbaru', '1995-09-10', NULL),
(4, 'Desy Arjuna', 'P', 'Pekanbaru', '1993-12-16', NULL),
(5, 'Nanang Sunardi', 'L', 'Pekanbaru', '1989-02-04', NULL),
(6, 'Suzana', 'P', 'Pekanbaru', '1991-01-02', NULL),
(7, 'Alfy Syahri', 'L', 'Pekanbaru', '1995-01-01', NULL),
(8, 'Riko', 'L', 'Pekanbaru', '1989-02-09', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_statusregistrasi`
--

CREATE TABLE `master_statusregistrasi` (
  `id` int(11) NOT NULL,
  `nama_statusRegistrasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_statusregistrasi`
--

INSERT INTO `master_statusregistrasi` (`id`, `nama_statusRegistrasi`) VALUES
(1, 'Aktif'),
(2, 'Tutup Kunjungan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_users`
--

CREATE TABLE `master_users` (
  `id` int(11) NOT NULL,
  `username_users` varchar(250) NOT NULL,
  `password_users` varchar(250) NOT NULL,
  `nama_users` varchar(200) NOT NULL,
  `jenis_kelamin_users` enum('P','L') NOT NULL,
  `tempat_lahir_users` varchar(200) NOT NULL,
  `tanggal_lahir_users` date NOT NULL,
  `alamat_users` text NOT NULL,
  `gambar_users` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_users`
--

INSERT INTO `master_users` (`id`, `username_users`, `password_users`, `nama_users`, `jenis_kelamin_users`, `tempat_lahir_users`, `tanggal_lahir_users`, `alamat_users`, `gambar_users`) VALUES
(2, 'safitrijayanti', 'dc3ea75684c4cda5181da6e3ae932673', 'Safitri Jayanti', 'P', 'Pekanbaru', '1999-01-26', 'Pekanbaru', NULL),
(3, 'ahmadsandi', '0d434605ef9c56ffc55d38813af6b08a', 'Ahmad Sandi', 'L', 'Pekanbaru', '1999-01-15', 'Pekanbaru', NULL),
(5, 'ciciutami', '8cf4648fe45e15429a7e00bc9a164ea9', 'Cici Utami', 'P', 'Pekanbaru', '1999-01-01', 'Pekanbaru', NULL),
(6, 'putriaisha', '7051d5150e6f79f7f785490c4949621f', 'Putri Aisha', 'P', 'Pekanbaru', '1999-01-01', 'Pekanbaru', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1661139845),
('m220822_033842_create_pasien_table', 1661139846),
('m220822_033900_create_layanan_table', 1661139846),
('m220822_033913_create_jenisRegistrasi_table', 1661139846),
('m220822_033926_create_jenisPembayaran_table', 1661139846),
('m220822_033940_create_statusRegistrasi_table', 1661139846),
('m220822_033950_create_users_table', 1661139846),
('m220822_034001_create_rekamMedis_table', 1661139847),
('m220822_034008_create_rekamMedisDetail_table', 1661139847);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_rekammedis`
--

CREATE TABLE `trx_rekammedis` (
  `id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `no_rekamMedis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `trx_rekammedis`
--

INSERT INTO `trx_rekammedis` (`id`, `pasien_id`, `no_rekamMedis`) VALUES
(1, 2, '00-00-00-01'),
(2, 3, '00-00-00-02'),
(3, 4, '00-00-00-03'),
(8, 7, '00-00-00-04'),
(9, 5, '00-00-00-05'),
(10, 6, '00-00-00-06'),
(11, 6, '00-00-00-07'),
(12, 8, '00-00-00-08'),
(13, 3, '00-00-00-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_rekammedisdetail`
--

CREATE TABLE `trx_rekammedisdetail` (
  `id` int(11) NOT NULL,
  `trx_rekamMedis_id` int(11) NOT NULL,
  `waktu_registrasi_detail` datetime DEFAULT NULL,
  `no_registrasi_detail` varchar(50) NOT NULL,
  `master_jenisRegistrasi_id` int(11) NOT NULL,
  `master_layanan_id` int(11) NOT NULL,
  `master_jenisPembayaran_id` int(11) NOT NULL,
  `master_statusRegistrasi_id` int(11) NOT NULL,
  `waktu_mulai_detail` datetime NOT NULL,
  `waktu_selesai_detail` datetime DEFAULT NULL,
  `master_users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `trx_rekammedisdetail`
--

INSERT INTO `trx_rekammedisdetail` (`id`, `trx_rekamMedis_id`, `waktu_registrasi_detail`, `no_registrasi_detail`, `master_jenisRegistrasi_id`, `master_layanan_id`, `master_jenisPembayaran_id`, `master_statusRegistrasi_id`, `waktu_mulai_detail`, `waktu_selesai_detail`, `master_users_id`) VALUES
(1, 1, '2020-06-01 12:54:00', '2001060001', 1, 4, 1, 2, '2020-06-01 12:54:00', '2020-06-01 15:54:00', 2),
(2, 2, '2020-06-01 13:00:00', '2001060002', 1, 5, 1, 1, '2020-06-01 13:00:00', NULL, 3),
(3, 3, '2020-06-01 14:23:00', '2001060002', 1, 6, 2, 2, '2020-06-01 14:23:00', '2020-06-01 15:23:00', 5),
(4, 8, '2020-06-01 15:23:00', '2001060004', 2, 7, 4, 2, '2020-06-01 15:23:00', '2020-06-01 16:23:00', 6),
(5, 8, '2020-06-01 16:23:00', '2001060005', 3, 13, 4, 1, '2020-06-01 16:23:00', NULL, 6),
(6, 9, '2020-07-01 08:00:00', '2001070001', 1, 14, 6, 2, '2020-07-01 08:00:00', '2020-07-01 09:00:00', 2),
(7, 10, '2020-07-01 09:00:00', '2001070002', 2, 7, 2, 2, '2020-07-01 09:00:00', '2020-07-01 10:00:00', 2),
(8, 10, '2020-07-01 10:00:00', '2001070003', 3, 15, 2, 1, '2020-07-01 10:00:00', NULL, 2),
(9, 12, '2020-07-01 11:00:00', '2001070004', 1, 4, 1, 1, '2020-07-01 11:00:00', NULL, 3),
(10, 13, '2020-07-01 12:00:00', '2001070005', 1, 5, 1, 1, '2020-07-01 12:00:00', NULL, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `master_jenispembayaran`
--
ALTER TABLE `master_jenispembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_jenisregistrasi`
--
ALTER TABLE `master_jenisregistrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_layanan`
--
ALTER TABLE `master_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_pasien`
--
ALTER TABLE `master_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_statusregistrasi`
--
ALTER TABLE `master_statusregistrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_users`
--
ALTER TABLE `master_users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indeks untuk tabel `trx_rekammedis`
--
ALTER TABLE `trx_rekammedis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-trx_rekamMedis-pasien_id` (`pasien_id`);

--
-- Indeks untuk tabel `trx_rekammedisdetail`
--
ALTER TABLE `trx_rekammedisdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-trx_rekamMedisDetail-trx_rekamMedis_id` (`trx_rekamMedis_id`),
  ADD KEY `idx-trx_rekamMedisDetail-master_jenisRegistrasi_id` (`master_jenisRegistrasi_id`),
  ADD KEY `idx-trx_rekamMedisDetail-master_layanan_id` (`master_layanan_id`),
  ADD KEY `idx-trx_rekamMedisDetail-master_jenisPembayaran_id` (`master_jenisPembayaran_id`),
  ADD KEY `idx-trx_rekamMedisDetail-master_statusRegistrasi_id` (`master_statusRegistrasi_id`),
  ADD KEY `idx-trx_rekamMedisDetail-master_users_id` (`master_users_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `master_jenispembayaran`
--
ALTER TABLE `master_jenispembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `master_jenisregistrasi`
--
ALTER TABLE `master_jenisregistrasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `master_layanan`
--
ALTER TABLE `master_layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `master_pasien`
--
ALTER TABLE `master_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `master_statusregistrasi`
--
ALTER TABLE `master_statusregistrasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `master_users`
--
ALTER TABLE `master_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `trx_rekammedis`
--
ALTER TABLE `trx_rekammedis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `trx_rekammedisdetail`
--
ALTER TABLE `trx_rekammedisdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `trx_rekammedis`
--
ALTER TABLE `trx_rekammedis`
  ADD CONSTRAINT `fk-trx_rekamMedis-pasien_id` FOREIGN KEY (`pasien_id`) REFERENCES `master_pasien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `trx_rekammedisdetail`
--
ALTER TABLE `trx_rekammedisdetail`
  ADD CONSTRAINT `fk-trx_rekamMedisDetail-master_jenisPembayaran_id` FOREIGN KEY (`master_jenisPembayaran_id`) REFERENCES `master_jenispembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-trx_rekamMedisDetail-master_jenisRegistrasi_id` FOREIGN KEY (`master_jenisRegistrasi_id`) REFERENCES `master_jenisregistrasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-trx_rekamMedisDetail-master_layanan_id` FOREIGN KEY (`master_layanan_id`) REFERENCES `master_layanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-trx_rekamMedisDetail-master_statusRegistrasi_id` FOREIGN KEY (`master_statusRegistrasi_id`) REFERENCES `master_statusregistrasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-trx_rekamMedisDetail-master_users_id` FOREIGN KEY (`master_users_id`) REFERENCES `master_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-trx_rekamMedisDetail-trx_rekamMedis_id` FOREIGN KEY (`trx_rekamMedis_id`) REFERENCES `trx_rekammedis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
