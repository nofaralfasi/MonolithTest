<?php
session_start();
include("functions/functions.php");
$page = "home";
$title = "Homepage";
$metaD = "Homepage";
include '../Entity/Product.php';
include '../Entity/Category.php';
include '../Entity/Attribute.php';
include '../Entity/Label.php';
include "../Service/Init.php";

$init = new Init();

$products = $init->getAllProducts();
$categories = $init->getAllCategories();

include("header.php");
include("slider.php");
?>
    <!--Main Container starts here-->
    <section>
        <div class="container">
            <div class="row">
                <?php
                include("left_menu.php");
                ?>
                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <!--features_items-->
                        <h2 class="title text-center">Featured Items</h2>
                        <?php getProductsList($products); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include "footer.php";
?>