<?php
class ProductsService {
    private $all_products = array();

    /**
     * ProductsService constructor.
     * @param $products_json
     */
    public function __construct($products_json) {
        foreach ($products_json as $product_json) {
//            $this->getAttributesByRelatedLabelsIds($val["labels"]);
            $this->createCategories($product_json["categories"]);
            $this->all_products[] = new Product($product_json["id"], $product_json["title"], $product_json["price"], $product_json["categories"], $product_json["labels"]);
        }
    }

    public function createCategories($categories) {
        $category_service = new CategoriesService();
        $category_service->createCategories($categories);
    }

    /**
     * @return array
     */
    public function getAllProducts() {
        return $this->all_products;
    }

    /**
     * @param array $all_products
     */
    public function setAllProducts($all_products) {
        $this->all_products = $all_products;
    }

    public function createNewProduct($product_json) {
//            $this->getAttributesByRelatedLabelsIds($product_json["labels"]);
        $this->createCategories($product_json["categories"]);
        $this->all_products[] = new Product($product_json["id"], $product_json["title"], $product_json["price"], $product_json["categories"], $product_json["labels"]);

    }

}