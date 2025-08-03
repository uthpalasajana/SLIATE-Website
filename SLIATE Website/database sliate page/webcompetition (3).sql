-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2024 at 07:05 PM
-- Server version: 8.0.36
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webcompetition`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'uthpala', 'yasasbcg@gmail.com', '$2y$10$GJQC1dV2jEXZo3d7lQ.wwONwiFkgpiYWPWxABZb1FJNDf7rrltcYm', '2024-12-20 09:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `fulldescription` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `title`, `description`, `fulldescription`, `image_path`, `link`) VALUES
(5, 'Director General ', 'Mr. H. Athauda Seneviratne assumed duties as the Director General of SLIATE on 31/01/2024.', 'Mr. H. Athauda Seneviratne assumed duties as the Director General of SLIATE on 31/01/2024.', 'uploads/Director General .jpeg', 'http://localhost/webcompetition/User/organizationStructure.php');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `uploaded_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `file_name`, `content`, `uploaded_at`) VALUES
(2, 'sliate.txt', 'About Us\r\nOur Mission\r\n \"Creating Excellent Higher National and National Diplomates with Modern Technology for Sustainable Development\"\r\n\r\n \r\n\r\nOur Vision\r\n\"To Become the Centre of Excellence in Technological Education\"\r\n\r\n \r\n\r\nAs per the recommendations of the Committee appointed by Prof. Wiswa Waranapala, Deputy Minister of Higher Education in 1994, the Sri Lanka Institute of Advanced Technical Education (SLIATE) was formed in 1995, under the Sri Lanka Institute of Advanced Technical Education Act No. 29 of 1995, In 2001 the name of the institution was amended as Sri Lanka Institute of Advanced Technological Education, (SLIATE). It functions as an autonomous Institute for the management of Higher National and National Diploma courses. The main purposes of establishing SLIATE were to reform and restructure the entire technical and vocational education system in relation to the changing needs of economic development, to meet manpower requirements of national development strategies, and the promotion of privatization, With special concern of meeting the scarcity of trained technological manpower resources at the technician level.\r\n\r\nThe SLIATE is a statutory body operating under the purview of the Ministry of Higher Education and is one of the leading higher educational institutions in Srilanka.\r\n\r\nSLIATE has been focusing on fostering Advanced Technical Education at post secondary level. It is mandated to establish Advanced Technological Institutes (ATI) in every province for technological education. At present it manages and supervises 11 ATIs and 7 ATI Sections. Its Chief Executive Officer is the Director General while each ATIs and ATI sections are headed by a Director and an Academic Coordinator respectively.', '2024-12-19 22:04:03'),
(4, 'sliate2.txt', '4.2 Annual events organized by SLIATE\r\nOrganizing any event in an ATI requires approval from Director \r\nGeneral. Approval can be obtained from Director General by \r\nsubmitting a document at least one month before the event, which \r\nshould highlight the objective, outcome, etc. of the event with the \r\nrecommendation of the Head of the Department / Director or Academic\r\nCoordinator.\r\n English Day \r\n Sports Day\r\n Software Competition \r\n Tourism Day\r\n Cultural Day or any other events\r\nStudent Handbook of SLIATE\r\n22\r\n5. Examinations\r\nThese examinations consist of components of semester examinations \r\nand continuous assessments. Semester-end examinations will be held \r\nfor both full-time and part-time students during weekdays and \r\nweekends.\r\n5.1 Applying for the Examinations (Eligibility to apply for the \r\nExaminations)\r\na. To apply for the Examination each student should \r\ncompleted following conditions.\r\ni) Registration for the relevant course in relevant semester.\r\nii) Completing of the conditions decided by the Institute.\r\niii) Participation of more than 70% of attendance of lectures \r\npractical/ tutorials for each and every subject in the \r\nrelevant Academic Year. Academic Board of the \r\nrespective ATI has the power to reduce the attendance \r\n% based on special circumstances, minimum up to 40%.\r\niv) Completing of academic requirement/ programme \r\nrequirement such as practical, mid exams, phase test and \r\nassignments etc.\r\nv) He/She not be a student who was prohibited to appear \r\nfor examinations.\r\nvi) He/She should not appear for more than 4 consecutive \r\nattempts of the same examination or parts of the same \r\nexamination. Even though the student does not apply for \r\nthe exam, the attempt will be counted.\r\nvii) He/She should be a person who has fulfilled the formal \r\nrequirements declared by the SLIATE.\r\nb. Those who have been fulfilled the above requirements are \r\nbecoming eligible to apply for the examination.\r\nStudent Handbook of SLIATE\r\n23\r\n5.2 Forwarding Applications\r\nThose who are eligible for examinations should forward their \r\nwritten applications for examination to the Director/ Coordinator \r\nof the of the relevant ATI \r\n(For this matter application should be prepared according to the \r\nsample application form published by the SLIATE or student \r\nshould apply through the online system, if it is decided by the \r\nSLIATE).\r\n5.3 Accepting Applications\r\nTo accept the forwarded applications following conditions should \r\nbe fulfilled.\r\ni) The eligibility of the subject should be recommended by the \r\nsubject lecturer.\r\nii) The eligibility of the candidate for the academic year should be \r\nrecommended by the Head of the Department.\r\niii) After the recommendation of the Head of the Department, \r\nDirector/ Coordinator of the Institute should be recommended \r\nand summarized the applications and directed to the \r\nexamination and evaluation unit of SLIATE.\r\niv) This condition is not subjected to the Institution of which the \r\nexaminations are handled independently by itself. The total \r\nabove mention responsibility is vested with the Director of the \r\nATI.\r\n5.4 Confirmation of the eligibility for the Examination\r\nAfter receiving the summarized list of applications the eligibility \r\nfor the examination is confirmed by issuing the admission cards \r\nand Examination Index Number for each and every candidate of \r\nthe examination.\r\nExamination Index number and Admission Card shall be issued by \r\nthe Director/ Academic Coordinator of relevant ATI according to \r\nthe advice given by the Examination Unit of SLIATE.\r\nStudent Handbook of SLIATE\r\n24\r\n5.5 Criteria on the conduct of Examinations\r\nApplications are called for semester end examinations online or/and \r\nmanually through relevant departments of ATI. Applying for \r\nexaminations is compulsory. The examination index number is same as \r\nthe registration number. \r\n5.6 Procedures in examination halls Information for students\r\n5.6.1. It is the responsibility of each student to acquaint \r\nhimself/herself with the regulations concerning each \r\nexamination, including the timetable of examinations and \r\nthe location there of.\r\n5.6.2. Each candidate must bring the Admission Card, attesting \r\nhis/her signature by a person mentioned in it.\r\n5.6.3. On arrival at the Examination Hall, students should check ', '2024-12-20 18:00:07'),
(5, '4.txt', '“Higher Educational Institution” has the meaning assigned to it in the \r\nUniversities Act,\r\nNo. 16 of 1978;\r\n“ragging” means any act which causes or is likely to cause physical or\r\npsychological injury or mental pain or fear to a student or a member of \r\nthe staff of an educational institution;\r\n“student” means a student of an educational institution;\r\n“sexual harassment” means the use of criminal force, words or\r\nactions to cause sexual annoyance or harassment to a student or\r\na member of the staff, or an educational institution;\r\n74\r\nFor Information: \r\nSri Lanka Institute of Advanced Technological Education\r\n(SLIATE)\r\nNo. 320, “Janawathu Piyasa”,\r\nT. B. Jayah Mawatha,\r\nColombo 10\r\nWeb: www.sliate.ac.lk\r\nTel: 0112691307\r\n75\r\nNames of ATIs, Addresses, Telephone Numbers and the Higher National Diploma (HND) \r\ncourses [Full Time (FT) & Part Time (PT)]\r\nName of ATI Address Telephone\r\nNumbers Courses Offered \r\n01\r\nHardy Advanced\r\nTechnological \r\nInstitute - Ampara\r\nProf. Even A Hardy \r\nMawatha, Ampara.\r\n063-2222056\r\n063-2223035\r\nHNDT (Agri)(FT), HNDA (FT), \r\nHNDM(FT), HNDIT (FT), HNDTHM(FT), \r\nHND in English (FT), \r\nHNDA (PT), HND in English (PT) HNDIT (PT)\r\n02\r\nAdvanced \r\nTechnological Institute \r\n- Anuradhapura\r\nAkkara 111,\r\nAnula Mw, \r\nPandulagama,\r\nAnuradhapura.\r\n025-2234417\r\nHNDIT(FT), HNDA (FT), HND in English \r\n(FT), \r\nHNDIT(PT) HNDA (PT), HND in English (PT) \r\n03\r\nAdvanced \r\nTechnological Institute \r\n- Badulla\r\nGreenland Drive, \r\nBadulla.\r\n055-2230218\r\n055-2223818\r\nHNDIT (FT), HNDA (FT), HNDM(FT), \r\nHND in English (FT), HNDTHM(FT), \r\nHNDIT (PT), HNDA (PT),HND in English (PT) \r\n04\r\nAdvanced \r\nTechnological \r\nInstitute - Batticaloa\r\nMain Street, \r\nKovil Kulam \r\nEast, \r\nArayampathy, \r\nBatticaloa.\r\n065-2247519\r\n065-2247470\r\nHNDIT (FT), HNDA (FT), HND in \r\nEnglish,(FT) HNDA (PT), HND in English \r\n(PT), HNDIT(PT),\r\n05\r\nAdvanced \r\nTechnological Institute \r\n- Colombo\r\nNo. 42,\r\nRodrigo Place, \r\nColombo 15.\r\n011-2521152\r\n011-2521282\r\nHNDE (Civil)(FT), HNDE(Mechanical)(FT), \r\nHNDE (Electrical & Electronics) (FT) \r\nHNDQS(FT), HNDBSE(FT)\r\n06\r\nAdvanced \r\nTechnological Institute \r\n- Dehiwala\r\nNo 51, \r\nWaidya Rd, \r\nDehiwala.\r\n011-2738349\r\nHNDIT (FT), HNDA (FT), HNDM (F/T), \r\nHNDBA (FT), HND in English (FT), \r\nHNDBF(FT), HNDTHM(FT),\r\nHNDA (PT), HND in English (PT), \r\n07\r\nAdvanced \r\nTechnological \r\nInstitute - Galle\r\nSiridamma Mw,\r\nLabuduwa, \r\nAkmeemana,\r\nGalle.\r\n091-2246179\r\nHNDE (Civil)(FT), HNDE(Mechanical)(FT), \r\nHNDE (Electrical & Electronics) (FT) \r\nHNDQS(FT), HNDIT (FT), HNDT(Agri)(FT), \r\nHNDA (FT), HNDM(FT), HNDTHM(FT), \r\nHNDBA(FT), HND in English (FT), \r\nHNDA (PT), HNDIT (PT), HND in \r\nEnglish(PT) \r\n08\r\nAdvanced \r\nTechnological Institute \r\n- Gampaha\r\nNaiwala, \r\nEssalla,\r\nVeyangoda.\r\n033-2287519\r\n033-2292544\r\nHNDT (Agri) (FT), HNDIT (FT), \r\nHNDFT(FT),HNDA (FT), \r\nHNDA (PT),), HNDIT (PT), \r\n09 Advanced \r\nTechnological\r\nInstitute - Jaffna\r\nNo. 665/2,\r\nBeach Rd. \r\nGurunagar, Jaffna.\r\n021-2222595\r\n021-2229803\r\nHNDE (Civil)(FT), HNDE \r\n(Electrical & Electronics) (FT), HNDQS(FT),\r\nHNDA (FT), HND in English(FT), \r\nHNDM(FT), HNDIT (FT) \r\nHNDIT (PT), HNDA (PT), HND in English (PT)\r\n10\r\nAdvanced \r\nTechnological Institute \r\n- Kandy\r\nNo. 16, \r\nKeppetipola \r\nMawatha, Kandy.\r\n081-2232097\r\n081-2226644\r\nHNDIT (FT), HNDA (FT), HNDM(FT), \r\nHNDBA(FT), HND in English (FT), \r\nHNDTHM (FT)\r\nHNDA (PT),HND in English (PT), HNDIT (PT)\r\n76\r\nName of ATI Address\r\nTelephone\r\nNumbers Courses Offered \r\n11\r\nAdvanced \r\nTechnological Institute \r\n- Kegalle\r\nBandaranayake \r\nMawatha, Kegalle.\r\n035-2221297\r\n035-2221713\r\nHNDIT(FT), HNDA(FT), HND in English(FT), \r\nHNDPM(FT)\r\nHNDA (PT), HND in English (PT) \r\n12\r\nAdvanced \r\nTechnological \r\nInstitute - Kurunegala\r\nNo. 22/1,\r\nWilgoda Rd, \r\nKurunegala.\r\n037-2229583\r\n037-2224911\r\nHNDIT(FT),HNDA(FT),HNDM(FT),\r\nHND in English (FT), HNDTHM(FT)\r\nHNDIT (PT), HNDA (PT), HND in English(PT)\r\n13\r\nAdvanced \r\nTechnological Institute \r\n- Mannar\r\nDe Lasalle English \r\nMedium School \r\nBuilding, \r\nThalaimannar \r\nRoad, Mannar.\r\n023-3122555 HND in English (FT), \r\nHNDIT (FT)\r\n14\r\nAdvanced \r\nTechnological Institute \r\n- Nawalapitiya\r\nNo. 154/6, \r\nGampola Road. \r\n(Black Street), \r\nAishwarya Hall, \r\n4\r\nth Floor, \r\nNawalapitiya. \r\n054-2050634\r\nHNDTHM(FT), HNDM(FT), HND English (PT)\r\n15\r\nAdvanced \r\nTechnological Institute \r\n- Rathnapura\r\nNew Town, \r\nRatnapura.\r\n045-2231492\r\n045-2231493\r\nHNDIT(FT),HNDA(FT), HND in English (PT)\r\nHNDA (PT), \r\n16\r\nAdvanced \r\nTechnological Institute \r\n- Sammanthurai\r\nATI Avenue,\r\nSammanthurai. 067-2261304\r\nHNDIT (FT),HNDA (FT), HND in English (FT), \r\nHNDM (FT) \r\nHNDIT (PT),HNDA (PT), HND in English (PT) \r\n17 Advanced \r\nTechnological Institute \r\n- Tangalle\r\nYayawaththa, \r\nNetolpitiya, \r\nTangalle.\r\n047-2241845\r\n047-2241846\r\nHNDIT (FT), HNDA (FT), HND in English (FT)\r\nHNDA (PT), HND in English (PT) \r\n18\r\nAdvanced \r\nTechnological Institute \r\n- Trincomalee\r\nKanniya Rd,\r\nVarothayanagar, \r\nTrincomalee.\r\n026-2223232 HNDIT (FT), HNDA (FT), HND in English \r\n(FT), \r\nHNDA (PT), HNDIT (PT), HND in English (PT)\r\n19\r\nAdvanced \r\nTechnological Institute \r\n- Vavuniya\r\nOff A 9 Road, \r\nVeppankulam, \r\nÓmanthai, \r\nVavuniya.\r\n024-2052733\r\nHNDA (FT), HND in English(FT) \r\nHNDA (PT), HND in English (PT) \r\nNote: Coursed offered by each ATI depend on the academic year and published through the gazette \r\nnotification in each academic year.', '2024-12-20 18:02:28');

