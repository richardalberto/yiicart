<?php

/**
 * This is the model class for table "voucher_history".
 *
 * The followings are the available columns in table 'voucher_history':
 * @property integer $voucher_history_id
 * @property integer $voucher_id
 * @property integer $order_id
 * @property string $amount
 * @property string $date_added
 */
class GiftVoucherHistory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GiftVoucherHistory the static model class
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
		return 'voucher_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('voucher_id, order_id, amount, date_added', 'required'),
			array('voucher_id, order_id', 'numerical', 'integerOnly'=>true),
			array('amount', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('voucher_history_id, voucher_id, order_id, amount, date_added', 'safe', 'on'=>'search'),
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
			'voucher_history_id' => 'Voucher History',
			'voucher_id' => 'Voucher',
			'order_id' => 'Order',
			'amount' => 'Amount',
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

		$criteria->compare('voucher_history_id',$this->voucher_history_id);
		$criteria->compare('voucher_id',$this->voucher_id);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('date_added',$this->date_added,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}