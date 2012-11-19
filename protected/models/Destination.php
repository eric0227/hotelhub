<?php

/**
 * This is the model class for table "gc_destination".
 *
 * The followings are the available columns in table 'gc_destination':
 * @property string $id_destination
 * @property string $id_country
 * @property string $id_state
 * @property string $name
 * @property string $position
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Zone $zone
 * @property Country $country
 * @property State $state
 */
class Destination extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Destination the static model class
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
		return 'gc_destination';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_country, name', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('id_country, id_state', 'length', 'max'=>11),
			array('name', 'length', 'max'=>120),
			array('position', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_destination, id_country, id_state, name, position, active', 'safe', 'on'=>'search'),
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
			'country' => array(self::BELONGS_TO, 'Country', 'id_country'),
			'state' => array(self::BELONGS_TO, 'State', 'id_state'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_destination' => 'Id Destination',
			'id_country' => 'Id Country',
			'id_state' => 'Id State',
			'name' => 'Name',
			'position' => 'Position',
			'active' => 'Active',
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

		$criteria->compare('id_destination',$this->id_destination,true);
		$criteria->compare('id_country',$this->id_country,true);
		$criteria->compare('id_state',$this->id_state,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function items($id_country, $id_state) {
		$_items = array();
		
		$attributes = array();
		if(!empty($id_country)) {
			$attributes['id_country'] = $id_country;
		}
		if(!empty($id_state)) {
			$attributes['id_state'] = $id_state;
		}
				
		Yii::trace(print_r($attributes, true));
		
		$models = Destination::model()->findAllByAttributes($attributes);
		
		foreach($models as $model) {
			$_items[$model->id_destination]=$model->name;
		}
		
		return $_items;
	}
}


