-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2025 at 04:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) UNSIGNED NOT NULL,
  `nama_agama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `nama_agama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Katolik'),
(4, 'Hindu'),
(5, 'Buddha'),
(8, 'Konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(11) UNSIGNED NOT NULL,
  `rm_id` int(10) UNSIGNED NOT NULL,
  `pasien_id` int(10) UNSIGNED NOT NULL,
  `nomor_antrian` int(5) UNSIGNED NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tarif` decimal(10,2) NOT NULL,
  `status_pemeriksaan` enum('menunggu','diperiksa','selesai') NOT NULL DEFAULT 'menunggu',
  `status_bayar` enum('belum lunas','lunas') NOT NULL DEFAULT 'belum lunas',
  `tanggal_periksa` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `rm_id`, `pasien_id`, `nomor_antrian`, `nik`, `tarif`, `status_pemeriksaan`, `status_bayar`, `tanggal_periksa`, `created_at`, `updated_at`) VALUES
(21, 24, 1, 1, '3526017011030002', 0.00, 'selesai', 'lunas', '2025-05-22 00:00:00', '2025-05-22 03:36:02', '2025-05-22 20:28:27'),
(23, 26, 2, 1, '3526032412640002', 0.00, 'selesai', 'lunas', '2025-05-23 00:00:00', '2025-05-23 15:38:20', '2025-05-23 15:52:50'),
(24, 27, 4, 1, '1111111111111111', 0.00, 'selesai', 'lunas', '2025-05-27 00:00:00', '2025-05-27 12:46:16', '2025-05-27 13:23:08'),
(27, 30, 4, 1, '1111111111111111', 0.00, 'selesai', 'lunas', '2025-05-29 00:00:00', '2025-05-29 13:23:40', '2025-05-29 14:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kode_dokter` varchar(255) NOT NULL,
  `spesialis` varchar(255) NOT NULL,
  `nomor_hp` varchar(13) NOT NULL,
  `ttd` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama`, `kode_dokter`, `spesialis`, `nomor_hp`, `ttd`, `created_at`, `updated_at`) VALUES
(1, 'drg. Andi Saputra', 'DKT001', 'Orthodonti', '081122334455', NULL, '2025-05-08 10:53:38', '2025-05-08 10:53:38'),
(2, 'drg. Sonya Mayasari', 'DKT002', 'Gigi Umum', '082233445566', NULL, '2025-05-08 10:53:38', '2025-05-08 17:49:35'),
(5, 'drg. adinda maharani', 'DKT003', 'Gigi Graham', '325312345215', '1748347563_fd9cacdc79916b6ead2b.png', '2025-05-08 17:46:27', '2025-05-27 12:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `formulir_tindakan`
--

CREATE TABLE `formulir_tindakan` (
  `id_formulir` int(11) UNSIGNED NOT NULL,
  `pasien_id` int(11) UNSIGNED NOT NULL,
  `tindakan_id` int(11) UNSIGNED NOT NULL,
  `petugas_pelaksana` varchar(20) NOT NULL,
  `tanggal_pelaksanaan` date DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `formulir_tindakan`
--

INSERT INTO `formulir_tindakan` (`id_formulir`, `pasien_id`, `tindakan_id`, `petugas_pelaksana`, `tanggal_pelaksanaan`, `waktu_mulai`, `waktu_selesai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 1, 1, 'Drg. Adinda Maharani', '2025-05-22', '08:15:00', '08:30:00', '2025-05-22 20:10:22', '2025-05-22 20:10:22', NULL),
(12, 4, 3, 'Drg. Adinda Maharani', '2025-05-27', '19:00:00', '19:30:00', '2025-05-27 12:51:07', '2025-05-27 12:51:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `informed_consent`
--

CREATE TABLE `informed_consent` (
  `id_consent` int(11) UNSIGNED NOT NULL,
  `dokter_id` int(11) UNSIGNED NOT NULL,
  `pasien_id` int(11) UNSIGNED NOT NULL,
  `tindakan_id` int(11) UNSIGNED NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `no_rm` varchar(6) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `persetujuan_pasien` enum('ya','tidak') NOT NULL DEFAULT 'ya',
  `ketentuan_pembayaran` enum('setuju','tidak_setuju') NOT NULL DEFAULT 'setuju',
  `hak_kewajiban` enum('setuju','tidak_setuju') NOT NULL DEFAULT 'setuju',
  `tata_tertib` enum('setuju','tidak_setuju') NOT NULL DEFAULT 'setuju',
  `butuh_penterjemah` enum('ya','tidak') NOT NULL DEFAULT 'tidak',
  `butuh_rohaniawan` enum('ya','tidak') NOT NULL,
  `info_kerahasiaan` enum('setuju','tidak_setuju') NOT NULL DEFAULT 'setuju',
  `info_pihak_penjamin` enum('setuju','tidak_setuju') NOT NULL DEFAULT 'setuju',
  `info_hasil_pemeriksaan` enum('setuju','tidak_setuju') NOT NULL DEFAULT 'setuju',
  `info_rujukan_fasyankes` enum('setuju','tidak_setuju') NOT NULL,
  `penanggung_jawab` varchar(100) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jenis_kelamin` int(11) UNSIGNED NOT NULL,
  `nama_jenis_kelamin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jenis_kelamin`, `nama_jenis_kelamin`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(14, '2025-01-05-122310', 'App\\Database\\Migrations\\Jeniskelamin', 'default', 'App', 1746448640, 1),
(15, '2025-01-05-122741', 'App\\Database\\Migrations\\Agama', 'default', 'App', 1746448640, 1),
(16, '2025-01-05-123317', 'App\\Database\\Migrations\\Pendidikan', 'default', 'App', 1746448640, 1),
(17, '2025-01-13-060818', 'App\\Database\\Migrations\\Pasien', 'default', 'App', 1746448640, 1),
(18, '2025-01-13-060903', 'App\\Database\\Migrations\\Dokter', 'default', 'App', 1746448640, 1),
(19, '2025-01-13-155029', 'App\\Database\\Migrations\\Penyakit', 'default', 'App', 1746448640, 1),
(20, '2025-02-01-155024', 'App\\Database\\Migrations\\Obat', 'default', 'App', 1746448640, 1),
(21, '2025-02-01-155034', 'App\\Database\\Migrations\\Tindakan', 'default', 'App', 1746448641, 1),
(22, '2025-02-01-161543', 'App\\Database\\Migrations\\Resep', 'default', 'App', 1746448641, 1),
(23, '2025-03-14-055823', 'App\\Database\\Migrations\\Rm', 'default', 'App', 1746448641, 1),
(24, '2025-03-20-152102', 'App\\Database\\Migrations\\Antrian', 'default', 'App', 1746448641, 1),
(25, '2025-04-30-165815', 'App\\Database\\Migrations\\User', 'default', 'App', 1746448641, 1),
(26, '2025-05-01-163127', 'App\\Database\\Migrations\\InformedConsent', 'default', 'App', 1746448641, 1),
(27, '2025-05-02-160812', 'App\\Database\\Migrations\\Pembayaran', 'default', 'App', 1746448641, 1),
(28, '2025-05-04-155252', 'App\\Database\\Migrations\\ResumePasien', 'default', 'App', 1746448641, 1),
(29, '2025-05-04-160121', 'App\\Database\\Migrations\\FormTindakan', 'default', 'App', 1746448641, 1);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) UNSIGNED NOT NULL,
  `kode_obat` varchar(10) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `kode_obat`, `nama_obat`, `satuan`, `stok`, `harga`) VALUES
(1, 'OBT001', 'Paracetamol', 'tablet', 50, 5000.00),
(2, 'OBT002', 'Amoxicillin', 'tablet', 50, 10000.00),
(3, 'OBT003', 'Ibuprofen', 'tablet', 75, 7500.00);

-- --------------------------------------------------------

--
-- Table structure for table `odontogram`
--

CREATE TABLE `odontogram` (
  `id_odontogram` int(11) NOT NULL,
  `pasien_id` int(10) UNSIGNED NOT NULL,
  `rm_id` int(10) UNSIGNED NOT NULL,
  `g11` varchar(255) DEFAULT NULL,
  `g12` varchar(255) DEFAULT NULL,
  `g13` varchar(255) DEFAULT NULL,
  `g14` varchar(255) DEFAULT NULL,
  `g15` varchar(255) DEFAULT NULL,
  `g16` varchar(255) DEFAULT NULL,
  `g17` varchar(255) DEFAULT NULL,
  `g18` varchar(255) DEFAULT NULL,
  `g21` varchar(255) DEFAULT NULL,
  `g22` varchar(255) DEFAULT NULL,
  `g23` varchar(255) DEFAULT NULL,
  `g24` varchar(255) DEFAULT NULL,
  `g25` varchar(255) DEFAULT NULL,
  `g26` varchar(255) DEFAULT NULL,
  `g27` varchar(255) DEFAULT NULL,
  `g28` varchar(255) DEFAULT NULL,
  `g31` varchar(255) DEFAULT NULL,
  `g32` varchar(255) DEFAULT NULL,
  `g33` varchar(255) DEFAULT NULL,
  `g34` varchar(255) DEFAULT NULL,
  `g35` varchar(255) DEFAULT NULL,
  `g36` varchar(255) DEFAULT NULL,
  `g37` varchar(255) DEFAULT NULL,
  `g38` varchar(255) DEFAULT NULL,
  `g41` varchar(255) DEFAULT NULL,
  `g42` varchar(255) DEFAULT NULL,
  `g43` varchar(255) DEFAULT NULL,
  `g44` varchar(255) DEFAULT NULL,
  `g45` varchar(255) DEFAULT NULL,
  `g46` varchar(255) DEFAULT NULL,
  `g47` varchar(255) DEFAULT NULL,
  `g48` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `odontogram`
--

INSERT INTO `odontogram` (`id_odontogram`, `pasien_id`, `rm_id`, `g11`, `g12`, `g13`, `g14`, `g15`, `g16`, `g17`, `g18`, `g21`, `g22`, `g23`, `g24`, `g25`, `g26`, `g27`, `g28`, `g31`, `g32`, `g33`, `g34`, `g35`, `g36`, `g37`, `g38`, `g41`, `g42`, `g43`, `g44`, `g45`, `g46`, `g47`, `g48`, `created_at`, `updated_at`) VALUES
(1, 1, 24, '', '', '', 'mou', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jkh', '', '', '', '', '', '', '2025-05-22 07:56:44', '2025-05-22 20:10:22'),
(2, 2, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-23 15:50:56', '2025-05-23 15:50:56'),
(3, 4, 27, 'mo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-27 12:51:07', '2025-05-27 12:51:07'),
(5, 4, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-29 13:24:16', '2025-05-29 13:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(10) UNSIGNED NOT NULL,
  `jenis_kelamin_id` int(11) UNSIGNED NOT NULL,
  `agama_id` int(11) UNSIGNED NOT NULL,
  `pendidikan_id` int(11) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(45) NOT NULL,
  `nomor_rekam_medis` varchar(50) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `identitas_lain` varchar(20) DEFAULT NULL,
  `nama_ibu_kandung` varchar(45) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `suku` varchar(20) NOT NULL,
  `bahasa` varchar(20) NOT NULL,
  `alamat_lengkap` varchar(100) NOT NULL,
  `alamat_domisili` varchar(100) NOT NULL,
  `rt` int(10) NOT NULL,
  `rw` int(10) NOT NULL,
  `kelurahan` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `kode_pos` varchar(20) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `negara` varchar(20) NOT NULL,
  `telepon_rumah` varchar(20) DEFAULT NULL,
  `telepon_selular` varchar(20) NOT NULL,
  `pekerjaan` varchar(225) NOT NULL,
  `status_pernikahan` enum('belum menikah','menikah','cerai hidup','cerai mati') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `jenis_kelamin_id`, `agama_id`, `pendidikan_id`, `nama_lengkap`, `nomor_rekam_medis`, `nik`, `identitas_lain`, `nama_ibu_kandung`, `tempat_lahir`, `tanggal_lahir`, `suku`, `bahasa`, `alamat_lengkap`, `alamat_domisili`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kota`, `kode_pos`, `provinsi`, `negara`, `telepon_rumah`, `telepon_selular`, `pekerjaan`, `status_pernikahan`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 4, 'Diana Purbaningsih', 'RM - 20250508 - 0001', '3526017011030002', '-', 'Dwi Anggraini', 'Surabaya', '2017-03-01', 'jawa', 'indonesia', 'Jalan Kali Malang Nomor 14', 'Jalan Kali Malang Nomor 14', 3, 4, 'Kali', 'Malang', 'Surabaya', '89765', 'Jawa Timur', 'Indonesia', '342312344565', '-', 'Pelajar', 'belum menikah', '2025-05-08 10:58:51', '2025-05-27 12:38:54'),
(2, 1, 1, 7, 'Arifin Rizal', 'RM - 20250515 - 0002', '3526032412640002', '-', 'diana ', 'surabaya', '1996-11-14', 'Medan', 'Indonesia', 'Jalan Kali Malang', 'Jalan Kali Anget', 1, 12, 'kali', 'malang', 'Kali Anget', '78656', 'Malang', 'Indonesia', '-', '085648784078', 'Mahasiswa', 'menikah', '2025-05-15 07:39:25', '2025-05-15 07:39:25'),
(4, 1, 1, 5, 'M Nafis Riskillah', 'RM - 20250527 - 00-00-03', '1111111111111111', '-', 'Supriyatin', 'Bangkalan', '2003-08-01', 'Madura', 'Indo', 'JL.SIDINGKAP', 'Bangkalan', 2, 2, 'Mlajah', 'Bangkalan', 'Bangkalan', '111219', 'Bangkalan', 'Indonesia', '089', '089', 'Mahasiswa', 'belum menikah', '2025-05-27 12:43:57', '2025-05-27 12:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` int(11) UNSIGNED NOT NULL,
  `pasien_id` int(10) UNSIGNED NOT NULL,
  `tindakan_id` int(10) UNSIGNED DEFAULT NULL,
  `obat_id` int(10) UNSIGNED DEFAULT NULL,
  `resep_id` int(10) UNSIGNED DEFAULT NULL,
  `no_bayar` varchar(20) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `cara_pembayaran` enum('JKN','Mandiri','Asuransi Lainnya') NOT NULL,
  `total_bayar` bigint(20) UNSIGNED NOT NULL,
  `uang_bayar` bigint(20) UNSIGNED NOT NULL,
  `tanggal_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `pasien_id`, `tindakan_id`, `obat_id`, `resep_id`, `no_bayar`, `nama_petugas`, `cara_pembayaran`, `total_bayar`, `uang_bayar`, `tanggal_bayar`) VALUES
(16, 1, 1, 2, 43, 'BYR-22-05-2025-01', 'Drg. Adinda Maharani', 'JKN', 160000, 0, '2025-05-22 00:00:00'),
(17, 2, NULL, 2, 44, 'BYR-23-05-2025-01', 'Drg. Adinda Maharani', 'Mandiri', 10000, 0, '2025-05-23 00:00:00'),
(18, 4, 3, 2, 45, 'BYR-27-05-2025-01', 'Drg. Adinda Maharani', 'Mandiri', 100000, 0, '2025-05-27 00:00:00'),
(19, 4, NULL, 3, 46, 'BYR-29-05-2025-01', 'Drg. Adinda Maharani', 'Mandiri', 10000, 10000, '2025-05-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) UNSIGNED NOT NULL,
  `nama_pendidikan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `nama_pendidikan`) VALUES
(1, 'Tidak Sekolah'),
(2, 'SD'),
(3, 'SMP'),
(4, 'SMA/SMK'),
(5, 'Diploma'),
(6, 'Sarjana'),
(7, 'Magister'),
(9, 'Doktor');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) UNSIGNED NOT NULL,
  `kode_penyakit` varchar(10) NOT NULL,
  `nama_penyakit` varchar(255) NOT NULL,
  `keterangan` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `kode_penyakit`, `nama_penyakit`, `keterangan`) VALUES
