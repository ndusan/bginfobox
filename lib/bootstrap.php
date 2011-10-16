<?php
//Include config
if (file_exists('config' . DS . 'config.php')) {
    require_once ('config' . DS . 'config.php');
} else {
    require_once ('config' . DS . 'config.php.dist');
}

//Load cache
require_once ('lib'.DS.'cache.php');

require_once ('config' . DS . 'routes.php');
require_once ('config' . DS . 'translate.php');
require_once ('lib' . DS . 'share.php');
