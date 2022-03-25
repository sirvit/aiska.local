-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 04 2021 г., 14:39
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fuji_base`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1635959165),
('content', '3', NULL),
('manager', '2', 1635959166),
('workProekt', '2', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Администратор', NULL, NULL, 1635957622, 1635957622),
('banned', 1, 'Заблокированный', NULL, NULL, 1635957622, 1635957622),
('canAdmin', 2, 'Право входа в админку', NULL, NULL, 1635958254, 1635958254),
('content', 1, 'Супер менеджер', NULL, NULL, 1635957622, 1635957622),
('manager', 1, 'Менеджер', NULL, NULL, 1635957623, 1635957622),
('updateOwnProekt', 2, 'Редактировать Проекты', 'isAuthorproekt', NULL, 1636023585, 1636023585),
('updateProekt', 2, 'Изменять Proekt', NULL, NULL, NULL, NULL),
('user', 1, 'Пользователь', NULL, NULL, 1635957622, 1635957622),
('workProekt', 2, 'Работа с проектами', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'canAdmin'),
('content', 'canAdmin'),
('manager', 'updateOwnProekt'),
('admin', 'updateProekt'),
('content', 'updateProekt'),
('updateOwnProekt', 'updateProekt'),
('admin', 'workProekt'),
('content', 'workProekt');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('isAuthorproekt', 0x4f3a32393a22636f6d6d6f6e5c72756c65735c417574686f7270726f656b7452756c65223a333a7b733a343a226e616d65223b733a31343a226973417574686f7270726f656b74223b733a393a22637265617465644174223b693a313633363032333538353b733a393a22757064617465644174223b693a313633363032333538353b7d, 1636023585, 1636023585);

-- --------------------------------------------------------

--
-- Структура таблицы `file_cp`
--

CREATE TABLE `file_cp` (
  `id_file_cp` int(11) UNSIGNED NOT NULL,
  `id_proekt` int(11) UNSIGNED DEFAULT NULL,
  `file_cp_content` tinytext COLLATE utf8mb4_unicode_ci,
  `file_cp_name` char(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_cp_kz` int(11) UNSIGNED DEFAULT NULL,
  `file_cp_ds` date DEFAULT NULL,
  `file_cp_del` binary(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='file chertegi proekta';

-- --------------------------------------------------------

--
-- Структура таблицы `file_cz`
--

CREATE TABLE `file_cz` (
  `id_file_cz` int(11) UNSIGNED NOT NULL,
  `id_proekt` int(11) UNSIGNED DEFAULT NULL,
  `file_cz_content` tinytext COLLATE utf8mb4_unicode_ci,
  `file_cz_name` char(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_cz_kz` int(11) UNSIGNED DEFAULT NULL,
  `file_cz_ds` date DEFAULT NULL,
  `file_cz_del` binary(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='file chertegi zavoda';

-- --------------------------------------------------------

--
-- Структура таблицы `file_kp`
--

CREATE TABLE `file_kp` (
  `id_file_kp` int(11) UNSIGNED NOT NULL,
  `id_proekt` int(11) UNSIGNED DEFAULT NULL,
  `file_kp_content` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `file_kp_name` char(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_kp_kz` int(11) UNSIGNED DEFAULT NULL,
  `file_kp_ds` date DEFAULT NULL,
  `file_kp_del` binary(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='file komercheskoe predlojenie';

--
-- Дамп данных таблицы `file_kp`
--

INSERT INTO `file_kp` (`id_file_kp`, `id_proekt`, `file_kp_content`, `file_kp_name`, `file_kp_kz`, `file_kp_ds`, `file_kp_del`) VALUES
(1, 1, '1635915141_Upw2PX.png', '', NULL, NULL, 0x00),
(2, 1, '1635915248_KUDqfx.webp', 'visa', NULL, NULL, 0x00),
(3, 1, '1635915298_lmr2_a.png', 'visapng', NULL, NULL, 0x00),
(6, 3, '1635921038_itQLzo.png', 'mir.png', NULL, NULL, 0x00),
(7, 3, '1635921090_i46znd.png', 'all_visa.png', NULL, NULL, 0x00),
(8, 3, '1635923178_LJyJJI.jpg', 'pwbg.jpg', NULL, NULL, 0x00),
(9, 3, '1635923196_xV_KZu.jpg', 'Cam 17 - 2018-05-24 23.01.22.jpg', NULL, NULL, 0x00),
(10, 3, '1635923535_xOmAum.docx', 'Soglashenie-o-nerazglashenii.docx', NULL, NULL, 0x00),
(11, 3, '1635924059_aZxLSH.pdf', 'Часы Casio radiocontrolled.pdf', NULL, NULL, 0x00),
(12, 3, '1635924307_F79qle.jpg', 'Screenshot_1.jpg', NULL, NULL, 0x00),
(13, 3, '1635924594_3fREXu.jpg', 'кухня.jpg', NULL, NULL, 0x00),
(14, 3, '1635924611_r3uQkE.jpg', 'flag-of-tajikist.jpg', NULL, NULL, 0x00),
(15, 3, '1635924798_YumoIz.jpg', 'flag_of_armenia_s.jpg', NULL, NULL, 0x00),
(16, 3, '1635925354_TKdY4e.txt', 'mach.txt', NULL, NULL, NULL),
(17, 3, '1635925354_DOujgb.docx', 'Soglashenie-o-nerazglashenii.docx', NULL, NULL, NULL),
(18, 3, '1635925354_LixzIP.jpg', 'кухня.jpg', NULL, NULL, NULL),
(19, 3, '1635925448_6E8Ri_.ini', 'desktop.ini', NULL, NULL, NULL),
(20, 3, '1635925448_h7LFZX.jpg', 'error.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `file_spec`
--

CREATE TABLE `file_spec` (
  `id_file_spec` int(11) UNSIGNED NOT NULL,
  `id_kontrakt` int(11) UNSIGNED NOT NULL,
  `file_spec_content` tinytext COLLATE utf8mb4_unicode_ci,
  `file_spec_name` char(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_spec_kz` int(11) UNSIGNED DEFAULT NULL,
  `file_spec_ds` date DEFAULT NULL,
  `file_spec_del` binary(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='file specs';

-- --------------------------------------------------------

--
-- Структура таблицы `file_tz`
--

CREATE TABLE `file_tz` (
  `id_file_tz` int(11) UNSIGNED NOT NULL,
  `id_kontrakt` int(11) UNSIGNED NOT NULL,
  `file_tz_content` tinytext COLLATE utf8mb4_unicode_ci,
  `file_tz_name` char(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_tz_kz` int(11) UNSIGNED DEFAULT NULL,
  `file_tz_ds` date DEFAULT NULL,
  `file_tz_del` binary(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='file teh zadanie';

-- --------------------------------------------------------

--
-- Структура таблицы `kassa`
--

CREATE TABLE `kassa` (
  `id_kassa` int(11) UNSIGNED NOT NULL,
  `id_kontrakt` int(11) UNSIGNED NOT NULL,
  `kassa_n_doc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'nomer dokumenta',
  `kassa_d_doc` date NOT NULL COMMENT 'data dokumenta',
  `kassa_d_summa` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'summa po dokumentu',
  `kassa_kz` int(11) UNSIGNED NOT NULL COMMENT 'kto zavel stroku',
  `kassa_ds` date NOT NULL COMMENT 'data zavedeniya stroki',
  `kassa_del` binary(1) DEFAULT NULL COMMENT 'udalen ili net'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='dokumenti po oplatam';

-- --------------------------------------------------------

--
-- Структура таблицы `kontrakt`
--

CREATE TABLE `kontrakt` (
  `id_kontrakt` int(11) UNSIGNED NOT NULL,
  `id_proekt` int(11) UNSIGNED NOT NULL COMMENT 'id proekta',
  `k_summa` double NOT NULL COMMENT 'summa kontrakta',
  `k_valuta` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'valuta kontarakta',
  `k_spec` tinyint(1) DEFAULT NULL COMMENT 'specifikacia faily',
  `k_zn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'zavodskiy nomera ustroistv, hfpltktys ;',
  `k_d_okon` date DEFAULT NULL COMMENT 'data okonchaniya proizvodstva',
  `k_d_post` date DEFAULT NULL COMMENT 'data postavki',
  `k_d_pp` date DEFAULT NULL COMMENT 'data peredachi pasportz zakazchiku',
  `k_oplata` tinyint(3) UNSIGNED DEFAULT NULL COMMENT '% oplati po kontraktu',
  `k_kz` int(11) NOT NULL COMMENT 'kto sozdal kontrakt',
  `k_ds` date NOT NULL COMMENT 'kogda sozdan kontrakt',
  `k_del` tinyint(1) DEFAULT NULL COMMENT 'udalen li kontrakt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1634713651),
('m130524_201442_init', 1634713659),
('m140506_102106_rbac_init', 1635956491),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1635956491),
('m180523_151638_rbac_updates_indexes_without_prefix', 1635956491),
('m190124_110200_add_verification_token_column_to_user_table', 1634713659),
('m200409_110543_rbac_update_mssql_trigger', 1635956491);

-- --------------------------------------------------------

--
-- Структура таблицы `proekt`
--

CREATE TABLE `proekt` (
  `id_proekt` int(11) UNSIGNED NOT NULL COMMENT 'id',
  `p_nazvanie` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'nazvanie proekta',
  `p_zapros` date NOT NULL COMMENT 'data zaprosa',
  `p_komer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'komercheskoe predlojenie',
  `p_cproekt` tinyint(1) DEFAULT NULL COMMENT 'est li cherteji proekt',
  `p_czavod` tinyint(1) DEFAULT NULL COMMENT 'est li cherteji zavod',
  `p_pzakaz` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'primechanie ot zakazchika',
  `p_pispolnitel` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'primechanie ot ispolnitelya',
  `p_kz` int(11) NOT NULL COMMENT 'kto zavel proekt',
  `p_dz` date NOT NULL COMMENT 'kogda zaveli stroku',
  `p_del` tinyint(1) DEFAULT NULL COMMENT 'udaleno ili net'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `proekt`
--

INSERT INTO `proekt` (`id_proekt`, `p_nazvanie`, `p_zapros`, `p_komer`, `p_cproekt`, `p_czavod`, `p_pzakaz`, `p_pispolnitel`, `p_kz`, `p_dz`, `p_del`) VALUES
(1, 'Проект 2', '2021-11-02', 'Коммерческое предложение 2', NULL, NULL, '', '', 2, '2021-11-02', NULL),
(2, '!!! Удаленный проект', '2021-11-01', 'Не должно быть видно', NULL, NULL, '', '', 1, '2021-11-02', 1),
(3, 'Тест3', '2021-11-03', 'комм', NULL, NULL, '1', '2', 1, '2021-11-03', NULL),
(4, '123', '2021-11-03', '321', NULL, NULL, '2', '3', 1, '2021-11-03', 1),
(5, 'Проект dimas', '2021-11-04', 'test', NULL, NULL, 'fg', 'hj', 3, '2021-11-04', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'sirvit', 'zm1qO6dgT93Td5kJm39tT7w0xd6wJLHZ', '$2y$13$tFko4bwvJMSz/94T6TOIGO49vqraAegW4620YnImZulBPnE8YgqZm', NULL, 'admin@fujielevator.ru', 10, 1634715986, 1634715986, 'aBT-boxfHv4cBO6-4gSvaHVo61DnEmJY_1634715986'),
(2, 'manager', '3J9JalIuaegrW06ZfCaECdkm77j5iXKv', '$2y$13$scWAQqgVoFJbRJXlfF8ci../MYAAxbMQlMTzkIWAtiXnYRRLR02/6', NULL, 'manager@fujielevator.ru', 10, 1635954309, 1635954309, 'F1XwSkWAh6XlfFlYex9HJ0xvY7Bzabw__1635954309'),
(3, 'dimas', 'Bge9fMICG5TtUIZZFLnGhAVP_lOrT0I3', '$2y$13$jUbwNK1hC3FWEq2skjblI.LmHF9R8DgmuXjh8rPQEjz/Oew8HtDFa', NULL, 'sdn@fujielevator.ru', 10, 1636018850, 1636018850, 'OzkEYN95cqPyMEbT_ZmFYvHQfLAVbnEx_1636018850');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `file_cp`
--
ALTER TABLE `file_cp`
  ADD PRIMARY KEY (`id_file_cp`),
  ADD KEY `FK_id_file_chertegi_proekta_proekt` (`id_proekt`);

--
-- Индексы таблицы `file_cz`
--
ALTER TABLE `file_cz`
  ADD PRIMARY KEY (`id_file_cz`) USING BTREE,
  ADD KEY `FK_id_file_chertegi_zavoda_proekt` (`id_proekt`);

--
-- Индексы таблицы `file_kp`
--
ALTER TABLE `file_kp`
  ADD PRIMARY KEY (`id_file_kp`) USING BTREE,
  ADD KEY `FK_file_kp_proekt` (`id_proekt`);

--
-- Индексы таблицы `file_spec`
--
ALTER TABLE `file_spec`
  ADD PRIMARY KEY (`id_file_spec`) USING BTREE,
  ADD KEY `FK_file_spec_kontrakt` (`id_kontrakt`);

--
-- Индексы таблицы `file_tz`
--
ALTER TABLE `file_tz`
  ADD PRIMARY KEY (`id_file_tz`) USING BTREE,
  ADD KEY `FK_file_tz_kontrakt` (`id_kontrakt`) USING BTREE;

--
-- Индексы таблицы `kassa`
--
ALTER TABLE `kassa`
  ADD PRIMARY KEY (`id_kassa`),
  ADD KEY `FK_kassa_kontrakt` (`id_kontrakt`);

--
-- Индексы таблицы `kontrakt`
--
ALTER TABLE `kontrakt`
  ADD PRIMARY KEY (`id_kontrakt`),
  ADD KEY `id_proekt` (`id_proekt`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `proekt`
--
ALTER TABLE `proekt`
  ADD PRIMARY KEY (`id_proekt`) USING BTREE,
  ADD KEY `id` (`id_proekt`) USING BTREE;

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `file_cp`
--
ALTER TABLE `file_cp`
  MODIFY `id_file_cp` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `file_cz`
--
ALTER TABLE `file_cz`
  MODIFY `id_file_cz` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `file_kp`
--
ALTER TABLE `file_kp`
  MODIFY `id_file_kp` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `file_spec`
--
ALTER TABLE `file_spec`
  MODIFY `id_file_spec` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `file_tz`
--
ALTER TABLE `file_tz`
  MODIFY `id_file_tz` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `kassa`
--
ALTER TABLE `kassa`
  MODIFY `id_kassa` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `kontrakt`
--
ALTER TABLE `kontrakt`
  MODIFY `id_kontrakt` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `proekt`
--
ALTER TABLE `proekt`
  MODIFY `id_proekt` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `file_cp`
--
ALTER TABLE `file_cp`
  ADD CONSTRAINT `FK_id_file_chertegi_proekta_proekt` FOREIGN KEY (`id_proekt`) REFERENCES `proekt` (`id_proekt`);

--
-- Ограничения внешнего ключа таблицы `file_cz`
--
ALTER TABLE `file_cz`
  ADD CONSTRAINT `FK_id_file_chertegi_zavoda_proekt` FOREIGN KEY (`id_proekt`) REFERENCES `proekt` (`id_proekt`);

--
-- Ограничения внешнего ключа таблицы `file_kp`
--
ALTER TABLE `file_kp`
  ADD CONSTRAINT `FK_file_kp_proekt` FOREIGN KEY (`id_proekt`) REFERENCES `proekt` (`id_proekt`);

--
-- Ограничения внешнего ключа таблицы `file_spec`
--
ALTER TABLE `file_spec`
  ADD CONSTRAINT `FK_file_spec_kontrakt` FOREIGN KEY (`id_kontrakt`) REFERENCES `kontrakt` (`id_kontrakt`);

--
-- Ограничения внешнего ключа таблицы `file_tz`
--
ALTER TABLE `file_tz`
  ADD CONSTRAINT `FK_file_tz_kontrakt` FOREIGN KEY (`id_kontrakt`) REFERENCES `kontrakt` (`id_kontrakt`);

--
-- Ограничения внешнего ключа таблицы `kassa`
--
ALTER TABLE `kassa`
  ADD CONSTRAINT `FK_kassa_kontrakt` FOREIGN KEY (`id_kontrakt`) REFERENCES `kontrakt` (`id_kontrakt`);

--
-- Ограничения внешнего ключа таблицы `kontrakt`
--
ALTER TABLE `kontrakt`
  ADD CONSTRAINT `FK_kontrakt_proekt` FOREIGN KEY (`id_proekt`) REFERENCES `proekt` (`id_proekt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
