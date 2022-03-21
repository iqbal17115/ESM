-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2022 at 06:19 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sohan_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cards`
--

CREATE TABLE `add_to_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` double(8,2) NOT NULL DEFAULT 0.00,
  `unit_price` double(8,2) NOT NULL DEFAULT 0.00,
  `total_price` double(8,2) NOT NULL DEFAULT 0.00,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_to_cards`
--

INSERT INTO `add_to_cards` (`id`, `session_id`, `product_id`, `quantity`, `unit_price`, `total_price`, `data`, `created_at`, `updated_at`, `deleted_at`) VALUES
(50, '74Iw89R0BWQ0cojFfrricZhBrT1JjgGvnEcpkPN9', 20, 4414.00, 170.00, 750380.00, '{\"product_id\":20,\"product_name\":\"Vegetable Four\",\"regular_price\":200,\"special_price\":170,\"wholesale_price\":0,\"image\":\"k6UpoEIV8PPhzKK61VuP59zMctzkJ8KaQLK3t3Gl.jpg\"}', '2022-03-07 23:22:50', '2022-03-08 00:36:51', NULL),
(51, '74Iw89R0BWQ0cojFfrricZhBrT1JjgGvnEcpkPN9', 18, 46.00, 100.00, 4600.00, '{\"product_id\":18,\"product_name\":\"Vegetable Three\",\"regular_price\":120,\"special_price\":100,\"wholesale_price\":0,\"image\":\"KyMVgXJnAExINSvNPtyJ3moz2ijcpawxArxz8V6P.jpg\"}', '2022-03-07 23:22:52', '2022-03-08 00:35:13', NULL),
(52, '74Iw89R0BWQ0cojFfrricZhBrT1JjgGvnEcpkPN9', 14, 133.00, 380.00, 50540.00, '{\"product_id\":14,\"product_name\":\"Product Three\",\"regular_price\":400,\"special_price\":380,\"wholesale_price\":0,\"image\":\"t1HemSBHwMCAWgVT2ZNxLQHvroDxOoTA727hk3gp.jpg\"}', '2022-03-07 23:22:55', '2022-03-07 23:40:17', NULL),
(64, 'FsmdqCfzKEzJaSZYqAp92f0CZMcfBsP2dguIYmnw', 1, 3.00, 100.00, 300.00, '{\"product_id\":1,\"product_name\":\"Vegetable\",\"regular_price\":120,\"special_price\":100,\"wholesale_price\":0,\"image\":\"tX6T733fZTcViJB8ztwTq1Tnl05GPCYYzCRa6Fvm.jpg\"}', '2022-03-08 22:46:00', '2022-03-08 22:46:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `code`, `name`, `address`, `mobile`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'B641719666', 'fdhgdf', 'gfhdfh', '4654', 1, 1, '2022-01-09 03:14:32', '2022-01-09 03:14:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `code`, `name`, `image`, `description`, `branch_id`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'C1640283522', 'gjhgf', NULL, NULL, 1, 1, 1, '2022-01-04 02:05:26', '2022-01-04 02:05:26', NULL),
(2, 'C1643735516', 'Freshness', 'Val6bToMNmfOXBKqFQXPq3FcPLSGY3iwUMIVa7yg.jpg', NULL, 1, 1, 1, '2022-02-13 00:58:53', '2022-02-13 00:58:53', NULL),
(3, 'C1643736854', 'Vegetable', 'gyWOblMoqHZSf4UJMtxtQIwe9h7CwGqOoJz28rrz.jpg', NULL, 1, 1, 1, '2022-02-13 01:21:10', '2022-02-13 01:21:28', NULL),
(4, 'C1643741192', 'Meat & Seafood', 'ceG4GTKplrXGpCHrnsvndlzWA3otUrlrQomZ5SfV.jpg', NULL, 1, 1, 1, '2022-02-13 02:33:41', '2022-02-13 02:33:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `breaking_news`
--

CREATE TABLE `breaking_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `news` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_show` tinyint(4) NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `code`, `name`, `image1`, `image2`, `description`, `top_show`, `branch_id`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'C641121711', 'Check Category', 'cVy1oZp5905w3XoobvCxsTY0wlG30eodNIAiTU6u.jpg', NULL, NULL, 1, 1, 1, 1, '2022-01-02 05:08:45', '2022-02-26 02:39:31', NULL),
(2, 'C643177962', 'Check Category 2', 'lTTMtBLnKvbLxIQgBirRIA2XsdY1TglV3GzDVfEk.jpg', 'wfnDXJxXeGdWPJLKubV289shJMB2D0zyPmBHHj6K.jpg', NULL, 1, 1, 1, 1, '2022-01-26 00:19:39', '2022-02-26 02:39:17', NULL),
(3, 'C644735541', 'Fresh Fruit', 'Zvx24T0SW8YY1jmSZVg1vCjnG4gjM4VXmyLC9kKT.jpg', NULL, NULL, 1, 1, 1, 1, '2022-02-13 00:59:18', '2022-02-26 02:39:05', NULL),
(4, 'C644736811', 'Vegetable', 'urfejey2aO7HxiRY1Z6oCrIvKXhn5YRkApqTAH18.jpg', NULL, NULL, 1, 1, 1, 1, '2022-02-13 01:20:43', '2022-02-26 02:38:54', NULL),
(5, 'C644741157', 'Meat & Seafood', 'ChxEmtuvdTfNYIoOCUQPsI6A841QIeOWhdRxWmTO.jpg', NULL, NULL, 1, 1, 1, 1, '2022-02-13 02:33:01', '2022-02-26 02:38:40', NULL),
(6, 'C646305044', 'Meet', 'XjKzYwxOlKmPj9UmaKZH5G2Oz1tuTFhMF6isdUJ6.jpg', '0PYkQ5856wh2SnXsBksPJJSXjfKLApe9xZUjXRG0.jpg', NULL, 0, 1, 1, 1, '2022-03-03 04:58:25', '2022-03-03 04:58:56', NULL),
(7, 'C646723852', 'Banladeshi Items', 'VCi1BhES5q3Jl2e5shuTi2ccG0GI4GRFlsETq8Gp.jpg', NULL, NULL, 1, 1, 1, 1, '2022-03-08 01:17:49', '2022-03-08 01:17:49', NULL),
(8, 'C646723873', 'Japani Items', 'TYrUAO4xRavQgG87jrkpHUzLDsUcvG2eNP9YYQpR.jpg', NULL, NULL, 1, 1, 1, 1, '2022-03-08 01:18:08', '2022-03-08 01:18:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_infos`
--

CREATE TABLE `company_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy_policy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_map_location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_condition` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_policy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_infos`
--

INSERT INTO `company_infos` (`id`, `name`, `phone`, `mobile`, `address`, `video_title`, `hotline`, `email`, `web`, `logo`, `video_link`, `facebook_link`, `youtube_link`, `privacy_policy`, `google_map_location`, `terms_condition`, `about_us`, `return_policy`, `branch_id`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sohan Ecommerce', '01408979487', '01408979487', '123 Wall Street, New York / NY', NULL, '01408979487', 'demo@gmail.com', NULL, '9CrYBEtEeri1RYbdJpYXecK9vptXt5NZ0ibAUDUm.png', NULL, NULL, NULL, '<div id=\"shopify-section-page-template\" class=\"shopify-section\">\n<div class=\"\">\n<div class=\"page-wrapper \">\n<div class=\"container\">\n<div class=\"row\">\n<div class=\"col-md-12\">\n<div class=\"rte-page \">\n<div id=\"pt-pageContent\" class=\"show_unavailable_variants\">\n<div class=\"container-indent\">\n<div class=\"container\">\n<p>Massive Impacts ensures that your privacy is protected when you use our services. This applies to our website&nbsp;<a href=\"http://www.massive-impacts.com/\">www.massive-impacts.com</a>. We have a comprehensive policy that covers all the perspectives.</p>\n<p>Personal data</p>\n<p>Massive Impacts does not store, sell and share your personal data with any third parties. This includes all your credit/debit card information as well as any personal information. It will never rent or lease out this information to any third parties. &nbsp;</p>\n<p>We take your privacy very seriously. If anything contained in this privacy policy does not agree with you, please discontinue the use of our services at the earliest.</p>\n<p>&nbsp;</p>\n<p><strong>How do we use your data?</strong></p>\n<p>We use your data only to provide you with our services as per your expectation. This includes marketing offers and relevant information. It does not include any other purpose</p>\n<p><a href=\"http://www.massive-impacts.com/\">www.massive-impacts.com</a>&nbsp;will not pass any debit/credit card details to&nbsp;third parties, whatsoever they may be.</p>\n<p>All credit/debit cards&rsquo; details and personally identifiable information will NOT be stored, sold, shared, rented or leased to any third parties.&nbsp;<a href=\"http://www.massive-impacts.com/\">www.massive-impacts.com</a>&nbsp;will not pass any debit/credit card details to&nbsp;third parties</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p><strong>What information do we use?</strong></p>\n<p>We only collect the personal information that YOU share with us. This includes any or all information that you share for the purpose of buying our services, when you participate on activities on our website and contact us. We collect names; email addresses; mailing addresses; billing addresses; contact preferences; and other similar information.</p>\n<p>&lsquo;&rsquo;www.massive-impacts.com takes appropriate steps to ensure data privacy and security including through various hardware and software methodologies. However, (www.massive-impacts.com) cannot guarantee the security of any information that is disclosed online&rsquo;&rsquo;</p>\n<p>Any information you share is based on legal business interests and comes in fulfillment of our contract with you. It is in compliance our legal obligations and goes with your consent.</p>\n<p>&nbsp;</p>\n<p><strong>Additional Points</strong></p>\n<p><a href=\"http://www.massive-impacts.com/\">www.massive-impacts.com</a>&nbsp;is not responsible for the privacy policies of websites to which it links. If you provide any information to such third parties different rules regarding the collection and use of your personal information may apply. You should contact these entities directly if you have any questions about their use of the information that they collect.</p>\n<p>The Website Policies and Terms &amp; Conditions may be changed or updated occasionally to meet the requirements and standards.</p>\n<p>Therefore, the Customers&rsquo; are encouraged to frequently visit these sections to be updated about the changes on the website. Modifications will be effective on the day they are posted&rdquo;.</p>\n</div>\n</div>\n</div>\n<div id=\"shopify-section-footer-template\" class=\"shopify-section\">\n<div id=\"shopify-section-1594730339187\" class=\"shopify-section index-section \">\n<div class=\"container-indent\">\n<div class=\"container\">&nbsp;</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n<div id=\"shopify-section-newsletter-bar\" class=\"shopify-section\"></div>\n<div id=\"shopify-section-footer\" class=\"shopify-section\">\n<div data-section-id=\"footer\" data-section-type=\"footer-section\"><footer class=\"footer-main-standard\">\n<div class=\"container\">\n<div class=\"row\" data-gutter=\"60\">\n<div class=\"col-sm-4 footer-col\">&nbsp;</div>\n</div>\n</div>\n</footer></div>\n</div>', 'https://www.google.com.bd/maps/place/Shomikaron/@23.746663,90.3945468,17z/data=!3m1!4b1!4m5!3m4!1s0x3755b962165c30f5:0xe304ef627c4831bc!8m2!3d23.7466581!4d90.3967355', '<p>To protect your website, company, and customers, you need to state your terms of use in clear, simple, and easily understood language. Our simple terms and conditions template can instantly generate a custom terms of service policy for your business.</p>\n<p>Once your free terms of service policy is generated, you&rsquo;ll be able to continue customizing and making adjustments until it&rsquo;s perfect. Fill out the simple form below to get started.</p>', '<div class=\"new-module new-module__type-text new-grid-center \">\n<div class=\"prose\">\n<h2>Detailed Design</h2>\n<h4>PENCILS. POST-ITS. WHITEBOARDS.</h4>\n<p>Every project at Buuuk is led by a focus on design. It starts with thorough research and careful attention to detail. The key to delivering a memorable software solution is to present unique &amp; innovative solutions in a likeable and usable interface.We understand this and that is why, the project design lead is present in every client meeting.</p>\n</div>\n</div>\n<div class=\"new-module__type-columnsOpen new-grid-right \">\n<ul class=\"columns-grid columns-grid-3 \">\n<li>\n<div class=\"new-module new-module__type-summary fill-brand-module-m913548515 brand-one fill-bs-purple new-module-padded prose\">\n<div class=\"prose\">\n<h3>User Experience</h3>\n<p><em>Did you know</em>&nbsp;we have our own community of helpers who help us with research and user experience testing?</p>\n</div>\n</div>\n</li>\n<li>\n<div class=\"new-module new-module__type-summary fill-brand-module-m793710779 brand-one fill-bs-purple new-module-padded prose\">\n<div class=\"prose\">\n<h3>User Interface</h3>\n<p>UI design, animation prototyping and icon design is what we\'re really good at. It\'s not the only thing we\'re really good at though.</p>\n</div>\n</div>\n</li>\n<li>\n<div class=\"new-module new-module__type-summary fill-brand-module-m1215838384 brand-one fill-bs-purple new-module-padded prose\">\n<div class=\"prose\">\n<h3>Research</h3>\n<p>We work off assumptions and then spend a considerable amount of time verify these. This means market research and extensive testing with real people.</p>\n</div>\n</div>\n</li>\n</ul>\n</div>\n<div class=\"new-module new-module__type-text new-grid-center \">\n<div class=\"prose\">\n<h2>Expert Development</h2>\n<h4>APPS. SERVERS. CMS.</h4>\n<p>We\'ve been pioneering software development in Singapore since over a decade. We have the experience to delivering robust products and solutions whenever we take on a project.</p>\n<p>In addition to developing holistic software which provides delightful digital experience, each project requires a stable &amp; scalable server backend. We draw on our extensive experience of deploying robust servers &amp; integrating with existing setups to deliver the best.</p>\n</div>\n</div>\n<div class=\"new-module__type-columnsOpen new-grid-right \">\n<ul class=\"columns-grid columns-grid-2 \">\n<li>\n<div class=\"new-module new-module__type-summary fill-brand-module-m1667273167 brand-one fill-bp-green new-module-padded prose\">\n<div class=\"prose\">\n<h3>Smart Systems</h3>\n<p>Our clients usually come to us wanting something which works towards a specific business need and goal. We help them through any challenge may it be&nbsp;<strong>b</strong><strong>usiness intelligence dashboards , workflow automation &amp; analytics</strong>&nbsp;or any other request.</p>\n</div>\n</div>\n</li>\n<li>\n<div class=\"new-module new-module__type-summary fill-brand-module-m1181117081 brand-one fill-bp-green new-module-padded prose\">\n<div class=\"prose\">\n<h3>iOS, Android &amp; Wearables</h3>\n<p>We\'ve been developing apps since 2008. Those who\'ve been paying attention, that\'s when Apple opened the platform for development. Since then we\'ve published over a&nbsp;<strong>100+ apps for phones, tablets and wearables</strong>.</p>\n</div>\n</div>\n</li>\n</ul>\n</div>\n<div class=\"new-module new-module__type-text new-grid-center \">\n<div class=\"prose\">\n<h2>System Integration &amp; Beyond</h2>\n<h4>WEB. IOS. ANDROID.</h4>\n<p>We focus on quality. Only native applications at that &mdash; so that we can be really damn good at it. This includes all the major platforms &amp; also any other quirky systems you might might across. We draw on our extensive experience of deploying robust servers &amp; integrating with existing setups to deliver the best.</p>\n</div>\n</div>\n<div class=\"new-module__type-columnsOpen new-grid-center \">\n<ul class=\"columns-grid columns-grid-2 \">\n<li>\n<div class=\"new-module new-module__type-text \">\n<div class=\"prose\">\n<ul>\n<li>Maintenance &amp; Support</li>\n<li>24x7 monitoring</li>\n</ul>\n</div>\n</div>\n</li>\n<li>\n<div class=\"new-module new-module__type-text \">\n<div class=\"prose\">\n<ul>\n<li>Year-on-year product updates</li>\n<li>Data &amp; analytics review</li>\n</ul>\n</div>\n</div>\n</li>\n</ul>\n</div>', NULL, 1, 1, 1, '2022-01-09 03:21:22', '2022-02-26 05:08:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('Customer','Supplier','Staff','Both') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_type` enum('Retailer','Wholesale') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upazilla_id` bigint(20) UNSIGNED DEFAULT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `division_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upazila_id` int(56) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `opening_balance` double DEFAULT 0,
  `contact_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `type`, `contact_type`, `first_name`, `last_name`, `address`, `shipping_address`, `business_name`, `post_code`, `state`, `upazilla_id`, `district_id`, `division_id`, `country_id`, `phone`, `mobile`, `email`, `upazila_id`, `due_date`, `birthday`, `opening_balance`, `contact_category_id`, `branch_id`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Customer', NULL, 'Md. Iqbal Hossain', NULL, 'MMalibagh, Dhaka', 'MMalibagh, Dhaka', 'Check', NULL, NULL, NULL, 47, NULL, NULL, NULL, '01408979487', NULL, NULL, NULL, NULL, 0, NULL, 1, 1, 1, '2022-01-02 01:15:43', '2022-03-08 05:04:35', NULL),
(2, NULL, 'Supplier', NULL, 'fgjhgf', 'jgfjgfj', 'MMalibagh, Dhaka', 'fghfh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4654646', '465464', 'demo@gmail.com', NULL, NULL, NULL, NULL, 1, 1, 1, 1, '2022-01-09 03:13:03', '2022-01-09 03:13:03', NULL),
(3, NULL, 'Supplier', NULL, 'fhgfdhgf', 'Hoshdgfhsain', 'MMalibagh, Dhaka', 'fdhgfh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '464', '654646', 'demo@gmail.com', NULL, NULL, NULL, NULL, 2, 1, 1, 1, '2022-01-09 03:13:27', '2022-01-09 03:13:27', NULL),
(4, NULL, 'Supplier', NULL, 'Md.', 'Hossain', 'MMalibagh, Dhaka', 'vcbfb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '456546', '465546', 'demo@gmail.com', NULL, NULL, NULL, NULL, 3, 1, 1, 1, '2022-01-09 03:13:41', '2022-01-09 03:13:41', NULL),
(5, NULL, 'Customer', 'Retailer', 'Md.', 'Hossain', 'MMalibagh, Dhaka', 'bhgfhdh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01408979487', 'demo@gmail.com', NULL, '2022-01-22', NULL, NULL, 4, 1, 1, 1, '2022-01-25 23:21:39', '2022-01-25 23:21:39', NULL),
(6, 4, 'Customer', NULL, 'Md. Iqbal Hossain', NULL, 'address', 'address', 'hffdh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0140897948722', NULL, NULL, NULL, NULL, 0, NULL, 1, 1, 1, '2022-02-28 22:58:46', '2022-03-01 02:27:50', NULL),
(7, NULL, 'Customer', NULL, 'Md. Iqbal Hossain', NULL, NULL, 'address', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01408979675', NULL, NULL, NULL, NULL, 0, NULL, 1, 1, 1, '2022-03-01 02:15:00', '2022-03-01 02:15:00', NULL),
(8, NULL, 'Customer', NULL, 'Md. Iqbal Hossain', NULL, NULL, 'address', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45675', NULL, NULL, NULL, NULL, 0, NULL, 1, 1, 1, '2022-03-01 02:20:53', '2022-03-01 02:20:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_balances`
--

CREATE TABLE `contact_balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `opening_balance` double DEFAULT NULL,
  `purchase_amount` double DEFAULT NULL,
  `sale_amount` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `vat` double DEFAULT NULL,
  `commission` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_categories`
--

CREATE TABLE `contact_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('Customer','Supplier','Staff') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_categories`
--

INSERT INTO `contact_categories` (`id`, `type`, `code`, `name`, `branch_id`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Supplier', 'C1640719535', 'ghfnj', 1, 1, 1, '2022-01-09 03:12:20', '2022-01-09 03:12:20', NULL),
(2, 'Supplier', 'C1640719543', 'gfjhgfjgf', 1, 1, 1, '2022-01-09 03:12:30', '2022-01-09 03:12:30', NULL),
(3, 'Supplier', 'C1640719553', 'gfjghfjgf', 1, 1, 1, '2022-01-09 03:12:37', '2022-01-09 03:12:37', NULL),
(4, 'Customer', 'C1642174452', 'Test', 1, 1, 1, '2022-01-25 23:21:01', '2022-01-25 23:21:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupon_codes`
--

CREATE TABLE `coupon_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_day` int(11) DEFAULT NULL,
  `expired_date` timestamp NULL DEFAULT NULL,
  `after_effect_date` timestamp NULL DEFAULT NULL,
  `offer_type` enum('Percentage','Amount','Reward-Point') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_amount` double(20,4) DEFAULT NULL,
  `min_buy_amount` double(20,4) DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol_position` enum('Prefix','Surfix') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_word_prefix` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_word_suffix` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_word_prefix_position` enum('Prefix','Suffix') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_word_suffix_position` enum('Prefix','Suffix') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `title`, `symbol`, `symbol_position`, `in_word_prefix`, `in_word_suffix`, `in_word_prefix_position`, `in_word_suffix_position`, `branch_id`, `created_by`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'C644744805', '¥', '¥', 'Prefix', NULL, NULL, NULL, NULL, 1, 1, 1, NULL, '2022-02-13 03:33:41', '2022-02-13 03:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_methods`
--

CREATE TABLE `delivery_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `division_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bn_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `website`, `sort`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Comilla', 'কুমিল্লা', '23.4682747', '91.1788135', 'www.comilla.gov.bd', NULL, NULL, NULL, NULL),
(2, 1, 'Feni', 'ফেনী', '23.023231', '91.3840844', 'www.feni.gov.bd', NULL, NULL, NULL, NULL),
(3, 1, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '23.9570904', '91.1119286', 'www.brahmanbaria.gov.bd', NULL, NULL, NULL, NULL),
(4, 1, 'Rangamati', 'রাঙ্গামাটি', NULL, NULL, 'www.rangamati.gov.bd', NULL, NULL, NULL, NULL),
(5, 1, 'Noakhali', 'নোয়াখালী', '22.869563', '91.099398', 'www.noakhali.gov.bd', NULL, NULL, NULL, NULL),
(6, 1, 'Chandpur', 'চাঁদপুর', '23.2332585', '90.6712912', 'www.chandpur.gov.bd', NULL, NULL, NULL, NULL),
(7, 1, 'Lakshmipur', 'লক্ষ্মীপুর', '22.942477', '90.841184', 'www.lakshmipur.gov.bd', NULL, NULL, NULL, NULL),
(8, 1, 'Chattogram', 'চট্টগ্রাম', '22.335109', '91.834073', 'www.chittagong.gov.bd', NULL, NULL, NULL, NULL),
(9, 1, 'Coxsbazar', 'কক্সবাজার', NULL, NULL, 'www.coxsbazar.gov.bd', NULL, NULL, NULL, NULL),
(10, 1, 'Khagrachhari', 'খাগড়াছড়ি', '23.119285', '91.984663', 'www.khagrachhari.gov.bd', NULL, NULL, NULL, NULL),
(11, 1, 'Bandarban', 'বান্দরবান', '22.1953275', '92.2183773', 'www.bandarban.gov.bd', NULL, NULL, NULL, NULL),
(12, 2, 'Sirajganj', 'সিরাজগঞ্জ', '24.4533978', '89.7006815', 'www.sirajganj.gov.bd', NULL, NULL, NULL, NULL),
(13, 2, 'Pabna', 'পাবনা', '23.998524', '89.233645', 'www.pabna.gov.bd', NULL, NULL, NULL, NULL),
(14, 2, 'Bogura', 'বগুড়া', '24.8465228', '89.377755', 'www.bogra.gov.bd', NULL, NULL, NULL, NULL),
(15, 2, 'Rajshahi', 'রাজশাহী', NULL, NULL, 'www.rajshahi.gov.bd', NULL, NULL, NULL, NULL),
(16, 2, 'Natore', 'নাটোর', '24.420556', '89.000282', 'www.natore.gov.bd', NULL, NULL, NULL, NULL),
(17, 2, 'Joypurhat', 'জয়পুরহাট', NULL, NULL, 'www.joypurhat.gov.bd', NULL, NULL, NULL, NULL),
(18, 2, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', '24.5965034', '88.2775122', 'www.chapainawabganj.gov.bd', NULL, NULL, NULL, NULL),
(19, 2, 'Naogaon', 'নওগাঁ', NULL, NULL, 'www.naogaon.gov.bd', NULL, NULL, NULL, NULL),
(20, 3, 'Jashore', 'যশোর', '23.16643', '89.2081126', 'www.jessore.gov.bd', NULL, NULL, NULL, NULL),
(21, 3, 'Satkhira', 'সাতক্ষীরা', NULL, NULL, 'www.satkhira.gov.bd', NULL, NULL, NULL, NULL),
(22, 3, 'Meherpur', 'মেহেরপুর', '23.762213', '88.631821', 'www.meherpur.gov.bd', NULL, NULL, NULL, NULL),
(23, 3, 'Narail', 'নড়াইল', '23.172534', '89.512672', 'www.narail.gov.bd', NULL, NULL, NULL, NULL),
(24, 3, 'Chuadanga', 'চুয়াডাঙ্গা', '23.6401961', '88.841841', 'www.chuadanga.gov.bd', NULL, NULL, NULL, NULL),
(25, 3, 'Kushtia', 'কুষ্টিয়া', '23.901258', '89.120482', 'www.kushtia.gov.bd', NULL, NULL, NULL, NULL),
(26, 3, 'Magura', 'মাগুরা', '23.487337', '89.419956', 'www.magura.gov.bd', NULL, NULL, NULL, NULL),
(27, 3, 'Khulna', 'খুলনা', '22.815774', '89.568679', 'www.khulna.gov.bd', NULL, NULL, NULL, NULL),
(28, 3, 'Bagerhat', 'বাগেরহাট', '22.651568', '89.785938', 'www.bagerhat.gov.bd', NULL, NULL, NULL, NULL),
(29, 3, 'Jhenaidah', 'ঝিনাইদহ', '23.5448176', '89.1539213', 'www.jhenaidah.gov.bd', NULL, NULL, NULL, NULL),
(30, 4, 'Jhalakathi', 'ঝালকাঠি', NULL, NULL, 'www.jhalakathi.gov.bd', NULL, NULL, NULL, NULL),
(31, 4, 'Patuakhali', 'পটুয়াখালী', '22.3596316', '90.3298712', 'www.patuakhali.gov.bd', NULL, NULL, NULL, NULL),
(32, 4, 'Pirojpur', 'পিরোজপুর', NULL, NULL, 'www.pirojpur.gov.bd', NULL, NULL, NULL, NULL),
(33, 4, 'Barisal', 'বরিশাল', NULL, NULL, 'www.barisal.gov.bd', NULL, NULL, NULL, NULL),
(34, 4, 'Bhola', 'ভোলা', '22.685923', '90.648179', 'www.bhola.gov.bd', NULL, NULL, NULL, NULL),
(35, 4, 'Barguna', 'বরগুনা', NULL, NULL, 'www.barguna.gov.bd', NULL, NULL, NULL, NULL),
(36, 5, 'Sylhet', 'সিলেট', '24.8897956', '91.8697894', 'www.sylhet.gov.bd', NULL, NULL, NULL, NULL),
(37, 5, 'Moulvibazar', 'মৌলভীবাজার', '24.482934', '91.777417', 'www.moulvibazar.gov.bd', NULL, NULL, NULL, NULL),
(38, 5, 'Habiganj', 'হবিগঞ্জ', '24.374945', '91.41553', 'www.habiganj.gov.bd', NULL, NULL, NULL, NULL),
(39, 5, 'Sunamganj', 'সুনামগঞ্জ', '25.0658042', '91.3950115', 'www.sunamganj.gov.bd', NULL, NULL, NULL, NULL),
(40, 6, 'Narsingdi', 'নরসিংদী', '23.932233', '90.71541', 'www.narsingdi.gov.bd', NULL, NULL, NULL, NULL),
(41, 6, 'Gazipur', 'গাজীপুর', '24.0022858', '90.4264283', 'www.gazipur.gov.bd', NULL, NULL, NULL, NULL),
(42, 6, 'Shariatpur', 'শরীয়তপুর', NULL, NULL, 'www.shariatpur.gov.bd', NULL, NULL, NULL, NULL),
(43, 6, 'Narayanganj', 'নারায়ণগঞ্জ', '23.63366', '90.496482', 'www.narayanganj.gov.bd', NULL, NULL, NULL, NULL),
(44, 6, 'Tangail', 'টাঙ্গাইল', NULL, NULL, 'www.tangail.gov.bd', NULL, NULL, NULL, NULL),
(45, 6, 'Kishoreganj', 'কিশোরগঞ্জ', '24.444937', '90.776575', 'www.kishoreganj.gov.bd', NULL, NULL, NULL, NULL),
(46, 6, 'Manikganj', 'মানিকগঞ্জ', NULL, NULL, 'www.manikganj.gov.bd', NULL, NULL, NULL, NULL),
(47, 6, 'Dhaka', 'ঢাকা', '23.7115253', '90.4111451', 'www.dhaka.gov.bd', NULL, NULL, NULL, NULL),
(48, 6, 'Munshiganj', 'মুন্সিগঞ্জ', NULL, NULL, 'www.munshiganj.gov.bd', NULL, NULL, NULL, NULL),
(49, 6, 'Rajbari', 'রাজবাড়ী', '23.7574305', '89.6444665', 'www.rajbari.gov.bd', NULL, NULL, NULL, NULL),
(50, 6, 'Madaripur', 'মাদারীপুর', '23.164102', '90.1896805', 'www.madaripur.gov.bd', NULL, NULL, NULL, NULL),
(51, 6, 'Gopalganj', 'গোপালগঞ্জ', '23.0050857', '89.8266059', 'www.gopalganj.gov.bd', NULL, NULL, NULL, NULL),
(52, 6, 'Faridpur', 'ফরিদপুর', '23.6070822', '89.8429406', 'www.faridpur.gov.bd', NULL, NULL, NULL, NULL),
(53, 7, 'Panchagarh', 'পঞ্চগড়', '26.3411', '88.5541606', 'www.panchagarh.gov.bd', NULL, NULL, NULL, NULL),
(54, 7, 'Dinajpur', 'দিনাজপুর', '25.6217061', '88.6354504', 'www.dinajpur.gov.bd', NULL, NULL, NULL, NULL),
(55, 7, 'Lalmonirhat', 'লালমনিরহাট', NULL, NULL, 'www.lalmonirhat.gov.bd', NULL, NULL, NULL, NULL),
(56, 7, 'Nilphamari', 'নীলফামারী', '25.931794', '88.856006', 'www.nilphamari.gov.bd', NULL, NULL, NULL, NULL),
(57, 7, 'Gaibandha', 'গাইবান্ধা', '25.328751', '89.528088', 'www.gaibandha.gov.bd', NULL, NULL, NULL, NULL),
(58, 7, 'Thakurgaon', 'ঠাকুরগাঁও', '26.0336945', '88.4616834', 'www.thakurgaon.gov.bd', NULL, NULL, NULL, NULL),
(59, 7, 'Rangpur', 'রংপুর', '25.7558096', '89.244462', 'www.rangpur.gov.bd', NULL, NULL, NULL, NULL),
(60, 7, 'Kurigram', 'কুড়িগ্রাম', '25.805445', '89.636174', 'www.kurigram.gov.bd', NULL, NULL, NULL, NULL),
(61, 8, 'Sherpur', 'শেরপুর', '25.0204933', '90.0152966', 'www.sherpur.gov.bd', NULL, NULL, NULL, NULL),
(62, 8, 'Mymensingh', 'ময়মনসিংহ', NULL, NULL, 'www.mymensingh.gov.bd', NULL, NULL, NULL, NULL),
(63, 8, 'Jamalpur', 'জামালপুর', '24.937533', '89.937775', 'www.jamalpur.gov.bd', NULL, NULL, NULL, NULL),
(64, 8, 'Netrokona', 'নেত্রকোণা', '24.870955', '90.727887', 'www.netrokona.gov.bd', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bn_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`, `sort`, `website`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Chattagram', 'চট্টগ্রাম', NULL, 'www.chittagongdiv.gov.bd', NULL, NULL, NULL),
(2, 'Rajshahi', 'রাজশাহী', NULL, 'www.rajshahidiv.gov.bd', NULL, NULL, NULL),
(3, 'Khulna', 'খুলনা', NULL, 'www.khulnadiv.gov.bd', NULL, NULL, NULL),
(4, 'Barisal', 'বরিশাল', NULL, 'www.barisaldiv.gov.bd', NULL, NULL, NULL),
(5, 'Sylhet', 'সিলেট', NULL, 'www.sylhetdiv.gov.bd', NULL, NULL, NULL),
(6, 'Dhaka', 'ঢাকা', NULL, 'www.dhakadiv.gov.bd', NULL, NULL, NULL),
(7, 'Rangpur', 'রংপুর', NULL, 'www.rangpurdiv.gov.bd', NULL, NULL, NULL),
(8, 'Mymensingh', 'ময়মনসিংহ', NULL, 'www.mymensinghdiv.gov.bd', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('Order','Sales','Purchase','Quate') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subtotal` double(20,4) DEFAULT NULL,
  `vat_total` double(20,4) DEFAULT NULL,
  `discount_value` double(20,4) DEFAULT NULL,
  `discount` double(20,4) DEFAULT NULL,
  `shipping_charge` double(20,4) DEFAULT NULL,
  `earn_point` double(20,4) DEFAULT NULL,
  `earn_point_amount` double(20,4) DEFAULT NULL,
  `expense_point` double(20,4) DEFAULT NULL,
  `expense_point_amount` double(20,4) DEFAULT NULL,
  `grand_total` double(20,4) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Pending','In Process','Delivered','Accepted','Rescheduled','Picked Up','Cancel','Return') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_settings`
--

CREATE TABLE `invoice_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('Invoice','Receipt') COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_header` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_footer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_reg_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_area_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_text` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_id` bigint(20) UNSIGNED NOT NULL,
  `is_paid_due_hide` tinyint(1) DEFAULT 0,
  `is_memo_no_hide` tinyint(1) DEFAULT 0,
  `is_chalan_no_hide` tinyint(1) DEFAULT 0,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign_up` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sign_in` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `best_selling_product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complain_or_opinion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `communication` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_policy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_us` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy_policy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_and_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mission_and_vision` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `my_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_search` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beaking_news` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `more_categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `more_products` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopping_cart` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkout` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopping_cart_button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkout_button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `register_button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logout_button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sell_button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sold_out_button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_page_order_finish_button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkout_page_order_done_button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `see_your_order_button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `more_order_button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_name_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `your_name_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zilla_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_address_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_address_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_page_header_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkout_page_header_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordered_product_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_total_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_name_placeholder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `your_name_placeholder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `your_mobile_number_placeholder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_address_placeholder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_address_placeholder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `select_zila_option_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_product_in_shopping_bag_alert_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_product_alert` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cash_on_delivery_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`, `sign_up`, `sign_in`, `new_product`, `best_selling_product`, `home`, `product_categories`, `shop_page`, `complain_or_opinion`, `communication`, `return_policy`, `contact_us`, `privacy_policy`, `terms_and_condition`, `about_us`, `mission_and_vision`, `my_account`, `menu`, `product_search`, `beaking_news`, `total`, `sub_total`, `discount`, `more_categories`, `more_products`, `shopping_cart`, `checkout`, `shopping_cart_button_text`, `checkout_button_text`, `login_button_text`, `register_button_text`, `logout_button_text`, `sell_button_text`, `sold_out_button_text`, `cart_page_order_finish_button_text`, `checkout_page_order_done_button_text`, `see_your_order_button_text`, `more_order_button_text`, `business_name_label`, `your_name_label`, `zilla_label`, `delivery_address_label`, `mobile_number_label`, `full_address_label`, `unit`, `cart_page_header_title`, `checkout_page_header_title`, `ordered_product_title`, `bill_total_title`, `business_name_placeholder`, `your_name_placeholder`, `your_mobile_number_placeholder`, `full_address_placeholder`, `delivery_address_placeholder`, `select_zila_option_text`, `no_product_in_shopping_bag_alert_text`, `no_product_alert`, `cash_on_delivery_text`, `is_default`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'JA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-03-03 06:38:19', '2022-03-03 06:38:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2021_02_13_105214_create_sessions_table', 1),
(10, '2021_03_30_123909_create_profile_settings_table', 1),
(11, '2021_04_01_210304_create_permission_categories_table', 1),
(12, '2021_06_13_064243_create_brands_table', 1),
(13, '2021_06_13_064317_create_categories_table', 1),
(14, '2021_06_13_064338_create_sub_categories_table', 1),
(15, '2021_06_13_064414_create_sub_sub_categories_table', 1),
(16, '2021_06_13_064438_create_units_table', 1),
(17, '2021_06_13_064514_create_products_table', 1),
(18, '2021_06_13_064634_create_product_images_table', 1),
(19, '2021_06_13_064743_create_contacts_table', 1),
(20, '2021_06_13_065016_create_invoice_settings_table', 1),
(21, '2021_06_13_065038_create_payment_methods_table', 1),
(22, '2021_06_13_065149_create_delivery_methods_table', 1),
(23, '2021_06_13_065207_create_vats_table', 1),
(24, '2021_06_13_065246_create_branches_table', 1),
(25, '2021_06_13_065302_create_warehouses_table', 1),
(26, '2021_06_13_065444_create_invoices_table', 1),
(27, '2021_06_13_065519_create_stock_managers_table', 1),
(28, '2021_06_13_065548_create_stock_adjustments_table', 1),
(29, '2021_06_13_065811_create_payments_table', 1),
(30, '2021_06_13_070133_create_currencies_table', 1),
(31, '2021_06_13_073934_create_contact_categories_table', 1),
(32, '2021_06_19_070242_create_company_infos_table', 1),
(33, '2021_06_19_090514_create_sliders_table', 1),
(34, '2021_06_19_113037_create_coupon_codes_table', 1),
(35, '2021_06_27_124950_create_point_policies_table', 1),
(36, '2021_06_29_034815_create_colors_table', 1),
(37, '2021_06_29_053813_create_sizes_table', 1),
(38, '2021_06_29_155357_create_permission_tables', 1),
(39, '2021_07_16_052805_create_product_infos_table', 1),
(40, '2021_07_16_054152_create_sale_invoices_table', 1),
(41, '2021_07_16_055111_create_sale_invoice_details_table', 1),
(42, '2021_07_16_055154_create_product_barcodes_table', 1),
(43, '2021_07_16_060158_create_product_wish_lists_table', 1),
(44, '2021_07_16_174539_create_purchase_invoices_table', 1),
(45, '2021_07_16_174559_create_purchase_invoice_details_table', 1),
(46, '2021_07_16_175013_create_contact_balances_table', 1),
(47, '2021_07_16_205947_create_sale_payments_table', 1),
(48, '2021_07_16_205958_create_purchase_payments_table', 1),
(49, '2021_07_28_202059_create_add_to_cards_table', 1),
(50, '2021_08_01_113222_create_orders_table', 1),
(51, '2021_08_01_113325_create_order_details_table', 1),
(52, '2021_08_03_043041_create_shipping_charges_table', 1),
(53, '2021_08_18_083329_create_breaking_news_table', 1),
(54, '2021_08_23_095919_create_messages_table', 1),
(55, '2021_09_07_055322_create_languages_table', 1),
(56, '2021_09_11_043016_create_vendors_table', 1),
(57, '2022_01_01_043427_create_notifications_table', 1),
(59, '2022_01_25_040730_create_offers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 2),
(5, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 2),
(7, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 2),
(8, 'App\\Models\\User', 1),
(8, 'App\\Models\\User', 2),
(9, 'App\\Models\\User', 1),
(9, 'App\\Models\\User', 2),
(11, 'App\\Models\\User', 1),
(11, 'App\\Models\\User', 2),
(12, 'App\\Models\\User', 1),
(12, 'App\\Models\\User', 2),
(13, 'App\\Models\\User', 1),
(13, 'App\\Models\\User', 2),
(15, 'App\\Models\\User', 1),
(15, 'App\\Models\\User', 2),
(16, 'App\\Models\\User', 1),
(16, 'App\\Models\\User', 2),
(17, 'App\\Models\\User', 1),
(17, 'App\\Models\\User', 2),
(19, 'App\\Models\\User', 1),
(19, 'App\\Models\\User', 2),
(20, 'App\\Models\\User', 1),
(20, 'App\\Models\\User', 2),
(21, 'App\\Models\\User', 1),
(21, 'App\\Models\\User', 2),
(23, 'App\\Models\\User', 1),
(23, 'App\\Models\\User', 2),
(24, 'App\\Models\\User', 1),
(24, 'App\\Models\\User', 2),
(25, 'App\\Models\\User', 1),
(25, 'App\\Models\\User', 2),
(27, 'App\\Models\\User', 1),
(27, 'App\\Models\\User', 2),
(28, 'App\\Models\\User', 1),
(28, 'App\\Models\\User', 2),
(29, 'App\\Models\\User', 1),
(29, 'App\\Models\\User', 2),
(31, 'App\\Models\\User', 1),
(31, 'App\\Models\\User', 2),
(32, 'App\\Models\\User', 1),
(32, 'App\\Models\\User', 2),
(33, 'App\\Models\\User', 1),
(33, 'App\\Models\\User', 2),
(35, 'App\\Models\\User', 1),
(35, 'App\\Models\\User', 2),
(36, 'App\\Models\\User', 1),
(36, 'App\\Models\\User', 2),
(37, 'App\\Models\\User', 1),
(37, 'App\\Models\\User', 2),
(39, 'App\\Models\\User', 1),
(39, 'App\\Models\\User', 2),
(40, 'App\\Models\\User', 1),
(40, 'App\\Models\\User', 2),
(41, 'App\\Models\\User', 1),
(41, 'App\\Models\\User', 2),
(43, 'App\\Models\\User', 1),
(43, 'App\\Models\\User', 2),
(44, 'App\\Models\\User', 1),
(44, 'App\\Models\\User', 2),
(45, 'App\\Models\\User', 1),
(45, 'App\\Models\\User', 2),
(47, 'App\\Models\\User', 1),
(47, 'App\\Models\\User', 2),
(48, 'App\\Models\\User', 1),
(48, 'App\\Models\\User', 2),
(49, 'App\\Models\\User', 1),
(49, 'App\\Models\\User', 2),
(51, 'App\\Models\\User', 1),
(52, 'App\\Models\\User', 1),
(52, 'App\\Models\\User', 2),
(53, 'App\\Models\\User', 1),
(53, 'App\\Models\\User', 2),
(55, 'App\\Models\\User', 1),
(55, 'App\\Models\\User', 2),
(56, 'App\\Models\\User', 1),
(56, 'App\\Models\\User', 2),
(57, 'App\\Models\\User', 1),
(57, 'App\\Models\\User', 2),
(59, 'App\\Models\\User', 1),
(59, 'App\\Models\\User', 2),
(60, 'App\\Models\\User', 1),
(60, 'App\\Models\\User', 2),
(61, 'App\\Models\\User', 1),
(61, 'App\\Models\\User', 2),
(63, 'App\\Models\\User', 1),
(63, 'App\\Models\\User', 2),
(64, 'App\\Models\\User', 1),
(64, 'App\\Models\\User', 2),
(65, 'App\\Models\\User', 1),
(65, 'App\\Models\\User', 2),
(67, 'App\\Models\\User', 1),
(67, 'App\\Models\\User', 2),
(68, 'App\\Models\\User', 1),
(68, 'App\\Models\\User', 2),
(69, 'App\\Models\\User', 1),
(69, 'App\\Models\\User', 2),
(71, 'App\\Models\\User', 1),
(71, 'App\\Models\\User', 2),
(72, 'App\\Models\\User', 1),
(72, 'App\\Models\\User', 2),
(73, 'App\\Models\\User', 1),
(73, 'App\\Models\\User', 2),
(75, 'App\\Models\\User', 1),
(75, 'App\\Models\\User', 2),
(76, 'App\\Models\\User', 1),
(76, 'App\\Models\\User', 2),
(77, 'App\\Models\\User', 1),
(77, 'App\\Models\\User', 2),
(79, 'App\\Models\\User', 1),
(79, 'App\\Models\\User', 2),
(80, 'App\\Models\\User', 1),
(80, 'App\\Models\\User', 2),
(81, 'App\\Models\\User', 1),
(81, 'App\\Models\\User', 2),
(83, 'App\\Models\\User', 1),
(83, 'App\\Models\\User', 2),
(84, 'App\\Models\\User', 1),
(84, 'App\\Models\\User', 2),
(85, 'App\\Models\\User', 1),
(85, 'App\\Models\\User', 2),
(87, 'App\\Models\\User', 1),
(87, 'App\\Models\\User', 2),
(88, 'App\\Models\\User', 1),
(88, 'App\\Models\\User', 2),
(89, 'App\\Models\\User', 1),
(89, 'App\\Models\\User', 2),
(91, 'App\\Models\\User', 1),
(91, 'App\\Models\\User', 2),
(92, 'App\\Models\\User', 1),
(92, 'App\\Models\\User', 2),
(93, 'App\\Models\\User', 1),
(93, 'App\\Models\\User', 2),
(95, 'App\\Models\\User', 1),
(95, 'App\\Models\\User', 2),
(96, 'App\\Models\\User', 1),
(96, 'App\\Models\\User', 2),
(97, 'App\\Models\\User', 1),
(97, 'App\\Models\\User', 2),
(99, 'App\\Models\\User', 1),
(99, 'App\\Models\\User', 2),
(100, 'App\\Models\\User', 1),
(100, 'App\\Models\\User', 2),
(101, 'App\\Models\\User', 1),
(101, 'App\\Models\\User', 2),
(103, 'App\\Models\\User', 1),
(103, 'App\\Models\\User', 2),
(104, 'App\\Models\\User', 1),
(104, 'App\\Models\\User', 2),
(105, 'App\\Models\\User', 1),
(105, 'App\\Models\\User', 2),
(107, 'App\\Models\\User', 1),
(107, 'App\\Models\\User', 2),
(108, 'App\\Models\\User', 1),
(108, 'App\\Models\\User', 2),
(109, 'App\\Models\\User', 1),
(109, 'App\\Models\\User', 2),
(111, 'App\\Models\\User', 1),
(111, 'App\\Models\\User', 2),
(112, 'App\\Models\\User', 1),
(112, 'App\\Models\\User', 2),
(113, 'App\\Models\\User', 1),
(113, 'App\\Models\\User', 2),
(115, 'App\\Models\\User', 1),
(115, 'App\\Models\\User', 2),
(116, 'App\\Models\\User', 1),
(116, 'App\\Models\\User', 2),
(117, 'App\\Models\\User', 1),
(117, 'App\\Models\\User', 2),
(119, 'App\\Models\\User', 1),
(119, 'App\\Models\\User', 2),
(120, 'App\\Models\\User', 1),
(120, 'App\\Models\\User', 2),
(121, 'App\\Models\\User', 1),
(121, 'App\\Models\\User', 2),
(123, 'App\\Models\\User', 1),
(123, 'App\\Models\\User', 2),
(124, 'App\\Models\\User', 1),
(124, 'App\\Models\\User', 2),
(125, 'App\\Models\\User', 1),
(125, 'App\\Models\\User', 2),
(127, 'App\\Models\\User', 1),
(127, 'App\\Models\\User', 2),
(128, 'App\\Models\\User', 1),
(128, 'App\\Models\\User', 2),
(129, 'App\\Models\\User', 1),
(129, 'App\\Models\\User', 2),
(131, 'App\\Models\\User', 1),
(131, 'App\\Models\\User', 2),
(132, 'App\\Models\\User', 1),
(132, 'App\\Models\\User', 2),
(133, 'App\\Models\\User', 1),
(133, 'App\\Models\\User', 2),
(135, 'App\\Models\\User', 1),
(135, 'App\\Models\\User', 2),
(136, 'App\\Models\\User', 1),
(136, 'App\\Models\\User', 2),
(137, 'App\\Models\\User', 1),
(137, 'App\\Models\\User', 2),
(139, 'App\\Models\\User', 1),
(139, 'App\\Models\\User', 2),
(140, 'App\\Models\\User', 1),
(140, 'App\\Models\\User', 2),
(141, 'App\\Models\\User', 1),
(141, 'App\\Models\\User', 2),
(143, 'App\\Models\\User', 1),
(143, 'App\\Models\\User', 2),
(144, 'App\\Models\\User', 1),
(144, 'App\\Models\\User', 2),
(145, 'App\\Models\\User', 1),
(145, 'App\\Models\\User', 2),
(147, 'App\\Models\\User', 1),
(147, 'App\\Models\\User', 2),
(148, 'App\\Models\\User', 1),
(148, 'App\\Models\\User', 2),
(149, 'App\\Models\\User', 1),
(149, 'App\\Models\\User', 2),
(151, 'App\\Models\\User', 1),
(151, 'App\\Models\\User', 2),
(152, 'App\\Models\\User', 1),
(152, 'App\\Models\\User', 2),
(153, 'App\\Models\\User', 1),
(153, 'App\\Models\\User', 2),
(155, 'App\\Models\\User', 1),
(155, 'App\\Models\\User', 2),
(156, 'App\\Models\\User', 1),
(156, 'App\\Models\\User', 2),
(157, 'App\\Models\\User', 1),
(157, 'App\\Models\\User', 2),
(159, 'App\\Models\\User', 1),
(159, 'App\\Models\\User', 2),
(160, 'App\\Models\\User', 1),
(160, 'App\\Models\\User', 2),
(161, 'App\\Models\\User', 1),
(161, 'App\\Models\\User', 2),
(163, 'App\\Models\\User', 1),
(163, 'App\\Models\\User', 2),
(164, 'App\\Models\\User', 1),
(164, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('view') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `order_id`, `contact_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2022-01-25 01:18:23', '2022-01-25 01:18:23'),
(2, 2, 1, NULL, '2022-01-25 03:30:19', '2022-01-25 03:30:19'),
(3, 3, 1, NULL, '2022-01-25 03:37:19', '2022-01-25 03:37:19'),
(4, 4, 1, NULL, '2022-01-25 04:22:22', '2022-01-25 04:22:22'),
(5, 5, 1, NULL, '2022-01-25 04:25:37', '2022-01-25 04:25:37'),
(6, 6, 1, NULL, '2022-01-25 04:31:01', '2022-01-25 04:31:01'),
(7, 7, 7, NULL, '2022-03-01 02:15:00', '2022-03-01 02:15:00'),
(8, 8, 8, NULL, '2022-03-01 02:20:53', '2022-03-01 02:20:53'),
(9, 9, 6, NULL, '2022-03-01 02:27:50', '2022-03-01 02:27:50'),
(10, 10, 1, NULL, '2022-03-01 04:26:25', '2022-03-01 04:26:25'),
(11, 11, 1, NULL, '2022-03-08 05:04:35', '2022-03-08 05:04:35'),
(12, 12, 1, NULL, '2022-03-08 05:21:00', '2022-03-08 05:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_percent` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `status` enum('view') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `code`, `title`, `image`, `description`, `discount_percent`, `discount`, `link`, `is_active`, `status`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'OF643108678', 'Offer 1', 'mHCG9BhjzqiRk0UgDA82EV8NKODe1yKU4psmWR1R.jpg', 'fhfh', NULL, 100, 'http://127.0.0.1:8000/product-details/4', 1, NULL, 1, '2022-01-25 05:06:06', '2022-02-26 02:40:10', NULL),
(2, 'OF643108770', 'Offer 2', 'g3xLxICaEXBsNf8EHYPqT29oYHRvMFpAAmit5e62.jpg', 'dfgh', 10, 0, 'http://127.0.0.1:8000/product-details/4', 1, NULL, 1, '2022-01-25 05:07:06', '2022-02-26 02:40:01', NULL),
(3, 'OF643108831', 'Offer 3', 'f610kJYJYXgnxSrgo2mH4A6vsS8we0Iz1W6lId8w.png', 'fhgf', 7, NULL, 'http://127.0.0.1:8000/product-details/4', 1, NULL, 1, '2022-01-25 05:07:28', '2022-02-26 02:39:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `other_amount` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `shipping_charge` double DEFAULT NULL,
  `vat` double DEFAULT NULL,
  `payable_amount` double DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('processing','shipped','delivered','returned','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `contact_id`, `order_date`, `total_amount`, `other_amount`, `discount`, `shipping_charge`, `vat`, `payable_amount`, `note`, `coupon_code_id`, `status`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'OC643095104', 1, '2022-01-25 07:18:23', 3434, NULL, NULL, NULL, NULL, 3434, NULL, NULL, 'shipped', 1, '2022-01-25 01:18:23', '2022-01-25 01:19:06', NULL),
(2, 'OC643103020', 1, '2022-01-25 09:30:19', 3490, NULL, NULL, NULL, NULL, 3490, NULL, NULL, 'shipped', 1, '2022-01-25 03:30:19', '2022-01-25 03:30:46', NULL),
(3, 'OC643103440', 1, '2022-01-25 09:37:19', 7036, NULL, NULL, NULL, NULL, 7036, NULL, NULL, 'shipped', 1, '2022-01-25 03:37:19', '2022-01-25 03:38:00', NULL),
(4, 'OC643106143', 1, '2022-01-25 10:22:22', 3438, NULL, NULL, NULL, NULL, 3438, NULL, NULL, 'shipped', 1, '2022-01-25 04:22:22', '2022-01-25 04:24:56', NULL),
(5, 'OC643106338', 1, '2022-01-25 10:25:37', 60, NULL, NULL, NULL, NULL, 60, NULL, NULL, 'shipped', 1, '2022-01-25 04:25:37', '2022-01-25 04:25:57', NULL),
(6, 'OC643106662', 1, '2022-01-25 10:31:01', 47111, NULL, NULL, NULL, NULL, 47111, NULL, NULL, 'shipped', 1, '2022-01-25 04:31:01', '2022-01-27 04:32:57', NULL),
(7, 'OC646122501', 7, '2022-03-01 08:15:00', 710, NULL, NULL, NULL, NULL, 710, NULL, NULL, 'processing', 1, '2022-03-01 02:15:00', '2022-03-01 02:15:00', NULL),
(8, 'OC646122854', 8, '2022-03-01 08:20:53', 343, NULL, NULL, NULL, NULL, 343, NULL, NULL, 'processing', 1, '2022-03-01 02:20:53', '2022-03-01 02:20:53', NULL),
(9, 'OC646123271', 6, '2022-03-01 08:27:50', 810, NULL, NULL, NULL, NULL, 810, NULL, NULL, 'delivered', 1, '2022-03-01 02:27:50', '2022-03-03 07:09:02', NULL),
(10, 'OC646130386', 1, '2022-03-01 10:26:25', 170, NULL, NULL, NULL, NULL, 170, NULL, NULL, 'delivered', 1, '2022-03-01 04:26:25', '2022-03-03 07:08:53', NULL),
(11, 'OC646737476', 1, '2022-03-08 11:04:35', 900, NULL, NULL, NULL, NULL, 900, NULL, NULL, 'processing', 1, '2022-03-08 05:04:35', '2022-03-08 05:04:35', NULL),
(12, 'OC646738461', 1, '2022-03-08 11:21:00', 2620, NULL, NULL, NULL, NULL, 2620, NULL, NULL, 'processing', 1, '2022-03-08 05:21:00', '2022-03-08 05:21:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `vendor_id`, `order_id`, `product_id`, `unit_price`, `quantity`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 1, 1, 3434, 1, 1, '2022-01-25 01:18:23', '2022-01-25 01:18:23', NULL),
(2, NULL, 2, 4, 56, 1, 1, '2022-01-25 03:30:19', '2022-01-25 03:30:19', NULL),
(3, NULL, 2, 1, 3434, 1, 1, '2022-01-25 03:30:19', '2022-01-25 03:30:19', NULL),
(4, NULL, 3, 4, 56, 3, 1, '2022-01-25 03:37:19', '2022-01-25 03:37:19', NULL),
(5, NULL, 3, 1, 3434, 2, 1, '2022-01-25 03:37:19', '2022-01-25 03:37:19', NULL),
(6, NULL, 4, 5, 4, 1, 1, '2022-01-25 04:22:22', '2022-01-25 04:22:22', NULL),
(7, NULL, 4, 1, 3434, 1, 1, '2022-01-25 04:22:22', '2022-01-25 04:22:22', NULL),
(8, NULL, 5, 5, 4, 1, 1, '2022-01-25 04:25:37', '2022-01-25 04:25:37', NULL),
(9, NULL, 5, 4, 56, 1, 1, '2022-01-25 04:25:37', '2022-01-25 04:25:37', NULL),
(10, NULL, 6, 5, 4, 14, 1, '2022-01-25 04:31:01', '2022-01-27 04:22:32', '2022-01-27 04:22:32'),
(11, NULL, NULL, 1, 3435, 1, 1, '2022-01-27 04:07:06', '2022-01-27 04:07:06', NULL),
(12, NULL, NULL, 1, 3435, 1, 1, '2022-01-27 04:08:09', '2022-01-27 04:08:09', NULL),
(13, NULL, 6, 1, 3435, 13, 1, '2022-01-27 04:13:35', '2022-01-27 04:25:10', '2022-01-27 04:25:10'),
(14, NULL, 6, 5, 4, 14, 1, '2022-01-27 04:22:32', '2022-01-27 04:25:10', '2022-01-27 04:25:10'),
(15, NULL, 6, 1, 3435, 13, 1, '2022-01-27 04:25:10', '2022-01-27 04:25:10', NULL),
(16, NULL, 6, 5, 4, 14, 1, '2022-01-27 04:25:10', '2022-01-27 04:25:54', '2022-01-27 04:25:54'),
(17, NULL, 6, 5, 4, 14, 1, '2022-01-27 04:25:54', '2022-01-27 04:31:57', '2022-01-27 04:31:57'),
(18, NULL, 6, 5, 456, 1, 1, '2022-01-27 04:32:26', '2022-01-27 04:32:43', '2022-01-27 04:32:43'),
(19, NULL, 6, 7, 2000, 1, 1, '2022-01-27 04:32:26', '2022-01-27 04:32:26', NULL),
(20, NULL, 6, 5, 456, 1, 1, '2022-01-27 04:32:57', '2022-01-27 04:32:57', NULL),
(21, NULL, 7, 20, 170, 1, 1, '2022-03-01 02:15:00', '2022-03-01 02:15:00', NULL),
(22, NULL, 7, 22, 350, 1, 1, '2022-03-01 02:15:00', '2022-03-01 02:15:00', NULL),
(23, NULL, 7, 16, 190, 1, 1, '2022-03-01 02:15:00', '2022-03-01 02:15:00', NULL),
(24, NULL, 8, 27, 300, 1, 1, '2022-03-01 02:20:53', '2022-03-01 02:20:53', NULL),
(25, NULL, 8, 28, 43, 1, 1, '2022-03-01 02:20:53', '2022-03-01 02:20:53', NULL),
(26, NULL, 9, 22, 350, 1, 1, '2022-03-01 02:27:50', '2022-03-01 02:27:50', NULL),
(27, NULL, 9, 20, 170, 1, 1, '2022-03-01 02:27:50', '2022-03-01 02:27:50', NULL),
(28, NULL, 9, 18, 100, 1, 1, '2022-03-01 02:27:50', '2022-03-01 02:27:50', NULL),
(29, NULL, 9, 16, 190, 1, 1, '2022-03-01 02:27:50', '2022-03-01 02:27:50', NULL),
(30, NULL, 10, 20, 170, 1, 1, '2022-03-01 04:26:25', '2022-03-01 04:26:25', NULL),
(31, NULL, 11, 27, 300, 3, 1, '2022-03-08 05:04:35', '2022-03-08 05:04:35', NULL),
(32, NULL, 12, 13, 1740, 1, 1, '2022-03-08 05:21:00', '2022-03-08 05:21:00', NULL),
(33, NULL, 12, 14, 380, 1, 1, '2022-03-08 05:21:00', '2022-03-08 05:21:00', NULL),
(34, NULL, 12, 25, 500, 1, 1, '2022-03-08 05:21:00', '2022-03-08 05:21:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('CustomerPayment','SupplierPayment') COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` double(20,4) DEFAULT NULL,
  `charge` double(20,4) DEFAULT NULL,
  `net_amount` double(20,4) DEFAULT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receipt_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_balance` double DEFAULT 0,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `code`, `name`, `account_no`, `account_holder_name`, `opening_balance`, `branch_id`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'P1643084865', 'bKash', '123456789', 'Iqbal', 0, 1, 1, 1, '2022-01-26 02:14:43', '2022-01-26 02:14:43', NULL),
(2, 'P1643084886', 'Rocket', '3914345', 'Al-Amin', 0, 1, 1, 1, '2022-01-26 02:15:13', '2022-01-26 02:15:13', NULL),
(3, 'P1643084917', 'Nagad', '75467766', 'Masum', 0, 1, 1, 1, '2022-01-26 02:15:31', '2022-01-26 02:15:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view user', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(2, 'view_all user', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(3, 'edit user', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(4, 'delete user', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(5, 'view processing_order', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(6, 'view_all processing_order', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(7, 'edit processing_order', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(8, 'delete processing_order', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(9, 'view shipped_order', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(10, 'view_all shipped_order', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(11, 'edit shipped_order', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(12, 'delete shipped_order', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(13, 'view delivered_order', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(14, 'view_all delivered_order', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(15, 'edit delivered_order', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(16, 'delete delivered_order', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(17, 'view returned_order', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(18, 'view_all returned_order', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(19, 'edit returned_order', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(20, 'delete returned_order', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(21, 'view all_order', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(22, 'view_all all_order', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(23, 'edit all_order', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(24, 'delete all_order', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(25, 'view all_product', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(26, 'view_all all_product', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(27, 'edit all_product', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(28, 'delete all_product', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(29, 'view product_list', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(30, 'view_all product_list', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(31, 'edit product_list', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(32, 'delete product_list', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(33, 'view category', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(34, 'view_all category', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(35, 'edit category', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(36, 'delete category', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(37, 'view brand', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(38, 'view_all brand', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(39, 'edit brand', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(40, 'delete brand', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(41, 'view unit', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(42, 'view_all unit', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(43, 'edit unit', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(44, 'delete unit', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(45, 'view branch', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(46, 'view_all branch', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(47, 'edit branch', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(48, 'delete branch', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(49, 'view vat', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(50, 'view_all vat', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(51, 'edit vat', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(52, 'delete vat', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(53, 'view shipping_charge', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(54, 'view_all shipping_charge', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(55, 'edit shipping_charge', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(56, 'delete shipping_charge', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(57, 'view warehouse', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(58, 'view_all warehouse', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(59, 'edit warehouse', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(60, 'delete warehouse', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(61, 'view company_info', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(62, 'view_all company_info', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(63, 'edit company_info', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(64, 'delete company_info', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(65, 'view currency', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(66, 'view_all currency', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(67, 'edit currency', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(68, 'delete currency', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(69, 'view delivery_method', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(70, 'view_all delivery_method', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(71, 'edit delivery_method', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(72, 'delete delivery_method', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(73, 'view invoice_setting', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(74, 'view_all invoice_setting', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(75, 'edit invoice_setting', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(76, 'delete invoice_setting', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(77, 'view payment_method', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(78, 'view_all payment_method', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(79, 'edit payment_method', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(80, 'delete payment_method', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(81, 'view coupon_code', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(82, 'view_all coupon_code', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(83, 'edit coupon_code', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(84, 'delete coupon_code', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(85, 'view slider', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(86, 'view_all slider', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(87, 'edit slider', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(88, 'delete slider', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(89, 'view point_policy', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(90, 'view_all point_policy', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(91, 'edit point_policy', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(92, 'delete point_policy', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(93, 'view breaking_news', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(94, 'view_all breaking_news', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(95, 'edit breaking_news', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(96, 'delete breaking_news', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(97, 'view language', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(98, 'view_all language', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(99, 'edit language', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(100, 'delete language', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(101, 'view transactionhead', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(102, 'view_all transactionhead', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(103, 'edit transactionhead', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(104, 'delete transactionhead', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(105, 'view stockadjustment', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(106, 'view_all stockadjustment', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(107, 'edit stockadjustment', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(108, 'delete stockadjustment', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(109, 'view contact', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(110, 'view_all contact', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(111, 'edit contact', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(112, 'delete contact', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(113, 'view customerpayment', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(114, 'view_all customerpayment', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(115, 'edit customerpayment', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(116, 'delete customerpayment', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(117, 'view supplierpayment', 'web', '2022-01-02 01:14:27', '2022-01-02 01:14:27'),
(118, 'view_all supplierpayment', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(119, 'edit supplierpayment', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(120, 'delete supplierpayment', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(121, 'view item', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(122, 'view_all item', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(123, 'edit item', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(124, 'delete item', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(125, 'view receipeprofile', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(126, 'view_all receipeprofile', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(127, 'edit receipeprofile', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(128, 'delete receipeprofile', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(129, 'view makeproduct', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(130, 'view_all makeproduct', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(131, 'edit makeproduct', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(132, 'delete makeproduct', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(133, 'view sales', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(134, 'view_all sales', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(135, 'edit sales', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(136, 'delete sales', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(137, 'view purchase', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(138, 'view_all purchase', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(139, 'edit purchase', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(140, 'delete purchase', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(141, 'view salesreports', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(142, 'view_all salesreports', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(143, 'edit salesreports', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(144, 'delete salesreports', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(145, 'view purchasereports', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(146, 'view_all purchasereports', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(147, 'edit purchasereports', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(148, 'delete purchasereports', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(149, 'view stockreports', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(150, 'view_all stockreports', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(151, 'edit stockreports', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(152, 'delete stockreports', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(153, 'view orderports', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(154, 'view_all orderports', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(155, 'edit orderports', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(156, 'delete orderports', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(157, 'view setting', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(158, 'view_all setting', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(159, 'edit setting', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(160, 'delete setting', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(161, 'view vendor', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(162, 'view_all vendor', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(163, 'edit vendor', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28'),
(164, 'delete vendor', 'web', '2022-01-02 01:14:28', '2022-01-02 01:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `permission_categories`
--

CREATE TABLE `permission_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_categories`
--

INSERT INTO `permission_categories` (`id`, `title`, `name`, `type`, `status`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'User Management', 'user', 'ba', 'Active', 1, '2022-01-02 01:14:26', '2022-01-02 01:14:26', NULL),
(2, 'Processing Order', 'processing_order', 'ba', 'Active', 1, '2022-01-02 01:14:26', '2022-01-02 01:14:26', NULL),
(3, 'Shipped Order', 'shipped_order', 'ba', 'Active', 1, '2022-01-02 01:14:26', '2022-01-02 01:14:26', NULL),
(4, 'Delivered Order', 'delivered_order', 'ba', 'Active', 1, '2022-01-02 01:14:26', '2022-01-02 01:14:26', NULL),
(5, 'Returned Order', 'returned_order', 'ba', 'Active', 1, '2022-01-02 01:14:26', '2022-01-02 01:14:26', NULL),
(6, 'All Order', 'all_order', 'ba', 'Active', 1, '2022-01-02 01:14:26', '2022-01-02 01:14:26', NULL),
(7, 'All Product', 'all_product', 'ba', 'Active', 1, '2022-01-02 01:14:26', '2022-01-02 01:14:26', NULL),
(8, 'Product List', 'product_list', 'ba', 'Active', 1, '2022-01-02 01:14:26', '2022-01-02 01:14:26', NULL),
(9, 'Category', 'category', 'ba', 'Active', 1, '2022-01-02 01:14:27', '2022-01-02 01:14:27', NULL),
(10, 'Brand', 'brand', 'ba', 'Active', 1, '2022-01-02 01:14:27', '2022-01-02 01:14:27', NULL),
(11, 'Unit', 'unit', 'ba', 'Active', 1, '2022-01-02 01:14:27', '2022-01-02 01:14:27', NULL),
(12, 'Branch', 'branch', 'ba', 'Active', 1, '2022-01-02 01:14:27', '2022-01-02 01:14:27', NULL),
(13, 'Vat', 'vat', 'ba', 'Active', 1, '2022-01-02 01:14:27', '2022-01-02 01:14:27', NULL),
(14, 'Shipping Charge', 'shipping_charge', 'ba', 'Active', 1, '2022-01-02 01:14:27', '2022-01-02 01:14:27', NULL),
(15, 'Warehouse', 'warehouse', 'ba', 'Active', 1, '2022-01-02 01:14:27', '2022-01-02 01:14:27', NULL),
(16, 'Company Info', 'company_info', 'ba', 'Active', 1, '2022-01-02 01:14:27', '2022-01-02 01:14:27', NULL),
(17, 'Currency', 'currency', 'ba', 'Active', 1, '2022-01-02 01:14:27', '2022-01-02 01:14:27', NULL),
(18, 'Delivery Method', 'delivery_method', 'ba', 'Active', 1, '2022-01-02 01:14:27', '2022-01-02 01:14:27', NULL),
(19, 'Invoice Setting', 'invoice_setting', 'ba', 'Active', 1, '2022-01-02 01:14:27', '2022-01-02 01:14:27', NULL),
(20, 'Payment Method', 'payment_method', 'ba', 'Active', 1, '2022-01-02 01:14:27', '2022-01-02 01:14:27', NULL),
(21, 'Coupon Code', 'coupon_code', 'ba', 'Active', 1, '2022-01-02 01:14:27', '2022-01-02 01:14:27', NULL),
(22, 'Slider', 'slider', 'ba', 'Active', 1, '2022-01-02 01:14:27', '2022-01-02 01:14:27', NULL),
(23, 'Point Policy', 'point_policy', 'ba', 'Active', 1, '2022-01-02 01:14:27', '2022-01-02 01:14:27', NULL),
(24, 'Breaking News', 'breaking_news', 'ba', 'Active', 1, '2022-01-02 01:14:27', '2022-01-02 01:14:27', NULL),
(25, 'language', 'language', 'ba', 'Active', 1, '2022-01-02 01:14:27', '2022-01-02 01:14:27', NULL),
(26, 'TransactionHead', 'transactionhead', 'ba', 'Active', 1, '2022-01-02 01:14:27', '2022-01-02 01:14:27', NULL),
(27, 'Stock Adjustments', 'stockadjustment', 'ba', 'Active', 1, '2022-01-02 01:14:27', '2022-01-02 01:14:27', NULL),
(28, 'Contact', 'contact', 'ba', 'Active', 1, '2022-01-02 01:14:27', '2022-01-02 01:14:27', NULL),
(29, 'Customer Payment', 'customerpayment', 'ba', 'Active', 1, '2022-01-02 01:14:27', '2022-01-02 01:14:27', NULL),
(30, 'SupplierPayment', 'supplierpayment', 'ba', 'Active', 1, '2022-01-02 01:14:27', '2022-01-02 01:14:27', NULL),
(31, 'Item', 'item', 'ba', 'Active', 1, '2022-01-02 01:14:28', '2022-01-02 01:14:28', NULL),
(32, 'Receipe Profile', 'receipeprofile', 'ba', 'Active', 1, '2022-01-02 01:14:28', '2022-01-02 01:14:28', NULL),
(33, 'Make Product', 'makeproduct', 'ba', 'Active', 1, '2022-01-02 01:14:28', '2022-01-02 01:14:28', NULL),
(34, 'Sales', 'sales', 'ba', 'Active', 1, '2022-01-02 01:14:28', '2022-01-02 01:14:28', NULL),
(35, 'Purchase', 'purchase', 'ba', 'Active', 1, '2022-01-02 01:14:28', '2022-01-02 01:14:28', NULL),
(36, 'Sales Reports', 'salesreports', 'ba', 'Active', 1, '2022-01-02 01:14:28', '2022-01-02 01:14:28', NULL),
(37, 'Purchase Reports', 'purchasereports', 'ba', 'Active', 1, '2022-01-02 01:14:28', '2022-01-02 01:14:28', NULL),
(38, 'Stock Reports', 'stockreports', 'ba', 'Active', 1, '2022-01-02 01:14:28', '2022-01-02 01:14:28', NULL),
(39, 'Order Reports', 'orderports', 'ba', 'Active', 1, '2022-01-02 01:14:28', '2022-01-02 01:14:28', NULL),
(40, 'Setting', 'setting', 'ba', 'Active', 1, '2022-01-02 01:14:28', '2022-01-02 01:14:28', NULL),
(41, 'Vendor', 'vendor', 'ba', 'Active', 1, '2022-01-02 01:14:28', '2022-01-02 01:14:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `point_policies`
--

CREATE TABLE `point_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(20,2) DEFAULT NULL,
  `point_value` double(20,2) DEFAULT NULL,
  `point_amount` double(20,2) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` double(20,4) NOT NULL,
  `special_price` double(20,4) NOT NULL,
  `wholesale_price` double(20,4) NOT NULL,
  `purchase_price` double(20,4) NOT NULL DEFAULT 0.0000,
  `discount` double(20,4) DEFAULT 0.0000,
  `sub_sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `low_alert` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_order_qty` double(20,4) DEFAULT NULL,
  `guarantee` double(20,4) NOT NULL DEFAULT 0.0000,
  `featured` enum('None','New Product','Trending Product','Best Selling Product','Fresh Fruits','Fresh Vegetables','Meat & Seafood') COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_word` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode_generate_state` enum('Bulk','Single') COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_stock` enum('In Stock','Out of Stock') COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `vendor_id`, `code`, `name`, `regular_price`, `special_price`, `wholesale_price`, `purchase_price`, `discount`, `sub_sub_category_id`, `sub_category_id`, `category_id`, `contact_id`, `brand_id`, `low_alert`, `min_order_qty`, `guarantee`, `featured`, `key_word`, `barcode_generate_state`, `in_stock`, `vat_id`, `branch_id`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'P646800988', 'Vegetable', 120.0000, 100.0000, 0.0000, 0.0000, 16.6667, NULL, 6, 4, NULL, 2, NULL, 1.0000, 0.0000, 'Fresh Fruits', NULL, 'Bulk', 'In Stock', NULL, 1, 1, 1, '2022-03-08 22:45:13', '2022-03-08 22:45:13', NULL),
(3, NULL, 'P646801417', 'patchouli', 700.0000, 600.0000, 0.0000, 0.0000, 14.2857, NULL, 1, 5, NULL, 4, NULL, 1.0000, 0.0000, 'Meat & Seafood', '<span class=\"ILfuVd\"><span class=\"hgKElc\">any plant whose fruit, seeds, roots, tubers, bulbs, stems, leaves, or flower parts are used as food, as the <strong>tomato, bean, beet, potato, onion, asparagus, spinach, or cauliflower</strong>. the edible part of such a plant, as the tuber of the potato. any member of the plant kingdom; plant.</span></span>', 'Bulk', 'In Stock', NULL, 1, 1, 1, '2022-03-08 22:53:08', '2022-03-08 22:53:08', NULL),
(4, NULL, 'P646801840', 'FRUITS AND VEGGIES', 90.0000, 82.0000, 0.0000, 0.0000, 8.8889, NULL, 4, 3, NULL, 2, NULL, 1.0000, 0.0000, 'Fresh Vegetables', NULL, 'Bulk', 'In Stock', NULL, 1, 1, 1, '2022-03-08 22:59:17', '2022-03-08 22:59:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_barcodes`
--

CREATE TABLE `product_barcodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `barcode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `is_default` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `position`, `created_by`, `branch_id`, `is_active`, `is_default`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'tX6T733fZTcViJB8ztwTq1Tnl05GPCYYzCRa6Fvm.jpg', NULL, 1, 1, 1, 1, '2022-03-08 22:45:13', '2022-03-08 22:45:13', NULL),
(2, 1, 'krn99WAEF41xasv53OsSm9wA88PHdAvQAFpVKKya.jpg', NULL, 1, 1, 1, 0, '2022-03-08 22:45:13', '2022-03-08 22:45:13', NULL),
(3, 1, '1SleCnLLFDXlcxcirMDCXTrQaZESZ0kKqG815xSk.jpg', NULL, 1, 1, 1, 0, '2022-03-08 22:45:13', '2022-03-08 22:45:13', NULL),
(4, 1, 'SJx8cUKzSRr5buLgTwzbMUrracEKK5cHrRtVmCUQ.jpg', NULL, 1, 1, 1, 0, '2022-03-08 22:45:13', '2022-03-08 22:45:13', NULL),
(10, 3, 'KIHPZVTSHPvcmiFgbJi73oV70LRpcgpwuyCX8ltu.jpg', NULL, 1, 1, 1, 1, '2022-03-08 22:53:08', '2022-03-08 22:53:08', NULL),
(11, 3, '1wRJCjIkDE12oz5dvAG6nwO4BehycJypm9zjmoCY.jpg', NULL, 1, 1, 1, 0, '2022-03-08 22:53:08', '2022-03-08 22:53:08', NULL),
(12, 3, 'GafViiaj3G4RZuu8al7xsa2l8perHuTKUdhkqiED.jpg', NULL, 1, 1, 1, 0, '2022-03-08 22:53:08', '2022-03-08 22:53:08', NULL),
(13, 3, '8tb1r0Xm5kqgvcLl1ZypaHV6210nHOOyVqHCeAve.jpg', NULL, 1, 1, 1, 0, '2022-03-08 22:53:08', '2022-03-08 22:53:08', NULL),
(14, 3, 'x56lIKoKSn13FRyRtdAPSY8TQd6uUDYYAuYoJUhD.jpg', NULL, 1, 1, 1, 0, '2022-03-08 22:53:08', '2022-03-08 22:53:08', NULL),
(15, 4, 'XOfar7GsIOM7vXy95OnajPUMH3fJsCRUI0BqWUyZ.jpg', NULL, 1, 1, 1, 1, '2022-03-08 22:59:17', '2022-03-08 22:59:17', NULL),
(16, 4, 'Z37p0UDBEK1EqipG32pyz3O1UA3hRJ7Ou3XkGt6M.jpg', NULL, 1, 1, 1, 0, '2022-03-08 22:59:17', '2022-03-08 22:59:17', NULL),
(17, 4, '9aRVw8dhnnUIBb7pDC0hVezrwvew0JNRWHs8gyXS.webp', NULL, 1, 1, 1, 0, '2022-03-08 22:59:17', '2022-03-08 22:59:17', NULL),
(18, 4, 'DTNT6xXPGZ8rW14OlRXRqxbV633lnzztU40Jr5lr.jpg', NULL, 1, 1, 1, 0, '2022-03-08 22:59:17', '2022-03-08 22:59:17', NULL),
(19, 4, '0WRaf0zsJAE06Pg7DkOoVidWgfhzc0HjH6bKkXU0.jpg', NULL, 1, 1, 1, 0, '2022-03-08 22:59:17', '2022-03-08 22:59:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_infos`
--

CREATE TABLE `product_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_infos`
--

INSERT INTO `product_infos` (`id`, `product_id`, `short_description`, `long_description`, `youtube_link`, `meta_title`, `meta_description`, `meta_keyword`, `branch_id`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '<ul class=\"i8Z77e\">\n<li class=\"TrT0Xe\">Leafy green &ndash; lettuce, spinach and silverbeet.</li>\n<li class=\"TrT0Xe\">Cruciferous &ndash; cabbage, cauliflower, Brussels sprouts and broccoli.</li>\n<li class=\"TrT0Xe\">Marrow &ndash; pumpkin, cucumber and zucchini.</li>\n<li class=\"TrT0Xe\">Root &ndash; potato, sweet potato and yam.</li>\n<li class=\"TrT0Xe\">Edible plant stem &ndash; celery and asparagus.</li>\n<li class=\"TrT0Xe\">Allium &ndash; onion, garlic and shallot.</li>\n</ul>', '<span class=\"ILfuVd\"><span class=\"hgKElc\">The root vegetables include <strong>beets, carrots, radishes, sweet potatoes, and turnips</strong>. Stem vegetables include asparagus and kohlrabi. Among the edible tubers, or underground stems, are potatoes. The leaf and leafstalk vegetables include brussels sprouts, cabbage, celery, lettuce, rhubarb, and spinach.</span></span>', NULL, NULL, NULL, NULL, 1, 1, 1, '2022-03-08 22:45:13', '2022-03-08 22:45:13', NULL),
(3, 3, '<ol class=\"X5LH0c\">\n<li class=\"TrT0Xe\">Spinach. Share on Pinterest Andersen Ross/Getty Images. ...</li>\n<li class=\"TrT0Xe\">Kale. Kale is a very popular leafy green vegetable with several health benefits. ...</li>\n<li class=\"TrT0Xe\">Broccoli. ...</li>\n<li class=\"TrT0Xe\">Peas. ...</li>\n<li class=\"TrT0Xe\">Sweet potatoes. ...</li>\n<li class=\"TrT0Xe\">Beets. ...</li>\n<li class=\"TrT0Xe\">Carrots. ...</li>\n<li class=\"TrT0Xe\">Fermented vegetables.</li>\n</ol>', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2022-03-08 22:53:08', '2022-03-08 22:53:08', NULL),
(4, 4, '<div class=\"wWOJcd\" tabindex=\"0\" role=\"button\" aria-controls=\"exacc_xDMoYvXeJYKTseMP2YWOmAw8\" aria-expanded=\"true\" aria-labelledby=\"exacc_xDMoYvXeJYKTseMP2YWOmAw7\">\n<div id=\"exacc_xDMoYvXeJYKTseMP2YWOmAw7\" class=\"iDjcJe IX9Lgd wwB5gf\" style=\"transform: translate3d(0px, 0px, 0px);\">What are vegetables and examples?</div>\n<div class=\"YsGUOb\" style=\"transform: rotateZ(-180deg);\">&nbsp;</div>\n<div class=\"r21Kzd\" style=\"visibility: hidden;\" data-hveid=\"CB0QAQ\" data-ved=\"2ahUKEwj10Kv_nrj2AhWCSWwGHdmCA8MQuk56BAgdEAE\">&nbsp;</div>\n</div>\n<div id=\"exacc_xDMoYvXeJYKTseMP2YWOmAw8\" class=\"MBtdbb\" style=\"display: block;\" data-ved=\"2ahUKEwj10Kv_nrj2AhWCSWwGHdmCA8MQ7NUEegQIHRAD\">\n<div class=\"ymu2Hb\">\n<div id=\"_xDMoYvXeJYKTseMP2YWOmAw28\" class=\"t0bRye r2fjmd\" style=\"opacity: 1;\" data-hveid=\"CB0QBA\" data-ved=\"2ahUKEwj10Kv_nrj2AhWCSWwGHdmCA8MQu04oAHoECB0QBA\">\n<div id=\"WEB_ANSWERS_RESULT_16_xDMoYvXeJYKTseMP2YWOmAw__14\">\n<div class=\"wDYxhc\" style=\"clear: none;\" data-md=\"61\">\n<div class=\"LGOjhe\" role=\"heading\" data-attrid=\"wa:/description\" aria-level=\"3\" data-hveid=\"CBwQAA\"><span class=\"ILfuVd\"><span class=\"hgKElc\">any plant whose fruit, seeds, roots, tubers, bulbs, stems, leaves, or flower parts are used as food, as the <strong>tomato, bean, beet, potato, onion, asparagus, spinach, or cauliflower</strong>. the edible part of such a plant, as the tuber of the potato. any member of the plant kingdom; plant.</span></span></div>\n</div>\n</div>\n</div>\n</div>\n</div>', '<span class=\"ILfuVd\"><span class=\"hgKElc\">The root vegetables include <strong>beets, carrots, radishes, sweet potatoes, and turnips</strong>. Stem vegetables include asparagus and kohlrabi. Among the edible tubers, or underground stems, are potatoes. The leaf and leafstalk vegetables include brussels sprouts, cabbage, celery, lettuce, rhubarb, and spinach.</span></span>', NULL, NULL, NULL, NULL, 1, 1, 1, '2022-03-08 22:59:17', '2022-03-08 22:59:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_wish_lists`
--

CREATE TABLE `product_wish_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_settings`
--

CREATE TABLE `profile_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile_photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_settings`
--

INSERT INTO `profile_settings` (`id`, `profile_photo`, `business_name`, `email`, `name`, `address`, `mobile`, `postal_code`, `city`, `country`, `company_id`, `branch_id`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '9Q0mBIZcgY89iVyheKDJs8yBUqJGBmlPwTLwpbsY.png', 'Amin Tradersohan Ecommerce', 'demo@gmail.com', 'Md. Iqbal Hossain', 'MMalibagh, Dhaka', NULL, '12345', 'Dhaka', 'Bangladesh', 1, 1, 1, NULL, '2022-01-09 03:20:16', '2022-02-26 03:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoices`
--

CREATE TABLE `purchase_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `purchase_date` datetime DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `other_amount` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `shipping_charge` double DEFAULT NULL,
  `commission` double DEFAULT NULL,
  `vat` double DEFAULT NULL,
  `payable_amount` double DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_invoices`
--

INSERT INTO `purchase_invoices` (`id`, `code`, `contact_id`, `purchase_date`, `total_amount`, `other_amount`, `discount`, `shipping_charge`, `commission`, `vat`, `payable_amount`, `note`, `branch_id`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PR641719693', 2, '2022-01-27 00:00:00', 100, NULL, NULL, 0, NULL, NULL, 200, NULL, 1, 1, 1, '2022-01-09 03:15:10', '2022-01-09 03:15:10', NULL),
(2, 'PR643177642', 3, '2022-01-27 00:00:00', 0, NULL, NULL, 0, NULL, NULL, 100, NULL, 1, 1, 1, '2022-01-26 00:14:20', '2022-01-26 00:14:20', NULL),
(3, 'PR643196354', 4, '2022-01-27 00:00:00', 10000, NULL, NULL, 0, NULL, NULL, 10000, NULL, 1, 1, 1, '2022-01-26 05:27:03', '2022-01-26 05:27:03', NULL),
(4, 'PR643266755', 3, '2022-01-27 00:00:00', 110, NULL, NULL, 0, NULL, NULL, 110, NULL, 1, 1, 1, '2022-01-27 00:59:39', '2022-01-27 00:59:39', NULL),
(5, 'PR643266780', 3, '2022-01-27 00:00:00', 1120, NULL, NULL, 0, NULL, NULL, 1120, NULL, 1, 1, 1, '2022-01-27 01:00:38', '2022-01-27 01:00:38', NULL),
(6, 'PR643266839', 4, '2022-01-27 00:00:00', 10000, NULL, NULL, 0, NULL, NULL, 10000, NULL, 1, 1, 1, '2022-01-27 01:01:35', '2022-01-27 01:01:35', NULL),
(7, 'PR643267071', 4, '2022-01-27 00:00:00', 1000, NULL, NULL, 0, NULL, NULL, 1000, NULL, 1, 1, 1, '2022-01-27 01:05:13', '2022-01-27 01:05:13', NULL),
(9, 'PR643449214', 3, '2022-01-29 00:00:00', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, 1, 1, 1, '2022-01-29 03:47:11', '2022-01-29 03:47:11', NULL),
(10, 'PR643449633', 3, '2022-01-29 00:00:00', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, 1, 1, 1, '2022-01-29 03:48:17', '2022-01-29 03:48:17', NULL),
(11, 'PR643449698', 3, '2022-01-29 00:00:00', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, 1, 1, 1, '2022-01-29 03:48:57', '2022-01-29 03:48:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoice_details`
--

CREATE TABLE `purchase_invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_invoice_details`
--

INSERT INTO `purchase_invoice_details` (`id`, `purchase_invoice_id`, `product_id`, `unit_price`, `quantity`, `branch_id`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 10, 1000, 1, 1, 1, '2022-01-09 03:15:10', '2022-01-09 03:15:10', NULL),
(2, 2, 1, 100, 1, 1, 1, 1, '2022-01-26 00:14:20', '2022-01-26 00:14:20', NULL),
(3, 3, 1, 100, 100, 1, 1, 1, '2022-01-26 05:27:03', '2022-01-26 05:27:03', NULL),
(4, 4, 1, 110, 1, 1, 1, 1, '2022-01-27 00:59:39', '2022-01-27 00:59:39', NULL),
(5, 5, 1, 1110, 1, 1, 1, 1, '2022-01-27 01:00:38', '2022-01-27 01:00:38', NULL),
(6, 5, 4, 10, 1, 1, 1, 1, '2022-01-27 01:00:38', '2022-01-27 01:00:38', NULL),
(7, 6, 4, 10, 1000, 1, 1, 1, '2022-01-27 01:01:35', '2022-01-27 01:01:35', NULL),
(8, 7, 7, 1000, 1, 1, 1, 1, '2022-01-27 01:05:13', '2022-01-27 01:05:13', NULL),
(10, 9, 9, 0, 8, 1, 1, 1, '2022-01-29 03:47:12', '2022-01-29 03:47:12', NULL),
(11, 10, 1, 0, 1, 1, 1, 1, '2022-01-29 03:48:17', '2022-01-29 03:48:17', NULL),
(12, 11, 9, 0, 1, 1, 1, 1, '2022-01-29 03:48:57', '2022-01-29 03:48:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_payments`
--

CREATE TABLE `purchase_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_amount` double(20,4) DEFAULT NULL,
  `charge` double(20,4) DEFAULT NULL,
  `vat` double(20,4) DEFAULT NULL,
  `discount` double(20,4) DEFAULT NULL,
  `net_amount` double(20,4) DEFAULT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receipt_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_payments`
--

INSERT INTO `purchase_payments` (`id`, `code`, `date`, `contact_id`, `purchase_invoice_id`, `total_amount`, `charge`, `vat`, `discount`, `net_amount`, `payment_method_id`, `transaction_id`, `receipt_no`, `note`, `branch_id`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PM643196354', '2022-01-27', 4, 3, 100.0000, NULL, NULL, NULL, NULL, 1, 'TR643196354', NULL, NULL, 1, 1, 1, '2022-01-26 05:27:03', '2022-01-26 05:27:03', NULL),
(2, 'PM643196375', '2022-01-27', 4, 3, 200.0000, NULL, NULL, NULL, NULL, 2, 'TR643196375', NULL, NULL, 1, 1, 1, '2022-01-26 05:27:03', '2022-01-26 05:27:03', NULL),
(3, 'PM643196384', '2022-01-27', 4, 3, 300.0000, NULL, NULL, NULL, NULL, 3, 'TR643196384', NULL, NULL, 1, 1, 1, '2022-01-26 05:27:03', '2022-01-26 05:27:03', NULL),
(4, 'PM643266780', '2022-01-26', 3, 5, 100.0000, NULL, NULL, NULL, NULL, 1, 'dgfd', NULL, NULL, 1, 1, 1, '2022-01-27 01:00:38', '2022-01-27 01:00:38', NULL),
(5, 'PM643266839', '2022-01-27', 4, 6, 2000.0000, NULL, NULL, NULL, NULL, 3, '5765', NULL, NULL, 1, 1, 1, '2022-01-27 01:01:35', '2022-01-27 01:01:35', NULL),
(6, 'PM643267071', '2022-01-27', 4, 7, 1000.0000, NULL, NULL, NULL, NULL, 1, 'TR643267071', NULL, NULL, 1, 1, 1, '2022-01-27 01:05:13', '2022-01-27 01:05:13', NULL),
(7, 'CP643268554', '2022-01-27', 4, NULL, 100.0000, NULL, NULL, NULL, NULL, 2, 'TI643268554', '4564', NULL, 1, 1, 1, '2022-01-27 01:29:30', '2022-01-27 01:29:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(2, 'seller', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(3, 'customer', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(4, 'user', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(5, 'editor', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26'),
(6, 'manager', 'web', '2022-01-02 01:14:26', '2022-01-02 01:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_invoices`
--

CREATE TABLE `sale_invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sale_date` datetime DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `other_amount` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `shipping_charge` double DEFAULT NULL,
  `vat` double DEFAULT NULL,
  `payable_amount` double DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_channel` enum('Web-Sale','Sale-Terminal') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Backend Sale or Online Sale',
  `coupon_code_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_invoices`
--

INSERT INTO `sale_invoices` (`id`, `code`, `order_id`, `contact_id`, `sale_date`, `total_amount`, `other_amount`, `discount`, `shipping_charge`, `vat`, `payable_amount`, `note`, `invoice_channel`, `coupon_code_id`, `branch_id`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PR641723612', NULL, 1, '2022-01-09 00:00:00', 3435, NULL, NULL, 0, NULL, 3435, NULL, 'Web-Sale', NULL, 1, 1, 1, '2022-01-09 04:20:31', '2022-01-09 04:20:31', NULL),
(2, 'PR643172869', NULL, 1, '2022-01-26 00:00:00', 6870, NULL, NULL, 0, NULL, 6870, NULL, 'Web-Sale', NULL, 1, 1, 1, '2022-01-25 22:54:55', '2022-01-25 22:54:55', NULL),
(3, 'PR643180756', NULL, 5, '2022-01-26 00:00:00', 6870, NULL, NULL, 0, NULL, 6870, NULL, 'Web-Sale', NULL, 1, 1, 1, '2022-01-26 01:06:14', '2022-01-26 01:06:14', NULL),
(4, 'PR643184946', NULL, 5, '2022-01-26 00:00:00', 35250, NULL, NULL, 0, NULL, 35250, NULL, 'Web-Sale', NULL, 1, 1, 1, '2022-01-26 02:16:51', '2022-01-26 02:16:51', NULL),
(5, 'PR643195059', NULL, 1, '2022-01-26 00:00:00', 3435, NULL, NULL, 0, NULL, 3435, NULL, 'Web-Sale', NULL, 1, 1, 1, '2022-01-26 05:04:39', '2022-01-26 05:04:39', NULL),
(6, 'PR643450201', NULL, 5, '2022-01-29 00:00:00', 13740, NULL, NULL, 0, NULL, 13740, NULL, 'Web-Sale', NULL, 1, 1, 1, '2022-01-29 03:56:57', '2022-01-29 03:56:57', NULL),
(7, 'PR643450218', NULL, 1, '2022-01-29 00:00:00', 20610, NULL, NULL, 0, NULL, 20610, NULL, 'Web-Sale', NULL, 1, 1, 1, '2022-01-29 03:57:48', '2022-01-29 03:57:48', NULL),
(8, 'PR643450269', NULL, 5, '2022-01-29 00:00:00', 6000, NULL, NULL, 0, NULL, 6000, NULL, 'Web-Sale', NULL, 1, 1, 1, '2022-01-29 03:58:29', '2022-01-29 03:58:29', NULL),
(13, 'PR643450310', NULL, 1, '2022-01-29 00:00:00', 10305, NULL, NULL, 0, NULL, 10305, NULL, 'Web-Sale', NULL, 1, 1, 1, '2022-01-29 04:10:29', '2022-01-29 04:10:29', NULL),
(14, 'PR643451030', NULL, 1, '2022-01-07 00:00:00', 3435, NULL, NULL, 0, NULL, 3435, NULL, 'Web-Sale', NULL, 1, 1, 1, '2022-01-29 04:10:52', '2022-01-29 04:10:52', NULL),
(15, 'SI646312934', 10, 1, '2022-03-03 13:08:53', 170, NULL, NULL, NULL, NULL, 170, NULL, 'Web-Sale', NULL, 1, 1, 1, '2022-03-03 07:08:53', '2022-03-03 07:08:53', NULL),
(16, 'SI646312943', 9, 6, '2022-03-03 13:09:02', 810, NULL, NULL, NULL, NULL, 810, NULL, 'Web-Sale', NULL, 1, 1, 1, '2022-03-03 07:09:02', '2022-03-03 07:09:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sale_invoice_details`
--

CREATE TABLE `sale_invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_invoice_details`
--

INSERT INTO `sale_invoice_details` (`id`, `sale_invoice_id`, `product_id`, `unit_price`, `quantity`, `branch_id`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 3435, 1, 1, 1, 1, '2022-01-09 04:20:31', '2022-01-09 04:20:31', NULL),
(2, 2, 1, 3435, 2, 1, 1, 1, '2022-01-25 22:54:55', '2022-01-25 22:54:55', NULL),
(3, 3, 1, 3435, 2, 1, 1, 1, '2022-01-26 01:06:14', '2022-01-26 01:06:14', NULL),
(4, 4, 1, 3435, 10, 1, 1, 1, '2022-01-26 02:16:51', '2022-01-26 02:16:51', NULL),
(5, 4, 4, 45, 20, 1, 1, 1, '2022-01-26 02:16:51', '2022-01-26 02:16:51', NULL),
(6, 5, 1, 3435, 1, 1, 1, 1, '2022-01-26 05:04:39', '2022-01-26 05:04:39', NULL),
(7, 6, 1, 3435, 4, 1, 1, 1, '2022-01-29 03:56:57', '2022-01-29 03:56:57', NULL),
(8, 7, 1, 3435, 6, 1, 1, 1, '2022-01-29 03:57:48', '2022-01-29 03:57:48', NULL),
(9, 8, 9, 1000, 6, 1, 1, 1, '2022-01-29 03:58:29', '2022-01-29 03:58:29', NULL),
(14, 13, 1, 3435, 3, 1, 1, 1, '2022-01-29 04:10:29', '2022-01-29 04:10:29', NULL),
(15, 14, 1, 3435, 1, 1, 1, 1, '2022-01-29 04:10:52', '2022-01-29 04:10:52', NULL),
(16, 15, 20, 170, 1, 1, 1, 1, '2022-03-03 07:08:53', '2022-03-03 07:08:53', NULL),
(17, 16, 22, 350, 1, 1, 1, 1, '2022-03-03 07:09:02', '2022-03-03 07:09:02', NULL),
(18, 16, 20, 170, 1, 1, 1, 1, '2022-03-03 07:09:02', '2022-03-03 07:09:02', NULL),
(19, 16, 18, 100, 1, 1, 1, 1, '2022-03-03 07:09:02', '2022-03-03 07:09:02', NULL),
(20, 16, 16, 190, 1, 1, 1, 1, '2022-03-03 07:09:02', '2022-03-03 07:09:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sale_payments`
--

CREATE TABLE `sale_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `sale_invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_amount` double(20,4) DEFAULT NULL,
  `charge` double(20,4) DEFAULT NULL,
  `vat` double(20,4) DEFAULT NULL,
  `discount` double(20,4) DEFAULT NULL,
  `net_amount` double(20,4) DEFAULT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receipt_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_payments`
--

INSERT INTO `sale_payments` (`id`, `code`, `date`, `contact_id`, `sale_invoice_id`, `total_amount`, `charge`, `vat`, `discount`, `net_amount`, `payment_method_id`, `transaction_id`, `receipt_no`, `note`, `branch_id`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PM643184946', '2022-01-27', 5, 4, 2000.0000, NULL, NULL, NULL, NULL, 1, 'TR643184946', NULL, NULL, 1, 1, 1, '2022-01-26 02:16:51', '2022-01-26 02:16:51', NULL),
(2, 'PM643184978', '2022-01-27', 5, 4, 4000.0000, NULL, NULL, NULL, NULL, 2, 'TR643184946', NULL, NULL, 1, 1, 1, '2022-01-26 02:16:51', '2022-01-26 02:16:51', NULL),
(3, 'PM643184988', '2022-01-26', 5, 4, 10000.0000, NULL, NULL, NULL, NULL, 3, 'TR643184946', NULL, NULL, 1, 1, 1, '2022-01-26 02:16:51', '2022-01-26 02:16:51', NULL),
(4, 'PM643195059', '2022-01-27', 1, 5, 1000.0000, NULL, NULL, NULL, NULL, 2, 'TR643195059', NULL, NULL, 1, 1, 1, '2022-01-26 05:04:39', '2022-01-26 05:04:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9RoDipkCvcRiH9zaSxHdKVM17N8I9j4ilNNvbBT2', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiQUl2aG9UeUJVbHk0NzBpWHYxdEhzYklLcG4zY1ZyaUNYM2szRE9pcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0LWRldGFpbHMvNCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkUzdiQjREcDNIMlIuQlJ1UEZ6NmYyZUJMMnQ1aEtNNHJUZGF2aExDRUFNeFJFZVBCYldPclMiO30=', 1646803143),
('FsmdqCfzKEzJaSZYqAp92f0CZMcfBsP2dguIYmnw', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiVnhKb2FnTmE2dVBteUlPM1lmajFrUzRrbjFoRm9HUUdXOU5OTFN4TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0LWRldGFpbHMvNCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkUzdiQjREcDNIMlIuQlJ1UEZ6NmYyZUJMMnQ1aEtNNHJUZGF2aExDRUFNeFJFZVBCYldPclMiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFM3YkI0RHAzSDJSLkJSdVBGejZmMmVCTDJ0NWhLTTRyVGRhdmhMQ0VBTXhSRWVQQmJXT3JTIjt9', 1646801991);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charges`
--

CREATE TABLE `shipping_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('price','weight') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` double(20,4) DEFAULT NULL,
  `to` double(20,4) DEFAULT NULL,
  `shipping_fee` double(20,4) NOT NULL DEFAULT 0.0000,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `description`, `position`, `branch_id`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'mPakJo5E23dgJLrOEe2ARuJdlAxt1rhsrHzx4YdL.jpg', NULL, NULL, 1, 1, 1, '2022-02-13 01:00:59', '2022-03-01 04:39:13', NULL),
(2, NULL, 'YcrM9Xi4IqpuclJvTFX9ZRylRjPy1HQqyiAFiXW2.jpg', NULL, NULL, 1, 1, 1, '2022-02-13 01:01:11', '2022-03-01 04:38:53', NULL),
(3, NULL, 'xDPqBrHM2aiqOcvIbsOUa3Myop5stiq5XjufRRvo.jpg', NULL, NULL, 1, 1, 1, '2022-02-13 01:01:29', '2022-03-01 04:38:39', NULL),
(4, NULL, 'RiUzKadOEiSRgv9KTcVc1FL98d4K3E8MZIXetLH3.jpg', NULL, NULL, 1, 1, 1, '2022-02-13 01:28:34', '2022-03-01 04:38:26', NULL),
(5, NULL, 'ANIYMXlBlU0F60QQ4cXacTo7OjlLxP3SdSQxw8a2.jpg', NULL, NULL, 1, 1, 1, '2022-02-13 02:41:04', '2022-03-01 04:38:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock_adjustments`
--

CREATE TABLE `stock_adjustments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `type` enum('Transfer','Decrease','Increase') COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `from_branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `to_branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `from_warehouse_id` bigint(20) UNSIGNED DEFAULT NULL,
  `to_warehouse_id` bigint(20) UNSIGNED DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_managers`
--

CREATE TABLE `stock_managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` double(20,4) DEFAULT NULL,
  `price` double(20,4) DEFAULT NULL,
  `vat` double(20,4) DEFAULT NULL,
  `discount` double(20,4) DEFAULT NULL,
  `subtotal` double(20,4) DEFAULT NULL,
  `stock_in_opening` double(20,4) DEFAULT 0.0000,
  `stock_in_purchase` double(20,4) DEFAULT 0.0000,
  `stock_in_inventory` double(20,4) DEFAULT 0.0000,
  `stock_out_opening` double(20,4) DEFAULT 0.0000,
  `stock_out_sale` double(20,4) DEFAULT 0.0000,
  `stock_out_sale_web` double(20,4) DEFAULT 0.0000,
  `stock_out_inventory` double(20,4) DEFAULT 0.0000,
  `warehouse_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_managers`
--

INSERT INTO `stock_managers` (`id`, `date`, `product_id`, `quantity`, `price`, `vat`, `discount`, `subtotal`, `stock_in_opening`, `stock_in_purchase`, `stock_in_inventory`, `stock_out_opening`, `stock_out_sale`, `stock_out_sale_web`, `stock_out_inventory`, `warehouse_id`, `branch_id`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '2022-01-27 07:01:35', 4, NULL, 10.0000, NULL, NULL, NULL, 566.0000, 1001.0000, 546.0000, 0.0000, 20.0000, 0.0000, 0.0000, 2, 1, 1, 1, '2022-01-25 03:29:36', '2022-01-27 01:01:35', NULL),
(3, '2022-01-25 04:22:01', 5, NULL, NULL, NULL, NULL, NULL, 87.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 2, 1, 1, 1, '2022-01-25 04:22:01', '2022-01-25 04:22:01', NULL),
(4, '2022-01-27 07:05:13', 7, NULL, 1000.0000, NULL, NULL, NULL, 1000.0000, 1.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 2, 1, 1, 1, '2022-01-27 01:04:16', '2022-01-27 01:05:13', NULL),
(5, '2022-01-29 09:58:29', 9, NULL, NULL, NULL, NULL, NULL, 22.0000, 9.0000, 0.0000, 0.0000, 52.0000, 0.0000, 0.0000, 1, 1, 1, 1, '2022-01-29 03:30:07', '2022-01-29 03:58:29', NULL),
(6, '2022-01-29 10:10:52', 1, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, 0.0000, 0.0000, 50.0000, 0.0000, 0.0000, 1, 1, 1, 1, '2022-01-29 03:57:48', '2022-01-29 04:10:52', NULL),
(7, '2022-02-13 01:04:12', 12, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 3, 1, 1, 1, '2022-02-13 01:04:12', '2022-02-13 01:04:12', NULL),
(8, '2022-02-13 01:06:36', 13, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 3, 1, 1, 1, '2022-02-13 01:06:36', '2022-02-13 01:06:36', NULL),
(9, '2022-02-13 01:10:23', 14, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 3, 1, 1, 1, '2022-02-13 01:10:23', '2022-02-13 01:10:23', NULL),
(10, '2022-02-13 01:15:55', 9, NULL, NULL, NULL, NULL, NULL, 22.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 3, 1, 1, 1, '2022-02-13 01:15:55', '2022-02-13 01:15:55', NULL),
(11, '2022-02-13 01:16:34', 8, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 3, 1, 1, 1, '2022-02-13 01:16:34', '2022-02-13 01:16:34', NULL),
(12, '2022-02-13 01:22:47', 15, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 3, 1, 1, 1, '2022-02-13 01:22:47', '2022-02-13 01:22:47', NULL),
(13, '2022-02-13 01:23:42', 16, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 3, 1, 1, 1, '2022-02-13 01:23:42', '2022-02-13 01:23:42', NULL),
(14, '2022-02-13 01:24:41', 18, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 3, 1, 1, 1, '2022-02-13 01:24:41', '2022-02-13 01:24:41', NULL),
(15, '2022-02-13 01:26:31', 20, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 3, 1, 1, 1, '2022-02-13 01:26:31', '2022-02-13 01:26:31', NULL),
(16, '2022-02-13 01:27:41', 22, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 3, 1, 1, 1, '2022-02-13 01:27:41', '2022-02-13 01:27:41', NULL),
(17, '2022-02-13 02:36:46', 23, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 3, 1, 1, 1, '2022-02-13 02:36:46', '2022-02-13 02:36:46', NULL),
(18, '2022-02-13 02:37:55', 24, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 3, 1, 1, 1, '2022-02-13 02:37:55', '2022-02-13 02:37:55', NULL),
(19, '2022-02-13 02:38:58', 25, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 3, 1, 1, 1, '2022-02-13 02:38:58', '2022-02-13 02:38:58', NULL),
(20, '2022-02-13 02:40:07', 27, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 3, 1, 1, 1, '2022-02-13 02:40:07', '2022-02-13 02:40:07', NULL),
(21, '2022-02-13 02:48:19', 28, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 3, 1, 1, 1, '2022-02-13 02:48:19', '2022-02-13 02:48:19', NULL),
(22, '2022-03-08 01:18:50', 30, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 3, 1, 1, 1, '2022-03-08 01:18:50', '2022-03-08 01:18:50', NULL),
(23, '2022-03-08 01:19:37', 31, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 3, 1, 1, 1, '2022-03-08 01:19:37', '2022-03-08 01:19:37', NULL),
(24, '2022-03-08 03:25:13', 32, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 3, 1, 1, 1, '2022-03-08 03:25:13', '2022-03-08 03:25:13', NULL),
(25, '2022-03-08 03:33:35', 33, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 3, 1, 1, 1, '2022-03-08 03:33:35', '2022-03-08 03:33:35', NULL),
(26, '2022-03-08 22:45:13', 1, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 3, 1, 1, 1, '2022-03-08 22:45:13', '2022-03-08 22:45:13', NULL),
(27, '2022-03-08 22:53:08', 3, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 3, 1, 1, 1, '2022-03-08 22:53:08', '2022-03-08 22:53:08', NULL),
(28, '2022-03-08 22:59:17', 4, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 3, 1, 1, 1, '2022-03-08 22:59:17', '2022-03-08 22:59:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `code`, `name`, `image`, `description`, `category_id`, `branch_id`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SC644838951', 'dfhgdf', '3AzQQDJSjlASNM5oPfjuOhZVIMy7HMzE6RhV0mAD.jpg', NULL, 5, 1, 1, 1, '2022-02-14 05:42:46', '2022-02-14 05:42:46', NULL),
(2, 'SC644838969', 'fhgfdh', 'eVfgzsHweDwkprnkyeD0wbUkHSZn7uHOyFZgszcK.jpg', NULL, 4, 1, 1, 1, '2022-02-14 05:43:03', '2022-02-14 05:43:16', NULL),
(3, 'SC644839000', 'dfhgdf', 'cWzhH0GwfRA8x3GjcX0psRqoIxRnQ442lt3HdeR3.jpg', NULL, 5, 1, 1, 1, '2022-02-14 05:43:36', '2022-02-14 05:43:36', NULL),
(4, 'SC644839021', 'bvmn', 'TyrVNZuzdfzk1MtSEZfX9OTvGtOycAmXbEm9zFvi.jpg', NULL, 3, 1, 1, 1, '2022-02-14 05:43:59', '2022-02-14 05:43:59', NULL),
(5, 'SC644839503', 'A', 'fRs6sFC6E1DGUetqrIr7S4O82FUWmdZiCiKmlQEG.jpg', NULL, 4, 1, 1, 1, '2022-02-14 05:51:56', '2022-02-14 05:51:56', NULL),
(6, 'SC644839851', 'cvbnb', 'VFNVyYgeZlPXcqjumZSIEzQYuNt33zEp9aSYV48Y.jpg', NULL, 4, 1, 1, 1, '2022-02-14 05:57:43', '2022-02-14 05:57:43', NULL),
(7, 'SC644839867', 'vccvb', 'N1143Dd1TyZ3g3xnsxrYtxtXCLkQMubPwmpFr4H2.jpg', NULL, 4, 1, 1, 1, '2022-02-14 05:57:55', '2022-02-14 05:57:55', NULL),
(8, 'SC644839878', 'dfgdg', 'oFzbZYJMg99U6xXYhtUtF6Zog7IX2LcPFOY0pIVD.png', NULL, 8, 1, 1, 1, '2022-02-14 05:59:10', '2022-03-08 01:27:29', NULL),
(9, 'SC644839953', 'hgk', 'QoqRjuSRQmVgC4TjSSiq3rrrc0jwZnKjC5al8y8h.jpg', NULL, 7, 1, 1, 1, '2022-02-14 05:59:22', '2022-03-08 01:27:17', NULL),
(10, 'SC644839966', 'ghkhg', '9kxZzQmSoU4jJHFoSVzn6sjJhxV6ezb0iPSScRHr.jpg', NULL, 7, 1, 1, 1, '2022-02-14 05:59:31', '2022-03-08 01:27:04', NULL),
(11, 'SC646724386', 'Rice', '6anqJnnlPYfRREdqVdxVSG3CsLscsJNPad5n28yr.jpg', NULL, 8, 1, 1, 1, '2022-03-08 01:26:45', '2022-03-08 01:26:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `sub_category_id`, `code`, `name`, `image`, `description`, `branch_id`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'C644839047', 'vnbvc', 'ncmhZ1ZXo68NkwrMlhuhExZQHPeYb0ruPiDjscfY.jpg', NULL, 1, 1, 1, '2022-02-14 05:44:17', '2022-02-14 05:44:17', NULL),
(2, 4, 'C644839059', 'vcnbvn', 'Bz6LZDq5peEjF5EKr3DzcBao6et74oBwPGHr205O.jpg', NULL, 1, 1, 1, '2022-02-14 05:44:30', '2022-02-14 05:44:30', NULL),
(3, 1, 'C644839073', 'vnbcv', 'y3WOnD6B2EVXhFyCDOAYmKu1qsXHOPCUz0YtTtSy.jpg', NULL, 1, 1, 1, '2022-02-14 05:44:45', '2022-02-14 05:44:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'Md.\'s Team', 1, '2022-01-02 01:15:43', '2022-01-02 01:15:43'),
(3, 4, 'ghkhg\'s Team', 1, '2022-02-28 22:58:46', '2022-02-28 22:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` double(20,4) NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `code`, `name`, `rate`, `branch_id`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'C641122111', 'ghjgfj', 5765.0000, 1, 1, 1, '2022-01-02 05:16:53', '2022-01-02 05:16:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('Admin','User','Customer','Seller','Editor','Manager') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `mobile`, `email`, `address`, `type`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `branch_id`, `profile_photo_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Md. Iqbal Hossain', NULL, NULL, '01408979487', NULL, 'MMalibagh, Dhaka', 'Customer', NULL, '$2y$10$S7bB4Dp3H2R.BRuPFz6f2eBL2t5hKM4rTdavhLCEAMxREePBbWOrS', NULL, NULL, NULL, NULL, 1, NULL, '2022-01-02 01:15:43', '2022-01-02 01:15:43', NULL),
(2, 'Alamin', 'fdg', 'dfg', '5646464', 'dfgfg@gmail.com', 'fgdhbfg', 'Seller', NULL, '$2y$10$S7bB4Dp3H2R.BRuPFz6f2eBL2t5hKM4rTdavhLCEAMxREePBbWOrS', 'fdhgfh', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(4, 'Md. Iqbal Hossain', NULL, NULL, '0140897948722', NULL, 'address', 'Customer', NULL, '$2y$10$ktfSfAiqjMmEMYCmgYAZRebW6Plq0pIn0STmpblFh3WMxPa5EVpQq', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-28 22:58:46', '2022-02-28 22:58:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vats`
--

CREATE TABLE `vats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate_percent` double NOT NULL DEFAULT 0,
  `rate_fixed` double DEFAULT 0,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vats`
--

INSERT INTO `vats` (`id`, `code`, `name`, `rate_percent`, `rate_fixed`, `branch_id`, `created_by`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'V1640123026', 'gjjh', 565, 56, 1, 1, 1, '2022-01-02 05:30:30', '2022-01-02 05:30:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trade_license` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trn_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` enum('Individual','Seller') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pending','Approved','Cancel') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `code`, `name`, `address`, `branch_id`, `created_by`, `is_default`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'W643457137', 'Defaul', 'etgdrfg', 1, 1, 1, 1, '2022-01-29 05:52:29', '2022-01-29 05:55:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_to_cards`
--
ALTER TABLE `add_to_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `breaking_news`
--
ALTER TABLE `breaking_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_infos`
--
ALTER TABLE `company_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_balances`
--
ALTER TABLE `contact_balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_categories`
--
ALTER TABLE `contact_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_codes`
--
ALTER TABLE `coupon_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_methods`
--
ALTER TABLE `delivery_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_settings`
--
ALTER TABLE `invoice_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_language_unique` (`language`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `permission_categories`
--
ALTER TABLE `permission_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `point_policies`
--
ALTER TABLE `point_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_barcodes`
--
ALTER TABLE `product_barcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_infos`
--
ALTER TABLE `product_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_wish_lists`
--
ALTER TABLE `product_wish_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_settings`
--
ALTER TABLE `profile_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_invoices`
--
ALTER TABLE `purchase_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_invoice_details`
--
ALTER TABLE `purchase_invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_payments`
--
ALTER TABLE `purchase_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sale_invoices`
--
ALTER TABLE `sale_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_invoice_details`
--
ALTER TABLE `sale_invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_payments`
--
ALTER TABLE `sale_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_adjustments`
--
ALTER TABLE `stock_adjustments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_managers`
--
ALTER TABLE `stock_managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `vats`
--
ALTER TABLE `vats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_email_unique` (`email`),
  ADD UNIQUE KEY `vendors_mobile_unique` (`mobile`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_to_cards`
--
ALTER TABLE `add_to_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `breaking_news`
--
ALTER TABLE `breaking_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_infos`
--
ALTER TABLE `company_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_balances`
--
ALTER TABLE `contact_balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_categories`
--
ALTER TABLE `contact_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupon_codes`
--
ALTER TABLE `coupon_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_methods`
--
ALTER TABLE `delivery_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_settings`
--
ALTER TABLE `invoice_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `permission_categories`
--
ALTER TABLE `permission_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `point_policies`
--
ALTER TABLE `point_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_barcodes`
--
ALTER TABLE `product_barcodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_infos`
--
ALTER TABLE `product_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_wish_lists`
--
ALTER TABLE `product_wish_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_settings`
--
ALTER TABLE `profile_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_invoices`
--
ALTER TABLE `purchase_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `purchase_invoice_details`
--
ALTER TABLE `purchase_invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `purchase_payments`
--
ALTER TABLE `purchase_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sale_invoices`
--
ALTER TABLE `sale_invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sale_invoice_details`
--
ALTER TABLE `sale_invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sale_payments`
--
ALTER TABLE `sale_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stock_adjustments`
--
ALTER TABLE `stock_adjustments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_managers`
--
ALTER TABLE `stock_managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vats`
--
ALTER TABLE `vats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
