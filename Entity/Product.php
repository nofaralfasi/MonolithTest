<?php
class Product {
    private $id;
    private $title;
    private $price;
    private $categories = array();
    private $labels = array();

    /**
     * Product constructor.
     * @param $id
     * @param $title
     * @param $price
     * @param array $categories
     * @param array $labels
     */
    public function __construct($id, $title, $price, array $categories, array $labels) {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->categories = $categories;
        $this->labels = $labels;
//        echo "\nNew Product Was Created!";
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
    public function getLabels() {
        return $this->labels;
    }

    /**
     * @param array $labels
     */
    public function setLabels($labels) {
        $this->labels = $labels;
    }

    public function printProduct() {
        echo "\nProduct #" . $this->id . ":\nTitle: " . $this->title . "\nCategories: ";
        print_r($this->categories);
        echo "\nPrice: " . $this->price . "\nLabels: ";
        print_r($this->labels);
    }
}