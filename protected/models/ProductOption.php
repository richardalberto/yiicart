<?php

/**
 * This is the model class for table "product_option".
 *
 * The followings are the available columns in table 'product_option':
 * @property integer $product_option_id
 * @property integer $product_id
 * @property integer $option_id
 * @property string $option_value
 * @property integer $required
 */
class ProductOption extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductOption the static model class
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
		return 'product_option';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, option_id, option_value, required', 'required'),
			array('product_id, option_id, required', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('product_option_id, product_id, option_id, option_value, required', 'safe', 'on'=>'search'),
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
			'product_option_id' => 'Product Option',
			'product_id' => 'Product',
			'option_id' => 'Option',
			'option_value' => 'Option Value',
			'required' => 'Required',
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

		$criteria->compare('product_option_id',$this->product_option_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('option_id',$this->option_id);
		$criteria->compare('option_value',$this->option_value,true);
		$criteria->compare('required',$this->required);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}