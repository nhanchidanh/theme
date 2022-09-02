<?php
//data
require 'data/pages.php';
require 'data/product.php';

//lib
require 'lib/data.php';
require 'lib/number.php';
require 'lib/pages.php';
require 'lib/product.php';

$mod = isset($_GET['mod']) ? $_GET['mod'] : 'home';
$act = isset($_GET['act']) ? $_GET['act'] : 'main';
$path = "modules/{$mod}/{$act}.php";

require './inc/header.php';


if (file_exists($path)) {
    require "{$path}";
} else {
    require "./modules/404.php";
}

require './inc/footer.php';
?>