<?php

/**
 * This is the model class for table "url_alias".
 *
 * The followings are the available columns in table 'url_alias':
 * @property integer $url_alias_id
 * @property string $query
 * @property string $keyword
 */
class UrlAlias extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return UrlAlias the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'url_alias';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('query, keyword', 'required'),
            array('query, keyword', 'length', 'max' => 255),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'url_alias_id' => 'Url Alias',
            'query' => 'Query',
            'keyword' => 'Keyword',
        );
    }

}