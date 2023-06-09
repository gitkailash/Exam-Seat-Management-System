-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2022 at 06:31 AM
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
-- Database: `exam_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_id` int(5) NOT NULL,
  `exam_name` varchar(50) NOT NULL,
  `exam_type` varchar(50) NOT NULL,
  `exam_date` date NOT NULL,
  `exam_time` time NOT NULL,
  `exam_description` text NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `exam_name`, `exam_type`, `exam_date`, `exam_time`, `exam_description`, `post_date`) VALUES
(2, 'Regular', 'Pre-Board', '2022-06-20', '01:14:00', 'this notice is for preboard exam', '2022-06-10'),
(4, 'Re-Exam', 'Second Terminal', '2022-07-02', '16:47:00', 'this is to notify for second terminal examination', '2022-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(5) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `course_name`, `course_type`) VALUES
(1, 'Bsc.CSIT', 'Information Technology'),
(2, 'BIM', 'Information Technology'),
(3, 'BCA', 'Information Technology'),
(6, 'BHM', 'Management'),
(7, 'BBS', 'Management');

-- --------------------------------------------------------

--
-- Table structure for table `invigilator`
--

CREATE TABLE `invigilator` (
  `invigilator_id` int(5) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invigilator`
--

INSERT INTO `invigilator` (`invigilator_id`, `first_name`, `last_name`, `mobile`, `email`, `gender`, `address`, `status`) VALUES
(2, 'hari', 'bhandari', 9807390289, 'hari@gmail.com', 'Male', 'ktm', 0),
(3, 'ram', 'bahadur', 9807345099, 'ram@gmail.com', 'Male', 'Brt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(5) NOT NULL,
  `room_no` int(5) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `block` varchar(50) NOT NULL,
  `floor` varchar(50) NOT NULL,
  `room_capacity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_no`, `room_type`, `block`, `floor`, `room_capacity`) VALUES
(1, 201, 'small', 'Block-A', '1', 15),
(2, 202, 'small', 'Block-A', '1', 12),
(3, 203, 'small', 'Block-A', '2', 8),
(4, 204, 'Normal', 'Block-A', '2', 15);

-- --------------------------------------------------------

--
-- Table structure for table `seat_plan`
--

CREATE TABLE `seat_plan` (
  `seat_id` varchar(100) NOT NULL,
  `student_roll_no` int(10) NOT NULL,
  `invigilator_id` int(5) NOT NULL,
  `room_no` int(5) NOT NULL,
  `exam_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(5) NOT NULL,
  `faculty_id` int(5) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `roll_no` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `faculty` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`roll_no`, `first_name`, `last_name`, `mobile`, `email`, `password`, `gender`, `faculty`, `semester`, `user_id`) VALUES
(11111, 'hello_world', 'hello', -98163850, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Male', 'Bsc.CSIT', '1', 2),
(75201, 'ayush', 'guragain', 9813635289, 'ayush@gmail.com', '691c720c3152c8686e0ff812a767c552', 'Male', 'Bsc.CSIT', '7', 0),
(75203, 'abishek', 'shah', 9813629582, 'abishek@gmail.com', '7c39330e69adcb0c52372d3b3d20e5c9', 'Male', 'Bsc.CSIT', '7', 0),
(75205, 'bidya', 'chaudhary', 9852634178, 'bidya@gmail.com', 'f54cab829e5d84cb4a5d882f48af946c', 'Female', 'Bsc.CSIT', '7', 0),
(75206, 'charchit', 'karki', 9800123604, 'charchit@gmail.com', 'ac9d82ceb9430abaea4d040d25c24825', 'Male', 'Bsc.CSIT', '7', 0),
(75207, 'elbin', 'siwakoti', 9864996523, 'elbin@gmail.com', '5d31e3423fbf464826403d8f05271c13', 'Male', 'Bsc.CSIT', '7', 0),
(75208, 'gopal', 'shrestha', 9816358590, 'gopal@gmail.com', 'adf094199668a24130b81dec564db41e', 'Male', 'Bsc.CSIT', '7', 0),
(75214, 'nimesha', 'mehta', 9866857421, 'nimesha@gmail.com', 'cb65df9140db72e57032cc176e15815d', 'Female', 'Bsc.CSIT', '7', 0),
(75402, 'aditi', 'barnwal', 9816258960, 'aditi@gmail.com', 'aditi', 'Female', 'BIM', '7', 0),
(75403, 'alok', 'thakur', 9865475542, 'alok@gmail.com', 'alok123', 'Male', 'BIM', '7', 0),
(75405, 'bivek', 'poddar', 9865475548, 'bivek@gmail.com', 'bivek123', 'Male', 'BIM', '7', 0),
(75406, 'chanchal', 'gupta', 9865475777, 'chanchal@gmail.com', 'chanchal123', 'Female', 'BIM', '7', 0),
(75407, 'hemangi', 'karn', 9865475712, 'hemangi@gmail.com', 'hemangi123', 'Female', 'BIM', '7', 0),
(75408, 'kailash', 'yadav', 9816385093, 'kailash@gmail.com', 'kailash123', 'Male', 'BIM', '7', 0),
(75409, 'kalpana', 'poddar', 9816385575, 'kalpana@gmail.com', 'kalpana123', 'Female', 'BIM', '7', 0),
(75410, 'kritika', 'bhandari', 9816385599, 'kritika@gmail.com', 'kritika123', 'Female', 'BIM', '7', 0),
(75411, 'leshant', 'sapkota', 9852035374, 'leshant@gmail.com', 'leshant123', 'Male', 'BIM', '7', 0),
(75412, 'mehboob', 'khan', 9852035385, 'mehboob@gmail.com', 'mehboob123', 'Male', 'BIM', '7', 0),
(75413, 'nabin', 'mahato', 9852035382, 'nabin@gmail.com', 'nabin123', 'Male', 'BIM', '7', 0),
(75417, 'nitesh', 'pandey', 9825368352, 'nitesh@gmail.com', 'nitesh123', 'Male', 'BIM', '7', 0),
(75488, 'fd', 'fads', 9522352268, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Male', 'BCA', '7', 0),
(76201, 'aayush', 'shrestha', 9856755895, 'aayush@gmail.com', 'aayush123', 'Male', 'Bsc.CSIT', '5', 0),
(76202, 'abishek', 'ghimire', 9874561230, 'abishek@gmail.com', 'abishek123', 'Male', 'Bsc.CSIT', '5', 0),
(76203, 'ajay', 'chaudhary', 985476201, 'ajay@gmail.com', 'ajay123', 'Male', 'Bsc.CSIT', '5', 0),
(76204, 'ankit', 'bandari', 9854677544, 'ankit@gmail.com', 'ankit123', 'Male', 'Bsc.CSIT', '5', 0),
(76205, 'aman', 'neupane', 9865475247, 'aman@gmail.com', 'aman123', 'Male', 'Bsc.CSIT', '5', 0),
(76209, 'asmita', 'shah', 9807744250, 'asmita@gmail.com', 'asmita123', 'Female', 'Bsc.CSIT', '5', 0),
(76210, 'himanshu', 'dahal', 9807744854, 'himanshu@gmail.com', 'himanshu123', 'Male', 'Bsc.CSIT', '5', 0),
(76211, 'mamta', 'majhi', 9865575823, 'mamta@gmail.com', 'mamta123', 'Female', 'Bsc.CSIT', '5', 0),
(76214, 'monika', 'chaudhary', 9807744099, 'monika@gmail.com', 'monika123', 'Female', 'Bsc.CSIT', '5', 0),
(76218, 'pramita', 'chaudhary', 9888756565, 'pramita@gmail.com', 'pramita123', 'Female', 'Bsc.CSIT', '5', 0),
(76220, 'shakshi', 'shrestha', 9865240096, 'shakshi@gmail.com', '618016816a5322a06ad452d58ad402b9', 'Female', 'Bsc.CSIT', '5', 0),
(77301, 'akash', 'singh', 9816385896, 'akash@gmail.com', 'akash123', 'Male', 'BCA', '1', 0),
(77302, 'aaruhi', 'mahato', 9874563210, 'aaruhi@gmail.com', 'aaruhi123', 'Female', 'BCA', '1', 0),
(77303, 'alina', 'gachhadar', 9801236547, 'alina@gmail.com', 'alina123', 'Female', 'BCA', '1', 0),
(77304, 'anil', 'mahato', 9845673210, 'anil@gmail.com', 'anil123', 'Male', 'BCA', '1', 0),
(77305, 'anish', 'pokhrel', 9855647126, 'anish@gmail.com', 'anish123', 'Male', 'BCA', '1', 0),
(77306, 'ankit', 'tamang', 9873214560, 'ankit@gmail.com', 'ankit123', 'Male', 'BCA', '1', 0),
(77307, 'archana', 'mandal', 9865471230, 'archana@gmail.com', 'archana123', 'Female', 'BCA', '1', 0),
(77308, 'asmita', 'dhakal', 9854671230, 'asmita@gmail.com', 'asmita123', 'Female', 'BCA', '1', 0),
(77309, 'bandana', 'shah', 9875462308, 'bandana@gmail.com', 'bandana123', 'Female', 'BCA', '1', 0),
(77310, 'bikrant', 'basnet', 9875564899, 'bikrant@gmail.com', 'bikrant123', 'Male', 'BCA', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(5) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `first_name`, `last_name`, `mobile`, `email`, `password`, `gender`, `address`) VALUES
(1, 'kushal', 'niroula', 9816859263, 'kushal@gmail.com', 'kushal123', 'Male', 'Kathmandu\r\n'),
(2, 'sumit', 'shah', 9836527485, 'sumit@gmail.com', '7225ff71e8821b24fd72b4c8fda95b9a', 'Male', 'biratnagar'),
(4, 'Jaibendra', 'Jha', 9800628550, 'jaibendra@gmail.com', 'cdcc6fb042a08ff40cc97005f98b3448', 'Male', 'janakpur');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `role` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `mobile`, `email`, `username`, `password`, `gender`, `role`, `status`) VALUES
(2, 'kailash', 'yadav', 9816385093, 'admin@gmail.com', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'male', 1, 1),
(3, 'monika', 'jaiswal', 9807744099, 'monika@gmail.com', 'monika@gmail.com', '6f3fc039bfe1efdb272111f276a0e84a', 'female', 2, 0),
(4, 'leshant', 'sapkota', 98163850932, 'leshant@gmail.com', 'leshant@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `invigilator`
--
ALTER TABLE `invigilator`
  ADD PRIMARY KEY (`invigilator_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`),
  ADD KEY `foreign key` (`faculty_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`roll_no`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invigilator`
--
ALTER TABLE `invigilator`
  MODIFY `invigilator_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `foreign key` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
