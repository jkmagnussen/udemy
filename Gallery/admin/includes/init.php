<?php 

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

define('SITE_ROOT', DS . 'Users' . DS . 'josephmagnussen' . DS . 'Development' . DS . 'gallery');

defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');

define('TEMP_ROOT', 'opt' . DS . 'lampp' .  DS .'temp');

define('TEMP_ROOT_ALT', DS . 'Users' . DS . 'josephmagnussen' . DS . '.bitnami' . DS . 'stackman' . DS . 'machines' . DS . 'xampp' . DS . 'volumes' . DS . 'root' . DS . 'temp');




$tmp_path = TEMP_ROOT;

require_once("functions.php");
require_once("new_config.php");
require_once("database.php");
require_once("db_object.php");
require_once("user.php");
require_once("comment.php");
require_once("photo1.php");
require_once("session.php");
require_once("paginate.php");

?>