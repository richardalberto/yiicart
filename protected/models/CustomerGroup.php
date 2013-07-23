<?php

/**
 * This is the model class for table "customer_group".
 *
 * The followings are the available columns in table 'customer_group':
 * @property integer $customer_group_id
 * @property integer $approval
 * @property integer $company_id_display
 * @property integer $company_id_required
 * @property integer $tax_id_display
 * @property integer $tax_id_required
 * @property integer $sort_order
 */
class CustomerGroup extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CustomerGroup the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'customer_group';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('approval, company_id_display, company_id_required, tax_id_display, tax_id_required, sort_order', 'required'),
            array('approval, company_id_display, company_id_required, tax_id_display, tax_id_required, sort_order', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('customer_group_id, approval, company_id_display, company_id_required, tax_id_display, tax_id_required, sort_order', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            // TODO: add locale
            'description'=> array(self::HAS_ONE, 'CustomerGroupDescription', 'customer_group_id', 'condition'=>'language_id=1'),         
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'customer_group_id' => 'Customer Group',
            'approval' => 'Approval',
            'company_id_display' => 'Company Id Display',
            'company_id_required' => 'Company Id Required',
            'tax_id_display' => 'Tax Id Display',
            'tax_id_required' => 'Tax Id Required',
            'sort_order' => 'Sort Order',
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

        $criteria->compare('customer_group_id', $this->customer_group_id);
        $criteria->compare('approval', $this->approval);
        $criteria->compare('company_id_display', $this->company_id_display);
        $criteria->compare('company_id_required', $this->company_id_required);
        $criteria->compare('tax_id_display', $this->tax_id_display);
        $criteria->compare('tax_id_required', $this->tax_id_required);
        $criteria->compare('sort_order', $this->sort_order);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}