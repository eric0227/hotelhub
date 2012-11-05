<?php

/**
 * This is the model class for table "gc_order".
 *
 * The followings are the available columns in table 'gc_order':
 * @property string $id_order
 * @property string $id_lang
 * @property string $id_user
 * @property string $id_cart
 * @property string $id_currency
 * @property string $id_address_delivery
 * @property string $id_address_invoice
 * @property string $secure_key
 * @property string $payment
 * @property string $conversion_rate
 * @property integer $gift
 * @property string $gift_message
 * @property string $total_products
 * @property string $total_discounts
 * @property string $total_paid
 * @property string $total_paid_real
 * @property string $invoice_number
 * @property string $delivery_number
 * @property string $invoice_date
 * @property string $delivery_date
 * @property string $date_add
 * @property string $date_upd
 *
 * The followings are the available model relations:
 * @property User $idUser
 * @property Cart $idCart
 * @property Currency $idCurrency
 * @property OrderHistory[] $orderHistories
 */
class Order extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Order the static model class
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
		return 'gc_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_lang, id_user, id_cart, id_currency, id_address_delivery, id_address_invoice, payment, invoice_date, delivery_date, date_add, date_upd', 'required'),
			array('gift', 'numerical', 'integerOnly'=>true),
			array('id_lang, id_user, id_cart, id_currency, id_address_delivery, id_address_invoice, invoice_number, delivery_number', 'length', 'max'=>10),
			array('secure_key', 'length', 'max'=>32),
			array('payment', 'length', 'max'=>255),
			array('conversion_rate', 'length', 'max'=>13),
			array('total_products, total_discounts, total_paid, total_paid_real', 'length', 'max'=>17),
			array('gift_message', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_order, id_lang, id_user, id_cart, id_currency, id_address_delivery, id_address_invoice, secure_key, payment, conversion_rate, gift, gift_message, total_products, total_discounts, total_paid, total_paid_real, invoice_number, delivery_number, invoice_date, delivery_date, date_add, date_upd', 'safe', 'on'=>'search'),
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
			'idUser' => array(self::BELONGS_TO, 'User', 'id_user'),
			'idCart' => array(self::BELONGS_TO, 'Cart', 'id_cart'),
			'idCurrency' => array(self::BELONGS_TO, 'Currency', 'id_currency'),
			'orderHistories' => array(self::HAS_MANY, 'OrderHistory', 'id_order'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_order' => 'Id Order',
			'id_lang' => 'Id Lang',
			'id_user' => 'Id User',
			'id_cart' => 'Id Cart',
			'id_currency' => 'Id Currency',
			'id_address_delivery' => 'Id Address Delivery',
			'id_address_invoice' => 'Id Address Invoice',
			'secure_key' => 'Secure Key',
			'payment' => 'Payment',
			'conversion_rate' => 'Conversion Rate',
			'gift' => 'Gift',
			'gift_message' => 'Gift Message',
			'total_products' => 'Total Products',
			'total_discounts' => 'Total Discounts',
			'total_paid' => 'Total Paid',
			'total_paid_real' => 'Total Paid Real',
			'invoice_number' => 'Invoice Number',
			'delivery_number' => 'Delivery Number',
			'invoice_date' => 'Invoice Date',
			'delivery_date' => 'Delivery Date',
			'date_add' => 'Date Add',
			'date_upd' => 'Date Upd',
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

		$criteria->compare('id_order',$this->id_order,true);
		$criteria->compare('id_lang',$this->id_lang,true);
		$criteria->compare('id_user',$this->id_user,true);
		$criteria->compare('id_cart',$this->id_cart,true);
		$criteria->compare('id_currency',$this->id_currency,true);
		$criteria->compare('id_address_delivery',$this->id_address_delivery,true);
		$criteria->compare('id_address_invoice',$this->id_address_invoice,true);
		$criteria->compare('secure_key',$this->secure_key,true);
		$criteria->compare('payment',$this->payment,true);
		$criteria->compare('conversion_rate',$this->conversion_rate,true);
		$criteria->compare('gift',$this->gift);
		$criteria->compare('gift_message',$this->gift_message,true);
		$criteria->compare('total_products',$this->total_products,true);
		$criteria->compare('total_discounts',$this->total_discounts,true);
		$criteria->compare('total_paid',$this->total_paid,true);
		$criteria->compare('total_paid_real',$this->total_paid_real,true);
		$criteria->compare('invoice_number',$this->invoice_number,true);
		$criteria->compare('delivery_number',$this->delivery_number,true);
		$criteria->compare('invoice_date',$this->invoice_date,true);
		$criteria->compare('delivery_date',$this->delivery_date,true);
		$criteria->compare('date_add',$this->date_add,true);
		$criteria->compare('date_upd',$this->date_upd,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}