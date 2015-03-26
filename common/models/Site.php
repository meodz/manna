<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $role
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class Site extends ActiveRecord {

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const ROLE_USER = 10;

    public $sites;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%sites}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'website'], 'required'],
            [['name', 'website', 'owner', 'createTime', 'updateTime'], 'default'],
        ];
    }

    public function relations() {
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array();
    }

    /**
     * 
     * @param type $pk
     * @param type $condition
     * @param type $params
     * @return Order
     */
    public function findByPk($pk, $condition = '', $params = array()) {
        return parent::findByPk($pk, $condition, $params);
    }

    public function getAll() {
        if (!isset($this->sites)) {
            $db = $this->getDb();
            $this->sites = $db->createCommand('SELECT * FROM sites')->cache(60)->queryOne();
        }
        return $this->sites;
    }

    public function get($id) {
        foreach ($this->getAll() as $lo) {
            if ($lo->id == $id) {
                return $lo;
            }
        }
        $lo = new Site();
        $lo->name = 'Không rõ';
        return $lo;
    }

    public function cache($duration = null) {
        if (!is_null($duration) && $duration >= 0) {
            $this->cacheDuration = $duration;
        }
        return $this;
    }

}
