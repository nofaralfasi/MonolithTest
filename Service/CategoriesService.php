<?php
class CategoriesService {
    const JSON_FILE_NAME = 'C:\xampp\htdocs\MonoTest\catalog.json';
    private $file_content;
    private $json_decoded;
    private $all_products = array();
    private $all_categories = array();
    private $all_attributes = array();

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

    public function getAttributesByRelatedLabelsIds($labels_ids) {
        foreach ($this->all_attributes as $attribute) {
            // TODO: I stopped here
            $key = $attribute->checkIfLabelRelatedByLabelId($attribute);
        }
    }

    public function createProducts() {
        foreach ($this->json_decoded["products"] as $val) {
//            $this->getAttributesByRelatedLabelsIds($val["labels"]);
            $this->createCategories($val["categories"]);
            $this->all_products[] = new Product($val["id"], $val["title"], $val["price"], $val["categories"], $val["labels"]);
        }
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

    public function checkIfAttributeExistsInCategory($attribute_to_check) {
        foreach ($this->all_attributes as $attribute) {
            if ($attribute_to_check["id"] == $attribute->getId() && $attribute_to_check["title"] == $attribute->getTitle()) {
                return array_search($attribute, $this->all_attributes);
            }
        }
        return -1;
    }

    /**
     * @return array
     */
    public function getAllAttributes() {
        if (empty($this->all_attributes)) {
            $this->createAttributes();
        }
        return $this->all_attributes;
    }

    public function createAttributes() {
        foreach ($this->json_decoded["attributes"] as $val) {
            $this->all_attributes[] = new Attribute($val["id"], $val["title"], $val["labels"]);
        }
    }

    /**
     * @return array
     */
    public function getAllCategories() {
        if (empty($this->all_categories) && empty($this->all_products)) {
            $this->createProducts();
        }
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
        foreach ($this->json_decoded["products"] as $val) {
            if (is_array($val)) {
                print_r($val);
            }
        }
    }

}