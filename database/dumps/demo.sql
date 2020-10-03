-- Created at 3.10.2020 20:22 using David Grudl MySQL Dump Utility
-- MySQL Server: 5.7.29
-- Database: demo

SET NAMES utf8;
SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
SET FOREIGN_KEY_CHECKS=0;
SET UNIQUE_CHECKS=0;
SET AUTOCOMMIT=0;
-- --------------------------------------------------------

ALTER TABLE `lit_form_translations` DISABLE KEYS;

INSERT INTO `lit_form_translations` (`id`, `lit_form_id`, `locale`, `value`) VALUES
(1,	1,	'en',	'{\"headline\":\"Home\",\"header_image\":null,\"text\":\"<h2>Hello World!<\\/h2>\"}'),
(2,	1,	'de',	'{\"headline\":\"Startseite\",\"header_image\":null,\"text\":\"<h2>Hallo Welt!<\\/h2>\"}');
ALTER TABLE `lit_form_translations` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `lit_forms` DISABLE KEYS;

INSERT INTO `lit_forms` (`id`, `config_type`, `form_type`, `collection`, `form_name`, `value`, `order_column`, `created_at`, `updated_at`) VALUES
(1,	'Lit\\Config\\Form\\Pages\\HomeConfig',	'show',	'pages',	'home',	'{\"live\":true}',	NULL,	'2020-10-03 19:49:45',	'2020-10-03 20:03:42');
ALTER TABLE `lit_forms` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `lit_list_item_translations` DISABLE KEYS;

ALTER TABLE `lit_list_item_translations` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `lit_list_items` DISABLE KEYS;

ALTER TABLE `lit_list_items` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `lit_relations` DISABLE KEYS;

INSERT INTO `lit_relations` (`id`, `from_model_type`, `from_model_id`, `to_model_type`, `to_model_id`, `field_id`, `order_column`) VALUES
(1,	'Ignite\\Crud\\Models\\Form',	1,	'App\\Models\\Product',	200,	'products',	0),
(2,	'Ignite\\Crud\\Models\\Form',	1,	'App\\Models\\Product',	199,	'products',	1);
ALTER TABLE `lit_relations` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `lit_repeatable_translations` DISABLE KEYS;

ALTER TABLE `lit_repeatable_translations` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `lit_repeatables` DISABLE KEYS;

ALTER TABLE `lit_repeatables` ENABLE KEYS;



COMMIT;
-- THE END
