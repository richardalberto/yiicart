<?php

/**
 * This is the model class for table "zone_to_geo_zone".
 *
 * The followings are the available columns in table 'zone_to_geo_zone':
 * @property integer $zone_to_geo_zone_id
 * @property integer $country_id
 * @property integer $zone_id
 * @property integer $geo_zone_id
 * @property string $date_added
 * @property string $date_modified
 */
class ZoneToGeoZone extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ZoneToGeoZone the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'zone_to_geo_zone';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('country_id, geo_zone_id', 'required'),
			array('country_id, zone_id, geo_zone_id', 'numerical', 'integerOnly'=>true),
			array('date_added, date_modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('zone_to_geo_zone_id, country_id, zone_id, geo_zone_id, date_added, date_modified', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'zone_to_geo_zone_id' => 'Zone To Geo Zone',
			'country_id' => 'Country',
			'zone_id' => 'Zone',
			'geo_zone_id' => 'Geo Zone',
			'date_added' => 'Date Added',
			'date_modified' => 'Date Modified',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('zone_to_geo_zone_id',$this->zone_to_geo_zone_id);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('zone_id',$this->zone_id);
		$criteria->compare('geo_zone_id',$this->geo_zone_id);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}