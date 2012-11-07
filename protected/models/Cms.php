<?php

/**
 * This is the model class for table "gc_cms".
 *
 * The followings are the available columns in table 'gc_cms':
 * @property string $id_cms
 * @property string $id_cms_category
 * @property string $position
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property CmsCategory $idCmsCategory
 * @property CmsLang[] $cmsLangs
 */
class Cms extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cms the static model class
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
		return 'gc_cms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_cms_category', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('id_cms_category, position', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_cms, id_cms_category, position, active', 'safe', 'on'=>'search'),
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
			'idCmsCategory' => array(self::BELONGS_TO, 'CmsCategory', 'id_cms_category'),
			'cmsLangs' => array(self::HAS_MANY, 'CmsLang', 'id_cms'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cms' => 'Id Cms',
			'id_cms_category' => 'Id Cms Category',
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

		$criteria->compare('id_cms',$this->id_cms,true);
		$criteria->compare('id_cms_category',$this->id_cms_category,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}