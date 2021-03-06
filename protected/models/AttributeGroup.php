<?php

/**
 * This is the model class for table "gc_attribute_group".
 *
 * The followings are the available columns in table 'gc_attribute_group':
 * @property string $id_attribute_group
 * @property string $name
 *
 * The followings are the available model relations:
 * @property Attribute[] $attributes
 */
class AttributeGroup extends CActiveRecord
{
	const ROOM = '1';
	const SUPPLIER = '2';
	 
	private static $_items = null;
	 
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AttributeGroup the static model class
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
		return 'gc_attribute_group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_attribute_group, name', 'safe', 'on'=>'search'),
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
			'attributes' => array(self::HAS_MANY, 'Attribute', 'id_attribute_group'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_attribute_group' => 'Id Attribute Group',
			'name' => 'Name',
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

		$criteria->compare('id_attribute_group',$this->id_attribute_group,true);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function items()
	{
		if(self::$_items == null) {
			self::loadItems();
		}
		Yii::trace(print_r(self::$_items, true));
	
		return self::$_items;
	}
	
	/**
	 * Loads the lookup items for the specified type from the database.
	 * @param string the item type
	 */
	private static function loadItems()
	{
		self::$_items = array();
		$models=self::model()->findAll();
	
		foreach($models as $model) {
			self::$_items[$model->id_attribute_group] = $model->name;
		}
	}
}





