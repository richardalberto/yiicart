<?php

/**
 * This is the model class for table "order_download".
 *
 * The followings are the available columns in table 'order_download':
 * @property integer $order_download_id
 * @property integer $order_id
 * @property integer $order_product_id
 * @property string $name
 * @property string $filename
 * @property string $mask
 * @property integer $remaining
 */
class OrderDownload extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderDownload the static model class
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
		return 'order_download';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, order_product_id, name, filename, mask', 'required'),
			array('order_id, order_product_id, remaining', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>64),
			array('filename, mask', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('order_download_id, order_id, order_product_id, name, filename, mask, remaining', 'safe', 'on'=>'search'),
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
			'order_download_id' => 'Order Download',
			'order_id' => 'Order',
			'order_product_id' => 'Order Product',
			'name' => 'Name',
			'filename' => 'Filename',
			'mask' => 'Mask',
			'remaining' => 'Remaining',
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

		$criteria->compare('order_download_id',$this->order_download_id);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('order_product_id',$this->order_product_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('mask',$this->mask,true);
		$criteria->compare('remaining',$this->remaining);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}