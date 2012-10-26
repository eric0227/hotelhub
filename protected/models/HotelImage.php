<?php

/**
 * This is the model class for table "gc_hotel_image".
 *
 * The followings are the available columns in table 'gc_hotel_image':
 * @property string $id_image
 * @property string $id_hotel
 * @property integer $position
 * @property integer $cover
 *
 * The followings are the available model relations:
 * @property Image $idImage
 * @property Supplier $idHotel
 */
class HotelImage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HotelImage the static model class
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
		return 'gc_hotel_image';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_image, id_hotel', 'required'),
			array('position, cover', 'numerical', 'integerOnly'=>true),
			array('id_image, id_hotel', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_image, id_hotel, position, cover', 'safe', 'on'=>'search'),
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
			'image' => array(self::BELONGS_TO, 'Image', 'id_image'),
			'supplier' => array(self::BELONGS_TO, 'Supplier', 'id_hotel'),
			'hotel' => array(self::BELONGS_TO, 'Hotel', 'id_hotel'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_image' => 'Id Image',
			'id_hotel' => 'Id Hotel',
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

		$criteria->compare('id_image',$this->id_image,true);
		$criteria->compare('id_hotel',$this->id_hotel,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('cover',$this->cover);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}