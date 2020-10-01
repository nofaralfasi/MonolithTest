<?php
class CategoriesService {
    private $all_categories = array();

    /**
     * Init constructor.
     */
    public function __construct() {
    }

    public function createCategories($categories) {
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $key = $this->checkIfCategoryExists($category);
                if ($key != -1) {
                    ($this->all_categories[$key])->increaseRelatedProductsCounter();
                } else {
                    $this->all_categories[] = new Category($category["id"], $category["title"], 1);
                }
            }
        }
    }

    public function checkIfCategoryExists($category_to_check) {
        foreach ($this->all_categories as $category) {
            if ($category_to_check["title"] == $category->getTitle()) {
                return array_search($category, $this->all_categories);
            }
        }
        return -1;
    }

    /**
     * @return array
     */
    public function getAllCategories() {
        return $this->all_categories;
    }

//    public function createProducts() {
//        $products_service = new ProductsService($json_decoded["products"]);
//        $category_service = new CategoriesService();
//        $category_service->createCategories($categories);
//
//        foreach ($this->json_decoded["products"] as $val) {
////            $this->getAttributesByRelatedLabelsIds($val["labels"]);
//            $this->createCategories($val["categories"]);
//            $this->all_products[] = new Product($val["id"], $val["title"], $val["price"], $val["categories"], $val["labels"]);
//        }
//    }

    /**
     * @param array $all_categories
     */
    public function setAllCategories($all_categories) {
        $this->all_categories = $all_categories;
    }
}