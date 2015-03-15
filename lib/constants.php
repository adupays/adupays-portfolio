<?php
/*
define('WWW_ROOT',(dirname(dirname(__FILE__))));

$directory = basename(WWW_ROOT);
$url = explode($directory, $_SERVER['REQUEST_URI']);
if(count($url) == 1){
    define ('WEBROOT', '/');
}else {
    define ('WEBROOT', $url[0] . 'portfolio/');
}
define('IMAGES', WWW_ROOT . DIRECTORY_SEPARATOR . 'img');
/*/

$images ='/img/';
$css ='/css/';
$js ='/js/';
define('SITE_URL', str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']));
define('DOC_IMAGES',$images);
define('DOC_CSS',$css);
define('DOC_JS',$js);