<?php

/**
 * This is the model class for table "tax_rate".
 *
 * The followings are the available columns in table 'tax_rate':
 * @property integer $tax_rate_id
 * @property integer $geo_zone_id
 * @property string $name
 * @property string $rate
 * @property string $type
 * @property string $date_added
 * @property string $date_modified
 */
class TaxRate extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return TaxRate the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tax_rate';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('name, type', 'required'),
            array('geo_zone_id', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 32),
            array('rate', 'length', 'max' => 15),
            array('type', 'length', 'max' => 1),
            array('date_added, date_modified', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'geoZone' => array(self::BELONGS_TO, 'GeoZone', 'geo_zone_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'tax_rate_id' => 'Tax Rate',
            'geo_zone_id' => 'Geo Zone',
            'name' => 'Name',
            'rate' => 'Rate',
            'type' => 'Type',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
        );
    }
    
    public function getDateAdded($withTime = false) {
        // TODO: format date according to localization settings
        return date(($withTime ? 'Y-m-d h:i:s' : 'Y-m-d'), strtotime($this->date_added));
    }

    public function getDateModified($withTime = false) {
        // TODO: format date according to localization settings
        return date(($withTime ? 'Y-m-d h:i:s' : 'Y-m-d'), strtotime($this->date_modified));
    }
    
    public function getType(){
        switch ($this->type){
            case 'P':
                return Yii::t('taxRates', 'Percentage');
                break;
            case 'F':
                return Yii::t('taxRates', 'Fixed Amount');
                break;
            default:
                return $this->type;
        }
    }

}