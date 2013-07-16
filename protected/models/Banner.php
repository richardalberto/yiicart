<?php

/**
 * This is the model class for table "banner".
 *
 * The followings are the available columns in table 'banner':
 * @property integer $banner_id
 * @property string $name
 * @property integer $status
 */
class Banner extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Banner the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'banner';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, status', 'required'),
            array('status', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 64),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('banner_id, name, status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'images' => array(self::HAS_MANY, 'BannerImage', 'banner_id'),
        );
    }

    public function scopes() {
        return array(
            'active' => array(
                'condition' => 'status=1',
            ),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'banner_id' => 'Banner',
            'name' => 'Name',
            'status' => 'Status',
        );
    }

    public function hasImages() {
        return count($this->images) > 0 ? true : false;
    }

}