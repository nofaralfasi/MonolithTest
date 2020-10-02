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

    public function addLabels($labels) {
        $flag = 0;
        $new_labels = array();
        foreach ($labels as $new_label) {
            foreach ($this->labels as $label) {
                if ($label->getId() === $new_label->getId()) {
                    $flag = 1;
                    $label->setRelatedProductsCounter($label->getRelatedProductsCounter() + $new_label->getRelatedProductsCounter());
                }
            }
            if ($flag === 0) {
                $new_labels[] = $new_label;
            }
            $flag = 0;
        }

        array_merge($this->labels, $new_labels);
    }

    public function getLabelTitleByLabelId($label_id) {
        foreach ($this->labels as $label) {
            if ($label->getId() === $label_id) {
                return $label->getTitle();
            }
        }
        return "";
    }

    public function checkIfLabelRelated($label) {
        return array_search($label, $this->labels);
    }

    public function checkIfLabelRelatedByLabelId($label_id) {
        if ($label_id >= $this->first_label_id && $label_id <= $this->last_label_id) {
            return TRUE;
        }
        return FALSE;
    }
}