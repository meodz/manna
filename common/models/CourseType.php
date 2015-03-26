<?php
namespace common\models;

use yii\db\ActiveRecord;

/**
 * Course model
 *
 * @property integer $id
 */
class Course extends ActiveRecord
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%coursetype}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['order', 'name'], 'required'],
        [['order'], 'integer'],            
        [['name'], 'safe'],
        ];
    }
}
