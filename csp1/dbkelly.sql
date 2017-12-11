-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2017 at 12:04 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkelly`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `iCartId` int(10) NOT NULL,
  `tTransactionId` text NOT NULL,
  `iProductId` int(3) NOT NULL,
  `iQty` int(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`iCartId`, `tTransactionId`, `iProductId`, `iQty`) VALUES
(1, '0eafbac9f7ef467175b36f2ecd1ab0fa', 1, 4),
(2, '0eafbac9f7ef467175b36f2ecd1ab0fa', 2, 109),
(3, '0eafbac9f7ef467175b36f2ecd1ab0fa', 3, 2),
(4, '0eafbac9f7ef467175b36f2ecd1ab0fa', 6, 2),
(5, '0eafbac9f7ef467175b36f2ecd1ab0fa', 4, 3),
(6, '0eafbac9f7ef467175b36f2ecd1ab0fa', 5, 2),
(7, '1e77fd84b9f3b75b7814874343ac419c', 2, 109),
(8, 'c1aed5e836f14fd55a3e77e77e0c80a1', 3, 2),
(9, '37335b4b215d6ec880e7e0675224263c', 1, 4),
(10, 'e4d25eb8a76c2cf5338727d9cb44e29f', 3, 2),
(12, '8fe43851e103650de152b98f4230f9ff', 1, 4),
(13, '8fe43851e103650de152b98f4230f9ff', 3, 2),
(14, '8fe43851e103650de152b98f4230f9ff', 2, 109),
(22, '751726f17f20bbb2c6dd680414a9b3ed', 1, 4),
(23, '751726f17f20bbb2c6dd680414a9b3ed', 5, 2),
(24, '751726f17f20bbb2c6dd680414a9b3ed', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `iCheckoutId` int(10) NOT NULL,
  `iTransactionId` int(10) NOT NULL,
  `iProductId` int(3) NOT NULL,
  `iQty` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `iClientId` int(10) NOT NULL,
  `vClientName` int(50) NOT NULL,
  `vClientEmail` int(50) NOT NULL,
  `vClientContact` int(30) NOT NULL,
  `tClientAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `iFamilyId` int(3) NOT NULL,
  `vFamilyName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`iFamilyId`, `vFamilyName`) VALUES
(1, 'Crassulaceae'),
(2, 'Cactaceae');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `iFaqId` int(5) NOT NULL,
  `iFaqCategory` int(2) NOT NULL,
  `tQuestions` text NOT NULL,
  `tAnswer` text NOT NULL,
  `dtUpdated` datetime NOT NULL,
  `iUpdatedBy` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `genus`
--

CREATE TABLE `genus` (
  `iGenusId` int(3) NOT NULL,
  `vGenusName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genus`
--

INSERT INTO `genus` (`iGenusId`, `vGenusName`) VALUES
(1, 'Sedum'),
(2, 'Kalanchoe'),
(3, 'Echeveria'),
(4, 'Sempervivum'),
(5, 'Opuntia');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `iId` int(11) NOT NULL,
  `vUserCategory` varchar(20) NOT NULL,
  `tPermission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`iId`, `vUserCategory`, `tPermission`) VALUES
(1, 'Standard User', ''),
(2, 'Administrator', '{\"admin\": 1}');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `iOrderId` int(10) NOT NULL,
  `iTransactionId` int(10) NOT NULL,
  `iClientId` int(10) NOT NULL,
  `iTotalAmount` decimal(10,0) NOT NULL,
  `dtOrderDate` datetime NOT NULL,
  `iStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productcommentreply`
--

