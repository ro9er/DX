<?php
/*
 * creator: maigohuang
 * */
define('WEB_ROOT', dirname(__FILE__).'/');
define('PHP_ROOT', WEB_ROOT.'../../php/');
define('CORE_ROOT', WEB_ROOT.'../core/');

require_once(PHP_ROOT . 'utils/LibAutoLoader.php');
require_once(WEB_ROOT . 'Config.php');
require_once(WEB_ROOT . 'Global.php');
require_once(WEB_ROOT . 'common/InitSession.php');
require_once(WEB_ROOT . 'common/InitRouter.php');

