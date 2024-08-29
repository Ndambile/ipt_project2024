-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2024 at 09:01 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `must_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignmentId` int(11) NOT NULL,
  `courseId` varchar(20) NOT NULL,
  `programId` int(11) NOT NULL,
  `lecturerId` bigint(20) NOT NULL,
  `assignTitle` varchar(100) NOT NULL,
  `allocMarks` decimal(3,1) NOT NULL,
  `submDeadline` datetime DEFAULT NULL,
  `dateOfSubm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignmentId`, `courseId`, `programId`, `lecturerId`, `assignTitle`, `allocMarks`, `submDeadline`, `dateOfSubm`) VALUES
(65, 'CS 8342', 29, 21100534050006, 'Assign 1', 7.5, '2024-08-23 00:31:00', '2024-08-16 08:27:53'),
(66, 'CS 8341', 29, 21100534050004, 'Image processing', 5.5, '2024-08-23 15:00:00', '2024-08-16 11:00:50'),
(67, 'CS 8342', 29, 21100534050006, 'Interfaces', 10.0, '2024-08-22 09:20:00', '2024-08-19 09:21:12'),
(68, 'CS 8343', 29, 21100534050006, 'System Stability', 10.0, '2024-08-29 11:24:00', '2024-08-27 11:24:36'),
(69, 'MS 8222', 16, 21100534050012, 'Error analysis', 5.0, '2024-08-30 12:08:00', '2024-08-27 12:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_files`
--

CREATE TABLE `assignment_files` (
  `assignmentId` int(11) NOT NULL,
  `assignFile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment_files`
--

INSERT INTO `assignment_files` (`assignmentId`, `assignFile`) VALUES
(66, '../uploads/assign_files/1723795250_Fourier transform -Lecture 3_052609.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_texts`
--

CREATE TABLE `assignment_texts` (
  `assignmentId` int(11) NOT NULL,
  `assignText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment_texts`
--

INSERT INTO `assignment_texts` (`assignmentId`, `assignText`) VALUES
(65, 'Explain ....'),
(67, 'Describe Java interface and write a simple program to illustrate the use of interface. '),
(68, 'Define and give conditions for system stabiltiy.'),
(69, 'Define error and mistake');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseId` varchar(20) NOT NULL,
  `courseName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseId`, `courseName`) VALUES
('CS 8341', 'Signal Processing'),
('CS 8342', 'Object Oriented Programming'),
('CS 8343', 'Control System Design II'),
('ME 8208 ', 'Machine Elements and Design III '),
('ME 8210', 'Materials Technology'),
('ME 8213', 'Industrial Management '),
('MS 8217', 'Statistics and Numerical analysis'),
('MS 8222', 'Statistics and Numerical Analysis');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `departmentId` int(11) NOT NULL,
  `departmentName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`departmentId`, `departmentName`) VALUES
(1, 'System Administration Department'),
(3, 'Department of Civil Engineering'),
(4, 'Department of Mechanical and Industrial Engineering'),
(5, 'Department of Chemical Processing and Environmental Engineering'),
(6, 'Department of Geosciences and Mining'),
(7, 'Department of Electrical and Power Engineering'),
(8, 'Department of Mathematics and Statistics'),
(9, 'Department of Applied Sciences'),
(10, 'Department of Natural Sciences'),
(11, 'Department of Medical Sciences and Technology'),
(12, 'Department of Technical Education'),
(13, 'Department of Earth Sciences'),
(14, 'Department of Finance'),
(15, 'Department of Sports and Games'),
(16, 'Department of Students\' Welfare'),
(17, 'Department of Library Services'),
(18, 'Computer Science and Engineering Department');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `lecturerId` bigint(20) NOT NULL,
  `lecturerFirstName` varchar(255) NOT NULL,
  `lecturerMiddleName` varchar(255) NOT NULL,
  `lecturerLastName` varchar(255) NOT NULL,
  `lecturerPhoneNumber` varchar(255) NOT NULL,
  `lecturerEmailAddress` varchar(255) NOT NULL,
  `lecturerPassword` varchar(255) NOT NULL,
  `lecturerDepartmentId` int(11) NOT NULL,
  `lecturerGender` varchar(6) NOT NULL,
  `lecturerImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`lecturerId`, `lecturerFirstName`, `lecturerMiddleName`, `lecturerLastName`, `lecturerPhoneNumber`, `lecturerEmailAddress`, `lecturerPassword`, `lecturerDepartmentId`, `lecturerGender`, `lecturerImage`) VALUES
(21100534050004, 'Joyce', 'John', 'Mvuma', '2559875', 'ruhumbikaagness82@gmail.com', 'MVUMA@50004', 11, 'F', 'uploads/joyce-mvuma.jpg'),
(21100534050006, 'Neema', 'Matthew', 'Mayombo', '+255 745 847 231', 'neema827@gmail.com', 'MAYOMBO@50006', 3, 'F', 'uploads/1691652819_21100534050006images.jpeg'),
(21100534050007, 'Jackson', 'George', 'Faustie', '+255 766 837 430', 'jack324@gmail.com', 'FAUSTINE@50007', 4, 'M', 'uploads/1691654126_21100534050007images (16).jpeg'),
(21100534050008, 'Jacob', 'John', 'Mtui', '0754 545 445', 'nehemia819@gmail.com', 'MTUI@50008', 3, 'M', 'uploads/1691654385_21100534050008images (14).jpeg'),
(21100534050009, 'LILIAN', 'EDSON', 'MWAKIHABA', '+255 68 565 334', 'lilyEddy@gmail.com', 'MWAKIHABA@50009', 9, 'F', 'uploads/1691654734_21100534050009images (19).jpeg'),
(21100534050010, 'ELIKANA', 'MANDAGO', 'MAGAMBO', '+255 745 847 231', 'magamboElly@gmail.com', 'MAGAMBO@50010', 7, 'M', 'uploads/1691655002_21100534050010images (13).jpeg'),
(21100534050011, 'Neema', 'John', 'Msuya', '0754 545 445', 'ruhumbikaagness82@gmail.com', 'Msuya@50011', 11, 'F', 'uploads/1691656774_21100534050011images (18).jpeg'),
(21100534050012, 'Cyprian', 'Majaliwa', 'Majengo', '0754 545 445', 'cyprian@gmail.com', 'MAJENGO@50012', 5, 'M', 'uploads/1691669387_21100534050012images (13).jpeg'),
(21100534050013, 'ALPHONCE ', 'MATTHEW', 'MBUTA', '+255 745 847 231', 'mbuta@gmail.com', 'MBUTA@50013', 6, 'M', 'uploads/1691669487_21100534050013download (4).jpeg'),
(21100534050014, 'STIVIN', 'STANLEY', 'MAJANI', '+255 745 847 231', 'stevestan@gmail.com', 'MAJANI@50014', 8, 'M', 'uploads/1691669591_21100534050014images (17).jpeg'),
(21100534050015, 'WITNESS', 'BONIFACE', 'MAGUZU', '+255 745 847 231', 'prettywitty@gmail.com', 'MAGUZU@50015', 10, 'F', 'uploads/1691669704_21100534050015images.jpeg'),
(21100534050016, 'SOPHIA', 'SIKORO', 'KISUDA', '+255 745 847 231', 'kisuda@gmail.com', 'KISUDA@50016', 11, 'F', 'uploads/1691669843_21100534050016images (18).jpeg'),
(21100534050018, 'Furahini', 'Laban', 'Jacob', '+255 745 847 231', 'laban@gmail.com', 'Jacob@50018', 7, 'M', 'uploads/1691995842_21100534050018images (5).jpeg'),
(21100534050019, 'Novatus', 'Johanes', 'Michael', '+255 745 847 231', 'nova@gmail.com', 'Michael@50019', 16, 'M', 'uploads/1691996057_21100534050019images (17).jpeg'),
(21100534050020, 'Neema', 'Nehemia', 'Daniel', '+255 745 847 231', 'IndigoTheChef@gmail.com', 'Daniel@50020', 3, 'F', 'uploads/1692863993_21100534050020neema.png'),
(21100534050021, 'Faith', 'Matthew', 'Faiko', '+255 745 847 231', 'ruhumbikaagness82@gmail.com', 'Faiko@50021', 16, 'F', 'uploads/1692868363_21100534050021faith.png');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers_courses`
--

CREATE TABLE `lecturers_courses` (
  `lecturer_courseId` int(11) NOT NULL,
  `lecturerId` bigint(20) NOT NULL,
  `courseId` varchar(20) NOT NULL,
  `programId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturers_courses`
--

INSERT INTO `lecturers_courses` (`lecturer_courseId`, `lecturerId`, `courseId`, `programId`) VALUES
(1, 21100534050004, 'CS 8341', 29),
(2, 21100534050006, 'CS 8342', 29),
(3, 21100534050006, 'CS 8343', 29),
(4, 21100534050012, 'MS 8222', 29),
(5, 21100534050012, 'MS 8222', 16),
(6, 21100534050012, 'MS 8217', 10);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `programId` int(11) NOT NULL,
  `programName` varchar(255) NOT NULL,
  `programDepartmentId` int(11) DEFAULT NULL,
  `programLevel` varchar(255) DEFAULT NULL,
  `programDuration` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`programId`, `programName`, `programDepartmentId`, `programLevel`, `programDuration`) VALUES
(1, 'Doctor of Philosophy in Civil Engineering', 3, 'PhD', 'TWO YEARS'),
(2, 'Masters of Science in Civil Engineering', 3, 'MSc', 'TWO YEARS'),
(3, 'Bachelor in Civil Engineering', 3, 'UQF8', 'FOUR YEARS'),
(4, 'Diploma in Civil Engineering', 3, 'UQF6', 'THREE YEARS'),
(5, 'Diploma in Highway Engineering', 3, 'UQF6', 'THREE YEARS'),
(6, 'Diploma in Automotive and Auto-Electrical Engineering', 4, 'UQF6', 'THREE YEARS'),
(7, 'Diploma in Mechanical Engineering with Industrial Safety and Occupational Health', 4, 'UQF6', 'THREE YEARS'),
(8, 'Diploma in Mechanical Engineering', 4, 'UQF6', 'THREE YEARS'),
(9, 'Diploma in Mechatronics Engineering', 4, 'UQF6', 'THREE YEARS'),
(10, 'Bachelor of Mechanical Engineering', 4, 'UQF8', 'FOUR YEARS'),
(11, 'Master of Science in Energy Engineering', 4, 'MSc', 'TWO YEARS'),
(12, 'Master of Engineering in Renewable Energy', 4, 'MEng', 'TWO YEARS'),
(13, 'Doctor of Philosophy (PhD) in Mechanical Engineering', 4, 'PhD', 'ONE YEAR'),
(14, 'Diploma in Mining Engineering', 6, 'UQF6', 'THREE YEARS'),
(15, 'Diploma in Electrical and Electronics Engineering', 7, 'UQF6', 'THREE YEARS'),
(16, 'Bachelor of Electrical and Electronics Engineering', 7, 'UQF8', 'FOUR YEARS'),
(17, 'Diploma in Laboratory Science and Technology', 10, 'UQF6', 'THREE YEARS'),
(18, 'Bachelor of Laboratory Sciences and Technology', 10, 'UQF6', 'THREE YEARS'),
(19, 'Bachelor of Science with Education', 10, 'UQF8', 'THREE YEARS'),
(20, 'Bachelor of Science in Natural Resources Conservation', 10, 'UQF8', 'THREE YEARS'),
(21, 'Bachelor of Food Science and Technology', 9, 'UQF8', 'THREE YEARS'),
(22, 'Diploma of Food Science and Technology', 9, 'UQF6', 'THREE YEARS'),
(23, 'Postgraduate Diploma in Technical Education', 12, 'UQF8', 'THREE YEARS'),
(24, 'Bachelor of Technical Education in Electrical and Electronics Engineering', 12, 'UQF8', 'FOUR YEARS'),
(25, 'Bachelor of Technical Education in Mechanical Engineering', 12, 'UQF8', 'FOUR YEARS'),
(26, 'Bachelor of Technical Education in Civil Engineering', 12, 'UQF8', 'FOUR YEARS'),
(27, 'Masters of Biodiversity Conservation', 12, 'MSc', 'TWO YEARS'),
(28, 'Diploma in Biomedical Equipment Engineering', 11, 'UQF6', 'THREE YEARS'),
(29, 'Bachelor of Computer Engineering', 18, 'UQF8', 'FOUR YEARS');

-- --------------------------------------------------------

--
-- Table structure for table `programs_courses`
--

CREATE TABLE `programs_courses` (
  `program_courseId` int(11) NOT NULL,
  `programId` int(11) NOT NULL,
  `courseId` varchar(20) NOT NULL,
  `yearOfStudy` varchar(20) NOT NULL,
  `semester` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs_courses`
--

INSERT INTO `programs_courses` (`program_courseId`, `programId`, `courseId`, `yearOfStudy`, `semester`) VALUES
(1, 10, 'ME 8208', 'SECOND YEAR', 'II'),
(2, 10, 'ME 8210', 'SECOND YEAR', 'II'),
(3, 10, 'ME 8213', 'SECOND YEAR', 'II'),
(4, 10, 'MS 8217', 'SECOND YEAR', 'II'),
(5, 29, 'CS 8341', 'THIRD YEAR', 'II'),
(6, 29, 'CS 8342', 'THIRD YEAR', 'II'),
(7, 29, 'CS 8343', 'THIRD YEAR', 'II'),
(8, 29, 'MS 8222', 'THIRD YEAR', 'II'),
(9, 16, 'MS 8222', 'SECOND YEAR', 'II');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentId` bigint(20) NOT NULL,
  `studentFirstName` varchar(255) NOT NULL,
  `studentMiddleName` varchar(255) NOT NULL,
  `studentLastName` varchar(255) NOT NULL,
  `studentProgramId` int(11) DEFAULT NULL,
  `studentYearOfStudy` varchar(255) NOT NULL,
  `studentAdmissionDate` datetime NOT NULL,
  `studentPhoneNumber` varchar(255) NOT NULL,
  `studentEmailAddress` varchar(255) NOT NULL,
  `studentPassword` varchar(255) NOT NULL,
  `studentGender` varchar(6) DEFAULT NULL,
  `studentImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentId`, `studentFirstName`, `studentMiddleName`, `studentLastName`, `studentProgramId`, `studentYearOfStudy`, `studentAdmissionDate`, `studentPhoneNumber`, `studentEmailAddress`, `studentPassword`, `studentGender`, `studentImage`) VALUES
(21100533050001, 'Ayubu', 'Herman', 'Hongoli', 29, 'THIRD YEAR', '2023-08-11 12:08:02', '12345', 'hon@gmail.com', 'ho123', 'M', 'IMAGE'),
(21100533050002, 'Ayubu', 'JOHN', 'MVUMA', 16, 'THIRD YEAR', '2023-08-14 09:33:09', '0754 545 445', 'neema827@gmail.com', 'MVUMA@50002', 'M', 'uploads/21100533050002_download (2).jpeg'),
(21100533050003, 'Leticia', 'Jeff', 'Kenny', 29, 'THIRD YEAR', '2023-08-14 09:55:43', '+255 745 847 231', 'letty@gmail.com', 'Kenny@50003', 'F', 'uploads/21100533050003_download (1).jpeg'),
(21100533050004, 'Joyce', 'Nehemia', 'Mmari', 29, 'THIRD YEAR', '2023-08-14 09:57:00', '+255 745 847 231', 'hongoli@gmail.com', 'Mmari@50004', 'F', 'uploads/21100533050004_images (3).jpeg'),
(21100533050005, 'Anna', 'John', 'Mtoya', 29, 'THIRD YEAR', '2023-08-14 10:09:45', '+255 745 847 231', 'neema827@gmail.com', 'Mtoya@50005', 'F', 'uploads/21100533050005_download.jpeg'),
(21100533050006, 'Agistine', 'Kaleb', 'Joshua', 29, 'THIRD YEAR', '2023-08-15 12:50:38', '0743 343 312', 'kalebu@gmail.com', 'Joshua@50006', 'M', 'uploads/21100533050006_images (10).jpeg'),
(21100533050007, 'Leonard', 'Salum', 'Maganya', 29, 'THIRD YEAR', '2023-08-15 12:55:42', '0743 343 312', 'kalebu@gmail.com', 'Maganya@50007', 'M', 'uploads/21100533050007_images (12).jpeg'),
(21100533050008, 'Noel', 'Jackson', 'Matungwa', 16, 'THIRD YEAR', '2023-08-24 09:45:42', '+255 745 847 231', 'laban@gmail.com', 'Matungwa@50008', 'M', 'uploads/21100533050008_images (7).jpeg'),
(21100533050009, 'Anastazia', 'Andrew', 'Robert', 16, 'THIRD YEAR', '2023-08-24 09:47:41', '25499008855', 'nehemia819@gmail.com', 'Robert@50009', 'F', 'uploads/21100533050009_images (1).jpeg'),
(21100533050010, 'Kenneth', 'Benjamin', 'Lymo', 16, 'THIRD YEAR', '2023-08-24 09:49:01', '0754 545 445', 'nehemia819@gmail.com', 'Lymo@50010', 'M', 'uploads/21100533050010_images (4).jpeg'),
(21100533050011, 'Janeth', 'John', 'Lusekelo', 16, 'THIRD YEAR', '2023-08-24 09:50:03', '25499008855', 'ruhumbikaagness82@gmail.com', 'Lusekelo@50011', 'F', 'uploads/21100533050011_download.jpeg'),
(21100533050012, 'Adam', 'Edson', 'Emmanuel', 16, 'THIRD YEAR', '2023-08-24 09:51:05', '25499008855', 'hongoli@gmail.com', 'Emmanuel@50012', 'M', 'uploads/21100533050012_download (3).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `students_registration`
--

CREATE TABLE `students_registration` (
  `students_registration` int(11) NOT NULL,
  `studentId` bigint(20) NOT NULL,
  `yearOfStudy` varchar(20) NOT NULL,
  `semester` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `worked_assign_files`
--

CREATE TABLE `worked_assign_files` (
  `workedAssignId` int(11) NOT NULL,
  `assignmentId` int(11) NOT NULL,
  `studentId` bigint(20) NOT NULL,
  `workedAssignFile` varchar(100) NOT NULL,
  `subDate` datetime NOT NULL,
  `scoredMarks` decimal(3,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `worked_assign_files`
--

INSERT INTO `worked_assign_files` (`workedAssignId`, `assignmentId`, `studentId`, `workedAssignFile`, `subDate`, `scoredMarks`) VALUES
(3, 66, 21100533050003, '../uploads/student_worked_assigns/1724325584_DIP.pdf', '2024-08-22 14:19:44', NULL),
(4, 66, 21100533050005, '../uploads/student_worked_assigns/1724669330_financial Topic 3 COST ACCOUNTING.pdf', '2024-08-26 13:48:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `worked_assign_remarks`
--

CREATE TABLE `worked_assign_remarks` (
  `worked_assign_remarkId` int(11) NOT NULL,
  `assignmentId` int(11) NOT NULL,
  `studentId` bigint(20) NOT NULL,
  `worked_assign_remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `worked_assign_texts`
--

CREATE TABLE `worked_assign_texts` (
  `assignmentId` int(11) NOT NULL,
  `studentId` bigint(20) NOT NULL,
  `workedAssignText` text NOT NULL,
  `subDate` datetime NOT NULL,
  `scoredMarks` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignmentId`),
  ADD KEY `lecturerId` (`lecturerId`),
  ADD KEY `courseId` (`courseId`),
  ADD KEY `programId` (`programId`);

--
-- Indexes for table `assignment_files`
--
ALTER TABLE `assignment_files`
  ADD PRIMARY KEY (`assignmentId`);

--
-- Indexes for table `assignment_texts`
--
ALTER TABLE `assignment_texts`
  ADD PRIMARY KEY (`assignmentId`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseId`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`departmentId`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`lecturerId`),
  ADD KEY `staffDepartmentId` (`lecturerDepartmentId`);

--
-- Indexes for table `lecturers_courses`
--
ALTER TABLE `lecturers_courses`
  ADD PRIMARY KEY (`lecturer_courseId`),
  ADD KEY `lecturerId` (`lecturerId`),
  ADD KEY `programId` (`programId`),
  ADD KEY `courseId` (`courseId`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`programId`),
  ADD KEY `programDepartmentId` (`programDepartmentId`);

--
-- Indexes for table `programs_courses`
--
ALTER TABLE `programs_courses`
  ADD PRIMARY KEY (`program_courseId`),
  ADD KEY `programId` (`programId`),
  ADD KEY `courseId` (`courseId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentId`),
  ADD KEY `studentProgramId` (`studentProgramId`);

--
-- Indexes for table `students_registration`
--
ALTER TABLE `students_registration`
  ADD PRIMARY KEY (`students_registration`),
  ADD KEY `studentId` (`studentId`);

--
-- Indexes for table `worked_assign_files`
--
ALTER TABLE `worked_assign_files`
  ADD PRIMARY KEY (`workedAssignId`),
  ADD KEY `studentId` (`studentId`),
  ADD KEY `worked_assign_files` (`assignmentId`);

--
-- Indexes for table `worked_assign_remarks`
--
ALTER TABLE `worked_assign_remarks`
  ADD PRIMARY KEY (`worked_assign_remarkId`),
  ADD KEY `assignmentId` (`assignmentId`),
  ADD KEY `studentId` (`studentId`);

--
-- Indexes for table `worked_assign_texts`
--
ALTER TABLE `worked_assign_texts`
  ADD PRIMARY KEY (`assignmentId`),
  ADD KEY `studentId` (`studentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `departmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `lecturers_courses`
--
ALTER TABLE `lecturers_courses`
  MODIFY `lecturer_courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `programId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `programs_courses`
--
ALTER TABLE `programs_courses`
  MODIFY `program_courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students_registration`
--
ALTER TABLE `students_registration`
  MODIFY `students_registration` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `worked_assign_files`
--
ALTER TABLE `worked_assign_files`
  MODIFY `workedAssignId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `worked_assign_remarks`
--
ALTER TABLE `worked_assign_remarks`
  MODIFY `worked_assign_remarkId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`lecturerId`) REFERENCES `lecturers` (`lecturerId`),
  ADD CONSTRAINT `assignments_ibfk_2` FOREIGN KEY (`courseId`) REFERENCES `courses` (`courseId`),
  ADD CONSTRAINT `assignments_ibfk_3` FOREIGN KEY (`lecturerId`) REFERENCES `lecturers` (`lecturerId`),
  ADD CONSTRAINT `assignments_ibfk_4` FOREIGN KEY (`programId`) REFERENCES `programs` (`programId`);

--
-- Constraints for table `assignment_files`
--
ALTER TABLE `assignment_files`
  ADD CONSTRAINT `assignment_files_ibfk_1` FOREIGN KEY (`assignmentId`) REFERENCES `assignments` (`assignmentId`);

--
-- Constraints for table `assignment_texts`
--
ALTER TABLE `assignment_texts`
  ADD CONSTRAINT `assignment_texts_ibfk_1` FOREIGN KEY (`assignmentId`) REFERENCES `assignments` (`assignmentId`);

--
-- Constraints for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD CONSTRAINT `lecturers_ibfk_2` FOREIGN KEY (`lecturerDepartmentId`) REFERENCES `departments` (`departmentId`);

--
-- Constraints for table `lecturers_courses`
--
ALTER TABLE `lecturers_courses`
  ADD CONSTRAINT `lecturers_courses_ibfk_1` FOREIGN KEY (`lecturerId`) REFERENCES `lecturers` (`lecturerId`),
  ADD CONSTRAINT `lecturers_courses_ibfk_2` FOREIGN KEY (`programId`) REFERENCES `programs` (`programId`),
  ADD CONSTRAINT `lecturers_courses_ibfk_3` FOREIGN KEY (`courseId`) REFERENCES `courses` (`courseId`);

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_ibfk_1` FOREIGN KEY (`programDepartmentId`) REFERENCES `departments` (`departmentId`);

--
-- Constraints for table `programs_courses`
--
ALTER TABLE `programs_courses`
  ADD CONSTRAINT `programs_courses_ibfk_1` FOREIGN KEY (`programId`) REFERENCES `programs` (`programId`),
  ADD CONSTRAINT `programs_courses_ibfk_2` FOREIGN KEY (`courseId`) REFERENCES `courses` (`courseId`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`studentProgramId`) REFERENCES `programs` (`programId`);

--
-- Constraints for table `students_registration`
--
ALTER TABLE `students_registration`
  ADD CONSTRAINT `students_registration_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `students` (`studentId`);

--
-- Constraints for table `worked_assign_files`
--
ALTER TABLE `worked_assign_files`
  ADD CONSTRAINT `worked_assign_files` FOREIGN KEY (`assignmentId`) REFERENCES `assignments` (`assignmentId`),
  ADD CONSTRAINT `worked_assign_files_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `students` (`studentId`);

--
-- Constraints for table `worked_assign_remarks`
--
ALTER TABLE `worked_assign_remarks`
  ADD CONSTRAINT `worked_assign_remarks_ibfk_1` FOREIGN KEY (`assignmentId`) REFERENCES `assignments` (`assignmentId`),
  ADD CONSTRAINT `worked_assign_remarks_ibfk_2` FOREIGN KEY (`studentId`) REFERENCES `students` (`studentId`);

--
-- Constraints for table `worked_assign_texts`
--
ALTER TABLE `worked_assign_texts`
  ADD CONSTRAINT `worked_assign_texts` FOREIGN KEY (`assignmentId`) REFERENCES `assignments` (`assignmentId`),
  ADD CONSTRAINT `worked_assign_texts_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `students` (`studentId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
