<?php
class Category {
    private $id;
    private $title;
    private $related_products_counter;
    private $related_attributes = array();

    /**
     * Category constructor.
     * @param $id
     * @param $title
     * @param $related_products_counter
     */
    public function __construct($id, $title, $related_products_counter = 0) {
        $this->id = $id;
        $this->title = $title;
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
    public function getRelatedAttributes() {
        return $this->related_attributes;
    }

    /**
     * @param array $related_attributes
     */
    public function setRelatedAttributes($related_attributes) {
        $this->related_attributes = $related_attributes;
    }

    public function increaseRelatedProductsCounter() {
        $this->related_products_counter += 1;
    }

    public function printProduct() {
        echo "\nProduct #" . $this->id . ":\nTitle: " . $this->title . "\nRelated Products Counter: " . $this->related_products_counter . "\nRelated Attributes: ";
        print_r($this->related_attributes);
    }
}