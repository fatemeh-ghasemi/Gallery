
<?php
session_start();
$db = new mysqli("localhost", "root", "", "gallery");
$db->query("SET NAMES 'utf8'");

require 'function.php';

spl_autoload_register(function($class) {
//    if (file_exists($classPath)) {
//    require $classPath;
//    }
    include __DIR__."/$class.php";
});

