<?php

/**
 * This is the model class for table "manufacturer".
 *
 * The followings are the available columns in table 'manufacturer':
 * @property integer $manufacturer_id
 * @property string $name
 * @property string $image
 * @property integer $sort_order
 */
class Manufacturer extends CActiveRecord {

    private $cacheId;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Manufacturer the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'manufacturer';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, sort_order', 'required'),
            array('sort_order', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 64),
            array('image', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('manufacturer_id, name, image, sort_order', 'safe', 'on' => 'search'),
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
            'manufacturer_id' => 'Manufacturer',
            'name' => 'Name',
            'image' => 'Image',
            'sort_order' => 'Sort Order',
        );
    }
    
    public function beforeDelete() {
        $this->cacheId = $this->manufacturer_id;
        return parent::beforeDelete();
    }

    public function afterDelete() {        
        // delete dependencies
        ManufacturerToStore::model()->deleteAll("manufacturer_id={$this->cacheId}");
        UrlAlias::model()->deleteAll("query='manufacturer_id={$this->cacheId}'");

        parent::afterDelete();
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