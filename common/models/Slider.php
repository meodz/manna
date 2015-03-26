<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * Group model
 *
 * @property integer $id
 */
class Slider extends ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%sliders}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['id', 'status', 'order'], 'integer'],
            [['name', 'link', 'image'], 'safe'],
            [['image'], 'file'],
        ];
    }

}
