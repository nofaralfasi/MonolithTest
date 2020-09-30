<?php
include 'Init.php';
include 'Product.php';

$init = new Init();
$all_products = $init->getAllProducts();
foreach ($all_products as $p) {
    $p->printProduct();
}



