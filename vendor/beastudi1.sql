-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 27 Jan 2020 pada 07.07
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beastudi1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `beastudi`
--

CREATE TABLE `beastudi` (
  `id` int(11) NOT NULL,
  `nama_mh` varchar(45) DEFAULT NULL,
  `jk` varchar(45) DEFAULT NULL,
  `semester_id` int(11) NOT NULL,
  `angkatan` char(4) DEFAULT NULL,
  `programstudi_id` int(11) NOT NULL,
  `kontribusi_id` int(11) NOT NULL,
  `pic_id` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beastudi`
--

INSERT INTO `beastudi` (`id`, `nama_mh`, `jk`, `semester_id`, `angkatan`, `programstudi_id`, `kontribusi_id`, `pic_id`, `keterangan`) VALUES
(73, 'Muhammad Ardiansyah', 'Laki-Laki', 3, '2018', 1, 4, 13, '	 asdas'),
(74, 'Aswar', 'Laki-Laki', 3, '2018', 1, 4, 13, '	 asdas'),
(75, 'Zulkifli', 'Laki-Laki', 3, '2018', 1, 4, 13, 'Mantap'),
(79, 'Muhammad Ardiansyah', 'Laki-Laki', 3, '2018', 1, 4, 13, 'Mantap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dana`
--

CREATE TABLE `dana` (
  `id` int(11) NOT NULL,
  `nama_donatur` varchar(45) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `dana` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dana`
--

INSERT INTO `dana` (`id`, `nama_donatur`, `perusahaan`, `alamat`, `dana`) VALUES
(7, 'Aswar S.Kom', 'PLN', 'Jakarta Pusat', ' 23.123.423'),
(8, 'Zulkifli Jufri', 'Pertamina', 'Jakarta Pusat', ' 2.312.332'),
(14, 'Muhammad Ardiansyah', 'PLN Pusat', 'Jakarta Timur', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontribusi`
--

CREATE TABLE `kontribusi` (
  `id` int(11) NOT NULL,
  `kontribusi` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kontribusi`
--

INSERT INTO `kontribusi` (`id`, `kontribusi`) VALUES
(2, 'Content'),
(3, 'Upload Content'),
(4, 'Website Developer'),
(5, 'Design Graphic'),
(6, 'Video Content'),
(7, 'LPPM'),
(8, 'Inkubator'),
(9, 'LPMI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontribusimhs`
--

CREATE TABLE `kontribusimhs` (
  `id` int(11) NOT NULL,
  `nama_id` int(11) NOT NULL,
  `kontribusi_id` int(11) NOT NULL,
  `date` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kontribusimhs`
--

INSERT INTO `kontribusimhs` (`id`, `nama_id`, `kontribusi_id`, `date`) VALUES
(5, 73, 4, '2020-03-25'),
(7, 74, 5, '2019-12-11'),
(10, 73, 3, '2020-01-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pic`
--

CREATE TABLE `pic` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `divisi` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pic`
--

INSERT INTO `pic` (`id`, `nama`, `divisi`) VALUES
(13, 'Muhammad Teguh', 'waket3'),
(16, 'Kerisna Panji', 'waket3'),
(25, 'Chandra', 'waket3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `programstudi`
--

CREATE TABLE `programstudi` (
  `id` int(11) NOT NULL,
  `programstudi` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `programstudi`
--

INSERT INTO `programstudi` (`id`, `programstudi`) VALUES
(1, 'Teknik Informatika'),
(2, 'Sistem Informasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `semester` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id`, `semester`) VALUES
(1, 'Satu'),
(2, 'Dua'),
(3, 'Tiga'),
(4, 'Empat'),
(5, 'Lima'),
(6, 'Enam'),
(7, 'Tujuh'),
(8, 'Delapan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(49, 'admin2', 'dianbugas@gmail.com', 'github2.png', '$2y$10$QWomy7..tQcVybft13OhrOEafIjvo4xXjo4.qfAs0K5yKwDlc/9qS', 1, 1, 0),
(82, 'Muhammad Ardiansyah', 'muhammadardiyansyah889@gmail.com', 'default.jpg', '$2y$10$7EMVMYbDzqCSZs7N1BAOOOpqDIY0PbE9zTDjRM5JsjxtULiNf3x2S', 3, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(12, 2, 12),
(16, 1, 13),
(17, 1, 3),
(22, 1, 5),
(23, 1, 6),
(29, 1, 7),
(30, 1, 4),
(31, 2, 4),
(32, 1, 8),
(33, 2, 2),
(35, 2, 8),
(38, 3, 2),
(39, 3, 6),
(40, 3, 7),
(41, 3, 8),
(43, 1, 2),
(45, 1, 9),
(46, 1, 15),
(47, 1, 16),
(48, 1, 17),
(49, 1, 18),
(50, 1, 19),
(51, 1, 20),
(52, 3, 15),
(54, 3, 19),
(55, 3, 17),
(56, 3, 20),
(57, 2, 20),
(58, 2, 21),
(59, 1, 21),
(62, 3, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'menu'),
(15, 'beastudi'),
(16, 'dana'),
(17, 'report'),
(19, 'pic'),
(20, 'kontribusimhs'),
(21, 'dashboard');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Pic');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(12, 1, 'Users', 'admin/users', 'fas fa-fw fa-users', 1),
(27, 15, 'Beastudi', 'beastudi', 'fas fa-fw fa-users', 1),
(28, 17, 'Report', 'report', 'fas fa-fw fa-clipboard-list', 1),
(29, 16, 'Dana Beasiswa', 'dana', 'fas fa-fw fa fa-dollar-sign', 1),
(31, 19, 'Pic', 'pic ', 'fas fa-fw fa-comments', 1),
(34, 21, 'Informasi', 'dashboard', 'fas fa-fw fa-tachometer-alt', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'aku@aku.aku', 's+q8JCFHahCbG+yuZkMYDAvP74cWddlH5GLAgtpI8f0=', 1562320292),
(2, 'dianbugas@gmail.das', 'NATPjcrQs1rbcOSl6iUQaAgCE1nu29dvv9Vore3NFMI=', 1562321218),
(4, 'pic@gmail.com', 'hUYsUUhq/23Ja5Q4Pd+ZroI1SLCkbGlx5ms7H0vOCx8=', 1570976320),
(11, '', 'FYeugqe1QG3fN5Ba7H99apY9V1WP7Zs8/dMEHDYqAeU=', 1575555464),
(12, '', '50MF244wbuUFQVRqgBr1Imobu6RzVvudP/AuY87CvTI=', 1575555490),
(13, '', 'WLaA99EcUHH9S9Gr2TG+8KEFs7ssAomsz2hOHL2i300=', 1575555563),
(14, '', '+XlQvuSmlF7uOkXRUZUrrsHRJBk2qM/xSXW2lPS1N9c=', 1575555595),
(15, '', 'A/f47UbjMTamF86gx54lQWbVi3MuRk9UFzMg2aBVpA0=', 1575555625),
(16, '', 'wWclyFM2ojHfJILzXIH0MxPy6wUy5HXMuyJNKfeBCNU=', 1575555644),
(17, '', '8dscseHIsWkrmezfT7996cF6d5lxCAVsnsWczCjEIks=', 1575555693),
(18, '', 'OIGP+G5/m8njaJRTiItSmGd/WIndE/hSp/f1yIi8bUI=', 1575556319),
(19, '', 'nKOHHoecHElKsbi84RAOTu5UbFGXrXh0KrQ/aGQctZA=', 1575556343),
(20, '', 'nOGFNv+kOuH+pvNh3UWuZ0I4yf3i0qB1DlROHSyXyFs=', 1575556858),
(21, '', '88/AYd5oqFu6RFa5kuJQoAyB42p+HIX8JV5Lv0GgzZ0=', 1575556894),
(22, '', 'wANI84P0TursvypvnZDZ+YTQBB6Fs2he/izainO8DDo=', 1575557936),
(23, '', 'EKlasTgmW3QOF02kwkKvr4vhL+R35acLj+c6Ihc+0m4=', 1575558140),
(24, '', 'Idty1/84aDSn5DoDCY/OULT68sstX8jzxhwmwhXmgq0=', 1575558187),
(25, '', '9bfA3uPaDdRSi1k3mZvIKqqJH+KEHAdP/R4Pxh0ZIPc=', 1575558220),
(26, '', '+VXJzazrO6h76/acSRsqcFB8yANjA9oYVecT61WwGDk=', 1575558612),
(30, '', 'x5L7mf5wfevuyQ2g+vMgynLTc6zQjmI7MpfT1ZnHi5E=', 1579345233),
(31, '', 'lw7kAfN5uozeBsx+Xqmn2rSJOK6xamo2DHvW7sA3qcI=', 1579345249);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `beastudi`
--
ALTER TABLE `beastudi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `programstudi_id` (`programstudi_id`),
  ADD KEY `kontribusi_id` (`kontribusi_id`);

--
-- Indeks untuk tabel `dana`
--
ALTER TABLE `dana`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontribusi`
--
ALTER TABLE `kontribusi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontribusimhs`
--
ALTER TABLE `kontribusimhs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kontribusi_id` (`kontribusi_id`),
  ADD KEY `nama_id` (`nama_id`),
  ADD KEY `kontribusi_id_2` (`kontribusi_id`);

--
-- Indeks untuk tabel `pic`
--
ALTER TABLE `pic`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `programstudi`
--
ALTER TABLE `programstudi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `beastudi`
--
ALTER TABLE `beastudi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `dana`
--
ALTER TABLE `dana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `kontribusi`
--
ALTER TABLE `kontribusi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kontribusimhs`
--
ALTER TABLE `kontribusimhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pic`
--
ALTER TABLE `pic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `programstudi`
--
ALTER TABLE `programstudi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
