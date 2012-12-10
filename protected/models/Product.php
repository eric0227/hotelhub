<?php

/**
 * This is the model class for table "gc_product".
 *
 * The followings are the available columns in table 'gc_product':
 * @property string $id_product
 * @property string $id_service
 * @property string $id_supplier
 * @property string $id_category_default
 * @property string $id_address
 * @property integer $on_sale
 * @property integer $quantity
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
 * @property string $maker
 * @property string $date_add
 * @property string $date_upd
 *
 * The followings are the available model relations:
 * @property Category[] $categories
 * @property Supplier $supplier
 * @property Category $categoryDefault
 * @property Attachment[] $attachments
 * @property Attribute[] $attributeList
 * @property ProductDate[] $productDates
 * @property ProductImage[] $productImages
 * @property ProductLang[] $productLangs
 * @property Service $service
 * @property Room $room
 */
class Product extends CActiveRecord
{
	private $description = null;
	private $description_short = null;
	private $name = null;
		
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
			array('', 'required', 'on'=>'insert'),
			array('id_category_default', 'required'),
			array('on_sale, quantity, active, show_price, indexed', 'numerical', 'integerOnly'=>true),
			array('width, height, depth, weight', 'numerical'),
			array('id_category_default, id_supplier, out_of_stock, id_address', 'length', 'max'=>10),
			array('price, agent_price, wholesale_price', 'length', 'max'=>20),
			array('maker', 'length', 'max'=>128),
			array('condition', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_product, id_category_default, on_sale, quantity, price, wholesale_price, width, height, depth, weight, out_of_stock, active, condition, show_price, indexed, date_add, date_upd', 'safe', 'on'=>'search'),
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
			'categories' => array(self::MANY_MANY, 'Category', 'gc_category_product(id_product, id_category)'),
			'service' => array(self::BELONGS_TO, 'Service', 'id_service'),
			'categoryDefault' => array(self::BELONGS_TO, 'Category', 'id_category_default'),
			'attachments' => array(self::MANY_MANY, 'Attachment', 'gc_product_attachment(id_product, id_attachment)'),
			'attributeList' => array(self::MANY_MANY, 'Attribute', 'gc_product_attribute_value(id_product, id_attribute)'),
			'productDates' => array(self::HAS_MANY, 'ProductDate', 'id_product'),
			//'productImages' => array(self::HAS_MANY, 'ProductImage', 'id_product'),
			'productImages' => array(self::MANY_MANY, 'ImageC', 'gc_product_image(id_image, id_product)'),
			'productLangs' => array(self::HAS_MANY, 'ProductLang', 'id_product'),
			'room' => array(self::HAS_ONE, 'Room', 'id_product'),
			'address' => array(self::BELONGS_TO, 'Address', 'id_address'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_product' => 'Id Product',
			'id_supplier' => 'Id Supplier',
			'id_category_default' => 'Id Category Default',
			'on_sale' => 'On Sale',
			'quantity' => 'Quantity',
			'price' => 'Base Price',
			'agent_price' => 'Base Agent Price',
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
			'maker' => 'Maker',
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
		
		$criteria->compare('id_service',Service::getCurrentService(),true);
				
		$criteria->compare('id_supplier',$this->id_supplier,true);
		$criteria->compare('id_category_default',$this->id_category_default,true);
		$criteria->compare('on_sale',$this->on_sale);
		$criteria->compare('quantity',$this->quantity);
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
	
	// 	private $description = null;
	// 	private $description_short = null;
	// 	private $name = null;
	
	protected function afterFind() {
		$langModel = ProductLang::model()->findByAttributes(array('id_product'=>$this->id_product, 'id_lang'=>Lang::getCurrentLang()));
		
		$this->name = $langModel->name;
		$this->description = $langModel->description;
		$this->description_short = $langModel->description_short;
	}
	
	public function getDescription() {
		return $this->description;
	}
	public function getDescription_Short() {
		return $this->description_short;
	}
	public function getName() {
		return $this->name;
	}
		
	public function loadMultiLang() {
		$mutltiLangModels = ProductLang::model()->findAllByAttributes(array('id_product'=>$this->id_product));
	
		$description = array();
		$description_short = array();
		$name = array();
	
		foreach($mutltiLangModels as $mutltiLangModel) {
			$description[$mutltiLangModel->id_lang] = $mutltiLangModel->description;
			$description_short[$mutltiLangModel->id_lang] = $mutltiLangModel->description_short;
			$name[$mutltiLangModel->id_lang] = $mutltiLangModel->name;
		}
		$this->description = $description;
		$this->description_short = $description_short;
		$this->name = $name;
	}	
	
	protected function beforeSave()
	{
		if($this->isNewRecord)
		{
			if(empty($this->id_supplier)) {
				$this->id_supplier = Yii::app()->user->getId();
			}
			$this->id_service=Service::getCurrentService();
			$this->date_add=$this->date_upd = new CDbExpression('NOW()');
		} else {
			$this->date_upd = new CDbExpression('NOW()');
		}
		
		return parent::beforeSave();
	}
	
	public static function items() {
		$_items = array();
	
		$service = Service::getCurrentService();
		
		$whereAttributes = array();
		$whereAttributes['id_service'] = Service::getCurrentService();
		
		if(Yii::app()->user->isSupplier()) {
			$whereAttributes['id_supplier'] = Yii::app()->user->id;
		}
		$models = Product::model()->findAllByAttributes($whereAttributes);

		foreach($models as $model) {
			$_items[$model->id_product] = $model->getName();
		}
		return $_items;
	}
	
	public function saveProductLang() {
		$id = $this->id_product;
	
		$description = $_POST['Product']['description'];
		$descriptionShort = $_POST['Product']['description_short'];
		$name = $_POST['Product']['name'];
	
		ProductLang::model()->deleteAllByAttributes(array('id_product'=>$id));
		foreach(Lang::items() as $lang => $langName) {
	
			if(empty($description[$lang])) {
				$description[$lang] = $description[Lang::getDefaultLang()];
			}
			if(empty($descriptionShort[$lang])) {
				$descriptionShort[$lang] = $descriptionShort[Lang::getDefaultLang()];
			}
			if(empty($name[$lang])) {
				$name[$lang] = $name[Lang::getDefaultLang()];
			}
	
			$model=new ProductLang;
			$model->id_product = $id;
			$model->id_lang = $lang;
			$model->description = $description[$lang];
			$model->description_short = $descriptionShort[$lang];
			$model->name = $name[$lang];
			$model->save();
	
			//print_r($model);
			//return;
		}
	}
}


