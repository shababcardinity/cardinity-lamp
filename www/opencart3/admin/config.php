<?php
// HTTP
define('HTTP_SERVER', 'https://testas.do/opencart3/admin/');
define('HTTP_CATALOG', 'https://testas.do/opencart3/');

// HTTPS
define('HTTPS_SERVER', 'https://testas.do/opencart3/admin/');
define('HTTPS_CATALOG', 'https://testas.do/opencart3/');

//for localhost.run
//define('HTTP_SERVER', 'https://shababhsiddique-6568dc23.localhost.run/opencart3/admin/');
//define('HTTP_CATALOG', 'https://shababhsiddique-6568dc23.localhost.run/opencart3/');

// HTTPS
//define('HTTPS_SERVER', 'https://shababhsiddique-6568dc23.localhost.run/opencart3/admin/');
//define('HTTPS_CATALOG', 'https://shababhsiddique-6568dc23.localhost.run/opencart3/');


// DIR
define('DIR_APPLICATION', '/var/www/html/opencart3/admin/');
define('DIR_SYSTEM', '/var/www/html/opencart3/system/');
define('DIR_IMAGE', '/var/www/html/opencart3/image/');
define('DIR_STORAGE', DIR_SYSTEM . 'storage/');
define('DIR_CATALOG', '/var/www/html/opencart3/catalog/');
define('DIR_LANGUAGE', DIR_APPLICATION . 'language/');
define('DIR_TEMPLATE', DIR_APPLICATION . 'view/template/');
define('DIR_CONFIG', DIR_SYSTEM . 'config/');
define('DIR_CACHE', DIR_STORAGE . 'cache/');
define('DIR_DOWNLOAD', DIR_STORAGE . 'download/');
define('DIR_LOGS', DIR_STORAGE . 'logs/');
define('DIR_MODIFICATION', DIR_STORAGE . 'modification/');
define('DIR_SESSION', DIR_STORAGE . 'session/');
define('DIR_UPLOAD', DIR_STORAGE . 'upload/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'mysql');
define('DB_USERNAME', 'opencart3');
define('DB_PASSWORD', 'opencart3');
define('DB_DATABASE', 'opencart3');
define('DB_PORT', '3306');
define('DB_PREFIX', 'oc_');

// OpenCart API
define('OPENCART_SERVER', 'https://www.opencart.com/');
