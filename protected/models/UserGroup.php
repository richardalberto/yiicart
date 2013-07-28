<?php

/**
 * This is the model class for table "user_group".
 *
 * The followings are the available columns in table 'user_group':
 * @property integer $user_group_id
 * @property string $name
 * @property string $permission
 */
class UserGroup extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return UserGroup the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user_group';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('name, permission', 'required'),
            array('name', 'length', 'max' => 64),
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
            'user_group_id' => 'User Group',
            'name' => 'Name',
            'permission' => 'Permission',
        );
    }
}