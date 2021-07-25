-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 23 2021 г., 14:53
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
(1, 'Bootstrap'),
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
(19, 1, 'One more comment', 'jok@mail.ru', 'Here am i', 'unapproved', '2021-07-17'),
(20, 3, 'zzz', 'zzz@dddvy.oo', 'zzz', 'approved', '2021-07-19'),
(21, 3, 'zzz', 'zzz@dddvy.oo', 'zzz', 'unapproved', '2021-07-19'),
(22, 1, 'kl;k', 'jjjj@df.lk', 'cascsa', 'unapproved', '2021-07-22'),
(23, 1, 'kl;k', 'jjjj@df.lk', 'cascsa', 'unapproved', '2021-07-22'),
(24, 1, 'kl;k', 'jjjj@df.lk', 'cascsa', 'approved', '2021-07-22'),
(25, 1, 'kl;k', 'jjjj@df.lk', 'cascsa', 'approved', '2021-07-22'),
(26, 1, 'kl;k', 'jjjj@df.lk', 'cascsa', 'unapproved', '2021-07-22');

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
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(1, 1, 'Sergey CMS PHP Course is awesome', 'Sergey Shapar', '2021-07-19', 'image_1.jpg', 'Wow, I really like this course.ggg', 'Serge, javasript, php', 6, 'published', 10),
(3, 1, 'Lest go sleep', 'Sergey Shapar', '2021-07-21', 'lambo_1.jpg', 'something here', 'night, go, sleep', 2, 'published', 7),
(14, 1, 'What_a_beautiful_day', 'Djoknakh', '2021-07-19', 'Page-Login-4.jpg', 'A i m learning via good course from Udemy.com    ', 'new lesson', 6, 'published', 2),
(47, 1, 'hey', 'Djoknakh', '2021-07-21', 'picturemessage_qsjk1sl1.vc4.png', 'op;k;k                    ', 'new lesson', 0, 'published', 0),
(50, 1, 'hey', 'Djoknakh', '2021-07-21', 'picturemessage_qsjk1sl1.vc4.png', 'op;k;k                    ', 'new lesson', 0, 'published', 0),
(51, 1, 'What_a_beautiful_day', 'Djoknakh', '2021-07-21', 'Page-Login-4.jpg', 'A i m learning via good course from Udemy.com    ', 'new lesson', 0, 'published', 0),
(52, 1, 'Lest go sleep', 'Sergey Shapar', '2021-07-21', 'lambo_1.jpg', 'something here', 'night, go, sleep', 0, 'published', 0),
(54, 1, 'Lest go sleep', 'Sergey Shapar', '2021-07-22', 'lambo_1.jpg', 'something here', 'night, go, sleep', 0, 'published', 0),
(55, 1, 'What_a_beautiful_day', 'Djoknakh', '2021-07-22', 'Page-Login-4.jpg', 'A i m learning via good course from Udemy.com    ', 'new lesson', 0, 'published', 0),
(56, 1, 'hey', 'Djoknakh', '2021-07-22', 'picturemessage_qsjk1sl1.vc4.png', 'op;k;k                    ', 'new lesson', 0, 'published', 0),
(58, 1, 'What_a_beautiful_day', 'Djoknakh', '2021-07-22', 'Page-Login-4.jpg', 'A i m learning via good course from Udemy.com    ', 'new lesson', 0, 'draft', 0),
(59, 1, 'Lest go sleep', 'Sergey Shapar', '2021-07-22', 'lambo_1.jpg', 'something here', 'night, go, sleep', 0, 'published', 0);

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
(27, 'sfds', 'sfds', '', '', 'mmm2dsf@ed.ert', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(37, 'mlm', 'fdsd', '', '', 'kkj@dfsd.ru', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(42, 'Newone2', 'etqhe2ucDW/us', '', '', 'salt@salt.ru', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(43, 'One', 'etqhe2ucDW/us', '', '', 'salt@salt.ru', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(45, 'Sergey', '$2y$10$iusesomecrazystrings2uGtDpLi/sz8giU0Qqyz0jXbOCxzug3S6', '', '', 'S@mail.ru', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(46, 'Djoknakh', '$2y$10$iusesomecrazystrings2ulBUKtW9o3V0rjEeMEM2I8klIJloTNHG', '', '', 'jok@mail.ru', '', 'subscriber', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Структура таблицы `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, '37tl9m4qaam93mp6iqrkqdkioe', 1626942170);

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
-- Индексы таблицы `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT для таблицы `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