(3, 'A00.0', 'Cholera due to Vibrio cholerae 01, biovar cholerae', 'Kolera disebabkan Vibrio cholerae 01, biovar cholerae '),
(4, 'A00.1', 'Cholera due to Vibrio cholerae 01, biovar eltor', 'Kolera disebabkan Vibrio cholerae 01, biovar eltor '),
(5, 'A00.9', 'Cholera, unspecified', 'Kolera, yang tidak spesifik'),
(6, 'A01.0', 'Typhoid fever', 'Demam tifoid '),
(7, 'A01.1', 'Paratyphoid fever A', 'Demam paratifoid '),
(8, 'A01.2', 'Paratyphoid fever B', 'Demam Paratifoid Tipe B '),
(9, 'A01.3', 'Paratyphoid fever C', 'Demam Paratifoid Tipe C '),
(10, 'A01.4', 'Paratyphoid fever, unspecified', 'Demam paratifoid, tidak spesifik '),
(11, 'A02.0', 'Salmonella enteritis', 'Salmonella enteritis '),
(12, 'A02.1', 'Salmonella septicaemia', 'Salmonella septicemia '),
(13, 'A02.2', 'Localized salmonella infections', 'Infeksi salmonella pada tempat tertentu '),
(14, 'A02.8', 'Other specified salmonella infections', 'Infeksi salmonella tertentu lainnya '),
(15, 'A02.9', 'Salmonella infection, unspecified', 'Infeksi Salmonella, tidak spesifik '),
(16, 'A03.0', 'Shigellosis due to Shigella dysenteriae', 'Shigellosis oleh Disentri Shigella'),
(17, 'A03.1', 'Shigellosis due to Shigella flexneri', 'Shigellosis oleh Flexneri Shigella'),
(18, 'A03.2', 'Shigellosis due to Shigella boydii', 'Shigellosis oleh Boydii Shigella'),
(19, 'A03.3', 'Shigellosis due to Shigella sonnei', 'Shigellosis oleh Sonnei Shigella'),
(20, 'A03.8', 'Other shigellosis', 'Shigellosis lainnya '),
(21, 'A03.9', 'Shigellosis, unspecified', 'Shigellosis, tidak spesifik '),
(22, 'A04.0', 'Enteropathogenic Escherichia coli infection', 'Infeksi Escherichia coli enteropathogenic '),
(23, 'A04.1', 'Enterotoxigenic Escherichia coli infection', 'Infeksi Escherichia coli enterotoksigenik '),
(24, 'A04.2', 'Enteroinvasive Escherichia coli infection', 'Infeksi Escherichia coli enteroinvasif '),
(25, 'A04.3', 'Enterohaemorrhagic Escherichia coli infection', 'Infeksi usus oleh Escherichia coli'),
(26, 'A04.4', 'Other intestinal Escherichia coli infections', 'Infeksi usus Escherichia coli lainnya'),
(27, 'A04.5', 'Campylobacter enteritis', 'Campylobacter enteritis'),
(28, 'A04.6', 'Enteritis due to Yersinia enterocolitica', 'Enteritis akibat Yersinia enterocolitica'),
(29, 'A04.7', 'Enterocolitis due to Clostridium difficile', 'Enterocolitis karena Clostridium difficile'),
(30, 'A04.8', 'Other specified bacterial intestinal infections', 'Infeksi usus lainnya akibat bakteri khusus'),
(31, 'A04.9', 'Bacterial intestinal infection, unspecified', 'Infeksi bakteri usus, tidak spesifik'),
(32, 'A05.0', 'Foodborne staphylococcal intoxication', 'Keracunan staphylococcal bawaan makanan'),
(33, 'A05.1', 'Botulism', 'Botulisme'),
(34, 'A05.2', 'Foodborne Clostridium perfringens [Clostridium welchii] intoxication', 'Keracunan Makanan akibat Perfringens Clostridium [ Clostridium welchii ]'),
(35, 'A05.3', 'Foodborne Vibrio parahaemolyticus intoxication', 'Keracunan Makanan akibat Vibrio parahaemolyticus'),
(36, 'A05.4', 'Foodborne Bacillus cereus intoxication', 'Keracunan makanan oleh Cereus Bacillus'),
(37, 'A05.8', 'Other specified bacterial foodborne intoxications', 'Keracunan makanan akibat bakteri lainnya'),
(38, 'A05.9', 'Bacterial foodborne intoxication, unspecified', 'Keracunan makanan akibat bakteri yang tidak spesifik'),
(39, 'A06.0', 'Acute amoebic dysentery', 'Disentri amuba akut'),
(40, 'A06.1', 'Chronic intestinal amoebiasis', 'Amoebiasis usus kronis'),
(41, 'A06.2', 'Amoebic nondysenteric colitis', 'Kolitis amuba nondysenteric'),
(42, 'A06.3', 'Amoeboma of intestine', 'Amoeboma usus'),
(43, 'A06.4', 'Amoebic liver abscess', 'Abses hati amuba'),
(44, 'A06.5', 'Amoebic lung abscess', 'Abses paru amuba'),
(45, 'A06.6', 'Amoebic brain abscess', 'Abses otak amuba'),
(46, 'A06.7', 'Cutaneous amoebiasis', 'Amoebiasis Cutaneous'),
(47, 'A06.8', 'Amoebic infection of other sites', 'Infeksi amuba lainnya'),
(48, 'A06.9', 'Amoebiasis, unspecified', 'Amoebiasis , tidak spesifik'),
(49, 'A07.0', 'Balantidiasis', 'Balantidiasis'),
(50, 'A07.1', 'Giardiasis [lambliasis]', 'Giardiasis [ lambliasis ]'),
(51, 'A07.2', 'Cryptosporidiosis', 'Cryptosporidiosis'),
(52, 'A07.3', 'Isosporiasis', 'Isosporiasis'),
(53, 'A07.8', 'Other specified protozoal intestinal diseases', 'Penyakit usus lainnya yang disebabkan protozoa lainnya'),
(54, 'A07.9', 'Protozoal intestinal disease, unspecified', 'Penyakit usus oleh protozoa , tidak spesifik'),
(55, 'A08.0', 'Rotaviral enteritis', 'Enteritis rotavirus'),
(56, 'A08.1', 'Acute gastroenteropathy due to Norwalk agent', 'Gastroenteropathy akut karena agen Norwalk'),
(57, 'A08.2', 'Adenoviral enteritis', 'enteritis adenoviral'),
(58, 'A08.3', 'Other viral enteritis', 'Enteritis virus lainnya'),
(59, 'A08.4', 'Viral intestinal infection, unspecified', 'Infeksi virus  usus, tidak spesifik'),
(60, 'A08.5', 'Other specified intestinal infections', 'Infeksi usus tertentu lainnya'),
(61, 'A09', 'Diarrhoea and gastroenteritis of presumed infectious origin', 'Diare dan gastroenteritis oleh penyebab penyakit menular'),
(62, 'A15.0', 'Tuberculosis of lung, confirmed by sputum microscopy with or without culture', 'TBC paru-paru , hasil konfirmasi mikroskop pada sputum dengan atau tanpa cultur'),
(63, 'A15.1', 'Tuberculosis of lung, confirmed by culture only', 'TBC paru-paru , yang hanya dikonfirmasi secara kultur'),
(64, 'A15.2', 'Tuberculosis of lung, confirmed histologically', 'TBC paru-paru , yang dikonfirmasi secara histologi'),
(65, 'A15.3', 'Tuberculosis of lung, confirmed by unspecified means', 'TBC paru-paru , yang dikonfirmasi dengan cara yang tidak spesifik'),
(66, 'A15.4', 'Tuberculosis of intrathoracic lymph nodes, confirmed bacteriologically and histologically', 'Tuberkulosis kelenjar getah bening intrathoracic , dikonfirmasi bakteriologis dan histologis'),
(67, 'A15.5', 'Tuberculosis of larynx, trachea and bronchus, confirmed bacteriologically and histologically', 'Tuberkulosis laring , trakea , dan bronkus , dikonfirmasi secara bakteriologis dan histologis'),
(68, 'A15.6', 'Tuberculous pleurisy, confirmed bacteriologically and histologically', 'Pleuritis tuberkulosa , dikonfirmasi secara bakteriologis dan histologis'),
(69, 'A15.7', 'Primary respiratory tuberculosis, confirmed bacteriologically and histologically', 'TBC pernafasan primer , dikonfirmasi secara bakteriologis dan histologis'),
(70, 'A15.8', 'Other respiratory tuberculosis, confirmed bacteriologically and histologically', 'TBC pernapasan lainnya , dikonfirmasi secara bakteriologis dan histologis'),
(71, 'A15.9', 'Respiratory tuberculosis unspecified, confirmed bacteriologically and histologically', 'TBC pernafasan tidak spesifik , dikonfirmasi secara bakteriologis dan histologis'),
(72, 'A16.0', 'Tuberculosis of lung, bacteriologically and histologically negative', 'TBC paru-paru , bakteriologis dan histologis negatif'),
(73, 'A16.1', 'Tuberculosis of lung, bacteriological and histological examination not done', 'TBC paru-paru , dengan pemeriksaan bakteriologis dan histologis yang tidak dilakukan'),
(74, 'A16.2', 'Tuberculosis of lung, without mention of bacteriological or histological confirmation', 'TBC paru-paru , tanpa adanya konfirmasi secara bakteriologis atau histologis'),
(75, 'A16.3', 'Tuberculosis of intrathoracic lymph nodes, without mention of bacteriological or histological confirmation', 'Tuberkulosis kelenjar getah bening intrathoracic , tanpa adanya konfirmasi bakteriologis atau histologis'),
(76, 'A16.4', 'Tuberculosis of larynx, trachea and bronchus, without mention of bacteriological or histological confirmation', 'Tuberkulosis laring , trakea , dan bronkus , tanpa adanya konfirmasi bakteriologis atau histologis'),
(77, 'A16.5', 'Tuberculous pleurisy, without mention of bacteriological or histological confirmation', 'Pleuritis tuberkulosa , tanpa adanya konfirmasi bakteriologis atau histologis'),
(78, 'A16.7', 'Primary respiratory tuberculosis without mention of bacteriological or histological confirmation', 'TBC pernafasan primer tanpa adanya konfirmasi bakteriologis atau histologis'),
(79, 'A16.8', 'Other respiratory tuberculosis, without mention of bacteriological or histological confirmation', 'TBC pernapasan lainnya , tanpa adanya konfirmasi bakteriologis atau histologis'),
(80, 'A16.9', 'Respiratory tuberculosis unspecified, without mention of bacteriological or histological confirmation', 'TBC pernafasan tidak spesifik , tanpa adanya konfirmasi bakteriologis atau histologis'),
(81, 'A17.0', 'Tuberculous meningitis', 'Meningitis TB'),
(82, 'A17.1', 'Meningeal tuberculoma', 'Tuberculoma meningeal'),
(83, 'A17.8', 'Other tuberculosis of nervous system', 'TB lain dari sistem saraf'),
(84, 'A17.9', 'Tuberculosis of nervous system, unspecified', 'Tuberkulosis sistem saraf , tidak spesifik'),
(85, 'A18.0', 'Tuberculosis of bones and joints', 'Tuberkulosis tulang dan sendi'),
(86, 'A18.1', 'Tuberculosis of genitourinary system', 'Tuberkulosis sistem genitourinari'),
(87, 'A18.2', 'Tuberculous peripheral lymphadenopathy', 'Limfadenopati perifer TB'),
(88, 'A18.3', 'Tuberculosis of intestines, peritoneum and mesenteric glands', 'TBC usus , peritoneum dan kelenjar mesenterika'),
(89, 'A18.4', 'Tuberculosis of skin and subcutaneous tissue', 'Tuberkulosis kulit dan jaringan subkutan'),
(90, 'A18.5', 'Tuberculosis of eye', 'Tuberkulosis mata'),
(91, 'A18.6', 'Tuberculosis of ear', 'Tuberkulosis telinga'),
(92, 'A18.7', 'Tuberculosis of adrenal glands', 'Tuberkulosis kelenjar adrenal'),
(93, 'A18.8', 'Tuberculosis of other specified organs', 'Tuberkulosis pada organ tertentu lainnya'),
(94, 'A19.0', 'Acute miliary tuberculosis of a single specified site', 'Tuberkulosis milier akut pada sebuah sistem tunggal tertentu'),
(95, 'A19.1', 'Acute miliary tuberculosis of multiple sites', 'Tuberkulosis milier akut pada beberapa sistem'),
(96, 'A19.2', 'Acute miliary tuberculosis, unspecified', 'Tuberkulosis milier akut , tidak spesifik'),
(97, 'A19.8', 'Other miliary tuberculosis', 'Tuberkulosis milier lainnya'),
(98, 'A19.9', 'Miliary tuberculosis, unspecified', 'Tuberkulosis milier , tidak spesifik'),
(99, 'A20.0', 'Bubonic plague', 'Penyakit pes'),
(100, 'A20.1', 'Cellulocutaneous plague', 'Wabah Cellulocutaneous'),
(101, 'A20.2', 'Pneumonic plague', 'Wabah pneumonia'),
(102, 'A20.3', 'Plague meningitis', 'Meningitis Plague'),
(103, 'A20.7', 'Septicaemic plague', 'Wabah septikemia'),
(104, 'A20.8', 'Other forms of plague', 'Bentuk lain dari wabah'),
(105, 'A20.9', 'Plague, unspecified', 'Wabah , tidak spesifik'),
(106, 'A21.0', 'Ulceroglandular tularaemia', 'Tularaemia Ulceroglandular'),
(107, 'A21.1', 'Oculoglandular tularaemia', 'Tularaemia Oculoglandular'),
(108, 'A21.2', 'Pulmonary tularaemia', 'Tularaemia paru'),
(109, 'A21.3', 'Gastrointestinal tularaemia', 'Tularaemia gastrointestinal'),
(110, 'A21.7', 'Generalized tularaemia', 'Tularaemia umum'),
(111, 'A21.8', 'Other forms of tularaemia', 'Bentuk lain dari tularaemia'),
(112, 'A21.9', 'Tularaemia, unspecified', 'Tularaemia , tidak spesifik'),
(113, 'A22.0', 'Cutaneous anthrax', 'Cutaneous anthrax'),
(114, 'A22.1', 'Pulmonary anthrax', 'Anthrax pada paru'),
(115, 'A22.2', 'Gastrointestinal anthrax', 'Anthrax pada gastrointestinal'),
(116, 'A22.7', 'Anthrax septicaemia', 'Anthrax pada septicemia'),
(117, 'A22.8', 'Other forms of anthrax', 'Bentuk lain dari anthrax'),
(118, 'A22.9', 'Anthrax, unspecified', 'Anthrax , tidak spesifik'),
(119, 'A23.0', 'Brucellosis due to Brucella melitensis', 'Brucellosis karena Brucella melitensis'),
(120, 'A23.1', 'Brucellosis due to Brucella abortus', 'Brucellosis karena Brucella abortus'),
(121, 'A23.2', 'Brucellosis due to Brucella suis', 'Brucellosis karena Brucella suis'),
(122, 'A23.3', 'Brucellosis due to Brucella canis', 'Brucellosis karena Brucella canis'),
(123, 'A23.8', 'Other brucellosis', 'Brucellosis lainnya'),
(124, 'A23.9', 'Brucellosis, unspecified', 'Brucellosis , tidak spesifik'),
(125, 'A24.0', 'Glanders', 'Sakit beringus'),
(126, 'A24.1', 'Acute and fulminating melioidosis', 'Melioidosis akut dan fulminan '),
(127, 'A24.2', 'Subacute and chronic melioidosis', 'Melioidosis subakut dan kronis '),
(128, 'A24.3', 'Other melioidosis', 'Melioidosis lainnya'),
(129, 'A24.4', 'Melioidosis, unspecified', 'Melioidosis , tidak spesifik'),
(130, 'A25.0', 'Spirillosis', 'Spirillosis'),
(131, 'A25.1', 'Streptobacillosis', 'Streptobacillosis'),
(132, 'A25.9', 'Rat-bite fever, unspecified', 'Demam gigitan tikus , tidak spesifik'),
(133, 'A26.0', 'Cutaneous erysipeloid', 'Erysipeloid Cutaneous'),
(134, 'A26.7', 'Erysipelothrix septicaemia', 'Erysipelothrix septicemia'),
(135, 'A26.8', 'Other forms of erysipeloid', 'Bentuk lain dari erysipeloid'),
(136, 'A26.9', 'Erysipeloid, unspecified', 'Erysipeloid , tidak spesifik'),
(137, 'A27.0', 'Leptospirosis icterohaemorrhagica', 'Leptospirosis icterohaemorrhagica'),
(138, 'A27.8', 'Other forms of leptospirosis', 'Bentuk lain dari leptospirosis'),
(139, 'A27.9', 'Leptospirosis, unspecified', 'Leptospirosis , tidak spesifik'),
(140, 'A28.0', 'Pasteurellosis', 'Pasteurellosis'),
(141, 'A28.1', 'Cat-scratch disease', 'Penyakit Cat- scratch'),
(142, 'A28.2', 'Extraintestinal yersiniosis', 'mikroorganisme ini adalah Yersiniosis ekstraintestinal'),
(143, 'A28.8', 'Other specified zoonotic bacterial diseases, not elsewhere classified', 'Penyakit bakteri lainnya yang spesifik secara zoonosis , tidak diklasifikasikan pada tempat lain'),
(144, 'A28.9', 'Zoonotic bacterial disease, unspecified', 'Penyakit bakteri zoonosis , tidak spesifik'),
(145, 'A30.0', 'Indeterminate leprosy', 'Kusta Indeterminasi'),
(146, 'A30.1', 'Tuberculoid leprosy', 'Kusta tuberkuloid'),
(147, 'A30.2', 'Borderline tuberculoid leprosy', 'Borderline tuberkuloid kusta'),
(148, 'A30.3', 'Borderline leprosy', 'Kusta borderline'),
(149, 'A30.4', 'Borderline lepromatous leprosy', 'Borderline kusta lepromatous'),
(150, 'A30.5', 'Lepromatous leprosy', 'Kusta lepromatous'),
(151, 'A30.8', 'Other forms of leprosy', 'Bentuk lain dari kusta'),
(152, 'A30.9', 'Leprosy, unspecified', 'Kusta , tidak spesifik'),
(153, 'A31.0', 'Pulmonary mycobacterial infection', 'Infeksi mikobakteri paru'),
(154, 'A31.1', 'Cutaneous mycobacterial infection', 'Infeksi mikobakteri Cutaneous'),
(155, 'A31.8', 'Other mycobacterial infections', 'Infeksi mikobakteri lainnya'),
(156, 'A31.9', 'Mycobacterial infection, unspecified', 'Infeksi mikobakterium , tidak spesifik'),
(157, 'A32.0', 'Cutaneous listeriosis', 'listeriosis Cutaneous'),
(158, 'A32.1', 'Listerial meningitis and meningoencephalitis', 'Meningitis listeria dan meningoencephalitis'),
(159, 'A32.7', 'Listerial septicaemia', 'Septikemia listeria'),
(160, 'A32.8', 'Other forms of listeriosis', 'Bentuk lain dari listeriosis'),
(161, 'A32.9', 'Listeriosis, unspecified', 'Listeriosis , tidak spesifik'),
(162, 'A33', 'Tetanus neonatorum', 'Tetanus neonatorum'),
(163, 'A34', 'Obstetrical tetanus', 'Tetanus kandungan'),
(164, 'A35', 'Other tetanus', 'Tetanus lainnya'),
(165, 'A36.0', 'Pharyngeal diphtheria', 'Difteri pada faring'),
(166, 'A36.1', 'Nasopharyngeal diphtheria', 'Difteri pada nasofaring'),
(167, 'A36.2', 'Laryngeal diphtheria', 'Difteri pada laring'),
(168, 'A36.3', 'Cutaneous diphtheria', 'Difteri Cutaneous'),
(169, 'A36.8', 'Other diphtheria', 'Difteri lainnya'),
(170, 'A36.9', 'Diphtheria, unspecified', 'Difteri , tidak spesifik'),
(171, 'A37.0', 'Whooping cough due to Bordetella pertussis', 'Rejan batuk karena Bordetella pertussis'),
(172, 'A37.1', 'Whooping cough due to Bordetella parapertussis', 'Rejan batuk karena Bordetella parapertussis'),
(173, 'A37.8', 'Whooping cough due to other Bordetella species', 'Batuk rejan karena spesies Bordetella lainnya'),
(174, 'A37.9', 'Whooping cough, unspecified', 'Batuk rejan , tidak spesifik'),
(175, 'A38', 'Scarlet fever', 'Demam berdarah'),
(176, 'A39.0', 'Meningococcal meningitis', 'Meningitis meningokokus'),
(177, 'A39.1', 'Waterhouse-Friderichsen syndrome', 'Sindrom Waterhouse - Friderichsen'),
(178, 'A39.2', 'Acute meningococcaemia', 'Meningokoksemia akut'),
(179, 'A39.3', 'Chronic meningococcaemia', 'Meningokoksemia kronis'),
(180, 'A39.4', 'Meningococcaemia, unspecified', 'Meningokoksemia , tidak spesifik'),
(181, 'A39.5', 'Meningococcal heart disease', 'Penyakit jantung Meningokokus'),
(182, 'A39.8', 'Other meningococcal infections', 'Infeksi meningokokus lainnya'),
(183, 'A39.9', 'Meningococcal infection, unspecified', 'Infeksi meningokokus , tidak spesifik'),
(184, 'A40.0', 'Septicaemia due to streptococcus, group A', 'Septicaemia karena streptokokus grup A'),
(185, 'A40.1', 'Septicaemia due to streptococcus, group B', 'Septicaemia karena streptococcus , kelompok B'),
(186, 'A40.2', 'Septicaemia due to streptococcus, group D', 'Septicaemia karena streptococcus , kelompok D'),
(187, 'A40.3', 'Septicaemia due to Streptococcus pneumoniae', 'Septicaemia karena Streptococcus pneumoniae'),
(188, 'A40.8', 'Other streptococcal septicaemia', 'Septikemia streptokokus lainnya'),
(189, 'A40.9', 'Streptococcal septicaemia, unspecified', 'Septikemia streptokokus , tidak spesifik'),
(190, 'A41.0', 'Septicaemia due to Staphylococcus aureus', 'Septicaemia karena Staphylococcus aureus'),
(191, 'A41.1', 'Septicaemia due to other specified staphylococcus', 'Septicaemia karena staphylococcus tertentu lainnya'),
(192, 'A41.2', 'Septicaemia due to unspecified staphylococcus', 'Septicaemia karena staphylococcus yang tidak spesifik'),
(193, 'A41.3', 'Septicaemia due to Haemophilus influenzae', 'Septicaemia karena Haemophilus influenzae'),
(194, 'A41.4', 'Septicaemia due to anaerobes', 'Septicaemia karena anaerob'),
(195, 'A41.5', 'Septicaemia due to other Gram-negative organisms', 'Septicaemia karena organisme Gram - negatif lainnya'),
(196, 'A41.8', 'Other specified septicaemia', 'Septikemia tertentu lainnya'),
(197, 'A41.9', 'Septicaemia, unspecified', 'Septicaemia , tidak spesifik'),
(198, 'A42.0', 'Pulmonary actinomycosis', 'Actinomycosis paru'),
(199, 'A42.1', 'Abdominal actinomycosis', 'Actinomycosis perut'),
(200, 'A42.2', 'Cervicofacial actinomycosis', 'Actinomycosis cervicofacial'),
(201, 'A42.7', 'Actinomycotic septicaemia', 'Septikemia Actinomycotic'),
(202, 'A42.8', 'Other forms of actinomycosis', 'Bentuk lain dari actinomycosis'),
(203, 'A42.9', 'Actinomycosis, unspecified', 'Actinomycosis , tidak spesifik'),
(204, 'A43.0', 'Pulmonary nocardiosis', 'Nocardiosis paru'),
(205, 'A43.1', 'Cutaneous nocardiosis', 'Nocardiosis Cutaneous'),
(206, 'A43.8', 'Other forms of nocardiosis', 'Bentuk lain dari nocardiosis'),
(207, 'A43.9', 'Nocardiosis, unspecified', 'Nocardiosis , tidak spesifik'),
(208, 'A44.0', 'Systemic bartonellosis', 'Bartonellosis sistemik'),
(209, 'A44.1', 'Cutaneous and mucocutaneous bartonellosis', 'Cutaneous dan mukokutan bartonellosis'),
(210, 'A44.8', 'Other forms of bartonellosis', 'Bentuk lain dari bartonellosis'),
(211, 'A44.9', 'Bartonellosis, unspecified', 'Bartonellosis , tidak spesifik'),
(212, 'A46', 'Erysipelas', 'Luka Api'),
(213, 'A48.0', 'Gas gangrene', 'Gangren gas'),
(214, 'A48.1', 'Legionnaires disease', 'Penyakit Legionnaires'),
(215, 'A48.2', 'Nonpneumonic Legionnaires disease [Pontiac fever]', 'Penyakit Legionnaires Nonpneumonic [ Pontiac demam ]'),
(216, 'A48.3', 'Toxic shock syndrome', 'Toxic shock syndrome'),
(217, 'A48.4', 'Brazilian purpuric fever', 'Demam purpura Brasil'),
(218, 'A48.8', 'Other specified bacterial diseases', 'Penyakit bakteri lainnya yang spesifik'),
(219, 'A49.0', 'Staphylococcal infection, unspecified', 'Infeksi stafilokokus , tidak spesifik'),
(220, 'A49.1', 'Streptococcal infection, unspecified', 'Infeksi streptokokus , tidak spesifik'),
(221, 'A49.2', 'Haemophilus influenzae infection, unspecified', 'Infeksi influenzae Haemophilus , tidak spesifik'),
(222, 'A49.3', 'Mycoplasma infection, unspecified', 'Infeksi Mycoplasma , tidak spesifik'),
(223, 'A49.8', 'Other bacterial infections of unspecified site', 'Infeksi bakteri lain dari situs yang tidak spesifik'),
(224, 'A49.9', 'Bacterial infection, unspecified', 'Infeksi bakteri , tidak spesifik'),
(225, 'A50.0', 'Early congenital syphilis, symptomatic', 'Sifilis kongenital dini, gejala'),
(226, 'A50.1', 'Early congenital syphilis, latent', 'Sifilis kongenital dini, laten'),
(227, 'A50.2', 'Early congenital syphilis, unspecified', 'Sifilis kongenital dini, tidak spesifik'),
(228, 'A50.3', 'Late congenital syphilitic oculopathy', 'Akhir oculopathy sifilis kongenital'),
(229, 'A50.4', 'Late congenital neurosyphilis [juvenile neurosyphilis]', 'Neurosifilis kongenital Akhir [ remaja neurosifilis ]'),
(230, 'A50.5', 'Other late congenital syphilis, symptomatic', 'Sifilis kongenital lainnya , gejala'),
(231, 'A50.6', 'Late congenital syphilis, latent', 'Sifilis kongenital terlambat , laten'),
(232, 'A50.7', 'Late congenital syphilis, unspecified', 'Sifilis kongenital terlambat , tidak spesifik'),
(233, 'A50.9', 'Congenital syphilis, unspecified', 'Sifilis kongenital , tidak spesifik'),
(234, 'A51.0', 'Primary genital syphilis', 'Sifilis genital primer'),
(235, 'A51.1', 'Primary anal syphilis', 'Sifilis anal Primer'),
(236, 'A51.2', 'Primary syphilis of other sites', 'Sifilis primer dari situs lain'),
(237, 'A51.3', 'Secondary syphilis of skin and mucous membranes', 'Sifilis sekunder dari kulit dan membran mukosa'),
(238, 'A51.4', 'Other secondary syphilis', 'Sifilis sekunder lainnya'),
(239, 'A51.5', 'Early syphilis, latent', 'Sifilis awal , laten'),
(240, 'A51.9', 'Early syphilis, unspecified', 'Sifilis awal , tidak spesifik'),
(241, 'A52.0', 'Cardiovascular syphilis', 'Sifilis kardiovaskular'),
(242, 'A52.1', 'Symptomatic neurosyphilis', 'Neurosifilis simtomatik'),
(243, 'A52.2', 'Asymptomatic neurosyphilis', 'Neurosifilis asimtomatik'),
(244, 'A52.3', 'Neurosyphilis, unspecified', 'Neurosifilis , tidak spesifik'),
(245, 'A52.7', 'Other symptomatic late syphilis', 'Beberapa gejala lain dari sifilis'),
(246, 'A52.8', 'Late syphilis, latent', 'Sifilis , laten'),
(247, 'A52.9', 'Late syphilis, unspecified', 'Sifilis , tidak spesifik'),
(248, 'A53.0', 'Latent syphilis, unspecified as early or late', 'Sifilis laten , tidak spesifik pada awal atau akhir'),
(249, 'A53.9', 'Syphilis, unspecified', 'Sifilis , tidak spesifik'),
(250, 'A54.0', 'Gonococcal infection of lower genitourinary tract without periurethral or accessory gland abscess', 'Infeksi gonokokal saluran genitourinari rendah tanpa periurethral atau aksesori kelenjar abses'),
(251, 'A54.1', 'Gonococcal infection of lower genitourinary tract with periurethral and accessory gland abscess', 'Infeksi gonokokal saluran genitourinari rendah dengan periurethral dan aksesori kelenjar abses'),
(252, 'A54.2', 'Gonococcal pelviperitonitis and other gonococcal genitourinary infections', 'Pelviperitonitis gonokokal dan infeksi genitourinari gonokokal lainnya'),
(253, 'A54.3', 'Gonococcal infection of eye', 'Infeksi gonokokal mata'),
(254, 'A54.4', 'Gonococcal infection of musculoskeletal system', 'Infeksi gonokokal sistem muskuloskeletal'),
(255, 'A54.5', 'Gonococcal pharyngitis', 'faringitis gonokokal'),
(256, 'A54.6', 'Gonococcal infection of anus and rectum', 'Infeksi gonokokal dari anus dan rektum'),
(257, 'A54.8', 'Other gonococcal infections', 'Infeksi gonokokal lainnya'),
(258, 'A54.9', 'Gonococcal infection, unspecified', 'Infeksi gonokokal , tidak spesifik'),
(259, 'A55', 'Chlamydial lymphogranuloma (venereum)', 'Klamidia limfogranuloma ( venereum )'),
(260, 'A56.0', 'Chlamydial infection of lower genitourinary tract', 'Infeksi klamidia saluran genitourinari rendah'),
(261, 'A56.1', 'Chlamydial infection of pelviperitoneum and other genitourinary organs', 'Infeksi klamidia dari pelviperitoneum dan organ genitourinari lainnya'),
(262, 'A56.2', 'Chlamydial infection of genitourinary tract, unspecified', 'Infeksi klamidia saluran genitourinaria , tidak spesifik'),
(263, 'A56.3', 'Chlamydial infection of anus and rectum', 'Infeksi klamidia dari anus dan rektum'),
(264, 'A56.4', 'Chlamydial infection of pharynx', 'Infeksi klamidia faring'),
(265, 'A56.8', 'Sexually transmitted chlamydial infection of other sites', 'Infeksi menular klamidia secara seksual pada situs lain'),
(266, 'A57', 'Chancroid', 'Chancroid'),
(267, 'A58', 'Granuloma inguinale', 'Granuloma inguinale'),
(268, 'A59.0', 'Urogenital trichomoniasis', 'Trikomoniasis urogenital'),
(269, 'A59.8', 'Trichomoniasis of other sites', 'Trikomoniasis situs lain'),
(270, 'A59.9', 'Trichomoniasis, unspecified', 'Trikomoniasis , tidak spesifik'),
(271, 'A60.0', 'Herpesviral infection of genitalia and urogenital tract', 'Infeksi Herpesviral alat kelamin dan saluran urogenital'),
(272, 'A60.1', 'Herpesviral infection of perianal skin and rectum', 'Infeksi Herpesviral kulit perianal dan rektum'),
(273, 'A60.9', 'Anogenital herpesviral infection, unspecified', 'Infeksi herpesviral anogenital , tidak spesifik'),
(274, 'A63.0', 'Anogenital (venereal) warts', 'Anogenital ( kelamin ) kutil'),
(275, 'A63.8', 'Other specified predominantly sexually transmitted diseases', 'Penyakit tertentu lainnya terutama menular seksual'),
(276, 'A64', 'Unspecified sexually transmitted disease', 'Penyakit menular seksual yang tidak spesifik'),
(277, 'A65', 'Nonvenereal syphilis', 'Sifilis nonvenereal'),
(278, 'A66.0', 'Initial lesions of yaws', 'Lesi awal patek'),
(279, 'A66.1', 'Multiple papillomata and wet crab yaws', 'Beberapa papillomata dan kepiting patek basah'),
(280, 'A66.2', 'Other early skin lesions of yaws', 'Lesi kulit awal lain dari patek'),
(281, 'A66.3', 'Hyperkeratosis of yaws', 'Hiperkeratosis dari patek'),
(282, 'A66.4', 'Gummata and ulcers of yaws', 'Gummata dan borok dari patek'),
(283, 'A66.5', 'Gangosa', 'Gangosa'),
(284, 'A66.6', 'Bone and joint lesions of yaws', 'Tulang dan lesi bersama patek'),
(285, 'A66.7', 'Other manifestations of yaws', 'Manifestasi lain dari patek'),
(286, 'A66.8', 'Latent yaws', 'Patek laten'),
(287, 'A66.9', 'Yaws, unspecified', 'Patek , tidak spesifik'),
(288, 'A67.0', 'Primary lesions of pinta', 'Lesi primer pinta'),
(289, 'A67.1', 'Intermediate lesions of pinta', 'Lesi menengah pinta'),
(290, 'A67.2', 'Late lesions of pinta', 'Lesi akhir pinta'),
(291, 'A67.3', 'Mixed lesions of pinta', 'Lesi campuran dari pinta'),
(292, 'A67.9', 'Pinta, unspecified', 'Pinta , tidak spesifik'),
(293, 'A68.0', 'Louse-borne relapsing fever', 'Demam kambuh kutu - ditanggung'),
(294, 'A68.1', 'Tick-borne relapsing fever', 'Demam kambuh tick-borne'),
(295, 'A68.9', 'Relapsing fever, unspecified', 'Demam kambuh , tidak spesifik'),
(296, 'A69.0', 'Necrotizing ulcerative stomatitis', 'Necrotizing stomatitis ulseratif'),
(297, 'A69.1', 'Other Vincents infections', 'Infeksi Vincents lainnya'),
(298, 'A69.2', 'Lyme disease', 'Penyakit Lyme'),
(299, 'A69.8', 'Other specified spirochaetal infections', 'Infeksi spirochaetal tertentu lainnya'),
(300, 'A69.9', 'Spirochaetal infection, unspecified', 'Infeksi Spirochaetal , tidak spesifik'),
(301, 'A70', 'Chlamydia psittaci infection', 'Infeksi Chlamydia psittaci'),
(302, 'A71.0', 'Initial stage of trachoma', 'Tahap awal trachoma'),
(303, 'A71.1', 'Active stage of trachoma', 'Tahap aktif trachoma'),
(304, 'A71.9', 'Trachoma, unspecified', 'Trachoma , tidak spesifik'),
(305, 'A74.0', 'Chlamydial conjunctivitis', 'Konjungtivitis klamidia'),
(306, 'A74.8', 'Other chlamydial diseases', 'Penyakit klamidia lainnya'),
(307, 'A74.9', 'Chlamydial infection, unspecified', 'Infeksi klamidia , tidak spesifik'),
(308, 'A75.0', 'Epidemic louse-borne typhus fever due to Rickettsia prowazekii', 'Epidemi kutu - ditanggung tifus demam akibat prowazekii Rickettsia'),
(309, 'A75.1', 'Recrudescent typhus [Brills disease]', 'Tifus yg timbul [ penyakit Brills ]'),
(310, 'A75.2', 'Typhus fever due to Rickettsia typhi', 'Demam tipus karena typhi Rickettsia'),
(311, 'A75.3', 'Typhus fever due to Rickettsia tsutsugamushi', 'Demam tipus karena tsutsugamushi Rickettsia'),
(312, 'A75.9', 'Typhus fever, unspecified', 'Demam Tifus , tidak spesifik'),
(313, 'A77.0', 'Spotted fever due to Rickettsia rickettsii', 'Spotted demam akibat rickettsii Rickettsia'),
(314, 'A77.1', 'Spotted fever due to Rickettsia conorii', 'Spotted demam akibat conorii Rickettsia'),
(315, 'A77.2', 'Spotted fever due to Rickettsia sibirica', 'Spotted demam karena Rickettsia sibirica'),
(316, 'A77.3', 'Spotted fever due to Rickettsia australis', 'Spotted demam akibat australis Rickettsia'),
(317, 'A77.8', 'Other spotted fevers', 'Demam berbintik lainnya'),
(318, 'A77.9', 'Spotted fever, unspecified', 'Demam Spotted , tidak spesifik'),
(319, 'A78', 'Q fever', 'Demam Q '),
(320, 'A79.0', 'Trench fever', 'Demam parit'),
(321, 'A79.1', 'Rickettsialpox due to Rickettsia akari', 'Rickettsialpox karena Rickettsia akari'),
(322, 'A79.8', 'Other specified rickettsioses', 'Rickettsioses tertentu lainnya'),
(323, 'A79.9', 'Rickettsiosis, unspecified', 'Rickettsiosis , tidak spesifik'),
(324, 'A80.0', 'Acute paralytic poliomyelitis, vaccine-associated', 'Poliomyelitis paralitik akut , vaksin terkait'),
(325, 'A80.1', 'Acute paralytic poliomyelitis, wild virus, imported', 'Poliomyelitis paralitik akut , virus liar , diimpor'),
(326, 'A80.2', 'Acute paralytic poliomyelitis, wild virus, indigenous', 'Poliomyelitis paralitik akut , virus liar , adat'),
(327, 'A80.3', 'Acute paralytic poliomyelitis, other and unspecified', 'Akut poliomyelitis paralitik , lain dan tidak spesifik'),
(328, 'A80.4', 'Acute nonparalytic poliomyelitis', 'Poliomyelitis nonparalytic akut'),
(329, 'A80.9', 'Acute poliomyelitis, unspecified', 'Poliomyelitis akut , tidak spesifik'),
(330, 'A81.0', 'Creutzfeldt-Jakob disease', 'Penyakit Creutzfeldt - Jakob'),
(331, 'A81.1', 'Subacute sclerosing panencephalitis', 'Subakut sclerosing panencephalitis'),
(332, 'A81.2', 'Progressive multifocal leukoencephalopathy', 'Progressive multifocal leukoencephalopathy'),
(333, 'A81.8', 'Other atypical virus infections of central nervous system', 'Infeksi virus atipikal lain dari sistem saraf pusat'),
(334, 'A81.9', 'Atypical virus infection of central nervous system, unspecified', 'Infeksi virus atipikal sistem saraf pusat , tidak spesifik'),
(335, 'A82.0', 'Sylvatic rabies', 'Rabies sylvatic'),
(336, 'A82.1', 'Urban rabies', 'Rabies perkotaan'),
(337, 'A82.9', 'Rabies, unspecified', 'Rabies , tidak spesifik'),
(338, 'A83.0', 'Japanese encephalitis', 'Japanese ensefalitis'),
(339, 'A83.1', 'Western equine encephalitis', 'Ensefalitis kuda Barat'),
(340, 'A83.2', 'Eastern equine encephalitis', 'Ensefalitis kuda Timur'),
(341, 'A83.3', 'St Louis encephalitis', 'Ensefalitis St Louis '),
(342, 'A83.4', 'Australian encephalitis', 'Ensefalitis Australia'),
(343, 'A83.5', 'California encephalitis', 'Ensefalitis California '),
(344, 'A83.6', 'Rocio virus disease', 'Penyakit virus Rocio'),
(345, 'A83.8', 'Other mosquito-borne viral encephalitis', 'Ensefalitis viral yang ditularkan dari virus nyamuk lainnya'),
(346, 'A83.9', 'Mosquito-borne viral encephalitis, unspecified', 'Ensefalitis virus oleh nyamuk, tidak spesifik'),
(347, 'A84.0', 'Far Eastern tick-borne encephalitis [Russian spring-summer encephalitis]', 'Tick-borne Far Eastern ensefalitis [ Rusia ensefalitis semi-musim panas ]'),
(348, 'A84.1', 'Central European tick-borne encephalitis', 'Tick-borne Eropa Tengah ensefalitis'),
(349, 'A84.8', 'Other tick-borne viral encephalitis', 'Lain tick-borne ensefalitis viral'),
(350, 'A84.9', 'Tick-borne viral encephalitis, unspecified', 'Tick ??-borne ensefalitis virus , tidak spesifik'),
(351, 'A85.0', 'Enteroviral encephalitis', 'Ensefalitis enterovirus'),
(352, 'A85.1', 'Adenoviral encephalitis', 'Ensefalitis adenoviral'),
(353, 'A85.2', 'Arthropod-borne viral encephalitis, unspecified', 'Arthropod -borne ensefalitis virus , tidak spesifik'),
(354, 'A85.8', 'Other specified viral encephalitis', 'Lain ensefalitis virus tertentu'),
(355, 'A86', 'Unspecified viral encephalitis', 'Ensefalitis virus yang tidak spesifik'),
(356, 'A87.0', 'Enteroviral meningitis', 'Meningitis enterovirus'),
(357, 'A87.1', 'Adenoviral meningitis', 'Meningitis adenoviral'),
(358, 'A87.2', 'Lymphocytic choriomeningitis', 'Choriomeningitis limfositik'),
(359, 'A87.8', 'Other viral meningitis', 'Meningitis viral lainnya'),
(360, 'A87.9', 'Viral meningitis, unspecified', 'Viral meningitis , tidak spesifik'),
(361, 'A88.0', 'Enteroviral exanthematous fever [Boston exanthem]', 'Demam exanthematous enterovirus [ Boston exanthem ]'),
(362, 'A88.1', 'Epidemic vertigo', 'Epidemi vertigo'),
(363, 'A88.8', 'Other specified viral infections of central nervous system', 'Infeksi virus tertentu lainnya dari sistem saraf pusat'),
(364, 'A89', 'Unspecified viral infection of central nervous system', 'Infeksi virus yang tidak spesifik sistem saraf pusat'),
(365, 'A90', 'Dengue fever [classical dengue]', 'Demam berdarah [ dengue klasik ]'),
(366, 'A91', 'Dengue haemorrhagic fever', 'Demam berdarah dengue'),
(367, 'A92.0', 'Chikungunya virus disease', 'Penyakit virus Chikungunya'),
(368, 'A92.1', 'Onyong-nyong fever', 'Demam Onyong - nyong'),
(369, 'A92.2', 'Venezuelan equine fever', 'Demam kuda Venezuela'),
(370, 'A92.3', 'West Nile fever', 'Demam West Nile'),
(371, 'A92.4', 'Rift Valley fever', 'Demam Rift Valley'),
(372, 'A92.8', 'Other specified mosquito-borne viral fevers', 'Demam nyamuk tertentu lainnya viral'),
(373, 'A92.9', 'Mosquito-borne viral fever, unspecified', 'Demam virus nyamuk , tidak spesifik'),
(374, 'A93.0', 'Oropouche virus disease', 'Penyakit virus Oropouche'),
(375, 'A93.1', 'Sandfly fever', 'Demam Sandfly'),
(376, 'A93.2', 'Colorado tick fever', 'Demam kutu Colorado'),
(377, 'A93.8', 'Other specified arthropod-borne viral fevers', 'Demam arthropoda -borne virus tertentu lainnya'),
(378, 'A94', 'Unspecified arthropod-borne viral fever', 'Demam virus arthropoda -borne Unspecified'),
(379, 'A95.0', 'Sylvatic yellow fever', 'Demam kuning sylvatic'),
(380, 'A95.1', 'Urban yellow fever', 'Demam kuning perkotaan'),
(381, 'A95.9', 'Yellow fever, unspecified', 'Demam kuning , tidak spesifik'),
(382, 'A96.0', 'Junin haemorrhagic fever', 'Demam berdarah Junin'),
(383, 'A96.1', 'Machupo haemorrhagic fever', 'Demam berdarah Machupo'),
(384, 'A96.2', 'Lassa fever', 'Demam Lassa'),
(385, 'A96.8', 'Other arenaviral haemorrhagic fevers', 'Demam berdarah arenaviral lainnya'),
(386, 'A96.9', 'Arenaviral haemorrhagic fever, unspecified', 'Demam berdarah Arenaviral , tidak spesifik'),
(387, 'A98.0', 'Crimean-Congo haemorrhagic fever', 'Demam berdarah Krimea - Kongo'),
(388, 'A98.1', 'Omsk haemorrhagic fever', 'Demam berdarah Omsk'),
(389, 'A98.2', 'Kyasanur Forest disease', 'Penyakit Kyasanur Forest'),
(390, 'A98.3', 'Marburg virus disease', 'Penyakit virus Marburg'),
(391, 'A98.4', 'Ebola virus disease', 'Penyakit virus Ebola'),
(392, 'A98.5', 'Haemorrhagic fever with renal syndrome', 'Demam berdarah dengan sindrom renal'),
(393, 'A98.8', 'Other specified viral haemorrhagic fevers', 'Demam berdarah lainnya yang spesifik virus'),
(394, 'A99', 'Unspecified viral haemorrhagic fever', 'Demam berdarah virus yang tidak spesifik');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id_rm` int(11) UNSIGNED NOT NULL,
  `pasien_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` int(10) UNSIGNED DEFAULT NULL,
  `penyakit_id` int(10) UNSIGNED DEFAULT NULL,
  `tindakan_id` int(10) UNSIGNED DEFAULT NULL,
  `validasi` int(11) UNSIGNED DEFAULT NULL,
  `no_rm` varchar(255) DEFAULT NULL,
  `riwayat_penyakit` varchar(255) NOT NULL,
  `riwayat_alergi` varchar(255) NOT NULL,
  `riwayat_pengobatan` varchar(255) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `periksa_bibir_masuk_mulut` varchar(50) DEFAULT NULL,
  `periksa_gigi_geligi` varchar(50) DEFAULT NULL,
  `periksa_lidah` varchar(50) DEFAULT NULL,
  `periksa_langit_langit` varchar(50) DEFAULT NULL,
  `diagnosa` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `tanggal_periksa` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_rm`, `pasien_id`, `dokter_id`, `penyakit_id`, `tindakan_id`, `validasi`, `no_rm`, `riwayat_penyakit`, `riwayat_alergi`, `riwayat_pengobatan`, `keluhan`, `periksa_bibir_masuk_mulut`, `periksa_gigi_geligi`, `periksa_lidah`, `periksa_langit_langit`, `diagnosa`, `catatan`, `tanggal_periksa`, `created_at`, `updated_at`) VALUES
