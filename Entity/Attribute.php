<?php
class Attribute {
    private $id;
    private $title;
    private $labels = array();

    /**
     * Attribute constructor.
     * @param $id
     * @param $title
     * @param array $labels
     */
    public function __construct($id, $title, array $labels) {
        $this->id = $id;
        $this->title = $title;
        $this->labels = $labels;
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


}