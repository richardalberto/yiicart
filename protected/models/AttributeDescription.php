<?php

/**
 * This is the model class for table "attribute_description".
 *
 * The followings are the available columns in table 'attribute_description':
 * @property integer $attribute_id
 * @property integer $language_id
 * @property string $name
 */
class AttributeDescription extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return AttributeDescription the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'attribute_description';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('attribute_id, language_id, name', 'required'),
            array('attribute_id, language_id', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 64),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'attribute' => array(self::BELONGS_TO, 'Attribute', 'attribute_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'attribute_id' => 'Attribute',
            'language_id' => 'Language',
            'name' => 'Name',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('attribute_id', $this->attribute_id);
        $criteria->compare('language_id', $this->language_id);
        $criteria->compare('name', $this->name, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}