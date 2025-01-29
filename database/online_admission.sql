-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2025 at 09:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission_status`
--

CREATE TABLE `admission_status` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `pin` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `serial_number`, `pin`, `first_name`, `surname`, `email`, `password`) VALUES
(1, 'N250B6605EA', '291293', 'Abdul-Hafiz', 'Yussif', 'imabdul@gmail.com', '$2y$10$DDXhbWiQsGrsIyCyzX8i..mdo9p.05aB2t7Ct7v5waJuQK4d6lZX2'),
(2, 'N25FB3F5ADF', '916564', 'IKIMATU', 'Alhassan', 'imabdulhafiz@gmail.com', '$2y$10$KVZP3Ei9e21TeSlZRQDQx.v55yKPH/WVwHJegI8dGCZhItW06kFwa');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `application_status` enum('Pending','Completed','Rejected') DEFAULT 'Pending',
  `payment_status` enum('Unpaid','Paid') DEFAULT 'Unpaid',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `application_status`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pending', 'Unpaid', '2025-01-22 15:01:15', '2025-01-22 15:01:15'),
(2, 2, 'Pending', 'Unpaid', '2025-01-23 07:15:20', '2025-01-23 07:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `educational_background`
--

CREATE TABLE `educational_background` (
  `id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `course` varchar(255) DEFAULT NULL,
  `qualification` varchar(50) NOT NULL,
  `start_year` date NOT NULL,
  `end_year` date NOT NULL,
  `certificate_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `educational_background`
--

INSERT INTO `educational_background` (`id`, `application_id`, `school_name`, `course`, `qualification`, `start_year`, `end_year`, `certificate_path`, `created_at`) VALUES
(0, 1, 'Catholic University', 'Computer Science', 'Bachelor Degree', '2025-01-01', '2025-01-17', '../uploads/certificates/Salifu_Certificate.jpg', '2025-01-22 15:01:15'),
(0, 2, 'Catholic University', 'Computer Science', 'Bachelor Degree', '2024-12-31', '2025-01-22', '../uploads/certificates/welcome1.JPG', '2025-01-23 07:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `legal_consent`
--

CREATE TABLE `legal_consent` (
  `id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `privacy_policy_accepted` tinyint(1) NOT NULL,
  `accurate_information_acknowledged` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `legal_consent`
--

