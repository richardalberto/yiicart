<?php

/**
 * This is the model class for table "download".
 *
 * The followings are the available columns in table 'download':
 * @property integer $download_id
 * @property string $filename
 * @property string $mask
 * @property integer $remaining
 * @property string $date_added
 */
class Download extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Download the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'download';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('filename, mask', 'required'),
            array('remaining', 'numerical', 'integerOnly' => true),
            array('filename, mask', 'length', 'max' => 128),
            array('date_added', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'description' => array(self::HAS_ONE, 'DownloadDescription', 'download_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'download_id' => 'Download',
            'filename' => 'Filename',
            'mask' => 'Mask',
            'remaining' => 'Remaining',
            'date_added' => 'Date Added',
        );
    }

}