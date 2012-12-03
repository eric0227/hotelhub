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
 * @property Address[] $addresses
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
			'addresses' => array(self::HAS_MANY, 'Address', 'id_destination'),
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
	
	public function getHotelList(){
		$request = Yii::app()->request;
		$keyword = $request->getPost('keyword');
		$id_country = $request->getPost('country');
		$id_destination = $request->getPost('destination');
		$check_in = $request->getPost('date');
		$day = $request->getPost('day');
		$min_price = $request->getPost('min_price');
		$max_price = $request->getPost('max_price');
		$number_of_guests = $request->getPost('number_of_guests');
		
		$connection = Yii::app()->db;
		
		$supplier_sql = "
			SELECT d.id_destination, co.id_country, ad.id_address, su.id_supplier, u.id_group, 
			u.id_lang, d.name AS destination_name, co.name AS country_name, ad.firstname, ad.lastname, u.email
			FROM gc_destination AS d
			INNER JOIN gc_country AS co ON d.id_country = co.id_country 
			INNER JOIN gc_address AS ad ON ad.id_country = co.id_country AND d.id_destination = ad.id_destination
			LEFT JOIN gc_user AS u ON ad.id_address = u.id_address_default 
			RIGHT JOIN gc_supplier AS su ON u.id_user = su.id_supplier
		";
		
		$command = $connection->createCommand($supplier_sql);
		$supplier = $command->queryAll();
		
		$today = date("Y-m-d H:i:s", mktime(0, 0, 0, date('m'), date('d'), date('Y')));
		$end_date = date("Y-m-d H:i:s", mktime(0, 0, 0, date('m'), date('d')+13, date('Y')));

		$product_sql = "
			SELECT list.id_product, list.id_supplier, list.id_product_date, list.on_date 
			FROM(
				SELECT p.id_product, p.id_supplier, pd.id_product_date, pd.on_date
				FROM gc_product p 
				LEFT JOIN gc_product_date pd ON p.id_product = pd.id_product
			)list
			WHERE list.on_date > '".$today."'
			AND list.on_date < '".$end_date."'
			AND list.id_supplier = '".$supplier[0]['id_supplier']."'
		";	
	
		
		$command = $connection->createCommand($product_sql);
		$products = $command->queryAll();
		
		return $products;
	}
	
	protected function beforeDelete() {
		if(count($this->addresses) > 0) {
			$this->active = 0;
			$this->save();
			return false;
		}
		return parent::beforeDelete();
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