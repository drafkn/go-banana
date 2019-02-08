-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2019 at 08:26 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gobanana_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `postID` int(11) UNSIGNED NOT NULL,
  `memberID` int(255) NOT NULL,
  `postTitle` varchar(255) DEFAULT NULL,
  `postDesc` text,
  `postCont` text,
  `fileuploaded` varchar(255) NOT NULL,
  `postDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`postID`, `memberID`, `postTitle`, `postDesc`, `postCont`, `fileuploaded`, `postDate`) VALUES
(7, 6, 'Logo 2nd Post ', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>', 'Northern-Ontario-Heritage-Fund-495x400.png', '2019-02-08 11:14:03'),
(8, 7, 'usertest 2nd post', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>\r\n<h3>Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h3>\r\n<p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>', '<h3>Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h3>\r\n<p>"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."</p>\r\n<h3>1914 translation by H. Rackham</h3>\r\n<p>"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."</p>', '', '2019-02-08 11:22:24'),
(9, 1, 'demo 1st post', '<p align="JUSTIFY">Dennis MacAlistair Ritchie was an American computer scientist who is credited for shaping and pioneering the digital era. He created the most commonly used C programming language that is used today in various software applications, embedded system development, operating systems, and has influenced most modern programming languages.</p>\r\n<p align="JUSTIFY">&nbsp;</p>', '<p>Dennis also co-created the UNIX operating system. For his work, in 1983 he received the Turing Award from the ACM, the Hamming Medal in 1990 from the IEEE and in 1999 the National Medal of Technology from President Clinton. He was the head of Lucent Technologies System Software Research Department when he retired in 2007. He passed away on October 12, 2011 causing the Fedora 16 Linux distribution to be released in his memory.</p>', 'Dennis-Ritchie.jpg', '2019-02-08 22:04:47'),
(10, 1, 'Maldives Controversy ', '<p>Environment Protection Agency (EPA) has denied claims of high-voltage undersea cables as the cause of the recent tourist drownings.</p>\r\n<p>EPA''s Director General Ibrahim Naeem told RaajjeMV that there are no such high-voltage underwater&nbsp;cables in Maldives.</p>\r\n<p>&nbsp;</p>', '<p>Environment Protection Agency (EPA) has denied claims of high-voltage undersea cables as the cause of the recent tourist drownings.</p>\r\n<p>EPA''s Director General Ibrahim Naeem told RaajjeMV that there are no such high-voltage underwater&nbsp;cables in Maldives.</p>\r\n<p>Naeem said this in response to the accusation made by a tourist who visited Maldives in 2017. Naeem said there might be small underwater&nbsp;cables but that it would be immediately removed if there&rsquo;s a leak.</p>\r\n<p>He also accused those spreading the rumor of trying to harm the Maldives tourism industry.</p>\r\n<p>Naeem said that the tourist deaths are the result of those in the industry being negligent in looking out for their safety, which includes lack of lifeguards and not instructing tourists when it comes to the dangers of swimming at sea, such as straying too far into deeper waters and getting caught in a current.</p>', '', '2019-02-09 03:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `memberID` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`memberID`, `username`, `password`, `email`, `role`) VALUES
(1, 'Demo', '$2y$10$wJxa1Wm0rtS2BzqKnoCPd.7QQzgu7D/aLlMR5Aw3O.m9jx3oRJ5R2', 'demo@demo.com', 'Admin'),
(2, 'proc', '$2y$10$631TgM.zpv52fyAuj61uGOJ.NxHnE0orulkaVw4rpCKjaP0BX843u', 'proc@mailinator.com', 'User'),
(3, 'alli', '$2y$10$8J.tTtfHtG2i6obf9ob6lemM2YOHb.Xkwk4paMzPUlxA6qvdNkONy', 'alli@mailinator.com', 'User'),
(4, 'jose', '$2y$10$mKTKiU7eOVpo06G33YXCOOzwYL.AV1GB.9HsRB5lz2tXdBTranQwy', 'jose@mailinator.com', 'Admin'),
(5, 'poco', '$2y$10$K6i.hfe5auzrfTePwUTB1OcmJkGX4sLxUQ5j1kmDRbCqSTGO5AR8.', 'poco@mailinator.com', 'Admin'),
(6, 'loco', '$2y$10$rwfmIYdNWNPu2AiDFiOqu.eRpzVpQdaN2LWkGxDPRmUUVkRTghJIS', 'loco@test.com', 'Admin'),
(7, 'usertest', '$2y$10$KzdjGfBh8U258Jv4W1x4vulkOESqIiHg1rMGdtLECsNJoq08pTNnG', 'usertest', 'User'),
(8, 'Marsh', '$2y$10$EEc61Ey3pri/bTqh6yJTFuiC3vzeJgInTPs.l9qyHD78BWawG1VPq', 'marsh@mailinator.com', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`memberID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `postID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `memberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
