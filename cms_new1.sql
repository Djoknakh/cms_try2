-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 19 2021 г., 16:42
-- Версия сервера: 10.4.18-MariaDB
-- Версия PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cms`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(4) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Bootstap'),
(2, 'Javascript'),
(5, 'PHP'),
(6, 'JAVA'),
(43, 'Fortran'),
(44, 'Newone'),
(47, 'CSS');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(6, 14, 'Sergey Sh', 'agkuban@mail.ru', 'lorem ipsum', 'approved', '2021-07-11'),
(14, 1, 'mmm', 'jok@mail.ru', 'oxzcx', 'approved', '2021-07-15'),
(15, 14, 'Janna', 'jannettas@mail.ru', 'Test new stuff', 'unapproved', '2021-07-15'),
(16, 14, 'k', 'jok@mail.ru', ',,,', 'unapproved', '2021-07-15'),
(17, 14, 'бб', 'ccsd@mail.ru', 'ддд', 'approved', '2021-07-15'),
(18, 23, 'Serg', 'jok@mail.ru', 'сччссч', 'approved', '2021-07-15'),
(19, 1, 'One more comment', 'jok@mail.ru', 'Here am i', 'unapproved', '2021-07-17'),
(20, 3, 'zzz', 'zzz@dddvy.oo', 'zzz', 'approved', '2021-07-19'),
(21, 3, 'zzz', 'zzz@dddvy.oo', 'zzz', 'unapproved', '2021-07-19');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 1, 'Sergey CMS PHP Course is awesome', 'Sergey Shapar', '2021-07-19', 'image_1.jpg', 'Wow, I really like this course.ggg', 'Serge, javasript, php', 1, 'draft'),
(3, 2, 'Lest go sleep', 'Sergey Shapar again', '2021-07-12', 'lambo_1.jpg', 'something here', 'night, go, sleep', 2, 'published'),
(14, 1, 'What_a_beautiful_day', 'Djoknakh', '2021-07-19', 'Page-Login-4.jpg', 'A i m learning via good course from Udemy.com    ', 'new lesson', 6, 'published'),
(16, 1, 'hey', 'mm', '2021-07-19', 'picturemessage_qsjk1sl1.vc4.png', 'op;k;k                    ', 'new lesson', 4, 'published'),
(20, 1, 'Examle cutting string', 'serg', '2021-07-17', 'image_5.jpg', '         Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum mollitia rerum tempora? Cumque dolorem facilis illum magni natus repellendus rerum veniam. Architecto deleniti doloremque dolores eaque excepturi, modi quo ratione rem? Aperiam atque, cum cupiditate delectus dicta dolorem doloribus ducimus excepturi labore laudantium nihil perferendis provident quibusdam quo ratione recusandae reiciendis sequi sit voluptate voluptatem! Aspernatur aut cumque deleniti distinctio dolorum ducimus eligendi, enim illo ipsam iste iure iusto labore modi porro possimus provident quas quisquam repellat repellendus sequi sunt temporibus unde velit veritatis voluptatum. Asperiores consectetur earum excepturi molestias nam natus nesciunt odio porro sapiente voluptatem! Deserunt illo, sit.                                                                                                    ', 'ьдьд', 4, 'published'),
(22, 6, 'Example post 1000', 'Djoknakh', '2021-07-14', 'image_1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum mollitia rerum tempora? Cumque dolorem facilis illum magni natus repellendus rerum veniam. Architecto deleniti doloremque dolores eaque excepturi, modi quo ratione rem? Aperiam atque, cum cupiditate delectus dicta dolorem doloribus ducimus excepturi labore laudantium nihil perferendis provident quibusdam quo ratione recusandae reiciendis sequi sit voluptate voluptatem! Aspernatur aut cumque deleniti distinctio dolorum ducimus eligendi, enim illo ipsam iste iure iusto labore modi porro possimus provident quas quisquam repellat repellendus sequi sunt temporibus unde velit veritatis voluptatum. Asperiores consectetur earum excepturi molestias nam natus nesciunt odio porro sapiente voluptatem! Deserunt illo, sit.lorem ipsum', 'new lesson', 4, 'published'),
(23, 2, 'hey', 'Djoknakh', '2021-07-15', 'Profile - cropped.jpg', '    счясчясячсяч', 'nnhnb  b b k', 1, 'published'),
(33, 5, 'kk', 'bbbb', '2021-07-19', '1447456597-2cd57b9d25ecc812a50e8674391a5fa0.jpeg', 'mm.mm . ', 'jjj', 0, 'draft'),
(34, 2, 'hhh', 'gg', '2021-07-19', '1495389955187442692.jpg', 'cchhch', 'cc', 0, 'draft');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `user_randSalt`) VALUES
(1, 'Djoknakh', 'sergey12', 'Sergey', 'Shapar', 'jok@mail.ru', '', 'subscriber', 'etc.'),
(2, 'Vasiliy', 'nnnnn', 'Sergey', 'aaa', 'javi999@mail.ru', '', 'admin', 'dscsa'),
(10, 'Якушев Владимир', 'zxcz', '5kkk', 'nnn', 'javi@mail.ru', '', 'admin', ''),
(13, '', '', 'mmm', 'mmm', '', '', 'subscriber', ''),
(14, 'Мацко Дмитрий', 'azaxscdvfbf', 'Sergey', 'Shapar', 'javi999@mail.ru', '', 'subscriber', ''),
(15, 'test', 'test', '', '', 'test@test.ru', '', '', ''),
(17, 'vasiy', 'test', '', '', 'vasiy@mail.ru', '', '', ''),
(25, 'ccc', 'ccc', '', '', 'bbb@ddd.er', '', '', ''),
(26, 'fdsfsdfsd', 'fdsfsdfsd', '', '', 'dsad@dfsdfds.rrt', '', '', '$2y$10$iusesomecrazystrings22'),
(27, 'sfds', 'sfds', '', '', 'mmm2dsf@ed.ert', '', 'subscriber', '$2y$10$iusesomecrazystrings22');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
