<?php

/**
 * This is the model class for table "length_class_description".
 *
 * The followings are the available columns in table 'length_class_description':
 * @property integer $length_class_id
 * @property integer $language_id
 * @property string $title
 * @property string $unit
 */
class LengthClassDescription extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LengthClassDescription the static model class
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
		return 'length_class_description';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('language_id, title, unit', 'required'),
			array('language_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>32),
			array('unit', 'length', 'max'=>4),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'length_class_id' => 'Length Class',
			'language_id' => 'Language',
			'title' => 'Title',
			'unit' => 'Unit',
		);
	}
}