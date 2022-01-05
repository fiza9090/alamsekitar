-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: MYSQL_STAGING
-- Generation Time: Jan 05, 2022 at 05:03 PM
-- Server version: 5.1.61
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alamsekitar`
--
CREATE DATABASE IF NOT EXISTS `alamsekitar` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `alamsekitar`;

-- --------------------------------------------------------

--
-- Table structure for table `lookup_kodrespon`
--

CREATE TABLE IF NOT EXISTS `lookup_kodrespon` (
  `kodrespon` int(2) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  UNIQUE KEY `kodrespon` (`kodrespon`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lookup_kodrespon`
--

INSERT INTO `lookup_kodrespon` (`kodrespon`, `keterangan`) VALUES
(11, 'Borang lengkap (kerja luar/pos/e-mel/faks/e-survey)'),
(12, 'Beroperasi pada masa penyiasatan tetapi tidak menjalankan perusahaan dalam tempoh rujukan   '),
(31, 'Tidak menjalankan perusahaan.'),
(40, 'Telah tutup.'),
(50, 'Salah Penyiasatan '),
(60, 'Pendua'),
(13, 'Enggan bekerjasama'),
(14, 'Akaun diliputi di bawah syarikat (covered under)'),
(21, 'Alamat tidak dapat dikesan'),
(22, 'Tidak terdapat pertubuhan di alamat yang diberi '),
(23, 'Berpindah ke alamat yang tidak diketahui'),
(32, 'Under Receivership/syarikat dibawah tanggungan'),
(15, ' (Luar liputan industri tetapi dalam penyiasatan yang sama )'),
(71, 'Berjanji untuk menghantar laporan '),
(72, 'Pemilik atau pengurus tiada '),
(73, 'Akaun belum selesai '),
(74, 'Berpindah ke alamat lain di negeri sama '),
(75, 'Berpindah ke negeri lain/pejabat operasi lain '),
(76, 'Dalam proses lengkap'),
(77, 'Lain - lain keputusan ');

-- --------------------------------------------------------

--
-- Table structure for table `lookup_negeri`
--

