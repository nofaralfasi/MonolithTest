<?php
class Label {
    private $id;
    private $title;
    private $related_products_counter;

    /**
     * Label constructor.
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
     * @return mixed
     */
    public function getRelatedProductsCounter() {
        return $this->related_products_counter;
    }

    /**
     * @param mixed $related_products_counter
     */
    public function setRelatedProductsCounter($related_products_counter) {
        $this->related_products_counter = $related_products_counter;
    }

    public function increaseRelatedProductsCounter() {
        $this->related_products_counter += 1;
    }
}