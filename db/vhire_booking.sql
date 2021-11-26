-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 06:55 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vhire_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `ContactNumber` char(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `AdminType` enum('SuperAdmin','Admin') DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `FirstName`, `MiddleName`, `LastName`, `ContactNumber`, `Email`, `Username`, `Password`, `DateOfBirth`, `AdminType`) VALUES
(1, 'test', 'test', 'test', '09876543210', 'test@email.com', 'test', '827ccb0eea8a706c4c34a16891f84e7b', '1995-01-10', 'SuperAdmin'),
(2, 'tester', 'tester', 'tester', '09123456789', 'tester@email.com', 'tester', '827ccb0eea8a706c4c34a16891f84e7b', '2000-09-09', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `ContactNumber` char(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `ProfilePicture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `FirstName`, `MiddleName`, `LastName`, `ContactNumber`, `Email`, `Username`, `Password`, `DateOfBirth`, `ProfilePicture`) VALUES
(1, 'Jomer', 'Gilig', 'Barcenilla', '09567826962', 'jomer@email.com', 'jom', '827ccb0eea8a706c4c34a16891f84e7b', '2000-02-24', ''),
(2, 'Mary', 'Faustine', 'Gozon', '09123456789', 'mary@email.com', 'mary24', 'e10adc3949ba59abbe56e057f20f883e', '2001-08-18', ''),
(3, 'Niko', 'Gilig', 'Barcenilla', '09987654321', 'niko@email.com', 'niko10', '01cfcd4f6b8770febfb40cb906715822', '1998-10-10', ''),
(5, 'John', 'Joe', 'Doe', '09456789123', 'john@email.com', 'johndoe', '6c44e5cd17f0019c64b042e4a745412a', '1997-03-27', ''),
(6, 'Joe', 'Doe', 'John', '09987321654', 'joe@email.com', 'joejoe', '6c44e5cd17f0019c64b042e4a745412a', '1995-07-12', ''),
(7, 'Sam', 'Mas', 'Sam', '09963852741', 'sam@email.com', 'sammas', '6c44e5cd17f0019c64b042e4a745412a', '1991-05-30', ''),
(8, 'Mat', 'Tam', 'Matty', '09753951468', 'mattam@email.com', 'matty', 'e10adc3949ba59abbe56e057f20f883e', '1996-11-13', ''),
(9, 'Ana', 'Moe', 'Ama', '09638527419', 'ana@email.com', 'anamoe', 'e10adc3949ba59abbe56e057f20f883e', '1993-01-29', ''),
(10, 'Ina', 'Moe', 'Mama', '09784512963', 'inamama@email.com', 'inamoe', '827ccb0eea8a706c4c34a16891f84e7b', '1992-04-23', ''),
(11, 'Marie', 'Dizon', 'Ruiz', '09546213879', 'marie@email.com', 'marier', '01cfcd4f6b8770febfb40cb906715822', '2021-09-23', ''),
(12, 'Daniel', 'Dan', 'Cruz', '09586947123', 'daniel@email.com', 'dandan', '6c44e5cd17f0019c64b042e4a745412a', '2000-06-09', ''),
(13, 'Carl', 'Mael', 'Invoker', '09968523741', 'invoker@email.com', 'invoker', 'e10adc3949ba59abbe56e057f20f883e', '1991-10-31', ''),
(14, 'Clark', 'Mael', 'Injoker', '09968523741', 'injoker@email.com', 'injoker', '01cfcd4f6b8770febfb40cb906715822', '1992-08-22', ''),
(15, 'Mia', 'Ng', 'Co', '09695874231', 'mia@email.com', 'miang', '827ccb0eea8a706c4c34a16891f84e7b', '1989-06-15', ''),
(16, 'Abby', 'So', 'Tan', '09695874123', 'abby@email.com', 'abby', '6c44e5cd17f0019c64b042e4a745412a', '1994-04-12', ''),
(17, 'Juan', 'Cardo', 'Dalisay', '09645823179', 'juancardo@email.com', 'dalisay', 'e10adc3949ba59abbe56e057f20f883e', '1995-04-15', ''),
(18, 'Allan', 'Nalan', 'Sy', '0936251478', 'allansy@email.com', 'allans', '827ccb0eea8a706c4c34a16891f84e7b', '1992-07-02', ''),
(19, 'Lina', 'Ty', 'Inverse', '0947365821', 'lina@email.com', 'linainverse', '6c44e5cd17f0019c64b042e4a745412a', '2000-12-31', ''),
(20, 'Gab', 'Sy', 'Ty', '09147963258', 'gabty@email.com', 'gabby', '01cfcd4f6b8770febfb40cb906715822', '2002-11-01', ''),
(21, 'test', 'tester', 'testing', '09123456789', 'test@email.com', 'test', '827ccb0eea8a706c4c34a16891f84e7b', '2000-01-01', './images/users/ArietyBG1.jpg'),
(24, 'James', 'james', 'james', '09665435431', 'james@jame.jam', 'james', 'b4cc344d25a2efe540adbf2678e2304c', '0004-03-05', '');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `DriverID` int(11) NOT NULL,
  `LicenseNumber` char(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `ContactNumber` char(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `ProfilePicture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`DriverID`, `LicenseNumber`, `FirstName`, `MiddleName`, `LastName`, `ContactNumber`, `Email`, `Username`, `Password`, `DateOfBirth`, `ProfilePicture`) VALUES
(1, 'A1234567890', 'John', 'Juan', 'Cruz', '09123456785', 'cardo@email.com', 'cardo', '827ccb0eea8a706c4c34a16891f84e7b', '1995-11-01', ''),
(2, 'A0987654321', 'George', 'Jungle', 'Tarzan', '09098765432', 'g_tarzan@email.com', 'jungleboy', 'e10adc3949ba59abbe56e057f20f883e', '1990-09-14', ''),
(3, 'A1234567899', 'testing', 'tester', 'tests', '09876543212', 'test@test.com', 'test', '827ccb0eea8a706c4c34a16891f84e7b', '2000-01-01', './images/drivers/Keyboard1.jpg'),
(4, 'A1234567898', 'Renzo', 'Pradilla', 'Lebumfacil', '09123445552', 'soy@gmail.com', 'renzo', '674cba521a0445ef3168b298509bf88e', '1999-01-01', './images/drivers/Harima.png'),
(5, 'A1234567856', 'Mat', 'Thew', 'Thew', '09435345345', 'math@mat.thew', 'mat', '4a258d930b7d3409982d727ddbb4ba88', '1993-01-18', '');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `ReservationID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `TripID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `BookedDate` datetime NOT NULL,
  `Status` enum('Accepted','Cancelled','Pending') NOT NULL DEFAULT 'Pending',
  `ConfirmationDate` datetime NOT NULL,
  `TotalFare` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`ReservationID`, `CustomerID`, `TripID`, `Quantity`, `BookedDate`, `Status`, `ConfirmationDate`, `TotalFare`) VALUES
