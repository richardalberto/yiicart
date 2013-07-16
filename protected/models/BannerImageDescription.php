<?php

/**
 * This is the model class for table "banner_image_description".
 *
 * The followings are the available columns in table 'banner_image_description':
 * @property integer $banner_image_id
 * @property integer $language_id
 * @property integer $banner_id
 * @property string $title
 */
class BannerImageDescription extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return BannerImageDescription the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'banner_image_description';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('banner_image_id, language_id, banner_id, title', 'required'),
            array('banner_image_id, language_id, banner_id', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 64),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('banner_image_id, language_id, banner_id, title', 'safe', 'on' => 'search'),
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
            'banner_image_id' => 'Banner Image',
            'language_id' => 'Language',
            'banner_id' => 'Banner',
            'title' => 'Title',
        );
    }

}