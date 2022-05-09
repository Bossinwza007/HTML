-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2022 at 01:53 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaccine`
--

-- --------------------------------------------------------

--
-- Table structure for table `v_data`
--

CREATE TABLE `v_data` (
  `v_id` int(11) NOT NULL,
  `v_iduser` int(11) NOT NULL,
  `v_idvaccine` int(11) NOT NULL,
  `v_amount` varchar(50) NOT NULL DEFAULT '2',
  `date1` date NOT NULL,
  `date2` date NOT NULL,
  `v_dose1` varchar(50) NOT NULL DEFAULT 'ยังไม่ได้ฉีด',
  `v_dose2` varchar(50) NOT NULL DEFAULT 'ยังไม่ได้ฉีด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `v_data`
--

INSERT INTO `v_data` (`v_id`, `v_iduser`, `v_idvaccine`, `v_amount`, `date1`, `date2`, `v_dose1`, `v_dose2`) VALUES
(1, 5, 1, '2', '2022-05-12', '2022-06-02', 'ฉีดแล้ว', 'ฉีดแล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `v_user`
--

CREATE TABLE `v_user` (
  `v_id` int(10) NOT NULL,
  `v_fname` varchar(50) NOT NULL,
  `v_lname` varchar(50) NOT NULL,
  `v_email` varchar(50) NOT NULL,
  `v_age` varchar(10) NOT NULL,
  `v_sex` varchar(10) NOT NULL,
  `v_phone` varchar(10) NOT NULL,
  `v_password` varchar(50) NOT NULL,
  `v_status` varchar(10) NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `v_user`
--

INSERT INTO `v_user` (`v_id`, `v_fname`, `v_lname`, `v_email`, `v_age`, `v_sex`, `v_phone`, `v_password`, `v_status`) VALUES
(1, 'Rattana', 'Chomwihok', 'rattana123zaja@gmail.com', '20', 'Female', '0917567541', '123456', 'admin'),
(2, 'Rogi', 'BMTIO', 'member@gmail.com', '21', 'Female', '0970521284', '123456', 'member'),
(3, 'Grand', 'pa', 'papa@gmail.com', '61', 'Female', '0970521285', '123456', 'member'),
(5, 'Rogi', 'BMTIO', 'supermember@gmail.com', '30', 'Female', '09912345', '123456', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `v_vaccine`
--

CREATE TABLE `v_vaccine` (
  `v_id` int(11) NOT NULL,
  `v_name` varchar(100) NOT NULL,
  `v_effect` varchar(100) NOT NULL,
  `v_minage` varchar(100) NOT NULL,
  `v_amount` varchar(100) NOT NULL,
  `v_detail` varchar(100) NOT NULL,
  `v_seffects` varchar(100) NOT NULL,
  `v_producer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `v_vaccine`
--

INSERT INTO `v_vaccine` (`v_id`, `v_name`, `v_effect`, `v_minage`, `v_amount`, `v_detail`, `v_seffects`, `v_producer`) VALUES
(1, 'Shinovacc', '81%', '18-60 ปี', '200', '2 โดส ห่างกัน 3 สัปดาห์', 'จุดที่ฉีด ปวด,ร่างกาย - ปวดหัว, อาการชาคล้ายอัมพาต ', 'ประเทศจีน'),
(2, 'Shinopharm', '79%', '18 ปีขึ้นไป', '196', '2 โดส ห่างกัน 3-4 สัปดาห์', 'จุดที่ฉีด - ปวด, บวม, แดง\r\nร่างกาย-ปวดหัว, ปวดกล้ามเนื้อ, ผื่นขึ้น, มีใข้', 'ประเทศจีน'),
(3, 'Moderna', '94%', '18 ปีขึ้นไป', '200', '2 โดส ห่างกัน 4 สัปดาห์', 'จุดที่ฉีด - ปวด, บวม, แดง\r\nร่างกาย - หนาวสั่น, ปวดหัว, อ่อนเพลีย', 'ประเทศสหัฐอเมริกา'),
(4, 'Astra Zeneca', '75% ', '18 ปีขึ้นไป', '200', '2 โดส ห่างกัน 4-12 สัปดาห์', 'จุดที่ฉีด - ปวด\r\nร่างกาย - หนาวสั่น, มีใข้, ปวดหัว, อ่อนเพลีย, ปวดกล้ามเนื้อ, คลื่นใส้, ลิ่มเลือดแข็', 'ประเทศสหัฐอเมริกา,ประเทศเยอรมัน');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `v_data`
--
ALTER TABLE `v_data`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `v_iduser` (`v_iduser`,`v_idvaccine`),
  ADD KEY `v_idvaccine` (`v_idvaccine`);

--
-- Indexes for table `v_user`
--
ALTER TABLE `v_user`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `v_vaccine`
--
ALTER TABLE `v_vaccine`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `v_data`
--
ALTER TABLE `v_data`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `v_user`
--
ALTER TABLE `v_user`
  MODIFY `v_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `v_vaccine`
--
ALTER TABLE `v_vaccine`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `v_data`
--
ALTER TABLE `v_data`
  ADD CONSTRAINT `v_data_ibfk_1` FOREIGN KEY (`v_iduser`) REFERENCES `v_user` (`v_id`),
  ADD CONSTRAINT `v_data_ibfk_2` FOREIGN KEY (`v_idvaccine`) REFERENCES `v_vaccine` (`v_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
