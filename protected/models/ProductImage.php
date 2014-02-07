<?php

/**
 * This is the model class for table "product_image".
 *
 * The followings are the available columns in table 'product_image':
 * @property integer $product_image_id
 * @property integer $product_id
 * @property string $image
 * @property integer $sort_order
 */
class ProductImage extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ProductImage the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'product_image';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('product_id', 'required'),
            array('product_id, sort_order', 'numerical', 'integerOnly' => true),
            array('image', 'length', 'max' => 255),
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
            'product_image_id' => 'Product Image',
            'product_id' => 'Product',
            'image' => 'Image',
            'sort_order' => 'Sort Order',
        );
    }

    public function getImageWithSize($width=0, $height=0) {
	    if($width===0 || $height===0)
		    return Yii::app()->getBaseUrl().DIRECTORY_SEPARATOR.'image'.DIRECTORY_SEPARATOR.$this->image;
        if ($this->image && file_exists(Yii::app()->params['imagePath'] . $this->image)) {
            $_image = ImageTool::resize($this->image, $width, $height);
        } else {
            $_image = ImageTool::resize('no_image.jpg', $width, $height);
        }
        return $_image;
    }

	public function render($width=0, $height=0, $alt='', $htmlOptions=array()){
		return CHtml::image($this->getImageWithSize($width,$height),$alt,
			array_merge($htmlOptions,array('width'=>$width,'height'=>$height)));
	}

}