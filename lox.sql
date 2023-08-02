-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220918.6792b17e72
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2023 at 09:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lox`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_id` varchar(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_id`, `cat_name`, `link`) VALUES
(1, '1', 'Passenger Rider/Logistics Customer', 'passanger_search.php'),
(2, '2', 'Passenger Driver', 'passanger_driver.php'),
(3, '3', 'Logistics Driver', 'logistics_driver.php'),
(4, '4', 'Car Pool Driver', 'carpool_driver.php'),
(5, '5', 'Customer Passenger Request', 'passanger_request.php'),
(6, '6', 'Customer Logistics Request', 'logistics_request.php');

-- --------------------------------------------------------

--
-- Table structure for table `licences`
--

CREATE TABLE `licences` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lox_admin_user`
--

CREATE TABLE `lox_admin_user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lox_admin_user`
--

INSERT INTO `lox_admin_user` (`id`, `user_name`, `email`, `password`, `mobileno`) VALUES
(6, 'admin', 'majeed544@gmail.com', 'admin1991', '03146850461'),
(7, 'edcarter724', 'edcarter724@gmail.com', 'edcarter724', '17869205004');

-- --------------------------------------------------------

--
-- Table structure for table `lox_cityname`
--

CREATE TABLE `lox_cityname` (
  `id` int(11) NOT NULL,
  `cityname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lox_cityname`
--

INSERT INTO `lox_cityname` (`id`, `cityname`) VALUES
(102, 'Balaka - Amidu'),
(104, 'Balaka - Chanthunya'),
(106, 'Balaka - Kachenga'),
(107, 'Balaka - Kalembo'),
(108, 'Balaka - Nkaya'),
(109, 'Balaka - Nsamala'),
(110, 'Balaka - Sawali'),
(111, 'Blantyre - Bangwe'),
(491, 'Blantyre - Blantyre Central '),
(492, 'Blantyre- Blantyre East'),
(493, 'Blantyre - Blantyre West'),
(494, 'Blantyre - Chichiri'),
(495, 'Blantyre - Chigumula'),
(496, 'Blantyre - Chilomoni '),
(497, 'Blantyre - Likhubula '),
(498, 'Blantyre - Limbe Central '),
(499, 'Blantyre - Limbe East '),
(500, 'Blantyre - Limbe West '),
(501, 'Blantyre - Mapanga'),
(502, 'Blantyre - Michiru '),
(503, 'Blantyre - Misesa '),
(504, 'Blantyre - Msamba'),
(505, 'Blantyre - Mzedi '),
(506, 'Blantyre - Namiyango'),
(507, 'Blantyre - Nancholi'),
(508, 'Blantyre - Ndirande North '),
(509, 'Blantyre - Ndirande South '),
(510, 'Blantyre - Ndirande West '),
(511, 'Blantyre - Nkolokoti'),
(512, 'Blantyre - Nyambadwe '),
(513, 'Blantyre - Soche East '),
(514, 'Blantyre - Soche West '),
(515, 'Blantyre - South Lunzu'),
(516, 'Chikwawa - Alimenda'),
(517, 'Chikwawa - Alufasi'),
(518, 'Chikwawa - Alumenda'),
(519, 'Chikwawa - Azyuda'),
(520, 'Chikwawa - Balala'),
(521, 'Chikwawa - Bile'),
(522, 'Chikwawa - Cabwedzek'),
(523, 'Chikwawa - Chafudzik'),
(524, 'Chikwawa - Chagambat'),
(525, 'Chikwawa - Chakanza'),
(526, 'Chikwawa - Chakhumbi'),
(527, 'Chikwawa - Chaletuwa'),
(528, 'Chikwawa - Chamanga'),
(529, 'Chikwawa - Chamara'),
(530, 'Chikwawa-Chambuluka'),
(531, 'Chikwawa-Chaonanjiwa'),
(532, 'Chikwawa - Chavara'),
(533, 'Chikwawa - Chawuwa'),
(534, 'Chikwawa - Chigwata'),
(535, 'Chikwawa - Chikungu'),
(536, 'Chikwawa - Chileka'),
(537, 'Chikwawa - Chimbembe'),
(538, 'Chikwawa-Chimpambana'),
(539, 'Chikwawa - Chipendo'),
(540, 'Chikwawa - Chipwaila'),
(541, 'Chikwawa - Chitsumba'),
(542, 'Chikwawa - Chizenga'),
(543, 'Chikwawa - Cinyanga'),
(544, 'Chikwawa - Cogaka'),
(545, 'Chikwawa - Crowndi'),
(546, 'Chikwawa - Daniel'),
(547, 'Chikwawa - Dzikolath'),
(548, 'Chikwawa - Fodya'),
(549, 'Chikwawa - Fombe'),
(550, 'Chikwawa - Goma'),
(551, 'Chikwawa - Gonyo'),
(552, 'Chikwawa - Imbwa'),
(553, 'Chikwawa - James'),
(554, 'Chikwawa - John'),
(555, 'Chikwawa - John Mali'),
(556, 'Chikwawa - Jombo'),
(557, 'Chikwawa - Kakoma'),
(558, 'Chikwawa - Kalaundi'),
(559, 'Chikwawa - Kalulu'),
(560, 'Chikwawa - Kampani'),
(561, 'Chikwawa - Kampomo'),
(562, 'Chikwawa-Kanyimbir'),
(563, 'Chikwawa - Kanzele'),
(564, 'Chikwawa - Kanzimbi'),
(565, 'Chikwawa-Kaphilijonj'),
(566, 'Chikwawa - Kasisi'),
(567, 'Chikwawa - Kavalho'),
(568, 'Chikwawa - Kavalo'),
(569, 'Chikwawa - Kunyinda'),
(570, 'Chikwawa - Lazalo'),
(571, 'Chikwawa - Lombe'),
(572, 'Chikwawa - Lundu'),
(573, 'Chikwawa - Machilika'),
(574, 'Chikwawa - Macikika'),
(575, 'Chikwawa - Mafunga'),
(576, 'Chikwawa - Maganga'),
(577, 'Chikwawa - Malemia'),
(578, 'Chikwawa - Malikopo'),
(579, 'Chikwawa-Mandalade'),
(580, 'Chikwawa - Mandele'),
(581, 'Chikwawa - Maperera'),
(582, 'Chikwawa - Masache'),
(583, 'Chikwawa - Masamba'),
(584, 'Chikwawa-Masanduko'),
(585, 'Chikwawa-Masenjere'),
(586, 'Chikwawa - Masseah'),
(587, 'Chikwawa-Mazongoza'),
(588, 'Chikwawa - Mbewe'),
(589, 'Chikwawa - Mbonda'),
(590, 'Chikwawa - Mboza'),
(591, 'Chikwawa - Mbuzi'),
(592, 'Chikwawa - Mdzace'),
(593, 'Chikwawa-Mikolongo'),
(594, 'Chikwawa - Misomali'),
(595, 'Chikwawa - Mitondo'),
(596, 'Chikwawa-Mkumaniza'),
(597, 'Chikwawa - Mlangeni'),
(598, 'Chikwawa - Mologeni'),
(599, 'Chikwawa - Moses'),
(600, 'Chikwawa - Mozace'),
(601, 'Chikwawa - Mpasu'),
(602, 'Chikwawa - Mpheza'),
(603, 'Chikwawa - Mphonde'),
(604, 'Chikwawa - Mphuka'),
(605, 'Chikwawa - Mpimbi'),
(606, 'Chikwawa - Mposa'),
(607, 'Chikwawa - Msamvi'),
(608, 'Chikwawa - Mulilima'),
(609, 'Chikwawa - Mwaebwa'),
(610, 'Chikwawa - Mwalija'),
(611, 'Chikwawa-Mwanaakakul'),
(612, 'Chikwawa - Mwiza'),
(613, 'Chikwawa - Myaya'),
(614, 'Chikwawa - Namanya'),
(615, 'Chikwawa-Namiserer'),
(616, 'Chikwawa - Nchalo'),
(617, 'Chikwawa - Nchimika'),
(618, 'Chikwawa - Ndombo'),
(619, 'Chikwawa - Ngabu'),
(620, 'Chikwawa - Ngilazi'),
(621, 'Chikwawa - Ngowo'),
(622, 'Chikwawa - Nkate'),
(623, 'Chikwawa - Nkhalmba'),
(624, 'Chikwawa-Nkhangwa'),
(625, 'Chikwawa-Nkhwangwa'),
(626, 'Chikwawa - Nkuzi'),
(627, 'Chikwawa - Nsangwe'),
(628, 'Chikwawa-Nsiyampanje'),
(629, 'Chikwawa - Nsomo'),
(630, 'Chikwawa - Nthenda'),
(631, 'Chikwawa - Padzua'),
(632, 'Chikwawa - Pende'),
(633, 'Chikwawa - Rodreck'),
(634, 'Chikwawa - Salabeni'),
(635, 'Chikwawa - Saliva'),
(636, 'Chikwawa - Sanjama'),
(637, 'Chikwawa - Saopa'),
(638, 'Chikwawa - Savala'),
(639, 'Chikwawa - Sekela'),
(640, 'Chikwawa - Seseo'),
(641, 'Chikwawa - Simbi'),
(642, 'Chikwawa - Singano'),
(643, 'Chikwawa - Spooni'),
(644, 'Chikwawa-Tchigaga'),
(645, 'Chikwawa - Tendo'),
(646, 'Chikwawa - Therere'),
(647, 'Chikwawa - Thimba'),
(648, 'Chikwawa - Thimu'),
(649, 'Chikwawa - Thomas'),
(650, 'Chikwawa - Thudzu'),
(651, 'Chikwawa-Timbenao'),
(652, 'Chikwawa - Tizola'),
(653, 'Chikwawa - Tomali'),
(654, 'Chikwawa-Tombonder'),
(655, 'Chikwawa - Topoloni'),
(656, 'Chikwawa-Two Boy'),
(657, 'Chikwawa - Ubale'),
(658, 'Chikwawa-Zimponje'),
(659, 'Chikwawa - Zironzo'),
(660, 'Dedza - Central'),
(661, 'Dedza-Central East'),
(662, 'Dedza - East'),
(663, 'Dedza - Lobi'),
(664, 'Dedza - Mua'),
(665, 'Dedza - North'),
(666, 'Dedza - North West'),
(667, 'Dedza - South'),
(668, 'Dedza - South West'),
(669, 'Dedza - West'),
(670, 'Dowa - Bowe'),
(671, 'Dowa - Chakhaza'),
(672, 'Dowa-Chankhungu'),
(673, 'Dowa - Chezi'),
(674, 'Dowa-Chinkhwili'),
(675, 'Dowa - Chisepo'),
(676, 'Dowa-Chizolowondo'),
(677, 'Dowa - DHO'),
(678, 'Dowa - Dzaleka'),
(679, 'Dowa - Dzoole'),
(680, 'Dowa - Kasese'),
(681, 'Dowa - Kayembe'),
(682, 'Dowa - Madisi'),
(683, 'Dowa-Matekenya'),
(684, 'Dowa - Mbingwa'),
(685, 'Dowa - Mponela'),
(686, 'Dowa-Msakambewa'),
(687, 'Dowa-Mtengowanthenga'),
(688, 'Dowa - Mvera Army'),
(689, 'Dowa - Mvera Mission'),
(690, 'Dowa - Mwangala'),
(691, 'Dowa - Nalunga'),
(692, 'Dowa - Thonje'),
(693, 'Kasungu - Central'),
(694, 'Kasungu - East'),
(695, 'Kasungu - North '),
(696, 'Kasungu - North East'),
(697, 'Kasungu-North-North-'),
(698, 'Kasungu - North West'),
(699, 'Kasungu - South '),
(700, 'Kasungu - South East'),
(701, 'Kasungu - West'),
(702, 'Lilongwe - Area One'),
(703, 'Lilongwe - Area Two'),
(704, 'Lilongwe-Area Three'),
(705, 'Lilongwe-Area Four'),
(706, 'Lilongwe-Area Five'),
(707, 'Lilongwe - Area Six'),
(708, 'Lilongwe-Area Seven'),
(709, 'Lilongwe-Area Eight'),
(710, 'Lilongwe-Area Nine'),
(711, 'Lilongwe-Area Ten'),
(712, 'Lilongwe-Area Eleven'),
(713, 'Lilongwe-Area Twelve'),
(714, 'Lilongwe-A-Thirteen'),
(715, 'Lilongwe-A-Fourteen'),
(716, 'Lilongwe-A-Fifteen'),
(717, 'Lilongwe-A-Sixteen'),
(718, 'Lilongwe-A-Seventeen'),
(719, 'Lilongwe-A-Eighteen '),
(720, 'Lilongwe-A-Nineteen'),
(721, 'Lilongwe-Area Twenty'),
(722, 'L- Area Twenty One'),
(723, 'L- Area Twenty Two'),
(724, 'L- Area Twenty Three'),
(725, 'L- Area Twenty Four'),
(726, 'L- Area Twenty Five'),
(727, 'L- Area Twenty Six'),
(728, 'L- Area Twenty Seven'),
(729, 'L- Area Twenty Eight'),
(730, 'L- Area Twenty Nine'),
(731, 'Lilongwe-Area Thirty'),
(732, 'L- Area Thirty One'),
(733, 'L- Area Thirty Two'),
(734, 'L- Area Thirty Three'),
(735, 'L- Area Thirty Four'),
(736, 'L- Area Thirty Five'),
(737, 'L- Area Thirty Six'),
(738, 'L- Area Thirty Seven'),
(739, 'L- Area Thirty Eight'),
(740, 'L- Area Thirty Nine'),
(741, 'Lilongwe-Area Forty '),
(742, 'L- Area Forty One'),
(743, 'L- Area Forty Two'),
(744, 'L- Area Forty Three '),
(745, 'L- Area Forty Four '),
(746, 'L- Area Forty Five'),
(747, 'L- Area Forty Six'),
(748, 'L- Area Forty Seven'),
(749, 'L- Area Forty Eight'),
(750, 'L- Area Forty Nine'),
(751, 'Lilongwe-Area Fifty'),
(752, 'L- Area Fifty One'),
(753, 'L- Area Fifty Two'),
(754, 'L- Area Fifty Three '),
(755, 'L- Area Fifty Four '),
(756, 'L- Area Fifty Five'),
(757, 'L- Area Fifty Six'),
(758, 'L- Area Fifty Seven'),
(759, 'L- Area Fifty Eight'),
(760, 'Mangochi - Central'),
(761, 'Mangochi - East'),
(762, 'Mangochi - Lutende'),
(763, 'Mangochi - Malombe'),
(764, 'Mangochi-Monkey Bay'),
(765, 'Mangochi - Nkungulu'),
(766, 'Mangochi - North'),
(767, 'Mangochi-North East'),
(768, 'Mangochi - South'),
(769, 'Mangochi-South West'),
(770, 'Mchinji - East'),
(771, 'Mchinji - North'),
(772, 'Mchinji-North East'),
(773, 'Mchinji - South'),
(774, 'Mchinji-South West'),
(775, 'Mchinji - West'),
(776, 'Mchinji-Tikoliwe'),
(777, 'Mchinji - Tondo'),
(778, 'Mchinji-Tongozala'),
(779, 'Mchinji - Tsekwe'),
(780, 'Mchinji - Tsumba'),
(781, 'Mchinji - Vivi'),
(782, 'Mchinji - Yohan'),
(783, 'Mchinji - Zulu'),
(784, 'Mchinji-Zungusi'),
(785, 'Mulanje - Bale'),
(786, 'Mulanje - Central'),
(787, 'Mulanje - Limbuli'),
(788, 'Mulanje - North'),
(789, 'Mulanje - Pasani'),
(790, 'Mulanje - South'),
(791, 'Mulanje-South East'),
(792, 'Mulanje-South West'),
(793, 'Mulanje - West'),
(794, 'Mzimba - Central'),
(795, 'Mzimba - East'),
(796, 'Mzimba - Ekwendeni'),
(797, 'Mzimba - Hora'),
(798, 'Mzimba - Luwelezi'),
(799, 'Mzimba-Mzuzu City'),
(800, 'Mzimba - North'),
(801, 'Mzimba-North East'),
(802, 'Mzimba - Solora'),
(803, 'Mzimba - South'),
(804, 'Mzimba-South East'),
(805, 'Mzimba-South West'),
(806, 'Mzimba - West'),
(807, 'Nkhata Bay - Central'),
(808, 'Nkhata Bay - North'),
(809, 'Nkhata Bay - North W'),
(810, 'Nkhata Bay - South'),
(811, 'Nkhata Bay - South E'),
(812, 'Nkhata Bay - West'),
(813, 'Nkhata Bay - Wachaza'),
(814, 'Nkhata Bay-Wazankhu'),
(815, 'Nkhata Bay - Yadinga'),
(816, 'Nkhata Bay - Zayuka'),
(817, 'Nkhata Bay-Zilakoma'),
(818, 'Nkhata Bay - Zowani'),
(819, 'Nkhotakota - Central'),
(820, 'Nkhotakota - North'),
(821, 'Nkhotakota - North E'),
(822, 'Nkhotakota - South'),
(823, 'Nkhotakota-South E'),
(824, 'Nkhotakota - Tebulo'),
(825, 'Nkhotakota - Tenje'),
(826, 'Nkhotakota-Tom Chipe'),
(827, 'Nkhotakota-Tongole'),
(828, 'Nkhotakota-Tongoto'),
(829, 'Nkhotakota - Ungwe'),
(830, 'Nkhotakota - Usufu'),
(831, 'Nkhotakota - Zidyana'),
(832, 'Nsanje - Central'),
(833, 'Nsanje - Lalanje'),
(834, 'Nsanje - North'),
(835, 'Nsanje - South'),
(836, 'Nsanje-South West'),
(837, 'Nsanje - Sande'),
(838, 'Nsanje-Sankulani'),
(839, 'Nsanje - Sorjin'),
(840, 'Nsanje - Tawa'),
(841, 'Nsanje-Tengani'),
(842, 'Nsanje - Tizola'),
(843, 'Nsanje-Vizharona'),
(844, 'Nsanje - Zirona'),
(845, 'Salima - Central'),
(846, 'Salima - North'),
(847, 'Salima - South'),
(848, 'Salima - South East'),
(849, 'Salima - North West'),
(850, 'Salima - Abisai'),
(851, 'Salima - Chipoka'),
(852, 'Salima - Senga'),
(853, 'Salima - Simnawi'),
(854, 'Salima - Suzi'),
(855, 'Salima - Tembwe'),
(856, 'Salima - Tsoyo'),
(857, 'Salima - Waya'),
(858, 'Salima - Yonam'),
(859, 'Thyolo - Central'),
(860, 'Thyolo - East'),
(861, 'Thyolo - North'),
(862, 'Thyolo - South'),
(863, 'Thyolo - South West'),
(864, 'Thyolo - Thava'),
(865, 'Thyolo - West'),
(866, 'Zomba - Central'),
(867, 'Zomba - Changalume'),
(868, 'Zomba - Chingale'),
(869, 'Zomba - Chisi'),
(870, 'Zomba - Likangala'),
(871, 'Zomba - Lisanjala'),
(872, 'Zomba - Msondole'),
(873, 'Zomba - Mtonya'),
(874, 'Zomba - Nsondole'),
(875, 'Zomba - Thondwe');

-- --------------------------------------------------------

--
-- Table structure for table `lox_customer_feedback`
--

CREATE TABLE `lox_customer_feedback` (
  `id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` varchar(255) NOT NULL,
  `stars` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_by_id` varchar(255) NOT NULL,
  `commentor_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lox_faq`
--

CREATE TABLE `lox_faq` (
  `id` int(11) NOT NULL,
  `faq_question` text NOT NULL,
  `faq_answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lox_faq`
--

INSERT INTO `lox_faq` (`id`, `faq_question`, `faq_answer`) VALUES
(1, 'What is Lox Lift', 'Lox Lift is a digital platform that allows Malawians with access to a vehicle to work and operate as a private taxi cab driver Lox Lift also provides free promotion for already existing taxi services to advertise their company Lox Lift also provides free promotion for any Malawian that has access to a pickup truck or semi truck tractor trailer and wants to provide logistical transportation services'),
(3, 'How much does Lox Lift charge', 'Please visit our pricing page'),
(4, 'How do I get full access to the driver contact information', 'You must first pay the nominal fee to receive full access for the time allotment of your choosing'),
(5, 'Are Lox Lift services available outside of Malawi', 'At this current time Lox Lift is available exclusively in Malawi'),
(6, 'What forms of payment does Lox Lift accept', 'Airtel and TNM Mpamba'),
(7, 'How much does a passenger ride cost', 'That depends on which driver you contact as each driver charges their own individual rates'),
(8, 'How much does a logistical trucking transportation cost', 'That depends on which truck driver you contact as each truck driver charges their own individual rates'),
(9, 'As a customer do I pay Lox Lift for my transportation', 'No you only pay Lox Lift for full access to our driver contact information as each driver is their own individual boss and business and accepts their own individual form of payment for their services'),
(10, 'As a driver does Lox Lift pay me for my services', 'No Lox Lift only provides a platform for you to connect with customers but you are your own boss and business and you are responsible for setting your own hours your own rates and collecting your own payments from your customers'),
(11, 'What forms of payment do drivers accept', 'That is decided by each individual driver');

-- --------------------------------------------------------

--
-- Table structure for table `lox_feedback`
--

CREATE TABLE `lox_feedback` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lox_feedback`
--

INSERT INTO `lox_feedback` (`id`, `username`, `company`, `content`, `status`) VALUES
(7, 'Emmanuel Masiye', 'Business Attorney ', ' Lox Lift provides me with excellent services. My clients take advantage of both the taxi services as well as the logistical trucking. ', 'Active'),
(8, 'Cynthia Banda', 'Medical Nurse ', ' Very convenient service that allows me to easily travel around the city and the country by instantly connecting me with private drivers.', 'Active'),
(10, 'Mapira Itimu', 'Afrobeats Artist', 'Lox Lift allows me to earn an additional income on the side while I build my music career. ', 'Active'),
(11, 'Zikomo Lungu', 'Agricultural CEO', 'An excellent resource that has allowed our company to instantly connect with reliable semi-truck drivers  ', 'Active'),
(12, 'Ndachitanji Sam', 'Youtuber', 'Lox Lift is single-handedly transforming the face of transportation in Malawi. Every taxi driver and truck driver in the country should have a Lox Lift profile to reach more customers.', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `lox_news`
--

CREATE TABLE `lox_news` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_content` text NOT NULL,
  `news_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lox_payments`
--

CREATE TABLE `lox_payments` (
  `id` int(11) NOT NULL,
  `lox_user_id` varchar(255) NOT NULL,
  `lox_payment_date` varchar(255) NOT NULL,
  `lox_passanger_type` varchar(255) NOT NULL,
  `lox_payment_amount` varchar(255) NOT NULL,
  `lox_payment_status` varchar(255) NOT NULL,
  `lox_transaction_id` varchar(255) NOT NULL,
  `lox_payment_method` varchar(255) NOT NULL,
  `lox_access_time_expiry` int(11) NOT NULL,
  `access_time` varchar(255) NOT NULL,
  `lox_comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lox_payments`
--

INSERT INTO `lox_payments` (`id`, `lox_user_id`, `lox_payment_date`, `lox_passanger_type`, `lox_payment_amount`, `lox_payment_status`, `lox_transaction_id`, `lox_payment_method`, `lox_access_time_expiry`, `access_time`, `lox_comments`) VALUES
(1091, '32', '2021-08-19 10:46:58', '2', '100', '1', '8HI1GJLM6R', 'TNM', 0, '1', 'Process service request successfully.'),
(1153, '76', '2021-09-04 14:05:03', '2', '591', '0', 'fasdfas', 'TNM', 0, '6', 'Timeout occured while waiting response from the server'),
(1154, '76', '2021-09-04 14:10:50', '3', '2358', '1', 'A3C3D693-79D9-46FE-B226-40A934B5A334', 'DPO', 0, '24', 'Transaction Failed'),
(1155, '76', '2021-09-04 14:12:40', '2', '788', '1', 'CA61D105-F764-4775-A08D-AC225221182B', 'DPO', 0, '12', 'Transaction Failed'),
(1156, '76', '2021-09-04 16:02:42', '4', '394', '0', '487ADE27-7ED1-452A-9B31-D78150A44C9D', 'DPO', 0, '3', 'Transaction created'),
(1157, '76', '2021-09-10 09:04:01', '2', '788', '0', 'EB2B198F-7091-44F8-8992-093083080252', 'DPO', 0, '12', 'Transaction created'),
(1158, '76', '2021-09-10 09:16:59', '2', '788', '1', '7DEE812A-5220-417E-B70B-EE8D94314D91', 'DPO', 0, '12', 'Transaction Failed'),
(1159, '79', '2021-09-10 13:30:18', '2', '788', '0', '8FE6ACCC-356E-4F71-BABB-B26E2F2E1300', 'DPO', 0, '12', 'Transaction created'),
(1160, '79', '2021-09-10 13:33:43', '2', '788', '0', '0', 'TNM', 0, '12', 'Timeout occured while waiting response from the server'),
(1161, '137', '2021-09-10 13:38:32', '2', '788', '0', '26C25F44-F418-41E9-9A8E-31E3CEADEB8C', 'DPO', 0, '12', 'Transaction created'),
(1162, '79', '2021-09-10 13:42:22', '2', '788', '0', '6678BBD7-B4E9-4FD4-8CFA-4810C975333F', 'DPO', 0, '12', 'Transaction created');

-- --------------------------------------------------------

--
-- Table structure for table `lox_per_day_rate`
--

CREATE TABLE `lox_per_day_rate` (
  `id` int(11) NOT NULL,
  `lox_passanger_type` varchar(255) NOT NULL,
  `lox_passanger_logistic_rate` varchar(255) NOT NULL,
  `lox_passanger_logistic_time` varchar(255) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lox_per_day_rate`
--

INSERT INTO `lox_per_day_rate` (`id`, `lox_passanger_type`, `lox_passanger_logistic_rate`, `lox_passanger_logistic_time`, `date_updated`) VALUES
(35, '2', '788', '12', '2021-06-25 14:08:34'),
(36, '2', '591', '6', '2021-06-25 14:08:42'),
(37, '2', '394', '3', '2021-06-25 14:08:50'),
(38, '2', '197', '1', '2021-06-25 14:08:59'),
(39, '4', '788', '12', '2021-06-25 14:09:25'),
(40, '4', '591', '6', '2021-06-25 14:09:34'),
(41, '4', '394', '3', '2021-06-25 14:09:43'),
(42, '4', '197', '1', '2021-06-25 14:09:51'),
(43, '3', '2358', '24', '2021-06-25 14:10:13'),
(44, '6', '2358', '24', '2021-06-25 14:10:53'),
(45, '5', '788', '12', '2021-06-25 14:12:20'),
(46, '5', '591', '6', '2021-06-25 14:12:30'),
(47, '5', '394', '3', '2021-06-25 14:12:41'),
(48, '5', '197', '1', '2021-06-25 14:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `lox_vehicle_category`
--

CREATE TABLE `lox_vehicle_category` (
  `id` int(11) NOT NULL,
  `vehicle_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lox_vehicle_category`
--

INSERT INTO `lox_vehicle_category` (`id`, `vehicle_category`) VALUES
(16, 'Car'),
(19, 'SUV'),
(20, 'Van'),
(21, 'Bus'),
(22, 'Truck'),
(23, 'Motorcycle'),
(24, 'TukTuk'),
(25, 'Jeep');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `user_id`, `role_id`) VALUES
(22, 32, 2),
(24, 34, 2),
(25, 35, 2),
(26, 36, 2),
(27, 37, 2),
(28, 38, 3),
(29, 39, 3),
(30, 40, 3),
(31, 41, 2),
(32, 42, 2),
(33, 43, 2),
(34, 44, 2),
(35, 45, 2),
(36, 46, 2),
(37, 47, 2),
(38, 48, 2),
(39, 49, 3),
(40, 50, 3),
(41, 51, 4),
(42, 52, 4),
(43, 53, 4),
(44, 54, 4),
(45, 55, 4),
(46, 56, 5),
(47, 57, 5),
(48, 58, 5),
(49, 59, 5),
(50, 60, 5),
(51, 61, 5),
(52, 62, 5),
(53, 63, 6),
(54, 64, 6),
(55, 65, 6),
(56, 66, 6),
(57, 67, 6),
(58, 68, 6),
(59, 69, 6),
(60, 70, 6),
(61, 71, 5),
(62, 72, 5),
(63, 73, 5),
(64, 74, 5),
(65, 75, 4);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `instagram` text NOT NULL,
  `site_address` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `currency` varchar(250) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `email`, `facebook`, `twitter`, `instagram`, `site_address`, `phone_no`, `mobile_no`, `logo`, `favicon`, `currency`) VALUES
(1, 'Loxlift - A Hub of Private Passenger Drivers and Logistic Truckers', 'support@loxlift.com', 'http://facebook.com/lox.lift', 'http://twitter.com/liftlox', 'http://instagram.com/loxlift', 'Lilongwe, Malawi', '', '', '76056264logo1.png', '../uploads/99533loxfav.png.PNG', 'MK');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cityname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `income` varchar(255) NOT NULL,
  `lox_use` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `id_pn` varchar(255) NOT NULL,
  `driver_ln` varchar(255) NOT NULL,
  `vehcile_type` varchar(255) NOT NULL,
  `dept_date` varchar(255) NOT NULL,
  `dept_time` varchar(255) NOT NULL,
  `destination` text NOT NULL,
  `route_via` text NOT NULL,
  `stage` varchar(255) NOT NULL,
  `space_available` varchar(255) NOT NULL,
  `license_plate_no` varchar(255) NOT NULL,
  `load_desc` text NOT NULL,
  `pickup_date` varchar(255) NOT NULL,
  `pickup_time` varchar(255) NOT NULL,
  `deliver_date` varchar(255) NOT NULL,
  `delivery_time` varchar(255) NOT NULL,
  `delivery_desitnation` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL,
  `date_updated` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `name`, `mobile`, `email`, `cityname`, `address`, `age`, `gender`, `profession`, `income`, `lox_use`, `picture`, `id_pn`, `driver_ln`, `vehcile_type`, `dept_date`, `dept_time`, `destination`, `route_via`, `stage`, `space_available`, `license_plate_no`, `load_desc`, `pickup_date`, `pickup_time`, `deliver_date`, `delivery_time`, `delivery_desitnation`, `status`, `ip_address`, `date_created`, `date_updated`) VALUES
(32, 2, 'edcarter724', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Edward Carter', '031468504611', 'edcarter724@gmail.com', 'Blantyre - Bangwe', '4952 Elk Creek Road Douglasville, GA 30134', '26', 'male', 'Businessman', '2000000', 'business', '3272914876057_10101468848128445_1864273343_o-2-615x410-1200x675.jpg', '3120245896659', 'B-965865', 'Car', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '182.180.158.116', 'Thursday 1st of July 2021 04:08:31 PM', '2021-07-14 09:44:02'),
(34, 2, 'alswin80', '62ef4c8cc6743567b87ca2cb8df4b77c', 'Alas Win', '236525635266', 'alswin80@gmail.com', 'Blantyre - Lunzu', '', '35', 'male', '', '', '', '16069download.jpg', '9635685654', 'ML-9658562', 'SUV', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '182.180.158.116', 'Thursday 1st of July 2021 07:47:12 PM', '2021-07-14 09:44:18'),
(35, 2, 'pintomarta12', '86a0657e675b0235905fc568f03c4d70', 'Pinto Marta', '236526352622', 'pintomarta12@gmail.com', 'Blantyre - Kanjedza', '', '36', 'male', '', '', '', '77780534.jpg_wh860.jpg', '52354234523', 'ML-9523445', 'Van', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '182.180.158.116', 'Thursday 1st of July 2021 07:48:23 PM', '2021-07-14 09:44:23'),
(36, 2, 'alex1920', 'bf26f7573bef3be6ef43dc4ca0bdb8a3', 'Alex Well', '269584563566', 'alex1920@gmail.com', 'Blantyre - Machinjir', '', '40', 'male', '', '', '', '74248JP-DRESS1-jumbo.jpg', '85695652365', 'ML-5695866', 'Bus', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '182.180.158.116', 'Thursday 1st of July 2021 07:49:29 PM', '2021-07-14 09:44:28'),
(37, 2, 'lutherking', 'a1a2c0811eb812a5038506284e67e267', 'Luther King', '265985645899', 'lutherking@gmail.com', 'Lilongwe - Area One', '', '52', 'male', '', '', '', '12899images.jpg', '9635685654', 'ML-9658562', 'Truck', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '182.180.158.116', 'Thursday 1st of July 2021 07:50:40 PM', '2021-07-14 09:44:32'),
(38, 3, 'micheal29', '778c7db5c03a6a3f04aa1adca123c870', 'Micheal Hyden', '562356235622', 'micheal29@gmail.com', 'Blantyre - Kanjedza', '', '29', 'male', '', '', '', '93203Freightliner_M2_106_6x4_2014_(14240376744).jpg', '3120245389953', '3120245389953', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '182.180.158.116', 'Thursday 1st of July 2021 07:53:11 PM', '2021-07-14 09:44:42'),
(39, 3, 'joseph29', '086e5ca5f2835db4294826c6444ffb7e', 'Josheph Peter', '325623562356', 'joseph29@gmail.com', 'Lilongwe-Area Four', '', '52', 'male', '', '', '', '17080truck-on-the-road.jpg', '9635685654', '3120245389953', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '182.180.158.116', 'Thursday 1st of July 2021 07:54:18 PM', '2021-07-14 09:44:47'),
(40, 3, 'adam1839', '14959ade7ae0b32706712b51570b3aec', 'Adam Gilchrist', '236526589655', 'adam1839@gmail.com', 'Blantyre - Chiwembe', '', '50', 'male', '', '', '', '21516selection-033-500x500.png', '85695652365', 'ML-9658562', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '182.180.158.116', 'Thursday 1st of July 2021 07:55:26 PM', '2021-07-14 09:44:51'),
(41, 2, 'ricky189', '35fa341066e36a7a0233491e626034b7', 'Ricky Pointing', '236598656566', 'rickypointing@gmail.com', 'Chikwawa - Chawuwa', '', '46', 'male', '', '', '', '1627657914.jpg', '9635685654', 'ML-9523445', 'Car', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '182.180.158.116', 'Thursday 1st of July 2021 08:22:52 PM', '2021-07-14 09:45:04'),
(42, 2, 'mathew190', '396f5b1c9bbad95e182eb1aadd5d9474', 'Mathew Hyden', '236526598656', 'mathew190@test.com', 'Blantyre - Bangwe', '', '36', 'male', '', '', '', '714025.jpg', '9635685654', 'ML-9658562', 'SUV', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '182.180.158.116', 'Thursday 1st of July 2021 08:26:11 PM', '2021-07-14 09:45:09'),
(43, 2, 'clark133', '81a6f0c61d0ad657a1a6b0d7b7d9c6c1', 'Clark Mintol', '236598656233', 'clark133@test.com', 'Balaka - Nsamala', '', '65', 'male', '', '', '', '744964.jpg', '9635685654', 'ML-9523445', 'Van', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '182.180.158.116', 'Thursday 1st of July 2021 08:27:16 PM', '2021-07-14 09:45:13'),
(44, 2, 'victor3849', '30eb8c029ba010dba67db1191517ce0c', 'Victor Mallied', '326598652633', 'victordesuza@test.com', 'Balaka - Kalembo', '', '56', 'male', '', '', '', '241563.jpg', '9635685654', 'ML-9658562', 'Car', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '182.180.158.116', 'Thursday 1st of July 2021 08:28:56 PM', '2021-07-14 09:45:17'),
(45, 2, 'milton129', '5867e9c96eb14bd87afb09df02680af5', 'Milton Mario', '256365632566', 'milton129@test.com', 'Balaka - Amidu', '', '25', 'male', '', '', '', '4170suv.jpg', '3120245389953', 'ML-9658562', 'SUV', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '182.180.158.116', 'Thursday 1st of July 2021 08:31:38 PM', '2021-07-14 09:45:22'),
(46, 2, 'jeff18839', 'ec7b7ebaa319b60f2bb32f9ff0939437', 'Jeff Bezos', '325621526355', 'jeff18839@test.com', 'Blantyre - Chileka', '', '65', 'male', '', '', '', '88343van.jpg', '9635685654', 'ML-9658562', 'Van', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '182.180.158.116', 'Thursday 1st of July 2021 08:33:54 PM', '2021-07-14 09:45:26'),
(47, 2, 'molhan139', '4ffbe176b791375bcd525c0ec8cf2e15', 'Mac Mohlan', '235625653011', 'macmohlan@test.com', 'Balaka - Kalembo', '', '23', 'male', '', '', '', '72971bus.jpg', '85695652365', 'ML-5695866', 'Bus', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '182.180.158.116', 'Thursday 1st of July 2021 08:36:51 PM', '2021-07-14 09:45:31'),
(48, 2, 'sangakara1839', 'e6c2ae1004f7034b54a0d879fa8db346', 'Sangakar Salouwn', '321452635263', 'sangakara1839@test.com', 'Balaka - Nkaya', '', '34', 'male', '', '', '', '63026truck-driver2.jpg', '3120245389953', 'ML-9658562', 'Truck', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '182.180.158.116', 'Thursday 1st of July 2021 08:39:14 PM', '2021-07-14 09:45:36'),
(49, 3, 'joe289999', '803c54899f731b365ce3973bc001d626', 'Joe Bidden', '325635652361', 'joebiden@test.com', 'Blantyre - Limbe', '', '95', 'male', '', '', '', '599871.jpg', '3120245389953', '3120245389953', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '182.180.158.116', 'Thursday 1st of July 2021 08:42:59 PM', '2021-07-14 09:46:04'),
(50, 3, 'mike199399', 'de8defb7baaa5468505cac01ab268e52', 'Mike Pompeo', '325635652366', 'mike199399@test.com', 'Balaka - Nkaya', '', '23', 'male', '', '', '', '931333.jpg', '3120245389953', '3120245389953', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '182.180.158.116', 'Thursday 1st of July 2021 08:43:45 PM', '2021-07-14 09:46:08'),
(51, 4, 'ellan1939', '4c6d89b339582cbf8416d5c025d69dcc', 'Ellan Methew', '325636253266', 'ellan1939@test.com', 'Blantyre - Limbe', '', '56', 'male', '', '', '', '51571360_F_293569947_B267NONeQDGU48cCumOrcIY3gc4ozsv1.jpg', '3120245389953', '3120245389953', 'Car', '2021-07-01', '06:47', 'P.O. Box 296 Lilongwe', 'Lilongwe', '3', '5', 'M-6356298', '', '', '', '', '', '', 1, '182.180.158.116', 'Thursday 1st of July 2021 08:47:49 PM', '2021-07-14 09:46:17'),
(52, 4, 'murli19939', '81f5fe67e2ae486585bd9c4fa8b0256b', 'Murli Dharna', '235146589522', 'murli19939@test.com', 'Balaka - Nsamala', '', '63', 'male', '', '', '', '35002Uber-Driver-in-New-York-e1600713885951.jpg', '3120245389953', 'ML-9658562', 'SUV', '2021-07-01', '09:52', 'P.O. Box 2922 Lilongwe', 'Mosiquea', '3', '6', 'J-65656565', '', '', '', '', '', '', 1, '182.180.158.116', 'Thursday 1st of July 2021 08:49:36 PM', '2021-07-14 09:46:22'),
(53, 4, 'waseem3939', '14a0daf201ef9455e1a9e1057c67ec0a', 'Waseem badami', '258965452566', 'waseem3939@test.com', 'Balaka - Kalembo', '', '20', 'male', '', '', '', '68415file-20190618-118522-jcpmyv.jpg', '9635685654', 'ML-9658562', 'Car', '2021-07-01', '06:51', 'P.O. Box 296 Lilongwe', 'Lilongwe', '3', '5', 'M-6356298', '', '', '', '', '', '', 1, '182.180.158.116', 'Thursday 1st of July 2021 08:50:54 PM', '2021-07-14 09:46:27'),
(54, 4, 'usainbolt', '3d5d37ba35b2a16c80a481f66b2475b7', 'Usain Bolt', '256352563256', 'usainbolt@test.com', 'Blantyre - Kameza', '', '56', 'male', '', '', '', '22785512413.jpg', '3120245389953', '3120245389953', 'Van', '2021-07-09', '07:55', 'P.O. Box 2922 Lilongwe', 'Lilongwe', '3', '5', 'M-6356298', '', '', '', '', '', '', 1, '182.180.158.116', 'Thursday 1st of July 2021 08:53:22 PM', '2021-07-14 09:46:31'),
(55, 4, 'fukray9393', 'f68a2bed93aedf9e2bf4d57d96b44a33', 'Fukra Mehwar', '236325326533', 'fukray9393@test.com', 'Balaka - Chanthunya', '', '63', 'male', '', '', '', '79428ride_share_rape_01.jpeg', '85695652365', 'ML-9658562', 'Car', '2021-07-15', '09:58', 'P.O. Box 296 Lilongwe', 'Mosiquea', '3', '5', 'M-6356298', '', '', '', '', '', '', 1, '182.180.158.116', 'Thursday 1st of July 2021 08:54:36 PM', '2021-07-14 09:46:36'),
(56, 5, 'micheal123239', '13f97e5e3cf7875eec8946e8c98caa1a', 'Micheal Van Dee Poop', '253263526325', 'micheal293@gmail.com', 'Chikwawa - Chafudzik', '', '29', 'male', '', '', '', '395751.jpg', '9635685654', '', '', '2021-07-09', '06:00', 'P.O. Box 296 Lilongwe', '', '', '', '', '', '', '', '', '', '', 1, '182.180.158.116', 'Thursday 1st of July 2021 09:00:02 PM', '2021-07-14 09:46:41'),
(57, 5, 'gooday2929', '185ab122ba25fe9952bf79df97eb7a6b', 'Good Day', '235263526533', 'gooday2929@test.com', 'Blantyre - Chiwembe', '', '32', 'male', '', '', '', '486522.jpg', '9635685654', '', '', '2021-07-06', '07:02', 'P.O. Box 296 Lilongwe', '', '', '', '', '', '', '', '', '', '', 1, '182.180.158.116', 'Thursday 1st of July 2021 09:01:05 PM', '2021-07-14 09:47:48'),
(58, 5, 'muharoo292', '9959bbc7339680b9ab5f95dedeaebe09', 'Muharoo Sunday', '325623562355', 'muharoo292@test.com', 'Chikwawa - Alufasi', '', '53', 'male', '', '', '', '344063.jpg', '85695652365', '', '', '2021-07-04', '08:03', 'P.O. Box 296 Lilongwe', '', '', '', '', '', '', '', '', '', '', 1, '182.180.158.116', 'Thursday 1st of July 2021 09:01:59 PM', '2021-07-14 09:47:52'),
(59, 5, 'kaminie9393', 'aae5c2e01a8d142ac7239cd7b9777b53', 'Kamini Jahaia', '235265321522', 'kaminie9393@test.com', 'Blantyre - Chiwembe', '', '32', 'male', '', '', '', '408576.jpg', '9635685654', '', '', '2021-07-02', '11:07', 'P.O. Box 296 Lilongwe', '', '', '', '', '', '', '', '', '', '', 1, '182.180.158.116', 'Thursday 1st of July 2021 09:02:52 PM', '2021-07-14 09:47:56'),
(60, 5, 'ritikh299', '274bb39bf67a1869fde7a36a413c5c7b', 'Rithik Rakaish', '235215265366', 'ritikh299@test.com', 'Blantyre - Chileka', '', '32', 'male', '', '', '', '2577911.jpg', '52354234523', '', '', '2021-07-02', '08:05', 'P.O. Box 296 Lilongwe', '', '', '', '', '', '', '', '', '', '', 1, '182.180.158.116', 'Thursday 1st of July 2021 09:04:02 PM', '2021-07-14 09:48:02'),
(61, 5, 'miceky2829', 'fe5102ad62036b5e469c85da680f7561', 'Miceky Mouser', '235265325623', 'miceky2829@test.com', 'Blantyre - Chichiri', '', '32', 'male', '', '', '', '123418.jpg', '3120245389953', '', '', '2021-07-03', '07:06', 'P.O. Box 2922 Lilongwe', '', '', '', '', '', '', '', '', '', '', 1, '182.180.158.116', 'Thursday 1st of July 2021 09:05:55 PM', '2021-07-14 09:48:06'),
(62, 5, 'rotten1929', 'e9896f5e3bdb2c6d421ffd5aaaec7e85', 'Rotten Tommatto', '252635263522', 'rotten1929@test.com', 'Blantyre - Chileka', '', '53', 'male', '', '', '', '28399.jpg', '9635685654', '', '', '2021-07-09', '00:12', 'P.O. Box 296 Lilongwe', '', '', '', '', '', '', '', '', '', '', 1, '182.180.158.116', 'Thursday 1st of July 2021 09:07:04 PM', '2021-07-14 09:48:10'),
(63, 6, 'mitho293993', 'd9f392fae2212efc28dd6da037fdcce1', 'Mitho Janni', '235265325622', 'mitho293993@test.com', 'Blantyre - Chichiri', '', '25', 'male', '', '', '', '50813.jpg', '3120245389953', '', '', '', '', '', '', '', '', '', 'yasirjee12356aa yasirjee12356aa yasirjee12356aa yasirjee12356aa', '2021-07-02', '08:11', '2021-07-06', '10:12', 'Lingouoa', 1, '182.180.158.116', 'Thursday 1st of July 2021 09:09:54 PM', '2021-07-14 09:48:25'),
(64, 6, 'healthy3930', '68d4171c800fb998854d0536ab65843b', 'Healthy Master', '253263256233', 'healthy3930@test.com', 'Blantyre - Chigumula', '', '26', 'male', '', '', '', '340448.jpg', '85695652365', '', '', '', '', '', '', '', '', '', 'yasirjee12356aa yasirjee12356aa yasirjee12356aa yasirjee12356aa', '2021-07-01', '09:14', '2021-07-20', '11:16', 'Lingouoa', 1, '182.180.158.116', 'Thursday 1st of July 2021 09:12:02 PM', '2021-07-14 09:48:29'),
(65, 6, 'hingao12931', '78f4a90fff367de8bc32af377b417087', 'Hingao Chain', '032563252366', 'hingao12931@test.com', 'Balaka - Sawali', '', '56', 'male', '', '', '', '996386.jpg', '3120245389953', '', '', '', '', '', '', '', '', '', 'yasirjee12356aa yasirjee12356aa yasirjee12356aa yasirjee12356aa', '2021-07-09', '06:13', '2021-07-21', '11:17', 'Lingouoa', 1, '182.180.158.116', 'Thursday 1st of July 2021 09:13:03 PM', '2021-07-14 09:48:34'),
(66, 6, 'markdavid01', '93f572276ac89fbb7a258ef51ba8f0cd', 'Mark David', '352147891472', 'markdavid@gmail.com', 'Blantyre - Bangwe', '', '18', 'male', '', '', '', '303471.jpg', '5432231455521', '', '', '', '', '', '', '', '', '', '60kg', '2021-07-07', '17:30', '2021-07-07', '19:30', 'Hospital', 1, '39.53.191.8', '', '2021-07-14 09:48:39'),
(67, 6, 'jackoliver02', '3a808e4827be1a202b86b42440e917a5', 'Jack Oliver', '032659874125', 'jackoliver@gmail.com', 'Blantyre - Kabula', '', '28', 'male', '', '', '', '871152.jpg', '5543223155412', '', '', '', '', '', '', '', '', '', '80kg', '2021-07-07', '08:00', '2021-07-08', '15:00', 'Office', 1, '39.53.191.8', '', '2021-07-14 09:48:43'),
(68, 6, 'jerrydane', '3d791902c7a2076452758cd694f0e7a5', 'Jerry Dane', '452178963254', 'jerrydane@gmail.com', 'Chikwawa - Alufasi', '', '42', 'male', '', '', '', '239153.jpg', '7543223145554', '', '', '', '', '', '', '', '', '', '55kg`', '2021-07-20', '16:00', '2021-07-20', '20:00', 'University Road', 1, '39.53.191.8', '', '2021-07-14 09:48:47'),
(69, 6, 'sirazoe4', '240f407dd2006cff68d654ea49280094', 'Sira Zoe', '256478941325', 'sirazoe@gmail.com', 'Chikwawa - Cinyanga', '', '31', 'male', '', '', '', '585164.jpg', '4578123695874', '', '', '', '', '', '', '', '', '', '70kg', '2021-07-10', '16:50', '2021-07-11', '22:00', 'Club', 1, '39.53.191.8', '', '2021-07-14 09:48:52'),
(70, 6, 'khanemad97', 'f707644a09fd21696cc1d04b06d5120c', 'Emad Khan', '030652077101', 'khanemad97@gmail.com', 'Mchinji - Tsumba', '', '19', 'male', '', '', '', '1135079428ride_share_rape_01.jpeg', '31202587426584', '', '', '', '', '', '', '', '', '', '80kg', '2021-07-02', '17:00', '2021-07-02', '18:00', 'NIST Academy', 1, '39.53.191.8', '', '2021-07-25 15:50:52'),
(71, 5, 'johnmichael1', '111fe0e37d0fe9610e855d34530bbc79', 'Michael John', '021548763298', 'johnmichael@gmail.com', 'Blantyre - Chileka', '', '18', 'male', '', '', '', '706001.jpg', '2144512789663', '', '', '2021-07-03', '09:10', 'Honda car Showroom', '', '', '', '', '', '', '', '', '', '', 1, '39.53.191.8', '', '2021-07-14 09:49:06'),
(72, 5, 'danydaniels2', '01f71218a9c6c82c877b8abed606f13d', 'Dany Daniels', '124578963254', 'danydaniels@gmail.com', 'Chikwawa - Kampani', '', '22', 'male', '', '', '', '684862.jpg', '754322314555454', '', '', '2021-07-21', '08:00', 'National Library', '', '', '', '', '', '', '', '', '', '', 1, '39.53.191.8', '', '2021-07-14 09:49:10'),
(73, 5, 'emadkhan', 'f4bae723bb41edba754f0e3a40076074', 'Emad Khan', '030652077104', 'kb03065207710@gmaill.com', 'Blantyre - Lunzu', '', '21', 'male', '', '', '', '76515.jpg', '554322315541244', '', '', '2021-07-02', '18:21', 'Main bus stop', '', '', '', '', '', '', '', '', '', '', 1, '39.53.191.8', '', '2021-07-14 09:49:14'),
(74, 5, 'mithal123', '74b3e2ae35b10d23ad3223d09c8a7034', 'Mithal Chakarbati', '031468504611', 'mithalchakarbati@test.com', 'Balaka - Nsamala', '', '45', 'male', '', '', '', '4368592257autonomous-vehicles-image-copy.jpg', '32562532652', '', '', '2021-07-02', '19:31', 'One unit chowk bahawalpur', '', '', '', '', '', '', '', '', '', '', 1, '182.180.158.116', '', '2021-07-14 09:49:18'),
(75, 4, 'emadmahmood', 'eb341820cd3a3485461a61b1e97d31b1', 'Emad Mahmood', '452136987456', 'emadmahmood030@gmail.com', 'Balaka - Chanthunya', '', '19', 'male', '', '', '', '652789298528399.jpg', '554322315555', 'BKE446666', 'Car', '2021-07-03', '18:30', 'National Library', 'Ring Road', '3', '2', 'BKE446666', '', '', '', '', '', '', 1, '39.53.191.8', 'date_created', '2021-07-25 15:31:59'),
(76, 3, 'yasirjeethegreat', 'c886c2f0b21d8ad630af393ef3e49f64', 'Yasir Majeed', '031468504611', 'yasirjeethegreat@gmail.com', 'Balaka - Kalembo', '', '23', 'male', '', '', '', '9871772971bus.jpg', '3120245389953', '3120245389953', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '182.180.158.116', 'Friday 16th of July 2021 05:44:46 AM', '2021-07-16 05:44:46'),
(77, 2, 'andyg', '64691452c2692d215e49aad4faaa03bf', 'Andrew Alipo', '265887273318', 'andygwaza@gmail.com', 'Lilongwe-Area Twelve', '', '30', 'male', '', '', '', '45815andrewg@dpogroup.com.png', '12334advn', 'hgfghdgd', 'Car', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '137.115.0.8', 'Monday 19th of July 2021 04:00:31 AM', '2021-07-19 04:00:31'),
(79, 1, 'coachcarter724', 'bf557ee32e6f2c41e589295cf0651e4b', 'Lox Lift ', '786920500400', 'coachcarter724@gmail.com', 'Balaka - Kachenga', '222 hshhj ss', '18', 'male', 'Entrepreneur ', '$100,000', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '24.13.241.100', 'Wednesday 21st of July 2021 04:28:34 PM', '2021-07-21 16:29:26'),
(80, 3, 'clement9719', 'b8168b0c7d80fc4d6cbb233ec8d7bbc7', 'Clement Kampango', '265993120080', 'clement29kampango@gmail.com', 'L- Area Forty Nine', '', '29', 'male', '', '', '', '1627658559.jpg', 'VBTYSEWF', '1400078944', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '137.115.0.33', 'Thursday 22nd of July 2021 04:35:22 PM', '2021-07-22 16:35:22'),
(81, 2, 'martin', '430b7cef2f0d143b52fa9e0fad7e7433', 'Martin Magalasi ', '265999931870', 'mmagalasi@gmail.com', 'Lilongwe-Area Three', '', '35', 'male', '', '', '', '1627658324.jpg', 'MA19765', 'Dl20160902069470', 'Car', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '129.140.0.19', 'Thursday 22nd of July 2021 04:42:25 PM', '2021-07-22 16:42:25'),
(82, 2, 'viktarata', 'cae5c76b2e1f2e17e07ce305f8c18d76', 'Victor Vivian Gondwe', '265999289990', 'gondwevictor@gmail.com', 'Dedza - Central', '', '38', 'male', '', '', '', '1627657966.jpg', 'MA 410449', '10161214052675', 'SUV', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '102.70.3.250', 'Friday 23rd of July 2021 01:50:10 AM', '2021-07-23 01:50:10'),
(83, 3, 'yasir19911', '34003c6a898644b16552c7711de2b8d1', 'M Yasir Majeed', '031268684561', 'yasirjeeeethegreat@gmail.com', 'Balaka - Nsamala', '', '24', 'male', '', '', '', '1627658544.jpg', '63939393939', '48494959505', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '111.119.187.19', 'Saturday 24th of July 2021 03:50:32 AM', '2021-07-24 03:50:32'),
(84, 1, 'unique', 'ac700a6ab404e618ac4c250bf1cc6aca', 'Ansity C Gondwe', '265999475506', 'chipwailaancity@gmail.com', 'L- Area Thirty Six', 'Box 2601, LL ', '34', 'female', 'Business ', '10 million ', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '137.64.0.17', 'Saturday 24th of July 2021 08:01:13 AM', '2021-07-24 08:01:13'),
(85, 1, 'vitumbiko', 'f71b22c7adc1e5dcc3bf90d21c050242', 'Vitumbiko Mkandawire', '265998754534', 'vitumbikomkandawire@hotmail.com', 'L- Area Twenty One', 'Tikwere House', '28', 'male', 'Water services manager', '4,000,000', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '129.140.0.40', 'Saturday 24th of July 2021 03:38:23 PM', '2021-07-24 15:38:23'),
(86, 3, 'dyesaya', 'db11bd1b44a7e3299e79b51bdad80990', 'Davie Yesaya', '265999365258', 'yesaya375@gmail.com', 'Mzimba-Mzuzu City', '', '46', 'male', '', '', '', '1627658525.jpg', 'MB101055', '10170114020122', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '129.140.0.8', 'Sunday 25th of July 2021 02:07:46 AM', '2021-07-25 02:07:46'),
(87, 3, 'bensonmhone', '65a510a513d62bd55d86aa8463b5ea2c', 'Benson Mhone ', '265996684445', 'bensonmhone@gmail.com', 'Lilongwe-A-Eighteen ', '', '28', 'male', '', '', '', '5485IMG_20200821_132718.jpg', 'TSV9B32T', '1017061404908', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '137.64.0.13', 'Sunday 25th of July 2021 04:12:37 AM', '2021-07-25 04:12:37'),
(88, 2, 'martin7303', 'f2a937164914ca3890e56a1d0ed0c4cf', 'Martin Kuphiri', '265884673145', 'mmkuphiri1@gmail.com', 'L- Area Forty Nine', '', '24', 'male', '', '', '', '1627657979.jpg', 'NRB WHQ65JH2', '20101100421104', 'Car', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '137.196.0.1', 'Sunday 25th of July 2021 04:17:49 AM', '2021-07-25 04:17:49'),
(89, 3, 'ngwazi14bil', 'e0e711887e1961247a28687aa32832c5', 'Robert Khulunga', '265994757990', 'robertkhulunga@gmail.com', 'L- Area Thirty Six', '', '27', 'male', '', '', '', '39906IMG_20210717_143405.jpg', 'VBXGH3TQ', '10190114003330', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '137.196.0.24', 'Sunday 25th of July 2021 09:11:33 AM', '2021-07-25 09:16:37'),
(90, 6, 'paksarzameen', '08178bc1888270cd3b82e558618280bd', 'Pak SarZameen party', '031468504611', 'paksarzameen@gmail.com', 'Blantyre - Likhubula ', '', '18', 'male', '', '', '', '52223241563.jpg', '9635685654', '', '', '', '', '', '', '', '', '', 'yasirjee12356aa yasirjee12356aa yasirjee12356aa yasirjee12356aa', '2021-07-27', '14:05', '2021-07-07', '18:09', 'yasirjee12356aa v v yasirjee1332356aa v yasirjee12356aa', 1, '182.180.158.116', 'Sunday 25th of July 2021 03:03:51 PM', '2021-07-25 15:53:22'),
(91, 2, 'nkhawa', 'de75d85c8f751f804b352eff5a166402', 'Kennedy Nkhawais Kamunga', '265995432404', 'nkhawakamunga@gmail.com', 'L- Area Forty Nine', '', '25', 'male', '', '', '', '1627289627.jpg', 'VNSCGMS9', 'mw137489', 'Car', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '102.70.49.8', 'Monday 26th of July 2021 10:53:46 AM', '2021-07-26 04:53:46'),
(92, 6, 'mind23940', 'a9a9c8ce8944e83194a06801bec4727b', 'Mindle John', '236235652355', 'mind23940@test.com', 'Blantyre - Limbe Central ', '', '18', 'male', '', '', '', '1627301337.jpg', '3120245389953', '', '', '2021-07-26', '06:08', 'P.O. Box 296 Lilongwe', 'Lilongwe', '3', '5', 'M-6356298', 'yasirjee12356aa yasirjee12356aa yasirjee12356aa yasirjee12356aa', '2021-07-26', '06:00', '2021-07-26', '10:04', 'yasirjee12356aa v v yasirjee1332356aa v yasirjee12356aa', 1, '182.180.158.116', '2021-07-26 14:08:57', '2021-07-26 14:59:15'),
(93, 2, 'takondwa', '733b441fae81dd86fdbf292b3a862dc9', 'Takondwa Masuweta ', '265888506619', 'tmasuweta@outlook.com', 'L- Area Forty Seven', '', '38', 'male', '', '', '', '1627310939.jpg', 'R56QK3MW', '10200814002981', 'Car', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '102.70.21.64', '2021-07-26 16:48:59', '2021-07-26 16:48:59'),
(94, 1, 'mwayi', '56aee5bed77f18dae17b0efcdf94c4b1', 'Mwayi Moyo ', '265999344337', 'mwayimuwalo@gmail.com', 'L- Area Forty Nine', '49/1/1381', '35', 'male', 'Business ', '1000000+', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '137.196.0.35', '2021-07-26 23:01:59', '2021-07-26 23:01:59'),
(95, 2, 'michael116', '5cc1f18e659c20e70a8b09cc57ca5107', 'Michael chanza', '265991694303', 'michaelchanza78@gmail.com', 'Blantyre - Nancholi', '', '26', 'male', '', '', '', '1627657992.jpg', 'VNKQB5HE', '10200614034202', 'Car', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '102.70.3.41', '2021-07-27 13:06:43', '2021-07-27 13:06:43'),
(96, 1, 'hastings265', '078f9f0b99eb80f2bdd7d5bf455f5449', 'Hastings Munkhondya ', '265882401687', 'hastingsmunkhondya@gmail.com', 'Blantyre - Limbe Central ', 'Hastingsmunkhondya@gmail.com ', '27', 'male', 'ICT Technician ', '1,920,000 ', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '105.234.162.16', '2021-07-27 13:27:20', '2021-07-27 13:27:20'),
(97, 2, 'affordable', '0283c010ccdb86a89a508301ab3331aa', 'Precious Kasakatizah', '265887494815', 'chiwangulindamatias@gmail.com', 'Blantyre - Blantyre Central ', '', '27', 'male', '', '', '', '1627657997.jpg', 'SATA 20NO92', '20218928001737', 'SUV', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '102.70.59.73', '2021-07-27 18:52:51', '2021-07-27 18:52:51'),
(98, 1, 'llmomba', '5514c13c74aef55c64ef1872a4b48df2', 'Lloyd Momba', '265999894443', 'llmomba@gmail.com', 'Blantyre - Blantyre Central ', 'Chileka ', '43', 'male', 'Engineer', 'MK3 m', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '105.234.166.27', '2021-07-27 20:01:58', '2021-07-27 20:01:58'),
(99, 2, 'yolly265', 'b6d755e89cb328c31214d3882e4b17b2', 'Yollam Chilenje', '265888357126', 'yollamchilenje@outlook.com', 'L- Area Forty Nine', '', '29', 'male', '', '', '', '1627412643.jpg', 'Tsrqafjr', '199210263104734', 'Car', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '102.70.65.72', '2021-07-27 21:04:03', '2021-07-27 21:04:03'),
(100, 1, 'emmanuel', '97cddf5d1ae554f2a8c45776bafec194', 'Emmanuel Perete', '265884993903', 'emmanuelperetetrancio@gmail.com', 'Lilongwe-Area Three', 'Kansai Plascon P.O Box 1744 lilongwe', '23', 'male', 'Diplomate Accountant', '1500000', 'leisure', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '196.216.13.127', '2021-07-28 09:15:50', '2021-07-28 09:15:50'),
(101, 1, 'jkankondo', '833f917839d372edcd9bef1d8cada47b', 'John Kankondo', '265999750830', 'kankondojohn@gmail.com', 'L- Area Forty Nine', 'Box 1152', '36', 'male', 'IT ', 'MK2,000,000.00', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '196.216.13.238', '2021-07-28 12:43:14', '2021-07-28 12:43:14'),
(102, 2, 'larmar1959', 'fec3c4e4584e5c8917e3369c72856a2f', 'Monique Deborah Chisamba', '265999369433', 'moniquemachilinga@gmail.com', 'Blantyre - Soche West ', '', '57', 'female', '', '', '', '1627658010.jpg', 'JN2NYP8C', '10190204027865', 'Car', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '105.234.160.5', '2021-07-28 15:54:00', '2021-07-28 15:54:00'),
(103, 1, 'spartan', 'b75fcd070f56c17ea58fa1fb90d46f5f', 'Mathews Daniel Kapito', '265997588696', 'kapito.daniel@yahoo.com', 'Lilongwe-Area Three', 'Box 80137', '36', 'male', 'Transporter ', 'K1', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '137.115.0.1', '2021-07-28 16:13:20', '2021-07-28 16:13:20'),
(104, 1, 'kingkunta83', '2a4bafa6a85a6ea26d68d17b22173095', 'Escort Chinula', '265999578938', 'escortchinula@gmail.com', 'Blantyre - Blantyre Central ', 'Box 31779, Chichiri Blantyre 3 ', '37', 'male', 'Accountant', 'K10,000,000', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '102.70.3.87', '2021-07-29 13:36:51', '2021-07-29 13:36:51'),
(105, 1, 'vitso', '82fa0f8b5e2d4f4d248863b5e39e201f', 'Virginia Gwaza', '265883453368', 'virginiagwaza@gmail.com', 'Blantyre - South Lunzu', 'Blantyre chileka', '29', 'male', 'Transporter', '10,000,000', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '137.115.0.22', '2021-07-29 15:27:23', '2021-07-29 15:27:23'),
(106, 2, '0886223175', 'b412c555ae5134fd5acfdad453390e89', 'Helbert Kagona ', '265999073736', 'kagonahelbert10@gmail.com', 'Blantyre - Chilomoni ', 'Chilomoni Nthukwa ', '32', 'male', 'Business man ', '2000000', 'business', '1627658023.jpg', 'MA803105', '10210314016345', 'Car', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '102.70.3.236', '2021-07-29 21:06:53', '2021-07-29 22:56:57'),
(107, 3, 'faster1', 'd537a5d991c88091fc1a34ca43af043b', 'Faster 1', '265991071964', 'donaldwilfred48@gmail.com', 'Lilongwe - Area Six', '', '24', 'male', '', '', '', '1627590550.jpg', 'National I.d ', '20160404024352', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '137.115.0.9', '2021-07-29 22:29:09', '2021-07-29 22:29:09'),
(108, 3, 'fnsona', '28a0a331af6c36146ff23b22e8dfad90', 'Felix Nsona', '265999551722', 'fnsona@outlook.com', 'Blantyre - Ndirande South ', '', '39', 'male', '', '', '', '1627658508.jpg', 'QVWH4TAB', '10170614041492', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '105.234.162.8', '2021-07-30 05:18:04', '2021-07-30 05:18:04'),
(109, 3, 'soriano265', '662ff27c4f17cd719c0a91be1d0e3229', 'Raymond Mayamiko Phiri', '265888166627', 'raymondphiri24@yahoo.com', 'L- Area Fifty One', 'Private bag 339', '30', 'male', 'Farmer/Driver', '6000000', 'business', '1627622370.jpg', 'MA969974', '10180414007220', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '129.140.0.14', '2021-07-30 06:39:35', '2021-07-30 06:51:42'),
(111, 2, 'charisma', 'f1bfed1c90e3961ed1c25e575c89c6fa', 'Wiza Matemba', '265888488803', 'wizamatembacharisma@gmail.com', 'Blantyre- Blantyre East', '', '34', 'female', '', '', '', '1627893935.jpg', 'S1Z4D74N', '10200914013643', 'Car', '2021-08-09', '06:00', 'Any', 'Any', 'Any', '4', 'BT2914', '', '', '', '', '', '', 1, '102.70.3.233', '2021-07-31 21:50:15', '2021-07-31 22:45:14'),
(112, 2, 'intex', '7f8737d386acd77b97dc87d3f9811c66', 'Frank kankhande', '265999673575', 'intexconstruction20@gmail.com', 'Mzimba-Mzuzu City', '', '30', 'male', '', '', '', '1627815029.jpg', 'TSFQAKJG', '10210214038536', 'TukTuk', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '82.145.223.152', '2021-08-01 12:50:29', '2021-08-01 12:50:29'),
(113, 2, 'ineka', 'fadfa6de6213aa5fd634613dc28232a8', 'Ibrahim Nedson Kamwana', '265884302784', 'ibrahimkamwana@gmail.com', 'Blantyre - Bangwe', '', '33', 'male', '', '', '', '1628125473.jpg', 'SMP5R4AH', '20180804046838', 'Car', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '105.234.160.31', '2021-08-05 03:04:33', '2021-08-05 03:04:33'),
(114, 1, 'umar2579', 'fbcb20abd7faa65c7ee37627252ce27d', 'UMAR HUSSEIN DAUD', '265999230311', 'omariodaudi@gmail.com', 'L- Area Forty Seven', 'Private bag A117', '41', 'male', 'Business', '1,000,000', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '102.70.3.128', '2021-08-05 19:14:04', '2021-08-05 19:14:04'),
(115, 1, 'bilal', '0a9fc1d1bde124f057b9968497dcd4a4', 'Bilal Khamisa', '265998713500', 'khamisabb@gmail.com', 'Blantyre - Limbe Central ', 'P.O Box 57097 Blantyre 3', '30', 'male', 'Business man', 'MK50,000,000.00', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '102.70.3.24', '2021-08-06 07:45:44', '2021-08-06 07:45:44'),
(116, 1, 'chisomoinvestments', 'a74b68818b66c62f11102d213ac3e3de', 'Titus Brandon Tandwe', '000992999986', 'titusbtandwe@gmail.com', 'L- Area Twenty Five', 'P.O Box 40259', '22', 'male', 'Business Manager', 'MK1,500,000', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '105.234.160.8', '2021-08-07 12:08:48', '2021-08-07 12:08:48'),
(117, 1, 'calvinchikho', '477b4a27862f91e505d6c58a576b8e08', 'Calvin Chikho', '265888685512', 'chikhocalvin98@gmail.com', 'Blantyre - Blantyre Central ', 'Telekom networks malawi 3039', '26', 'male', 'Network engineer ', '2500000', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '102.70.59.35', '2021-08-07 22:06:27', '2021-08-07 22:06:27'),
(118, 2, 'grayce1', '19ed30e0ae90606b2ce519c07704ff77', 'Grace Mukhuta-Banda', '265999186123', 'grace.banda21@gmail.com', 'L- Area Forty Nine', '', '30', 'female', '', '', '', '1628527489.jpg', 'T6JV1Z8H', '10210614006500', 'Car', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '129.140.0.7', '2021-08-09 15:29:28', '2021-08-09 15:29:28'),
(119, 2, 'dd619m', '28b84b275c5c5fc3b23190519c7f0c34', 'Dickson makawa', '088270631500', 'makawa618@gmail.com', 'Blantyre - Nkolokoti', '', '26', 'male', '', '', '', '1628602725.jpg', 'VCJ2JJD4', '10181014014554', 'Car', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '41.75.120.151', '2021-08-10 15:38:45', '2021-08-10 15:38:45'),
(120, 2, 'kento', 'be76ff06626a2f0cdf64da56d7b8f5b2', 'Kento Banda', '265994140145', 'kentobarnder@gmail.com', 'L- Area Forty Seven', '', '23', 'male', '', '', '', '1628605986.png', 'W87K4AKJ', '10200914002171', 'Bus', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '129.140.0.13', '2021-08-10 16:33:06', '2021-08-10 16:33:06'),
(121, 1, 'amosnika', '40567011901fc1e3d21ea109a8aabbed', 'Amos mntangwanika', '265991798739', 'amosnika@yahoo.com', 'Lilongwe-Area Three', 'Box 1682 Blantyre', '41', 'male', 'Nursing', 'MK1.200.000', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '105.234.164.36', '2021-08-11 23:09:34', '2021-08-11 23:09:34'),
(122, 3, 'voster265', 'a68ec34cab41517da083a04b888b07b1', 'Voster simbeye', '265885107558', 'vostersimbeye208@gmail.com', 'Zomba - Central', '', '24', 'male', '', '', '', '1628748491.jpg', 'W7yxk095', '10170914020859', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '102.70.22.81', '2021-08-12 08:08:11', '2021-08-12 08:08:11'),
(123, 2, 'emanuelbanda', 'cb0a45f6a3677afba568d4bae25828a1', 'Emanuel Nelson Banda ', '265995607140', 'emanuelbanda@live.co.uk', 'L- Area Twenty Five', '', '32', 'male', '', '', '', '1628750308.jpg', 'SXH3XTEB', '20161014052841', 'Car', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '137.115.0.35', '2021-08-12 08:38:27', '2021-08-12 08:38:27'),
(124, 2, 'nakutumba', 'fdef6610720c6119296f571572feca97', 'Lindani Nakutumba Pangani', '265999970437', 'panganilindani@outlook.com', 'Blantyre - Limbe Central ', '', '27', 'male', '', '', '', '1628767950.jpg', 'VBQKPJSF', '10190814038484', 'Car', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '102.70.59.115', '2021-08-12 13:32:30', '2021-08-12 13:32:30'),
(125, 2, 'mcloud86', '48d45ac7d613deab8706a4cd91d57097', 'Mcloud Ching\'onga', '256992042233', 'mcloud.chingonga@gmail.com', 'L- Area Forty Nine', '', '35', 'male', '', '', '', '1631296712.jpg', 's14p0km0', '10210514023237', 'Car', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '102.70.59.69', '2021-08-12 18:29:07', '2021-08-12 18:29:07'),
(126, 1, 'steady', 'e505a2ffcd7b7d0379f6af49abf5f5e4', 'Steady Charis', '123456789000', 'emailsteady@gmail.com', 'Balaka - Amidu', 'balaka', '22', 'female', 'business', '234567', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '154.66.121.7', '2021-08-12 19:52:43', '2021-08-12 19:52:43'),
(127, 1, 'xander', 'fe20e761d294c64c0ef68672d550becc', 'Alexander Chikupeta', '265995823178', 'chikupetaalexander@gmail.com', 'L- Area Twenty Five', 'P bag 40666', '28', 'male', 'Clerk', '200000', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '82.145.222.221', '2021-08-12 21:20:28', '2021-08-12 21:20:28'),
(128, 2, 'alfred', '68cd0e02e7cdab0927ebb77b6c253e32', 'Noel Ndoya', '265881940252', 'noxyndoya@gmail.com', 'Blantyre - Blantyre Central ', '', '34', 'male', '', '', '', '1628844268.jpg', 'SAX93NHJ', '10181114005000', 'Car', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '105.234.164.7', '2021-08-13 10:44:27', '2021-08-13 10:44:27'),
(129, 1, 'lotterybanda', 'ca860e79a46489fc73339bf54fd2df01', 'Lottery Banda', '265999244568', 'lotterybanda@yahoo.co.uk', 'L- Area Fifty One', 'C/O UNDP Malawi', '42', 'male', 'Driver/Mechanic/Logistician', '10 Million MwK', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '105.234.162.8', '2021-08-15 19:52:05', '2021-08-15 19:52:05'),
(130, 1, 'vantagecars', '393fd1dbc1e4361373f4ae0b94e6b7b7', 'Nelson kumwenda ', '265999615250', 'nelsonkumwenda@gmail.com', 'Blantyre - Blantyre Central ', 'P.0 Box 42 soche', '35', 'male', 'Taxi operator ', '20000000', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '105.234.162.18', '2021-08-16 08:23:54', '2021-08-16 08:23:54'),
(131, 3, 'mungi', 'aac1bd6703b33427599e8ddae99ead3c', 'Mungi Macmin Kayange', '265999924625', 'kayangemungi4@gmail.com', 'L- Area Forty Six', '', '43', 'male', '', '', '', '1629098173.jpg', 'PQ006C5P', '10181214007928', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '137.115.0.36', '2021-08-16 09:16:12', '2021-08-16 09:16:12'),
(132, 1, 'chiccoh', 'fa1f0c54f9d8f78201bb1c514c6128f4', 'Chikondi Chokhotho', '265884941757', 'cchokhotho@bba.mw', 'Blantyre - Blantyre Central ', 'P.O. Box 1283, Blantyre', '34', 'female', 'Teacher', '5,000,000', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '102.70.22.18', '2021-08-16 12:14:34', '2021-08-16 12:14:34'),
(133, 1, 'vincent993', '03c866a23811bac86b360bf163c81ea4', 'Vincent Kasakula', '265881886360', 'vincentnigel47@gmail.com', 'L- Area Thirty Six', 'Lilongwe', '28', 'male', 'Tutor', 'Not fixed', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '105.234.164.24', '2021-08-17 04:43:06', '2021-08-17 04:43:06'),
(134, 1, 'dorah25', 'ae74da8e63d91e1b77f0563665e3b184', 'Faith Namathanga ', '265881991755', 'faithmasamba@gmail.com', 'L- Area Forty Nine', 'Kamuzu college of nursing, Private bag1, Lilongwe', '25', 'female', 'Manager', '1,900,000', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '102.70.65.3', '2021-08-17 14:29:45', '2021-08-17 14:29:45'),
(135, 1, 'bless', '8e816c81842ed5f93e86978495e49036', 'Blessings Nyirenda ', '265882791567', 'blemnyirenda@gmail.com', 'L- Area Twenty Four', 'Box 316 ', '24', 'male', 'Mechanic', '1,000,000', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '102.70.65.119', '2021-08-17 19:48:31', '2021-08-17 19:48:31'),
(136, 1, 'chanjo', 'ee9a17bf20d05e4d77e2a7c557855ec5', 'chanjo', '265999864064', 'rhodieb@yahoo.com', 'Blantyre - Nkolokoti', 'box 801', '32', 'male', 'procurement', '300', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '41.75.113.202', '2021-08-23 08:28:32', '2021-08-23 08:28:32'),
(137, 1, 'ggmeeoww', 'e807f1fcf82d132f9bb018ca6738a19f', 'gg Gee meoww', '254704451445', 'gg@gmail.com', 'Balaka - Amidu', '123478', '19', 'female', 'teacher', '80000', 'business', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '102.64.113.2', '2021-09-10 13:36:25', '2021-09-10 13:36:25'),
(138, 2, 'yabagucha', 'ca32c67c0e6eabc6a8d9de9b8a3635e4', 'Yabagucha', '031468506111', 'yabagucha@test.com', 'Balaka - Nsamala', '', '31', 'female', '', '', '', '1651737437.jpeg', '3120245389953', '3120245389953', 'Car', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '::1', '2022-05-05 09:57:16', '2022-05-05 09:57:16'),
(139, 3, 'yasir1993', '0738a3582f1a89c81c092da3d2fc9878', 'Yasir Majeed', '923146850461', 'yasir1993@test.com', 'Blantyre - Chigumula', 'Cholistan House Vii 636/964 New sattelite town rafi qamar road behind al-majeed paradise city bahawalpur', '37', 'male', 'Lawyer', '36522', 'business', '1651737669.jpeg', '3120245389953', 'ML-9523445', 'Car', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '::1', '2022-05-05 10:01:09', '2022-05-05 16:27:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `licences`
--
ALTER TABLE `licences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lox_admin_user`
--
ALTER TABLE `lox_admin_user`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `lox_cityname`
--
ALTER TABLE `lox_cityname`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lox_customer_feedback`
--
ALTER TABLE `lox_customer_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lox_faq`
--
ALTER TABLE `lox_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lox_feedback`
--
ALTER TABLE `lox_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lox_news`
--
ALTER TABLE `lox_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lox_payments`
--
ALTER TABLE `lox_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lox_per_day_rate`
--
ALTER TABLE `lox_per_day_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lox_vehicle_category`
--
ALTER TABLE `lox_vehicle_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `licences`
--
ALTER TABLE `licences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `lox_admin_user`
--
ALTER TABLE `lox_admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lox_cityname`
--
ALTER TABLE `lox_cityname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=876;

--
-- AUTO_INCREMENT for table `lox_customer_feedback`
--
ALTER TABLE `lox_customer_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lox_faq`
--
ALTER TABLE `lox_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lox_feedback`
--
ALTER TABLE `lox_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lox_news`
--
ALTER TABLE `lox_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lox_payments`
--
ALTER TABLE `lox_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1163;

--
-- AUTO_INCREMENT for table `lox_per_day_rate`
--
ALTER TABLE `lox_per_day_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `lox_vehicle_category`
--
ALTER TABLE `lox_vehicle_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
