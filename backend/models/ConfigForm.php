<?php

namespace backend\models;

use Yii;
use yii\base\Model;

/**
 * Group form
 */
class ConfigForm extends Model {

    public $siteId, $categoryLevel1, $categoryLevel2, $categoryLevel3, $itemNode, $pageValue, $itemName, $itemImage, $itemPrice, $itemSellPrice, $attributes, $detail, $count;

    public function rules() {
        return [
            [['siteId'], 'required'],
            [['categoryLevel1', 'categoryLevel2', 'categoryLevel3', 'itemNode', 'pageValue', 'itemName', 'itemImage', 'itemPrice', 'itemSellPrice', 'attributes', 'detail', 'count'], 'default'],
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
