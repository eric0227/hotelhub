<?php

/**
 * This is the model class for table "gc_product_image".
 *
 * The followings are the available columns in table 'gc_product_image':
 * @property string $id_product
 * @property string $id_image
 * @property integer $position
 * @property integer $cover
 */
class ProductImage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductImage the static model class
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
		return 'gc_product_image';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_product, id_image', 'required'),
			array('position, cover', 'numerical', 'integerOnly'=>true),
			array('id_product, id_image', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_product, id_image, position, cover', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_product' => 'Id Product',
			'id_image' => 'Id Image',
			'position' => 'Position',
			'cover' => 'Cover',
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
		$criteria->compare('id_image',$this->id_image,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('cover',$this->cover);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}