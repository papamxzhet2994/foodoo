-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 27 2024 г., 19:43
-- Версия сервера: 5.7.27-30
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u2588204_foodoo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Напитки', '2024-04-12 16:21:50', '2024-04-12 16:21:50'),
(2, 'Молочная продукция', '2024-04-14 21:53:39', '2024-04-14 21:53:39'),
(3, 'Овощи', '2024-04-14 21:53:49', '2024-04-14 21:53:49'),
(4, 'Фрукты', '2024-04-14 21:53:53', '2024-04-14 21:53:53'),
(5, 'Полуфабрикаты', '2024-04-14 21:54:06', '2024-04-14 21:54:06'),
(6, 'Мясо', '2024-04-14 21:54:11', '2024-04-14 21:54:11'),
(7, 'Рыба', '2024-04-14 21:54:16', '2024-04-14 21:54:16'),
(8, 'Бытовая химия и уход', '2024-04-14 21:54:37', '2024-04-14 21:54:37'),
(9, 'Хлебобулочные изделия', '2024-04-14 21:56:10', '2024-04-14 21:56:10'),
(10, 'Все для детей', '2024-04-27 15:59:23', '2024-04-27 15:59:23'),
(11, 'Товары для животных', '2024-04-27 15:59:36', '2024-04-27 15:59:36'),
(12, 'Сладости', '2024-04-27 16:00:17', '2024-04-27 16:00:17'),
(14, 'Снеки', '2024-04-27 16:00:59', '2024-04-27 16:00:59'),
(15, 'Сыры', '2024-04-27 16:03:15', '2024-04-27 16:03:15'),
(17, 'Колбасы и сосиски', '2024-04-27 16:03:55', '2024-04-27 16:03:55'),
(18, 'Макароны и крупы', '2024-04-27 16:04:14', '2024-04-27 16:04:14'),
(19, 'Соусы и заправки', '2024-04-27 16:05:13', '2024-04-27 16:05:13');

-- --------------------------------------------------------

--
-- Структура таблицы `dishes`
--

CREATE TABLE `dishes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(8,2) NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_27_212254_create_restaurants_table', 1),
(6, '2024_02_27_212531_create_shops_table', 1),
(7, '2024_02_27_212551_create_categories_table', 1),
(8, '2024_02_27_212651_create_dishes_table', 1),
(9, '2024_02_27_212730_create_products_table', 1),
(10, '2024_04_02_190037_create_orders_table', 1),
(11, '2024_02_27_212501_create_restaurant_categories_table', 2),
(12, '2024_04_17_191949_create_promotions_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(10, 2, 'Полина Савина', 'polinas6a3vina@gmail.com', '55.473341360682966,37.61722775605541', '123456789101', '2024-04-15 21:29:41', '2024-04-15 21:29:41'),
(11, 1, 'Владимир Павленко', 'pvova4370@gmail.com', '55.67162423584757,37.74986328124997', '9210201450', '2024-04-16 14:49:24', '2024-04-16 14:49:24'),
(12, 1, 'Владимир Павленко', 'pvova4370@gmail.com', '55.648334070864394,37.57408203124998', '89210201450', '2024-04-16 14:51:21', '2024-04-16 14:51:21'),
(13, 1, 'Владимир Павленко', 'pvova4370@gmail.com', '55.661533539699455,37.59605468749999', '9210201450', '2024-04-16 17:54:46', '2024-04-16 17:54:46'),
(14, 21, 'Владимир Павленко', 'viktor1994t48@gmail.com', '55.71233915680461,37.617439983198736', '9210201450', '2024-04-17 09:51:24', '2024-04-17 09:51:24'),
(15, 1, 'Владимир Павленко', 'pvova4370@gmail.com', '55.62202531098777,37.54661621093747', '89210201450', '2024-04-17 09:55:45', '2024-04-17 09:55:45'),
(16, 1, 'Владимир Павленко', 'pvova4370@gmail.com', '55.91326389365407,37.26622674690812', '89210201450', '2024-04-19 19:51:21', '2024-04-19 19:51:21'),
(17, 1, 'Владимир Павленко', 'pvova4370@gmail.com', '55.67614199873693,37.6812436336255', '9210201450', '2024-04-25 20:25:06', '2024-04-25 20:25:06');

-- --------------------------------------------------------

--
-- Структура таблицы `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(8,2) NOT NULL,
  `shop_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `weight`, `description`, `price`, `shop_id`, `category_id`, `created_at`, `updated_at`) VALUES
(9, 'images/products/JYt5NEL6AFeMXhtPO4F6qgbBnVhmtCrfnMCHRMX4.jpg', 'Квас Очаковский', '2000', 'Квас Очаковский двойного брожения 2л', '120.00', 19, 1, '2024-04-27 15:58:22', '2024-04-27 15:58:22'),
(10, 'images/products/imzsxkLct8Nn8JgNFDVa9VMVpxjv8iDc8btmbgoE.webp', 'Сыр Viola плавленый', '400', 'Сыр Viola плавленый сливочный 50%', '290.00', 19, 15, '2024-04-27 16:07:15', '2024-04-27 16:07:15'),
(11, 'images/products/4YKYpeDCK6FWBOU0keZRAM1J6akB8iabVDhm0fom.jpg', 'Батончик шоколадный Snickers', '81', 'Батончик шоколадный Snickers Белый жареный арахис-карамель-нуга 2х45гр.', '80.00', 19, 12, '2024-04-27 16:11:32', '2024-04-27 16:11:32'),
(12, 'images/products/EwGjGNmWE7idm3qAKeXCTqUM8gnEU0HAekvHi2GL.webp', 'Сервелат Папа может', '350', 'Сервелат Папа может зернистый 350г', '280.00', 19, 17, '2024-04-27 16:14:04', '2024-04-27 16:14:04'),
(13, 'images/products/PsYaxhJvoGHl4ScpW9wnCSyGsGbaVQrRssfLpxSz.webp', 'Гренки Дон Крутон пшеничные', '130', 'Гренки Дон Крутон пшеничные со вкусом тайского перца 130г', '90.00', 19, 14, '2024-04-27 16:16:23', '2024-04-27 16:16:23'),
(14, 'images/products/k15z2mrBOcvT4ROkgpXHLotR12nIUJzOf54380j8.jpg', 'Энергетический напиток Burn', '449', 'Энергетический напиток Burn Тропический микс 449мл', '140.00', 20, 1, '2024-04-27 16:19:50', '2024-04-27 16:19:50'),
(15, 'images/products/CHGTqXfPIM41R2z9Ont9w4FXbk9T5Clb2QirJFAl.png', 'Тараллини Nina Farina', '180', 'Тараллини Nina Farina с чесноком 180г', '60.00', 20, 14, '2024-04-27 16:25:54', '2024-04-27 16:25:54'),
(16, 'images/products/Hr9Ugp6QPgkK5seuOayP6YrxEpDJlnsIS9Q2sogw.webp', 'Макароны Baisad', '450', 'Макароны Baisad Спираль 450г', '63.00', 20, 18, '2024-04-27 16:29:18', '2024-04-27 16:29:18'),
(17, 'images/products/AvhNCIbIQaip6XkHsTSilnAgVDNvYgsD5kcmbZh3.jpg', 'Сосиски Вязанка Сливушки', '450', 'Сосиски Вязанка Сливушки сливочные 450г', '300.00', 20, 17, '2024-04-27 16:31:43', '2024-04-27 16:31:43'),
(18, 'images/products/Qo2UBeXsOFNYB2V0uXyWyY4UNdsSKLVds5x47Mi2.png', 'Вода Шишкин лес', '5000', 'Вода Шишкин лес питьевая негазированная 5л', '135.00', 20, 1, '2024-04-27 16:34:00', '2024-04-27 16:34:00');

-- --------------------------------------------------------

--
-- Структура таблицы `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promocode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `shop_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `restaurant_categories`
--

CREATE TABLE `restaurant_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `shops`
--

