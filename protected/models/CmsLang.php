<?php

/**
 * This is the model class for table "gc_cms_lang".
 *
 * The followings are the available columns in table 'gc_cms_lang':
 * @property string $id_cms
 * @property string $id_lang
 * @property string $title
 * @property string $content
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $link_rewrite
 *
 * The followings are the available model relations:
 * @property Cms $idCms
 */
class CmsLang extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CmsLang the static model class
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
		return 'gc_cms_lang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_cms, id_lang, title, meta_title, link_rewrite', 'required'),
			array('id_cms, id_lang', 'length', 'max'=>10),
			array('title, meta_title, link_rewrite', 'length', 'max'=>128),
			array('meta_description, meta_keywords', 'length', 'max'=>255),
			array('content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_cms, id_lang, title, content, meta_title, meta_description, meta_keywords, link_rewrite', 'safe', 'on'=>'search'),
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
			'idCms' => array(self::BELONGS_TO, 'Cms', 'id_cms'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cms' => 'Id Cms',
			'id_lang' => 'Id Lang',
			'title' => 'Title',
			'content' => 'Content',
			'meta_title' => 'Meta Title',
			'meta_description' => 'Meta Description',
			'meta_keywords' => 'Meta Keywords',
			'link_rewrite' => 'Link Rewrite',
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
		$criteria->compare('id_lang',$this->id_lang,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('link_rewrite',$this->link_rewrite,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}