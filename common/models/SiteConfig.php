<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * City model
 *
 * @property integer $id
 */
class SiteConfig extends ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%siteconfig}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['siteId', 'categoryLevel1', 'categoryLevel2', 'categoryLevel3', 'itemNode', 'pageValue', 'itemName', 'itemImage', 'itemPrice', 'itemSellPrice', 'attributes', 'detail', 'count'], 'default'],
            [['id'], 'integer']
        ];
    }

}