-- --------------------------------------------------------

--
-- Table structure for table `contact_responses`
--

CREATE TABLE `contact_responses` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_responses`
--

INSERT INTO `contact_responses` (`id`, `name`, `email`, `subject`, `message`, `submitted_at`) VALUES
(1, 'oshani kavindya', 'oshani@gmail.com', 'about sliate', 'what is sliate', '2024-12-20 09:16:24'),
(2, 'oshani kavindya', 'oshani@gmail.com', 'about sliate', 'what is sliate', '2024-12-20 09:21:50'),
(3, 'oshani kavindya', 'oshani@gmail.com', 'about sliate', 'what is sliate', '2024-12-20 09:21:59'),
(4, 'oshani kavindya', 'oshani@gmail.com', 'about sliate', 'what is sliate', '2024-12-20 09:21:59'),
(5, 'ytry', 'yasasbcg@gmail.com', 'dfgdg', 'dgdg', '2024-12-20 09:22:37'),
(6, 'erewr', 'savirukavya@gmail.com', 'jkkhk', 'jkhjkk', '2024-12-20 09:24:07'),
(7, 'erewr', 'savirukavya@gmail.com', 'jkkhk', 'jkhjkk', '2024-12-20 09:24:43'),
(8, 'gdgff', 'yasasbcg@gmail.com', 'about sliate', 'gdsgdg', '2024-12-20 09:25:58'),
(9, 'rgdg', 'yasasbcg@gmail.com', 'fgdg', 'gfdfg', '2024-12-20 09:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `description` text,
  `duration` varchar(50) NOT NULL,
  `intake_months` varchar(100) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `description`, `duration`, `intake_months`, `image_url`) VALUES
(1, 'efwefwef', 'wefwefwe', 'wefwefwf', 'fadsfafd', 'uploads/ati14.jpg'),
(2, 'HND Agree', 'The Higher National Diploma (HND) program is a comprehensive two-year qualification designed to provide students with the knowledge and practical skills necessary for careers in their chosen field. The program emphasizes a blend of theoretical learning and hands-on experience, ensuring graduates are industry-ready.\r\n\r\nHND courses offer pathways to undergraduate degrees and professional qualifications, allowing students to advance their education while saving time and resources. These programs are widely recognized by employers and universities, making them an excellent choice for students aiming to achieve both academic and career success.\r\n\r\nKey Highlights:\r\n\r\nPractical, real-world training with an emphasis on employability.\r\nOpportunities for credit transfers to universities.\r\nFlexible intakes, typically in January and July.', '2 years', 'January', 'uploads/ati9.jpg'),
(3, 'Information Technology', 'The Higher National Diploma (HND) in Information Technology (IT) is a comprehensive and practical program designed to equip students with the essential skills and knowledge required to succeed in the dynamic field of IT. Here\'s an overview of its key aspects:\r\n\r\nProgram Overview\r\nThe HND in IT focuses on practical application, offering students hands-on experience with current technologies, tools, and methodologies. The program bridges theoretical knowledge and real-world application, preparing students for careers in technology-driven industries.\r\n\r\nCore Subjects Covered\r\nProgramming and Development:\r\nLanguages: Java, Python, C++, or others.\r\nWeb development with HTML, CSS, JavaScript.\r\nMobile and software application development.\r\nDatabase Management:\r\nMySQL, Oracle, or similar platforms.\r\nData modeling and administration.\r\nNetworking and Security:\r\nFundamentals of computer networking.\r\nCybersecurity principles and ethical hacking.\r\nSystems Analysis and Design:\r\nUnderstanding system requirements and design methodologies.\r\nImplementing IT solutions effectively.\r\nEmerging Technologies:\r\nCloud computing.\r\nArtificial intelligence (AI) and machine learning.\r\nInternet of Things (IoT).\r\nProgram Objectives\r\nProvide a solid foundation in IT principles and practices.\r\nFoster problem-solving and critical-thinking skills.\r\nPrepare students for roles like IT support technician, software developer, network administrator, or database manager.\r\nLay the groundwork for advanced studies or certifications in specialized IT fields.\r\nDuration\r\nTypically 2 years (full-time) or 3–4 years (part-time).\r\nKey Features\r\nIndustry-Relevant Curriculum: Regular updates to match technological advancements.\r\nPractical Exposure: Labs, internships, and project-based learning.\r\nGlobal Recognition: Accepted as a professional qualification worldwide.\r\nPathway to Higher Education: Opportunity to pursue a degree in IT or related fields.\r\nCareer Opportunities\r\nGraduates of HND in IT are well-equipped to work in various roles, including:\r\n\r\nSoftware Engineer: Develop and maintain software applications.\r\nIT Support Specialist: Troubleshoot and resolve technical issues.\r\nWeb Developer: Design and manage websites.\r\nNetwork Administrator: Oversee and secure network systems.\r\nData Analyst: Interpret and manage data for informed decision-making.\r\nWho is it for?\r\nIndividuals passionate about technology.\r\nThose looking to gain practical skills in IT.\r\nStudents aiming to enter the workforce quickly or progress to advanced qualifications.\r\nThe HND in IT is a valuable stepping stone for anyone aspiring to build a career in the ever-evolving technology landscape. It combines theory with practice, preparing students for both immediate employment and further academic pursuits.', '2 Years', 'Septmber', 'uploads/graduation2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `uploaded_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image_url`, `title`, `description`, `uploaded_at`) VALUES
(1, 'uploads/ati12.jpg', 'tryry', 'rtyrty', '2024-12-19 09:46:09'),
(2, 'uploads/ati3.jpg', 'Graduation', 'Annual graduation ceremony of the 2022 batch students', '2024-12-19 09:47:00'),
(3, 'uploads/life.jpg', 'new', 'new2', '2024-12-19 10:02:50'),
(4, 'uploads/ati6.jpg', 'erere', 'rgdrgdrg', '2024-12-19 10:27:56'),
(5, 'uploads/ati9.jpg', 'reehrjh', 'hhdfhdfh', '2024-12-19 10:28:02'),
(6, 'uploads/about.jpg', 'ukuyj', 'ertrts', '2024-12-19 10:47:42'),
(7, 'uploads/books.jpg', '9ouyk', 'ydyd', '2024-12-19 10:47:52'),
(8, 'uploads/ati21.jpg', '5yry', 'dfgd', '2024-12-19 10:48:05'),
(9, 'uploads/ati20.jpg', 'fyfdghf', 'dfdffh', '2024-12-19 10:49:29'),
(10, 'uploads/ati14.jpg', 'ytjtrjh', 'ttghfdxh', '2024-12-19 10:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `latestnews_cards`
--

CREATE TABLE `latestnews_cards` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `fulldetails` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `latestnews_cards`
--

INSERT INTO `latestnews_cards` (`id`, `title`, `date`, `description`, `fulldetails`, `image_path`, `link`) VALUES
(5, 'Exam Timetable 2023 First Semester', '2024-12-18', 'Exam Timetable 2023 First Semester', 'Exam Timetable 2023 First Semester', 'uploads/7707.jpg_wh860.jpg', 'http://localhost/webcompetition/Admin/uploads/2023%201st%20semester%20Time%20Table%20-2023-1.pdf'),
(6, 'Addmissions', '2024-06-19', 'Admission of students to the Advanced Technological Institutes govern under the SLIATE for the academic year 2024/2025 (Limited Recruitment). Closing date of applications 19.07.2024. ', 'Admission of students to the Advanced Technological Institutes govern under the SLIATE for the academic year 2024/2025 (Limited Recruitment). Closing date of applications 19.07.2024. ', 'uploads/addmissions.jpg', 'https://apply.sliate.ac.lk/');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `overview` text NOT NULL,
  `details` text,
  `reportCategory` varchar(200) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `pdf_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `title`, `overview`, `details`, `reportCategory`, `image_url`, `pdf_url`) VALUES