CREATE TABLE `productcommentreply` (
  `iProductCommentReplyId` int(10) NOT NULL,
  `iProductCommentId` int(10) NOT NULL,
  `tProductCommentReply` text NOT NULL,
  `dtProductCommentReplyTime` datetime NOT NULL,
  `vProductCommentReplyAuthor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productcomments`
--

CREATE TABLE `productcomments` (
  `iProductCommentId` int(10) NOT NULL,
  `tProductComment` text NOT NULL,
  `iProductId` int(3) NOT NULL,
  `dtProductCommentTime` datetime NOT NULL,
  `vCommentAuthor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `iProductId` int(5) NOT NULL,
  `vProductName` varchar(50) NOT NULL,
  `vProductScientificName` varchar(50) NOT NULL,
  `tProductDescription` text NOT NULL,
  `iFamilyId` int(3) NOT NULL,
  `iSubfamilyId` int(3) NOT NULL,
  `iTribeId` int(3) NOT NULL,
  `iSubTribeId` int(3) NOT NULL,
  `iGenusId` int(3) NOT NULL,
  `tProductImage1` text NOT NULL,
  `tProductImage2` text NOT NULL,
  `tProductImage3` text NOT NULL,
  `dPrice` decimal(10,0) NOT NULL,
  `iProductQuantity` int(3) NOT NULL,
  `dtUpdated` datetime NOT NULL,
  `iUpdatedById` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`iProductId`, `vProductName`, `vProductScientificName`, `tProductDescription`, `iFamilyId`, `iSubfamilyId`, `iTribeId`, `iSubTribeId`, `iGenusId`, `tProductImage1`, `tProductImage2`, `tProductImage3`, `dPrice`, `iProductQuantity`, `dtUpdated`, `iUpdatedById`) VALUES
(1, 'Sedum luteoviride', 'Sedum luteoviride R.T.Clausen', 'Sedum luteoviride is an evergreen, succulent subshrub with thick, short leaves at right angles to the stem. The leaves typically are glossy, yellow-green when grown in shade, but in strong light the tips turn a fleshy red coloration, which can deepen to orange-red in full sun. Winter color tends to cinnamon with green. Yellow flowers appear in profusion early in the year, in both terminal and lateral clusters, with smaller, bractlike leaves tucked in close to them. Over time, the plant becomes more or less tufted, dense, erect, up to 6 inches (15 cm) tall and wide, and the lower two thirds of the stems become bare.', 1, 1, 1, 1, 1, 'Sedum luteoviride.jpg', 'ab.jpg', '23915585_368938163545464_7516142747928439543_n.jpg', '65', 25, '2017-12-02 19:55:00', 1),
(2, 'Flower Dust Plant', 'Kalanchoe pumila Baker', 'Kalanchoe pumila is a dwarf succulent shrub up to 12 inches (30 cm) tall. The entire plant is densely covered with 1.5 inches (3.8 cm) long rounded leaves that are toothed and covered with soft whitish waxy hairs which give the plant a frosted look. In late winter to early spring appear the clusters of erectly-held 0.25 inch (0.6 cm) long pink-violet flowers with conspicuous yellow anthers.', 1, 1, 2, 0, 2, 'Flower Dust Plant.jpg', 'Flower Dust Plant.jpg', 'Flower Dust Plant.jpg', '200', 30, '2017-12-04 15:18:40', 1),
(3, 'Black Prince', 'Echeveria ‘Black Prince’', 'Echeveria \'Black Prince\' is a slow and low growing succulent plant. It produces clumps of short rosettes up to 3 inches (7.5 cm) wide with thin dark triangular, blackish leaves. These leaves first emerge greenish but darken to a deep lavender brown and with age the lower leaves widen out to as much as 1 inch (2.5 cm) at the base with an acuminate tip that has fine yellow edges. The dark red flowers appear on short stalks in late fall to early winter.', 1, 1, 1, 1, 3, 'Black Prince.jpg', 'Black Prince.jpg', 'Black Prince.jpg', '150', 20, '2017-12-04 15:22:39', 1),
(4, 'Pearl of Nurnberg', 'Echeveria ‘Perle Von Nürnberg’', 'Echeveria \'Perle Von Nürnberg\' is a beautiful succulent that has interestingly colored acuminate leaves that are a pale grayish brown with pink highlights and have a white powdery dusting. The leaves overlap in solitary, up to 6 inches (15 cm) wide rosettes. The flowers are corral pink in color on the exterior with a yellow interior and appear in summer on 1 foot (30 cm) long reddish-stemmed inflorescences.', 1, 1, 1, 1, 3, 'Pearl of Nuremberg.jpg', 'Pearl of Nuremberg.jpg', 'Pearl of Nuremberg.jpg', '65', 30, '2017-12-05 06:09:38', 1),
(5, 'Hen and Chicks', 'Sempervivum atlanticum (Ball) Ball', 'Sempervivum atlanticum is a succulent plant with small rosettes (up to 3.2 inches/8 cm in diameter) of light apple-green leaves in tight clusters. Rapid multiplier. Short spikes of pastel flowers appear in summer. After flowering, the mother rosette dies to leave room for the chicks.', 1, 1, 1, 1, 4, 'Hen and Chicks.jpeg', 'Hen and Chicks.jpeg', 'Hen and Chicks.jpeg', '60', 25, '2017-12-05 06:13:00', 1),
(6, 'Bunny Ears', 'Opuntia microdasys var. pallida Borg', 'Opuntia microdasys var. pallida is an evergreen perennial forms a dense shrub up to 24 inches (60 cm) tall (occasionally more), composed of green, pad-like stems, up to 6 inches (15 cm) long and up to 5 inches (12.5 cm) broad. It has no spines, but instead has numerous pale yellow glochids up to 0.12 inch (3 mm) long at each pale yellow aureole. The flowers are up to 2 inches (5 cm) across and have broad, yellow tepals, yellow anthers, and dark green stigma lobes. The flowers are followed by round to egg-shaped, up to 2 inches (5 cm) long, red to purplish, spineless but glochid-dotted fruits.', 2, 2, 3, 5, 0, 'Bunny Ears.jpg', 'Bunny Ears.jpg', 'Bunny Ears.jpg', '60', 40, '2017-12-05 06:16:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subfamily`
--

CREATE TABLE `subfamily` (
  `iSubfamilyId` int(3) NOT NULL,
  `iFamilyId` int(3) NOT NULL,
  `vSubfamilyName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subfamily`
--

INSERT INTO `subfamily` (`iSubfamilyId`, `iFamilyId`, `vSubfamilyName`) VALUES
(1, 1, 'Sedoideae'),
(2, 2, 'Opuntioideae');

-- --------------------------------------------------------

--
-- Table structure for table `subtribe`
--

CREATE TABLE `subtribe` (
  `iSubtribeId` int(3) NOT NULL,
  `iTribeName` varchar(3) NOT NULL,
  `vSubtribeName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subtribe`
--

INSERT INTO `subtribe` (`iSubtribeId`, `iTribeName`, `vSubtribeName`) VALUES
(0, '1', 'Sedinae');

-- --------------------------------------------------------

--
-- Table structure for table `tribe`
--

CREATE TABLE `tribe` (
  `iTribeId` int(3) NOT NULL,
  `vTribeName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tribe`
--

INSERT INTO `tribe` (`iTribeId`, `vTribeName`) VALUES
(1, 'Sedeae'),
(2, 'Kalanchoeae'),
(3, 'Opuntieae');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `iId` int(11) NOT NULL,
  `vUsername` varchar(20) NOT NULL,
  `vPassword` varchar(64) NOT NULL,
  `vSalt` varchar(32) NOT NULL,
  `vName` varchar(50) NOT NULL,
  `dtJoined` datetime NOT NULL,
  `iGroup` int(11) NOT NULL,
  `iLogged` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iId`, `vUsername`, `vPassword`, `vSalt`, `vName`, `dtJoined`, `iGroup`, `iLogged`) VALUES
(1, 'admin', '3e9f2774b36bf1350d1abf40a4aea78c37feadf6ac01323c4599d8c26d3f040d', 'Eºê~ØÚU•½P­{G¹®?¾ñÅ,¾g2ì‹wj…r', 'Dan Limuel Pangan', '2017-11-30 17:22:58', 1, 0),
(2, 'sermil', '21b83ff5d1607326e449eb2b14fd7e932b01d5780a51e1e74cc3c330673a51d5', ')´î¤’ýÊmõ’\r2¾o³×iI´zÓm¡„óQZr ', 'Sermil Matoto', '2017-12-07 17:38:53', 1, 0),
(10, 'jeremy', 'c5036ca01c980283bf7ed8eeb01ecbe85e58f90c071bc0448dd9c86226af1b27', 'd¡:¶\Z’N(ùhÏ)Ì6\nKŠz°~yÙË·º·Æ_', 'Jeremy Rotoni', '2017-12-07 17:59:14', 1, 0),
(13, 'secret', '13a20efe0b7b7e67f918758d61f25ffc5e1749b76f6004efd7cffd04df53bf45', 'ÕØÙ”èQ8Ã˜Òî‰Mò¹$§®\\K\r™?Êu|', 'Kirigaya Kazuto', '2017-12-07 18:22:15', 1, 0),
(14, 'asuna', 'a603a5b39f71437cba8199d05b1265990f38591f87f49cde86c395ed5e82f814', '˜à{ª¨m3°~É€¶¤Ê\\Úâ	ƒŒñ;qÐ 3e', 'Yuki Asuna', '2017-12-07 18:23:51', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_session`
--

CREATE TABLE `user_session` (
  `iId` int(11) NOT NULL,
  `iUserId` int(11) NOT NULL,
  `tHash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`iCartId`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`iCheckoutId`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`iClientId`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`iFamilyId`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`iFaqId`);

--
-- Indexes for table `genus`
--
ALTER TABLE `genus`
  ADD PRIMARY KEY (`iGenusId`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`iId`);

--
-- Indexes for table `productcommentreply`
--
ALTER TABLE `productcommentreply`
  ADD PRIMARY KEY (`iProductCommentReplyId`);

--
-- Indexes for table `productcomments`
--
ALTER TABLE `productcomments`
  ADD PRIMARY KEY (`iProductCommentId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`iProductId`);

--
-- Indexes for table `subfamily`
--
ALTER TABLE `subfamily`
  ADD PRIMARY KEY (`iSubfamilyId`);

--
-- Indexes for table `tribe`
--
ALTER TABLE `tribe`
  ADD PRIMARY KEY (`iTribeId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iId`);

--
-- Indexes for table `user_session`
--
ALTER TABLE `user_session`
  ADD PRIMARY KEY (`iId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `iCartId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `iCheckoutId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `iClientId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `family`
--
ALTER TABLE `family`
  MODIFY `iFamilyId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `iFaqId` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `genus`
--
ALTER TABLE `genus`
  MODIFY `iGenusId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `iId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `productcomments`
--
ALTER TABLE `productcomments`
  MODIFY `iProductCommentId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `iProductId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `subfamily`
--
ALTER TABLE `subfamily`
  MODIFY `iSubfamilyId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tribe`
--
ALTER TABLE `tribe`
  MODIFY `iTribeId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `iId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_session`
--
ALTER TABLE `user_session`
  MODIFY `iId` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
