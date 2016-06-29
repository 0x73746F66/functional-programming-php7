<?php
$localpath = getenv("SCRIPT_NAME");
$absolutepath = getenv("SCRIPT_FILENAME");
/** @var $_SERVER['DOCUMENT_ROOT'] /var/www/html/php-functional-programming/ */
$_SERVER['DOCUMENT_ROOT'] = substr($absolutepath,0,strpos($absolutepath,$localpath));
require_once $_SERVER['DOCUMENT_ROOT'].'vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'].'src/globals.php';

spl_autoload_register(function($class) {
  $suffix   = '.php';
  $parts    = explode('\\', $class);
  $fileName = end($parts);
  $path     = str_replace($fileName, '', implode('/', $parts));
  $filePathName = sprintf('src/%s%s%s', $path, $fileName, $suffix);
  if (file_exists($filePathName)) {
    require_once $filePathName;
  }
});
