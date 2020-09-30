<?php
include 'Init.php';
include 'Entity/Product.php';
include 'Entity/Category.php';
include 'Entity/Attribute.php';
include 'Entity/Label.php';

$init = new Init();
$attributes = $init->getAllAttributes();
$products = $init->getAllProducts();

//foreach ($products as $p) {
//    $p->printProduct();
//}

/*
$categories = $init->getAllCategories();
foreach ($categories as $c) {
    $c->printCategory();
}

*/