(13, 'dfgd', 'dgf', 'dfg', 'Common Curricular', 'uploads/ati7.jpg', NULL),
(14, 'sds', 'sdf', 'sdf', 'List Of Registered Suppliers', 'uploads/ati12.jpg', NULL),
(15, 'df', 'sdf', 'sdf', 'Common Curricular', 'uploads/ati7.jpg', NULL),
(16, 'ttyy', 'eryey', 'erery', 'Internal Curricular', 'uploads/ati16.jpg', 'http://www.sliate.ac.lk/attachments/article/410/2023%201st%20semester%20Time%20Table%20-2023-1.pdf'),
(17, 'weew', 'trwerwer', 'werwer', 'Common Curricular', 'uploads/ati16.jpg', 'uploads/team.jpg'),
(18, 'fdfg', 'dfgdg', 'dgg', 'Internal Curricular', 'uploads/ati16.jpg', 'uploads/OOP L8.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `overview` text NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `pdf_url` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `published_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`id`, `title`, `overview`, `category`, `pdf_url`, `image_url`, `published_date`) VALUES
(1, 'ty', 'tyry', 'Research Allowance', 'uploads/OOP L1.pdf', 'uploads/ati9.jpg', '2024-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `id` int NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `uploaded_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`id`, `image_path`, `uploaded_at`) VALUES
(11, 'uploads/ati5.jpg', '2024-12-18 18:14:34'),
(13, 'uploads/ati10.jpg', '2024-12-18 18:14:58'),
(14, 'uploads/ati15.jpg', '2024-12-18 18:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `student_life`
--

CREATE TABLE `student_life` (
  `id` int NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `button_text` varchar(50) DEFAULT 'Learn More'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_life`
--

INSERT INTO `student_life` (`id`, `image_path`, `title`, `description`, `button_text`) VALUES
(1, 'uploads/ati15.jpg', 'ggg', 'rgswgsrgs', 'rgsg');

-- --------------------------------------------------------

--
-- Table structure for table `upcommingevents`
--

CREATE TABLE `upcommingevents` (
  `idevents` int NOT NULL,
  `day` varchar(10) NOT NULL,
  `month` varchar(15) NOT NULL,
  `year` int NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `upcommingevents`
--

INSERT INTO `upcommingevents` (`idevents`, `day`, `month`, `year`, `image_path`, `title`, `description`, `link`, `created_at`) VALUES
(1, 'jkghjkgj', 'fghfgh', 45242, 'uploads/ati12.jpg', 'dfgdgh', 'dfgdfhgdh', 'http://localhost/webcompetition/User/organizationStructure.php', '2024-12-18 15:22:16'),
(2, '26', '12', 2025, 'uploads/ati8.jpg', 'mansala', 'Day 2 of the NSBM Convocation Week 2024 proudly celebrated the outstanding achievements of the graduates from the NSBM offered Master of Business Administration (MBA) and Master of Business Studies (MBS) programs of the NSBM Class of 2023.The conferment of Master’s degrees was a moment of pride, led by the Vice-Chancellor of NSBM Green University, […]', 'http://localhost/webcompetition/Admin/sliderupload.php?delete=9', '2024-12-18 15:58:48'),
(3, '26', '12', 6785675, 'uploads/ati17.jpg', 'hgfh', 'ghfghfh', 'http://localhost/webcompetition/User/organizationStructure.php', '2024-12-20 06:03:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_responses`
--
ALTER TABLE `contact_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latestnews_cards`
--
ALTER TABLE `latestnews_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_life`
--
ALTER TABLE `student_life`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upcommingevents`
--
ALTER TABLE `upcommingevents`
  ADD PRIMARY KEY (`idevents`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_responses`
--
ALTER TABLE `contact_responses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `latestnews_cards`
--
ALTER TABLE `latestnews_cards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student_life`
--
ALTER TABLE `student_life`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `upcommingevents`
--
ALTER TABLE `upcommingevents`
  MODIFY `idevents` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
