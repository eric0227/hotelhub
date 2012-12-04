<?php

/**
 * This is the model class for table "gc_cms_category_lang".
 *
 * The followings are the available columns in table 'gc_cms_category_lang':
 * @property string $id_cms_category
 * @property string $id_lang
 * @property string $name
 * @property string $description
 * @property string $link_rewrite
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 *
 * The followings are the available model relations:
 * @property CmsCategory $idCmsCategory
 */
class CmsCategoryLang extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CmsCategoryLang the static model class
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
		return 'gc_cms_category_lang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_cms_category, id_lang', 'required'),
			array('id_cms_category, id_lang', 'length', 'max'=>10),
			array('name, link_rewrite, meta_title', 'length', 'max'=>128),
			array('meta_keywords, meta_description', 'length', 'max'=>255),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_cms_category, id_lang, name, description, link_rewrite, meta_title, meta_keywords, meta_description', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cms_category' => 'Id Cms Category',
			'id_lang' => 'Id Lang',
			'name' => 'Name',
			'description' => 'Description',
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

		$criteria->compare('id_cms_category',$this->id_cms_category,true);
		$criteria->compare('id_lang',$this->id_lang,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('link_rewrite',$this->link_rewrite,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('meta_description',$this->meta_description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}