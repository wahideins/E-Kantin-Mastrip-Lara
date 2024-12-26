-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2024 pada 01.45
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kantin_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Makanan', '2024-12-15 18:48:01', '2024-12-15 22:54:41'),
(2, 'Minuman', '2024-12-15 18:48:23', '2024-12-15 18:48:23'),
(4, 'Snack', '2024-12-15 19:59:04', '2024-12-16 05:48:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_16_012542_create_categories_table', 2),
(5, '2024_12_16_063421_create_products_table', 3),
(6, '2024_12_17_061338_create_carts_table', 4),
(7, '2024_12_17_155406_create_orders_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rec_address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Dalam Proses',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `name`, `rec_address`, `phone`, `status`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(6, 'aruha', 'Gak pake nasi', '081234567891', 'Dalam Proses', 1, 7, '2024-12-17 10:18:56', '2024-12-17 10:18:56'),
(7, 'aruha', 'Gak pake nasi', '081234567891', 'Dalam Proses', 1, 17, '2024-12-17 10:18:56', '2024-12-17 10:18:56'),
(8, 'aruha', 'Gak pake nasi', '081234567891', 'Dalam Proses', 1, 11, '2024-12-17 10:18:56', '2024-12-17 10:18:56'),
(9, 'aruha', 'Gak pake nasi', '081234567891', 'Dalam Proses', 1, 9, '2024-12-17 10:18:56', '2024-12-17 10:18:56'),
(10, 'aruha', 'Gak pake nasi', '081234567891', 'Dalam Proses', 1, 17, '2024-12-17 10:18:56', '2024-12-17 10:18:56'),
(11, 'aruha', 'Gak pake nasi', '081234567891', 'Dalam Proses', 1, 7, '2024-12-17 10:19:28', '2024-12-17 10:19:28'),
(12, 'aruha', 'Gak pake nasi', '081234567891', 'Dalam Proses', 1, 17, '2024-12-17 10:19:28', '2024-12-17 10:19:28'),
(13, 'aruha', 'Gak pake nasi', '081234567891', 'Dalam Proses', 1, 11, '2024-12-17 10:19:28', '2024-12-17 10:19:28'),
(14, 'aruha', 'Gak pake nasi', '081234567891', 'Dalam Proses', 1, 9, '2024-12-17 10:19:28', '2024-12-17 10:19:28'),
(15, 'aruha', 'Gak pake nasi', '081234567891', 'Dalam Proses', 1, 17, '2024-12-17 10:19:28', '2024-12-17 10:19:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `price`, `category`, `quantity`, `created_at`, `updated_at`) VALUES
(7, 'tes1', 'tes1', '1734348511.jpg', '10000', 'Makanan', '23', '2024-12-16 04:28:31', '2024-12-16 04:28:31'),
(8, 'tes2', 'tes2', '1734348537.jpg', '123', 'Snack', '80', '2024-12-16 04:28:57', '2024-12-16 17:47:55'),
(9, 'tes3', 'tes3', '1734348568.jpeg', '12345', 'Minuman', '43', '2024-12-16 04:29:28', '2024-12-16 04:29:28'),
(11, 'Anomali 1', 'MINJI... MINJI MINJI MINJIIIIIIIIIIIIIIIIIIIII AAAAAAAAAAAAAA\nAAAAAAAAAAAAAAAAAGH AAAAAAAAAAAAAAAAAAAAAAAGH! WANGI WANGI WANGI WANGI HU HA HU HA HU HA, aaaah baunya Minji wangi aku mau nyiumin aroma wanginya Minji AAAAAAAAH Rambutnya. AAAHHH rambutnya juga pengen aku elus-elus ----- AAAAAH Minji keluar pertama kali juga manis!!! Dia  itu juga manis banget AAAAAAAAH MINJI LUCCUUUUUUUUUUUUUUU......... GUA BAKAL RELA  BUAT MINJI AAAAAAAAAAAAAAAAAAAAAAAAAAAAAGH\nApa? Minji itu gak nyata? Cuma karakter 2 dimensi katamu?\nNggak ngak ngak ngak ngak NGAAAAAAAAK GUA GAK PERCAYA ITU DIA NYATA NGAAAAAAAAAAAAAAAAAK  BANGSAAAAAT!\nGUA GAK PEDULI SAMA KENYATAAN POKOKNYA GAK PEDULI Minji ngeliat gw. Minji di laptop ngeliatin gw. Minji... kamu percaya sama aku? AAAAAAAAHHH syukur Minji gak malu merelakan aku aaaaaah!!! YEAAAAAAAAAAAH GUA MASIH PUNYA MINJI, SENDIRI PUN NGGAK SAMA AAAAAAAAAAAAAAH\nUNDEFINEDUNDEFINEDUNDEFINEDUNDEFINEDUNDEFINEDUNDEFINEDUNDEFINEDUNDEFINEDUNDEFINEDUNDEFINEDUNDEFINEDUNDEFINEDUNDEFINEDUNDEFINEDUNDEFINEDUNDEFINEDUNDEFINEDUNDEFINEDUNDEFINEDUNDEFINEDUNDEFINEDUNDEFINED KIRIMKANLAH CINTAKU PADA MINJI KIRIMKAN KE  YEEAAAAAAAAH', '1734351038.gif', '1232343', 'Snack', '1', '2024-12-16 05:10:38', '2024-12-16 16:47:18'),
(17, 'Anomali 2', 'HANEUL... HANEUL HANEUL HANEULLLLLLLLLLLLLLLLLLLLLLLLL AAAAAAAAAAAAAA\nAAAAAAAAAAAAAAAAAGH AAAAAAAAAAAAAAAAAAAAAAAGH! WANGI WANGI WANGI WANGI HU HA HU HA HU HA, aaaah baunya Haneul wangi aku mau nyiumin aroma wanginya Haneul AAAAAAAAH Rambutnya. AAAHHH rambutnya juga pengen aku elus-elus ----- AAAAAH Haneul keluar pertama kali juga manis!!! Dia Senyum itu juga manis banget AAAAAAAAH HANEUL LUCCUUUUUUUUUUUUUUU......... GUA BAKAL RELA MASAK BUAT HANEUL AAAAAAAAAAAAAAAAAAAAAAAAAAAAAGH\nApa? Haneul itu gak nyata? Cuma karakter 2 dimensi katamu?\nNggak ngak ngak ngak ngak NGAAAAAAAAK GUA GAK PERCAYA ITU DIA NYATA NGAAAAAAAAAAAAAAAAAK KIOF BANGSAAAAAT!\nGUA GAK PEDULI SAMA KENYATAAN POKOKNYA GAK PEDULI Haneul ngeliat gw. Haneul di laptop ngeliatin gw. Haneul... kamu percaya sama aku? AAAAAAAAHHH syukur Haneul gak malu merelakan aku aaaaaah!!! YEAAAAAAAAAAAH GUA MASIH PUNYA HANEUL, SENDIRI PUN NGGAK SAMA AAAAAAAAAAAAAAH\nKARAKTER TAMBAHAN 1 KARAKTER TAMBAHAN 2 KARAKTER TAMBAHAN 33333333333333333333333 KIRIMKANLAH CINTAKU PADA HANEUL KIRIMKAN KE KIOF YEEAAAAAAAAH', '1734392270.gif', '1000000', 'Snack', '1', '2024-12-16 06:41:42', '2024-12-16 16:46:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('06Rkb2J3G3GEd1OTr50sSNntaYHzt5Vbqx7wJH0R', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUVBmdkN3VUVCT0c1aE9hNFN2QjV6WGc4SWR0b0Z6bHJNQ2huRW9aQiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1734455978);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'aruha', 'aruha@gmail.com', 'user', '081234567891', 'Jln,Hasyim Asy\'ari No 7', NULL, '$2y$12$LWTUKCvLETenJD6F4mgUJOQ85Q2397hgr99H32vXUZ.fqozHQ7Wmm', NULL, '2024-12-15 09:33:00', '2024-12-15 09:33:00'),
(2, 'Admin', 'admin@gmail.com', 'admin', '081234411717', 'Jalan Jambu Nomor 39, Jabon, Kecamatan Jombang, Kabupaten Jombang, Jawa Timur.', NULL, '$2y$12$T3SOOxxVzaae8i/YIZRHvOjNv72zFDbf9FHPFBtZjMiAMbFvErAyy', NULL, '2024-12-15 09:39:09', '2024-12-15 09:39:09');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
