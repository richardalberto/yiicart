<?php

/**
 * This is the model class for table "manufacturer_to_store".
 *
 * The followings are the available columns in table 'manufacturer_to_store':
 * @property integer $manufacturer_id
 * @property integer $store_id
 */
class ManufacturerToStore extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ManufacturerToStore the static model class
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
		return 'manufacturer_to_store';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('manufacturer_id, store_id', 'required'),
			array('manufacturer_id, store_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('manufacturer_id, store_id', 'safe', 'on'=>'search'),
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
			'manufacturer_id' => 'Manufacturer',
			'store_id' => 'Store',
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

		$criteria->compare('manufacturer_id',$this->manufacturer_id);
		$criteria->compare('store_id',$this->store_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}