CREATE TABLE IF NOT EXISTS `lookup_negeri` (
  `kod_negeri` varchar(2) NOT NULL,
  `nama_negeri` varchar(255) NOT NULL,
  PRIMARY KEY (`kod_negeri`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lookup_negeri`
--

INSERT INTO `lookup_negeri` (`kod_negeri`, `nama_negeri`) VALUES
('01', 'JOHOR'),
('02', 'KEDAH'),
('03', 'KELANTAN'),
('04', 'MELAKA'),
('05', 'NEGERI SEMBILAN'),
('06', 'PAHANG'),
('07', 'PULAU PINANG'),
('08', 'PERAK'),
('09', 'PERLIS'),
('10', 'SELANGOR'),
('11', 'TERENGGANU'),
('12', 'SABAH'),
('13', 'SARAWAK'),
('14', 'W.P. KUALA LUMPUR'),
('15', 'W.P. LABUAN'),
('16', 'W.P. PUTRAJAYA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengesahan`
--

CREATE TABLE IF NOT EXISTS `tbl_pengesahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nosiri_pertubuhan` varchar(12) NOT NULL,
  `nama_syarikat` varchar(255) NOT NULL,
  `kodrespon` int(2) NOT NULL,
  `sebab` varchar(255) NOT NULL,
  `sukutahun` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0-Belum Hantar, 1-Hantar',
  `id_kemaskini` varchar(55) NOT NULL,
  `tarikh_kemaskini` date NOT NULL,
  `tarikh_hantar` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=186 ;

--
-- Dumping data for table `tbl_pengesahan`
--

INSERT INTO `tbl_pengesahan` (`id`, `nosiri_pertubuhan`, `nama_syarikat`, `kodrespon`, `sebab`, `sukutahun`, `tahun`, `status`, `id_kemaskini`, `tarikh_kemaskini`, `tarikh_hantar`) VALUES
(181, '000002053501', 'AAA SET (MALAYSIA) SDN. BHD.', 15, '15', 1, 2020, 0, '', '2022-01-04', '0000-00-00'),
(182, '000002053501', 'AAA SET (MALAYSIA) SDN. BHD.', 22, '22', 2, 2020, 0, '', '2021-08-04', '0000-00-00'),
(183, '000003078669', 'CRUCIAL POINT RECYCLING MATERIALS (KLUANG) SDN. BHD.', 14, '', 1, 2020, 0, '', '2022-01-04', '0000-00-00'),
(184, '000003078669', 'CRUCIAL POINT RECYCLING MATERIALS (KLUANG) SDN. BHD.', 14, '14', 2, 2020, 0, '', '2022-01-04', '0000-00-00'),
(185, '000002053501', 'AAA SET (MALAYSIA) SDN. BHD.', 60, '60', 3, 2020, 0, '', '2022-01-05', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE IF NOT EXISTS `tbl_pengguna` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `jawatan` varchar(100) NOT NULL,
  `bahagian` varchar(100) NOT NULL,
  `email` varchar(64) NOT NULL,
  `level` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kod_negeri` varchar(5) NOT NULL,
  `tarikh` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_user`, `name`, `jawatan`, `bahagian`, `email`, `level`, `username`, `password`, `kod_negeri`, `tarikh`) VALUES
(1, 'J Johor', 'E29', 'Johor', 'xxx@xxx.com', 1, 'test', '7c222fb2927d828af22f592134e8932480637c0d', 'hq', '2022-01-04 07:42:42'),
(2, 'J Kedah', 'E29', 'Kedah', 'xxx@xxx.com', 1, 'test2', '7c222fb2927d828af22f592134e8932480637c0d', '02', '2022-01-04 07:43:27'),
(3, 'J Kelantan', 'E41', 'Kelantan', 'xxx@yahoo.my', 1, 'test11', 'test1234', '03', '2022-01-04 07:43:06'),
(4, 'J Melaka', 'E41', 'Melaka', 'xxx@gmail.my', 2, 'test4', 'test1234', '04', '2022-01-04 07:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rangka`
--

CREATE TABLE IF NOT EXISTS `tbl_rangka` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nosiri_pertubuhan` varchar(12) NOT NULL,
  `msic` varchar(5) NOT NULL,
  `kod_negeri` varchar(2) NOT NULL,
  `list` varchar(2) NOT NULL,
  `nama_syarikat` varchar(255) NOT NULL,
  `pic1` varchar(255) NOT NULL,
  `jawatan1` varchar(255) NOT NULL,
  `notel1` varchar(12) NOT NULL,
  `nofaks1` varchar(12) NOT NULL,
  `emel1` varchar(255) NOT NULL,
  `pic2` varchar(255) NOT NULL,
  `jawatan2` varchar(255) NOT NULL,
  `notel2` varchar(12) NOT NULL,
  `nofaks2` varchar(12) NOT NULL,
  `emel2` varchar(255) NOT NULL,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=225 ;

--
-- Dumping data for table `tbl_rangka`
--

INSERT INTO `tbl_rangka` (`id`, `nosiri_pertubuhan`, `msic`, `kod_negeri`, `list`, `nama_syarikat`, `pic1`, `jawatan1`, `notel1`, `nofaks1`, `emel1`, `pic2`, `jawatan2`, `notel2`, `nofaks2`, `emel2`, `tahun`) VALUES
(1, '000002053501', '38112', '01', 'A', 'AAA SET (MALAYSIA) SDN. BHD.', 'MOHD KHAIRULLAH 5ttggg', '', '789', '', '123', 'salmah', '', '456', '', '456', 2020),
(2, '000000478925', '38309', '01', 'A', '', 'HOO CHEE CHIAN', 'PEMILIK', '', '', '', '', '', '', '', '', 2020),
(3, '000001700654', '38111', '01', 'A', '', 'CLAUDIA SIA', '', '', '', '', '', '', '', '', '', 2020),
(4, '000003078669', '38112', '01', 'A', 'CRUCIAL POINT RECYCLING MATERIALS (KLUANG) SDN. BHD.', 'ttttt', 'PENGURUS', '', '', '', 'test', '', '', '', '', 2020),
(5, '000000564107', '37000', '01', 'A', '', 'MR LEE', 'OWNER', '', '', 'alston_ee@ditron.com', '', '', '', '', '', 2020),
(6, '000002050460', '37000', '01', 'A', 'ICHEM SOLUTION SDN. BHD.', 'MOHD KHAIRULLAH Huyyybbb', 'BUSINESS EXECUTIVE', '07-22845a', '', 'ichemsolution@gmail.com', '', '', '', '', '', 2020),
(7, '000000568525', '38309', '01', 'A', '', 'CHING HUEY NING', 'FINANCE EXECTIVE', '', '', 'winnie@jBGoodcare.com.my', '', '', '', '', '', 2020),
(8, '000003058293', '38220', '01', 'A', 'JH CONTRACTS SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(9, '000003754117', '39000', '01', 'A', 'JIA FU RECYCLE TRADING', 'LUA BOON KIAN', '', '010-54993', '', 'lua@gmail.com', '', '', '', '', '', 2020),
(10, '000002054057', '37000', '01', 'A', 'KAE RECYCLE (MUAR) SDN. BHD.', 'MOHD KHAIRULLAH', '', '07-521228', '', 'rt@yahoo.com', 'salmah', '', 'salmah@yahoo', '', 'salmah@yahoo.com', 2020),
(11, '000000504331', '38112', '01', 'A', '', 'NG WENG CHENG', 'PENGARAH SYARIKAT', '', '', 'ksrcsb@gmail.com', '', '', '', '', '', 2020),
(12, '000000569913', '38210', '01', 'A', '', 'MAY CHING', 'AKAUNTANT HR', '', '', '', '', '', '', '', '', 2020),
(13, '000002056997', '38112', '01', 'A', 'MACRO SPEED STATION SDN. BHD.', 'PANG SHEN KOK', 'PENGURUS', '012-75533', '', 'psk5941@hotmail.com', '', '', '', '', '', 2020),
(14, '000001092322', '38113', '01', 'A', '', 'MAZLIN BINTI MOHAMAD', 'PENGURUS', '', '', '', '', '', '', '', '', 2020),
(15, '000000536882', '38111', '01', 'A', '', 'ADRI', 'HR/ADMIN', '', '', 'admin@moldex.com.my', 'A', '', '', '', '', 2020),
(16, '000002050039', '38220', '01', 'A', 'ORA BIOENERGY SDN. BHD.', 'MR LIM / MRS CHIA', 'OWNER', '019-77443', '', '', '', '', '', '', '', 2020),
(17, '000003209544', '38210', '01', 'A', 'RANAMA RESOURCE SDN. BHD.', 'NAWAL AINI BINTI MUHAMMAD', 'ACCOUNT OFFICER', '07-25107', '', 'laini@diamondoifats.com.my', '', '', '', '', '', 2020),
(18, '000000344048', '38111', '01', 'A', '', 'MRS LAU', 'ACCOUNTANT', '', '', 'tlb_nsc@yahoo.com', '', '', '', '', '', 2020),
(19, '000001728293', '38309', '01', 'A', '', 'MR LIM YEW CHUAN', 'ACCOUNTANT', '', '', '', '', '', '', '', '', 2020),
(20, '000003090018', '38112', '01', 'A', 'WANG CING ENTERPRISE', '', 'OWNER', '', '', '', '', '', '', '', '', 2020),
(21, '000000512543', '37000', '02', 'A', 'ALIF TEKNOLOGI SDN BHD', 'NEELAMEKAN AL SELAMUTHU', 'PENGARAH', '012-42329', '', '', '', '', '', '', '', 2020),
(22, '000003199846', '38309', '02', 'A', 'CSH GREEN RESOURCES SDN BHD', 'CHOO SIANG YING', 'ACCOUNT DEPT', '017-58877', '', 'cindycsy.csh@gmail.com', '', '', '', '', '', 2020),
(23, '000001826968', '38113', '02', 'A', 'DINAMIK FHIN JAYA SDN. BHD.', 'ABDUL GHAFAR BIN AZIZ', 'PENGARAH', '04-431069', '', '', '', '', '', '', '', 2020),
(24, '000001958353', '38112', '02', 'A', 'EKSP UNITED SDN.  BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(25, '000003387682', '38111', '02', 'A', 'ENVIRONMENT IDAMAN (KEDAH AND PERLIS) SDN. BHD.', 'NATRAH BT MOHD RIDZWAN', 'SENIOR EXECUTIVE HRA', '04-771130', '', 'hrd@e-idaman.com', '', '', '', '', '', 2020),
(26, '000003226953', '38111', '02', 'A', 'GREEN RESOURCE RECOVERY SDN. BHD.', 'MOHD SYAHRIZAL B MOHD BAKRI', 'SR EXECUTIVE FINANCE & ACCOUNT', '019-47131', '', 'syahrizal@e-idaman.com', '', '', '', '', '', 2020),
(27, '000003360856', '38112', '02', 'A', 'HANIF RECYCLE', 'INTAN MASTURA BT HASSAN', 'KERANI', '011136291', '', '', '', '', '', '', '', 2020),
(28, '000000551043', '38112', '02', 'A', 'HL TR SDN. BHD.', 'GAYATHIRI', 'HR OFFICER', '019-66600', '', 'gayathiri@hltr.com.my', '', '', '', '', '', 2020),
(29, '000001729225', '37000', '02', 'A', 'KRISHMAH WATERS ENTERPRISE SDN. BHD.', 'RENIGOPAL', 'DIRECTOR', '04-42142', '', 'khrishmahwaters@yahoo.com', '', '', '', '', '', 2020),
(30, '000001956967', '38303', '02', 'A', 'LEE TYRE & OIL SDN. BHD.', 'NG WEI JIE', 'GENERAL MANAGER', '04-48518', '', 'leetyreoil@yahoo.com', '', '', '', '', '', 2020),
(31, '000003076035', '38210', '02', 'A', 'LLH BIOMASS SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(32, '000003156650', '38112', '02', 'A', 'LLH RECYCLE SDN. BHD.', 'DILLA', '', '019-577589', '', '', '', '', '', '', '', 2020),
(33, '000003154021', '38112', '02', 'A', 'LS GLOBAL INDUSTRIES SDN. BHD.', 'TANG TZE EE', 'KERANI', '04-442227', '', 'lsgbal-ind@gmail.com', '', '', '', '', '', 2020),
(34, '000001666582', '38112', '02', 'A', 'MERIDIAN RECYCLING SDN. BHD.', 'MOHD SUFIAN BIN ASRI', 'AKAUN EKSEKUTIF', '04-441186', '', 'sufan@meridianworld.com.my', '', '', '', '', '', 2020),
(35, '000003074108', '38309', '02', 'A', 'PLASCYCLE RESOURCES SDN. BHD.', 'JIK PEI SAN', 'PENOLONG PENGURUS', '04-440409', '', 'accot@plascycle.com.my', '', '', '', '', '', 2020),
(36, '000001953221', '38210', '02', 'A', 'RENERSYS SDN. BHD.', 'TAN CHAI SIN', 'MANAGER', '04-440491', '', 'csta900@gmail.com', '', '', '', '', '', 2020),
(37, '000003059186', '38112', '02', 'A', 'SP RECYCLE INDUSTRY', 'NG CHUI SUN', 'WAKIL MAJIKAN', '012-459776', '', 'chuis512@yahoo.com', '', '', '', '', '', 2020),
(38, '000001694014', '38309', '02', 'A', 'TAI HONG PLASTIC INDUSTRIES SDN. BHD.', 'LAU CHUA MEY', 'MANAGER', '', '', 'Info@taihonlastic.com', '', '', '', '', '', 2020),
(39, '000000407408', '37000', '02', 'A', 'VICCESS ENTERPRISE', 'CHIN CHIEW KEE', 'MANAGER', '019-473065', '', 'chinchwkee@yahoo.com', '', '', '', '', '', 2020),
(40, '000001814932', '37000', '03', 'A', 'MAJAARI SERVICES SDN. BHD.', 'Nur Fadzlina Shuhaimi', 'Pen Eks. Kewangan', '09-430055', '', 'fadzina@majaari.com.my', '', '', '', '', '', 2020),
(41, '000003312178', '39000', '03', 'A', 'PENTAS FLORA (KELANTAN) SDN. BHD.', 'Ong Heng Seng', 'Pengurus', '019-98182', '', '', '', '', '', '', '', 2020),
(42, '000003345408', '39000', '04', 'A', 'ADVANCED ASBESTOS ABATEMENT SERVICES PLT', 'SARAH', 'PEMELIK', '017-67708', '', '', '', '', '', '', '', 2020),
(43, '000003060648', '38121', '04', 'A', 'EVERGREEN OIL & FEED SDN. BHD.', 'LAU CHER KUANG', 'PENGARAH', '06-225068', '', '', '', '', '', '', '', 2020),
(44, '000001957068', '38112', '04', 'A', 'FANDORA RECOVERY SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(45, '000003173707', '39000', '04', 'A', 'GLOBAL MIND TECHNOLOGY RESOURCES SDN. BHD.', 'MOHD AKHIR', 'PENGURUS', '019-907801', '', '', '', '', '', '', '', 2020),
(46, '000003157753', '38112', '04', 'A', 'HPP METAL', '', '', '', '', '', '', '', '', '', '', 2020),
(47, '000000319928', '38111', '04', 'A', 'M.N.ENTERPRISE', 'MOHD NORddd', 'PENGURUSsss', '2844773222', '', 'f@gmail.com', '', '', '', '', '', 2020),
(48, '000001984473', '37000', '04', 'A', 'MBM TIGA ENTERPRISE SDN. BHD.', 'KARTINY BTE ABU BAKAR', 'KERANI ADMIN', '06-288617', '', '', '', '', '', '', '', 2020),
(49, '000002346254', '38309', '04', 'A', 'NEW GENERATION PLASTIC ENTERPRISE', 'TAN GEK CHENG', '', '017-690989', '', '', '', '', '', '', '', 2020),
(50, '000001993928', '38112', '04', 'A', 'RYE METAL (M) SDN. BHD.', 'KUAH YAH YING', '', '016-619181', '', '', '', '', '', '', '', 2020),
(51, '000000521821', '38113', '04', 'A', 'SWM ENVIRONMENT SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(52, '000000388518', '38112', '04', 'A', 'TA CHUEN ENTERPRISE', 'LEE CHONG SIONG', 'PENGURUS', '3559245', '', '', '', '', '', '', '', 2020),
(53, '000001674458', '38121', '05', 'A', '3R QUEST SDN. BHD.', 'HEAH KOOI TEANG', 'PENGURUS', '06-685314', '', '', '', '', '', '', '', 2020),
(54, '000002417202', '38303', '05', 'A', 'CK GLOBAL RECYCLE TRADING', 'MISS LIM LEE SAN', 'CLERK', '06-651437', '', '', '', '', '', '', '', 2020),
(55, '000003280414', '38112', '05', 'A', 'CKY RECYCLE PLASTIC SDN. BHD.', 'LIONG LAP KUAN', 'ACCOUNT EXECUTIVE', '011-14364', '', 'lionlapkuan@gmail.com', '', '', '', '', '', 2020),
(56, '000000562507', '37000', '05', 'A', 'DARCO WATER SYSTEMS SDN. BHD.', 'TAI YOON CHIN', 'EKSEKUTIF AKAUN', '06-799677', '', '', '', '', '', '', '', 2020),
(57, '000002406902', '38112', '05', 'A', 'JUN YEP ENTERPRISE', 'GOH YUN LAI', 'PENGURUS', '016-208991', '', '', '', '', '', '', '', 2020),
(58, '000002739348', '38220', '05', 'A', 'KUALITI ALAM SDN. BHD.', 'ASIAH BINTI MOHAMAD', 'PENGURUS KANAN HR', '06-666200', '', '', '', '', '', '', '', 2020),
(59, '000000588930', '38309', '05', 'A', 'MNA METAL RESOURCES SDN. BHD.', 'NURUL LAZWATI AB. AZIZ', 'HR ASSISTANT', '06-11', '', '', '', '', '', '', '', 2020),
(60, '000001656416', '38113', '05', 'A', 'NILAI BERSIH  S/B', 'NURLIYANA', 'ADMIN', '06-85053', '', 'nilibersih@yahoo.co.uk', '', '', '', '', '', 2020),
(61, '000000202925', '38309', '05', 'A', 'NS PLASTIC & METAL TRADING', '', '', '', '', '', '', '', '', '', '', 2020),
(62, '000000488684', '38112', '05', 'A', 'PP WASTE CONTROL SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(63, '000001479832', '39000', '05', 'A', 'PV ENVIRONMENT EQUIPMENT SDN. BHD.', 'MASITA', '', '010-669523', '', '', '', '', '', '', '', 2020),
(64, '000000521818', '38210', '05', 'A', 'SWM ENVIRONMENT SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(65, '000001533731', '38301', '05', 'A', 'XANTARA SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(66, '000002921526', '37000', '06', 'A', 'A & F MAJU TRADING', 'ASMAWI BIN MOHD SALLEH', 'PEMILIK', '019-989731', '', 'asmaie@hotmail.com', '', '', '', '', '', 2020),
(67, '000002008835', '38111', '06', 'A', 'BUJ TECHNOLOGY ENTERPRISE SDN. BHD.', 'NUR DALILAH', '', '09-51422', '', 'bujtchnology@gmail.com', '', '', '', '', '', 2020),
(68, '000003737990', '38112', '06', 'A', 'EVERLANTERN (CH) SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(69, '000003154418', '38112', '06', 'A', 'LEONG AUN METAL SDN. BHD.', 'SUZANA ISMAIL', 'KERANI', '012-800756', '', 'leongunmetal@gmail.com', '', '', '', '', '', 2020),
(70, '000003737718', '39000', '06', 'A', 'MAGNIFIQUE GREAT FORTUNE SDN. BHD.', 'SHAHRUL ARIFF NORAINI', 'PENGURUS AM', '0111083380', '', 'hdudgatsb@gmail.com', '', '', '', '', '', 2020),
(71, '000003062640', '38111', '06', 'A', 'MYM SERVICES (M) SDN. BHD.', 'SITI NURASYRANI MOHD YASSIN', 'EKSEKUTIF OPERASI', '', '', '', '', '', '', '', '', 2020),
(72, '000000279893', '38111', '06', 'A', 'SW NG TRADING', 'CHAN SAN CHONG', 'PENOLONG PENGURUS', '012-345931', '', '', '', '', '', '', '', 2020),
(73, '000003099684', '38302', '07', 'A', 'AER WORLDWIDE SDN. BHD.', 'Andre weighlein', 'Manager', '', '', '', '', '', '', '', '', 2020),
(74, '000001521600', '38302', '07', 'A', 'ASAHI G & S SDN BHD', 'Heng swee yeng', 'Pengarah', '', '', '', '', '', '', '', '', 2020),
(75, '000000514049', '38302', '07', 'A', 'ASAKARIKEN (M) SDN. BHD.', 'Teoh chin heong', 'Supervisor', '04-501191', '', 'ch.oh@asaka.co.jp', '', '', '', '', '', 2020),
(76, '000001422919', '38111', '07', 'A', 'AWS SALES & SERVICES SDN BHD', 'Jasper Wong', 'Accountant', '04-398860', '', 'awswm@gmail.com', '', '', '', '', '', 2020),
(77, '000000579434', '38112', '07', 'A', 'CANTER INDUSTRIES SDN. BHD.', 'Lee yew keng', 'Pengurus', '04-645768', '', '', '', '', '', '', '', 2020),
(78, '000001656692', '38302', '07', 'A', 'CYCLE TREND INDUSTRIES SDN. BHD.', 'Ms Lee ai mei', 'Pengurus', '04-509808', '', '', '', '', '', '', '', 2020),
(79, '000001722616', '37000', '07', 'A', 'DYNASTY BLISS SDN. BHD.', 'Mr Law', 'Pengarah', '017-411025', '', '', '', '', '', '', '', 2020),
(80, '000003217257', '38220', '07', 'A', 'GLORY ENVIRONMENTAL SERVICES SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(81, '000003182184', '38113', '07', 'A', 'HONG YIAP SOLUTIONS  SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(82, '000001707958', '38210', '07', 'A', 'HSB RECLAIMED RUBBER SDN. BHD.', 'The shi wei', 'HR clerk', '04-501177', '', '', '', '', '', '', '', 2020),
(83, '000000518069', '38302', '07', 'A', 'IRM INDUSTRIES (PENANG) SDN. BHD.', 'C.K.Lim', 'Admint', '04-62610', '', 'irm@com.my', '', '', '', '', '', 2020),
(84, '000001545501', '37000', '07', 'A', 'KBH WASTE SYSTEMS SDN. BHD.', 'Khoo Ban Hin', 'CEO', '012-48624', '', 'kbhwassystem@hotmail.com', '', '', '', '', '', 2020),
(85, '000003194164', '38112', '07', 'A', 'KENG TEIK TRADING', 'Loh ysuey chian', 'Pengurus', '017-52460', '', 'kengtetrading@gmail.com', '', '', '', '', '', 2020),
(86, '000001521983', '38112', '07', 'A', 'LHT KITARSEMULA SDN. BHD.', 'Tan leng hock', 'Pengarah', '04-62625', '', 'lhtycle@gmail.com', '', '', '', '', '', 2020),
(87, '000001879442', '38309', '07', 'A', 'MING ENGINEERING PLASTIC SDN. BHD.', 'W.L.Lee', 'HR', '04-50595', '', '', '', '', '', '', '', 2020),
(88, '000003144315', '38210', '07', 'A', 'PLB TERANG SDN. BHD.', 'Nur Adlina Mahzir', 'Accountant', '04-39037', '', 'adlina@plbgrop.com.my', '', '', '', '', '', 2020),
(89, '000001609468', '38301', '07', 'A', 'PREFERENCE MEGACYCLE SDN. BHD.', 'Zurianty Othman', 'Account clerk', '04-508300', '', 'customerservice@preferen.com', '', '', '', '', '', 2020),
(90, '000003179428', '37000', '07', 'A', 'PUNCAK INSPIRASI VENTURES', 'Farah Nadia', 'Pengurus', '04-658970', '', '', '', '', '', '', '', 2020),
(91, '000000491590', '38302', '07', 'A', 'RECLAIMTEK (M) SDN. BHD.', 'Yeap lee kuan', 'aAccountent', '04-508857', '', 'lky@com.my', '', '', '', '', '', 2020),
(92, '000002210292', '38112', '07', 'A', 'SENPLAS RECYCLE INDUSTRY', '', '', '', '', '', '', '', '', '', '', 2020),
(93, '000000544078', '38302', '07', 'A', 'SHAN POORNAM METALS SDN. BHD.', 'Kuah yoke lean', 'Pengarah', '04-50848', '', '', '', '', '', '', '', 2020),
(94, '000001675214', '38302', '07', 'A', 'TES-AMM (MALAYSIA) SDN. BHD.', 'Diana Amin', 'Pengurus kewangan', '07-25244', '', '', '', '', '', '', '', 2020),
(95, '000003004738', '37000', '07', 'A', 'TKP SERVICES SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(96, '000003192375', '37000', '07', 'A', 'WATREAT INDUSTRIAL SERVICES SDN BHD', 'Ooi seng weng', 'General manager', '012-267297', '', 'swooi@com.my', '', '', '', '', '', 2020),
(97, '000003337350', '38112', '08', 'A', 'AURA HIJAU BIOMASS (M) SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(98, '000003095110', '38112', '08', 'A', 'CHEAH PAPER RECYCLE SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(99, '000003720721', '38210', '08', 'A', 'ENVIRONMENT IDAMAN (PERAK) SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(100, '000003107740', '37000', '08', 'A', 'SEMANGAT MAJU INDAH (IPOH) SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(101, '000003055092', '38112', '08', 'A', 'SENG KONG RECYCLE FIBER SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(102, '000001605525', '38309', '08', 'A', 'SHYE GUAN PLASTIC INDUSTRIES SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(103, '000001562019', '38210', '08', 'A', 'TIAN SIANG BIOGAS POWER (AIR KUNING) SDN BHD', 'DOLAH MAHFUT BIN TOHID', 'PENGURUS', '012-52827', '', 'tsomk@tiansiang.com', '', '', '', '', '', 2020),
(104, '000001661954', '38210', '08', 'A', 'TITI SERONG EDAR SDN. BHD.', 'TAN KEAN CHUAN', 'A. MANAGER', '05-71611', '', '', '', '', '', '', '', 2020),
(105, '000001962681', '38303', '08', 'A', 'TYRE OIL (M) SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(106, '000002261564', '38112', '08', 'A', 'YONG XUAN ENTERPRISE', 'CHAN KOOI PENG', 'PEMILIK', '016-56312', '', '', '', '', '', '', '', 2020),
(107, '000002460751', '38112', '09', 'A', 'AD DESMOND ENTERPRISE', 'AD Desmond', 'Pengurus', '011-150548', '', '', '', '', '', '', '', 2020),
(108, '000000258220', '38112', '09', 'A', 'ARUMUGAM A/L KRISHNASAMY', 'ARUMUGAM A/L KRISHNASAMY', 'Pengurus', '012-45290', '', '', '', '', '', '', '', 2020),
(109, '000000567813', '38111', '09', 'A', 'KASBUDI SERVICES SDN BHD', 'Nani Haryani', 'Kerani', '04-98529', '', '', '', '', '', '', '', 2020),
(110, '000000519252', '38111', '10', 'BA', 'ALAM FLORA SDN. BHD.', 'AZAHARI ZAINAL ABIDIN', 'KETUA PEGAWAI KEWANGAN', '03-205211', '', 'azahiz@alamflora.com.my', '', '', '', '', '', 2020),
(111, '000000548097', '38309', '10', 'A', 'ALH INDUSTRIES SDN BHD', '', '', '', '', '', '', '', '', '', '', 2020),
(112, '000003098759', '38220', '10', 'A', 'ANGGUN KITAR RESOURCES SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(113, '000002066421', '37000', '10', 'A', 'AS RESOURCES SERVICES SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(114, '000002065778', '38210', '10', 'A', 'BIOFUEL ENERGY RESOURCES SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(115, '000001510365', '38220', '10', 'BA', 'CLINWASTE (M) SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(116, '000003069279', '38112', '10', 'A', 'COMPOSITE MATERIAL SERVICES & SOLUTIONS SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(117, '000003100514', '39000', '10', 'A', 'DYNAMIC ENVIRON SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(118, '000002018205', '38112', '10', 'A', 'EMPANGAN HIJAU SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(119, '000003077597', '37000', '10', 'A', 'EQOOL ENVIRO SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(120, '000003104683', '38112', '10', 'A', 'GREEN WASTE MANAGEMENT SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(121, '000001653820', '38112', '10', 'A', 'GSL MATERIALS RECYCLING SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(122, '000000446772', '38210', '10', 'A', 'HOCK LONG PAPER SDN BHD', '', '', '', '', '', '', '', '', '', '', 2020),
(123, '000002018299', '38112', '10', 'A', 'HUA TICK RECYCLE SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(124, '000003720051', '39000', '10', 'A', 'JERNIH WASTE MANAGEMENT SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(125, '000002478217', '38112', '10', 'A', 'KAISAN RECYCLE AND TRANSPORT', '', '', '', '', '', '', '', '', '', '', 2020),
(126, '000000499296', '38302', '10', 'A', 'KARICH SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(127, '000002036332', '38112', '10', 'A', 'KPT RECYCLE SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(128, '000003387872', '38112', '10', 'A', 'LW STAR RESOURCES', '', '', '', '', '', '', '', '', '', '', 2020),
(129, '000000490800', '38111', '10', 'B', 'MAJU WASTE DISPOSAL SDN BHD', 'THE HANG MING', 'DIRECTOR', '03-51227', '', '', '', '', '', '', '', 2020),
(130, '000001689689', '38220', '10', 'A', 'MALIK FAMILY RESOURCES TECHNOLOGY SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(131, '000001814364', '38302', '10', 'A', 'MATSUDA SANGYO (MALAYSIA) SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(132, '000003686792', '38210', '10', 'A', 'METAL MAX WASTE SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(133, '000002026900', '38112', '10', 'A', 'N.U. RECYCLE SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(134, '000003078696', '37000', '10', 'A', 'NUSAJAYA SAKTI SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(135, '000000590803', '38210', '10', 'A', 'O3 SOLUTIONS SDN BHD', '', '', '', '', '', '', '', '', '', '', 2020),
(136, '000002815361', '38301', '10', 'A', 'OMEGA METAL RECYCLE SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(137, '000000462740', '38112', '10', 'A', 'PERUSAHAAN CHEW HUR SDN BHD', '', '', '', '', '', '', '', '', '', '', 2020),
(138, '000003447297', '39000', '10', 'A', 'PKZ WASTE MANAGEMENT SDN.BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(139, '000000553957', '37000', '10', 'A', 'PRISTINE  WATERS SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(140, '000000579332', '38114', '10', 'B', 'RADIFLEET SDN. BHD.', 'Wan Mawarnisa binti Wan Anowar', 'Pengurus kewangan & pentadbiran', '03-618712', '', 'mawaisa@radicare.com', '', '', '', '', '', 2020),
(141, '000003094128', '37000', '10', 'A', 'SIGMA WATER ENGINEERING (M) SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(142, '000001727723', '38309', '10', 'A', 'SILVER CORAL SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(143, '000000438696', '38111', '10', 'BA', 'SITAMAS ENVIRONMENTAL SYSTEMS SDN. BHD.', 'KAREN LIEW', 'FINANCE & ADMIN MANAGER', '03-551040', '', 'kareiew@sitamas.com', '', '', '', '', '', 2020),
(144, '000003076639', '38111', '10', 'A', 'SMART T & T SDN. BHD.', 'Ms Tan Poh Lan', 'Admin', '03-8706 84', '', 'pltan.ttt@gmail.com', '', '', '', '', '', 2020),
(145, '000001623709', '38309', '10', 'A', 'STEADY SERIES SDN BHD', '', '', '', '', '', '', '', '', '', '', 2020),
(146, '000001679276', '37000', '10', 'A', 'SUKMA SEMANGAT SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(147, '000003064097', '38309', '10', 'A', 'SUNGEEL HITECH SDN. BHD.', 'Vivian chew', 'Admin & Account Manager', '03-3102 33', '', 'vivan@sungeel', '', '', '', '', '', 2020),
(148, '000001369022', '38220', '10', 'A', 'TENSIDCHEM SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(149, '000002020788', '38111', '10', 'A', 'TEX CYCLE (P2) SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(150, '000000513127', '38210', '10', 'A', 'WORLDWIDE LANDFILLS SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(151, '000003588014', '39000', '10', 'A', 'ZHAN YING WASTE DISPOSAL SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(152, '000003065765', '38112', '11', 'A', 'KAMAZAI METAL SDN. BHD.', 'Wan Norelina Wan Yahya', 'Kerani', '09-829390', '', '', '', '', '', '', '', 2020),
(153, '000001541117', '38220', '11', 'A', 'QUALITEST  ENGINEERING SDN BHD', 'Norakma Radzi', 'HR Exercutive', '09-96331', '', '', '', '', '', '', '', 2020),
(154, '000002739101', '38112', '11', 'A', 'RD PAPERS SDN. BHD.', 'Nureisa Elida bt Abd Aziz', 'Kerani', '013-95740', '', 'nurea@rdpapers.com', '', '', '', '', '', 2020),
(155, '000001596702', '38301', '12', 'A', 'ASTIMEWA SDN BHD', 'LAU SHUK SIM', 'Akaun', '0896727', '', 'astimewbdh@gmail.com', '', '', '', '', '', 2020),
(156, '000002037468', '38112', '12', 'A', 'CITY EXPRESS RECYCLING SDN. BHD.', 'PANG SU VUI', 'MANAGER', '013-89246', '', 'cityycle@yahoo.com', '', '', '', '', '', 2020),
(157, '000002536311', '38112', '12', 'A', 'GNC RECYCLE SDN. BHD.', 'FAURINA BINTI AMIT', 'KERANI', '088-7641', '', '', '', '', '', '', '', 2020),
(158, '000001913205', '38121', '12', 'A', 'LAGENDA BUMIMAS SDN BHD', 'CHIN CHING CHING', 'CLERK', '088-8589', '', 'lagendaimas@gmail.com', '', '', '', '', '', 2020),
(159, '000001879223', '38309', '12', 'A', 'MAL TECHNOLOGY WORLD SDN BHD', 'ZHUANG GUO LIANG', 'PENGURUS', '012-86789', '', '', '', '', '', '', '', 2020),
(160, '000003735431', '39000', '12', 'A', 'PETROJADI SDN. BHD.', 'MOHD ZAHIDI MAAMUR', 'FINANCE MANAGER', '03-8688418', '', 'ENQUIRS@PETROJADI.COM', '', '', '', '', '', 2020),
(161, '000002944321', '38112', '12', 'A', 'SYARIKAT PERNIAGAAN WON', 'ANIH BAHTIAR', 'KERANI', '019361374', '', '', '', '', '', '', '', 2020),
(162, '000000515835', '38115', '12', 'B', 'TOKOWIRA SDN.BHD', 'IVY LIEW', 'MANAGER', '088-3171', '', 'tokwirasb@gmail.com', '', '', '', '', '', 2020),
(163, '000003137744', '38112', '12', 'A', 'WAWASAN OIL RECYCLE SDN. BHD.', 'MS.LIM', 'KERANI', '089-2269', '', 'work@gmail.com', '', '', '', '', '', 2020),
(164, '000003202033', '38210', '13', 'A', 'BBC BIOGAS SDN BHD', 'JENNY SIA', 'ACCOUNTANT', '086-31588', '', 'jennia@bbcgroup.com.my', '', '', '', '', '', 2020),
(165, '000002627316', '38112', '13', 'A', 'GVE STRATEGIC WASTE SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(166, '000003218312', '38112', '13', 'A', 'LING RECYCLE TRADING COMPANY', 'MR LING', 'MANAGER', '012-8806094', '', '', '', '', '', '', '', 2020),
(167, '000000576308', '37000', '13', 'A', 'MAGNA-MITRE SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(168, '000003242269', '38112', '13', 'A', 'MH METAL ENTERPRISE', '', '', '', '', '', '', '', '', '', '', 2020),
(169, '000000568751', '37000', '13', 'A', 'SAR-ALAM INDAH SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(170, '000003620113', '39000', '13', 'A', 'SINAR ARANG GREENTECH SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(171, '000000569048', '38301', '13', 'A', 'SPECASTS RECYCLE SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(172, '000002070017', '38113', '13', 'A', 'SYARIKAT SENI BUMI CONTRACTOR SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(173, '000001597592', '38210', '13', 'A', 'TABES SDN. BHD.', 'CECILIA LING', 'SR ACCOUNT MANAGER', '084-33957', '', 'cecia.ling@taann.com', '', '', '', '', '', 2020),
(174, '000001889932', '38112', '13', 'A', 'TONG SIANG TRADING CO', 'NGU YIENG YIENG', 'KERANI/WAKIL MAJIKAN', '084-6550', '', '', '', '', '', '', '', 2020),
(175, '000002535292', '38220', '13', 'BA', 'TRIENEKENS (SARAWAK) SDN BHD', 'Cassie Liew Kay Tze', 'Division Manager', '082-61070', '', 'cassliew@trienekens.com', '', '', '', '', '', 2020),
(176, '000002065682', '38112', '13', 'A', 'TRIPLE-C RECYCLE SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(177, '000003617429', '39000', '13', 'A', 'WASTECURE SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(178, '000001638143', '38303', '13', 'A', 'ZHA ENVIRONMENTAL SDN BHD', '', '', '', '', '', '', '', '', '', '', 2020),
(179, '000003259254', '38220', '14', 'A', 'ACTIVE ENVIRONS SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(180, '000003719266', '39000', '14', 'A', 'ALAM AMAN BIOMASS SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(181, '000003125128', '37000', '14', 'A', 'CENTRAL AERATION SDN. BHD.', 'MR LINGGAM', 'NIL', '019-91907', '', 'mahaperkhidmindera@gmail.com', '', '', '', '', '', 2020),
(182, '000001879278', '38220', '14', 'A', 'CENVIRO RECYCLING AND RECOVERY  SDN. BHD.', 'KONG LEE PENG', 'GENERAL MANAGER, FINANCE', '03-272610', '', 'leepng.com', '', '', '', '', '', 2020),
(183, '000002769108', '37000', '14', 'A', 'CITY SEWERAGE (M) SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(184, '000001677114', '38111', '14', 'A', 'EDARAN SWM SDN BHD', 'MS JANET', 'HR DEPARTMENT', '03-27880', '', 'honmng@swmsb.com', '', '', '', '', '', 2020),
(185, '12', '38114', '14', 'B', 'EDGENTA MEDISERVE SDN. BHD.', 'LIM JOR SZE', 'HEAD OF FINANCE - HEALTHCARE CONCESSION', '03-2727121', '', 'jore@eenta.com', '', '', '', '', '', 2020),
(186, '000003073093', '38220', '14', 'A', 'ELEMENTS ALLIANCE TECHNOLOGY SDN. BHD.', 'MR. KAM KIAT FU', 'MANAGER', '012-632998', '', 'kkifu@gmail.com', '', '', '', '', '', 2020),
(187, '000002756644', '38301', '14', 'A', 'GAJAN TRADING', 'M. BOOBALAN', 'MANAGER', '03-991003', '', '', '', '', '', '', '', 2020),
(188, '000000874151', '38301', '14', 'A', 'GAJAPATHI METALS', 'MR. SITHAM BARAM', 'ASST. MANAGER', '017312505', '', 'b.am@yahoo.com', '', '', '', '', '', 2020),
(189, '000003295622', '38210', '14', 'A', 'GLT ENERGY SDN. BHD.', 'ABDUL HAMID BIN ABDULLAH', 'FINANCE CONTROLLER', '03-761649', '', '.abllah@cenergi-sea.com', '', '', '', '', '', 2020),
(190, '000003264358', '38121', '14', 'A', 'GREENLAND DISPOSAL & WASTE MANAGEMENT SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(191, '000000485258', '37000', '14', 'BA', 'INDAH WATER KONSORTIUM SDN. BHD.', 'CHUA TIONG LEONG', 'PENGURUS BESAR - KEWANGAN', '03-2780128', '', 'tcua@iwk.com.my', '', '', '', '', '', 2020),
(192, '000003693352', '38303', '14', 'A', 'KLANG TYRE OIL SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(193, '000001461151', '38220', '14', 'BA', 'KUALITI ALAM SDN BHD', 'BADRUL HISHAM MD YUSOF', 'DEPUTY GENERAL MANAGER, FINANCE', '03-2726100', '', 'badyusof@cenviro.com', '', '', '', '', '', 2020),
(194, '000000574173', '38210', '14', 'A', 'KUB-BERJAYA ENVIRO SDN. BHD.', 'MOHAMED HAFIDZ BIN MOHD SALLEH', 'GENERAL MANAGER, FINANCE', '03-2686333', '', 'hafi@kbenviro.com.my', '', '', '', '', '', 2020),
(195, '000003090717', '37000', '14', 'A', 'LOYAL BEWG SDN. BHD.', 'NOORFARAWAHIDA', '', '03-2242688', '', 'noorfarahida@loyalgroup.com.my', '', '', '', '', '', 2020),
(196, '000001457258', '38220', '14', 'BA', 'MEDIVEST SDN. BHD.', 'EN. SALIHIN', 'SENIOR MANAGER FINANCE', '03-209000', '', 'salin@medivest.com.my', '', '', '', '', '', 2020),
(197, '000002924487', '38112', '14', 'A', 'NOVE METAL RECYCLING SDN BHD', 'MS TIHEESHA', 'ADMIN', '03-7982673', '', 'novemelhr@gmail.com', '', '', '', '', '', 2020),
(198, '000002806267', '38220', '14', 'A', 'RUBBERFLEX REENERGY SDN. BHD.', 'KAREN WONG', 'FINANCE MANAGER', '03-20720', '', '', '', '', '', '', '', 2020),
(199, '000003719735', '39000', '14', 'A', 'SEMERAH RESOURCES SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(200, '000003648314', '38210', '14', 'A', 'SG HARMONI RESOURCES SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(201, '000001984694', '38112', '14', 'A', 'SPRECO RECYCLE SDN. BHD.', 'PN MIZA', '', '', '', '', '', '', '', '', '', 2020),
(202, '000003114317', '37000', '14', 'A', 'STENGELIN (M) SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(203, '000001989677', '37000', '14', 'A', 'SWA WATER (MALAYSIA) SDN. BHD.', 'MISS LALITHA', 'FINANCE & HR DEPARTMENT', '03-2181389', '', 'latha@swawater.com.au', '', '', '', '', '', 2020),
(204, '000001598400', '38111', '14', 'A', 'SWM ENVIRO SDN. BHD.', '', 'HR DEPARTMENT', '03-279200', '', '', '', '', '', '', '', 2020),
(205, '000001849430', '38114', '14', 'B', 'SWM ENVIRONMENT SDN. BHD.', 'GARY GOH SAI KEONG', 'GENERAL MANAGER - FINANCE', '03-278200', '', '', '', '', '', '', '', 2020),
(206, '000001607660', '39000', '14', 'A', 'SYARIKAT INDAH BERSIH SDN.BHD.', 'PN. ANI', 'AKAUN', '03-2828219', '', 'p@syarikatindahbersih.com.my', '', '', '', '', '', 2020),
(207, '000001416158', '38111', '14', 'A', 'TEGAS MESRA SDN. BHD.', 'WAN FARZILAWATI', 'PENGARAH', '03-404533', '', 'mragrp@yahoo.com', '', '', '', '', '', 2020),
(208, '000001634267', '38111', '14', 'A', 'THANAM INDUSTRY SDN. BHD.', 'MR RAYMON RAVI', 'ADMIN', '012-23544', '', 'zilray@yahoo.com', '', '', '', '', '', 2020),
(209, '000003669883', '38220', '14', 'A', 'TROPICANA AESTHETIC SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(210, '000001941544', '38111', '14', 'A', 'UER RESOURCES SDN. BHD.', 'NURSHARIZA BINTI YUSOFF', 'HR & ADMIN EXECUTIVE', '03-278847', '', '', '', '', '', '', '', 2020),
(211, '000003525069', '38303', '14', 'A', 'YNT CENTURY TRADING', 'MR YAP', 'PEMILIK', '012-25284', '', '', '', '', '', '', '', 2020),
(212, '000003092315', '38112', '14', 'A', 'YY LEE TRADING SDN. BHD.', 'LEE SUI LING', 'ADMIN', '03-628019', '', 'yyleetrangsb@gmail.com', '', '', '', '', '', 2020),
(213, '000001835738', '38121', '15', 'A', 'INNATECH WASTE MANAGEMENT (LABUAN) SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020),
(214, '000003422709', '38301', '15', 'A', 'MEGAH STEEL (LABUAN) SDN BHD', '', '', '', '', '', '', '', '', '', '', 2020),
(215, '000003207487', '38121', '15', 'A', 'SAFE & CLEAN OIL RECYCLE SDN. BHD.', '', '', '', '', '', '', '', '', '', '', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survei`
--

CREATE TABLE IF NOT EXISTS `tbl_survei` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rangka` int(11) NOT NULL,
  `id_suku` int(11) NOT NULL,
  `tarikh_kemaskini` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `010101` varchar(255) NOT NULL COMMENT 'ssm',
  `010201` varchar(255) NOT NULL,
  `010202` varchar(255) NOT NULL COMMENT 'jika Lain-Lain pd 010201',
  `010301` varchar(255) NOT NULL,
  `020401` int(11) NOT NULL,
  `020402` int(11) NOT NULL,
  `020403` int(11) NOT NULL COMMENT 'jumlah (020401+020402)',
  `020501` int(11) NOT NULL,
  `020502` int(11) NOT NULL,
  `020503` int(11) NOT NULL COMMENT 'jumlah (020501+020502)',
  `020601` int(11) NOT NULL,
  `020602` int(11) NOT NULL,
  `020603` int(11) NOT NULL COMMENT 'jumlah (020601+020602)',
  `033401` int(11) NOT NULL COMMENT 'unit ',
  `032401` int(11) NOT NULL COMMENT 'kuantiti ',
  `031401` int(11) NOT NULL COMMENT 'nilai',
  `033402` int(11) NOT NULL COMMENT 'unit',
  `032402` int(11) NOT NULL COMMENT 'kuantiti',
  `031402` int(11) NOT NULL COMMENT 'nilai',
  `033403` int(11) NOT NULL COMMENT 'unit',
  `032403` int(11) NOT NULL COMMENT 'kuantiti',
  `031403` int(11) NOT NULL COMMENT 'nilai',
  `033404` int(11) NOT NULL COMMENT 'unit',
  `032404` int(11) NOT NULL COMMENT 'kuantiti ',
  `031404` int(11) NOT NULL COMMENT 'nilai',
  `033405` int(11) NOT NULL COMMENT 'unit',
  `032405` int(11) NOT NULL COMMENT 'kuantiti',
  `031405` int(11) NOT NULL COMMENT 'nilai',
  `031406` int(11) NOT NULL COMMENT 'jumlah (031401+031402+031403+031404+031405)',
  `034401` int(11) NOT NULL COMMENT 'peratus',
  `033501` int(11) NOT NULL COMMENT 'unit',
  `032501` int(11) NOT NULL COMMENT 'kuantiti ',
  `031501` int(11) NOT NULL COMMENT 'nilai',
  `033502` int(11) NOT NULL COMMENT 'unit',
  `032502` int(11) NOT NULL COMMENT 'kuantiti ',
  `031502` int(11) NOT NULL COMMENT 'nilai',
  `033503` int(11) NOT NULL COMMENT 'unit',
  `032503` int(11) NOT NULL COMMENT 'kuantiti',
  `031503` int(11) NOT NULL COMMENT 'nilai',
  `033504` int(11) NOT NULL COMMENT 'unit',
  `032504` int(11) NOT NULL COMMENT 'kuantiti ',
  `031504` int(11) NOT NULL COMMENT 'nilai',
  `033505` int(11) NOT NULL COMMENT 'unit',
  `032505` int(11) NOT NULL COMMENT 'kuantiti',
  `031505` int(11) NOT NULL COMMENT 'nilai',
  `031506` int(11) NOT NULL COMMENT 'jumlah (031501+031502+031503+031504+031505)',
  `034501` int(11) NOT NULL COMMENT 'peratus',
  `033601` int(11) NOT NULL,
  `032601` int(11) NOT NULL,
  `031601` int(11) NOT NULL,
  `033602` int(11) NOT NULL,
  `032602` int(11) NOT NULL,
  `031602` int(11) NOT NULL,
  `033603` int(11) NOT NULL,
  `032603` int(11) NOT NULL,
  `031603` int(11) NOT NULL,
  `033604` int(11) NOT NULL,
  `032604` int(11) NOT NULL,
  `031604` int(11) NOT NULL,
  `033605` int(11) NOT NULL,
  `032605` int(11) NOT NULL,
  `031605` int(11) NOT NULL,
  `031606` int(11) NOT NULL,
  `034601` int(11) NOT NULL,
  `040401` int(11) NOT NULL,
  `040402` int(11) NOT NULL,
  `040403` int(11) NOT NULL,
  `040404` int(11) NOT NULL,
  `040405` int(11) NOT NULL,
  `040501` int(11) NOT NULL,
  `040502` int(11) NOT NULL,
  `040503` int(11) NOT NULL,
  `040504` int(11) NOT NULL,
  `040505` int(11) NOT NULL,
  `040601` int(11) NOT NULL,
  `040602` int(11) NOT NULL,
  `040603` int(11) NOT NULL,
  `040604` int(11) NOT NULL,
  `040605` int(11) NOT NULL,
  `054101` int(11) NOT NULL,
  `054201` int(11) NOT NULL,
  `054301` int(11) NOT NULL,
  `054102` int(11) NOT NULL,
  `054202` int(11) NOT NULL,
  `054302` int(11) NOT NULL,
  `054402` int(11) NOT NULL,
  `054103` int(11) NOT NULL,
  `054203` int(11) NOT NULL,
  `054303` int(11) NOT NULL,
  `054403` int(11) NOT NULL,
  `054104` int(11) NOT NULL,
  `054204` int(11) NOT NULL,
  `054304` int(11) NOT NULL,
  `054404` int(11) NOT NULL,
  `055101` int(11) NOT NULL,
  `055201` int(11) NOT NULL,
  `055301` int(11) NOT NULL,
  `055102` int(11) NOT NULL,
  `055202` int(11) NOT NULL,
  `055302` int(11) NOT NULL,
  `055402` int(11) NOT NULL,
  `055103` int(11) NOT NULL,
  `055203` int(11) NOT NULL,
  `055303` int(11) NOT NULL,
  `055403` int(11) NOT NULL,
  `055104` int(11) NOT NULL,
  `055204` int(11) NOT NULL,
  `055304` int(11) NOT NULL,
  `055404` int(11) NOT NULL,
  `056101` int(11) NOT NULL,
  `056201` int(11) NOT NULL,
  `056301` int(11) NOT NULL,
  `056102` int(11) NOT NULL,
  `056202` int(11) NOT NULL,
  `056302` int(11) NOT NULL,
  `056402` int(11) NOT NULL,
  `056103` int(11) NOT NULL,
  `056203` int(11) NOT NULL,
  `056303` int(11) NOT NULL,
  `056403` int(11) NOT NULL,
  `056104` int(11) NOT NULL,
  `056204` int(11) NOT NULL,
  `056304` int(11) NOT NULL,
  `056404` int(11) NOT NULL,
  `060101` int(11) NOT NULL,
  `060102` int(11) NOT NULL,
  `060103` int(11) NOT NULL,
  `060104` int(11) NOT NULL,
  `060105` int(11) NOT NULL,
  `060106` int(11) NOT NULL,
  `060107` int(11) NOT NULL,
  `060108` int(11) NOT NULL,
  `060109` int(11) NOT NULL,
  `060201` int(11) NOT NULL,
  `060202` int(11) NOT NULL,
  `060203` int(11) NOT NULL,
  `060204` int(11) NOT NULL,
  `060205` int(11) NOT NULL,
  `060206` int(11) NOT NULL,
  `060207` int(11) NOT NULL,
  `060208` int(11) NOT NULL,
  `060209` int(11) NOT NULL,
  `060301` int(11) NOT NULL,
  `060302` int(11) NOT NULL,
  `060303` int(11) NOT NULL,
  `060304` int(11) NOT NULL,
  `060305` int(11) NOT NULL,
  `060306` int(11) NOT NULL,
  `060307` int(11) NOT NULL,
  `060308` int(11) NOT NULL,
  `060309` int(11) NOT NULL,
  `060401` int(11) NOT NULL,
  `060402` int(11) NOT NULL,
  `060403` int(11) NOT NULL,
  `060404` int(11) NOT NULL,
  `060405` int(11) NOT NULL,
  `060406` int(11) NOT NULL,
  `060407` int(11) NOT NULL,
  `060408` int(11) NOT NULL,
  `060409` int(11) NOT NULL,
  `070101` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
