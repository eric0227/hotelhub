<?php

/**
 * This is the model class for table "gc_cart_booking".
 *
 * The followings are the available columns in table 'gc_cart_booking':
 * @property string $id_cart_booking
 * @property string $id_cart
 * @property string $id_product
 * @property string $bookin_date
 * @property string $bookout_date
 * @property string $date_add
 * @property string $id_bedding
 * @property string $booking_name
 *
 * The followings are the available model relations:
 * @property Cart $idCart
 * @property Product $idProduct
 */
class CartBooking extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CartBooking the static model class
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
		return 'gc_cart_booking';
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
			array('id_cart, id_product, id_bedding', 'length', 'max'=>10),
			array('booking_name', 'length', 'max'=>256),
			array('bookin_date, bookout_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_cart_booking, id_cart, id_product, booking_name, bookin_date, bookout_date, date_add', 'safe', 'on'=>'search'),
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
			'product' => array(self::BELONGS_TO, 'Product', 'id_product'),
			'bedding' => array(self::BELONGS_TO, 'Bedding', 'id_bedding'),
			'cartProducts' => array(self::HAS_MANY, 'CartProduct', 'id_cart_booking'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cart_booking' => 'Id Cart Booking',
			'id_cart' => 'Id Cart',
			'id_product' => 'Id Product',
			'booking_name' => 'Booking Name',
			'bookin_date' => 'Bookin Date',
			'bookout_date' => 'Bookout Date',
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

		$criteria->compare('id_cart_booking',$this->id_cart_booking,true);
		$criteria->compare('id_cart',$this->id_cart,true);
		$criteria->compare('id_product',$this->id_product,true);
		$criteria->compare('id_bedding',$this->id_bedding,true);
		$criteria->compare('booking_name',$this->booking_name,true);
		$criteria->compare('bookin_date',$this->bookin_date,true);
		$criteria->compare('bookout_date',$this->bookout_date,true);
		$criteria->compare('date_add',$this->date_add,true);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave() {
		if($this->isNewRecord)
		{
			$this->date_add=new CDbExpression('NOW()');
		}
		return parent::beforeSave();
	}
}