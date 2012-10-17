<?php

/**
 * This is the model class for table "gc_country".
 *
 * The followings are the available columns in table 'gc_country':
 * @property string $id_country
 * @property string $id_zone
 * @property string $id_currency
 * @property string $iso_code
 * @property string $name
 * @property integer $call_prefix
 * @property integer $active
 * @property integer $contains_states
 * @property integer $need_identification_number
 * @property integer $need_zip_code
 * @property string $zip_code_format
 * @property integer $display_tax_label
 *
 * The followings are the available model relations:
 * @property Address[] $addresses
 * @property Zone $idZone
 * @property State[] $states
 */
class Country extends CActiveRecord
{
	private static $_items = null;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Country the static model class
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
		return 'gc_country';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_zone, iso_code, display_tax_label', 'required'),
			array('call_prefix, active, contains_states, need_identification_number, need_zip_code, display_tax_label', 'numerical', 'integerOnly'=>true),
			array('id_zone, id_currency', 'length', 'max'=>10),
			array('iso_code', 'length', 'max'=>3),
			array('name', 'length', 'max'=>64),
			array('zip_code_format', 'length', 'max'=>12),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_country, id_zone, id_currency, iso_code, name, call_prefix, active, contains_states, need_identification_number, need_zip_code, zip_code_format, display_tax_label', 'safe', 'on'=>'search'),
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
			'addresses' => array(self::HAS_MANY, 'Address', 'id_country'),
			'zone' => array(self::BELONGS_TO, 'Zone', 'id_zone'),
			'states' => array(self::HAS_MANY, 'State', 'id_country'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_country' => 'Id Country',
			'id_zone' => 'Id Zone',
			'id_currency' => 'Id Currency',
			'iso_code' => 'Iso Code',
			'name' => 'Name',
			'call_prefix' => 'Call Prefix',
			'active' => 'Active',
			'contains_states' => 'Contains States',
			'need_identification_number' => 'Need Identification Number',
			'need_zip_code' => 'Need Zip Code',
			'zip_code_format' => 'Zip Code Format',
			'display_tax_label' => 'Display Tax Label',
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

		$criteria->compare('id_country',$this->id_country,true);
		$criteria->compare('id_zone',$this->id_zone,true);
		$criteria->compare('id_currency',$this->id_currency,true);
		$criteria->compare('iso_code',$this->iso_code,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('call_prefix',$this->call_prefix);
		$criteria->compare('active',$this->active);
		$criteria->compare('contains_states',$this->contains_states);
		$criteria->compare('need_identification_number',$this->need_identification_number);
		$criteria->compare('need_zip_code',$this->need_zip_code);
		$criteria->compare('zip_code_format',$this->zip_code_format,true);
		$criteria->compare('display_tax_label',$this->display_tax_label);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function items()
	{
		if(self::$_items == null) {
			self::loadItems();
		}
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
			self::$_items[$model->id_country]=$model->name;
		}
	}
}
