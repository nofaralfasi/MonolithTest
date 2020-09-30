<?php
class Init {
    const JSON_FILE_NAME = "catalog.json";
    private $file_content;
    private $json_decoded;
    private $all_products = array();
    private $all_categories = array();

    /**
     * Init constructor.
     */
    public function __construct() {
        $this->file_content = file_get_contents(self::JSON_FILE_NAME);
        if ($this->file_content === false) {
            // deal with error...
        }
        $this->json_decoded = json_decode($this->file_content, true);
        if ($this->json_decoded === null) {
            // deal with error...
        }
    }

    /**
     * @return array
     */
    public function getAllProducts() {
        if (empty($this->all_products)) {
            $this->createProducts();
        }
        return $this->all_products;
    }

    /**
     * @param array $all_products
     */
    public function setAllProducts($all_products) {
        $this->all_products = $all_products;
    }

    public function createProducts() {
        foreach ($this->json_decoded["products"] as $val) {
            $this->createCategory($val["categories"]);
            $this->all_products[] = new Product($val["id"], $val["title"], $val["price"], $val["categories"], $val["labels"]);
        }
    }

    public function createCategory($categories) {
        if (empty($this->all_categories)) {
            foreach ($categories as $category) {
                $this->all_categories[] = new Category($category["id"], $category["title"], 1);
            }
        } elseif (!empty($categories)) {
            foreach ($categories as $category1) {
                $key = $this->checkIfCategoryExists($category1);
                if ($key != -1) {
                    echo "\n";
                    ($this->all_categories[$key])->increaseRelatedProductsCounter();
                    print (($this->all_categories[$key])->getTitle());
                    print (($this->all_categories[$key])->getRelatedProductsCounter());
                } else {
                    $this->all_categories[] = new Category($category1["id"], $category1["title"], 1);
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

    /**
     * @param array $all_categories
     */
    public function setAllCategories($all_categories) {
        $this->all_categories = $all_categories;
    }

    public function initCatalogFromJsonFile() {
        print_r($this->json_decoded);
    }

    public function initCatalogFromJsonFile2() {
        $jsonIterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($this->json_decoded), RecursiveIteratorIterator::SELF_FIRST);
        foreach ($jsonIterator as $key => $val) {
            if (is_array($val)) {
                echo "$key:\n";
            } else {
                echo "$key => $val\n";
            }
        }
    }

    public function initCatalogFromJsonFile3() {
        $jsonIterator = new RecursiveIteratorIterator(new RecursiveArrayIterator(json_decode($this->file_content, TRUE)), RecursiveIteratorIterator::SELF_FIRST);
        var_dump($jsonIterator);
    }

    public function sendProducts() {
//        print_r($this->json_decoded["products"]);
//        var_dump($this->json_decoded["products"]);
        foreach ($this->json_decoded["products"] as $val) {
            if (is_array($val)) {
                print_r($val);
            }
//            else {
//                print($val);
//            }
        }
    }
}