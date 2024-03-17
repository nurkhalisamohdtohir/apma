-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2022 at 04:22 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apparel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `apparel`
--

CREATE TABLE `apparel` (
  `Apparel_ID` int(2) UNSIGNED ZEROFILL NOT NULL,
  `Apparel_Code` varchar(10) NOT NULL,
  `Apparel_Name` varchar(200) NOT NULL,
  `Apparel_Price` double(5,2) NOT NULL,
  `Apparel_Qty` int(5) NOT NULL,
  `Apparel_QtyRS` int(5) NOT NULL,
  `Apparel_QtyD` int(5) NOT NULL,
  `Apparel_Image` blob NOT NULL,
  `QR_Code` blob NOT NULL,
  `Fabric_ID` int(2) NOT NULL,
  `Pattern_ID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apparel`
--

INSERT INTO `apparel` (`Apparel_ID`, `Apparel_Code`, `Apparel_Name`, `Apparel_Price`, `Apparel_Qty`, `Apparel_QtyRS`, `Apparel_QtyD`, `Apparel_Image`, `QR_Code`, `Fabric_ID`, `Pattern_ID`) VALUES
(01, 'A001', 'UNIQLO PLAIN T-SHIRT', 36.00, 750, 290, 460, 0x30322d30372d323032325f7061747465726e312e6a706567, '', 1, 1),
(02, 'A002', 'UNIQLO PLAID SHIRT', 45.00, 750, 0, 0, 0x30322d30372d323032325f706c6169642e6a7067, '', 2, 2),
(03, 'A003', 'UNIQLO STRIPE SHIRT', 42.00, 500, 0, 0, 0x30332d30372d323032325f7374726970652e6a7067, '', 3, 3),
(05, 'A005', 'UNIQLO DENIM PANTS', 34.00, 700, 0, 0, 0x30372d30392d323032325f7061747465726e322e6a7067, '', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Emp_ID` int(5) NOT NULL,
  `Emp_IC` varchar(12) NOT NULL DEFAULT '',
  `Emp_Name` varchar(100) NOT NULL DEFAULT '',
  `Emp_Dept` varchar(50) NOT NULL,
  `Emp_Email` varchar(50) NOT NULL DEFAULT '',
  `Emp_Phone` varchar(10) NOT NULL DEFAULT '',
  `Emp_Category` int(2) NOT NULL DEFAULT '2' COMMENT '1=Admin,2=Employee',
  `Emp_Status` varchar(10) NOT NULL DEFAULT 'INACTIVE',
  `Emp_Password` varchar(20) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_ID`, `Emp_IC`, `Emp_Name`, `Emp_Dept`, `Emp_Email`, `Emp_Phone`, `Emp_Category`, `Emp_Status`, `Emp_Password`) VALUES
(10012, '0008765382', 'NURKHALISA BINTI MOHD TOHIR', 'ADMIN', 'lisatohir@gmail.com', '0127475566', 1, 'ACTIVE', '12345'),
(20015, '093092897', 'ABU BIN BAKAR', 'PRODUCTION-FABRIC INSPECTION', 'abubakar@apparel.com', '012367988', 2, 'ACTIVE', '12345'),
(20016, '0942348244', 'NUR ADRIANA BINTI HISHAM', 'PRODUCTION-PATTERN MAKING', 'adriana@apparel.com', '0125643356', 2, 'ACTIVE', '12345'),
(20017, '861206295356', 'NUR AIN BT MUSTAPA', 'PRODUCTION-SEWING', 'ain@apparel.com', '0132020301', 2, 'ACTIVE', '12345'),
(20018, '691221042134', 'KAMARUDIN ABDULLAH', 'PRODUCTION-CUTTING', 'kamarudin@apparel.com', '0132020317', 2, 'ACTIVE', '12345'),
(20019, '800616043453', 'HALIM BIN ZAHARI', 'PRODUCTION-FINISHING', 'halim@apparel.com', '0132020301', 2, 'ACTIVE', '12345'),
(20020, '690315045133', 'RADZALI BIN SAMDIN', 'PRODUCTION-FINISHING', 'radzali@apparel.com', '0132020301', 2, 'ACTIVE', '12345'),
(20021, '730814085133', 'SALLEH BIN MOHAMED', 'PRODUCTION-CUTTING', 'salleh@apparel.com', '0132020301', 2, 'ACTIVE', '12345'),
(20022, '861113025525', 'KHAIRUL AMIR MOHAMMAD', 'PRODUCTION-CUTTING', 'khalirul@apparel.com', '0132020301', 2, 'ACTIVE', '12345'),
(20023, '000815056788', 'NUR HIDAYAH BINTI ALI', 'PRODUCTION-SEWING', 'hidayah@apparel.com', '0134320233', 2, 'ACTIVE', '12345'),
(20024, '870111015248', 'SUHAILA MAHRUJI', 'PRODUCTION-FABRIC INSPECTION', 'suhaila@apparel.com', '0132020301', 2, 'ACTIVE', '12345'),
(20025, '94938475943', 'ROSBAIDAH BINTI DESA', 'PRODUCTION-PATTERN MAKING', 'rosbaidah@apparel.com', '0149248353', 2, 'ACTIVE', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `fabric`
--

CREATE TABLE `fabric` (
  `Fabric_ID` int(2) UNSIGNED ZEROFILL NOT NULL,
  `Fabric_Code` varchar(10) NOT NULL,
  `Fabric_Type` varchar(200) NOT NULL,
  `Fabric_Qty` int(10) NOT NULL,
  `Fabric_Price` double(5,2) NOT NULL,
  `Fabric_Total` int(5) NOT NULL,
  `Fabric_Used` int(5) NOT NULL,
  `Fabric_Balance` int(5) NOT NULL,
  `Fabric_Image` blob NOT NULL,
  `QR_Code` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fabric`
--

INSERT INTO `fabric` (`Fabric_ID`, `Fabric_Code`, `Fabric_Type`, `Fabric_Qty`, `Fabric_Price`, `Fabric_Total`, `Fabric_Used`, `Fabric_Balance`, `Fabric_Image`, `QR_Code`) VALUES
(01, 'F01', 'PLAIN JERSEY', 50, 530.00, 3000, 1500, 1500, 0x30332d30372d323032325f665f706c61696e6a65727365792e6a706567, ''),
(02, 'F02', 'PLAID COTTON', 50, 600.00, 3000, 1500, 1500, 0x30332d30372d323032325f665f706c616964636f74746f6e2e6a7067, ''),
(03, 'F03', 'STRIPE COTTON', 50, 600.00, 3000, 1000, 2000, 0x30332d30372d323032325f665f737472697065636f74746f6e2e6a7067, ''),
(04, 'F04', 'DENIM COTTON', 50, 550.00, 3000, 2100, 900, 0x30372d30392d323032325f665f64656e696d2e6a7067, ''),
(09, 'F05', 'FLORAL COTTON', 50, 340.00, 3000, 0, 3000, 0x30392d30392d323032325f665f666c6f72616c636f74746f6e2e6a7067, '');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `Inventory_ID` int(2) UNSIGNED ZEROFILL NOT NULL,
  `Production_ID` int(2) UNSIGNED ZEROFILL NOT NULL,
  `Apparel_ID` int(2) UNSIGNED ZEROFILL NOT NULL,
  `Warehouse_ID` int(2) UNSIGNED ZEROFILL NOT NULL,
  `Quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Inventory_ID`, `Production_ID`, `Apparel_ID`, `Warehouse_ID`, `Quantity`) VALUES
(01, 01, 01, 02, 100),
(03, 01, 01, 02, 50),
(06, 01, 01, 01, 10),
(07, 01, 01, 03, 300);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `Log_ID` int(2) NOT NULL,
  `Emp_ID` int(5) NOT NULL,
  `Production_ID` int(2) NOT NULL,
  `Apparel_ID` int(2) UNSIGNED ZEROFILL NOT NULL,
  `Production_Desc` varchar(100) NOT NULL,
  `Datetime` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`Log_ID`, `Emp_ID`, `Production_ID`, `Apparel_ID`, `Production_Desc`, `Datetime`) VALUES
(1, 20015, 2, 02, '1', '2022-09-03 12:07:20'),
(2, 20020, 1, 01, '1', '2022-09-06 12:08:21'),
(5, 20020, 1, 01, '2', '2022-09-06 12:09:12'),
(6, 20020, 1, 01, '3', '2022-09-06 12:09:20'),
(7, 20020, 1, 01, '4', '2022-09-06 12:09:30'),
(8, 20020, 1, 01, '5', '2022-09-06 12:09:40'),
(9, 20015, 3, 03, '1', '2022-09-07 18:09:04'),
(10, 10012, 3, 00, '2', '2022-09-07 10:41:35'),
(14, 20015, 4, 05, '1', '2022-09-09 14:17:49');

-- --------------------------------------------------------

--
-- Table structure for table `pattern`
--

CREATE TABLE `pattern` (
  `Pattern_ID` int(2) UNSIGNED ZEROFILL NOT NULL,
  `Pattern_Code` varchar(10) NOT NULL,
  `Pattern_Type` varchar(200) NOT NULL,
  `Pattern_Meter` int(5) NOT NULL,
  `Pattern_Image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pattern`
--

INSERT INTO `pattern` (`Pattern_ID`, `Pattern_Code`, `Pattern_Type`, `Pattern_Meter`, `Pattern_Image`) VALUES
(01, 'P01', 'TSHIRT MEN', 2, '09-09-2022_p_tshirtmen.png'),
(02, 'P02', 'LONG SLEEVE SHIRT MEN', 2, '03-07-2022_p_longsleeveshirtmen.jpg'),
(03, 'P03', 'LONG SLEEVE SHIRT WOMEN', 2, '03-07-2022_p_longsleeveshirtwomen.jpg'),
(05, 'P05', 'TROUSERS MEN', 3, '03-07-2022_p_trousersmen.jpg'),
(07, 'P06', 'BAJU KURUNG', 4, '../image/09-09-2022_p_bajukurung.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `Production_ID` int(2) NOT NULL,
  `Apparel_ID` int(2) UNSIGNED ZEROFILL NOT NULL,
  `Process_ID` varchar(50) NOT NULL,
  `Production_Qty` int(5) NOT NULL,
  `Production_Balance` int(5) NOT NULL,
  `Datetime` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`Production_ID`, `Apparel_ID`, `Process_ID`, `Production_Qty`, `Production_Balance`, `Datetime`) VALUES
(1, 01, '5', 750, 0, '2022-09-03 14:11:50'),
(2, 02, '1', 190, 0, '2022-09-03 14:11:50'),
(3, 03, '2', 500, 0, '2022-09-04 14:11:50'),
(4, 05, '1', 0, 0, '2022-09-09 14:17:49');

--
-- Triggers `production`
--
DELIMITER $$
CREATE TRIGGER `after_production_update` AFTER UPDATE ON `production` FOR EACH ROW IF OLD.Production_Qty<>new.Production_Qty AND new.Process_ID=5 THEN
UPDATE apparel SET Apparel_QtyRS=new.Production_Qty WHERE Apparel_ID=OLD.Apparel_ID;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `production_process`
--

CREATE TABLE `production_process` (
  `Process_ID` int(2) NOT NULL,
  `Process_Desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `production_process`
--

INSERT INTO `production_process` (`Process_ID`, `Process_Desc`) VALUES
(1, 'FABRIC INSPECTION'),
(2, 'PATTERN MAKING'),
(3, 'CUTTING'),
(4, 'SEWING'),
(5, 'FINISHING');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `Warehouse_ID` int(2) NOT NULL,
  `Warehouse_Location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`Warehouse_ID`, `Warehouse_Location`) VALUES
(1, 'BATU BERENDAM, MELAKA'),
(2, 'AYER KEROH, MELAKA'),
(3, 'KAMPAR, PERAK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apparel`
--
ALTER TABLE `apparel`
  ADD PRIMARY KEY (`Apparel_ID`,`Fabric_ID`,`Pattern_ID`) USING BTREE,
  ADD KEY `Fabric_ID` (`Fabric_ID`),
  ADD KEY `Pattern_ID` (`Pattern_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Emp_ID`),
  ADD UNIQUE KEY `Emp_IC` (`Emp_IC`);

--
-- Indexes for table `fabric`
--
ALTER TABLE `fabric`
  ADD PRIMARY KEY (`Fabric_ID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Inventory_ID`,`Production_ID`,`Apparel_ID`,`Warehouse_ID`),
  ADD KEY `Production_ID` (`Production_ID`),
  ADD KEY `Apparel_ID` (`Apparel_ID`),
  ADD KEY `Warehouse_ID` (`Warehouse_ID`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`Log_ID`) USING BTREE,
  ADD KEY `Emp_ID` (`Emp_ID`),
  ADD KEY `Production_ID` (`Production_ID`),
  ADD KEY `Apparel_ID` (`Apparel_ID`);

--
-- Indexes for table `pattern`
--
ALTER TABLE `pattern`
  ADD PRIMARY KEY (`Pattern_ID`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`Production_ID`,`Apparel_ID`),
  ADD KEY `Emp_ID` (`Production_ID`),
  ADD KEY `Apparel_ID` (`Apparel_ID`);

--
-- Indexes for table `production_process`
--
ALTER TABLE `production_process`
  ADD PRIMARY KEY (`Process_ID`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`Warehouse_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apparel`
--
ALTER TABLE `apparel`
  MODIFY `Apparel_ID` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Emp_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20026;

--
-- AUTO_INCREMENT for table `fabric`
--
ALTER TABLE `fabric`
  MODIFY `Fabric_ID` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `Inventory_ID` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `Log_ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pattern`
--
ALTER TABLE `pattern`
  MODIFY `Pattern_ID` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `Production_ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `production_process`
--
ALTER TABLE `production_process`
  MODIFY `Process_ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `Warehouse_ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
