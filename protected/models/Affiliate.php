<?php

/**
 * This is the model class for table "affiliate".
 *
 * The followings are the available columns in table 'affiliate':
 * @property integer $affiliate_id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $telephone
 * @property string $fax
 * @property string $password
 * @property string $salt
 * @property string $company
 * @property string $website
 * @property string $address_1
 * @property string $address_2
 * @property string $city
 * @property string $postcode
 * @property integer $country_id
 * @property integer $zone_id
 * @property string $code
 * @property string $commission
 * @property string $tax
 * @property string $payment
 * @property string $cheque
 * @property string $paypal
 * @property string $bank_name
 * @property string $bank_branch_number
 * @property string $bank_swift_code
 * @property string $bank_account_name
 * @property string $bank_account_number
 * @property string $ip
 * @property integer $status
 * @property integer $approved
 * @property string $date_added
 */
class Affiliate extends CActiveRecord {

    const PENDING = 0;
    const APPROVED = 1;
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Affiliate the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'affiliate';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('firstname, lastname, email, telephone, fax, password, salt, company, website, address_1, address_2, city, postcode, country_id, zone_id, code, tax, payment, cheque, paypal, bank_name, bank_branch_number, bank_swift_code, bank_account_name, bank_account_number, ip, status, approved, date_added', 'required'),
            array('country_id, zone_id, status, approved', 'numerical', 'integerOnly' => true),
            array('firstname, lastname, telephone, fax, company', 'length', 'max' => 32),
            array('email', 'length', 'max' => 96),
            array('password, ip', 'length', 'max' => 40),
            array('salt', 'length', 'max' => 9),
            array('website', 'length', 'max' => 255),
            array('address_1, address_2, city', 'length', 'max' => 128),
            array('postcode', 'length', 'max' => 10),
            array('code, tax, paypal, bank_name, bank_branch_number, bank_swift_code, bank_account_name, bank_account_number', 'length', 'max' => 64),
            array('commission', 'length', 'max' => 4),
            array('payment', 'length', 'max' => 6),
            array('cheque', 'length', 'max' => 100),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('affiliate_id, firstname, lastname, email, telephone, fax, password, salt, company, website, address_1, address_2, city, postcode, country_id, zone_id, code, commission, tax, payment, cheque, paypal, bank_name, bank_branch_number, bank_swift_code, bank_account_name, bank_account_number, ip, status, approved, date_added', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'affiliate_id' => 'Affiliate',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'telephone' => 'Telephone',
            'fax' => 'Fax',
            'password' => 'Password',
            'salt' => 'Salt',
            'company' => 'Company',
            'website' => 'Website',
            'address_1' => 'Address 1',
            'address_2' => 'Address 2',
            'city' => 'City',
            'postcode' => 'Postcode',
            'country_id' => 'Country',
            'zone_id' => 'Zone',
            'code' => 'Code',
            'commission' => 'Commission',
            'tax' => 'Tax',
            'payment' => 'Payment',
            'cheque' => 'Cheque',
            'paypal' => 'Paypal',
            'bank_name' => 'Bank Name',
            'bank_branch_number' => 'Bank Branch Number',
            'bank_swift_code' => 'Bank Swift Code',
            'bank_account_name' => 'Bank Account Name',
            'bank_account_number' => 'Bank Account Number',
            'ip' => 'Ip',
            'status' => 'Status',
            'approved' => 'Approved',
            'date_added' => 'Date Added',
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

        $criteria->compare('affiliate_id', $this->affiliate_id);
        $criteria->compare('firstname', $this->firstname, true);
        $criteria->compare('lastname', $this->lastname, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('telephone', $this->telephone, true);
        $criteria->compare('fax', $this->fax, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('salt', $this->salt, true);
        $criteria->compare('company', $this->company, true);
        $criteria->compare('website', $this->website, true);
        $criteria->compare('address_1', $this->address_1, true);
        $criteria->compare('address_2', $this->address_2, true);
        $criteria->compare('city', $this->city, true);
        $criteria->compare('postcode', $this->postcode, true);
        $criteria->compare('country_id', $this->country_id);
        $criteria->compare('zone_id', $this->zone_id);
        $criteria->compare('code', $this->code, true);
        $criteria->compare('commission', $this->commission, true);
        $criteria->compare('tax', $this->tax, true);
        $criteria->compare('payment', $this->payment, true);
        $criteria->compare('cheque', $this->cheque, true);
        $criteria->compare('paypal', $this->paypal, true);
        $criteria->compare('bank_name', $this->bank_name, true);
        $criteria->compare('bank_branch_number', $this->bank_branch_number, true);
        $criteria->compare('bank_swift_code', $this->bank_swift_code, true);
        $criteria->compare('bank_account_name', $this->bank_account_name, true);
        $criteria->compare('bank_account_number', $this->bank_account_number, true);
        $criteria->compare('ip', $this->ip, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('approved', $this->approved);
        $criteria->compare('date_added', $this->date_added, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}