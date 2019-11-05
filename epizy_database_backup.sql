-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql313.byetcluster.com
-- Generation Time: Nov 05, 2019 at 12:37 PM
-- Server version: 5.6.45-86.1
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_24252258_user_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `academicyear` int(3) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `Name`, `photo`, `academicyear`, `link`) VALUES
(2, 'Teknologji Dixhitale', '8C3A69AB-A03C-42CB-8BE2-04B921E22837.png', 1, 'http://www.mediafire.com/file/oatz7nypf14pf9l/TekDigjitale.zip/file'),
(3, 'Hyrje ne Programim', 'F205B6C3-8569-4834-9FC7-8EDD59470F4E.png', 1, 'http://www.mediafire.com/file/1i9tp32u5z4skxm/Programim.zip/file'),
(4, 'Bazat e Bartjes se Informacionit', 'iStock_000012499607_XXXLarge-1024x576.jpg', 1, 'http://www.mediafire.com/file/egdhr0apl6bmmx5/BBI.zip/file'),
(5, 'Hyrje ne Rrjeta', '78FD11D4-D1A5-4FE4-B44B-9539C37AFFD1.png', 1, 'http://www.mediafire.com/file/4sot6dddjurbqv3/HyrjeneRrjeta.zip/file'),
(6, 'Senzoret dhe Interfejsi', 'FB2924DA-060B-4E88-9048-22E409ED8D83.png', 1, 'http://www.mediafire.com/file/6sd5vcbxwb1iws7/Senzoret.zip/file'),
(7, 'Algoritme dhe Struktura e te Dhenave', 'B7812901-2E2D-42B0-BCEE-6793B96A808C.png', 1, 'http://www.mediafire.com/file/n009u95us8fbqhs/Algoritmet.zip/file'),
(8, 'Arkitektura e Sistemeve dhe Sistemet Operative', '99E37673-E9A1-42C1-8B3E-8A6097DEA8D5.png', 1, 'http://www.mediafire.com/file/93dr23r1ndcw7qa/AS_SO.zip/file'),
(9, 'Hyrje ne Gjuhet e Web dhe Teknologjite', '3FE56521-6F9C-433C-8B31-6F5E9634B4C6.png', 1, 'http://www.mediafire.com/file/w05je55c2pgpybi/Web_Gjuhet.zip/file'),
(10, 'Provime', '106960-ON4KF5-290.jpg', 1, 'http://www.mediafire.com/file/v52v13fe0rsp879/provime.zip/file'),
(11, 'Metodat e Transmetimit', 'orange-background-with-wifi_23-2147630754.jpg', 2, 'https://www.mediafire.com/file/6c4202sesfynhiw/Metodat_e_Transmetimit.rar/file'),
(12, 'Paisjet Elektronike', 'functions-IntegratedCircuits-1170x659.jpg', 2, '#'),
(13, 'Analiza e Orientuar ne Objekte dhe Dizajni', 'object-oriented-programming_25156-49.jpg', 2, 'https://www.mediafire.com/file/hy6glmhbas77o75/OOP.rar/file'),
(14, 'Inxhinieringu Softuerik', '339255-PALBC4-591.jpg', 2, 'https://www.mediafire.com/file/988s22q17b8oauo/Software_Engineering.rar/file'),
(15, 'Kerkesat nÃ« dizajnimin e sistemit', '352111-PAR7S3-904.jpg', 2, 'https://www.mediafire.com/file/y4wxs4m7ugfotkx/Kerkesat_per_Dizajnimin_e_Sistemit.rar/file'),
(16, 'TCP-IP', '743175-636706976969356689-16x9.png', 2, 'https://www.mediafire.com/file/ufyjus4byoajqns/TCP-IP.rar/file'),
(17, 'Mikrokontrolleret', '62393707_660749814349798_2991504894155816960_n.jpg', 2, 'https://www.mediafire.com/file/twlnmppap24c37y/Literatura_Mikrokontrolleret.zip/file'),
(18, 'Autentifikim dhe Kriptografi', 'security-web.jpg', 2, 'https://www.mediafire.com/file/jd4ucnb2jvamosz/Autentifikim_dhe_Kriptografi.rar/file'),
(19, 'Metodat e Hulumtimit', '720Cresearchmaze.jpg', 2, 'http://www.mediafire.com/file/2t84puvtuxx5zpm/Metodat_e_Hulumtimit.rar/file'),
(20, 'Nderveprimi Njeri Kompjuter', 'human-computer-interaction-bs.jpg', 2, 'https://www.mediafire.com/file/7gjjo2a6chobn6x/Nderveprimi_Njeri-Kompjuter.rar/file'),
(21, 'Provime', '106960-ON4KF5-2901.jpg', 2, 'https://www.mediafire.com/file/50xc1qbkcabb7yh/Provime_Viti_2te.rar/file'),
(26, 'Provime 2', '106960-ON4KF5-290111.jpg', 2, 'https://www.mediafire.com/file/sde3cwj7vc9affy/Provime_Viti_2te_pjesa_2.rar/file');

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(11) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'https://image.flaticon.com/icons/svg/148/148947.svg?fbclid=IwAR1qMT-iyh6nQNlIyVNu4VaFEiLQoRa4FUZD5iv8xM5ZjL3h_nYbFTi-y_k',
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `folder_name`, `photo`, `date`, `time`, `id_user`) VALUES
(65, 'PHP', 'https://image.flaticon.com/icons/svg/148/148947.svg?fbclid=IwAR1qMT-iyh6nQNlIyVNu4VaFEiLQoRa4FUZD5iv8xM5ZjL3h_nYbFTi-y_k', '02/10/2019', '19:56', 114),
(66, 'Python', 'https://image.flaticon.com/icons/svg/148/148947.svg?fbclid=IwAR1qMT-iyh6nQNlIyVNu4VaFEiLQoRa4FUZD5iv8xM5ZjL3h_nYbFTi-y_k', '02/10/2019', '19:56', 114);

-- --------------------------------------------------------

--
-- Table structure for table `folder_uploads`
--

