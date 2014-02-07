<?php

/**
 * This is the model class for table "banner_image".
 *
 * The followings are the available columns in table 'banner_image':
 * @property integer $banner_image_id
 * @property integer $banner_id
 * @property string $link
 * @property string $image
 */
class BannerImage extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return BannerImage the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'banner_image';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('banner_id, link, image', 'required'),
            array('banner_id', 'numerical', 'integerOnly' => true),
            array('link, image', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('banner_image_id, banner_id, link, image', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'description' => array(self::HAS_ONE, 'BannerImageDescription', 'banner_image_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'banner_image_id' => 'Banner Image',
            'banner_id' => 'Banner',
            'link' => 'Link',
            'image' => 'Image',
        );
    }

    public function getImageWithSize($width, $height) {
        if ($this->image && file_exists(Yii::app()->params['imagePath'] . $this->image)) {
            $_image = ImageTool::resize($this->image, $width, $height);
        } else {
            $_image = ImageTool::resize('no_image.jpg', $width, $height);
        }
        return $_image;
    }

}