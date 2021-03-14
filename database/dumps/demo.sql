-- Created at 14.3.2021 15:43 using David Grudl MySQL Dump Utility
-- MySQL Server: 5.7.29
-- Database: demo

SET NAMES utf8;
SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
SET FOREIGN_KEY_CHECKS=0;
SET UNIQUE_CHECKS=0;
SET AUTOCOMMIT=0;
-- --------------------------------------------------------

ALTER TABLE `form_relation_order` DISABLE KEYS;

INSERT INTO `form_relation_order` (`form_relation_id`, `order_id`) VALUES
('1',	'100999'),
('1',	'100998');
ALTER TABLE `form_relation_order` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `lit_form_translations` DISABLE KEYS;

INSERT INTO `lit_form_translations` (`id`, `lit_form_id`, `locale`, `value`) VALUES
(1,	1,	'en',	'{\"headline\":\"Home\",\"header_image\":null,\"text\":\"<h2>Hello World!<\\/h2>\"}'),
(2,	1,	'de',	'{\"headline\":\"Startseite\",\"header_image\":null,\"text\":\"<h2>Hallo Welt!<\\/h2>\"}'),
(3,	6,	'en',	'{\"mail\":\"lennart.carbe@gmail.com\"}'),
(4,	10,	'en',	'{\"text\":\"<p><strong>Laravel<\\/strong><span>&nbsp;<\\/span>is a<span>&nbsp;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Free_software\\\">free<\\/a>, open-source<span>&nbsp;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/PHP\\\">PHP<\\/a><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Web_framework\\\">web framework<\\/a>, created by Taylor Otwell and intended for the development of web applications following the<span>&nbsp;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Model%E2%80%93view%E2%80%93controller\\\">model\\u2013view\\u2013controller<\\/a><span>&nbsp;<\\/span>(MVC)<span>&nbsp;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Architectural_pattern\\\">architectural pattern<\\/a><span>&nbsp;<\\/span>and based on<span>&nbsp;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Symfony\\\">Symfony<\\/a>. Some of the features of Laravel are a modular<span>&nbsp;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Application-level_package_manager\\\">packaging system<\\/a><span>&nbsp;<\\/span>with a dedicated dependency manager, different ways for accessing<span>&nbsp;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Relational_database\\\">relational databases<\\/a>, utilities that aid in<span>&nbsp;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Application_deployment\\\">application deployment<\\/a><span>&nbsp;<\\/span>and maintenance, and its orientation toward<span>&nbsp;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Syntactic_sugar\\\">syntactic sugar<\\/a>.<\\/p><p>The<span>&nbsp;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Source_code\\\">source code<\\/a><span>&nbsp;<\\/span>of Laravel is hosted on<span>&nbsp;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/GitHub\\\">GitHub<\\/a><span>&nbsp;<\\/span>and licensed under the terms of<span>&nbsp;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/MIT_License\\\">MIT License<\\/a>.<\\/p>\"}'),
(5,	10,	'de',	'{\"text\":\"<p><strong>Laravel<\\/strong><span>&nbsp;<\\/span>ist ein<span>&nbsp;<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Freie_Software\\\">freies<\\/a><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/PHP\\\">PHP<\\/a>-<a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Webframework\\\">Webframework<\\/a>, das dem<span>&nbsp;<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Model_View_Controller\\\">MVC-Muster<\\/a><span>&nbsp;<\\/span>folgt. Es wurde 2011 von Taylor Otwell initiiert.<\\/p>\"}'),
(6,	17,	'en',	'{\"translatable_title\":\"Hello World\",\"translatable_textarea\":\"Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model\\u2013view\\u2013controller (MVC) architectural pattern and based on Symfony. Some of the features of Laravel are a modular packaging system with a dedicated dependency manager, different ways for accessing relational databases, utilities that aid in application deployment and maintenance, and its orientation toward syntactic sugar.\",\"croppable_images\":[],\"header_image\":null}'),
(7,	17,	'de',	'{\"translatable_title\":\"Hallo Welt\",\"translatable_textarea\":\"Laravel ist ein freies PHP-Webframework, das dem MVC-Muster folgt. Es wurde 2011 von Taylor Otwell initiiert.\",\"croppable_images\":[],\"header_image\":null}'),
(8,	18,	'en',	'{\"phone_number\":\"555 123 45679\"}');
ALTER TABLE `lit_form_translations` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `lit_forms` DISABLE KEYS;