(1, 24, 11, 1, '2021-11-24 12:19:54', 'Pending', '2021-11-17 12:19:54', '30.00'),
(2, 18, 11, 1, '2021-11-24 12:19:54', 'Pending', '2021-11-17 21:49:31', '30.00'),
(3, 1, 11, 2, '2021-11-24 21:50:27', 'Pending', '2021-11-24 21:50:27', '60.00'),
(4, 11, 11, 1, '2021-11-17 22:38:33', 'Pending', '2021-11-24 22:38:33', '30.00');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `RouteID` int(11) NOT NULL,
  `OriginalTerminalID` int(11) NOT NULL,
  `DestinationTerminalID` int(11) NOT NULL,
  `Fare` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`RouteID`, `OriginalTerminalID`, `DestinationTerminalID`, `Fare`) VALUES
(1, 1, 2, '20.00'),
(2, 1, 3, '25.00'),
(3, 1, 4, '20.00'),
(4, 1, 5, '30.00'),
(5, 1, 6, '30.00'),
(6, 1, 7, '30.00'),
(7, 2, 1, '20.00'),
(8, 2, 3, '20.00'),
(9, 2, 4, '20.00'),
(10, 2, 5, '30.00'),
(11, 2, 6, '30.00'),
(12, 2, 7, '30.00'),
(13, 3, 1, '20.00'),
(14, 3, 2, '20.00'),
(15, 3, 4, '20.00'),
(16, 3, 5, '35.00'),
(17, 3, 6, '35.00'),
(18, 3, 7, '35.00'),
(19, 4, 1, '20.00'),
(20, 4, 2, '20.00'),
(21, 4, 3, '20.00'),
(22, 4, 5, '40.00'),
(23, 4, 6, '40.00'),
(24, 4, 7, '40.00'),
(25, 5, 1, '30.00'),
(26, 5, 2, '30.00'),
(27, 5, 3, '35.00'),
(28, 5, 4, '40.00'),
(29, 6, 1, '30.00'),
(30, 6, 2, '30.00'),
(31, 6, 3, '35.00'),
(32, 6, 4, '40.00'),
(33, 7, 1, '30.00'),
(34, 7, 2, '30.00'),
(35, 7, 3, '35.00'),
(36, 7, 4, '40.00');

-- --------------------------------------------------------

--
-- Table structure for table `terminal`
--

