<?php

/**
 * This is the model class for table "gc_order_booking".
 *
 * The followings are the available columns in table 'gc_order_booking':
 * @property string $id_order_booking
 * @property string $id_order
 * @property string $id_service
 * @property string $id_supplier
 * @property string $id_product
 * @property string $id_bedding
 * @property integer $on_refunded
 * @property integer $on_return
 * @property string $total_price
 * @property string $agent_total_price
 * @property string $bookin_date
 * @property string $bookout_date
 * @property string $checkin_date
 * @property string $checkout_date
 * @property string $booking_name
 *
 * The followings are the available model relations:
 * @property Order $order
 * @property Service $service
 * @property Supplier $supplier
 * @property Product $product
 * @property OrderItem[] $orderItems
 * @property Bedding $bedding
 */
class OrderBooking extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderBooking the static model class
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
		return 'gc_order_booking';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_order, id_service, id_supplier, id_product', 'required'),
			array('on_refunded, on_return', 'numerical', 'integerOnly'=>true),
			array('id_order, id_service, id_supplier, id_product, id_bedding', 'length', 'max'=>10),
			array('booking_name', 'length', 'max'=>255),
			array('total_price, agent_total_price', 'length', 'max'=>20),
			array('bookin_date, bookout_date, checkin_date, checkout_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_order_booking, id_order, id_service, id_supplier, id_product, on_refunded, on_return, total_price, agent_total_price, bookin_date, bookout_date, checkin_date, checkout_date, booking_name', 'safe', 'on'=>'search'),
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
			'order' => array(self::BELONGS_TO, 'Order', 'id_order'),
			'service' => array(self::BELONGS_TO, 'Service', 'id_service'),
			'supplier' => array(self::BELONGS_TO, 'Supplier', 'id_supplier'),
			'product' => array(self::BELONGS_TO, 'Product', 'id_product'),
			'bedding' => array(self::BELONGS_TO, 'Bedding', 'id_bedding'),
			'orderItems' => array(self::HAS_MANY, 'OrderItem', 'id_order_booking'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_order_booking' => 'Id Order Booking',
			'id_order' => 'Id Order',
			'id_service' => 'Id Service',
			'id_supplier' => 'Id Supplier',
			'id_product' => 'Id Product',
			'on_refunded' => 'On Refunded',
			'on_return' => 'On Return',
			'total_price' => 'Total Price',
			'agent_total_price' => 'Agent Total Price',
			'bookin_date' => 'Bookin Date',
			'bookout_date' => 'Bookout Date',
			'checkin_date' => 'Checkin Date',
			'checkout_date' => 'Checkout Date',
			'booking_name' => 'Booking Name',
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

		$criteria->compare('id_order_booking',$this->id_order_booking,true);
		$criteria->compare('id_order',$this->id_order,true);
		$criteria->compare('id_service',$this->id_service,true);
		$criteria->compare('id_supplier',$this->id_supplier,true);
		$criteria->compare('id_product',$this->id_product,true);
		$criteria->compare('id_bedding',$this->id_bedding,true);
		$criteria->compare('on_refunded',$this->on_refunded);
		$criteria->compare('on_return',$this->on_return);
		$criteria->compare('total_price',$this->total_price,true);
		$criteria->compare('agent_total_price',$this->agent_total_price,true);
		$criteria->compare('bookin_date',$this->bookin_date,true);
		$criteria->compare('bookout_date',$this->bookout_date,true);
		$criteria->compare('checkin_date',$this->checkin_date,true);
		$criteria->compare('checkout_date',$this->checkout_date,true);
		$criteria->compare('booking_name',$this->booking_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}