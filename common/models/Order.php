<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property integer $id
 * @property integer $orderType
 * @property integer $orderStatus
 * @property string $itemId
 * @property string $itemTitle
 * @property string $itemSpecifics
 * @property string $itemUrl
 * @property string $itemCategoryId
 * @property string $itemPath
 * @property double $itemUSTax
 * @property double $itemUSShipping
 * @property double $itemUSPrice
 * @property double $priceAddition
 * @property double $priceMultiple
 * @property double $exchangeRate
 * @property integer $itemPrice
 * @property integer $quantity
 * @property integer $totalPrice
 * @property double $bankDiscountPrice
 * @property double $bankDiscountPercent
 * @property integer $bankDiscountId
 * @property double $couponPrice
 * @property double $couponPercent
 * @property integer $couponId
 * @property integer $finalPrice
 * @property integer $paymentType
 * @property integer $paymentStatus
 * @property string $paymentId
 * @property string $paymentInfo
 * @property string $paymentTime
 * @property string $paymentLog
 * @property integer $importOrderStatus
 * @property string $importOrderId
 * @property string $importOrderInfo
 * @property string $importOrderTime
 * @property string $importOrderLog
 * @property integer $importPaymentStatus
 * @property string $importPaymentId
 * @property string $importPaymentInfo
 * @property string $importPaymentTime
 * @property string $importPaymentLog
 * @property integer $importShipmentStatus
 * @property string $importShipmentId
 * @property integer $importShipmentPackageId
 * @property string $importShipmentLog
 * @property integer $importStock
 * @property integer $addPaymentType
 * @property integer $addPaymentStatus
 * @property string $addPaymentId
 * @property string $addPaymentInfo
 * @property string $addPaymentTime
 * @property string $addPaymentLog
 * @property integer $addPaymentTotalPrice
 * @property integer $refundType
 * @property integer $refundStatus
 * @property string $refundId
 * @property string $refundInfo
 * @property string $refundTime
 * @property string $refundLog
 * @property double $refundTotalPrice
 * @property integer $shipmentType
 * @property integer $shipmentStatus
 * @property string $shipmentId
 * @property string $shipmentInfo
 * @property string $shipmentTime
 * @property integer $shipmentMethod
 * @property string $shipmentLog
 * @property integer $supportStatus
 * @property string $supportInfo
 * @property string $supportTime
 * @property string $supportDoneTime
 * @property string $supportLog
 * @property string $supporterUsername
 * @property string $supporterInfo
 * @property string $buyerName
 * @property string $buyerEmail
 * @property string $buyerPhone
 * @property string $buyerAddress
 * @property integer $buyerCityId
 * @property integer $buyerDistrictId
 * @property string $receiverInfo
 * @property integer $issueStatus
 * @property string $issueInfo
 * @property string $issueTime
 * @property string $issueDoneTime
 * @property string $issueLog
 * @property string $orderTime
 * @property string $acceptLog
 * @property string $acceptTime
 * @property string $updateTime
 * @property string $note
 * @property integer $vat
 * @property string $gasource
 * @property string $gamedium
 * @property string $gacampaign
 */
class Order extends ActiveRecord {

