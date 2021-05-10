-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2021-05-10 12:17:51
-- 服务器版本： 8.0.23
-- PHP 版本： 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `zuoyemanagement`
--

-- --------------------------------------------------------

--
-- 表的结构 `assignment`
--

CREATE TABLE `assignment` (
  `assign_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `level_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `parent_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `assignor_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `supervisor_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `assign_time` date NOT NULL,
  `begin_time` date NOT NULL,
  `end_time` date NOT NULL,
  `equipment_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 表的结构 `company_info`
--

CREATE TABLE `company_info` (
  `company_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 表的结构 `department_info`
--

CREATE TABLE `department_info` (
  `department_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `company_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 表的结构 `equipmentcategory_info`
--

CREATE TABLE `equipmentcategory_info` (
  `equipmentcategory_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 表的结构 `equipment_info`
--

CREATE TABLE `equipment_info` (
  `equipment_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `equipmentcategory_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `location_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 表的结构 `feedback_status_info`
--

CREATE TABLE `feedback_status_info` (
  `feedback_status_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 表的结构 `level_info`
--

CREATE TABLE `level_info` (
  `level_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 表的结构 `location_info`
--

CREATE TABLE `location_info` (
  `location_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `department_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 表的结构 `role_info`
--

CREATE TABLE `role_info` (
  `role_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 表的结构 `status_info`
--

CREATE TABLE `status_info` (
  `status_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 表的结构 `supervise`
--

CREATE TABLE `supervise` (
  `supervise_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `assign_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `begin_time` date NOT NULL,
  `end_time` date NOT NULL,
  `supervise_judge_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `feedback_status_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `photo_path` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 表的结构 `supervise_judge_info`
--

CREATE TABLE `supervise_judge_info` (
  `supervise_judge_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 表的结构 `user_info`
--

CREATE TABLE `user_info` (
  `user_id` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `sex` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `department_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `header_id` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `role_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `phone1` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `phone2` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `qq` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `address` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 表的结构 `zuoyexiangmuhezuoyexuke`
--

CREATE TABLE `zuoyexiangmuhezuoyexuke` (
  `id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `zuoyexuekezheng` tinyint(1) NOT NULL,
  `donghuozuoye` tinyint(1) NOT NULL,
  `souxiankongjian` tinyint(1) NOT NULL,
  `gaochuzuoye` tinyint(1) NOT NULL,
  `linshiyongdian` tinyint(1) NOT NULL,
  `diaozhuangzuoye` tinyint(1) NOT NULL,
  `wajuezuoye` tinyint(1) NOT NULL,
  `guanxianshebeidakai` tinyint(1) NOT NULL,
  `shexianzuoye` tinyint(1) NOT NULL,
  `jiaoshoujiazuoye` tinyint(1) NOT NULL,
  `jianlishijian` date NOT NULL,
  `beizhu1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `beizhu2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转储表的索引
--

--
-- 表的索引 `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assign_id`),
  ADD KEY `restrict_assignment_assignor` (`assignor_id`),
  ADD KEY `restrict_assignment_equipment` (`equipment_id`),
  ADD KEY `restrict_assignment_level` (`level_id`),
  ADD KEY `restrict_assignment_parent_id` (`parent_id`),
  ADD KEY `restrict_assignment_status` (`status_id`),
  ADD KEY `restrict_assignment_supervisor` (`supervisor_id`);

--
-- 表的索引 `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`company_id`);

--
-- 表的索引 `department_info`
--
ALTER TABLE `department_info`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `restrict_department_company_id` (`company_id`);

--
-- 表的索引 `equipmentcategory_info`
--
ALTER TABLE `equipmentcategory_info`
  ADD PRIMARY KEY (`equipmentcategory_id`);

--
-- 表的索引 `equipment_info`
--
ALTER TABLE `equipment_info`
  ADD PRIMARY KEY (`equipment_id`);

--
-- 表的索引 `feedback_status_info`
--
ALTER TABLE `feedback_status_info`
  ADD PRIMARY KEY (`feedback_status_id`);

--
-- 表的索引 `level_info`
--
ALTER TABLE `level_info`
  ADD PRIMARY KEY (`level_id`);

--
-- 表的索引 `location_info`
--
ALTER TABLE `location_info`
  ADD PRIMARY KEY (`location_id`);

--
-- 表的索引 `role_info`
--
ALTER TABLE `role_info`
  ADD PRIMARY KEY (`role_id`);

--
-- 表的索引 `status_info`
--
ALTER TABLE `status_info`
  ADD PRIMARY KEY (`status_id`);

--
-- 表的索引 `supervise`
--
ALTER TABLE `supervise`
  ADD PRIMARY KEY (`supervise_id`),
  ADD KEY `restrict_supervise_assign_id` (`assign_id`),
  ADD KEY `restrict_supervise_judge_id` (`supervise_judge_id`),
  ADD KEY `restrict_supervise_feedback_id` (`feedback_status_id`);

--
-- 表的索引 `supervise_judge_info`
--
ALTER TABLE `supervise_judge_info`
  ADD PRIMARY KEY (`supervise_judge_id`);

--
-- 表的索引 `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `restrict_user_role` (`role_id`),
  ADD KEY `restrict_user_department` (`department_id`);

--
-- 限制导出的表
--

--
-- 限制表 `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `restrict_assignment_assignor` FOREIGN KEY (`assignor_id`) REFERENCES `user_info` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `restrict_assignment_equipment` FOREIGN KEY (`equipment_id`) REFERENCES `equipment_info` (`equipment_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `restrict_assignment_level` FOREIGN KEY (`level_id`) REFERENCES `level_info` (`level_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `restrict_assignment_status` FOREIGN KEY (`status_id`) REFERENCES `status_info` (`status_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `restrict_assignment_supervisor` FOREIGN KEY (`supervisor_id`) REFERENCES `user_info` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- 限制表 `department_info`
--
ALTER TABLE `department_info`
  ADD CONSTRAINT `restrict_department_company_id` FOREIGN KEY (`company_id`) REFERENCES `company_info` (`company_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- 限制表 `supervise`
--
ALTER TABLE `supervise`
  ADD CONSTRAINT `restrict_supervise_assign_id` FOREIGN KEY (`assign_id`) REFERENCES `assignment` (`assign_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `restrict_supervise_feedback_id` FOREIGN KEY (`feedback_status_id`) REFERENCES `feedback_status_info` (`feedback_status_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `restrict_supervise_judge_id` FOREIGN KEY (`supervise_judge_id`) REFERENCES `supervise_judge_info` (`supervise_judge_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- 限制表 `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `restrict_user_department` FOREIGN KEY (`department_id`) REFERENCES `department_info` (`department_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `restrict_user_role` FOREIGN KEY (`role_id`) REFERENCES `role_info` (`role_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
