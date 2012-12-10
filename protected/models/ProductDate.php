<?php

/**
 * This is the model class for table "gc_product_date".
 *
 * The followings are the available columns in table 'gc_product_date':
 * @property string $id_product_date
 * @property string $id_product
 * @property string $on_date
 * @property string $price
 * @property string $agent_price
 * @property string $quantity
 * @property string $out_of_stock
 * @property string $active
 *
 * The followings are the available model relations:
 * @property CartProduct[] $cartProducts
 * @property Product $product
 * @property Special[] $specials
 */
class ProductDate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductDate the static model class
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
		return 'gc_product_date';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_product, on_date, quantity', 'required'),
			array('id_product, quantity, out_of_stock', 'length', 'max'=>10),
			array('price, agent_price', 'length', 'max'=>20),
			array('active', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_product_date, id_product, on_date, price, agent_price, quantity, out_of_stock, active', 'safe', 'on'=>'search'),
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
			'cartProducts' => array(self::HAS_MANY, 'CartProduct', 'id_product_date'),
			'product' => array(self::BELONGS_TO, 'Product', 'id_product'),
			'specials' => array(self::MANY_MANY, 'Special', 'gc_special_product_date(id_product_date, id_special)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_product_date' => 'Id Product Date',
			'id_product' => 'Id Product',
			'on_date' => 'On Date',
			'price' => 'Price',
			'agent_price' => 'Agent Price',
			'quantity' => 'Quantity',
			'out_of_stock' => 'Out Of Stock',
			'active' => 'Active',
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

		$criteria->compare('id_product_date',$this->id_product_date,true);
		$criteria->compare('id_product',$this->id_product,true);
		
		if(isset($_REQUEST['id_product'])) {
			$criteria->compare('id_product', $_REQUEST['id_product'], true);
		}
		
		$criteria->compare('on_date',$this->on_date,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('agent_price',$this->agent_price,true);
		$criteria->compare('quantity',$this->quantity,true);
		$criteria->compare('out_of_stock',$this->out_of_stock,true);
		$criteria->compare('active',$this->active,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave() {
		return parent::beforeSave();
	}
	
	protected function afterSave() {
		if(isset($_POST['Special'])) {
			SpecialProductDate::model()->deleteAllByAttributes(array('id_product_date'=>$this->id_product_date));
			
			foreach($_POST['Special'] as $id_special) {
				$specialProductDate = new SpecialProductDate;
				$specialProductDate->id_special = $id_special;
				$specialProductDate->id_product_date = $this->id_product_date;
				$specialProductDate->save();
			}
		}
		return parent::afterSave();
	}
}