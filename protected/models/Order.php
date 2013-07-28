<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property integer $order_id
 * @property integer $invoice_no
 * @property string $invoice_prefix
 * @property integer $store_id
 * @property string $store_name
 * @property string $store_url
 * @property integer $customer_id
 * @property integer $customer_group_id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $telephone
 * @property string $fax
 * @property string $payment_firstname
 * @property string $payment_lastname
 * @property string $payment_company
 * @property string $payment_company_id
 * @property string $payment_tax_id
 * @property string $payment_address_1
 * @property string $payment_address_2
 * @property string $payment_city
 * @property string $payment_postcode
 * @property string $payment_country
 * @property integer $payment_country_id
 * @property string $payment_zone
 * @property integer $payment_zone_id
 * @property string $payment_address_format
 * @property string $payment_method
 * @property string $payment_code
 * @property string $shipping_firstname
 * @property string $shipping_lastname
 * @property string $shipping_company
 * @property string $shipping_address_1
 * @property string $shipping_address_2
 * @property string $shipping_city
 * @property string $shipping_postcode
 * @property string $shipping_country
 * @property integer $shipping_country_id
 * @property string $shipping_zone
 * @property integer $shipping_zone_id
 * @property string $shipping_address_format
 * @property string $shipping_method
 * @property string $shipping_code
 * @property string $comment
 * @property string $total
 * @property integer $order_status_id
 * @property integer $affiliate_id
 * @property string $commission
 * @property integer $language_id
 * @property integer $currency_id
 * @property string $currency_code
 * @property string $currency_value
 * @property string $ip
 * @property string $forwarded_ip
 * @property string $user_agent
 * @property string $accept_language
 * @property string $date_added
 * @property string $date_modified
 */
