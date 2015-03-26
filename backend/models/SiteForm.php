<?php

namespace backend\models;

use Yii;
use yii\base\Model;

/**
 * Group form
 */
class SiteForm extends Model {

    public $id, $name, $website;

    public function rules() {
        return [
            [['name', 'website'], 'required'],
            [['id', 'name', 'website'], 'safe'],
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
