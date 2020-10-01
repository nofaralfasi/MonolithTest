<?php
class Product {
    private $id;
    private $title;
    private $price;
    private $categories = array();
    private $attributes = array();

    /**
     * Product constructor.
     * @param $id
     * @param $title
     * @param $price
     * @param array $categories
     * @param array $attributes
     */
    public function __construct($id, $title, $price, array $categories, array $attributes) {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->categories = $categories;
        $this->attributes = $attributes;
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
     * @return mixed
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price) {
        $this->price = $price;
    }

    /**
     * @return array
     */
    public function getCategories() {
        return $this->categories;
    }

    /**
     * @param array $categories
     */
    public function setCategories($categories) {
        $this->categories = $categories;
    }

    /**
     * @return array
     */
    public function getAttributes() {
        return $this->attributes;
    }

    public function printProduct() {
        echo "\nProduct #" . $this->id . ":\nTitle: " . $this->title . "\nCategories: ";
        print_r($this->categories);
        echo "\nPrice: " . $this->price . "\nAttributes: ";
        print_r($this->attributes);
    }
}