INSERT INTO `lit_forms` (`id`, `config_type`, `form_type`, `collection`, `form_name`, `value`, `order_column`, `created_at`, `updated_at`) VALUES
(1,	'Lit\\Config\\Form\\Pages\\HomeConfig',	'show',	'pages',	'home',	'{\"live\":true}',	NULL,	'2020-10-03 19:49:45',	'2020-10-03 20:03:42'),
(2,	'Lit\\Config\\Form\\Fields\\ImageConfig',	'show',	'fields',	'image',	NULL,	NULL,	'2021-01-31 22:22:05',	'2021-01-31 22:22:05'),
(3,	'Lit\\Config\\Form\\Fields\\InputConfig',	'show',	'fields',	'input',	NULL,	NULL,	'2021-01-31 22:24:05',	'2021-01-31 22:24:05'),
(4,	'Lit\\Config\\Form\\Fields\\DatetimeConfig',	'show',	'fields',	'datetime',	NULL,	NULL,	'2021-01-31 22:27:58',	'2021-01-31 22:27:58'),
(5,	'Lit\\Config\\Form\\Fields\\ListFieldConfig',	'show',	'fields',	'list_field',	NULL,	NULL,	'2021-01-31 22:34:46',	'2021-01-31 22:34:46'),
(6,	'Lit\\Config\\Form\\Fields\\ModalConfig',	'show',	'fields',	'modal',	'{\"billing_address_first_name\":\"Jess\",\"billing_address_last_name\":\"Klocko\",\"billing_address_street\":\"2444 Orn Walk Suite 495 West\",\"billing_address_zip\":\"78998\",\"billing_address_city\":\"New Flossietown\",\"billing_address_country\":\"Germany\"}',	NULL,	'2021-01-31 22:37:33',	'2021-02-10 15:29:17'),
(7,	'Lit\\Config\\Form\\Fields\\RangeConfig',	'show',	'fields',	'range',	'{\"range\":5}',	NULL,	'2021-01-31 22:38:55',	'2021-01-31 22:39:11'),
(8,	'Lit\\Config\\Form\\Fields\\RouteConfig',	'show',	'fields',	'route',	'{\"route\":\"app.imprint\"}',	NULL,	'2021-01-31 22:40:30',	'2021-01-31 22:44:05'),
(9,	'Lit\\Config\\Form\\Fields\\ConditionsConfig',	'show',	'fields',	'conditions',	NULL,	NULL,	'2021-01-31 22:44:53',	'2021-01-31 22:44:53'),
(10,	'Lit\\Config\\Form\\Fields\\WysiwygConfig',	'show',	'fields',	'wysiwyg',	'[]',	NULL,	'2021-01-31 22:47:24',	'2021-02-10 13:11:35'),
(11,	'Lit\\Config\\Form\\Fields\\PasswordConfig',	'show',	'fields',	'password',	NULL,	NULL,	'2021-02-01 08:50:17',	'2021-02-01 08:50:17'),
(12,	'Lit\\Config\\Form\\Fields\\RadioConfig',	'show',	'fields',	'radio',	NULL,	NULL,	'2021-02-01 08:52:26',	'2021-02-01 08:52:26'),
(13,	'Lit\\Config\\Form\\Fields\\RelationConfig',	'show',	'fields',	'relation',	NULL,	NULL,	'2021-02-01 08:58:44',	'2021-02-01 08:58:44'),
(14,	'Lit\\Config\\Form\\Fields\\BooleanConfig',	'show',	'fields',	'boolean',	NULL,	NULL,	'2021-02-10 13:09:45',	'2021-02-10 13:09:45'),
(15,	'Lit\\Config\\Form\\Fields\\CheckboxesConfig',	'show',	'fields',	'checkboxes',	NULL,	NULL,	'2021-02-10 13:09:50',	'2021-02-10 13:09:50'),
(16,	'Lit\\Config\\Form\\Fields\\IconConfig',	'show',	'fields',	'icon',	NULL,	NULL,	'2021-02-10 13:09:55',	'2021-02-10 13:09:55'),
(17,	'Lit\\Config\\Form\\Form\\FieldsConfig',	'show',	'form',	'fields',	'{\"full_name\":\"Alan Turing\",\"article_type\":\"1\",\"wysiwyg_field\":\"<h3><strong><span>PHP 8<\\/span><\\/strong><\\/h3><p>PHP 8 was released on November 26, 2020. PHP 8 is a major version and has breaking changes from previous versions.<span>&nbsp;<\\/span>New features and notable changes include:<\\/p><h4><strong><span>Just-in-time compilation<\\/span><\\/strong><\\/h4><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Just-in-time_compilation\\\">Just-in-time compilation<\\/a><span>&nbsp;<\\/span>is supported in PHP 8.<\\/p><p>PHP 8\'s JIT compiler can provide substantial performance improvements for some use cases. PHP developer Nikita Popov has stated that the performance improvements for most websites ...<\\/p>\",\"fruits\":[\"apple\",\"pineapple\"],\"stacked_fruits\":[\"orange\"],\"type\":\"article\",\"range_slider\":4}',	NULL,	'2021-03-14 15:27:25',	'2021-03-14 15:32:15'),
(18,	'Lit\\Config\\Form\\Form\\AdvancedConfig',	'show',	'form',	'advanced',	'{\"credit_card\":\"4242 4242 4242 42422\",\"route\":\"app.datapolicy\"}',	NULL,	'2021-03-14 15:32:19',	'2021-03-14 15:32:38');
ALTER TABLE `lit_forms` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `lit_list_item_translations` DISABLE KEYS;

