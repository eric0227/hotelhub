<?php

/**
 * This is the model class for table "gc_order_state_lang".
 *
 * The followings are the available columns in table 'gc_order_state_lang':
 * @property string $id_order_state
 * @property string $id_lang
 * @property string $name
 * @property string $template
 */
class OrderStateLang extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderStateLang the static model class
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
		return 'gc_order_state_lang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_order_state, id_lang, name, template', 'required'),
			array('id_order_state, id_lang', 'length', 'max'=>10),
			array('name, template', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_order_state, id_lang, name, template', 'safe', 'on'=>'search'),
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
			'id_order_state' => 'Id Order State',
			'id_lang' => 'Id Lang',
			'name' => 'Name',
			'template' => 'Template',
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

		$criteria->compare('id_order_state',$this->id_order_state,true);
		$criteria->compare('id_lang',$this->id_lang,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('template',$this->template,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}