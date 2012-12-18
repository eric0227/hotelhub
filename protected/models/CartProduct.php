<?php

/**
 * This is the model class for table "gc_cart_product".
 *
 * The followings are the available columns in table 'gc_cart_product':
 * @property string $id_cart_product
 * @property string $id_cart
 * @property string $id_cart_booking
 * @property string $id_product
 * @property string $id_product_date
 * @property string $quantity
 * @property string $date_add
 * @property string $option_data
 *
 * The followings are the available model relations:
 * @property Cart $cart
 * @property CartBooking $cartBooking
 * @property Product $product
 * @property ProductDate $productDate
 */
class CartProduct extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CartProduct the static model class
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
		return 'gc_cart_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_cart, id_product', 'required'),
			array('id_cart, id_cart_booking, id_product, id_product_date, quantity', 'length', 'max'=>10),
			array('option_data', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_cart_product, id_cart, id_product, id_product_date, quantity, date_add', 'safe', 'on'=>'search'),
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
			'cart' => array(self::BELONGS_TO, 'Cart', 'id_cart'),
			'cartBooking' => array(self::BELONGS_TO, 'CartBooking', 'id_cart_booking'),
			'product' => array(self::BELONGS_TO, 'Product', 'id_product'),
			'productDate' => array(self::BELONGS_TO, 'ProductDate', 'id_product_date'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cart_product' => 'Id Cart Product',
			'id_cart' => 'Id Cart',
			'id_product' => 'Id Product',
			'id_product_date' => 'Id Product Date',
			'quantity' => 'Quantity',
			'date_add' => 'Date Add',
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

		$criteria->compare('id_cart_product',$this->id_cart_product,true);
		$criteria->compare('id_cart',$this->id_cart,true);
		$criteria->compare('id_cart_booking',$this->id_cart_booking,true);
		$criteria->compare('id_product',$this->id_product,true);
		$criteria->compare('id_product_date',$this->id_product_date,true);
		$criteria->compare('quantity',$this->quantity,true);
		$criteria->compare('date_add',$this->date_add,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave() {
		if($this->isNewRecord) {
			$this->date_add = new CDbExpression('NOW()');
		}
		return parent::beforeSave();
	}
}

