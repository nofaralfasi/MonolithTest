<?php
include 'Init.php';
include 'Product.php';
include 'Category.php';

$init = new Init();
$all_products = $init->getAllProducts();

//foreach ($all_products as $p) {
//    $p->printProduct();
//}

/*
$all_categories = $init->getAllCategories();
foreach ($all_categories as $c) {
    $c->printCategory();
}

*/
