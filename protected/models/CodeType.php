<?php

/**
 * This is the model class for table "gc_code_type".
 *
 * The followings are the available columns in table 'gc_code_type':
 * @property string $type
 * @property string $name
 *
 * The followings are the available model relations:
 * @property Code[] $codes
 */
class CodeType extends CActiveRecord
{
	const ADDRESS = 1;
	const ROOM = 2;
	
	private static $_items = null;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CodeType the static model class
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
		return 'gc_code_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, name', 'required'),
			array('type', 'length', 'max'=>3),
			array('name', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('type, name', 'safe', 'on'=>'search'),
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
			'codes' => array(self::HAS_MANY, 'Code', 'type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'type' => 'Type',
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

		$criteria->compare('type',$this->type,true);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function addCode($code) {
		$code.save();		
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
			self::$_items[$model->type]=$model->name;
		}
		
	}
}