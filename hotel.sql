-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2018 at 01:22 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ys_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `credit_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `status_description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT DELAYED IGNORE INTO `branches` (`id`, `name`, `location`, `address`, `longitude`, `latitude`, `phone`, `link`) VALUES
(1, 'Hotel Danieli, a Luxury Collection Hotel, Venice', 'Italy', 'Riva degli Schiavoni, Castello 4196, Venice 30122 Italy', 45.4338677, 12.3420638, '+39 041 522 6480', 'https://www.marriott.com/hotels/travel/vcelc-hotel-danieli-a-luxury-collection-hotel-venice/'),
(2, 'JW Marriott Hotel Hong Kong, China', 'China', 'Pacific Place, 88 Queensway, Hong Kong Hong Kong SAR, PRC', 22.2774713, 114.16638468, '+852 2810 8366', 'https://www.marriott.com/hotels/travel/hkgdt-jw-marriott-hotel-hong-kong/'),
(3, 'JW Marriott Hotel Cairo, Egypt', 'Egypt', 'Ring Road- Mirage City- P.O.Box 427, Heliopolis, Cairo 11757 Egypt', 30.0720694, 31.43469651, '+20 2 24115588', 'https://www.marriott.com/hotels/local-things-to-do/caijw-jw-marriott-hotel-cairo/'),
(4, 'Courtyard Paris Roissy Charles De Gaulle Airport Hotel', 'France', 'Rue de la Chapelle, Charles de Gaulle Airport, Le Mesnil-Amelot 77990 France', 49.00665965, 2.57076947, '+33 1 60 03 63 00', 'https://www.marriott.com/hotels/travel/parxa-courtyard-paris-roissy-charles-de-gaulle-airport-hotel/');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_guests` int(11) NOT NULL,
  `no_of_beds` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT DELAYED IGNORE INTO `rooms` (`id`, `name`, `no_of_guests`, `no_of_beds`, `size`, `description`, `price`) VALUES
(1, 'Deluxe', 2, 1, 52, 'Expressions of Marriott design and culture compliment the stylish, clean and sophisticated lines of these elegant interiors. All rooms have spacious private balconies and come with a choice of one king size bed or two singles.\nAlternatively, choose to stay in our Deluxe Pool rooms where each unit opens out to a spacious terrace with direct pool access.', 1000),
(2, 'MARIOTT CLUB DELUXE', 2, 2, 52, 'The Marriott Club Deluxe Room is the perfect combination of technology and contemporary design, created to meet the needs of the busy executive. Designed for ease of working and relaxing, it features high-speed Internet access, an oversized writing desk and a spacious layout for ultimate convenience.\r\n\r\nGuests are also entitled to the full range of Marriott Club privileges.', 1500),
(3, 'MARRIOTT SUITE', 4, 2, 104, 'The Marriott Suites decor and furnishings are elegant and well designed for today’s sophisticated guest. Each suite comprises of a separate living room complete and a dining area.\r\n\r\nGuests are also entitled to the full range of Dusit Club privileges.', 2000),
(4, 'EXECUTIVE SUITE', 5, 5, 156, 'The Executive Suites are designed with a spacious bedroom, luxurious dining room and a charming living room with DVD providing the ultimate in convenience, privacy and entertainment. An around-the-clock butler is available to make every guest feel like royalty.', 2500),
(5, 'MARRIOTT APARTMENT', 2, 1, 104, 'With a bedroom, living room and kitchenette, the Marriott Residential Apartments offer everything guests need to make this a home away from home. Each apartment comprises a separate living room, complete with DVD player on-demand service, and a dining area. An around-the-clock butler is available to make every guest feel like royalty.', 1300),
(6, 'SUPERIOR ROOM', 4, 4, 80, 'New generation. design, modern and comfortable: features air conditioning, 32" TV with connectivity panel, free WIFI, minibar, hair dryer, laptop size safe box, tea and coffee facilities.', 1000),
(7, 'STANDARD ROOM', 4, 4, 60, 'A spacious room with king bed, en suite bath or shower, sofa bed, work area, TV with pay movies and internet access, broadband connection, hair dryer, safe and tea/coffee.', 500);

-- --------------------------------------------------------

--
-- Table structure for table `rooms_booking`
--

CREATE TABLE `rooms_booking` (
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `no_of_rooms` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `blocked` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT DELAYED IGNORE INTO `users` (`id`, `name`, `address`, `phone`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `blocked`, `is_admin`) VALUES
(1, 'admin', 'Cairo', '01222681420', 'admin@gmail.com', '$2y$10$b9l5P6gQIY4CS5d7/YHOSe0HYZkOOWsrdza3.pQMDg5c087iazb12', 'j0GSqyICSlrQd9VHvZqD5XXkIPOK6YtJuofCKg72MdygnPPJ5YgkPmwQYjek', '2018-12-23 22:33:17', '2018-12-23 22:33:17', 0, 1)

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms_booking`
--
ALTER TABLE `rooms_booking`
  ADD PRIMARY KEY (`booking_id`,`room_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
