<?php

/**
 * This is the model class for table "tax_rule".
 *
 * The followings are the available columns in table 'tax_rule':
 * @property integer $tax_rule_id
 * @property integer $tax_class_id
 * @property integer $tax_rate_id
 * @property string $based
 * @property integer $priority
 */
class TaxRule extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TaxRule the static model class
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
		return 'tax_rule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tax_class_id, tax_rate_id, based', 'required'),
			array('tax_class_id, tax_rate_id, priority', 'numerical', 'integerOnly'=>true),
			array('based', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('tax_rule_id, tax_class_id, tax_rate_id, based, priority', 'safe', 'on'=>'search'),
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
			'tax_rule_id' => 'Tax Rule',
			'tax_class_id' => 'Tax Class',
			'tax_rate_id' => 'Tax Rate',
			'based' => 'Based',
			'priority' => 'Priority',
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

		$criteria->compare('tax_rule_id',$this->tax_rule_id);
		$criteria->compare('tax_class_id',$this->tax_class_id);
		$criteria->compare('tax_rate_id',$this->tax_rate_id);
		$criteria->compare('based',$this->based,true);
		$criteria->compare('priority',$this->priority);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}