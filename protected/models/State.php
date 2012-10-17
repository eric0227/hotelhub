<?php

/**
 * This is the model class for table "gc_state".
 *
 * The followings are the available columns in table 'gc_state':
 * @property string $id_state
 * @property string $id_country
 * @property string $id_zone
 * @property string $name
 * @property string $iso_code
 * @property integer $tax_behavior
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Address[] $addresses
 * @property Zone $idZone
 * @property Country $idCountry
 */
class State extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return State the static model class
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
		return 'gc_state';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_country, id_zone, name, iso_code', 'required'),
			array('tax_behavior, active', 'numerical', 'integerOnly'=>true),
			array('id_country, id_zone', 'length', 'max'=>11),
			array('name', 'length', 'max'=>64),
			array('iso_code', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_state, id_country, id_zone, name, iso_code, tax_behavior, active', 'safe', 'on'=>'search'),
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
			'addresses' => array(self::HAS_MANY, 'Address', 'id_state'),
			'idZone' => array(self::BELONGS_TO, 'Zone', 'id_zone'),
			'idCountry' => array(self::BELONGS_TO, 'Country', 'id_country'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_state' => 'Id State',
			'id_country' => 'Id Country',
			'id_zone' => 'Id Zone',
			'name' => 'Name',
			'iso_code' => 'Iso Code',
			'tax_behavior' => 'Tax Behavior',
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

		$criteria->compare('id_state',$this->id_state,true);
		$criteria->compare('id_country',$this->id_country,true);
		$criteria->compare('id_zone',$this->id_zone,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('iso_code',$this->iso_code,true);
		$criteria->compare('tax_behavior',$this->tax_behavior);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}