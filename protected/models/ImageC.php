<?php

/**
 * This is the model class for table "gc_image".
 *
 * The followings are the available columns in table 'gc_image':
 * @property string $id_image
 * @property string $image
 * @property string $image_path
 * @property string $image_title
 * @property integer $position
 * @property integer $cover
 * @property integer $imageType
 * @property integer $id_supplier
 * @property integer $id_product
 *
 * The followings are the available model relations:
 * @property HotelImage $hotelImage
 * @property ProductImage $productImage
 */
class ImageC extends CActiveRecord
{
	const SUPPLIER_IMAGE = 1;
	const PRODUCT_IMAGE = 2;
	
	private $id_supplier;
	private $id_product;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Image the static model class
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
		return 'gc_image';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('image', 'required'),
			array('id_supplier', 'required'),
			
			array('image', 'unsafe'),
			array('image', 'file', 'types'=>'jpg, gif, png','allowEmpty' => true, 'on' => 'update'),
			
			array('position, cover', 'numerical', 'integerOnly'=>true),
			array('image, image_title', 'length', 'max'=>100),
			array('image_path', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_image, image_title', 'safe', 'on'=>'search'),
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
			'supplierImage' => array(self::HAS_ONE, 'SupplierImage', 'id_image'),
			'productImage' => array(self::HAS_ONE, 'ProductImage', 'id_image'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_image' => 'Id Image',
			'image' => 'Image',
			'image_path' => 'Image Path',
			'image_title' => 'Image Title',
			'position' => 'Position',
			'cover' => 'Cover',
			
			'id_supplier' => 'Id Supplier',
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

		$criteria->compare('id_image',$this->id_image,true);
		$criteria->compare('image_title',$this->image_title,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('cover',$this->cover);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getLink($type = null) {
		if($type == null) {
			return Yii::app()->request->baseUrl . $this->image_path .'/'. $this->getRealName();
		} else {
			return Yii::app()->request->baseUrl . $this->image_path .'/'. $this->id_image.'_'.$type.'.'.$this->getSubfix();
		}
	}
	
	public function getRealDir() {
		return Yii::getPathOfAlias('webroot') . $this->image_path;
	}
	
	public function getRealName() {
		return $this->id_image . '.' . $this->getSubfix();
	}
	
	public function getRealPath() {
		return $this->getRealDir() . '/' . $this->getRealName();
	}
	
	public function getSubfix() {
		$files = explode('.', $this->image);
		if(count($files) > 1) {
			return $files[count($files) - 1];
		}
		return "";
	}
	
	public function getIdSupplier() {
		return $this->id_supplier;
	}
	public function setIdSupplier($id_supplier) {
		$this->id_supplier = $id_supplier;
	}
	
	public function getIdProduct() {
		return $this->id_product;
	}
	public function setIdProduct($id_product) {
		$this->id_product = $id_product;
	}
	
	protected function beforeSave() {
		if($this->isNewRecord) {
			
		} else {
			
		}
		
		return parent::beforeSave();
	}
	
	protected function afterSave() {
		if($this->id_supplier) {
			$supplierImage = new SupplierImage();
			$supplierImage->id_supplier = $this->id_supplier;
			$supplierImage->id_image = $this->id_image;
			$supplierImage->save();
		}
	}
	
	protected function afterDelete() {
		SupplierImage::model()->deleteAll('id_image = :id_image', array(':id_image'=>$this->id_image));
		ProductImage::model()->deleteAll('id_image = :id_image', array(':id_image'=>$this->id_image));
	}
}