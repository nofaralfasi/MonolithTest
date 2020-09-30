<?php
include 'Init.php';
include 'Product.php';
//$init = new Init();
//$init->initCatalogFromJsonFile3();
//$init->initCatalogFromJsonFile2();
//$init->initCatalogFromJsonFile();
//$init->sendProducts();
$init = new Init();
$all_products = $init->getAllProducts();
foreach ($all_products as $p) {
    $p->printProduct();
}


//$prods = getProducts();
//foreach ($prods as $p) {
//    $p->printProduct();
//}
//function getProducts() {
//    $init = new Init();
//    $all_products = $init->createProducts();
////    foreach ($all_products as $p) {
////        $p->printProduct();
////    }
//    return $all_products;
//}

