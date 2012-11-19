<?php

/**
 * This is the model class for table "gc_order_history".
 *
 * The followings are the available columns in table 'gc_order_history':
 * @property string $id_order_history
 * @property string $id_user
 * @property string $id_order
 * @property string $id_order_state
 * @property string $date_add
 * @property string $comment
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Order $order
 * @property OrderState $orderState
 */
class OrderHistory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderHistory the static model class
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
		return 'gc_order_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_order, id_order_state', 'required'),
			array('id_user, id_order, id_order_state', 'length', 'max'=>10),
			array('comment', 'length', 'max'=>300),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_order_history, id_user, id_order, id_order_state, date_add, comment', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'id_user'),
			'order' => array(self::BELONGS_TO, 'Order', 'id_order'),
			'orderState' => array(self::BELONGS_TO, 'OrderState', 'id_order_state'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_order_history' => 'Id Order History',
			'id_user' => 'Id User',
			'id_order' => 'Id Order',
			'id_order_state' => 'Id Order State',
			'date_add' => 'Date Add',
			'comment' => 'Comment',
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

		$criteria->compare('id_order_history',$this->id_order_history,true);
		$criteria->compare('id_user',$this->id_user,true);
		$criteria->compare('id_order',$this->id_order,true);
		$criteria->compare('id_order_state',$this->id_order_state,true);
		$criteria->compare('date_add',$this->date_add,true);
		$criteria->compare('comment',$this->comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave() {
		$order = Order::model()->findByPk($this->id_order);
		$id_user = $order->id_user;
		$this->id_user = $id_user;
		
		if($this->isNewRecord) {
			$this->date_add = new CDbExpression('NOW()');
		}
		
		return parent::beforeSave();
	}
}