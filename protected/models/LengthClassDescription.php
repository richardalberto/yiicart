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
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('language_id, title, unit', 'required'),
			array('language_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>32),
			array('unit', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('length_class_id, language_id, title, unit', 'safe', 'on'=>'search'),
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
			'length_class_id' => 'Length Class',
			'language_id' => 'Language',
			'title' => 'Title',
			'unit' => 'Unit',
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

		$criteria->compare('length_class_id',$this->length_class_id);
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('unit',$this->unit,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}