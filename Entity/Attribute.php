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
        $this->setLabels($labels);
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
        foreach ($labels as $label) {
            $this->labels[] = new Label($label["id"], $label["title"]);
        }
    }

    public function checkIfLabelRelated($label) {
        return array_search($label, $this->labels);
    }

    public function checkIfLabelRelatedByLabelId($label_id) {
        return array_search($label, $this->labels);
    }
}