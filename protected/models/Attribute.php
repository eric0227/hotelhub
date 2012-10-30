<?php

/**
 * This is the model class for table "gc_attribute".
 *
 * The followings are the available columns in table 'gc_attribute':
 * @property string $id_attribute
 * @property string $id_attribute_group
 * @property string $name
 * @property string $attr_type
 * @property integer $active
 * @property integer $position
 *
 * The followings are the available model relations:
 * @property AttributeGroup $idAttributeGroup
 * @property AttributeItem[] $attributeItems
 * @property Product[] $gcProducts
 * @property Supplier[] $gcSuppliers
 */
class Attribute extends CActiveRecord
{
	public static $TYPE = array(
			'checkbox'=>'checkbox',
			'radiobox'=>'radiobox',
			'textfield'=>'textfield',
			'textarea'=>'textarea',
	);
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Attribute the static model class
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
		return 'gc_attribute';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_attribute_group, name, attr_type', 'required'),
			array('active, position', 'numerical', 'integerOnly'=>true),
			array('id_attribute_group', 'length', 'max'=>10),
			array('name', 'length', 'max'=>128),
			array('attr_type', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_attribute, id_attribute_group, name, attr_type, active, position', 'safe', 'on'=>'search'),
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
			'attributeGroup' => array(self::BELONGS_TO, 'AttributeGroup', 'id_attribute_group'),
			'attributeItems' => array(self::HAS_MANY, 'AttributeItem', 'id_attribute'),
			'products' => array(self::MANY_MANY, 'Product', 'gc_product_attribute_value(id_attribute, id_product)'),
			'suppliers' => array(self::MANY_MANY, 'Supplier', 'gc_supplier_attribute_value(id_attribute, id_supplier)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_attribute' => 'Id Attribute',
			'id_attribute_group' => 'Id Attribute Group',
			'name' => 'Name',
			'attr_type' => 'Attr Type',
			'active' => 'Active',
			'position' => 'Position',
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

		$criteria->compare('id_attribute',$this->id_attribute,true);
		$criteria->compare('id_attribute_group',$this->id_attribute_group,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('attr_type',$this->attr_type,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('position',$this->position);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}