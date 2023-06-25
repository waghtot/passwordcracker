<?php
define('BASE_DIR', './');
define('SALT','ThisIs-A-Salt123');
define('CASE_ONE', '/[0-9\d]{5}/');
define('CASE_TWO', '/[0-9][A-Z]{3}|[A-Z][0-9][A-Z]{2}|[A-Z]{2}[0-9][A-Z]|[A-Z]{3}[0-9]/');
define('CASE_THREE', '/[a-z]{6}/');
define('CASE_FOUR', '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6}$/');

define('CASE_ONE_DONE', 4);
define('CASE_TWO_DONE', 4);
define('CASE_THREE_DONE', 12);
define('CASE_FOUR_DONE', 2);

define('SOURCE_FILE', 'app/core/sixletterwords.csv');

define('DIGITS', '0123456789');
define('LOWERCASES', 'abcdefghijklmnopqrstuvwxyz');
define('UPPERCASES', 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');

define('DB_HOST', 'localhost');
define('DB_USER', 'mysql_user');
define('DB_PASS', 'Intently2023!');
define('DB_NAME', 'INTENTLY');

require_once('app/core/autoloader.php');