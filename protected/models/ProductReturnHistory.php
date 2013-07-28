<?php

/**
 * This is the model class for table "return_history".
 *
 * The followings are the available columns in table 'return_history':
 * @property integer $return_history_id
 * @property integer $return_id
 * @property integer $return_status_id
 * @property integer $notify
 * @property string $comment
 * @property string $date_added
 */
class ProductReturnHistory extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ProductReturnHistory the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'return_history';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('return_id, return_status_id, notify, comment, date_added', 'required'),
            array('return_id, return_status_id, notify', 'numerical', 'integerOnly' => true),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'return_history_id' => 'Return History',
            'return_id' => 'Return',
            'return_status_id' => 'Return Status',
            'notify' => 'Notify',
            'comment' => 'Comment',
            'date_added' => 'Date Added',
        );
    }

}