<?php

/**
 * This is the model class for table "gc_cart".
 *
 * The followings are the available columns in table 'gc_cart':
 * @property string $id_cart
 * @property string $id_address_delivery
 * @property string $id_address_invoice
 * @property string $id_currency
 * @property string $id_user
 * @property string $secure_key
 * @property integer $recyclable
 * @property integer $gift
 * @property string $gift_message
 * @property string $date_add
 * @property string $date_upd
 * @property string $on_order
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Address $addressDelivery
 * @property Address $addressInvoice
 * @property Currency $currency
 * @property CartProduct[] $cartProducts
 * @property Order[] $orders
 */
class Cart extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cart the static model class
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
		return 'gc_cart';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_address_delivery, id_address_invoice, id_currency, id_user', 'required'),
			array('recyclable, gift', 'numerical', 'integerOnly'=>true),
			array('id_address_delivery, id_address_invoice, id_currency, id_user', 'length', 'max'=>10),
			array('secure_key', 'length', 'max'=>32),
			array('gift_message', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_cart, id_address_delivery, id_address_invoice, id_currency, id_user, secure_key, recyclable, gift, gift_message, date_add, date_upd', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'id_user'),
			'addressDelivery' => array(self::BELONGS_TO, 'Address', 'id_address_delivery'),
			'addressInvoice' => array(self::BELONGS_TO, 'Address', 'id_address_invoice'),
			'currency' => array(self::BELONGS_TO, 'Currency', 'id_currency'),
			'cartProducts' => array(self::HAS_MANY, 'CartProduct', 'id_cart'),
			'orders' => array(self::HAS_MANY, 'Order', 'id_cart'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cart' => 'Id Cart',
			'id_address_delivery' => 'Id Address Delivery',
			'id_address_invoice' => 'Id Address Invoice',
			'id_currency' => 'Id Currency',
			'id_user' => 'Id User',
			'secure_key' => 'Secure Key',
			'recyclable' => 'Recyclable',
			'gift' => 'Gift',
			'gift_message' => 'Gift Message',
			'date_add' => 'Date Add',
			'date_upd' => 'Date Upd',
			'on_order' => 'On Order',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_cart',$this->id_cart,true);
		$criteria->compare('id_address_delivery',$this->id_address_delivery,true);
		$criteria->compare('id_address_invoice',$this->id_address_invoice,true);
		$criteria->compare('id_currency',$this->id_currency,true);
		$criteria->compare('id_user',$this->id_user,true);
		$criteria->compare('secure_key',$this->secure_key,true);
		$criteria->compare('recyclable',$this->recyclable);
		$criteria->compare('gift',$this->gift);
		$criteria->compare('gift_message',$this->gift_message,true);
		$criteria->compare('date_add',$this->date_add,true);
		$criteria->compare('date_upd',$this->date_upd,true);
		$criteria->compare('on_order',$this->on_order,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave() {
		if($this->isNewRecord)
		{
			$this->date_add=$this->date_upd=new CDbExpression('NOW()');
		} else {
			$this->date_upd=new CDbExpression('NOW()');
		}	
		return parent::beforeSave();
	}
	
	public static function items() {
		$_items = array();
		
		$models = self::model()->findAll();
		foreach($models as $model) {
			$_items[$model->id_cart] = $model->id_cart;
		}
		return $_items;
	}
}