CREATE TABLE `folder_uploads` (
  `id` int(11) NOT NULL,
  `upload_name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `id_folder` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `folder_uploads`
--

INSERT INTO `folder_uploads` (`id`, `upload_name`, `link`, `photo`, `date`, `time`, `id_folder`, `id_user`) VALUES
(11, 'Symfony PHP Framework Tutorial - Full Course', 'https://youtu.be/Bo0guUbL5uo', 'https://img.youtube.com/vi/Bo0guUbL5uo/hqdefault.jpg', '02/10/2019', '19:58', 65, 114),
(10, 'Laravel PHP Framework Tutorial - Full Course for Beginners (2019)', 'https://youtu.be/ImtZ5yENzgE', 'https://img.youtube.com/vi/ImtZ5yENzgE/hqdefault.jpg', '02/10/2019', '19:57', 65, 114),
(9, 'PHP Programming Language Tutorial - Full Course', 'https://youtu.be/OK_JCtrrv-c', 'https://img.youtube.com/vi/OK_JCtrrv-c/hqdefault.jpg', '02/10/2019', '19:57', 65, 114),
(12, 'Learn Python - Full Course for Beginners [Tutorial]', 'https://youtu.be/rfscVS0vtbw', 'https://img.youtube.com/vi/rfscVS0vtbw/hqdefault.jpg', '02/10/2019', '19:58', 66, 114),
(13, 'Python Tutorial for Beginners [Full Course] 2019', 'https://youtu.be/_uQrJ0TkZlc', 'https://img.youtube.com/vi/_uQrJ0TkZlc/hqdefault.jpg', '02/10/2019', '19:58', 66, 114),
(14, 'Full Python Programming Course | Python Tutorial for Beginners | Learn Python (2019)', 'https://youtu.be/bZ6NL59FMoc', 'https://img.youtube.com/vi/bZ6NL59FMoc/hqdefault.jpg', '02/10/2019', '19:59', 66, 114);

-- --------------------------------------------------------

--
-- Table structure for table `kursori`
--

CREATE TABLE `kursori` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'img/ERiSmvg8_400x400.jpg',
  `link` varchar(255) NOT NULL,
  `course` int(2) NOT NULL,
  `week` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursori`
--

INSERT INTO `kursori` (`id`, `Name`, `photo`, `link`, `course`, `week`) VALUES
(22, 'Komponentet e Web-it', 'http://i3.ytimg.com/vi/vkO0GYHb2iI/hqdefault.jpg', 'https://www.youtube.com/watch?v=vkO0GYHb2iI', 1, 1),
(21, 'Hyrje nÃ« HTML', 'http://i3.ytimg.com/vi/BglGVumyq9o/hqdefault.jpg', 'https://www.youtube.com/watch?v=BglGVumyq9o', 1, 1),
(23, 'Procesi', 'http://i3.ytimg.com/vi/ZuALTk6rR9o/hqdefault.jpg', 'https://www.youtube.com/watch?v=ZuALTk6rR9o', 1, 1),
(24, 'Organizimi', 'http://i3.ytimg.com/vi/GIAnfiV4e-0/hqdefault.jpg', 'https://www.youtube.com/watch?v=GIAnfiV4e-0', 1, 1),
(25, 'Struktura bazike e HTML', 'http://i3.ytimg.com/vi/D2TrAkon3VY/hqdefault.jpg', 'https://www.youtube.com/watch?v=D2TrAkon3VY', 1, 1),
(26, 'Paragrafi', 'http://i3.ytimg.com/vi/PtPKgDWuUGM/hqdefault.jpg', 'https://www.youtube.com/watch?v=PtPKgDWuUGM', 1, 1),
(27, 'Titulli', 'http://i3.ytimg.com/vi/qVuVulF6Bb0/hqdefault.jpg', 'https://www.youtube.com/watch?v=qVuVulF6Bb0', 1, 1),
(28, 'Teksti', 'http://i3.ytimg.com/vi/jf-88WffZII/hqdefault.jpg', 'https://www.youtube.com/watch?v=jf-88WffZII&feature=youtu.be', 1, 1),
(29, 'Listat', 'http://i3.ytimg.com/vi/a_Bu4jIO7bA/hqdefault.jpg', 'https://www.youtube.com/watch?v=a_Bu4jIO7bA', 1, 1),
(30, 'Linqet', 'http://i3.ytimg.com/vi/ainjBTipdHs/hqdefault.jpg', 'https://www.youtube.com/watch?v=ainjBTipdHs', 1, 1),
(31, 'FotografitÃ«', 'http://i3.ytimg.com/vi/9oOdKXYax80/hqdefault.jpg', 'https://www.youtube.com/watch?v=9oOdKXYax80', 1, 1),
(32, 'Tabelat', 'http://i3.ytimg.com/vi/YO4UfHiFw40/hqdefault.jpg', 'https://www.youtube.com/watch?v=YO4UfHiFw40', 1, 1),
(33, 'Format', 'http://i3.ytimg.com/vi/8SyCxZEn-Sc/hqdefault.jpg', 'https://www.youtube.com/watch?v=8SyCxZEn-Sc', 1, 1),
(34, 'Elemente tÃ« tjera', 'http://i3.ytimg.com/vi/MA_A84760Us/hqdefault.jpg', 'https://www.youtube.com/watch?v=MA_A84760Us', 1, 1),
(35, 'PÃ«rmbledhje', 'http://i3.ytimg.com/vi/WVMwb-69J08/hqdefault.jpg', 'https://www.youtube.com/watch?v=WVMwb-69J08', 1, 1),
(37, 'Hyrje nÃ« CSS 1/2', 'http://i3.ytimg.com/vi/wmwVwWvncsU/hqdefault.jpg', 'https://www.youtube.com/watch?v=wmwVwWvncsU', 1, 2),
(38, 'Hyrje nÃ« CSS 2/2', 'http://i3.ytimg.com/vi/J1StlhFkoMg/hqdefault.jpg', 'https://www.youtube.com/watch?v=J1StlhFkoMg', 1, 2),
(39, 'Organizimi', 'http://i3.ytimg.com/vi/Hznd7akohCY/hqdefault.jpg', 'https://www.youtube.com/watch?v=Hznd7akohCY', 1, 2),
(40, 'Ngjyrat', 'http://i3.ytimg.com/vi/EwJtc_ULWqs/hqdefault.jpg', 'https://www.youtube.com/watch?v=EwJtc_ULWqs', 1, 2),
(41, 'Teksti', 'http://i3.ytimg.com/vi/0jOgXJYkb2w/hqdefault.jpg', 'https://www.youtube.com/watch?v=0jOgXJYkb2w', 1, 2),
(42, 'KutitÃ«', 'http://i3.ytimg.com/vi/cKthxT-5k8Y/hqdefault.jpg', 'https://www.youtube.com/watch?v=cKthxT-5k8Y', 1, 2),
(43, 'Listat, Tabelat', 'http://i3.ytimg.com/vi/zBOm_lcnT0E/hqdefault.jpg', 'https://www.youtube.com/watch?v=zBOm_lcnT0E', 1, 2),
(44, 'Faqosja', 'http://i3.ytimg.com/vi/ONUQ5tJiJrw/hqdefault.jpg', 'https://www.youtube.com/watch?v=ONUQ5tJiJrw', 1, 2),
(45, 'PÃ«rmbledhje', 'http://i3.ytimg.com/vi/SzogOh9RfJ4/hqdefault.jpg', 'https://www.youtube.com/watch?v=SzogOh9RfJ4', 1, 2),
(50, 'Organizimet (JavaScript)', 'http://i3.ytimg.com/vi/m6ycB_I6pGQ/hqdefault.jpg', 'https://www.youtube.com/watch?v=m6ycB_I6pGQ', 1, 3),
(49, 'Ã‡ka Ã«shtÃ« programimi?', 'http://i3.ytimg.com/vi/c_gITUuxKns/hqdefault.jpg', 'https://www.youtube.com/watch?v=c_gITUuxKns', 1, 3),
(51, 'Tipet e tÃ« dhÃ«nave (JavaScript)', 'http://i3.ytimg.com/vi/OEYH9kXOdLc/hqdefault.jpg', 'https://www.youtube.com/watch?v=OEYH9kXOdLc&feature=youtu.be', 1, 3),
(52, 'Variablat (JavaScript)', 'http://i3.ytimg.com/vi/bZC52Uywa6Q/hqdefault.jpg', 'https://www.youtube.com/watch?v=bZC52Uywa6Q', 1, 3),
(53, 'TÃ« bÃ«rit pyetje (JavaScript)', 'http://i3.ytimg.com/vi/rmXKPNiQEGE/hqdefault.jpg', 'https://www.youtube.com/watch?v=rmXKPNiQEGE&feature=youtu.be', 1, 3),
(54, 'Vargjet (JavaScript)', 'http://i3.ytimg.com/vi/4FjouO9cj-U/hqdefault.jpg', 'https://www.youtube.com/watch?v=4FjouO9cj-U&feature=youtu.be', 1, 3),
(55, 'KushtÃ«zimi (JavaScript)', 'http://i3.ytimg.com/vi/VRRz8Pa_M9k/hqdefault.jpg', 'https://www.youtube.com/watch?v=VRRz8Pa_M9k&feature=youtu.be', 1, 3),
(56, 'Unazat (JavaScript)', 'http://i3.ytimg.com/vi/c3YN8avw5iQ/hqdefault.jpg', 'https://www.youtube.com/watch?v=c3YN8avw5iQ', 1, 3),
(57, 'Organizimi (jQuery)', 'http://i3.ytimg.com/vi/KENHifVK_X4/hqdefault.jpg', 'https://www.youtube.com/watch?v=KENHifVK_X4', 1, 3),
(58, 'DOM Document Object Model (jQuery)', 'http://i3.ytimg.com/vi/l_u2QN_msQk/hqdefault.jpg', 'https://www.youtube.com/watch?v=l_u2QN_msQk', 1, 3),
(59, 'NdodhitÃ«/Eventet (jQuery)', 'http://i3.ytimg.com/vi/t5NmG3oe7Nc/hqdefault.jpg', 'https://www.youtube.com/watch?v=t5NmG3oe7Nc', 1, 3),
(60, 'PÃ«rmbledhje', 'http://i3.ytimg.com/vi/hO3fe_OZ8gA/hqdefault.jpg', 'https://www.youtube.com/watch?v=hO3fe_OZ8gA', 1, 3),
(73, 'Instalimi i PostgreSQL nÃ« Windows', 'http://i3.ytimg.com/vi/JShYLGAm4N8/hqdefault.jpg', 'https://www.youtube.com/watch?v=JShYLGAm4N8', 2, 1),
(72, 'PostgreSQL', 'http://i3.ytimg.com/vi/n9gsoh9RUeM/hqdefault.jpg', 'https://www.youtube.com/watch?v=n9gsoh9RUeM', 2, 1),
(71, 'Sistemi i menaxhimit tÃ« bazÃ«s sÃ« tÃ« dhÃ«nave', 'http://i3.ytimg.com/vi/f6cw0tZZIiw/hqdefault.jpg', 'https://www.youtube.com/watch?v=f6cw0tZZIiw', 2, 1),
(70, 'Elementet e bazÃ«s sÃ« tÃ« dhÃ«nave', 'http://i3.ytimg.com/vi/7G_7fllzhEY/hqdefault.jpg', 'https://www.youtube.com/watch?v=7G_7fllzhEY', 2, 1),
(68, 'Hyrje', 'http://i3.ytimg.com/vi/4WXxBMiC-b4/hqdefault.jpg', 'https://www.youtube.com/watch?v=4WXxBMiC-b4', 2, 1),
(69, 'Hyrje nÃ« baza tÃ« tÃ« dhÃ«nave', 'http://i3.ytimg.com/vi/kLijNg9Fohg/hqdefault.jpg', 'https://www.youtube.com/watch?v=kLijNg9Fohg', 2, 1),
(74, 'Instalimi i PostgreSQL nÃ« MacOS', 'http://i3.ytimg.com/vi/noFMXNkgkaY/hqdefault.jpg', 'https://www.youtube.com/watch?v=noFMXNkgkaY', 2, 1),
(75, 'Hyrje nÃ« Bootstrap', 'http://i3.ytimg.com/vi/ctxMA03xKrk/hqdefault.jpg', 'https://www.youtube.com/watch?v=ctxMA03xKrk&feature=youtu.be', 1, 4),
(76, 'Organizimi', 'http://i3.ytimg.com/vi/THS7wYJYn9Q/hqdefault.jpg', 'https://www.youtube.com/watch?v=THS7wYJYn9Q', 1, 4),
(77, 'Organizimi', 'http://i3.ytimg.com/vi/c4DxeFtzTYE/hqdefault.jpg', 'https://www.youtube.com/watch?v=c4DxeFtzTYE&feature=youtu.be', 1, 4),
(78, 'Gridi', 'http://i3.ytimg.com/vi/IiC6kGm-IPg/hqdefault.jpg', 'https://www.youtube.com/watch?v=IiC6kGm-IPg', 1, 4),
(79, 'Gridi', 'http://i3.ytimg.com/vi/-FDOaUZDkzw/hqdefault.jpg', 'https://www.youtube.com/watch?v=-FDOaUZDkzw', 1, 4),
(80, 'Zhvillimi i faqes (pjesa 1/5)', 'http://i3.ytimg.com/vi/VGZwwgEmU6E/hqdefault.jpg', 'https://www.youtube.com/watch?v=VGZwwgEmU6E', 1, 4),
(81, 'Zhvillimi i faqes (pjesa 2/5)', 'http://i3.ytimg.com/vi/AdF8hArBZqw/hqdefault.jpg', 'https://www.youtube.com/watch?v=AdF8hArBZqw', 1, 4),
(82, 'Zhvillimi i faqes (pjesa 3/5)', 'http://i3.ytimg.com/vi/CPVCnq0zot4/hqdefault.jpg', 'https://www.youtube.com/watch?v=CPVCnq0zot4', 1, 4),
(83, 'Zhvillimi i faqes (pjesa 4/5)', 'http://i3.ytimg.com/vi/7Kxof0qey4c/hqdefault.jpg', 'https://www.youtube.com/watch?v=7Kxof0qey4c', 1, 4),
(84, 'Zhvillimi i faqes (pjesa 5/5)', 'http://i3.ytimg.com/vi/zIttEz11ED4/hqdefault.jpg', 'https://www.youtube.com/watch?v=zIttEz11ED4&feature=youtu.be', 1, 4),
(85, 'Hyrje', 'http://i3.ytimg.com/vi/IyK3E1xAfgs/hqdefault.jpg', 'https://www.youtube.com/watch?v=IyK3E1xAfgs', 2, 2),
(86, 'PÃ«rmbledhje', 'http://i3.ytimg.com/vi/emXiHlgfBUs/hqdefault.jpg', 'https://www.youtube.com/watch?v=emXiHlgfBUs', 1, 4),
(87, 'Dizajnimi i bazÃ«s sÃ« tÃ« dhÃ«nave', 'http://i3.ytimg.com/vi/5qUpmQ1s500/hqdefault.jpg', 'https://www.youtube.com/watch?v=5qUpmQ1s500', 2, 2),
(88, 'Forma e parÃ« e normalizimit', 'http://i3.ytimg.com/vi/EbXhbde73no/hqdefault.jpg', 'https://www.youtube.com/watch?v=EbXhbde73no', 2, 2),
(89, 'Forma e dytÃ« e normalizimit', 'http://i3.ytimg.com/vi/V3b1FJt-la4/hqdefault.jpg', 'https://www.youtube.com/watch?v=V3b1FJt-la4', 2, 2),
(90, 'Sistemet operative', 'http://i3.ytimg.com/vi/nPqGfrYe1jE/hqdefault.jpg', 'https://www.youtube.com/watch?v=nPqGfrYe1jE', 1, 5),
(91, 'Forma e tretÃ« e normalizimit', 'http://i3.ytimg.com/vi/rEQ3vKX1tmE/hqdefault.jpg', 'https://www.youtube.com/watch?v=rEQ3vKX1tmE', 2, 2),
(92, 'Diagramet ER', 'http://i3.ytimg.com/vi/Wc2gHRlVY6A/hqdefault.jpg', 'https://www.youtube.com/watch?v=Wc2gHRlVY6A', 2, 2),
(93, 'Hyrje nÃ« Unix', 'http://i3.ytimg.com/vi/ix6Vg2YJ-Kk/hqdefault.jpg', 'https://www.youtube.com/watch?v=ix6Vg2YJ-Kk', 1, 5),
(94, 'Dizajnimi me draw.io', 'http://i3.ytimg.com/vi/_2s4-eGyroI/hqdefault.jpg', 'https://www.youtube.com/watch?v=_2s4-eGyroI', 2, 2),
(95, 'Praktikat e emÃ«rimit', 'http://i3.ytimg.com/vi/WAeAXS-GR8Y/hqdefault.jpg', 'https://www.youtube.com/watch?v=WAeAXS-GR8Y', 2, 2),
(96, 'Hyrje', 'http://i3.ytimg.com/vi/SbqiyklKu6Q/hqdefault.jpg', 'https://www.youtube.com/watch?v=SbqiyklKu6Q', 1, 5),
(97, 'Parimet e dizajnimit tÃ« bazÃ«s sÃ« tÃ« dhÃ«nave', 'http://i3.ytimg.com/vi/yIrOCHU-3WI/hqdefault.jpg', 'https://www.youtube.com/watch?v=yIrOCHU-3WI', 2, 2),
(98, 'Super User', 'http://i3.ytimg.com/vi/kG3GPEDOOlo/hqdefault.jpg', 'https://www.youtube.com/watch?v=kG3GPEDOOlo', 1, 5),
(99, 'Navigimi nÃ«pÃ«r direktoriume', 'http://i3.ytimg.com/vi/tCPodaLbD9Y/hqdefault.jpg', 'https://www.youtube.com/watch?v=tCPodaLbD9Y', 1, 5),
(100, 'Manipulimi me file s dhe folders', 'http://i3.ytimg.com/vi/HfGf34qt--U/hqdefault.jpg', 'https://www.youtube.com/watch?v=HfGf34qt--U', 1, 5),
(101, 'Komandat qÃ« na ndihmojnÃ« tÃ« mirremi me text', 'http://i3.ytimg.com/vi/Tc3hybMkC6s/hqdefault.jpg', 'https://www.youtube.com/watch?v=Tc3hybMkC6s', 1, 5),
(102, 'KÃ«rkimi dhe editimi i njÃ« file', 'http://i3.ytimg.com/vi/1Vg0QRVi1ug/hqdefault.jpg', 'https://www.youtube.com/watch?v=1Vg0QRVi1ug', 1, 5),
(103, 'PÃ«rdorimi i Wildcards', 'http://i3.ytimg.com/vi/IfmdyQ060zI/hqdefault.jpg', 'https://www.youtube.com/watch?v=IfmdyQ060zI', 1, 5),
(104, 'Hyrje', 'http://i3.ytimg.com/vi/hY7zAnJypaI/hqdefault.jpg', 'https://www.youtube.com/watch?v=hY7zAnJypaI', 2, 3),
(105, 'PÃ«rdorimi i pgAdmin', 'http://i3.ytimg.com/vi/XFsSu84EsCE/hqdefault.jpg', 'https://www.youtube.com/watch?v=XFsSu84EsCE', 2, 3),
(106, 'Krijimi i bazÃ«s sÃ« tÃ« dhÃ«nave', 'http://i3.ytimg.com/vi/xlBQ70Ns3zk/hqdefault.jpg', 'https://www.youtube.com/watch?v=xlBQ70Ns3zk', 2, 3),
(107, 'Krijimi i tabelave', 'http://i3.ytimg.com/vi/TW5Hlu711TM/hqdefault.jpg', 'https://www.youtube.com/watch?v=TW5Hlu711TM', 2, 3),
(108, 'Prezantimi me GitHub', 'http://i3.ytimg.com/vi/oNQPYLFbAN0/hqdefault.jpg', 'https://www.youtube.com/watch?v=oNQPYLFbAN0', 1, 6),
(109, 'Futja e tÃ« dhÃ«nave nÃ« databazÃ«', 'http://i3.ytimg.com/vi/vP60j2A3eME/hqdefault.jpg', 'https://www.youtube.com/watch?v=vP60j2A3eME', 2, 3),
(110, 'Sistemi i kontrollimit tÃ« versioneve', 'http://i3.ytimg.com/vi/WjLMKCgW-zg/hqdefault.jpg', 'https://www.youtube.com/watch?v=WjLMKCgW-zg', 1, 6),
(111, 'PÃ«rdorimi i psql', 'http://i3.ytimg.com/vi/-fnsNtYBVzU/hqdefault.jpg', 'https://www.youtube.com/watch?v=-fnsNtYBVzU', 2, 3),
(112, 'Organizimi me Github dhe Git', 'http://i3.ytimg.com/vi/HVKIpcFcmGg/hqdefault.jpg', 'https://www.youtube.com/watch?v=HVKIpcFcmGg', 1, 6),
(113, 'GIT Clone', 'http://i3.ytimg.com/vi/wocY8Hk8cYo/hqdefault.jpg', 'https://www.youtube.com/watch?v=wocY8Hk8cYo', 1, 6),
(114, 'Krijimi i Views', 'http://i3.ytimg.com/vi/7qvmCpsMZxc/hqdefault.jpg', 'https://www.youtube.com/watch?v=7qvmCpsMZxc', 2, 3),
(115, 'GIT init', 'http://i3.ytimg.com/vi/HVgq9ZmbcMo/hqdefault.jpg', 'https://www.youtube.com/watch?v=HVgq9ZmbcMo', 1, 6),
(116, 'Importimi dhe eksportimi i databazÃ«s', 'http://i3.ytimg.com/vi/odFDiNCoW9A/hqdefault.jpg', 'https://www.youtube.com/watch?v=odFDiNCoW9A', 2, 3),
(117, 'Git config global', 'http://i3.ytimg.com/vi/S2obadK4gh4/hqdefault.jpg', 'https://www.youtube.com/watch?v=S2obadK4gh4', 1, 6),
(118, 'GIT commit', 'http://i3.ytimg.com/vi/zuw_-DBSC_A/hqdefault.jpg', 'https://www.youtube.com/watch?v=zuw_-DBSC_A', 1, 6),
(119, 'Master dhe development branch', 'http://i3.ytimg.com/vi/wPYOr1JyNWs/hqdefault.jpg', 'https://www.youtube.com/watch?v=wPYOr1JyNWs', 1, 6),
(120, 'Feature branch', 'http://i3.ytimg.com/vi/60OEjnPSvV8/hqdefault.jpg', 'https://www.youtube.com/watch?v=60OEjnPSvV8', 1, 6),
(121, 'Git merge', 'http://i3.ytimg.com/vi/iVBAxtteeO4/hqdefault.jpg', 'https://www.youtube.com/watch?v=iVBAxtteeO4', 1, 6),
(122, 'Git stash', 'http://i3.ytimg.com/vi/I5JOiUQZhXE/hqdefault.jpg', 'https://www.youtube.com/watch?v=I5JOiUQZhXE', 1, 6),
(123, 'Hyrje', 'http://i3.ytimg.com/vi/f6qFBS7tYAU/hqdefault.jpg', 'https://www.youtube.com/watch?v=f6qFBS7tYAU', 2, 4),
(124, 'Git fork', 'http://i3.ytimg.com/vi/E3J_HhGguc0/hqdefault.jpg', 'https://www.youtube.com/watch?v=E3J_HhGguc0', 1, 6),
(125, 'Ã‡fare Ã«shtÃ« SQL?', 'http://i3.ytimg.com/vi/F_B3FAVeNYU/hqdefault.jpg', 'https://www.youtube.com/watch?v=F_B3FAVeNYU', 2, 4),
(126, 'SourceTree', 'http://i3.ytimg.com/vi/1RvhMnGPzmM/hqdefault.jpg', 'https://www.youtube.com/watch?v=1RvhMnGPzmM', 1, 6),
(127, 'Select', 'http://i3.ytimg.com/vi/3zRTwMgaxAU/hqdefault.jpg', 'https://www.youtube.com/watch?v=3zRTwMgaxAU', 2, 4),
(128, 'AND, OR, IN dhe NOT IN', 'http://i3.ytimg.com/vi/Ez9SkcVUae4/hqdefault.jpg', 'https://www.youtube.com/watch?v=Ez9SkcVUae4', 2, 4),
(129, 'Hosting', 'http://i3.ytimg.com/vi/NodoP5r71k0/hqdefault.jpg', 'https://www.youtube.com/watch?v=NodoP5r71k0', 1, 7),
(130, 'Between', 'http://i3.ytimg.com/vi/fpQx3egfuGE/hqdefault.jpg', 'https://www.youtube.com/watch?v=fpQx3egfuGE', 2, 4),
(131, 'Faqet e GitHub', 'http://i3.ytimg.com/vi/kqduGak7VvQ/hqdefault.jpg', 'https://www.youtube.com/watch?v=kqduGak7VvQ', 1, 7),
(132, 'Like', 'http://i3.ytimg.com/vi/d9srTxhqTS4/hqdefault.jpg', 'https://www.youtube.com/watch?v=d9srTxhqTS4', 2, 4),
(133, 'Instalimi i Jekyll', 'http://i3.ytimg.com/vi/OopwBbZtvU8/hqdefault.jpg', 'https://www.youtube.com/watch?v=OopwBbZtvU8', 1, 7),
(134, 'Order by', 'http://i3.ytimg.com/vi/bTDYcq3ello/hqdefault.jpg', 'https://www.youtube.com/watch?v=bTDYcq3ello', 2, 4),
(135, 'Krijimi i njÃ« projekti me Jekyll', 'http://i3.ytimg.com/vi/Z0StS00tHiI/hqdefault.jpg', 'https://www.youtube.com/watch?v=Z0StS00tHiI', 1, 7),
(136, 'Limit, Distinct dhe Alias', 'http://i3.ytimg.com/vi/35_nBWReGGg/hqdefault.jpg', 'https://www.youtube.com/watch?v=35_nBWReGGg', 2, 4),
(137, 'Editimi i posteve', 'http://i3.ytimg.com/vi/-oTxlV6dWrc/hqdefault.jpg', 'https://www.youtube.com/watch?v=-oTxlV6dWrc', 1, 7),
(138, 'Insert, Update dhe Delete', 'http://i3.ytimg.com/vi/HxHL3v9ryI0/hqdefault.jpg', 'https://www.youtube.com/watch?v=HxHL3v9ryI0', 2, 4),
(139, 'Krijimi i posteve dhe Drafteve', 'http://i3.ytimg.com/vi/KmQjXU9rih4/hqdefault.jpg', 'https://www.youtube.com/watch?v=KmQjXU9rih4', 1, 7),
(140, 'JOIN', 'http://i3.ytimg.com/vi/vArU1sdBx4E/hqdefault.jpg', 'https://www.youtube.com/watch?v=vArU1sdBx4E', 2, 4),
(141, 'INNER JOIN, LEFT JOIN, RIGHT JOIN dhe FULL JOIN', 'http://i3.ytimg.com/vi/vArU1sdBx4E/hqdefault.jpg', 'https://www.youtube.com/watch?v=c2Rp8Ij9Zv4', 2, 4),
(142, 'Krijimi i faqeve', 'http://i3.ytimg.com/vi/D2b1FYqEWug/hqdefault.jpg', 'https://www.youtube.com/watch?v=D2b1FYqEWug', 1, 7),
(143, 'UNION', 'http://i3.ytimg.com/vi/i7XcO4bW4Uc/hqdefault.jpg', 'https://www.youtube.com/watch?v=i7XcO4bW4Uc', 2, 4),
(144, 'Konfigurime', 'http://i3.ytimg.com/vi/pXGxnIMk0Mo/hqdefault.jpg', 'https://www.youtube.com/watch?v=pXGxnIMk0Mo', 1, 7),
(145, 'Hostimi', 'http://i3.ytimg.com/vi/3TstbwMYQ3M/hqdefault.jpg', 'https://www.youtube.com/watch?v=3TstbwMYQ3M', 1, 7),
(146, 'Hyrje', 'http://i3.ytimg.com/vi/bBsyTr_69w4/hqdefault.jpg', 'https://www.youtube.com/watch?v=bBsyTr_69w4', 2, 5),
(147, 'Funksionet e String', 'http://i3.ytimg.com/vi/5G9GFHtBbf0/hqdefault.jpg', 'https://www.youtube.com/watch?v=5G9GFHtBbf0', 2, 5),
(148, 'Funksionet matematikore', 'http://i3.ytimg.com/vi/78G9CEpE7Z4/hqdefault.jpg', 'https://www.youtube.com/watch?v=78G9CEpE7Z4', 2, 5),
(149, 'Funksionet e datÃ«s', 'http://i3.ytimg.com/vi/2eI2fD5-jWc/hqdefault.jpg', 'https://www.youtube.com/watch?v=2eI2fD5-jWc', 2, 5),
(150, 'Funksionet agregate', 'http://i3.ytimg.com/vi/eix2ChzFpXs/hqdefault.jpg', 'https://www.youtube.com/watch?v=eix2ChzFpXs', 2, 5),
(151, 'Group by', 'http://i3.ytimg.com/vi/Tmg45QlV3oM/hqdefault.jpg', 'https://www.youtube.com/watch?v=Tmg45QlV3oM', 2, 5),
(152, 'Having', 'http://i3.ytimg.com/vi/CG2uRgGZPuM/hqdefault.jpg', 'https://www.youtube.com/watch?v=CG2uRgGZPuM', 2, 5),
(153, 'Exists', 'http://i3.ytimg.com/vi/rdcWACn3APA/hqdefault.jpg', 'https://www.youtube.com/watch?v=rdcWACn3APA', 2, 5),
(154, 'Case', 'http://i3.ytimg.com/vi/5G4G_ldGWto/hqdefault.jpg', 'https://www.youtube.com/watch?v=5G4G_ldGWto', 2, 5),
(155, 'NULL', 'http://i3.ytimg.com/vi/PCZv9vVyVRA/hqdefault.jpg', 'https://www.youtube.com/watch?v=PCZv9vVyVRA', 2, 5),
(156, 'Krijimi i funksioneve', 'http://i3.ytimg.com/vi/PLmOt94qH5M/hqdefault.jpg', 'https://www.youtube.com/watch?v=PLmOt94qH5M', 2, 5),
(157, 'Procedurat', 'http://i3.ytimg.com/vi/E-YDqAQQ4hE/hqdefault.jpg', 'https://www.youtube.com/watch?v=E-YDqAQQ4hE', 2, 5),
(158, 'Hyrje', 'http://i3.ytimg.com/vi/9ST0KBwFfmU/hqdefault.jpg', 'https://www.youtube.com/watch?v=9ST0KBwFfmU', 2, 6),
(159, 'Command Line', 'http://i3.ytimg.com/vi/DlFuBowigaU/hqdefault.jpg', 'https://www.youtube.com/watch?v=DlFuBowigaU', 2, 6),
(160, 'Instalimi i Python nÃ« Windows', 'http://i3.ytimg.com/vi/2gI-SZgYTmE/hqdefault.jpg', 'https://www.youtube.com/watch?v=2gI-SZgYTmE', 2, 6),
(161, 'Instalimi i Python nÃ« MacOS', 'http://i3.ytimg.com/vi/Df2vlGO4ucc/hqdefault.jpg', 'https://www.youtube.com/watch?v=Df2vlGO4ucc', 2, 6),
(162, 'Instalimi i Sublime Text', 'http://i3.ytimg.com/vi/hvBFgy_26L4/hqdefault.jpg', 'https://www.youtube.com/watch?v=hvBFgy_26L4', 2, 6),
(163, 'Tipet e tÃ« dhÃ«nave', 'http://i3.ytimg.com/vi/1VYV3cO_a7k/hqdefault.jpg', 'https://www.youtube.com/watch?v=1VYV3cO_a7k', 2, 6),
(164, 'Strukturat e tÃ« dhÃ«nave', 'http://i3.ytimg.com/vi/8fZhHVFWVgM/hqdefault.jpg', 'https://www.youtube.com/watch?v=8fZhHVFWVgM', 2, 6),
(165, 'Unaza \"for\" dhe kushti \"if\"', 'http://i3.ytimg.com/vi/_xlHLBw7XeI/hqdefault.jpg', 'https://www.youtube.com/watch?v=_xlHLBw7XeI', 2, 6),
(166, 'Funksionet', 'http://i3.ytimg.com/vi/aP2Lg4dLUgY/hqdefault.jpg', 'https://www.youtube.com/watch?v=aP2Lg4dLUgY', 2, 6),
(167, 'Importimi i moduleve', 'http://i3.ytimg.com/vi/yjvFj3RNyF4/hqdefault.jpg', 'https://www.youtube.com/watch?v=yjvFj3RNyF4', 2, 6),
(168, 'Klasa', 'http://i3.ytimg.com/vi/pXiXPuqwdQs/hqdefault.jpg', 'https://www.youtube.com/watch?v=pXiXPuqwdQs', 2, 6),
(169, 'File', 'http://i3.ytimg.com/vi/r7vTkX-0-lw/hqdefault.jpg', 'https://www.youtube.com/watch?v=r7vTkX-0-lw', 2, 6),
(170, 'Hyrje', 'http://i3.ytimg.com/vi/pX7nf4F4Ci0/hqdefault.jpg', 'https://www.youtube.com/watch?v=pX7nf4F4Ci0', 2, 7),
(171, 'Instalimi i Flask', 'http://i3.ytimg.com/vi/xpp1MuzZDmQ/hqdefault.jpg', 'https://www.youtube.com/watch?v=xpp1MuzZDmQ', 2, 7),
(172, 'Aplikacioni i parÃ« me Flask', 'http://i3.ytimg.com/vi/xsEXZNk5des/hqdefault.jpg', 'https://www.youtube.com/watch?v=xsEXZNk5des', 2, 7),
(173, 'PÃ«rdorimi i templates nÃ« Flask', 'http://i3.ytimg.com/vi/FiBFX7dKJo0/hqdefault.jpg', 'https://www.youtube.com/watch?v=FiBFX7dKJo0', 2, 7),
(174, 'Adaptimi i HTML me templates tÃ« Flask', 'http://i3.ytimg.com/vi/bCrvWGJ_Fp8/hqdefault.jpg', 'https://www.youtube.com/watch?v=bCrvWGJ_Fp8', 2, 7),
(175, 'Lidhja e PostgreSQL me Flask', 'http://i3.ytimg.com/vi/yDB9HP3WrAs/hqdefault.jpg', 'https://www.youtube.com/watch?v=yDB9HP3WrAs', 2, 7),
(176, 'Krijimi i tabelave', 'http://i3.ytimg.com/vi/uhsk0vQ7hp8/hqdefault.jpg', 'https://www.youtube.com/watch?v=uhsk0vQ7hp8', 2, 7),
(177, 'Krijimi i web forma ve Pjesa e parÃ«', 'http://i3.ytimg.com/vi/_DMFI1rpKEk/hqdefault.jpg', 'https://www.youtube.com/watch?v=_DMFI1rpKEk', 2, 7),
(178, 'Krijimi i web forma ve Pjesa e dytÃ«', 'http://i3.ytimg.com/vi/1LSXA9G0Qas/hqdefault.jpg', 'https://www.youtube.com/watch?v=1LSXA9G0Qas', 2, 7),
(179, 'Ruajtja e tÃ« dhÃ«nave nÃ« bazÃ«s e tÃ« dhÃ«nave', 'http://i3.ytimg.com/vi/-KYIMw5aT6c/hqdefault.jpg', 'https://www.youtube.com/watch?v=-KYIMw5aT6c', 2, 7),
(180, 'Shfaqja e tÃ« dhÃ«nave nga baza e tÃ« dhÃ«nave', 'http://i3.ytimg.com/vi/BbObCINUb24/hqdefault.jpg', 'https://www.youtube.com/watch?v=BbObCINUb24', 2, 7),
(181, 'PÃ«rditÃ«simi i tÃ« dhÃ«nave nÃ« bazÃ«n e tÃ« dhÃ«nave', 'http://i3.ytimg.com/vi/93WlC465XqQ/hqdefault.jpg', 'https://www.youtube.com/watch?v=93WlC465XqQ', 2, 7),
(183, 'Fshirja e tÃ« dhÃ«nave nga baza e tÃ« dhÃ«nave', 'http://i3.ytimg.com/vi/SPszWVWudIc/hqdefault.jpg', 'https://www.youtube.com/watch?v=SPszWVWudIc', 2, 7),
(194, 'Hyrje nÃ« Kurs - Integrimi i produkteve softwerike tÃ« pÃ«rshkallÃ«zuara', 'https://img.youtube.com/vi/ajMvncvFF18/hqdefault.jpg', 'https://www.youtube.com/watch?v=ajMvncvFF18', 3, 1),
(195, 'Hyrje', 'https://img.youtube.com/vi/328QEjr4us4/hqdefault.jpg', 'https://www.youtube.com/watch?v=328QEjr4us4', 3, 1),
(196, 'Llojet e rrjetave kompjuterike', 'https://img.youtube.com/vi/8130dOQZjkI/hqdefault.jpg', 'https://www.youtube.com/watch?v=8130dOQZjkI', 3, 1),
(197, 'Interneti', 'https://img.youtube.com/vi/ou7I_tVt91Y/hqdefault.jpg', 'https://www.youtube.com/watch?v=ou7I_tVt91Y', 3, 1),
(198, 'Arkitektura e protokolleve', 'https://img.youtube.com/vi/n7TM3eOKL6A/hqdefault.jpg', 'https://www.youtube.com/watch?v=n7TM3eOKL6A', 3, 1),
(199, 'Arkitektura e TCP/IP protokollit', 'https://img.youtube.com/vi/-OdwzDbYD5g/hqdefault.jpg', 'https://www.youtube.com/watch?v=-OdwzDbYD5g', 3, 1),
(200, 'TCP/IP dhe OSI modeli', 'https://img.youtube.com/vi/EiIhMlVoCA4/hqdefault.jpg', 'https://www.youtube.com/watch?v=EiIhMlVoCA4', 3, 1),
(201, 'IP adresat', 'https://img.youtube.com/vi/2xj3p1yKOXI/hqdefault.jpg', 'https://www.youtube.com/watch?v=2xj3p1yKOXI', 3, 1),
(202, 'Adresat IPv4 dhe IPv6', 'https://img.youtube.com/vi/SaEbSIBjCJo/hqdefault.jpg', 'https://www.youtube.com/watch?v=SaEbSIBjCJo', 3, 1),
(203, 'Anatomia e IP adresave', 'https://img.youtube.com/vi/YBrGtmPwyCA/hqdefault.jpg', 'https://www.youtube.com/watch?v=YBrGtmPwyCA', 3, 1),
(204, 'Llojet dhe klasat e IP adresave', 'https://img.youtube.com/vi/eNllpzwwU_w/hqdefault.jpg', 'https://www.youtube.com/watch?v=eNllpzwwU_w', 3, 1),
(205, 'Adresa e rrjetÃ«s, hostit dhe boradcastit', 'https://img.youtube.com/vi/h1BDBOsJg5g/hqdefault.jpg', 'https://www.youtube.com/watch?v=h1BDBOsJg5g', 3, 1),
(206, 'PÃ«rcaktimi i numrit tÃ« hosteve nÃ« njÃ« rrjetÃ«', 'https://img.youtube.com/vi/CO9xTNwybzE/hqdefault.jpg', 'https://www.youtube.com/watch?v=CO9xTNwybzE', 3, 1),
(218, 'Shembuj tÃ« konvertimit tÃ« IP adresave nga forma binare nÃ« decimale dhe anasjelltas', 'https://img.youtube.com/vi/9-PChEmUMNM/hqdefault.jpg', 'https://www.youtube.com/watch?v=9-PChEmUMNM', 3, 1),
(217, 'Shembuj tÃ« rrjetave kompjuterike me hoste dhe IP adresa', 'https://img.youtube.com/vi/e_v2bIHKyJE/hqdefault.jpg', 'https://www.youtube.com/watch?v=e_v2bIHKyJE', 3, 1),
(210, 'Hyrje', 'https://img.youtube.com/vi/jnFNFPrX-S8/hqdefault.jpg', 'https://www.youtube.com/watch?v=jnFNFPrX-S8', 3, 2),
(211, 'Arkitektura e aplikacioneve', 'https://img.youtube.com/vi/e6mayScm2cE/hqdefault.jpg', 'https://www.youtube.com/watch?v=e6mayScm2cE', 3, 2),
(212, 'Ã‡farÃ« Ã«shtÃ« Serveri?', 'https://img.youtube.com/vi/BIgwSieoHKQ/hqdefault.jpg', 'https://www.youtube.com/watch?v=BIgwSieoHKQ', 3, 2),
(213, 'Ã‡farÃ« Ã«shtÃ« API?', 'https://img.youtube.com/vi/R-Nf8eH6Bfs/hqdefault.jpg', 'https://www.youtube.com/watch?v=R-Nf8eH6Bfs', 3, 2),
(214, 'Web-shÃ«rbimet', 'https://img.youtube.com/vi/mj5cm-8wcgA/hqdefault.jpg', 'https://www.youtube.com/watch?v=mj5cm-8wcgA', 3, 2),
(225, 'Web-shÃ«rbimet dhe API', 'https://img.youtube.com/vi/mj5cm-8wcgA/hqdefault.jpg', 'https://www.youtube.com/watch?v=mj5cm-8wcgA', 3, 2),
(226, 'PÃ«rmbledhje', 'https://img.youtube.com/vi/2CUTE14dRYg/hqdefault.jpg', 'https://youtu.be/2CUTE14dRYg', 3, 2),
(219, 'Shembuj tÃ« identifikimit tÃ« llojit tÃ« klasÃ«s sÃ« IP adresÃ«s', 'https://img.youtube.com/vi/iwwd03JzLBI/hqdefault.jpg', 'https://youtu.be/iwwd03JzLBI', 3, 1),
(220, 'Shembuj tÃ« identifikimit tÃ« pjesÃ«s sÃ« adresÃ«s sÃ« rrjetes dhe tÃ« hostit', 'https://img.youtube.com/vi/NzUj7wlUKeU/hqdefault.jpg', 'https://www.youtube.com/watch?v=NzUj7wlUKeU', 3, 1),
(221, 'Shembuj tÃ« identifikimit tÃ« Subnet MaskÃ«s', 'https://img.youtube.com/vi/rbtoFbNh2_A/hqdefault.jpg', 'https://www.youtube.com/watch?v=rbtoFbNh2_A', 3, 1),
(222, 'PÃ«rmbledhje', 'https://img.youtube.com/vi/5_UMz8WDOr4/hqdefault.jpg', 'https://www.youtube.com/watch?v=5_UMz8WDOr4', 3, 1),
(223, 'Pikat kryesore', 'https://img.youtube.com/vi/oSxwoJqvAeQ/hqdefault.jpg', 'https://www.youtube.com/watch?v=oSxwoJqvAeQ', 3, 1),
(227, 'Pikat kryesore', 'https://img.youtube.com/vi/_Sk0fEbXN5Y/hqdefault.jpg', 'https://www.youtube.com/watch?v=_Sk0fEbXN5Y', 3, 2),
(228, 'Hyrje', 'https://img.youtube.com/vi/ZuAvgr62Hcw/hqdefault.jpg', 'https://www.youtube.com/watch?v=ZuAvgr62Hcw', 3, 3),
(229, 'Ã‡ka pÃ«rfshinÃ« balancimi i ngarkesÃ«s?', 'https://img.youtube.com/vi/-XB4B2h1i8E/hqdefault.jpg', 'https://www.youtube.com/watch?v=-XB4B2h1i8E', 3, 3),
(230, 'PÃ«rparÃ«sitÃ« e balancimit tÃ« ngarkesÃ«s', 'https://img.youtube.com/vi/FlLlHKKFtlw/hqdefault.jpg', 'https://www.youtube.com/watch?v=FlLlHKKFtlw', 3, 3),
(231, 'Logjika e procesimit tÃ« kÃ«rkesave pÃ«rmes komponentÃ«s sÃ« balancimit tÃ« ngarkesÃ«s', 'https://img.youtube.com/vi/WdATPdwg5EM/hqdefault.jpg', 'https://www.youtube.com/watch?v=WdATPdwg5EM', 3, 3),
(232, 'Algoritmet pÃ«r balancimin e ngarkesÃ«s', 'https://img.youtube.com/vi/IHWpF8jHSaY/hqdefault.jpg', 'https://www.youtube.com/watch?v=IHWpF8jHSaY', 3, 3),
(233, 'Algoritmi round robin', 'https://img.youtube.com/vi/J61NH_hArlE/hqdefault.jpg', 'https://www.youtube.com/watch?v=J61NH_hArlE', 3, 3),
(234, 'Algoritmi round robin i peshuar', 'https://img.youtube.com/vi/NkAEtbbRxBg/hqdefault.jpg', 'https://www.youtube.com/watch?v=NkAEtbbRxBg', 3, 3),
(235, 'Algoritmi me numrin mÃ« tÃ« vogÃ«l tÃ« lidhjeve', 'https://img.youtube.com/vi/umiN7qHB06I/hqdefault.jpg', 'https://www.youtube.com/watch?v=umiN7qHB06I', 3, 3),
(236, 'Algoritmi me numrin e lidhjeve me tÃ« vogla dhe i peshuar', 'https://img.youtube.com/vi/3J5BCmgK33Y/hqdefault.jpg', 'https://www.youtube.com/watch?v=3J5BCmgK33Y', 3, 3),
(237, 'Algoritmi IP Hash', 'https://img.youtube.com/vi/nJ27cYsZpF8/hqdefault.jpg', 'https://www.youtube.com/watch?v=nJ27cYsZpF8', 3, 3),
(238, 'Modele tjera tÃ« balancimit tÃ« ngarkesÃ«s', 'https://img.youtube.com/vi/zPU2MEiz-2s/hqdefault.jpg', 'https://www.youtube.com/watch?v=zPU2MEiz-2s', 3, 3),
(239, 'PÃ«rmbledhje', 'https://img.youtube.com/vi/SBmla4Fwmzo/hqdefault.jpg', 'https://www.youtube.com/watch?v=SBmla4Fwmzo', 3, 3),
(240, 'Pikat kryesore', 'https://img.youtube.com/vi/DC3ohfLNMDE/hqdefault.jpg', 'https://www.youtube.com/watch?v=DC3ohfLNMDE', 3, 3),
(241, 'Hyrje', 'https://img.youtube.com/vi/tOPJFiitJCs/hqdefault.jpg', 'https://www.youtube.com/watch?v=tOPJFiitJCs', 3, 4),
(242, 'Logjika e caching', 'https://img.youtube.com/vi/VxC9yOcyxQ0/hqdefault.jpg', 'https://www.youtube.com/watch?v=VxC9yOcyxQ0', 3, 4),
(243, 'PÃ«rparÃ«sitÃ« e caching', 'https://img.youtube.com/vi/d7Iu0AGFl5A/hqdefault.jpg', 'https://www.youtube.com/watch?v=d7Iu0AGFl5A', 3, 4),
(244, 'Caching nÃ« arkitekturÃ«n e aplikacioneve', 'https://img.youtube.com/vi/vtI_BZdWZYM/hqdefault.jpg', 'https://www.youtube.com/watch?v=vtI_BZdWZYM', 3, 4),
(245, 'Vendet ku mund tÃ« ruajmÃ« caching', 'https://img.youtube.com/vi/p895L5JFvDs/hqdefault.jpg', 'https://www.youtube.com/watch?v=p895L5JFvDs', 3, 4),
(246, 'Caching nÃ« server dhe caching nÃ« shfletues', 'https://img.youtube.com/vi/Wv98x08TxwI/hqdefault.jpg', 'https://www.youtube.com/watch?v=Wv98x08TxwI', 3, 4),
(247, 'Teknikat e caching nÃ« Web', 'https://img.youtube.com/vi/_uBlMVrU1PU/hqdefault.jpg', 'https://www.youtube.com/watch?v=_uBlMVrU1PU', 3, 4),
(248, 'Etiketat e caching', 'https://img.youtube.com/vi/8qKc8fhP2iA/hqdefault.jpg', 'https://www.youtube.com/watch?v=8qKc8fhP2iA', 3, 4),
(249, 'PÃ«rmbledhje', 'https://img.youtube.com/vi/HsFVp32UGHs/hqdefault.jpg', 'https://www.youtube.com/watch?v=HsFVp32UGHs', 3, 4),
(250, 'Pikat kryesore', 'https://img.youtube.com/vi/EUvWSeggEpg/hqdefault.jpg', 'https://www.youtube.com/watch?v=EUvWSeggEpg', 3, 4),
(252, 'Hyrje', 'https://img.youtube.com/vi/EndAxS8V5k8/hqdefault.jpg', 'https://www.youtube.com/watch?v=EndAxS8V5k8', 3, 5),
(253, 'Konceptet bazÃ« pÃ«r njÃ« CDN', 'https://img.youtube.com/vi/wzqJTI50YhU/hqdefault.jpg', 'https://www.youtube.com/watch?v=wzqJTI50YhU', 3, 5),
(254, 'MÃ«nyra e funksionimit tÃ« njÃ« CDN', 'https://img.youtube.com/vi/BTR9hHddFY8/hqdefault.jpg', 'https://www.youtube.com/watch?v=BTR9hHddFY8', 3, 5),
(255, 'PÃ«rdoruesit e CDN', 'https://img.youtube.com/vi/JLivv2dP4tM/hqdefault.jpg', 'https://www.youtube.com/watch?v=JLivv2dP4tM', 3, 5),
(256, 'PÃ«rparÃ«sitÃ« e CDN', 'https://img.youtube.com/vi/h30ESMpgX2A/hqdefault.jpg', 'https://www.youtube.com/watch?v=h30ESMpgX2A', 3, 5),
(257, 'Blloqet ndÃ«rtuese tÃ« CDN', 'https://img.youtube.com/vi/QU3-oLhiAGk/hqdefault.jpg', 'https://www.youtube.com/watch?v=QU3-oLhiAGk', 3, 5),
(258, 'Arkitektura e CDN', 'https://img.youtube.com/vi/p16n0tfhCYw/hqdefault.jpg', 'https://www.youtube.com/watch?v=p16n0tfhCYw', 3, 5),
(260, 'TopologjitÃ« e CDN', 'https://img.youtube.com/vi/MEZUxM9nIgc/hqdefault.jpg', 'https://www.youtube.com/watch?v=MEZUxM9nIgc', 3, 5),
(261, 'Caching nÃ« CDN', 'https://img.youtube.com/vi/rnh38gnwmTs/hqdefault.jpg', 'https://www.youtube.com/watch?v=rnh38gnwmTs', 3, 5),
(262, 'Optimizimi nÃ« front-end', 'https://img.youtube.com/vi/2viGiZ1zkt0/hqdefault.jpg', 'https://www.youtube.com/watch?v=2viGiZ1zkt0', 3, 5),
(263, 'Metodat pÃ«r optimizim', 'https://img.youtube.com/vi/Qt3dh8P2ie8/hqdefault.jpg', 'https://www.youtube.com/watch?v=Qt3dh8P2ie8', 3, 5),
(264, 'ZvogÃ«limi i HTTP kÃ«rkesave', 'https://img.youtube.com/vi/rybZX5yfj_Y/hqdefault.jpg', 'https://www.youtube.com/watch?v=rybZX5yfj_Y', 3, 5),
(265, 'Kompresimi i file-ave', 'https://img.youtube.com/vi/U4uVPvzRIOg/hqdefault.jpg', 'https://www.youtube.com/watch?v=U4uVPvzRIOg', 3, 5),
(266, 'Optimizimi i cache-it', 'https://img.youtube.com/vi/xqkuRgvv-7c/hqdefault.jpg', 'https://www.youtube.com/watch?v=xqkuRgvv-7c', 3, 5),
(267, 'Minimizimi i kodit', 'https://img.youtube.com/vi/YfSxshJYLfY/hqdefault.jpg', 'https://www.youtube.com/watch?v=YfSxshJYLfY', 3, 5),
(268, 'Optimizimi i imazheve', 'https://img.youtube.com/vi/oaAlOVKicS8/hqdefault.jpg', 'https://www.youtube.com/watch?v=oaAlOVKicS8', 3, 5),
(269, 'PÃ«rmbledhje', 'https://img.youtube.com/vi/RDptvW4hWE8/hqdefault.jpg', 'https://www.youtube.com/watch?v=RDptvW4hWE8', 3, 5),
(270, 'Pikat kryesore', 'https://img.youtube.com/vi/h1cOsYv47xU/hqdefault.jpg', 'https://www.youtube.com/watch?v=h1cOsYv47xU', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `userfiles`
--

CREATE TABLE `userfiles` (
  `id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userfiles`
--

INSERT INTO `userfiles` (`id`, `file`, `date`, `time`, `id_user`) VALUES
(79, 'Metodat e hulumtimit (Pytjet).docx', '24/06/2019', '19:28', 114),
(93, '00100sPORTRAIT_00100_BURST20190801104943643_COVER.jpg', '13/08/2019', '15:22', 106),
(68, 'senzor dhe interfejs Kollokviumet.zip', '16/06/2019', '17:36', 60),
(88, 'amici projekti.pptx', '13/08/2019', '00:26', 114),
(29, 'projekti_LED.apk', '24/05/2019', '12:19', 106),
(96, 'benny blanco & Calvin Harris - I Found You (Official Music Video).mp3', '15/08/2019', '18:04', 106),
(148, 'projekti_LED1.apk', '14/09/2019', '09:13', 114),
(150, '100_1963.jpg', '14/09/2019', '17:17', 106),
(183, '9e5a6260f4efa441deebedaac34ae13e.jpg', '13/10/2019', '18:58', 106),
(201, 'register.php', '23/10/2019', '19:10', 155),
(190, 'Literatura.rar', '16/10/2019', '18:19', 114),
(247, 'VPN.pptx', '03/11/2019', '23:18', 106),
(248, 'JAVA_I.pdf', '04/11/2019', '19:49', 114),
(140, 'Studentet.rar', '13/09/2019', '16:12', 114),
(162, 'Loja_me_numra.rar', '22/09/2019', '19:10', 114),
(234, 'Punimi 1.docx', '25/10/2019', '15:54', 106),
(202, 'login.php', '23/10/2019', '19:10', 155),
(194, 'FSHK_TIT_DIMROR_2019-20_new_(3)_114089.pdf', '20/10/2019', '16:27', 114),
(185, '4.jpg', '13/10/2019', '21:45', 106),
(205, 'prova.php', '23/10/2019', '19:15', 155),
(207, '433.rar', '23/10/2019', '20:08', 155),
(232, 'Siguria e rrjetave pa kabull (WLAN).pdf', '25/10/2019', '15:48', 114),
(249, 'JAVA_II_III_IV.pdf', '04/11/2019', '19:49', 114),
(238, 'd.jpg', '28/10/2019', '14:29', 106);

-- --------------------------------------------------------

--
-- Table structure for table `userposts`
--

CREATE TABLE `userposts` (
  `id` int(11) NOT NULL,
  `Comments` varchar(255) NOT NULL,
  `date` varchar(11) NOT NULL,
  `time` varchar(11) NOT NULL,
  `replyingto` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `edited` int(1) DEFAULT NULL,
  `uploadedphoto` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userposts`
--

INSERT INTO `userposts` (`id`, `Comments`, `date`, `time`, `replyingto`, `id_user`, `edited`, `uploadedphoto`) VALUES
(165, 'Hello amiciðŸ˜‡', '', '', NULL, 70, NULL, NULL),
(62, 'ðŸ§Ÿâ€â™‚ï¸', '', '', NULL, 66, NULL, NULL),
(132, '1 2 1 2', '', '', NULL, 64, NULL, NULL),
(285, '2121', '16/05/2019', '18:56', 132, 96, NULL, NULL),
(278, 'Keq', '15/05/2019', '19:54', 277, 58, NULL, NULL),
(277, 'Djem si kaluat sot?', '15/05/2019', '17:27', NULL, 106, NULL, NULL),
(243, 'â–¶', '14/05/2019', '12:07', NULL, 66, NULL, NULL),
(287, 'o', '16/05/2019', '19:04', NULL, 96, NULL, NULL),
(286, '2121', '16/05/2019', '18:56', 130, 96, NULL, NULL),
(259, 'I â¤ U', '14/05/2019', '16:38', 258, 106, NULL, NULL),
(266, 'TÃ« pÃ«lqen? Jepi replay', '14/05/2019', '16:44', 243, 106, NULL, NULL),
(416, 'Avatarin duhi mi ndrru', '20/06/2019', '20:46', NULL, 58, NULL, NULL),
(340, 'Ok', '23/05/2019', '14:32', 339, 106, NULL, NULL),
(341, 'hello gjakova', '23/05/2019', '15:24', NULL, 96, NULL, NULL),
(342, '2121', '23/05/2019', '15:26', 341, 96, NULL, NULL),
(347, '23 njoftime dulen , 2 i pash krejt', '23/05/2019', '22:37', NULL, 58, NULL, NULL),
(348, 'E gjitha ndodh si me magji. Sa hape e mbylle syte.', '23/05/2019', '22:43', 347, 106, NULL, NULL),
(315, 'Kurrfar t\'kaluni hiq', '20/05/2019', '01:20', 277, 58, NULL, NULL),
(351, 'E pse mes m\'u fshi edhe njoftimet ?!', '23/05/2019', '22:55', 347, 58, NULL, NULL),
(349, 'Kurrfar magjie hiq , po sje tu dit kurgjo.', '23/05/2019', '22:49', 347, 58, NULL, NULL),
(426, 'amici 10', '23/07/2019', '23:36', NULL, 106, 1, NULL),
(431, 'amici 2.2 beta release\r\n', '26/07/2019', '00:09', 426, 114, 1, NULL),
(368, 'Flm Ilir ðŸ™‚', '04/06/2019', '12:52', 361, 106, NULL, NULL),
(371, 'Flm IlIR ! ðŸ¤“', '05/06/2019', '15:36', 361, 66, NULL, NULL),
(461, 'pet kallxoj', '05/09/2019', '01:09', 457, 114, NULL, NULL),
(474, 'Any Survivors?', '03/10/2019', '01:46', NULL, 114, NULL, NULL),
(475, 'Y', '03/10/2019', '16:26', 474, 106, NULL, NULL),
(483, '#pixel', '05/10/2019', '03:02', NULL, 114, NULL, 'IMG_20190925_003505_349.jpg'),
(491, 'Renault Kadjar Eco2', '05/10/2019', '12:04', NULL, 106, 1, '20191004_115731.jpg'),
(505, 'ðŸ”´LIVE nÃ« shkollÃ«n Yll Morina', '06/10/2019', '15:33', NULL, 106, NULL, NULL),
(506, 'ðŸ”´LIVE nÃ« shkollÃ«n \"Kadri Kusari\"', '06/10/2019', '16:34', 505, 114, NULL, NULL),
(535, '#pixel', '13/10/2019', '23:12', NULL, 114, NULL, 'amici_ilirperolli_vxGm5Jvpm2.jpg'),
(619, 'Naim Homework', '26/10/2019', '17:04', NULL, 114, NULL, '20191021_163507.jpg'),
(672, 'po praaaa', '28/10/2019', '15:07', 671, 114, NULL, NULL),
(699, 'Teleprezenca', '28/10/2019', '15:13', 694, 58, NULL, NULL),
(743, 'Pershe', '31/10/2019', '16:45', NULL, 58, NULL, NULL),
(744, 'This\r\nIs\r\nThe\r\nNewest\r\nFeatureeee!!!', '31/10/2019', '20:00', 743, 114, 1, NULL),
(745, '#pixel', '02/11/2019', '21:41', NULL, 114, NULL, 'PSX_20191027_224829.jpg'),
(66, 'hello', '', '', NULL, 50, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fbuser` varchar(255) DEFAULT NULL,
  `academicyear` int(10) NOT NULL,
  `age` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `verification` int(10) DEFAULT '0',
  `userphotos` varchar(255) DEFAULT 'default-user.png',
  `activity` int(11) NOT NULL,
  `notification` int(11) NOT NULL,
  `notification_uploads` int(11) NOT NULL,
  `joined` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `Surname`, `username`, `password`, `fbuser`, `academicyear`, `age`, `email`, `gender`, `verification`, `userphotos`, `activity`, `notification`, `notification_uploads`, `joined`) VALUES
(60, 'Dorentina', 'Radi', 'Dorentina Radi', '$2y$10$IaJ2yY0nI4MArmIMH2MhXuvdnPbsoDR4WAwGym91TcCoX0CarCNam', 'dorentina.radii', 2, '18', 'dorentina.radi01@gmail.com', '0', 1, 'defaultfemale.png', 7, 0, 13, '11/04/2019'),
(58, 'Albi', 'Kusari', 'K', '$2y$10$vSyte1bGiSLLXHS1KYhEaOvLP0kDn.dVgG7a35ksvsURRXrek.5GC', 'Albik', 3, '20', 'albi_kusa@hotmail.com', '1', 1, '44884218_345707102882519_2446069589734326272_n.jpg', 229, 9, 9, '17/10/2018'),
(158, 'Arian', 'Hazrolli', 'arianhazrolli', '$2y$10$uyicEobifl30xv9nXYO5zeXCWWdZ9m1ajYZ/QCyPtLl8YT707Mt62', NULL, 2, '19', 'arianhazrolli@gmail.com', '1', 1, 'defaultmale.png', 0, 0, 0, '24/10/2019'),
(159, 'Luan', 'Musaj', 'luanmusaj', '$2y$10$PojeL895VILdZQ8OWF8gz.Ry5330LGsKFZCX1WzJYUBQhoWAIqrxi', NULL, 3, '26', 'luanhmusaj@gmail.com', '1', 1, 'defaultmale.png', 5, 13, 8, '28/10/2019'),
(160, 'LekÃ«', 'Lleshi', 'llleke', '$2y$10$yyvxx/61jZKBa31SF8Z8R.M/h5VWcUzitECbPAJ7nyhjZc8Ct7Mce', NULL, 3, '25', 'leke.lleshi@gmail.com', '1', 1, 'defaultmale.png', 1, 12, 9, '30/10/2019'),
(155, 'Fatlind', 'Mazreku', 'fatlind', '$2y$10$Ks3OFqt.5G3DgE2yUTO/PO/wBoYP2GOpMPT7bZ2Q30HVCuNXp8tMu', NULL, 2, '19', 'fatlindmazreku07@gmail.com', '1', 1, 'defaultmale.png', 3, 0, 0, '23/10/2019'),
(149, 'Qendrim', 'Kryeziu', 'qendrimi16', '$2y$10$s.UNQ/cLVJZrhXmSQqy0ruqmyPpuUkgEeAay2kSgZ2INWlQC5w32q', NULL, 2, '22', 'qendrimkryeziu55@outlook.com', '1', 1, 'defaultmale.png', 3, 0, 10, '16/10/2019'),
(50, 'Arita', 'Zogjani', 'aritazo', '$2y$10$7VyPWbLWZWXdQEqKBx1ls.OJkFtmTGFry6ca/b0wTykC5ol5wnkFy', 'arita.zogjani.50', 3, '19', 'aritazo@outlook.com', '0', 1, 'IMG_20190122_142523_778.jpg', 27, 1, 141, '18/02/2019'),
(64, 'Jeta', 'Macula', 'JetaMacula', '$2y$10$7CRyGX0W0LFzGPzKSDIPXeHfX9pa8yR.YAYVRFa1XDhK/M1BrB10q', 'jeta.macula', 2, '19', 'jeta_macula@hotmail.com', '0', 1, 'defaultfemale.png', 7, 0, 10, '16/04/2019'),
(66, 'Bujan', 'Krasniqi', 'Bujan', '$2y$10$gWz7Cn.AoAP9uC9VSzzvPON.znqIGROdZh5oTsSD5ltZeL0lPrJ4K', '100007094325796', 3, '20', 'buja@gmail.com', '1', 1, 'defaultmale.png', 13, 179, 44, '18/02/2019'),
(68, 'Elmedin', 'Krasniqi', 'elmedinkrasniqi', '$2y$10$Jy1b2aEPMSExV5LObjlEEui6CxaKsF1TUIK9bKQ7OvMJDwx2uGW7G', 'dini.r.krasniqi', 3, '20', 'krasniqidinni@gmail.com', '1', 1, 'defaultmale.png', 3, 613, 299, '18/02/2019'),
(70, 'Elona', 'Gjini', 'Elona', '$2y$10$MSghNLUr3H7X34bzKjvxd.HXrZHrKbQjwra/XawnBtDYGmrVNCKfu', 'gjini.elona', 3, '20', 'elonagjini99@gmail.com', '0', 1, 'defaultfemale.png', 8, 325, 153, '18/02/2019'),
(73, 'Edina', 'Dilji', 'Edina', '$2y$10$v1IVdWoVDoCh9p9hRKE/aencJwggB77OrtCU1L7SWOGMiLps.1KL2', 'edina.dilji.5', 3, '20', 'edina_198@hotmail.com', '0', 1, 'defaultfemale.png', 25, 175, 24, '18/02/2019'),
(75, 'Suat', 'Miftari', 'Suatmiftari', '$2y$10$.75Bp5xTDUOJUpt7NBhUYep8DT.PG5VFJDxz3lX5WKyVLg35rGmge', 'Suat Miftari', 3, '19', 'miftarisuat@gmail.com', '1', 1, 'defaultmale.png', 1, 587, 288, '18/02/2019'),
(86, 'Leonard', 'Morina', 'Leonardi98', '$2y$10$XF5UOeEgsSvFGpLs89VSRuwFEVXQm3f88PiUr.zq7iB/FoUyIAGRa', NULL, 3, '21', 'leo.morina19@hotmail.com', '1', 1, 'defaultmale.png', 3, 566, 277, '18/02/2019'),
(114, 'Ilir', 'Perolli', 'ilirperolli', '$2y$10$VtJCnUpi0jrMf/tFV2Ovuucg.uEIY1GBTeWto9zaVgh9CuXh9Gps.', NULL, 3, '20', 'ilir_perolli@live.com', '1', 1, 'FB_IMG_1566210062193.jpg', 1740, 0, 0, '06/10/2018'),
(96, 'Granit', 'Totaj', 'Granit_Fshk_Upz', '$2y$10$pIQFViahhhEs5QzGiNxFyOIYcB9ZYhuO4LMWSbUTy.6hm6zNYaqnO', NULL, 2, '19', 'granit.totaj.gt@gmail.com', '1', 1, 'granit.jpg', 2, 1, 15, '17/04/2019'),
(87, 'Alban', 'Tertini', 'pogonophile', '$2y$10$dd.7OjGwUxZdKV06rF0QB.F4GJ/S9L9J7gV83MA/lErJNNzBekVbu', NULL, 2, '18', 'alban.t@live.com', '1', 1, 'defaultmale.png', 2, 0, 0, '12/04/2019'),
(82, 'Fatlinda', 'Elshani', 'Fatlinda', '$2y$10$vlMhw0vRIBD4HuIuYKmp7.x.OEhOdLiILTnYYy0yDFzDoYmNVjljq', 'fatlinda.elshani', 2, '18', 'e.fatlinda@outlook.com', '0', 1, 'defaultfemale.png', 0, 11, 15, '02/04/2019'),
(85, 'Admir', 'Likkola', 'Admir31', '$2y$10$MGOYLQFcYVWC92tTqiKnfuLdwC57bOpGxfUUGXlN9XlBFPmQn/hDG', NULL, 3, '31', 'ad.likkola@gmail.com', '1', 1, 'defaultmale.png', 0, 373, 179, '24/04/2019'),
(106, 'Arianit', 'Jaka', 'arianitjaka', '$2y$10$xoRIFtsmwdjYsbFHxObnr.99MfoqgoS2hzRojuZWuQ09nk9DSEc.O', NULL, 3, '20', 'arianit@gmail.com', '1', 1, '20191104_231445.jpg', 270, 5, 0, '13/10/2018'),
(101, 'Behar', 'Haxhismajli', 'beharhaxhismajli', '$2y$10$YOXPZWr0ud5X2cmT.4.mgOGREaD33yCeVrgT/j1m/4cUI1ZDJkO0q', NULL, 3, '19', 'behar-ha5@live.com', '1', 1, 'defaultmale.png', 2, 393, 184, '24/05/2019'),
(146, 'Albi', 'Hoti', 'axxb', '$2y$10$ggqJFyRwKN/4Fg7vTpuGXOlYGZZ0b7yHxgcF.Hiuj8H09.c6cFYku', NULL, 2, '19', 'albbi_hoti12@hotmail.com', '1', 1, 'defaultmale.png', 9, 0, 0, '02/10/2019'),
(145, 'Driton', 'Zorra', 'dritonzorra', '$2y$10$5vtgzaS8D2sD.JIsVy6BNOprRDX0CorktHCNUfhkstkenZ0FO3mJe', NULL, 3, '20', 'dritonz@hotmail.com', '1', 1, 'defaultmale.png', 1, 279, 68, '26/09/2019'),
(141, 'Jonida', 'Paja', 'jona', '$2y$10$8ltnc.NU/F5G4l4KMnas2OyZfCNd78uAIB7uaTA/G.a1wekoUTb3y', NULL, 2, '17', 'jonidapaja6@gmail.com', '0', 1, 'defaultfemale.png', 1, 0, 13, '14/09/2019'),
(144, 'Anita', 'Qerkezi', 'nitaqerkezi', '$2y$10$BH.hZFyGa7CDIXP6daOylOlOTBdLzOLFd5ALrC/P1Y83YBl3ivczK', NULL, 3, '21', 'nitaqerkezi@hotmail.com', '0', 1, 'defaultfemale.png', 2, 281, 84, '19/09/2019'),
(162, 'Era', 'Kroqi', 'erakroqk', '$2y$10$ioymOXWG7vszve96RTLdoOnVgbO9HFkyTyVkQAgb4lF0JXPAIMQgi', NULL, 2, '19', 'erakroqi22@gmail.com', '0', 1, 'defaultfemale.png', 1, 0, 0, '05/11/2019'),
(163, 'Bajram', 'Rrustemaj', 'lami', '$2y$10$ZnT5fD0CguvRUxbliHwQAOXgit8G5amx02DCHWvifJ3bGBuLoOydS', NULL, 2, '18', 'bajjram.rr@gmail.com', '1', 1, 'defaultmale.png', 1, 0, 0, '05/11/2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `folder_uploads`
--
ALTER TABLE `folder_uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_folder` (`id_folder`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_folder_2` (`id_folder`),
  ADD KEY `id_folder_3` (`id_folder`);

--
-- Indexes for table `kursori`
--
ALTER TABLE `kursori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userfiles`
--
ALTER TABLE `userfiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `userposts`
--
ALTER TABLE `userposts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `folder_uploads`
--
ALTER TABLE `folder_uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `kursori`
--
ALTER TABLE `kursori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT for table `userfiles`
--
ALTER TABLE `userfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `userposts`
--
ALTER TABLE `userposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=754;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
