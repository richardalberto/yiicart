<?php

/**
 * This is the model class for table "voucher".
 *
 * The followings are the available columns in table 'voucher':
 * @property integer $voucher_id
 * @property integer $order_id
 * @property string $code
 * @property string $from_name
 * @property string $from_email
 * @property string $to_name
 * @property string $to_email
 * @property integer $voucher_theme_id
 * @property string $message
 * @property string $amount
 * @property integer $status
 * @property string $date_added
 */
class GiftVoucher extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GiftVoucher the static model class
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
		return 'voucher';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, code, from_name, from_email, to_name, to_email, voucher_theme_id, message, amount, status', 'required'),
			array('order_id, voucher_theme_id, status', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>10),
			array('from_name, to_name', 'length', 'max'=>64),
			array('from_email, to_email', 'length', 'max'=>96),
			array('amount', 'length', 'max'=>15),
			array('date_added', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('voucher_id, order_id, code, from_name, from_email, to_name, to_email, voucher_theme_id, message, amount, status, date_added', 'safe', 'on'=>'search'),
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
			'voucher_id' => 'Voucher',
			'order_id' => 'Order',
			'code' => 'Code',
			'from_name' => 'From Name',
			'from_email' => 'From Email',
			'to_name' => 'To Name',
			'to_email' => 'To Email',
			'voucher_theme_id' => 'Voucher Theme',
			'message' => 'Message',
			'amount' => 'Amount',
			'status' => 'Status',
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

		$criteria->compare('voucher_id',$this->voucher_id);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('from_name',$this->from_name,true);
		$criteria->compare('from_email',$this->from_email,true);
		$criteria->compare('to_name',$this->to_name,true);
		$criteria->compare('to_email',$this->to_email,true);
		$criteria->compare('voucher_theme_id',$this->voucher_theme_id);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('date_added',$this->date_added,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}