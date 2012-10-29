<?php

/**
 * This is the model class for table "gc_product".
 *
 * The followings are the available columns in table 'gc_product':
 * @property string $id_product
 * @property string $id_category_default
 * @property integer $on_sale
 * @property integer $quantity
 * @property string $minimal_quantity
 * @property string $price
 * @property string $wholesale_price
 * @property double $width
 * @property double $height
 * @property double $depth
 * @property double $weight
 * @property string $out_of_stock
 * @property integer $active
 * @property string $condition
 * @property integer $show_price
 * @property integer $indexed
 * @property string $date_add
 * @property string $date_upd
 *
 * The followings are the available model relations:
 * @property Category[] $gcCategories
 * @property Category $idCategoryDefault
 * @property Attachment[] $gcAttachments
 * @property Attribute[] $gcAttributes
 * @property ProductAttributeValue[] $productAttributeValues
 * @property ProductImage[] $productImages
 * @property ProductLang[] $productLangs
 * @property ProductRoom[] $productRooms
 */
class Product extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Product the static model class
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
		return 'gc_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_add, date_upd', 'required'),
			array('on_sale, quantity, active, show_price, indexed', 'numerical', 'integerOnly'=>true),
			array('width, height, depth, weight', 'numerical'),
			array('id_category_default, minimal_quantity, out_of_stock', 'length', 'max'=>10),
			array('price, wholesale_price', 'length', 'max'=>20),
			array('condition', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_product, id_category_default, on_sale, quantity, minimal_quantity, price, wholesale_price, width, height, depth, weight, out_of_stock, active, condition, show_price, indexed, date_add, date_upd', 'safe', 'on'=>'search'),
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
			'gcCategories' => array(self::MANY_MANY, 'Category', 'gc_category_product(id_product, id_category)'),
			'idCategoryDefault' => array(self::BELONGS_TO, 'Category', 'id_category_default'),
			'gcAttachments' => array(self::MANY_MANY, 'Attachment', 'gc_product_attachment(id_product, id_attachment)'),
			'gcAttributes' => array(self::MANY_MANY, 'Attribute', 'gc_product_attribute(id_product, id_attribute)'),
			'productAttributeValues' => array(self::HAS_MANY, 'ProductAttributeValue', 'id_product'),
			'productImages' => array(self::HAS_MANY, 'ProductImage', 'id_product'),
			'productLangs' => array(self::HAS_MANY, 'ProductLang', 'id_product'),
			'productRooms' => array(self::HAS_MANY, 'ProductRoom', 'id_product'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_product' => 'Id Product',
			'id_category_default' => 'Id Category Default',
			'on_sale' => 'On Sale',
			'quantity' => 'Quantity',
			'minimal_quantity' => 'Minimal Quantity',
			'price' => 'Price',
			'wholesale_price' => 'Wholesale Price',
			'width' => 'Width',
			'height' => 'Height',
			'depth' => 'Depth',
			'weight' => 'Weight',
			'out_of_stock' => 'Out Of Stock',
			'active' => 'Active',
			'condition' => 'Condition',
			'show_price' => 'Show Price',
			'indexed' => 'Indexed',
			'date_add' => 'Date Add',
			'date_upd' => 'Date Upd',
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
		$criteria->compare('id_category_default',$this->id_category_default,true);
		$criteria->compare('on_sale',$this->on_sale);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('minimal_quantity',$this->minimal_quantity,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('wholesale_price',$this->wholesale_price,true);
		$criteria->compare('width',$this->width);
		$criteria->compare('height',$this->height);
		$criteria->compare('depth',$this->depth);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('out_of_stock',$this->out_of_stock,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('condition',$this->condition,true);
		$criteria->compare('show_price',$this->show_price);
		$criteria->compare('indexed',$this->indexed);
		$criteria->compare('date_add',$this->date_add,true);
		$criteria->compare('date_upd',$this->date_upd,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}