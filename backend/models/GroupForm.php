<?php
namespace backend\models;

use Yii;
use yii\base\Model;

/**
 * Group form
 */
class GroupForm extends Model
{
    public $id, $name, $isDefault, $isAdmin, $description;

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['id', 'name', 'isDefault', 'isAdmin', 'description'], 'safe'],
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