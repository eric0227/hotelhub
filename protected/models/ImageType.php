<?php

/**
 * This is the model class for table "gc_image_type".
 *
 * The followings are the available columns in table 'gc_image_type':
 * @property string $id_image_type
 * @property string $name
 * @property string $width
 * @property string $height
 */
class ImageType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ImageType the static model class
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
		return 'gc_image_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, width, height', 'required'),
			array('name', 'length', 'max'=>16),
			array('width, height', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_image_type, name, width, height', 'safe', 'on'=>'search'),
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
			'id_image_type' => 'Id Image Type',
			'name' => 'Name',
			'width' => 'Width',
			'height' => 'Height',
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

		$criteria->compare('id_image_type',$this->id_image_type,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('width',$this->width,true);
		$criteria->compare('height',$this->height,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}