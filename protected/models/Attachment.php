<?php

/**
 * This is the model class for table "gc_attachment".
 *
 * The followings are the available columns in table 'gc_attachment':
 * @property string $id_attachment
 * @property string $file
 * @property string $file_name
 * @property string $mime
 *
 * The followings are the available model relations:
 * @property Product[] $gcProducts
 */
class Attachment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Attachment the static model class
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
		return 'gc_attachment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('file, file_name, mime', 'required'),
			array('file', 'length', 'max'=>40),
			array('file_name, mime', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_attachment, file, file_name, mime', 'safe', 'on'=>'search'),
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
			'gcProducts' => array(self::MANY_MANY, 'Product', 'gc_product_attachment(id_attachment, id_product)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_attachment' => 'Id Attachment',
			'file' => 'File',
			'file_name' => 'File Name',
			'mime' => 'Mime',
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

		$criteria->compare('id_attachment',$this->id_attachment,true);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('file_name',$this->file_name,true);
		$criteria->compare('mime',$this->mime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}