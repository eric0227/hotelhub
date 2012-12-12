<?php

/**
 * This is the model class for table "gc_order_item".
 *
 * The followings are the available columns in table 'gc_order_item':
 * @property string $id_order_item
 * @property string $id_order
 * @property string $id_service
 * @property string $id_supplier
 * @property string $id_product
 * @property string $id_product_date
 * @property string $id_order_booking
 * @property string $order_item_name
 * @property string $product_name
 * @property string $product_quantity
 * @property integer $product_quantity_in_stock
 * @property integer $on_refunded
 * @property integer $on_return
 * @property string $quantity_price
 * @property string $agent_quantity_price
 * @property string $reduction_percent
 * @property string $reduction_amount
 * @property string $product_quantity_discount
 * @property string $total_price
 * @property string $agent_total_price
 * @property double $product_weight
 * @property string $tax_name
 * @property string $tax_rate
 * @property integer $discount_quantity_applied
 *
 * The followings are the available model relations:
 * @property Order $order
 * @property Service $service
 * @property Supplier $supplier
 * @property Product $product
 * @property ProductDate $productDate
 */
class OrderItem extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderItem the static model class
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
		return 'gc_order_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_order, id_service, id_supplier, id_product, order_item_name, product_name, product_weight, tax_name', 'required'),
			array('product_quantity_in_stock, on_refunded, on_return, discount_quantity_applied', 'numerical', 'integerOnly'=>true),
			array('product_weight', 'numerical'),
			array('id_order, id_order_booking, id_service, id_supplier, id_product, id_product_date, product_quantity, reduction_percent, tax_rate', 'length', 'max'=>10),
			array('order_item_name, product_name', 'length', 'max'=>255),
			array('quantity_price, agent_quantity_price, reduction_amount, product_quantity_discount, total_price, agent_total_price', 'length', 'max'=>20),
			array('tax_name', 'length', 'max'=>16),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_order_item, id_order, id_service, id_supplier, id_product, id_product_date, order_item_name, product_name, product_quantity, product_quantity_in_stock, on_refunded, on_return, quantity_price, agent_quantity_price, reduction_percent, reduction_amount, product_quantity_discount, total_price, agent_total_price, product_weight, tax_name, tax_rate, discount_quantity_applied', 'safe', 'on'=>'search'),
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
			'productDate' => array(self::BELONGS_TO, 'ProductDate', 'id_product_date'),
			'orderBooking' => array(self::BELONGS_TO, 'OrderBooking', 'id_order_booking'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_order_item' => 'Id Order Item',
			'id_order' => 'Id Order',
			'id_service' => 'Id Service',
			'id_supplier' => 'Id Supplier',
			'id_product' => 'Id Product',
			'id_product_date' => 'Id Product Date',
			'order_item_name' => 'Order Item Name',
			'product_name' => 'Product Name',
			'product_quantity' => 'Product Quantity',
			'product_quantity_in_stock' => 'Product Quantity In Stock',
			'on_refunded' => 'On Refunded',
			'on_return' => 'On Return',
			'quantity_price' => 'Quantity Price',
			'agent_quantity_price' => 'Agent Quantity Price',
			'reduction_percent' => 'Reduction Percent',
			'reduction_amount' => 'Reduction Amount',
			'product_quantity_discount' => 'Product Quantity Discount',
			'total_price' => 'Total Price',
			'agent_total_price' => 'Agent Total Price',
			'product_weight' => 'Product Weight',
			'tax_name' => 'Tax Name',
			'tax_rate' => 'Tax Rate',
			'discount_quantity_applied' => 'Discount Quantity Applied',
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

		$criteria->compare('id_order_item',$this->id_order_item,true);
		$criteria->compare('id_order',$this->id_order,true);
		$criteria->compare('id_service',$this->id_service,true);
		$criteria->compare('id_supplier',$this->id_supplier,true);
		$criteria->compare('id_product',$this->id_product,true);
		$criteria->compare('id_product_date',$this->id_product_date,true);
		$criteria->compare('id_order_booking',$this->id_order_booking,true);
		$criteria->compare('order_item_name',$this->order_item_name,true);
		$criteria->compare('product_name',$this->product_name,true);
		$criteria->compare('product_quantity',$this->product_quantity,true);
		$criteria->compare('product_quantity_in_stock',$this->product_quantity_in_stock);
		$criteria->compare('on_refunded',$this->on_refunded);
		$criteria->compare('on_return',$this->on_return);
		$criteria->compare('quantity_price',$this->quantity_price,true);
		$criteria->compare('agent_quantity_price',$this->agent_quantity_price,true);
		$criteria->compare('reduction_percent',$this->reduction_percent,true);
		$criteria->compare('reduction_amount',$this->reduction_amount,true);
		$criteria->compare('product_quantity_discount',$this->product_quantity_discount,true);
		$criteria->compare('total_price',$this->total_price,true);
		$criteria->compare('agent_total_price',$this->agent_total_price,true);
		$criteria->compare('product_weight',$this->product_weight);
		$criteria->compare('tax_name',$this->tax_name,true);
		$criteria->compare('tax_rate',$this->tax_rate,true);
		$criteria->compare('discount_quantity_applied',$this->discount_quantity_applied);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}