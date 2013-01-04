<?php

/**
 * This is the model class for table "gc_car".
 *
 * The followings are the available columns in table 'gc_car':
 * @property string $id_product
 * @property string $id_supplier
 * @property string $car_group_code
 * @property string $class_code
 * @property string $trans_type
 * @property string $people_maxnum
 *
 * The followings are the available model relations:
 * @property Product $idProduct
 * @property Supplier $idSupplier
 * @property Code $carGroupCode
 * @property Code $classCode
 */
class Car extends CActiveRecord
{
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Car the static model class
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
		return 'gc_car';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_product, id_supplier, car_group_code, class_code', 'required'),
			array('id_product, id_supplier', 'length', 'max'=>10),
			array('car_group_code, class_code', 'length', 'max'=>6),
			array('trans_type', 'length', 'max'=>9),
			array('people_maxnum', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_product, id_supplier, car_group_code, class_code, trans_type, people_maxnum', 'safe', 'on'=>'search'),
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
			'product' => array(self::BELONGS_TO, 'Product', 'id_product'),
			'supplier' => array(self::BELONGS_TO, 'Supplier', 'id_supplier'),
			'groupCode' => array(self::BELONGS_TO, 'Code', 'car_group_code'),
			'classCode' => array(self::BELONGS_TO, 'Code', 'class_code'),
			'attributeValues' => array(self::HAS_MANY, 'ProductAttributeValue', 'id_product'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_product' => 'Product',
			'id_supplier' => 'Supplier',
			'product_name' => 'Car Name',
			'car_group_code' => 'Group Code',
			'class_code' => 'Class Code',
			'trans_type' => 'Trans Type',
			'people_maxnum' => 'People Maxnum',
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

		$criteria->compare('id_product',$this->id_product,true);
		$criteria->compare('id_supplier',$this->id_supplier,true);
		$criteria->compare('car_group_code',$this->car_group_code,true);
		$criteria->compare('class_code',$this->class_code,true);
		$criteria->compare('trans_type',$this->trans_type,true);
		$criteria->compare('people_maxnum',$this->people_maxnum,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	protected function afterDelete() {
		if(isset($this->product)) {
			$this->product->delete();
		}
	}
	
	public static function  transTypeItems() {
		return array('Automatic'=>'Automatic', 'Manual'=>'Manual');
	}
	
	public function getAllAttributes() {
		$result = array();
	
		$attributeList = Attribute::model()->findAll(
				"id_attribute_group = :id_attribute_group", 
		array('id_attribute_group' => AttributeGroup::ROOM)
		);
	
		foreach($attributeList as $attribute) {
			$result[] = array(
					'attribute'=>$attribute,
					'attributeItem'=>AttributeItem::model()->findAll(
						'id_attribute = :id_attribute', 
			array('id_attribute'=>$attribute->id_attribute)
			),
					'selectedAttributeItemIds'=>$this->getSelectedAttributeItemIds($attribute->id_attribute)
			);
		}
	
		return $result;
	}
	
	public function getSelectedAttributeItemIds($id_attribute = null) {
		$result = array();
	
		foreach($this->attributeValues as $attributeValue) {
			if($id_attribute == null || $id_attribute == $attributeValue->id_attribute) {
				$result = array_merge($result, $attributeValue->getValues());
			}
		}
		return $result;
	}
	
	public function beforeSave() {
	
		//print_r($_POST['Product']['selectedAttributeItemIds']);
		//return false;
	
		$command = Yii::app()->db->createCommand();
		$command->delete('gc_product_attribute_value', 'id_product=:id_product', array(':id_product' => $this->id_product));
	
		$attributeList = Attribute::model()->findAll(
					"id_attribute_group = :id_attribute_group", 
		array('id_attribute_group' => AttributeGroup::ROOM)
		);
	
		$attributeValue = array();
	
		foreach($attributeList as $attribute) {
			if(!isset($attributeValue[$attribute->id_attribute])) {
				$attributeValue[$attribute->id_attribute] = array();
			}
			$attributeValue[$attribute->id_attribute] = $this->getSelectedAttributeItemIdsFromAttribute($attribute->id_attribute);
		}
	
		//print_r($attributeValue);
	
		foreach($attributeValue as $id_attribute => $ids) {
			if(count($ids) == 0) {
				continue;
			}
			$attributeValue=new ProductAttributeValue();
			$attributeValue->id_product = $this->id_product;
			$attributeValue->id_attribute = $id_attribute;
			//echo implode(';', $ids);
			$attributeValue->value = implode(';', $ids);
			$attributeValue->save();
		}
	
		//print_r($attributeValue);
	
		$product = Product::model()->findByPk($this->id_product);
		$this->id_supplier = $product->id_supplier;
	
		return parent::beforeSave();
	}
	
	private $attributeItems = null;
	public function getSelectedAttributeItemIdsFromAttribute($id_attribute) {
		$result = array();
	
		if($this->attributeItems == null) {
			$this->attributeItems = AttributeItem::model()->findAll();
		}
	
		foreach($this->attributeItems as $item) {
			if($item->id_attribute == $id_attribute) {
				if($this->containAttributeItem($item->id_attribute_item)) {
					$result[] = $item->id_attribute_item;
				}
			}
		}
	
		return $result;
	}
	
	public function containAttributeItem($id_attribute_item) {
		if(empty($_POST['selectedAttributeItemIds'])) {
			return false;
		}
	
		$ids = $_POST['selectedAttributeItemIds'];
	
		foreach($ids as $id) {
			if($id == $id_attribute_item) {
				return true;
			}
		}
		return false;
	}
	
	public static function items()
	{
		$_items = array();
		$models=self::model()->findAll();
	
		foreach($models as $model) {
			$_items[$model->id_product]=$model->id_product;
		}
		return $_items;
	}
	
	public static function numberForSelectItems($start, $end)
	{
		$_items = array();
		$_items[0] = null;
	
		if($start == 0 && $end == 0) {
			return $_items;
		}
	
		for($i = $start; $i <= $end; $i++) {
			$_items[$i] = $i;
		}
	
		return $_items;
	}
	
	public static function makeOptionData() {
		$id_product_array = $_POST['id_product_array'];
		$id_product_date_array = $_POST['id_product_date_array'];
	
		$adults_num =  $_POST['adults_num'];
		$children_num = $_POST['children_num'];
		$options = $_POST['options'];
	
		$option_data = array();
	
	
		foreach($id_product_array as $id_product) {
			//echo $id_product . ",";
			$bedding = Bedding::model()->findByPk($options[$id_product]);
			$room = Room::model()->findByPk($id_product);
			$product = Product::model()->findByPk($id_product);
				
			$extra_price = ($adults_num[$id_product] * $room->adults_extra)
			+ ($children_num[$id_product] * $room->children_extra)
			+ $bedding->additional_cost;
	
			$option_data[$id_product] = array(
					'name'=>$product->name,
					'adults_num'=>$adults_num[$id_product],
					'children_num'=>$children_num[$id_product],
					'adults_extra'=>$room->adults_extra,
					'children_extra'=>$room->children_extra,
					'extra_price'=>$extra_price,
					'bedding'=>array(
						'id_bedding'=>$options[$id_product],
						'bed_index'=>$bedding->bed_index,
						'bed_num'=>$bedding->bed_num,
						'single_num'=>$bedding->single_num,
						'double_num'=>$bedding->double_num,
						'additional_cost'=>$bedding->additional_cost,
			),
			);
		}
	
		foreach($id_product_date_array as $id_product_date => $id_product) {
			//echo $id_product_date . ",";
			$productDate = ProductDate::model()->findByPk($id_product_date);
			$extra_price = $option_data[$id_product]['extra_price'];
				
			$option_data[$id_product]['product_date'][$productDate->on_date] = array(
							'id_product_date'=>$id_product_date,
							'on_date'=>$productDate->on_date,
							'price'=>$productDate->price,
							'agent_price'=>$productDate->agent_price,
							'extra_price'=>$extra_price,
			);
				
			$total_price = $option_data[$id_product]['total_price'];
			if(!isset($total_price)) {
				$total_price = 0;
			}
				
			$total_agent_price = $option_data[$id_product]['total_agent_price'];
			if(!isset($total_agent_price)) {
				$total_agent_price = 0;
			}
			$total_price += $productDate->price + $extra_price;
			$total_agent_price += $productDate->agent_price +  $extra_price;
				
			$option_data[$id_product]['total_price'] = $total_price;
			$option_data[$id_product]['total_agent_price'] = $total_agent_price;
		}
	
		return $option_data;
	}
}