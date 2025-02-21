-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2025 at 03:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `director` varchar(100) NOT NULL,
  `release_year` int(11) NOT NULL,
  `runtime` int(11) NOT NULL,
  `rating` decimal(3,1) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `genre`, `director`, `release_year`, `runtime`, `rating`, `description`, `created_at`) VALUES
(1, 'The Godfather', 'Crime', 'Francis Ford Coppola', 1972, 175, 5.0, 'Don Vito Corleone, head of a mafia family, decides to hand over his empire to his youngest son, Michael. However, his decision unintentionally puts the lives of his loved ones in grave danger.', '2024-12-28 12:38:22'),
(2, 'The Shawshank Redemption', 'Drama', 'Frank Darabont', 1994, 142, 4.9, 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', '2024-12-28 17:58:29'),
(3, 'Titanic', 'Drama, Romance', 'James Cameron', 1997, 195, 4.8, 'A seventeen-year-old aristocrat falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.', '2024-12-28 17:58:29'),
(4, 'Rockstar', 'Drama, Music, Romance', 'Imtiaz Ali', 2011, 159, 4.0, 'Janardhan Jakhar chases his dreams of becoming a big Rock star, during which he falls in love with Heer.', '2024-12-28 17:58:29'),
(5, 'Welcome Home', 'Horror, Thriller', 'George Ratliff', 2020, 125, 4.0, 'Welcome Home is a 2020 Indian Hindi-language horror thriller film inspired by a real-life incident in Nagpur, Maharashtra. It stars Kashmira Irani, Swarda Thigale, Boloram Das, Shashi Bhushan, and Tina Bhatia. The film was written by Ankita Narang and directed by Pushkar Mahabal.', '2024-12-28 17:58:29'),
(6, 'Don\'t Breathe', 'Horror, Thriller', 'Fede Alvarez', 2016, 88, 4.1, 'Hoping to walk away with a massive fortune, a trio of thieves break into the house of a blind man who isn\'t as helpless as he seems.', '2024-12-28 17:58:29'),
(7, 'A Quiet Place', 'Drama, Horror, Sci-Fi', 'John Krasinski', 2018, 90, 4.2, 'In a post-apocalyptic world, a family is forced to live in silence while hiding from monsters with ultra-sensitive hearing.', '2024-12-28 17:58:29'),
(8, 'Pather Panchali', 'Drama', 'Satyajit Ray', 1955, 125, 4.5, 'Impoverished priest Harihar Ray, dreaming of a better life for himself and his family, leaves his rural Bengal village in search of work.', '2024-12-28 17:58:29'),
(9, 'The World of Apu', 'Drama', 'Satyajit Ray', 1959, 105, 4.4, 'Apu, now in his early twenties, is left to his own devices when his mother dies.', '2024-12-28 17:58:29'),
(10, 'Shutter Island', 'Mystery, Thriller', 'Martin Scorsese', 2010, 138, 4.1, 'In 1954, a U.S. Marshal investigates the disappearance of a murderer who escaped from a hospital for the criminally insane.', '2024-12-28 17:58:29'),
(11, 'Interstellar', 'Adventure, Drama, Sci-Fi', 'Christopher Nolan', 2014, 169, 4.6, 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.', '2024-12-28 17:58:29'),
(12, 'Inception', 'Action, Adventure, Sci-Fi', 'Christopher Nolan', 2010, 148, 4.7, 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a CEO.', '2024-12-28 17:58:29'),
(13, 'Your Name', 'Animation, Drama, Fantasy', 'Makoto Shinkai', 2016, 106, 4.5, 'Two teenagers share a profound, magical connection upon discovering they are swapping bodies.', '2024-12-28 17:58:29'),
(14, 'The Notebook', 'Drama, Romance', 'Nick Cassavetes', 2004, 123, 4.0, 'A poor yet passionate young man falls in love with a rich young woman, giving her a sense of freedom, but they are soon separated because of their social differences.', '2024-12-28 17:58:29'),
(15, 'Forrest Gump', 'Drama, Romance', 'Robert Zemeckis', 1994, 142, 4.8, 'The presidencies of Kennedy and Johnson, the Vietnam War, the Watergate scandal and other historical events unfold from the perspective of an Alabama man with an IQ of 75.', '2024-12-28 17:58:29'),
(16, 'La La Land', 'Comedy, Drama, Music', 'Damien Chazelle', 2016, 128, 4.3, 'While navigating their careers in Los Angeles, a pianist and an actress fall in love while attempting to reconcile their aspirations for the future.', '2024-12-28 17:58:29'),
(17, 'Barfi!', 'Adventure, Comedy, Drama', 'Anurag Basu', 2012, 151, 4.0, 'Three young people learn that love can neither be defined nor contained by society\'s norms of normal and abnormal.', '2024-12-28 17:58:29'),
(18, 'The Lunchbox', 'Drama, Romance', 'Ritesh Batra', 2013, 104, 4.2, 'A mistaken delivery in Mumbai\'s famously efficient lunchbox delivery system connects a young housewife to an older man.', '2024-12-28 17:59:55'),
(19, 'Tamasha', 'Drama, Romance', 'Imtiaz Ali', 2015, 139, 4.0, 'An estranged couple meets again after several years and recalls their experiences and emotions from their time together.', '2024-12-28 17:59:55'),
(20, 'Tenet', 'Action, Sci-Fi, Thriller', 'Christopher Nolan', 2020, 150, 4.2, 'Armed with only one word, Tenet, and fighting for the survival of the world, a protagonist journeys through a twilight world of international espionage.', '2024-12-28 17:59:55'),
(21, 'Triangle', 'Horror, Mystery, Thriller', 'Christopher Smith', 2009, 99, 3.9, 'Yacht passengers encounter mysterious weather conditions that force them to jump onto another ship, only to have the odd havoc increase.', '2024-12-28 17:59:55'),
(22, 'Coco', 'Animation, Adventure, Family', 'Lee Unkrich', 2017, 105, 4.7, 'Aspiring musician Miguel teams up with charming trickster Hector on an extraordinary journey through the Land of the Dead.', '2024-12-28 17:59:55'),
(23, 'Big Hero 6', 'Animation, Action, Adventure', 'Don Hall, Chris Williams', 2014, 102, 4.6, 'The special bond that develops between plus-sized inflatable robot Baymax, and prodigy Hiro Hamada, who team up with a group of friends to form a band of high-tech heroes.', '2024-12-28 17:59:55'),
(24, 'Dune', 'Action, Adventure, Drama', 'Denis Villeneuve', 2021, 155, 4.3, 'Feature adaptation of Frank Herbert\'s science fiction novel about the son of a noble family entrusted with the protection of the most valuable asset and most vital element in the galaxy.', '2024-12-28 17:59:55'),
(25, 'The Hangover', 'Comedy', 'Todd Phillips', 2009, 100, 4.0, 'Three buddies wake up from a bachelor party in Las Vegas, with no memory of the previous night and the bachelor missing.', '2024-12-28 17:59:55'),
(26, 'Into the Wild', 'Adventure, Biography, Drama', 'Sean Penn', 2007, 148, 4.5, 'After graduating from Emory University, Christopher McCandless gives up his possessions and donates his savings to charity.', '2024-12-28 17:59:55'),
(27, 'The Theory of Everything', 'Biography, Drama, Romance', 'James Marsh', 2014, 123, 4.2, 'A look at the relationship between the famous physicist Stephen Hawking and his wife.', '2024-12-28 17:59:55'),
(28, 'Ludo', 'Comedy, Crime, Drama', 'Anurag Basu', 2020, 150, 4.1, 'From a resurfaced sex tape to a rogue suitcase of money, four wildly different stories overlap at the whims of fate.', '2024-12-28 17:59:55'),
(29, 'The Conjuring', 'Horror, Mystery, Thriller', 'James Wan', 2013, 112, 4.2, 'Paranormal investigators Ed and Lorraine Warren work to help a family terrorized by a dark presence in their farmhouse.', '2024-12-28 17:59:55'),
(30, 'Knives Out', 'Comedy, Crime, Drama', 'Rian Johnson', 2019, 130, 4.3, 'A detective investigates the death of a patriarch of an eccentric, combative family.', '2024-12-28 17:59:55'),
(31, 'Glass Onion', 'Comedy, Crime, Drama', 'Rian Johnson', 2022, 139, 4.2, 'Famed Southern detective Benoit Blanc travels to Greece for his latest case.', '2024-12-28 17:59:55'),
(32, 'Requiem for a Dream', 'Drama', 'Darren Aronofsky', 2000, 102, 4.3, 'The drug-induced utopias of four Coney Island people are shattered when their addictions run deep.', '2024-12-28 17:59:55'),
(33, 'The Pianist', 'Biography, Drama, Music', 'Roman Polanski', 2002, 150, 4.5, 'A Polish Jewish musician struggles to survive the destruction of the Warsaw ghetto of World War II.', '2024-12-28 17:59:55'),
(34, 'No Smoking', 'Drama, Mystery, Thriller', 'Anurag Kashyap', 2007, 128, 3.7, 'A man fights against his smoking addiction and the strange conditions set by a rehab guru.', '2024-12-28 17:59:55'),
(35, 'Karwaan', 'Comedy, Drama', 'Akarsh Khurana', 2018, 114, 3.8, 'Two friends and a stranger embark on a journey of self-discovery.', '2024-12-28 17:59:55'),
(36, 'Masaan', 'Drama, Romance', 'Neeraj Ghaywan', 2015, 109, 4.4, 'Four lives intersect along the Ganges: a low caste boy in love, a daughter burdened by guilt, a hapless father with fading morality, and a spirited child yearning for a family.', '2024-12-28 17:59:55'),
(37, 'Prisoners', 'Crime, Drama, Mystery', 'Denis Villeneuve', 2013, 153, 4.5, 'When Keller Dover\'s daughter and her friend go missing, he takes matters into his own hands as the police pursue multiple leads and the pressure mounts.', '2024-12-28 17:59:55'),
(38, 'Se7en', 'Crime, Drama, Mystery', 'David Fincher', 1995, 127, 4.6, 'Two detectives, a rookie and a veteran, hunt a serial killer who uses the seven deadly sins as his motives.', '2024-12-28 17:59:55'),
(39, 'Taxi Driver', 'Crime, Drama', 'Martin Scorsese', 1976, 114, 4.4, 'A mentally unstable veteran works as a nighttime taxi driver in New York City, where the perceived decadence and sleaze feeds his urge for violent action.', '2024-12-28 17:59:55'),
(40, 'Everything Everywhere All at Once', 'Action, Adventure, Comedy', 'Daniel Kwan, Daniel Scheinert', 2022, 140, 4.5, 'An aging Chinese immigrant is swept up in an insane adventure, where she alone can save the world by exploring other universes.', '2024-12-28 17:59:55'),
(41, 'The Wolf of Wall Street', 'Biography, Crime, Drama', 'Martin Scorsese', 2013, 180, 4.3, 'Based on the true story of Jordan Belfort, from his rise to a wealthy stock-broker living the high life to his fall involving crime and corruption.', '2024-12-28 17:59:55'),
(42, 'The Grand Budapest Hotel', 'Comedy, Drama', 'Wes Anderson', 2014, 99, 4.3, 'A writer encounters the owner of an aging high-class hotel and learns of his early years serving as a lobby boy.', '2024-12-28 18:01:12'),
(43, 'An Action Hero', 'Action, Comedy', 'Anirudh Iyer', 2022, 132, 4.0, 'A famous action hero gets caught up in an actual action-packed life drama.', '2024-12-28 18:01:12'),
(44, 'Whiplash', 'Drama, Music', 'Damien Chazelle', 2014, 107, 4.6, 'A promising young drummer enrolls at a cutthroat music conservatory.', '2024-12-28 18:01:12'),
(45, 'Manchester by the Sea', 'Drama', 'Kenneth Lonergan', 2016, 137, 4.2, 'A depressed uncle is asked to take care of his teenage nephew after the boy\'s father dies.', '2024-12-28 18:01:12'),
(46, 'The Truman Show', 'Comedy, Drama', 'Peter Weir', 1998, 103, 4.4, 'An insurance salesman discovers his entire life is actually a reality TV show.', '2024-12-28 18:01:12'),
(47, '12th Fail', 'Drama', 'Vidhu Vinod Chopra', 2023, 135, 4.0, 'A story of resilience and determination to overcome the odds.', '2024-12-28 18:01:12'),
(48, 'The Departed', 'Crime, Drama, Thriller', 'Martin Scorsese', 2006, 151, 4.5, 'An undercover cop and a mole in the police attempt to identify each other.', '2024-12-28 18:01:12'),
(49, 'Donnie Darko', 'Drama, Sci-Fi', 'Richard Kelly', 2001, 113, 4.2, 'A troubled teenager is plagued by visions of a large bunny rabbit that manipulates him to commit crimes.', '2024-12-28 18:01:12'),
(50, 'Poor Things', 'Comedy, Drama, Fantasy', 'Yorgos Lanthimos', 2023, 141, 4.3, 'A woman brought back to life by a scientist embarks on a journey of self-discovery.', '2024-12-28 18:01:12'),
(51, 'The Others', 'Horror, Mystery, Thriller', 'Alejandro Amenábar', 2001, 104, 4.3, 'A woman who lives in her darkened old family house with her two photosensitive children becomes convinced that the home is haunted.', '2024-12-28 18:01:12'),
(52, 'Lapata Ladies', 'Comedy, Drama', 'Kiran Rao', 2023, 130, 4.0, 'A story of lost brides in rural India.', '2024-12-28 18:01:12'),
(53, 'Night with the Devil', 'Horror, Thriller', 'Producers Not Confirmed', 2024, 110, 4.0, 'An eerie night reveals hidden secrets.', '2024-12-28 18:01:12'),
(54, 'Laila Majnu', 'Drama, Romance', 'Sajid Ali', 2018, 140, 4.1, 'A modern-day retelling of the classic love saga of Laila and Majnu.', '2024-12-28 18:01:12'),
(55, 'Bohemian Rhapsody', 'Biography, Drama, Music', 'Bryan Singer', 2018, 134, 4.2, 'The story of the legendary rock band Queen and their lead singer Freddie Mercury.', '2024-12-28 18:01:12'),
(56, 'Waiting', 'Drama, Family', 'Anu Menon', 2015, 92, 4.0, 'Two people from different backgrounds bond while waiting for their loved ones in a hospital.', '2024-12-28 18:01:12'),
(57, 'Oldboy', 'Action, Drama, Mystery', 'Park Chan-wook', 2003, 120, 4.3, 'After being imprisoned for 15 years, Oh Dae-Su is released, only to find that he must find his captor in five days.', '2024-12-28 18:01:12'),
(58, 'Highway', 'Drama, Romance', 'Imtiaz Ali', 2014, 133, 4.1, 'A young woman develops Stockholm Syndrome after being kidnapped.', '2024-12-28 18:01:12'),
(60, 'Forest Gump', 'Drama, Romance', 'Robert Zemeckis', 1994, 142, 4.8, 'The presidencies of Kennedy and Johnson, the events of Vietnam, and more, through the perspective of a man with a low IQ.', '2024-12-28 18:01:12'),
(69, 'Ratsasan', 'Action, Crime, Thriller', 'Ram Kumar', 2018, 158, 4.5, 'A cop investigates a series of murders committed by a psychotic killer.', '2024-12-28 18:04:41'),
(70, 'Andhadhun', 'Crime, Drama, Thriller', 'Sriram Raghavan', 2018, 139, 4.5, 'A blind pianist gets caught in a web of crime when he unknowingly witnesses a murder.', '2024-12-28 18:04:41'),
(71, 'Predestination Paradox', 'Sci-Fi, Thriller', 'Michael Spierig, Peter Spierig', 2014, 97, 4.2, 'A temporal agent embarks on a final mission to stop a terrorist attack.', '2024-12-28 18:04:41'),
(72, 'Soul', 'Animation, Adventure, Comedy', 'Pete Docter', 2020, 100, 4.6, 'A middle school teacher who dreams of becoming a jazz musician is given a chance to make his dream come true.', '2024-12-28 18:04:41'),
(73, 'Green Miles', 'Drama, Fantasy', 'Frank Darabont', 1999, 189, 4.7, 'A death-row prison guard forms a bond with a convict who has a miraculous healing ability.', '2024-12-28 18:04:41'),
(74, 'Monpura', 'Drama, Romance', 'Gazi Rakayet', 2009, 130, 4.5, 'A love story set in rural Bengal against the backdrop of an emotional tragedy.', '2024-12-28 18:04:41'),
(75, 'Devi', 'Drama, Thriller', 'Anuruddha Roychowdhury', 2018, 105, 4.4, 'A woman struggles with life and a hidden past while grappling with her emotions.', '2024-12-28 18:04:41'),
(76, 'Jersey', 'Drama, Sports', 'Gowtham Tinnanuri', 2022, 159, 4.3, 'A former cricketer returns to the sport to fulfill his son\'s dream of playing cricket.', '2024-12-28 18:04:41'),
(77, 'Baishe Srabon', 'Drama, Thriller', 'Animesh Aich', 2018, 150, 4.0, 'A police officer tracks a serial killer who targets people on the 22nd day of the month.', '2024-12-28 18:04:41'),
(78, 'Chotuskon', 'Drama, Thriller', 'Srijit Mukherji', 2014, 115, 4.1, 'A mysterious series of events occurs at a remote village where four stories intertwine.', '2024-12-28 18:04:41'),
(82, 'Nayak: The Hero', 'Drama, Satire', 'Satyajit Ray', 1966, 117, 4.7, 'A matinee idol Arindam Mukherjee is going by train to collect an acting award. On the train, he meets Aditi, a journalist, with whom he shares his past experiences.', '2024-12-28 19:31:35'),
(83, 'John Wick', 'Crime, Thriller', 'Chad Stahelski', 2014, 101, 4.0, 'John Wick is an American neo-noir action film series and media franchise created by Derek Kolstad. It centers on the titular character portrayed by actor Keanu Reeves. Wick is a legendary hitman who is reluctantly drawn back into the criminal underworld after retiring', '2024-12-31 11:46:18'),
(84, 'Stree', 'Horror, Comedy', 'Amar Kaushik', 2018, 129, 4.4, 'The people of Chanderi live under constant fear of Stree, the spirit of a woman who attacks men at night during festivals. Vicky, along with his friends, decides to unravel the mystery.', '2024-12-31 17:26:51'),
(85, 'Tumbbad', 'Horror, Fantasy', 'Rahi Anil Barve, Anand Gandhi', 2018, 104, 4.7, 'When a family builds a shrine for Hastar, a monster who is never to be worshipped, and attempts to get their hands on his cursed wealth, they face catastrophic consequences.', '2024-12-31 17:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `username` int(50) NOT NULL,
  `email` int(100) NOT NULL,
  `password` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(0, 0, 0, 81);

-- --------------------------------------------------------

--
-- Table structure for table `watchlists`
--

CREATE TABLE `watchlists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watchlists`
--
ALTER TABLE `watchlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `watchlists`
--
ALTER TABLE `watchlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `watchlists`
--
ALTER TABLE `watchlists`
  ADD CONSTRAINT `watchlists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `watchlists_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
