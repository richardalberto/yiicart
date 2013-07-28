<?php

/**
 * This is the model class for table "currency".
 *
 * The followings are the available columns in table 'currency':
 * @property integer $currency_id
 * @property string $title
 * @property string $code
 * @property string $symbol_left
 * @property string $symbol_right
 * @property string $decimal_place
 * @property double $value
 * @property integer $status
 * @property string $date_modified
 */
class Currency extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Currency the static model class
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
		return 'currency';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, code, symbol_left, symbol_right, decimal_place, value, status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('value', 'numerical'),
			array('title', 'length', 'max'=>32),
			array('code', 'length', 'max'=>3),
			array('symbol_left, symbol_right', 'length', 'max'=>12),
			array('decimal_place', 'length', 'max'=>1),
			array('date_modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('currency_id, title, code, symbol_left, symbol_right, decimal_place, value, status, date_modified', 'safe', 'on'=>'search'),
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
			'currency_id' => 'Currency',
			'title' => 'Title',
			'code' => 'Code',
			'symbol_left' => 'Symbol Left',
			'symbol_right' => 'Symbol Right',
			'decimal_place' => 'Decimal Place',
			'value' => 'Value',
			'status' => 'Status',
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

		$criteria->compare('currency_id',$this->currency_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('symbol_left',$this->symbol_left,true);
		$criteria->compare('symbol_right',$this->symbol_right,true);
		$criteria->compare('decimal_place',$this->decimal_place,true);
		$criteria->compare('value',$this->value);
		$criteria->compare('status',$this->status);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}