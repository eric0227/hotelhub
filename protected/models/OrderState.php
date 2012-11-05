<?php

/**
 * This is the model class for table "gc_order_state".
 *
 * The followings are the available columns in table 'gc_order_state':
 * @property string $id_order_state
 * @property integer $invoice
 * @property integer $send_email
 * @property string $color
 * @property integer $unremovable
 * @property integer $hidden
 * @property integer $logable
 * @property integer $delivery
 * @property string $name
 * @property string $template
 *
 * The followings are the available model relations:
 * @property OrderHistory[] $orderHistories
 */
class OrderState extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderState the static model class
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
		return 'gc_order_state';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('unremovable, name, template', 'required'),
			array('invoice, send_email, unremovable, hidden, logable, delivery', 'numerical', 'integerOnly'=>true),
			array('color', 'length', 'max'=>32),
			array('name, template', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_order_state, invoice, send_email, color, unremovable, hidden, logable, delivery, name, template', 'safe', 'on'=>'search'),
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
			'orderHistories' => array(self::HAS_MANY, 'OrderHistory', 'id_order_state'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_order_state' => 'Id Order State',
			'invoice' => 'Invoice',
			'send_email' => 'Send Email',
			'color' => 'Color',
			'unremovable' => 'Unremovable',
			'hidden' => 'Hidden',
			'logable' => 'Logable',
			'delivery' => 'Delivery',
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
		$criteria->compare('invoice',$this->invoice);
		$criteria->compare('send_email',$this->send_email);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('unremovable',$this->unremovable);
		$criteria->compare('hidden',$this->hidden);
		$criteria->compare('logable',$this->logable);
		$criteria->compare('delivery',$this->delivery);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('template',$this->template,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}