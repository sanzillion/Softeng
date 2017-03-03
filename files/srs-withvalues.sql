-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2017 at 03:06 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`) VALUES
(1, 'dean', 'dean'),
(2, 'admin', 'admin'),
(3, 'admin2', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `bulletin`
--

CREATE TABLE `bulletin` (
  `id` int(11) NOT NULL,
  `imgname` varchar(200) NOT NULL,
  `title` varchar(50) NOT NULL,
  `post` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `m_id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `m_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`m_id`, `description`, `m_date`) VALUES
(5, 'Meeting1', '2017-03-09'),
(6, 'Meeting2', '2017-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `r_id` int(2) NOT NULL,
  `name` varchar(11) NOT NULL,
  `dates` date NOT NULL,
  `time` time NOT NULL,
  `day` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`r_id`, `name`, `dates`, `time`, `day`) VALUES
(1, 'dean', '2017-03-02', '16:58:33', 'Thursday'),
(2, 'admin', '2017-03-02', '17:06:48', 'Thursday'),
(3, 'dean', '2017-03-02', '17:07:12', 'Thursday'),
(4, 'dean', '2017-03-02', '21:03:48', 'Thursday'),
(5, 'admin', '2017-03-02', '21:39:09', 'Thursday'),
(6, 'admin', '2017-03-02', '22:24:59', 'Thursday'),
(7, 'admin', '2017-03-02', '22:30:36', 'Thursday'),
(8, 'admin', '2017-03-02', '23:08:31', 'Thursday'),
(9, 'admin', '2017-03-02', '23:56:54', 'Thursday'),
(10, 'admin', '2017-03-03', '10:25:04', 'Friday'),
(11, 'dean', '2017-03-03', '11:06:08', 'Friday');

-- --------------------------------------------------------

--
-- Table structure for table `sanction`
--

CREATE TABLE `sanction` (
  `sanc_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `Meeting1` varchar(11) NOT NULL,
  `Meeting2` varchar(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sanction`
--

INSERT INTO `sanction` (`sanc_id`, `s_id`, `Meeting1`, `Meeting2`, `total`) VALUES
(546, 775, 'PAID', '50', 50),
(547, 776, '50', '50', 100),
(548, 777, '50', '50', 100),
(549, 778, 'PRESENT', '50', 50),
(550, 779, 'PAID', '50', 50),
(551, 780, '50', '50', 100),
(552, 781, '50', '50', 100),
(553, 782, 'PRESENT', '50', 50),
(554, 783, '50', '50', 100),
(555, 784, '50', '50', 100),
(556, 785, 'PRESENT', '50', 50),
(557, 786, 'PAID', '50', 50),
(558, 787, 'PAID', '50', 50),
(559, 788, '50', '50', 100),
(560, 789, 'PAID', '50', 50),
(561, 790, 'PRESENT', '50', 50),
(562, 791, 'PAID', '50', 50),
(563, 792, '50', '50', 100),
(564, 793, 'PAID', '50', 50),
(565, 794, 'PAID', '50', 50),
(566, 795, 'PAID', '50', 50),
(567, 796, 'PAID', 'PRESENT', 0),
(568, 797, '50', '50', 100),
(569, 798, 'PRESENT', '50', 50),
(570, 799, '50', '50', 100),
(571, 800, 'PAID', '50', 50),
(572, 801, 'CLEARED', '50', 50),
(573, 802, '50', '50', 100),
(574, 803, '50', 'PAID', 50),
(575, 804, '50', '50', 100),
(576, 805, '50', '50', 100),
(577, 806, '50', '50', 100),
(578, 807, 'PRESENT', '50', 50),
(579, 808, '50', '50', 100),
(580, 809, '50', '50', 100),
(581, 810, 'PRESENT', '50', 50),
(582, 811, '50', '50', 100),
(583, 812, 'PAID', '50', 50),
(584, 813, '50', '50', 100),
(585, 814, '50', '50', 100),
(586, 815, 'PAID', '50', 50),
(587, 816, '50', '50', 100),
(588, 817, 'PAID', '50', 50),
(589, 818, '50', '50', 100),
(590, 819, '50', '50', 100),
(591, 820, '50', '50', 100),
(592, 821, 'CLEARED', '50', 50),
(593, 822, '50', '50', 100),
(594, 823, '50', '50', 100),
(595, 824, '50', 'CLEARED', 50),
(596, 825, '50', '50', 100),
(597, 826, 'PAID', '50', 50),
(598, 827, 'PRESENT', '50', 50),
(599, 828, '50', '50', 100),
(600, 829, '50', '50', 100),
(601, 830, 'PRESENT', '50', 50),
(602, 831, '50', '50', 100),
(603, 832, '50', '50', 100),
(604, 833, '50', '50', 100),
(605, 834, '50', '50', 100),
(606, 835, '50', '50', 100),
(607, 836, 'PAID', '50', 50),
(608, 837, '50', '50', 100),
(609, 838, '50', '50', 100),
(610, 839, '50', '50', 100),
(611, 840, '50', '50', 100),
(612, 841, '50', '50', 100),
(613, 842, '50', '50', 100),
(614, 843, '50', '50', 100),
(615, 844, '50', '50', 100),
(616, 845, '50', '50', 100),
(617, 846, '50', '50', 100),
(618, 847, 'CLEARED', '50', 50),
(619, 848, 'CLEARED', 'PRESENT', 0),
(620, 849, 'PAID', '50', 50),
(621, 850, 'PAID', '50', 50),
(622, 851, 'CLEARED', '50', 50),
(623, 852, '50', '50', 100),
(624, 853, '50', '50', 100),
(625, 854, '50', '50', 100),
(626, 855, '50', '50', 100),
(627, 856, '50', '50', 100),
(628, 857, '50', '50', 100),
(629, 858, 'PRESENT', '50', 50),
(630, 859, '50', '50', 100),
(631, 860, '50', '50', 100),
(632, 861, 'PAID', '50', 50),
(633, 862, '50', '50', 100),
(634, 863, '50', '50', 100),
(635, 864, 'PRESENT', '50', 50),
(636, 865, '50', '50', 100),
(637, 866, '50', '50', 100),
(638, 867, 'PAID', '50', 50),
(639, 868, '50', '50', 100),
(640, 869, '50', '50', 100),
(641, 870, 'PAID', '50', 50),
(642, 871, '50', '50', 100),
(643, 872, 'PAID', '50', 50),
(644, 873, 'PAID', '50', 50),
(645, 874, '50', '50', 100),
(646, 875, '50', '50', 100),
(647, 876, 'PRESENT', 'PRESENT', 0),
(648, 877, 'PAID', '50', 50),
(649, 878, '50', '50', 100),
(650, 879, '50', '50', 100),
(651, 880, '50', '50', 100),
(652, 881, 'PAID', '50', 50),
(653, 882, '50', '50', 100),
(654, 883, '50', '50', 100),
(655, 884, 'PRESENT', 'PRESENT', 0),
(656, 885, '50', '50', 100),
(657, 886, 'PRESENT', '50', 50),
(658, 887, '50', '50', 100),
(659, 888, '50', '50', 100),
(660, 889, 'PAID', '50', 50),
(661, 890, 'PAID', '50', 50),
(662, 891, '50', '50', 100),
(663, 892, '50', '50', 100),
(664, 893, 'PRESENT', '50', 50),
(665, 894, '50', '50', 100),
(666, 895, '50', '50', 100),
(667, 896, 'PAID', '50', 50),
(668, 897, 'PAID', '50', 50),
(669, 898, '50', '50', 100),
(670, 899, '50', '50', 100),
(671, 900, '50', '50', 100),
(672, 901, 'PAID', '50', 50),
(673, 902, 'PAID', '50', 50),
(674, 903, 'PAID', '50', 50),
(675, 904, '50', '50', 100),
(676, 905, 'PRESENT', '50', 50);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(11) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `year` enum('1st','2nd','3rd','4th') NOT NULL,
  `cpnum` bigint(12) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `surname`, `firstname`, `year`, `cpnum`, `name`) VALUES
(775, 'ABBORAN\r', 'SALHA\r', '1st', 123451234512, 'SALHA\r ABBORAN\r'),
(776, 'AMPER\r', 'DAVE MICHAEL\r', '1st', 123451234512, 'DAVE MICHAEL\r AMPER\r'),
(777, 'ASTILLERO\r', 'MARISCHELLE\r', '1st', 123451234512, 'MARISCHELLE\r ASTILLERO\r'),
(778, 'BAKIL\r', 'AJMAN JASSER\r', '1st', 123451234512, 'AJMAN JASSER\r BAKIL\r'),
(779, 'BASIO\r', 'TEOFILO III.\r', '1st', 123451234512, 'TEOFILO III.\r BASIO\r'),
(780, 'CARO\r', 'JEAN MIKHAIL\r', '1st', 123451234512, 'JEAN MIKHAIL\r CARO\r'),
(781, 'CATABAS\r', 'FRANCISCO III\r', '1st', 123451234512, 'FRANCISCO III\r CATABAS\r'),
(782, 'GUMBAN\r', 'JOYCE MAAN\r', '1st', 123451234512, 'JOYCE MAAN\r GUMBAN\r'),
(783, 'MANDIN\r', 'MARJORIE\r', '1st', 123451234512, 'MARJORIE\r MANDIN\r'),
(784, 'NASIBOG\r', 'CESAR IAN\r', '1st', 123451234512, 'CESAR IAN\r NASIBOG\r'),
(785, 'PANOLINO\r', 'NATHANIEL\r', '1st', 123451234512, 'NATHANIEL\r PANOLINO\r'),
(786, 'PASCUA\r', 'VIC MARTIN\r', '1st', 123451234512, 'VIC MARTIN\r PASCUA\r'),
(787, 'RODAS\r', 'EL JOHN JESUS\r', '1st', 123451234512, 'EL JOHN JESUS\r RODAS\r'),
(788, 'TALIMODAO\r', 'FROY LAN\r', '1st', 123451234512, 'FROY LAN\r TALIMODAO\r'),
(789, 'VILLACURA\r', 'CHRISTY\r', '1st', 123451234512, 'CHRISTY\r VILLACURA\r'),
(790, 'ALBARICO\r', 'JANA JOYCE\r', '1st', 123451234512, 'JANA JOYCE\r ALBARICO\r'),
(791, 'ANTOLIHAO\r', 'RALPH LAURENCE\r', '1st', 123451234512, 'RALPH LAURENCE\r ANTOLIHAO\r'),
(792, 'BARNACHEA\r', 'RALPH\r', '1st', 123451234512, 'RALPH\r BARNACHEA\r'),
(793, 'CAMILO\r', 'CHRISTOPHER\r', '1st', 123451234512, 'CHRISTOPHER\r CAMILO\r'),
(794, 'OJALES\r', 'MARC RONEL\r', '1st', 123451234512, 'MARC RONEL\r OJALES\r'),
(795, 'TINGHIL\r', 'REZIEL ANN\r', '1st', 123451234512, 'REZIEL ANN\r TINGHIL\r'),
(796, 'ALIVIANO\r', 'GARVIN CASEY\r', '2nd', 123451234512, 'GARVIN CASEY\r ALIVIANO\r'),
(797, 'ANDILUM\r', 'SANDY MAE\r', '2nd', 123451234512, 'SANDY MAE\r ANDILUM\r'),
(798, 'APINAN\r', 'WILHELM JAY\r', '2nd', 123451234512, 'WILHELM JAY\r APINAN\r'),
(799, 'BALLESTA\r', 'GABRIEL\r', '2nd', 123451234512, 'GABRIEL\r BALLESTA\r'),
(800, 'BENEDICTO\r', 'RODNEY KYLE\r', '2nd', 123451234512, 'RODNEY KYLE\r BENEDICTO\r'),
(801, 'CALLO\r', 'ANGELICA\r', '2nd', 123451234512, 'ANGELICA\r CALLO\r'),
(802, 'CARCASONA\r', 'MELCHOR JR.\r', '2nd', 123451234512, 'MELCHOR JR.\r CARCASONA\r'),
(803, 'DAPIGAN\r', 'RENZ DAVID\r', '2nd', 123451234512, 'RENZ DAVID\r DAPIGAN\r'),
(804, 'DEDICATORIA\r', 'KENNY\r', '2nd', 123451234512, 'KENNY\r DEDICATORIA\r'),
(805, 'DIO\r', 'JASMIN\r', '2nd', 123451234512, 'JASMIN\r DIO\r'),
(806, 'ECONAR\r', 'JEHVY\r', '2nd', 123451234512, 'JEHVY\r ECONAR\r'),
(807, 'EJARA\r', 'DENVER SHEEN\r', '2nd', 123451234512, 'DENVER SHEEN\r EJARA\r'),
(808, 'GARMA\r', 'RYDEL RIEL\r', '2nd', 123451234512, 'RYDEL RIEL\r GARMA\r'),
(809, 'GAVIOLA\r', 'ZYRAH HYACIENTH\r', '2nd', 123451234512, 'ZYRAH HYACIENTH\r GAVIOLA\r'),
(810, 'INDIN\r', 'AL-RASHID\r', '2nd', 123451234512, 'AL-RASHID\r INDIN\r'),
(811, 'JONOTA\r', 'ROBERTO JR.\r', '2nd', 123451234512, 'ROBERTO JR.\r JONOTA\r'),
(812, 'JOSOL\r', 'PAUL PATRICK\r', '2nd', 123451234512, 'PAUL PATRICK\r JOSOL\r'),
(813, 'LAGRIMAS\r', 'NEIL BRYAN\r', '2nd', 123451234512, 'NEIL BRYAN\r LAGRIMAS\r'),
(814, 'LAMBAN\r', 'ROSEMARIE DIANE\r', '2nd', 123451234512, 'ROSEMARIE DIANE\r LAMBAN\r'),
(815, 'MACATIMPAG\r', 'CHRISTIAN\r', '2nd', 123451234512, 'CHRISTIAN\r MACATIMPAG\r'),
(816, 'MALINAO\r', 'LEONARD RENZ\r', '2nd', 123451234512, 'LEONARD RENZ\r MALINAO\r'),
(817, 'MOLINA\r', 'RUSSEL JENN\r', '2nd', 123451234512, 'RUSSEL JENN\r MOLINA\r'),
(818, 'NAVARRA\r', 'EVA MAE IRA\r', '2nd', 123451234512, 'EVA MAE IRA\r NAVARRA\r'),
(819, 'OLEDAN\r', 'ROD-JHON\r', '2nd', 123451234512, 'ROD-JHON\r OLEDAN\r'),
(820, 'PRESAS\r', 'ZHYRILLE JAMES\r', '2nd', 123451234512, 'ZHYRILLE JAMES\r PRESAS\r'),
(821, 'RADAM\r', 'CHRISTIAN JOHN\r', '2nd', 123451234512, 'CHRISTIAN JOHN\r RADAM\r'),
(822, 'SEROJE\r', 'REYNALDO\r', '2nd', 123451234512, 'REYNALDO\r SEROJE\r'),
(823, 'TALLEDO\r', 'EARLJOHN\r', '2nd', 123451234512, 'EARLJOHN\r TALLEDO\r'),
(824, 'ABAD\r', 'RINOZHEL\r', '2nd', 123451234512, 'RINOZHEL\r ABAD\r'),
(825, 'ALIDON\r', 'ASTROPHEL\r', '2nd', 123451234512, 'ASTROPHEL\r ALIDON\r'),
(826, 'CACHUELA\r', 'JERICHO\r', '2nd', 123451234512, 'JERICHO\r CACHUELA\r'),
(827, 'CAILING\r', 'RANSOM\r', '2nd', 123451234512, 'RANSOM\r CAILING\r'),
(828, 'CASONA\r', 'CJAY\r', '2nd', 123451234512, 'CJAY\r CASONA\r'),
(829, 'CASTILLO\r', 'CHARLES EVAN\r', '2nd', 123451234512, 'CHARLES EVAN\r CASTILLO\r'),
(830, 'COMPENDIO\r', 'MICHAEL VON\r', '2nd', 123451234512, 'MICHAEL VON\r COMPENDIO\r'),
(831, 'DAGONGDONG\r', 'ROMEO\r', '2nd', 123451234512, 'ROMEO\r DAGONGDONG\r'),
(832, 'DE GUZMAN\r', 'STEVEN CLARK\r', '2nd', 123451234512, 'STEVEN CLARK\r DE GUZMAN\r'),
(833, 'EDYESCA\r', 'ALEXANDRA MARIE\r', '2nd', 123451234512, 'ALEXANDRA MARIE\r EDYESCA\r'),
(834, 'ENTICE\r', 'GEORGE JR.\r', '2nd', 123451234512, 'GEORGE JR.\r ENTICE\r'),
(835, 'INES\r', 'GLAN YSMAEL\r', '2nd', 123451234512, 'GLAN YSMAEL\r INES\r'),
(836, 'LANCHINEBRE\r', 'RICKY\r', '2nd', 123451234512, 'RICKY\r LANCHINEBRE\r'),
(837, 'LEGUARDA\r', 'CHARLES KARLO\r', '2nd', 123451234512, 'CHARLES KARLO\r LEGUARDA\r'),
(838, 'LOREN\r', 'MAHER\r', '2nd', 123451234512, 'MAHER\r LOREN\r'),
(839, 'MANRIQUE\r', 'DENNIS\r', '2nd', 123451234512, 'DENNIS\r MANRIQUE\r'),
(840, 'MENDOZA\r', 'MICHAEL REY\r', '2nd', 123451234512, 'MICHAEL REY\r MENDOZA\r'),
(841, 'NIPAS\r', 'MARIA CHRISTINA\r', '2nd', 123451234512, 'MARIA CHRISTINA\r NIPAS\r'),
(842, 'PADILLA\r', 'ROMEIRE\r', '2nd', 123451234512, 'ROMEIRE\r PADILLA\r'),
(843, 'QUIMINSAO\r', 'FRANCIS LEO\r', '2nd', 123451234512, 'FRANCIS LEO\r QUIMINSAO\r'),
(844, 'ROMERO\r', 'ELLA CAMILLE\r', '2nd', 123451234512, 'ELLA CAMILLE\r ROMERO\r'),
(845, 'SARAGENA\r', 'SAMANTHA GAIL\r', '2nd', 123451234512, 'SAMANTHA GAIL\r SARAGENA\r'),
(846, 'SIBLE\r', 'HAZEL\r', '2nd', 123451234512, 'HAZEL\r SIBLE\r'),
(847, 'TINGSON\r', 'RONALD\r', '2nd', 123451234512, 'RONALD\r TINGSON\r'),
(848, 'AGOD\r', 'DANISSE ERLYNE\r', '3rd', 123451234512, 'DANISSE ERLYNE\r AGOD\r'),
(849, 'ALTERADO\r', 'CLYNT TROY\r', '3rd', 123451234512, 'CLYNT TROY\r ALTERADO\r'),
(850, 'AMBOY\r', 'MC HENRY\r', '3rd', 123451234512, 'MC HENRY\r AMBOY\r'),
(851, 'BALINGATA\r', 'RESNEL\r', '3rd', 123451234512, 'RESNEL\r BALINGATA\r'),
(852, 'BAUGBOG\r', 'MICHAEL\r', '3rd', 123451234512, 'MICHAEL\r BAUGBOG\r'),
(853, 'BAYOTAS\r', 'JOEY\r', '3rd', 123451234512, 'JOEY\r BAYOTAS\r'),
(854, 'BONIFACIO\r', 'KENO\r', '3rd', 123451234512, 'KENO\r BONIFACIO\r'),
(855, 'CABANLIT\r', 'WILSON JR.\r', '3rd', 123451234512, 'WILSON JR.\r CABANLIT\r'),
(856, 'CASAQUITE\r', 'FE\r', '3rd', 123451234512, 'FE\r CASAQUITE\r'),
(857, 'CONTORNO\r', 'MYLENE\r', '3rd', 123451234512, 'MYLENE\r CONTORNO\r'),
(858, 'CORILLA\r', 'LESTER BRIAN\r', '3rd', 123451234512, 'LESTER BRIAN\r CORILLA\r'),
(859, 'DALIPE\r', 'ALAN MARTIN\r', '3rd', 123451234512, 'ALAN MARTIN\r DALIPE\r'),
(860, 'FERNANDEZ\r', 'RAFAEL\r', '3rd', 123451234512, 'RAFAEL\r FERNANDEZ\r'),
(861, 'HADJI ALI\r', 'AGAKHAN\r', '3rd', 123451234512, 'AGAKHAN\r HADJI ALI\r'),
(862, 'IMBOD\r', 'EMAN\r', '3rd', 123451234512, 'EMAN\r IMBOD\r'),
(863, 'JAMORA\r', 'JERLYN\r', '3rd', 123451234512, 'JERLYN\r JAMORA\r'),
(864, 'LAMBAN\r', 'GLENN PATRICK\r', '3rd', 123451234512, 'GLENN PATRICK\r LAMBAN\r'),
(865, 'LAYSON\r', 'EDWARD JAMES\r', '3rd', 123451234512, 'EDWARD JAMES\r LAYSON\r'),
(866, 'MACABANI\r', 'BEVERLY\r', '3rd', 123451234512, 'BEVERLY\r MACABANI\r'),
(867, 'MANTE\r', 'EMILIO AURVILLE III\r', '3rd', 123451234512, 'EMILIO AURVILLE III\r MANTE\r'),
(868, 'MARIANO\r', 'KATRINA\r', '3rd', 123451234512, 'KATRINA\r MARIANO\r'),
(869, 'MORENO\r', 'MAE JEN\r', '3rd', 123451234512, 'MAE JEN\r MORENO\r'),
(870, 'PACALDO\r', 'KIM AILEEN\r', '3rd', 123451234512, 'KIM AILEEN\r PACALDO\r'),
(871, 'RAVANES\r', 'MHEEL JHONE\r', '3rd', 123451234512, 'MHEEL JHONE\r RAVANES\r'),
(872, 'SALIPADA\r', 'EDEL HAMSA\r', '3rd', 123451234512, 'EDEL HAMSA\r SALIPADA\r'),
(873, 'SALIUT\r', 'BETCHIE GAY\r', '3rd', 123451234512, 'BETCHIE GAY\r SALIUT\r'),
(874, 'SUMAYANG\r', 'JULES BRIAN\r', '3rd', 123451234512, 'JULES BRIAN\r SUMAYANG\r'),
(875, 'TALADTAD\r', 'BILL JOSEPH\r', '3rd', 123451234512, 'BILL JOSEPH\r TALADTAD\r'),
(876, 'VALLE\r', 'SANDRU MOSES\r', '3rd', 123451234512, 'SANDRU MOSES\r VALLE\r'),
(877, 'VELARDE\r', 'VINA\r', '3rd', 123451234512, 'VINA\r VELARDE\r'),
(878, 'YUZON\r', 'CARINA PATRICIA\r', '3rd', 123451234512, 'CARINA PATRICIA\r YUZON\r'),
(879, 'ARAIZ\r', 'KENNETH CLINTON\r', '3rd', 123451234512, 'KENNETH CLINTON\r ARAIZ\r'),
(880, 'MAGLANGIT\r', 'REA JANE BIE\r', '3rd', 123451234512, 'REA JANE BIE\r MAGLANGIT\r'),
(881, 'OMANDAC\r', 'ALJON MAR\r', '3rd', 123451234512, 'ALJON MAR\r OMANDAC\r'),
(882, 'POTESTAS\r', 'KATHERINE\r', '3rd', 123451234512, 'KATHERINE\r POTESTAS\r'),
(883, 'ZAILON\r', 'ZAKEY\r', '3rd', 123451234512, 'ZAKEY\r ZAILON\r'),
(884, 'BADIS\r', 'AIKY\r', '4th', 123451234512, 'AIKY\r BADIS\r'),
(885, 'BERONILLA\r', 'NOEME\r', '4th', 123451234512, 'NOEME\r BERONILLA\r'),
(886, 'CREDO\r', 'JOHN CARLO\r', '4th', 123451234512, 'JOHN CARLO\r CREDO\r'),
(887, 'JOAQUIN\r', 'MILKY\r', '4th', 123451234512, 'MILKY\r JOAQUIN\r'),
(888, 'LAGUIAB\r', 'AISA\r', '4th', 123451234512, 'AISA\r LAGUIAB\r'),
(889, 'PHALA\r', 'JOSE LITO\r', '4th', 123451234512, 'JOSE LITO\r PHALA\r'),
(890, 'SALVADOR\r', 'STEPHEN CARLO\r', '4th', 123451234512, 'STEPHEN CARLO\r SALVADOR\r'),
(891, 'SEROJALES\r', 'RUBY JANE\r', '4th', 123451234512, 'RUBY JANE\r SEROJALES\r'),
(892, 'SININING\r', 'QUINNIE ANA JOY\r', '4th', 123451234512, 'QUINNIE ANA JOY\r SININING\r'),
(893, 'TURTOR\r', 'CHARLITO JR.\r', '4th', 123451234512, 'CHARLITO JR.\r TURTOR\r'),
(894, 'UY\r', 'JOHN CARLO\r', '4th', 123451234512, 'JOHN CARLO\r UY\r'),
(895, 'AQUINO\r', 'CARLO\r', '4th', 123451234512, 'CARLO\r AQUINO\r'),
(896, 'CANQUE\r', 'VAN\r', '4th', 123451234512, 'VAN\r CANQUE\r'),
(897, 'DIGAL\r', 'COLEEN MAE\r', '4th', 123451234512, 'COLEEN MAE\r DIGAL\r'),
(898, 'GOMEZ\r', 'SHIELA ROSE\r', '4th', 123451234512, 'SHIELA ROSE\r GOMEZ\r'),
(899, 'LAUZON\r', 'MARY MARGARET\r', '4th', 123451234512, 'MARY MARGARET\r LAUZON\r'),
(900, 'MALAGA\r', 'JUNEL\r', '4th', 123451234512, 'JUNEL\r MALAGA\r'),
(901, 'MANGARON\r', 'ALOJA AMOR\r', '4th', 123451234512, 'ALOJA AMOR\r MANGARON\r'),
(902, 'NAZARENO\r', 'KEVIN\r', '4th', 123451234512, 'KEVIN\r NAZARENO\r'),
(903, 'OMILA\r', 'JACKIE LOU\r', '4th', 123451234512, 'JACKIE LOU\r OMILA\r'),
(904, 'SABEJON\r', 'MARK LOID\r', '4th', 123451234512, 'MARK LOID\r SABEJON\r'),
(905, 'UTBO', 'JERLYN MAE', '4th', 123451234512, 'JERLYN MAE UTBO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulletin`
--
ALTER TABLE `bulletin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `sanction`
--
ALTER TABLE `sanction`
  ADD PRIMARY KEY (`sanc_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bulletin`
--
ALTER TABLE `bulletin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `r_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sanction`
--
ALTER TABLE `sanction`
  MODIFY `sanc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=677;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=906;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