CREATE TABLE `terminal` (
  `TerminalID` int(11) NOT NULL,
  `AdminID` int(11) NOT NULL,
  `LocationName` varchar(300) NOT NULL,
  `City` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terminal`
--

INSERT INTO `terminal` (`TerminalID`, `AdminID`, `LocationName`, `City`) VALUES
(1, 1, 'SM City Cebu Terminal', 'Cebu City'),
(2, 1, 'Ayala Center Cebu Terminal', 'Cebu City'),
(3, 1, 'Kamagayan UV Express Terminal', 'Cebu City'),
(4, 1, 'Cebu City South Terminal GT Express', 'Cebu City'),
(5, 1, 'Gaisano Island Mall Terminal', 'Lapu-Lapu City'),
(6, 1, 'Super Metro Gaisano Lapu-Lapu Terminal', 'Lapu-Lapu City'),
(7, 1, 'Gaisano Savers Mart Lapu-Lapu Terminal', 'Lapu-Lapu City');

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `TripID` int(11) NOT NULL,
  `VehicleID` int(11) NOT NULL,
  `RouteID` int(11) NOT NULL,
  `DriverID` int(11) NOT NULL,
  `AvailableSeats` int(11) NOT NULL,
  `EstimatedTimeDeparture` datetime NOT NULL,
  `EstimatedTimeArrival` datetime NOT NULL,
  `Status` enum('Upcoming','Ongoing','Arrived') NOT NULL DEFAULT 'Upcoming'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`TripID`, `VehicleID`, `RouteID`, `DriverID`, `AvailableSeats`, `EstimatedTimeDeparture`, `EstimatedTimeArrival`, `Status`) VALUES
(1, 1, 1, 1, 14, '2021-11-13 06:00:00', '2021-11-09 08:00:00', 'Upcoming'),
(2, 2, 1, 1, 14, '2021-11-13 07:00:00', '2021-11-09 09:00:00', 'Upcoming'),
(7, 3, 4, 4, 14, '2021-11-24 03:48:00', '2021-11-24 04:48:00', 'Upcoming'),
(11, 1, 1, 4, 14, '2021-11-25 13:35:00', '2021-11-25 14:35:00', 'Upcoming'),
(12, 1, 1, 5, 14, '2021-11-25 13:41:00', '2021-11-25 14:41:00', 'Upcoming');

-- --------------------------------------------------------

--
-- Table structure for table `vhire`
--

CREATE TABLE `vhire` (
  `VehicleID` int(11) NOT NULL,
  `DriverID` int(11) DEFAULT NULL,
  `PlateNumber` char(8) NOT NULL,
  `Brand` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Weight` decimal(6,2) NOT NULL,
  `Status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vhire`
--

INSERT INTO `vhire` (`VehicleID`, `DriverID`, `PlateNumber`, `Brand`, `Model`, `Capacity`, `Weight`, `Status`) VALUES
(1, 1, 'ABC-1234', 'Toyota', 'Hiace', 14, '1700.00', 'Good'),
(2, 1, 'ADC-1243', 'Toyota', 'Hiace', 14, '1700.00', 'Good'),
(3, 2, 'ABC-2345', 'Toyota', 'Hiace', 14, '1700.00', 'Good');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`DriverID`),
  ADD KEY `DriverID` (`DriverID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`ReservationID`),
  ADD KEY `Reservation_FK1` (`CustomerID`),
  ADD KEY `Reservation_FK2` (`TripID`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`RouteID`),
  ADD KEY `Route_FK1` (`OriginalTerminalID`),
  ADD KEY `Route_FK2` (`DestinationTerminalID`);

--
-- Indexes for table `terminal`
--
ALTER TABLE `terminal`
  ADD PRIMARY KEY (`TerminalID`),
  ADD KEY `Terminal_FK` (`AdminID`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`TripID`),
  ADD KEY `Trip_FK1` (`VehicleID`),
  ADD KEY `Trip_FK2` (`RouteID`),
  ADD KEY `Trip_FK3` (`DriverID`);

--
-- Indexes for table `vhire`
--
ALTER TABLE `vhire`
  ADD PRIMARY KEY (`VehicleID`),
  ADD KEY `Vhire_FK` (`DriverID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `DriverID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `ReservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `RouteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `terminal`
--
ALTER TABLE `terminal`
  MODIFY `TerminalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `TripID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vhire`
--
ALTER TABLE `vhire`
  MODIFY `VehicleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `Reservation_FK1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`),
  ADD CONSTRAINT `Reservation_FK2` FOREIGN KEY (`TripID`) REFERENCES `trip` (`TripID`);

--
-- Constraints for table `route`
--
ALTER TABLE `route`
  ADD CONSTRAINT `Route_FK1` FOREIGN KEY (`OriginalTerminalID`) REFERENCES `terminal` (`TerminalID`),
  ADD CONSTRAINT `Route_FK2` FOREIGN KEY (`DestinationTerminalID`) REFERENCES `terminal` (`TerminalID`);

--
-- Constraints for table `terminal`
--
ALTER TABLE `terminal`
  ADD CONSTRAINT `Terminal_FK` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`);

--
-- Constraints for table `trip`
--
ALTER TABLE `trip`
  ADD CONSTRAINT `Trip_FK1` FOREIGN KEY (`VehicleID`) REFERENCES `vhire` (`VehicleID`),
  ADD CONSTRAINT `Trip_FK2` FOREIGN KEY (`RouteID`) REFERENCES `route` (`RouteID`),
  ADD CONSTRAINT `Trip_FK3` FOREIGN KEY (`DriverID`) REFERENCES `driver` (`DriverID`);

--
-- Constraints for table `vhire`
--
ALTER TABLE `vhire`
  ADD CONSTRAINT `Vhire_FK` FOREIGN KEY (`DriverID`) REFERENCES `driver` (`DriverID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