(24, 1, 5, 101, 1, 1, 'RM - 20250508 - 0001', 'diabetes', '-', '-', 'panas', 'normal', 'patah', 'luka', ' normal', 'demam ringan', '-', '2025-05-22', '2025-05-22 03:36:02', '2025-05-22 20:10:22'),
(26, 2, 5, 17, NULL, 0, 'RM - 20250515 - 0002', '-', '-', '-', 'panas,mual', 'normal', 'normal', 'normal', ' normal', 'sakit gigi', '-', '2025-05-23', '2025-05-23 15:38:20', '2025-05-23 15:50:56'),
(27, 4, 5, 321, 3, 1, 'RM - 20250527 - 00-00-03', 'Scalling', '-', 'Scalling', 'Scalling', 'Bagus', '-', 'bagus', 'bagus', 'Scalling', '-', '2025-05-27', '2025-05-27 12:46:16', '2025-05-27 12:51:07'),
(30, 4, 5, 8, NULL, 0, 'RM - 20250527 - 00-00-03', '-', '-', '-', 'panas,mual', 'normal', 'normal', 'normal', 'normal', 'sakit gigi', '-', '2025-05-29', '2025-05-29 13:23:40', '2025-05-29 13:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(11) UNSIGNED NOT NULL,
  `dokter_id` int(11) UNSIGNED NOT NULL,
  `pasien_id` int(11) UNSIGNED NOT NULL,
  `obat_id` int(11) UNSIGNED NOT NULL,
  `rm_id` int(11) UNSIGNED NOT NULL,
  `jumlah_obat` int(11) NOT NULL,
  `dosis` varchar(20) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `aturan_pakai` varchar(100) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status_resep` enum('belum_diberikan','sudah_diberikan') NOT NULL DEFAULT 'belum_diberikan',
  `tanggal_resep` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id_resep`, `dokter_id`, `pasien_id`, `obat_id`, `rm_id`, `jumlah_obat`, `dosis`, `unit`, `aturan_pakai`, `keterangan`, `status_resep`, `tanggal_resep`) VALUES
