<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class OrderForm extends Model
{
    public $id, $buyerName, $buyerPhone, $buyerEmail, $buyerAddress, $receiverName, $receiverPhone, $receiverAddress, $receiverPhone, $receiverEmail, $itemName, $itemPrice, $itemPrice, $itemQuantity, $sourceLink;
    public function rules()
    {
        return [
            [['buyerName', 'buyerPhone', 'buyerEmail', 'buyerAddress', 'receiverName', 'receiverPhone', 'receiverAddress', 'receiverEmail'], 'required'],
            [['buyerEmail', 'receiverEmail'], 'email'],
            [['itemName', 'itemPrice', 'sourceLink', 'itemQuantity'], 'safe'],
        ];
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