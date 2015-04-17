<?php

define('ROOT_PATH', __DIR__.'/..');
require __DIR__  . '/../src/SplClassLoader.php';
require_once __DIR__ . '/../src/Application.php';
require_once __DIR__ . '/../vendor/autoload.php';

// TODO вытащить все константы и настройки в неверсионные конфиги
define('DEV_ENV', 1);