INSERT INTO `shops` (`id`, `name`, `rating`, `image`, `description`, `type`, `created_at`, `updated_at`) VALUES
(19, 'Пятерочка', '5', 'images/FpKF2Wtp64UgUgpqXr9aSG8hdM44WpkSovHO6MWU.jpg', 'Магазин товаров', 'shop', '2024-04-27 15:46:59', '2024-04-27 15:46:59'),
(20, 'Магнит', '5', 'images/UEs4iKDE7OF2AZ96JHsYTEEeX9DXcqUhE0lYbVJb.jpg', 'Магазин продуктов', 'shop', '2024-04-27 15:48:09', '2024-04-27 15:48:09'),
(21, 'Лента', '5', 'images/LJ9WejkTDHpnalEUmx4t85vaqL2KVH8cCYvyJChI.jpg', 'Магазин продуктов', 'shop', '2024-04-27 15:48:30', '2024-04-27 15:48:30'),
(22, 'Верный', '5', 'images/myhcoJBuBdDGEiQK0uKkwABBuJslC7WsmcKOj7bS.jpg', 'Магазин продуктов', 'shop', '2024-04-27 15:49:03', '2024-04-27 15:49:03'),
(23, 'Дикси', '5', 'images/r1OtnD4NrYnOZxPXNdUh2ZsE2Onf26Fz1Ss5F4Go.jpg', 'Магазин продуктов', 'shop', '2024-04-27 15:49:16', '2024-04-27 15:49:16'),
(24, 'Ашан', '5', 'images/FGNEWiI19ZBZ8Ya3qzzr7ZxUXeRFFq20jiC1LhVs.jpg', 'Магазин продуктов', 'shop', '2024-04-27 15:49:27', '2024-04-27 15:49:27'),
(25, 'Вкусвилл', '5', 'images/5zID6qHmWHdtw805XhrI1xuWRDV9x0DcReP3Oc2R.jpg', 'Магазин продуктов', 'shop', '2024-04-27 15:49:38', '2024-04-27 15:49:38');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Владимир', 'Павленко', 'pvova4370@gmail.com', '2024-04-19 20:31:15', '$2y$12$Ic2kyQ1JB7hnpxaWj6EK6uY2GbLH1oZREvjF.RnlYvhv6eJHcGsj.', 1, NULL, '2024-04-12 16:19:35', '2024-04-26 10:29:23'),
(23, 'Полина', 'Савина', 'netami228@gmail.com', '2024-04-17 19:31:25', '$2y$12$2rzHUJhWEdVc06/JpGaGGeJXyzC/a048GFpNLIHDCgOwN1RrOql/u', 1, NULL, '2024-04-17 19:30:13', '2024-04-27 15:33:53');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dishes_restaurant_id_foreign` (`restaurant_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_shop_id_foreign` (`shop_id`);

--
-- Индексы таблицы `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promotions_shop_id_foreign` (`shop_id`);

--
-- Индексы таблицы `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `restaurant_categories`
--
ALTER TABLE `restaurant_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `restaurant_categories`
--
ALTER TABLE `restaurant_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `dishes_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `promotions_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