INSERT INTO `lit_list_item_translations` (`id`, `lit_list_item_id`, `locale`, `value`) VALUES
(1,	1,	'en',	'{\"title\":\"Hello\"}'),
(2,	2,	'en',	'{\"title\":\"Foo\"}'),
(3,	3,	'en',	'{\"title\":\"Bar\"}');
ALTER TABLE `lit_list_item_translations` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `lit_list_items` DISABLE KEYS;

INSERT INTO `lit_list_items` (`id`, `model_type`, `model_id`, `parent_id`, `config_type`, `form_type`, `field_id`, `value`, `order_column`, `active`, `created_at`, `updated_at`) VALUES
(1,	'Ignite\\Crud\\Models\\Form',	5,	0,	'Lit\\Config\\Form\\Fields\\ListFieldConfig',	'show',	'menue',	'{}',	0,	1,	NULL,	NULL),
(2,	'Ignite\\Crud\\Models\\Form',	5,	1,	'Lit\\Config\\Form\\Fields\\ListFieldConfig',	'show',	'menue',	'{}',	1,	1,	NULL,	NULL),
(3,	'Ignite\\Crud\\Models\\Form',	5,	1,	'Lit\\Config\\Form\\Fields\\ListFieldConfig',	'show',	'menue',	'{}',	0,	1,	NULL,	NULL),
(4,	'Ignite\\Crud\\Models\\Form',	18,	0,	'Lit\\Config\\Form\\Form\\AdvancedConfig',	'show',	'menue',	'{\"title\":\"Hello World\"}',	0,	1,	NULL,	NULL),
(5,	'Ignite\\Crud\\Models\\Form',	18,	4,	'Lit\\Config\\Form\\Form\\AdvancedConfig',	'show',	'menue',	'{\"title\":\"Child Item\"}',	0,	1,	NULL,	NULL);
ALTER TABLE `lit_list_items` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `lit_relations` DISABLE KEYS;

