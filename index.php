<?php
session_start();
ob_start();

//database
require 'db/config.php';
require 'db/database.php';

//data
require 'data/pages.php';
require 'data/product.php';

//lib
require 'lib/data.php';
require 'lib/url.php';
require 'lib/users.php';
require 'lib/pagging.php';
require 'lib/number.php';
require 'lib/pages.php';
require 'lib/product.php';
require 'lib/cart.php';

db_connect($config);
$mod = isset($_GET['mod']) ? $_GET['mod'] : 'home';
$act = isset($_GET['act']) ? $_GET['act'] : 'main';
$path = "modules/{$mod}/{$act}.php";

// require './inc/header.php';


if (file_exists($path)) {
    require "{$path}";
} else {
    require "./modules/404.php";
}

// require './inc/footer.php';
?>