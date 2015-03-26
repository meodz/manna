<?php
namespace backend\models;

use Yii;
use yii\base\Model;

/**
 * Group form
 */
class RoleForm extends Model
{
    public $id, $name, $action, $description;

    public function rules()
    {
        return [
            [['name', 'action'], 'required'],
            [['id', 'name', 'action', 'description'], 'safe'],
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