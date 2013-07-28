<?php

/**
 * This is the model class for table "store".
 *
 * The followings are the available columns in table 'store':
 * @property integer $store_id
 * @property string $name
 * @property string $url
 * @property string $ssl
 */
class Store extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Store the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'store';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('name, url, ssl', 'required'),
            array('name', 'length', 'max' => 64),
            array('url, ssl', 'length', 'max' => 255),
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
            'store_id' => 'Store',
            'name' => 'Name',
            'url' => 'Url',
            'ssl' => 'Ssl',
        );
    }
    
    public function findAll($condition = '', $params = array()) {
        $stores = parent::findAll($condition, $params);
        
        // add default store
        $default = new Store;
        $default->name = Yii::app()->settings->getValue('config_title');
        $default->url = Yii::app()->baseUrl;
        $default->ssl = Yii::app()->baseUrl;
        $default->store_id = 0;
        array_unshift($stores, $default);
        
        return $stores;
    }

}