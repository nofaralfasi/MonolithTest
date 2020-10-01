<?php
class Init {
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
        $this->createAttributes(); // general attributes (not specific to category) from json file
        $this->createProducts();
    }

    public function createAttributes() {
        $labels = array();
        foreach ($this->json_decoded["attributes"] as $attribute) {
            $labels = $this->createLabels($attribute["labels"]);
            $min_id = min(array_column($attribute["labels"], 'id'));
            $max_id = max(array_column($attribute["labels"], 'id'));
            $this->all_attributes[] = new Attribute($attribute["id"], $attribute["title"], $labels, $min_id, $max_id);
        }
    }

    public function createLabels($labels) {
        $labels_objects = array();
        foreach ($labels as $label) {
            $labels_objects[] = new Label($label["id"], $label["title"]);
        }
        return $labels_objects;
    }

    public function createProducts() {
        $categories = array();
        foreach ($this->json_decoded["products"] as $product) {
//            $attributes = $this->getAttributesByRelatedLabelsIds($product["labels"]);
//            $labels = $this->createLabelsByIds($product["labels"]);
//            $categories = $this->createCategories($product["categories"], $attributes, $product["labels"]);
            $categories = $this->createCategories($product["categories"], $product["labels"]);
            $this->all_products[] = new Product($product["id"], $product["title"], $product["price"], $product["categories"], $product["labels"]);
        }
    }

    public function getAttributesByRelatedLabelsIds($labels_ids) {
        $attributes = array();
        foreach ($this->all_attributes as $attribute) {
            foreach ($labels_ids as $label_id) {
                if ($attribute->checkIfLabelRelatedByLabelId($label_id)) {
                    $attributes[] = $attribute;
                }
            }
        }
        return $attributes;
    }

    public function createLabelsByIds($labels_ids) {
        $labels = array();


        return $labels;
    }

    public function createCategories($categories, $labels_ids) {
        $return_categories = array();
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $key = $this->checkIfCategoryExists($category);
                if ($key != -1) {
                    ($this->all_categories[$key])->increaseRelatedProductsCounter();
                    ($this->all_categories[$key])->addAttributes($attributes);
                } else {
                    $new_category = new Category($category["id"], $category["title"], $attributes, 1);
                    $this->all_categories[] = $new_category;
                    $return_categories[] = $new_category;
                }
            }
        }
        return $return_categories;
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
    public function getAllProducts() {
        return $this->all_products;
    }

    /**
     * @param array $all_products
     */
    public function setAllProducts($all_products) {
        $this->all_products = $all_products;
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

    /**
     * @return array
     */
    public function getAllCategories() {
        if (empty($this->all_categories) && empty($this->all_products)) {
            echo "\nNo Categories!";
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
}