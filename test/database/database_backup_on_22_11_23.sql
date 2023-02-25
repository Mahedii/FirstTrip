

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES ('1','Mahadi Islam','m@mail.com','0000-00-00 00:00:00','$2y$10$A8Kdd3OGeiRC4ZJe1vJqye9iXfdhpClMdevMEpDEX7FReUKm.Z1kO','','2022-09-15 11:18:28','2022-10-02 07:43:13');

INSERT INTO users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES ('2','Demo','demo@demo.com','0000-00-00 00:00:00','$2y$10$3KvYKd843pxxzGW.MJdvI.7HmHT7Z5h4IRt02fINujPW4X915y006','','2022-09-28 07:33:14','2022-09-28 07:33:14');


CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO migrations (id, migration, batch) VALUES ('1','2014_10_12_000000_create_users_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('2','2014_10_12_100000_create_password_resets_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('3','2019_08_19_000000_create_failed_jobs_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('4','2019_12_14_000001_create_personal_access_tokens_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('6','2022_11_02_055458_create_customers_table','2');

INSERT INTO migrations (id, migration, batch) VALUES ('41','2022_11_02_095918_create_purchase_orders_table','3');

INSERT INTO migrations (id, migration, batch) VALUES ('42','2022_11_02_104307_create_purchase_order_lists_table','4');

INSERT INTO migrations (id, migration, batch) VALUES ('43','2022_11_06_063917_create_tender_infos_table','5');

INSERT INTO migrations (id, migration, batch) VALUES ('44','2022_11_06_063926_create_tender_bills_table','6');

INSERT INTO migrations (id, migration, batch) VALUES ('45','2022_11_12_083935_create_bill_lists_table','7');


CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `customers` (
  `CUSTOMER_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `CUSTOMER_NAME` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EMAIL` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PHONE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MOBILE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GST_NUMBER` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TAX_NUMBER` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PREVIOUS_DUE` int(11) DEFAULT NULL,
  `OFFICE_ADDRESS` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SHIPPING_ADDRESS` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SLUG` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SORT_ORDER` int(11) DEFAULT NULL,
  `EDITOR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`CUSTOMER_ID`),
  UNIQUE KEY `customers_slug_unique` (`SLUG`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO customers (CUSTOMER_ID, CUSTOMER_NAME, EMAIL, PHONE, MOBILE, GST_NUMBER, TAX_NUMBER, PREVIOUS_DUE, OFFICE_ADDRESS, SHIPPING_ADDRESS, SLUG, SORT_ORDER, EDITOR, created_at, updated_at) VALUES ('1','RFL','mahediihasan220@gmail.com','','01321156678','','','0','Dhaka','Bangladesh','rfl','0','Mahadi Islam','2022-11-02 07:59:50','2022-11-10 10:03:18');

INSERT INTO customers (CUSTOMER_ID, CUSTOMER_NAME, EMAIL, PHONE, MOBILE, GST_NUMBER, TAX_NUMBER, PREVIOUS_DUE, OFFICE_ADDRESS, SHIPPING_ADDRESS, SLUG, SORT_ORDER, EDITOR, created_at, updated_at) VALUES ('3','Pran','gyvyvu@mailinator.com','+1 (875) 374-5768','01321156678','390','520','0','','','pran','0','Mahadi Islam','2022-11-10 10:03:56','2022-11-10 10:03:56');


CREATE TABLE `purchase_orders` (
  `PURCHASE_ORDER_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `CUSTOMER_ID` int(11) NOT NULL,
  `PO_NO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PO_DATE` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `REF_NO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `INVOICE_ADDRESS` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DELIVERY_ADDRESS` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `VAT` double NOT NULL,
  `AIT` double NOT NULL,
  `NOTE` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FILE_NAME` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FILE_PATH` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SLUG` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SORT_ORDER` int(11) DEFAULT NULL,
  `CREATOR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EDITOR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PURCHASE_ORDER_ID`),
  UNIQUE KEY `purchase_orders_po_no_unique` (`PO_NO`),
  UNIQUE KEY `purchase_orders_slug_unique` (`SLUG`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO purchase_orders (PURCHASE_ORDER_ID, CUSTOMER_ID, PO_NO, PO_DATE, REF_NO, INVOICE_ADDRESS, DELIVERY_ADDRESS, VAT, AIT, NOTE, FILE_NAME, FILE_PATH, SLUG, SORT_ORDER, CREATOR, EDITOR, created_at, updated_at) VALUES ('1','1','po123','2022-11-14','ref6843561','drfg','dfgd','7.5','3','Including VAT & AIT','','','po123','0','Mahadi Islam','Mahadi Islam','2022-11-19 10:11:59','2022-11-20 06:12:16');

INSERT INTO purchase_orders (PURCHASE_ORDER_ID, CUSTOMER_ID, PO_NO, PO_DATE, REF_NO, INVOICE_ADDRESS, DELIVERY_ADDRESS, VAT, AIT, NOTE, FILE_NAME, FILE_PATH, SLUG, SORT_ORDER, CREATOR, EDITOR, created_at, updated_at) VALUES ('2','3','po1234','2022-12-02','ref68435614','y','gf','7.5','3','Including VAT & AIT','','','po1234','0','Mahadi Islam','Mahadi Islam','2022-11-19 10:14:03','2022-11-20 06:25:19');


CREATE TABLE `purchase_order_lists` (
  `PURCHASE_ORDER_LIST_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `PO_NO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ITEM_CODE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UNIT` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UNIT_PRICE` double NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `DELIVERY_DATE` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PRODUCT_DESCRIPTION` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SORT_ORDER` int(11) DEFAULT NULL,
  `CREATOR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EDITOR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PURCHASE_ORDER_LIST_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO purchase_order_lists (PURCHASE_ORDER_LIST_ID, PO_NO, SL, ITEM_CODE, UNIT, UNIT_PRICE, QUANTITY, DELIVERY_DATE, PRODUCT_DESCRIPTION, SORT_ORDER, CREATOR, EDITOR, created_at, updated_at) VALUES ('1','po1234','1','20','pc','200','10','2022-11-25','ffh','0','Mahadi Islam','Mahadi Islam','2022-11-19 10:39:28','2022-11-19 10:50:25');


CREATE TABLE `bill_lists` (
  `BILL_LIST_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `PURCHASE_ORDER_LIST_ID` bigint(20) unsigned NOT NULL,
  `STATUS` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SORT_ORDER` int(11) DEFAULT NULL,
  `CREATOR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EDITOR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`BILL_LIST_ID`),
  KEY `bill_lists_purchase_order_list_id_foreign` (`PURCHASE_ORDER_LIST_ID`),
  CONSTRAINT `bill_lists_purchase_order_list_id_foreign` FOREIGN KEY (`PURCHASE_ORDER_LIST_ID`) REFERENCES `purchase_order_lists` (`PURCHASE_ORDER_LIST_ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO bill_lists (BILL_LIST_ID, PURCHASE_ORDER_LIST_ID, STATUS, SORT_ORDER, CREATOR, EDITOR, created_at, updated_at) VALUES ('1','1','DUE','0','Mahadi Islam','','2022-11-19 13:30:24','2022-11-19 13:30:24');


CREATE TABLE `tender_bills` (
  `TENDER_BILL_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `SL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `COMPANY_NAME` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DATE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CHEQUE_NO` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AMOUNT` double DEFAULT NULL,
  `TENDER_ID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SLUG` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SORT_ORDER` int(11) DEFAULT NULL,
  `CREATOR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EDITOR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`TENDER_BILL_ID`),
  UNIQUE KEY `tender_bills_slug_unique` (`SLUG`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `tender_infos` (
  `TENDER_INFO_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TENDER_ID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DESCRIPTION` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ORGANIZATION` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AMOUNT` double DEFAULT NULL,
  `YEAR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PURCHASE_DEADLINE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TOTAL_PURCHASE_AMOUNT` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TOTAL_ITEMS` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PURCHASE_QUANTITY` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PURCHASE_DUE_ITEMS` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DELIVERY_ITEMS` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ITEMS_DELIVERY_DUE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SLUG` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SORT_ORDER` int(11) DEFAULT NULL,
  `CREATOR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EDITOR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`TENDER_INFO_ID`),
  UNIQUE KEY `tender_infos_slug_unique` (`SLUG`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

