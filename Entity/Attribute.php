<?php
class Attribute {
    private $id;
    private $title;
    private $labels = array();
    private $first_label_id;
    private $last_label_id;

    /**
     * Attribute constructor.
     * @param $id
     * @param $title
     * @param array $labels
     * @param int $first_label_id
     * @param int $last_label_id
     */
    public function __construct($id, $title, array $labels, $first_label_id = 0, $last_label_id = 0) {
        $this->id = $id;
        $this->title = $title;
        $this->labels = $labels;
        $this->first_label_id = $first_label_id;
        $this->last_label_id = $last_label_id;
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
     * @return int
     */
    public function getFirstLabelId() {
        return $this->first_label_id;
    }

    /**
     * @return int
     */
    public function getLastLabelId() {
        return $this->last_label_id;
    }

        public function checkIfLabelRelated($label) {
        return array_search($label, $this->labels);
    }

    public function checkIfLabelRelatedByLabelId($label_id) {
        if($label_id >= $this->first_label_id && $label_id <= $this->last_label_id){
            return TRUE;
        }
        return FALSE;
    }


}