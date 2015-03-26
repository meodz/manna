<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * City model
 *
 * @property integer $id
 */
class Category extends ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%categories}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'parentId', 'priceMultiple', 'priceAddition', 'level', 'order', 'published', 'leaf', 'path', 'siteId'], 'default'],
            [['id', 'parentId', 'level', 'order'], 'integer']
        ];
    }

    public function selectChildIds() {
        $ids = array();
        $this->buildChildIds($ids, $this->id);
        return $ids;
    }

    public function buildChildIds(&$ids, $id) {
        $childs = $this->find()->where(['parentId' => $id])->all();
        foreach ($childs as $child) {
            $ids[] = $child->id;
            $this->buildChildIds($ids, $child->id);
        }
    }

    /**
     * @return Category[]
     */
    public function selectPath() {
        $path = array();
        $path[] = $this;
        $this->buildPath($path, $this->parentId);
        return $path;
    }

    public function buildPath(&$path, $id) {
        if ($id != 0) {
            $cat = $this->findOne($id);
            if ($cat != NULL) {
                $path[] = $cat;
                $this->buildPath($path, $cat->parentId);
            }
        }
    }

}
