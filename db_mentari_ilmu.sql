-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Agu 2019 pada 04.25
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mentari_ilmu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_artikel`
--

CREATE TABLE `tbl_artikel` (
  `id_artikel` int(10) NOT NULL,
  `id_sekolah` varchar(10) DEFAULT NULL,
  `judul_artikel` varchar(100) DEFAULT NULL,
  `isi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `status` varchar(1) NOT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_artikel`
--

INSERT INTO `tbl_artikel` (`id_artikel`, `id_sekolah`, `judul_artikel`, `isi`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`, `value`) VALUES
(24, '16', 'Kasus Sindrom Putri Tidur di  oom', '<span>Tidak seindah namanya,&nbsp;<a target="_blank" rel="nofollow" href="https://www.sehatq.com/penyakit/kleine-levin-syndrome?utm_source=artikel&amp;utm_medium=artikel&amp;utm_campaign=internallink">Kleine-Levin syndrome&nbsp;</a>atau sindrom putri tidur memaksa pengidapnya untuk tertidur dalam jangka waktu yang sangat panjang. Bukannya terlihat cantik, penderitanya malah mendapatkan banyak efek negatif dari sindrom putri tidur.</span><span>Pekerjaan, kehidupan sosial, pelajaran sekolah, dan aktivitas normal lainnya menjadi sulit dilakukan dan bahkan terbengkalai.&nbsp;<a target="_blank" rel="nofollow" href="https://www.sehatq.com/artikel/panduan-lengkap-memahami-gangguan-tidur-anda?utm_source=artikel&amp;utm_medium=artikel&amp;utm_campaign=internallink">Gangguan tidur</a>&nbsp;yang langka ini tidak hanya terjadi di luar negeri tetapi juga muncul di Indonesia.</span><h2>Kisah sindrom putri tidur di Indonesia</h2>Siti Raida Miranda atau yang biasa dipanggil oleh orang-orang sekitarnya sebagai Echa sudah tiga kali mengalami tidur yang berkepanjangan. Remaja perempuan berusia 13 tahun yang berasal dari Banjarmasin ini pernah tertidur selama hampir dua minggu.Orangtua Echa dengan sabar memandikan dan menyuapinya makanan selama masa ia tertidur. Saat terbangun, remaja perempuan tersebut hanya diam dan tidak memberikan respons apapun. Tidur yang berkepanjangan juga membuat Echa ketinggalan banyak materi sekolah.Pemeriksaan&nbsp;CT scan&nbsp;dan&nbsp;MRI&nbsp;sudah ditempuh untuk mengetahui keanehan yang terjadi, tetapi dari pemeriksaan yang dilakukan tidak terdapat kejanggalan pada otak Echa.Dokter telah memberikan Echa beberapa obat stimulan untuk membantu mengatasi suasana hatinya. Meskipun demikian, sampai sekarang Echa masih dalam pemeriksaan lebih lanjut mengenai apa yang terjadi pada dirinya.Namun, Echa diduga mengalami sindrom putri tidur yang membuatnya bisa terlelap dalam jangka panjang.<h2>Bagaimana cara mengetahui sindrom putri tidur?</h2><span>Sindrom putri tidur bukanlah gangguan yang mudah untuk diketahui karena terkadang tanda dari sindrom putri tidur hampir serupa dengan gejala&nbsp;<a target="_blank" rel="nofollow" href="https://www.sehatq.com/artikel/stigma-gangguan-mental?utm_source=artikel&amp;utm_medium=artikel&amp;utm_campaign=internallink">gangguan mental</a>&nbsp;lainnya. Bahkan terkadang dibutuhkan waktu kurang lebih empat tahun untuk mengetahuinya secara pasti.</span>Pemeriksaan sindrom putri tidur memerlukan banyak proses untuk mengeliminasi kemungkinan gangguan atau penyakit lainnya. Pemeriksaannya meliputi mempelajari pola tidur, tes&nbsp;MRI, &nbsp;tes pencitraan, pemeriksaan kesehatan mental,&nbsp;CT scan, dan pemeriksaan darah.<h2>Apakah ada cara untuk mengobati sindrom putri tidur?</h2><span>Sampai saat ini belum ada pengobatan yang efektif untuk menanggulangi sindrom putri tidur. Obat-obatan yang diberikan umumnya adalah obat-obat stimulan, seperti&nbsp;<a target="_blank" rel="nofollow" href="https://www.sehatq.com/obat/modafinil?utm_source=artikel&amp;utm_medium=artikel&amp;utm_campaign=internallink">modafinil</a>,&nbsp;<a target="_blank" rel="nofollow" href="https://www.sehatq.com/obat/amphetamine?utm_source=artikel&amp;utm_medium=artikel&amp;utm_campaign=internallink">amphetamin</a>, dan metilfenidat.</span>Obat-obatan tersebut bertujuan untuk mengatasi rasa kantuk yang timbul akibat sindrom putri tidur. Namun, obat stimulan yang diberikan tidak mampu mengubah fungsi kognitif yang terjadi. Selain itu, terdapat juga efek samping dari obat yang dikonsumsi berupa lebih mudah kesal.<span>Terkadang, obat-obatan untuk mengatasi suasana hati, seperti&nbsp;<a target="_blank" rel="nofollow" href="https://www.sehatq.com/obat/carbamazepine?utm_source=artikel&amp;utm_medium=artikel&amp;utm_campaign=internallink">carbamazepine</a>&nbsp;dan&nbsp;<a target="_blank" rel="nofollow" href="https://www.sehatq.com/obat/lithium?utm_source=artikel&amp;utm_medium=artikel&amp;utm_campaign=internallink">litium</a>&nbsp;juga diresepkan untuk mencegah kemunculan sindrom putri tidur.</span>', '2019-08-03 12:06:49', '2019-08-03 19:19:34', '1', '1', '1', 'e37fa6b7708099afb0354ffd4c4a19a6.png'),
(25, '1', 'Tes', 'asdasasdasdasdasdas', '2019-08-08 16:44:10', NULL, '1', NULL, '1', NULL),
(26, '1', 'tes', 'asdasdasdasd', '2019-08-08 17:27:41', '2019-08-09 01:15:57', '1', '1', '0', NULL),
(27, '1', 'asdasdas', 'asdasdasd', '2019-08-08 17:27:48', NULL, '1', NULL, '1', NULL),
(28, '1', 'asdasdasd', 'asdasdasda', '2019-08-08 17:27:56', '2019-08-09 01:16:02', '1', '1', '0', NULL),
(29, '1', 'sadasd', 'asdas', '2019-08-08 17:28:40', NULL, '1', NULL, '1', NULL),
(30, '1', 'asdasda', 'asdasda', '2019-08-08 17:28:46', NULL, '1', NULL, '1', NULL),
(31, '16', 'Tes dong boy', 'sada', '2019-08-15 06:28:45', '2019-08-15 13:30:16', '11', '11', '1', '980276d2bb7f26137845c15548fcde0a.png'),
(32, '16', 'Tes dong boy', 'asdasda', '2019-08-15 07:53:59', NULL, '11', NULL, '1', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ekskul`
--

CREATE TABLE `tbl_ekskul` (
  `id_ekskul` int(11) NOT NULL,
  `id_sekolah` varchar(10) DEFAULT NULL,
  `nama__ekskul` varchar(100) DEFAULT NULL,
  `deskripsi__ekskul` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `id_faq` int(10) NOT NULL,
  `pertanyaan` text,
  `jawaban` text,
  `id_sekolah` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_faq`
--

INSERT INTO `tbl_faq` (`id_faq`, `pertanyaan`, `jawaban`, `id_sekolah`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(1, 'Mengapa??', 'Karena', '1', '2019-07-21 12:11:07', '2019-07-21 19:13:23', '1', '1', '0'),
(2, 'Bagaimana Cara?', 'Yaitu Karena Itulah', '16', '2019-07-21 12:13:59', '2019-07-21 19:17:45', '1', '1', '0'),
(3, 'Bagaimana Cara Agar Kita Dapat?', 'Yaitu Karena Itulah Semuanya bisa terjadi', '16', '2019-07-21 12:17:40', '2019-07-21 19:18:15', '1', '1', '1'),
(4, 'Bagaimana Cara?', 'Yaitu Karena Itulah', '1', '2019-08-15 04:33:17', NULL, '2', NULL, '1'),
(5, 'Bagaimana Cara Agar boy?', 'Yaitu Karena Itulah Semuanya bisa terjadi', '17', '2019-08-15 04:33:37', '2019-08-15 11:35:05', '10', '10', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_fasilitas`
--

CREATE TABLE `tbl_fasilitas` (
  `id_fasilitas` int(10) NOT NULL,
  `id_sekolah` varchar(10) DEFAULT NULL,
  `nama_fasilitas` varchar(255) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_fasilitas`
--

INSERT INTO `tbl_fasilitas` (`id_fasilitas`, `id_sekolah`, `nama_fasilitas`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `value`) VALUES
(9, '16', 'Ruang Biologay', '1', '2019-08-03 11:58:43', '2019-08-03 18:59:46', '1', '1', '5518c8101d12ed1be63f51e043fb3d20.jpg'),
(10, '1', 'tes', '1', '2019-08-03 11:59:01', NULL, '1', NULL, 'e62648f115e9f8f7cccf2e04d31c9849.png'),
(11, '1', 'tes', '0', '2019-08-08 16:53:12', '2019-08-08 23:53:23', '1', '1', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_file`
--

CREATE TABLE `tbl_file` (
  `id_file` int(10) NOT NULL,
  `id_sekolah` varchar(10) DEFAULT NULL,
  `value` text,
  `status` varchar(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_galeri`
--

CREATE TABLE `tbl_galeri` (
  `id_galeri` int(10) NOT NULL,
  `id_sekolah` varchar(10) DEFAULT NULL,
  `value` text,
  `id_ref` varchar(10) DEFAULT NULL,
  `ket` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_galeri`
--

INSERT INTO `tbl_galeri` (`id_galeri`, `id_sekolah`, `value`, `id_ref`, `ket`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(6, '1', 'e44d1a482a7a2386a36229952c2dbede.jpg', '20', 'Artikel', '2019-07-26 17:07:48', '2019-07-27 00:09:23', '1', '1', '1'),
(7, '1', 'bffd0ff4e82eca83c8984f2010639c8e.jpg', '21', 'Artikel', '2019-07-26 17:10:12', NULL, '1', NULL, '1'),
(8, '16', 'dc51dab702c4ec83a82d2f9aef21c096.jpg', '1', 'Fasilitas', '2019-07-26 18:23:58', NULL, '1', NULL, '1'),
(9, '16', '9eecb0f081ef5fcfc6d4c9a0ee727494.jpg', '5', 'Fasilitas', '2019-07-26 18:24:51', NULL, '1', NULL, '1'),
(10, '', 'a24c8bfa7e733280c9e53cac251dfea9.png', '2', 'Pengumuman', '2019-08-03 08:43:19', NULL, '1', NULL, '1'),
(11, '', '448cec0a9311158add04262bb632a772.png', '4', 'Pengumuman', '2019-08-03 08:54:03', NULL, '1', NULL, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_sekolah` varchar(10) DEFAULT NULL,
  `nama_kegiatan` varchar(100) DEFAULT NULL,
  `deskripsi_kegiatan` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `id_sekolah`, `nama_kegiatan`, `deskripsi_kegiatan`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(8, '17', 'Kedisiplinan', '<ul><li>Upacara Bendera</li><li>Tadabur Alam dan Outbound Kreatif (The TABUK)</li><li><i>Field Trip</i></li><li><i>Super Camp</i></li></ul>', '2019-08-15 09:01:51', NULL, '10', NULL, '1'),
(9, '17', 'Kemandirian', '<ul><li>Pembiasaan budaya 5S, bersih rapi, tertib, dan hemat</li><li>Pembiasaan adab-adab islami harian</li><li>Mutabaah Yaumiyah</li><li>Mentari Ilmu Bergizi (MIB)</li></ul>', '2019-08-15 09:02:46', NULL, '10', NULL, '1'),
(10, '17', 'Pembiasaan ibadah dan peningkatan ruhiah', '<ul><li>Peringatan Hari Besar Islam (PHBI)</li><li>Tarhib Ramadhan</li><li>Pesantren Ramadhan</li><li>Malam Bina Iman dan Taqwa (MABIT)<br></li><li><span>Pembiasaan sholat wajib, sholat sunnah, dzikir dan doa<br></span></li></ul>', '2019-08-15 09:03:32', '2019-08-15 16:07:20', '10', '10', '1'),
(11, '17', 'Enterpreneurship', '<ul><li><i>Market Day</i></li><li><i>Open House</i></li></ul>', '2019-08-15 09:09:42', NULL, '10', NULL, '1'),
(12, '17', 'Kepedulian', '<ul><li>MI-Peduli (Bhakti Sosial)</li><li><i>Free For Palestine</i></li><li><i>Home visit</i></li></ul>', '2019-08-15 09:10:19', NULL, '10', NULL, '1'),
(13, '17', 'Kecakapan abad 21', '<ul><li>The best literation</li><li>PBM Berkualitas</li><li>Outing tematik</li></ul>', '2019-08-15 09:11:56', NULL, '10', NULL, '1'),
(14, '17', 'Tahfidz Al-Qur’an', '<ul><li>Mapel Tahfidz</li><li>FLC Tahfidz</li><li>Ujian satu juz</li></ul>', '2019-08-15 09:12:26', NULL, '10', NULL, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengumuman`
--

CREATE TABLE `tbl_pengumuman` (
  `id_pengumuman` int(10) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `isi_pengumuman` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `status` varchar(1) NOT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengumuman`
--

INSERT INTO `tbl_pengumuman` (`id_pengumuman`, `judul`, `isi_pengumuman`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`, `value`) VALUES
(6, 'Recruitment', '<span>Tidak seindah namanya,&nbsp;<a target="_blank" rel="nofollow" href="https://www.sehatq.com/penyakit/kleine-levin-syndrome?utm_source=artikel&amp;utm_medium=artikel&amp;utm_campaign=internallink">Kleine-Levin syndrome&nbsp;</a>atau sindrom putri tidur memaksa pengidapnya untuk tertidur dalam jangka waktu yang sangat panjang. Bukannya terlihat cantik, penderitanya malah mendapatkan banyak efek negatif dari sindrom putri tidur.</span><span>Pekerjaan, kehidupan sosial, pelajaran sekolah, dan aktivitas normal lainnya menjadi sulit dilakukan dan bahkan terbengkalai.&nbsp;<a target="_blank" rel="nofollow" href="https://www.sehatq.com/artikel/panduan-lengkap-memahami-gangguan-tidur-anda?utm_source=artikel&amp;utm_medium=artikel&amp;utm_campaign=internallink">Gangguan tidur</a>&nbsp;yang langka ini tidak hanya terjadi di luar negeri tetapi juga muncul di Indonesia.</span><h2>Kisah sindrom putri tidur di Indonesia</h2>', '2019-08-03 12:29:02', '2019-08-03 19:34:14', '1', '1', '1', '02dec47be3e0946f406bc8d2de03f8b3.png'),
(7, 'Sapa Warga Boss', 'asdkjasgdhasjhfdskjfdhsjf aksjdhasjkdnasd,a nsadla jkasndajksd asdkjasgdhasjhfdskjfdhsjf aksjdhasjkdnasd,a nsadla jkasndajksdasdkjasgdhasjhfdskjfdhsjf aksjdhasjkdnasd,a nsadla jkasndajksdasdkjasgdhasjhfdskjfdhsjf aksjdhasjkdnasd,a nsadla&nbsp;', '2019-08-03 12:34:45', '2019-08-03 19:35:38', '1', '1', '1', '1b66fcf6986674f83bdef849991f9cfc.png'),
(8, 'asdas', 'asdasdasda', '2019-08-08 16:56:41', '2019-08-08 23:56:49', '1', '1', '0', NULL),
(9, 'tes', 'asdasda', '2019-08-16 13:18:27', NULL, '1', NULL, '1', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_profil`
--

CREATE TABLE `tbl_profil` (
  `id_profil` int(11) NOT NULL,
  `id_sekolah` varchar(10) DEFAULT NULL,
  `visi` text,
  `misi` text,
  `motto` text,
  `selayang_pandang` text,
  `created_by` datetime DEFAULT NULL,
  `updated_by` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_profil`
--

INSERT INTO `tbl_profil` (`id_profil`, `id_sekolah`, `visi`, `misi`, `motto`, `selayang_pandang`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, '17', 'cok', 'cok', 'cok', 'cok', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, '0'),
(2, '1', 't', 'e', 'e', 'a', '0000-00-00 00:00:00', NULL, NULL, NULL, '1'),
(3, '17', 'v', 'm', 'm', 'sp', '0000-00-00 00:00:00', NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sekolah`
--

CREATE TABLE `tbl_sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `kontak` varchar(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sekolah`
--

INSERT INTO `tbl_sekolah` (`id_sekolah`, `nama`, `alamat`, `kontak`, `email`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'SMP IT Mentari Ilmu', 'Jl. Soka No. 25 Guro 2 Karawang', '(0267) 845315', 'mentariilmu@yahoo.com', '1', NULL, '2019-07-21 02:29:15', '2019-08-16 12:39:07', '1'),
(16, 'SMA IT Mentari Ilmu', 'Jl. Perum Karaba Indah 1 Kp. Pintu Air Wadas', '(0267) 840333', 'smait.mentariilmu@gmail.com', '1', '1', '2019-07-21 07:22:30', '2019-08-16 12:38:21', '1'),
(17, 'SD IT Mentari Ilmu Karaba', 'Jl. Perum Karaba Indah 1 Kp. Pintu Air Wadas', '(0267) 840333', 'smait.mentariilmu@gmail.com', '1', '1', '2019-07-21 07:30:43', '2019-08-16 12:36:23', '1'),
(18, 'SD IT Mentari Ilmu Jatisari', 'Jl. Raya Jatisari Sukamaju Dsn. 2 RT001/RW004 Ds. Jatisari Kec. Jatisari Kab. Karawang 41374', '-', 'sdit_mentariilmu@yahoo.co.id', NULL, NULL, '2019-08-16 12:37:49', '2019-08-16 12:39:39', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tamu`
--

CREATE TABLE `tbl_tamu` (
  `id_tamu` int(10) NOT NULL,
  `nama_tamu` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `kontak` varchar(13) DEFAULT NULL,
  `pesan` text,
  `status` varchar(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tamu`
--

INSERT INTO `tbl_tamu` (`id_tamu`, `nama_tamu`, `email`, `kontak`, `pesan`, `status`, `created_at`, `updated_at`, `updated_by`) VALUES
(2, 'Nendi Febriyanto', 'nendi908@gmail.com', '087667687687', 'Cek 1 2 3', '0', '2019-08-02 06:16:18', '2019-08-02 13:27:21', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tata_tertib`
--

CREATE TABLE `tbl_tata_tertib` (
  `id_tata_tertib` int(10) NOT NULL,
  `id_sekolah` varchar(9) DEFAULT NULL,
  `isi_tata_tertib` text,
  `status` varchar(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tata_tertib`
--

INSERT INTO `tbl_tata_tertib` (`id_tata_tertib`, `id_sekolah`, `isi_tata_tertib`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(4, '17', '<div>\r\n\r\n<span>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Siswa hadir\r\npaling lambat pukul 06.50 WIB untuk hari senin. Hari\r\nselasa sampai jumat paling lambat pukul 07.00 WIB.</span>\r\n\r\n<br><span>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bila siswa sakit\r\natau ada hal yang harus meninggalkan sekolah, maka wajib memberitahu wali\r\nkelas.</span>\r\n\r\n<br><span>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Siswa membawa\r\nperlengkapan shalat, peralatan gosok gigi, dan bekal makanan.</span>\r\n\r\n<br><span>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Siswa tidak\r\nmemakai perhiasan berlebihan, putri hanya boleh memakai anting.</span>\r\n\r\n<br><span>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\nSiswa tidak membawa peralatan\r\npermainan yang berbahaya kecuali mendapat ijin guru.</span>\r\n\r\n<br><span>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\nSiswa wajib ikut merawat sarana dan prasarana sekolah.</span>\r\n\r\n<br><span>7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\nSiswa tidak keluar dari lingkungan\r\nsekolah selama jam sekolah.</span>\r\n\r\n<br><span>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\nSiswa membiasakan diri\r\nmengucapkan salam ketika bertemu teman, guru, karyawan, dan sesamanya juga\r\nketika memasuki/keluar ruang kelas/guru.</span>\r\n\r\n<br><span>9.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\nSiswa bersikap jujur, sopan, dan disiplin, baik\r\nperkataan maupun perbuatan.</span>\r\n\r\n<br><span>10.&nbsp;&nbsp;\r\nSiswa memperhatikan dan mendengarkan bila ada yang\r\nberbicara di hadapannya.</span>\r\n\r\n<br><span>11.&nbsp;&nbsp;\r\nSiswa membuang sampah pada tempat yang disediakan.</span>\r\n\r\n<br><span>12.&nbsp;&nbsp;\r\nTidak boleh membawa HP.</span>\r\n\r\n<br><span>13.&nbsp;&nbsp;\r\nSiswa dilarang jual beli makanan, minuman, dan mainan\r\npada saat jam pelajaran. <br></span>\r\n\r\n<span>14.&nbsp;&nbsp;\r\nSiswa wajib menghormati yang lebih tua dan menyayangi\r\nyang lebih muda.</span>\r\n\r\n<br><span>15.&nbsp; Siswa dilarang\r\nmelakukan transaksi jual beli di lingkungan sekolah</span>\r\n\r\n</div>\r\n\r\n<br>', '1', '2019-08-15 03:31:47', NULL, '1', NULL),
(5, '1', '<span>a.&nbsp;&nbsp;&nbsp;&nbsp; Menjalankan\r\nkewajiban seorang muslim</span>\r\n\r\n<br><span>b.&nbsp;&nbsp;&nbsp;&nbsp; Disiplin\r\ndalam hal waktu, penampilan, pakaian, dan belajar di sekolah</span>\r\n\r\n<br><span>c.&nbsp;&nbsp;&nbsp;&nbsp; Mengerjakan\r\ntugas tepat waktu</span>\r\n\r\n<br><span>d.&nbsp;&nbsp;&nbsp;&nbsp; Mengikuti\r\nsemua program sekolah</span>\r\n\r\n<br><span>e.&nbsp;&nbsp;&nbsp;&nbsp; Menjaga\r\nlisan dari perkataan tercela (kotor, kasar, dan jorok)</span>\r\n\r\n<br><span>f.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Menjaga\r\nhijab/jarak dalam berinteraksi dengan lawan jenis (sms/telepon gombal,\r\nintens/pacaran)</span>\r\n\r\n<br><span>g.&nbsp;&nbsp;&nbsp;&nbsp; Memelihara\r\ntubuh dari hal yang merusak kesehatan (merokok, miras, narkoba).</span>\r\n\r\n<br><span>h.&nbsp;&nbsp;&nbsp;&nbsp; Menjaga\r\ndiri dari perbuatan maksiat (zina, kekerasan fisik/kriminal)</span>\r\n\r\n<br><span>i.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menyayangi\r\ndan menghormati guru, teman, tamu, dan keluarga besar Mentari Ilmu baik yang\r\nmuda maupun yang tua.</span>\r\n\r\n<br><span>j.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Menciptakan\r\nkeamanan,kenyamanan, dan keteraturan lingkungan.</span>\r\n\r\n<br><span>k.&nbsp;&nbsp;&nbsp;&nbsp; Memelihara\r\ndan menjaga fasilitas sekolah dan umum</span>', '1', '2019-08-15 04:02:53', NULL, '2', NULL),
(6, '16', '<div>1. Datang ke sekolah sebelum bel masuk berbunyi, bel masuk pukul 06.45 (Senin) dan pukul 07.00 (Selasa-Jumat). Peserta didik&nbsp; yang dating tidak tepat waktu akan dinyatakan terlambat dengan alasan apapun.<br>2. Peserta didik berpakaian rapi sesuai standar yang telah ditetapkan.<br>3. Menghentikan kegiatan ketika adzan berkumandang dan bersegera menuju masjid<br>4. Peserta didik boleh membawa HP dengan ketentuan:<br>&nbsp; &nbsp; a. HP tidak berkamera dan tidak terinstall Bluetooth</div><div><div>&nbsp; &nbsp; b. HP dititipkan di kantor sebelum masuk kelas dan dibawa setelah jam sekolah selesai<br>5. Peserta didik diperkenankan membawa laptop atas instruksi guru mata pelajaran yang bersangkutan dan dipergunakan hanya saat KBM berlangsung. (di lemari kelas/kunci oleh wali kelas)<br>6. Peserta didik diperbolehkan mengendarai kendaraan bermotor jika sudah memiliki SIM</div><div>7. Peserta didik hanya membawa barang yang berhubungan dengan kegiatan belajar mengajar</div><div>8. Pulang tepat waktu<br>9. Jika peserta didik melanggar ketentuan di atas maka peserta didik akan mendapatkan konsekuensi berupa pembimbingan, peringatan lisan, tulisan, SP 1, SP II, &amp; SP III.</div></div>', '1', '2019-08-15 04:09:20', '2019-08-15 11:09:53', '11', '11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(10) NOT NULL,
  `id_sekolah` varchar(10) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jk` varchar(1) NOT NULL,
  `kontak` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role_user` varchar(1) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `id_sekolah`, `nama`, `username`, `password`, `alamat`, `jk`, `kontak`, `email`, `role_user`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '0', 'Super Admin', 'sa_tikkom', '81dc9bdb52d04dc20036dbd8313ed055', 'Perum. Grand Mutiara Blok. I12 No. 03', 'L', '089657141283', 'fazri.rramadhanh@gmail.com', '1', '1', NULL, '1', '2019-07-21 08:20:47', '2019-08-16 06:28:41'),
(2, '1', 'Guru 1', 'adminsmp', '202cb962ac59075b964b07152d234b70', 'Karawang', 'L', '089657141288', '-', '2', '1', '1', NULL, '2019-07-21 08:20:47', '2019-08-15 04:01:25'),
(3, '2', 'Guru 2', 'guru2', '202cb962ac59075b964b07152d234b70', 'Karawang', 'P', '085647768771', '-', '2', '1', '1', NULL, '2019-07-21 08:20:47', '2019-07-21 08:24:45'),
(9, '1', 'ceko', 'ceko', '202cb962ac59075b964b07152d234b70', 'ceko', 'P', '08769', 'ceko', '2', '1', '1', '1', '2019-07-21 09:45:02', '2019-07-21 09:48:20'),
(10, '17', 'Egi Mulyanto', 'adminsd', '202cb962ac59075b964b07152d234b70', 'kalawang', 'L', '089657141283', 'egi.mulyanz@gmail.com', '2', '1', '1', '1', '2019-07-21 09:54:38', '2019-08-15 04:01:42'),
(11, '16', 'Habib Nur Alamsyah', 'adminsma', '202cb962ac59075b964b07152d234b70', 'Tes', 'L', '089657141283', 'habibnuralamsyah92@gmail.com', '2', '1', '1', NULL, '2019-08-15 04:04:42', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_video`
--

CREATE TABLE `tbl_video` (
  `id_video` int(10) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `link` text,
  `id_sekolah` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(10) DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_video`
--

INSERT INTO `tbl_video` (`id_video`, `judul`, `deskripsi`, `link`, `id_sekolah`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(2, 'Sapa Warga Boss', 'Tes', 'https://www.youtube.com/watch?v=QtXby3twMmI', '1', '2019-08-03 13:03:55', NULL, '1', NULL, '1'),
(3, 'tes2', 'tes3', 'tes', '17', '2019-08-03 13:09:45', '2019-08-03 20:13:53', '1', '1', '0'),
(4, 'tes', 'tes', 'tes', '1', '2019-08-03 13:14:19', '2019-08-03 20:14:23', '1', '1', '0'),
(5, 'tes', 'tes', 'https://www.youtube.com/watch?v=T2G_Y8XMjw4', '16', '2019-08-15 06:38:23', NULL, '11', NULL, '1'),
(6, 'tes', 'ee', 'https://www.youtube.com/watch?v=T2G_Y8XMjw4', '16', '2019-08-15 06:39:21', NULL, '11', NULL, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `tbl_fasilitas`
--
ALTER TABLE `tbl_fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `tbl_profil`
--
ALTER TABLE `tbl_profil`
  ADD PRIMARY KEY (`id_profil`) USING BTREE;

--
-- Indexes for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- Indexes for table `tbl_tata_tertib`
--
ALTER TABLE `tbl_tata_tertib`
  ADD PRIMARY KEY (`id_tata_tertib`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  MODIFY `id_artikel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `id_faq` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_fasilitas`
--
ALTER TABLE `tbl_fasilitas`
  MODIFY `id_fasilitas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `id_file` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  MODIFY `id_galeri` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  MODIFY `id_pengumuman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_profil`
--
ALTER TABLE `tbl_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  MODIFY `id_tamu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_tata_tertib`
--
ALTER TABLE `tbl_tata_tertib`
  MODIFY `id_tata_tertib` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `id_video` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
