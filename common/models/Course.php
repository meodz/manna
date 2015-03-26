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
        return '{{%course}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['content', 'startTime', 'slotCount', 'price', 'language', 'program', 'teacher', 'type', 'name'], 'required'],
        [['slotCount', 'price', 'type'], 'integer'],            
        [['name', 'content', 'images', 'rate', 'rateCount'], 'safe'],
        ];
    }
}
    