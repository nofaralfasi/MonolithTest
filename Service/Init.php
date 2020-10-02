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
            // TODO: deal with error...
        }
        $this->json_decoded = json_decode($this->file_content, true);
        if ($this->json_decoded === null) {
            // deal with error...
        }
        $this->createAttributesFromJsonFile(); // general attributes (not specific to category) from json file
        $this->createProducts();
    }

    public function createAttributesFromJsonFile() {
        foreach ($this->json_decoded["attributes"] as $attribute) {
            $labels = $this->createLabels($attribute["labels"]);
            $labels_ids = array_column($attribute["labels"], 'id');
            $min_id = min($labels_ids);
            $max_id = max($labels_ids);
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
        foreach ($this->json_decoded["products"] as $product) {
            $attributes = $this->createAttributesFromLabelsIds($product["labels"]);
            $categories = $this->createCategories($product["categories"], $attributes);
            $this->all_products[] = new Product($product["id"], $product["title"], $product["price"], $categories, $attributes);
        }
    }

    public function createAttributesFromLabelsIds($labels_ids) {
        $attributes = array();
        $counts = array_count_values($labels_ids);
        $labels_ids = array_unique($labels_ids);
        foreach ($this->all_attributes as $attribute) {
            $labels = array();
            foreach ($labels_ids as $label_id) {
                if ($attribute->checkIfLabelRelatedByLabelId($label_id)) {
                    $labels[] = new Label($label_id, $attribute->getLabelTitleByLabelId($label_id), $counts[$label_id]);
                }
            }
            $attributes[] = new Attribute($attribute->getId(), $attribute->getTitle(), $labels);
        }
        return $attributes;
    }

    public function createCategories($categories, $attributes) {
        $return_categories = array();
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $key = $this->checkIfCategoryExists($category);
                if ($key != -1) {
                    ($this->all_categories[$key])->increaseRelatedProductsCounter();
                    ($this->all_categories[$key])->addAttributes($attributes);
                    $return_categories[] =$this->all_categories[$key];
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
            if ($category_to_check["title"] === $category->getTitle()) {
                return array_search($category, $this->all_categories);
            }
        }
        return -1;
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
            if ($attribute_to_check["id"] === $attribute->getId() && $attribute_to_check["title"] === $attribute->getTitle()) {
                return array_search($attribute, $this->all_attributes);
            }
        }
        return -1;
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
}