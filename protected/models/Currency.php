<?php

/**
 * This is the model class for table "gc_currency".
 *
 * The followings are the available columns in table 'gc_currency':
 * @property string $id_currency
 * @property string $name
 * @property string $iso_code
 * @property string $iso_code_num
 * @property string $sign
 * @property integer $blank
 * @property integer $format
 * @property integer $decimals
 * @property string $conversion_rate
 * @property integer $deleted
 * @property integer $active
 */
class Currency extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Currency the static model class
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
		return 'gc_currency';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, sign, conversion_rate', 'required'),
			array('blank, format, decimals, deleted, active', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>32),
			array('iso_code, iso_code_num', 'length', 'max'=>3),
			array('sign', 'length', 'max'=>8),
			array('conversion_rate', 'length', 'max'=>13),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_currency, name, iso_code, iso_code_num, sign, blank, format, decimals, conversion_rate, deleted, active', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_currency' => 'Id Currency',
			'name' => 'Name',
			'iso_code' => 'Iso Code',
			'iso_code_num' => 'Iso Code Num',
			'sign' => 'Sign',
			'blank' => 'Blank',
			'format' => 'Format',
			'decimals' => 'Decimals',
			'conversion_rate' => 'Conversion Rate',
			'deleted' => 'Deleted',
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

		$criteria->compare('id_currency',$this->id_currency,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('iso_code',$this->iso_code,true);
		$criteria->compare('iso_code_num',$this->iso_code_num,true);
		$criteria->compare('sign',$this->sign,true);
		$criteria->compare('blank',$this->blank);
		$criteria->compare('format',$this->format);
		$criteria->compare('decimals',$this->decimals);
		$criteria->compare('conversion_rate',$this->conversion_rate,true);
		$criteria->compare('deleted',$this->deleted);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}