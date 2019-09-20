-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 20, 2019 at 06:55 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id10539416_wallet`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_tokens`
--

CREATE TABLE `all_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `reason` int(11) NOT NULL,
  `reset_token` char(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `all_tokens`
--

INSERT INTO `all_tokens` (`id`, `user_id`, `reason`, `reset_token`, `status`, `created_at`, `updated_at`) VALUES
(54, 21, 1, 'aTVX1SMh9TB54KVtw3ywdKn5pTD2Pu6gWmSbty5uIk2AwosoP6ThWkYn2hd7', 0, '2019-08-15 16:32:53', '2019-08-15 16:33:02'),
(55, 21, 1, 'cmXEK3hqqiZFvXQyYESWvIEz32wQS0j9HI20CRGmhKRqXv2sqTBxekClTN0i', 1, '2019-08-15 16:33:02', '2019-08-15 16:33:02'),
(56, 21, 1, 'L9LwvjVINJrWrmcHAKja1Gqxsm3IT3Hu5ytXy7oKi6cHAlNdg8Mvl0PV2QAC', 0, '2019-08-15 16:35:07', '2019-08-15 16:35:31'),
(57, 22, 1, 'SPX7q5ky6ABEREIb1tXL4NMVuAuHjtmYrhNMsC8l3hKnJBVE6KKtNljC3kjN', 1, '2019-08-23 02:06:12', '2019-08-23 02:06:12'),
(58, 23, 1, 'KHBxDQgwzOVz7LwQKUa33F3IdfY72XhJHjvidcm6PtLs1fN41wDT8KOkRERj', 0, '2019-08-23 02:07:27', '2019-08-23 02:08:19'),
(59, 24, 1, 'EoDWetD9FKei8SiDZJ21zu7D6GM9xpJMF18vUrhyZgacNVdvqkZkrODTdkGv', 1, '2019-08-23 02:07:38', '2019-08-23 02:07:38'),
(60, 23, 1, 'N4ZWFdxq9EmD02HL633ZPPAsmEXvP16XydjTUIXylf0mRloHuWKIkDJhdu2r', 1, '2019-08-23 02:08:19', '2019-08-23 02:08:19'),
(61, 25, 1, '6g4mOmA6fhxbn0n2hMFuEJl5ceyPrdMKgCsaIdKr3ZT6oFpulEhN6u7Ep8YL', 1, '2019-08-23 02:16:37', '2019-08-23 02:16:37'),
(62, 26, 1, 'IrSx0B71xCLpmRjQ74ajzAhgiZ9vaMhnF2Q7RzobkEvRJQlm2AqD58eRRopV', 0, '2019-08-23 02:20:58', '2019-08-23 02:28:15'),
(63, 26, 1, '1t9Ca9NEbqcgaUYHqe2ny2PXKW56gi7Dcy4RoyjPm1z6EK4h9M93s65RS3EC', 1, '2019-08-23 02:28:15', '2019-08-23 02:28:15'),
(64, 27, 1, '9BNTXoyCwKhfnqsntAGJov8sZZR2B3BkgZ2qWBZAHLdcesJQZO2cu9QYuiWd', 1, '2019-08-23 02:47:36', '2019-08-23 02:47:36'),
(65, 28, 1, 'SwDerUTafuRnziHG552BIiWFkMQlownIAcQxfcxXK4fGToKnJN0tWV7fYw0n', 0, '2019-08-23 03:03:23', '2019-08-23 03:07:04'),
(66, 28, 1, 'Nlquc9xfHacK2bwHkI0MSB40tILdNEtLiBD2eVKkK3BMT7a7JP1YOlhkqLec', 1, '2019-08-23 03:07:04', '2019-08-23 03:07:04'),
(67, 29, 1, 'XhsrX9LeU8U2iTVQgOKQnwg2ApHNRplg15XrM9N4qH3X3RunHkaZQN17fLiY', 1, '2019-08-23 06:42:35', '2019-08-23 06:42:35'),
(68, 30, 1, 'PVhpBGbrcfzNSuxZAitaNnzBnULfJGnZV9GNeIsJz7keik0pbPDkM4Ct98iW', 0, '2019-08-23 06:43:29', '2019-08-23 06:45:17'),
(69, 31, 1, 'oGJSCQRVyi41HPiXaGBHr03P9xOyXdafmL9hdat18Iug1YqqsAzARzVa46bP', 0, '2019-08-24 18:14:05', '2019-08-24 18:18:27'),
(70, 32, 1, 'HOsVNwUh1EuCEWLNowrSYyhgLRPLAGLtiKcTLlbldAO9TmwQXBTo4RQ7tBxe', 1, '2019-08-26 12:41:32', '2019-08-26 12:41:32'),
(71, 21, 2, 'GaZvNxxD5VfcjfMdUYrvs2jIBEC1Qs3Q7rInFZWTSBFq2UhoOYSHgSEJoOsI', 0, '2019-09-11 04:29:15', '2019-09-11 04:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `user_id`, `cat_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 21, 3, 900, '2019-08-23 02:00:38', '2019-08-23 02:00:38'),
(2, 21, 6, 900, '2019-08-24 06:01:23', '2019-08-24 06:01:23'),
(3, 21, 6, 900, '2019-08-24 06:01:24', '2019-08-24 06:01:24'),
(4, 31, 2, 100, '2019-08-24 18:28:36', '2019-08-24 18:28:36'),
(5, 31, 2, 1000, '2019-08-26 12:28:29', '2019-08-26 12:28:29'),
(6, 21, 4, 900, '2019-09-12 09:32:01', '2019-09-12 09:32:01'),
(7, 21, 2, 5000, '2019-09-17 10:43:03', '2019-09-17 10:43:03'),
(8, 21, 3, 3000, '2019-09-17 10:43:16', '2019-09-17 10:43:16'),
(9, 21, 6, 10000, '2019-09-17 10:43:25', '2019-09-17 10:43:25'),
(10, 21, 5, 50, '2019-09-17 10:43:36', '2019-09-17 10:43:36'),
(11, 21, 7, 100, '2019-09-17 10:43:47', '2019-09-17 10:43:47'),
(12, 21, 1, 5000, '2019-09-17 10:43:56', '2019-09-17 10:43:56'),
(13, 21, 8, 2500, '2019-09-17 10:44:07', '2019-09-17 10:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `cat_name`, `created_at`, `updated_at`) VALUES
(1, 'Rent', NULL, NULL),
(2, 'Food', NULL, NULL),
(3, 'Electricity', NULL, NULL),
(4, 'Gas', NULL, NULL),
(5, 'Mobile', NULL, NULL),
(6, 'Internet', NULL, NULL),
(7, 'Other', NULL, NULL),
(8, 'Shopping', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(2, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(3, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(4, '2016_06_01_000004_create_oauth_clients_table', 1),
(5, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(6, '2018_07_26_160712_create_users_table', 1),
(7, '2019_04_06_083646_create_expense_categories_table', 1),
(8, '2019_04_07_061325_create_bills_table', 1),
(9, '2019_08_13_142833_create_all_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('125e9755df991b034ac841be2d8564d75ec614415992c4645cddd526bb4c90b79cd7986b41cffdaa', 14, 1, 'MyApp', '[]', 0, '2019-08-15 06:43:11', '2019-08-15 06:43:11', '2020-08-15 15:43:11'),
('1fce994df45ce31b0a461c31617d851bba4840e8499100b5ac02139297b935094d49be3489485573', 7, 1, 'MyApp', '[]', 0, '2019-08-13 07:40:44', '2019-08-13 07:40:44', '2020-08-13 16:40:44'),
('2079826dffebbe16cd3c650ed692854e0b433dd0bb7d0ac36eacefd102a8d405f6dd000ff378c4ed', 5, 1, 'MyApp', '[]', 0, '2019-08-13 07:30:53', '2019-08-13 07:30:53', '2020-08-13 16:30:53'),
('216cc41c96073db821e36977ebf2f96b06f6b4309551eb01fc5390edb966863d57090f7e31fad1b2', 14, 1, 'MyApp', '[]', 0, '2019-08-14 09:01:46', '2019-08-14 09:01:46', '2020-08-14 18:01:46'),
('2df3b047dad913a08a2f624865457d1d852c9cddf01ad48933e8df35f42b3f8d3295af300a92b1d8', 5, 1, 'MyApp', '[]', 0, '2019-08-13 07:31:05', '2019-08-13 07:31:05', '2020-08-13 16:31:05'),
('355a1f421859d884539a0a7ad856a1958c9a1cb89bac726d5258576973873c67054bcc18ca32451a', 21, 1, 'MyApp', '[]', 0, '2019-09-15 13:14:48', '2019-09-15 13:14:48', '2020-09-15 13:14:48'),
('362d24b9b4f7593bd9f7660f37d267469da43e860f10fdcf90328ed43afce3ea1d6f58ad2bbd79b4', 21, 1, 'MyApp', '[]', 0, '2019-09-11 04:48:52', '2019-09-11 04:48:52', '2020-09-11 04:48:52'),
('387957a4c95100da5ea976dcc24a95844d9a31b9444e0b1a7ee8fd9e5a7fad40d9a59ed1f42c07bd', 14, 1, 'MyApp', '[]', 0, '2019-08-14 09:27:47', '2019-08-14 09:27:47', '2020-08-14 18:27:47'),
('3a9aa4b1bd66bc34f026fcdd2f7e79b2828969cabea2d5434f1e011667f3b2f4beb5de738c8c8332', 14, 1, 'MyApp', '[]', 0, '2019-08-13 08:49:06', '2019-08-13 08:49:06', '2020-08-13 17:49:06'),
('490d70270c16c90fff2f1a843585ab54fa80b016b9f7b32d9871735dab5aefa265d5563d84f56995', 21, 1, 'MyApp', '[]', 0, '2019-08-23 01:50:38', '2019-08-23 01:50:38', '2020-08-23 01:50:38'),
('4fd10a4fd1dabe9fe6bc139c303551443b899fbe0e9abb948878d1a940e41c5572d3d182071afe0b', 3, 1, 'MyApp', '[]', 0, '2019-08-13 07:01:51', '2019-08-13 07:01:51', '2020-08-13 16:01:51'),
('50cade64a3760ce372dc1807295b1057b18bc153ffcb91fe628dea8e6d2c430120563beb4c2ca6f8', 14, 1, 'MyApp', '[]', 0, '2019-08-13 08:48:11', '2019-08-13 08:48:11', '2020-08-13 17:48:11'),
('5e21921b5462a8078712aecf2f019dabc7cc3c933cee4a6b82841751a703297a814c935a101a0b9a', 14, 1, 'MyApp', '[]', 0, '2019-08-15 04:51:44', '2019-08-15 04:51:44', '2020-08-15 13:51:44'),
('633384527f13f8919da2ad0259b96473870b7e4f28e11a15792bf87b854af69946975c3e157874c3', 14, 1, 'MyApp', '[]', 0, '2019-08-13 08:48:46', '2019-08-13 08:48:46', '2020-08-13 17:48:46'),
('648d880c6cbfb621f9315abd91dd4cec3ece5bdf457b74d44b3c7e7f98089f4c2ff2ca5f1ea6e7b1', 21, 1, 'MyApp', '[]', 0, '2019-08-17 04:19:29', '2019-08-17 04:19:29', '2020-08-17 13:19:29'),
('6dc9594e5a9e0e95da0c20a1f6a3fdd60d81c085c9ef171936e2ecbf6b54a50f424148665c10f0eb', 21, 1, 'MyApp', '[]', 0, '2019-08-18 14:42:37', '2019-08-18 14:42:37', '2020-08-18 23:42:37'),
('7439bb2bc1864d1890a696be89d236397ed15d7ac50eca8917e60d0e4f21b4d275366c5d0a31d03c', 14, 1, 'MyApp', '[]', 0, '2019-08-13 19:12:23', '2019-08-13 19:12:23', '2020-08-14 04:12:23'),
('79adafa87f3851834720f021a67d413768a32346a1ff6040c6172014e46d6cd46755cdc84928f90e', 21, 1, 'MyApp', '[]', 0, '2019-08-18 14:26:21', '2019-08-18 14:26:21', '2020-08-18 23:26:21'),
('7c6fdd73d838eaa28fa6bb3258700baa8184cd11bd0d33febef506a851c7db1aad275685341bf596', 21, 1, 'MyApp', '[]', 0, '2019-08-17 22:51:11', '2019-08-17 22:51:11', '2020-08-18 07:51:11'),
('7fde6ba0859693ac8c6b950ce1d190cc9efa7afd146a436379122be5f34d71968e651f37dc6a6f85', 21, 1, 'MyApp', '[]', 0, '2019-08-17 04:42:09', '2019-08-17 04:42:09', '2020-08-17 13:42:09'),
('83c7d648fcf6142afe910944ee5bbf194430d808ce9ec1ba3f59f6978d328c37f8e004e5a66a2da9', 21, 1, 'MyApp', '[]', 0, '2019-08-17 02:49:32', '2019-08-17 02:49:32', '2020-08-17 11:49:32'),
('895a54bc39e9c1770839cd88a238eb8d5206057aac21480d60dcab915a20e9231641a2a104e4bc8b', 31, 1, 'MyApp', '[]', 0, '2019-08-24 18:22:38', '2019-08-24 18:22:38', '2020-08-24 18:22:38'),
('8f60465a5daded709aba4925ad2593f3ca1709fb1f8c020c64489fd131f4484ee52c3e5fce2a5663', 21, 1, 'MyApp', '[]', 0, '2019-08-21 20:05:31', '2019-08-21 20:05:31', '2020-08-22 05:05:31'),
('8f7e158836836e5bcb9e7c3ad1b057b5874825b7eada3ee37ec6c2a122bb704e336deb0749a4541d', 14, 1, 'MyApp', '[]', 0, '2019-08-14 11:13:11', '2019-08-14 11:13:11', '2020-08-14 20:13:11'),
('92579a1304f04b41f641b3328b6bdbd3c5ba74df8109f31d8eae2a424c3ad289a14369d591ddebf5', 21, 1, 'MyApp', '[]', 0, '2019-09-15 13:52:55', '2019-09-15 13:52:55', '2020-09-15 13:52:55'),
('97563c7a103bbaabeb4cc3bfbe7fa23cc8f0fade61f1bb6fa6353ab31bb250ff1b9a5a5ebafd68be', 21, 1, 'MyApp', '[]', 0, '2019-08-17 20:19:12', '2019-08-17 20:19:12', '2020-08-18 05:19:12'),
('a6efc9cf240d9f090d07f3c457baa48325d87dfa2bdb4d4c620d76c684f31f0d7eb89e63660047b4', 14, 1, 'MyApp', '[]', 0, '2019-08-15 05:02:24', '2019-08-15 05:02:24', '2020-08-15 14:02:24'),
('aaf93c7fe214775bff2fbaa9a8b537a3cd34a998a10514ee49aa1ae0120bb86831477e2ce5514750', 3, 1, 'MyApp', '[]', 0, '2019-08-13 07:16:17', '2019-08-13 07:16:17', '2020-08-13 16:16:17'),
('ab53b000b0903f46325e52d7aa314f777206f358ce6f9d06845d73499f27d6d9a612414ebe95d221', 21, 1, 'MyApp', '[]', 0, '2019-09-13 16:18:09', '2019-09-13 16:18:09', '2020-09-13 16:18:09'),
('b15dae043ede73fc9a76257c6afff53c0acda929a2e269d22fa414fd8a948db5f8486ffc4a5dfb5b', 21, 1, 'MyApp', '[]', 0, '2019-09-17 10:42:42', '2019-09-17 10:42:42', '2020-09-17 10:42:42'),
('b8b5ac364f6a6859483f9af307cf29defc4941287cbe91a091db9dc255920413242540344b4c5550', 14, 1, 'MyApp', '[]', 0, '2019-08-14 12:49:47', '2019-08-14 12:49:47', '2020-08-14 21:49:47'),
('b9b910208c25fac8f8b06bdc2da2b4ec746882eb9c778f4ca5a2de1a0e4574af309e07cd10107d7d', 14, 1, 'MyApp', '[]', 0, '2019-08-14 09:29:04', '2019-08-14 09:29:04', '2020-08-14 18:29:04'),
('c5793a0f17b3dd6aafd34171d4c5274ea2967edf8a250842fafbfbb54684a9073745d7769703bb4f', 14, 1, 'MyApp', '[]', 0, '2019-08-15 03:19:04', '2019-08-15 03:19:04', '2020-08-15 12:19:04'),
('c5a2f8b13f0261c872e6a917ad29accb989b0fde687ab3798eda710f82a1d1b36894070e392f5aa7', 21, 1, 'MyApp', '[]', 0, '2019-09-12 09:31:53', '2019-09-12 09:31:53', '2020-09-12 09:31:53'),
('ca7b2194d948403e64ef3522c88f6efadbaf46c134a1dbce248773b570bfa10cc76277a93ba89d26', 21, 1, 'MyApp', '[]', 0, '2019-08-17 03:27:12', '2019-08-17 03:27:12', '2020-08-17 12:27:12'),
('ca81ac6c3c44f5ed135702e32c6eca7ab90e0a7c7a2e1ade42cbbb9de3e55ef42998894bb8e631ab', 14, 1, 'MyApp', '[]', 0, '2019-08-14 12:00:31', '2019-08-14 12:00:31', '2020-08-14 21:00:31'),
('ccef525d9884d2582c49a645ec00497f1d29a35c4ec963fdd38a2a190f381cf50d7857a1e3bc0d30', 21, 1, 'MyApp', '[]', 0, '2019-08-17 05:34:55', '2019-08-17 05:34:55', '2020-08-17 14:34:55'),
('cd7e260194264fb28c9a99af7144becd2dbf518cc915575f133c4621d79200c8592d6ca504aa6466', 21, 1, 'MyApp', '[]', 0, '2019-08-21 23:06:00', '2019-08-21 23:06:00', '2020-08-22 08:06:00'),
('d2671bc4444313ab05e2ed63e3d6c1fc621321387dfa60ea59448a832719d1ffb1edd910053a6084', 6, 1, 'MyApp', '[]', 0, '2019-08-13 07:31:52', '2019-08-13 07:31:52', '2020-08-13 16:31:52'),
('d9db49e40b2d9f79935a9837593ae128eab066e561c31bb013a609e4b659af3b92f9b087e690c070', 30, 1, 'MyApp', '[]', 0, '2019-08-23 06:45:33', '2019-08-23 06:45:33', '2020-08-23 06:45:33'),
('da063cdca0b6698970383a2e8846a7305ff927374b9c57e9c6cf102cc40249815ec0659c739a741e', 21, 1, 'MyApp', '[]', 0, '2019-08-24 06:01:05', '2019-08-24 06:01:05', '2020-08-24 06:01:05'),
('db71ac357ebf5c8d971cd0dfbff6f0c9e6bed56e9bed74e7f7f4d7a595dfe2f76f8e1d4714dc8f49', 21, 1, 'MyApp', '[]', 0, '2019-09-11 04:33:18', '2019-09-11 04:33:18', '2020-09-11 04:33:18'),
('e403d7d1d12584d7b8d62893b6da185fcb19463187b3afc7dee98fd32803d9c905671b8ec8961fca', 21, 1, 'MyApp', '[]', 0, '2019-09-14 06:15:09', '2019-09-14 06:15:09', '2020-09-14 06:15:09'),
('eba43ee8098e5a379a2e778198bde913a103297ede3e0a2d8e52c3c7ccddbafba82b1bcf23d07dd6', 14, 1, 'MyApp', '[]', 0, '2019-08-14 09:02:24', '2019-08-14 09:02:24', '2020-08-14 18:02:24'),
('eeaf1bd5ae50bb5146c1fc107bff8b85aee0162593e68b3749cf01fbd61472589b577752c516b29a', 21, 1, 'MyApp', '[]', 0, '2019-08-15 16:39:59', '2019-08-15 16:39:59', '2020-08-16 01:39:59'),
('fcd54e8a5d07846e40315e968a386e455dd8b26caec47fea584997831fbad43af3ffdb95d7413405', 14, 1, 'MyApp', '[]', 0, '2019-08-14 09:27:40', '2019-08-14 09:27:40', '2020-08-14 18:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'BachelorLife Personal Access Client', '6VK0Ktzf6qDh9yZjBRjvrqFsNcA4paHkvPy3HZKs', 'http://localhost', 1, 0, 0, '2019-08-13 07:01:00', '2019-08-13 07:01:00'),
(2, NULL, 'BachelorLife Password Grant Client', 'qIFdt0yRJXJ8tmOnIS5NL6yCUcwNxM2YmMNBN4OD', 'http://localhost', 0, 1, 0, '2019-08-13 07:01:00', '2019-08-13 07:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-08-13 07:01:00', '2019-08-13 07:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` char(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_at`, `updated_at`, `email`, `name`, `password`, `remember_token`, `api_token`, `status`) VALUES
(21, '2019-08-15 16:32:53', '2019-09-11 04:33:08', 'devsifat@gmail.com', 'sifatul', '$2y$10$Drc3kBznEMqN1skFNIWyEezCw/2BoyC0k6A8A9fOzlKBQ51uajJ/q', 'wDipEopRbCcSDT4amPlsJG0AGbHAZ3HQiwowYinF6p4KimffWoKYTWIU6rd8', NULL, 2),
(28, '2019-08-23 03:03:22', '2019-08-23 03:03:22', 'sifii2013@gmail.com', 'sifii', '$2y$10$axwP2VEOfQv8yMxk/HewEecWzpGsvrJTvgDuIKx9yhW0uCe0YNtji', NULL, NULL, 1),
(29, '2019-08-23 06:42:35', '2019-08-23 06:42:35', 'jhondoe@gmail.com', 'Jhon Doe', '$2y$10$yGJg.HLVYIFMF3RjrnXRK.9FntyymjYQv3CuT/XoMXlzs7067ouQC', NULL, NULL, 1),
(30, '2019-08-23 06:43:29', '2019-08-23 06:45:17', 'anisulislamfahad@gmail.com', 'Anisul Islam', '$2y$10$ULoeb8Xh/06nj2wvnjXixOv3Mk9zcvx1iGU.Tp8tReEHY6umZ8fMG', 'syYWi2dtLZYwvFTqdQv4sHy5nSnn3saVHMzDkpNToNzlVLCxdYx7laZ1VC8D', NULL, 2),
(31, '2019-08-24 18:14:04', '2019-08-24 18:18:27', 'mihodihasan@gmail.com', 'Lushan', '$2y$10$0J3q6wbpx2FOLOCa7q9IDuhMvewZEFNIJBOzxqnbKhcDnCv18aFJC', 'nQIEd5Zq2awZJDdt1xctHjSh9GUBsR8nzqd3Gbv2XD3bsoTz1mC3VuEwGP2Q', NULL, 2),
(32, '2019-08-26 12:41:32', '2019-08-26 12:41:32', 'moba@moba.com', 'Moba', '$2y$10$8lfhoLSRmwe172IR2/ni5ew6K6R433hTwKewqZW3witQBQb.Ak4CG', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_tokens`
--
ALTER TABLE `all_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_user_id_foreign` (`user_id`),
  ADD KEY `bills_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_tokens`
--
ALTER TABLE `all_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `expense_categories` (`id`),
  ADD CONSTRAINT `bills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
