-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 04:12 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webmusic`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `ID` int(11) NOT NULL,
  `TenAlbum` varchar(255) NOT NULL,
  `MotaAlbum` varchar(255) DEFAULT NULL,
  `Anh` varchar(50) DEFAULT NULL,
  `NgayPhatHanh` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`ID`, `TenAlbum`, `MotaAlbum`, `Anh`, `NgayPhatHanh`) VALUES
(1, 'Fade Away', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `baihat`
--

CREATE TABLE `baihat` (
  `ID` int(11) NOT NULL,
  `TenBaiHat` varchar(255) NOT NULL,
  `Anh` varchar(255) DEFAULT NULL,
  `File` varchar(255) DEFAULT NULL,
  `LuotThich` int(11) DEFAULT 0,
  `IDAlbum` int(11) DEFAULT NULL,
  `IDChuDe` int(11) NOT NULL,
  `IDTheLoai` int(11) NOT NULL,
  `IDCasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baihat`
--

INSERT INTO `baihat` (`ID`, `TenBaiHat`, `Anh`, `File`, `LuotThich`, `IDAlbum`, `IDChuDe`, `IDTheLoai`, `IDCasi`) VALUES
(8, 'On My Way', '1', 'On_My_Way', 0, 1, 1, 4, 1),
(11, 'Faded', '2', 'Faded', 0, NULL, 1, 4, 1),
(12, 'Paraside', 'Paraside', 'Paraside', 0, NULL, 1, 4, 1),
(14, 'Reality', 'reality', 'Reality', 0, NULL, 1, 4, 5),
(15, 'If we have each other', '3', 'alec_benjamin_if_we_have_each_other_official_music_video_232164', 0, NULL, 3, 4, 6),
(21, 'If I Killed Someone For You', 'ifikilledsomeoneforyou', 'If_I_Killed_Someone_For_You', 0, NULL, 1, 4, 6),
(25, 'Cheap Thrills', 'cheap_thrills', 'cheap_thrills', 0, NULL, 1, 4, 7),
(26, 'ThunderCloud', 'thundercloud', 'ThunderCloud', 0, NULL, 1, 4, 7),
(27, 'Unstoppable', 'unstoppable', 'unstoppable', 0, NULL, 1, 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `baihat-playlist`
--

CREATE TABLE `baihat-playlist` (
  `IDPlayList` int(11) NOT NULL,
  `IDBaiHat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `casi`
--

CREATE TABLE `casi` (
  `ID` int(11) NOT NULL,
  `Ten` varchar(50) NOT NULL,
  `Anh` varchar(255) DEFAULT NULL,
  `ThongTin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `casi`
--

INSERT INTO `casi` (`ID`, `Ten`, `Anh`, `ThongTin`) VALUES
(1, 'Alan Walker', 'alanwalker', NULL),
(2, 'Shayne Ward', '11', NULL),
(3, 'Raazi', '16', NULL),
(4, 'Takasha', '17', NULL),
(5, 'Lost Frequencies', 'lostfrequencies', '???????c bi???t ?????n v???i ngh??? danh Lost Frequencies, l?? m???t DJ v?? nh?? s???n xu???t thu ??m ng?????i B???. Anh ???????c bi???t ?????n v???i c??c ????a ????n \"Are You with Me\" v??o n??m 2014, \"Reality\" v??o n??m 2015 v?? \"Where Are You Now\" c??ng v???i Calum Scott v??o n??m 2021'),
(6, 'Alec Benjamin', 'alecbenjamin', NULL),
(7, 'Sia', 'Sia', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `casi-album`
--

CREATE TABLE `casi-album` (
  `IDAlbum` int(11) NOT NULL,
  `IDCaSi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chude`
--

CREATE TABLE `chude` (
  `ID` int(11) NOT NULL,
  `TenChuDe` varchar(255) NOT NULL,
  `Anh` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chude`
--

INSERT INTO `chude` (`ID`, `TenChuDe`, `Anh`) VALUES
(1, 'None', 'none'),
(2, 'X-Mas', 'xmas'),
(3, 'Valentine', 'valentine'),
(4, 'Birthday', 'birthday'),
(5, 'New Year', 'newyear');

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `ID` int(11) NOT NULL,
  `ID_Parent` int(11) DEFAULT NULL,
  `NoiDung` varchar(255) NOT NULL,
  `ThoiGianDanhGia` datetime DEFAULT current_timestamp(),
  `IDBaiHat` int(11) NOT NULL,
  `IDTaiKhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `luotnghe`
--

CREATE TABLE `luotnghe` (
  `ID` int(11) NOT NULL,
  `ThoiGian` date DEFAULT current_timestamp(),
  `TaiKhoanID` int(11) DEFAULT NULL,
  `BaiHatID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `ID` int(11) NOT NULL,
  `TenPlayList` varchar(255) NOT NULL,
  `IDTaiKhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `ID` int(11) NOT NULL,
  `TenTaiKhoan` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `TenNguoiDung` varchar(255) NOT NULL,
  `IsAdmin` tinyint(1) DEFAULT 0,
  `Anh` varchar(255) DEFAULT NULL,
  `NgaySinh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`ID`, `TenTaiKhoan`, `MatKhau`, `TenNguoiDung`, `IsAdmin`, `Anh`, `NgaySinh`) VALUES