INSERT INTO `legal_consent` (`id`, `application_id`, `privacy_policy_accepted`, `accurate_information_acknowledged`, `created_at`) VALUES
(1, 1, 1, 1, '2025-01-22 15:01:15'),
(2, 2, 1, 1, '2025-01-23 07:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'unread',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_logs`
--

CREATE TABLE `notification_logs` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `type` enum('email','sms') NOT NULL,
  `status` enum('success','failure') NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_information`
--

CREATE TABLE `other_information` (
  `id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `source_of_information` enum('Social Media','Friends or Family','Website','Advertisement','Other') NOT NULL,
  `has_medical_condition` tinyint(1) NOT NULL DEFAULT 0,
  `medical_condition_description` text DEFAULT NULL,
  `has_criminal_record` tinyint(1) NOT NULL DEFAULT 0,
  `criminal_record_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `other_information`
--

INSERT INTO `other_information` (`id`, `application_id`, `source_of_information`, `has_medical_condition`, `medical_condition_description`, `has_criminal_record`, `criminal_record_description`, `created_at`) VALUES
(0, 1, 'Friends or Family', 1, 'Hello world', 1, 'I love coding', '2025-01-22 15:01:15'),
(0, 2, 'Advertisement', 1, 'none', 1, 'None', '2025-01-23 07:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` int(11) NOT NULL,
  `payment_option` varchar(50) NOT NULL,
  `phone_and_name` varchar(100) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `payment_screenshot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `payment_option`, `phone_and_name`, `transaction_id`, `payment_screenshot`) VALUES
(1, 'MTN MoMo', '0206789600 Abdul-Hafiz', 'g125456652', 'uploads/Business Certificate.jpeg'),
(2, 'MTN MoMo', '0206789600 Abdul-Hafiz', 'dsfsdfsdf', 'uploads/Business Certificate.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `personal_information`
--

CREATE TABLE `personal_information` (
  `id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `sex` enum('Male','Female','Other') NOT NULL,
  `place_of_birth` varchar(100) NOT NULL,
  `house_address` text NOT NULL,
  `digital_address` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT 'Ghana',
  `nationality` varchar(50) NOT NULL,
  `identification_type` enum('Ghana Card','Passport','Voter ID','Other') NOT NULL,
  `identification_number` varchar(50) NOT NULL,
  `identification_document` varchar(255) NOT NULL,
  `marital_status` enum('Single','Married','Divorced','Other') NOT NULL,
  `number_of_children` int(11) DEFAULT 0,
  `religion` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `other_phone_number` varchar(20) DEFAULT NULL,
  `postal_address` text DEFAULT NULL,
  `passport_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `personal_information`
--

INSERT INTO `personal_information` (`id`, `application_id`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `sex`, `place_of_birth`, `house_address`, `digital_address`, `city`, `region`, `country`, `nationality`, `identification_type`, `identification_number`, `identification_document`, `marital_status`, `number_of_children`, `religion`, `email`, `phone_number`, `other_phone_number`, `postal_address`, `passport_photo`, `created_at`) VALUES
(1, 1, 'Abdul-Hafiz', 'WUNZOYA', 'ALHASSAN', '2025-01-02', 'Female', 'Kumbungu', 'Russia Bungalows, opposite Controller &amp;amp; Accountant General&amp;#039;s Department', 'Russia Bungalows, opposite Controller &amp;amp; Ac', 'Tamale, Ghana', 'Northern', 'Ghana', 'Ghanaian', 'Ghana Card', 'GHA-000000-0', '../uploads/file_6790f8396fc9a3.46765924.png', 'Married', 2, 'Islam', 'info@keengh.org', '0244472704', '0244472704', 'HNO DV 154 DATOYILI NR FATIHI COLLEGE', '../uploads/file_6790f8396fa9c7.69483050.jpg', '2025-01-22 15:01:15'),
(2, 2, 'IKIMATU', 'Tipagya', 'ALHASSAN', '2025-01-17', 'Female', 'Kumbungu', 'Russia Bungalows, opposite Controller &amp;amp; Accountant General&amp;#039;s Department', 'Russia Bungalows, opposite Controller &amp;amp; Ac', 'Tamale, Ghana', 'Northern', 'Ghana', 'Ghanaian', 'Voter ID', 'GHA-000000-0', '../uploads/file_6791ec2dd86ae1.95199326.JPG', 'Married', 0, 'Islam', 'info@keengh.org', '0244472704', '0244472704', 'KAG576 Rake St. NT-0118-9613', '../uploads/file_6791ec2dcd2cd1.66670963.JPG', '2025-01-23 07:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `program_selections`
--

CREATE TABLE `program_selections` (
  `id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `choice_number` tinyint(4) NOT NULL,
  `program_name` varchar(100) NOT NULL,
  `program_fee` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `program_selections`
--

INSERT INTO `program_selections` (`id`, `application_id`, `choice_number`, `program_name`, `program_fee`, `created_at`) VALUES
(1, 1, 1, 'Introduction to Artificial Intelligence', 0.00, '2025-01-22 15:01:15'),
(2, 1, 2, 'AI for Beginners: Machine Learning', 0.00, '2025-01-22 15:01:15'),
(3, 1, 3, 'Database Management &amp;amp; Administration', 0.00, '2025-01-22 15:01:15'),
(4, 2, 1, 'Introduction to Artificial Intelligence', 0.00, '2025-01-23 07:15:20'),
(5, 2, 2, 'AI for Beginners: Machine Learning', 0.00, '2025-01-23 07:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `serial_pins`
--

CREATE TABLE `serial_pins` (
  `id` int(11) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `pin` varchar(50) NOT NULL,
  `used` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `serial_pins`
--

INSERT INTO `serial_pins` (`id`, `serial_number`, `pin`, `used`) VALUES
(1, 'N250B6605EA', '291293', 1),
(2, 'N25FB3F5ADF', '916564', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sponsor_information`
--

CREATE TABLE `sponsor_information` (
  `id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `house_address` text NOT NULL,
  `digital_address` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sponsor_information`
--

INSERT INTO `sponsor_information` (`id`, `application_id`, `first_name`, `last_name`, `relationship`, `occupation`, `house_address`, `digital_address`, `city`, `region`, `phone_number`, `created_at`) VALUES
(1, 1, 'Yussif', 'Abdulai', 'Brother', 'Imam', 'KAG576 Rake St. NT-0118-9613', 'KAG576 Rake St. NT-0118-9613', 'Tamale', 'Accra', '0206789600', '2025-01-22 15:01:15'),
(2, 2, 'Yussif', 'Abdulai', 'Father', 'Imam', 'KAG576 Rake St. NT-0118-9613', 'KAG576 Rake St. NT-0118-9613', 'Tamale', 'Accra', '0206789600', '2025-01-23 07:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','registrar') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `phone_number`, `profile_picture`, `password`, `role`, `created_at`) VALUES
(1, 'abdulhafiz@nebatech.com', 'Abdul-Hafiz', 'Yussif', '0249241156', '../uploads/AbdulHafiz_ID.jpg', '0192023a7bbd73250516f069df18b500', 'admin', '2025-01-05 16:16:31'),
(2, 'abassnabila@nebatech.com', '', '', NULL, NULL, '0192023a7bbd73250516f069df18b500', 'registrar', '2025-01-05 16:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`id`, `application_id`, `company`, `role`, `duration`, `created_at`) VALUES
(0, 1, 'Nebatech Software Solution Ltd', 'Software Engineering', 'Feb 2020 - Jan 2025', '2025-01-22 15:01:15'),
(0, 2, 'Nebatech Software Solution Ltd', 'Software Engineering', 'Feb 2020 - Jan 2025', '2025-01-23 07:15:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `legal_consent`
--
ALTER TABLE `legal_consent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notification_logs`
--
ALTER TABLE `notification_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `program_selections`
--
ALTER TABLE `program_selections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `serial_pins`
--
ALTER TABLE `serial_pins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsor_information`
--
ALTER TABLE `sponsor_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `legal_consent`
--
ALTER TABLE `legal_consent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_logs`
--
ALTER TABLE `notification_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_information`
--
ALTER TABLE `personal_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `program_selections`
--
ALTER TABLE `program_selections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `serial_pins`
--
ALTER TABLE `serial_pins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sponsor_information`
--
ALTER TABLE `sponsor_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