class Order extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Order the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'order';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('invoice_prefix, store_name, store_url, firstname, lastname, email, telephone, fax, payment_firstname, payment_lastname, payment_company, payment_company_id, payment_tax_id, payment_address_1, payment_address_2, payment_city, payment_postcode, payment_country, payment_country_id, payment_zone, payment_zone_id, payment_address_format, payment_method, payment_code, shipping_firstname, shipping_lastname, shipping_company, shipping_address_1, shipping_address_2, shipping_city, shipping_postcode, shipping_country, shipping_country_id, shipping_zone, shipping_zone_id, shipping_address_format, shipping_method, shipping_code, comment, affiliate_id, commission, language_id, currency_id, currency_code, ip, forwarded_ip, user_agent, accept_language, date_added, date_modified', 'required'),
            array('invoice_no, store_id, customer_id, customer_group_id, payment_country_id, payment_zone_id, shipping_country_id, shipping_zone_id, order_status_id, affiliate_id, language_id, currency_id', 'numerical', 'integerOnly' => true),
            array('invoice_prefix', 'length', 'max' => 26),
            array('store_name', 'length', 'max' => 64),
            array('store_url, user_agent, accept_language', 'length', 'max' => 255),
            array('firstname, lastname, telephone, fax, payment_firstname, payment_lastname, payment_company, payment_company_id, payment_tax_id, shipping_firstname, shipping_lastname, shipping_company', 'length', 'max' => 32),
            array('email', 'length', 'max' => 96),
            array('payment_address_1, payment_address_2, payment_city, payment_country, payment_zone, payment_method, payment_code, shipping_address_1, shipping_address_2, shipping_city, shipping_country, shipping_zone, shipping_method, shipping_code', 'length', 'max' => 128),
            array('payment_postcode, shipping_postcode', 'length', 'max' => 10),
            array('total, commission, currency_value', 'length', 'max' => 15),
            array('currency_code', 'length', 'max' => 3),
            array('ip, forwarded_ip', 'length', 'max' => 40),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'products' => array(self::HAS_MANY, 'OrderProduct', 'order_id'),
            // TODO: add locale
            'status' => array(self::BELONGS_TO, 'OrderStatus', 'order_status_id', 'condition' => 'language_id=1'),
            'histories' => array(self::HAS_MANY, 'OrderHistory', 'order_id'),
            'customerGroup' => array(self::BELONGS_TO, 'CustomerGroup', 'customer_group_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'order_id' => 'Order',
            'invoice_no' => 'Invoice No',
            'invoice_prefix' => 'Invoice Prefix',
            'store_id' => 'Store',
            'store_name' => 'Store Name',
            'store_url' => 'Store Url',
            'customer_id' => 'Customer',
            'customer_group_id' => 'Customer Group',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'telephone' => 'Telephone',
            'fax' => 'Fax',
            'payment_firstname' => 'Payment Firstname',
            'payment_lastname' => 'Payment Lastname',
            'payment_company' => 'Payment Company',
            'payment_company_id' => 'Payment Company',
            'payment_tax_id' => 'Payment Tax',
            'payment_address_1' => 'Payment Address 1',
            'payment_address_2' => 'Payment Address 2',
            'payment_city' => 'Payment City',
            'payment_postcode' => 'Payment Postcode',
            'payment_country' => 'Payment Country',
            'payment_country_id' => 'Payment Country',
            'payment_zone' => 'Payment Zone',
            'payment_zone_id' => 'Payment Zone',
            'payment_address_format' => 'Payment Address Format',
            'payment_method' => 'Payment Method',
            'payment_code' => 'Payment Code',
            'shipping_firstname' => 'Shipping Firstname',
            'shipping_lastname' => 'Shipping Lastname',
            'shipping_company' => 'Shipping Company',
            'shipping_address_1' => 'Shipping Address 1',
            'shipping_address_2' => 'Shipping Address 2',
            'shipping_city' => 'Shipping City',
            'shipping_postcode' => 'Shipping Postcode',
            'shipping_country' => 'Shipping Country',
            'shipping_country_id' => 'Shipping Country',
            'shipping_zone' => 'Shipping Zone',
            'shipping_zone_id' => 'Shipping Zone',
            'shipping_address_format' => 'Shipping Address Format',
            'shipping_method' => 'Shipping Method',
            'shipping_code' => 'Shipping Code',
            'comment' => 'Comment',
            'total' => 'Total',
            'order_status_id' => 'Order Status',
            'affiliate_id' => 'Affiliate',
            'commission' => 'Commission',
            'language_id' => 'Language',
            'currency_id' => 'Currency',
            'currency_code' => 'Currency Code',
            'currency_value' => 'Currency Value',
            'ip' => 'Ip',
            'forwarded_ip' => 'Forwarded Ip',
            'user_agent' => 'User Agent',
            'accept_language' => 'Accept Language',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
        );
    }

    public function getCustomerFullname() {
        return "{$this->firstname} {$this->lastname}";
    }

    public function getPaymentCustomerFullname() {
        return "{$this->payment_firstname} {$this->payment_lastname}";
    }

    public function getShippingTotal() {
        // TODO: retrieve shipping total
        $shippingTotal = 0;

        // TODO: format total according to store settings
        return "$" . sprintf("%.2f", "{$shippingTotal}");
    }

    public function getSubTotal() {
        $subTotal = 0;
        foreach ($this->products as $product) {
            $subTotal += ($product->total * $product->quantity);
        }

        // TODO: format total according to store settings
        return "$" . sprintf("%.2f", "{$subTotal}");
    }

    public function getTotal() {
        // TODO: format total according to store settings
        return "$" . sprintf("%.2f", "{$this->total}");
    }

    public function getDateAdded($withTime = false) {
        // TODO: format date according to localization settings
        return date(($withTime ? 'Y-m-d h:i:s' : 'Y-m-d'), strtotime($this->date_added));
    }

    public function getDateModified($withTime = false) {
        // TODO: format date according to localization settings
        return date(($withTime ? 'Y-m-d h:i:s' : 'Y-m-d'), strtotime($this->date_modified));
    }

    public static function getOrdersTotal() {
        $order = Order::model()->findAll();
        $total = 0;
        foreach ($order as $o)
            $total += $o->total;

        return $total;
    }

}