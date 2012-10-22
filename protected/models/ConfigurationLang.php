<?php

/**
 * This is the model class for table "gc_configuration_lang".
 *
 * The followings are the available columns in table 'gc_configuration_lang':
 * @property string $id_configuration
 * @property string $id_lang
 * @property string $value
 * @property string $date_upd
 *
 * The followings are the available model relations:
 * @property Configuration $idConfiguration
 */
class ConfigurationLang extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ConfigurationLang the static model class
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
		return 'gc_configuration_lang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_configuration, id_lang', 'required'),
			array('id_configuration, id_lang', 'length', 'max'=>10),
			array('value, date_upd', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_configuration, id_lang, value, date_upd', 'safe', 'on'=>'search'),
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
			'idConfiguration' => array(self::BELONGS_TO, 'Configuration', 'id_configuration'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_configuration' => 'Id Configuration',
			'id_lang' => 'Id Lang',
			'value' => 'Value',
			'date_upd' => 'Date Upd',
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

		$criteria->compare('id_configuration',$this->id_configuration,true);
		$criteria->compare('id_lang',$this->id_lang,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('date_upd',$this->date_upd,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}