<?php

/**
 * This is the model class for table "category_description".
 *
 * The followings are the available columns in table 'category_description':
 * @property integer $category_id
 * @property integer $language_id
 * @property string $name
 * @property string $description
 * @property string $meta_description
 * @property string $meta_keyword
 */
class CategoryDescription extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CategoryDescription the static model class
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
		return 'category_description';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, language_id, name, description, meta_description, meta_keyword', 'required'),
			array('category_id, language_id', 'numerical', 'integerOnly'=>true),
			array('name, meta_description, meta_keyword', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('category_id, language_id, name, description, meta_description, meta_keyword', 'safe', 'on'=>'search'),
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
			'category_id' => 'Category',
			'language_id' => 'Language',
			'name' => 'Name',
			'description' => 'Description',
			'meta_description' => 'Meta Description',
			'meta_keyword' => 'Meta Keyword',
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

		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('meta_keyword',$this->meta_keyword,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}