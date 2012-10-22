<?php

/**
 * This is the model class for table "gc_image".
 *
 * The followings are the available columns in table 'gc_image':
 * @property string $id_image
 * @property string $image_path
 * @property string $image_title
 *
 * The followings are the available model relations:
 * @property HotelImage $hotelImage
 * @property Product[] $gcProducts
 */
class Image extends CActiveRecord
{
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
			array('image_path', 'required'),
			array('image_path, image_title', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_image, image_path, image_title', 'safe', 'on'=>'search'),
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
			'hotelImage' => array(self::HAS_ONE, 'HotelImage', 'id_image'),
			'gcProducts' => array(self::MANY_MANY, 'Product', 'gc_product_image(id_image, id_product)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_image' => 'Id Image',
			'image_path' => 'Image Path',
			'image_title' => 'Image Title',
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
		$criteria->compare('image_path',$this->image_path,true);
		$criteria->compare('image_title',$this->image_title,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}