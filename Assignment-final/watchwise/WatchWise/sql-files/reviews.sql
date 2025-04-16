-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2025 at 02:49 AM
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
-- Database: `watchwise`
--

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `review_text` text DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `movie_id`, `user_name`, `review_text`, `rating`) VALUES
(1, 1, 'Bob', 'All is amazing. I can\'t describe anything. It\'s a film that leads you to think about yourself and your plans in your life. I am a real series/movies\' lover and... This was awesome.', 5.0),
(2, 1, 'Alice', 'There is not even a single day I don\'t think of this movie, it\'s scenes , it has a profound impact on me and it shall remain with me forever.', 4.8),
(3, 2, 'David', 'Abigail is funny, gory and packed full with a brilliant cast such as Melissa Barrera, Kathryn Newton and Kevin Durand.', 4.0),
(4, 2, 'Eva', 'The movie has a great idea that can utilized in many ways but they managed to make it trash.', 2.5),
(5, 3, 'Charlie', 'Giving this movie a full fledge 5-star rating Just because this whole movie deserves it. Only watching it first time, I did wonder at times throughout the movie if the editors need a long break after working on this film.', 5.0),
(6, 3, 'Frank', 'Not the greatest time to hit the movies, but this movie makes it totally worth it. ', 4.8),
(7, 4, 'Grace', 'The director made a comprehensive list of things done in previous Spider-Man movies so that this one would avoid them and feel fresh. It paid off well.', 5.0),
(8, 4, 'Hannah', 'one of the best spiderman movies! 5/5 stars! ', 5.0),
(9, 5, 'Isaac', 'No spoilers: This is by far one of the greatest cinematic events in history. This film was just a pure masterpiece. ', 5.0),
(10, 5, 'Jack', 'This is the most satisfying movie franchise conclusion I\'ve ever seen. ', 4.8),
(11, 6, 'Cylyan', 'Tokyo Drift is the greatest car movie ever! Really fun drifting action and awesome soundtrack with the nicest cars.', 4.8),
(12, 6, 'Karen', 'One the best fast and furious for sure! Just love the races. How can I forget sean and neela! They both were also Han that cool and calm creature,just love his acting,Period. ', 5.0),
(13, 7, 'Lio ', 'Honestly I LOVE twilight Movies and books are both so cool. I think it’s such a beautiful story between Bella Edward and Jacob. ', 4.9),
(14, 7, 'Mia', 'This movie offers a refreshing perspective and representation of Vampires and Shapeshifters.', 4.7),
(15, 8, 'Nathan', 'A Swashbuckling Adventure Like No Other! Oh boy, where do I even begin with this movie? Pirates of the Caribbean: The Curse of the Black Pearl is an absolute gem in the world of cinema. ', 5.0),
(16, 8, 'Olivia', 'A fantastic movie with the perfect background music, editing, lighting, and especially acting. Always keep you with the excitement about what is going to happen next. I enjoyed this movie a lot.', 4.8),
(17, 9, 'Jinal', 'Jesus. I have said this before the first time I watched Jeremy Saulniers Blue Ruin, but this man has an absolute knack for creating such grounded realistic action with the most claustrophobic score in his movies. ', 5.0),
(18, 9, 'Emmy', 'Rebel Ridge is a very good political crime suspense movie. ', 4.5),
(19, 10, 'Sophia', 'This franchise is as good as cinema can get. Truly it displays clever quips, family friendly humor for the whole family, and its so fun to watch. ', 4.7),
(20, 10, 'Joe', 'Men in Black is that perfect entertaining sci-fi/comedy movie that everyone loves to watch.', 4.4),
(21, 11, 'Rachel', 'This is the most amazing movie that a film maker has brought to the world. It is a timeless tale that has touched the hearts of audience members for over 25 years.', 5.0),
(22, 11, 'Tina', 'The movie is a Rollercoaster of emotions the movie is remarkably broken into three acts the first act is a nice way to hook the person into watching by reaviling that the ship sinks the opening scene is incredible.  The second act is an incredible excucuted love story of rose and Jack as we time travel back to 1912 the ship looks amazing still after 25 years.', 4.9),
(23, 12, 'Steve', 'Yes. This is what we want to see a biopic like. Howard Hughes was a mysophobic man who is mental health grew worse every year for no treatment,  but he was desperate about his work. He wanted Hell’s Angels to be perfect. To be the best film ever made in American Film Industry. ', 5.0),
(24, 12, 'Peter', 'One of my favourite film. It is inspirational too. It is because of Leonardo DiCaprios exceptional acting. The voice, the acting. ', 4.8);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
