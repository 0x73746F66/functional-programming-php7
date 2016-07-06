<?php
/** @var $_SERVER['DOCUMENT_ROOT'] /var/www/html/php-functional-programming/ */
$_SERVER['DOCUMENT_ROOT'] = getcwd();
require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/src/globals.php';

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
