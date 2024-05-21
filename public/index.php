<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/app.php';
require __DIR__ . '/../routes/web.php';

// echo '<pre>';
// echo APP_ROOT  . "<br>" ;
// echo __DIR__  . "<br>";
// echo getcwd() . "<br>";