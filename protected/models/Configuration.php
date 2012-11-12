<?php

/**
 * This is the model class for table "gc_configuration".
 *
 * The followings are the available columns in table 'gc_configuration':
 * @property string $id_configuration
 * @property string $name
 * @property string $value
 * @property string $message
 * @property string $date_add
 * @property string $date_upd
 *
 * The followings are the available model relations:
 * @property ConfigurationLang[] $configurationLangs
 */
class Configuration extends CActiveRecord
{
	private $currentLangModel = null;	
	private $message = null;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Configuration the static model class
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
		return 'gc_configuration';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>32),
			//array('value', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_configuration, name, value, date_add, date_upd', 'safe', 'on'=>'search'),
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
			'configurationLangs' => array(self::HAS_MANY, 'ConfigurationLang', 'id_configuration'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_configuration' => 'Id Configuration',
			'name' => 'Name',
			'value' => 'Value',
			'date_add' => 'Date Add',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('date_add',$this->date_add,true);
		$criteria->compare('date_upd',$this->date_upd,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
		
	public function getMessage() {
		if($this->message != null) {
			return $this->message;
		}
		return $this->getCurrentLangField('message');
	}
	
	private function getCurrentLangField($name) {
		if($currentLangModel == null) {
			$currentLangModel = ConfigurationLang::model()->findByAttributes(array('id_configuration'=>$this->id_configuration, 'id_lang'=>Lang::getCurrentLang()));
		}
		return $currentLangModel->{$name};
	}
	
	public function loadMultiLang() {
		$mutltiLangModels = ConfigurationLang::model()->findAllByAttributes(array('id_configuration'=>$this->id_configuration));
		
		$message = array();
		
		foreach($mutltiLangModels as $mutltiLangModel) {
			$message[$mutltiLangModel->id_lang] = $mutltiLangModel->message;
		}	
		$this->message = $message;
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