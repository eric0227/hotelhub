<?php

/**
 * This is the model class for table "gc_service".
 *
 * The followings are the available columns in table 'gc_service':
 * @property string $id_service
 * @property string $name
 *
 * The followings are the available model relations:
 * @property Category[] $gcCategories
 */
class Service extends CActiveRecord
{
	const HOTEL = '1';
	const CAR = '2';
	
	private static $_items = null;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Service the static model class
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
		return 'gc_service';
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
			array('id_service, name', 'safe', 'on'=>'search'),
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
			'categories' => array(self::MANY_MANY, 'Category', 'gc_category_service(id_service, id_category)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_service' => 'Id Service',
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

		$criteria->compare('id_service',$this->id_service,true);
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
			self::$_items[$model->id_service]=$model->name;
		}
	
	}
	
	public static function getCurrentService() {		
		return Yii::app()->session->get('service','1');
	}
}