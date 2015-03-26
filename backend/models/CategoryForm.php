<?php

namespace backend\models;

use yii\base\Model;

/**
 * Group form
 */
class CategoryForm extends Model {

    public $id, $name, $priceAddition, $priceMultiple, $order, $shipFee, $childApply;

    public function rules() {
        return [
            [['name'], 'required'],
            [['id', 'name', 'priceAddition', 'priceMultiple', 'order', 'shipFee', 'childApply'], 'safe'],
        ];
    }

    public function attributeLabels() {
        return array(
            'name' => 'Name',
            'isDefault' => 'isDefault',
            'isAdmin' => 'isAdmin',
            'description' => 'Description',
        );
    }

}
