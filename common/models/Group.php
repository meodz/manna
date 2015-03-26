<?php
namespace common\models;

use yii\db\ActiveRecord;

/**
 * Group model
 *
 * @property integer $id
 */
class Group extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%groups}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['id', 'isDefault', 'isAdmin'], 'integer'],            
            [['name', 'description'], 'safe'],
        ];
    }
}
