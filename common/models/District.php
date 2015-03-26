<?php

/**
 * This is the model class for table "districts".
 *
 * The followings are the available columns in table 'districts':
 * @property integer $id
 * @property integer $locationId
 * @property string $name
 * @property integer $order
 */
class District extends CActiveRecord {

    private $_allDistrict;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Districts the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'districts';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('locationId, name, order', 'required'),
            array('locationId, order', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, locationId, name, order', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'locationId' => 'Location',
            'name' => 'Name',
            'order' => 'Order',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('locationId', $this->locationId);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('order', $this->order);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getAll() {
        if (!isset($this->_allDistrict)) {
            $this->_allDistrict = $this->findAll(array('order' => '`order`'));
        }
        return $this->_allDistrict;
    }

    public function getbyCityId($cid) {
        $rs = array();
        foreach ($this->getAll() as $dis) {
            if ($dis->locationId == $cid) {
                $rs[] = $dis;
            }
        }
        return $rs;
    }

    public function get($id) {
        foreach ($this->getAll() as $dis) {
            if ($dis->id == $id) {
                return $dis;
            }
        }
        $dis = new District();
        $dis->name = 'Không rõ';
        return $dis;
    }

}