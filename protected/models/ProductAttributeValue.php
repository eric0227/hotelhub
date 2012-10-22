<?php

/**
 * This is the model class for table "gc_product_attribute_value".
 *
 * The followings are the available columns in table 'gc_product_attribute_value':
 * @property string $id_product_attribute_value
 * @property string $id_product
 * @property string $id_attribute
 * @property string $item_value
 *
 * The followings are the available model relations:
 * @property Product $idProduct
 * @property Attribute $idAttribute
 */
class ProductAttributeValue extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductAttributeValue the static model class
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
		return 'gc_product_attribute_value';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_product, id_attribute, item_value', 'required'),
			array('id_product, id_attribute', 'length', 'max'=>10),
			array('item_value', 'length', 'max'=>300),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_product_attribute_value, id_product, id_attribute, item_value', 'safe', 'on'=>'search'),
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
			'idProduct' => array(self::BELONGS_TO, 'Product', 'id_product'),
			'idAttribute' => array(self::BELONGS_TO, 'Attribute', 'id_attribute'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_product_attribute_value' => 'Id Product Attribute Value',
			'id_product' => 'Id Product',
			'id_attribute' => 'Id Attribute',
			'item_value' => 'Item Value',
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

		$criteria->compare('id_product_attribute_value',$this->id_product_attribute_value,true);
		$criteria->compare('id_product',$this->id_product,true);
		$criteria->compare('id_attribute',$this->id_attribute,true);
		$criteria->compare('item_value',$this->item_value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}