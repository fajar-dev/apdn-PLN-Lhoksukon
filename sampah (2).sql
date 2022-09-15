-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 04 Jul 2022 pada 05.57
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sampah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `afdeling`
--

CREATE TABLE `afdeling` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `afdeling`
--

INSERT INTO `afdeling` (`id`, `nama`, `created`, `updated`) VALUES
(5, 'Afdeling 1', '2022-06-27 08:07:38', '2022-06-27 08:07:38'),
(6, 'Afdeling 2', '2022-06-27 08:07:52', '2022-06-27 08:07:52'),
(7, 'Afdeling 3', '2022-06-27 08:08:02', '2022-06-27 08:08:02'),
(8, 'PPK', '2022-06-27 08:08:31', '2022-06-27 08:08:31'),
(9, 'Teknik', '2022-06-27 08:08:41', '2022-06-27 08:08:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sampah`
--

CREATE TABLE `sampah` (
  `id` int(11) NOT NULL,
  `id_afdeling` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `pj` varchar(128) NOT NULL,
  `berat` double NOT NULL,
  `waktu` date NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sampah`
--

INSERT INTO `sampah` (`id`, `id_afdeling`, `jenis`, `pj`, `berat`, `waktu`, `foto`) VALUES
(37, 5, 'Plastik', 'Ari', 13, '2022-06-27', '0dd295bbe938c1f5b1b5aa70013d04ad.jpeg'),
(38, 5, 'Kertas', 'Nita', 21, '2022-06-27', 'bf58f45d3541eebc93175008add30b74.png'),
(39, 8, 'Kertas', 'Reza', 49, '2022-06-27', '65656057d2733109d9893539f3ccd92a.jpeg'),
(41, 8, 'kaleng', 'ss', 12, '2022-06-27', '074ea894b30ec3acf56b9966fb44ca87.png'),
(42, 6, 'kaleng', 'rizal', 7, '2022-06-27', 'no-img.png'),
(43, 8, 'plastik', 'brucel', 9, '2022-07-02', 'no-img.png'),
(44, 6, 'kaleng', 'g', 5, '2022-06-27', 'no-img.png'),
(45, 6, 'kaleng', 'dsvs', 6, '2022-06-27', '560d5cd4af6a059d1ac7db60b392f17d.png'),
(46, 5, 'plastik', 'db', 6, '2022-06-21', 'no-img.png'),
(47, 5, 'plastik', 'ssss', 6, '2022-06-28', 'no-img.png'),
(48, 5, 'plastik', 'ddd', 5, '2022-06-28', 'no-img.png'),
(49, 5, 'plastik', 'rrr', 5, '2022-06-28', 'no-img.png'),
(50, 5, 'plastik', '555', 4, '2022-06-28', 'no-img.png'),
(51, 5, 'plastik', 'ttt', 5, '2022-06-21', 'no-img.png'),
(52, 5, 'plastik', 'rrr', 5, '2022-06-24', 'no-img.png'),
(53, 5, 'plastik', 'eeeeeeeeee', 5, '2022-06-30', 'no-img.png'),
(54, 5, 'plastik', '555', 5, '2022-06-17', 'no-img.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `level` int(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `jk`, `alamat`, `username`, `password`, `level`, `created`, `updated`) VALUES
(1, 'pengawas', 'Laki-Laki', 'medan', 'pengawas', 'f414face756c143bb2be71c33c978073', 2, '2022-06-24 22:26:09', '2022-06-26 02:08:46'),
(2, 'staf', 'Laki-Laki', 'Medan labuhan', 'staf', '7b8a17c3f48d4453fde0fd74b4fa9212', 1, '2022-06-25 23:25:44', '2022-06-26 02:09:03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `afdeling`
--
ALTER TABLE `afdeling`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_afdeling` (`id_afdeling`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `afdeling`
--
ALTER TABLE `afdeling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `sampah`
--
ALTER TABLE `sampah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `sampah`
--
ALTER TABLE `sampah`
  ADD CONSTRAINT `relasi` FOREIGN KEY (`id_afdeling`) REFERENCES `afdeling` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
