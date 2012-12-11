<?php

/**
 * This is the model class for table "gc_bedding".
 *
 * The followings are the available columns in table 'gc_bedding':
 * @property string $id_bedding
 * @property string $id_room
 * @property string $bed_num
 * @property string $single_num
 * @property string $double_num
 * @property string $bedding_desc
 * @property string $additional_cost
 * @property string $cots_available
 * @property string $deleted
 * @property string $active 
 * @property string $on_default
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
			array('id_room, single_num, double_num, bed_index, cots_available', 'required'),
			array('id_room', 'length', 'max'=>10),
			array('bed_num, single_num, double_num, bed_index, cots_available', 'length', 'max'=>2),
			array('deleted, on_default, active', 'length', 'max'=>1),
			array('bedding_desc', 'length', 'max'=>200),
			array('additional_cost', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_bedding, id_room, single_num, double_num, bedding_desc, additional_cost, cots_available', 'safe', 'on'=>'search'),
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
			'cartBooking' => array(self::HAS_MANY, 'CartBooking', 'id_bedding'),
			'orderBooking' => array(self::HAS_MANY, 'OrderBooking', 'id_bedding'),
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
			'single_num' => 'Single Num',
			'double_num' => 'Double Num',
			'bedding_desc' => 'Beddnig Desc',
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
		$criteria->compare('single_num',$this->single_num,true);
		$criteria->compare('double_num',$this->double_num,true);
		$criteria->compare('bedding_desc',$this->bedding_desc,true);
		$criteria->compare('additional_cost',$this->additional_cost,true);
		$criteria->compare('cots_available',$this->cots_available,true);
		
		$criteria->compare('deleted',$this->deleted,true);
		$criteria->compare('active',$this->deleted,true);
		$criteria->compare('on_default',$this->on_default,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getBedImg() {
		$result = "";
		$urlSingleBed = Yii::app()->request->baseUrl . "/images/bed-s.gif";
		$urlDoubleBed = Yii::app()->request->baseUrl . "/images/bed-d.gif";

		for($index = 0; $index < $this->single_num; $index++) {
			//$result = $result . " " . 'I';
			$result = $result . CHtml::image($urlSingleBed);
		}
		
		for($index = 0; $index < $this->double_num; $index++) {
			//$result = $result . " " . 'II';
			$result = $result . CHtml::image($urlDoubleBed);
		}
		
		return $result;
	}
	
	public function getBedInfo() {
		$strResult = "";
		
		if($this->single_num != 0 && $this->double_num != 0) {
			if($this->single_num > 1) {
				$strResult = $this->single_num . ' singles and ';
			} else {
				$strResult = $this->single_num . ' single and ';
			}

			if($this->double_num > 1) {
				$strResult = $strResult . $this->double_num . ' doubles';
			} else {
				$strResult = $strResult . $this->double_num . ' double';
			}
		} else if($this->single_num != 0) {
			if($this->single_num > 1) {
				$strResult = $this->single_num . ' singles';
			} else {
				$strResult = $this->single_num . ' single';
			}
		} else {
			if($this->double_num > 1) {
				$strResult = $this->double_num . ' doubles';
			} else {
				$strResult = $this->double_num . ' double';
			}
		}
		 
		return $strResult;
	}
}