    const ON = 1;
    const OFF = 0;
    //Order type
    const ORDER_TYPE_BUY = 1;
    const ORDER_TYPE_REQUEST = 2;
    const ORDER_TYPE_AUCTION = 3;
    const ORDER_TYPE_NAIMA = 4;
    const ORDER_TYPE_IMPORT = 5;
    //Order status
    const ORDER_STATUS_REQUEST = 1;
    const ORDER_STATUS_NEW = 2;
    const ORDER_STATUS_COMPLETED = 3;
    const ORDER_STATUS_REJECTED = 4;
    const ORDER_STATUS_WAITING = 5;
    //Payment status
    const PAYMENT_STATUS_PRE = 1;
    const PAYMENT_STATUS_WAITING = 2;
    const PAYMENT_STATUS_PAID = 3;
    const PAYMENT_STATUS_REJECTED = 4;
    //Payment type
    const PAYMENT_TYPE_NL = 1;
    const PAYMENT_TYPE_ATMONLIE = 2;
    const PAYMENT_TYPE_ATMOFFLINE = 3;
    const PAYMENT_TYPE_NHOFFLINE = 4;
    const PAYMENT_TYPE_CREDIT = 5;
    const PAYMENT_TYPE_TTVP = 6;
    const PAYMENT_TYPE_COD = 7;
    //Import order status
    const IMPORT_ORDER_STATUS_PRE = 1;
    const IMPORT_ORDER_STATUS_DONE = 2;
    const IMPORT_ORDER_STATUS_RENEW = 3;
    //Import payment status
    const IMPORT_PAYMENT_STATUS_PRE = 1;
    const IMPORT_PAYMENT_STATUS_PAID = 2;
    const IMPORT_PAYMENT_STATUS_REFUNDED = 3;
    const IMPORT_PAYMENT_STATUS_RENEW = 4;
    //Import shippment status
    const IMPORT_SHIPMENT_STATUS_PRE = 1;
    const IMPORT_SHIPMENT_STATUS_TOUS = 2;
    const IMPORT_SHIPMENT_STATUS_USSTOCKED = 3;
    const IMPORT_SHIPMENT_STATUS_TOVN = 4;
    const IMPORT_SHIPMENT_STATUS_ATVNGATE = 5;
    const IMPORT_SHIPMENT_STATUS_TOOFFICE = 6;
    const IMPORT_SHIPMENT_STATUS_STOCKED = 7;
    const IMPORT_SHIPMENT_STATUS_TOCUSTOMER = 8;
    const IMPORT_SHIPMENT_STATUS_ATCUSTOMER = 9;
    //Import stock
    const IMPORT_STOCK_U88 = 1;
    const IMPORT_STOCK_Q216 = 2;
    const IMPORT_STOCK_OTHER = 3;
    //Add payment status
    const ADD_PAYMENT_STATUS_PRE = 1;
    const ADD_PAYMENT_STATUS_CREATED = 2;
    const ADD_PAYMENT_STATUS_WAITING = 3;
    const ADD_PAYMENT_STATUS_PAID = 4;
    const ADD_PAYMENT_STATUS_RECREATED = 5;
    const ADD_PAYMENT_STATUS_ADDCREATED = 6;
    const ADD_PAYMENT_STATUS_CANCELED = 7;
    const ADD_PAYMENT_STATUS_EXPECT = 8;
    //Refund status
    const REFUND_STATUS_PRE = 1;
    const REFUND_STATUS_CREATED = 2;
    const REFUND_STATUS_WAITING = 3;
    const REFUND_STATUS_PAID = 4;
    const REFUND_STATUS_RECREATED = 5;
    const REFUND_STATUS_ADDCREATED = 6;
    const REFUND_STATUS_CANCELED = 7;
    //Support status
    const SUPPORT_STATUS_PRE = 1;
    const SUPPORT_STATUS_SUPPORTING = 2;
    const SUPPORT_STATUS_DONE = 3;
    const SUPPORT_STATUS_REJECTED = 4;
    const SUPPORT_STATUS_LATE = 5;
    const SUPPORT_STATUS_FAIL = 6;
    //Issue status
    const ISSUE_STATUS_PRE = 1;
    const ISSUE_STATUS_CREATED = 2;
    const ISSUE_STATUS_RESOLVING = 3;
    const ISSUE_STATUS_RESOLVED = 4;
    const ISSUE_STATUS_IMPOSSIBLE = 5;
    const ISSUE_STATUS_FOLLOW = 6;
    //Shippment status
    const SHIPMENT_STATUS_PRE = 1;
    const SHIPMENT_STATUS_CREATED = 2;
    const SHIPMENT_STATUS_WAITING = 3;
    const SHIPMENT_STATUS_DONE = 4;
    const SHIPMENT_STATUS_FAILED = 5;
    const SHIPMENT_STATUS_RECREATED = 6;
    //Shipment method
    const SHIPMENT_METHOD_SHIPCHUNG = 1;
    const SHIPMENT_METHOD_OFFICE = 2;
    //VAT
    const VAT_STATUS_YES = 1;
    const VAT_STATUS_NO = 0;
    //Expire
    const ORDER_BYNOW_EXPIRE_TIME = 1296000; //15 NGÀY
    const ORDER_AUCTION_EXPIRE_TIME = 432000; //5 NGÀY

    public $totalCategory;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Order the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public static function tableName() {
        return '{{%orders}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            //[['\'' . implode('\',\'', $this->attributes()) . '\''], 'safe'],
            [['buyerName', 'buyerEmail', 'buyerPhone', 'buyerAddress'], 'required', 'message' => 'Vui lòng điền đầy đủ thông tin'],
            [['buyerEmail'], 'email', 'message' => 'Emai không đúng định dạng'],
            [['itemTitle', 'itemUSPrice', 'itemUrl', 'quantity'], 'safe'],
        );
    }

    /**
     * @return array relational rules.
     */
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

    public function createUrl() {
        return Yii::app()->createUrl('frontend/user/bill', array('id' => $this->id));
    }

}
