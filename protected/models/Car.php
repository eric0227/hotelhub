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
}