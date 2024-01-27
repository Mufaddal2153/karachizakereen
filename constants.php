<?php

function isSecure() {
    return
        (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || $_SERVER['SERVER_PORT'] == 443;
}

define("__DIRNAME__", __DIR__);
define('MAIN_DIR',  '/karachizakereen/');
define('HTTP_MAIN', $_SERVER['HTTP_HOST'] . MAIN_DIR);
define('HTTP_ROOT', $_SERVER['HTTP_HOST'] . CURR_DIR);
define('HTTP_IMAGE', (isSecure() ? 'https' : 'https') . '://www.' . HTTP_MAIN . 'assets/img/');
define('HTTP_SERVER', (isSecure() ? 'https' : 'http') . '://'  . HTTP_ROOT);
define('HTTP_MAIN_SERVER', (isSecure() ? 'https' : 'https') . '://www.' . HTTP_MAIN);
define('DIR_FILES',__DIRNAME__  . '/assets/files');
define('HTTP_FILES',(isSecure() ? 'https' : 'https') . '://www.' . HTTP_MAIN . 'assets/files');


// SMTP Details
define("MAIL_SMTP", false);
define("SMTP_HOST", "einnovations4u.com");
define("SMTP_USER", "einnovations4u.com");
define("SMTP_PASS", "einnovations4u.com");

// EMail Details
define("ADMIN_EMAIL", "info@einnovations4u.com");
define("ADMIN_NAME", "GS1");

define("APP_NEW", 1);
define("APP_RENEWAL", 2);
define("APP_ADDITIONAL", 3);
define("APP_SURRENDER", 4);
define("STATUS_PENDING", 1);
define("GTIN_EIGHT",0);
define("GTIN_THIRTEEN",1);