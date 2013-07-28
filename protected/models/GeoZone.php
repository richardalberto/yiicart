<?php

/**
 * This is the model class for table "geo_zone".
 *
 * The followings are the available columns in table 'geo_zone':
 * @property integer $geo_zone_id
 * @property string $name
 * @property string $description
 * @property string $date_modified
 * @property string $date_added
 */
class GeoZone extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GeoZone the static model class
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
		return 'geo_zone';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description', 'required'),
			array('name', 'length', 'max'=>32),
			array('description', 'length', 'max'=>255),
			array('date_modified, date_added', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('geo_zone_id, name, description, date_modified, date_added', 'safe', 'on'=>'search'),
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
			'geo_zone_id' => 'Geo Zone',
			'name' => 'Name',
			'description' => 'Description',
			'date_modified' => 'Date Modified',
			'date_added' => 'Date Added',
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

		$criteria->compare('geo_zone_id',$this->geo_zone_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('date_added',$this->date_added,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}