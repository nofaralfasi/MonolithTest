<?php
class Category {
    private $id;
    private $title;
    private $related_products_counter;
    private $attributes = array();

    /**
     * Category constructor.
     * @param $id
     * @param $title
     * @param $attributes
     * @param int $related_products_counter
     */
    public function __construct($id, $title, $attributes, $related_products_counter = 0) {
        $this->id = $id;
        $this->title = $title;
        $this->attributes = $attributes;
        $this->related_products_counter = $related_products_counter;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getRelatedProductsCounter() {
        return $this->related_products_counter;
    }

    /**
     * @param int $related_products_counter
     */
    public function setRelatedProductsCounter($related_products_counter) {
        $this->related_products_counter = $related_products_counter;
    }

    /**
     * @return array
     */
    public function getAttributes() {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     */
    public function setAttributes($attributes) {
        $this->attributes = $attributes;
    }

    public function increaseRelatedProductsCounter() {
        $this->related_products_counter += 1;
    }

    public function addAttributes($attributes) {
        $array_attrs = array();
        foreach ($attributes as $new_attribute) {
            foreach ($this->attributes as $attribute) {
                if ($new_attribute->getId() == $attribute->getId()) {
                    $attribute->addLabels($new_attribute->getLabels());
                } else {
                    $array_attrs[] = $new_attribute;
                }
            }
        }
        array_merge($this->attributes, $array_attrs);
    }

    public function checkIfHasAttribute($attribute) {
        foreach ($this->attributes as $attr) {
            if ($attribute->getId() == $attr->getId()) {
                return $attr;
            }
        }
        return NULL;
    }

    public function printProduct() {
        echo "\nProduct #" . $this->id . ":\nTitle: " . $this->title . "\nRelated Products Counter: " . $this->related_products_counter . "\nRelated Attributes: ";
        print_r($this->attributes);
    }
}