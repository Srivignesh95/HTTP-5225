-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`) VALUES
(102, 'Kyle Simpson\r\n'),
(103, 'David Flanagan'),
(104, 'Munshi Prem Chand'),
(106, 'Eric Meyer'),
(107, 'Marijn Haverbeke'),
(108, 'David Flanagan'),
(109, 'Nicholas C. Zakas'),
(110, 'Robin Nixon'),
(111, 'Mark Pilgrim'),
(112, 'Eric Freeman'),
(113, 'Jennifer Robbins'),
(114, 'Rachel Andrew'),
(120, 'Marijn Haverbeke');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(250) NOT NULL,
  `author_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `book_no` int(11) NOT NULL,
  `book_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `author_id`, `cat_id`, `book_no`, `book_price`) VALUES
(1, 'Software engineering', 103, 1, 4518, 270),
(2, 'Data structure', 102, 2, 6541, 300),
(4, 'Data Analytics', 104, 4, 4544, 274),
(5, 'web development', 111, 5, 4555, 275),
(6, 'Basic of PHP', 106, 6, 4566, 276),
(7, 'Basic of HTML & CSS', 107, 7, 4577, 277),
(9, 'Data structure', 114, 14, 4514, 214);

-- --------------------------------------------------------

--
-- Table structure for table `issued_books`
--

CREATE TABLE `issued_books` (
  `s_no` int(11) NOT NULL,
  `book_no` int(11) NOT NULL,
  `book_name` varchar(200) NOT NULL,
  `book_author` varchar(200) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `issue_date` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issued_books`
--

INSERT INTO `issued_books` (`s_no`, `book_no`, `book_name`, `book_author`, `student_id`, `status`, `issue_date`) VALUES
(1, 6541, 'Data structure', 'D S Gupta', 4, 1, '0000-00-00 00:00:00'),
(3, 6533, 'Data Analystics', 'Mark Pilgrim', 3, 3, '2020-04-25'),
(4, 6544, 'Basic of HTML &CSS', 'Eric Meyer', 4, 4, '2020-05-04'),
(5, 6555, 'Web development', 'Eric Meyer', 5, 5, '2018-05-04'),
(6, 6566, 'Basic of PHP', 'Rachel Andrew', 6, 6, '2019-06-06'),
(18, 7845, 'Software engineering', 'Jennifer Robbins', 2, 1, '2020-04-22');

-- --------------------------------------------------------


--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);
  
--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);
  
  --
-- Indexes for table `issued_books`
--
ALTER TABLE `issued_books`
  ADD PRIMARY KEY (`s_no`);
  
  
--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;


--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
  
--
-- AUTO_INCREMENT for table `issued_books`
--
ALTER TABLE `issued_books`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;