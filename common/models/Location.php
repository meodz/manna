<?php

/**
 * This is the model class for table "locations".
 *
 * The followings are the available columns in table 'locations':
 * @property integer $id
 * @property string $name
 * @property integer $order
 * @property string $description
 */
class Location extends CActiveRecord {

    private $_allLocations;

    /**
     * @return Location 
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'cities';
    }

    public function rules() {
        return array(
            array('order', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 50),
            array('description', 'safe'),
        );
    }

    public function relations() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'order' => 'Order',
            'description' => 'Description',
        );
    }

    public function getAll() {
        if (!isset($this->_allLocations)) {
            $this->_allLocations = $this->findAll(array('order' => '`order`'));
        }
        return $this->_allLocations;
    }

    public function get($id) {
        foreach ($this->getAll() as $lo) {
            if ($lo->id == $id) {
                return $lo;
            }
        }
        $lo = new Location();
        $lo->name = 'Không rõ';
        return $lo;
    }

}