INSERT INTO `lit_relations` (`id`, `from_model_type`, `from_model_id`, `to_model_type`, `to_model_id`, `field_id`, `order_column`) VALUES
(1,	'Ignite\\Crud\\Models\\Form',	1,	'App\\Models\\Product',	200,	'products',	0),
(2,	'Ignite\\Crud\\Models\\Form',	1,	'App\\Models\\Product',	199,	'products',	1),
(3,	'Ignite\\Crud\\Models\\Form',	13,	'App\\Models\\OpeningHour',	11,	'openingHours',	0),
(4,	'Ignite\\Crud\\Models\\Form',	13,	'App\\Models\\OpeningHour',	12,	'openingHours',	0),
(5,	'Ignite\\Crud\\Models\\Form',	13,	'App\\Models\\OpeningHour',	13,	'openingHours',	1),
(6,	'Ignite\\Crud\\Models\\Form',	13,	'App\\Models\\Product',	200,	'products',	0),
(7,	'Ignite\\Crud\\Models\\Form',	13,	'App\\Models\\Product',	199,	'products',	1),
(8,	'Ignite\\Crud\\Models\\Form',	13,	'App\\Models\\OpeningHour',	1,	'openingHours',	0),
(9,	'Ignite\\Crud\\Models\\Form',	13,	'App\\Models\\OpeningHour',	2,	'openingHours',	1),
(10,	'App\\Models\\FormRelation',	1,	'App\\Models\\OpeningHour',	3,	'opening_hours',	0),
(11,	'App\\Models\\FormRelation',	1,	'App\\Models\\OpeningHour',	4,	'opening_hours',	1),
(12,	'App\\Models\\FormRelation',	1,	'App\\Models\\OpeningHour',	5,	'opening_hours',	2),
(13,	'App\\Models\\FormRelation',	1,	'App\\Models\\OpeningHour',	6,	'opening_hours',	3),
(14,	'App\\Models\\FormRelation',	1,	'App\\Models\\OpeningHour',	7,	'opening_hours',	4);
ALTER TABLE `lit_relations` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `lit_repeatable_translations` DISABLE KEYS;

INSERT INTO `lit_repeatable_translations` (`id`, `lit_repeatable_id`, `locale`, `value`) VALUES
(1,	1,	'en',	'{\"text\":\"<p><strong>PHP<\\/strong><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">is a<\\/span><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/General-purpose_programming_language\\\">general-purpose<\\/a><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Scripting_language\\\">scripting language<\\/a><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">especially suited to<\\/span><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Web_development\\\">web development<\\/a><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">.<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/PHP#cite_note-6\\\">[6]<\\/a><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">It was originally created by Danish-Canadian<\\/span><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Programmer\\\">programmer<\\/a><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Rasmus_Lerdorf\\\">Rasmus Lerdorf<\\/a><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">in 1994;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/PHP#cite_note-History_of_PHP-7\\\">[7]<\\/a><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">the PHP<\\/span><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Reference_implementation\\\">reference implementation<\\/a><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">is now produced by The PHP Group.<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/PHP#cite_note-about_PHP-8\\\">[8]<\\/a><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">PHP originally stood for<\\/span><span>&nbsp;<\\/span><em>Personal Home Page<\\/em><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">,<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/PHP#cite_note-History_of_PHP-7\\\">[7]<\\/a><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">but it now stands for the<\\/span><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Recursive_initialism\\\">recursive initialism<\\/a><span>&nbsp;<\\/span><em>PHP: Hypertext Preprocessor<\\/em><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">.<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/PHP#cite_note-9\\\">[9]<\\/a><\\/p>\"}'),
(2,	1,	'de',	'{\"text\":\"<p><strong>PHP<\\/strong><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">(<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Rekursives_Akronym\\\">rekursives Akronym<\\/a><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">und<\\/span><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Backronym\\\">Backronym<\\/a><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">f\\u00fcr \\u201e<\\/span><strong>P<\\/strong><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">HP:<\\/span><span>&nbsp;<\\/span><strong><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Hypertext\\\">H<\\/a><\\/strong><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Hypertext\\\">ypertext<\\/a><span>&nbsp;<\\/span><strong><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Pr%C3%A4prozessor\\\">P<\\/a><\\/strong><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Pr%C3%A4prozessor\\\">reprocessor<\\/a><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">\\u201c, urspr\\u00fcnglich \\u201e<\\/span><strong>P<\\/strong><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">ersonal<\\/span><span>&nbsp;<\\/span><strong><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Homepage\\\">H<\\/a><\\/strong><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Homepage\\\">ome<span>&nbsp;<\\/span><\\/a><strong><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Homepage\\\">P<\\/a><\\/strong><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Homepage\\\">age<\\/a><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">Tools\\u201c) ist eine<\\/span><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Skriptsprache\\\">Skriptsprache<\\/a><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">mit einer an<\\/span><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/C_(Programmiersprache)\\\">C<\\/a><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">und<\\/span><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Perl_(Programmiersprache)\\\">Perl<\\/a><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">angelehnten<\\/span><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Syntax\\\">Syntax<\\/a><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">, die haupts\\u00e4chlich zur Erstellung<\\/span><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Dynamische_Webseite\\\">dynamischer Webseiten<\\/a><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">oder<\\/span><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Webanwendung\\\">Webanwendungen<\\/a><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">verwendet wird.<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/PHP#cite_note-11\\\">[11]<\\/a><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">PHP wird als<\\/span><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Freie_Software\\\">freie Software<\\/a><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">unter der<\\/span><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/PHP-Lizenz\\\">PHP-Lizenz<\\/a><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">verbreitet. PHP zeichnet sich durch breite<\\/span><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Datenbank\\\">Datenbankunterst\\u00fctzung<\\/a><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/PHP#cite_note-12\\\">[12]<\\/a><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">und<\\/span><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Netzwerkprotokoll\\\">Internet-Protokolleinbindung<\\/a><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">sowie die Verf\\u00fcgbarkeit zahlreicher<\\/span><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Funktionsbibliothek\\\">Funktionsbibliotheken<\\/a><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/PHP#cite_note-13\\\">[13]<\\/a><span>&nbsp;<\\/span><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">aus.<\\/span><\\/p>\"}');
ALTER TABLE `lit_repeatable_translations` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `lit_repeatables` DISABLE KEYS;

