-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Gép: localhost:3306
-- Létrehozás ideje: 2017. Már 24. 10:24
-- Kiszolgáló verziója: 5.6.33
-- PHP verzió: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `popcms`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL,
  `language_id` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `mobil` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `phone` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `fax` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `taxnumber` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `siteaddress` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `businessaddress` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `adminemail` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `publicemail` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `facebook` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `intagram` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `youtube` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `twitter` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `linkedin` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `pinterest` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `googleplus` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `shophours` text COLLATE utf8_hungarian_ci NOT NULL,
  `isopen` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `contact_info`
--

INSERT INTO `contact_info` (`id`, `language_id`, `mobil`, `phone`, `fax`, `taxnumber`, `siteaddress`, `businessaddress`, `adminemail`, `publicemail`, `facebook`, `intagram`, `youtube`, `twitter`, `linkedin`, `pinterest`, `googleplus`, `shophours`, `isopen`) VALUES
(1, 'hungarian', '+3630....', '+361....', '+361....', 'ABCDEFGH', 'popigniter.com', 'Budapest, Teszt utca 8.', 'csoma.gergo@popularmarketing.hu', 'csoma.gergo@popularmarketing.hu', '', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `coworkers`
--

CREATE TABLE `coworkers` (
  `coworker_id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `job` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `job_desc` text COLLATE utf8_hungarian_ci NOT NULL,
  `main_img` varchar(256) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='coworker info';

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image_url` varchar(256) NOT NULL,
  `file` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `active` int(11) NOT NULL,
  `orderField` int(11) NOT NULL,
  `gallery_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `gallery_category`
--

CREATE TABLE `gallery_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(256) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `seo_url` varchar(256) NOT NULL,
  `language` varchar(5) NOT NULL,
  `main_image` varchar(256) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `gallery_category`
--

INSERT INTO `gallery_category` (`id`, `category_name`, `seo_url`, `language`, `main_image`, `description`) VALUES
(1, 'Tesztsadasdsad', 'teszt', 'hu', '', ''),
(2, 'Teszt 2', 'teszt_2', 'hu', '', ''),
(3, 'Akármi 01', '', '', '', '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `language`
--

CREATE TABLE `language` (
  `id` int(10) NOT NULL,
  `key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'english',
  `set` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `language`
--

INSERT INTO `language` (`id`, `key`, `language`, `set`, `text`) VALUES
(1, 'test', 'hungarian', 'default', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `seo_url` varchar(256) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `title` varchar(256) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `news_category` int(11) NOT NULL,
  `lead` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `featured` int(11) NOT NULL,
  `main_image` varchar(256) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `tag` varchar(256) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `videoid` varchar(256) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `user` int(11) NOT NULL,
  `seo_title` varchar(256) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `seo_keywords` varchar(256) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `seo_description` varchar(500) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `header_custom_code` varchar(500) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `language` varchar(5) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `news`
--

INSERT INTO `news` (`id`, `seo_url`, `title`, `news_category`, `lead`, `content`, `date`, `status`, `featured`, `main_image`, `tag`, `videoid`, `user`, `seo_title`, `seo_keywords`, `seo_description`, `header_custom_code`, `language`) VALUES
(1, '', 'Teszt', 0, '', '', '2016-11-15', 1, 1, '', '', '', 0, '', '', '', '', 'hu'),
(2, '', 'Teszt 2', 0, '', '', '2016-11-15', 1, 1, '', '', '', 0, '', '', '', '', 'hu');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `newsletter`
--

INSERT INTO `newsletter` (`id`, `subject`, `message`) VALUES
(1, 'Popularmarketing *NEV*', '<p>\r\n  Kedves *NEV*!</p>\r\n<p>\r\n  K&ouml;sz&ouml;ntelek a Popularmarketing H&iacute;rlevel&eacute;n!</p>\r\n');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `news_category`
--

CREATE TABLE `news_category` (
  `id` int(11) NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `seo_url` varchar(256) NOT NULL,
  `language` varchar(5) NOT NULL,
  `main_image` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `news_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `news_category`
--

INSERT INTO `news_category` (`id`, `name`, `seo_url`, `language`, `main_image`, `description`, `news_order`) VALUES
(1, 'Teszt hír kategória', 'teszt_hir_kategoria', 'hu', '', '', 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `news_gallery`
--

CREATE TABLE `news_gallery` (
  `id` int(11) NOT NULL,
  `image_url` varchar(256) NOT NULL,
  `file` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `active` int(11) NOT NULL,
  `orderField` int(11) NOT NULL,
  `news_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `our_team`
--

CREATE TABLE `our_team` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `rank` varchar(256) COLLATE utf8_hungarian_ci NOT NULL COMMENT 'beosztása az illetőnek',
  `mobil` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `facebook` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `twitter` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `linkedin` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `youtube` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `main_image` varchar(256) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `seo_url` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `content` text COLLATE utf8_hungarian_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `ext_url` varchar(560) COLLATE utf8_hungarian_ci NOT NULL COMMENT 'automatikus linktől eltérő',
  `page_order` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  `main_image` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `seo_title` varchar(500) COLLATE utf8_hungarian_ci NOT NULL,
  `seo_keywords` varchar(500) COLLATE utf8_hungarian_ci NOT NULL,
  `seo_description` varchar(500) COLLATE utf8_hungarian_ci NOT NULL,
  `header_custom_code` text COLLATE utf8_hungarian_ci NOT NULL,
  `language` varchar(5) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `page`
--

INSERT INTO `page` (`id`, `name`, `seo_url`, `content`, `parent`, `ext_url`, `page_order`, `status`, `main_image`, `seo_title`, `seo_keywords`, `seo_description`, `header_custom_code`, `language`) VALUES
(1, 'fooldal', '', 'ASDASDSADAS', 0, '', 0, 1, '', '', '', '', '', 'hu'),
(4, 'dsadada', 'dsadada', '<p>dsad</p>', 1, 'http://google.com', 0, 1, '', '', '', '', '', 'hu'),
(5, 'language admin teszt', 'language_admin_teszt', '[[lang::test::default_key]]', 0, '', 0, 1, '', '', '', '', '', 'hu');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `seo_url` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `special_price` int(11) NOT NULL,
  `item_number` int(11) NOT NULL,
  `content` text COLLATE utf8_hungarian_ci NOT NULL,
  `main_image` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `banner_image` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `seo_title` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `seo_keywords` varchar(500) COLLATE utf8_hungarian_ci NOT NULL,
  `seo_description` varchar(500) COLLATE utf8_hungarian_ci NOT NULL,
  `header_custom_code` text COLLATE utf8_hungarian_ci NOT NULL,
  `language` varchar(5) COLLATE utf8_hungarian_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `product`
--

INSERT INTO `product` (`id`, `name`, `seo_url`, `product_category_id`, `price`, `special_price`, `item_number`, `content`, `main_image`, `banner_image`, `seo_title`, `seo_keywords`, `seo_description`, `header_custom_code`, `language`, `status`) VALUES
(1, 'term1', '', 1, 1000, 0, 0, '', '', '', '', '', '', '', 'hu', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `product_attr`
--

CREATE TABLE `product_attr` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_attr_id` int(11) NOT NULL,
  `product_attr_value` varchar(256) COLLATE utf8_hungarian_ci NOT NULL COMMENT 'A termék tulajdonság értéke'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `product_attr_category`
--

CREATE TABLE `product_attr_category` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `language` varchar(256) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `url` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `parent` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `content` text COLLATE utf8_hungarian_ci NOT NULL,
  `product_category_order` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  `main_image` varchar(500) COLLATE utf8_hungarian_ci NOT NULL,
  `seo_title` varchar(500) COLLATE utf8_hungarian_ci NOT NULL,
  `seo_keywords` varchar(500) COLLATE utf8_hungarian_ci NOT NULL,
  `seo_description` varchar(500) COLLATE utf8_hungarian_ci NOT NULL,
  `header_custom_code` text COLLATE utf8_hungarian_ci NOT NULL,
  `language` varchar(5) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `product_category`
--

INSERT INTO `product_category` (`id`, `name`, `url`, `parent`, `content`, `product_category_order`, `status`, `main_image`, `seo_title`, `seo_keywords`, `seo_description`, `header_custom_code`, `language`) VALUES
(1, 'Kat1', '', '', '', 0, 0, '', '', '', '', '', 'hu');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `image_title` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `product_image` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_image_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `say_about_us`
--

CREATE TABLE `say_about_us` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `image` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `comment` text COLLATE utf8_hungarian_ci NOT NULL,
  `language` varchar(10) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `say_about_us`
--

INSERT INTO `say_about_us` (`id`, `name`, `image`, `comment`, `language`) VALUES
(1, 'Kovács Karcsi', '', 'Ez egy bla bla', '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `sitename` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `logo` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `favicon` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `language` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `homepage_title` varchar(500) COLLATE utf8_hungarian_ci NOT NULL,
  `homepage_keywords` varchar(500) COLLATE utf8_hungarian_ci NOT NULL,
  `homepage_description` varchar(500) COLLATE utf8_hungarian_ci NOT NULL,
  `google_analytics` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `grecaptcha_site_key` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `grecaptcha_api_key` varchar(256) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `settings`
--

INSERT INTO `settings` (`id`, `sitename`, `logo`, `favicon`, `language`, `homepage_title`, `homepage_keywords`, `homepage_description`, `google_analytics`, `grecaptcha_site_key`, `grecaptcha_api_key`) VALUES
(1, 'PopCMS', '', '', 'hungarian', '', '', '', 'UA-93979050-1', '6LeBpyYTAAAAABP3aZ6BQZe50i8OXwz9eIfJqGW8', '6LeBpyYTAAAAABRW_VUiqbAlMSmylcqw4gSXfFcO');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `slider_order` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `content` text COLLATE utf8_hungarian_ci NOT NULL,
  `main_image` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `ext_url` varchar(256) COLLATE utf8_hungarian_ci NOT NULL COMMENT 'ahová a slider linkje mutat',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(256) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `subscribers`
--

INSERT INTO `subscribers` (`id`, `name`, `email`, `date`, `active`) VALUES
(1, 'Iván János Benedek', 'gazrobur@gmail.com', '2016-12-01 19:04:52', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `under_construct`
--

CREATE TABLE `under_construct` (
  `id` int(11) NOT NULL,
  `pass` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `launch_url` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `under_construct`
--

INSERT INTO `under_construct` (`id`, `pass`, `time`, `launch_url`, `status`) VALUES
(1, 'captainPI', '2016-12-17 15:48:57', 'http://localhost/', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(128) NOT NULL,
  `perm` varchar(128) NOT NULL,
  `active_domain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `perm`, `active_domain`) VALUES
(-1, 'admin', 'captain@popularmarketing.hu', '$2y$10$9lj3Ef5uKMJEVVF5w7dQgOAJ8WVkk2mLfx8XdejJD7r5pAjeGwgGq', '1', 0);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `coworkers`
--
ALTER TABLE `coworkers`
  ADD PRIMARY KEY (`coworker_id`);

--
-- A tábla indexei `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `gallery_category`
--
ALTER TABLE `gallery_category`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `news_gallery`
--
ALTER TABLE `news_gallery`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `our_team`
--
ALTER TABLE `our_team`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `product_attr`
--
ALTER TABLE `product_attr`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `product_attr_category`
--
ALTER TABLE `product_attr_category`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `say_about_us`
--
ALTER TABLE `say_about_us`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `under_construct`
--
ALTER TABLE `under_construct`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT a táblához `coworkers`
--
ALTER TABLE `coworkers`
  MODIFY `coworker_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `gallery_category`
--
ALTER TABLE `gallery_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT a táblához `language`
--
ALTER TABLE `language`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT a táblához `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT a táblához `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT a táblához `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT a táblához `news_gallery`
--
ALTER TABLE `news_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `our_team`
--
ALTER TABLE `our_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT a táblához `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT a táblához `product_attr`
--
ALTER TABLE `product_attr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `product_attr_category`
--
ALTER TABLE `product_attr_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT a táblához `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `say_about_us`
--
ALTER TABLE `say_about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT a táblához `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT a táblához `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT a táblához `under_construct`
--
ALTER TABLE `under_construct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
