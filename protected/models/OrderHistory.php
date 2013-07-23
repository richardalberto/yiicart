<?php

/**
 * This is the model class for table "order_history".
 *
 * The followings are the available columns in table 'order_history':
 * @property integer $order_history_id
 * @property integer $order_id
 * @property integer $order_status_id
 * @property integer $notify
 * @property string $comment
 * @property string $date_added
 */
class OrderHistory extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return OrderHistory the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'order_history';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('order_id, order_status_id, comment', 'required'),
            array('order_id, order_status_id, notify', 'numerical', 'integerOnly' => true),
            array('date_added', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            // TODO: add locale
            'status' => array(self::BELONGS_TO, 'OrderStatus', 'order_status_id', 'condition'=>'language_id=1'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'order_history_id' => 'Order History',
            'order_id' => 'Order',
            'order_status_id' => 'Order Status',
            'notify' => 'Notify',
            'comment' => 'Comment',
            'date_added' => 'Date Added',
        );
    }
    
    public function getDateAdded($withTime = false){
        // TODO: format date according to localization settings
        return date(($withTime ? 'Y-m-d h:i:s' : 'Y-m-d'), strtotime($this->date_added));
    }


    public function getNotify(){
        if($this->notify) 
            return Yii::t('common', 'Yes');
        else
            return Yii::t('common', 'No');
    }

}