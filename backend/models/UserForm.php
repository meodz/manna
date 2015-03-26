<?php
namespace backend\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class UserForm extends Model
{
    /**
     * @var int 
     */
    public $id;

    /**
     * @var string 
     */
    public $username;

    /**
     * @var string 
     */
    public $newpassword;

    /**
     * @var string 
     */
    public $email;

    /**
     * @var string 
     */
    public $realname;

    /**
     * @var int 
     */
    public $gender;

    /**
     * @var int 
     */
    public $locationId;

    /**
     * @var string 
     */
    public $phone;

    /**
     * @var string 
     */
    public $address;

    /**
     * @var int 
     */
    public $groupId;
    /**
     * @var int 
     */
    public $black;

    public function rules()
    {
        return [
            [['username'], 'required'],
            [['email'], 'email'],
            [['username', 'realname', 'address', 'groupId', 'locationId', 'phone', 'id', 'newpassword'], 'safe'],
        ];
    }

    public function checkLocation() {
        if ($this->locationId == 0) {
            return true;
        }
        if (Location::model()->get($this->locationId) == null) {
            $this->addError('locationId', 'Chưa chọn nơi sống');
            return false;
        }
        return true;
    }

    public function checkGroup() {
        if (Group::model()->findByPk($this->groupId) == null) {
            $this->addError('groupId', 'Group cannot be blank');
            return false;
        }
        return true;
    }

    public function attributeLabels() {
        return array(
            'username' => 'Username',
            'newpassword' => 'Password',
            'email' => 'Email',
            'realname' => 'Realname',
            'gender' => 'Gender',
            'locationId' => 'Address',
            'address' => 'Address',
            'phone' => 'Phone',
        );
    }

}