<?php
namespace common\models;

use yii\db\ActiveRecord;

/**
 * City model
 *
 * @property integer $id
 */
class City extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cities}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'order', 'description'], 'required'],
            [['id'], 'integer']            
        ];
    }
}
