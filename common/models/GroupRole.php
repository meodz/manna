<?php
namespace common\models;

use yii\db\ActiveRecord;

/**
 * GroupRole model
 *
 * @property integer $id
 */
class GroupRole extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%grouproles}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['groupId', 'roleId'], 'required'],
            [['groupId', 'roleId'], 'integer']
        ];
    }
}