(1, 'Minhmo', '123123', 'L????ng Minh', 1, NULL, '2022-10-19'),
(11, 'Minhmoo', '123123', 'Lwowng Minh', 0, NULL, '0000-00-00'),
(12, 'FakeOut1012', '12', '123123', 0, NULL, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `ID` int(11) NOT NULL,
  `TenTheLoai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`ID`, `TenTheLoai`) VALUES
(1, 'None'),
(2, 'Romance'),
(3, 'Rock N Roll'),
(4, 'Pop'),
(5, 'Chill'),
(6, 'Only Sound');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `baihat`
--
ALTER TABLE `baihat`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UC_BaiHat` (`ID`,`IDTheLoai`,`IDChuDe`),
  ADD KEY `IDAlbum` (`IDAlbum`),
  ADD KEY `IDTheLoai` (`IDTheLoai`),
  ADD KEY `IDCasi` (`IDCasi`),
  ADD KEY `IDChuDe` (`IDChuDe`);

--
-- Indexes for table `baihat-playlist`
--
ALTER TABLE `baihat-playlist`
  ADD UNIQUE KEY `UC_BaiHatPlayList` (`IDPlayList`,`IDBaiHat`),
  ADD KEY `IDBaiHat` (`IDBaiHat`);

--
-- Indexes for table `casi`
--
ALTER TABLE `casi`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `casi-album`
--
ALTER TABLE `casi-album`
  ADD UNIQUE KEY `UC_Casi_Album` (`IDAlbum`,`IDCaSi`),
  ADD KEY `IDCaSi` (`IDCaSi`);

--
-- Indexes for table `chude`
--
ALTER TABLE `chude`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDBaiHat` (`IDBaiHat`),
  ADD KEY `IDTaiKhoan` (`IDTaiKhoan`),
  ADD KEY `ID_Parent` (`ID_Parent`);

--
-- Indexes for table `luotnghe`
--
ALTER TABLE `luotnghe`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TaiKhoanID` (`TaiKhoanID`),
  ADD KEY `BaiHatID` (`BaiHatID`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDTaiKhoan` (`IDTaiKhoan`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `baihat`
--
ALTER TABLE `baihat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `casi`
--
ALTER TABLE `casi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chude`
--
ALTER TABLE `chude`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `luotnghe`
--
ALTER TABLE `luotnghe`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baihat`
--
ALTER TABLE `baihat`
  ADD CONSTRAINT `baihat_ibfk_1` FOREIGN KEY (`IDAlbum`) REFERENCES `album` (`ID`),
  ADD CONSTRAINT `baihat_ibfk_2` FOREIGN KEY (`IDTheLoai`) REFERENCES `theloai` (`ID`),
  ADD CONSTRAINT `baihat_ibfk_3` FOREIGN KEY (`IDCasi`) REFERENCES `casi` (`ID`),
  ADD CONSTRAINT `baihat_ibfk_4` FOREIGN KEY (`IDChuDe`) REFERENCES `chude` (`ID`);

--
-- Constraints for table `baihat-playlist`
--
ALTER TABLE `baihat-playlist`
  ADD CONSTRAINT `baihat-playlist_ibfk_1` FOREIGN KEY (`IDPlayList`) REFERENCES `playlist` (`ID`),
  ADD CONSTRAINT `baihat-playlist_ibfk_2` FOREIGN KEY (`IDBaiHat`) REFERENCES `baihat` (`ID`);

--
-- Constraints for table `casi-album`
--
ALTER TABLE `casi-album`
  ADD CONSTRAINT `casi-album_ibfk_1` FOREIGN KEY (`IDAlbum`) REFERENCES `album` (`ID`),
  ADD CONSTRAINT `casi-album_ibfk_2` FOREIGN KEY (`IDCaSi`) REFERENCES `casi` (`ID`);

--
-- Constraints for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`IDBaiHat`) REFERENCES `baihat` (`ID`),
  ADD CONSTRAINT `danhgia_ibfk_2` FOREIGN KEY (`IDTaiKhoan`) REFERENCES `taikhoan` (`ID`),
  ADD CONSTRAINT `danhgia_ibfk_3` FOREIGN KEY (`ID_Parent`) REFERENCES `danhgia` (`ID`);

--
-- Constraints for table `luotnghe`
--
ALTER TABLE `luotnghe`
  ADD CONSTRAINT `luotnghe_ibfk_1` FOREIGN KEY (`TaiKhoanID`) REFERENCES `taikhoan` (`ID`),
  ADD CONSTRAINT `luotnghe_ibfk_2` FOREIGN KEY (`BaiHatID`) REFERENCES `baihat` (`ID`);

--
-- Constraints for table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `playlist_ibfk_1` FOREIGN KEY (`IDTaiKhoan`) REFERENCES `taikhoan` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
