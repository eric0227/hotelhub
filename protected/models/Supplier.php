<?php

/**
 * This is the model class for table "gc_supplier".
 *
 * The followings are the available columns in table 'gc_supplier':
 * @property string $id_supplier
 * @property string $manager_name
 * @property string $manager_email
 * @property string $sales_name
 * @property string $sales_email
 * @property string $reservations_name
 * @property string $reservations_email
 * @property string $reservations_phone
 * @property string $reservations_fx
 * @property string $accounts_name
 * @property string $accounts_email
 * @property string $accounts_phone
 * @property string $accounts_fx
 * @property string $supplier_abn
 * @property string $member_chain_group
 * @property integer $room_count
 * @property string $website
 */
class Supplier extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Supplier the static model class
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
		return 'gc_supplier';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_supplier', 'required'),
			array('room_count', 'numerical', 'integerOnly'=>true),
			array('id_supplier', 'length', 'max'=>10),
			array('manager_name, sales_name, reservations_name, reservations_phone, reservations_fx, accounts_name, accounts_phone, accounts_fx, supplier_abn, member_chain_group', 'length', 'max'=>64),
			array('manager_email, sales_email, reservations_email, accounts_email, website', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_supplier, manager_name, manager_email, sales_name, sales_email, reservations_name, reservations_email, reservations_phone, reservations_fx, accounts_name, accounts_email, accounts_phone, accounts_fx, supplier_abn, member_chain_group, room_count, website', 'safe', 'on'=>'search'),
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
			'hotel' => array(self::HAS_ONE, 'Hotel', 'id_supplier'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_supplier' => 'Id Supplier',
			'manager_name' => 'Manager Name',
			'manager_email' => 'Manager Email',
			'sales_name' => 'Sales Name',
			'sales_email' => 'Sales Email',
			'reservations_name' => 'Reservations Name',
			'reservations_email' => 'Reservations Email',
			'reservations_phone' => 'Reservations Phone',
			'reservations_fx' => 'Reservations Fx',
			'accounts_name' => 'Accounts Name',
			'accounts_email' => 'Accounts Email',
			'accounts_phone' => 'Accounts Phone',
			'accounts_fx' => 'Accounts Fx',
			'supplier_abn' => 'Supplier Abn',
			'member_chain_group' => 'Member Chain Group',
			'room_count' => 'Room Count',
			'website' => 'Website',
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

		$criteria->compare('id_supplier',$this->id_supplier,true);
		$criteria->compare('manager_name',$this->manager_name,true);
		$criteria->compare('manager_email',$this->manager_email,true);
		$criteria->compare('sales_name',$this->sales_name,true);
		$criteria->compare('sales_email',$this->sales_email,true);
		$criteria->compare('reservations_name',$this->reservations_name,true);
		$criteria->compare('reservations_email',$this->reservations_email,true);
		$criteria->compare('reservations_phone',$this->reservations_phone,true);
		$criteria->compare('reservations_fx',$this->reservations_fx,true);
		$criteria->compare('accounts_name',$this->accounts_name,true);
		$criteria->compare('accounts_email',$this->accounts_email,true);
		$criteria->compare('accounts_phone',$this->accounts_phone,true);
		$criteria->compare('accounts_fx',$this->accounts_fx,true);
		$criteria->compare('supplier_abn',$this->supplier_abn,true);
		$criteria->compare('member_chain_group',$this->member_chain_group,true);
		$criteria->compare('room_count',$this->room_count);
		$criteria->compare('website',$this->website,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}

