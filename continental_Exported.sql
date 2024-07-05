-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2024 at 05:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `continental`
--

-- --------------------------------------------------------

--
-- Table structure for table `historicalentries`
--

CREATE TABLE `historicalentries` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `region` varchar(100) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `historicalentries`
--

INSERT INTO `historicalentries` (`id`, `title`, `content`, `region`, `created_by`, `image_path`) VALUES
(11, 'Africa ', 'Ebola Outbreak (2014-2016):\r\nThe Ebola virus ravaged West Africa, particularly Guinea, Liberia, and Sierra Leone, causing over 11,000 deaths. The outbreak overwhelmed healthcare systems and led to a global response for containment and vaccine development. It highlighted critical gaps in emergency health response and the need for better preparedness.\r\n', 'Democratic Republic of the Congo (MAJOR)', NULL, 'uploads/11.png'),
(12, 'Africa', 'South Sudanese Civil War (2013-present):\r\nFollowing a power struggle between President Salva Kiir and his former deputy Riek Machar, South Sudan plunged into civil war. The conflict has caused significant human suffering, displacing millions and leading to severe humanitarian crises. Despite peace agreements, violence and instability persist, impeding development in the young nation.', 'Sudan ', NULL, 'uploads/12.png'),
(13, 'Asia ', 'Rohingya Crisis (2017-present): In 2017, military operations in Myanmar\'s Rakhine State forced over 700,000 Rohingya Muslims to flee to Bangladesh. The crisis, marked by accusations of ethnic cleansing, created dire conditions in refugee camps. International pressure has yet to resolve the situation or secure rights for the Rohingya.', 'Bangladesh ', NULL, 'uploads/13.png'),
(14, 'Asia ', 'Hong Kong Protests (2019-2020): Triggered by a controversial extradition bill, massive protests erupted in Hong Kong, evolving into demands for greater democracy and autonomy from China. The protests saw intense clashes with police and widespread unrest. They significantly impacted Hong Kong’s political landscape and its relationship with mainland China.', 'Hong Kong ', NULL, 'uploads/14.png'),
(15, 'Europe ', 'Brexit (2016-2020):\r\nThe UK voted to leave the European Union in a 2016 referendum, sparking years of complex negotiations. Brexit officially occurred in January 2020, reshaping the UK\'s economic and political landscape. The decision has had lasting impacts on UK-EU relations and internal British politics.', 'United Kingdom ', NULL, 'uploads/15.png'),
(16, 'Europe ', 'Ukrainian Crisis and Crimean Annexation (2014-present): Russia\'s annexation of Crimea in 2014 led to ongoing conflict in Eastern Ukraine between Ukrainian forces and Russian-backed separatists. The crisis has caused thousands of deaths and significant displacement. It continues to strain Russia-West relations and impacts regional stability.', 'Ukraine ', NULL, 'uploads/16.png'),
(17, 'North America ', 'US Presidential Elections (2016 and 2020):\r\nDonald Trump\'s 2016 election ushered in a period of intense political polarization and policy shifts in the US. The 2020 election saw Joe Biden\'s victory, followed by disputes over election integrity and the January 6 Capitol riot. These elections have deeply influenced the American political and social landscape.', 'United States Of America ', NULL, 'uploads/17.png'),
(18, 'North America ', 'Black Lives Matter Movement (2013-present): Originating from protests against police brutality and systemic racism, the Black Lives Matter movement has grown significantly since 2013. It gained global attention following the killing of George Floyd in 2020, sparking widespread demonstrations. BLM has influenced public discourse on racial justice and led to calls for reform.', 'United States Of America ', NULL, 'uploads/18.png'),
(19, 'South America ', 'Venezuelan Crisis (2010-present): Venezuela faces severe economic collapse and political turmoil, leading to hyperinflation, food shortages, and mass emigration. The crisis deepened under President Nicolás Maduro, with his disputed 2018 re-election exacerbating tensions. International efforts and sanctions have yet to resolve the humanitarian and political crisis.', 'Venezuela ', NULL, 'uploads/19.png'),
(20, 'South America ', 'Brazilian Political Turmoil (2016-present): Brazil\'s political landscape has been unstable since the impeachment of President Dilma Rousseff in 2016 over corruption. The rise of Jair Bolsonaro, a polarizing far-right leader, has further divided the country. Controversies during his presidency include handling of the COVID-19 pandemic and deforestation in the Amazon.', 'Brazil ', NULL, 'uploads/20.png'),
(21, 'Oceania ', 'Australian Bushfires (2019-2020): The \"Black Summer\" bushfires devastated vast areas of Australia, burning over 18 million hectares and causing immense ecological and human damage. The fires underscored the pressing challenges of climate change and disaster preparedness. Recovery efforts and policy discussions on environmental protection continue to evolve.', 'Australia ', NULL, 'uploads/21.png'),
(22, 'Oceania ', 'New Zealand Mosque Shootings (2019):\r\nThe Christchurch mosque shootings, carried out by a white supremacist, resulted in 51 deaths and widespread condemnation. New Zealand responded with swift gun law reforms and initiatives against online hate speech. The tragedy highlighted the global threat of extremism and the need for community solidarity.', 'New Zealand', NULL, 'uploads/22.png'),
(23, 'Antarctica ', 'Climate Change and Ice Melt:\r\nAntarctica is witnessing accelerated ice loss, particularly in the West Antarctic Ice Sheet, contributing to rising sea levels. The melting is driven by warming temperatures and poses a significant threat to global coastal areas. Research continues to monitor changes and assess the long-term impacts on climate.', 'Antarctica ', NULL, 'uploads/23.png'),
(24, 'Antarctica', 'Scientific Discoveries and International Cooperation:\r\nAntarctica remains a key site for groundbreaking research, providing insights into climate history and extreme ecosystems. International collaboration under the Antarctic Treaty ensures peaceful scientific exploration and environmental protection. Recent studies have revealed ancient microbial life and adaptations to harsh conditions, advancing our understanding of life on Earth.', 'Antarctica', NULL, 'uploads/24.png');

-- --------------------------------------------------------

--
-- Table structure for table `timelines`
--

CREATE TABLE `timelines` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'Ezio_Auditore_da', 'firenze', 'admin'),
(2, 'Agent_47', 'rosewood', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `historicalentries`
--
ALTER TABLE `historicalentries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `timelines`
--
ALTER TABLE `timelines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `historicalentries`
--
ALTER TABLE `historicalentries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `timelines`
--
ALTER TABLE `timelines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `historicalentries`
--
ALTER TABLE `historicalentries`
  ADD CONSTRAINT `historicalentries_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `timelines`
--
ALTER TABLE `timelines`
  ADD CONSTRAINT `timelines_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
