<?php

/**
 * This is the model class for table "gc_address".
 *
 * The followings are the available columns in table 'gc_address':
 * @property string $id_address
 * @property string $id_country
 * @property string $id_state
 * @property string $id_user
 * @property string $alias
 * @property string $company
 * @property string $lastname
 * @property string $firstname
 * @property string $address1
 * @property string $address2
 * @property string $postcode
 * @property string $city
 * @property string $other
 * @property string $phone
 * @property string $phone_mobile
 * @property string $vat_number
 * @property string $dni
 * @property string $date_add
 * @property string $date_upd
 * @property integer $active
 * @property integer $deleted
 *
 * The followings are the available model relations:
 * @property Country $idCountry
 * @property State $idState
 * @property User $idUser
 */
class Address extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Address the static model class
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
		return 'gc_address';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('id_country, alias, lastname, firstname, address1, city, date_add, date_upd', 'required'),
			array('id_country, alias, lastname, firstname, address1, city', 'required'),
			
			array('active, deleted', 'numerical', 'integerOnly'=>true),
			array('id_country, id_state, id_user', 'length', 'max'=>10),
			array('alias, company, lastname, firstname, vat_number', 'length', 'max'=>32),
			array('address1, address2', 'length', 'max'=>128),
			array('postcode', 'length', 'max'=>12),
			array('city', 'length', 'max'=>64),
			array('phone, phone_mobile, dni', 'length', 'max'=>16),
			array('other', 'safe'),
						
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_address, id_country, id_state, id_user, alias, company, lastname, firstname, address1, address2, postcode, city, other, phone, phone_mobile, vat_number, dni, date_add, date_upd, active, deleted', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'id_user'),
			'addressCode' => array(self::BELONGS_TO, 'Code', 'address_code'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_address' => 'Id Address',
			'id_country' => 'Id Country',
			'id_state' => 'Id State',
			'id_user' => 'Id User',
			'alias' => 'Alias',
			'company' => 'Company',
			'lastname' => 'Lastname',
			'firstname' => 'Firstname',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'postcode' => 'Postcode',
			'city' => 'City',
			'other' => 'Other',
			'phone' => 'Phone',
			'phone_mobile' => 'Phone Mobile',
			'vat_number' => 'Vat Number',
			'dni' => 'Dni',
			'date_add' => 'Date Add',
			'date_upd' => 'Date Upd',
			'active' => 'Active',
			'deleted' => 'Deleted',
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

		$criteria->compare('id_address',$this->id_address,true);
		$criteria->compare('id_country',$this->id_country,true);
		$criteria->compare('id_state',$this->id_state,true);
		$criteria->compare('id_user',$this->id_user,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('postcode',$this->postcode,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('other',$this->other,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('phone_mobile',$this->phone_mobile,true);
		$criteria->compare('vat_number',$this->vat_number,true);
		$criteria->compare('dni',$this->dni,true);
		$criteria->compare('date_add',$this->date_add,true);
		$criteria->compare('date_upd',$this->date_upd,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('deleted',$this->deleted);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave()
	{
		if($this->isNewRecord)
		{
			$this->date_add=$this->date_upd=time();
		} else {
			$this->date_upd=time();
		}
				
		return parent::beforeSave();
	}
}