(43, 5, 1, 2, 24, 1, '2', 'tablet', '1x3', 'setelah makan', 'sudah_diberikan', '2025-05-22 00:00:00'),
(44, 5, 2, 2, 26, 1, '1', 'tablet', '1x3', 'setelah makan', 'sudah_diberikan', '2025-05-23 00:00:00'),
(45, 5, 4, 2, 27, 1, '5mg', '-', '3x1', 'habiskan', 'sudah_diberikan', '2025-05-27 00:00:00'),
(46, 5, 4, 3, 30, 1, '1', 'tablet', '1x3', 'setelah makan', 'sudah_diberikan', '2025-05-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `resumepasien`
--

CREATE TABLE `resumepasien` (
  `id_resume` int(11) UNSIGNED NOT NULL,
  `pasien_id` int(11) UNSIGNED NOT NULL,
  `rm_id` int(11) UNSIGNED NOT NULL,
  `dokter_id` int(11) UNSIGNED NOT NULL,
  `nomer_rm` varchar(50) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tanggal_periksa` datetime DEFAULT NULL,
  `nama_dpjp` varchar(20) NOT NULL,
  `anamnesa` varchar(30) NOT NULL,
  `diagnosa` varchar(30) NOT NULL,
  `catatan` varchar(30) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `resumepasien`
--

INSERT INTO `resumepasien` (`id_resume`, `pasien_id`, `rm_id`, `dokter_id`, `nomer_rm`, `nama_lengkap`, `tanggal_lahir`, `tanggal_periksa`, `nama_dpjp`, `anamnesa`, `diagnosa`, `catatan`, `created_at`, `updated_at`) VALUES
(5, 1, 24, 5, 'RM - 20250508 - 0001', 'Diana Purbaningsih', '2017-03-01', '2025-05-22 00:00:00', 'drg. adinda maharani', 'panas', 'demam ringan', '-', '2025-05-22 07:56:44', '2025-05-22 20:10:22'),
(6, 2, 26, 5, 'RM - 20250515 - 0002', 'Arifin Rizal', '1996-11-14', '2025-05-23 00:00:00', 'drg. adinda maharani', 'panas,mual', 'sakit gigi', '-', '2025-05-23 15:50:56', '2025-05-23 15:50:56'),
(7, 4, 27, 5, 'RM - 20250527 - 00-00-03', 'M Nafis Riskillah', '2003-08-01', '2025-05-27 00:00:00', 'drg. adinda maharani', 'Scalling', 'Scalling', '-', '2025-05-27 12:51:07', '2025-05-27 12:51:07'),
(9, 4, 30, 5, 'RM - 20250527 - 00-00-03', 'M Nafis Riskillah', '2003-08-01', '2025-05-29 00:00:00', 'drg. adinda maharani', 'panas,mual', 'sakit gigi', '-', '2025-05-29 13:24:16', '2025-05-29 13:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `id_tindakan` int(11) UNSIGNED NOT NULL,
  `kode_tindakan` varchar(10) NOT NULL,
  `nama_tindakan` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`id_tindakan`, `kode_tindakan`, `nama_tindakan`, `harga`) VALUES
(1, 'TDK001', 'Tambal Gigi', 150000.00),
(2, 'TDK002', 'Cabut Gigi', 200000.00),
(3, 'TDK003', 'Pembersihan Karang Gigi', 200000.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jenis_kelamin_id` int(11) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('1','2','3') NOT NULL DEFAULT '2',
  `foto` varchar(255) NOT NULL DEFAULT 'clinic/assets/admin.png',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `no_hp`, `email`, `jenis_kelamin_id`, `password`, `role`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin ', '081234567890', 'admin@gmail.com', 1, '$2y$10$K1p2OqPrDs6vghsh8seSD.HSszB0ODIpj4HCqopHJa2gg8fOKRIjO', '2', 'clinic/assets/admin.png', '2025-05-07 16:48:03', '2025-05-23 14:19:20'),
(4, 'adinda maharani', 'Drg. Adinda Maharani', '081234567890', 'dokter@gmail.com', 2, '$2y$10$DjYfxE9cTT85ZqqtvwmPEeITZm0RRpuv63Pg7J2oUPKMoPIDOieta', '1', 'clinic/assets/dentist.png', '2025-05-22 15:29:02', '2025-05-22 19:29:15'),
(5, 'staff', 'Staff', '098767896535', 'staff@gmail.com', 1, '$2y$10$t.UaDyEaqALocv5FJfnNS.6OUa7oTX0F.ZzBIE4bsZj9fVy9aYKH6', '3', 'clinic/assets/admin.png', '2025-05-23 15:21:27', '2025-05-23 15:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `validasi_tindakan`
--

CREATE TABLE `validasi_tindakan` (
  `id_validasi` int(11) UNSIGNED NOT NULL,
  `rm_id` int(11) UNSIGNED NOT NULL,
  `tindakan_id` int(11) UNSIGNED DEFAULT NULL,
  `validasi` enum('0','1') NOT NULL COMMENT '1 = setuju, 0 = tidak setuju',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `validasi_tindakan`
--

INSERT INTO `validasi_tindakan` (`id_validasi`, `rm_id`, `tindakan_id`, `validasi`, `created_at`, `updated_at`) VALUES
(24, 24, 1, '1', '2025-05-22 07:56:44', '2025-05-22 20:10:22'),
(26, 26, NULL, '', '2025-05-23 15:50:56', '2025-05-23 15:50:56'),
(27, 27, 3, '1', '2025-05-27 12:51:07', '2025-05-27 12:51:07'),
(29, 30, NULL, '', '2025-05-29 13:24:16', '2025-05-29 13:24:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `antrian_pasien_id_foreign` (`pasien_id`),
  ADD KEY `antrian_rm_id_foreign` (`rm_id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD UNIQUE KEY `kode_dokter` (`kode_dokter`);

--
-- Indexes for table `formulir_tindakan`
--
ALTER TABLE `formulir_tindakan`
  ADD PRIMARY KEY (`id_formulir`),
  ADD KEY `formulir_tindakan_pasien_id_foreign` (`pasien_id`),
  ADD KEY `formulir_tindakan_tindakan_id_foreign` (`tindakan_id`);

--
-- Indexes for table `informed_consent`
--
ALTER TABLE `informed_consent`
  ADD PRIMARY KEY (`id_consent`),
  ADD KEY `informed_consent_pasien_id_foreign` (`pasien_id`),
  ADD KEY `informed_consent_tindakan_id_foreign` (`tindakan_id`),
  ADD KEY `informed_consent_dokter_id_foreign` (`dokter_id`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jenis_kelamin`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `odontogram`
--
ALTER TABLE `odontogram`
  ADD PRIMARY KEY (`id_odontogram`),
  ADD KEY `fk_pasien` (`pasien_id`),
  ADD KEY `fk_rekam_medis` (`rm_id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD UNIQUE KEY `nomor_rekam_medis` (`nomor_rekam_medis`),
  ADD KEY `pasien_jenis_kelamin_id_foreign` (`jenis_kelamin_id`),
  ADD KEY `pasien_agama_id_foreign` (`agama_id`),
  ADD KEY `pasien_pendidikan_id_foreign` (`pendidikan_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`),
  ADD UNIQUE KEY `no_bayar` (`no_bayar`),
  ADD KEY `pembayaran_pasien_id_foreign` (`pasien_id`),
  ADD KEY `pembayaran_tindakan_id_foreign` (`tindakan_id`),
  ADD KEY `pembayaran_obat_id_foreign` (`obat_id`),
  ADD KEY `pembayaran_resep_id_foreign` (`resep_id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `rekam_medis_pasien_id_foreign` (`pasien_id`),
  ADD KEY `rekam_medis_dokter_id_foreign` (`dokter_id`),
  ADD KEY `rekam_medis_penyakit_id_foreign` (`penyakit_id`),
  ADD KEY `rekam_medis_tindakan_id_foreign` (`tindakan_id`),
  ADD KEY `fk_validasi_tindakan` (`validasi`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `resep_pasien_id_foreign` (`pasien_id`),
  ADD KEY `resep_dokter_id_foreign` (`dokter_id`),
  ADD KEY `resep_obat_id_foreign` (`obat_id`),
  ADD KEY `fk_resep_rm` (`rm_id`);

--
-- Indexes for table `resumepasien`
--
ALTER TABLE `resumepasien`
  ADD PRIMARY KEY (`id_resume`),
  ADD KEY `resumePasien_pasien_id_foreign` (`pasien_id`),
  ADD KEY `resumePasien_rm_id_foreign` (`rm_id`),
  ADD KEY `resumePasien_dokter_id_foreign` (`dokter_id`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id_tindakan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_jenis_kelamin` (`jenis_kelamin_id`);

--
-- Indexes for table `validasi_tindakan`
--
ALTER TABLE `validasi_tindakan`
  ADD PRIMARY KEY (`id_validasi`),
  ADD KEY `tindakan_id` (`tindakan_id`),
  ADD KEY `fk_rekam` (`rm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `formulir_tindakan`
--
ALTER TABLE `formulir_tindakan`
  MODIFY `id_formulir` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `informed_consent`
--
ALTER TABLE `informed_consent`
  MODIFY `id_consent` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id_jenis_kelamin` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `odontogram`
--
ALTER TABLE `odontogram`
  MODIFY `id_odontogram` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id_rm` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `resumepasien`
--
ALTER TABLE `resumepasien`
  MODIFY `id_resume` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id_tindakan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `validasi_tindakan`
--
ALTER TABLE `validasi_tindakan`
  MODIFY `id_validasi` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `antrian_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `antrian_rm_id_foreign` FOREIGN KEY (`rm_id`) REFERENCES `rekam_medis` (`id_rm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `formulir_tindakan`
--
ALTER TABLE `formulir_tindakan`
  ADD CONSTRAINT `formulir_tindakan_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formulir_tindakan_tindakan_id_foreign` FOREIGN KEY (`tindakan_id`) REFERENCES `tindakan` (`id_tindakan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `informed_consent`
--
ALTER TABLE `informed_consent`
  ADD CONSTRAINT `informed_consent_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `informed_consent_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `informed_consent_tindakan_id_foreign` FOREIGN KEY (`tindakan_id`) REFERENCES `tindakan` (`id_tindakan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `odontogram`
--
ALTER TABLE `odontogram`
  ADD CONSTRAINT `fk_pasien` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rekam_medis` FOREIGN KEY (`rm_id`) REFERENCES `rekam_medis` (`id_rm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_agama_id_foreign` FOREIGN KEY (`agama_id`) REFERENCES `agama` (`id_agama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pasien_jenis_kelamin_id_foreign` FOREIGN KEY (`jenis_kelamin_id`) REFERENCES `jenis_kelamin` (`id_jenis_kelamin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pasien_pendidikan_id_foreign` FOREIGN KEY (`pendidikan_id`) REFERENCES `pendidikan` (`id_pendidikan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_resep_id_foreign` FOREIGN KEY (`resep_id`) REFERENCES `resep` (`id_resep`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_tindakan_id_foreign` FOREIGN KEY (`tindakan_id`) REFERENCES `tindakan` (`id_tindakan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `rekam_medis_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rekam_medis_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rekam_medis_penyakit_id_foreign` FOREIGN KEY (`penyakit_id`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rekam_medis_tindakan_id_foreign` FOREIGN KEY (`tindakan_id`) REFERENCES `tindakan` (`id_tindakan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `fk_resep_rm` FOREIGN KEY (`rm_id`) REFERENCES `rekam_medis` (`id_rm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resep_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resep_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resep_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resumepasien`
--
ALTER TABLE `resumepasien`
  ADD CONSTRAINT `resumePasien_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resumePasien_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resumePasien_rm_id_foreign` FOREIGN KEY (`rm_id`) REFERENCES `rekam_medis` (`id_rm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_jenis_kelamin` FOREIGN KEY (`jenis_kelamin_id`) REFERENCES `jenis_kelamin` (`id_jenis_kelamin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `validasi_tindakan`
--
ALTER TABLE `validasi_tindakan`
  ADD CONSTRAINT `fk_rekam` FOREIGN KEY (`rm_id`) REFERENCES `rekam_medis` (`id_rm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `validasi_tindakan_ibfk_1` FOREIGN KEY (`tindakan_id`) REFERENCES `tindakan` (`id_tindakan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
