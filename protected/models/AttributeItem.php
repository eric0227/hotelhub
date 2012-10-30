<?php

/**
 * This is the model class for table "gc_attribute_item".
 *
 * The followings are the available columns in table 'gc_attribute_item':
 * @property string $id_attribute_item
 * @property string $id_attribute
 * @property string $item
 * @property integer $position
 *
 * The followings are the available model relations:
 * @property Attribute $idAttribute
 */
class AttributeItem extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AttributeItem the static model class
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
		return 'gc_attribute_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_attribute, item', 'required'),
			array('position', 'numerical', 'integerOnly'=>true),
			array('id_attribute', 'length', 'max'=>10),
			array('item', 'length', 'max'=>300),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_attribute_item, id_attribute, item, position', 'safe', 'on'=>'search'),
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
			'idAttribute' => array(self::BELONGS_TO, 'Attribute', 'id_attribute'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_attribute_item' => 'Id Attribute Item',
			'id_attribute' => 'Id Attribute',
			'item' => 'Item',
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

		$criteria->compare('id_attribute_item',$this->id_attribute_item,true);
		$criteria->compare('id_attribute',$this->id_attribute,true);
		$criteria->compare('item',$this->item,true);
		$criteria->compare('position',$this->position);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}