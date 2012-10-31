<?php

/**
 * This is the model class for table "gc_room".
 *
 * The followings are the available columns in table 'gc_room':
 * @property string $id_product
 * @property string $id_hotel
 * @property string $room_code
 * @property string $room_type_code
 * @property integer $lead_in_room_type
 * @property string $full_rate
 * @property string $min_night_stay
 * @property string $max_night_stay
 * @property string $room_name
 * @property string $root_description
 * @property string $guests_tot_room_cap
 * @property string $guests_included_price
 * @property string $children_maxnum
 * @property string $children_years
 * @property string $children_extra
 * @property string $adults_maxnum
 * @property string $adults_extra
 *
 * The followings are the available model relations:
 * @property Product $product
 * @property Code $roomCode
 * @property Bedding[] $beddings
 */
class Room extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Room the static model class
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
		return 'gc_room';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_product, id_hotel, room_code, room_type_code', 'required'),
			array('lead_in_room_type', 'numerical', 'integerOnly'=>true),
			array('id_product, id_hotel, full_rate', 'length', 'max'=>10),
			array('room_code', 'length', 'max'=>6),
			array('room_type_code, room_name', 'length', 'max'=>64),
			array('min_night_stay, max_night_stay, guests_tot_room_cap, guests_included_price, children_maxnum, children_years, adults_maxnum', 'length', 'max'=>2),
			array('root_description', 'length', 'max'=>300),
			array('children_extra, adults_extra', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_product, id_hotel, room_code, room_type_code, lead_in_room_type, full_rate, min_night_stay, max_night_stay, room_name, root_description, guests_tot_room_cap, guests_included_price, children_maxnum, children_years, children_extra, adults_maxnum, adults_extra', 'safe', 'on'=>'search'),
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
			'product' => array(self::BELONGS_TO, 'Product', 'id_product'),
			'roomCode' => array(self::BELONGS_TO, 'Code', 'room_code'),
			'beddings' => array(self::MANY_MANY, 'Bedding', 'gc_room_bedding(id_room, id_bedding)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_product' => 'Id Product',
			'id_hotel' => 'Id Hotel',
			'room_code' => 'Room Code',
			'room_type_code' => 'Room Type Code',
			'lead_in_room_type' => 'Lead In Room Type',
			'full_rate' => 'Full Rate',
			'min_night_stay' => 'Min Night Stay',
			'max_night_stay' => 'Max Night Stay',
			'room_name' => 'Room Name',
			'root_description' => 'Root Description',
			'guests_tot_room_cap' => 'Guests Tot Room Cap',
			'guests_included_price' => 'Guests Included Price',
			'children_maxnum' => 'Children Maxnum',
			'children_years' => 'Children Years',
			'children_extra' => 'Children Extra',
			'adults_maxnum' => 'Adults Maxnum',
			'adults_extra' => 'Adults Extra',
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

		$criteria->compare('id_product',$this->id_product,true);
		$criteria->compare('id_hotel',$this->id_hotel,true);
		$criteria->compare('room_code',$this->room_code,true);
		$criteria->compare('room_type_code',$this->room_type_code,true);
		$criteria->compare('lead_in_room_type',$this->lead_in_room_type);
		$criteria->compare('full_rate',$this->full_rate,true);
		$criteria->compare('min_night_stay',$this->min_night_stay,true);
		$criteria->compare('max_night_stay',$this->max_night_stay,true);
		$criteria->compare('room_name',$this->room_name,true);
		$criteria->compare('root_description',$this->root_description,true);
		$criteria->compare('guests_tot_room_cap',$this->guests_tot_room_cap,true);
		$criteria->compare('guests_included_price',$this->guests_included_price,true);
		$criteria->compare('children_maxnum',$this->children_maxnum,true);
		$criteria->compare('children_years',$this->children_years,true);
		$criteria->compare('children_extra',$this->children_extra,true);
		$criteria->compare('adults_maxnum',$this->adults_maxnum,true);
		$criteria->compare('adults_extra',$this->adults_extra,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}