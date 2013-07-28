<?php

/**
 * This is the model class for table "voucher_theme".
 *
 * The followings are the available columns in table 'voucher_theme':
 * @property integer $voucher_theme_id
 * @property string $image
 */
class GiftVoucherTheme extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return GiftVoucherTheme the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'voucher_theme';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('image', 'required'),
            array('image', 'length', 'max' => 255),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'description' => array(self::HAS_ONE, 'GiftVoucherThemeDescription', 'voucher_theme_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'voucher_theme_id' => 'Voucher Theme',
            'image' => 'Image',
        );
    }

}