INSERT INTO `lit_repeatables` (`id`, `model_type`, `model_id`, `config_type`, `form_type`, `field_id`, `type`, `value`, `order_column`, `created_at`, `updated_at`) VALUES
(1,	'Ignite\\Crud\\Models\\Form',	1,	'Lit\\Config\\Form\\Pages\\HomeConfig',	'show',	'content',	'text',	'[]',	0,	NULL,	NULL),
(2,	'Ignite\\Crud\\Models\\Form',	18,	'Lit\\Config\\Form\\Form\\AdvancedConfig',	'show',	'content',	'text',	'{\"text\":\"<p>Hello World<\\/p>\"}',	0,	NULL,	NULL),
(3,	'Ignite\\Crud\\Models\\Form',	18,	'Lit\\Config\\Form\\Form\\AdvancedConfig',	'show',	'content',	'image',	NULL,	0,	NULL,	NULL);
ALTER TABLE `lit_repeatables` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `opening_hours` DISABLE KEYS;

INSERT INTO `opening_hours` (`id`, `week_day`, `order_column`, `opening_at`, `closing_at`, `created_at`, `updated_at`) VALUES
(1,	'monday',	NULL,	'10:00:00',	'18:30:00',	'2021-02-10 16:00:03',	'2021-02-10 16:00:03'),
(2,	'tuesday',	NULL,	'10:00:00',	'18:00:00',	'2021-02-10 16:00:15',	'2021-02-10 16:00:15'),
(3,	'monday',	NULL,	'10:00:00',	'18:00:00',	'2021-03-14 15:25:46',	'2021-03-14 15:25:46'),
(4,	'tuesday',	NULL,	'10:00:00',	'18:00:00',	'2021-03-14 15:26:14',	'2021-03-14 15:26:14'),
(5,	'thursday',	NULL,	'10:00:00',	'18:00:00',	'2021-03-14 15:26:31',	'2021-03-14 15:26:31'),
(6,	'friday',	NULL,	'10:00:00',	'18:00:00',	'2021-03-14 15:26:42',	'2021-03-14 15:26:42'),
(7,	'saturday',	NULL,	'10:00:00',	'14:00:00',	'2021-03-14 15:26:56',	'2021-03-14 15:26:56');
ALTER TABLE `opening_hours` ENABLE KEYS;



COMMIT;
-- THE END
