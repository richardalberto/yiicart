<?php

/**
 * This is the model class for table "review".
 *
 * The followings are the available columns in table 'review':
 * @property integer $review_id
 * @property integer $product_id
 * @property integer $customer_id
 * @property string $author
 * @property string $text
 * @property integer $rating
 * @property integer $status
 * @property string $date_added
 * @property string $date_modified
 */
class Review extends CActiveRecord {
    
    const STATUS_PENDING = 0;
    const STATUS_APPROVED = 1;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Review the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'review';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('product_id, customer_id, author, text, rating', 'required'),
            array('product_id, customer_id, rating, status', 'numerical', 'integerOnly' => true),
            array('author', 'length', 'max' => 64),
            array('date_added, date_modified', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'review_id' => 'Review',
            'product_id' => 'Product',
            'customer_id' => 'Customer',
            'author' => 'Author',
            'text' => 'Text',
            'rating' => 'Rating',
            'status' => 'Status',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
        );
    }
    
    public function getStatus(){
        if($this->status == self::STATUS_PENDING)
            return Yii::t('common', 'Disabled');
        else
            return Yii::t('common', 'Enabled');
    }
    
    public function getDateAdded($withTime = false){
        if($withTime)
            return date('Y-m-d h:i:s', strtotime($this->date_added));
        else
            return date('Y-m-d', strtotime($this->date_added));
    }

}