-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2024 at 01:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_pnj`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(9) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `gelar_dosen` varchar(50) NOT NULL,
  `pendidikan_dosen` varchar(50) NOT NULL,
  `prodi_dosen` varchar(50) NOT NULL,
  `nidn_dosen` varchar(30) NOT NULL,
  `nip_dosen` varchar(50) NOT NULL,
  `ket_dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`, `gelar_dosen`, `pendidikan_dosen`, `prodi_dosen`, `nidn_dosen`, `nip_dosen`, `ket_dosen`) VALUES
(34, 'MAULDY LAYA', 'M.Kom S.Kom', 'S2', 'D4-Teknik Informatika', '0311027801', '197802112009121003', 'PNS'),
(35, 'DESWI YANTI LILIANA', 'Dr. M.Kom S.Kom ', 'S3', 'D4-Teknik Informatika', '0016118101', '198111162005012004', 'PNS'),
(36, 'RISNA SARI', 'M.Ti S.Kom', 'S2', 'D4-Teknik Informatika', '0027028506', '198502272015042001', 'PNS'),
(37, 'MERA KARTIKA DELIMAYANTI', 'Ph.D. M.T S.Si', 'S3', 'D4-Teknik Informatika', '0028047901', '197904282005012002', 'PNS'),
(38, 'ANITA HIDAYATI', 'M.Kom, S.Kom', 'S2', 'D4-Teknik Informatika', '0003087902', '197908032003122003', 'PNS'),
(39, 'IKLIMA ERMIS ISMAIL', 'M.Kom, S.Kom', 'S2', 'D4-Teknik Informatika', '0312079904', '198807122018032001', 'PNS'),
(40, 'ANGGI MARDIYONO', 'M.Kom, S.Kom', 'S2', 'D4-Teknik Informatika', '0407068601', '198606072019031011', 'PNS'),
(41, 'RIZKI ELISA NALAWATI', 'M.T S.T', 'S2', 'D4-Teknik Informatika', '0030019204', '199201302019032018', 'PNS'),
(42, 'ASEP TAUFIK MUHARRAM', 'M.Kom, S.Kom', 'S2', 'D4-Teknik Informatika', '0428108408', '198410282019031005', 'PNS'),
(43, 'BAMBANG WARSUTA', 'S.Kom., M.T.I', 'S2', 'D4-Teknik Informatika', '0029118402', '198411292020121002', 'CPNS'),
(44, 'EUIS OKTAVIANTI', 'M.T.I S.Si', 'S2', 'D4-Teknik Informatika', '0027108010', '23072014090119801027 ', 'Non PNS'),
(45, 'AYRES PRADIPTYAS', 'M.M S.S.T', 'S2', 'D4-Teknik Informatika', '0012098705', '59142016040119870912', 'Non PNS'),
(46, 'DEWI KURNIAWATI ', 'M.Pd S.S.', 'S2', 'D4-Teknik Informatika', '0030048501', '5932017020119850430', 'PNS'),
(47, 'HATA MAULANA', '  M.T.I S.Si ', 'S2', 'D4-Teknik Multimedia Digital', '0323108402', '198410232014041001', 'PNS'),
(48, 'IWAN SONJAYA', 'M.T S.T ', 'S2', 'D4-Teknik Multimedia Digital', '0330057601', '197605302008121002', 'PNS'),
(49, 'ERIYA', ' M.T S.Kom ', 'S2', 'D4-Teknik Multimedia Digital', '0003027801', '197802032005012002', 'PNS'),
(50, 'AGUS SETIAWAN', 'M.Kom Drs. ', 'S2', 'D4-Teknik Multimedia Digital', '0017085806', '195808171986121001', 'PNS'),
(51, 'YOYOK SABAR WALUYO', '  M.Hum S.S ', 'S2', 'D4-Teknik Multimedia Digital', '0006117002', '197011061998021001', 'PNS'),
(52, 'MALISA HUZAIFA', 'M.T S.Kom ', 'S2', 'D4-Teknik Multimedia Digital', '0004109102', '199110042019032024', 'PNS'),
(53, 'NOORLELA MARCHETA', 'M.Kom  S.Kom ', 'S2', 'D4-Teknik Multimedia Digital', '0002039301', '199303022019032022', 'PNS'),
(54, 'ADE RAHMA YULY', 'M.Ds S.Kom ', 'S2', 'D4-Teknik Multimedia Digital', '0025079003', '199007252020122012', 'CPNS'),
(55, 'FITRIA NUGRAHANI', ' M.Si S.Pd ', 'S2', 'D4-Teknik Multimedia Digital', '0010058903', '48302016040119890510', 'Non PNS'),
(56, 'INDRI NEFORAWATI', 'M.T S.T ', 'S2', 'D4-Teknik Multimedia dan Jaringan', '0013116308', '196311131989032001', 'PNS'),
(57, 'PRIHATIN OKTIVASARI', 'M.Si S.Si ', 'S2', 'D4-Teknik Multimedia dan Jaringan', '0006107904', '197910062003122001', 'PNS'),
(58, 'DEFIANA ARNALDY', 'M.Si S.TP ', 'S2', 'D4-Teknik Multimedia dan Jaringan', '2001128101', '198112012015041001', 'PNS'),
(59, 'AYU ROSYIDA ZAIN', 'M.T S.ST ', 'S2', 'D4-Teknik Multimedia dan Jaringan', '0015097510', '198910112018032002', 'PNS'),
(60, 'MARIA AGUSTIN', 'M.Kom S.Kom', 'S2', 'D4-Teknik Multimedia dan Jaringan', '0312079904', '197509152003122003', 'PNS'),
(61, 'ASEP KURNIAWAN', 'M.Kom S.Pd ', 'S2', 'D4-Teknik Multimedia dan Jaringan', '0026099103', '199109262019031012', 'PNS'),
(62, 'INDRA HERMAWAN', 'M.Kom S.Kom ', 'S2', 'D4-Teknik Multimedia dan Jaringan', '0413038701', '198703132019031012', 'PNS'),
(63, 'MUHAMMAD YUSUF BAGUS RASTIIDIN', 'M.T.I S.Kom ', 'S2', 'D4-Teknik Multimedia dan Jaringan', '0004089301', '199308142019031015', 'PNS'),
(64, 'ARIAWAN ANDI SUHANDANA', 'M.T.I S.Kom ', 'S2', 'D4-Teknik Multimedia dan Jaringan', '0029018505', '198501292010121003', 'PNS'),
(65, 'AFIFAH MUHARIKAH', 'M.Hum S.S. ', 'S2', 'D4-Teknik Multimedia dan Jaringan', '0008098701', '23232015030219870908', 'Non PNS'),
(66, 'NUR FAUIZ SOELAIMAN', 'M.Kom S.T', 'S2', 'D1-Teknik Komputer dan Jaringan', '195809201984031001', '0020095806', 'PNS'),
(67, 'REFIRMAN', 'M.Kom Drs.', 'S2', 'D1-Teknik Komputer dan Jaringan', '195708101986031005', '0010085704', 'PNS'),
(68, 'ABDUL AZIZ', 'M.M. S.P', 'S2', 'D1-Teknik Komputer dan Jaringan', '195609231987031002', '0023095601', 'PNS'),
(69, 'MUHAMMAD YUSUP', 'Dr. MA S.Ag', 'S3', 'D1-Teknik Komputer dan Jaringan', '23252015100119690204', '0004026905', 'Non PNS'),
(70, 'SYAMSI DWI CAHYA', 'M.Kom S.S.T', 'S2', 'D1-Teknik Komputer dan Jaringan', '59152016040119890406', '0006048903', 'Non PNS'),
(71, 'NUR FAUZI SOELAIMAN', 'M.Kom S.Kom', 'S2', 'D1-Teknik Komputer dan Jaringan', '9202017012019840513', '0013058401', 'Non PNS');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(9) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `nim_mahasiswa` bigint(20) NOT NULL,
  `prodi_mahasiswa` varchar(50) NOT NULL,
  `kelas_mahasiswa` varchar(50) NOT NULL,
  `angkatan_mahasiswa` int(9) NOT NULL,
  `gender_mahasiswa` varchar(50) NOT NULL,
  `email_mahasiswa` varchar(100) NOT NULL,
  `no_telepon_mahasiswa` varchar(50) NOT NULL,
  `status_mahasiswa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `nim_mahasiswa`, `prodi_mahasiswa`, `kelas_mahasiswa`, `angkatan_mahasiswa`, `gender_mahasiswa`, `email_mahasiswa`, `no_telepon_mahasiswa`, `status_mahasiswa`) VALUES
