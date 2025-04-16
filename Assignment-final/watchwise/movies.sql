-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2025 at 04:09 PM
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
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `release_year` int(11) DEFAULT NULL,
  `network` varchar(100) DEFAULT NULL,
  `cast` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT NULL,
  `poster_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `genre`, `release_year`, `network`, `cast`, `description`, `rating`, `poster_url`) VALUES
(1, 'Interstellar', 'Thriller', 2014, 'Netflix', 'Matthew McConaughey, Anne Hathaway', 'When Earth becomes uninhabitable in the future, a farmer and ex-NASA pilot, Joseph Cooper, is tasked to pilot a spacecraft, along with a team of researchers, to find a new planet for humans.', 8.7, 'url1.jpg'),
(2, 'Abigail', 'Horror, Comedy', 2024, 'Amazon Prime', 'Angus Cloud, Melissa Barrera', 'After a group of criminals kidnap the ballerina daughter of a powerful underworld figure, they retreat to an isolated mansion, unaware that they are locked inside with no normal little girl.', 6.6, 'url2.jpg'),
(3, 'Tenet', 'Action, Thriller', 2020, 'Amazon Prime', 'Elizabeth Debicki, John David Washington', 'Armed with only the word \"Tenet,\" and fighting for the survival of the entire world, CIA operative, The Protagonist, journeys through a twilight world of international espionage on a global mission that unfolds beyond real time.', 7.3, 'url3.jpg'),
(4, 'Spider-Man: Homecoming', 'Action, Sci-fi', 2017, 'Amazon Prime', 'Tom Holland, Zendaya', 'Peter Parker tries to stop Adrian (The Vulture) Toomes from selling weapons made with advanced Chitauri technology while trying to balance his life as an ordinary high school student.', 7.4, 'url4.jpg'),
(5, 'Avengers: Endgame', 'Action, Sci-fi', 2019, 'Amazon Prime, Disney+', 'Robert Downey Jr., Chris Evans, Scarlett Johansson, Chris Hemsworth', 'After the devastating events of Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos actions and restore balance to the universe.', 8.4, 'url5.jpg'),
(6, 'Fast and Furious: Tokyo Drift', 'Action, Crime', 2006, 'Amazon Prime', 'Lucas Black, Nathalie Kelley', 'A teenager becomes a major competitor in the world of drift racing after moving in with his father in Tokyo to avoid a jail sentence in America.', 6.1, 'url6.jpg'),
(7, 'Twilight', 'Romance, Fantasy', 2008, 'Netflix', 'Kristen Stewart, Robert Pattinson', 'When Bella Swan moves to a small town in the Pacific Northwest, she falls in love with Edward Cullen, a mysterious classmate who reveals himself to be a 108-year-old vampire.', 5.3, 'url7.jpg'),
(8, 'Pirates of the Caribbean', 'Adventure, Action', 2003, 'Disney+', 'Johnny Depp, Keira Knightley', 'Blacksmith Will Turner teams up with eccentric pirate \"Captain\" Jack Sparrow to save Elizabeth Swann, the governors daughter and his love, from Jacks former pirate allies, who are now undead.', 8.1, 'url8.jpg'),
(9, 'Rebel Ridge', 'Action, Thriller', 2024, 'Netflix', 'Aaron Pierre, AnnaSophia Robb', 'A former Marine grapples his way through a web of small-town corruption when an attempt to post bail for his cousin escalates into a violent standoff with the local police chief.', 6.8, 'url9.jpg'),
(10, 'men in black', 'Action, Sci-fi', 1997, 'Netflix', 'Tommy Lee Jones, Will Smith', 'James, an NYC cop, is hired by Agent K of a secret government agency that monitors extraterrestrial life on Earth. Together, they must recover an item that has been stolen by an intergalactic villain.', 7.3, 'url10.jpg'),
(11, 'Titanic', 'Romance, Adventure', 1997, 'Netflix', 'Kate Winslet, Leonardo DiCaprio', 'A seventeen-year-old aristocrat falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.', 7.9, 'url11.jpg'),
(12, 'The Aviator', 'Adventure, Drama', 2004, 'Netflix', 'Leonardo DiCaprio, Cate Blanchett', 'A biopic depicting the early years of legendary director and aviator Howard Hughes career from the late 1920s to the mid 1940s.', 7.5, 'url12.jpg');

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
