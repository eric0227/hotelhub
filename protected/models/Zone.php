<?php

/**
 * This is the model class for table "gc_zone".
 *
 * The followings are the available columns in table 'gc_zone':
 * @property string $id_zone
 * @property string $name
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Country[] $countries
 * @property State[] $states
 */
class Zone extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Zone the static model class
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
		return 'gc_zone';
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
			array('active', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_zone, name, active', 'safe', 'on'=>'search'),
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
			'countries' => array(self::HAS_MANY, 'Country', 'id_zone'),
			'states' => array(self::HAS_MANY, 'State', 'id_zone'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_zone' => 'Id Zone',
			'name' => 'Name',
			'active' => 'Active',
		);
	}
	
	protected function beforeDelete() {
		if(count($this->countries) > 0 || count($this->states) > 0) {
			$this->active = 0;
			$this->save();
			return false;
		}
		return parent::beforeDelete();
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

		$criteria->compare('id_zone',$this->id_zone,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function items() {
		$_items = array();
		$models = Zone::model()->findAll();
		foreach($models as $model) {
			$_items[$model->id_zone] = $model->name; 
		}
		return $_items;
	}
}