(14, 'Adelia Citra Utami', 2107411027, 'D4-Teknik Informatika', 'TI 1A', 2021, 'Perempuan', 'adelia021203@gmail.com', '081289071830', 'Aktif'),
(15, 'Alfares Ariandha Nurdin', 2107411020, 'D4-Teknik Informatika', 'TI 1A', 2021, 'Laki - Laki', 'alfaresnurdin77@gmail.com', '089603017063', 'Aktif'),
(16, 'Agus Setiawan', 2107411013, 'D4-Teknik Informatika', 'TI 1A', 2021, 'Laki - Laki', 'hyenseok422@gmail.com', '081212683603', 'Aktif'),
(17, 'Alman Farroz', 2107411042, 'D4-Teknik Informatika', 'TI 1B', 2021, 'Laki - Laki', 'alman.farroz@gmail.com', '081953514540', 'Aktif'),
(18, 'Arfiano Jordhy Ramadhan', 2107411036, 'D4-Teknik Informatika', 'TI 1B', 2021, 'Laki - Laki', 'arfianoj@gmail.com', '089696078486', 'Aktif'),
(19, 'Fedya Ayesha Ramadhanty', 2107411049, 'D4-Teknik Informatika', 'TI 1B', 2021, 'Perempuan', 'fedya.ayesha.ramadhanty@gmail.com', '081380073335', 'Aktif'),
(20, 'Alfortino Ramadhan', 2107431019, 'D4-Teknik Multimedia Digital', 'TMD 1A', 2021, 'Laki - Laki', 'alforttino@gmail.com', '082126400340', 'Aktif'),
(21, 'Erland Faturrahman', 2107431006, 'D4-Teknik Multimedia Digital', 'TMD 1A', 2021, 'Laki - Laki', 'erlandinfo@gmail.com', '081804832307', 'Aktif'),
(22, 'Faiz Firdaus', 2107431027, 'D4-Teknik Multimedia Digital', 'TMD 1A', 2021, 'Laki - Laki', 'faiz26firdaus@gmail.com', '081213097390', 'Aktif'),
(23, 'Adnina Mafaza', 2107431047, 'D4-Teknik Multimedia Digital', 'TMD 1B', 2021, 'Perempuan', 'adninamafaza04@gmail.com', '081295055359', 'Aktif'),
(24, 'Agung Bachtiar Nugroho', 2107431043, 'D4-Teknik Multimedia Digital', 'TMD 1B', 2021, 'Laki - Laki', 'bachtiara30@gmail.com', '081212605124', 'Aktif'),
(25, 'Andreas Bimo Prakoso', 2107431042, 'D4-Teknik Multimedia Digital', 'TMD 1B', 2021, 'Laki - Laki', 'andrsbimo@gmail.com', '085695584217', 'Aktif'),
(26, 'Agustine Etty Wanggai', 2107421029, 'D4-Teknik Multimedia dan Jaringan', 'TMJ 1', 2021, 'Perempuan', 'ettywanggaiagustine@gmail.com', '081247571871', 'Aktif'),
(27, 'Aryaputra Maheswara', 2107421030, 'D4-Teknik Multimedia dan Jaringan', 'TMJ 1', 2021, 'Laki - Laki', 'aryaputramaheswara34@gmail.com', '081585435089', 'Aktif'),
(28, 'Berlianna Upik Nurniati', 2107421022, 'D4-Teknik Multimedia dan Jaringan', 'TMJ 1', 2021, 'Perempuan', 'berlianna146@gmail.com', '085281492860', 'Aktif'),
(29, 'Akhtar Faizi Putra', 2207411002, 'D4-Teknik Informatika', 'TI 1A', 2022, 'Laki - Laki', 'akhtar.faizi.putra.tik22@mhsw.pnj.ac.id', '085718793077', 'Aktif'),
(30, 'Rio Aditya Mukti ', 2207411020, 'D4-Teknik Informatika', 'TI 1A', 2022, 'Laki - Laki', 'rio.aditya.mukti.tik22@mhsw.pnj.ac.id', '081297423271', 'Aktif'),
(31, 'Yuusha Yuzka Ramzani', 2207411022, 'D4-Teknik Informatika', 'TI 1A', 2022, 'Laki - Laki', 'yuusha.yuzka.ramzani.tik22@mhsw.pnj.ac.id', '081286677991', 'Aktif'),
(32, 'Ahmad Ulul Azmi', 2207411053, 'D4-Teknik Informatika', 'TI 1B', 2022, 'Laki - Laki', 'ahmad.ulul.azmi.tik22@mhsw.pnj.ac.id', '085719492576', 'Aktif'),
(33, 'Juan Graciano ', 2207411040, 'D4-Teknik Informatika', 'TI 1B', 2022, 'Laki - Laki', 'juan.graciano.tik22@mhsw.pnj.ac.id', '081398460165', 'Aktif'),
(34, 'Kasamira Anindita Qairia', 2207411045, 'D4-Teknik Informatika', 'TI 1B', 2022, 'Perempuan', 'kasamira.anindita.qairia.tik22@mhsw.pnj.ac.id', '085885434250', 'Aktif'),
(35, 'Aisyah Ramadhina Lestari', 2207431027, 'D4-Teknik Multimedia Digital', 'TMD 1A', 2022, 'Perempuan', 'aisyah.ramadhina.lestari.tik22@mhsw.pnj.ac.id', '083819096137', 'Aktif'),
(36, 'AMANDA FIRNA', 2207431011, 'D4-Teknik Multimedia Digital', 'TMD 1A', 2022, 'Perempuan', 'amanda.firna.tik22@mhsw.pnj.ac.id', '085718250214', 'Aktif'),
(37, 'Wildan Hidayat', 2207431009, 'D4-Teknik Multimedia Digital', 'TMD 1A', 2022, 'Laki - Laki', 'wildan.hidayat.tik22@mhsw.pnj.ac.id', '089654856168', 'Aktif'),
(38, 'Dhamar Akbari Latief ', 2207431055, 'D4-Teknik Multimedia Digital', 'TMD 1B', 2022, 'Laki - Laki', 'dhamar.akbari.latief.tik22@mhsw.pnj.ac.id', '085782679547', 'Aktif'),
(39, 'Java Santika ', 2207431059, 'D4-Teknik Multimedia Digital', 'TMD 1B', 2022, 'Perempuan', 'java.santika.tik22@mhsw.pnj.ac.id', '08990875341', 'Aktif'),
(40, 'Raihan Al Muttaqin', 2207431036, 'D4-Teknik Multimedia Digital', 'TMD 1B', 2022, 'Laki - Laki', 'raihan.al.muttaqin.tik22@mhsw.pnj.ac.id', '082211271169', 'Aktif'),
(41, 'Dhea Salsabela', 2207421029, 'D4-Teknik Multimedia dan Jaringan', 'TMJ 1A', 2022, 'Perempuan', 'dhea.salsabela.tik22@mhsw.pnj.ac.id', '085817189271', 'Aktif'),
(42, 'Karin Novrika', 2207421006, 'D4-Teknik Multimedia dan Jaringan', 'TMJ 1A', 2022, 'Perempuan', 'karin.novrika.tik22@mhsw.pnj.ac.id', '0895378384837', 'Aktif'),
(43, 'Muhammad Syaifulloh', 2207421001, 'D4-Teknik Multimedia dan Jaringan', 'TMJ 1A', 2022, 'Laki - Laki', 'muhammad.syaifulloh.tik22@mhsw.pnj.ac.id', '089628031081', 'Aktif'),
(44, 'Alfarizki Nurachman', 2207421041, 'D4-Teknik Multimedia dan Jaringan', 'TMJ 1B', 2022, 'Laki - Laki', 'alfarizki.nurachman.tik22@mhsw.pnj.ac.id', '089652493578', 'Aktif'),
(45, 'Cornelius Yuli Rosdianto ', 2207421059, 'D4-Teknik Multimedia dan Jaringan', 'TMJ 1B', 2022, 'Laki - Laki', 'cornelius.yuli.rosdianto.tik22@mhsw.pnj.ac.id', '089668176753', 'Aktif'),
(46, 'Izzaturrachmi ', 2207421050, 'D4-Teknik Multimedia dan Jaringan', 'TMJ 1B', 2022, 'Laki - Laki', 'izzaturrachmi.tik22@mhsw.pnj.ac.id', '081283886553', 'Aktif'),
(47, 'Dzaky Nur Rahman', 2207111010, 'D1-Teknik Komputer dan Jaringan', 'TKJ 1', 2022, 'Laki - Laki', 'dzakynurrahman88@gmail.com', '085156173488', 'Aktif'),
(48, 'Kimmy Priadi ', 2207111002, 'D1-Teknik Komputer dan Jaringan', 'TKJ 1', 2022, 'Perempuan', 'kimmypriadi23@gmail.com', '081290313636', 'Aktif'),
(49, 'Muhammad Thariq Aziz ', 2207111006, 'D1-Teknik Komputer dan Jaringan', 'TKJ 1', 2022, 'Laki - Laki', 'muhammad.thariq.aziz.tik22@mhsw.pnj.ac.id ', '081818993325', 'Aktif'),
(50, 'Agung Reza Vergiawan', 2007411029, 'D4-Teknik Informatika', 'TI 3A', 2020, 'Laki - Laki', 'artze501@gmail.com', '089512969942', 'Aktif'),
(51, 'Andini Mutiara', 2007411022, 'D4-Teknik Informatika', 'TI 3A', 2020, 'Perempuan', 'Andinimutiaraa2101@gmail.com', '088291247554', 'Aktif'),
(52, 'Hafiz Juansyah Putra', 2007411020, 'D4-Teknik Informatika', 'TI 3A', 2020, 'Laki - Laki', 'hafizjp1612@gmail.com', '081293298814', 'Aktif'),
(53, 'Alfian Adi Septianto', 2007411057, 'D4-Teknik Informatika', 'TI 3B', 2020, 'Laki - Laki', 'alvinsref@gmail.com', '081770815391', 'Aktif'),
(54, 'Alifia Ayu Masita', 2007411034, 'D4-Teknik Informatika', 'TI 3B', 2020, 'Perempuan', 'alifiaayu46@gmail.com', '085156196258', 'Aktif'),
(55, 'Bagus Tri Yulianto Darmawan', 2007411056, 'D4-Teknik Informatika', 'TI 3B', 2020, 'Laki - Laki', 'bagusdarmawan654@gmail.com', '081384698177', 'Aktif'),
(56, 'Adinda Putri Larasati', 2007431010, 'D4-Teknik Multimedia Digital', 'TMD 3A', 2020, 'Perempuan', 'larasatiadinda94@gmail.com', '085694554350', 'Aktif'),
(57, 'Fatih Rizqullah', 2007431008, 'D4-Teknik Multimedia Digital', 'TMD 3A', 2020, 'Laki - Laki', 'fatihrizqullah54@gmail.com', '081221552354', 'Aktif'),
(58, 'Gaizka Aisyah Pane', 2007431007, 'D4-Teknik Multimedia Digital', 'TMD 3A', 2020, 'Perempuan', 'gaizka.pane9i@gmail.com', '081211849485', 'Aktif'),
(59, 'Faisal Nurdin', 2007431047, 'D4-Teknik Multimedia Digital', 'TMD 3B', 2020, 'Laki - Laki', 'Tctlqgdu@gmail.com', '089652635750', 'Aktif'),
(60, 'Elisabeth', 2007431038, 'D4-Teknik Multimedia Digital', 'TMD 3B', 2020, 'Perempuan', 'Ibethhh2001@gmail.com', '085786620087', 'Aktif'),
(61, 'Muhammad Rafi Syahrieza', 2007431048, 'D4-Teknik Multimedia Digital', 'TMD 3B', 2020, 'Laki - Laki', 'syahrieza613@gmail.com', '085710758572', 'Aktif'),
(62, 'Abdi Farhan Yusuf', 2007421024, 'D4-Teknik Multimedia dan Jaringan', 'TMJ 3', 2020, 'Laki - Laki', 'abdifarhan34@gmail.com', '082110782415', 'Aktif'),
(63, 'Firmansyah Helmi Kurniawan', 2007421030, 'D4-Teknik Multimedia dan Jaringan', 'TMJ 3', 2020, 'Laki - Laki', 'kurniawan.firman94@gmail.com', '081586843522', 'Aktif'),
(64, 'Laila fitriana', 2007421012, 'D4-Teknik Multimedia dan Jaringan', 'TMJ 3', 2020, 'Perempuan', 'Lailafitriana12345678@gmail.com', '085228433095', 'Aktif'),
(65, 'Agus Setyadi', 2107111013, 'D1-Teknik Komputer dan Jaringan', 'TKJ 1', 2021, 'Laki - Laki', 'agussetyadi@gmail.com', '082211588486', 'Aktif'),
(66, 'Tarissa Azzahra Danantya', 2107111019, 'D1-Teknik Komputer dan Jaringan', 'TKJ 1', 2021, 'Perempuan', 'tarissa1402@gmail.com', '089668736263', 'Aktif'),
(67, 'Gathan Atalla Rafiandy', 2107111023, 'D1-Teknik Komputer dan Jaringan', 'TKJ 1', 2021, 'Laki - Laki', 'grafiandy@gmail.com', '085715296268', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(9) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_lengkap`, `username`, `email`, `nomor_telepon`, `password`, `jenis_kelamin`) VALUES
(8, 'Novani Wulansari', 'VaniQueen', 'vani@gmail.com', '088212378975', '$2y$10$8Y0u/Lt6dQ54KJEeepOmseEeZeda5tXP.whsBhobPpUZ9/bxxE6nO', 'Perempuan'),
(9, 'Akhtar Faizi Putra', 'Akhtaraja', 'akhtar.faizi.putra.tik22@mhsw.pnj.ac.id', '085718793077', '$2y$10$dKo691Vgjpob0PhvoZItA.3wUIZ.Oa9QyCBhkgi9abdA.Xmx209cC', 'Laki-Laki'),
(13, 'Made Dharmagiri', 'MadeKelas', 'made@gmail.com', '0857187930111', '$2y$10$wj/wiPa8nts5UJk.gXa89ehn5SMlsTLk7Dk6LvTB.oF5Y9/WjqsiC', 'Laki-Laki'),
(14, 'Vani', 'VaniAja', 'vabni@gmail.com', '085718793077', '$2y$10$xdy4y3cUm1F7VAp/exNJWOjvlXopOBL9W5/rvyh5JUTeVXGoMDINm', 'Perempuan'),
(15, 'Yuusha Yuzka Ramzani', 'Loopplus', 'yuusha@gmail.com', '02186677991', '$2y$10$XP3WsIGXchR1h1n/KNxRGu9EwXq14HOW0Kdz8sp1U.IDMo0P0NvFa', 'Perempuan'),
(16, 'Rio Aditya', 'Rio', 'rio@gmail.com', '0218667777991', '$2y$10$mQ/folOZryga3ZsXmC4mt.0X6cG5rAmFGOwQaW9U3ArTBhCPgNEbW', 'Laki-Laki'),
(17, 'rio mukti', 'rio123', 'rioq@gmail.com', '089999', '$2y$10$voQHoa7EOKK09y99JXI/K.cjjdFUmjQtEWk1XLfpNcoL49NnZjzk.', 'Laki-Laki');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
