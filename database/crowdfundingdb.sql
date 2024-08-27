-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2024 at 04:11 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crowdfundingdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `email`, `password_hash`, `photo`, `created_at`) VALUES
(1, 'admin1', 'admin@example.com', 'admin@123', 'account.jpg\r\n', '2024-08-11 13:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `approvedfundraisers`
--

CREATE TABLE `approvedfundraisers` (
  `approved_id` int(11) NOT NULL,
  `fundraiser_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT current_timestamp(),
  `status` enum('Approved','Reject','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approvedfundraisers`
--

INSERT INTO `approvedfundraisers` (`approved_id`, `fundraiser_id`, `admin_id`, `approved_at`, `status`) VALUES
(13, 3, 1, '2024-02-01 12:00:00', 'Approved'),
(17, 5, 1, '2024-08-12 07:25:26', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `campaign_id` int(11) NOT NULL,
  `fundraiser_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `more_about` varchar(400) NOT NULL,
  `goal_amount` decimal(10,2) NOT NULL,
  `raised_amount` decimal(10,2) DEFAULT 0.00,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `category` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`campaign_id`, `fundraiser_id`, `title`, `description`, `more_about`, `goal_amount`, `raised_amount`, `start_date`, `end_date`, `status`, `photo`, `category`, `created_at`) VALUES
(25, 1, 'Save the Forests', 'A campaign to raise funds for reforestation efforts.', 'Charitable giving is the act of donating money, goods, or time to the less fortunate, either directly or through a charitable trust or another worthy cause.[6] Charitable giving as a religious act or duty is referred to as almsgiving or alms. The name stems from the most obvious expression of the virtue of charity: providing recipients with the means they need to survive. The impoverished, particu', '50000.00', '12000.00', '2024-01-01', '2024-06-01', 'Active', 'poor1.jpg\r\n', 'Enviorment', '2024-07-30 11:07:59'),
(26, 2, 'Help Children in Need', 'Providing educational resources to underprivileged children.', 'Charitable giving is the act of donating money, goods, or time to the less fortunate, either directly or through a charitable trust or another worthy cause.[6] Charitable giving as a religious act or duty is referred to as almsgiving or alms. The name stems from the most obvious expression of the virtue of charity: providing recipients with the means they need to survive. The impoverished, particu', '24700.00', '5000.00', '2024-02-01', '2024-07-01', 'Active', 's1.jpg', 'Charity', '2024-07-30 11:07:59'),
(27, 3, 'Cancer Research', 'Raising funds for cancer research and treatment.', 'Charitable giving is the act of donating money, goods, or time to the less fortunate, either directly or through a charitable trust or another worthy cause.[6] Charitable giving as a religious act or duty is referred to as almsgiving or alms. The name stems from the most obvious expression of the virtue of charity: providing recipients with the means they need to survive. The impoverished, particu', '98478.00', '26522.00', '2024-03-01', '2024-08-01', 'Active', 's2.jpg', 'Medical', '2024-07-30 11:07:59'),
(28, 4, 'Animal Shelter Support', 'Support for local animal shelters and rescue operations.', 'Charitable giving is the act of donating money, goods, or time to the less fortunate, either directly or through a charitable trust or another worthy cause.[6] Charitable giving as a religious act or duty is referred to as almsgiving or alms. The name stems from the most obvious expression of the virtue of charity: providing recipients with the means they need to survive. The impoverished, particu', '15000.00', '3000.00', '2024-04-01', '2024-09-01', 'Active', 's3.jpg', 'Animal', '2024-07-30 11:07:59'),
(29, 5, 'Disaster Relief Fund', 'Providing relief to victims of natural disasters.', 'Charitable giving is the act of donating money, goods, or time to the less fortunate, either directly or through a charitable trust or another worthy cause.[6] Charitable giving as a religious act or duty is referred to as almsgiving or alms. The name stems from the most obvious expression of the virtue of charity: providing recipients with the means they need to survive. The impoverished, particu', '80000.00', '10000.00', '2024-05-01', '2024-10-01', 'Active', 'w1.jpg', 'Enviorment', '2024-07-30 11:07:59'),
(30, 6, 'Homeless Outreach', 'Fundraising for shelters and services for the homeless.', 'Charitable giving is the act of donating money, goods, or time to the less fortunate, either directly or through a charitable trust or another worthy cause.[6] Charitable giving as a religious act or duty is referred to as almsgiving or alms. The name stems from the most obvious expression of the virtue of charity: providing recipients with the means they need to survive. The impoverished, particu', '19600.00', '7400.00', '2024-06-01', '2024-11-01', 'Active', 'w2.jpg', 'Poverty', '2024-07-30 11:07:59'),
(31, 7, 'Clean Water Initiative', 'Providing clean drinking water to underserved communities.', 'Charitable giving is the act of donating money, goods, or time to the less fortunate, either directly or through a charitable trust or another worthy cause.[6] Charitable giving as a religious act or duty is referred to as almsgiving or alms. The name stems from the most obvious expression of the virtue of charity: providing recipients with the means they need to survive. The impoverished, particu', '59900.00', '15000.00', '2024-07-01', '2024-12-01', 'Active', 'w3.jpg', 'Enviorment', '2024-07-30 11:07:59'),
(32, 8, 'Support for Veterans', 'Helping veterans with medical and rehabilitation needs.', 'Charitable giving is the act of donating money, goods, or time to the less fortunate, either directly or through a charitable trust or another worthy cause.[6] Charitable giving as a religious act or duty is referred to as almsgiving or alms. The name stems from the most obvious expression of the virtue of charity: providing recipients with the means they need to survive. The impoverished, particu', '30000.00', '6000.00', '2024-08-01', '2024-01-01', 'Active', 'poor2.jpg', 'Charity', '2024-07-30 11:07:59'),
(33, 9, 'Youth Sports Programs', 'Funding youth sports programs and activities.', 'Charitable giving is the act of donating money, goods, or time to the less fortunate, either directly or through a charitable trust or another worthy cause.[6] Charitable giving as a religious act or duty is referred to as almsgiving or alms. The name stems from the most obvious expression of the virtue of charity: providing recipients with the means they need to survive. The impoverished, particu', '10000.00', '2000.00', '2024-09-01', '2025-02-01', 'Active', 'poor3.jpg', 'Medical', '2024-07-30 11:07:59'),
(35, 10, 'Rescue Animals', 'Save Animals,they also have right to live.', 'Charitable giving is the act of donating money, goods, or time to the less fortunate, either directly or through a charitable trust or another worthy cause.[6] Charitable giving as a religious act or duty is referred to as almsgiving or alms. The name stems from the most obvious expression of the virtue of charity: providing recipients with the means they need to survive. The impoverished, particu', '497170.00', '302130.00', '2024-08-07', '2024-08-31', 'Active', 'poor1.jpg', 'Animal', '2024-08-06 09:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `donation_id` int(11) NOT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  `donor_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `donation_date` datetime NOT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`donation_id`, `campaign_id`, `donor_id`, `amount`, `donation_date`, `message`) VALUES
(32, 25, 1, '1000.00', '2024-01-15 10:00:00', 'completed'),
(33, 26, 2, '500.00', '2024-02-15 11:00:00', 'completed'),
(35, 28, 4, '1500.00', '2024-04-15 13:00:00', 'completed'),
(36, 29, 5, '3000.00', '2024-05-15 14:00:00', 'completed'),
(37, 30, 6, '700.00', '2024-06-15 15:00:00', 'completed'),
(42, 35, 1, '300.00', '2024-08-11 07:52:26', 'Completed'),
(43, 26, 1, '300.00', '2024-08-11 08:00:30', 'Completed'),
(45, 31, 1, '100.00', '2024-08-11 08:23:44', 'Completed'),
(49, 30, 1, '400.00', '2024-08-16 14:01:40', 'Completed'),
(50, 35, 1, '2000.00', '2024-08-16 14:44:08', 'Completed'),
(51, 27, 1, '200.00', '2024-08-16 18:15:11', 'Completed'),
(52, 35, 1, '100.00', '2024-08-17 09:28:17', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `donor_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `occupation` varchar(25) NOT NULL,
  `contact_information` text DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`donor_id`, `username`, `email`, `password_hash`, `photo`, `occupation`, `contact_information`, `description`, `created_at`) VALUES
(1, 'johndoe', 'johndoe@example.com', '18', 'profile1.jpg', 'Doctor', '123 Elm Street, Springfield', 'I am John from Dehradun. I did my Bachelors in Computer Science from [college name] in the year 2016. Then, I pursued my MBA with majors in marketing from [college name] in the year 2018.', '2024-08-02 04:45:08'),
(2, 'janedoe', 'janedoe@example.com', 'hashedpassword2', 'profile2.jpg', 'Doctor', '456 Oak Avenue, Springfield', 'I am John from Dehradun. I did my Bachelors in Computer Science from [college name] in the year 2016. Then, I pursued my MBA with majors in marketing from [college name] in the year 2018.', '2024-08-02 04:45:08'),
(3, 'bsmith', 'bsmith@example.com', 'hashedpassword3', 'profile3.jpg', 'Doctor', '789 Pine Road, Springfield', 'I am John from Dehradun. I did my Bachelors in Computer Science from [college name] in the year 2016. Then, I pursued my MBA with majors in marketing from [college name] in the year 2018.', '2024-08-02 04:45:08'),
(4, 'cjohnson', 'cjohnson@example.com', 'hashedpassword4', 'profile4.jpg', 'Doctor', '101 Maple Street, Springfield', 'I am John from Dehradun. I did my Bachelors in Computer Science from [college name] in the year 2016. Then, I pursued my MBA with majors in marketing from [college name] in the year 2018.', '2024-08-02 04:45:08'),
(5, 'dwhite', 'dwhite@example.com', 'hashedpassword5', 'profile5.jpg', 'Doctor', '202 Birch Lane, Springfield', 'I am John from Dehradun. I did my Bachelors in Computer Science from [college name] in the year 2016. Then, I pursued my MBA with majors in marketing from [college name] in the year 2018.', '2024-08-02 04:45:08'),
(6, 'emartin', 'emartin@example.com', 'hashedpassword6', 'profile6.jpg', 'Doctor', '303 Cedar Drive, Springfield', 'I am John from Dehradun. I did my Bachelors in Computer Science from [college name] in the year 2016. Then, I pursued my MBA with majors in marketing from [college name] in the year 2018.', '2024-08-02 04:45:08'),
(7, 'fsanders', 'fsanders@example.com', 'hashedpassword7', 'profile7.jpg', 'Doctor', '404 Spruce Court, Springfield', 'I am John from Dehradun. I did my Bachelors in Computer Science from [college name] in the year 2016. Then, I pursued my MBA with majors in marketing from [college name] in the year 2018.', '2024-08-02 04:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Not Replied','Replied') NOT NULL DEFAULT 'Not Replied'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `status`) VALUES
(1, 'Kirti Sharma', 'Ks6741948@gmail.com', '6397490046', 'notify', 'Hey I\'m Kirti Sharma.And I wanna know how can I register myself as volunteer.', '2024-08-16 07:40:09', 'Not Replied'),
(2, '', '', '', '', '', '2024-08-16 07:40:37', 'Not Replied'),
(3, 'Kirti Sharma', 'Ks61948@gmail.com', '06397490046', 'notify', 'vhjvjhvh', '2024-08-17 08:30:36', 'Not Replied'),
(4, 'Kirti Sharma', 'Ks671948@gmail.com', '06397490046', 'fsd', 'fvfdbdfb', '2024-08-17 08:32:47', 'Not Replied'),
(5, 'Kirti Sharma', 'Ks6948@gmail.com', '06397490046', 'notify', 'hjkjhlkh', '2024-08-17 08:38:50', 'Replied');

-- --------------------------------------------------------

--
-- Table structure for table `fundraisers`
--

CREATE TABLE `fundraisers` (
  `fundraiser_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `contact_information` text DEFAULT NULL,
  `organization_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `adhaar_number` int(16) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fundraisers`
--

INSERT INTO `fundraisers` (`fundraiser_id`, `username`, `email`, `password_hash`, `profile_picture`, `contact_information`, `organization_name`, `description`, `adhaar_number`, `status`) VALUES
(1, 'John Sharma', 'john@example.com', '16', 'profile1.jpg', '6397490046', 'Passionate about education.', 'hello this is John Sharma', 0, 'Approved'),
(2, 'Jane Smith', 'jane@example.com', 'password123', 'profile2.jpg', '555-5678', 'Health care advocate.', '2024-02-01 11:00:00', 0, 'Approved'),
(3, 'Alice Johnson', 'alice@example.com', 'password123', 'profile3.jpg', '555-8765', 'Animal lover.', '2024-03-01 12:00:00', 0, 'Approved'),
(4, 'Bob Brown', 'bob@example.com', 'password123', 'profile4.jpg', '555-4321', 'Environmentalist.', '2024-04-01 13:00:00', 0, 'Approved'),
(5, 'Carol White', 'carol@example.com', 'password123', 'profile5.jpg', '555-3456', 'Community builder.', '2024-05-01 14:00:00', 0, 'Approved'),
(6, 'David Green', 'david@example.com', 'password123', 'profile6.jpg', '555-6543', 'Tech enthusiast.', '2024-06-01 15:00:00', 0, 'Approved'),
(7, 'Eva Black', 'eva@example.com', 'password123', 'profile7.jpg', '555-7890', 'Art promoter.', '2024-07-01 16:00:00', 0, 'Approved'),
(8, 'Frank Gray', 'frank@example.com', 'password123', 'profile8.jpg', '555-0987', 'Sports coach.', '2024-08-01 17:00:00', 0, 'Approved'),
(9, 'Grace Blue', 'grace@example.com', 'password123', 'profile9.jpg', '555-5432', 'Music lover.', '2024-09-01 18:00:00', 0, 'Approved'),
(10, 'Hank Yellow', 'hank@example.com', 'password123', 'profile10.jpg', '555-2109', 'Science teacher.', '2024-10-01 19:00:00', 0, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `photo_id` int(11) NOT NULL,
  `fundraiser_id` int(11) DEFAULT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `upload_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`photo_id`, `fundraiser_id`, `photo_path`, `upload_date`) VALUES
(1, 1, 'gallery1_1.jpg', '2024-01-01 10:00:00'),
(2, 1, 'gallery1_2.jpg', '2024-01-05 12:00:00'),
(3, 2, 'gallery2_1.jpg', '2024-02-01 14:00:00'),
(4, 2, 'gallery2_2.jpg', '2024-02-10 16:00:00'),
(5, 3, 'gallery3_1.jpg', '2024-03-01 18:00:00'),
(6, 3, 'gallery3_2.jpg', '2024-03-15 20:00:00'),
(7, 4, 'gallery4_1.jpg', '2024-04-01 22:00:00'),
(8, 4, 'gallery4_2.jpg', '2024-04-10 09:00:00'),
(9, 5, 'gallery5_1.jpg', '2024-05-01 11:00:00'),
(10, 5, 'gallery5_2.jpg', '2024-05-15 13:00:00'),
(11, 6, 'gallery6_1.jpg', '2024-06-01 15:00:00'),
(12, 6, 'gallery6_2.jpg', '2024-06-10 17:00:00'),
(13, 7, 'gallery7_1.jpg', '2024-07-01 19:00:00'),
(14, 7, 'gallery7_2.jpg', '2024-07-15 21:00:00'),
(15, 8, 'gallery8_1.jpg', '2024-08-01 23:00:00'),
(16, 8, 'gallery8_2.jpg', '2024-08-10 08:00:00'),
(17, 9, 'gallery9_1.jpg', '2024-09-01 10:00:00'),
(18, 9, 'gallery9_2.jpg', '2024-09-15 12:00:00'),
(19, 10, 'gallery10_1.jpg', '2024-10-01 14:00:00'),
(20, 10, 'gallery10_2.jpg', '2024-10-10 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `bio_description` text DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `hours` int(10) NOT NULL,
  `status` enum('Completed','Not Completed') NOT NULL DEFAULT 'Not Completed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`id`, `name`, `bio_description`, `occupation`, `email`, `address`, `photo`, `created_at`, `hours`, `status`) VALUES
(1, 'John Doe', 'Jasmine Montgomery is a Senior Hiring Manager at L’Oreal based in New York. She recruits across several business units to connect with the brightest talent from around the globe.', 'Web Developer', 'john.doe@example.com', '123 Elm Street, Springfield', '1.jpg', '2024-07-31 18:56:31', 20, 'Completed'),
(2, 'Jane Smith', 'Jasmine Montgomery is a Senior Hiring Manager at L’Oreal based in New York. She recruits across several business units to connect with the brightest talent from around the globe.', 'Marketing Specialist', 'jane.smith@example.com', '456 Oak Avenue, Springfield', '2.jpg', '2024-07-31 18:56:31', 20, 'Completed'),
(3, 'Alice Johnson', 'Jasmine Montgomery is a Senior Hiring Manager at L’Oreal based in New York. She recruits across several business units to connect with the brightest talent from around the globe.', 'Graphic Designer', 'alice.johnson@example.com', '789 Pine Road, Springfield', '3.jpg', '2024-07-31 18:56:31', 20, 'Completed'),
(4, 'Bob Brown', 'Jasmine Montgomery is a Senior Hiring Manager at L’Oreal based in New York. She recruits across several business units to connect with the brightest talent from around the globe.', 'Software Engineer', 'bob.brown@example.com', '321 Maple Lane, Springfield', '4.jpg', '2024-07-31 18:56:31', 20, 'Completed'),
(5, 'Carol White', 'Jasmine Montgomery is a Senior Hiring Manager at L’Oreal based in New York. She recruits across several business units to connect with the brightest talent from around the globe.', 'Content Writer', 'carol.white@example.com', '654 Birch Drive, Springfield', '5.jpg', '2024-07-31 18:56:31', 20, 'Completed'),
(6, 'David Green', 'Jasmine Montgomery is a Senior Hiring Manager at L’Oreal based in New York. She recruits across several business units to connect with the brightest talent from around the globe.', 'Event Planner', 'david.green@example.com', '987 Cedar Street, Springfield', '6.jpg', '2024-07-31 18:56:31', 20, 'Completed'),
(7, 'Emily Davis', 'Jasmine Montgomery is a Senior Hiring Manager at L’Oreal based in New York. She recruits across several business units to connect with the brightest talent from around the globe.', 'Project Manager', 'emily.davis@example.com', '159 Willow Way, Springfield', '7.jpg', '2024-07-31 18:56:31', 20, 'Completed'),
(8, 'Frank Wilson', 'Jasmine Montgomery is a Senior Hiring Manager at L’Oreal based in New York. She recruits across several business units to connect with the brightest talent from around the globe.', 'Data Analyst', 'frank.wilson@example.com', '753 Elm Street, Springfield', '8.jpg', '2024-07-31 18:56:31', 20, 'Completed'),
(9, 'Grace Martinez', 'Jasmine Montgomery is a Senior Hiring Manager at L’Oreal based in New York. She recruits across several business units to connect with the brightest talent from around the globe.', 'Legal Advisor', 'grace.martinez@example.com', '852 Oak Avenue, Springfield', '9.jpg', '2024-07-31 18:56:31', 20, 'Completed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `approvedfundraisers`
--
ALTER TABLE `approvedfundraisers`
  ADD PRIMARY KEY (`approved_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `fk_fundraiser` (`fundraiser_id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`campaign_id`),
  ADD KEY `fundraiser_id` (`fundraiser_id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `campaign_id` (`campaign_id`),
  ADD KEY `donor_id` (`donor_id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`donor_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fundraisers`
--
ALTER TABLE `fundraisers`
  ADD PRIMARY KEY (`fundraiser_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `fundraiser_id` (`fundraiser_id`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `approvedfundraisers`
--
ALTER TABLE `approvedfundraisers`
  MODIFY `approved_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `campaign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fundraisers`
--
ALTER TABLE `fundraisers`
  MODIFY `fundraiser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approvedfundraisers`
--
ALTER TABLE `approvedfundraisers`
  ADD CONSTRAINT `approvedfundraisers_ibfk_1` FOREIGN KEY (`fundraiser_id`) REFERENCES `fundraisers` (`fundraiser_id`),
  ADD CONSTRAINT `approvedfundraisers_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`),
  ADD CONSTRAINT `fk_fundraiser` FOREIGN KEY (`fundraiser_id`) REFERENCES `fundraisers` (`fundraiser_id`) ON DELETE CASCADE;

--
-- Constraints for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD CONSTRAINT `campaigns_ibfk_1` FOREIGN KEY (`fundraiser_id`) REFERENCES `fundraisers` (`fundraiser_id`);

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`campaign_id`),
  ADD CONSTRAINT `donations_ibfk_2` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`donor_id`);

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`fundraiser_id`) REFERENCES `fundraisers` (`fundraiser_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
