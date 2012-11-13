<?php

/**
 * This is the model class for table "gc_supplier_lang".
 *
 * The followings are the available columns in table 'gc_supplier_lang':
 * @property string $id_supplier
 * @property string $id_lang
 * @property string $short_promotional_blurb
 * @property string $property_details
 * @property string $business_facilities
 * @property string $checkin_instructions
 * @property string $car_parking
 * @property string $getting_there
 * @property string $things_to_do
 * @property string $link_rewrite
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 *
 * The followings are the available model relations:
 * @property Supplier $idSupplier
 */
class SupplierLang extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SupplierLang the static model class
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
		return 'gc_supplier_lang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_supplier, id_lang', 'required'),
			array('id_supplier, id_lang', 'length', 'max'=>10),
			array('link_rewrite, meta_title', 'length', 'max'=>128),
			array('meta_keywords, meta_description', 'length', 'max'=>255),
			array('short_promotional_blurb, property_details, business_facilities, checkin_instructions, car_parking, getting_there, things_to_do', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_supplier, id_lang, short_promotional_blurb, property_details, business_facilities, checkin_instructions, car_parking, getting_there, things_to_do, link_rewrite, meta_title, meta_keywords, meta_description', 'safe', 'on'=>'search'),
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
			'idSupplier' => array(self::BELONGS_TO, 'Supplier', 'id_supplier'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_supplier' => 'Id Supplier',
			'id_lang' => 'Id Lang',
			'short_promotional_blurb' => 'Short Promotional Blurb',
			'property_details' => 'Property Details',
			'business_facilities' => 'Business Facilities',
			'checkin_instructions' => 'Checkin Instructions',
			'car_parking' => 'Car Parking',
			'getting_there' => 'Getting There',
			'things_to_do' => 'Things To Do',
			'link_rewrite' => 'Link Rewrite',
			'meta_title' => 'Meta Title',
			'meta_keywords' => 'Meta Keywords',
			'meta_description' => 'Meta Description',
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
		$criteria->compare('id_lang',$this->id_lang,true);
		$criteria->compare('short_promotional_blurb',$this->short_promotional_blurb,true);
		$criteria->compare('property_details',$this->property_details,true);
		$criteria->compare('business_facilities',$this->business_facilities,true);
		$criteria->compare('checkin_instructions',$this->checkin_instructions,true);
		$criteria->compare('car_parking',$this->car_parking,true);
		$criteria->compare('getting_there',$this->getting_there,true);
		$criteria->compare('things_to_do',$this->things_to_do,true);
		$criteria->compare('link_rewrite',$this->link_rewrite,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('meta_description',$this->meta_description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}