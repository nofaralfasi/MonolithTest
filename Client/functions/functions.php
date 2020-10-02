<?php
function getProductsList($products) {
    $counter = 0;
    foreach ($products as $product) {
        if ($counter == 6)
            $counter = 0;
        $counter += 1;
        $product_image = "images/home/product" . $counter . ".jpg";
        $product_id = $product->getId();
        $product_title = $product->getTitle();
        $product_price = $product->getPrice();
        $product_attributes = $product->getAttributes();

        echo "
        <div class=\"col-sm-4\">
                <div class=\"product-image-wrapper\">
                    <div class=\"single-products\">
                        <div class=\"productinfo text-center\">
                            <img src=$product_image alt=\"\" />
                            <h2>$$product_price</h2>
                            <div id='product-title'><p>$product_title</p>";
        foreach ($product_attributes as $product_attribute) {
            if (!empty($product_attribute->getLabels())) {
                $att_title = $product_attribute->getTitle();
                echo "
            <p> $att_title:
            ";
                $labels = $product_attribute->getLabels();
                foreach ($labels as $label) {
                    $label_title = $label->getTitle();
                    $id = $label->getId();
                    echo "
            $label_title,
            ";
                }
                echo "</p>";
            }
        }
        echo "    </div>           
                        </div>
                        <div class=\"product-overlay\">
                            <div class=\"overlay-content\">
                                <h2>$$product_price</h2>
                                <p>$product_title</p>
                               
                            </div>
                        </div>
                    </div>
                    <div class=\"choose\">
                        <ul class=\"nav nav-pills nav-justified\">
                            <li><a href=\"\"><i class=\"fa fa-plus-square\"></i>Add to wishlist</a></li>
                            <li><a href=\"\"><i class=\"fa fa-plus-square\"></i>Add to compare</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            ";
    }
}

function getCategoriesListInSeparatePanels($categories) {
    if (empty($categories)) {
        echo "<h2 style='padding:20px;'>No products were found for any category!</h2>";
    } else {
        foreach ($categories as $category) {
            $category_id = $category->getId();
            $category_title = $category->getTitle();
            echo "<div class='panel panel-default'>
                <div class='panel-heading'>
                    <h4 class='panel-title'><a href='index.php?category=$category_id'>$category_title</a></h4>
                </div>
            </div>";
        }
    }
}

function getCategoriesList($categories) {
    if (empty($categories)) {
        echo "<h2 style='padding:20px;'>No products were found for any category!</h2>";
    } else {
        foreach ($categories as $category) {
            $category_id = $category->getId();
            $category_title = $category->getTitle();
            echo "<li><a href='index.php?category=$category_id'>$category_title</a></li>";
        }
    }
}

function getCategoriesListWithProductsCounter($categories) {
    if (empty($categories)) {
        echo "<h2 style='padding:20px;'>No products were found for any category!</h2>";
    } else {
        foreach ($categories as $category) {
            $category_id = $category->getId();
            $category_title = $category->getTitle();
            $category_products_counter = $category->getRelatedProductsCounter();
            echo "<li><a href='index.php?category=$category_id'><span class='pull-right'>($category_products_counter)</span>$category_title</a></li>";
        }
    }
}

function getAttributeLabelsList($categories) {
    if (empty($categories)) {
        echo "<h2 style='padding:20px;'>No products were found for any category!</h2>";
    } else {
        foreach ($categories as $category) {
            $category_id = $category->getId();
            $category_title = $category->getTitle();
            $category_products_counter = $category->getRelatedProductsCounter();
            echo "<li><a href='index.php?category=$category_id'><span class='pull-right'>($category_products_counter)</span>$category_title</a></li>";
        }
    }
}

function getAttributesLabelsList($attributes) {
    foreach ($attributes as $attribute) {
        $labels = $attribute->getLabels();
        foreach ($labels as $label) {
            $label_id = $label->getId();
            $label_title = $label->getTitle();
            $label_products_counter = $label->getRelatedProductsCounter();
            echo "<li><a href='index.php?label=$label_id'><span class='pull-right'>($label_products_counter)</span>$label_title</a></li>";
        }
    }
}

function getCategoriesAttributes($categories) {
    if (empty($categories)) {
        echo "<h2 style='padding:20px;'>No products were found for any category!</h2>";
    } else {
        foreach ($categories as $category) {
            $category_id = $category->getId();
            $category_title = $category->getTitle();
            $category_attributes = $category->getAttributes();
            echo "<div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h4 class=\"panel-title\">
                        <a data-toggle=\"collapse\" data-parent=\"#accordian\" href=#$category_id>
                            <span class=\"badge pull-right\"><i class=\"fa fa-plus\"></i></span>
                            $category_title
                        </a>
                    </h4>
                </div>
                <div id=$category_id class=\"panel-collapse collapse\">
                    <div class=\"panel-body\">
                        <ul>
                        ";
            getAttributesLabelsList($category_attributes);
            echo "
                        </ul>
                    </div>
                </div>
            </div>";
        }
    }
}

