<?php
namespace common\models;

use yii\db\ActiveRecord;

/**
 * Group model
 *
 * @property integer $id
 */
class Role extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%roles}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'action'], 'required'],
            [['id'], 'integer'],
            [['description'], 'safe']            
        ];
    }
}
