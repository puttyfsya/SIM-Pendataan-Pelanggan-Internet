-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Mar 2024 pada 07.36
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inflyregister`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_customer`
--

CREATE TABLE `data_customer` (
  `id_customer` int(11) NOT NULL,
  `paket` varchar(255) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `nik_customer` varchar(255) NOT NULL,
  `tlp_customer` varchar(50) NOT NULL,
  `alamat_customer` varchar(255) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jabatan`
--

CREATE TABLE `data_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_jabatan`
--

INSERT INTO `data_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, ''),
(2, 'Founder');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kecamatan`
--

CREATE TABLE `data_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL,
  `id_kota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_kecamatan`
--

INSERT INTO `data_kecamatan` (`id_kecamatan`, `nama_kecamatan`, `id_kota`) VALUES
(1, 'Kademangan', 1),
(2, 'Kanigaran', 1),
(3, 'Kedopok', 1),
(4, 'Mayangan', 1),
(5, 'Wonoasih', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kelurahan`
--

CREATE TABLE `data_kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `nama_kelurahan` varchar(50) NOT NULL,
  `id_kecamatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_kelurahan`
--

INSERT INTO `data_kelurahan` (`id_kelurahan`, `nama_kelurahan`, `id_kecamatan`) VALUES
(1, 'Kademangan', 1),
(2, 'Ketapang', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kota`
--

CREATE TABLE `data_kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_kota`
--

INSERT INTO `data_kota` (`id_kota`, `nama_kota`) VALUES
(1, 'Kota Probolinggo'),
(2, 'Kabupaten Probolinggo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_login`
--

CREATE TABLE `data_login` (
  `id_login` int(11) NOT NULL,
  `nama_login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_login`
--

INSERT INTO `data_login` (`id_login`, `nama_login`, `email`, `password`, `level`) VALUES
(1, 'Admin Infly Networks', 'adminInflynetworks@gmail.com', '12345', 'admin'),
(2, 'Super Admin Infly Networks', 'superadminInflynetworks@gmail.com', '12345', 'superadmin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `nik_pegawai` varchar(255) NOT NULL,
  `tlp_pegawai` varchar(255) NOT NULL,
  `id_jabatan` int(50) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_pegawai`, `nama_pegawai`, `nik_pegawai`, `tlp_pegawai`, `id_jabatan`, `nama_jabatan`) VALUES
(1, 'Luky', '213149786175', '0812345678', 1, 'Founder');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_status`
--

CREATE TABLE `data_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_status`
--

INSERT INTO `data_status` (`id_status`, `status`) VALUES
(1, 'Berlangganan Baru'),
(2, 'Survey'),
(3, 'Instalasi'),
(4, 'Tidak Tercover');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_customer`
--
ALTER TABLE `data_customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `id_kelurahan` (`id_kelurahan`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_kota` (`id_kota`),
  ADD KEY `id_status` (`id_status`);

--
-- Indeks untuk tabel `data_jabatan`
--
ALTER TABLE `data_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `data_kecamatan`
--
ALTER TABLE `data_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indeks untuk tabel `data_kelurahan`
--
ALTER TABLE `data_kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indeks untuk tabel `data_kota`
--
ALTER TABLE `data_kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indeks untuk tabel `data_login`
--
ALTER TABLE `data_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `data_status`
--
ALTER TABLE `data_status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_customer`
--
ALTER TABLE `data_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_jabatan`
--
ALTER TABLE `data_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_kecamatan`
--
ALTER TABLE `data_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_kelurahan`
--
ALTER TABLE `data_kelurahan`
  MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_kota`
--
ALTER TABLE `data_kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_login`
--
ALTER TABLE `data_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_status`
--
ALTER TABLE `data_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_customer`
--
ALTER TABLE `data_customer`
  ADD CONSTRAINT `data_customer_ibfk_1` FOREIGN KEY (`id_kelurahan`) REFERENCES `data_kelurahan` (`id_kelurahan`),
  ADD CONSTRAINT `data_customer_ibfk_2` FOREIGN KEY (`id_kota`) REFERENCES `data_kota` (`id_kota`),
  ADD CONSTRAINT `data_customer_ibfk_3` FOREIGN KEY (`id_kecamatan`) REFERENCES `data_kecamatan` (`id_kecamatan`);

--
-- Ketidakleluasaan untuk tabel `data_kecamatan`
--
ALTER TABLE `data_kecamatan`
  ADD CONSTRAINT `data_kecamatan_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `data_kota` (`id_kota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
