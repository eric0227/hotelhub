<?php

/**
 * This is the model class for table "gc_lang".
 *
 * The followings are the available columns in table 'gc_lang':
 * @property string $id_lang
 * @property string $name
 * @property integer $active
 * @property string $iso_code
 * @property string $language_code
 * @property string $date_format_lite
 * @property string $date_format_full
 * @property integer $is_rtl
 */
class Lang extends CActiveRecord
{
	
	private static $_items = null;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Lang the static model class
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
		return 'gc_lang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, iso_code, language_code', 'required'),
			array('active, is_rtl', 'numerical', 'integerOnly'=>true),
			array('name, date_format_lite, date_format_full', 'length', 'max'=>32),
			array('iso_code', 'length', 'max'=>2),
			array('language_code', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_lang, name, active, iso_code, language_code, date_format_lite, date_format_full, is_rtl', 'safe', 'on'=>'search'),
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
			'id_lang' => 'Id Lang',
			'name' => 'Name',
			'active' => 'Active',
			'iso_code' => 'Iso Code',
			'language_code' => 'Language Code',
			'date_format_lite' => 'Date Format Lite',
			'date_format_full' => 'Date Format Full',
			'is_rtl' => 'Is Rtl',
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

		$criteria->compare('id_lang',$this->id_lang,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('iso_code',$this->iso_code,true);
		$criteria->compare('language_code',$this->language_code,true);
		$criteria->compare('date_format_lite',$this->date_format_lite,true);
		$criteria->compare('date_format_full',$this->date_format_full,true);
		$criteria->compare('is_rtl',$this->is_rtl);

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
			self::$_items[$model->id_lang]=$model->name;
		}
	}
	
	public static function getCurrentLang() {
		$session=new CHttpSession;
		$session->open();
	
		if(isset($session['lang'])) {
			$lang = $session['lang'];
		} else {
			$lang = 1;
		}
	
		return $lang;
	}
	
	public static function getDefaultLang() {
		return 1;
	}
}