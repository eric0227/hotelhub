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
 * @property string $total_price
 * @property string $total_agent_price
 * @property string $total_discount
 * @property string $total_paid
 * @property string $invoice_number
 * @property string $delivery_number
 * @property string $invoice_date
 * @property string $delivery_date
 * @property string $date_add
 * @property string $date_upd
 * @property string $on_agent
 * @property string $id_order_state
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Cart $cart
 * @property Currency $currency
 * @property OrderHistory[] $orderHistories
 * @property OrderSate $orderState
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
			array('id_lang, id_user, id_cart, id_currency, id_address_delivery, id_address_invoice, payment', 'required'),
			array('gift', 'numerical', 'integerOnly'=>true),
			array('id_lang, id_user, id_cart, id_currency, id_address_delivery, id_address_invoice, invoice_number, delivery_number, id_order_state', 'length', 'max'=>10),
			array('secure_key', 'length', 'max'=>32),
			array('payment', 'length', 'max'=>255),
			array('conversion_rate', 'length', 'max'=>13),
			array('total_price, total_agent_price, total_discount, total_paid', 'length', 'max'=>17),
			array('gift_message', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_order, id_lang, id_user, id_cart, id_currency, id_address_delivery, id_address_invoice, secure_key, payment, conversion_rate, gift, gift_message, total_price, total_agent_price, total_discount, total_paid, invoice_number, delivery_number, invoice_date, delivery_date, date_add, date_upd', 'safe', 'on'=>'search'),
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
			'cart' => array(self::BELONGS_TO, 'Cart', 'id_cart'),
			'currency' => array(self::BELONGS_TO, 'Currency', 'id_currency'),
			'orderHistories' => array(self::HAS_MANY, 'OrderHistory', 'id_order',
									'order'=>'orderHistories.date_add DESC'),
			'orderState' => array(self::BELONGS_TO, 'OrderState', 'id_order_state'),
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
			'total_price' => 'Total Price',
			'total_agent_price' => 'Total Agent Price',
			'total_discount' => 'Total Discount',
			'total_paid' => 'Total Paid',
			'invoice_number' => 'Invoice Number',
			'delivery_number' => 'Delivery Number',
			'invoice_date' => 'Invoice Date',
			'delivery_date' => 'Delivery Date',
			'date_add' => 'Date Add',
			'date_upd' => 'Date Upd',
			'on_agent' => 'On Agent',
			'id_order_state' => 'Order State',
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
		$criteria->compare('total_price',$this->total_price,true);
		$criteria->compare('total_agent_price',$this->total_agent_price,true);
		$criteria->compare('total_discount',$this->total_discount,true);
		$criteria->compare('total_paid',$this->total_paid,true);
		$criteria->compare('invoice_number',$this->invoice_number,true);
		$criteria->compare('delivery_number',$this->delivery_number,true);
		$criteria->compare('invoice_date',$this->invoice_date,true);
		$criteria->compare('delivery_date',$this->delivery_date,true);
		$criteria->compare('date_add',$this->date_add,true);
		$criteria->compare('date_upd',$this->date_upd,true);
		$criteria->compare('on_agent',$this->date_upd,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave() {
		if($this->isNewRecord)
		{
			$this->date_add=$this->date_upd=$this->invoice_date=$this->delivery_date=new CDbExpression('NOW()');
			
			$this->id_lang=Lang::getCurrentLang();
				
			// get Cart
			$cart = Cart::model()->findByPk($this->id_cart);
			$this->id_currency = $cart->id_currency;
			$this->id_address_delivery = $cart->id_address_delivery;
			$this->id_address_invoice = $cart->id_address_invoice;
			
			if($this->user->isAgent()) {
				$this->on_agent = '1';
			}
			
		} else {
			$this->date_upd=new CDbExpression('NOW()');
		}
	
		$this->procOrder();
	
		return parent::beforeSave();
	}
	
	protected function afterSave() {
		$this->procOrderItem();
		
		$orderHistory = OrderHistory::model()->findByAttributes(array('id_order'=>$this->id_order, 'id_order_state'=>$this->id_order_state));
		if(!isset($orderHistory)) {
			$orderHistory = new OrderHistory;
			$orderHistory->id_order = $this->id_order;
			$orderHistory->id_order_state = $this->id_order_state;
			$orderHistory->id_user = $this->id_user;
			$orderHistory->save();
		}		
		return parent::afterSave();
	}
	
	public function procOrder() {

		$cart = Cart::model()->findByPk($this->id_cart);
		$cartProducts = $cart->cartProducts;
				
		$priceSum = 0;
		$agentPriceSum = 0;
		if(isset($cartProducts)) {
			foreach($cartProducts as $cartProduct) {
				$product = $cartProduct->product;
				$productDate = $cartProduct->productDate;
				
				if(isset($productDate)) {
					$priceSum = $priceSum + $productDate->price;
					$agentPriceSum = $agentPriceSum + $productDate->agent_price;
				} else {
					$priceSum = $priceSum + $product->price;
					$agentPriceSum = $agentPriceSum + $product->agent_price;
				}

			}
		}
	
		$this->total_price = $priceSum;
		$this->total_agent_price = $agentPriceSum;
		
		$this->payment = $priceSum;
	}
	
	private function procOrderItem() {
		$cart = Cart::model()->findByPk($this->id_cart);
		$cartProducts = $cart->cartProducts;
		if(isset($cartProducts)) {
			foreach($cartProducts as $cartProduct) {
				$orderItem = $this->saveOrderItem($cart, $cartProduct);
			}
		}
	}
	
	private function saveOrderItem($cart, $cartProduct) {
		$product = $cartProduct->product;
		$productDate = $cartProduct->productDate;
		
		$kinds = array();
		$kinds['id_order'] = $this->id_order;
		$kinds['id_product'] = $product->id_product;
		if(isset($productDate)) {
			$kinds['id_product_date'] = $productDate->id_product_date;
		}
		
		$orderItem = OrderItem::model()->findByAttributes($kinds);
		if(!isset($orderItem)) {
			$orderItem = new OrderItem;
		}		
		
		$orderItem->id_order = $this->id_order;
		$orderItem->id_service = $product->id_service;
		$orderItem->id_supplier = $product->id_supplier;
		$orderItem->id_product = $product->id_product;
		$orderItem->order_item_name = $product->getName();
		$orderItem->product_name = $product->getName();
		
		if(isset($productDate)) {
			$orderItem->id_product_date = $productDate->id_product_date;
			$orderItem->quantity_price = $productDate->price;
			$orderItem->agent_quantity_price = $productDate->agent_price;
			$orderItem->on_date = $productDate->on_date;
		} else {
			$orderItem->quantity_price = $product->price;
			$orderItem->agent_quantity_price = $product->agent_price;
		}
		$orderItem->product_quantity = $cartProduct->quantity;
		
		$orderItem->total_price = $orderItem->product_quantity * $orderItem->quantity_price;
		$orderItem->agent_total_price = $orderItem->product_quantity * $orderItem->agent_quantity_price;
		$orderItem->tax_name = 'default';
		$orderItem->product_weight = 0;
		
		print_r($orderItem->attributes, true);
		
		$orderItem->save();
	}
	
	public static function items() {
		$_items = array();
		
		$models = self::model()->findAll();
		foreach($models as $model) {
			$_items[$model->id_order] = $model->id_order;
		}
		return $_items;
	}
	
}