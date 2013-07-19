<?php

/**
 * This is the model class for table "review".
 *
 * The followings are the available columns in table 'review':
 * @property integer $review_id
 * @property integer $product_id
 * @property integer $customer_id
 * @property string $author
 * @property string $text
 * @property integer $rating
 * @property integer $status
 * @property string $date_added
 * @property string $date_modified
 */
class Review extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Review the static model class
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
		return 'review';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, customer_id, author, text, rating', 'required'),
			array('product_id, customer_id, rating, status', 'numerical', 'integerOnly'=>true),
			array('author', 'length', 'max'=>64),
			array('date_added, date_modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('review_id, product_id, customer_id, author, text, rating, status, date_added, date_modified', 'safe', 'on'=>'search'),
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
			'review_id' => 'Review',
			'product_id' => 'Product',
			'customer_id' => 'Customer',
			'author' => 'Author',
			'text' => 'Text',
			'rating' => 'Rating',
			'status' => 'Status',
			'date_added' => 'Date Added',
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

		$criteria->compare('review_id',$this->review_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('status',$this->status);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}