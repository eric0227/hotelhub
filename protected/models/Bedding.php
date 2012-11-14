<?php

/**
 * This is the model class for table "gc_bedding".
 *
 * The followings are the available columns in table 'gc_bedding':
 * @property string $id_bedding
 * @property string $id_room
 * @property string $guest_num
 * @property string $bed_num
 * @property string $single_num
 * @property string $double_num
 * @property string $beddig_desc
 * @property string $additional_cost
 * @property string $cots_available
 *
 * The followings are the available model relations:
 * @property Room $room
 */
class Bedding extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bedding the static model class
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
		return 'gc_bedding';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_room, guest_num, single_num, double_num, cots_available', 'required'),
			array('id_room', 'length', 'max'=>10),
			array('guest_num, bed_num, single_num, double_num, cots_available', 'length', 'max'=>2),
			array('beddig_desc', 'length', 'max'=>200),
			array('additional_cost', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_bedding, id_room, guest_num, single_num, double_num, beddig_desc, additional_cost, cots_available', 'safe', 'on'=>'search'),
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
			'room' => array(self::BELONGS_TO, 'Room', 'id_room'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_bedding' => 'Id Bedding',
			'id_room' => 'Id Room',
			'guest_num' => 'Guest Num',
			'single_num' => 'Single Num',
			'double_num' => 'Double Num',
			'beddig_desc' => 'Beddig Desc',
			'additional_cost' => 'Additional Cost',
			'cots_available' => 'Cots Available',
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

		$criteria->compare('id_bedding',$this->id_bedding,true);
		$criteria->compare('id_room',$this->id_room,true);
		$criteria->compare('guest_num',$this->guest_num,true);
		$criteria->compare('single_num',$this->single_num,true);
		$criteria->compare('double_num',$this->double_num,true);
		$criteria->compare('beddig_desc',$this->beddig_desc,true);
		$criteria->compare('additional_cost',$this->additional_cost,true);
		$criteria->compare('cots_available',$this->cots_available,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}